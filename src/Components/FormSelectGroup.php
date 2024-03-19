<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelFormComponents\Concerns\HandlesValidationErrors;

class FormSelectGroup extends Component
{
    use HandlesValidationErrors;

    public string $name;

    public string $label;

    public bool $inline = false;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name = '', string $label = '', bool $inline = false, bool $showErrors = true)
    {
        $this->name = $name;
        $this->label = $label;
        $this->inline = $inline;
        $this->showErrors = $name && $showErrors;
    }
}
