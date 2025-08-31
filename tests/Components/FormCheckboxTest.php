<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormCheckboxTest extends TestCase
{
    public function test_renders_basic_checkbox(): void
    {
        $view = $this->blade('<x-form-checkbox name="agree" label="I agree" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="agree"');
        $view->assertSee('type="checkbox"');
        $view->assertSee('I agree');
    }

    public function test_renders_checkbox_with_custom_value(): void
    {
        $view = $this->blade('<x-form-checkbox name="status" label="Active" value="active" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="status"');
        $view->assertSee('value="active"');
        $view->assertSee('Active');
    }

    public function test_renders_required_checkbox(): void
    {
        $view = $this->blade('<x-form-checkbox name="terms" label="I accept terms" required />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('required');
        $view->assertSee('I accept terms');
    }

    public function test_renders_checkbox_with_help_text(): void
    {
        $view = $this->blade('<x-form-checkbox name="newsletter" label="Newsletter" help="Receive updates" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Receive updates');
        $view->assertSee('Newsletter');
    }

    public function test_renders_inline_checkbox(): void
    {
        $view = $this->blade('<x-form-checkbox name="notifications" label="Email notifications" inline />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-inline');
        $view->assertSee('form-check-input');
        $view->assertSee('Email notifications');
    }

    public function test_renders_compact_checkbox(): void
    {
        $view = $this->blade('<x-form-checkbox name="remember" label="Remember me" compact />');

        $view->assertSee('form-check');
        $view->assertSee('m-0');
        $view->assertSee('form-check-input');
        $view->assertSee('Remember me');
    }

    public function test_renders_disabled_checkbox(): void
    {
        $view = $this->blade('<x-form-checkbox name="disabled_field" label="Disabled option" disabled />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('disabled');
        $view->assertSee('Disabled option');
    }

    public function test_renders_readonly_checkbox(): void
    {
        $view = $this->blade('<x-form-checkbox name="readonly_field" label="Readonly option" readonly />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('readonly');
        $view->assertSee('Readonly option');
    }

    public function test_renders_checkbox_with_title(): void
    {
        $view = $this->blade('<x-form-checkbox name="advanced" label="Advanced mode" title="Enable advanced features" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Enable advanced features');
        $view->assertSee('Advanced mode');
    }

    public function test_renders_checkbox_with_custom_id(): void
    {
        $view = $this->blade('<x-form-checkbox name="consent" label="Data consent" id="data-consent" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('id="data-consent"');
        $view->assertSee('Data consent');
    }

    public function test_renders_checkbox_with_custom_class(): void
    {
        $view = $this->blade('<x-form-checkbox name="premium" label="Premium features" class="custom-checkbox" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('custom-checkbox');
        $view->assertSee('Premium features');
    }

    public function test_renders_checkbox_with_livewire_model(): void
    {
        $view = $this->blade('<x-form-checkbox name="agree" label="I agree" wire:model="agree" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('wire:model="agree"');
        $view->assertSee('I agree');
    }

    public function test_renders_checkbox_with_custom_copy_value(): void
    {
        $view = $this->blade('<x-form-checkbox name="status" label="Active" value="active" copy="inactive" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('value="inactive"');
        $view->assertSee('type="hidden"');
        $view->assertSee('Active');
    }

    public function test_renders_checkbox_without_copy_value(): void
    {
        $view = $this->blade('<x-form-checkbox name="feature" label="Enable feature" :copy="false" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertDontSee('type="hidden"');
        $view->assertSee('Enable feature');
    }

    public function test_renders_checkbox_with_default_state(): void
    {
        $view = $this->blade('<x-form-checkbox name="newsletter" label="Newsletter" :default="true" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Newsletter');
    }

    public function test_renders_multiple_checkboxes(): void
    {
        $view = $this->blade('
            <div>
                <x-form-checkbox name="permissions[]" label="Read" value="read" />
                <x-form-checkbox name="permissions[]" label="Write" value="write" />
                <x-form-checkbox name="permissions[]" label="Delete" value="delete" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="permissions[]"');
        $view->assertSee('value="read"');
        $view->assertSee('value="write"');
        $view->assertSee('value="delete"');
        $view->assertSee('Read');
        $view->assertSee('Write');
        $view->assertSee('Delete');
    }

    public function test_renders_inline_checkboxes(): void
    {
        $view = $this->blade('
            <div class="checkbox-group">
                <x-form-checkbox name="options[]" label="Option 1" value="1" inline />
                <x-form-checkbox name="options[]" label="Option 2" value="2" inline />
                <x-form-checkbox name="options[]" label="Option 3" value="3" inline />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-inline');
        $view->assertSee('form-check-input');
        $view->assertSee('Option 1');
        $view->assertSee('Option 2');
        $view->assertSee('Option 3');
    }

    public function test_renders_compact_checkboxes(): void
    {
        $view = $this->blade('
            <div class="compact-checkboxes">
                <x-form-checkbox name="quick_actions[]" label="Edit" value="edit" compact />
                <x-form-checkbox name="quick_actions[]" label="Delete" value="delete" compact />
                <x-form-checkbox name="quick_actions[]" label="Share" value="share" compact />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('m-0');
        $view->assertSee('form-check-input');
        $view->assertSee('Edit');
        $view->assertSee('Delete');
        $view->assertSee('Share');
    }

    public function test_renders_checkbox_with_array_binding(): void
    {
        $view = $this->blade('<x-form-checkbox name="interests[]" label="Technology" value="tech" :bind="$user->interests" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="interests[]"');
        $view->assertSee('value="tech"');
        $view->assertSee('Technology');
    }

    public function test_renders_checkbox_with_collection_binding(): void
    {
        $view = $this->blade('<x-form-checkbox name="tags[]" label="Laravel" value="laravel" :bind="$post->tags" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="tags[]"');
        $view->assertSee('value="laravel"');
        $view->assertSee('Laravel');
    }

    public function test_renders_user_registration_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/register">
                @csrf
                <x-form-input name="name" label="Full Name" required />
                <x-form-email name="email" label="Email Address" required />
                <x-form-password name="password" label="Password" required />
                <x-form-checkbox name="terms" label="I agree to the terms and conditions" required />
                <x-form-checkbox name="newsletter" label="Subscribe to newsletter" help="Receive updates about new features" />
                <x-form-checkbox name="marketing" label="Allow marketing emails" help="We\'ll send you promotional content" />
                <x-form-submit>Register</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('I agree to the terms and conditions');
        $view->assertSee('Subscribe to newsletter');
        $view->assertSee('Allow marketing emails');
        $view->assertSee('Receive updates about new features');
        $view->assertSee('We\'ll send you promotional content');
    }

    public function test_renders_settings_configuration(): void
    {
        $view = $this->blade('
            <div class="settings-section">
                <h3>Notification Settings</h3>
                <x-form-checkbox name="email_notifications" label="Email notifications" :bind="$user->settings" help="Receive notifications via email" />
                <x-form-checkbox name="sms_notifications" label="SMS notifications" :bind="$user->settings" help="Receive notifications via SMS" />
                <x-form-checkbox name="push_notifications" label="Push notifications" :bind="$user->settings" help="Receive browser push notifications" />
                <x-form-checkbox name="marketing_emails" label="Marketing emails" :bind="$user->settings" help="Receive promotional content" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Email notifications');
        $view->assertSee('SMS notifications');
        $view->assertSee('Push notifications');
        $view->assertSee('Marketing emails');
        $view->assertSee('Receive notifications via email');
        $view->assertSee('Receive notifications via SMS');
        $view->assertSee('Receive browser push notifications');
        $view->assertSee('Receive promotional content');
    }

    public function test_renders_product_configuration(): void
    {
        $view = $this->blade('
            <div class="product-options">
                <h4>Product Features</h4>
                <x-form-checkbox name="features[]" label="Free shipping" value="free_shipping" :bind="$product->features" />
                <x-form-checkbox name="features[]" label="Warranty" value="warranty" :bind="$product->features" />
                <x-form-checkbox name="features[]" label="Installation service" value="installation" :bind="$product->features" />
                <x-form-checkbox name="features[]" label="Extended support" value="support" :bind="$product->features" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="features[]"');
        $view->assertSee('Free shipping');
        $view->assertSee('Warranty');
        $view->assertSee('Installation service');
        $view->assertSee('Extended support');
        $view->assertSee('value="free_shipping"');
        $view->assertSee('value="warranty"');
        $view->assertSee('value="installation"');
        $view->assertSee('value="support"');
    }

    public function test_renders_user_permissions(): void
    {
        $view = $this->blade('
            <div class="permissions-grid">
                <h4>User Permissions</h4>
                <div class="row">
                    <div class="col-md-6">
                        <x-form-checkbox name="permissions[]" label="View users" value="users.view" :bind="$role->permissions" />
                        <x-form-checkbox name="permissions[]" label="Create users" value="users.create" :bind="$role->permissions" />
                        <x-form-checkbox name="permissions[]" label="Edit users" value="users.edit" :bind="$role->permissions" />
                        <x-form-checkbox name="permissions[]" label="Delete users" value="users.delete" :bind="$role->permissions" />
                    </div>
                    <div class="col-md-6">
                        <x-form-checkbox name="permissions[]" label="View posts" value="posts.view" :bind="$role->permissions" />
                        <x-form-checkbox name="permissions[]" label="Create posts" value="posts.create" :bind="$role->permissions" />
                        <x-form-checkbox name="permissions[]" label="Edit posts" value="posts.edit" :bind="$role->permissions" />
                        <x-form-checkbox name="permissions[]" label="Delete posts" value="posts.delete" :bind="$role->permissions" />
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="permissions[]"');
        $view->assertSee('View users');
        $view->assertSee('Create users');
        $view->assertSee('Edit users');
        $view->assertSee('Delete users');
        $view->assertSee('View posts');
        $view->assertSee('Create posts');
        $view->assertSee('Edit posts');
        $view->assertSee('Delete posts');
        $view->assertSee('value="users.view"');
        $view->assertSee('value="users.create"');
        $view->assertSee('value="users.edit"');
        $view->assertSee('value="users.delete"');
        $view->assertSee('value="posts.view"');
        $view->assertSee('value="posts.create"');
        $view->assertSee('value="posts.edit"');
        $view->assertSee('value="posts.delete"');
    }

    public function test_renders_ecommerce_product_options(): void
    {
        $view = $this->blade('
            <div class="product-options">
                <h4>Product Options</h4>
                <x-form-checkbox name="options[]" label="Available in multiple colors" value="colors" :bind="$product->options" />
                <x-form-checkbox name="options[]" label="Available in multiple sizes" value="sizes" :bind="$product->options" />
                <x-form-checkbox name="options[]" label="Express shipping available" value="express_shipping" :bind="$product->options" />
                <x-form-checkbox name="options[]" label="Gift wrapping available" value="gift_wrapping" :bind="$product->options" />
                <x-form-checkbox name="options[]" label="Installation service" value="installation" :bind="$product->options" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="options[]"');
        $view->assertSee('Available in multiple colors');
        $view->assertSee('Available in multiple sizes');
        $view->assertSee('Express shipping available');
        $view->assertSee('Gift wrapping available');
        $view->assertSee('Installation service');
        $view->assertSee('value="colors"');
        $view->assertSee('value="sizes"');
        $view->assertSee('value="express_shipping"');
        $view->assertSee('value="gift_wrapping"');
        $view->assertSee('value="installation"');
    }

    public function test_renders_contact_form_preferences(): void
    {
        $view = $this->blade('
            <div class="contact-preferences">
                <h4>Contact Preferences</h4>
                <x-form-checkbox name="contact_methods[]" label="Email" value="email" :bind="$contact->preferences" />
                <x-form-checkbox name="contact_methods[]" label="Phone" value="phone" :bind="$contact->preferences" />
                <x-form-checkbox name="contact_methods[]" label="SMS" value="sms" :bind="$contact->preferences" />
                <x-form-checkbox name="contact_methods[]" label="Postal mail" value="mail" :bind="$contact->preferences" />
                <x-form-checkbox name="urgent_contact" label="Allow urgent contact outside business hours" :bind="$contact->preferences" help="We may contact you for urgent matters even outside business hours" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('name="contact_methods[]"');
        $view->assertSee('Email');
        $view->assertSee('Phone');
        $view->assertSee('SMS');
        $view->assertSee('Postal mail');
        $view->assertSee('Allow urgent contact outside business hours');
        $view->assertSee('We may contact you for urgent matters even outside business hours');
        $view->assertSee('value="email"');
        $view->assertSee('value="phone"');
        $view->assertSee('value="sms"');
        $view->assertSee('value="mail"');
    }

    public function test_renders_system_configuration(): void
    {
        $view = $this->blade('
            <div class="system-settings">
                <h4>System Configuration</h4>
                <x-form-checkbox name="maintenance_mode" label="Maintenance mode" :bind="$settings" help="Enable maintenance mode for system updates" />
                <x-form-checkbox name="debug_mode" label="Debug mode" :bind="$settings" help="Enable debug logging (development only)" />
                <x-form-checkbox name="auto_backup" label="Automatic backups" :bind="$settings" help="Automatically backup data daily" />
                <x-form-checkbox name="email_notifications" label="Email notifications" :bind="$settings" help="Send system notifications via email" />
                <x-form-checkbox name="two_factor_auth" label="Two-factor authentication" :bind="$settings" help="Require 2FA for all users" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Maintenance mode');
        $view->assertSee('Debug mode');
        $view->assertSee('Automatic backups');
        $view->assertSee('Email notifications');
        $view->assertSee('Two-factor authentication');
        $view->assertSee('Enable maintenance mode for system updates');
        $view->assertSee('Enable debug logging (development only)');
        $view->assertSee('Automatically backup data daily');
        $view->assertSee('Send system notifications via email');
        $view->assertSee('Require 2FA for all users');
    }

    public function test_renders_livewire_component_example(): void
    {
        $view = $this->blade('
            <div>
                <h3>User Preferences</h3>
                <x-form-checkbox name="dark_mode" label="Dark mode" wire:model="darkMode" />
                <x-form-checkbox name="notifications" label="Enable notifications" wire:model="notifications" />
                <x-form-checkbox name="auto_save" label="Auto-save drafts" wire:model="autoSave" help="Automatically save your work as you type" />
                <x-form-checkbox name="public_profile" label="Public profile" wire:model="publicProfile" help="Allow others to view your profile" />
                <div class="mt-3">
                    <button wire:click="savePreferences" class="btn btn-primary">Save Preferences</button>
                </div>
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Dark mode');
        $view->assertSee('Enable notifications');
        $view->assertSee('Auto-save drafts');
        $view->assertSee('Public profile');
        $view->assertSee('Automatically save your work as you type');
        $view->assertSee('Allow others to view your profile');
        $view->assertSee('wire:model="darkMode"');
        $view->assertSee('wire:model="notifications"');
        $view->assertSee('wire:model="autoSave"');
        $view->assertSee('wire:model="publicProfile"');
        $view->assertSee('Save Preferences');
    }

    public function test_renders_checkbox_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-form-checkbox name="accessible" label="Accessible checkbox" aria-describedby="help-text" aria-required="true" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('aria-describedby="help-text"');
        $view->assertSee('aria-required="true"');
        $view->assertSee('Accessible checkbox');
    }

    public function test_renders_checkbox_with_data_attributes(): void
    {
        $view = $this->blade('<x-form-checkbox name="data_field" label="Data Field" data-testid="checkbox" data-cy="checkbox-input" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('data-testid="checkbox"');
        $view->assertSee('data-cy="checkbox-input"');
        $view->assertSee('Data Field');
    }

    public function test_renders_checkbox_with_responsive_classes(): void
    {
        $view = $this->blade('<x-form-checkbox name="responsive" label="Responsive Field" class="d-none d-md-block" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('Responsive Field');
    }

    public function test_renders_checkbox_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="spaced" label="Spaced Field" class="m-3 p-2" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('Spaced Field');
    }

    public function test_renders_checkbox_with_border_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="bordered" label="Bordered Field" class="border border-primary" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('Bordered Field');
    }

    public function test_renders_checkbox_with_background_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="background" label="Background Field" class="bg-light" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('bg-light');
        $view->assertSee('Background Field');
    }

    public function test_renders_checkbox_with_text_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="text_utils" label="Text Utils Field" class="text-primary fw-bold" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
        $view->assertSee('Text Utils Field');
    }

    public function test_renders_checkbox_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="shadowed" label="Shadowed Field" class="shadow" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('shadow');
        $view->assertSee('Shadowed Field');
    }

    public function test_renders_checkbox_with_position_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="positioned" label="Positioned Field" class="position-relative" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('position-relative');
        $view->assertSee('Positioned Field');
    }

    public function test_renders_checkbox_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="visible" label="Visible Field" class="visible opacity-75" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
        $view->assertSee('Visible Field');
    }

    public function test_renders_checkbox_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="overflow" label="Overflow Field" class="overflow-auto" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('overflow-auto');
        $view->assertSee('Overflow Field');
    }

    public function test_renders_checkbox_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-form-checkbox name="interactive" label="Interactive Field" class="user-select-all" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('user-select-all');
        $view->assertSee('Interactive Field');
    }

    public function test_renders_checkbox_with_inline_style(): void
    {
        $view = $this->blade('<x-form-checkbox name="styled" label="Styled Field" style="margin: 1rem; padding: 0.5rem;" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('margin: 1rem');
        $view->assertSee('padding: 0.5rem');
        $view->assertSee('Styled Field');
    }

    public function test_renders_checkbox_with_validation_error(): void
    {
        $view = $this->blade('<x-form-checkbox name="terms" label="I agree to terms" required />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('I agree to terms');
        $view->assertSee('required');
    }

    public function test_renders_checkbox_with_bind_key(): void
    {
        $view = $this->blade('<x-form-checkbox name="is_active" label="Active user" :bind="$user" bindKey="id" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Active user');
    }

    public function test_renders_checkbox_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-checkbox name="extra" label="Extra Field" extra-attributes="data-custom=value" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('data-custom=value');
        $view->assertSee('Extra Field');
    }

    public function test_renders_checkbox_with_settings(): void
    {
        $view = $this->blade('<x-form-checkbox name="configured" label="Configured Field" :settings="[\'custom\' => \'value\']" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('Configured Field');
    }
}
