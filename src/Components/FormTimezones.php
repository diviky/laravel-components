<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Support\Timezone;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormTimezones extends FormChoices
{
    public function __construct(
        string $name = '',
        string $label = '',
        mixed $bind = null,
        string $bindKey = '',
        mixed $default = null,
        bool $multiple = false,
        bool $showErrors = true,
        bool $floating = false,
        bool $inline = false,
        string $placeholder = '',
        string $size = '',
        ?string $disabledField = null,
        string|HtmlString|array|Collection|null $extraAttributes = null,
        bool $compact = false,
        ?string $compactText = 'selected',
        public array|string|bool|null $only = null,
        mixed $enabled = true,
    ) {
        parent::__construct(
            name: $name,
            label: $label,
            options: Timezone::mapped($only),
            bind: $bind,
            bindKey: $bindKey,
            default: $default,
            multiple: $multiple,
            showErrors: $showErrors,
            floating: $floating,
            inline: $inline,
            placeholder: $placeholder !== '' ? $placeholder : 'Select timezone',
            size: $size,
            valueField: 'id',
            labelField: 'name',
            disabledField: $disabledField,
            childrenField: 'children',
            extraAttributes: $extraAttributes,
            searchable: true,
            compact: $compact,
            compactText: $compactText,
            minChars: 1,
            height: 'max-h-72',
            enabled: $enabled,
        );
    }
}
