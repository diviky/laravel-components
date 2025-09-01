<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormPasswordTest extends TestCase
{
    /** @test */
    public function it_renders_form_password_with_basic_attributes()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-password');
    }

    /** @test */
    public function it_renders_form_password_with_label()
    {
        $view = $this->blade('<x-form-password name="password" label="Password" />');

        $view->assertSee('name="password"');
        $view->assertSee('Password');
    }

    /** @test */
    public function it_renders_form_password_with_value()
    {
        $view = $this->blade('<x-form-password name="password" value="secret123" />');

        $view->assertSee('name="password"');
        $view->assertSee('secret123');
    }

    /** @test */
    public function it_renders_form_password_with_default_value()
    {
        $view = $this->blade('<x-form-password name="password" :default="\'default123\'" />');

        $view->assertSee('name="password"');
        $view->assertSee('default123');
    }

    /** @test */
    public function it_renders_form_password_with_extra_attributes()
    {
        $view = $this->blade('<x-form-password name="test" :extra-attributes="[\'data-test\' => \'password\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="password"');
    }

    /** @test */
    public function it_renders_form_password_with_custom_class()
    {
        $view = $this->blade('<x-form-password name="test" class="custom-password" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-password');
    }

    /** @test */
    public function it_renders_form_password_with_custom_id()
    {
        $view = $this->blade('<x-form-password name="test" id="password-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="password-input"');
    }

    /** @test */
    public function it_renders_form_password_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-password name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_password_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-password name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_password_with_required_attribute()
    {
        $view = $this->blade('<x-form-password name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_password_with_placeholder()
    {
        $view = $this->blade('<x-form-password name="test" placeholder="Enter password" />');

        $view->assertSee('name="test"');
        $view->assertSee('Enter password');
    }

    /** @test */
    public function it_renders_form_password_with_minlength()
    {
        $view = $this->blade('<x-form-password name="test" minlength="8" />');

        $view->assertSee('name="test"');
        $view->assertSee('minlength="8"');
    }

    /** @test */
    public function it_renders_form_password_with_maxlength()
    {
        $view = $this->blade('<x-form-password name="test" maxlength="128" />');

        $view->assertSee('name="test"');
        $view->assertSee('maxlength="128"');
    }

    /** @test */
    public function it_renders_form_password_with_pattern()
    {
        $view = $this->blade('<x-form-password name="test" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />');

        $view->assertSee('name="test"');
        $view->assertSee('pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"');
    }

    /** @test */
    public function it_renders_form_password_with_help_slot()
    {
        $view = $this->blade('
            <x-form-password name="test">
                <x-slot:help>
                    Password must be at least 8 characters and contain letters and numbers.
                </x-slot:help>
            </x-form-password>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('Password must be at least 8 characters and contain letters and numbers.');
    }

    /** @test */
    public function it_renders_form_password_with_default_slot()
    {
        $view = $this->blade('<x-form-password name="test">Password strength indicator</x-form-password>');

        $view->assertSee('name="test"');
        $view->assertSee('Password strength indicator');
    }

    /** @test */
    public function it_renders_form_password_with_form_input()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_password_with_form_label()
    {
        $view = $this->blade('<x-form-password name="test" label="Test Password" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Test Password');
    }

    /** @test */
    public function it_renders_form_password_with_alpine_data()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('x-data');
        $view->assertSee('show: true');
    }

    /** @test */
    public function it_renders_form_password_with_show_variable()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('show: true');
    }

    /** @test */
    public function it_renders_form_password_with_password_type()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('type="password"');
    }

    /** @test */
    public function it_renders_form_password_with_dynamic_type()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('::type="show ? \'password\' : \'text\'"');
    }

    /** @test */
    public function it_renders_form_password_with_attributes_merge()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_password_with_append_slot()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-slot:append');
    }

    /** @test */
    public function it_renders_form_password_with_eye_closed_icon()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('eye-closed');
    }

    /** @test */
    public function it_renders_form_password_with_eye_icon()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('eye');
    }

    /** @test */
    public function it_renders_form_password_with_input_group_link()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('input-group-link');
    }

    /** @test */
    public function it_renders_form_password_with_hidden_class()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_form_password_with_block_class()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('block');
    }

    /** @test */
    public function it_renders_form_password_with_click_event()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('x-on:click');
    }

    /** @test */
    public function it_renders_form_password_with_toggle_logic()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('show = !show');
    }

    /** @test */
    public function it_renders_form_password_with_icon_component()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-icon');
    }

    /** @test */
    public function it_renders_form_password_with_icon_name()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('name="eye-closed"');
        $view->assertSee('name="eye"');
    }

    /** @test */
    public function it_renders_form_password_with_icon_size()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('size="md"');
    }

    /** @test */
    public function it_renders_form_password_with_conditional_classes()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee(':class="{ \'hidden\': !show, \'block\': show }"');
        $view->assertSee(':class="{ \'hidden\': show, \'block\': !show }"');
    }

    /** @test */
    public function it_renders_form_password_with_livewire_integration()
    {
        $view = $this->blade('<x-form-password name="test" wire:model="password" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="password"');
    }

    /** @test */
    public function it_renders_form_password_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-password name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_password_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-password name="test" aria-label="Password input" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Password input"');
    }

    /** @test */
    public function it_renders_form_password_with_data_attributes()
    {
        $view = $this->blade('<x-form-password name="test" data-test="password-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="password-component"');
    }

    /** @test */
    public function it_renders_form_password_with_component_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('form-password');
        $view->assertSee('x-data');
        $view->assertSee('x-on:click');
    }

    /** @test */
    public function it_renders_form_password_with_alpine_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('x-data="{ show: true }"');
        $view->assertSee('show = !show');
    }

    /** @test */
    public function it_renders_form_password_with_icon_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-icon name="eye-closed"');
        $view->assertSee('<x-icon name="eye"');
    }

    /** @test */
    public function it_renders_form_password_with_form_input_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('::type="show ? \'password\' : \'text\'"');
    }

    /** @test */
    public function it_renders_form_password_with_attributes_merge_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="password"');
    }

    /** @test */
    public function it_renders_form_password_with_slot_structure()
    {
        $view = $this->blade('<x-form-password name="test">Content</x-form-password>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_password_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-password name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-password>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_password_with_append_slot_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-slot:append>');
    }

    /** @test */
    public function it_renders_form_password_with_icon_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('name="eye-closed"');
        $view->assertSee('name="eye"');
        $view->assertSee('size="md"');
    }

    /** @test */
    public function it_renders_form_password_with_conditional_classes_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee(':class="{ \'hidden\': !show, \'block\': show }"');
        $view->assertSee(':class="{ \'hidden\': show, \'block\': !show }"');
    }

    /** @test */
    public function it_renders_form_password_with_click_event_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('x-on:click="show = !show"');
    }

    /** @test */
    public function it_renders_form_password_with_toggle_logic_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('show = !show');
    }

    /** @test */
    public function it_renders_form_password_with_icon_component_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-icon');
    }

    /** @test */
    public function it_renders_form_password_with_icon_name_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('name="eye-closed"');
        $view->assertSee('name="eye"');
    }

    /** @test */
    public function it_renders_form_password_with_icon_size_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('size="md"');
    }

    /** @test */
    public function it_renders_form_password_with_conditional_classes_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee(':class="{ \'hidden\': !show, \'block\': show }"');
        $view->assertSee(':class="{ \'hidden\': show, \'block\': !show }"');
    }

    /** @test */
    public function it_renders_form_password_with_click_event_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('x-on:click="show = !show"');
    }

    /** @test */
    public function it_renders_form_password_with_toggle_logic_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('show = !show');
    }

    /** @test */
    public function it_renders_form_password_with_icon_component_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('<x-icon');
    }

    /** @test */
    public function it_renders_form_password_with_icon_name_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('name="eye-closed"');
        $view->assertSee('name="eye"');
    }

    /** @test */
    public function it_renders_form_password_with_icon_size_structure_structure()
    {
        $view = $this->blade('<x-form-password name="test" />');

        $view->assertSee('size="md"');
    }
}
