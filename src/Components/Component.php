<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Components;

use Diviky\LaravelFormComponents\Components\Component as BaseComponent;
use Illuminate\Support\Str;

abstract class Component extends BaseComponent
{
    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $alias = Str::kebab(class_basename($this));

        $config = config("laravel-components.components.{$alias}");

        $framework = config('laravel-components.framework');

        return (string) Str::replace('{framework}', $framework, $config['view']);
    }
}
