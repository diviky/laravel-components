<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormNumberTest extends TestCase
{
    /** @test */
    public function it_renders_form_number_with_basic_attributes()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-number');
    }

    /** @test */
    public function it_renders_form_number_with_label()
    {
        $view = $this->blade('<x-form-number name="quantity" label="Quantity" />');

        $view->assertSee('name="quantity"');
        $view->assertSee('Quantity');
    }

    /** @test */
    public function it_renders_form_number_with_value()
    {
        $view = $this->blade('<x-form-number name="amount" value="42" />');

        $view->assertSee('name="amount"');
        $view->assertSee('42');
    }

    /** @test */
    public function it_renders_form_number_with_default_value()
    {
        $view = $this->blade('<x-form-number name="amount" :default="\'100\'" />');

        $view->assertSee('name="amount"');
        $view->assertSee('100');
    }

    /** @test */
    public function it_renders_form_number_with_extra_attributes()
    {
        $view = $this->blade('<x-form-number name="test" :extra-attributes="[\'data-test\' => \'number\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="number"');
    }

    /** @test */
    public function it_renders_form_number_with_custom_class()
    {
        $view = $this->blade('<x-form-number name="test" class="custom-number" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-number');
    }

    /** @test */
    public function it_renders_form_number_with_custom_id()
    {
        $view = $this->blade('<x-form-number name="test" id="number-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="number-input"');
    }

    /** @test */
    public function it_renders_form_number_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-number name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_number_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-number name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_number_with_required_attribute()
    {
        $view = $this->blade('<x-form-number name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_number_with_placeholder()
    {
        $view = $this->blade('<x-form-number name="test" placeholder="Enter a number" />');

        $view->assertSee('name="test"');
        $view->assertSee('Enter a number');
    }

    /** @test */
    public function it_renders_form_number_with_min_attribute()
    {
        $view = $this->blade('<x-form-number name="test" min="0" />');

        $view->assertSee('name="test"');
        $view->assertSee('min="0"');
    }

    /** @test */
    public function it_renders_form_number_with_max_attribute()
    {
        $view = $this->blade('<x-form-number name="test" max="999999" />');

        $view->assertSee('name="test"');
        $view->assertSee('max="999999"');
    }

    /** @test */
    public function it_renders_form_number_with_step_attribute()
    {
        $view = $this->blade('<x-form-number name="test" step="0.01" />');

        $view->assertSee('name="test"');
        $view->assertSee('step="0.01"');
    }

    /** @test */
    public function it_renders_form_number_with_pattern_attribute()
    {
        $view = $this->blade('<x-form-number name="test" pattern="[0-9]*" />');

        $view->assertSee('name="test"');
        $view->assertSee('pattern="[0-9]*"');
    }

    /** @test */
    public function it_renders_form_number_with_help_slot()
    {
        $view = $this->blade('
            <x-form-number name="test">
                <x-slot:help>
                    Enter a positive number between 1 and 1000. Decimals are allowed.
                </x-slot:help>
            </x-form-number>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('Enter a positive number between 1 and 1000. Decimals are allowed.');
    }

    /** @test */
    public function it_renders_form_number_with_default_slot()
    {
        $view = $this->blade('<x-form-number name="test">Maximum order quantity is 1000</x-form-number>');

        $view->assertSee('name="test"');
        $view->assertSee('Maximum order quantity is 1000');
    }

    /** @test */
    public function it_renders_form_number_with_form_input()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_number_with_form_label()
    {
        $view = $this->blade('<x-form-number name="test" label="Test Number" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Test Number');
    }

    /** @test */
    public function it_renders_form_number_with_help_rendering()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_merge()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_number_type()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_number_with_form_input_extension()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_slot_structure()
    {
        $view = $this->blade('<x-form-number name="test">Content</x-form-number>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_number_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-number name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-number>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_number_with_extra_attributes_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_merge_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_number_with_slot_structure_display()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_number_with_form_input_extension_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_number_with_number_type_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('type="number"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_comprehensive_functionality()
    {
        $view = $this->blade('<x-form-number name="test" label="Test" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('Help');
    }

    /** @test */
    public function it_renders_form_number_with_livewire_integration()
    {
        $view = $this->blade('<x-form-number name="test" wire:model="quantity" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="quantity"');
    }

    /** @test */
    public function it_renders_form_number_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-number name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_number_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-number name="test" aria-label="Number input" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Number input"');
    }

    /** @test */
    public function it_renders_form_number_with_data_attributes()
    {
        $view = $this->blade('<x-form-number name="test" data-test="number-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="number-component"');
    }

    /** @test */
    public function it_renders_form_number_with_component_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('form-number');
        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_number_with_form_input_structure()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_structure_display()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_slot_structure_display()
    {
        $view = $this->blade('<x-form-number name="test">Content</x-form-number>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_number_with_help_slot_structure_display()
    {
        $view = $this->blade('
            <x-form-number name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-number>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_number_with_extra_attributes_structure_display()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_merge_structure_display()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_number_with_slot_structure_display_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_number_with_form_input_extension_structure_display()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_number_with_number_type_structure_display()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('type="number"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_comprehensive_functionality_final()
    {
        $view = $this->blade('<x-form-number name="test" label="Test" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('Help');
    }

    /** @test */
    public function it_renders_form_number_with_livewire_integration_final()
    {
        $view = $this->blade('<x-form-number name="test" wire:model="quantity" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="quantity"');
    }

    /** @test */
    public function it_renders_form_number_with_turbo_attributes_final()
    {
        $view = $this->blade('<x-form-number name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_number_with_accessibility_attributes_final()
    {
        $view = $this->blade('<x-form-number name="test" aria-label="Number input" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Number input"');
    }

    /** @test */
    public function it_renders_form_number_with_data_attributes_final()
    {
        $view = $this->blade('<x-form-number name="test" data-test="number-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="number-component"');
    }

    /** @test */
    public function it_renders_form_number_with_component_structure_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('form-number');
        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_number_with_form_input_structure_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_structure_display_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_slot_structure_display_final_2()
    {
        $view = $this->blade('<x-form-number name="test">Content</x-form-number>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_number_with_help_slot_structure_display_final()
    {
        $view = $this->blade('
            <x-form-number name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-number>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_number_with_extra_attributes_structure_display_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_number_with_attributes_merge_structure_display_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_number_with_slot_structure_display_final_3()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_number_with_form_input_extension_structure_display_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_number_with_number_type_structure_display_final()
    {
        $view = $this->blade('<x-form-number name="test" />');

        $view->assertSee('type="number"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_number_with_comprehensive_functionality_final_2()
    {
        $view = $this->blade('<x-form-number name="test" label="Test" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('Help');
    }
}
