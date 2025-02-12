<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Carbon\Carbon;
use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\FormInput;

class FormDate extends FormInput
{
    use Renderer;

    public function restrictions(): array
    {
        $settings = $this->settings;

        $minDate = '';
        $maxDate = '';

        if (isset($settings['allowed'])) {
            if ($settings['allowed'] == 'future') {
                $minDate = now();
                if (! empty($settings['buffer'])) {
                    $minDate->addDays(intval($settings['buffer']));
                }

                if (isset($settings['future']) && $settings['future'] == 'rolling' && ! empty($settings['rolling'])) {
                    $maxDate = now()->addDays(intval($settings['rolling']));
                }
            }

            if ($settings['allowed'] == 'past') {
                $maxDate = now();

                if (! empty($settings['buffer'])) {
                    $maxDate->addDays(intval($settings['buffer']));
                }

                if (isset($settings['past']) && $settings['past'] == 'rolling' && ! empty($settings['rolling'])) {
                    $minDate = $maxDate->subDays(intval($settings['rolling']));
                }
            }

            if ($settings['allowed'] == 'specific' && ! empty($settings['range'])) {
                [$minDate, $maxDate] = explode('-', $settings['range']);

                $minDate = Carbon::parse($minDate);
                $maxDate = Carbon::parse($maxDate);
            }
        }

        return array_filter([
            'minDate' => $minDate ? $minDate->format('F d Y') : '',
            'maxDate' => $maxDate ? $maxDate->format('F d Y') : '',
            'disabledDates' => [],
            'enabledDates' => [],
            'daysOfWeekDisabled' => when(isset($settings['weekdays']) && $settings['weekdays'], function () {
                return [0, 6];
            }),
            'disabledTimeIntervals' => [],
            'disabledHours' => [],
            'enabledHours' => [],
        ]);
    }

    public function defaultDate(): string
    {
        return ($this->default) ? Carbon::parse($this->default)->format('F d Y') : '';
    }
}
