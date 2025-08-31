<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Components\FormButton;

class FormButtonTest extends ComponentTestCase
{
    public function test_renders_with_basic_attributes(): void
    {
        $component = $this->createComponent();
        $view = $this->component($component);

        $view->assertSee('<button');
        $view->assertSee('btn');
        $view->assertSee('type="button"'); // Default type
    }

    public function test_handles_all_attributes(): void
    {
        $component = $this->createComponent([
            'outline' => true,
            'ghost' => false,
            'disabled' => true,
        ]);

        $view = $this->component($component, ['class' => 'btn-primary']);

        $view->assertSee('btn-outline-primary'); // Outline prefix applied
        $view->assertSee('disabled');
        $this->assertTrue($component->disabled);
    }

    public function test_outline_style_application(): void
    {
        $component = $this->createComponent(['outline' => true]);

        $this->assertEquals('outline-', $component->outline);
    }

    public function test_ghost_style_application(): void
    {
        $component = $this->createComponent(['ghost' => true]);

        $this->assertEquals('ghost-', $component->outline);
    }

    public function test_ghost_takes_precedence_over_outline(): void
    {
        $component = $this->createComponent([
            'outline' => true,
            'ghost' => true,
        ]);

        $this->assertEquals('ghost-', $component->outline);
    }

    public function test_no_style_prefix_when_both_false(): void
    {
        $component = $this->createComponent([
            'outline' => false,
            'ghost' => false,
        ]);

        $this->assertEquals('', $component->outline);
    }

    public function test_disabled_state(): void
    {
        $component = $this->createComponent(['disabled' => true]);
        $view = $this->component($component);

        $view->assertSee('disabled');
        $this->assertTrue($component->disabled);
    }

    public function test_enabled_state_default(): void
    {
        $component = $this->createComponent();

        $this->assertFalse($component->disabled);
    }

    public function test_button_types(): void
    {
        $types = ['button', 'submit', 'reset'];

        foreach ($types as $type) {
            $view = $this->blade("<x-form-button type=\"{$type}\">Button</x-form-button>");

            $view->assertSee("type=\"{$type}\"");
        }
    }

    public function test_button_with_content(): void
    {
        $view = $this->blade('<x-form-button>Save Changes</x-form-button>');

        $view->assertSee('Save Changes');
    }

    public function test_button_with_html_content(): void
    {
        $content = '<i class="icon-save"></i> Save';
        $view = $this->blade("<x-form-button>{$content}</x-form-button>");

        $view->assertSee('<i class="icon-save"></i>', false);
        $view->assertSee('Save');
    }

    public function test_button_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-form-button
                id="custom-btn"
                name="action"
                value="save"
                data-test="button">
                Custom Button
            </x-form-button>
        ');

        $view->assertSee('id="custom-btn"');
        $view->assertSee('name="action"');
        $view->assertSee('value="save"');
        $view->assertSee('data-test="button"');
    }

    public function test_outline_button_with_bootstrap_classes(): void
    {
        $view = $this->blade('<x-form-button outline class="btn-primary">Outline</x-form-button>');

        // Should see outline prefix applied to classes
        $view->assertSee('btn-outline-primary');
        $view->assertSee('Outline');
    }

    public function test_ghost_button_with_bootstrap_classes(): void
    {
        $view = $this->blade('<x-form-button ghost class="btn-secondary">Ghost</x-form-button>');

        // Should see ghost prefix applied to classes
        $view->assertSee('btn-ghost-secondary');
        $view->assertSee('Ghost');
    }

    public function test_button_with_multiple_css_classes(): void
    {
        $component = $this->createComponent(['outline' => true]);
        $view = $this->component($component, [
            'class' => 'btn-primary btn-lg shadow',
        ]);

        $view->assertSee('btn-outline-primary');
        $view->assertSee('btn-lg');
        $view->assertSee('shadow');
    }

    public function test_livewire_attributes(): void
    {
        $view = $this->blade('
            <x-form-button
                wire:click="save"
                wire:loading.attr="disabled">
                Save
            </x-form-button>
        ');

        $view->assertSee('wire:click="save"');
        $view->assertSee('wire:loading.attr="disabled"');
    }

    public function test_form_submission_button(): void
    {
        $view = $this->blade('
            <form>
                <x-form-button type="submit" class="btn-primary">
                    Submit Form
                </x-form-button>
            </form>
        ');

        $view->assertSee('type="submit"');
        $view->assertSee('btn-primary');
        $view->assertSee('Submit Form');
    }

    public function test_disabled_button_accessibility(): void
    {
        $component = $this->createComponent(['disabled' => true]);
        $view = $this->component($component);

        // Should have disabled attribute for accessibility
        $view->assertSee('disabled');
    }

    public function test_button_with_aria_attributes(): void
    {
        $view = $this->blade('
            <x-form-button
                aria-label="Save document"
                aria-describedby="save-help">
                Save
            </x-form-button>
        ');

        $view->assertSee('aria-label="Save document"');
        $view->assertSee('aria-describedby="save-help"');
    }

    public function test_button_onclick_handler(): void
    {
        $view = $this->blade('
            <x-form-button onclick="alert(\'Clicked!\')">
                Click Me
            </x-form-button>
        ');

        $view->assertSee('onclick="alert(&#039;Clicked!&#039;)"');
    }

    public function test_handles_edge_cases(): void
    {
        // Test with no content
        $view = $this->blade('<x-form-button></x-form-button>');
        $view->assertStatus(200);

        // Test with special characters in content
        $view = $this->blade('<x-form-button>Save & Continue →</x-form-button>');
        $view->assertSee('Save &amp; Continue →');

        // Test with very long class names
        $component = $this->createComponent(['outline' => true]);
        $view = $this->component($component, [
            'class' => 'btn-primary btn-lg btn-block custom-very-long-class-name',
        ]);
        $view->assertSee('btn-outline-primary');
        $view->assertSee('custom-very-long-class-name');
    }

    public function test_component_data_structure(): void
    {
        $component = $this->createComponent([
            'outline' => true,
            'ghost' => false,
            'disabled' => true,
        ]);

        $data = $component->data();

        $this->assertArrayHasKey('outline', $data);
        $this->assertArrayHasKey('ghost', $data);
        $this->assertArrayHasKey('disabled', $data);

        $this->assertEquals('outline-', $data['outline']);
        $this->assertFalse($data['ghost']);
        $this->assertTrue($data['disabled']);
    }

    public function test_bootstrap_modal_integration(): void
    {
        $view = $this->blade('
            <x-form-button
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                class="btn-primary">
                Open Modal
            </x-form-button>
        ');

        $view->assertSee('data-bs-toggle="modal"');
        $view->assertSee('data-bs-target="#exampleModal"');
    }

    protected function createComponent(array $attributes = []): FormButton
    {
        return new FormButton(
            outline: $attributes['outline'] ?? false,
            ghost: $attributes['ghost'] ?? false,
            disabled: $attributes['disabled'] ?? false,
        );
    }

    protected function getComponentName(): string
    {
        return 'form-button';
    }

    protected function getDefaultAttributes(): array
    {
        return [];
    }

    protected function getAllAttributes(): array
    {
        return [
            'outline' => true,
            'ghost' => false,
            'disabled' => true,
            'type' => 'submit',
            'class' => 'btn-primary btn-lg',
            'id' => 'custom-button',
            'name' => 'action',
            'value' => 'save',
        ];
    }
}
