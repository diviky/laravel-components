<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Authorize;

class Show extends Component
{
    use Authorize;

    public function __construct(
        public bool $enabled = true,
        public null|string|bool $can = null,
        public ?string $action = null,
    ) {}

    #[\Override]
    public function shouldRender(): bool
    {
        return $this->enabled && $this->isAuthorized() && $this->isCan() && $this->hasRole();
    }
}
