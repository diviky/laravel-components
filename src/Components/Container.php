<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Container extends Component
{
    protected mixed $enabled = true;

    public function __construct(mixed $enabled = true)
    {
        $this->enabled = $enabled;
    }

    #[\Override]
    public function shouldRender()
    {
        return $this->enabled;
    }
}
