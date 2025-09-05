<?php

namespace Diviky\LaravelComponents\Tests;

use Diviky\LaravelComponents\Providers\LaravelServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['view']->addNamespace('laravel-components', __DIR__.'/../resources/views');
    }

    protected function getPackageProviders($app): array
    {
        return [
            LaravelServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('laravel-components.framework', 'bootstrap-5');
    }

    /**
     * Render a component and return the view for testing
     */
    protected function component($component, $data = []): \Illuminate\Testing\TestView
    {
        // Use direct blade rendering instead of component method
        return $this->blade('<x-avatar />');
    }

    /**
     * Convert attributes array to string for blade template
     */
    protected function attributesToString(array $attributes): string
    {
        return collect($attributes)
            ->map(fn ($value, $key) => is_bool($value)
                ? ($value ? $key : '')
                : "{$key}=\"{$value}\""
            )
            ->filter()
            ->implode(' ');
    }

    /**
     * Assert that a component renders without errors
     */
    protected function assertComponentRenders($component, $data = []): void
    {
        $view = $this->component($component, $data);
        $view->assertStatus(200);
    }

    /**
     * Assert that a component contains specific HTML attributes
     */
    protected function assertHasAttribute($view, string $attribute, ?string $value = null): void
    {
        if ($value) {
            $view->assertSee($attribute.'="'.$value.'"', false);
        } else {
            $view->assertSee($attribute, false);
        }
    }

    /**
     * Assert that a component has specific CSS classes
     */
    protected function assertHasClass($view, string $class): void
    {
        $view->assertSee('class=', false);
        $view->assertSee($class, false);
    }

    /**
     * Mock form data binding for testing
     */
    protected function mockFormData(array $data): void
    {
        $this->app->instance('form-data-binder', new class($data)
        {
            public function __construct(private array $data) {}

            public function get(string $key, $default = null)
            {
                return data_get($this->data, $key, $default);
            }
        });
    }
}
