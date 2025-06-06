<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class FormSelectItem extends Component
{
    public string $label;

    /**
     * @var mixed
     */
    public $value;

    public bool $checked = false;

    /**
     * @param  mixed  $value
     * @param  mixed  $bind
     */
    public function __construct(
        string $name = '',
        string $label = '',
        $value = 1,
        $bind = null,
        string $bindKey = '',
        ?bool $default = false,
        bool $showErrors = false,
        public string $type = 'radio',
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->showErrors = $showErrors;
        $this->setExtraAttributes($extraAttributes);

        $inputName = static::convertBracketsToDots($name);

        if (old($inputName)) {
            $this->checked = old($inputName) == $value;
        }

        if (!session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $inputName, $bindKey);

            if (!is_null($boundValue)) {
                $this->checked = $boundValue == $this->value;
            } else {
                $this->checked = $default ?? false;
            }
        }
    }

    /**
     * Generates an ID by the name and value attributes.
     */
    #[\Override]
    protected function generateIdByName(): string
    {
        return 'auto_id_' . $this->name . '_' . $this->value;
    }
}
