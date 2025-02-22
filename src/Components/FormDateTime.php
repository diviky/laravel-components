<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Carbon\Carbon;

class FormDateTime extends FormDate
{
    protected string $format = 'F d Y h:m A';

    #[\Override]
    protected function config(): array
    {
        return [
            'display' => [
                'sideBySide' => false,
                'viewMode' => 'calendar',
                'icons' => [
                    'time' => 'ti ti-clock',
                    'date' => 'ti ti-calendar-month',
                    'up' => 'ti ti-arrow-up',
                    'down' => 'ti ti-arrow-down',
                    'previous' => 'ti ti-chevron-left',
                    'next' => 'ti ti-chevron-right',
                    'today' => 'ti ti-calendar',
                    'clear' => 'ti ti-x',
                    'close' => 'ti ti-square-x',
                ],
            ],
            'promptTimeOnDateChange' => true,
            'localization' => [
                'format' => 'MMMM d yyyy h:mm T',
            ],
        ];
    }

    public function defaultDate(): string
    {
        $value = $this->value ? $this->value : $this->default;

        return ($value) ? Carbon::parse($value)->format('F d Y') : '';
    }

    public function defaultTime(): string
    {
        $value = $this->value ? $this->value : $this->default;

        return ($value) ? Carbon::parse($value)->format('h:m A') : '';
    }
}
