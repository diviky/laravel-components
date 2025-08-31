<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class DropdownTest extends TestCase
{
    public function test_renders_basic_dropdown(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('Logout');
        $view->assertSee('dropdown');
        $view->assertSee('data-bs-toggle="dropdown"');
    }

    public function test_dropdown_with_custom_icon(): void
    {
        $view = $this->blade('
            <x-dropdown icon="user">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('data-bs-toggle="dropdown"');
    }

    public function test_dropdown_with_label(): void
    {
        $view = $this->blade('
            <x-dropdown label="User Menu">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('User Menu');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_header(): void
    {
        $view = $this->blade('
            <x-dropdown header="User Actions">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('User Actions');
        $view->assertSee('dropdown-header');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_custom_position(): void
    {
        $view = $this->blade('
            <x-dropdown position="left">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('dropdown-menu-left');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_vertical_icon(): void
    {
        $view = $this->blade('
            <x-dropdown vertical>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('data-bs-toggle="dropdown"');
    }

    public function test_dropdown_with_dropend(): void
    {
        $view = $this->blade('
            <x-dropdown dropend>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('dropend');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_toggle_class(): void
    {
        $view = $this->blade('
            <x-dropdown toggle>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('dropdown-toggle');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_custom_auto_close(): void
    {
        $view = $this->blade('
            <x-dropdown auto-close="outside">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('data-bs-auto-close="outside"');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_custom_classes(): void
    {
        $view = $this->blade('
            <x-dropdown class="custom-dropdown shadow">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('custom-dropdown');
        $view->assertSee('shadow');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-dropdown
                id="user-dropdown"
                data-testid="dropdown"
                aria-label="User menu">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('id="user-dropdown"');
        $view->assertSee('data-testid="dropdown"');
        $view->assertSee('aria-label="User menu"');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }

    public function test_dropdown_item_with_href(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
            </x-dropdown>
        ');

        $view->assertSee('href="/profile"');
        $view->assertSee('Profile');
    }

    public function test_dropdown_item_with_icon(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" icon="user" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('href="/profile"');
    }

    public function test_dropdown_item_with_divider(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item divider />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        $view->assertSee('dropdown-divider');
        $view->assertSee('Profile');
        $view->assertSee('Logout');
    }

    public function test_dropdown_item_with_separator(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item separator />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        $view->assertSee('dropdown-divider');
        $view->assertSee('Profile');
        $view->assertSee('Logout');
    }

    public function test_dropdown_item_active(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" active />
            </x-dropdown>
        ');

        $view->assertSee('dropdown-item active');
        $view->assertSee('Settings');
    }

    public function test_dropdown_item_disabled(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" disabled />
            </x-dropdown>
        ');

        $view->assertSee('dropdown-item disabled');
        $view->assertSee('Settings');
    }

    public function test_dropdown_item_with_title(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" title="View Profile" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('View Profile');
        $view->assertSee('href="/profile"');
    }

    public function test_dropdown_item_disabled_via_enabled(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" :enabled="false" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertDontSee('Settings');
    }

    public function test_dropdown_item_with_slot_content(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile">
                    <i class="icon-user"></i>
                    <span>Profile</span>
                </x-dropdown.item>
            </x-dropdown>
        ');

        $view->assertSee('<i class="icon-user"></i>', false);
        $view->assertSee('<span>Profile</span>', false);
        $view->assertSee('href="/profile"');
    }

    public function test_dropdown_item_with_complex_content(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile">
                    <div class="d-flex align-items-center">
                        <img src="/avatar.jpg" class="rounded-circle me-2" width="24" height="24">
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">john@example.com</small>
                        </div>
                    </div>
                </x-dropdown.item>
            </x-dropdown>
        ');

        $view->assertSee('John Doe');
        $view->assertSee('john@example.com');
        $view->assertSee('href="/profile"');
    }

    public function test_dropdown_livewire_integration(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item
                    wire:click="editUser(123)"
                    label="Edit User"
                    icon="edit" />
                <x-dropdown.item
                    wire:click="deleteUser(123)"
                    label="Delete User"
                    icon="trash" />
            </x-dropdown>
        ');

        $view->assertSee('wire:click="editUser(123)"');
        $view->assertSee('wire:click="deleteUser(123)"');
        $view->assertSee('Edit User');
        $view->assertSee('Delete User');
    }

    public function test_dropdown_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-dropdown
                icon="user"
                label="User Menu"
                header="User Actions"
                position="left"
                toggle
                auto-close="outside"
                class="custom-dropdown"
                id="test-dropdown">
                <x-dropdown.item href="/profile" label="Profile" icon="user" />
                <x-dropdown.item href="/settings" label="Settings" icon="settings" />
                <x-dropdown.item divider />
                <x-dropdown.item href="/logout" label="Logout" icon="logout" />
            </x-dropdown>
        ');

        $view->assertSee('User Menu');
        $view->assertSee('User Actions');
        $view->assertSee('dropdown-menu-left');
        $view->assertSee('dropdown-toggle');
        $view->assertSee('data-bs-auto-close="outside"');
        $view->assertSee('custom-dropdown');
        $view->assertSee('id="test-dropdown"');
        $view->assertSee('dropdown-divider');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('Logout');
    }

    public function test_dropdown_accessibility_features(): void
    {
        $view = $this->blade('
            <x-dropdown
                role="menu"
                aria-label="User menu">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        $view->assertSee('role="menu"');
        $view->assertSee('aria-label="User menu"');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('Logout');
    }

    public function test_dropdown_handles_edge_cases(): void
    {
        // Empty dropdown
        $view = $this->blade('<x-dropdown></x-dropdown>');
        $view->assertStatus(200);

        // Dropdown with single item
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
            </x-dropdown>
        ');
        $view->assertSee('Profile');

        // Dropdown with special characters
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile & Settings" />
                <x-dropdown.item href="/logout" label="Sign Out →" />
            </x-dropdown>
        ');
        $view->assertSee('Profile &amp; Settings');
        $view->assertSee('Sign Out →');
    }

    public function test_dropdown_semantic_structure(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        // Should have proper semantic structure
        $view->assertSee('<div', false);
        $view->assertSee('dropdown');
        $view->assertSee('dropdown-menu');
        $view->assertSee('dropdown-item');
    }

    public function test_dropdown_css_class_merging(): void
    {
        $view = $this->blade('
            <x-dropdown class="custom-class">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        // Should merge custom class with default classes
        $view->assertSee('custom-class');
        $view->assertSee('dropdown');
    }

    public function test_dropdown_performance_attributes(): void
    {
        $view = $this->blade('
            <x-dropdown
                data-testid="dropdown-component"
                data-loading="false"
                data-interactive="true">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('data-testid="dropdown-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }

    public function test_dropdown_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-dropdown id="bootstrapDropdown">
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        // Should have proper Bootstrap dropdown structure
        $view->assertSee('dropdown');
        $view->assertSee('dropdown-menu');
        $view->assertSee('dropdown-item');
        $view->assertSee('data-bs-toggle="dropdown"');
        $view->assertSee('id="bootstrapDropdown"');
    }

    public function test_dropdown_with_long_labels(): void
    {
        $longLabel = 'This is a very long dropdown label that might wrap to multiple lines';
        $view = $this->blade("
            <x-dropdown>
                <x-dropdown.item href=\"/profile\" label=\"{$longLabel}\" />
                <x-dropdown.item href=\"/settings\" label=\"Settings\" />
            </x-dropdown>
        ");

        $view->assertSee($longLabel);
        $view->assertSee('Settings');
    }

    public function test_dropdown_with_html_content(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile">
                    <strong>Bold</strong> <em>Italic</em> Text
                </x-dropdown.item>
                <x-dropdown.item href="/settings">
                    <span class="badge">Badge</span> Content
                </x-dropdown.item>
            </x-dropdown>
        ');

        $view->assertSee('<strong>Bold</strong>', false);
        $view->assertSee('<em>Italic</em>', false);
        $view->assertSee('<span class="badge">Badge</span>', false);
        $view->assertSee('Content');
    }

    public function test_dropdown_item_with_both_label_and_slot(): void
    {
        // Test that label takes precedence over slot content
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Label Text">
                    Slot Content
                </x-dropdown.item>
            </x-dropdown>
        ');

        $view->assertSee('Label Text');
        $view->assertDontSee('Slot Content');
    }

    public function test_dropdown_item_without_label_or_slot(): void
    {
        // Test dropdown item with no content
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" />
            </x-dropdown>
        ');

        $view->assertSee('href="/profile"');
        $view->assertStatus(200);
    }

    public function test_dropdown_with_multiple_dividers(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item divider />
                <x-dropdown.item href="/settings" label="Settings" />
                <x-dropdown.item divider />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('Settings');
        $view->assertSee('Logout');
        // Should have multiple dividers
        $view->assertSee('dropdown-divider');
    }

    public function test_dropdown_item_enabled_disabled_states(): void
    {
        // Test enabled item
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" :enabled="true" />
            </x-dropdown>
        ');
        $view->assertSee('Profile');

        // Test disabled item
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" :enabled="false" />
            </x-dropdown>
        ');
        $view->assertDontSee('Profile');
    }

    public function test_dropdown_item_active_disabled_combination(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" active disabled />
                <x-dropdown.item href="/logout" label="Logout" />
            </x-dropdown>
        ');

        $view->assertSee('Profile');
        $view->assertSee('dropdown-item active disabled');
        $view->assertSee('Settings');
        $view->assertSee('Logout');
    }

    public function test_dropdown_inline_display(): void
    {
        // Test inline display (default)
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.item href="/profile" label="Profile" />
            </x-dropdown>
        ');
        $view->assertSee('d-inline');
        $view->assertSee('Profile');

        // Test non-inline display
        $view = $this->blade('
            <x-dropdown :inline="false">
                <x-dropdown.item href="/profile" label="Profile" />
            </x-dropdown>
        ');
        $view->assertDontSee('d-inline');
        $view->assertSee('Profile');
    }

    public function test_dropdown_menu_visibility(): void
    {
        // Test visible menu
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.menu visible>
                    <x-dropdown.item href="/profile" label="Profile" />
                </x-dropdown.menu>
            </x-dropdown>
        ');
        $view->assertSee('overflow-x-visible max-h-none!');
        $view->assertSee('Profile');

        // Test show menu
        $view = $this->blade('
            <x-dropdown>
                <x-dropdown.menu show>
                    <x-dropdown.item href="/profile" label="Profile" />
                </x-dropdown.menu>
            </x-dropdown>
        ');
        $view->assertSee('show');
        $view->assertSee('Profile');
    }

    public function test_dropdown_custom_link_trigger(): void
    {
        $view = $this->blade('
            <x-dropdown>
                <x-slot:link>
                    <button class="btn btn-primary">
                        <i class="icon-menu"></i>
                        Actions
                    </button>
                </x-slot:link>
                <x-dropdown.item href="/profile" label="Profile" />
                <x-dropdown.item href="/settings" label="Settings" />
            </x-dropdown>
        ');

        $view->assertSee('<button class="btn btn-primary">', false);
        $view->assertSee('<i class="icon-menu"></i>', false);
        $view->assertSee('Actions');
        $view->assertSee('Profile');
        $view->assertSee('Settings');
    }
}
