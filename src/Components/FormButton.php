<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class FormButton extends Component
{
    public string $outline = '';

    public function __construct(
        bool $outline = false,
        public bool $ghost = false,
        public bool $disabled = false,
        public mixed $enabled = true,
    ) {
        $this->outline = $outline ? 'outline-' : ($ghost ? 'ghost-' : '');
    }
}
