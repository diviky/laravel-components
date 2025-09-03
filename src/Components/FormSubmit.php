<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class FormSubmit extends Component
{
    public string $outline = '';

    public function __construct(
        bool $outline = false,
        public bool $ghost = false,
        public bool $disabled = false,
        public bool $loading = false,
        public bool $full = false,
        public bool $primary = false,
        public bool $success = false,
        public bool $warning = false,
        public bool $danger = false,
        public bool $info = false,
        public bool $light = false,
        public bool $dark = false,
        public bool $cancel = false,
        public bool $square = false,
        public bool $pill = false,
        public bool $bold = false,
        public ?string $color = null,
        public ?string $size = null,
        public ?string $variant = null,
        public ?string $icon = null,
    ) {
        $this->outline = $outline ? 'outline-' : ($ghost ? 'ghost-' : '');
    }
}
