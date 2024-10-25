<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class FilterDates extends Component
{
    public string $name;

    public string $value;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $value
     * @param  null|mixed  $bind
     */
    public function __construct(
        string $name = 'time',
        string $value = ''
    ) {
        $this->name = $name;
        $this->value = $value;
    }
}
