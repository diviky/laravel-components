<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

class Container extends Component
{
    protected $enabled = true;

    public function __construct(bool $enabled = true)
    {
        $this->enabled = $enabled;
    }

    #[\Override]
    public function shouldRender()
    {
        return $this->enabled;
    }
}
