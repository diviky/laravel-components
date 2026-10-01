@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div {{ $attributes->only(['class'])->class([
    Shadcn::Field,
    'relative',
]) }}
    x-data="{
        @if ($attributes->has('count'))
            charCount: {{ strlen($value ?? '') }},
            maxLength: {{ $attributes->get('count') }},
            updateCount(event) {
                this.charCount = event.target.value.length;
            },
            updateCharCount() {
                this.$nextTick(() => {
                    const textarea = this.$el.querySelector('textarea');
                    if (textarea) {
                        this.charCount = textarea.value.length;
                    }
                });
            },
        @endif
        resize() {
            this.$nextTick(() => {
                const textarea = this.$el.querySelector('textarea');
                if (!textarea) {
                    return;
                }
                textarea.style.height = 'auto';
                textarea.style.height = `${textarea.scrollHeight}px`;
            });
        },
        init() {
            this.resize();
            @if ($attributes->has('count'))
                this.updateCharCount();
            @endif
        }
    }"
    x-init="init()"
    @if ($attributes->has('count')) x-effect="updateCharCount()" @endif>

    @if (!$floating)
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    @isset($before)
        {!! $before !!}
    @endisset

    <div class="relative">
        <textarea {!! $attributes->except(['extra-attributes', 'class'])->merge([
                'name' => $inputName(),
                'id' => $id(),
                'placeholder' => $floating ? ' ' : ($attributes->get('placeholder') ?? ''),
            ])->class([
                Shadcn::Textarea => true,
                Shadcn::InputSm => $size == 'sm',
                Shadcn::InputLg => $size == 'lg',
                'peer pt-6' => $floating,
                'placeholder:text-transparent' => $floating,
            ]) !!} {{ $wire() }} {{ $extraAttributes ?? '' }}
            @if ($hasError($inputName())) aria-invalid="true" @endif
            @input="resize()@if ($attributes->has('count')); updateCount($event)@endif">{!! $value !!}</textarea>

        @if ($attributes->has('count'))
            <div class="text-muted-foreground pointer-events-none absolute end-2 top-2 text-xs"
                x-text="`${charCount}/${maxLength}`">
            </div>
        @endif

        @if ($floating)
            <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()"
                class="text-muted-foreground pointer-events-none absolute start-3 top-2 z-10 text-xs transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-sm peer-focus:top-2 peer-focus:text-xs" />
        @endif
    </div>

    @isset($after)
        {!! $after !!}
    @endisset

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" :input-id="$id()" />
</div>
