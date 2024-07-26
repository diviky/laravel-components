<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Popover extends Component
{
    public function __construct(
        public ?string $position = 'bottom',
        public ?string $offset = '10',

        // Slots
        public mixed $trigger = null,
        public mixed $content = null
    ) {}
}
