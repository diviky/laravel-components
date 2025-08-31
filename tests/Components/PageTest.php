<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class PageTest extends TestCase
{
    public function test_renders_basic_page(): void
    {
        $view = $this->blade('<x-page />');

        $view->assertSee('page-wrapper');
    }

    public function test_renders_page_with_custom_class(): void
    {
        $view = $this->blade('<x-page class="custom-page" />');

        $view->assertSee('page-wrapper');
        $view->assertSee('custom-page');
    }

    public function test_renders_page_with_custom_id(): void
    {
        $view = $this->blade('<x-page id="main-page" />');

        $view->assertSee('page-wrapper');
        $view->assertSee('id="main-page"');
    }

    public function test_renders_page_with_inline_style(): void
    {
        $view = $this->blade('<x-page style="margin: 1rem;" />');

        $view->assertSee('page-wrapper');
        $view->assertSee('margin: 1rem');
    }

    public function test_renders_page_with_data_attributes(): void
    {
        $view = $this->blade('<x-page data-page-id="123" data-action="view" />');

        $view->assertSee('page-wrapper');
        $view->assertSee('data-page-id="123"');
        $view->assertSee('data-action="view"');
    }

    public function test_renders_page_with_header(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <h1>Page Header</h1>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('Page Header');
    }

    public function test_renders_page_with_body(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.body>
                    <p>Page content</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-body');
        $view->assertSee('Page content');
    }

    public function test_renders_page_with_footer(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.footer>
                    <p>Page footer</p>
                </x-page.footer>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-footer');
        $view->assertSee('Page footer');
    }

    public function test_renders_page_with_all_sections(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <h1>Header</h1>
                </x-page.header>
                <x-page.body>
                    <p>Body</p>
                </x-page.body>
                <x-page.footer>
                    <p>Footer</p>
                </x-page.footer>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-footer');
        $view->assertSee('Header');
        $view->assertSee('Body');
        $view->assertSee('Footer');
    }

    public function test_renders_page_header_with_border(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header border="true">
                    <h1>Header with Border</h1>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-header');
        $view->assertSee('page-header-border');
        $view->assertSee('Header with Border');
    }

    public function test_renders_page_header_with_custom_class(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header class="custom-header">
                    <h1>Custom Header</h1>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-header');
        $view->assertSee('custom-header');
        $view->assertSee('Custom Header');
    }

    public function test_renders_page_body_with_fragment(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.body fragment="content-fragment">
                    <p>Fragment content</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-body');
        $view->assertSee('ajax-content="content-fragment"');
        $view->assertSee('Fragment content');
    }

    public function test_renders_page_body_with_custom_class(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.body class="custom-body">
                    <p>Custom body</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-body');
        $view->assertSee('custom-body');
        $view->assertSee('Custom body');
    }

    public function test_renders_page_footer_with_custom_class(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.footer class="custom-footer">
                    <p>Custom footer</p>
                </x-page.footer>
            </x-page>
        ');

        $view->assertSee('page-footer');
        $view->assertSee('custom-footer');
        $view->assertSee('Custom footer');
    }

    public function test_renders_page_title(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>Page Title</x-page.title>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-title');
        $view->assertSee('Page Title');
    }

    public function test_renders_page_title_with_custom_class(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title class="display-4">Custom Title</x-page.title>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-title');
        $view->assertSee('display-4');
        $view->assertSee('Custom Title');
    }

    public function test_renders_page_subtitle(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.subtitle>Page Subtitle</x-page.subtitle>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-subtitle');
        $view->assertSee('Page Subtitle');
    }

    public function test_renders_page_subtitle_with_custom_class(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.subtitle class="text-muted">Custom Subtitle</x-page.subtitle>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-subtitle');
        $view->assertSee('text-muted');
        $view->assertSee('Custom Subtitle');
    }

    public function test_renders_page_options(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.options>
                        <button class="btn btn-primary">Action</button>
                    </x-page.options>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-options');
        $view->assertSee('d-flex');
        $view->assertSee('btn btn-primary');
        $view->assertSee('Action');
    }

    public function test_renders_page_options_with_custom_class(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.options class="justify-content-end">
                        <button class="btn btn-secondary">Custom Action</button>
                    </x-page.options>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-options');
        $view->assertSee('justify-content-end');
        $view->assertSee('btn btn-secondary');
        $view->assertSee('Custom Action');
    }

    public function test_renders_page_with_slots(): void
    {
        $view = $this->blade('
            <x-page>
                <x-slot:header>
                    <h1>Slot Header</h1>
                </x-slot:header>
                <x-slot:body>
                    <p>Slot Body</p>
                </x-slot:body>
                <x-slot:footer>
                    <p>Slot Footer</p>
                </x-slot:footer>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('Slot Header');
        $view->assertSee('Slot Body');
        $view->assertSee('Slot Footer');
    }

    public function test_renders_page_with_title_and_options(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>Dashboard</x-page.title>
                    <x-page.subtitle>Overview</x-page.subtitle>
                    <x-page.options>
                        <button class="btn btn-primary">Add Item</button>
                        <button class="btn btn-secondary">Export</button>
                    </x-page.options>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-title');
        $view->assertSee('page-subtitle');
        $view->assertSee('page-options');
        $view->assertSee('Dashboard');
        $view->assertSee('Overview');
        $view->assertSee('Add Item');
        $view->assertSee('Export');
    }

    public function test_renders_page_with_complex_header_layout(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <div class="row align-items-center">
                        <div class="col">
                            <x-page.title>Product Catalog</x-page.title>
                            <x-page.subtitle>Browse and manage products</x-page.subtitle>
                        </div>
                        <div class="col-auto">
                            <x-page.options>
                                <button class="btn btn-primary">Add Product</button>
                            </x-page.options>
                        </div>
                    </div>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-header');
        $view->assertSee('row align-items-center');
        $view->assertSee('col');
        $view->assertSee('col-auto');
        $view->assertSee('page-title');
        $view->assertSee('page-subtitle');
        $view->assertSee('page-options');
        $view->assertSee('Product Catalog');
        $view->assertSee('Browse and manage products');
        $view->assertSee('Add Product');
    }

    public function test_renders_page_with_direct_content(): void
    {
        $view = $this->blade('
            <x-page>
                <div class="container">
                    <h1>Simple Page</h1>
                    <p>Content directly in page wrapper</p>
                </div>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('container');
        $view->assertSee('Simple Page');
        $view->assertSee('Content directly in page wrapper');
    }

    public function test_renders_page_with_cards(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>Dashboard</x-page.title>
                </x-page.header>
                <x-page.body>
                    <div class="row">
                        <div class="col-md-6">
                            <x-card title="Card 1">
                                <p>Card content 1</p>
                            </x-card>
                        </div>
                        <div class="col-md-6">
                            <x-card title="Card 2">
                                <p>Card content 2</p>
                            </x-card>
                        </div>
                    </div>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Dashboard');
        $view->assertSee('row');
        $view->assertSee('col-md-6');
        $view->assertSee('Card 1');
        $view->assertSee('Card 2');
        $view->assertSee('Card content 1');
        $view->assertSee('Card content 2');
    }

    public function test_renders_page_with_grid(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>User Profile</x-page.title>
                </x-page.header>
                <x-page.body>
                    <x-grid>
                        <x-grid.item title="Name" content="John Doe" />
                        <x-grid.item title="Email" content="john@example.com" />
                        <x-grid.item title="Role" content="Administrator" />
                    </x-grid>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('User Profile');
        $view->assertSee('datagrid');
        $view->assertSee('Name');
        $view->assertSee('John Doe');
        $view->assertSee('Email');
        $view->assertSee('john@example.com');
        $view->assertSee('Role');
        $view->assertSee('Administrator');
    }

    public function test_renders_page_with_forms(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>Settings</x-page.title>
                </x-page.header>
                <x-page.body>
                    <x-form-input name="site_name" label="Site Name" />
                    <x-form-email name="admin_email" label="Admin Email" />
                    <x-form-switch name="maintenance_mode" label="Maintenance Mode" />
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Settings');
        $view->assertSee('name="site_name"');
        $view->assertSee('Site Name');
        $view->assertSee('name="admin_email"');
        $view->assertSee('Admin Email');
        $view->assertSee('name="maintenance_mode"');
        $view->assertSee('Maintenance Mode');
    }

    public function test_renders_page_with_livewire(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>Live Dashboard</x-page.title>
                </x-page.header>
                <x-page.body>
                    <div wire:poll.30s>
                        <x-counter :number="1234" title="Total Users" />
                    </div>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Live Dashboard');
        $view->assertSee('wire:poll.30s');
        $view->assertSee('Total Users');
    }

    public function test_renders_page_with_breadcrumbs(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-breadcrumb>
                        <x-breadcrumb.item href="/" label="Home" />
                        <x-breadcrumb.item href="/admin" label="Admin" />
                        <x-breadcrumb.item active label="Current Page" />
                    </x-breadcrumb>
                    <x-page.title>Current Page</x-page.title>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-title');
        $view->assertSee('Current Page');
        $view->assertSee('Home');
        $view->assertSee('Admin');
    }

    public function test_renders_page_with_icons(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>
                        <x-icon name="dashboard" class="me-2" />
                        Dashboard
                    </x-page.title>
                    <x-page.options>
                        <x-icon name="refresh" class="me-2" />
                        <button class="btn btn-primary">Refresh</button>
                    </x-page.options>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-title');
        $view->assertSee('page-options');
        $view->assertSee('Dashboard');
        $view->assertSee('Refresh');
        $view->assertSee('ti ti-dashboard');
        $view->assertSee('ti ti-refresh');
    }

    public function test_renders_page_with_badges(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>Orders</x-page.title>
                    <x-page.options>
                        <x-badge color="success">Active</x-badge>
                        <x-badge color="warning">Pending</x-badge>
                    </x-page.options>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-title');
        $view->assertSee('page-options');
        $view->assertSee('Orders');
        $view->assertSee('Active');
        $view->assertSee('Pending');
    }

    public function test_renders_page_with_buttons(): void
    {
        $view = $this->blade('
            <x-page>
                <x-page.header>
                    <x-page.title>User Management</x-page.title>
                    <x-page.options>
                        <x-form-button type="button" variant="outline-secondary">Filter</x-form-button>
                        <x-form-button type="button" variant="primary">Add User</x-form-button>
                    </x-page.options>
                </x-page.header>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-title');
        $view->assertSee('page-options');
        $view->assertSee('User Management');
        $view->assertSee('Filter');
        $view->assertSee('Add User');
    }

    public function test_renders_page_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-page role="main" aria-label="Main Content">
                <x-page.header role="banner">
                    <x-page.title>Accessible Page</x-page.title>
                </x-page.header>
                <x-page.body role="main">
                    <p>Main content</p>
                </x-page.body>
                <x-page.footer role="contentinfo">
                    <p>Footer content</p>
                </x-page.footer>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-footer');
        $view->assertSee('role="main"');
        $view->assertSee('aria-label="Main Content"');
        $view->assertSee('role="banner"');
        $view->assertSee('role="contentinfo"');
        $view->assertSee('Accessible Page');
        $view->assertSee('Main content');
        $view->assertSee('Footer content');
    }

    public function test_renders_page_with_bootstrap_utilities(): void
    {
        $view = $this->blade('
            <x-page class="bg-light">
                <x-page.header class="border-bottom">
                    <x-page.title class="text-primary">Styled Page</x-page.title>
                </x-page.header>
                <x-page.body class="py-4">
                    <p class="text-muted">Styled content</p>
                </x-page.body>
                <x-page.footer class="border-top">
                    <p class="text-center">Styled footer</p>
                </x-page.footer>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('bg-light');
        $view->assertSee('page-header');
        $view->assertSee('border-bottom');
        $view->assertSee('page-body');
        $view->assertSee('py-4');
        $view->assertSee('page-footer');
        $view->assertSee('border-top');
        $view->assertSee('page-title');
        $view->assertSee('text-primary');
        $view->assertSee('Styled Page');
        $view->assertSee('text-muted');
        $view->assertSee('Styled content');
        $view->assertSee('text-center');
        $view->assertSee('Styled footer');
    }

    public function test_renders_page_with_responsive_classes(): void
    {
        $view = $this->blade('
            <x-page class="d-none d-md-block">
                <x-page.header>
                    <x-page.title>Responsive Page</x-page.title>
                </x-page.header>
                <x-page.body>
                    <p>This page is visible on desktop</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('page-header');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Responsive Page');
        $view->assertSee('This page is visible on desktop');
    }

    public function test_renders_page_with_spacing_utilities(): void
    {
        $view = $this->blade('
            <x-page class="m-3 p-2">
                <x-page.header class="mb-3">
                    <x-page.title>Spaced Page</x-page.title>
                </x-page.header>
                <x-page.body class="px-4">
                    <p>Content with spacing</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('page-header');
        $view->assertSee('mb-3');
        $view->assertSee('page-body');
        $view->assertSee('px-4');
        $view->assertSee('page-title');
        $view->assertSee('Spaced Page');
        $view->assertSee('Content with spacing');
    }

    public function test_renders_page_with_flexbox_utilities(): void
    {
        $view = $this->blade('
            <x-page class="d-flex flex-column">
                <x-page.header class="flex-shrink-0">
                    <x-page.title>Flexbox Page</x-page.title>
                </x-page.header>
                <x-page.body class="flex-grow-1">
                    <p>Flexible content</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('d-flex');
        $view->assertSee('flex-column');
        $view->assertSee('page-header');
        $view->assertSee('flex-shrink-0');
        $view->assertSee('page-body');
        $view->assertSee('flex-grow-1');
        $view->assertSee('page-title');
        $view->assertSee('Flexbox Page');
        $view->assertSee('Flexible content');
    }

    public function test_renders_page_with_background_utilities(): void
    {
        $view = $this->blade('
            <x-page class="bg-primary">
                <x-page.header class="bg-white">
                    <x-page.title class="text-primary">Background Page</x-page.title>
                </x-page.header>
                <x-page.body class="bg-light">
                    <p>Content with background</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('bg-primary');
        $view->assertSee('page-header');
        $view->assertSee('bg-white');
        $view->assertSee('page-body');
        $view->assertSee('bg-light');
        $view->assertSee('page-title');
        $view->assertSee('text-primary');
        $view->assertSee('Background Page');
        $view->assertSee('Content with background');
    }

    public function test_renders_page_with_border_utilities(): void
    {
        $view = $this->blade('
            <x-page class="border">
                <x-page.header class="border-bottom">
                    <x-page.title>Bordered Page</x-page.title>
                </x-page.header>
                <x-page.body class="border-start">
                    <p>Content with borders</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('border');
        $view->assertSee('page-header');
        $view->assertSee('border-bottom');
        $view->assertSee('page-body');
        $view->assertSee('border-start');
        $view->assertSee('page-title');
        $view->assertSee('Bordered Page');
        $view->assertSee('Content with borders');
    }

    public function test_renders_page_with_shadow_utilities(): void
    {
        $view = $this->blade('
            <x-page class="shadow">
                <x-page.header class="shadow-sm">
                    <x-page.title>Shadowed Page</x-page.title>
                </x-page.header>
                <x-page.body>
                    <p>Content with shadows</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('shadow');
        $view->assertSee('page-header');
        $view->assertSee('shadow-sm');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Shadowed Page');
        $view->assertSee('Content with shadows');
    }

    public function test_renders_page_with_position_utilities(): void
    {
        $view = $this->blade('
            <x-page class="position-relative">
                <x-page.header class="position-sticky top-0">
                    <x-page.title>Positioned Page</x-page.title>
                </x-page.header>
                <x-page.body>
                    <p>Content with positioning</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('position-relative');
        $view->assertSee('page-header');
        $view->assertSee('position-sticky');
        $view->assertSee('top-0');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Positioned Page');
        $view->assertSee('Content with positioning');
    }

    public function test_renders_page_with_visibility_utilities(): void
    {
        $view = $this->blade('
            <x-page class="visible">
                <x-page.header class="opacity-75">
                    <x-page.title>Visible Page</x-page.title>
                </x-page.header>
                <x-page.body>
                    <p>Content with visibility</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('visible');
        $view->assertSee('page-header');
        $view->assertSee('opacity-75');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Visible Page');
        $view->assertSee('Content with visibility');
    }

    public function test_renders_page_with_overflow_utilities(): void
    {
        $view = $this->blade('
            <x-page class="overflow-auto">
                <x-page.header class="overflow-hidden">
                    <x-page.title>Overflow Page</x-page.title>
                </x-page.header>
                <x-page.body>
                    <p>Content with overflow</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('overflow-auto');
        $view->assertSee('page-header');
        $view->assertSee('overflow-hidden');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Overflow Page');
        $view->assertSee('Content with overflow');
    }

    public function test_renders_page_with_interaction_utilities(): void
    {
        $view = $this->blade('
            <x-page class="user-select-all">
                <x-page.header class="pe-none">
                    <x-page.title>Interactive Page</x-page.title>
                </x-page.header>
                <x-page.body>
                    <p>Content with interactions</p>
                </x-page.body>
            </x-page>
        ');

        $view->assertSee('page-wrapper');
        $view->assertSee('user-select-all');
        $view->assertSee('page-header');
        $view->assertSee('pe-none');
        $view->assertSee('page-body');
        $view->assertSee('page-title');
        $view->assertSee('Interactive Page');
        $view->assertSee('Content with interactions');
    }
}
