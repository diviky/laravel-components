<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormChoicesTest extends TestCase
{
    /** @test */
    public function it_renders_form_choices_with_basic_attributes()
    {
        $view = $this->blade('<x-form-choices name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-choices');
    }

    /** @test */
    public function it_renders_form_choices_with_label()
    {
        $view = $this->blade('<x-form-choices name="country" label="Select Country" />');

        $view->assertSee('name="country"');
        $view->assertSee('Select Country');
    }

    /** @test */
    public function it_renders_form_choices_with_options()
    {
        $options = ['us' => 'United States', 'ca' => 'Canada'];
        $view = $this->blade('<x-form-choices name="country" :options="$options" />', ['options' => $options]);

        $view->assertSee('United States');
        $view->assertSee('Canada');
    }

    /** @test */
    public function it_renders_form_choices_with_placeholder()
    {
        $view = $this->blade('<x-form-choices name="country" placeholder="Choose your country" />');

        $view->assertSee('name="country"');
        $view->assertSee('Choose your country');
    }

    /** @test */
    public function it_renders_form_choices_with_multiple_selection()
    {
        $view = $this->blade('<x-form-choices name="skills[]" multiple />');

        $view->assertSee('name="skills[]"');
        $view->assertSee('multiple');
    }

    /** @test */
    public function it_renders_form_choices_with_size_variant()
    {
        $view = $this->blade('<x-form-choices name="country" size="lg" />');

        $view->assertSee('name="country"');
        $view->assertSee('form-select-lg');
    }

    /** @test */
    public function it_renders_form_choices_with_floating_label()
    {
        $view = $this->blade('<x-form-choices name="country" floating />');

        $view->assertSee('name="country"');
        $view->assertSee('floating');
    }

    /** @test */
    public function it_renders_form_choices_with_inline_display()
    {
        $view = $this->blade('<x-form-choices name="country" inline />');

        $view->assertSee('name="country"');
        $view->assertSee('inline');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_class()
    {
        $view = $this->blade('<x-form-choices name="country" class="custom-choices" />');

        $view->assertSee('name="country"');
        $view->assertSee('class="custom-choices');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_id()
    {
        $view = $this->blade('<x-form-choices name="country" id="country-select" />');

        $view->assertSee('name="country"');
        $view->assertSee('id="country-select"');
    }

    /** @test */
    public function it_renders_form_choices_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-choices name="country" disabled />');

        $view->assertSee('name="country"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_choices_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-choices name="country" readonly />');

        $view->assertSee('name="country"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_choices_with_required_attribute()
    {
        $view = $this->blade('<x-form-choices name="country" required />');

        $view->assertSee('name="country"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_choices_with_searchable_disabled()
    {
        $view = $this->blade('<x-form-choices name="country" :searchable="false" />');

        $view->assertSee('name="country"');
        $view->assertSee('searchable');
    }

    /** @test */
    public function it_renders_form_choices_with_compact_mode()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple compact />');

        $view->assertSee('name="tags[]"');
        $view->assertSee('compact');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_compact_text()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple compact compact-text="items selected" />');

        $view->assertSee('name="tags[]"');
        $view->assertSee('compact');
        $view->assertSee('items selected');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_min_chars()
    {
        $view = $this->blade('<x-form-choices name="country" :min-chars="3" />');

        $view->assertSee('name="country"');
        $view->assertSee('minChars: 3');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_height()
    {
        $view = $this->blade('<x-form-choices name="country" height="max-h-96" />');

        $view->assertSee('name="country"');
        $view->assertSee('max-h-96');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_allow_all_text()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple allow-all-text="Select All Items" />');

        $view->assertSee('name="tags[]"');
        $view->assertSee('Select All Items');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_remove_all_text()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple remove-all-text="Clear All Items" />');

        $view->assertSee('name="tags[]"');
        $view->assertSee('Clear All Items');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_no_result_text()
    {
        $view = $this->blade('<x-form-choices name="country" no-result-text="No matches found" />');

        $view->assertSee('name="country"');
        $view->assertSee('No matches found');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_debounce()
    {
        $view = $this->blade('<x-form-choices name="country" debounce="300ms" />');

        $view->assertSee('name="country"');
        $view->assertSee('300ms');
    }

    /** @test */
    public function it_renders_form_choices_with_search_function()
    {
        $view = $this->blade('<x-form-choices name="country" search-function="searchCountries" />');

        $view->assertSee('name="country"');
        $view->assertSee('searchCountries');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_value_field()
    {
        $view = $this->blade('<x-form-choices name="user_id" value-field="user_id" />');

        $view->assertSee('name="user_id"');
        $view->assertSee('valueField');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_label_field()
    {
        $view = $this->blade('<x-form-choices name="user_id" label-field="user_name" />');

        $view->assertSee('name="user_id"');
        $view->assertSee('labelField');
    }

    /** @test */
    public function it_renders_form_choices_with_image_field()
    {
        $view = $this->blade('<x-form-choices name="user_id" image-field="avatar" />');

        $view->assertSee('name="user_id"');
        $view->assertSee('imageField');
    }

    /** @test */
    public function it_renders_form_choices_with_disabled_field()
    {
        $view = $this->blade('<x-form-choices name="option" disabled-field="is_disabled" />');

        $view->assertSee('name="option"');
        $view->assertSee('disabledField');
    }

    /** @test */
    public function it_renders_form_choices_with_children_field()
    {
        $view = $this->blade('<x-form-choices name="category" children-field="subcategories" />');

        $view->assertSee('name="category"');
        $view->assertSee('childrenField');
    }

    /** @test */
    public function it_renders_form_choices_with_prepend_slot()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:prepend>
                    <x-icon name="globe" />
                </x-slot:prepend>
            </x-form-choices>
        ');

        $view->assertSee('name="country"');
        $view->assertSee('globe');
    }

    /** @test */
    public function it_renders_form_choices_with_append_slot()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:append>
                    <x-icon name="chevron-down" />
                </x-slot:append>
            </x-form-choices>
        ');

        $view->assertSee('name="country"');
        $view->assertSee('chevron-down');
    }

    /** @test */
    public function it_renders_form_choices_with_before_slot()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:before>
                    <span>Before</span>
                </x-slot:before>
            </x-form-choices>
        ');

        $view->assertSee('name="country"');
        $view->assertSee('Before');
    }

    /** @test */
    public function it_renders_form_choices_with_after_slot()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:after>
                    <span>After</span>
                </x-slot:after>
            </x-form-choices>
        ');

        $view->assertSee('name="country"');
        $view->assertSee('After');
    }

    /** @test */
    public function it_renders_form_choices_with_help_slot()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:help>
                    Choose your country from the list
                </x-slot:help>
            </x-form-choices>
        ');

        $view->assertSee('name="country"');
        $view->assertSee('Choose your country from the list');
    }

    /** @test */
    public function it_renders_form_choices_with_icon_slot()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:icon>
                    <x-icon name="map-pin" />
                </x-slot:icon>
            </x-form-choices>
        ');

        $view->assertSee('name="country"');
        $view->assertSee('map-pin');
    }

    /** @test */
    public function it_renders_form_choices_with_item_slot()
    {
        $view = $this->blade('
            <x-form-choices name="user_id" :options="[1 => \'User 1\']">
                <x-slot:item>
                    @props([\'option\'])
                    <div class="custom-item">{{ $option->name }}</div>
                </x-slot:item>
            </x-form-choices>
        ');

        $view->assertSee('name="user_id"');
        $view->assertSee('custom-item');
    }

    /** @test */
    public function it_renders_form_choices_with_selection_slot()
    {
        $view = $this->blade('
            <x-form-choices name="user_id" :options="[1 => \'User 1\']">
                <x-slot:selection>
                    @props([\'option\'])
                    <span class="custom-selection">{{ $option->name }}</span>
                </x-slot:selection>
            </x-form-choices>
        ');

        $view->assertSee('name="user_id"');
        $view->assertSee('custom-selection');
    }

    /** @test */
    public function it_renders_form_choices_with_alpine_data()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('x-data');
        $view->assertSee('focused: false');
        $view->assertSee('selection:');
    }

    /** @test */
    public function it_renders_form_choices_with_alpine_functions()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('show()');
        $view->assertSee('hide()');
        $view->assertSee('toggle(');
        $view->assertSee('clear()');
    }

    /** @test */
    public function it_renders_form_choices_with_keyboard_navigation()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('@keydown.up');
        $view->assertSee('@keydown.down');
        $view->assertSee('@keydown.esc');
    }

    /** @test */
    public function it_renders_form_choices_with_click_outside()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('@click.outside');
    }

    /** @test */
    public function it_renders_form_choices_with_input_group_classes()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('input-group');
        $view->assertSee('position-relative');
    }

    /** @test */
    public function it_renders_form_choices_with_form_select_classes()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('form-select');
    }

    /** @test */
    public function it_renders_form_choices_with_size_classes()
    {
        $view = $this->blade('<x-form-choices name="country" size="sm" />');

        $view->assertSee('form-select-sm');
    }

    /** @test */
    public function it_renders_form_choices_with_flat_styling()
    {
        $view = $this->blade('<x-form-choices name="country" flat />');

        $view->assertSee('input-group-flat');
    }

    /** @test */
    public function it_renders_form_choices_with_icon_styling()
    {
        $view = $this->blade('
            <x-form-choices name="country">
                <x-slot:icon>
                    <x-icon name="globe" />
                </x-slot:icon>
            </x-form-choices>
        ');

        $view->assertSee('input-icon');
    }

    /** @test */
    public function it_renders_form_choices_with_clear_icon()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('choice-clear');
        $view->assertSee('x');
    }

    /** @test */
    public function it_renders_form_choices_with_tags_list()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple />');

        $view->assertSee('tags-list');
        $view->assertSee('d-inline-flex');
    }

    /** @test */
    public function it_renders_form_choices_with_compact_text()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple compact />');

        $view->assertSee('compact-text');
    }

    /** @test */
    public function it_renders_form_choices_with_choice_input()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('choice-input');
        $view->assertSee('w-20');
    }

    /** @test */
    public function it_renders_form_choices_with_hidden_inputs()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('type="hidden"');
        $view->assertSee('name="country"');
    }

    /** @test */
    public function it_renders_form_choices_with_choice_list()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('choice-list');
        $view->assertSee('x-cloak');
    }

    /** @test */
    public function it_renders_form_choices_with_choice_items()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('choice-items');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_renders_form_choices_with_progress_bar()
    {
        $view = $this->blade('<x-form-choices name="country" search-function="search" />');

        $view->assertSee('progress');
        $view->assertSee('progress-primary');
    }

    /** @test */
    public function it_renders_form_choices_with_select_all_option()
    {
        $view = $this->blade('<x-form-choices name="tags[]" multiple />');

        $view->assertSee('Select all');
        $view->assertSee('Remove all');
    }

    /** @test */
    public function it_renders_form_choices_with_no_results_message()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('No results found.');
    }

    /** @test */
    public function it_renders_form_choices_with_options_list()
    {
        $view = $this->blade('<x-form-choices name="country" :options="[\'us\' => \'United States\']" />');

        $view->assertSee('choicesOptions');
    }

    /** @test */
    public function it_renders_form_choices_with_optgroup_support()
    {
        $options = [
            'group1' => [
                'label' => 'Group 1',
                'children' => ['opt1' => 'Option 1', 'opt2' => 'Option 2']
            ]
        ];
        $view = $this->blade('<x-form-choices name="category" :options="$options" children-field="children" />', ['options' => $options]);

        $view->assertSee('Group 1');
        $view->assertSee('Option 1');
        $view->assertSee('Option 2');
    }

    /** @test */
    public function it_renders_form_choices_with_custom_validation()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('validatehidden');
    }

    /** @test */
    public function it_renders_form_choices_with_livewire_attributes()
    {
        $view = $this->blade('<x-form-choices name="country" wire:model="selectedCountry" />');

        $view->assertSee('name="country"');
        $view->assertSee('wire:model="selectedCountry"');
    }

    /** @test */
    public function it_renders_form_choices_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-choices name="country" data-turbo="true" />');

        $view->assertSee('name="country"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_choices_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-choices name="country" aria-label="Country selection" />');

        $view->assertSee('name="country"');
        $view->assertSee('aria-label="Country selection"');
    }

    /** @test */
    public function it_renders_form_choices_with_data_attributes()
    {
        $view = $this->blade('<x-form-choices name="country" data-test="choices-component" />');

        $view->assertSee('name="country"');
        $view->assertSee('data-test="choices-component"');
    }

    /** @test */
    public function it_renders_form_choices_with_uuid_generation()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('uuid');
    }

    /** @test */
    public function it_renders_form_choices_with_entangle_support()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('entangle');
    }

    /** @test */
    public function it_renders_form_choices_with_form_errors()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('form-errors');
    }

    /** @test */
    public function it_renders_form_choices_with_help_text()
    {
        $view = $this->blade('<x-form-choices name="country" />');

        $view->assertSee('x-help');
    }
}
