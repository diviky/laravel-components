<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormEmailTest extends TestCase
{
    /** @test */
    public function it_renders_form_email_with_basic_attributes()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-email');
    }

    /** @test */
    public function it_renders_form_email_with_label()
    {
        $view = $this->blade('<x-form-email name="email" label="Email Address" />');

        $view->assertSee('name="email"');
        $view->assertSee('Email Address');
    }

    /** @test */
    public function it_renders_form_email_with_value()
    {
        $view = $this->blade('<x-form-email name="email" value="user@example.com" />');

        $view->assertSee('name="email"');
        $view->assertSee('user@example.com');
    }

    /** @test */
    public function it_renders_form_email_with_default_value()
    {
        $view = $this->blade('<x-form-email name="email" :default="\'admin@example.com\'" />');

        $view->assertSee('name="email"');
        $view->assertSee('admin@example.com');
    }

    /** @test */
    public function it_renders_form_email_with_extra_attributes()
    {
        $view = $this->blade('<x-form-email name="test" :extra-attributes="[\'data-test\' => \'email\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="email"');
    }

    /** @test */
    public function it_renders_form_email_with_custom_class()
    {
        $view = $this->blade('<x-form-email name="test" class="custom-email" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-email');
    }

    /** @test */
    public function it_renders_form_email_with_custom_id()
    {
        $view = $this->blade('<x-form-email name="test" id="email-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="email-input"');
    }

    /** @test */
    public function it_renders_form_email_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-email name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_email_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-email name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_email_with_required_attribute()
    {
        $view = $this->blade('<x-form-email name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_email_with_placeholder()
    {
        $view = $this->blade('<x-form-email name="test" placeholder="Enter your email" />');

        $view->assertSee('name="test"');
        $view->assertSee('Enter your email');
    }

    /** @test */
    public function it_renders_form_email_with_pattern_attribute()
    {
        $view = $this->blade('<x-form-email name="test" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />');

        $view->assertSee('name="test"');
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
    }

    /** @test */
    public function it_renders_form_email_with_maxlength_attribute()
    {
        $view = $this->blade('<x-form-email name="test" maxlength="254" />');

        $view->assertSee('name="test"');
        $view->assertSee('maxlength="254"');
    }

    /** @test */
    public function it_renders_form_email_with_minlength_attribute()
    {
        $view = $this->blade('<x-form-email name="test" minlength="5" />');

        $view->assertSee('name="test"');
        $view->assertSee('minlength="5"');
    }

    /** @test */
    public function it_renders_form_email_with_help_slot()
    {
        $view = $this->blade('
            <x-form-email name="test">
                <x-slot:help>
                    Enter a valid email address. We\'ll use this to send you important updates and notifications.
                </x-slot:help>
            </x-form-email>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('Enter a valid email address. We\'ll use this to send you important updates and notifications.');
    }

    /** @test */
    public function it_renders_form_email_with_default_slot()
    {
        $view = $this->blade('<x-form-email name="test">We\'ll never share your email with anyone else</x-form-email>');

        $view->assertSee('name="test"');
        $view->assertSee('We\'ll never share your email with anyone else');
    }

    /** @test */
    public function it_renders_form_email_with_form_input()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_email_with_form_label()
    {
        $view = $this->blade('<x-form-email name="test" label="Test Email" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Test Email');
    }

    /** @test */
    public function it_renders_form_email_with_help_rendering()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_merge()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_email_type()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('type="email"');
    }

    /** @test */
    public function it_renders_form_email_with_form_input_extension()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_slot_structure()
    {
        $view = $this->blade('<x-form-email name="test">Content</x-form-email>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_email_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-email name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-email>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_email_with_extra_attributes_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_merge_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="email"');
    }

    /** @test */
    public function it_renders_form_email_with_slot_structure_display()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_email_with_form_input_extension_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_email_with_email_type_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('type="email"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_comprehensive_functionality()
    {
        $view = $this->blade('<x-form-email name="test" label="Test" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('Help');
    }

    /** @test */
    public function it_renders_form_email_with_livewire_integration()
    {
        $view = $this->blade('<x-form-email name="test" wire:model="email" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="email"');
    }

    /** @test */
    public function it_renders_form_email_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-email name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_email_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-email name="test" aria-label="Email input" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Email input"');
    }

    /** @test */
    public function it_renders_form_email_with_data_attributes()
    {
        $view = $this->blade('<x-form-email name="test" data-test="email-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="email-component"');
    }

    /** @test */
    public function it_renders_form_email_with_component_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('form-email');
        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_email_with_form_input_structure()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_structure_display()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_slot_structure_display()
    {
        $view = $this->blade('<x-form-email name="test">Content</x-form-email>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_email_with_help_slot_structure_display()
    {
        $view = $this->blade('
            <x-form-email name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-email>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_email_with_extra_attributes_structure_display()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_merge_structure_display()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="email"');
    }

    /** @test */
    public function it_renders_form_email_with_slot_structure_display_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_email_with_form_input_extension_structure_display()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_email_with_email_type_structure_display()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('type="email"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_comprehensive_functionality_final()
    {
        $view = $this->blade('<x-form-email name="test" label="Test" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('Help');
    }

    /** @test */
    public function it_renders_form_email_with_livewire_integration_final()
    {
        $view = $this->blade('<x-form-email name="test" wire:model="email" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="email"');
    }

    /** @test */
    public function it_renders_form_email_with_turbo_attributes_final()
    {
        $view = $this->blade('<x-form-email name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_email_with_accessibility_attributes_final()
    {
        $view = $this->blade('<x-form-email name="test" aria-label="Email input" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Email input"');
    }

    /** @test */
    public function it_renders_form_email_with_data_attributes_final()
    {
        $view = $this->blade('<x-form-email name="test" data-test="email-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="email-component"');
    }

    /** @test */
    public function it_renders_form_email_with_component_structure_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('form-email');
        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_email_with_form_input_structure_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_structure_display_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_slot_structure_display_final_2()
    {
        $view = $this->blade('<x-form-email name="test">Content</x-form-email>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_email_with_help_slot_structure_display_final()
    {
        $view = $this->blade('
            <x-form-email name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-email>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_email_with_extra_attributes_structure_display_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_email_with_attributes_merge_structure_display_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="email"');
    }

    /** @test */
    public function it_renders_form_email_with_slot_structure_display_final_3()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_email_with_form_input_extension_structure_display_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_email_with_email_type_structure_display_final()
    {
        $view = $this->blade('<x-form-email name="test" />');

        $view->assertSee('type="email"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_email_with_comprehensive_functionality_final_2()
    {
        $view = $this->blade('<x-form-email name="test" label="Test" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('Help');
    }
}
