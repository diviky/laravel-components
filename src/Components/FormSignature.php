<?php

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormSignature extends Component
{
    public mixed $value;

    public function __construct(
        string $name = '',
        public string $label = '',
        public ?string $icon = '',
        mixed $bind = null,
        mixed $default = null,
        public ?string $language = null,
        bool $showErrors = true,
        public bool $floating = false,
        string|HtmlString|array|Collection|null $extraAttributes = null,
        public ?string $height = '250',
        public ?array $config = [],
        public ?string $clearText = 'Clear',
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->showErrors = $showErrors;
        $this->floating = $floating;

        if (! is_null($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
        $this->setExtraAttributes($extraAttributes);
    }

    public function setup(): string
    {
        $config = Arr::wrap($this->config);

        return (string) json_encode(array_merge([
            'penColor' => 'var(--tblr-body-color)',
        ], $config));
    }
}
