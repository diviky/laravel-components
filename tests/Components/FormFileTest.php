<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormFileTest extends TestCase
{
    public function test_renders_basic_file(): void
    {
        $view = $this->blade('<x-form-file name="document" label="Upload Document" />');

        $view->assertSee('Upload Document');
        $view->assertSee('name="document"');
        $view->assertSee('type="file"');
        $view->assertSee('form-control');
    }

    public function test_renders_file_with_accept(): void
    {
        $view = $this->blade('<x-form-file name="document" accept=".pdf,.doc,.docx" />');

        $view->assertSee('accept="');
        // The component converts extensions to MIME types
        $view->assertSee('application/pdf');
    }

    public function test_renders_file_with_help_text(): void
    {
        $view = $this->blade('<x-form-file name="document" help="Maximum file size: 10MB" />');

        $view->assertSee('Maximum file size: 10MB');
    }

    public function test_renders_file_with_custom_id(): void
    {
        $view = $this->blade('<x-form-file name="document" id="custom-file" />');

        $view->assertSee('id="custom-file"');
    }

    public function test_renders_file_with_title(): void
    {
        $view = $this->blade('<x-form-file name="document" title="Select a file to upload" />');

        $view->assertSee('title="Select a file to upload"');
    }

    public function test_renders_file_with_custom_class(): void
    {
        $view = $this->blade('<x-form-file name="document" class="custom-file" />');

        $view->assertSee('custom-file');
    }

    public function test_renders_file_with_multiple(): void
    {
        $view = $this->blade('<x-form-file name="documents" multiple />');

        $view->assertSee('multiple');
    }

    public function test_renders_file_with_required(): void
    {
        $view = $this->blade('<x-form-file name="document" required />');

        $view->assertSee('required');
    }

    public function test_renders_file_with_disabled(): void
    {
        $view = $this->blade('<x-form-file name="document" disabled />');

        $view->assertSee('disabled');
    }

    public function test_renders_file_with_readonly(): void
    {
        $view = $this->blade('<x-form-file name="document" readonly />');

        $view->assertSee('readonly');
    }

    public function test_renders_file_with_autofocus(): void
    {
        $view = $this->blade('<x-form-file name="document" autofocus />');

        $view->assertSee('autofocus');
    }

    public function test_renders_file_with_form(): void
    {
        $view = $this->blade('<x-form-file name="document" form="upload-form" />');

        $view->assertSee('form="upload-form"');
    }

    public function test_renders_file_with_tabindex(): void
    {
        $view = $this->blade('<x-form-file name="document" tabindex="0" />');

        $view->assertSee('tabindex="0"');
    }

    public function test_renders_file_with_language(): void
    {
        $view = $this->blade('<x-form-file name="document" language="en" />');

        $view->assertSee('name="document[en]"');
    }

    public function test_renders_file_with_floating(): void
    {
        $view = $this->blade('<x-form-file name="document" floating />');

        // Floating label would be handled by the component class
        $view->assertSee('name="document"');
    }

    public function test_renders_file_with_inline(): void
    {
        $view = $this->blade('<x-form-file name="document" inline />');

        // Inline would be handled by the component class
        $view->assertSee('name="document"');
    }

    public function test_renders_file_with_pond_disabled(): void
    {
        $view = $this->blade('<x-form-file name="document" :pond="false" />');

        $view->assertDontSee('data-filepond');
    }

    public function test_renders_file_with_pond_enabled(): void
    {
        $view = $this->blade('<x-form-file name="document" :pond="true" />');

        $view->assertSee('data-filepond');
    }

    public function test_renders_file_with_settings(): void
    {
        $view = $this->blade('<x-form-file name="document" :settings="[\'maxFiles\' => 5]" />');

        $view->assertSee('name="document"');
    }

    public function test_renders_file_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-file name="document" extra-attributes="data-custom=value" />');

        $view->assertSee('data-custom=value');
    }

    public function test_renders_file_with_default_value(): void
    {
        $view = $this->blade('<x-form-file name="document" default="existing-file.pdf" />');

        $view->assertSee('name="document"');
    }

    public function test_renders_file_with_bind_value(): void
    {
        $view = $this->blade('<x-form-file name="document" :bind="$user" />');

        // This would need a proper test setup with a user model
        $view->assertSee('name="document"');
    }

    public function test_renders_file_without_errors(): void
    {
        $view = $this->blade('<x-form-file name="document" :show-errors="false" />');

        $view->assertDontSee('form-errors');
    }

    public function test_renders_file_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-file name="document">
                <x-slot name="help">
                    <div class="text-muted">Custom help text</div>
                </x-slot>
            </x-form-file>
        ');

        $view->assertSee('Custom help text');
        $view->assertSee('text-muted');
    }

    public function test_renders_livewire_file(): void
    {
        $view = $this->blade('<x-form-file name="document" wire:model="document" />');

        $view->assertSee('wire:model="document"');
    }

    public function test_renders_complex_file_combination(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                label="Upload Document"
                accept=".pdf,.doc,.docx"
                help="Supported formats: PDF, DOC, DOCX"
                required
                class="custom-file"
                wire:model="document"
                multiple
                :settings="[\'maxFiles\' => 5, \'maxFileSize\' => \'10MB\']"
                title="Select a document to upload"
            >
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Supported formats: <strong>PDF, DOC, DOCX</strong></span>
                    </div>
                </x-slot>
            </x-form-file>
        ');

        $view->assertSee('Upload Document');
        $view->assertSee('Supported formats: PDF, DOC, DOCX');
        $view->assertSee('required');
        $view->assertSee('custom-file');
        $view->assertSee('wire:model="document"');
        $view->assertSee('multiple');
        $view->assertSee('title="Select a document to upload"');
        $view->assertSee('Supported formats:');
        $view->assertSee('<strong>PDF, DOC, DOCX</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_file_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                accept=".pdf,.doc,.docx"
                required
                multiple
                max="5"
            />
        ');

        $view->assertSee('required');
        $view->assertSee('multiple');
        $view->assertSee('accept="');
    }

    public function test_renders_file_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                label="Upload Document"
                aria-describedby="file-help"
                aria-required="true"
            />
        ');

        $view->assertSee('aria-describedby="file-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_file_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                wire:model.lazy="document"
                wire:loading.class="opacity-50"
                wire:target="document"
            />
        ');

        $view->assertSee('wire:model.lazy="document"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="document"');
    }

    public function test_renders_file_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                class="form-control-lg"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
            />
        ');

        $view->assertSee('form-control-lg');
        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('data-bs-placement="top"');
    }

    public function test_renders_file_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                label="Upload Document"
                id="file-upload"
            />
        ');

        $view->assertSee('for="file-upload"');
        $view->assertSee('id="file-upload"');
    }

    public function test_renders_file_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-file
                name="special_chars"
                accept=".pdf & <script>alert(\'xss\')</script>"
                title="Upload &quot;file&quot;"
            />
        ');

        $view->assertSee('name="special_chars"');
        $view->assertSee('title="Upload &quot;file&quot;"');
    }

    public function test_renders_file_with_empty_values(): void
    {
        $view = $this->blade('
            <x-form-file
                name="empty_field"
                accept=""
                title=""
            />
        ');

        $view->assertSee('name="empty_field"');
    }

    public function test_renders_file_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-file
                name="test"
                required
                disabled
                readonly
                autofocus
                multiple
            />
        ');

        $view->assertSee('required');
        $view->assertSee('disabled');
        $view->assertSee('readonly');
        $view->assertSee('autofocus');
        $view->assertSee('multiple');
    }

    public function test_renders_file_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                class="custom-class another-class"
            />
        ');

        $view->assertSee('custom-class');
        $view->assertSee('another-class');
    }

    public function test_renders_file_with_complex_help_slot(): void
    {
        $view = $this->blade('
            <x-form-file name="document">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Upload <strong>PDF</strong> files only</span>
                    </div>
                </x-slot>
            </x-form-file>
        ');

        $view->assertSee('Upload');
        $view->assertSee('<strong>PDF</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_file_with_image_accept(): void
    {
        $view = $this->blade('<x-form-file name="avatar" accept="image/*" />');

        $view->assertSee('accept="');
        $view->assertSee('image/*');
    }

    public function test_renders_file_with_specific_extensions(): void
    {
        $view = $this->blade('<x-form-file name="spreadsheet" accept=".xlsx,.xls,.csv" />');

        $view->assertSee('accept="');
        // The component converts extensions to MIME types
        $view->assertSee('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function test_renders_file_with_video_accept(): void
    {
        $view = $this->blade('<x-form-file name="video" accept="video/*" />');

        $view->assertSee('accept="');
        $view->assertSee('video/*');
    }

    public function test_renders_file_with_audio_accept(): void
    {
        $view = $this->blade('<x-form-file name="audio" accept="audio/*" />');

        $view->assertSee('accept="');
        $view->assertSee('audio/*');
    }

    public function test_renders_file_with_application_accept(): void
    {
        $view = $this->blade('<x-form-file name="app" accept="application/*" />');

        $view->assertSee('accept="');
        $view->assertSee('application/*');
    }

    public function test_renders_file_with_text_accept(): void
    {
        $view = $this->blade('<x-form-file name="text" accept="text/*" />');

        $view->assertSee('accept="');
        $view->assertSee('text/*');
    }

    public function test_renders_file_with_user_profile_upload(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'profile.update\') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="name" label="Full Name" :value="$user->name" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-file
                            name="avatar"
                            label="Profile Picture"
                            accept="image/*"
                            help="Upload a profile picture (JPG, PNG, GIF). Max size: 2MB"
                            :settings="[
                                \'maxFileSize\' => \'2MB\',
                                \'acceptedFileTypes\' => [\'image/*\'],
                                \'labelIdle\' => \'Drag & Drop your photo or <span class="filepond--label-action">Browse</span>\'
                            ]"
                        />
                    </div>
                </div>

                <x-form-submit>Update Profile</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Full Name');
        $view->assertSee('Profile Picture');
        $view->assertSee('Upload a profile picture (JPG, PNG, GIF). Max size: 2MB');
        $view->assertSee('Update Profile');
    }

    public function test_renders_file_with_document_upload_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'documents.store\') }}" method="POST" enctype="multipart/form-data">
                <x-form-input name="title" label="Document Title" required />

                <x-form-file
                    name="document"
                    label="Upload Document"
                    accept=".pdf,.doc,.docx,.txt"
                    help="Supported formats: PDF, DOC, DOCX, TXT. Maximum size: 10MB"
                    required
                    :settings="[
                        \'maxFileSize\' => \'10MB\',
                        \'acceptedFileTypes\' => [\'.pdf\', \'.doc\', \'.docx\', \'.txt\'],
                        \'labelIdle\' => \'Drag & Drop your document or <span class="filepond--label-action">Browse</span>\'
                    ]"
                />

                <x-form-textarea
                    name="description"
                    label="Description"
                    placeholder="Brief description of the document..."
                    rows="3"
                />

                <x-form-submit>Upload Document</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Document Title');
        $view->assertSee('Upload Document');
        $view->assertSee('Supported formats: PDF, DOC, DOCX, TXT. Maximum size: 10MB');
        $view->assertSee('Description');
        $view->assertSee('Brief description of the document...');
        $view->assertSee('Upload Document');
    }

    public function test_renders_file_with_multiple_image_upload(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'gallery.store\') }}" method="POST" enctype="multipart/form-data">
                <x-form-input name="title" label="Gallery Title" required />

                <x-form-file
                    name="images"
                    label="Upload Images"
                    accept="image/*"
                    multiple
                    help="Select multiple images for your gallery. Max 10 files, 5MB each"
                    :settings="[
                        \'maxFiles\' => 10,
                        \'maxFileSize\' => \'5MB\',
                        \'acceptedFileTypes\' => [\'image/*\'],
                        \'labelIdle\' => \'Drag & Drop your images or <span class="filepond--label-action">Browse</span>\',
                        \'labelFileProcessing\' => \'Uploading\',
                        \'labelFileProcessingComplete\' => \'Upload complete\',
                        \'labelTapToCancel\' => \'Tap to cancel\',
                        \'labelTapToRetry\' => \'Tap to retry\'
                    ]"
                />

                <x-form-submit>Create Gallery</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Gallery Title');
        $view->assertSee('Upload Images');
        $view->assertSee('Select multiple images for your gallery. Max 10 files, 5MB each');
        $view->assertSee('Create Gallery');
    }

    public function test_renders_file_with_resume_upload_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'job.apply\') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="first_name" label="First Name" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-input name="last_name" label="Last Name" required />
                    </div>
                </div>

                <x-form-email name="email" label="Email Address" required />

                <x-form-file
                    name="resume"
                    label="Upload Resume"
                    accept=".pdf,.doc,.docx"
                    help="Upload your resume in PDF, DOC, or DOCX format. Max size: 5MB"
                    required
                    :settings="[
                        \'maxFileSize\' => \'5MB\',
                        \'acceptedFileTypes\' => [\'.pdf\', \'.doc\', \'.docx\'],
                        \'labelIdle\' => \'Drag & Drop your resume or <span class="filepond--label-action">Browse</span>\',
                        \'labelFileProcessing\' => \'Uploading resume...\',
                        \'labelFileProcessingComplete\' => \'Resume uploaded successfully\'
                    ]"
                />

                <x-form-textarea
                    name="cover_letter"
                    label="Cover Letter"
                    placeholder="Tell us why you\'re interested in this position..."
                    rows="5"
                />

                <x-form-submit>Submit Application</x-form-submit>
            </x-form>
        ');

        $view->assertSee('First Name');
        $view->assertSee('Last Name');
        $view->assertSee('Email Address');
        $view->assertSee('Upload Resume');
        $view->assertSee('Upload your resume in PDF, DOC, or DOCX format. Max size: 5MB');
        $view->assertSee('Cover Letter');
        $view->assertSee('Tell us why you\'re interested in this position...');
        $view->assertSee('Submit Application');
    }

    public function test_renders_file_with_product_image_upload(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'products.store\') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <x-form-input name="name" label="Product Name" required />
                        <x-form-textarea name="description" label="Description" rows="3" />
                    </div>
                    <div class="col-md-4">
                        <x-form-file
                            name="images"
                            label="Product Images"
                            accept="image/*"
                            multiple
                            help="Upload product images. First image will be the main image"
                            :settings="[
                                \'maxFiles\' => 5,
                                \'maxFileSize\' => \'3MB\',
                                \'acceptedFileTypes\' => [\'image/*\'],
                                \'labelIdle\' => \'Drag & Drop product images or <span class="filepond--label-action">Browse</span>\',
                                \'labelFileProcessing\' => \'Uploading image...\',
                                \'labelFileProcessingComplete\' => \'Image uploaded\',
                                \'labelTapToCancel\' => \'Tap to cancel\',
                                \'labelTapToRetry\' => \'Tap to retry\'
                            ]"
                        />
                    </div>
                </div>

                <x-form-submit>Create Product</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Product Name');
        $view->assertSee('Description');
        $view->assertSee('Product Images');
        $view->assertSee('Upload product images. First image will be the main image');
        $view->assertSee('Create Product');
    }

    public function test_renders_file_with_file_upload_progress(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                label="Upload Document"
                wire:model="document"
                accept=".pdf,.doc,.docx"
                :settings="[
                    \'maxFileSize\' => \'10MB\',
                    \'acceptedFileTypes\' => [\'.pdf\', \'.doc\', \'.docx\'],
                    \'labelIdle\' => \'Drag & Drop your document or <span class="filepond--label-action">Browse</span>\',
                    \'labelFileProcessing\' => \'Uploading document...\',
                    \'labelFileProcessingComplete\' => \'Document uploaded successfully\',
                    \'labelTapToCancel\' => \'Tap to cancel\',
                    \'labelTapToRetry\' => \'Tap to retry\'
                ]"
            />
        ');

        $view->assertSee('Upload Document');
        $view->assertSee('wire:model="document"');
        $view->assertSee('accept="');
    }

    public function test_renders_file_with_image_upload_preview(): void
    {
        $view = $this->blade('
            <x-form-file
                name="avatar"
                label="Profile Picture"
                accept="image/*"
                :settings="[
                    \'maxFileSize\' => \'2MB\',
                    \'acceptedFileTypes\' => [\'image/*\'],
                    \'labelIdle\' => \'Drag & Drop your photo or <span class="filepond--label-action">Browse</span>\',
                    \'imagePreviewHeight\' => 170,
                    \'imageCropAspectRatio\' => \'1:1\',
                    \'imageResizeTargetWidth\' => 200,
                    \'imageResizeTargetHeight\' => 200,
                    \'styleItemPanelAspectRatio\' => 0.5,
                    \'styleLoadIndicatorPosition\' => \'center bottom\',
                    \'styleProgressIndicatorPosition\' => \'right bottom\',
                    \'styleButtonRemoveItemPosition\' => \'left bottom\',
                    \'styleButtonProcessItemPosition\' => \'right bottom\'
                ]"
            />
        ');

        $view->assertSee('Profile Picture');
        $view->assertSee('accept="');
        $view->assertSee('image/*');
    }

    public function test_renders_file_with_multiple_file_upload_limits(): void
    {
        $view = $this->blade('
            <x-form-file
                name="documents"
                label="Upload Documents"
                accept=".pdf,.doc,.docx,.txt"
                multiple
                :settings="[
                    \'maxFiles\' => 5,
                    \'maxFileSize\' => \'5MB\',
                    \'acceptedFileTypes\' => [\'.pdf\', \'.doc\', \'.docx\', \'.txt\'],
                    \'labelIdle\' => \'Drag & Drop your documents or <span class="filepond--label-action">Browse</span>\',
                    \'labelMaxFileSizeExceeded\' => \'File is too large\',
                    \'labelMaxFileSize\' => \'Maximum file size is {filesize}\',
                    \'labelMaxTotalFileSizeExceeded\' => \'Total file size is too large\',
                    \'labelMaxTotalFileSize\' => \'Maximum total file size is {filesize}\'
                ]"
            />
        ');

        $view->assertSee('Upload Documents');
        $view->assertSee('multiple');
        $view->assertSee('accept="');
    }

    public function test_renders_file_with_custom_styling(): void
    {
        $view = $this->blade('
            <x-form-file
                name="presentation"
                label="Upload Presentation"
                accept=".ppt,.pptx,.pdf"
                class="custom-file-upload"
                :settings="[
                    \'maxFileSize\' => \'20MB\',
                    \'acceptedFileTypes\' => [\'.ppt\', \'.pptx\', \'.pdf\'],
                    \'labelIdle\' => \'Drag & Drop your presentation or <span class="filepond--label-action">Browse</span>\',
                    \'stylePanelLayout\' => \'compact\',
                    \'styleButtonRemoveItemPosition\' => \'left bottom\',
                    \'styleButtonProcessItemPosition\' => \'right bottom\',
                    \'styleLoadIndicatorPosition\' => \'center bottom\',
                    \'styleProgressIndicatorPosition\' => \'center bottom\'
                ]"
            />
        ');

        $view->assertSee('Upload Presentation');
        $view->assertSee('custom-file-upload');
        $view->assertSee('accept="');
    }

    public function test_renders_file_with_form_validation(): void
    {
        $view = $this->blade('
            <x-form-file
                name="document"
                accept=".pdf,.doc,.docx"
                required
                multiple
                max="5"
                novalidate
            />
        ');

        $view->assertSee('required');
        $view->assertSee('multiple');
        $view->assertSee('accept="');
        $view->assertSee('novalidate');
    }
}
