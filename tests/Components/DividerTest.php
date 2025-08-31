<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class DividerTest extends TestCase
{
    public function test_renders_basic_divider(): void
    {
        $view = $this->blade('<x-divider>Section Title</x-divider>');
        
        $view->assertSee('Section Title');
        $view->assertSee('hr-text');
    }

    public function test_renders_divider_with_center_position(): void
    {
        $view = $this->blade('<x-divider position="center">Centered Title</x-divider>');
        
        $view->assertSee('Centered Title');
        $view->assertSee('hr-text-center');
    }

    public function test_renders_divider_with_start_position(): void
    {
        $view = $this->blade('<x-divider position="start">Left Title</x-divider>');
        
        $view->assertSee('Left Title');
        $view->assertSee('hr-text-start');
    }

    public function test_renders_divider_with_end_position(): void
    {
        $view = $this->blade('<x-divider position="end">Right Title</x-divider>');
        
        $view->assertSee('Right Title');
        $view->assertSee('hr-text-end');
    }

    public function test_renders_divider_with_primary_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="primary">Primary Color</x-divider>');
        
        $view->assertSee('Primary Color');
        $view->assertSee('text-primary');
    }

    public function test_renders_divider_with_secondary_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="secondary">Secondary Color</x-divider>');
        
        $view->assertSee('Secondary Color');
        $view->assertSee('text-secondary');
    }

    public function test_renders_divider_with_success_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="success">Success Color</x-divider>');
        
        $view->assertSee('Success Color');
        $view->assertSee('text-success');
    }

    public function test_renders_divider_with_warning_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="warning">Warning Color</x-divider>');
        
        $view->assertSee('Warning Color');
        $view->assertSee('text-warning');
    }

    public function test_renders_divider_with_danger_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="danger">Danger Color</x-divider>');
        
        $view->assertSee('Danger Color');
        $view->assertSee('text-danger');
    }

    public function test_renders_divider_with_info_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="info">Info Color</x-divider>');
        
        $view->assertSee('Info Color');
        $view->assertSee('text-info');
    }

    public function test_renders_divider_with_custom_class(): void
    {
        $view = $this->blade('<x-divider position="center" class="my-4">Custom Class</x-divider>');
        
        $view->assertSee('Custom Class');
        $view->assertSee('my-4');
    }

    public function test_renders_divider_with_custom_id(): void
    {
        $view = $this->blade('<x-divider position="center" id="section-divider">Custom ID</x-divider>');
        
        $view->assertSee('Custom ID');
        $view->assertSee('id="section-divider"');
    }

    public function test_renders_divider_with_inline_style(): void
    {
        $view = $this->blade('<x-divider position="center" style="margin: 2rem 0;">Custom Style</x-divider>');
        
        $view->assertSee('Custom Style');
        $view->assertSee('margin: 2rem 0');
    }

    public function test_renders_divider_with_data_attributes(): void
    {
        $view = $this->blade('<x-divider position="center" data-section="content" data-type="separator">Data Attributes</x-divider>');
        
        $view->assertSee('Data Attributes');
        $view->assertSee('data-section="content"');
        $view->assertSee('data-type="separator"');
    }

    public function test_renders_divider_with_multiple_classes(): void
    {
        $view = $this->blade('<x-divider position="center" class="my-4 text-center">Multiple Classes</x-divider>');
        
        $view->assertSee('Multiple Classes');
        $view->assertSee('my-4');
        $view->assertSee('text-center');
    }

    public function test_renders_divider_with_position_and_color(): void
    {
        $view = $this->blade('<x-divider position="center" color="primary">Position and Color</x-divider>');
        
        $view->assertSee('Position and Color');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-primary');
    }

    public function test_renders_divider_in_card_layout(): void
    {
        $view = $this->blade('
            <div class="card">
                <div class="card-header">
                    <h5>Card Title</h5>
                </div>
                <div class="card-body">
                    <p>Some content here...</p>
                    <x-divider position="center" color="secondary">More Content</x-divider>
                    <p>Additional content...</p>
                </div>
            </div>
        ');
        
        $view->assertSee('Card Title');
        $view->assertSee('Some content here...');
        $view->assertSee('More Content');
        $view->assertSee('Additional content...');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-secondary');
    }

    public function test_renders_divider_in_form_sections(): void
    {
        $view = $this->blade('
            <form>
                <div class="mb-3">
                    <label>Personal Information</label>
                    <input type="text" class="form-control" />
                </div>
                
                <x-divider position="center" color="primary">Contact Information</x-divider>
                
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" />
                </div>
                
                <x-divider position="center" color="primary">Additional Information</x-divider>
                
                <div class="mb-3">
                    <label>Notes</label>
                    <textarea class="form-control"></textarea>
                </div>
            </form>
        ');
        
        $view->assertSee('Personal Information');
        $view->assertSee('Contact Information');
        $view->assertSee('Email');
        $view->assertSee('Additional Information');
        $view->assertSee('Notes');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-primary');
    }

    public function test_renders_divider_in_navigation(): void
    {
        $view = $this->blade('
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">Brand</a>
                    
                    <div class="navbar-nav">
                        <a class="nav-link" href="#">Home</a>
                        <a class="nav-link" href="#">About</a>
                        <a class="nav-link" href="#">Services</a>
                        
                        <x-divider position="center" class="navbar-divider">|</x-divider>
                        
                        <a class="nav-link" href="#">Contact</a>
                        <a class="nav-link" href="#">Login</a>
                    </div>
                </div>
            </nav>
        ');
        
        $view->assertSee('Brand');
        $view->assertSee('Home');
        $view->assertSee('About');
        $view->assertSee('Services');
        $view->assertSee('|');
        $view->assertSee('Contact');
        $view->assertSee('Login');
        $view->assertSee('navbar-divider');
    }

    public function test_renders_divider_in_sidebar(): void
    {
        $view = $this->blade('
            <div class="sidebar">
                <div class="sidebar-section">
                    <h6>Main Menu</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Users</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>
                    </ul>
                </div>
                
                <x-divider position="center" color="secondary">Quick Actions</x-divider>
                
                <div class="sidebar-section">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="#" class="nav-link">Add User</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Export Data</a></li>
                    </ul>
                </div>
            </div>
        ');
        
        $view->assertSee('Main Menu');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('Quick Actions');
        $view->assertSee('Add User');
        $view->assertSee('Export Data');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-secondary');
    }

    public function test_renders_content_management_system(): void
    {
        $view = $this->blade('
            <div class="content-editor">
                <div class="toolbar">
                    <button class="btn btn-sm btn-outline-primary">Bold</button>
                    <button class="btn btn-sm btn-outline-primary">Italic</button>
                    <button class="btn btn-sm btn-outline-primary">Underline</button>
                    
                    <x-divider position="center" class="mx-2">|</x-divider>
                    
                    <button class="btn btn-sm btn-outline-secondary">Align Left</button>
                    <button class="btn btn-sm btn-outline-secondary">Align Center</button>
                    <button class="btn btn-sm btn-outline-secondary">Align Right</button>
                    
                    <x-divider position="center" class="mx-2">|</x-divider>
                    
                    <button class="btn btn-sm btn-outline-success">Save</button>
                    <button class="btn btn-sm btn-outline-danger">Cancel</button>
                </div>
                
                <div class="editor-content">
                    <textarea class="form-control" rows="10"></textarea>
                </div>
            </div>
        ');
        
        $view->assertSee('Bold');
        $view->assertSee('Italic');
        $view->assertSee('Underline');
        $view->assertSee('|');
        $view->assertSee('Align Left');
        $view->assertSee('Align Center');
        $view->assertSee('Align Right');
        $view->assertSee('Save');
        $view->assertSee('Cancel');
        $view->assertSee('mx-2');
    }

    public function test_renders_ecommerce_product_page(): void
    {
        $view = $this->blade('
            <div class="product-page">
                <div class="product-images">
                    <!-- Product images here -->
                </div>
                
                <div class="product-info">
                    <h1>Product Name</h1>
                    <p class="price">$99.99</p>
                    <button class="btn btn-primary">Add to Cart</button>
                    
                    <x-divider position="center" color="secondary">Product Details</x-divider>
                    
                    <div class="product-description">
                        <p>Detailed product description...</p>
                    </div>
                    
                    <x-divider position="center" color="secondary">Specifications</x-divider>
                    
                    <div class="product-specs">
                        <ul>
                            <li>Specification 1</li>
                            <li>Specification 2</li>
                            <li>Specification 3</li>
                        </ul>
                    </div>
                    
                    <x-divider position="center" color="secondary">Customer Reviews</x-divider>
                    
                    <div class="reviews">
                        <!-- Reviews content -->
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('Product Name');
        $view->assertSee('$99.99');
        $view->assertSee('Add to Cart');
        $view->assertSee('Product Details');
        $view->assertSee('Detailed product description...');
        $view->assertSee('Specifications');
        $view->assertSee('Specification 1');
        $view->assertSee('Specification 2');
        $view->assertSee('Specification 3');
        $view->assertSee('Customer Reviews');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-secondary');
    }

    public function test_renders_dashboard_layout(): void
    {
        $view = $this->blade('
            <div class="dashboard">
                <div class="dashboard-header">
                    <h2>Dashboard</h2>
                    <div class="header-actions">
                        <button class="btn btn-primary">Export</button>
                        <button class="btn btn-secondary">Settings</button>
                    </div>
                </div>
                
                <x-divider position="center" color="primary">Overview</x-divider>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Total Users</h3>
                        <p class="stat-number">1,234</p>
                    </div>
                    <div class="stat-card">
                        <h3>Revenue</h3>
                        <p class="stat-number">$45,678</p>
                    </div>
                    <div class="stat-card">
                        <h3>Orders</h3>
                        <p class="stat-number">567</p>
                    </div>
                </div>
                
                <x-divider position="center" color="primary">Recent Activity</x-divider>
                
                <div class="activity-feed">
                    <!-- Activity items -->
                </div>
                
                <x-divider position="center" color="primary">Quick Actions</x-divider>
                
                <div class="quick-actions">
                    <button class="btn btn-outline-primary">Add User</button>
                    <button class="btn btn-outline-success">Create Order</button>
                    <button class="btn btn-outline-info">Generate Report</button>
                </div>
            </div>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Export');
        $view->assertSee('Settings');
        $view->assertSee('Overview');
        $view->assertSee('Total Users');
        $view->assertSee('1,234');
        $view->assertSee('Revenue');
        $view->assertSee('$45,678');
        $view->assertSee('Orders');
        $view->assertSee('567');
        $view->assertSee('Recent Activity');
        $view->assertSee('Quick Actions');
        $view->assertSee('Add User');
        $view->assertSee('Create Order');
        $view->assertSee('Generate Report');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-primary');
    }

    public function test_renders_blog_post_layout(): void
    {
        $view = $this->blade('
            <article class="blog-post">
                <header class="post-header">
                    <h1>Blog Post Title</h1>
                    <div class="post-meta">
                        <span class="author">By John Doe</span>
                        <span class="date">January 15, 2024</span>
                        <span class="category">Technology</span>
                    </div>
                </header>
                
                <div class="post-content">
                    <p>Introduction paragraph...</p>
                    
                    <x-divider position="center" color="secondary">Main Content</x-divider>
                    
                    <p>Main content paragraphs...</p>
                    
                    <x-divider position="center" color="secondary">Conclusion</x-divider>
                    
                    <p>Conclusion paragraph...</p>
                </div>
                
                <footer class="post-footer">
                    <x-divider position="center" color="primary">Share This Post</x-divider>
                    
                    <div class="social-share">
                        <button class="btn btn-outline-primary">Facebook</button>
                        <button class="btn btn-outline-info">Twitter</button>
                        <button class="btn btn-outline-success">LinkedIn</button>
                    </div>
                </footer>
            </article>
        ');
        
        $view->assertSee('Blog Post Title');
        $view->assertSee('By John Doe');
        $view->assertSee('January 15, 2024');
        $view->assertSee('Technology');
        $view->assertSee('Introduction paragraph...');
        $view->assertSee('Main Content');
        $view->assertSee('Main content paragraphs...');
        $view->assertSee('Conclusion');
        $view->assertSee('Conclusion paragraph...');
        $view->assertSee('Share This Post');
        $view->assertSee('Facebook');
        $view->assertSee('Twitter');
        $view->assertSee('LinkedIn');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-secondary');
        $view->assertSee('text-primary');
    }

    public function test_renders_settings_page(): void
    {
        $view = $this->blade('
            <div class="settings-page">
                <h2>Account Settings</h2>
                
                <div class="settings-section">
                    <h4>Personal Information</h4>
                    <form>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" />
                        </div>
                    </form>
                </div>
                
                <x-divider position="center" color="secondary">Security Settings</x-divider>
                
                <div class="settings-section">
                    <h4>Password & Security</h4>
                    <form>
                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" class="form-control" />
                        </div>
                    </form>
                </div>
                
                <x-divider position="center" color="secondary">Notification Preferences</x-divider>
                
                <div class="settings-section">
                    <h4>Notifications</h4>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="email-notifications" />
                        <label class="form-check-label" for="email-notifications">
                            Email Notifications
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="sms-notifications" />
                        <label class="form-check-label" for="sms-notifications">
                            SMS Notifications
                        </label>
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('Account Settings');
        $view->assertSee('Personal Information');
        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('Security Settings');
        $view->assertSee('Password & Security');
        $view->assertSee('Current Password');
        $view->assertSee('New Password');
        $view->assertSee('Notification Preferences');
        $view->assertSee('Notifications');
        $view->assertSee('Email Notifications');
        $view->assertSee('SMS Notifications');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-secondary');
    }

    public function test_renders_admin_panel(): void
    {
        $view = $this->blade('
            <div class="admin-panel">
                <div class="admin-header">
                    <h1>Admin Dashboard</h1>
                    <div class="admin-actions">
                        <button class="btn btn-primary">Add New</button>
                        <button class="btn btn-secondary">Bulk Actions</button>
                    </div>
                </div>
                
                <x-divider position="center" color="primary">User Management</x-divider>
                
                <div class="user-management">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- User rows -->
                        </tbody>
                    </table>
                </div>
                
                <x-divider position="center" color="primary">System Statistics</x-divider>
                
                <div class="system-stats">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h5>Total Users</h5>
                                <p>1,234</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h5>Active Sessions</h5>
                                <p>567</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h5>System Load</h5>
                                <p>45%</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stat-card">
                                <h5>Storage Used</h5>
                                <p>2.5GB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('Admin Dashboard');
        $view->assertSee('Add New');
        $view->assertSee('Bulk Actions');
        $view->assertSee('User Management');
        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('Role');
        $view->assertSee('Actions');
        $view->assertSee('System Statistics');
        $view->assertSee('Total Users');
        $view->assertSee('1,234');
        $view->assertSee('Active Sessions');
        $view->assertSee('567');
        $view->assertSee('System Load');
        $view->assertSee('45%');
        $view->assertSee('Storage Used');
        $view->assertSee('2.5GB');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-primary');
    }

    public function test_renders_divider_with_empty_content(): void
    {
        $view = $this->blade('<x-divider position="center"></x-divider>');
        
        $view->assertSee('hr-text');
        $view->assertSee('hr-text-center');
    }

    public function test_renders_divider_with_special_characters(): void
    {
        $view = $this->blade('<x-divider position="center">&lt; &gt; &amp; &quot;</x-divider>');
        
        $view->assertSee('< > & "');
        $view->assertSee('hr-text-center');
    }

    public function test_renders_divider_with_html_content(): void
    {
        $view = $this->blade('<x-divider position="center"><strong>Bold Text</strong></x-divider>');
        
        $view->assertSee('<strong>Bold Text</strong>');
        $view->assertSee('hr-text-center');
    }

    public function test_renders_divider_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-divider position="center" aria-label="Section separator" role="separator">Accessible Divider</x-divider>');
        
        $view->assertSee('Accessible Divider');
        $view->assertSee('aria-label="Section separator"');
        $view->assertSee('role="separator"');
        $view->assertSee('hr-text-center');
    }

    public function test_renders_divider_with_complex_styling(): void
    {
        $view = $this->blade('
            <x-divider 
                position="center" 
                color="primary"
                class="my-5 custom-divider" 
                style="border-color: #007bff; border-width: 2px;"
                data-section="content"
                data-type="separator"
            >
                Complex Styled Divider
            </x-divider>
        ');
        
        $view->assertSee('Complex Styled Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-primary');
        $view->assertSee('my-5');
        $view->assertSee('custom-divider');
        $view->assertSee('border-color: #007bff');
        $view->assertSee('border-width: 2px');
        $view->assertSee('data-section="content"');
        $view->assertSee('data-type="separator"');
    }

    public function test_renders_divider_with_livewire_attributes(): void
    {
        $view = $this->blade('<x-divider position="center" wire:poll.10s>Livewire Divider</x-divider>');
        
        $view->assertSee('Livewire Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('wire:poll.10s');
    }

    public function test_renders_divider_with_bootstrap_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="text-center text-uppercase text-decoration-underline">Bootstrap Utilities</x-divider>');
        
        $view->assertSee('Bootstrap Utilities');
        $view->assertSee('hr-text-center');
        $view->assertSee('text-center');
        $view->assertSee('text-uppercase');
        $view->assertSee('text-decoration-underline');
    }

    public function test_renders_divider_with_responsive_classes(): void
    {
        $view = $this->blade('<x-divider position="center" class="d-none d-md-block text-lg-start">Responsive Divider</x-divider>');
        
        $view->assertSee('Responsive Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('text-lg-start');
    }

    public function test_renders_divider_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="m-3 p-2 border rounded">Spacing Divider</x-divider>');
        
        $view->assertSee('Spacing Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('border');
        $view->assertSee('rounded');
    }

    public function test_renders_divider_with_flexbox_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="d-flex justify-content-center align-items-center">Flexbox Divider</x-divider>');
        
        $view->assertSee('Flexbox Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('d-flex');
        $view->assertSee('justify-content-center');
        $view->assertSee('align-items-center');
    }

    public function test_renders_divider_with_background_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="bg-primary text-white">Background Divider</x-divider>');
        
        $view->assertSee('Background Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('bg-primary');
        $view->assertSee('text-white');
    }

    public function test_renders_divider_with_border_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="border border-primary border-2">Border Divider</x-divider>');
        
        $view->assertSee('Border Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('border-2');
    }

    public function test_renders_divider_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="shadow shadow-lg">Shadow Divider</x-divider>');
        
        $view->assertSee('Shadow Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('shadow');
        $view->assertSee('shadow-lg');
    }

    public function test_renders_divider_with_position_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="position-relative top-0 start-0">Position Divider</x-divider>');
        
        $view->assertSee('Position Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('position-relative');
        $view->assertSee('top-0');
        $view->assertSee('start-0');
    }

    public function test_renders_divider_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="visible opacity-75">Visibility Divider</x-divider>');
        
        $view->assertSee('Visibility Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
    }

    public function test_renders_divider_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="overflow-auto overflow-hidden">Overflow Divider</x-divider>');
        
        $view->assertSee('Overflow Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('overflow-auto');
        $view->assertSee('overflow-hidden');
    }

    public function test_renders_divider_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-divider position="center" class="user-select-all pe-none">Interaction Divider</x-divider>');
        
        $view->assertSee('Interaction Divider');
        $view->assertSee('hr-text-center');
        $view->assertSee('user-select-all');
        $view->assertSee('pe-none');
    }
}
