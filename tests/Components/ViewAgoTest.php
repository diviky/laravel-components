<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Carbon\Carbon;
use Diviky\LaravelComponents\Tests\TestCase;

class ViewAgoTest extends TestCase
{
    /** @test */
    public function it_renders_basic_ago_time()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
        // Note: The actual output depends on when the test runs
    }

    /** @test */
    public function it_renders_ago_time_with_icon()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" icon="clock" />', ['timestamp' => $timestamp]);

        $view->assertSee('clock');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_ago_time_with_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" label="Updated: " />', ['timestamp' => $timestamp]);

        $view->assertSee('Updated:');
    }

    /** @test */
    public function it_renders_ago_time_with_copy_functionality()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" copy />', ['timestamp' => $timestamp]);

        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_renders_ago_time_with_custom_classes()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" class="custom-class" />', ['timestamp' => $timestamp]);

        $view->assertSee('custom-class');
    }

    /** @test */
    public function it_renders_ago_time_with_custom_id()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" id="ago-1" />', ['timestamp' => $timestamp]);

        $view->assertSee('id="ago-1"');
    }

    /** @test */
    public function it_renders_ago_time_with_data_attributes()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" data-test="ago-component" data-type="display-ago" />', ['timestamp' => $timestamp]);

        $view->assertSee('data-test="ago-component"');
        $view->assertSee('data-type="display-ago"');
    }

    /** @test */
    public function it_renders_ago_time_with_aria_attributes()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" aria-label="Time ago display" aria-describedby="ago-description" />', ['timestamp' => $timestamp]);

        $view->assertSee('aria-label="Time ago display"');
        $view->assertSee('aria-describedby="ago-description"');
    }

    /** @test */
    public function it_renders_ago_time_with_role_attribute()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" role="text" />', ['timestamp' => $timestamp]);

        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_ago_time_with_inline_styles()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" style="color: #6c757d;" />', ['timestamp' => $timestamp]);

        $view->assertSee('style="color: #6c757d;"');
    }

    /** @test */
    public function it_renders_ago_time_with_tabindex()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" tabindex="0" />', ['timestamp' => $timestamp]);

        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_ago_time_with_all_features()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" icon="clock" label="Updated: " copy class="custom-class" id="ago-1" />', ['timestamp' => $timestamp]);

        $view->assertSee('clock');
        $view->assertSee('Updated:');
        $view->assertSee('copy');
        $view->assertSee('custom-class');
        $view->assertSee('id="ago-1"');
    }

    /** @test */
    public function it_renders_ago_time_with_different_data_types()
    {
        // Carbon instance
        $carbon = Carbon::parse('2024-01-15 14:30:00');
        $view1 = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $carbon]);
        $view1->assertSee('ago');

        // String timestamp
        $string = '2024-01-15 14:30:00';
        $view2 = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $string]);
        $view2->assertSee('ago');

        // Unix timestamp
        $unix = 1705324200;
        $view3 = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $unix]);
        $view3->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_html_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" label="<strong>Updated:</strong> " />', ['timestamp' => $timestamp]);

        $view->assertSee('<strong>Updated:</strong>');
    }

    /** @test */
    public function it_renders_nothing_with_null_value()
    {
        $view = $this->blade('<x-view-ago :value="null" />');

        $view->assertDontSee('ago');
    }

    /** @test */
    public function it_renders_nothing_with_empty_string()
    {
        $view = $this->blade('<x-view-ago :value="\'\'" />');

        $view->assertDontSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_iso_8601_format()
    {
        $timestamp = '2024-01-15T14:30:00Z';
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_unix_timestamp_string()
    {
        $timestamp = '1705324200';
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_datetime_object()
    {
        $timestamp = new \DateTime('2024-01-15 14:30:00');
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_carbon_instance()
    {
        $timestamp = Carbon::now()->subHours(2);
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_recent_timestamp()
    {
        $timestamp = Carbon::now()->subMinutes(5);
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_old_timestamp()
    {
        $timestamp = Carbon::now()->subDays(7);
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_very_old_timestamp()
    {
        $timestamp = Carbon::now()->subYears(2);
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_future_timestamp()
    {
        $timestamp = Carbon::now()->addHours(1);
        $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_settings_array()
    {
        $timestamp = '2024-01-15 14:30:00';
        $settings = ['format' => 'short', 'locale' => 'en'];
        $view = $this->blade('<x-view-ago :value="$timestamp" :settings="$settings" />', [
            'timestamp' => $timestamp,
            'settings' => $settings,
        ]);

        $view->assertSee('ago');
    }

    /** @test */
    public function it_renders_ago_time_with_multiple_custom_classes()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" class="ago-highlight ago-border" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago-highlight');
        $view->assertSee('ago-border');
    }

    /** @test */
    public function it_renders_ago_time_with_responsive_classes()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" class="ago-responsive d-none d-md-block" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago-responsive');
        $view->assertSee('d-none d-md-block');
    }

    /** @test */
    public function it_renders_ago_time_with_utility_classes()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" class="text-muted bg-light p-2 rounded" />', ['timestamp' => $timestamp]);

        $view->assertSee('text-muted');
        $view->assertSee('bg-light');
        $view->assertSee('p-2');
        $view->assertSee('rounded');
    }

    /** @test */
    public function it_renders_ago_time_with_long_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $longLabel = 'This is a very long label that might exceed normal length expectations and should still render properly';
        $view = $this->blade('<x-view-ago :value="$timestamp" :label="$label" />', [
            'timestamp' => $timestamp,
            'label' => $longLabel,
        ]);

        $view->assertSee($longLabel);
    }

    /** @test */
    public function it_renders_ago_time_with_special_characters_in_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $specialLabel = 'Special Characters: & < > " \' &amp; &lt; &gt; &quot; &#39;';
        $view = $this->blade('<x-view-ago :value="$timestamp" :label="$label" />', [
            'timestamp' => $timestamp,
            'label' => $specialLabel,
        ]);

        $view->assertSee($specialLabel);
    }

    /** @test */
    public function it_renders_ago_time_with_unicode_characters_in_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $unicodeLabel = 'Unicode: 中文 Español Français Deutsch 日本語';
        $view = $this->blade('<x-view-ago :value="$timestamp" :label="$label" />', [
            'timestamp' => $timestamp,
            'label' => $unicodeLabel,
        ]);

        $view->assertSee($unicodeLabel);
    }

    /** @test */
    public function it_renders_ago_time_with_empty_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" label="" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
        $view->assertDontSee('Updated:');
    }

    /** @test */
    public function it_renders_ago_time_with_null_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" :label="null" />', ['timestamp' => $timestamp]);

        $view->assertSee('ago');
        $view->assertDontSee('Updated:');
    }

    /** @test */
    public function it_renders_ago_time_with_copy_and_icon()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" icon="clock" copy />', ['timestamp' => $timestamp]);

        $view->assertSee('clock');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_ago_time_with_copy_and_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" label="Updated: " copy />', ['timestamp' => $timestamp]);

        $view->assertSee('Updated:');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_ago_time_with_icon_and_label()
    {
        $timestamp = '2024-01-15 14:30:00';
        $view = $this->blade('<x-view-ago :value="$timestamp" icon="clock" label="Updated: " />', ['timestamp' => $timestamp]);

        $view->assertSee('clock');
        $view->assertSee('Updated:');
        $view->assertSee('me-1');
    }
}
