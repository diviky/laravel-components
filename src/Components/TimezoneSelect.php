<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Support\Timezone;
use Diviky\LaravelFormComponents\Components\FormSelect;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class TimezoneSelect extends FormSelect
{
    public function __construct(
        string $name,
        string $label = '',
        $options = [],
        $bind = null,
        $default = null,
        bool $multiple = false,
        bool $showErrors = true,
        bool $manyRelation = false,
        bool $floating = false,
        string $placeholder = '',
        public ?string $valueField = null,
        public ?string $labelField = null,
        public ?string $disabledField = null,
        public ?string $childrenField = null,

        // Extra Attributes
        // HtmlString|array|string|Collection|null $extraAttributes = null,

        // Timezone specific
        array|string|bool|null $only = null,
    ) {
        parent::__construct(
            name: $name,
            label: $label,
            options: $options,
            bind: $bind,
            default: $default,
            multiple: $multiple,
            showErrors: $showErrors,
            manyRelation: $manyRelation,
            floating: $floating,
            placeholder: $placeholder,
            valueField: $valueField,
            labelField: $labelField,
            disabledField: $disabledField,
            childrenField: $childrenField,
            //extraAttributes: $extraAttributes,
        );

        $this->only = $only ?? false;

        $this->options = []; // (new Timezone())->only($this->only)->allMapped();
    }
}
