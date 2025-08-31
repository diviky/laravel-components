<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class AlertTest extends TestCase
{
    public function test_renders_basic_alert(): void
    {
        $view = $this->blade('<x-alert>Test message</x-alert>');

        $view->assertSee('Test message');
        $view->assertSee('class="alert');
        $view->assertSee('role="alert"');
    }

    public function test_renders_with_default_info_type(): void
    {
        $view = $this->blade('<x-alert>Info message</x-alert>');

        $view->assertSee('alert-info');
        $view->assertSee('info-circle'); // Default icon for info
    }

    public function test_renders_alert_types(): void
    {
        $types = [
            'info' => 'alert-info',
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'danger' => 'alert-danger',
            'help' => 'alert-info', // help maps to info styling
        ];

        foreach ($types as $type => $expectedClass) {
            $view = $this->blade("<x-alert type=\"{$type}\">Message</x-alert>");

            $view->assertSee($expectedClass);
            $view->assertSee('Message');
        }
    }

    public function test_automatic_icon_mapping(): void
    {
        $iconMappings = [
            'info' => 'info-circle',
            'help' => 'help',
            'success' => 'rosette-discount-check',
            'warning' => 'alert-triangle',
            'danger' => 'alert-hexagon',
        ];

        foreach ($iconMappings as $type => $expectedIcon) {
            $view = $this->blade("<x-alert type=\"{$type}\">Message</x-alert>");

            $view->assertSee($expectedIcon);
        }
    }

    public function test_custom_icon_overrides_default(): void
    {
        $view = $this->blade('<x-alert type="success" icon="custom-icon">Message</x-alert>');

        $view->assertSee('custom-icon');
        $view->assertDontSee('rosette-discount-check'); // Default success icon should not appear
    }

    public function test_dismissible_alert(): void
    {
        $view = $this->blade('<x-alert dismissible>Dismissible message</x-alert>');

        $view->assertSee('alert-dismissible');
        $view->assertSee('btn-close');
        $view->assertSee('data-bs-dismiss="alert"');
    }

    public function test_non_dismissible_alert(): void
    {
        $view = $this->blade('<x-alert>Non-dismissible message</x-alert>');

        $view->assertDontSee('alert-dismissible');
        $view->assertDontSee('btn-close');
    }

    public function test_alert_with_title(): void
    {
        $view = $this->blade('<x-alert title="Alert Title">Message content</x-alert>');

        $view->assertSee('<h4 class="alert-title">Alert Title</h4>', false);
        $view->assertSee('Message content');
    }

    public function test_alert_with_message_attribute(): void
    {
        $view = $this->blade('<x-alert message="Message from attribute" />');

        $view->assertSee('Message from attribute');
    }

    public function test_message_attribute_takes_precedence_over_slot(): void
    {
        $view = $this->blade('<x-alert message="Attribute message">Slot content</x-alert>');

        $view->assertSee('Attribute message');
        $view->assertDontSee('Slot content');
    }

    public function test_slot_content_when_no_message_attribute(): void
    {
        $view = $this->blade('<x-alert>Slot content only</x-alert>');

        $view->assertSee('Slot content only');
    }

    public function test_alert_with_title_and_message(): void
    {
        $view = $this->blade('<x-alert title="Success" message="Operation completed" type="success" />');

        $view->assertSee('<h4 class="alert-title">Success</h4>', false);
        $view->assertSee('Operation completed');
        $view->assertSee('alert-success');
    }

    public function test_custom_css_classes(): void
    {
        $view = $this->blade('<x-alert class="custom-class shadow">Message</x-alert>');

        $view->assertSee('custom-class');
        $view->assertSee('shadow');
    }

    public function test_rich_html_content(): void
    {
        $content = '<strong>Bold text</strong> and <em>italic text</em>';
        $view = $this->blade("<x-alert>{$content}</x-alert>");

        $view->assertSee('<strong>Bold text</strong>', false);
        $view->assertSee('<em>italic text</em>', false);
    }

    public function test_alert_variants(): void
    {
        $variants = [
            'alert.success' => 'alert-success',
            'alert.danger' => 'alert-danger',
            'alert.error' => 'alert-danger', // error maps to danger
            'alert.warning' => 'alert-warning',
            'alert.info' => 'alert-info',
            'alert.help' => 'alert-info', // help maps to info
        ];

        foreach ($variants as $variant => $expectedClass) {
            $view = $this->blade("<x-{$variant}>Variant message</x-{$variant}>");

            $view->assertSee($expectedClass);
            $view->assertSee('Variant message');
        }
    }

    public function test_alert_structure_with_icon(): void
    {
        $view = $this->blade('<x-alert type="success" title="Success">Content</x-alert>');

        // Should have flex container for icon alignment
        $view->assertSee('d-flex align-items-center');

        // Should have icon div
        $view->assertSee('<div>', false);
        $view->assertSee('me-2', false); // Icon margin

        // Should have content div
        $view->assertSee('flex-grow-1');
    }

    public function test_alert_without_icon(): void
    {
        $view = $this->blade('<x-alert icon="">No icon alert</x-alert>');

        $view->assertSee('No icon alert');
        $view->assertDontSee('d-flex align-items-center');
    }

    public function test_empty_icon_prevents_icon_display(): void
    {
        $view = $this->blade('<x-alert type="success" icon="">No icon</x-alert>');

        $view->assertSee('No icon');
        $view->assertDontSee('rosette-discount-check');
        $view->assertDontSee('<x-icon');
    }

    public function test_alert_responsive_classes(): void
    {
        $view = $this->blade('<x-alert>Message</x-alert>');

        $view->assertSee('text-sm'); // Small text
        $view->assertSee('max-w-xl'); // Max width constraint
    }

    public function test_alert_maintains_attributes(): void
    {
        $view = $this->blade('<x-alert id="custom-alert" data-testid="alert">Message</x-alert>');

        $view->assertSee('id="custom-alert"');
        $view->assertSee('data-testid="alert"');
    }

    public function test_complex_alert_example(): void
    {
        $view = $this->blade('
            <x-alert
                type="warning"
                title="Important Notice"
                dismissible
                icon="exclamation-triangle"
                class="mb-4">
                <strong>Warning:</strong> This action cannot be undone.
            </x-alert>
        ');

        $view->assertSee('alert-warning');
        $view->assertSee('alert-dismissible');
        $view->assertSee('Important Notice');
        $view->assertSee('exclamation-triangle');
        $view->assertSee('<strong>Warning:</strong>', false);
        $view->assertSee('mb-4');
    }

    public function test_alert_edge_cases(): void
    {
        // Empty content
        $view = $this->blade('<x-alert></x-alert>');
        $view->assertStatus(200);

        // Only title, no content
        $view = $this->blade('<x-alert title="Title Only" />');
        $view->assertSee('Title Only');

        // Invalid type defaults to info
        $view = $this->blade('<x-alert type="invalid">Message</x-alert>');
        $view->assertSee('alert-info'); // Should default to info
    }

    public function test_alert_accessibility(): void
    {
        $view = $this->blade('<x-alert>Accessible alert</x-alert>');

        // Should have proper ARIA role
        $view->assertSee('role="alert"');

        // Content should be readable
        $view->assertSee('Accessible alert');
    }

    public function test_livewire_compatibility(): void
    {
        $view = $this->blade('
            <x-alert
                type="success"
                wire:click="handleClick"
                wire:model="alertMessage">
                Livewire alert
            </x-alert>
        ');

        $view->assertSee('wire:click="handleClick"');
        $view->assertSee('wire:model="alertMessage"');
        $view->assertSee('Livewire alert');
    }

    public function test_bootstrap_dismissible_integration(): void
    {
        $view = $this->blade('<x-alert dismissible>Dismissible alert</x-alert>');

        // Should have Bootstrap dismissible attributes
        $view->assertSee('alert-dismissible');
        $view->assertSee('data-bs-dismiss="alert"');
        $view->assertSee('aria-label="Close"');
        $view->assertSee('btn-close');
    }

    public function test_icon_component_integration(): void
    {
        $view = $this->blade('<x-alert type="success">Success message</x-alert>');

        // Should render icon component
        $view->assertSee('<x-icon', false);
        $view->assertSee('size="md"');
        $view->assertSee('class="me-2"');
    }

    public function test_title_without_message_shows_title_only(): void
    {
        $view = $this->blade('<x-alert title="Title Only" type="info" />');

        $view->assertSee('<h4 class="alert-title">Title Only</h4>', false);
        // Should not have message paragraph
        $view->assertDontSee('<p class="mb-0">');
    }

    public function test_multiple_css_classes_merge_correctly(): void
    {
        $view = $this->blade('<x-alert type="success" class="custom shadow-lg border">Message</x-alert>');

        // Should have alert type class
        $view->assertSee('alert-success');

        // Should have custom classes
        $view->assertSee('custom');
        $view->assertSee('shadow-lg');
        $view->assertSee('border');

        // Should maintain base classes
        $view->assertSee('alert');
        $view->assertSee('text-sm');
        $view->assertSee('max-w-xl');
    }
}
