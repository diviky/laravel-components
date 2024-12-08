@props([
    'enabled' => true,
])

<x-container :enabled="$enabled">
    <div {!! $attributes->merge(['class' => 'card-footer']) !!}>
        {!! $slot !!}
    </div>
</x-container>
