@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

@if ($label)
    <label {!! $attributes->merge(['class' => Shadcn::Label])->class(['peer-disabled:cursor-not-allowed peer-disabled:opacity-70' => $attributes->has('for')]) !!}
        @if ($attributes->has('for')) for="{{ $attributes->get('for') }}" @endif>
        <span
            @if ($attributes->has('title')) class="underline decoration-dotted underline-offset-2 cursor-help" title="{{ $attributes->get('title') }}" @endif>
            {{ $label }}

            @if ($required)
                <span class="text-muted-foreground font-normal">(required)</span>
            @else
                <span class="text-muted-foreground font-normal">(optional)</span>
            @endif
        </span>

        @if ($hint)
            <span class="text-muted-foreground inline-flex cursor-help align-middle ms-1" title="{!! $hint !!}">
                <x-icon name="help" class="size-3.5" />
            </span>
        @endif

        @isset($description)
            <div class="{{ Shadcn::LabelDescription }}">{!! $description !!}</div>
        @endisset
    </label>
@endif
