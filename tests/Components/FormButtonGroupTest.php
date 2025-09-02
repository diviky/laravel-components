<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormButtonGroupTest extends TestCase
{
    /** @test */
    public function it_renders_form_button_group_with_basic_attributes()
    {
        $view = $this->blade('<x-form-button-group name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group');
    }

    /** @test */
    public function it_renders_form_button_group_with_label()
    {
        $view = $this->blade('<x-form-button-group name="options" label="Select Options" />');

        $view->assertSee('name="options"');
        $view->assertSee('Select Options');
    }

    /** @test */
    public function it_renders_form_button_group_with_options()
    {
        $view = $this->blade('<x-form-button-group name="preferences" :options="[\'light\' => \'Light Theme\', \'dark\' => \'Dark Theme\']" />');

        $view->assertSee('name="preferences"');
        $view->assertSee('Light Theme');
        $view->assertSee('Dark Theme');
    }

    /** @test */
    public function it_renders_form_button_group_with_radio_type()
    {
        $view = $this->blade('<x-form-button-group name="test" type="radio" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="radio"');
    }

    /** @test */
    public function it_renders_form_button_group_with_checkbox_type()
    {
        $view = $this->blade('<x-form-button-group name="test" type="checkbox" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="checkbox"');
    }

    /** @test */
    public function it_renders_form_button_group_with_inline_layout()
    {
        $view = $this->blade('<x-form-button-group name="test" :inline="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('d-flex');
    }

    /** @test */
    public function it_renders_form_button_group_with_vertical_layout()
    {
        $view = $this->blade('<x-form-button-group name="test" :vertical="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-vertical');
    }

    /** @test */
    public function it_renders_form_button_group_with_extra_attributes()
    {
        $view = $this->blade('<x-form-button-group name="test" :extra-attributes="[\'data-test\' => \'button-group\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="button-group"');
    }

    /** @test */
    public function it_renders_form_button_group_with_custom_class()
    {
        $view = $this->blade('<x-form-button-group name="test" class="custom-button-group" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-button-group');
    }

    /** @test */
    public function it_renders_form_button_group_with_custom_id()
    {
        $view = $this->blade('<x-form-button-group name="test" id="button-group-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="button-group-input"');
    }

    /** @test */
    public function it_renders_form_button_group_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-button-group name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_button_group_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-button-group name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_button_group_with_required_attribute()
    {
        $view = $this->blade('<x-form-button-group name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_button_group_with_placeholder()
    {
        $view = $this->blade('<x-form-button-group name="test" placeholder="Select options..." />');

        $view->assertSee('name="test"');
        $view->assertSee('placeholder="Select options..."');
    }

    /** @test */
    public function it_renders_form_button_group_with_multiple_attribute()
    {
        $view = $this->blade('<x-form-button-group name="test" multiple />');

        $view->assertSee('name="test"');
        $view->assertSee('multiple');
    }

    /** @test */
    public function it_renders_form_button_group_with_before_slot()
    {
        $view = $this->blade('<x-form-button-group name="test"><x-slot:before>Before Content</x-slot:before></x-form-button-group>');

        $view->assertSee('name="test"');
        $view->assertSee('Before Content');
    }

    /** @test */
    public function it_renders_form_button_group_with_after_slot()
    {
        $view = $this->blade('<x-form-button-group name="test"><x-slot:after>After Content</x-slot:after></x-form-button-group>');

        $view->assertSee('name="test"');
        $view->assertSee('After Content');
    }

    /** @test */
    public function it_renders_form_button_group_with_help_slot()
    {
        $view = $this->blade('<x-form-button-group name="test"><x-slot:help>Help Text</x-slot:help></x-form-button-group>');

        $view->assertSee('name="test"');
        $view->assertSee('Help Text');
    }

    /** @test */
    public function it_renders_form_button_group_with_default_slot()
    {
        $view = $this->blade('<x-form-button-group name="test">Default Content</x-form-button-group>');

        $view->assertSee('name="test"');
        $view->assertSee('Default Content');
    }

    /** @test */
    public function it_renders_form_button_group_with_options_and_default_slot()
    {
        $view = $this->blade('<x-form-button-group name="test" :options="[\'option1\', \'option2\']">Fallback Content</x-form-button-group>');

        $view->assertSee('name="test"');
        // When options are provided, the default slot is not used
        $view->assertDontSee('Fallback Content');
    }

    /** @test */
    public function it_renders_form_button_group_without_options_uses_default_slot()
    {
        $view = $this->blade('<x-form-button-group name="test">Fallback Content</x-form-button-group>');

        $view->assertSee('name="test"');
        $view->assertSee('Fallback Content');
    }

    /** @test */
    public function it_renders_form_button_group_with_authorization_can()
    {
        $view = $this->blade('<x-form-button-group name="test" can="select-options" />');

        $view->assertSee('name="test"');
        $view->assertSee('can="select-options"');
    }

    /** @test */
    public function it_renders_form_button_group_with_authorization_role()
    {
        $view = $this->blade('<x-form-button-group name="test" role="user" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_form_button_group_with_authorization_action()
    {
        $view = $this->blade('<x-form-button-group name="test" action="create" />');

        $view->assertSee('name="test"');
        $view->assertSee('action="create"');
    }

    /** @test */
    public function it_renders_form_button_group_with_livewire_attributes()
    {
        $view = $this->blade('<x-form-button-group name="test" wire:model="selectedOptions" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="selectedOptions"');
    }

    /** @test */
    public function it_renders_form_button_group_with_model_binding()
    {
        $view = $this->blade('<x-form-button-group name="test" :bind="$user" />');

        $view->assertSee('name="test"');
        $view->assertSee('bind="$user"');
    }

    /** @test */
    public function it_renders_form_button_group_with_default_values()
    {
        $view = $this->blade('<x-form-button-group name="test" :default="[\'option1\', \'option2\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('default="[\'option1\', \'option2\']"');
    }

    /** @test */
    public function it_renders_form_button_group_with_error_state()
    {
        $view = $this->blade('<x-form-button-group name="test" class="is-invalid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-invalid');
    }

    /** @test */
    public function it_renders_form_button_group_with_success_state()
    {
        $view = $this->blade('<x-form-button-group name="test" class="is-valid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-valid');
    }

    /** @test */
    public function it_renders_form_button_group_with_warning_state()
    {
        $view = $this->blade('<x-form-button-group name="test" class="is-warning" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-warning');
    }

    /** @test */
    public function it_renders_form_button_group_with_info_state()
    {
        $view = $this->blade('<x-form-button-group name="test" class="is-info" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-info');
    }

    /** @test */
    public function it_renders_form_button_group_with_danger_state()
    {
        $view = $this->blade('<x-form-button-group name="test" class="is-danger" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-danger');
    }

    /** @test */
    public function it_renders_form_button_group_with_small_size()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-sm" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-sm');
    }

    /** @test */
    public function it_renders_form_button_group_with_large_size()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-lg" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-lg');
    }

    /** @test */
    public function it_renders_form_button_group_with_primary_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-primary" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-primary');
    }

    /** @test */
    public function it_renders_form_button_group_with_secondary_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-secondary" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-secondary');
    }

    /** @test */
    public function it_renders_form_button_group_with_success_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-success" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-success');
    }

    /** @test */
    public function it_renders_form_button_group_with_warning_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-warning" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-warning');
    }

    /** @test */
    public function it_renders_form_button_group_with_danger_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-danger" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-danger');
    }

    /** @test */
    public function it_renders_form_button_group_with_info_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-info" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-info');
    }

    /** @test */
    public function it_renders_form_button_group_with_light_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-light" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-light');
    }

    /** @test */
    public function it_renders_form_button_group_with_dark_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-dark" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-dark');
    }

    /** @test */
    public function it_renders_form_button_group_with_outline_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-outline-primary" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-outline-primary');
    }

    /** @test */
    public function it_renders_form_button_group_with_ghost_style()
    {
        $view = $this->blade('<x-form-button-group name="test" class="btn-group-ghost-primary" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-group-ghost-primary');
    }

    /** @test */
    public function it_renders_form_button_group_with_custom_color()
    {
        $view = $this->blade('<x-form-button-group name="test" color="purple" />');

        $view->assertSee('name="test"');
        $view->assertSee('color="purple"');
    }

    /** @test */
    public function it_renders_form_button_group_with_custom_size()
    {
        $view = $this->blade('<x-form-button-group name="test" size="xl" />');

        $view->assertSee('name="test"');
        $view->assertSee('size="xl"');
    }

    /** @test */
    public function it_renders_form_button_group_with_custom_variant()
    {
        $view = $this->blade('<x-form-button-group name="test" variant="rounded" />');

        $view->assertSee('name="test"');
        $view->assertSee('variant="rounded"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropdown_support()
    {
        $view = $this->blade('<x-form-button-group name="test" dropdown />');

        $view->assertSee('name="test"');
        $view->assertSee('dropdown-toggle');
    }

    /** @test */
    public function it_renders_form_button_group_with_loading_state()
    {
        $view = $this->blade('<x-form-button-group name="test" loading />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-loading');
    }

    /** @test */
    public function it_renders_form_button_group_with_square_style()
    {
        $view = $this->blade('<x-form-button-group name="test" square />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-square');
    }

    /** @test */
    public function it_renders_form_button_group_with_pill_style()
    {
        $view = $this->blade('<x-form-button-group name="test" pill />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-pill');
    }

    /** @test */
    public function it_renders_form_button_group_with_block_style()
    {
        $view = $this->blade('<x-form-button-group name="test" full />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-block');
    }

    /** @test */
    public function it_renders_form_button_group_with_bold_style()
    {
        $view = $this->blade('<x-form-button-group name="test" bold />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-bold');
    }

    /** @test */
    public function it_renders_form_button_group_with_icon()
    {
        $view = $this->blade('<x-form-button-group name="test" icon="check" />');

        $view->assertSee('name="test"');
        $view->assertSee('icon="check"');
    }

    /** @test */
    public function it_renders_form_button_group_with_title()
    {
        $view = $this->blade('<x-form-button-group name="test" title="Button Group Tooltip" />');

        $view->assertSee('name="test"');
        $view->assertSee('title="Button Group Tooltip"');
    }

    /** @test */
    public function it_renders_form_button_group_with_data_attributes()
    {
        $view = $this->blade('<x-form-button-group name="test" data-test="button-group" data-type="selection" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="button-group"');
        $view->assertSee('data-type="selection"');
    }

    /** @test */
    public function it_renders_form_button_group_with_aria_attributes()
    {
        $view = $this->blade('<x-form-button-group name="test" aria-label="Button Group" aria-describedby="help-text" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Button Group"');
        $view->assertSee('aria-describedby="help-text"');
    }

    /** @test */
    public function it_renders_form_button_group_with_role_attribute()
    {
        $view = $this->blade('<x-form-button-group name="test" role="group" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="group"');
    }

    /** @test */
    public function it_renders_form_button_group_with_tabindex()
    {
        $view = $this->blade('<x-form-button-group name="test" tabindex="0" />');

        $view->assertSee('name="test"');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_form_button_group_with_form_attribute()
    {
        $view = $this->blade('<x-form-button-group name="test" form="my-form" />');

        $view->assertSee('name="test"');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_form_button_group_with_autocomplete()
    {
        $view = $this->blade('<x-form-button-group name="test" autocomplete="off" />');

        $view->assertSee('name="test"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_form_button_group_with_novalidate()
    {
        $view = $this->blade('<x-form-button-group name="test" novalidate />');

        $view->assertSee('name="test"');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_form_button_group_with_accept()
    {
        $view = $this->blade('<x-form-button-group name="test" accept="image/*" />');

        $view->assertSee('name="test"');
        $view->assertSee('accept="image/*"');
    }

    /** @test */
    public function it_renders_form_button_group_with_capture()
    {
        $view = $this->blade('<x-form-button-group name="test" capture="environment" />');

        $view->assertSee('name="test"');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_form_button_group_with_max()
    {
        $view = $this->blade('<x-form-button-group name="test" max="5" />');

        $view->assertSee('name="test"');
        $view->assertSee('max="5"');
    }

    /** @test */
    public function it_renders_form_button_group_with_min()
    {
        $view = $this->blade('<x-form-button-group name="test" min="1" />');

        $view->assertSee('name="test"');
        $view->assertSee('min="1"');
    }

    /** @test */
    public function it_renders_form_button_group_with_step()
    {
        $view = $this->blade('<x-form-button-group name="test" step="0.1" />');

        $view->assertSee('name="test"');
        $view->assertSee('step="0.1"');
    }

    /** @test */
    public function it_renders_form_button_group_with_pattern()
    {
        $view = $this->blade('<x-form-button-group name="test" pattern="[A-Za-z]{3}" />');

        $view->assertSee('name="test"');
        $view->assertSee('pattern="[A-Za-z]{3}"');
    }

    /** @test */
    public function it_renders_form_button_group_with_spellcheck()
    {
        $view = $this->blade('<x-form-button-group name="test" spellcheck="false" />');

        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_form_button_group_with_translate()
    {
        $view = $this->blade('<x-form-button-group name="test" translate="no" />');

        $view->assertSee('name="test"');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_form_button_group_with_contenteditable()
    {
        $view = $this->blade('<x-form-button-group name="test" contenteditable="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_form_button_group_with_contextmenu()
    {
        $view = $this->blade('<x-form-button-group name="test" contextmenu="my-menu" />');

        $view->assertSee('name="test"');
        $view->assertSee('contextmenu="my-menu"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dir()
    {
        $view = $this->blade('<x-form-button-group name="test" dir="rtl" />');

        $view->assertSee('name="test"');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_form_button_group_with_draggable()
    {
        $view = $this->blade('<x-form-button-group name="test" draggable="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="copy" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_form_button_group_with_hidden()
    {
        $view = $this->blade('<x-form-button-group name="test" hidden />');

        $view->assertSee('name="test"');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_form_button_group_with_lang()
    {
        $view = $this->blade('<x-form-button-group name="test" lang="en" />');

        $view->assertSee('name="test"');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_form_button_group_with_spellcheck_true()
    {
        $view = $this->blade('<x-form-button-group name="test" spellcheck="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="true"');
    }

    /** @test */
    public function it_renders_form_button_group_with_translate_yes()
    {
        $view = $this->blade('<x-form-button-group name="test" translate="yes" />');

        $view->assertSee('name="test"');
        $view->assertSee('translate="yes"');
    }

    /** @test */
    public function it_renders_form_button_group_with_contenteditable_false()
    {
        $view = $this->blade('<x-form-button-group name="test" contenteditable="false" />');

        $view->assertSee('name="test"');
        $view->assertSee('contenteditable="false"');
    }

    /** @test */
    public function it_renders_form_button_group_with_draggable_false()
    {
        $view = $this->blade('<x-form-button-group name="test" draggable="false" />');

        $view->assertSee('name="test"');
        $view->assertSee('draggable="false"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone_move()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="move" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="move"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone_link()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="link"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone_copy_move()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="copy move" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy move"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone_copy_link()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="copy link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy link"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone_move_link()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="move link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="move link"');
    }

    /** @test */
    public function it_renders_form_button_group_with_dropzone_copy_move_link()
    {
        $view = $this->blade('<x-form-button-group name="test" dropzone="copy move link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy move link"');
    }
}
