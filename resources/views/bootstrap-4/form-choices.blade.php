<div x-data="{ focused: false, selection: [] }">
    <div @click.outside = "clear()" @keyup.esc = "clear()" x-data="{
        options: {{ json_encode($options->values()) }},
        isSingle: {{ json_encode($multiple) }},
        isSearchable: {{ json_encode($searchable) }},
        isReadonly: {{ json_encode($isReadonly()) }},
        isDisabled: {{ json_encode($isDisabled()) }},
        isRequired: {{ json_encode($isRequired()) }},
        noResults: false,
        search: '',

        init() {

        },
        get selectedOptions() {
            return this.isSingle ?
                this.options.filter(i => i.{{ $valueField }} == this.selection) :
                this.selection.map(i => this.options.filter(o => o.{{ $valueField }} == i)[0])
        },
        get isAllSelected() {
            return this.options.length == this.selection.length
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

        <!-- PREPEND/APPEND CONTAINER -->
        @if (isset($prepend) || isset($append))
            <div class="flex">
        @endif

        <!-- PREPEND -->
        @if (isset($prepend))
            <div class="rounded-s-lg flex items-center bg-base-200">
                {{ $prepend }}
            </div>
        @endif

        <!-- SELECTED OPTIONS + SEARCH INPUT -->
        <div @click="focus();" x-ref="container"
            {{ $attributes->class([
                'select select-bordered form-select select-primary w-full h-fit pe-16 pb-1 pt-1.5 inline-block cursor-pointer relative',
            ]) }}>
            <!-- ICON  -->
            @if (isset($icon))
                <x-icon :name="$icon"
                    class="absolute top-1/2 -translate-y-1/2 start-3 text-gray-400 pointer-events-none" />
            @endif

            <!-- CLEAR ICON  -->
            @if (!$attributes->has('readonly') && !$attributes->has('disabled'))
                <x-icon @click="reset()" name="o-x-mark" x-show="!isSelectionEmpty"
                    class="absolute top-1/2 end-8 -translate-y-1/2 cursor-pointer text-gray-400 hover:text-gray-600" />
            @endif

            <!-- SELECTED OPTIONS -->
            <span>
                <template x-for="(option, index) in selectedOptions" :key="index">
                    <div
                        class="mary-choices-element bg-primary/5 text-primary hover:bg-primary/10 dark:bg-primary/20 dark:hover:bg-primary/40 dark:text-inherit px-2 me-2 mt-0.5 mb-1.5 last:me-0 inline-block rounded cursor-pointer">
                        <!-- SELECTION SLOT -->
                        @if (isset($selection))
                            <span
                                x-html="document.getElementById('selection-{{ $id() . '-\' + option.' . $valueField }}).innerHTML"></span>
                        @else
                            <span x-text="option.{{ $labelField }}"></span>
                        @endif

                        <x-icon @click="toggle(option.{{ $valueField }})"
                            x-show="!isReadonly && !isDisabled && !isSingle" name="o-x-mark"
                            class="text-gray-500 hover:text-red-500" />
                    </div>
                </template>
            </span>

            &nbsp;

            <!-- INPUT SEARCH -->
            <input x-ref="searchInput" x-model="search" @keyup="lookup()" @input="focus()"
                :required="isRequired && isSelectionEmpty" :readonly="isReadonly || isDisabled || !isSearchable"
                :class="(isReadonly || isDisabled || !isSearchable || !focused) && '!w-1'"
                class="outline-none mt-0.5 transparent w-20" />
        </div>


        <!-- APPEND -->
        @if (isset($append))
            <div class="rounded-e-lg flex items-center bg-base-200">
                {{ $append }}
            </div>
        @endif

        <!-- END: APPEND/PREPEND CONTAINER  -->
        @if (isset($prepend) || isset($append))
    </div>
    @endif

    <!-- OPTIONS LIST -->
    <div x-show="focused" x-cloak class="relative">
        <div class="w-full absolute z-10 shadow-xl bg-base-100 border border-base-300 rounded-lg cursor-pointer overflow-y-auto"
            x-anchor.bottom-start="$refs.container">

            <!-- SELECT ALL -->
            @if (isset($allowAll))
                <div class="font-bold   border border-s-4 border-b-base-200 hover:bg-base-200">
                    <div x-show="!isAllSelected" @click="selectAll()"
                        class="p-3 underline decoration-wavy decoration-info">
                        {{ $allowAllText }}
                    </div>
                    <div x-show="isAllSelected" @click="reset()" class="p-3 underline decoration-wavy decoration-error">
                        {{ $removeAllText }}
                    </div>
                </div>
            @endif

            <!-- NO RESULTS -->
            <div x-show="noResults"
                class="p-3 decoration-wavy decoration-warning underline font-bold border border-s-4 border-s-warning border-b-base-200">
                {{ $noResultText }}
            </div>

            <div x-ref="choicesOptions" class="list-group">
                @foreach ($options as $option)
                    <div id="option-{{ $id() }}-{{ $optionValue($option) }}"
                        @click="toggle('{{ $optionValue($option) }}')"
                        :class="isActive('{{ $optionValue($option) }}') && 'border-s-4 border-s-primary'"
                        search-value="{{ $optionLabel($option) }}" class="border-s-4 list-group">
                        <!-- ITEM SLOT -->
                        @if (isset($item))
                            {{ $item($option) }}
                        @else
                            <div class="list-group-item">
                                {{ $optionLabel($option) }}
                            </div>
                        @endif

                        <!-- SELECTION SLOT -->
                        @if (isset($selection))
                            <span id="selection-{{ $id() }}-{{ $optionValue($option) }}" class="hidden">
                                {{ $selection($option) }}
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
