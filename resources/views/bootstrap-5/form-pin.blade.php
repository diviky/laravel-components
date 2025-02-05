@props([
    'extraAttributes' => [],
    'size' => 6,
])

<div class="form-group" x-data="{
    value: '{{ $value }}',
    inputs: [],
    init() {
        // Copy & Paste
        document.getElementById('pin{{ $id() }}').addEventListener('paste', (e) => {
            const paste = (e.clipboardData || window.clipboardData).getData('text');

            for (var i = 0; i < {{ $size }}; i++) {
                this.inputs[i] = paste[i];
            }

            e.preventDefault()
            this.handlePin()
        })
    },
    next(el) {
        this.handlePin()

        if (el.value.length == 0) {
            return
        }

        if (el.nextElementSibling) {
            el.nextElementSibling.focus()
            el.nextElementSibling.select()
        }
    },
    remove(el, i) {
        this.inputs[i] = ''
        this.handlePin()

        if (el.previousElementSibling) {
            el.previousElementSibling.focus()
            el.previousElementSibling.select()
        }
    },
    handlePin() {
        this.value = this.inputs.join('')
        $refs.source.value = this.value

        console.log('value:', this.value)
    }
}">
    <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$attributes->get('id') ?: $id()" />
    <div class="row g-2 pt-2" id="pin{{ $id }}">
        @for ($i = 0; $i < $size; $i++)
            <input type="text" id="{{ $id() }}-pin-{{ $i }}"
                class="form-control form-control-lg w-14 mr-1 inline text-center py-3" maxlength="1"
                x-model="inputs[{{ $i }}]" @keydown.space.prevent
                @keydown.backspace.prevent="remove($event.target, {{ $i }})" @input="next($event.target)">
        @endfor
        <input x-ref="source" type="hidden" name="{{ $name }}" {{ $attributes }} />
    </div>
</div>
