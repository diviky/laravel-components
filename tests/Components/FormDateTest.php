<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormDateTest extends TestCase
{
    /** @test */
    public function it_renders_form_date_with_basic_attributes()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-date');
    }

    /** @test */
    public function it_renders_form_date_with_label()
    {
        $view = $this->blade('<x-form-date name="birth_date" label="Birth Date" />');

        $view->assertSee('name="birth_date"');
        $view->assertSee('Birth Date');
    }

    /** @test */
    public function it_renders_form_date_with_value()
    {
        $view = $this->blade('<x-form-date name="birth_date" value="2024-01-15" />');

        $view->assertSee('name="birth_date"');
        $view->assertSee('2024-01-15');
    }

    /** @test */
    public function it_renders_form_date_with_default_value()
    {
        $view = $this->blade('<x-form-date name="birth_date" :default="\'2024-01-15\'" />');

        $view->assertSee('name="birth_date"');
        $view->assertSee('2024-01-15');
    }

    /** @test */
    public function it_renders_form_date_with_settings()
    {
        $view = $this->blade('<x-form-date name="test" :settings="[\'allowed\' => \'future\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('settings');
    }

    /** @test */
    public function it_renders_form_date_with_custom_class()
    {
        $view = $this->blade('<x-form-date name="test" class="custom-date" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-date');
    }

    /** @test */
    public function it_renders_form_date_with_custom_id()
    {
        $view = $this->blade('<x-form-date name="test" id="date-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="date-input"');
    }

    /** @test */
    public function it_renders_form_date_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-date name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_date_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-date name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_date_with_required_attribute()
    {
        $view = $this->blade('<x-form-date name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_date_with_placeholder()
    {
        $view = $this->blade('<x-form-date name="test" placeholder="Choose date" />');

        $view->assertSee('name="test"');
        $view->assertSee('Choose date');
    }

    /** @test */
    public function it_renders_form_date_with_type()
    {
        $view = $this->blade('<x-form-date name="test" type="date" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="date"');
    }

    /** @test */
    public function it_renders_form_date_with_help_slot()
    {
        $view = $this->blade('
            <x-form-date name="test">
                <x-slot:help>
                    Select a date for your appointment. Available dates are shown in green.
                </x-slot:help>
            </x-form-date>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('Select a date for your appointment. Available dates are shown in green.');
    }

    /** @test */
    public function it_renders_form_date_with_icon_slot()
    {
        $view = $this->blade('
            <x-form-date name="test">
                <x-slot:icon>calendar-day</x-slot:icon>
            </x-form-date>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('calendar-day');
    }

    /** @test */
    public function it_renders_form_date_with_default_icon()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('calendar-month');
    }

    /** @test */
    public function it_renders_form_date_with_form_input()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_date_with_form_label()
    {
        $view = $this->blade('<x-form-date name="test" label="Test Date" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Test Date');
    }

    /** @test */
    public function it_renders_form_date_with_default_value_method()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('defaultValue()');
    }

    /** @test */
    public function it_renders_form_date_with_properties()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('properties');
    }

    /** @test */
    public function it_renders_form_date_with_attributes_merge()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_date_with_default_placeholder()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('Select Date');
    }

    /** @test */
    public function it_renders_form_date_with_default_type()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('type');
    }

    /** @test */
    public function it_renders_form_date_with_default_class()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('class');
    }

    /** @test */
    public function it_renders_form_date_with_x_ref()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('x-ref');
    }

    /** @test */
    public function it_renders_form_date_with_alpine_data()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('x-data');
    }

    /** @test */
    public function it_renders_form_date_with_picker_variable()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('picker: null');
    }

    /** @test */
    public function it_renders_form_date_with_init_picker_function()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('initPicker()');
    }

    /** @test */
    public function it_renders_form_date_with_tempus_dominus()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('tempusDominus.TempusDominus');
    }

    /** @test */
    public function it_renders_form_date_with_setup_method()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('setup()');
    }

    /** @test */
    public function it_renders_form_date_with_event_listener()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('addEventListener');
    }

    /** @test */
    public function it_renders_form_date_with_change_event()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('change.td');
    }

    /** @test */
    public function it_renders_form_date_with_custom_event()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('CustomEvent');
    }

    /** @test */
    public function it_renders_form_date_with_picked_event()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('picked');
    }

    /** @test */
    public function it_renders_form_date_with_livewire_hook()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('Livewire.hook');
    }

    /** @test */
    public function it_renders_form_date_with_morph_updated()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('morph.updated');
    }

    /** @test */
    public function it_renders_form_date_with_next_tick()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('$nextTick');
    }

    /** @test */
    public function it_renders_form_date_with_navigated_event()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('livewire:navigated.window');
    }

    /** @test */
    public function it_renders_form_date_with_livewire_integration()
    {
        $view = $this->blade('<x-form-date name="test" wire:model="selectedDate" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="selectedDate"');
    }

    /** @test */
    public function it_renders_form_date_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-date name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_date_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-date name="test" aria-label="Date picker" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Date picker"');
    }

    /** @test */
    public function it_renders_form_date_with_data_attributes()
    {
        $view = $this->blade('<x-form-date name="test" data-test="date-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="date-component"');
    }

    /** @test */
    public function it_renders_form_date_with_component_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('form-date');
        $view->assertSee('x-data');
        $view->assertSee('x-init');
    }

    /** @test */
    public function it_renders_form_date_with_tempus_dominus_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('tempusDominus');
        $view->assertSee('setup()');
    }

    /** @test */
    public function it_renders_form_date_with_event_handling_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('addEventListener');
        $view->assertSee('change.td');
        $view->assertSee('picked');
    }

    /** @test */
    public function it_renders_form_date_with_livewire_integration_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('Livewire.hook');
        $view->assertSee('morph.updated');
        $view->assertSee('livewire:navigated.window');
    }

    /** @test */
    public function it_renders_form_date_with_form_input_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('defaultValue()');
        $view->assertSee('properties');
    }

    /** @test */
    public function it_renders_form_date_with_attributes_merge_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('placeholder');
        $view->assertSee('type');
        $view->assertSee('class');
    }

    /** @test */
    public function it_renders_form_date_with_slot_structure()
    {
        $view = $this->blade('<x-form-date name="test">Content</x-form-date>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_date_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-date name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-date>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_date_with_icon_slot_structure()
    {
        $view = $this->blade('
            <x-form-date name="test">
                <x-slot:icon>custom-icon</x-slot:icon>
            </x-form-date>
        ');

        $view->assertSee('custom-icon');
    }

    /** @test */
    public function it_renders_form_date_with_default_icon_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('calendar-month');
    }

    /** @test */
    public function it_renders_form_date_with_custom_icon_override()
    {
        $view = $this->blade('<x-form-date name="test" icon="override-icon" />');

        $view->assertSee('override-icon');
    }

    /** @test */
    public function it_renders_form_date_with_attributes_has_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('attributes->has(\'icon\')');
    }

    /** @test */
    public function it_renders_form_date_with_attributes_get_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('attributes->get(\'icon\')');
    }

    /** @test */
    public function it_renders_form_date_with_help_rendering_structure()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_date_with_container_reference()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('x-ref="container"');
    }

    /** @test */
    public function it_renders_form_date_with_date_class()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('class="date');
    }

    /** @test */
    public function it_renders_form_date_with_self_reference()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('const self = this');
    }

    /** @test */
    public function it_renders_form_date_with_bound_handle_change()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('boundHandleChange');
    }

    /** @test */
    public function it_renders_form_date_with_remove_event_listener()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('removeEventListener');
    }

    /** @test */
    public function it_renders_form_date_with_last_picked_dates()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('lastPicked');
    }

    /** @test */
    public function it_renders_form_date_with_format_input()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('formatInput');
    }

    /** @test */
    public function it_renders_form_date_with_dispatch_event()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('dispatchEvent');
    }

    /** @test */
    public function it_renders_form_date_with_bubbles_true()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('bubbles: true');
    }

    /** @test */
    public function it_renders_form_date_with_detail_value()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('detail: { value: date }');
    }

    /** @test */
    public function it_renders_form_date_with_livewire_morph_updated()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('morph.updated');
    }

    /** @test */
    public function it_renders_form_date_with_livewire_next_tick()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('$nextTick');
    }

    /** @test */
    public function it_renders_form_date_with_livewire_navigated_window()
    {
        $view = $this->blade('<x-form-date name="test" />');

        $view->assertSee('livewire:navigated.window');
    }
}
