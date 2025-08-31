<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class GridTest extends TestCase
{
    public function test_renders_basic_grid(): void
    {
        $view = $this->blade('<x-grid />');

        $view->assertSee('datagrid');
    }

    public function test_renders_grid_with_custom_class(): void
    {
        $view = $this->blade('<x-grid class="custom-grid" />');

        $view->assertSee('datagrid');
        $view->assertSee('custom-grid');
    }

    public function test_renders_grid_with_custom_id(): void
    {
        $view = $this->blade('<x-grid id="user-grid" />');

        $view->assertSee('datagrid');
        $view->assertSee('id="user-grid"');
    }

    public function test_renders_grid_with_inline_style(): void
    {
        $view = $this->blade('<x-grid style="margin: 1rem;" />');

        $view->assertSee('datagrid');
        $view->assertSee('margin: 1rem');
    }

    public function test_renders_grid_with_data_attributes(): void
    {
        $view = $this->blade('<x-grid data-user-id="123" data-action="view" />');

        $view->assertSee('datagrid');
        $view->assertSee('data-user-id="123"');
        $view->assertSee('data-action="view"');
    }

    public function test_renders_grid_item_with_title_and_content(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Name" content="John Doe" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('datagrid-item');
        $view->assertSee('Name');
        $view->assertSee('John Doe');
    }

    public function test_renders_grid_item_with_title_only(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Name" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('datagrid-item');
        $view->assertSee('Name');
    }

    public function test_renders_grid_item_with_content_only(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item content="John Doe" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('datagrid-item');
        $view->assertSee('John Doe');
    }

    public function test_renders_grid_item_with_custom_class(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Name" content="John Doe" class="highlight-item" />
            </x-grid>
        ');

        $view->assertSee('datagrid-item');
        $view->assertSee('highlight-item');
    }

    public function test_renders_grid_item_with_slot_content(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Profile Picture">
                    <x-grid.content>
                        <img src="avatar.jpg" class="rounded-circle" alt="Avatar" />
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('datagrid-item');
        $view->assertSee('datagrid-content');
        $view->assertSee('Profile Picture');
        $view->assertSee('avatar.jpg');
        $view->assertSee('rounded-circle');
    }

    public function test_renders_grid_title_subcomponent(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item>
                    <x-grid.title>Custom Title</x-grid.title>
                    <x-grid.content>Custom Content</x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('datagrid-title');
        $view->assertSee('datagrid-content');
        $view->assertSee('Custom Title');
        $view->assertSee('Custom Content');
    }

    public function test_renders_grid_title_with_custom_class(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item>
                    <x-grid.title class="fw-bold">Bold Title</x-grid.title>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('datagrid-title');
        $view->assertSee('fw-bold');
        $view->assertSee('Bold Title');
    }

    public function test_renders_grid_content_with_custom_class(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item>
                    <x-grid.content class="text-muted">Muted Content</x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('datagrid-content');
        $view->assertSee('text-muted');
        $view->assertSee('Muted Content');
    }

    public function test_renders_multiple_grid_items(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Name" content="John Doe" />
                <x-grid.item title="Email" content="john@example.com" />
                <x-grid.item title="Role" content="Administrator" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('datagrid-item');
        $view->assertSee('Name');
        $view->assertSee('John Doe');
        $view->assertSee('Email');
        $view->assertSee('john@example.com');
        $view->assertSee('Role');
        $view->assertSee('Administrator');
    }

    public function test_renders_grid_with_complex_content(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Skills">
                    <x-grid.content>
                        <span class="badge bg-primary me-1">PHP</span>
                        <span class="badge bg-success me-1">Laravel</span>
                        <span class="badge bg-info">Vue.js</span>
                    </x-grid.content>
                </x-grid.item>

                <x-grid.item title="Projects">
                    <x-grid.content>
                        <ul class="list-unstyled mb-0">
                            <li>E-commerce Platform</li>
                            <li>CRM System</li>
                        </ul>
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('Skills');
        $view->assertSee('Projects');
        $view->assertSee('badge bg-primary');
        $view->assertSee('badge bg-success');
        $view->assertSee('badge bg-info');
        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertSee('E-commerce Platform');
        $view->assertSee('CRM System');
        $view->assertSee('list-unstyled');
    }

    public function test_renders_grid_with_conditional_content(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Email" content="john@example.com" />
                <x-grid.item title="Phone" content="Not provided" />

                <x-grid.item title="Status">
                    <x-grid.content>
                        <span class="badge bg-success">Active</span>
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('Email');
        $view->assertSee('john@example.com');
        $view->assertSee('Phone');
        $view->assertSee('Not provided');
        $view->assertSee('Status');
        $view->assertSee('badge bg-success');
        $view->assertSee('Active');
    }

    public function test_renders_grid_in_card(): void
    {
        $view = $this->blade('
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">User Information</h5>
                </div>
                <div class="card-body">
                    <x-grid>
                        <x-grid.item title="Name" content="John Doe" />
                        <x-grid.item title="Email" content="john@example.com" />
                        <x-grid.item title="Role" content="Administrator" />
                    </x-grid>
                </div>
            </div>
        ');

        $view->assertSee('card');
        $view->assertSee('card-header');
        $view->assertSee('card-body');
        $view->assertSee('User Information');
        $view->assertSee('datagrid');
        $view->assertSee('Name');
        $view->assertSee('John Doe');
        $view->assertSee('Email');
        $view->assertSee('john@example.com');
        $view->assertSee('Role');
        $view->assertSee('Administrator');
    }

    public function test_renders_grid_with_icons(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Contact">
                    <x-grid.content>
                        <x-icon name="mail" class="me-2" />
                        john@example.com
                    </x-grid.content>
                </x-grid.item>

                <x-grid.item title="Location">
                    <x-grid.content>
                        <x-icon name="map-pin" class="me-2" />
                        New York, NY
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('Contact');
        $view->assertSee('Location');
        $view->assertSee('john@example.com');
        $view->assertSee('New York, NY');
        $view->assertSee('ti ti-mail');
        $view->assertSee('ti ti-map-pin');
    }

    public function test_renders_grid_with_forms(): void
    {
        $view = $this->blade('
            <x-grid>
                <x-grid.item title="Current Password">
                    <x-grid.content>
                        <x-form-password name="current_password" />
                    </x-grid.content>
                </x-grid.item>

                <x-grid.item title="New Password">
                    <x-grid.content>
                        <x-form-password name="new_password" />
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('Current Password');
        $view->assertSee('New Password');
        $view->assertSee('name="current_password"');
        $view->assertSee('name="new_password"');
    }

    public function test_renders_grid_with_livewire(): void
    {
        $view = $this->blade('
            <div wire:poll.10s>
                <x-grid>
                    <x-grid.item title="Last Updated" content="12:34:56" />
                    <x-grid.item title="Status">
                        <x-grid.content>
                            <span class="badge bg-success">Online</span>
                        </x-grid.content>
                    </x-grid.item>
                </x-grid>
            </div>
        ');

        $view->assertSee('wire:poll.10s');
        $view->assertSee('Last Updated');
        $view->assertSee('12:34:56');
        $view->assertSee('Status');
        $view->assertSee('badge bg-success');
        $view->assertSee('Online');
    }

    public function test_renders_user_profile_settings(): void
    {
        $view = $this->blade('
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <x-grid>
                                <x-grid.item title="First Name" content="John" />
                                <x-grid.item title="Last Name" content="Doe" />
                                <x-grid.item title="Date of Birth" content="Jan 15, 1990" />
                                <x-grid.item title="Gender" content="Male" />
                                <x-grid.item title="Nationality" content="American" />
                            </x-grid>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Contact Information</h5>
                        </div>
                        <div class="card-body">
                            <x-grid>
                                <x-grid.item title="Email" content="john@example.com" />
                                <x-grid.item title="Phone" content="+1 (555) 123-4567" />
                                <x-grid.item title="Address" content="123 Main St" />
                                <x-grid.item title="City" content="New York" />
                                <x-grid.item title="Country" content="USA" />
                            </x-grid>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('row');
        $view->assertSee('col-md-6');
        $view->assertSee('card');
        $view->assertSee('Personal Information');
        $view->assertSee('Contact Information');
        $view->assertSee('First Name');
        $view->assertSee('John');
        $view->assertSee('Last Name');
        $view->assertSee('Doe');
        $view->assertSee('Email');
        $view->assertSee('john@example.com');
        $view->assertSee('Phone');
        $view->assertSee('+1 (555) 123-4567');
    }

    public function test_renders_product_information_display(): void
    {
        $view = $this->blade('
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Product Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="product.jpg" class="img-fluid rounded" alt="Product" />
                        </div>
                        <div class="col-md-8">
                            <x-grid>
                                <x-grid.item title="Product Name" content="Laptop Pro" />
                                <x-grid.item title="SKU" content="LAP-001" />
                                <x-grid.item title="Category" content="Electronics" />
                                <x-grid.item title="Brand" content="TechCorp" />
                                <x-grid.item title="Price" content="$1,299.99" />
                                <x-grid.item title="Stock" content="50 units" />
                                <x-grid.item title="Weight" content="2.5 kg" />
                                <x-grid.item title="Dimensions" content="35 x 24 x 2 cm" />
                                <x-grid.item title="Status">
                                    <x-grid.content>
                                        <span class="badge bg-success">Active</span>
                                    </x-grid.content>
                                </x-grid.item>
                            </x-grid>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('Product Details');
        $view->assertSee('product.jpg');
        $view->assertSee('img-fluid rounded');
        $view->assertSee('Product Name');
        $view->assertSee('Laptop Pro');
        $view->assertSee('SKU');
        $view->assertSee('LAP-001');
        $view->assertSee('Category');
        $view->assertSee('Electronics');
        $view->assertSee('Brand');
        $view->assertSee('TechCorp');
        $view->assertSee('Price');
        $view->assertSee('$1,299.99');
        $view->assertSee('Stock');
        $view->assertSee('50 units');
        $view->assertSee('Weight');
        $view->assertSee('2.5 kg');
        $view->assertSee('Dimensions');
        $view->assertSee('35 x 24 x 2 cm');
        $view->assertSee('Status');
        $view->assertSee('badge bg-success');
        $view->assertSee('Active');
    }

    public function test_renders_order_summary(): void
    {
        $view = $this->blade('
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Order #ORD-12345</h5>
                </div>
                <div class="card-body">
                    <x-grid>
                        <x-grid.item title="Order Date" content="Jan 15, 2024 14:30" />
                        <x-grid.item title="Customer" content="John Doe" />
                        <x-grid.item title="Email" content="john@example.com" />
                        <x-grid.item title="Phone" content="+1 (555) 123-4567" />
                        <x-grid.item title="Shipping Address" content="123 Main St, New York, NY 10001" />
                        <x-grid.item title="Payment Method" content="Credit Card" />
                        <x-grid.item title="Subtotal" content="$299.99" />
                        <x-grid.item title="Tax" content="$24.00" />
                        <x-grid.item title="Shipping" content="$15.00" />
                        <x-grid.item title="Total" content="$338.99" />
                        <x-grid.item title="Status">
                            <x-grid.content>
                                <span class="badge bg-primary">Shipped</span>
                            </x-grid.content>
                        </x-grid.item>
                    </x-grid>
                </div>
            </div>
        ');

        $view->assertSee('Order #ORD-12345');
        $view->assertSee('Order Date');
        $view->assertSee('Jan 15, 2024 14:30');
        $view->assertSee('Customer');
        $view->assertSee('John Doe');
        $view->assertSee('Email');
        $view->assertSee('john@example.com');
        $view->assertSee('Phone');
        $view->assertSee('+1 (555) 123-4567');
        $view->assertSee('Shipping Address');
        $view->assertSee('123 Main St, New York, NY 10001');
        $view->assertSee('Payment Method');
        $view->assertSee('Credit Card');
        $view->assertSee('Subtotal');
        $view->assertSee('$299.99');
        $view->assertSee('Tax');
        $view->assertSee('$24.00');
        $view->assertSee('Shipping');
        $view->assertSee('$15.00');
        $view->assertSee('Total');
        $view->assertSee('$338.99');
        $view->assertSee('Status');
        $view->assertSee('badge bg-primary');
        $view->assertSee('Shipped');
    }

    public function test_renders_system_information_dashboard(): void
    {
        $view = $this->blade('
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Server Information</h5>
                        </div>
                        <div class="card-body">
                            <x-grid>
                                <x-grid.item title="Server Name" content="web-server-01" />
                                <x-grid.item title="PHP Version" content="8.3.0" />
                                <x-grid.item title="Laravel Version" content="11.0.0" />
                                <x-grid.item title="Database" content="mysql" />
                                <x-grid.item title="Cache Driver" content="redis" />
                                <x-grid.item title="Queue Driver" content="database" />
                                <x-grid.item title="Environment" content="production" />
                                <x-grid.item title="Debug Mode">
                                    <x-grid.content>
                                        <span class="badge bg-success">Disabled</span>
                                    </x-grid.content>
                                </x-grid.item>
                            </x-grid>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Application Statistics</h5>
                        </div>
                        <div class="card-body">
                            <x-grid>
                                <x-grid.item title="Total Users" content="1,234" />
                                <x-grid.item title="Active Users" content="567" />
                                <x-grid.item title="Total Orders" content="890" />
                                <x-grid.item title="Revenue" content="$45,678.90" />
                                <x-grid.item title="Products" content="123" />
                                <x-grid.item title="Categories" content="45" />
                                <x-grid.item title="Disk Usage" content="75%" />
                                <x-grid.item title="Memory Usage" content="60%" />
                            </x-grid>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('Server Information');
        $view->assertSee('Application Statistics');
        $view->assertSee('Server Name');
        $view->assertSee('web-server-01');
        $view->assertSee('PHP Version');
        $view->assertSee('8.3.0');
        $view->assertSee('Laravel Version');
        $view->assertSee('11.0.0');
        $view->assertSee('Database');
        $view->assertSee('mysql');
        $view->assertSee('Cache Driver');
        $view->assertSee('redis');
        $view->assertSee('Queue Driver');
        $view->assertSee('database');
        $view->assertSee('Environment');
        $view->assertSee('production');
        $view->assertSee('Debug Mode');
        $view->assertSee('badge bg-success');
        $view->assertSee('Disabled');
        $view->assertSee('Total Users');
        $view->assertSee('1,234');
        $view->assertSee('Active Users');
        $view->assertSee('567');
        $view->assertSee('Total Orders');
        $view->assertSee('890');
        $view->assertSee('Revenue');
        $view->assertSee('$45,678.90');
        $view->assertSee('Products');
        $view->assertSee('123');
        $view->assertSee('Categories');
        $view->assertSee('45');
        $view->assertSee('Disk Usage');
        $view->assertSee('75%');
        $view->assertSee('Memory Usage');
        $view->assertSee('60%');
    }

    public function test_renders_settings_configuration(): void
    {
        $view = $this->blade('
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Application Settings</h5>
                </div>
                <div class="card-body">
                    <x-grid>
                        <x-grid.item title="Site Name">
                            <x-grid.content>
                                <x-form-input name="site_name" value="My Application" />
                            </x-grid.content>
                        </x-grid.item>

                        <x-grid.item title="Site Description">
                            <x-grid.content>
                                <x-form-textarea name="site_description" value="A great application" />
                            </x-grid.content>
                        </x-grid.item>

                        <x-grid.item title="Maintenance Mode">
                            <x-grid.content>
                                <x-form-switch name="maintenance_mode" />
                            </x-grid.content>
                        </x-grid.item>

                        <x-grid.item title="Registration Enabled">
                            <x-grid.content>
                                <x-form-switch name="registration_enabled" />
                            </x-grid.content>
                        </x-grid.item>

                        <x-grid.item title="Email Notifications">
                            <x-grid.content>
                                <x-form-switch name="email_notifications" />
                            </x-grid.content>
                        </x-grid.item>

                        <x-grid.item title="Default Language">
                            <x-grid.content>
                                <x-form-select name="default_language" />
                            </x-grid.content>
                        </x-grid.item>
                    </x-grid>
                </div>
            </div>
        ');

        $view->assertSee('Application Settings');
        $view->assertSee('Site Name');
        $view->assertSee('Site Description');
        $view->assertSee('Maintenance Mode');
        $view->assertSee('Registration Enabled');
        $view->assertSee('Email Notifications');
        $view->assertSee('Default Language');
        $view->assertSee('name="site_name"');
        $view->assertSee('value="My Application"');
        $view->assertSee('name="site_description"');
        $view->assertSee('value="A great application"');
        $view->assertSee('name="maintenance_mode"');
        $view->assertSee('name="registration_enabled"');
        $view->assertSee('name="email_notifications"');
        $view->assertSee('name="default_language"');
    }

    public function test_renders_grid_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-grid role="grid" aria-label="User Information">
                <x-grid.item role="row" title="Name" content="John Doe" />
                <x-grid.item role="row" title="Email" content="john@example.com" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('role="grid"');
        $view->assertSee('aria-label="User Information"');
        $view->assertSee('role="row"');
        $view->assertSee('Name');
        $view->assertSee('John Doe');
        $view->assertSee('Email');
        $view->assertSee('john@example.com');
    }

    public function test_renders_grid_with_bootstrap_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="border rounded p-3">
                <x-grid.item title="Status" content="Active" class="border-bottom" />
                <x-grid.item title="Last Login" content="2 hours ago" class="border-bottom" />
                <x-grid.item title="Permissions" content="Admin" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('border');
        $view->assertSee('rounded');
        $view->assertSee('p-3');
        $view->assertSee('datagrid-item');
        $view->assertSee('border-bottom');
        $view->assertSee('Status');
        $view->assertSee('Active');
        $view->assertSee('Last Login');
        $view->assertSee('2 hours ago');
        $view->assertSee('Permissions');
        $view->assertSee('Admin');
    }

    public function test_renders_grid_with_complex_styling(): void
    {
        $view = $this->blade('
            <x-grid
                class="custom-grid"
                style="background: #f8f9fa; border-radius: 0.5rem;"
                data-grid-id="user-info"
            >
                <x-grid.item
                    title="Profile"
                    class="highlight-item"
                    style="border-left: 3px solid #007bff;"
                >
                    <x-grid.content>
                        <img src="avatar.jpg" class="rounded-circle me-2" width="40" height="40" />
                        <span class="fw-bold">John Doe</span>
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('custom-grid');
        $view->assertSee('background: #f8f9fa');
        $view->assertSee('border-radius: 0.5rem');
        $view->assertSee('data-grid-id="user-info"');
        $view->assertSee('datagrid-item');
        $view->assertSee('highlight-item');
        $view->assertSee('border-left: 3px solid #007bff');
        $view->assertSee('Profile');
        $view->assertSee('avatar.jpg');
        $view->assertSee('rounded-circle');
        $view->assertSee('me-2');
        $view->assertSee('fw-bold');
        $view->assertSee('John Doe');
    }

    public function test_renders_grid_with_livewire_attributes(): void
    {
        $view = $this->blade('
            <x-grid wire:poll.10s>
                <x-grid.item title="Last Updated" content="{{ now() }}" />
                <x-grid.item title="Status">
                    <x-grid.content>
                        <span wire:loading.class="opacity-50">Online</span>
                    </x-grid.content>
                </x-grid.item>
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('wire:poll.10s');
        $view->assertSee('Last Updated');
        $view->assertSee('Status');
        $view->assertSee('Online');
        $view->assertSee('wire:loading.class="opacity-50"');
    }

    public function test_renders_grid_with_responsive_classes(): void
    {
        $view = $this->blade('
            <x-grid class="d-none d-md-block">
                <x-grid.item title="Desktop Only" content="This is visible on desktop" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('Desktop Only');
        $view->assertSee('This is visible on desktop');
    }

    public function test_renders_grid_with_spacing_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="m-3 p-2">
                <x-grid.item title="Spaced Item" content="With margins and padding" class="mb-2" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('datagrid-item');
        $view->assertSee('mb-2');
        $view->assertSee('Spaced Item');
        $view->assertSee('With margins and padding');
    }

    public function test_renders_grid_with_flexbox_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="d-flex justify-content-center">
                <x-grid.item title="Centered" content="Flexbox centered content" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('d-flex');
        $view->assertSee('justify-content-center');
        $view->assertSee('Centered');
        $view->assertSee('Flexbox centered content');
    }

    public function test_renders_grid_with_background_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="bg-light">
                <x-grid.item title="Light Background" content="With light background" class="bg-white" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('bg-light');
        $view->assertSee('datagrid-item');
        $view->assertSee('bg-white');
        $view->assertSee('Light Background');
        $view->assertSee('With light background');
    }

    public function test_renders_grid_with_border_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="border border-primary">
                <x-grid.item title="Bordered" content="With primary border" class="border-bottom" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('datagrid-item');
        $view->assertSee('border-bottom');
        $view->assertSee('Bordered');
        $view->assertSee('With primary border');
    }

    public function test_renders_grid_with_shadow_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="shadow">
                <x-grid.item title="Shadowed" content="With shadow effect" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('shadow');
        $view->assertSee('Shadowed');
        $view->assertSee('With shadow effect');
    }

    public function test_renders_grid_with_position_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="position-relative">
                <x-grid.item title="Positioned" content="With relative positioning" class="top-0" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('position-relative');
        $view->assertSee('datagrid-item');
        $view->assertSee('top-0');
        $view->assertSee('Positioned');
        $view->assertSee('With relative positioning');
    }

    public function test_renders_grid_with_visibility_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="visible">
                <x-grid.item title="Visible" content="With visibility utility" class="opacity-75" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('visible');
        $view->assertSee('datagrid-item');
        $view->assertSee('opacity-75');
        $view->assertSee('Visible');
        $view->assertSee('With visibility utility');
    }

    public function test_renders_grid_with_overflow_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="overflow-auto">
                <x-grid.item title="Overflow" content="With overflow utility" class="overflow-hidden" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('overflow-auto');
        $view->assertSee('datagrid-item');
        $view->assertSee('overflow-hidden');
        $view->assertSee('Overflow');
        $view->assertSee('With overflow utility');
    }

    public function test_renders_grid_with_interaction_utilities(): void
    {
        $view = $this->blade('
            <x-grid class="user-select-all">
                <x-grid.item title="Interactive" content="With interaction utilities" class="pe-none" />
            </x-grid>
        ');

        $view->assertSee('datagrid');
        $view->assertSee('user-select-all');
        $view->assertSee('datagrid-item');
        $view->assertSee('pe-none');
        $view->assertSee('Interactive');
        $view->assertSee('With interaction utilities');
    }
}
