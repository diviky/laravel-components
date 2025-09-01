<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormDateRangeTest extends TestCase
{
    /** @test */
    public function it_renders_form_date_range_with_basic_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('form-date-range');
    }

    /** @test */
    public function it_renders_form_date_range_with_label()
    {
        $view = $this->blade('<x-form-date-range name="date_range" label="Select Date Range" />');
        
        $view->assertSee('name="date_range"');
        $view->assertSee('Select Date Range');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_selector()
    {
        $view = $this->blade('<x-form-date-range name="test" selector="data-custom-dates" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('data-custom-dates');
    }

    /** @test */
    public function it_renders_form_date_range_with_default_selector()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('data-dateranges');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_format()
    {
        $view = $this->blade('<x-form-date-range name="test" format="YYYY-MM-DD" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('YYYY-MM-DD');
    }

    /** @test */
    public function it_renders_form_date_range_with_default_format()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('MMM DD, YYYY');
    }

    /** @test */
    public function it_renders_form_date_range_with_extra_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" :extra-attributes="[\'required\' => true]" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('extraAttributes');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_type()
    {
        $view = $this->blade('<x-form-date-range name="test" type="date" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('type="date"');
    }

    /** @test */
    public function it_renders_form_date_range_with_default_type()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('type="text"');
    }

    /** @test */
    public function it_renders_form_date_range_with_form_input()
    {
        $view = $this->blade('<x-form-date_range name="test" />');
        
        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_date_range_with_name_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('name="test"');
    }

    /** @test */
    public function it_renders_form_date_range_with_attributes_merge()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_date_range_with_default_placeholder()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('Select Date Range');
    }

    /** @test */
    public function it_renders_form_date_range_with_data_date_format()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('data-date-format');
    }

    /** @test */
    public function it_renders_form_date_range_with_selector_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('data-dateranges');
    }

    /** @test */
    public function it_renders_form_date_range_with_range_picker_class()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('range-picker');
    }

    /** @test */
    public function it_renders_form_date_range_with_slot_content()
    {
        $view = $this->blade('<x-form-date-range name="test">Slot content</x-form-date-range>');
        
        $view->assertSee('name="test"');
        $view->assertSee('Slot content');
    }

    /** @test */
    public function it_renders_form_date_range_with_help_slot()
    {
        $view = $this->blade('
            <x-form-date-range name="test">
                <x-slot:help>
                    Select a start and end date for your booking. Maximum 30 days.
                </x-slot:help>
            </x-form-date-range>
        ');
        
        $view->assertSee('name="test"');
        $view->assertSee('Select a start and end date for your booking. Maximum 30 days.');
    }

    /** @test */
    public function it_renders_form_date_range_with_icon_slot()
    {
        $view = $this->blade('
            <x-form-date-range name="test">
                <x-slot:icon>calendar-range</x-slot:icon>
            </x-form-date-range>
        ');
        
        $view->assertSee('name="test"');
        $view->assertSee('calendar-range');
    }

    /** @test */
    public function it_renders_form_date_range_with_default_icon()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('calendar-month');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_icon_from_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" icon="custom-icon" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('custom-icon');
    }

    /** @test */
    public function it_renders_form_date_range_with_help_rendering()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_date_range_with_icon_rendering()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('attributes->has(\'icon\')');
        $view->assertSee('attributes->get(\'icon\')');
    }

    /** @test */
    public function it_renders_form_date_range_with_icon_fallback()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('calendar-month');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_class()
    {
        $view = $this->blade('<x-form-date-range name="test" class="custom-daterange" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('class="custom-daterange');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_id()
    {
        $view = $this->blade('<x-form-date-range name="test" id="daterange-input" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('id="daterange-input"');
    }

    /** @test */
    public function it_renders_form_date_range_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" disabled />');
        
        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_date_range_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" readonly />');
        
        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_date_range_with_required_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" required />');
        
        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_placeholder()
    {
        $view = $this->blade('<x-form-date-range name="test" placeholder="Choose date range" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('Choose date range');
    }

    /** @test */
    public function it_renders_form_date_range_with_livewire_integration()
    {
        $view = $this->blade('<x-form-date-range name="test" wire:model="selectedDateRange" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('wire:model="selectedDateRange"');
    }

    /** @test */
    public function it_renders_form_date_range_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" data-turbo="true" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_date_range_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" aria-label="Date range picker" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Date range picker"');
    }

    /** @test */
    public function it_renders_form_date_range_with_data_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" data-test="daterange-component" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('data-test="daterange-component"');
    }

    /** @test */
    public function it_renders_form_date_range_with_validation_attributes()
    {
        $view = $this->blade('<x-form-date-range name="test" min="2024-01-01" max="2024-12-31" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('min="2024-01-01"');
        $view->assertSee('max="2024-12-31"');
    }

    /** @test */
    public function it_renders_form_date_range_with_pattern_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"');
    }

    /** @test */
    public function it_renders_form_date_range_with_autocomplete_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" autocomplete="off" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_form_date_range_with_spellcheck_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" spellcheck="false" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_form_date_range_with_tabindex_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" tabindex="1" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('tabindex="1"');
    }

    /** @test */
    public function it_renders_form_date_range_with_title_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" title="Select a date range" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('title="Select a date range"');
    }

    /** @test */
    public function it_renders_form_date_range_with_dir_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" dir="rtl" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_form_date_range_with_lang_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" lang="en" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_form_date_range_with_translate_attribute()
    {
        $view = $this->blade('<x-form-date-range name="test" translate="no" />');
        
        $view->assertSee('name="test"');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_form_date_range_with_component_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('form-date-range');
        $view->assertSee('<x-form-input');
        $view->assertSee('data-date-format');
        $view->assertSee('data-dateranges');
    }

    /** @test */
    public function it_renders_form_date_range_with_data_attributes_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('data-date-format="MMM DD, YYYY"');
        $view->assertSee('data-dateranges="data-dateranges"');
    }

    /** @test */
    public function it_renders_form_date_range_with_class_structure()
    {
        $view = $this->blade('<x-form-date_range name="test" />');
        
        $view->assertSee('class="range-picker');
    }

    /** @test */
    public function it_renders_form_date_range_with_placeholder_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('placeholder="Select Date Range"');
    }

    /** @test */
    public function it_renders_form_date_range_with_type_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('type="text"');
    }

    /** @test */
    public function it_renders_form_date_range_with_slot_structure()
    {
        $view = $this->blade('<x-form-date-range name="test">Content</x-form-date-range>');
        
        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_date_range_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-date-range name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-date-range>
        ');
        
        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_date_range_with_icon_slot_structure()
    {
        $view = $this->blade('
            <x-form-date-range name="test">
                <x-slot:icon>custom-icon</x-slot:icon>
            </x-form-date-range>
        ');
        
        $view->assertSee('custom-icon');
    }

    /** @test */
    public function it_renders_form_date_range_with_default_icon_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('calendar-month');
    }

    /** @test */
    public function it_renders_form_date_range_with_custom_icon_override()
    {
        $view = $this->blade('<x-form-date-range name="test" icon="override-icon" />');
        
        $view->assertSee('override-icon');
    }

    /** @test */
    public function it_renders_form_date_range_with_attributes_merge_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_date_range_with_extra_attributes_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('extra-attributes');
    }

    /** @test */
    public function it_renders_form_date_range_with_selector_prop_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('selector');
    }

    /** @test */
    public function it_renders_form_date_range_with_format_prop_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('format');
    }

    /** @test */
    public function it_renders_form_date_range_with_name_prop_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('name');
    }

    /** @test */
    public function it_renders_form_date_range_with_type_prop_structure()
    {
        $view = $this->blade('<x-form-date-range name="test" />');
        
        $view->assertSee('type');
    }
}
