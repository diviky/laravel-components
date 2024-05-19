<x-form-input :attributes="$attributes->merge(['type' => 'text'])">
    @slot('icon')
        <i class="fe fe-search"></i>
    @endslot
    {!! $slot !!}
</x-form-input>
