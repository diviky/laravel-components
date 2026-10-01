@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

@if (!$slot->isEmpty())
    <p class="{{ Shadcn::Help }}">
        {!! $slot !!}
    </p>
@endif
