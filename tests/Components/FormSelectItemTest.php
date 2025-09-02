<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormSelectItemTest extends TestCase
{
    /** @test */
    public function it_renders_form_select_item_with_basic_attributes()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('value="option1"');
        $view->assertSee('Option 1');
    }

    /** @test */
    public function it_renders_form_select_item_with_label()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" label="Test Label">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('Test Label');
    }

    /** @test */
    public function it_renders_form_select_item_with_icon()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" icon="check">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('icon="check"');
    }

    /** @test */
    public function it_renders_form_select_item_with_radio_type()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" type="radio">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('type="radio"');
    }

    /** @test */
    public function it_renders_form_select_item_with_checkbox_type()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" type="checkbox">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('type="checkbox"');
    }

    /** @test */
    public function it_renders_form_select_item_with_checked_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" :checked="true">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('checked');
    }

    /** @test */
    public function it_renders_form_select_item_with_show_check_mark()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" show>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-check');
    }

    /** @test */
    public function it_renders_form_select_item_with_extra_attributes()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" :extra-attributes="[\'data-test\' => \'select-item\']">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="select-item"');
    }

    /** @test */
    public function it_renders_form_select_item_with_custom_class()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="custom-select-item">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-select-item');
    }

    /** @test */
    public function it_renders_form_select_item_with_custom_id()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" id="select-item-input">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('id="select-item-input"');
    }

    /** @test */
    public function it_renders_form_select_item_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" disabled>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_select_item_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" readonly>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_select_item_with_required_attribute()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" required>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_select_item_with_placeholder()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" placeholder="Select option...">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('placeholder="Select option..."');
    }

    /** @test */
    public function it_renders_form_select_item_with_data_attributes()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" data-test="select-item" data-type="selection">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="select-item"');
        $view->assertSee('data-type="selection"');
    }

    /** @test */
    public function it_renders_form_select_item_with_aria_attributes()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" aria-label="Select Item" aria-describedby="help-text">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Select Item"');
        $view->assertSee('aria-describedby="help-text"');
    }

    /** @test */
    public function it_renders_form_select_item_with_role_attribute()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" role="option">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('role="option"');
    }

    /** @test */
    public function it_renders_form_select_item_with_tabindex()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" tabindex="0">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_form_select_item_with_form_attribute()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" form="my-form">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_form_select_item_with_autocomplete()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" autocomplete="off">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_form_select_item_with_novalidate()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" novalidate>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_form_select_item_with_accept()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" accept="image/*">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('accept="image/*"');
    }

    /** @test */
    public function it_renders_form_select_item_with_capture()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" capture="environment">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_form_select_item_with_max()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" max="5">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('max="5"');
    }

    /** @test */
    public function it_renders_form_select_item_with_min()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" min="1">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('min="1"');
    }

    /** @test */
    public function it_renders_form_select_item_with_step()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" step="0.1">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('step="0.1"');
    }

    /** @test */
    public function it_renders_form_select_item_with_pattern()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" pattern="[A-Za-z]{3}">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('pattern="[A-Za-z]{3}"');
    }

    /** @test */
    public function it_renders_form_select_item_with_spellcheck()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" spellcheck="false">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_form_select_item_with_translate()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" translate="no">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_form_select_item_with_contenteditable()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" contenteditable="true">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_form_select_item_with_contextmenu()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" contextmenu="my-menu">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('contextmenu="my-menu"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dir()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dir="rtl">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_form_select_item_with_draggable()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" draggable="true">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="copy">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_form_select_item_with_hidden()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" hidden>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_form_select_item_with_lang()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" lang="en">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_form_select_item_with_spellcheck_true()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" spellcheck="true">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="true"');
    }

    /** @test */
    public function it_renders_form_select_item_with_translate_yes()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" translate="yes">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('translate="yes"');
    }

    /** @test */
    public function it_renders_form_select_item_with_contenteditable_false()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" contenteditable="false">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('contenteditable="false"');
    }

    /** @test */
    public function it_renders_form_select_item_with_draggable_false()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" draggable="false">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('draggable="false"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone_move()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="move">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="move"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone_link()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="link">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="link"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone_copy_move()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="copy move">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy move"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone_copy_link()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="copy link">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy link"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone_move_link()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="move link">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="move link"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropzone_copy_move_link()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropzone="copy move link">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy move link"');
    }

    /** @test */
    public function it_renders_form_select_item_with_authorization_can()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" can="select-option">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('can="select-option"');
    }

    /** @test */
    public function it_renders_form_select_item_with_authorization_role()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" role="user">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_form_select_item_with_authorization_action()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" action="create">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('action="create"');
    }

    /** @test */
    public function it_renders_form_select_item_with_livewire_attributes()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" wire:model="selectedOption">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="selectedOption"');
    }

    /** @test */
    public function it_renders_form_select_item_with_model_binding()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" :bind="$user">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('bind="$user"');
    }

    /** @test */
    public function it_renders_form_select_item_with_default_values()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" :default="true">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('default="true"');
    }

    /** @test */
    public function it_renders_form_select_item_with_error_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="is-invalid">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('is-invalid');
    }

    /** @test */
    public function it_renders_form_select_item_with_success_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="is-valid">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('is-valid');
    }

    /** @test */
    public function it_renders_form_select_item_with_warning_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="is-warning">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('is-warning');
    }

    /** @test */
    public function it_renders_form_select_item_with_info_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="is-info">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('is-info');
    }

    /** @test */
    public function it_renders_form_select_item_with_danger_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="is-danger">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('is-danger');
    }

    /** @test */
    public function it_renders_form_select_item_with_small_size()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-sm">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-sm');
    }

    /** @test */
    public function it_renders_form_select_item_with_large_size()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-lg">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-lg');
    }

    /** @test */
    public function it_renders_form_select_item_with_primary_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-primary">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-primary');
    }

    /** @test */
    public function it_renders_form_select_item_with_secondary_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-secondary">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-secondary');
    }

    /** @test */
    public function it_renders_form_select_item_with_success_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-success">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-success');
    }

    /** @test */
    public function it_renders_form_select_item_with_warning_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-warning">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-warning');
    }

    /** @test */
    public function it_renders_form_select_item_with_danger_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-danger">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-danger');
    }

    /** @test */
    public function it_renders_form_select_item_with_info_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-info">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-info');
    }

    /** @test */
    public function it_renders_form_select_item_with_light_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-light">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-light');
    }

    /** @test */
    public function it_renders_form_select_item_with_dark_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-dark">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-dark');
    }

    /** @test */
    public function it_renders_form_select_item_with_outline_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-outline-primary">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-outline-primary');
    }

    /** @test */
    public function it_renders_form_select_item_with_ghost_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" class="form-selectgroup-ghost-primary">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-ghost-primary');
    }

    /** @test */
    public function it_renders_form_select_item_with_custom_color()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" color="purple">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('color="purple"');
    }

    /** @test */
    public function it_renders_form_select_item_with_custom_size()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" size="xl">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('size="xl"');
    }

    /** @test */
    public function it_renders_form_select_item_with_custom_variant()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" variant="rounded">Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('variant="rounded"');
    }

    /** @test */
    public function it_renders_form_select_item_with_dropdown_support()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" dropdown>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('dropdown-toggle');
    }

    /** @test */
    public function it_renders_form_select_item_with_loading_state()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" loading>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('btn-loading');
    }

    /** @test */
    public function it_renders_form_select_item_with_square_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" square>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('btn-square');
    }

    /** @test */
    public function it_renders_form_select_item_with_pill_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" pill>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('btn-pill');
    }

    /** @test */
    public function it_renders_form_select_item_with_block_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" full>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('btn-block');
    }

    /** @test */
    public function it_renders_form_select_item_with_bold_style()
    {
        $view = $this->blade('<x-form-select-item name="test" value="option1" bold>Option 1</x-form-select-item>');

        $view->assertSee('name="test"');
        $view->assertSee('btn-bold');
    }
}
