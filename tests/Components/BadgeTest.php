<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class BadgeTest extends TestCase
{
    public function test_renders_basic_badge(): void
    {
        $view = $this->blade('<x-badge>Badge Content</x-badge>');

        $view->assertSee('Badge Content');
        $view->assertSee('class="badge');
        $view->assertSee('bg-primary');
    }

    public function test_badge_color_variants(): void
    {
        $colors = [
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'success' => 'bg-success',
            'danger' => 'bg-danger',
            'warning' => 'bg-warning',
            'info' => 'bg-info',
            'light' => 'bg-light',
            'dark' => 'bg-dark',
        ];

        foreach ($colors as $color => $expectedClass) {
            $view = $this->blade("<x-badge color=\"{$color}\">{$color} Badge</x-badge>");

            $view->assertSee($expectedClass);
            $view->assertSee("{$color} Badge");
        }
    }

    public function test_badge_pill_shape(): void
    {
        $view = $this->blade('<x-badge pill>Pill Badge</x-badge>');

        $view->assertSee('rounded-pill');
        $view->assertSee('Pill Badge');
    }

    public function test_badge_sizes(): void
    {
        $sizes = ['sm', 'lg'];

        foreach ($sizes as $size) {
            $view = $this->blade("<x-badge size=\"{$size}\">{$size} Badge</x-badge>");

            $view->assertSee("badge-{$size}");
            $view->assertSee("{$size} Badge");
        }
    }

    public function test_badge_as_link(): void
    {
        $view = $this->blade('
            <x-badge href="/users" color="primary">
                View Users
            </x-badge>
        ');

        $view->assertSee('<a href="/users"');
        $view->assertSee('View Users');
        $view->assertSee('bg-primary');
    }

    public function test_badge_dismissible(): void
    {
        $view = $this->blade('
            <x-badge dismissible color="info">
                Dismissible Badge
            </x-badge>
        ');

        $view->assertSee('badge-dismissible');
        $view->assertSee('btn-close');
        $view->assertSee('data-bs-dismiss="badge"');
        $view->assertSee('aria-label="Close"');
        $view->assertSee('Dismissible Badge');
    }

    public function test_badge_not_dismissible(): void
    {
        $view = $this->blade('<x-badge>Regular Badge</x-badge>');

        $view->assertDontSee('badge-dismissible');
        $view->assertDontSee('btn-close');
        $view->assertDontSee('data-bs-dismiss="badge"');
    }

    public function test_badge_custom_css_classes(): void
    {
        $view = $this->blade('<x-badge class="custom-badge shadow">Custom Badge</x-badge>');

        $view->assertSee('custom-badge');
        $view->assertSee('shadow');
        $view->assertSee('badge');
        $view->assertSee('bg-primary');
    }

    public function test_badge_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-badge
                id="test-badge"
                data-testid="badge"
                aria-label="Status badge">
                Test Badge
            </x-badge>
        ');

        $view->assertSee('id="test-badge"');
        $view->assertSee('data-testid="badge"');
        $view->assertSee('aria-label="Status badge"');
    }

    public function test_badge_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-badge
                color="success"
                pill
                size="lg"
                dismissible
                href="/action"
                class="custom-badge">
                Complete Badge
            </x-badge>
        ');

        $view->assertSee('bg-success');
        $view->assertSee('rounded-pill');
        $view->assertSee('badge-lg');
        $view->assertSee('badge-dismissible');
        $view->assertSee('btn-close');
        $view->assertSee('href="/action"');
        $view->assertSee('custom-badge');
        $view->assertSee('Complete Badge');
    }

    public function test_badge_livewire_integration(): void
    {
        $view = $this->blade('
            <x-badge
                dismissible
                color="info"
                wire:click="dismissBadge">
                {{ $badgeText }}
            </x-badge>
        ');

        $view->assertSee('wire:click="dismissBadge"');
        $view->assertSee('badge-dismissible');
    }

    public function test_badge_accessibility_features(): void
    {
        $view = $this->blade('
            <x-badge
                role="status"
                aria-live="polite">
                Status Badge
            </x-badge>
        ');

        $view->assertSee('role="status"');
        $view->assertSee('aria-live="polite"');
    }

    public function test_badge_dismissible_accessibility(): void
    {
        $view = $this->blade('
            <x-badge dismissible>
                Dismissible Badge
            </x-badge>
        ');

        $view->assertSee('aria-label="Close"');
        $view->assertSee('data-bs-dismiss="badge"');
    }

    public function test_badge_handles_edge_cases(): void
    {
        // Empty badge
        $view = $this->blade('<x-badge></x-badge>');
        $view->assertStatus(200);

        // Badge with special characters
        $view = $this->blade('<x-badge>Badge & Content →</x-badge>');
        $view->assertSee('Badge &amp; Content →');

        // Badge with HTML content
        $view = $this->blade('<x-badge><strong>Bold</strong> Badge</x-badge>');
        $view->assertSee('<strong>Bold</strong>', false);
        $view->assertSee('Badge');
    }

    public function test_badge_link_with_dismissible(): void
    {
        $view = $this->blade('
            <x-badge href="/users" dismissible>
                Link Badge
            </x-badge>
        ');

        $view->assertSee('<a href="/users"');
        $view->assertSee('badge-dismissible');
        $view->assertSee('btn-close');
        $view->assertSee('Link Badge');
    }

    public function test_badge_pill_with_size(): void
    {
        $view = $this->blade('<x-badge pill size="lg">Large Pill</x-badge>');

        $view->assertSee('rounded-pill');
        $view->assertSee('badge-lg');
        $view->assertSee('Large Pill');
    }

    public function test_badge_default_color(): void
    {
        $view = $this->blade('<x-badge>Default Badge</x-badge>');

        $view->assertSee('bg-primary'); // Default color
        $view->assertSee('Default Badge');
    }

    public function test_badge_with_null_size(): void
    {
        $view = $this->blade('<x-badge size="">No Size Badge</x-badge>');

        $view->assertSee('No Size Badge');
        $view->assertDontSee('badge-');
    }

    public function test_badge_with_false_pill(): void
    {
        $view = $this->blade('<x-badge :pill="false">Regular Badge</x-badge>');

        $view->assertSee('Regular Badge');
        $view->assertDontSee('rounded-pill');
    }

    public function test_badge_with_false_dismissible(): void
    {
        $view = $this->blade('<x-badge :dismissible="false">Non-dismissible Badge</x-badge>');

        $view->assertSee('Non-dismissible Badge');
        $view->assertDontSee('badge-dismissible');
        $view->assertDontSee('btn-close');
    }

    public function test_badge_semantic_structure(): void
    {
        // Regular badge should be span
        $view = $this->blade('<x-badge>Regular Badge</x-badge>');
        $view->assertSee('<span', false);
        $view->assertDontSee('<a', false);

        // Link badge should be anchor
        $view = $this->blade('<x-badge href="/link">Link Badge</x-badge>');
        $view->assertSee('<a', false);
        $view->assertDontSee('<span', false);
    }

    public function test_badge_css_class_structure(): void
    {
        $view = $this->blade('<x-badge>Test Badge</x-badge>');

        // Should have base badge class
        $view->assertSee('class="badge');

        // Should have color class
        $view->assertSee('bg-primary');
    }

    public function test_badge_with_complex_content(): void
    {
        $view = $this->blade('
            <x-badge color="success" pill>
                <i class="icon-check"></i>
                <span>Success</span>
                <small>(Verified)</small>
            </x-badge>
        ');

        $view->assertSee('<i class="icon-check"></i>', false);
        $view->assertSee('<span>Success</span>', false);
        $view->assertSee('<small>(Verified)</small>', false);
        $view->assertSee('bg-success');
        $view->assertSee('rounded-pill');
    }

    public function test_badge_performance_attributes(): void
    {
        $view = $this->blade('
            <x-badge
                data-testid="badge-component"
                data-loading="false"
                data-interactive="true">
                Performance Badge
            </x-badge>
        ');

        $view->assertSee('data-testid="badge-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }

    public function test_badge_bootstrap_integration(): void
    {
        $view = $this->blade('<x-badge id="bootstrapBadge">Bootstrap Badge</x-badge>');

        // Should have proper Bootstrap badge structure
        $view->assertSee('badge');
        $view->assertSee('bg-primary');
        $view->assertSee('id="bootstrapBadge"');
    }

    public function test_badge_with_numeric_content(): void
    {
        $view = $this->blade('<x-badge color="danger" pill>42</x-badge>');

        $view->assertSee('42');
        $view->assertSee('bg-danger');
        $view->assertSee('rounded-pill');
    }

    public function test_badge_with_emoji_content(): void
    {
        $view = $this->blade('<x-badge color="warning">🚨 Alert</x-badge>');

        $view->assertSee('🚨 Alert');
        $view->assertSee('bg-warning');
    }

    public function test_badge_with_long_text(): void
    {
        $longText = 'This is a very long badge text that might wrap to multiple lines';
        $view = $this->blade("<x-badge>{$longText}</x-badge>");

        $view->assertSee($longText);
        $view->assertSee('badge');
    }

    public function test_badge_with_special_html(): void
    {
        $view = $this->blade('
            <x-badge>
                <span class="icon">★</span>
                <span class="text">Featured</span>
            </x-badge>
        ');

        $view->assertSee('<span class="icon">★</span>', false);
        $view->assertSee('<span class="text">Featured</span>', false);
    }

    public function test_badge_color_validation(): void
    {
        // Test with invalid color (should still render with default)
        $view = $this->blade('<x-badge color="invalid">Invalid Color</x-badge>');

        $view->assertSee('Invalid Color');
        $view->assertSee('bg-invalid'); // Should still apply the class
    }

    public function test_badge_size_validation(): void
    {
        // Test with invalid size (should still render)
        $view = $this->blade('<x-badge size="invalid">Invalid Size</x-badge>');

        $view->assertSee('Invalid Size');
        $view->assertSee('badge-invalid'); // Should still apply the class
    }

    public function test_badge_href_validation(): void
    {
        // Test with empty href
        $view = $this->blade('<x-badge href="">Empty Href</x-badge>');

        $view->assertSee('Empty Href');
        $view->assertSee('href=""');

        // Test with null href
        $view = $this->blade('<x-badge :href="null">Null Href</x-badge>');

        $view->assertSee('Null Href');
        $view->assertDontSee('<a', false);
        $view->assertSee('<span', false);
    }
}
