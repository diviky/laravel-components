<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormFileTest extends TestCase
{
    /** @test */
    public function it_renders_form_file_with_basic_attributes()
    {
        $view = $this->blade('<x-form-file name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-file');
    }

    /** @test */
    public function it_renders_form_file_with_label()
    {
        $view = $this->blade('<x-form-file name="file" label="Upload File" />');

        $view->assertSee('name="file"');
        $view->assertSee('Upload File');
    }

    /** @test */
    public function it_renders_form_file_with_value()
    {
        $view = $this->blade('<x-form-file name="file" value="document.pdf" />');

        $view->assertSee('name="file"');
        $view->assertSee('document.pdf');
    }

    /** @test */
    public function it_renders_form_file_with_default_value()
    {
        $view = $this->blade('<x-form-file name="file" :default="\'template.docx\'" />');

        $view->assertSee('name="file"');
        $view->assertSee('template.docx');
    }

    /** @test */
    public function it_renders_form_file_with_type()
    {
        $view = $this->blade('<x-form-file name="file" type="file" />');

        $view->assertSee('name="file"');
        $view->assertSee('type="file"');
    }

    /** @test */
    public function it_renders_form_file_with_size()
    {
        $view = $this->blade('<x-form-file name="file" size="10MB" />');

        $view->assertSee('name="file"');
        $view->assertSee('size="10MB"');
    }

    /** @test */
    public function it_renders_form_file_with_language()
    {
        $view = $this->blade('<x-form-file name="file" language="en" />');

        $view->assertSee('name="file[en]"');
    }

    /** @test */
    public function it_renders_form_file_with_accept()
    {
        $view = $this->blade('<x-form-file name="file" accept=".pdf,.doc" />');

        $view->assertSee('name="file"');
        $view->assertSee('accept=".pdf,.doc"');
    }

    /** @test */
    public function it_renders_form_file_with_pond_enabled()
    {
        $view = $this->blade('<x-form-file name="file" :pond="true" />');

        $view->assertSee('name="file"');
        $view->assertSee('data-filepond');
    }

    /** @test */
    public function it_renders_form_file_with_pond_disabled()
    {
        $view = $this->blade('<x-form-file name="file" :pond="false" />');

        $view->assertSee('name="file"');
        $view->assertSee('pond = false');
    }

    /** @test */
    public function it_renders_form_file_with_settings()
    {
        $settings = ['maxFiles' => 5];
        $view = $this->blade('<x-form-file name="file" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="file"');
        $view->assertSee('settings');
    }

    /** @test */
    public function it_renders_form_file_with_custom_class()
    {
        $view = $this->blade('<x-form-file name="file" class="custom-file" />');

        $view->assertSee('name="file"');
        $view->assertSee('class="custom-file');
    }

    /** @test */
    public function it_renders_form_file_with_custom_id()
    {
        $view = $this->blade('<x-form-file name="file" id="file-input" />');

        $view->assertSee('name="file"');
        $view->assertSee('id="file-input"');
    }

    /** @test */
    public function it_renders_form_file_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-file name="file" disabled />');

        $view->assertSee('name="file"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_file_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-file name="file" readonly />');

        $view->assertSee('name="file"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_file_with_required_attribute()
    {
        $view = $this->blade('<x-form-file name="file" required />');

        $view->assertSee('name="file"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_file_with_multiple_attribute()
    {
        $view = $this->blade('<x-form-file name="file" multiple />');

        $view->assertSee('name="file"');
        $view->assertSee('multiple');
    }

    /** @test */
    public function it_renders_form_file_with_max_attribute()
    {
        $view = $this->blade('<x-form-file name="file" max="5MB" />');

        $view->assertSee('name="file"');
        $view->assertSee('max="5MB"');
    }

    /** @test */
    public function it_renders_form_file_with_help_slot()
    {
        $view = $this->blade('
            <x-form-file name="file">
                <x-slot:help>
                    Maximum file size: 10MB. Supported formats: PDF, DOC, DOCX
                </x-slot:help>
            </x-form-file>
        ');

        $view->assertSee('name="file"');
        $view->assertSee('Maximum file size: 10MB. Supported formats: PDF, DOC, DOCX');
    }

    /** @test */
    public function it_renders_form_file_with_form_group()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('form-group');
    }

    /** @test */
    public function it_renders_form_file_with_form_label()
    {
        $view = $this->blade('<x-form-file name="file" label="Upload File" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Upload File');
    }

    /** @test */
    public function it_renders_form_file_with_required_check()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('isRequired()');
    }

    /** @test */
    public function it_renders_form_file_with_id_attribute()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('id()');
    }

    /** @test */
    public function it_renders_form_file_with_file_input()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('type="file"');
        $view->assertSee('name="file"');
    }

    /** @test */
    public function it_renders_form_file_with_form_control_class()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('form-control');
    }

    /** @test */
    public function it_renders_form_file_with_attributes_except()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('except([\'extra-attributes\'])');
    }

    /** @test */
    public function it_renders_form_file_with_class_merge()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('class([\'form-control\'])');
    }

    /** @test */
    public function it_renders_form_file_with_accept_merge()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('merge([\'accept\' => $accept])');
    }

    /** @test */
    public function it_renders_form_file_with_extra_attributes()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('$extraAttributes');
    }

    /** @test */
    public function it_renders_form_file_with_wire_function()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('wire()');
    }

    /** @test */
    public function it_renders_form_file_with_form_errors()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('<x-form-errors');
        $view->assertSee('name="$name"');
    }

    /** @test */
    public function it_renders_form_file_with_help_component()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('<x-help>');
        $view->assertSee('$help ?? $attributes->get(\'help\')');
    }

    /** @test */
    public function it_renders_form_file_with_livewire_integration()
    {
        $view = $this->blade('<x-form-file name="file" wire:model="selectedFile" />');

        $view->assertSee('name="file"');
        $view->assertSee('wire:model="selectedFile"');
    }

    /** @test */
    public function it_renders_form_file_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-file name="file" data-turbo="true" />');

        $view->assertSee('name="file"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_file_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-file name="file" aria-label="File upload" />');

        $view->assertSee('name="file"');
        $view->assertSee('aria-label="File upload"');
    }

    /** @test */
    public function it_renders_form_file_with_data_attributes()
    {
        $view = $this->blade('<x-form-file name="file" data-test="file-component" />');

        $view->assertSee('name="file"');
        $view->assertSee('data-test="file-component"');
    }

    /** @test */
    public function it_renders_form_file_with_default_accept()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('accept = \'*.*\'');
    }

    /** @test */
    public function it_renders_form_file_with_custom_accept_rendering()
    {
        $view = $this->blade('<x-form_file name="file" accept=".pdf,.doc" />');

        $view->assertSee('accept=".pdf,.doc"');
    }

    /** @test */
    public function it_renders_form_file_with_default_pond()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('pond = true');
    }

    /** @test */
    public function it_renders_form_file_with_custom_pond_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :pond="false" />');

        $view->assertSee('pond = false');
    }

    /** @test */
    public function it_renders_form_file_with_default_settings()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('settings = []');
    }

    /** @test */
    public function it_renders_form_file_with_custom_settings_rendering()
    {
        $settings = ['maxFiles' => 5];
        $view = $this->blade('<x-form_file name="file" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('settings');
    }

    /** @test */
    public function it_renders_form_file_with_default_type()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('type = \'text\'');
    }

    /** @test */
    public function it_renders_form_file_with_custom_type_rendering()
    {
        $view = $this->blade('<x-form_file name="file" type="file" />');

        $view->assertSee('type="file"');
    }

    /** @test */
    public function it_renders_form_file_with_default_size()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('size = \'\'');
    }

    /** @test */
    public function it_renders_form_file_with_custom_size_rendering()
    {
        $view = $this->blade('<x-form_file name="file" size="10MB" />');

        $view->assertSee('size="10MB"');
    }

    /** @test */
    public function it_renders_form_file_with_default_language()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('language = null');
    }

    /** @test */
    public function it_renders_form_file_with_custom_language_rendering()
    {
        $view = $this->blade('<x-form_file name="file" language="en" />');

        $view->assertSee('name="file[en]"');
    }

    /** @test */
    public function it_renders_form_file_with_default_floating()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('floating = false');
    }

    /** @test */
    public function it_renders_form_file_with_custom_floating_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :floating="true" />');

        $view->assertSee('floating = true');
    }

    /** @test */
    public function it_renders_form_file_with_default_inline()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('inline = false');
    }

    /** @test */
    public function it_renders_form_file_with_custom_inline_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :inline="true" />');

        $view->assertSee('inline = true');
    }

    /** @test */
    public function it_renders_form_file_with_default_show_errors()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('showErrors = true');
    }

    /** @test */
    public function it_renders_form_file_with_custom_show_errors_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :show-errors="false" />');

        $view->assertSee('showErrors = false');
    }

    /** @test */
    public function it_renders_form_file_with_default_bind()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('bind = null');
    }

    /** @test */
    public function it_renders_form_file_with_custom_bind_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :bind="$user" />', ['user' => (object)['id' => 1]]);

        $view->assertSee('bind');
    }

    /** @test */
    public function it_renders_form_file_with_default_default()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('default = null');
    }

    /** @test */
    public function it_renders_form_file_with_custom_default_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :default="\'template.docx\'" />');

        $view->assertSee('template.docx');
    }

    /** @test */
    public function it_renders_form_file_with_default_extra_attributes()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('extraAttributes = null');
    }

    /** @test */
    public function it_renders_form_file_with_custom_extra_attributes_rendering()
    {
        $view = $this->blade('<x-form_file name="file" :extra-attributes="[\'placeholder\' => \'Select file\']" />');

        $view->assertSee('extraAttributes');
    }

    /** @test */
    public function it_renders_form_file_with_convert_to_mime_types_method()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('convertToMimeTypes');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_conversion()
    {
        $view = $this->blade('<x-form-file name="file" />');

        $view->assertSee('convertToMimeTypes');
        $view->assertSee('accept');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_default()
    {
        $view = $this->blade('<x-form_file name="file" accept="*.*" />');

        $view->assertSee('accept="*.*"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_wildcard()
    {
        $view = $this->blade('<x-form_file name="file" accept="*" />');

        $view->assertSee('accept="*"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_empty()
    {
        $view = $this->blade('<x-form_file name="file" accept="" />');

        $view->assertSee('accept=""');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_extensions()
    {
        $view = $this->blade('<x-form_file name="file" accept=".pdf,.doc" />');

        $view->assertSee('accept=".pdf,.doc"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_csv_special()
    {
        $view = $this->blade('<x-form_file name="file" accept=".csv" />');

        $view->assertSee('accept=".csv"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_processing()
    {
        $view = $this->blade('<x-form_file name="file" accept=".pdf,.doc" />');

        $view->assertSee('accept=".pdf,.doc"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_unique()
    {
        $view = $this->blade('<x-form_file name="file" accept=".pdf,.doc" />');

        $view->assertSee('accept=".pdf,.doc"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_collapse()
    {
        $view = $this->blade('<x-form_file name="file" accept=".pdf,.doc" />');

        $view->assertSee('accept=".pdf,.doc"');
    }

    /** @test */
    public function it_renders_form_file_with_mime_types_implode()
    {
        $view = $this->blade('<x-form_file name="file" accept=".pdf,.doc" />');

        $view->assertSee('accept=".pdf,.doc"');
    }
}
