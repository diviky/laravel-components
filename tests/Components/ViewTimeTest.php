<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;
use Carbon\Carbon;

class ViewTimeTest extends TestCase
{
    /** @test */
    public function it_renders_basic_time()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('14:30:00');
    }

    /** @test */
    public function it_renders_time_with_icon()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" icon="clock" />', ['time' => $time]);
        
        $view->assertSee('clock');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_time_with_label()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" label="Start: " />', ['time' => $time]);
        
        $view->assertSee('Start:');
        $view->assertSee('14:30:00');
    }

    /** @test */
    public function it_renders_time_with_copy_functionality()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" copy />', ['time' => $time]);
        
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_does_not_render_when_value_is_null()
    {
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => null]);
        
        $view->assertDontSee('view-time');
    }

    /** @test */
    public function it_accepts_settings_array()
    {
        $time = '14:30:00';
        $settings = ['custom' => 'setting'];
        $view = $this->blade('<x-view-time :value="$time" :settings="$settings" />', [
            'time' => $time,
            'settings' => $settings
        ]);
        
        $view->assertSee('14:30:00');
    }

    /** @test */
    public function it_renders_carbon_instance()
    {
        $time = Carbon::parse('14:30:00');
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('14:30:00');
    }

    /** @test */
    public function it_renders_string_time()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('14:30:00');
    }

    /** @test */
    public function it_renders_timestamp()
    {
        $timestamp = 1705329000; // 2024-01-15 14:30:00
        $view = $this->blade('<x-view-time :value="$timestamp" />', ['timestamp' => $timestamp]);
        
        $view->assertSee('14:30:00');
    }

    /** @test */
    public function it_renders_with_html_label()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" label="<strong>End:</strong> " />', ['time' => $time]);
        
        $view->assertSee('<strong>End:</strong>');
    }

    /** @test */
    public function it_renders_with_custom_attributes()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" class="custom-class" id="time-1" />', ['time' => $time]);
        
        $view->assertSee('custom-class');
        $view->assertSee('id="time-1"');
    }

    /** @test */
    public function it_renders_with_aria_attributes()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" aria-label="Meeting time" role="time" />', ['time' => $time]);
        
        $view->assertSee('aria-label="Meeting time"');
        $view->assertSee('role="time"');
    }

    /** @test */
    public function it_renders_without_icon_when_not_provided()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_without_label_when_not_provided()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertDontSee('Start:');
        $view->assertDontSee('End:');
    }

    /** @test */
    public function it_renders_without_copy_when_not_enabled()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertDontSee('copy');
        $view->assertDontSee('data-clipboard');
    }

    /** @test */
    public function it_renders_empty_string_value()
    {
        $time = '';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('view-time');
    }

    /** @test */
    public function it_renders_zero_value()
    {
        $time = 0;
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('view-time');
    }

    /** @test */
    public function it_renders_morning_time()
    {
        $time = '09:00:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('09:00:00');
    }

    /** @test */
    public function it_renders_evening_time()
    {
        $time = '22:00:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('22:00:00');
    }

    /** @test */
    public function it_renders_midnight_time()
    {
        $time = '00:00:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('00:00:00');
    }

    /** @test */
    public function it_renders_noon_time()
    {
        $time = '12:00:00';
        $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
        
        $view->assertSee('12:00:00');
    }

    /** @test */
    public function it_renders_with_different_icon_types()
    {
        $time = '14:30:00';
        
        $view1 = $this->blade('<x-view-time :value="$time" icon="clock" />', ['time' => $time]);
        $view1->assertSee('clock');
        
        $view2 = $this->blade('<x-view-time :value="$time" icon="calendar" />', ['time' => $time]);
        $view2->assertSee('calendar');
        
        $view3 = $this->blade('<x-view-time :value="$time" icon="alarm" />', ['time' => $time]);
        $view3->assertSee('alarm');
    }

    /** @test */
    public function it_renders_with_different_label_formats()
    {
        $time = '14:30:00';
        
        $view1 = $this->blade('<x-view-time :value="$time" label="Start: " />', ['time' => $time]);
        $view1->assertSee('Start:');
        
        $view2 = $this->blade('<x-view-time :value="$time" label="<strong>End:</strong> " />', ['time' => $time]);
        $view2->assertSee('<strong>End:</strong>');
        
        $view3 = $this->blade('<x-view-time :value="$time" label="Meeting Time: " />', ['time' => $time]);
        $view3->assertSee('Meeting Time:');
    }

    /** @test */
    public function it_renders_with_copy_and_icon()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" icon="clock" copy />', ['time' => $time]);
        
        $view->assertSee('clock');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_with_copy_and_label()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" label="Start: " copy />', ['time' => $time]);
        
        $view->assertSee('Start:');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_with_all_features()
    {
        $time = '14:30:00';
        $view = $this->blade('<x-view-time :value="$time" icon="clock" label="Start: " copy />', ['time' => $time]);
        
        $view->assertSee('clock');
        $view->assertSee('Start:');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('14:30:00');
    }
}
