<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewStatusTest extends TestCase
{
    /** @test */
    public function it_renders_basic_status_with_default_options()
    {
        $view = $this->blade('<x-view.status value="1" />');

        $view->assertSee('Active');
        $view->assertSee('status-success');
    }

    /** @test */
    public function it_renders_inactive_status_with_default_options()
    {
        $view = $this->blade('<x-view.status value="0" />');

        $view->assertSee('Inactive');
        $view->assertSee('status-warning');
    }

    /** @test */
    public function it_renders_status_with_custom_icon()
    {
        $view = $this->blade('<x-view.status value="1" icon="user" />');

        $view->assertSee('user');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_custom_label()
    {
        $view = $this->blade('<x-view.status value="1" label="User Status:" />');

        $view->assertSee('User Status:');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_icon_and_label()
    {
        $view = $this->blade('<x-view.status value="1" icon="user" label="User Status:" />');

        $view->assertSee('user');
        $view->assertSee('User Status:');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_copy_functionality()
    {
        $view = $this->blade('<x-view.status value="1" copy="true" />');

        $view->assertSee('copy');
        $view->assertSee('data-clipboard="1"');
        $view->assertSee('copy to clipboard');
    }

    /** @test */
    public function it_renders_status_with_dot_indicator()
    {
        $view = $this->blade('<x-view.status value="1" dot="true" />');

        $view->assertSee('status-dot');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_animated_dot()
    {
        $view = $this->blade('<x-view.status value="1" dot="true" animated="true" />');

        $view->assertSee('status-dot');
        $view->assertSee('status-dot-animated');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_custom_options()
    {
        $customOptions = [
            'custom' => 'Custom Status',
            'pending' => 'Pending Approval'
        ];

        $view = $this->blade('<x-view.status value="custom" :options="$customOptions" />', ['customOptions' => $customOptions]);

        $view->assertSee('Custom Status');
    }

    /** @test */
    public function it_renders_status_with_complex_options()
    {
        $complexOptions = [
            'warning' => [
                'text' => 'Needs Attention',
                'color' => 'warning',
                'animated' => true
            ]
        ];

        $view = $this->blade('<x-view.status value="warning" :options="$complexOptions" />', ['complexOptions' => $complexOptions]);

        $view->assertSee('Needs Attention');
        $view->assertSee('status-warning');
    }

    /** @test */
    public function it_renders_status_with_custom_class()
    {
        $view = $this->blade('<x-view.status value="1" class="custom-status" />');

        $view->assertSee('class="custom-status');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_custom_id()
    {
        $view = $this->blade('<x-view.status value="1" id="status-123" />');

        $view->assertSee('id="status-123"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_inline_styles()
    {
        $view = $this->blade('<x-view.status value="1" style="font-size: 18px;" />');

        $view->assertSee('style="font-size: 18px;"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_slot_content()
    {
        $view = $this->blade('<x-view.status value="1">Additional content</x-view.status>');

        $view->assertSee('Active');
        $view->assertSee('Additional content');
    }

    /** @test */
    public function it_renders_status_with_empty_value()
    {
        $view = $this->blade('<x-view.status value="" />');

        // Should handle empty value gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_null_value()
    {
        $view = $this->blade('<x-view.status :value="null" />');

        // Should handle null value gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_boolean_true()
    {
        $view = $this->blade('<x-view.status :value="true" />');

        $view->assertSee('Active');
        $view->assertSee('status-success');
    }

    /** @test */
    public function it_renders_status_with_boolean_false()
    {
        $view = $this->blade('<x-view.status :value="false" />');

        $view->assertSee('Inactive');
        $view->assertSee('status-warning');
    }

    /** @test */
    public function it_renders_status_with_numeric_string()
    {
        $view = $this->blade('<x-view.status value="2" />');

        // Should handle unknown values gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_large_number()
    {
        $view = $this->blade('<x-view.status value="999" />');

        // Should handle large numbers gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_negative_number()
    {
        $view = $this->blade('<x-view.status value="-1" />');

        // Should handle negative numbers gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_decimal_number()
    {
        $view = $this->blade('<x-view.status value="1.5" />');

        // Should handle decimal numbers gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_special_characters()
    {
        $view = $this->blade('<x-view.status value="status@123" />');

        // Should handle special characters gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_unicode_characters()
    {
        $view = $this->blade('<x-view.status value="status-ñáé" />');

        // Should handle unicode characters gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_very_long_value()
    {
        $longValue = str_repeat('a', 1000);
        $view = $this->blade('<x-view.status :value="$longValue" />', ['longValue' => $longValue]);

        // Should handle very long values gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_empty_options_array()
    {
        $view = $this->blade('<x-view.status value="test" :options="[]" />', ['options' => []]);

        // Should handle empty options gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_null_options()
    {
        $view = $this->blade('<x-view.status value="test" :options="null" />', ['options' => null]);

        // Should handle null options gracefully
        $view->assertStatus(200);
    }

    /** @test */
    public function it_renders_status_with_settings_array()
    {
        $settings = ['color' => 'primary', 'size' => 'lg'];
        $view = $this->blade('<x-view.status value="1" :settings="$settings" />', ['settings' => $settings]);

        // Should handle settings gracefully
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_empty_settings()
    {
        $view = $this->blade('<x-view.status value="1" :settings="[]" />', ['settings' => []]);

        // Should handle empty settings gracefully
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_copy_and_dot()
    {
        $view = $this->blade('<x-view.status value="1" copy="true" dot="true" />');

        $view->assertSee('copy');
        $view->assertSee('status-dot');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_copy_and_animated_dot()
    {
        $view = $this->blade('<x-view.status value="1" copy="true" dot="true" animated="true" />');

        $view->assertSee('copy');
        $view->assertSee('status-dot-animated');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_all_attributes()
    {
        $view = $this->blade('<x-view.status value="1" icon="user" label="Status:" copy="true" dot="true" animated="true" class="custom" id="test" />');

        $view->assertSee('user');
        $view->assertSee('Status:');
        $view->assertSee('copy');
        $view->assertSee('status-dot-animated');
        $view->assertSee('class="custom');
        $view->assertSee('id="test"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_livewire_attributes()
    {
        $view = $this->blade('<x-view.status value="1" wire:model="userStatus" wire:click="updateStatus" />');

        $view->assertSee('wire:model="userStatus"');
        $view->assertSee('wire:click="updateStatus"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_turbo_attributes()
    {
        $view = $this->blade('<x-view.status value="1" data-turbo="true" data-pjax="true" />');

        $view->assertSee('data-turbo="true"');
        $view->assertSee('data-pjax="true"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_accessibility_attributes()
    {
        $view = $this->blade('<x-view.status value="1" aria-label="User status" role="status" />');

        $view->assertSee('aria-label="User status"');
        $view->assertSee('role="status"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_data_attributes()
    {
        $view = $this->blade('<x-view.status value="1" data-test="status-component" data-id="123" />');

        $view->assertSee('data-test="status-component"');
        $view->assertSee('data-id="123"');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_custom_icon_class()
    {
        $view = $this->blade('<x-view.status value="1" icon="user" icon-class="custom-icon" />');

        $view->assertSee('user');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_custom_label_class()
    {
        $view = $this->blade('<x-view.status value="1" label="Status:" label-class="custom-label" />');

        $view->assertSee('Status:');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_custom_badge_class()
    {
        $view = $this->blade('<x-view.status value="1" badge-class="custom-badge" />');

        $view->assertSee('Active');
        // The badge class should be applied
    }

    /** @test */
    public function it_renders_status_with_conditional_attributes()
    {
        $view = $this->blade('<x-view.status value="1" :copy="$copy" :dot="$dot" />', ['copy' => true, 'dot' => false]);

        $view->assertSee('copy');
        $view->assertDontSee('status-dot');
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_status_with_dynamic_options()
    {
        $dynamicOptions = [
            'active' => 'Active User',
            'pending' => 'Pending Approval'
        ];

        $view = $this->blade('<x-view.status value="active" :options="$dynamicOptions" />', ['dynamicOptions' => $dynamicOptions]);

        $view->assertSee('Active User');
    }

    /** @test */
    public function it_renders_status_with_nested_options()
    {
        $nestedOptions = [
            'warning' => [
                'text' => 'Warning Status',
                'color' => 'warning',
                'animated' => true,
                'icon' => 'alert-triangle'
            ]
        ];

        $view = $this->blade('<x-view.status value="warning" :options="$nestedOptions" />', ['nestedOptions' => $nestedOptions]);

        $view->assertSee('Warning Status');
        $view->assertSee('status-warning');
    }
}
