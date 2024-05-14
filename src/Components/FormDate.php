<?php

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelFormComponents\Concerns\HandlesDefaultAndOldValue;
use Diviky\LaravelFormComponents\Concerns\HandlesValidationErrors;

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
        bool $floating = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->selector = 'data-'.$selector;
        $this->showErrors = $showErrors;
        $this->type = $type;
        $this->floating = $floating && $type !== 'hidden';

        if (isset($language)) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
