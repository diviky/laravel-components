<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Carbon\Carbon;
use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\FormInput;

class FormDate extends FormInput
{
    use Renderer;

    protected string $format = 'F d Y';

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

                $minDate = $this->parse($minDate);
                $maxDate = $this->parse($maxDate);
            }
        }

        return array_filter([
            'minDate' => $minDate ? $minDate->format($this->format) : '',
            'maxDate' => $maxDate ? $maxDate->format($this->format) : '',
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

    protected function config(): array
    {
        return [];
    }

    public function setup(): string
    {
        $settings = $this->settings;
        $stepping = isset($settings['stepping']) && $settings['stepping'] > 0 ? intval($settings['stepping']) : 1;

        $setup = [
            'keepInvalid' => true,
            'multipleDates' => false,
            'stepping' => $stepping,
            'multipleDatesSeparator' => ' - ',
            'promptTimeOnDateChange' => false,
            'promptTimeOnDateChangeTransitionDelay' => 200,
            'dateRange' => false,
            'display' => [
                'sideBySide' => false,
                'viewMode' => 'calendar',
                'components' => [
                    'calendar' => true,
                    'date' => true,
                    'month' => true,
                    'year' => true,
                    'decades' => true,
                    'clock' => false,
                    'hours' => false,
                    'minutes' => false,
                    'seconds' => false,
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
                'format' => 'MMMM d yyyy',
            ],
        ];

        if ($this->defaultValue()) {
            $setup['defaultDate'] = $this->defaultValue();
        }

        $setup['restrictions'] = array_merge($setup['restrictions'], $this->restrictions());

        $setup = array_merge($setup, $this->config());

        return str((string) json_encode($setup))
            // ->trim('{}')
            ->replace('"', "'")
            ->replace("'undefined'", 'undefined')
            ->toString();
    }

    public function defaultValue(): ?string
    {
        $value = $this->value ? $this->value : $this->default;

        try {
            return ($value) ? $this->parse($value)?->format($this->format) : '';

        } catch (\Exception $e) {
            return '';
        }
    }

    protected function parse(string $value): ?Carbon
    {
        try {
            return carbon($value);
        } catch (\Exception $e) {
            return null;
        }
    }
}
