<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormDropzone extends Component
{
    public string $label;

    /**
     * Create a new component instance.
     *
     * @param  null|mixed  $bind
     * @param  null|mixed  $default
     * @param  null|mixed  $language
     */
    public function __construct(
        string $name,
        string $label = '',
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true,
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->showErrors = $showErrors;
        $this->setExtraAttributes($extraAttributes);

        if (isset($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
