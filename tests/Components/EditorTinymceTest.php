<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class EditorTinymceTest extends TestCase
{
    /** @test */
    public function it_renders_editor_tinymce_with_basic_attributes()
    {
        $view = $this->blade('<x-editor-tinymce name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('tinymce');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_label()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test Editor');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_custom_value()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" value="<p>Initial content</p>" />');

        $view->assertSee('name="test"');
        $view->assertSee('Initial content');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_help()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" help="Use the toolbar to format text" />');

        $view->assertSee('name="test"');
        $view->assertSee('Use the toolbar to format text');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_prefix()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" prefix="uploads" />');

        $view->assertSee('name="test"');
        $view->assertSee('uploads');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_folder()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" folder="content" />');

        $view->assertSee('name="test"');
        $view->assertSee('content');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_accept()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" accept="image/*,video/*" />');

        $view->assertSee('name="test"');
        $view->assertSee('image/*,video/*');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_custom_classes()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" class="custom-tinymce-editor" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-tinymce-editor');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_custom_id()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" id="tinymce-editor-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="tinymce-editor-input"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_disabled_attribute()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_readonly_attribute()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_required_attribute()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_livewire_attributes()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" wire:model="content" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="content"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_error_state()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" class="is-invalid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-invalid');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_success_state()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" class="is-valid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-valid');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_data_attributes()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" data-test="tinymce-editor" data-type="rich-text-editor" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="tinymce-editor"');
        $view->assertSee('data-type="rich-text-editor"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_aria_attributes()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" aria-label="Rich Text Editor" aria-describedby="editor-help-text" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Rich Text Editor"');
        $view->assertSee('aria-describedby="editor-help-text"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_role_attribute()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" role="textbox" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="textbox"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_tabindex()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" tabindex="0" />');

        $view->assertSee('name="test"');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_form_attribute()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" form="my-form" />');

        $view->assertSee('name="test"');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_autocomplete()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" autocomplete="off" />');

        $view->assertSee('name="test"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_novalidate()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" novalidate />');

        $view->assertSee('name="test"');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_authorization_can()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" can="edit-content" />');

        $view->assertSee('name="test"');
        $view->assertSee('can="edit-content"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_authorization_role()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" role="editor" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="editor"');
    }

    /** @test */
    public function it_renders_editor_tinymce_with_authorization_action()
    {
        $view = $this->blade('<x-editor-tinymce name="test" label="Test Editor" action="edit" />');

        $view->assertSee('name="test"');
        $view->assertSee('action="edit"');
    }
}
