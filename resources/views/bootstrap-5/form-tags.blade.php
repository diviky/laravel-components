<div x-data="{
    tags: {{ json_encode($value) }},
    tag: null,
    focused: false,
    isReadonly: {{ json_encode($isReadonly()) }},
    isRequired: {{ json_encode($isRequired()) }},

    init() {
        if (this.tags == null || !Array.isArray(this.tags)) {
            this.tags = [];
        }

        // Fix weird issue when navigating back
        document.addEventListener('livewire:navigating', () => {
            let elements = document.querySelectorAll('.tags-element');
            elements.forEach(el => el.remove());
        });
    },
    push() {
        if (this.tag != '' && this.tag != null && this.tag != undefined) {
            let tag = this.tag.toString().replace(/,/g, '').trim()

            if (tag != '' && !this.hasTag(tag)) {
                this.tags.push(tag)
            }
        }

        this.clear()
    },

    hasTag(tag) {
        var tag = this.tags.find(e => {
            e = e.toString();
            return e.toLowerCase() === tag.toLowerCase()
        })
        return tag != undefined
    },

    remove(index) {
        this.tags.splice(index, 1)
    },

    clear() {
        this.tag = null;
        this.focused = false;
    },

    clearAll() {
        this.tags = [];
    },

    focus() {
        if (this.isReadonly) {
            return
        }

        this.focused = true
        $refs.searchInput.focus()
    }
}" @keydown.escape="clear()">
    <div class="form-group">
        @if ($label)
            <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />
        @endif

        <!-- TAGS + SEARCH INPUT -->
        <div @click="focus()"
            {{ $attributes->except(['wire:model', 'wire:model.live'])->class([
                    'form-control relative',
                    'border border-dashed' => $isReadonly(),
                    'input-error' => $errors->has($name) || $errors->has($name . '*'),
                    'ps-10' => $icon,
                ]) }}>
            <!-- ICON  -->
            @if ($icon)
                <x-icon :name="$icon"
                    class="absolute top-1/2 -translate-y-1/2 start-3 text-gray-400 pointer-events-none" />
            @endif

            <!-- CLEAR ICON  -->
            @if (!$isReadonly())
                <x-icon @click="clearAll()" x-show="tags.length" name="x"
                    class="absolute top-1/2 end-4 -translate-y-1/2 cursor-pointer text-gray-400 hover:text-gray-600" />
            @endif

            <!--  TAGS  -->
            <span wire:key="tags-{{ $id() }}" class="tags-list d-inline-flex">
                <template :key="index" x-for="(tag, index) in tags">
                    <div class="tag">
                        <span x-text="tag" class="badge badge-sm tag-badge"></span>
                        <x-icon @click="remove(index)" x-show="!isReadonly" name="x" size="sm" />
                    </div>
                </template>
            </span>

            <!-- INPUT -->
            <input id="{{ $id() }}" class="outline-none mt-1 bg-transparent"
                placeholder="{{ $attributes->whereStartsWith('placeholder')->first() }}" type="text"
                enterkeyhint="done" x-ref="searchInput" :class="(isReadonly || !focused) && 'w-1'"
                :required="isRequired" :readonly="isReadonly" x-modal="tag" @input="focus()" @click.outside="clear()"
                @keydown.enter.prevent="push()" @keydown.tab.prevent="push()"
                @keyup.prevent="if (event.key === ',') { push() }" />

            <template x-if="!Array.isArray(tags)">
                <input type="hidden" x-modal="tags" name="{{ $name }}" />
            </template>

            <template x-if="Array.isArray(tags) && tags.length <= 0">
                <input type="hidden" value="" name="{{ $name }}" />
            </template>

            <template x-for="select in Array.isArray(tags) ? tags : []">
                <input type="hidden" :value="select" name="{{ $name }}" />
            </template>
        </div>

        <x-form-errors :name="$name" />

        <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    </div>
</div>
