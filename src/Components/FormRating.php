<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormRating extends Component
{
    public string $label;

    public ?string $value;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $value
     */
    public function __construct(
        string $name = '',
        ?string $value = '',
        string $label = '',
        public string $size = '',
        public string $icon = '',
        public ?string $language = null,
        mixed $bind = null,
        mixed $default = null,
        public int $rating = 5,
        public bool $half = false,
        public ?array $settings = [],
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {

        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->rating = isset($settings['rating']) ? intval($settings['rating']) : $rating;
        $this->icon = $settings['icon'] ?? $icon;
        $this->size = $settings['size'] ?? $size;
        $this->half = isset($settings['half']) ? (bool) $settings['half'] : $half;

        $this->setExtraAttributes($extraAttributes);

        if (! is_null($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
