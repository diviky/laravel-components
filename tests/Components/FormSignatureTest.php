<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormSignatureTest extends TestCase
{
    /** @test */
    public function it_renders_form_signature_with_basic_attributes()
    {
        $view = $this->blade('<x-form-signature name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-signature');
    }

    /** @test */
    public function it_renders_form_signature_with_label()
    {
        $view = $this->blade('<x-form-signature name="signature" label="Digital Signature" />');

        $view->assertSee('name="signature"');
        $view->assertSee('Digital Signature');
    }

    /** @test */
    public function it_renders_form_signature_with_value()
    {
        $view = $this->blade('<x-form-signature name="signature" value="data:image/png;base64,..." />');

        $view->assertSee('name="signature"');
        $view->assertSee('data:image/png;base64,...');
    }

    /** @test */
    public function it_renders_form_signature_with_default_value()
    {
        $view = $this->blade('<x-form-signature name="signature" :default="\'stored_signature.png\'" />');

        $view->assertSee('name="signature"');
        $view->assertSee('stored_signature.png');
    }

    /** @test */
    public function it_renders_form_signature_with_language()
    {
        $view = $this->blade('<x-form-signature name="signature" language="en" />');

        $view->assertSee('name="signature[en]"');
    }

    /** @test */
    public function it_renders_form_signature_with_height()
    {
        $view = $this->blade('<x-form-signature name="signature" height="400" />');

        $view->assertSee('name="signature"');
        $view->assertSee('height="400"');
    }

    /** @test */
    public function it_renders_form_signature_with_config()
    {
        $config = ['penColor' => '#007bff'];
        $view = $this->blade('<x-form-signature name="signature" :config="$config" />', ['config' => $config]);

        $view->assertSee('name="signature"');
        $view->assertSee('config');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_text()
    {
        $view = $this->blade('<x-form-signature name="signature" clear-text="Erase Signature" />');

        $view->assertSee('name="signature"');
        $view->assertSee('Erase Signature');
    }

    /** @test */
    public function it_renders_form_signature_with_custom_class()
    {
        $view = $this->blade('<x-form-signature name="signature" class="custom-signature" />');

        $view->assertSee('name="signature"');
        $view->assertSee('class="custom-signature');
    }

    /** @test */
    public function it_renders_form_signature_with_custom_id()
    {
        $view = $this->blade('<x-form-signature name="signature" id="signature-input" />');

        $view->assertSee('name="signature"');
        $view->assertSee('id="signature-input"');
    }

    /** @test */
    public function it_renders_form_signature_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-signature name="signature" disabled />');

        $view->assertSee('name="signature"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_signature_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-signature name="signature" readonly />');

        $view->assertSee('name="signature"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_signature_with_required_attribute()
    {
        $view = $this->blade('<x-form-signature name="signature" required />');

        $view->assertSee('name="signature"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_signature_with_icon()
    {
        $view = $this->blade('<x-form-signature name="signature" icon="signature" />');

        $view->assertSee('name="signature"');
        $view->assertSee('icon="signature"');
    }

    /** @test */
    public function it_renders_form_signature_with_help_slot()
    {
        $view = $this->blade('
            <x-form-signature name="signature">
                <x-slot:help>
                    Please sign in the box above using your mouse or touch device
                </x-slot:help>
            </x-form-signature>
        ');

        $view->assertSee('name="signature"');
        $view->assertSee('Please sign in the box above using your mouse or touch device');
    }

    /** @test */
    public function it_renders_form_signature_with_alpine_data()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('x-data');
        $view->assertSee('value:');
    }

    /** @test */
    public function it_renders_form_signature_with_alpine_properties()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('signature: null');
        $view->assertSee('isRequired:');
    }

    /** @test */
    public function it_renders_form_signature_with_value_property()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('value:');
        $view->assertSee('json_encode($value)');
    }

    /** @test */
    public function it_renders_form_signature_with_init_function()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('init()');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_element()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('getElementById');
        $view->assertSee('signature');
    }

    /** @test */
    public function it_renders_form_signature_with_signature_pad()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('new SignaturePad');
        $view->assertSee('setup()');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_resize()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('devicePixelRatio');
        $view->assertSee('offsetWidth');
        $view->assertSee('offsetHeight');
    }

    /** @test */
    public function it_renders_form_signature_with_ratio_calculation()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('Math.max');
        $view->assertSee('ratio');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_scaling()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('getContext');
        $view->assertSee('scale');
    }

    /** @test */
    public function it_renders_form_signature_with_data_restoration()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('fromData');
        $view->assertSee('toData');
    }

    /** @test */
    public function it_renders_form_signature_with_theme_detection()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('getPreferredTheme');
        $view->assertSee('dark');
    }

    /** @test */
    public function it_renders_form_signature_with_pen_color_setting()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('penColor');
        $view->assertSee('white');
        $view->assertSee('black');
    }

    /** @test */
    public function it_renders_form_signature_with_event_listener()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('addEventListener');
        $view->assertSee('endStroke');
    }

    /** @test */
    public function it_renders_form_signature_with_extract_function()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('extract()');
        $view->assertSee('this.extract()');
    }

    /** @test */
    public function it_renders_form_signature_with_data_extraction()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('toDataURL');
        $view->assertSee('this.value =');
    }

    /** @test */
    public function it_renders_form_signature_with_theme_functions()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('getStoredTheme()');
        $view->assertSee('getPreferredTheme()');
    }

    /** @test */
    public function it_renders_form_signature_with_local_storage()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('localStorage.getItem');
        $view->assertSee('appearance');
    }

    /** @test */
    public function it_renders_form_signature_with_media_query()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('matchMedia');
        $view->assertSee('prefers-color-scheme');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_function()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('clear()');
        $view->assertSee('this.signature.clear()');
    }

    /** @test */
    public function it_renders_form_signature_with_signature_clear()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('clear()');
        $view->assertSee('this.extract()');
    }

    /** @test */
    public function it_renders_form_signature_with_value_reset()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('this.value = \'\'');
    }

    /** @test */
    public function it_renders_form_signature_with_wire_ignore()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('wire:ignore');
    }

    /** @test */
    public function it_renders_form_signature_with_select_none()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('select-none');
        $view->assertSee('touch-none');
    }

    /** @test */
    public function it_renders_form_signature_with_form_group()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('form-group');
        $view->assertSee('h-auto');
    }

    /** @test */
    public function it_renders_form_signature_with_form_label()
    {
        $view = $this->blade('<x-form-signature name="signature" label="Digital Signature" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Digital Signature');
    }

    /** @test */
    public function it_renders_form_signature_with_required_check()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('isRequired()');
    }

    /** @test */
    public function it_renders_form_signature_with_id_attribute()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('id()');
    }

    /** @test */
    public function it_renders_form_signature_with_form_control()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('form-control');
        $view->assertSee('relative');
    }

    /** @test */
    public function it_renders_form_signature_with_height_auto()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('h-auto');
    }

    /** @test */
    public function it_renders_form_signature_with_border_styling()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('border border-dashed');
        $view->assertSee('isReadonly()');
    }

    /** @test */
    public function it_renders_form_signature_with_error_styling()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('input-error');
        $view->assertSee('hasError');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_element_rendering()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('<canvas');
        $view->assertSee('signature');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_id()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('id="');
        $view->assertSee('signature"');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_height()
    {
        $view = $this->blade('<x-form-signature name="signature" height="300" />');

        $view->assertSee('height="300"');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_classes()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('rounded-lg');
        $view->assertSee('block');
        $view->assertSee('w-full');
    }

    /** @test */
    public function it_renders_form_signature_with_canvas_styling()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('select-none');
        $view->assertSee('touch-none');
        $view->assertSee('text-white');
    }

    /** @test */
    public function it_renders_form_signature_with_hidden_input()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('type="hidden"');
        $view->assertSee('name="signature"');
    }

    /** @test */
    public function it_renders_form_signature_with_wire_attributes()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('wire()');
    }

    /** @test */
    public function it_renders_form_signature_with_required_binding()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee(':required="isRequired"');
    }

    /** @test */
    public function it_renders_form_signature_with_value_binding()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('x-model="value"');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_button()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('CLEAR BUTTON');
        $view->assertSee('absolute end-2 top-1/2');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_button_positioning()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('-translate-y-1/2');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_icon()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('<x-icon');
        $view->assertSee('name="backspace"');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_title()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('clearText');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_click()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('@click="clear"');
    }

    /** @test */
    public function it_renders_form_signature_with_clear_styling()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('btn btn-link');
        $view->assertSee('text-neutral');
    }

    /** @test */
    public function it_renders_form_signature_with_form_errors()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('<x-form-errors');
        $view->assertSee('name="$name"');
    }

    /** @test */
    public function it_renders_form_signature_with_help_component()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('<x-help>');
        $view->assertSee('$help ?? $attributes->get(\'help\')');
    }

    /** @test */
    public function it_renders_form_signature_with_livewire_integration()
    {
        $view = $this->blade('<x-form-signature name="signature" wire:model="signatureData" />');

        $view->assertSee('name="signature"');
        $view->assertSee('wire:model="signatureData"');
    }

    /** @test */
    public function it_renders_form_signature_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-signature name="signature" data-turbo="true" />');

        $view->assertSee('name="signature"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_signature_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-signature name="signature" aria-label="Signature capture" />');

        $view->assertSee('name="signature"');
        $view->assertSee('aria-label="Signature capture"');
    }

    /** @test */
    public function it_renders_form_signature_with_data_attributes()
    {
        $view = $this->blade('<x-form-signature name="signature" data-test="signature-component" />');

        $view->assertSee('name="signature"');
        $view->assertSee('data-test="signature-component"');
    }

    /** @test */
    public function it_renders_form_signature_with_setup_function()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('setup()');
    }

    /** @test */
    public function it_renders_form_signature_with_config_processing()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('Arr::wrap');
        $view->assertSee('config');
    }

    /** @test */
    public function it_renders_form_signature_with_default_config()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('array_merge');
        $view->assertSee('penColor');
    }

    /** @test */
    public function it_renders_form_signature_with_pen_color_variable()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('var(--tblr-body-color)');
    }

    /** @test */
    public function it_renders_form_signature_with_json_encoding()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('json_encode');
    }

    /** @test */
    public function it_renders_form_signature_with_string_casting()
    {
        $view = $this->blade('<x-form-signature name="signature" />');

        $view->assertSee('(string)');
    }
}
