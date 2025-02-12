<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormImage extends Component
{
    public string $label;

    public mixed $value;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name = '',
        mixed $value = '',
        string $label = '',
        public ?string $language = null,
        mixed $bind = null,
        mixed $default = null,
        public ?bool $hideProgress = false,
        public ?bool $cropAfterChange = false,
        public ?string $changeText = 'Change',
        public ?string $cropTitleText = 'Crop image',
        public ?string $cropCancelText = 'Cancel',
        public ?string $cropSaveText = 'Crop',
        public array $cropConfig = [],
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {

        $this->name = $name;
        $this->value = $value;
        $this->label = $label;

        if (! is_null($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
        $this->setExtraAttributes($extraAttributes);
    }

    public function cropSetup(): string
    {
        return (string) json_encode(array_merge([
            'autoCropArea' => 1,
            'viewMode' => 1,
            'dragMode' => 'move',
        ], $this->cropConfig));
    }
}
