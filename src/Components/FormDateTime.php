<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Carbon\Carbon;

class FormDateTime extends FormDate
{
    public function defaultDate(): string
    {
        return ($this->default) ? Carbon::parse($this->default)->format('F d Y h:mm A') : '';
    }
}
