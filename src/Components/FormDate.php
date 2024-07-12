<?php

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelFormComponents\Concerns\HandlesDefaultAndOldValue;
use Diviky\LaravelFormComponents\Concerns\HandlesValidationErrors;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormDate extends Component
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public string $name;

    public string $label;

    public string $type;

    public string $selector;

    public bool $floating;

    public ?string $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        string $type = 'text',
        string $selector = 'datepicker',
        mixed $bind = null,
        ?string $default = null,
        ?string $language = null,
        bool $showErrors = true,
        bool $floating = false,
        ?string $value = '',
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->selector = 'data-'.$selector;
        $this->showErrors = $showErrors;
        $this->type = $type;
        $this->floating = $floating && $type !== 'hidden';
        $this->value = $value;
        $this->setExtraAttributes($extraAttributes);

        if (isset($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
