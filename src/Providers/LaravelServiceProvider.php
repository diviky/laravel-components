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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('laravel-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../../resources/views' => base_path('resources/views/vendor/laravel-components'),
            ], 'views');
        }

        $this->bootSupportMacros();
        $this->bootBalde();

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laravel-components');
    }

    protected function bootBalde(): self
    {
        $prefix = config('laravel-components.prefix');
        $framework = config('laravel-components.framework');

        Collection::make(config('laravel-components.components'))->each(
            function (array $component, string $alias) use ($prefix, $framework): void {
                if (isset($component['class'])) {
                    Blade::component($alias, $component['class'], $prefix);
                } else {
                    Blade::component((string) Str::replace('{framework}', $framework, $component['view']), $alias, $prefix);
                }
            }
        );

        Blade::anonymousComponentPath(__DIR__.'/../../resources/views/components/'.$framework, $prefix.'theme');

        return $this;
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'laravel-components');

        $this->app->singleton(FormDataBinder::class, fn () => new FormDataBinder());
    }

    protected function bootSupportMacros(): self
    {
        if (! Str::hasMacro('shortNumber')) {
            Str::macro('shortNumber', function (int $number, int $decimals = 1) {
                if ($number < 1_000) {
                    $format = number_format($number, $decimals);
                    $suffix = '';
                } elseif ($number < 1_000_000) {
                    $format = number_format(floor($number / 100) / 10, $decimals);
                    $suffix = 'K';
                } elseif ($number < 1_000_000_000) {
                    $format = number_format(floor($number / 100000) / 10, $decimals);
                    $suffix = 'M';
                } else {
                    return '🤯';
                }

                if ($decimals > 0) {
                    $dotzero = '.'.str_repeat('0', $decimals);
                    $format = str_replace($dotzero, '', $format);
                }

                return $format.$suffix;
            });
        }

        return $this;
    }
}
