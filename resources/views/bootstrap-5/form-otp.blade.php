@props([
    'extraAttributes' => [],
    'length' => 6,
])

<div class="form-group">
    <x-form-label :label="$label" :required="$attributes->has('required')" :title="$attributes->get('title')" :for="$attributes->get('id') ?: $id()" />
    <div class="row g-2 pt-2">
        @for ($i = 0; $i < $length; $i++)
            <div class="col">
                <input type="text" {{ $attributes }} class="form-control form-control-lg text-center py-3"
                    maxlength="1" inputmode="numeric" name="{{ $name }}[]" pattern="[0-9]*" data-code-input="">
            </div>
        @endfor
    </div>
</div>
