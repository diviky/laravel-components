<div class="form-group form-choices" x-data="{ focused: false, selection: {{ json_encode($selectedKey) }} }">
    <div @click.outside = "clear()" @keyup.esc = "clear()" x-data="{
        options: {{ json_encode($options->values()) }},
        isSingle: {{ json_encode(!$multiple) }},
        isSearchable: {{ json_encode($searchable) }},
        isReadonly: {{ json_encode($isReadonly()) }},
        isDisabled: {{ json_encode($isDisabled()) }},
        isRequired: {{ json_encode($isRequired()) }},
        noResults: false,
        search: '',
        fetchUrl: '{{ $attributes->get('data-choices-fetch') }}',
        fetchMethod: '{{ $attributes->get('data-choices-method', 'GET') }}',
        formData: {{ $attributes->get('form-data', '{}') }},
        init() {
            this.fetch();
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
                        this.options = data.rows;
                    })
                    .catch((e) => {
                        console.error(e)
                        console.log('Ooops! Something went wrong!')
                    });
            }
        },
        get selectedOptions() {
            return this.isSingle ?
                this.options.filter(i => i.{{ $valueField }} == this.selection) :
                this.selection.map(i => this.options.filter(o => o.{{ $valueField }} == i)[0])
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
        },
        clear() {
            this.focused = false;
            this.search = ''
        },
        reset() {
            this.clear();
            this.isSingle ?
                this.selection = null :
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
        toggle(id) {
            if (this.isReadonly || this.isDisabled) {
                return
            }

            if (this.isSingle) {
                this.selection = id
                this.focused = false
                this.search = ''
            } else {
                this.selection.includes(id) ?
                    this.selection = this.selection.filter(i => i != id) :
                    this.selection.push(id)
            }

            this.dispatchChangeEvent({ value: this.selection })
            this.$refs.searchInput.focus()
        },
        lookup() {
            Array.from(this.$refs.choicesOptions.children).forEach(child => {
                if (!child.getAttribute('search-value').match(new RegExp(this.search, 'i'))) {
                    child.classList.add('hidden')
                } else {
                    child.classList.remove('hidden')
                }
            })

            this.noResults = Array.from(this.$refs.choicesOptions.querySelectorAll('div > .hidden')).length ==
                Array.from(this.$refs.choicesOptions.querySelectorAll('[search-value]')).length
        },
        dispatchChangeEvent(detail) {
            this.$refs.searchInput.dispatchEvent(new CustomEvent('change-selection', { bubbles: true, detail }))
        }
    }">
        <!-- STANDARD LABEL -->
        @if ($label)
            <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" />
        @endif

        <div @class([
            'input-group' => isset($prepend) || isset($append),
            'input-icon' => @isset($icon),
        ])>

            @isset($prepend)
                <div class="input-group-text">
                    {!! $prepend !!}
                </div>
            @endisset

            <!-- SELECTED OPTIONS + SEARCH INPUT -->
            <div @click="focus();" x-ref="container" {{ $attributes->class(['form-select']) }}>
                <!-- ICON  -->
                @if (isset($icon))
                    <x-icon :name="$icon" class="choice-append" />
                @endif

                <!-- CLEAR ICON  -->
                @if (!$attributes->has('readonly') && !$attributes->has('disabled'))
                    <x-icon @click="reset()" name="x" x-show="!isSelectionEmpty" class="choice-clear" />
                @endif

                <!-- SELECTED OPTIONS -->
                <span class="tags-list">
                    @if ($compact)
                        <div class="compact-text">
                            <span class="tag">
                                {{ $compactText }}
                                <span class="badge badge-sm bg-primary tag-badge"
                                    x-text="selectedOptions.length"></span>
                            </span>
                        </div>
                    @else
                        <template x-for="(option, index) in selectedOptions" :key="index">
                            <div class="form-choices-element tag">
                                <!-- SELECTION SLOT -->
                                @if (isset($selection))
                                    <span
                                        x-html="document.getElementById('selection-{{ $id() . '-\' + option.' . $valueField }}).innerHTML"></span>
                                @else
                                    <span x-text="option.{{ $labelField }}"></span>
                                @endif

                                <x-icon @click="toggle(option.{{ $valueField }})"
                                    x-show="!isReadonly && !isDisabled && !isSingle" name="x" />
                            </div>
                        </template>
                    @endif

                    <!-- INPUT SEARCH -->
                    <input x-ref="searchInput" x-model="search" @keyup="lookup()" @input="focus()"
                        :required="isRequired && isSelectionEmpty" :readonly="isReadonly || isDisabled || !isSearchable"
                        :class="(isReadonly || isDisabled || !isSearchable || !focused) && 'w-2'"
                        class="choice-input w-20" name="{{ $name }}" />
                </span>

            </div>

            <!-- APPEND -->
            @isset($append)
                <div class="input-group-text">
                    {!! $append !!}
                </div>
            @endisset
        </div>

        <!-- OPTIONS LIST -->
        <div x-show="focused" x-cloak class="choice-list">
            <div class="choice-items" x-anchor.bottom-start="$refs.container">

                <!-- SELECT ALL -->
                @isset($allowAll)
                    <div class="choice-select-all">
                        <div x-show="!isAllSelected" @click="selectAll()" class="p-2">
                            {{ $allowAllText }}
                        </div>
                        <div x-show="isAllSelected" @click="reset()" class="p-2">
                            {{ $removeAllText }}
                        </div>
                    </div>
                @endisset

                <!-- NO RESULTS -->
                <div x-show="noResults" class="p-2">
                    {{ $noResultText }}
                </div>

                <div x-ref="choicesOptions" class="list-group">
                    <template x-for="(option, index) in options" :key="index">
                        <div id="option-{{ $id() }}-option.{{ $valueField }}"
                            @click="toggle(option.{{ $valueField }})"
                            :class="isActive(option.{{ $valueField }}) && 'active'"
                            :search-value="option.{{ $labelField }}" class="list-group-item">

                            <span x-text="option.{{ $labelField }}"></span>
                        </div>
                    </template>
                </div>
                {{--
                <div x-ref="choicesOptions" class="list-group">
                    @foreach ($options as $option)
                        <div id="option-{{ $id() }}-{{ $optionValue($option) }}"
                            @click="toggle('{{ $optionValue($option) }}')"
                            :class="isActive('{{ $optionValue($option) }}') && 'active'"
                            search-value="{{ $optionLabel($option) }}" class="list-group-item">
                            <!-- ITEM SLOT -->
                            @if (isset($item))
                                {{ $item($option) }}
                            @else
                                {{ $optionLabel($option) }}
                            @endif

                            <!-- SELECTION SLOT -->
                            @if (isset($selection))
                                <span id="selection-{{ $id() }}-{{ $optionValue($option) }}" class="hidden">
                                    {{ $selection($option) }}
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div> --}}
            </div>
        </div>

        @if ($hasErrorAndShow($name))
            <x-form-errors :name="$name" />
        @endif
    </div>
</div>
