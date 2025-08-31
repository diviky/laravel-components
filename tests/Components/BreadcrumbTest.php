<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class BreadcrumbTest extends TestCase
{
    public function test_renders_basic_breadcrumb(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
        $view->assertSee('breadcrumb');
        $view->assertSee('aria-label="breadcrumbs"');
    }

    public function test_breadcrumb_with_dots_separator(): void
    {
        $view = $this->blade('
            <x-breadcrumb dots>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('breadcrumb-dots');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_with_bullets_separator(): void
    {
        $view = $this->blade('
            <x-breadcrumb bullets>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('breadcrumb-bullets');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_without_arrows(): void
    {
        $view = $this->blade('
            <x-breadcrumb :arrows="false">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertDontSee('breadcrumb-arrows');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_with_custom_design(): void
    {
        $view = $this->blade('
            <x-breadcrumb design="custom">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('breadcrumb-custom');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_without_turbo(): void
    {
        $view = $this->blade('
            <x-breadcrumb :turbo="false">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertDontSee('data-pjax');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_with_turbo(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('data-pjax');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_with_custom_classes(): void
    {
        $view = $this->blade('
            <x-breadcrumb class="custom-breadcrumb shadow">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('custom-breadcrumb');
        $view->assertSee('shadow');
        $view->assertSee('breadcrumb');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-breadcrumb
                id="main-nav"
                data-testid="breadcrumb"
                aria-label="Main navigation">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('id="main-nav"');
        $view->assertSee('data-testid="breadcrumb"');
        $view->assertSee('aria-label="Main navigation"');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_item_with_href(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/products" label="Products" />
            </x-breadcrumb>
        ');

        $view->assertSee('href="/products"');
        $view->assertSee('Products');
    }

    public function test_breadcrumb_item_with_route(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item route="products.index" label="Products" />
            </x-breadcrumb>
        ');

        $view->assertSee('Products');
        // Note: Route resolution would be tested in integration tests
    }

    public function test_breadcrumb_item_with_label(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/products" label="Product Catalog" />
            </x-breadcrumb>
        ');

        $view->assertSee('Product Catalog');
        $view->assertSee('href="/products"');
    }

    public function test_breadcrumb_item_active(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current Page" />
            </x-breadcrumb>
        ');

        $view->assertSee('breadcrumb-item active');
        $view->assertSee('Current Page');
        $view->assertDontSee('href');
    }

    public function test_breadcrumb_item_not_active(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item :active="false" label="Not Active" />
            </x-breadcrumb>
        ');

        $view->assertDontSee('breadcrumb-item active');
        $view->assertSee('Not Active');
    }

    public function test_breadcrumb_item_with_slot_content(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </x-breadcrumb.item>
            </x-breadcrumb>
        ');

        $view->assertSee('<i class="icon-home"></i>', false);
        $view->assertSee('<span>Home</span>', false);
        $view->assertSee('href="/"');
    }

    public function test_breadcrumb_item_with_complex_content(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/products">
                    <i class="icon-package"></i>
                    <span>Products</span>
                    <small class="text-muted">({{ $count }})</small>
                </x-breadcrumb.item>
            </x-breadcrumb>
        ');

        $view->assertSee('<i class="icon-package"></i>', false);
        $view->assertSee('<span>Products</span>', false);
        $view->assertSee('<small class="text-muted">', false);
        $view->assertSee('href="/products"');
    }

    public function test_breadcrumb_livewire_integration(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item
                    wire:click="goToCategory(123)"
                    label="Electronics" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('wire:click="goToCategory(123)"');
        $view->assertSee('Electronics');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-breadcrumb
                dots
                :arrows="false"
                :turbo="false"
                design="custom"
                class="custom-breadcrumb"
                id="test-breadcrumb">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item route="products.index" label="Products" />
                <x-breadcrumb.item href="/products/123" label="Product Details" />
                <x-breadcrumb.item active label="Edit Product" />
            </x-breadcrumb>
        ');

        $view->assertSee('breadcrumb-dots');
        $view->assertDontSee('breadcrumb-arrows');
        $view->assertDontSee('data-pjax');
        $view->assertSee('breadcrumb-custom');
        $view->assertSee('custom-breadcrumb');
        $view->assertSee('id="test-breadcrumb"');
        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Product Details');
        $view->assertSee('Edit Product');
    }

    public function test_breadcrumb_accessibility_features(): void
    {
        $view = $this->blade('
            <x-breadcrumb
                role="navigation"
                aria-label="Site navigation">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('role="navigation"');
        $view->assertSee('aria-label="Site navigation"');
        $view->assertSee('aria-label="breadcrumbs"');
    }

    public function test_breadcrumb_handles_edge_cases(): void
    {
        // Empty breadcrumb
        $view = $this->blade('<x-breadcrumb></x-breadcrumb>');
        $view->assertStatus(200);

        // Single item breadcrumb
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item active label="Single Item" />
            </x-breadcrumb>
        ');
        $view->assertSee('Single Item');

        // Breadcrumb with special characters
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home & Dashboard" />
                <x-breadcrumb.item active label="Special → Characters" />
            </x-breadcrumb>
        ');
        $view->assertSee('Home &amp; Dashboard');
        $view->assertSee('Special → Characters');
    }

    public function test_breadcrumb_semantic_structure(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        // Should have proper semantic structure
        $view->assertSee('<ol', false);
        $view->assertSee('<li', false);
        $view->assertSee('breadcrumb-item');
    }

    public function test_breadcrumb_css_class_merging(): void
    {
        $view = $this->blade('
            <x-breadcrumb class="custom-class">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        // Should merge custom class with default classes
        $view->assertSee('custom-class');
        $view->assertSee('breadcrumb');
        $view->assertSee('breadcrumb-arrows');
    }

    public function test_breadcrumb_performance_attributes(): void
    {
        $view = $this->blade('
            <x-breadcrumb
                data-testid="breadcrumb-component"
                data-loading="false"
                data-interactive="true">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('data-testid="breadcrumb-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }

    public function test_breadcrumb_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-breadcrumb id="bootstrapBreadcrumb">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item href="/products" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        // Should have proper Bootstrap breadcrumb structure
        $view->assertSee('breadcrumb');
        $view->assertSee('breadcrumb-item');
        $view->assertSee('id="bootstrapBreadcrumb"');
    }

    public function test_breadcrumb_with_long_labels(): void
    {
        $longLabel = 'This is a very long breadcrumb label that might wrap to multiple lines';
        $view = $this->blade("
            <x-breadcrumb>
                <x-breadcrumb.item href=\"/\" label=\"{$longLabel}\" />
                <x-breadcrumb.item active label=\"Current\" />
            </x-breadcrumb>
        ");

        $view->assertSee($longLabel);
        $view->assertSee('Current');
    }

    public function test_breadcrumb_with_html_content(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/">
                    <strong>Bold</strong> <em>Italic</em> Text
                </x-breadcrumb.item>
                <x-breadcrumb.item active>
                    <span class="badge">Badge</span> Content
                </x-breadcrumb.item>
            </x-breadcrumb>
        ');

        $view->assertSee('<strong>Bold</strong>', false);
        $view->assertSee('<em>Italic</em>', false);
        $view->assertSee('<span class="badge">Badge</span>', false);
        $view->assertSee('Content');
    }

    public function test_breadcrumb_separator_priority(): void
    {
        // Test that design overrides other separators
        $view = $this->blade('
            <x-breadcrumb dots bullets design="custom">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('breadcrumb-custom');
        $view->assertDontSee('breadcrumb-dots');
        $view->assertDontSee('breadcrumb-bullets');
    }

    public function test_breadcrumb_item_link_generation(): void
    {
        // Test route-based link generation
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item route="home" label="Home" />
                <x-breadcrumb.item route="products.index" label="Products" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('Home');
        $view->assertSee('Products');
        $view->assertSee('Current');
    }

    public function test_breadcrumb_item_with_both_href_and_route(): void
    {
        // Test that href takes precedence over route
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/custom" route="home" label="Custom" />
            </x-breadcrumb>
        ');

        $view->assertSee('href="/custom"');
        $view->assertSee('Custom');
    }

    public function test_breadcrumb_item_with_label_and_slot(): void
    {
        // Test that label takes precedence over slot content
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Label Text">
                    Slot Content
                </x-breadcrumb.item>
            </x-breadcrumb>
        ');

        $view->assertSee('Label Text');
        $view->assertDontSee('Slot Content');
    }

    public function test_breadcrumb_item_without_label_or_slot(): void
    {
        // Test breadcrumb item with no content
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" />
            </x-breadcrumb>
        ');

        $view->assertSee('href="/"');
        $view->assertStatus(200);
    }

    public function test_breadcrumb_with_multiple_active_items(): void
    {
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item active label="Active 1" />
                <x-breadcrumb.item active label="Active 2" />
            </x-breadcrumb>
        ');

        $view->assertSee('Active 1');
        $view->assertSee('Active 2');
        $view->assertSee('breadcrumb-item active');
    }

    public function test_breadcrumb_turbo_attributes(): void
    {
        // Test turbo enabled
        $view = $this->blade('
            <x-breadcrumb>
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertSee('data-pjax');

        // Test turbo disabled
        $view = $this->blade('
            <x-breadcrumb :turbo="false">
                <x-breadcrumb.item href="/" label="Home" />
                <x-breadcrumb.item active label="Current" />
            </x-breadcrumb>
        ');

        $view->assertDontSee('data-pjax');
    }
}
