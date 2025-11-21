<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\FormSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class FormChoices extends FormSelect
{
    use Renderer;

    public string $uuid;

    public function __construct(
        string $name = '',
        string $label = '',
        public array|Collection|null $options = [],
        mixed $bind = null,
        string $bindKey = '',
        mixed $default = null,
        bool $multiple = false,
        bool $showErrors = true,
        bool $floating = false,
        public bool $inline = false,
        string $placeholder = '',
        public string $size = '',
        public ?string $valueField = null,
        public ?string $labelField = null,
        public ?string $imageField = null,
        public ?string $disabledField = null,
        public ?string $childrenField = null,
        string|HtmlString|array|Collection|null $extraAttributes = null,
        public bool $searchable = true,
        public bool $compact = false,
        public ?string $compactText = 'selected',
        public ?int $minChars = 2,
        public ?string $height = 'max-h-64',
        public ?string $allowAllText = 'Select all',
        public ?string $removeAllText = 'Remove all',
        public ?string $noResultText = 'No results found.',

        public ?string $debounce = '100ms',
        public ?string $searchFunction = null,

        // slots
        public mixed $item = null,
        public mixed $selection = null,
        public mixed $enabled = true,
    ) {

        $this->uuid = (string) Str::uuid();

        if (isset($searchFunction)) {
            $this->searchable = true;
        }

        parent::__construct(
            name: $name,
            label: $label,
            options: $options,
            bind: $bind,
            bindKey: $bindKey,
            default: $default,
            multiple: $multiple,
            showErrors: $showErrors,
            floating: $floating,
            inline: $inline,
            placeholder: $placeholder,
            size: $size,
            valueField: $valueField,
            labelField: $labelField,
            disabledField: $disabledField,
            childrenField: $childrenField,
            extraAttributes: $extraAttributes,
        );
    }
}
