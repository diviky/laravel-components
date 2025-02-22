<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Carbon\Carbon;
use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\FormInput;

class FormTime extends FormInput
{
    use Renderer;

    protected string $format = 'h:m A';

    public function restrictions(): array
    {
        return array_filter([
            'disabledTimeIntervals' => [],
            'disabledHours' => [],
            'enabledHours' => [],
        ]);
    }

    public function setup(): string
    {
        $settings = $this->settings;

        $stepping = isset($settings['stepping']) && $settings['stepping'] > 0 ? intval($settings['stepping']) : 1;

        $setup = array_merge([
            'keepInvalid' => true,
            'stepping' => $stepping,
            'display' => [
                'sideBySide' => false,
                'viewMode' => 'clock',
                'components' => [
                    'calendar' => false,
                    'date' => false,
                    'month' => false,
                    'year' => false,
                    'decades' => false,
                ],
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
            'restrictions' => [
                'minDate' => 'undefined',
                'maxDate' => 'undefined',
                'disabledDates' => [],
                'enabledDates' => [],
                'daysOfWeekDisabled' => [],
                'disabledTimeIntervals' => [],
                'disabledHours' => [],
                'enabledHours' => [],
            ],
            'localization' => [
                'format' => 'h:mm T',
            ],
        ]);

        if ($this->defaultValue()) {
            $setup['defaultDate'] = $this->defaultValue();
        }

        $setup['restrictions'] = array_merge($setup['restrictions'], $this->restrictions());

        return str((string) json_encode($setup))
            ->trim('{}')
            ->replace('"', "'")
            ->replace("'undefined'", 'undefined')
            ->toString();
    }

    public function defaultValue(): string
    {
        $value = $this->value ? $this->value : $this->default;

        return ($value) ? Carbon::parse($value)->format($this->format) : '';
    }
}
