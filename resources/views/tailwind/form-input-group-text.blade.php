@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<span {!! $attributes->class([
    Shadcn::InputGroupText => $text,
    'rounded-md' => $text && !$attributes->has('data-group-position'),
]) !!}>{!! $slot !!}</span>
