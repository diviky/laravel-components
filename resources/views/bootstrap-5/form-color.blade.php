@props([
    'extraAttributes' => [],
])

@php
    $name = $attributes->get('name');
    $clearable = $name && !$attributes->has('required') && $attributes->get('clearable', true) !== false;
    $colorInputId = $name
        ? 'color_' . str_replace(['[', ']'], ['_', ''], $name)
        : 'color_' . \Illuminate\Support\Str::random(8);
    $initialValue = $name
        ? old($name) ?? (app(\Diviky\LaravelFormComponents\FormDataBinder::class)->boundValue($name) ?? '')
        : '';
    $wirePath = $name ? str_replace(['[', ']'], ['.', ''], \Illuminate\Support\Str::before($name, '[]')) : '';
@endphp

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes
    ->except('clearable')
    ->merge(['type' => 'color', 'class' => 'form-control-color', 'id' => $colorInputId])">
    @isset($prepend)
        <x-slot:prepend :attributes="$prepend->attributes">
            {!! $prepend !!}
        </x-slot:prepend>
    @endisset

    @isset($before)
        <x-slot:before>
            {!! $before !!}
        </x-slot:before>
    @endisset

    @isset($icon)
        <x-slot:icon>
            {!! $icon !!}
        </x-slot:icon>
    @endisset

    @if ($clearable || isset($append))
        <x-slot:append>
            @if ($clearable)
                <span x-data="{
                    colorId: '{{ $colorInputId }}',
                    init() {
                        this.$nextTick(() => {
                            const colorInput = document.getElementById(this.colorId);
                            const hidden = this.$el.querySelector('input[type=hidden]');
                            if (colorInput && hidden) {
                                colorInput.addEventListener('input', () => {
                                    hidden.value = colorInput.value;
                                    hidden.dispatchEvent(new Event('input', { bubbles: true }));
                                });
                            }
                        });
                    }
                }">
                    <input type="hidden" name="{{ $name }}" value="{{ $initialValue }}">
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        data-color-id="{{ $colorInputId }}"
                        data-wire-path="{{ addslashes($wirePath) }}"
                        onclick="(function(btn){
                            var hidden = btn.closest('span').querySelector('input[type=hidden]');
                            var colorInput = document.getElementById(btn.dataset.colorId);
                            if (hidden) { hidden.value = ''; hidden.dispatchEvent(new Event('input', { bubbles: true })); }
                            if (colorInput) colorInput.value = '#cccccc';
                            if (typeof $wire !== 'undefined' && btn.dataset.wirePath) $wire.set(btn.dataset.wirePath, null);
                        })(this)"
                        title="Clear color">
                        <x-icon name="x" />
                    </button>
                </span>
            @endif
            @isset($append)
                {!! $append !!}
            @endisset
        </x-slot:append>
    @endif

    @isset($after)
        <x-slot:after>
            {!! $after !!}
        </x-slot:after>
    @endisset

    @isset($help)
        <x-slot:help>
            {!! $help !!}
        </x-slot:help>
    @endisset

    {!! $slot !!}
</x-form-input>
