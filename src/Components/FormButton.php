<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class FormButton extends Component
{
    public string $outline = '';

    public function __construct(
        bool $outline = false,
        public bool $ghost = false,
    ) {
        $this->outline = $outline ? 'outline-' : ($ghost ? 'ghost-' : '');
    }
}
