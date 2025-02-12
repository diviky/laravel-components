<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FilterSearch extends Component
{
    public string $label;

    public string $type;

    public bool $floating;

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
        string $type = 'text',
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true,
        bool $floating = false,
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->showErrors = $showErrors;
        $this->floating = $floating && $type !== 'hidden';
        $this->setExtraAttributes($extraAttributes);

        if (isset($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
