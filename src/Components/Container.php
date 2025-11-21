<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Container extends Component
{
    public function __construct(public mixed $enabled = true)
    {
        $this->enabled = $enabled;
    }

    #[\Override]
    public function shouldRender()
    {
        return $this->enabled;
    }
}
