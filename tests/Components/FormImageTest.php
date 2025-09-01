<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormImageTest extends TestCase
{
    /** @test */
    public function it_renders_form_image_with_basic_attributes()
    {
        $view = $this->blade('<x-form-image name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-image');
    }

    /** @test */
    public function it_renders_form_image_with_label()
    {
        $view = $this->blade('<x-form-image name="image" label="Upload Image" />');

        $view->assertSee('name="image"');
        $view->assertSee('Upload Image');
    }

    /** @test */
    public function it_renders_form_image_with_value()
    {
        $view = $this->blade('<x-form-image name="image" value="test-image.jpg" />');

        $view->assertSee('name="image"');
        $view->assertSee('test-image.jpg');
    }

    /** @test */
    public function it_renders_form_image_with_default_value()
    {
        $view = $this->blade('<x-form-image name="image" :default="\'default.jpg\'" />');

        $view->assertSee('name="image"');
        $view->assertSee('default.jpg');
    }

    /** @test */
    public function it_renders_form_image_with_language()
    {
        $view = $this->blade('<x-form-image name="image" language="en" />');

        $view->assertSee('name="image[en]"');
    }

    /** @test */
    public function it_renders_form_image_with_hide_progress()
    {
        $view = $this->blade('<x-form-image name="image" :hide-progress="true" />');

        $view->assertSee('name="image"');
        $view->assertSee('hideProgress');
    }

    /** @test */
    public function it_renders_form_image_with_crop_after_change()
    {
        $view = $this->blade('<x-form-image name="image" :crop-after-change="true" />');

        $view->assertSee('name="image"');
        $view->assertSee('cropAfterChange');
    }

    /** @test */
    public function it_renders_form_image_with_change_text()
    {
        $view = $this->blade('<x-form-image name="image" change-text="Update Image" />');

        $view->assertSee('name="image"');
        $view->assertSee('Update Image');
    }

    /** @test */
    public function it_renders_form_image_with_crop_title_text()
    {
        $view = $this->blade('<x-form-image name="image" crop-title-text="Adjust Image" />');

        $view->assertSee('name="image"');
        $view->assertSee('Adjust Image');
    }

    /** @test */
    public function it_renders_form_image_with_crop_cancel_text()
    {
        $view = $this->blade('<x-form-image name="image" crop-cancel-text="Discard" />');

        $view->assertSee('name="image"');
        $view->assertSee('Discard');
    }

    /** @test */
    public function it_renders_form_image_with_crop_save_text()
    {
        $view = $this->blade('<x-form-image name="image" crop-save-text="Apply Changes" />');

        $view->assertSee('name="image"');
        $view->assertSee('Apply Changes');
    }

    /** @test */
    public function it_renders_form_image_with_crop_config()
    {
        $cropConfig = ['aspectRatio' => 16 / 9];
        $view = $this->blade('<x-form-image name="image" :crop-config="$cropConfig" />', ['cropConfig' => $cropConfig]);

        $view->assertSee('name="image"');
        $view->assertSee('cropConfig');
    }

    /** @test */
    public function it_renders_form_image_with_custom_class()
    {
        $view = $this->blade('<x-form-image name="image" class="custom-image" />');

        $view->assertSee('name="image"');
        $view->assertSee('class="custom-image');
    }

    /** @test */
    public function it_renders_form_image_with_custom_id()
    {
        $view = $this->blade('<x-form-image name="image" id="image-input" />');

        $view->assertSee('name="image"');
        $view->assertSee('id="image-input"');
    }

    /** @test */
    public function it_renders_form_image_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-image name="image" disabled />');

        $view->assertSee('name="image"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_image_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-image name="image" readonly />');

        $view->assertSee('name="image"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_image_with_required_attribute()
    {
        $view = $this->blade('<x-form-image name="image" required />');

        $view->assertSee('name="image"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_image_with_accept_attribute()
    {
        $view = $this->blade('<x-form-image name="image" accept="image/jpeg,image/png" />');

        $view->assertSee('name="image"');
        $view->assertSee('accept="image/jpeg,image/png"');
    }

    /** @test */
    public function it_renders_form_image_with_slot()
    {
        $view = $this->blade('<x-form-image name="image">Preview content</x-form-image>');

        $view->assertSee('name="image"');
        $view->assertSee('Preview content');
    }

    /** @test */
    public function it_renders_form_image_with_help_slot()
    {
        $view = $this->blade('
            <x-form-image name="image">
                <x-slot:help>
                    Supported formats: JPG, PNG, GIF
                </x-slot:help>
            </x-form-image>
        ');

        $view->assertSee('name="image"');
        $view->assertSee('Supported formats: JPG, PNG, GIF');
    }

    /** @test */
    public function it_renders_form_image_with_alpine_data()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('x-data');
        $view->assertSee('progress: 0');
    }

    /** @test */
    public function it_renders_form_image_with_alpine_properties()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('cropper: null');
        $view->assertSee('justCropped: false');
        $view->assertSee('fileChanged: false');
    }

    /** @test */
    public function it_renders_form_image_with_image_preview()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('imagePreview: null');
        $view->assertSee('imageCrop: null');
        $view->assertSee('originalImageUrl: null');
    }

    /** @test */
    public function it_renders_form_image_with_crop_after_change_property()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('cropAfterChange');
    }

    /** @test */
    public function it_renders_form_image_with_file_property()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('file:');
    }

    /** @test */
    public function it_renders_form_image_with_init_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('init()');
    }

    /** @test */
    public function it_renders_form_image_with_image_preview_reference()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.$refs.preview');
        $view->assertSee('querySelector(\'img\')');
    }

    /** @test */
    public function it_renders_form_image_with_image_crop_reference()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.$refs.crop');
    }

    /** @test */
    public function it_renders_form_image_with_original_image_url()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.originalImageUrl');
    }

    /** @test */
    public function it_renders_form_image_with_progress_watcher()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('$watch(\'progress\'');
        $view->assertSee('value == 100');
    }

    /** @test */
    public function it_renders_form_image_with_crop_condition()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.cropAfterChange');
        $view->assertSee('!this.justCropped');
    }

    /** @test */
    public function it_renders_form_image_with_processing_computed()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('get processing()');
        $view->assertSee('this.progress > 0 && this.progress < 100');
    }

    /** @test */
    public function it_renders_form_image_with_close_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('close()');
        $view->assertSee('$refs.componentCrop.hide()');
    }

    /** @test */
    public function it_renders_form_image_with_cropper_destroy()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.cropper?.destroy()');
    }

    /** @test */
    public function it_renders_form_image_with_change_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('change()');
        $view->assertSee('this.processing');
    }

    /** @test */
    public function it_renders_form_image_with_file_click()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.$refs.file.click()');
    }

    /** @test */
    public function it_renders_form_image_with_refresh_image_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('refreshImage()');
        $view->assertSee('this.progress = 1');
    }

    /** @test */
    public function it_renders_form_image_with_just_cropped_reset()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.justCropped = false');
    }

    /** @test */
    public function it_renders_form_image_with_file_url_creation()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('URL.createObjectURL');
        $view->assertSee('this.$refs.file.files[0]');
    }

    /** @test */
    public function it_renders_form_image_with_crop_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('crop()');
        $view->assertSee('$refs.componentCrop.show()');
    }

    /** @test */
    public function it_renders_form_image_with_cropper_creation()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('new Cropper');
        $view->assertSee('this.imageCrop');
    }

    /** @test */
    public function it_renders_form_image_with_crop_setup()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('cropSetup()');
    }

    /** @test */
    public function it_renders_form_image_with_revert_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('revert()');
        $view->assertSee('$wire.$removeUpload');
    }

    /** @test */
    public function it_renders_form_image_with_livewire_remove_upload()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('livewire-file:');
        $view->assertSee('split(\'livewire-file:\').pop()');
    }

    /** @test */
    public function it_renders_form_image_with_save_function()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('async save()');
        $view->assertSee('$refs.componentCrop.hide()');
    }

    /** @test */
    public function it_renders_form_image_with_progress_reset()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.progress = 1');
        $view->assertSee('this.justCropped = true');
    }

    /** @test */
    public function it_renders_form_image_with_cropped_canvas()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('this.cropper.getCroppedCanvas()');
        $view->assertSee('toDataURL()');
    }

    /** @test */
    public function it_renders_form_image_with_livewire_upload_progress()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('@livewire-upload-progress');
        $view->assertSee('progress = $event.detail.progress');
    }

    /** @test */
    public function it_renders_form_image_with_class_attributes()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('whereStartsWith(\'class\')');
    }

    /** @test */
    public function it_renders_form_image_with_form_group()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('form-group');
    }

    /** @test */
    public function it_renders_form_image_with_form_label()
    {
        $view = $this->blade('<x-form-image name="image" label="Upload Image" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Upload Image');
    }

    /** @test */
    public function it_renders_form_image_with_required_check()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('isRequired()');
    }

    /** @test */
    public function it_renders_form_image_with_id_attribute()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('id()');
    }

    /** @test */
    public function it_renders_form_image_with_progress_bar()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('progress');
        $view->assertSee('progress-success');
    }

    /** @test */
    public function it_renders_form_image_with_progress_attributes()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee(':value="progress"');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_form_image_with_progress_styling()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('h-1');
        $view->assertSee('w-56');
    }

    /** @test */
    public function it_renders_form_image_with_file_input()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('type="file"');
        $view->assertSee('accept="image/*"');
    }

    /** @test */
    public function it_renders_form_image_with_file_reference()
    {
        $view = $this->blade('<x-form_image name="image" />');

        $view->assertSee('x-ref="file"');
    }

    /** @test */
    public function it_renders_form_image_with_change_event()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('@change="refreshImage()"');
    }

    /** @test */
    public function it_renders_form_image_with_form_file_class()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('form-file');
        $view->assertSee('form-control');
    }

    /** @test */
    public function it_renders_form_image_with_hide_class()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('hide');
        $view->assertSee('$slot->isNotEmpty()');
    }

    /** @test */
    public function it_renders_form_image_with_preview_area()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('x-ref="preview"');
        $view->assertSee('relative text-center');
    }

    /** @test */
    public function it_renders_form_image_with_click_handler()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('@click="change()"');
    }

    /** @test */
    public function it_renders_form_image_with_processing_class()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee(':class="processing && \'opacity-50 pointer-events-none\'"');
    }

    /** @test */
    public function it_renders_form_image_with_hover_effects()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('hover:scale-105');
        $view->assertSee('transition-all');
    }

    /** @test */
    public function it_renders_form_image_with_tooltip()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('changeText');
    }

    /** @test */
    public function it_renders_form_image_with_progress_overlay()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('radial-progress');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_form_image_with_progress_positioning()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('absolute top-5 start-5');
        $view->assertSee('bg-neutral');
    }

    /** @test */
    public function it_renders_form_image_with_progress_role()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('role="progressbar"');
    }

    /** @test */
    public function it_renders_form_image_with_crop_modal()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('x-ref="crop"');
        $view->assertSee('wire:ignore');
    }

    /** @test */
    public function it_renders_form_image_with_modal_component()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('<x-modal');
        $view->assertSee('componentCrop');
    }

    /** @test */
    public function it_renders_form_image_with_modal_id()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('componentCrop{{ $id() }}');
    }

    /** @test */
    public function it_renders_form_image_with_modal_title()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('cropTitleText');
    }

    /** @test */
    public function it_renders_form_image_with_modal_separator()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('separator');
    }

    /** @test */
    public function it_renders_form_image_with_modal_styling()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('backdrop-blur-xs');
        $view->assertSee('persistent');
    }

    /** @test */
    public function it_renders_form_image_with_escape_key_handler()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('@keydown.window.esc.prevent=""');
    }

    /** @test */
    public function it_renders_form_image_with_modal_image()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('<img src="" />');
    }

    /** @test */
    public function it_renders_form_image_with_modal_footer()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('<x-modal.footer>');
    }

    /** @test */
    public function it_renders_form_image_with_cancel_button()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('<x-form-button');
        $view->assertSee('cropCancelText');
        $view->assertSee('@click="close()"');
    }

    /** @test */
    public function it_renders_form_image_with_save_button()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('cropSaveText');
        $view->assertSee('@click="save()"');
        $view->assertSee('btn-primary');
    }

    /** @test */
    public function it_renders_form_image_with_save_button_disabled()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('::disabled="processing"');
    }

    /** @test */
    public function it_renders_form_image_with_form_errors()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('<x-form-errors');
        $view->assertSee('name="$name"');
    }

    /** @test */
    public function it_renders_form_image_with_help_component()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('<x-help>');
        $view->assertSee('$help ?? $attributes->get(\'help\')');
    }

    /** @test */
    public function it_renders_form_image_with_livewire_integration()
    {
        $view = $this->blade('<x-form-image name="image" wire:model="selectedImage" />');

        $view->assertSee('name="image"');
        $view->assertSee('wire:model="selectedImage"');
    }

    /** @test */
    public function it_renders_form_image_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-image name="image" data-turbo="true" />');

        $view->assertSee('name="image"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_image_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-image name="image" aria-label="Image upload" />');

        $view->assertSee('name="image"');
        $view->assertSee('aria-label="Image upload"');
    }

    /** @test */
    public function it_renders_form_image_with_data_attributes()
    {
        $view = $this->blade('<x-form-image name="image" data-test="image-component" />');

        $view->assertSee('name="image"');
        $view->assertSee('data-test="image-component"');
    }

    /** @test */
    public function it_renders_form_image_with_crop_config_processing()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('cropSetup()');
    }

    /** @test */
    public function it_renders_form_image_with_default_crop_settings()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('autoCropArea');
        $view->assertSee('viewMode');
        $view->assertSee('dragMode');
    }

    /** @test */
    public function it_renders_form_image_with_crop_config_merge()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('array_merge');
        $view->assertSee('cropConfig');
    }

    /** @test */
    public function it_renders_form_image_with_json_encoding()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('json_encode');
    }

    /** @test */
    public function it_renders_form_image_with_string_casting()
    {
        $view = $this->blade('<x-form-image name="image" />');

        $view->assertSee('(string)');
    }
}
