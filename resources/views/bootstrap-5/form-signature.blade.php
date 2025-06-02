<div x-data="{
    value: {{ json_encode($value) }},
    signature: null,
    isRequired: {{ json_encode($isRequired()) }},
    init() {
        let canvas = document.getElementById('{{ $id() }}signature')
        this.signature = new SignaturePad(canvas, {{ $setup() }});

        // Resize
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext('2d').scale(ratio, ratio);
        this.signature.fromData(this.signature.toData());

        if (this.getPreferredTheme() === 'dark') {
            this.signature.penColor = 'white';
        } else {
            this.signature.penColor = 'black';
        }

        // Event
        this.signature.addEventListener('endStroke', () => this.extract());
    },
    extract() {
        this.value = this.signature.toDataURL();
    },
    getStoredTheme() {
        return localStorage.getItem('theme');
    },
    getPreferredTheme() {
        const storedTheme = this.getStoredTheme();
        if (storedTheme) {
            return storedTheme;
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    },
    clear() {
        this.signature.clear();
        this.extract();
        this.value = ''
    }
}" wire:ignore class="select-none touch-none">
    <div class="form-group h-auto">
        @if ($label)
            <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />
        @endif

        <div
            {{ $attributes->except(['wire:model', 'wire:model.live'])->class([
                    'form-control relative h-auto',
                    'border border-dashed' => $isReadonly(),
                    'input-error' => $errors->has($name) || $errors->has($name . '*'),
                ]) }}>

            <canvas id="{{ $id() }}signature" height="{{ $height }}"
                class="rounded-lg block w-full select-none touch-none text-white"></canvas>

            <input type="hidden" name="{{ $name }}" {{ $wire() }} :required="isRequired" x-model="value" />

            <!-- CLEAR BUTTON -->
            <div class="absolute end-2 top-1/2 -translate-y-1/2 ">
                <x-icon name="backspace" :title="$clearText" @click="clear" class="btn btn-link text-neutral" />
            </div>
        </div>

        <x-form-errors :name="$name" />

        <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    </div>
</div>
