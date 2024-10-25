@props([
    'values' => [],
    'limit' => 10,
])

@foreach ($values as $value)
    <x-view.tag :value="$value" :attributes="$attributes->except('values')" />

    @if ($loop->index >= $limit)
        + {{ $loop->remaining }}
    @break
@endif
@endforeach
