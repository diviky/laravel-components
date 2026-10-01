<div {{ $attributes->only(['class'])->class([
    'form-group',
    'position-relative',
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
    @if ($floating)
        <div class="form-floating">
    @endif

    @if (!$floating)
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    @isset($before)
        {!! $before !!}
    @endisset
    <div class="position-relative">
        <textarea {!! $attributes->except(['extra-attributes', 'class'])->merge([
                'name' => $inputName(),
                'id' => $id(),
                'placeholder' => '',
            ])->class([
                'form-control' => true,
                'form-control-color' => $type === 'color',
                'form-control-sm' => $size == 'sm',
                'form-control-lg' => $size == 'lg',
                'is-invalid' => $hasError($inputName()),
            ]) !!} {{ $wire() }} {{ $extraAttributes ?? '' }}
            @input="resize()@if ($attributes->has('count')); updateCount($event)@endif">{!! $value !!}</textarea>

        @if ($attributes->has('count'))
            <div class="form-text text-muted text-sm position-absolute top-0 end-0 pr-2"
                x-text="`${charCount}/${maxLength}`">
            </div>
        @endif
    </div>

    @isset($after)
        {!! $after !!}
    @endisset

    @if ($floating)
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    @if ($floating)
</div>
@endif

<x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
<x-form-errors :name="$inputName()" />
</div>
