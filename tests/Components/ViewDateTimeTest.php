<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Carbon\Carbon;
use Diviky\LaravelComponents\Tests\TestCase;

class ViewDateTimeTest extends TestCase
{
    /** @test */
    public function it_renders_basic_datetime()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertSee('2024-01-15 14:30:00');
        $view->assertSee('view-datetime');
    }

    /** @test */
    public function it_renders_datetime_with_icon()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" icon="calendar" />', ['datetime' => $datetime]);

        $view->assertSee('calendar');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_datetime_with_label()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" label="Created: " />', ['datetime' => $datetime]);

        $view->assertSee('Created:');
        $view->assertSee('2024-01-15 14:30:00');
    }

    /** @test */
    public function it_renders_datetime_with_copy_functionality()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" copy />', ['datetime' => $datetime]);

        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_does_not_render_when_value_is_null()
    {
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => null]);

        $view->assertDontSee('view-datetime');
    }

    /** @test */
    public function it_accepts_settings_array()
    {
        $datetime = '2024-01-15 14:30:00';
        $settings = ['custom' => 'setting'];
        $view = $this->blade('<x-view-datetime :value="$datetime" :settings="$settings" />', [
            'datetime' => $datetime,
            'settings' => $settings,
        ]);

        $view->assertSee('2024-01-15 14:30:00');
    }

    /** @test */
    public function it_renders_carbon_instance()
    {
        $datetime = Carbon::parse('2024-01-15 14:30:00');
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertSee('2024-01-15 14:30:00');
    }

    /** @test */
    public function it_renders_string_datetime()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertSee('2024-01-15 14:30:00');
    }

    /** @test */
    public function it_renders_timestamp()
    {
        $timestamp = 1705329000; // 2024-01-15 14:30:00
        $view = $this->blade('<x-view-datetime :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('2024-01-15 14:30:00');
    }

    /** @test */
    public function it_renders_with_html_label()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" label="<strong>Updated:</strong> " />', ['datetime' => $datetime]);

        $view->assertSee('<strong>Updated:</strong>');
    }

    /** @test */
    public function it_renders_with_custom_attributes()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" class="custom-class" id="datetime-1" />', ['datetime' => $datetime]);

        $view->assertSee('custom-class');
        $view->assertSee('id="datetime-1"');
    }

    /** @test */
    public function it_renders_with_aria_attributes()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" aria-label="Event time" role="time" />', ['datetime' => $datetime]);

        $view->assertSee('aria-label="Event time"');
        $view->assertSee('role="time"');
    }

    /** @test */
    public function it_renders_without_icon_when_not_provided()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_without_label_when_not_provided()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertDontSee('Created:');
        $view->assertDontSee('Updated:');
    }

    /** @test */
    public function it_renders_without_copy_when_not_enabled()
    {
        $datetime = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertDontSee('copy');
        $view->assertDontSee('data-clipboard');
    }

    /** @test */
    public function it_renders_empty_string_value()
    {
        $datetime = '';
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertSee('view-datetime');
    }

    /** @test */
    public function it_renders_zero_value()
    {
        $datetime = 0;
        $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);

        $view->assertSee('view-datetime');
    }
}
