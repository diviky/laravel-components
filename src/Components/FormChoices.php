<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\FormSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormChoices extends FormSelect
{
    use Renderer;

    public function __construct(
        string $name,
        string $label = '',
        public array|Collection|null $options = [],
        mixed $bind = null,
        mixed $default = null,
        bool $multiple = false,
        bool $showErrors = true,
        bool $floating = false,
        string $placeholder = '',
        public ?string $valueField = null,
        public ?string $labelField = null,
        public ?string $disabledField = null,
        public ?string $childrenField = null,
        string|HtmlString|array|Collection|null $extraAttributes = null,
        public ?bool $searchable = false,
        public ?bool $compact = false,
        public ?bool $allowAll = false,
        public ?string $compactText = 'selected',
        public ?int $minChars = 0,
        public ?string $allowAllText = 'Select all',
        public ?string $removeAllText = 'Remove all',
        public ?string $noResultText = 'No results found.',
    ) {

        parent::__construct(
            $name,
            $label,
            $options,
            $bind,
            $default,
            $multiple,
            $showErrors,
            $floating,
            $placeholder,
            $valueField,
            $labelField,
            $disabledField,
            $childrenField,
            $extraAttributes,
        );
    }

    public function isReadonly(): bool
    {
        return $this->attributes->has('readonly') && $this->attributes->get('readonly') == true;
    }

    public function isRequired(): bool
    {
        return $this->attributes->has('required') && $this->attributes->get('required') == true;
    }

    public function isDisabled(): bool
    {
        return $this->attributes->has('disabled') && $this->attributes->get('disabled') == true;
    }
}
