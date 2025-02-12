<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Carbon\Carbon;
use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\FormInput;

class FormTime extends FormInput
{
    use Renderer;

    public function restrictions(): array
    {
        return array_filter([
            'disabledTimeIntervals' => [],
            'disabledHours' => [],
            'enabledHours' => [],
        ]);
    }

    public function defaultDate(): string
    {
        return ($this->default) ? Carbon::parse($this->default)->format('h:mm A') : '';
    }
}
