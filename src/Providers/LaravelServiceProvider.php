<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Providers;

use Diviky\LaravelFormComponents\FormDataBinder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Str;

class LaravelServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->bootConsole();
        $this->bootBalde();
        $this->bootViews();
    }

    /**
     * Register the application services.
     */
    #[\Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'laravel-components');

        $this->app->singleton(FormDataBinder::class, fn () => new FormDataBinder);
    }

    protected function bootBalde(): self
    {
        $prefix = config('laravel-components.prefix');
        $framework = config('laravel-components.framework');

        Collection::make(config('laravel-components.components'))->each(
            function (array $component, string $alias) use ($prefix, $framework): void {
                $alias = $component['alias'] ?? $alias;
                if (isset($component['class'])) {
                    Blade::component($alias, $component['class'], $prefix);
                } else {
                    Blade::component((string) Str::replace('{framework}', $framework, $component['view']), $alias, $prefix);
                }
            }
        );

        return $this;
    }

    public function bootViews(): self
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laravel-components');

        return $this;
    }

    public function bootConsole(): self
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('laravel-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../../resources/views' => base_path('resources/views/vendor/laravel-components'),
            ], 'views');
        }

        return $this;
    }
}
