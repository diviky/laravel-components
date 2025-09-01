<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormPinTest extends TestCase
{
    /** @test */
    public function it_renders_form_pin_with_basic_attributes()
    {
        $view = $this->blade('<x-form-pin name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-pin');
    }

    /** @test */
    public function it_renders_form_pin_with_label()
    {
        $view = $this->blade('<x-form-pin name="pin" label="Enter PIN" />');

        $view->assertSee('name="pin"');
        $view->assertSee('Enter PIN');
    }

    /** @test */
    public function it_renders_form_pin_with_value()
    {
        $view = $this->blade('<x-form-pin name="pin" value="123456" />');

        $view->assertSee('name="pin"');
        $view->assertSee('123456');
    }

    /** @test */
    public function it_renders_form_pin_with_default_value()
    {
        $view = $this->blade('<x-form-pin name="pin" :default="\'000000\'" />');

        $view->assertSee('name="pin"');
        $view->assertSee('000000');
    }

    /** @test */
    public function it_renders_form_pin_with_custom_length()
    {
        $view = $this->blade('<x-form-pin name="pin" :length="4" />');

        $view->assertSee('name="pin"');
        $view->assertSee('length="4"');
    }

    /** @test */
    public function it_renders_form_pin_with_extra_attributes()
    {
        $view = $this->blade('<x-form-pin name="pin" :extra-attributes="[\'placeholder\' => \'Enter code\']" />');

        $view->assertSee('name="pin"');
        $view->assertSee('extraAttributes');
    }

    /** @test */
    public function it_renders_form_pin_with_custom_class()
    {
        $view = $this->blade('<x-form-pin name="pin" class="custom-pin" />');

        $view->assertSee('name="pin"');
        $view->assertSee('class="custom-pin');
    }

    /** @test */
    public function it_renders_form_pin_with_custom_id()
    {
        $view = $this->blade('<x-form-pin name="pin" id="pin-input" />');

        $view->assertSee('name="pin"');
        $view->assertSee('id="pin-input"');
    }

    /** @test */
    public function it_renders_form_pin_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-pin name="pin" disabled />');

        $view->assertSee('name="pin"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_pin_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-pin name="pin" readonly />');

        $view->assertSee('name="pin"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_pin_with_required_attribute()
    {
        $view = $this->blade('<x-form-pin name="pin" required />');

        $view->assertSee('name="pin"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_pin_with_title_attribute()
    {
        $view = $this->blade('<x-form-pin name="pin" title="Enter 6-digit code" />');

        $view->assertSee('name="pin"');
        $view->assertSee('title="Enter 6-digit code"');
    }

    /** @test */
    public function it_renders_form_pin_with_form_group()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('form-group');
    }

    /** @test */
    public function it_renders_form_pin_with_form_label()
    {
        $view = $this->blade('<x-form-pin name="pin" label="Enter PIN" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Enter PIN');
    }

    /** @test */
    public function it_renders_form_pin_with_required_check()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('isRequired()');
    }

    /** @test */
    public function it_renders_form_pin_with_id_attribute()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('id()');
    }

    /** @test */
    public function it_renders_form_pin_with_title_attribute_access()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('title');
        $view->assertSee('get(\'title\')');
    }

    /** @test */
    public function it_renders_form_pin_with_alpine_data()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('x-data');
        $view->assertSee('value:');
    }

    /** @test */
    public function it_renders_form_pin_with_value_property()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('value:');
        $view->assertSee('$value');
    }

    /** @test */
    public function it_renders_form_pin_with_inputs_array()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('inputs: []');
    }

    /** @test */
    public function it_renders_form_pin_with_init_function()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('init()');
    }

    /** @test */
    public function it_renders_form_pin_with_copy_paste_event()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('addEventListener');
        $view->assertSee('paste');
    }

    /** @test */
    public function it_renders_form_pin_with_pin_id_reference()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('pin{{ $id() }}');
    }

    /** @test */
    public function it_renders_form_pin_with_clipboard_data()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('clipboardData');
        $view->assertSee('getData');
    }

    /** @test */
    public function it_renders_form_pin_with_paste_loop()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('for (var i = 0; i <');
        $view->assertSee('length');
    }

    /** @test */
    public function it_renders_form_pin_with_input_assignment()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('this.inputs[i] = paste[i]');
    }

    /** @test */
    public function it_renders_form_pin_with_prevent_default()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('preventDefault');
    }

    /** @test */
    public function it_renders_form_pin_with_handle_pin_call()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('this.handlePin()');
    }

    /** @test */
    public function it_renders_form_pin_with_next_function()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('next(el)');
    }

    /** @test */
    public function it_renders_form_pin_with_next_function_call()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('this.handlePin()');
    }

    /** @test */
    public function it_renders_form_pin_with_value_length_check()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('el.value.length == 0');
    }

    /** @test */
    public function it_renders_form_pin_with_next_element_focus()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('nextElementSibling');
        $view->assertSee('focus()');
    }

    /** @test */
    public function it_renders_form_pin_with_next_element_select()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('select()');
    }

    /** @test */
    public function it_renders_form_pin_with_remove_function()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('remove(el, i)');
    }

    /** @test */
    public function it_renders_form_pin_with_input_clear()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('this.inputs[i] = \'\'');
    }

    /** @test */
    public function it_renders_form_pin_with_remove_handle_pin()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('this.handlePin()');
    }

    /** @test */
    public function it_renders_form_pin_with_previous_element_focus()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('previousElementSibling');
        $view->assertSee('focus()');
    }

    /** @test */
    public function it_renders_form_pin_with_previous_element_select()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('select()');
    }

    /** @test */
    public function it_renders_form_pin_with_handle_pin_function()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('handlePin()');
    }

    /** @test */
    public function it_renders_form_pin_with_value_join()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('this.inputs.join(\'\')');
    }

    /** @test */
    public function it_renders_form_pin_with_source_reference()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('$refs.source.value');
    }

    /** @test */
    public function it_renders_form_pin_with_row_layout()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('row g-2');
    }

    /** @test */
    public function it_renders_form_pin_with_pt_2_class()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('pt-2');
    }

    /** @test */
    public function it_renders_form_pin_with_flexbox_classes()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('d-flex');
        $view->assertSee('align-content-center');
        $view->assertSee('justify-content-center');
    }

    /** @test */
    public function it_renders_form_pin_with_pin_container_id()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('id="pin{{ $id }}"');
    }

    /** @test */
    public function it_renders_form_pin_with_for_loop()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('@for ($i = 0; $i < $length; $i++)');
        $view->assertSee('@endfor');
    }

    /** @test */
    public function it_renders_form_pin_with_individual_inputs()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('<input type="text"');
    }

    /** @test */
    public function it_renders_form_pin_with_input_id_format()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('id="{{ $id() }}-pin-{{ $i }}"');
    }

    /** @test */
    public function it_renders_form_pin_with_form_control_classes()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('form-control');
        $view->assertSee('form-control-lg');
    }

    /** @test */
    public function it_renders_form_pin_with_width_classes()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('w-14');
    }

    /** @test */
    public function it_renders_form_pin_with_margin_classes()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('mr-1');
    }

    /** @test */
    public function it_renders_form_pin_with_inline_class()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('inline');
    }

    /** @test */
    public function it_renders_form_pin_with_text_center_class()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('text-center');
    }

    /** @test */
    public function it_renders_form_pin_with_py_3_class()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('py-3');
    }

    /** @test */
    public function it_renders_form_pin_with_maxlength_attribute()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('maxlength="1"');
    }

    /** @test */
    public function it_renders_form_pin_with_x_model_binding()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('x-model="inputs[');
    }

    /** @test */
    public function it_renders_form_pin_with_space_prevention()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('@keydown.space.prevent');
    }

    /** @test */
    public function it_renders_form_pin_with_backspace_handling()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('@keydown.backspace.prevent="remove($event.target,');
    }

    /** @test */
    public function it_renders_form_pin_with_input_event()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('@input="next($event.target)"');
    }

    /** @test */
    public function it_renders_form_pin_with_hidden_input()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('type="hidden"');
        $view->assertSee('name="pin"');
    }

    /** @test */
    public function it_renders_form_pin_with_source_reference_attribute()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('x-ref="source"');
    }

    /** @test */
    public function it_renders_form_pin_with_attributes_merge()
    {
        $view = $this->blade('<x-form_pin name="pin" />');

        $view->assertSee('$attributes');
    }

    /** @test */
    public function it_renders_form_pin_with_livewire_integration()
    {
        $view = $this->blade('<x-form-pin name="pin" wire:model="verificationCode" />');

        $view->assertSee('name="pin"');
        $view->assertSee('wire:model="verificationCode"');
    }

    /** @test */
    public function it_renders_form_pin_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-pin name="pin" data-turbo="true" />');

        $view->assertSee('name="pin"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_pin_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-pin name="pin" aria-label="PIN input" />');

        $view->assertSee('name="pin"');
        $view->assertSee('aria-label="PIN input"');
    }

    /** @test */
    public function it_renders_form_pin_with_data_attributes()
    {
        $view = $this->blade('<x-form-pin name="pin" data-test="pin-component" />');

        $view->assertSee('name="pin"');
        $view->assertSee('data-test="pin-component"');
    }

    /** @test */
    public function it_renders_form_pin_with_default_length()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('length = 6');
    }

    /** @test */
    public function it_renders_form_pin_with_custom_length_rendering()
    {
        $view = $this->blade('<x-form-pin name="pin" :length="4" />');

        $view->assertSee('length="4"');
    }

    /** @test */
    public function it_renders_form_pin_with_extra_attributes_default()
    {
        $view = $this->blade('<x-form-pin name="pin" />');

        $view->assertSee('extraAttributes = []');
    }

    /** @test */
    public function it_renders_form_pin_with_extra_attributes_rendering()
    {
        $view = $this->blade('<x-form_pin name="pin" :extra-attributes="[\'placeholder\' => \'Enter code\']" />');

        $view->assertSee('extraAttributes');
    }
}
