<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelFormComponents\Concerns\HandlesBoundValues;
use Diviky\LaravelFormComponents\Concerns\HandlesValidationErrors;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class FormSelectGroup extends Component
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public string $name;

    public string $label;

    public string $type;

    public mixed $options;

    public mixed $selectedKey;

    public bool $multiple;

    public string $placeholder;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  null|mixed  $bind
     * @param  null|mixed  $default
     */
    public function __construct(
        string $name = '',
        string $label = '',
        $options = [],
        $bind = null,
        $default = null,
        bool $multiple = false,
        bool $showErrors = true,
        string $placeholder = '',
        HtmlString|array|string|Collection|null $extraAttributes = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->setExtraAttributes($extraAttributes);

        if ($this->isNotWired()) {
            $inputName = static::convertBracketsToDots(Str::before($name, '[]'));

            if (is_null($default)) {
                $default = $this->getBoundValue($bind, $inputName);
            }

            $this->selectedKey = old($inputName, $default);

            if ($this->selectedKey instanceof Arrayable) {
                $this->selectedKey = $this->selectedKey->toArray();
            }
        }

        $this->type = $multiple ? 'checkbox' : 'radio';
        $this->multiple = $multiple;
        $this->showErrors = $showErrors;
    }

    public function isSelected(string $key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        return in_array($key, Arr::wrap($this->selectedKey));
    }

    public function nothingSelected(): bool
    {
        if ($this->isWired()) {
            return false;
        }

        return is_array($this->selectedKey) ? empty($this->selectedKey) : is_null($this->selectedKey);
    }
}
