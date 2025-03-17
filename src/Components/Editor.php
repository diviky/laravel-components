<?php

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class Editor extends Component
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
        public array $config = [],
        public ?string $uploadUrl = '',
        public ?string $prefix = '',
        public ?string $disk = '',
        public ?string $folder = 'assets',
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
}
