@props([
    'extraAttributes' => [],
    'name' => null,
    'stacked' => true,
])

@if ($stacked)
    <x-form-date :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['selector' => 'data-datetime'])"></x-form-date>
@else
    <div class="row">
        <div class="col">
            <x-form-date name="{{ $name }}_date" :extra-attributes="$extraAttributes" :attributes="$attributes"></x-form-date>
        </div>
        <div class="col-4">
            <x-form-time name="{{ $name }}_time" :extra-attributes="$extraAttributes" :attributes="$attributes"></x-form-time>
        </div>
    </div>
@endif
