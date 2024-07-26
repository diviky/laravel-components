<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Concerns;

use Illuminate\Support\Str;

trait Renderer
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
