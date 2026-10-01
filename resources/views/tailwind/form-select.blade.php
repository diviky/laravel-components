@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div {{ $attributes->only(['class'])->class([
    Shadcn::Field => !$inline,
]) }}>
    @if (!$floating)
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    <div @class([
        'flex w-full items-stretch' => isset($prepend) || isset($append),
        'relative' => $floating || isset($icon),
    ])>

        @isset($prepend)
            <x-form-input-group-text :attributes="$prepend->attributes->merge(['data-group-position' => 'prepend'])->class(['rounded-e-none border-e-0'])">
                {!! $prepend !!}
            </x-form-input-group-text>
        @endisset

        @isset($icon)
            <span class="text-muted-foreground pointer-events-none absolute inset-y-0 start-0 z-10 flex items-center ps-3">
                <x-icon :name="$icon" class="size-4" />
            </span>
        @endisset

        <select {{ $wire() }} @if ($multiple) multiple @endif {{ $extraAttributes ?? '' }}
            {!! $attributes->except(['extra-attributes', 'class'])->merge([
                    'id' => $id(),
                    'placeholder' => $placeholder,
                    'value-field' => $valueField,
                    'label-field' => $labelField,
                    'name' => $inputName(),
                    'data-selected' => $values,
                ])->class([
                    Shadcn::Select => true,
                    Shadcn::InputSm => $size == 'sm',
                    Shadcn::InputLg => $size == 'lg',
                    'rounded-s-none' => isset($prepend),
                    'rounded-e-none' => isset($append),
                    'ps-9' => isset($icon),
                    'peer pt-4 pb-1' => $floating,
                ]) !!}
            @if ($hasError($inputName())) aria-invalid="true" @endif
            @if ($plugin && $attributes->whereStartsWith('data-select')->isEmpty()) data-select @endif>

            {{ $before ?? '' }}

            @if ($placeholder)
                <option value="" @if ($nothingSelected()) selected="selected" @endif>
                    {{ $placeholder }}
                </option>
            @endif

            {!! $slot !!}

            @foreach ($options as $option)
                @if ($optionIsOptGroup($option))
                    <optgroup label="{{ $optionLabel($option) }}">
                        @foreach ($optionChildren($option) as $child)
                            <option value="{{ $optionValue($child) }}" @selected($isSelected($optionValue($child)))
                                @disabled($optionIsDisabled($child))>
                                {{ $optionLabel($child) }}
                            </option>
                        @endforeach
                    </optgroup>
                @else
                    <option value="{{ $optionValue($option) }}" @selected($isSelected($optionValue($option)))
                        @disabled($optionIsDisabled($option))>
                        {{ $optionLabel($option) }}
                    </option>
                @endif
            @endforeach

            {{ $after ?? '' }}
        </select>

        @isset($append)
            <x-form-input-group-text :attributes="$append->attributes->merge(['data-group-position' => 'append'])->class(['rounded-s-none border-s-0'])">
                {!! $append !!}
            </x-form-input-group-text>
        @endisset

        @if ($floating)
            <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()"
                class="text-muted-foreground pointer-events-none absolute start-3 top-2 z-10 text-xs transition-all peer-focus:top-2 peer-focus:text-xs" />
        @endif
    </div>

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" :input-id="$id()" />
</div>
