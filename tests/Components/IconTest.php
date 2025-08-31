<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class IconTest extends TestCase
{
    public function test_renders_basic_icon(): void
    {
        $view = $this->blade('<x-icon name="home" />');
        
        $view->assertSee('ti ti-home');
    }

    public function test_renders_icon_with_label(): void
    {
        $view = $this->blade('<x-icon name="user" label="Profile" />');
        
        $view->assertSee('ti ti-user');
        $view->assertSee('Profile');
        $view->assertSee('inline-flex');
    }

    public function test_renders_icon_with_action(): void
    {
        $view = $this->blade('<x-icon name="trash" action="deleteItem(1)" />');
        
        $view->assertSee('ti ti-trash');
        $view->assertSee('onclick="deleteItem(1)"');
        $view->assertSee('cursor-pointer');
    }

    public function test_renders_icon_with_small_size(): void
    {
        $view = $this->blade('<x-icon name="star" size="sm" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('ti-sm');
    }

    public function test_renders_icon_with_medium_size(): void
    {
        $view = $this->blade('<x-icon name="star" size="md" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('ti-md');
    }

    public function test_renders_icon_with_large_size(): void
    {
        $view = $this->blade('<x-icon name="star" size="lg" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('ti-lg');
    }

    public function test_renders_icon_with_gap(): void
    {
        $view = $this->blade('<x-icon name="heart" label="Like" :gap="true" />');
        
        $view->assertSee('ti ti-heart');
        $view->assertSee('Like');
        $view->assertSee('me-1');
    }

    public function test_renders_icon_with_tooltip(): void
    {
        $view = $this->blade('<x-icon name="info" title="Click for more information" />');
        
        $view->assertSee('ti ti-info');
        $view->assertSee('title="Click for more information"');
        $view->assertSee('data-bs-toggle="tooltip"');
    }

    public function test_renders_icon_with_custom_class(): void
    {
        $view = $this->blade('<x-icon name="check" class="text-success" />');
        
        $view->assertSee('ti ti-check');
        $view->assertSee('text-success');
    }

    public function test_renders_icon_with_custom_id(): void
    {
        $view = $this->blade('<x-icon name="home" id="home-icon" />');
        
        $view->assertSee('ti ti-home');
        $view->assertSee('id="home-icon"');
    }

    public function test_renders_icon_with_inline_style(): void
    {
        $view = $this->blade('<x-icon name="check" style="font-size: 1.5rem;" />');
        
        $view->assertSee('ti ti-check');
        $view->assertSee('font-size: 1.5rem');
    }

    public function test_renders_icon_with_data_attributes(): void
    {
        $view = $this->blade('<x-icon name="edit" data-item-id="123" data-action="edit" />');
        
        $view->assertSee('ti ti-edit');
        $view->assertSee('data-item-id="123"');
        $view->assertSee('data-action="edit"');
    }

    public function test_renders_icon_with_dot_notation(): void
    {
        $view = $this->blade('<x-icon name="user.profile" />');
        
        $view->assertSee('ti ti-user-profile');
    }

    public function test_renders_icon_with_multiple_classes(): void
    {
        $view = $this->blade('<x-icon name="star" class="text-warning fw-bold" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('text-warning');
        $view->assertSee('fw-bold');
    }

    public function test_renders_icon_with_size_and_class(): void
    {
        $view = $this->blade('<x-icon name="star" size="lg" class="text-warning" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('ti-lg');
        $view->assertSee('text-warning');
    }

    public function test_renders_icon_with_action_and_tooltip(): void
    {
        $view = $this->blade('<x-icon name="edit" action="editItem()" title="Edit item" />');
        
        $view->assertSee('ti ti-edit');
        $view->assertSee('onclick="editItem()"');
        $view->assertSee('title="Edit item"');
        $view->assertSee('data-bs-toggle="tooltip"');
    }

    public function test_renders_icon_in_navigation(): void
    {
        $view = $this->blade('
            <nav class="navbar">
                <div class="navbar-nav">
                    <a href="#" class="nav-link">
                        <x-icon name="home" label="Home" />
                    </a>
                    <a href="#" class="nav-link">
                        <x-icon name="user" label="Profile" />
                    </a>
                    <a href="#" class="nav-link">
                        <x-icon name="settings" label="Settings" />
                    </a>
                </div>
            </nav>
        ');
        
        $view->assertSee('ti ti-home');
        $view->assertSee('ti ti-user');
        $view->assertSee('ti ti-settings');
        $view->assertSee('Home');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('navbar');
        $view->assertSee('nav-link');
    }

    public function test_renders_icon_in_buttons(): void
    {
        $view = $this->blade('
            <button class="btn btn-primary">
                <x-icon name="plus" label="Add New" />
            </button>
            
            <button class="btn btn-danger">
                <x-icon name="trash" label="Delete" />
            </button>
            
            <button class="btn btn-success">
                <x-icon name="check" label="Save" />
            </button>
        ');
        
        $view->assertSee('ti ti-plus');
        $view->assertSee('ti ti-trash');
        $view->assertSee('ti ti-check');
        $view->assertSee('Add New');
        $view->assertSee('Delete');
        $view->assertSee('Save');
        $view->assertSee('btn-primary');
        $view->assertSee('btn-danger');
        $view->assertSee('btn-success');
    }

    public function test_renders_icon_in_cards(): void
    {
        $view = $this->blade('
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <x-icon name="file-text" label="Document" />
                    </h5>
                </div>
                <div class="card-body">
                    <p>Card content here...</p>
                    <div class="card-actions">
                        <x-icon name="edit" action="editDocument()" title="Edit" />
                        <x-icon name="download" action="downloadDocument()" title="Download" />
                        <x-icon name="share" action="shareDocument()" title="Share" />
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-file-text');
        $view->assertSee('ti ti-edit');
        $view->assertSee('ti ti-download');
        $view->assertSee('ti ti-share');
        $view->assertSee('Document');
        $view->assertSee('Card content here...');
        $view->assertSee('card');
        $view->assertSee('card-header');
        $view->assertSee('card-body');
    }

    public function test_renders_icon_in_forms(): void
    {
        $view = $this->blade('
            <form>
                <div class="mb-3">
                    <label class="form-label">
                        <x-icon name="user" label="Username" />
                    </label>
                    <input type="text" class="form-control" />
                </div>
                
                <div class="mb-3">
                    <label class="form-label">
                        <x-icon name="mail" label="Email" />
                    </label>
                    <input type="email" class="form-control" />
                </div>
                
                <div class="mb-3">
                    <label class="form-label">
                        <x-icon name="lock" label="Password" />
                    </label>
                    <input type="password" class="form-control" />
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <x-icon name="login" label="Sign In" />
                </button>
            </form>
        ');
        
        $view->assertSee('ti ti-user');
        $view->assertSee('ti ti-mail');
        $view->assertSee('ti ti-lock');
        $view->assertSee('ti ti-login');
        $view->assertSee('Username');
        $view->assertSee('Email');
        $view->assertSee('Password');
        $view->assertSee('Sign In');
        $view->assertSee('form-control');
        $view->assertSee('btn-primary');
    }

    public function test_renders_icon_in_tables(): void
    {
        $view = $this->blade('
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>
                            <x-icon name="circle-check" class="text-success" />
                        </td>
                        <td>
                            <x-icon name="edit" action="editUser(1)" title="Edit" />
                            <x-icon name="trash" action="deleteUser(1)" title="Delete" />
                        </td>
                    </tr>
                </tbody>
            </table>
        ');
        
        $view->assertSee('ti ti-circle-check');
        $view->assertSee('ti ti-edit');
        $view->assertSee('ti ti-trash');
        $view->assertSee('text-success');
        $view->assertSee('John Doe');
        $view->assertSee('john@example.com');
        $view->assertSee('table');
        $view->assertSee('thead');
        $view->assertSee('tbody');
    }

    public function test_renders_icon_in_alerts(): void
    {
        $view = $this->blade('
            <div class="alert alert-success">
                <x-icon name="check-circle" label="Success" />
                Your changes have been saved successfully.
            </div>
            
            <div class="alert alert-warning">
                <x-icon name="alert-triangle" label="Warning" />
                Please review your input before submitting.
            </div>
            
            <div class="alert alert-danger">
                <x-icon name="x-circle" label="Error" />
                An error occurred while processing your request.
            </div>
        ');
        
        $view->assertSee('ti ti-check-circle');
        $view->assertSee('ti ti-alert-triangle');
        $view->assertSee('ti ti-x-circle');
        $view->assertSee('Success');
        $view->assertSee('Warning');
        $view->assertSee('Error');
        $view->assertSee('alert-success');
        $view->assertSee('alert-warning');
        $view->assertSee('alert-danger');
    }

    public function test_renders_icon_in_sidebar(): void
    {
        $view = $this->blade('
            <div class="sidebar">
                <div class="sidebar-nav">
                    <a href="#" class="sidebar-link">
                        <x-icon name="dashboard" label="Dashboard" />
                    </a>
                    <a href="#" class="sidebar-link">
                        <x-icon name="users" label="Users" />
                    </a>
                    <a href="#" class="sidebar-link">
                        <x-icon name="settings" label="Settings" />
                    </a>
                    <a href="#" class="sidebar-link">
                        <x-icon name="help-circle" label="Help" />
                    </a>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-dashboard');
        $view->assertSee('ti ti-users');
        $view->assertSee('ti ti-settings');
        $view->assertSee('ti ti-help-circle');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('Help');
        $view->assertSee('sidebar');
        $view->assertSee('sidebar-nav');
        $view->assertSee('sidebar-link');
    }

    public function test_renders_icon_with_livewire(): void
    {
        $view = $this->blade('
            <div wire:poll.10s>
                <x-icon name="refresh" action="refreshData()" title="Refresh data" />
                <span>Last updated: {{ now() }}</span>
            </div>
        ');
        
        $view->assertSee('ti ti-refresh');
        $view->assertSee('onclick="refreshData()"');
        $view->assertSee('title="Refresh data"');
        $view->assertSee('wire:poll.10s');
    }

    public function test_renders_dashboard_widgets(): void
    {
        $view = $this->blade('
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <div class="widget-icon">
                            <x-icon name="users" size="lg" class="text-primary" />
                        </div>
                        <div class="widget-content">
                            <h3>1,234</h3>
                            <p>Total Users</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="widget">
                        <div class="widget-icon">
                            <x-icon name="shopping-cart" size="lg" class="text-success" />
                        </div>
                        <div class="widget-content">
                            <h3>567</h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="widget">
                        <div class="widget-icon">
                            <x-icon name="dollar-sign" size="lg" class="text-warning" />
                        </div>
                        <div class="widget-content">
                            <h3>$45,678</h3>
                            <p>Revenue</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="widget">
                        <div class="widget-icon">
                            <x-icon name="trending-up" size="lg" class="text-info" />
                        </div>
                        <div class="widget-content">
                            <h3>23%</h3>
                            <p>Growth</p>
                        </div>
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-users');
        $view->assertSee('ti ti-shopping-cart');
        $view->assertSee('ti ti-dollar-sign');
        $view->assertSee('ti ti-trending-up');
        $view->assertSee('ti-lg');
        $view->assertSee('text-primary');
        $view->assertSee('text-success');
        $view->assertSee('text-warning');
        $view->assertSee('text-info');
        $view->assertSee('1,234');
        $view->assertSee('567');
        $view->assertSee('$45,678');
        $view->assertSee('23%');
        $view->assertSee('widget');
        $view->assertSee('widget-icon');
        $view->assertSee('widget-content');
    }

    public function test_renders_ecommerce_product_cards(): void
    {
        $view = $this->blade('
            <div class="row">
                <div class="col-md-4">
                    <div class="product-card">
                        <img src="product1.jpg" class="product-image" />
                        <div class="product-content">
                            <h5>Product Name</h5>
                            <p class="price">$99.99</p>
                            <div class="product-rating">
                                <x-icon name="star" class="text-warning" />
                                <x-icon name="star" class="text-warning" />
                                <x-icon name="star" class="text-warning" />
                                <x-icon name="star" class="text-warning" />
                                <x-icon name="star" class="text-muted" />
                                <span class="rating-text">(4.0)</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn btn-primary btn-sm">
                                    <x-icon name="shopping-cart" label="Add to Cart" />
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <x-icon name="heart" label="Wishlist" />
                                </button>
                                <button class="btn btn-outline-info btn-sm">
                                    <x-icon name="eye" label="Quick View" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('ti ti-shopping-cart');
        $view->assertSee('ti ti-heart');
        $view->assertSee('ti ti-eye');
        $view->assertSee('text-warning');
        $view->assertSee('text-muted');
        $view->assertSee('Add to Cart');
        $view->assertSee('Wishlist');
        $view->assertSee('Quick View');
        $view->assertSee('Product Name');
        $view->assertSee('$99.99');
        $view->assertSee('(4.0)');
        $view->assertSee('product-card');
        $view->assertSee('product-content');
        $view->assertSee('product-rating');
        $view->assertSee('product-actions');
    }

    public function test_renders_user_profile_header(): void
    {
        $view = $this->blade('
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="avatar.jpg" class="rounded-circle" />
                    <div class="status-indicator">
                        <x-icon name="circle" class="text-success" />
                    </div>
                </div>
                
                <div class="profile-info">
                    <h3>John Doe</h3>
                    <p class="text-muted">Software Developer</p>
                    
                    <div class="profile-stats">
                        <span class="stat">
                            <x-icon name="users" label="Followers" />
                            1,234
                        </span>
                        <span class="stat">
                            <x-icon name="user-plus" label="Following" />
                            567
                        </span>
                        <span class="stat">
                            <x-icon name="star" label="Reputation" />
                            4.8
                        </span>
                    </div>
                    
                    <div class="profile-actions">
                        <button class="btn btn-primary">
                            <x-icon name="message-circle" label="Message" />
                        </button>
                        <button class="btn btn-outline-secondary">
                            <x-icon name="user-plus" label="Follow" />
                        </button>
                        <button class="btn btn-outline-info">
                            <x-icon name="share" label="Share Profile" />
                        </button>
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-circle');
        $view->assertSee('ti ti-users');
        $view->assertSee('ti ti-user-plus');
        $view->assertSee('ti ti-star');
        $view->assertSee('ti ti-message-circle');
        $view->assertSee('ti ti-share');
        $view->assertSee('text-success');
        $view->assertSee('Followers');
        $view->assertSee('Following');
        $view->assertSee('Reputation');
        $view->assertSee('Message');
        $view->assertSee('Follow');
        $view->assertSee('Share Profile');
        $view->assertSee('John Doe');
        $view->assertSee('Software Developer');
        $view->assertSee('1,234');
        $view->assertSee('567');
        $view->assertSee('4.8');
        $view->assertSee('profile-header');
        $view->assertSee('profile-avatar');
        $view->assertSee('profile-info');
        $view->assertSee('profile-stats');
        $view->assertSee('profile-actions');
    }

    public function test_renders_file_manager_interface(): void
    {
        $view = $this->blade('
            <div class="file-manager">
                <div class="toolbar">
                    <button class="btn btn-primary btn-sm">
                        <x-icon name="upload" label="Upload" />
                    </button>
                    <button class="btn btn-secondary btn-sm">
                        <x-icon name="folder-plus" label="New Folder" />
                    </button>
                    <button class="btn btn-outline-danger btn-sm">
                        <x-icon name="trash" label="Delete" />
                    </button>
                    <button class="btn btn-outline-info btn-sm">
                        <x-icon name="download" label="Download" />
                    </button>
                </div>
                
                <div class="file-list">
                    <div class="file-item">
                        <x-icon name="file-text" class="text-primary" />
                        <span>document.pdf</span>
                        <div class="file-actions">
                            <x-icon name="eye" action="previewFile(\'document.pdf\')" title="Preview" />
                            <x-icon name="download" action="downloadFile(\'document.pdf\')" title="Download" />
                            <x-icon name="trash" action="deleteFile(\'document.pdf\')" title="Delete" />
                        </div>
                    </div>
                    
                    <div class="file-item">
                        <x-icon name="folder" class="text-warning" />
                        <span>Images</span>
                        <div class="file-actions">
                            <x-icon name="folder-open" action="openFolder(\'Images\')" title="Open" />
                            <x-icon name="trash" action="deleteFolder(\'Images\')" title="Delete" />
                        </div>
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-upload');
        $view->assertSee('ti ti-folder-plus');
        $view->assertSee('ti ti-trash');
        $view->assertSee('ti ti-download');
        $view->assertSee('ti ti-file-text');
        $view->assertSee('ti ti-eye');
        $view->assertSee('ti ti-folder');
        $view->assertSee('ti ti-folder-open');
        $view->assertSee('Upload');
        $view->assertSee('New Folder');
        $view->assertSee('Delete');
        $view->assertSee('Download');
        $view->assertSee('Preview');
        $view->assertSee('Open');
        $view->assertSee('text-primary');
        $view->assertSee('text-warning');
        $view->assertSee('document.pdf');
        $view->assertSee('Images');
        $view->assertSee('file-manager');
        $view->assertSee('toolbar');
        $view->assertSee('file-list');
        $view->assertSee('file-item');
        $view->assertSee('file-actions');
    }

    public function test_renders_notification_center(): void
    {
        $view = $this->blade('
            <div class="notification-center">
                <div class="notification-header">
                    <h5>
                        <x-icon name="bell" label="Notifications" />
                    </h5>
                    <button class="btn btn-sm btn-outline-secondary">
                        <x-icon name="check-all" label="Mark All Read" />
                    </button>
                </div>
                
                <div class="notification-list">
                    <div class="notification-item unread">
                        <x-icon name="user-plus" class="text-success" />
                        <div class="notification-content">
                            <p>New user registered</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                        <x-icon name="x" action="dismissNotification(1)" title="Dismiss" />
                    </div>
                    
                    <div class="notification-item">
                        <x-icon name="alert-triangle" class="text-warning" />
                        <div class="notification-content">
                            <p>System maintenance scheduled</p>
                            <small class="text-muted">1 hour ago</small>
                        </div>
                        <x-icon name="x" action="dismissNotification(2)" title="Dismiss" />
                    </div>
                    
                    <div class="notification-item">
                        <x-icon name="check-circle" class="text-success" />
                        <div class="notification-content">
                            <p>Backup completed successfully</p>
                            <small class="text-muted">3 hours ago</small>
                        </div>
                        <x-icon name="x" action="dismissNotification(3)" title="Dismiss" />
                    </div>
                </div>
            </div>
        ');
        
        $view->assertSee('ti ti-bell');
        $view->assertSee('ti ti-check-all');
        $view->assertSee('ti ti-user-plus');
        $view->assertSee('ti ti-alert-triangle');
        $view->assertSee('ti ti-check-circle');
        $view->assertSee('ti ti-x');
        $view->assertSee('Notifications');
        $view->assertSee('Mark All Read');
        $view->assertSee('Dismiss');
        $view->assertSee('text-success');
        $view->assertSee('text-warning');
        $view->assertSee('New user registered');
        $view->assertSee('System maintenance scheduled');
        $view->assertSee('Backup completed successfully');
        $view->assertSee('2 minutes ago');
        $view->assertSee('1 hour ago');
        $view->assertSee('3 hours ago');
        $view->assertSee('notification-center');
        $view->assertSee('notification-header');
        $view->assertSee('notification-list');
        $view->assertSee('notification-item');
        $view->assertSee('notification-content');
    }

    public function test_renders_icon_with_empty_name(): void
    {
        $view = $this->blade('<x-icon name="" />');
        
        $view->assertDontSee('ti ti-');
    }

    public function test_renders_icon_with_null_name(): void
    {
        $view = $this->blade('<x-icon :name="null" />');
        
        $view->assertDontSee('ti ti-');
    }

    public function test_renders_icon_with_complex_action(): void
    {
        $view = $this->blade('<x-icon name="edit" action="editItem(123, \'user\', true)" />');
        
        $view->assertSee('ti ti-edit');
        $view->assertSee('onclick="editItem(123, \'user\', true)"');
    }

    public function test_renders_icon_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-icon name="info" aria-label="Information" role="img" />');
        
        $view->assertSee('ti ti-info');
        $view->assertSee('aria-label="Information"');
        $view->assertSee('role="img"');
    }

    public function test_renders_icon_with_complex_styling(): void
    {
        $view = $this->blade('
            <x-icon 
                name="star" 
                size="lg" 
                class="text-warning fw-bold" 
                style="cursor: pointer; transition: all 0.3s ease;"
                data-rating="5"
                data-item-id="123"
            />
        ');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('ti-lg');
        $view->assertSee('text-warning');
        $view->assertSee('fw-bold');
        $view->assertSee('cursor: pointer');
        $view->assertSee('transition: all 0.3s ease');
        $view->assertSee('data-rating="5"');
        $view->assertSee('data-item-id="123"');
    }

    public function test_renders_icon_with_livewire_attributes(): void
    {
        $view = $this->blade('<x-icon name="refresh" wire:click="refreshData" wire:loading.class="opacity-50" />');
        
        $view->assertSee('ti ti-refresh');
        $view->assertSee('wire:click="refreshData"');
        $view->assertSee('wire:loading.class="opacity-50"');
    }

    public function test_renders_icon_with_bootstrap_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="text-center text-uppercase text-decoration-underline" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('text-center');
        $view->assertSee('text-uppercase');
        $view->assertSee('text-decoration-underline');
    }

    public function test_renders_icon_with_responsive_classes(): void
    {
        $view = $this->blade('<x-icon name="star" class="d-none d-md-block text-lg-start" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('text-lg-start');
    }

    public function test_renders_icon_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="m-3 p-2 border rounded" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('border');
        $view->assertSee('rounded');
    }

    public function test_renders_icon_with_flexbox_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="d-flex justify-content-center align-items-center" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('d-flex');
        $view->assertSee('justify-content-center');
        $view->assertSee('align-items-center');
    }

    public function test_renders_icon_with_background_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="bg-primary text-white" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('bg-primary');
        $view->assertSee('text-white');
    }

    public function test_renders_icon_with_border_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="border border-primary border-2" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('border-2');
    }

    public function test_renders_icon_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="shadow shadow-lg" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('shadow');
        $view->assertSee('shadow-lg');
    }

    public function test_renders_icon_with_position_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="position-relative top-0 start-0" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('position-relative');
        $view->assertSee('top-0');
        $view->assertSee('start-0');
    }

    public function test_renders_icon_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="visible opacity-75" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
    }

    public function test_renders_icon_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="overflow-auto overflow-hidden" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('overflow-auto');
        $view->assertSee('overflow-hidden');
    }

    public function test_renders_icon_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-icon name="star" class="user-select-all pe-none" />');
        
        $view->assertSee('ti ti-star');
        $view->assertSee('user-select-all');
        $view->assertSee('pe-none');
    }
}
