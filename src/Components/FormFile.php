<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class FormFile extends Component
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public string $name;

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
        bool $showErrors = true
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->showErrors = $showErrors;

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
