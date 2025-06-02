@props([
    'values' => [],
    'trigger' => '@',
    'type' => 'textarea',
])

<div x-data
    x-init='
        ()=> {
            let tribute = new Tribute({
                trigger: "{{ $trigger }}",
                values: @json($values)
            });
            tribute.attach($refs.source);
        }
    '
    wire:ignore>

    @if ($type == 'input')
        <x-form-input x-ref="source" :attributes="$attributes"></x-form-input>
    @else
        <x-form-textarea x-ref="source" :attributes="$attributes"></x-form-textarea>
    @endif
</div>
