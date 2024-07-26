<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelComponents\Concerns\Renderer;
use Diviky\LaravelFormComponents\Components\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    use Renderer;
}
