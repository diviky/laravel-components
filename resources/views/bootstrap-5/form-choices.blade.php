<div @class([
    'form-group' => !$inline,
    'form-choices',
]) x-data="{ focused: false, selection: {{ $entangle($attributes) }} }">
    <div @click.outside = "clear()" @keyup.esc = "clear()" x-data="{
        id: {{ json_encode($id()) }},
        options: {{ json_encode($options->values()) }},
        isSingle: {{ json_encode(!$multiple) }},
        isSearchable: {{ json_encode($searchable) }},
        isReadonly: {{ json_encode($isReadonly()) }},
        isDisabled: {{ json_encode($isDisabled()) }},
        isRequired: {{ json_encode($isRequired()) }},
        minChars: {{ intval($minChars) }},
        noResults: false,
        keyword: '',
        fetchUrl: '{{ $attributes->get('data-fetch') }}',
        fetchMethod: '{{ $attributes->get('data-method', 'GET') }}',
        formData: {{ $attributes->get('form-data', '{}') }},

        init() {
            this.fetch();
            // Fix weird issue when navigating back
            document.addEventListener('livewire:navigating', () => {
                let elements = document.querySelectorAll('.form-choices-element');
                elements.forEach(el => el.remove());
            });
        },
        fetch() {
            if (this.fetchUrl) {
                fetch(this.fetchUrl, {
                        method: this.fetchMethod,
                        headers: {
                            'Content-Type': 'application/json',
                            'accept': 'application/json',
                            'X-Csrf-Token': '{{ csrf_token() }}'
                        }
                    })
                    .then((res => res.json()))
                    .then(data => {
                        this.options = Alpine.reactive(data.rows);
                    })
                    .catch((e) => {
                        console.error(e)
                        console.log('Ooops! Something went wrong!')
                    });
            }
        },
        get selectedOptions() {
            if (this.isSingle) {
                return this.options.filter(i => i.{{ $valueField }} == this.selection) || {};
            }

            return this.selection.map(i => this.options.find(o => o.{{ $valueField }} == i) || {});
        },
        updateOptions(newOptions) {
            this.options = [...newOptions];
        },
        get noResults() {
            if (!this.isSearchable || this.$refs.searchInput.value == '') {
                return false
            }

            return this.isSingle ?
                (this.selection && this.options.length == 1) || (!this.selection && this.options.length == 0) :
                this.options.length <= this.selection.length
        },
        get isAllSelected() {
            return this.selection == null ? false : this.options.length == this.selection.length
        },
        get isSelectionEmpty() {
            return this.isSingle ?
                this.selection == null || this.selection == '' :
                this.selection.length == 0
        },
        selectAll() {
            this.selection = this.options.map(i => i.{{ $valueField }})
            this.dispatchChangeEvent({ value: this.selection })
        },
        clear() {
            this.focused = false;
            this.keyword = ''
            this.$refs.searchInput.value = ''
        },
        reset() {
            this.clear();
            this.isSingle ?
                this.selection = '' :
                this.selection = []

            this.dispatchChangeEvent({ value: this.selection })
        },
        focus() {
            if (this.isReadonly || this.isDisabled) {
                return
            }

            this.focused = true
            this.$refs.searchInput.focus()
        },
        isActive(id) {
            return this.isSingle ?
                this.selection == id :
                this.selection.includes(id)
        },
        toggle(id, keepOpen = false) {
            if (this.isReadonly || this.isDisabled) {
                return
            }

            if (this.isSingle) {
                this.selection = id
                this.focused = false
                this.keyword = ''
            } else {
                this.selection.includes(id) ?
                    this.selection = this.selection.filter(i => i != id) :
                    this.selection.push(id)
            }

            this.dispatchChangeEvent({ value: this.selection })
            this.$refs.searchInput.value = ''

            if (!keepOpen) {
                this.$refs.searchInput.focus()
            }
        },
        lookup() {
            Array.from(this.$refs.choicesOptions.children).forEach(child => {
                if (!child.getAttribute('search-value').match(new RegExp(this.keyword, 'i'))) {
                    child.classList.add('hidden')
                } else {
                    child.classList.remove('hidden')
                }
            })

            this.noResults = Array.from(this.$refs.choicesOptions.querySelectorAll('div > .hidden')).length ==
                Array.from(this.$refs.choicesOptions.querySelectorAll('[search-value]')).length
        },
        search(value, event) {
            if (!value || value.length < this.minChars) {
                return
            }

            // Prevent search for this keys
            if (event && ['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'Shift', 'CapsLock', 'Tab'].includes(event.key)) {
                return;
            }

            @if($searchFunction)
            // Call search function from parent component
            // `search(value)` or `search(value, extra1, extra2 ...)`
            @this.{{ str_contains($searchFunction, '(')
                ? preg_replace('/\((.*?)\)/', '(value, $1)', $searchFunction)
                : $searchFunction . '(value)' }}
            @endif

        },
        dispatchChangeEvent(detail) {
            this.$refs.searchInput.dispatchEvent(new CustomEvent('change', { bubbles: true, detail }))
        }
    }" @keydown.up="$focus.previous()"
        @keydown.down="$focus.next()">
        <!-- STANDARD LABEL -->
        <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

        <div @class([
            'input-group' =>
                isset($prepend) || isset($append) || isset($before) || isset($after),
            'input-group-flat' => $attributes->has('flat'),
            'input-group-sm' => (isset($prepend) || isset($append)) && $size == 'sm',
            'input-group-lg' => (isset($prepend) || isset($append)) && $size == 'lg',
            'input-icon' => isset($icon),
            'position-relative',
        ])>

            @isset($prepend)
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            @endisset

            @isset($before)
                {!! $before !!}
            @endisset

            <!-- SELECTED OPTIONS + SEARCH INPUT -->
            <div @click="focus();" x-ref="container"
                {{ $attributes->whereDoesntStartWith('wire:')->class(['form-select', 'form-select-sm' => $size == 'sm', 'form-select-lg' => $size == 'lg']) }}>
                <!-- ICON  -->
                @if (isset($icon))
                    <x-icon :name="$icon" class="choice-append" />
                @endif

                <!-- CLEAR ICON  -->
                @if (!$attributes->has('readonly') && !$attributes->has('disabled'))
                    <x-icon @click="reset()" name="x" x-show="!isSelectionEmpty" class="choice-clear" />
                @endif

                <!-- SELECTED OPTIONS -->
                <span class="tags-list d-inline-flex" wire:key="selected-options-{{ $uuid }}">
                    @if ($compact)
                        <div class="compact-text">
                            <span class="tag !h-auto">
                                {{ $compactText }}
                                <span class="badge badge-sm bg-primary tag-badge" x-text="selectedOptions.length">
                                </span>
                            </span>
                        </div>
                    @else
                        <template x-for="(option, index) in selectedOptions" :key="index">
                            <div class="form-choices-element tag !h-auto">
                                <!-- SELECTION SLOT -->
                                @if (isset($selection))
                                    <span
                                        x-html="document.getElementById('selection-{{ $uuid . '-\' + option.' . $valueField }}).innerHTML"></span>
                                @else
                                    <span x-html="option.{{ $labelField }}"></span>
                                @endif

                                <x-icon @click="toggle(option.{{ $valueField }})"
                                    x-show="!isReadonly && !isDisabled && !isSingle" name="x" />
                            </div>
                        </template>
                    @endif

                    @if ($placeholder)
                        <span class="form-choices-element tag !h-auto" x-show="isSelectionEmpty">
                            {{ $placeholder }}
                        </span>
                    @endif
                </span>

                <!-- INPUT SEARCH -->
                <input x-ref="searchInput" @keydown.arrow-down.prevent="focus()" @input="focus()"
                    :readonly="isReadonly || isDisabled || !isSearchable"
                    :class="(isReadonly || isDisabled || !isSearchable || !focused) && 'w-2 ps-2'"
                    class="choice-input w-20"
                    @if ($searchable && $searchFunction) @keydown.debounce.{{ $debounce }}="search($el.value, $event)" @else x-modal="keyword" @keyup="lookup()" @endif />

                <!-- dummy input for javascript validation -->
                <input :class="(isSelectionEmpty) && 'validatehidden'" :required="isRequired && isSelectionEmpty"
                    type="hidden" />

                <template x-if="!Array.isArray(selection)">
                    <input type="hidden" x-modal="selection" name="{{ $name }}" />
                </template>

                <template x-if="Array.isArray(selection) && selection.length <= 0">
                    <input type="hidden" value="" name="{{ $name }}" />
                </template>

                <template x-for="select in Array.isArray(selection) ? selection : []">
                    <input type="hidden" :value="select" name="{{ $name }}" />
                </template>
            </div>

            <!-- APPEND -->
            @isset($append)
                <div class="input-group-text">
                    {!! $append !!}
                </div>
            @endisset
            @isset($after)
                {!! $after !!}
            @endisset
        </div>

        <!-- OPTIONS LIST -->
        <div x-show="focused" x-cloak class="choice-list" wire:key="options-list-main-{{ $id() }}">
            <div wire:key="options-list-{{ $id() }}"
                class="choice-items {{ $height }} cursor-pointer overflow-y-auto border p-1 mt-1 rounded"
                x-anchor.bottom-start="$refs.container">

                <!-- PROGRESS -->
                <progress wire:loading wire:target="{{ preg_replace('/\((.*?)\)/', '', $searchFunction) }}"
                    class="progress absolute progress-primary top-0 h-0.5"></progress>

                <!-- SELECT ALL -->
                @if ($multiple)
                    <div class="fw-bold rounded" wire:key="allow-all-{{ rand() }}">
                        <div x-show="!isAllSelected" @click="selectAll()" class="p-1">
                            {{ $allowAllText }}
                        </div>
                        <div x-show="isAllSelected" @click="reset()" class="p-1">
                            {{ $removeAllText }}
                        </div>
                    </div>
                @endif

                <!-- NO RESULTS -->
                <div x-show="noResults" wire:key="no-results-{{ rand() }}"
                    class="p-2 decoration-wavy decoration-warning underline font-bold border border-s-4 border-s-warning border-b-base-200">
                    {{ $noResultText }}
                </div>

                <div x-ref="choicesOptions">
                    @foreach ($options as $option)
                        @if ($optionIsOptGroup($option))
                            <div label="{{ $optionLabel($option) }}">
                                @foreach ($optionChildren($option) as $child)
                                    <div @click="toggle('{{ $optionValue($child) }}', true)"
                                        @keydown.enter="toggle('{{ $optionValue($child) }}', true)"
                                        wire:key="option-{{ $optionValue($child) }}"
                                        search-value="{{ $optionLabel($child) }}"
                                        class="list-group-item rounded p-1 mb-1"
                                        :class="isActive('{{ $optionValue($child) }}') && 'active'" tabindex="0">
                                        <!-- ITEM SLOT -->
                                        @if ($item)
                                            {{ $item($child) }}
                                        @else
                                            <div class="d-flex align-items-center">
                                                @if ($imageField)
                                                    <x-avatar :label="$optionValue($child)" :image="$optionProperty($child, $imageField)" size="sm"
                                                        class="me-1" />
                                                @endif

                                                <x-icon :name="$optionProperty($child, 'icon')" class="me-1" />
                                                <span>{!! $optionLabel($child) !!}</span>
                                                <span :class="!isActive('{{ $optionValue($child) }}') && 'hide'"
                                                    class="ms-auto">
                                                    <x-icon name="circle-check" class="text-success" />
                                                </span>
                                            </div>
                                        @endif

                                        <!-- SELECTION SLOT -->
                                        @if ($selection)
                                            <span id="selection-{{ $id() }}-{{ $optionValue($option) }}"
                                                class="hidden">
                                                {{ $selection($option) }}
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div @click="toggle('{{ $optionValue($option) }}', true)"
                                @keydown.enter="toggle('{{ $optionValue($option) }}', true)"
                                wire:key="option-{{ $optionValue($option) }}"
                                search-value="{{ $optionLabel($option) }}" class="list-group-item mb-1 rounded p-1"
                                :class="isActive('{{ $optionValue($option) }}') && 'active'" tabindex="0">
                                <!-- ITEM SLOT -->
                                @if ($item)
                                    {{ $item($option) }}
                                @else
                                    <div class="d-flex align-items-center">
                                        @if ($imageField)
                                            <x-avatar label="{{ $optionLabel($option) }}"
                                                image="{{ $optionProperty($option, $imageField) }}" circle xs
                                                class="me-1" />
                                        @endif

                                        <x-icon :name="$optionProperty($option, 'icon')" class="me-1" />
                                        <span>{!! $optionLabel($option) !!}</span>
                                        <span :class="!isActive('{{ $optionValue($option) }}') && 'hide'"
                                            class="ms-auto">
                                            <x-icon name="circle-check" class="text-success" />
                                        </span>
                                    </div>
                                @endif

                                <!-- SELECTION SLOT -->
                                @if ($selection)
                                    <span id="selection-{{ $uuid }}-{{ $optionValue($option) }}"
                                        class="hidden">
                                        {{ $selection($option) }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
        <x-form-errors :name="$name" />
    </div>
</div>
