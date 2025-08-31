<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormSwitchTest extends TestCase
{
    public function test_renders_basic_switch(): void
    {
        $view = $this->blade('<x-form-switch name="notifications" label="Enable Notifications" />');

        $view->assertSee('Enable Notifications');
        $view->assertSee('form-switch');
        $view->assertSee('form-check-input');
        $view->assertSee('name="notifications"');
        $view->assertSee('type="checkbox"');
    }

    public function test_switch_with_title(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="dark_mode"
                label="Dark Mode"
                title="Appearance Settings" />
        ');

        $view->assertSee('Appearance Settings');
        $view->assertSee('form-label');
        $view->assertSee('Dark Mode');
    }

    public function test_switch_with_help_text(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="auto_save"
                label="Auto Save"
                help="Automatically save your work" />
        ');

        $view->assertSee('Automatically save your work');
        $view->assertSee('form-check-description');
    }

    public function test_switch_checked_by_default(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="feature"
                label="Beta Feature"
                :checked="true" />
        ');

        $view->assertSee('checked');
        $view->assertSee('Beta Feature');
    }

    public function test_switch_not_checked_by_default(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="feature"
                label="Beta Feature"
                :checked="false" />
        ');

        $view->assertDontSee('checked');
        $view->assertSee('Beta Feature');
    }

    public function test_switch_with_custom_value(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="status"
                label="Active Status"
                value="active" />
        ');

        $view->assertSee('value="active"');
        $view->assertSee('Active Status');
    }

    public function test_switch_with_custom_copy_value(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="status"
                label="Active Status"
                copy="inactive" />
        ');

        $view->assertSee('value="inactive"');
        $view->assertSee('type="hidden"');
    }

    public function test_switch_with_copy_false(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="status"
                label="Active Status"
                :copy="false" />
        ');

        $view->assertDontSee('type="hidden"');
        $view->assertSee('Active Status');
    }

    public function test_switch_inline_display(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="email"
                label="Email"
                inline />
        ');

        $view->assertSee('form-check-inline');
        $view->assertSee('Email');
    }

    public function test_switch_not_inline(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="email"
                label="Email"
                :inline="false" />
        ');

        $view->assertDontSee('form-check-inline');
        $view->assertSee('Email');
    }

    public function test_switch_disabled(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="premium"
                label="Premium Features"
                disabled />
        ');

        $view->assertSee('disabled');
        $view->assertSee('Premium Features');
    }

    public function test_switch_required(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="terms"
                label="I agree to terms"
                required />
        ');

        $view->assertSee('required');
        $view->assertSee('I agree to terms');
    }

    public function test_switch_with_custom_classes(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="feature"
                label="Beta Feature"
                class="custom-switch-lg">
            </x-form-switch>
        ');

        $view->assertSee('custom-switch-lg');
        $view->assertSee('Beta Feature');
    }

    public function test_switch_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="test_switch"
                label="Test Switch"
                id="custom-id"
                data-testid="switch"
                aria-label="Test switch">
            </x-form-switch>
        ');

        $view->assertSee('id="custom-id"');
        $view->assertSee('data-testid="switch"');
        $view->assertSee('aria-label="Test switch"');
    }

    public function test_switch_livewire_integration(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="real_time"
                label="Real-time Updates"
                wire:model="settings.realTime" />
        ');

        $view->assertSee('wire:model="settings.realTime"');
        $view->assertSee('Real-time Updates');
    }

    public function test_switch_with_default_slot(): void
    {
        $view = $this->blade('
            <x-form-switch name="analytics" label="Analytics">
                <div class="custom-content">Additional content</div>
            </x-form-switch>
        ');

        $view->assertSee('Analytics');
        $view->assertSee('Additional content');
        $view->assertSee('custom-content');
    }

    public function test_switch_form_group_structure(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="notifications"
                label="Enable Notifications" />
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-check');
        $view->assertSee('form-switch');
    }

    public function test_switch_label_structure(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="notifications"
                label="Enable Notifications" />
        ');

        $view->assertSee('form-check-label');
        $view->assertSee('Enable Notifications');
    }

    public function test_switch_input_structure(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="notifications"
                label="Enable Notifications" />
        ');

        $view->assertSee('form-check-input');
        $view->assertSee('type="checkbox"');
        $view->assertSee('name="notifications"');
    }

    public function test_switch_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-switch name="analytics" label="Analytics">
                <x-slot:help>
                    <div class="text-muted small">
                        <i class="icon-info"></i>
                        Help us improve by sharing anonymous usage data
                    </div>
                </x-slot:help>
            </x-form-switch>
        ');

        $view->assertSee('Analytics');
        $view->assertSee('Help us improve by sharing anonymous usage data');
        $view->assertSee('icon-info');
    }

    public function test_switch_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="premium_feature"
                label="Premium Feature"
                title="Premium Settings"
                help="Enable premium features"
                value="premium"
                copy="basic"
                :checked="true"
                inline
                required
                class="custom-switch">
                <div>Additional content</div>
            </x-form-switch>
        ');

        $view->assertSee('Premium Settings');
        $view->assertSee('Premium Feature');
        $view->assertSee('Enable premium features');
        $view->assertSee('value="premium"');
        $view->assertSee('value="basic"');
        $view->assertSee('checked');
        $view->assertSee('form-check-inline');
        $view->assertSee('required');
        $view->assertSee('custom-switch');
        $view->assertSee('Additional content');
    }

    public function test_switch_accessibility_features(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="accessibility"
                label="Accessibility Mode"
                role="switch"
                aria-describedby="help-text">
            </x-form-switch>
        ');

        $view->assertSee('role="switch"');
        $view->assertSee('aria-describedby="help-text"');
        $view->assertSee('Accessibility Mode');
    }

    public function test_switch_handles_edge_cases(): void
    {
        // Empty label
        $view = $this->blade('<x-form-switch name="empty" label="" />');
        $view->assertStatus(200);

        // Special characters in label
        $view = $this->blade('<x-form-switch name="special" label="Special & Characters →" />');
        $view->assertSee('Special &amp; Characters →');

        // Long label
        $longLabel = 'This is a very long label that might wrap to multiple lines and should still display correctly';
        $view = $this->blade("<x-form-switch name=\"long\" label=\"{$longLabel}\" />");
        $view->assertSee($longLabel);
    }

    public function test_switch_validation_integration(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="terms"
                label="I agree to terms"
                required />
        ');

        $view->assertSee('required');
        $view->assertSee('I agree to terms');
    }

    public function test_switch_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="performance"
                label="Performance Mode"
                data-testid="switch-component"
                data-loading="false"
                data-interactive="true">
            </x-form-switch>
        ');

        $view->assertSee('data-testid="switch-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }

    public function test_switch_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="bootstrap"
                label="Bootstrap Switch"
                id="bootstrapSwitch">
            </x-form-switch>
        ');

        // Should have proper Bootstrap switch structure
        $view->assertSee('form-switch');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('id="bootstrapSwitch"');
    }

    public function test_switch_with_numeric_values(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="numeric"
                label="Numeric Switch"
                value="1"
                copy="0" />
        ');

        $view->assertSee('value="1"');
        $view->assertSee('value="0"');
        $view->assertSee('Numeric Switch');
    }

    public function test_switch_with_boolean_values(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="boolean"
                label="Boolean Switch"
                :checked="true" />
        ');

        $view->assertSee('checked');
        $view->assertSee('Boolean Switch');
    }

    public function test_switch_with_complex_content(): void
    {
        $view = $this->blade('
            <x-form-switch name="complex" label="Complex Switch">
                <div class="complex-content">
                    <span class="icon">⚙️</span>
                    <span class="text">Settings</span>
                    <small class="description">Advanced configuration options</small>
                </div>
            </x-form-switch>
        ');

        $view->assertSee('Complex Switch');
        $view->assertSee('⚙️');
        $view->assertSee('Settings');
        $view->assertSee('Advanced configuration options');
    }

    public function test_switch_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="semantic"
                label="Semantic Switch" />
        ');

        // Should have proper semantic structure
        $view->assertSee('<label', false);
        $view->assertSee('<input', false);
        $view->assertSee('form-check');
        $view->assertSee('form-switch');
    }

    public function test_switch_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="merging"
                label="Class Merging"
                class="custom-class">
            </x-form-switch>
        ');

        // Should merge custom class with default classes
        $view->assertSee('custom-class');
        $view->assertSee('form-check-input');
    }

    public function test_switch_with_extra_attributes(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="extra"
                label="Extra Attributes"
                extra-attributes="data-custom=\"value\" onclick=\"alert(\'clicked\')\"">
            </x-form-switch>
        ');

        $view->assertSee('data-custom="value"');
        $view->assertSee('onclick="alert(\'clicked\')"');
    }

    public function test_switch_form_group_with_title(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="with_title"
                label="Switch with Title"
                title="Form Group Title" />
        ');

        $view->assertSee('Form Group Title');
        $view->assertSee('form-label');
        $view->assertSee('Switch with Title');
    }

    public function test_switch_form_group_without_title(): void
    {
        $view = $this->blade('
            <x-form-switch
                name="without_title"
                label="Switch without Title" />
        ');

        $view->assertDontSee('form-label');
        $view->assertSee('Switch without Title');
    }

    public function test_switch_hidden_input_behavior(): void
    {
        // With copy value
        $view = $this->blade('
            <x-form-switch
                name="hidden_test"
                label="Hidden Test"
                copy="off" />
        ');

        $view->assertSee('type="hidden"');
        $view->assertSee('value="off"');

        // Without copy (copy = false)
        $view = $this->blade('
            <x-form-switch
                name="no_hidden"
                label="No Hidden"
                :copy="false" />
        ');

        $view->assertDontSee('type="hidden"');
    }

    public function test_switch_checked_attribute_behavior(): void
    {
        // Checked = true
        $view = $this->blade('
            <x-form-switch
                name="checked_true"
                label="Checked True"
                :checked="true" />
        ');

        $view->assertSee('checked');

        // Checked = false
        $view = $this->blade('
            <x-form-switch
                name="checked_false"
                label="Checked False"
                :checked="false" />
        ');

        $view->assertDontSee('checked');
    }

    public function test_switch_inline_behavior(): void
    {
        // Inline = true
        $view = $this->blade('
            <x-form-switch
                name="inline_true"
                label="Inline True"
                inline />
        ');

        $view->assertSee('form-check-inline');

        // Inline = false
        $view = $this->blade('
            <x-form-switch
                name="inline_false"
                label="Inline False"
                :inline="false" />
        ');

        $view->assertDontSee('form-check-inline');
    }
}
