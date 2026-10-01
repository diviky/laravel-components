@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div {{ $attributes->only(['class'])->class([
    Shadcn::Field => !$inline && $type !== 'hidden',
    'hidden' => $type === 'hidden',
    'relative',
]) }}
    @if ($attributes->has('count')) x-data="{
        charCount: {{ strlen($value ?? '') }},
        maxLength: {{ $attributes->get('count') }},
        updateCount(event) {
            this.charCount = event.target.value.length;
        },
        init() {
            this.updateCharCount();
        },
        updateCharCount() {
            this.$nextTick(() => {
                const input = this.$el.querySelector('input');
                if (input) {
                    this.charCount = input.value.length;
                }
            });
        }
    }"
    x-init="init()" x-effect="updateCharCount()" @endif>

    @if (!$floating && $type !== 'hidden')
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    @php
        $hasInputGroup = isset($prepend) || isset($append) || isset($before) || isset($after) || $attributes->has('count');
        $hasIcon = isset($icon) || $attributes->has('icon');
    @endphp

    <div @class([
        'flex w-full items-stretch' => $hasInputGroup,
        'relative' => $hasIcon || $floating,
    ])>

        @isset($prepend)
            <x-form-input-group-text :attributes="$prepend->attributes->merge(['data-group-position' => 'prepend'])->class(['rounded-e-none border-e-0'])">
                {!! $prepend !!}
            </x-form-input-group-text>
        @endisset

        @isset($before)
            {!! $before !!}
        @endisset

        @if ($hasIcon)
            <span class="text-muted-foreground pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                <x-icon :name="$icon ?? $attributes->get('icon')" class="size-4" />
            </span>
        @endif

        <input {!! $attributes->except(['extra-attributes', 'class', 'icon'])->merge([
                'type' => $type,
                'name' => $inputName(),
                'id' => $id(),
                'placeholder' => $floating ? ' ' : ($attributes->get('placeholder') ?? ''),
                'value' => $value,
            ])->class([
                Shadcn::Input => true,
                Shadcn::InputSm => $size == 'sm',
                Shadcn::InputLg => $size == 'lg',
                'rounded-s-none' => isset($prepend),
                'rounded-e-none' => isset($append) || $attributes->has('count'),
                'ps-9' => $hasIcon,
                'peer pt-4 pb-1' => $floating,
                'placeholder:text-transparent' => $floating,
            ]) !!} {{ $extraAttributes ?? '' }} {{ $wire() }}
            @if ($hasError($inputName())) aria-invalid="true" @endif
            @if ($attributes->has('count')) @input="updateCount($event)" @endif />

        @isset($append)
            <x-form-input-group-text :attributes="$append->attributes->merge(['data-group-position' => 'append'])->class(['rounded-s-none border-s-0'])">
                {!! $append !!}
            </x-form-input-group-text>
        @endisset

        @if ($attributes->has('count'))
            <span class="{{ Shadcn::InputGroupText }} rounded-s-none border-s-0">
                <span class="text-muted-foreground text-xs" x-text="`${charCount}/${maxLength}`"></span>
            </span>
        @endif

        @isset($after)
            {!! $after !!}
        @endisset

        @if ($floating)
            <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()"
                class="text-muted-foreground pointer-events-none absolute start-3 top-2 z-10 origin-[0] -translate-y-0 scale-100 text-xs transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:-translate-y-0 peer-focus:text-xs" />
        @endif
    </div>

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" :input-id="$id()" />
</div>
