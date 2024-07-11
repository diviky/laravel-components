<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'file', 'data-filepond' => 'true', 'accept' => $accept])"> {!! $slot !!} </x-form-input>
