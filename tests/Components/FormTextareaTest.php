<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormTextareaTest extends TestCase
{
    public function test_renders_basic_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('name="description"');
        $view->assertSee('textarea');
    }

    public function test_renders_textarea_with_label(): void
    {
        $view = $this->blade('<x-form-textarea name="description" label="Description" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Description');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_value(): void
    {
        $view = $this->blade('<x-form-textarea name="description" value="Sample content" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Sample content');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_placeholder(): void
    {
        $view = $this->blade('<x-form-textarea name="description" placeholder="Enter description" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('placeholder="Enter description"');
        $view->assertSee('name="description"');
    }

    public function test_renders_required_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" label="Description" required />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('required');
        $view->assertSee('Description');
    }

    public function test_renders_readonly_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" readonly />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('readonly');
        $view->assertSee('name="description"');
    }

    public function test_renders_disabled_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" disabled />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('disabled');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_rows(): void
    {
        $view = $this->blade('<x-form-textarea name="description" rows="5" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('rows="5"');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_cols(): void
    {
        $view = $this->blade('<x-form-textarea name="description" cols="50" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('cols="50"');
        $view->assertSee('name="description"');
    }

    public function test_renders_small_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" size="sm" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control-sm');
        $view->assertSee('name="description"');
    }

    public function test_renders_large_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" size="lg" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control-lg');
        $view->assertSee('name="description"');
    }

    public function test_renders_floating_label_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="description" label="Description" floating />');

        $view->assertSee('form-group');
        $view->assertSee('form-floating');
        $view->assertSee('form-control');
        $view->assertSee('Description');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_help_text(): void
    {
        $view = $this->blade('<x-form-textarea name="description" help="Enter detailed description" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Enter detailed description');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_custom_id(): void
    {
        $view = $this->blade('<x-form-textarea name="description" id="custom-id" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('id="custom-id"');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_title(): void
    {
        $view = $this->blade('<x-form-textarea name="description" title="Enter content here" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('title="Enter content here"');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_custom_class(): void
    {
        $view = $this->blade('<x-form-textarea name="description" class="custom-textarea" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('custom-textarea');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_livewire_model(): void
    {
        $view = $this->blade('<x-form-textarea name="description" wire:model="content" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('wire:model="content"');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_maxlength(): void
    {
        $view = $this->blade('<x-form-textarea name="description" maxlength="1000" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('maxlength="1000"');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_minlength(): void
    {
        $view = $this->blade('<x-form-textarea name="description" minlength="10" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('minlength="10"');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_character_counter(): void
    {
        $view = $this->blade('<x-form-textarea name="description" data-length />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-length');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-textarea name="description" extra-attributes="data-custom=value" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-custom=value');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-textarea name="description">
                <x-slot name="before">
                    <div class="text-muted">Prefix content</div>
                </x-slot>
            </x-form-textarea>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Prefix content');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-textarea name="description">
                <x-slot name="after">
                    <div class="text-muted">Suffix content</div>
                </x-slot>
            </x-form-textarea>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Suffix content');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-textarea name="description">
                <x-slot name="help">
                    <div class="small">Custom help text</div>
                </x-slot>
            </x-form-textarea>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Custom help text');
        $view->assertSee('name="description"');
    }

    public function test_renders_textarea_with_character_limit_and_counter(): void
    {
        $view = $this->blade('<x-form-textarea name="content" maxlength="500" data-length rows="5" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('maxlength="500"');
        $view->assertSee('data-length');
        $view->assertSee('rows="5"');
        $view->assertSee('name="content"');
    }

    public function test_renders_required_textarea_with_placeholder(): void
    {
        $view = $this->blade('<x-form-textarea name="message" label="Message" required placeholder="Your message here" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('required');
        $view->assertSee('placeholder="Your message here"');
        $view->assertSee('Message');
        $view->assertSee('name="message"');
    }

    public function test_renders_floating_label_with_placeholder(): void
    {
        $view = $this->blade('<x-form-textarea name="notes" label="Notes" floating placeholder="Enter notes" />');

        $view->assertSee('form-group');
        $view->assertSee('form-floating');
        $view->assertSee('form-control');
        $view->assertSee('Notes');
        $view->assertSee('placeholder="Enter notes"');
        $view->assertSee('name="notes"');
    }

    public function test_renders_textarea_with_help_text_and_rows(): void
    {
        $view = $this->blade('<x-form-textarea name="bio" label="Biography" help="Tell us about yourself" rows="6" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Tell us about yourself');
        $view->assertSee('rows="6"');
        $view->assertSee('Biography');
        $view->assertSee('name="bio"');
    }

    public function test_renders_readonly_textarea_with_value(): void
    {
        $view = $this->blade('<x-form-textarea name="terms" label="Terms & Conditions" readonly value="Terms content here..." />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('readonly');
        $view->assertSee('Terms content here...');
        $view->assertSee('Terms & Conditions');
        $view->assertSee('name="terms"');
    }

    public function test_renders_disabled_textarea_with_value(): void
    {
        $view = $this->blade('<x-form-textarea name="disabled_field" label="Disabled Field" disabled value="Cannot edit this" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('disabled');
        $view->assertSee('Cannot edit this');
        $view->assertSee('Disabled Field');
        $view->assertSee('name="disabled_field"');
    }

    public function test_renders_different_sized_textareas(): void
    {
        $view = $this->blade('
            <x-form-textarea name="small_text" label="Small Textarea" size="sm" rows="3" />
            <x-form-textarea name="normal_text" label="Normal Textarea" rows="4" />
            <x-form-textarea name="large_text" label="Large Textarea" size="lg" rows="5" />
        ');

        $view->assertSee('form-control-sm');
        $view->assertSee('form-control-lg');
        $view->assertSee('Small Textarea');
        $view->assertSee('Normal Textarea');
        $view->assertSee('Large Textarea');
        $view->assertSee('name="small_text"');
        $view->assertSee('name="normal_text"');
        $view->assertSee('name="large_text"');
    }

    public function test_renders_livewire_integration(): void
    {
        $view = $this->blade('<x-form-textarea name="comment" label="Comment" wire:model.live="comment" rows="4" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('wire:model.live="comment"');
        $view->assertSee('Comment');
        $view->assertSee('rows="4"');
        $view->assertSee('name="comment"');
    }

    public function test_renders_textarea_with_character_counter_and_limit(): void
    {
        $view = $this->blade('<x-form-textarea name="post_content" label="Post Content" data-length maxlength="2000" rows="8" placeholder="Write your post..." />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-length');
        $view->assertSee('maxlength="2000"');
        $view->assertSee('rows="8"');
        $view->assertSee('placeholder="Write your post..."');
        $view->assertSee('Post Content');
        $view->assertSee('name="post_content"');
    }

    public function test_renders_textarea_with_before_and_after_slots(): void
    {
        $view = $this->blade('
            <x-form-textarea name="email_body" label="Email Body" rows="6">
                <x-slot name="before">
                    <div class="text-muted small">Email template:</div>
                </x-slot>
                <x-slot name="after">
                    <div class="text-muted small">Variables: {name}, {email}</div>
                </x-slot>
            </x-form-textarea>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Email template:');
        $view->assertSee('Variables: {name}, {email}');
        $view->assertSee('Email Body');
        $view->assertSee('rows="6"');
        $view->assertSee('name="email_body"');
    }

    public function test_renders_textarea_with_custom_help_slot(): void
    {
        $view = $this->blade('
            <x-form-textarea name="feedback" label="Feedback" rows="5">
                <x-slot name="help">
                    <div class="small text-muted">
                        Please provide detailed feedback. <a href="#guidelines">See guidelines</a>
                    </div>
                </x-slot>
            </x-form-textarea>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Please provide detailed feedback');
        $view->assertSee('See guidelines');
        $view->assertSee('Feedback');
        $view->assertSee('rows="5"');
        $view->assertSee('name="feedback"');
    }

    public function test_renders_code_input_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="code" label="Code" rows="10" class="font-monospace" placeholder="Enter your code here..." />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('font-monospace');
        $view->assertSee('placeholder="Enter your code here..."');
        $view->assertSee('Code');
        $view->assertSee('rows="10"');
        $view->assertSee('name="code"');
    }

    public function test_renders_auto_expanding_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="dynamic_content" label="Dynamic Content" rows="3" data-auto-expand="true" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-auto-expand="true"');
        $view->assertSee('Dynamic Content');
        $view->assertSee('rows="3"');
        $view->assertSee('name="dynamic_content"');
    }

    public function test_renders_sms_notification_form_textarea(): void
    {
        $view = $this->blade('
            <x-form-textarea name="send[to]" label="Send To" data-length required maxlength="2000" cols="30" rows="5">
                <x-slot name="help">
                    <div class="small pt-1"><b>Note:</b> Multiple emails are separated by comma (,)</div>
                </x-slot>
            </x-form-textarea>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-length');
        $view->assertSee('required');
        $view->assertSee('maxlength="2000"');
        $view->assertSee('cols="30"');
        $view->assertSee('rows="5"');
        $view->assertSee('Send To');
        $view->assertSee('Multiple emails are separated by comma');
        $view->assertSee('name="send[to]"');
    }

    public function test_renders_email_template_editor_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="template_content" label="Email Template" rows="12" maxlength="5000" data-length placeholder="Enter email template content..." />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-length');
        $view->assertSee('maxlength="5000"');
        $view->assertSee('rows="12"');
        $view->assertSee('placeholder="Enter email template content..."');
        $view->assertSee('Email Template');
        $view->assertSee('name="template_content"');
    }

    public function test_renders_contact_form_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="message" label="Message" required rows="6" placeholder="How can we help you?" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('required');
        $view->assertSee('rows="6"');
        $view->assertSee('placeholder="How can we help you?"');
        $view->assertSee('Message');
        $view->assertSee('name="message"');
    }

    public function test_renders_rich_text_editor_integration(): void
    {
        $view = $this->blade('<x-form-textarea name="content" label="Content" data-editor="tinymce" rows="10" data-editor-config=\'{"toolbar": "bold italic | link"}\' />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-editor="tinymce"');
        $view->assertSee('data-editor-config=\'{"toolbar": "bold italic | link"}\'');
        $view->assertSee('Content');
        $view->assertSee('rows="10"');
        $view->assertSee('name="content"');
    }

    public function test_renders_markdown_support_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="markdown_content" label="Markdown Content" rows="8" data-markdown="true" help="Supports Markdown syntax" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-markdown="true"');
        $view->assertSee('Supports Markdown syntax');
        $view->assertSee('Markdown Content');
        $view->assertSee('rows="8"');
        $view->assertSee('name="markdown_content"');
    }

    public function test_renders_auto_save_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="draft" label="Draft" rows="8" data-auto-save="true" data-auto-save-interval="30000" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-auto-save="true"');
        $view->assertSee('data-auto-save-interval="30000"');
        $view->assertSee('Draft');
        $view->assertSee('rows="8"');
        $view->assertSee('name="draft"');
    }

    public function test_renders_spell_check_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="content" label="Content" rows="6" spellcheck="true" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('spellcheck="true"');
        $view->assertSee('Content');
        $view->assertSee('rows="6"');
        $view->assertSee('name="content"');
    }

    public function test_renders_custom_validation_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="custom_field" label="Custom Field" rows="4" pattern="[A-Za-z\\s]+" title="Only letters and spaces allowed" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="[A-Za-z\\s]+"');
        $view->assertSee('title="Only letters and spaces allowed"');
        $view->assertSee('Custom Field');
        $view->assertSee('rows="4"');
        $view->assertSee('name="custom_field"');
    }

    public function test_renders_custom_styled_textarea(): void
    {
        $view = $this->blade('<x-form-textarea name="styled" label="Styled Textarea" class="custom-textarea border-primary" rows="5" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('custom-textarea');
        $view->assertSee('border-primary');
        $view->assertSee('Styled Textarea');
        $view->assertSee('rows="5"');
        $view->assertSee('name="styled"');
    }

    public function test_renders_textarea_with_inline_style(): void
    {
        $view = $this->blade('<x-form-textarea name="custom_style" label="Custom Style" style="background-color: #f8f9fa; border-radius: 10px;" rows="4" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('background-color: #f8f9fa');
        $view->assertSee('border-radius: 10px');
        $view->assertSee('Custom Style');
        $view->assertSee('rows="4"');
        $view->assertSee('name="custom_style"');
    }

    public function test_renders_textarea_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-form-textarea name="accessible" label="Accessible Field" aria-describedby="help-text" aria-required="true" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('aria-describedby="help-text"');
        $view->assertSee('aria-required="true"');
        $view->assertSee('Accessible Field');
        $view->assertSee('name="accessible"');
    }

    public function test_renders_textarea_with_data_attributes(): void
    {
        $view = $this->blade('<x-form-textarea name="data_field" label="Data Field" data-testid="textarea" data-cy="textarea-input" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-testid="textarea"');
        $view->assertSee('data-cy="textarea-input"');
        $view->assertSee('Data Field');
        $view->assertSee('name="data_field"');
    }

    public function test_renders_textarea_with_responsive_classes(): void
    {
        $view = $this->blade('<x-form-textarea name="responsive" label="Responsive Field" class="d-none d-md-block" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('Responsive Field');
        $view->assertSee('name="responsive"');
    }

    public function test_renders_textarea_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="spaced" label="Spaced Field" class="m-3 p-2" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('Spaced Field');
        $view->assertSee('name="spaced"');
    }

    public function test_renders_textarea_with_border_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="bordered" label="Bordered Field" class="border border-primary" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('Bordered Field');
        $view->assertSee('name="bordered"');
    }

    public function test_renders_textarea_with_background_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="background" label="Background Field" class="bg-light" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('bg-light');
        $view->assertSee('Background Field');
        $view->assertSee('name="background"');
    }

    public function test_renders_textarea_with_text_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="text_utils" label="Text Utils Field" class="text-primary fw-bold" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
        $view->assertSee('Text Utils Field');
        $view->assertSee('name="text_utils"');
    }

    public function test_renders_textarea_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="shadowed" label="Shadowed Field" class="shadow" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('shadow');
        $view->assertSee('Shadowed Field');
        $view->assertSee('name="shadowed"');
    }

    public function test_renders_textarea_with_position_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="positioned" label="Positioned Field" class="position-relative" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('position-relative');
        $view->assertSee('Positioned Field');
        $view->assertSee('name="positioned"');
    }

    public function test_renders_textarea_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="visible" label="Visible Field" class="visible opacity-75" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
        $view->assertSee('Visible Field');
        $view->assertSee('name="visible"');
    }

    public function test_renders_textarea_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="overflow" label="Overflow Field" class="overflow-auto" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('overflow-auto');
        $view->assertSee('Overflow Field');
        $view->assertSee('name="overflow"');
    }

    public function test_renders_textarea_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-form-textarea name="interactive" label="Interactive Field" class="user-select-all" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('user-select-all');
        $view->assertSee('Interactive Field');
        $view->assertSee('name="interactive"');
    }
}
