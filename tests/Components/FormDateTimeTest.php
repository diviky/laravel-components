<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormDateTimeTest extends TestCase
{
    /** @test */
    public function it_renders_form_date_time_with_basic_attributes()
    {
        $view = $this->blade('<x-form-date-time name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-date-time');
    }

    /** @test */
    public function it_renders_form_date_time_with_label()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" label="Meeting Time" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('Meeting Time');
    }

    /** @test */
    public function it_renders_form_date_time_with_value()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" value="2024-01-15 14:30" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('2024-01-15 14:30');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_value()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :default="\'2024-01-15 09:00\'" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('2024-01-15 09:00');
    }

    /** @test */
    public function it_renders_form_date_time_with_settings()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :settings="[\'stacked\' => true]" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('settings');
    }

    /** @test */
    public function it_renders_form_date_time_with_stacked_attribute()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="true" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('stacked');
    }

    /** @test */
    public function it_renders_form_date_time_with_custom_class()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" class="custom-datetime" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('class="custom-datetime');
    }

    /** @test */
    public function it_renders_form_date_time_with_custom_id()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" id="datetime-input" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('id="datetime-input"');
    }

    /** @test */
    public function it_renders_form_date_time_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" disabled />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_date_time_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" readonly />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_date_time_with_required_attribute()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" required />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_date_time_with_placeholder()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" placeholder="Choose date and time" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('Choose date and time');
    }

    /** @test */
    public function it_renders_form_date_time_with_type()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" type="datetime-local" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('type="datetime-local"');
    }

    /** @test */
    public function it_renders_form_date_time_with_help_slot()
    {
        $view = $this->blade('
            <x-form-date-time name="meeting_time">
                <x-slot:help>
                    Select a date and time for your meeting. Available slots are shown in green.
                </x-slot:help>
            </x-form-date-time>
        ');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('Select a date and time for your meeting. Available slots are shown in green.');
    }

    /** @test */
    public function it_renders_form_date_time_with_icon_slot()
    {
        $view = $this->blade('
            <x-form-date-time name="meeting_time">
                <x-slot:icon>clock</x-slot:icon>
            </x-form-date-time>
        ');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('clock');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_icon()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('calendar-month');
    }

    /** @test */
    public function it_renders_form_date_time_with_form_input()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_date_time_with_form_label()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" label="Meeting Time" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Meeting Time');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_value_method()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('defaultValue()');
    }

    /** @test */
    public function it_renders_form_date_time_with_properties()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('properties');
    }

    /** @test */
    public function it_renders_form_date_time_with_attributes_merge()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_placeholder()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('Select Date');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_type()
    {
        $view = $this->blade('<x-form-date_time name="meeting_time" />');

        $view->assertSee('type');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_class()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('class');
    }

    /** @test */
    public function it_renders_form_date_time_with_x_ref()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('x-ref');
    }

    /** @test */
    public function it_renders_form_date_time_with_alpine_data()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('x-data');
    }

    /** @test */
    public function it_renders_form_date_time_with_picker_variable()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('picker: null');
    }

    /** @test */
    public function it_renders_form_date_time_with_init_picker_function()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('initPicker()');
    }

    /** @test */
    public function it_renders_form_date_time_with_tempus_dominus()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('tempusDominus.TempusDominus');
    }

    /** @test */
    public function it_renders_form_date_time_with_setup_method()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('setup()');
    }

    /** @test */
    public function it_renders_form_date_time_with_event_listener()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('addEventListener');
    }

    /** @test */
    public function it_renders_form_date_time_with_change_event()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('change.td');
    }

    /** @test */
    public function it_renders_form_date_time_with_custom_event()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('CustomEvent');
    }

    /** @test */
    public function it_renders_form_date_time_with_picked_event()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('picked');
    }

    /** @test */
    public function it_renders_form_date_time_with_livewire_hook()
    {
        $view = $this->blade('<x-form-date_time name="meeting_time" />');

        $view->assertSee('Livewire.hook');
    }

    /** @test */
    public function it_renders_form_date_time_with_morph_updated()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('morph.updated');
    }

    /** @test */
    public function it_renders_form_date_time_with_next_tick()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('$nextTick');
    }

    /** @test */
    public function it_renders_form_date_time_with_navigated_event()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('livewire:navigated.window');
    }

    /** @test */
    public function it_renders_form_date_time_with_side_by_side_layout()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('row');
        $view->assertSee('col');
        $view->assertSee('col-4');
    }

    /** @test */
    public function it_renders_form_date_time_with_date_component()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('<x-form-date');
    }

    /** @test */
    public function it_renders_form_date_time_with_time_component()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('<x-form-time');
    }

    /** @test */
    public function it_renders_form_date_time_with_hidden_input()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('<x-form-hidden');
    }

    /** @test */
    public function it_renders_form_date_time_with_alpine_variables()
    {
        $view = $this->blade('<x-form-date_time name="meeting_time" :stacked="false" />');

        $view->assertSee('dateValue');
        $view->assertSee('timeValue');
        $view->assertSee('current');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_date_method()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('defaultDate()');
    }

    /** @test */
    public function it_renders_form_date_time_with_default_time_method()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('defaultTime()');
    }

    /** @test */
    public function it_renders_form_date_time_with_update_functions()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('updateDate');
        $view->assertSee('updateTime');
        $view->assertSee('updateCurrent');
    }

    /** @test */
    public function it_renders_form_date_time_with_event_handling()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('@picked');
    }

    /** @test */
    public function it_renders_form_date_time_with_x_model()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('x-model');
    }

    /** @test */
    public function it_renders_form_date_time_with_time_label()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('Time');
    }

    /** @test */
    public function it_renders_form_date_time_with_combined_value()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('current = `${this.dateValue} ${this.timeValue}`.trim()');
    }

    /** @test */
    public function it_renders_form_date_time_with_livewire_integration()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" wire:model="selectedDateTime" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('wire:model="selectedDateTime"');
    }

    /** @test */
    public function it_renders_form_date_time_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" data-turbo="true" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_date_time_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" aria-label="Date and time picker" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('aria-label="Date and time picker"');
    }

    /** @test */
    public function it_renders_form_date_time_with_data_attributes()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" data-test="datetime-component" />');

        $view->assertSee('name="meeting_time"');
        $view->assertSee('data-test="datetime-component"');
    }

    /** @test */
    public function it_renders_form_date_time_with_component_structure()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" />');

        $view->assertSee('form-date-time');
        $view->assertSee('x-data');
        $view->assertSee('x-init');
    }

    /** @test */
    public function it_renders_form_date_time_with_stacked_layout_structure()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="true" />');

        $view->assertSee('stacked');
        $view->assertSee('tempusDominus');
    }

    /** @test */
    public function it_renders_form_date_time_with_side_by_side_layout_structure()
    {
        $view = $this->blade('<x-form-date-time name="meeting_time" :stacked="false" />');

        $view->assertSee('row');
        $view->assertSee('col');
        $view->assertSee('form-date');
        $view->assertSee('form-time');
    }
}
