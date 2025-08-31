<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class NavTest extends TestCase
{
    public function test_renders_basic_nav(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('nav');
        $view->assertSee('href="/dashboard"');
        $view->assertSee('href="/users"');
        $view->assertSee('href="/settings"');
    }

    public function test_nav_with_pills_style(): void
    {
        $view = $this->blade('
            <x-nav pills>
                <x-nav.item href="/overview" title="Overview" icon="eye" />
                <x-nav.item href="/analytics" title="Analytics" icon="chart" />
                <x-nav.item href="/reports" title="Reports" icon="file-text" />
            </x-nav>
        ');
        
        $view->assertSee('Overview');
        $view->assertSee('Analytics');
        $view->assertSee('Reports');
        $view->assertSee('nav-pills');
        $view->assertDontSee('nav-tabs');
    }

    public function test_nav_with_card_style(): void
    {
        $view = $this->blade('
            <x-nav card>
                <x-nav.item href="/profile" title="Profile" icon="user" />
                <x-nav.item href="/security" title="Security" icon="shield" />
                <x-nav.item href="/notifications" title="Notifications" icon="bell" />
            </x-nav>
        ');
        
        $view->assertSee('Profile');
        $view->assertSee('Security');
        $view->assertSee('Notifications');
        $view->assertSee('card-header-pills');
    }

    public function test_nav_with_segmented_style(): void
    {
        $view = $this->blade('
            <x-nav segmented>
                <x-nav.item href="/monthly" title="Monthly" />
                <x-nav.item href="/quarterly" title="Quarterly" />
                <x-nav.item href="/yearly" title="Yearly" />
            </x-nav>
        ');
        
        $view->assertSee('Monthly');
        $view->assertSee('Quarterly');
        $view->assertSee('Yearly');
        $view->assertSee('nav-segmented');
    }

    public function test_nav_with_badges(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/messages" title="Messages" icon="message" badge="3" />
                <x-nav.item href="/notifications" title="Notifications" icon="bell" badge="12" />
                <x-nav.item href="/tasks" title="Tasks" icon="check" badge="5" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Messages');
        $view->assertSee('Notifications');
        $view->assertSee('Tasks');
        $view->assertSee('badge-ghost badge-sm');
        $view->assertSee('3');
        $view->assertSee('12');
        $view->assertSee('5');
    }

    public function test_nav_with_dropdown(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item dropdown title="More" icon="more-horizontal">
                    <x-dropdown.menu>
                        <x-dropdown.item href="/settings" label="Settings" />
                        <x-dropdown.item href="/profile" label="Profile" />
                        <x-dropdown.item href="/logout" label="Logout" />
                    </x-dropdown.menu>
                </x-nav.item>
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('More');
        $view->assertSee('dropdown');
        $view->assertSee('data-bs-toggle="dropdown"');
        $view->assertSee('Settings');
        $view->assertSee('Profile');
        $view->assertSee('Logout');
    }

    public function test_nav_with_active_states(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" active />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('active');
    }

    public function test_nav_with_external_links(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="https://docs.example.com" title="Documentation" icon="book" away />
                <x-nav.item href="https://support.example.com" title="Support" icon="help-circle" away />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Documentation');
        $view->assertSee('Support');
        $view->assertSee('target="_blank"');
    }

    public function test_nav_with_turbo_pjax(): void
    {
        $view = $this->blade('
            <x-nav turbo>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('data-pjax');
    }

    public function test_nav_with_custom_styling(): void
    {
        $view = $this->blade('
            <x-nav class="custom-nav shadow">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" class="custom-item" />
                <x-nav.item href="/users" title="Users" icon="users" class="custom-item" />
                <x-nav.item href="/settings" title="Settings" icon="settings" class="custom-item" />
            </x-nav>
        ');
        
        $view->assertSee('custom-nav');
        $view->assertSee('shadow');
        $view->assertSee('custom-item');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_disabled_items(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" disabled />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('disabled');
    }

    public function test_nav_with_slot_content(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" icon="home">
                    <strong>Dashboard</strong>
                </x-nav.item>
                <x-nav.item href="/users" icon="users">
                    <span class="text-primary">Users</span>
                </x-nav.item>
                <x-nav.item href="/settings" icon="settings">
                    <div class="d-flex align-items-center">
                        <span>Settings</span>
                        <x-badge color="warning" class="ms-2">New</x-badge>
                    </div>
                </x-nav.item>
            </x-nav>
        ');
        
        $view->assertSee('<strong>Dashboard</strong>', false);
        $view->assertSee('<span class="text-primary">Users</span>', false);
        $view->assertSee('Settings');
        $view->assertSee('New');
    }

    public function test_nav_with_livewire_integration(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item wire:click="showDashboard" title="Dashboard" icon="home" />
                <x-nav.item wire:click="showUsers" title="Users" icon="users" />
                <x-nav.item wire:click="showSettings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('wire:click="showDashboard"');
        $view->assertSee('wire:click="showUsers"');
        $view->assertSee('wire:click="showSettings"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_complex_dropdown(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item dropdown title="Account" icon="user">
                    <x-dropdown.menu>
                        <x-dropdown.item href="/profile" label="Profile" icon="user" />
                        <x-dropdown.item href="/settings" label="Settings" icon="settings" />
                        <x-dropdown.item divider />
                        <x-dropdown.item href="/logout" label="Logout" icon="log-out" />
                    </x-dropdown.menu>
                </x-nav.item>
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Account');
        $view->assertSee('dropdown');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('Logout');
    }

    public function test_nav_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-nav 
                pills
                class="custom-nav"
                id="main-nav"
                data-testid="nav">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" active class="custom-item" />
                <x-nav.item href="/users" title="Users" icon="users" badge="5" class="custom-item" />
                <x-nav.item dropdown title="More" icon="more-horizontal" class="custom-item">
                    <x-dropdown.menu>
                        <x-dropdown.item href="/settings" label="Settings" />
                        <x-dropdown.item href="/profile" label="Profile" />
                    </x-dropdown.menu>
                </x-nav.item>
            </x-nav>
        ');
        
        $view->assertSee('nav-pills');
        $view->assertSee('custom-nav');
        $view->assertSee('id="main-nav"');
        $view->assertSee('data-testid="nav"');
        $view->assertSee('custom-item');
        $view->assertSee('active');
        $view->assertSee('badge-ghost badge-sm');
        $view->assertSee('5');
        $view->assertSee('dropdown');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('More');
    }

    public function test_nav_accessibility_features(): void
    {
        $view = $this->blade('
            <x-nav 
                role="navigation"
                aria-label="Main navigation">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('role="navigation"');
        $view->assertSee('aria-label="Main navigation"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_handles_edge_cases(): void
    {
        // Empty nav
        $view = $this->blade('<x-nav></x-nav>');
        $view->assertStatus(200);
        
        // Nav with empty items
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="" />
                <x-nav.item href="/users" />
            </x-nav>
        ');
        $view->assertStatus(200);
        
        // Nav with special characters
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard & Settings" icon="home" />
                <x-nav.item href="/users" title="Users & Groups" icon="users" />
            </x-nav>
        ');
        $view->assertSee('Dashboard &amp; Settings');
        $view->assertSee('Users &amp; Groups');
    }

    public function test_nav_semantic_structure(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        // Should have proper semantic structure
        $view->assertSee('<nav', false);
        $view->assertSee('<div', false);
        $view->assertSee('<a', false);
        $view->assertSee('nav');
        $view->assertSee('nav-item');
        $view->assertSee('nav-link');
    }

    public function test_nav_css_class_merging(): void
    {
        $view = $this->blade('
            <x-nav class="custom-nav">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" class="custom-item" />
                <x-nav.item href="/users" title="Users" icon="users" class="custom-item" />
                <x-nav.item href="/settings" title="Settings" icon="settings" class="custom-item" />
            </x-nav>
        ');
        
        // Should merge custom classes with default classes
        $view->assertSee('custom-nav');
        $view->assertSee('custom-item');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_performance_attributes(): void
    {
        $view = $this->blade('
            <x-nav 
                data-testid="nav-component"
                data-loading="false"
                data-interactive="true">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('data-testid="nav-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-nav id="bootstrapNav">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        // Should have proper Bootstrap navigation structure
        $view->assertSee('nav');
        $view->assertSee('nav-item');
        $view->assertSee('nav-link');
        $view->assertSee('id="bootstrapNav"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_long_content(): void
    {
        $longTitle = 'This is a very long navigation title that might wrap to multiple lines and test how the navigation handles extended content with various formatting and structure.';
        $view = $this->blade("
            <x-nav>
                <x-nav.item href=\"/dashboard\" title=\"{$longTitle}\" icon=\"home\" />
                <x-nav.item href=\"/users\" title=\"Users\" icon=\"users\" />
                <x-nav.item href=\"/settings\" title=\"Settings\" icon=\"settings\" />
            </x-nav>
        ");
        
        $view->assertSee($longTitle);
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_html_content(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" icon="home">
                    <strong>Dashboard</strong> <em>Overview</em>
                </x-nav.item>
                <x-nav.item href="/users" icon="users">
                    <span class="text-primary">Users</span> <x-badge color="success">Active</x-badge>
                </x-nav.item>
                <x-nav.item href="/settings" icon="settings">
                    <div class="d-flex align-items-center">
                        <span>Settings</span>
                        <x-badge color="warning" class="ms-2">New</x-badge>
                    </div>
                </x-nav.item>
            </x-nav>
        ');
        
        $view->assertSee('<strong>Dashboard</strong>', false);
        $view->assertSee('<em>Overview</em>', false);
        $view->assertSee('<span class="text-primary">Users</span>', false);
        $view->assertSee('Active');
        $view->assertSee('Settings');
        $view->assertSee('New');
    }

    public function test_nav_with_empty_slots(): void
    {
        // Test nav with empty item
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="" />
                <x-nav.item href="/users" title="Users" />
            </x-nav>
        ');
        $view->assertSee('Users');
        $view->assertStatus(200);
        
        // Test nav with empty slot content
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" icon="home"></x-nav.item>
                <x-nav.item href="/users" title="Users" />
            </x-nav>
        ');
        $view->assertSee('Users');
        $view->assertStatus(200);
    }

    public function test_nav_with_multiple_active_items(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" active />
                <x-nav.item href="/users" title="Users" icon="users" active />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('active');
    }

    public function test_nav_with_complex_id_generation(): void
    {
        $view = $this->blade('
            <x-nav id="complex-123">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('id="complex-123"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_data_attributes(): void
    {
        $view = $this->blade('
            <x-nav 
                data-bs-parent="#parent"
                data-testid="nav">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('data-bs-parent="#parent"');
        $view->assertSee('data-testid="nav"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_aria_attributes(): void
    {
        $view = $this->blade('
            <x-nav 
                aria-label="Main navigation"
                aria-describedby="nav-description">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('aria-label="Main navigation"');
        $view->assertSee('aria-describedby="nav-description"');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
    }

    public function test_nav_with_boolean_attributes(): void
    {
        // Test pills=true
        $view = $this->blade('
            <x-nav :pills="true">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
            </x-nav>
        ');
        $view->assertSee('nav-pills');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        
        // Test pills=false
        $view = $this->blade('
            <x-nav :pills="false">
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
            </x-nav>
        ');
        $view->assertDontSee('nav-pills');
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
    }

    public function test_nav_link_component(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.link icon="home">Dashboard</x-nav.link>
                <x-nav.link icon="users">Users</x-nav.link>
                <x-nav.link icon="settings">Settings</x-nav.link>
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('nav-link');
        $view->assertSee('role="tab"');
        $view->assertSee('data-bs-toggle="tab"');
    }

    public function test_nav_with_route_matching(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="{{ route("dashboard") }}" title="Dashboard" icon="home" />
                <x-nav.item href="{{ route("users.index") }}" title="Users" icon="users" />
                <x-nav.item href="{{ route("settings.index") }}" title="Settings" icon="settings" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('nav');
    }

    public function test_nav_with_icon_integration(): void
    {
        $view = $this->blade('
            <x-nav>
                <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
                <x-nav.item href="/users" title="Users" icon="users" />
                <x-nav.item href="/settings" title="Settings" icon="settings" />
                <x-nav.item href="/reports" title="Reports" icon="chart" />
            </x-nav>
        ');
        
        $view->assertSee('Dashboard');
        $view->assertSee('Users');
        $view->assertSee('Settings');
        $view->assertSee('Reports');
        $view->assertSee('me-1');
    }
}
