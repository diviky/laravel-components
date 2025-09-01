<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormTimeTest extends TestCase
{
    /** @test */
    public function it_renders_form_time_with_basic_attributes()
    {
        $view = $this->blade('<x-form-time name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-time');
    }

    /** @test */
    public function it_renders_form_time_with_label()
    {
        $view = $this->blade('<x-form-time name="time" label="Select Time" />');

        $view->assertSee('name="time"');
        $view->assertSee('Select Time');
    }

    /** @test */
    public function it_renders_form_time_with_value()
    {
        $view = $this->blade('<x-form-time name="time" value="14:30" />');

        $view->assertSee('name="time"');
        $view->assertSee('14:30');
    }

    /** @test */
    public function it_renders_form_time_with_default_value()
    {
        $view = $this->blade('<x-form-time name="time" :default="\'09:00\'" />');

        $view->assertSee('name="time"');
        $view->assertSee('09:00');
    }

    /** @test */
    public function it_renders_form_time_with_settings()
    {
        $settings = ['stepping' => 15];
        $view = $this->blade('<x-form-time name="time" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="time"');
        $view->assertSee('stepping');
    }

    /** @test */
    public function it_renders_form_time_with_custom_class()
    {
        $view = $this->blade('<x-form-time name="time" class="custom-time" />');

        $view->assertSee('name="time"');
        $view->assertSee('class="custom-time');
    }

    /** @test */
    public function it_renders_form_time_with_custom_id()
    {
        $view = $this->blade('<x-form-time name="time" id="time-input" />');

        $view->assertSee('name="time"');
        $view->assertSee('id="time-input"');
    }

    /** @test */
    public function it_renders_form_time_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-time name="time" disabled />');

        $view->assertSee('name="time"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_time_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-time name="time" readonly />');

        $view->assertSee('name="time"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_time_with_required_attribute()
    {
        $view = $this->blade('<x-form-time name="time" required />');

        $view->assertSee('name="time"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_time_with_placeholder()
    {
        $view = $this->blade('<x-form-time name="time" placeholder="Choose time" />');

        $view->assertSee('name="time"');
        $view->assertSee('Choose time');
    }

    /** @test */
    public function it_renders_form_time_with_type()
    {
        $view = $this->blade('<x-form-time name="time" type="time" />');

        $view->assertSee('name="time"');
        $view->assertSee('type="time"');
    }

    /** @test */
    public function it_renders_form_time_with_help_slot()
    {
        $view = $this->blade('
            <x-form-time name="time">
                <x-slot:help>
                    Select a time between 9 AM and 5 PM
                </x-slot:help>
            </x-form-time>
        ');

        $view->assertSee('name="time"');
        $view->assertSee('Select a time between 9 AM and 5 PM');
    }

    /** @test */
    public function it_renders_form_time_with_icon_slot()
    {
        $view = $this->blade('
            <x-form-time name="time">
                <x-slot:icon>
                    <x-icon name="clock" />
                </x-slot:icon>
            </x-form-time>
        ');

        $view->assertSee('name="time"');
        $view->assertSee('clock');
    }

    /** @test */
    public function it_renders_form_time_with_alpine_data()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('x-data');
        $view->assertSee('picker: null');
    }

    /** @test */
    public function it_renders_form_time_with_alpine_functions()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('initPicker()');
        $view->assertSee('this.picker.dispose()');
    }

    /** @test */
    public function it_renders_form_time_with_x_init()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('x-init="initPicker()');
    }

    /** @test */
    public function it_renders_form_time_with_next_tick()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('$nextTick');
    }

    /** @test */
    public function it_renders_form_time_with_livewire_hook()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('Livewire.hook');
        $view->assertSee('morph.updated');
    }

    /** @test */
    public function it_renders_form_time_with_livewire_navigated()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('@livewire:navigated.window="initPicker()"');
    }

    /** @test */
    public function it_renders_form_time_with_form_input()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_time_with_form_input_attributes()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('name="time"');
        $view->assertSee('label');
        $view->assertSee('default');
        $view->assertSee('extra-attributes');
    }

    /** @test */
    public function it_renders_form_time_with_merged_attributes()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('merge([');
        $view->assertSee('placeholder');
        $view->assertSee('type');
        $view->assertSee('class');
        $view->assertSee('x-ref');
    }

    /** @test */
    public function it_renders_form_time_with_placeholder_attribute()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('Select Date');
    }

    /** @test */
    public function it_renders_form_time_with_type_attribute()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('type');
    }

    /** @test */
    public function it_renders_form_time_with_class_attribute()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('class');
        $view->assertSee('date');
    }

    /** @test */
    public function it_renders_form_time_with_x_ref()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('x-ref');
        $view->assertSee('container');
    }

    /** @test */
    public function it_renders_form_time_with_slot()
    {
        $view = $this->blade('<x-form-time name="time">Additional content</x-form-time>');

        $view->assertSee('name="time"');
        $view->assertSee('Additional content');
    }

    /** @test */
    public function it_renders_form_time_with_help_slot_rendering()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('<x-slot:help>');
        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_time_with_icon_slot_rendering()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('@slot(\'icon\')');
        $view->assertSee('@endslot');
    }

    /** @test */
    public function it_renders_form_time_with_default_icon()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('clock');
    }

    /** @test */
    public function it_renders_form_time_with_custom_icon()
    {
        $view = $this->blade('<x-form-time name="time" icon="time" />');

        $view->assertSee('name="time"');
        $view->assertSee('icon="time"');
    }

    /** @test */
    public function it_renders_form_time_with_tempus_dominus()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('tempusDominus.TempusDominus');
    }

    /** @test */
    public function it_renders_form_time_with_setup_function()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('setup()');
    }

    /** @test */
    public function it_renders_form_time_with_picker_disposal()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('this.picker.dispose()');
    }

    /** @test */
    public function it_renders_form_time_with_error_handling()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('catch (e)');
        $view->assertSee('// Ignore disposal errors');
    }

    /** @test */
    public function it_renders_form_time_with_event_listener_removal()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('removeEventListener');
        $view->assertSee('change.td');
    }

    /** @test */
    public function it_renders_form_time_with_bound_event_handler()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('boundHandleChange');
        $view->assertSee('this.boundHandleChange');
    }

    /** @test */
    public function it_renders_form_time_with_custom_event()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('CustomEvent');
        $view->assertSee('picked');
    }

    /** @test */
    public function it_renders_form_time_with_event_detail()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('detail: { value: date }');
    }

    /** @test */
    public function it_renders_form_time_with_event_bubbles()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('bubbles: true');
    }

    /** @test */
    public function it_renders_form_time_with_add_event_listener()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('addEventListener');
        $view->assertSee('change.td');
    }

    /** @test */
    public function it_renders_form_time_with_livewire_integration()
    {
        $view = $this->blade('<x-form-time name="time" wire:model="selectedTime" />');

        $view->assertSee('name="time"');
        $view->assertSee('wire:model="selectedTime"');
    }

    /** @test */
    public function it_renders_form_time_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-time name="time" data-turbo="true" />');

        $view->assertSee('name="time"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_time_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-time name="time" aria-label="Time selection" />');

        $view->assertSee('name="time"');
        $view->assertSee('aria-label="Time selection"');
    }

    /** @test */
    public function it_renders_form_time_with_data_attributes()
    {
        $view = $this->blade('<x-form-time name="time" data-test="time-component" />');

        $view->assertSee('name="time"');
        $view->assertSee('data-test="time-component"');
    }

    /** @test */
    public function it_renders_form_time_with_stepping_setting()
    {
        $settings = ['stepping' => 15];
        $view = $this->blade('<x-form-time name="time" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="time"');
        $view->assertSee('stepping');
    }

    /** @test */
    public function it_renders_form_time_with_time_restrictions()
    {
        $settings = [
            'restrictions' => [
                'enabledHours' => [9, 10, 11, 12, 13, 14, 15, 16, 17],
            ],
        ];
        $view = $this->blade('<x-form-time name="time" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="time"');
        $view->assertSee('enabledHours');
    }

    /** @test */
    public function it_renders_form_time_with_disabled_intervals()
    {
        $settings = [
            'restrictions' => [
                'disabledTimeIntervals' => [
                    ['from' => '12:00', 'until' => '13:00'],
                ],
            ],
        ];
        $view = $this->blade('<x-form-time name="time" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="time"');
        $view->assertSee('disabledTimeIntervals');
    }

    /** @test */
    public function it_renders_form_time_with_custom_format()
    {
        $settings = ['format' => 'HH:mm'];
        $view = $this->blade('<x-form-time name="time" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="time"');
        $view->assertSee('format');
    }

    /** @test */
    public function it_renders_form_time_with_localization()
    {
        $settings = [
            'localization' => [
                'format' => 'HH:mm',
            ],
        ];
        $view = $this->blade('<x-form-time name="time" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="time"');
        $view->assertSee('localization');
    }

    /** @test */
    public function it_renders_form_time_with_default_date()
    {
        $view = $this->blade('<x-form-time name="time" :default="\'14:30\'" />');

        $view->assertSee('name="time"');
        $view->assertSee('defaultDate');
    }

    /** @test */
    public function it_renders_form_time_with_keep_invalid()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('keepInvalid');
        $view->assertSee('true');
    }

    /** @test */
    public function it_renders_form_time_with_display_config()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('display');
        $view->assertSee('sideBySide');
        $view->assertSee('viewMode');
        $view->assertSee('components');
    }

    /** @test */
    public function it_renders_form_time_with_view_mode()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('clock');
    }

    /** @test */
    public function it_renders_form_time_with_calendar_disabled()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('calendar');
        $view->assertSee('false');
    }

    /** @test */
    public function it_renders_form_time_with_icons_config()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('icons');
        $view->assertSee('time');
        $view->assertSee('date');
        $view->assertSee('up');
        $view->assertSee('down');
    }

    /** @test */
    public function it_renders_form_time_with_tabler_icons()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('ti ti-clock');
        $view->assertSee('ti ti-calendar-month');
        $view->assertSee('ti ti-arrow-up');
        $view->assertSee('ti ti-arrow-down');
    }

    /** @test */
    public function it_renders_form_time_with_restrictions_config()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('restrictions');
        $view->assertSee('minDate');
        $view->assertSee('maxDate');
        $view->assertSee('disabledDates');
        $view->assertSee('enabledDates');
    }

    /** @test */
    public function it_renders_form_time_with_undefined_dates()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('undefined');
    }

    /** @test */
    public function it_renders_form_time_with_json_processing()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('json_encode');
        $view->assertSee('replace');
        $view->assertSee('toString');
    }

    /** @test */
    public function it_renders_form_time_with_quote_replacement()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('replace(\'"\', "\'")');
    }

    /** @test */
    public function it_renders_form_time_with_undefined_replacement()
    {
        $view = $this->blade('<x-form-time name="time" />');

        $view->assertSee('replace("\'undefined\'", \'undefined\')');
    }
}
