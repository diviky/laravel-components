<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewFileTest extends TestCase
{
    /** @test */
    public function it_renders_view_file_with_basic_value()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" />');

        $view->assertSee('document.pdf');
    }

    /** @test */
    public function it_renders_view_file_with_thumbnail()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'image.jpg\', \'thumb\' => \'/thumbnails/image.jpg\']" />');

        $view->assertSee('image.jpg');
        $view->assertSee('/thumbnails/image.jpg');
    }

    /** @test */
    public function it_renders_view_file_with_label()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" label="File: " />');

        $view->assertSee('document.pdf');
        $view->assertSee('File: ');
    }

    /** @test */
    public function it_renders_view_file_with_icon()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" icon="file" />');

        $view->assertSee('document.pdf');
        $view->assertSee('file');
    }

    /** @test */
    public function it_renders_view_file_with_copy_functionality()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" copy />');

        $view->assertSee('document.pdf');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_view_file_with_custom_classes()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" class="custom-class" />');

        $view->assertSee('document.pdf');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_file_with_custom_id()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" id="custom-id" />');

        $view->assertSee('document.pdf');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_file_with_data_attributes()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" data-test="file-component" data-type="display-file" />');

        $view->assertSee('document.pdf');
        $view->assertSee('data-test="file-component"');
        $view->assertSee('data-type="display-file"');
    }

    /** @test */
    public function it_renders_view_file_with_aria_attributes()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" aria-label="File display" aria-describedby="file-description" />');

        $view->assertSee('document.pdf');
        $view->assertSee('aria-label="File display"');
        $view->assertSee('aria-describedby="file-description"');
    }

    /** @test */
    public function it_renders_view_file_with_role_attribute()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" role="text" />');

        $view->assertSee('document.pdf');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_file_with_tabindex()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" tabindex="0" />');

        $view->assertSee('document.pdf');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_file_with_form_attribute()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" form="my-form" />');

        $view->assertSee('document.pdf');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_file_with_autocomplete()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" autocomplete="off" />');

        $view->assertSee('document.pdf');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_file_with_novalidate()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" novalidate />');

        $view->assertSee('document.pdf');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_file_with_accept()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" accept="file/*" />');

        $view->assertSee('document.pdf');
        $view->assertSee('accept="file/*"');
    }

    /** @test */
    public function it_renders_view_file_with_capture()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" capture="environment" />');

        $view->assertSee('document.pdf');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_file_with_max()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" max="100" />');

        $view->assertSee('document.pdf');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_file_with_min()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" min="5" />');

        $view->assertSee('document.pdf');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_file_with_step()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" step="1" />');

        $view->assertSee('document.pdf');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_file_with_pattern()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" pattern=".*\.(pdf|doc|docx)" />');

        $view->assertSee('document.pdf');
        $view->assertSee('pattern=".*\.(pdf|doc|docx)"');
    }

    /** @test */
    public function it_renders_view_file_with_spellcheck()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" spellcheck="false" />');

        $view->assertSee('document.pdf');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_file_with_translate()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" translate="no" />');

        $view->assertSee('document.pdf');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_file_with_contenteditable()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" contenteditable="true" />');

        $view->assertSee('document.pdf');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_file_with_contextmenu()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" contextmenu="file-menu" />');

        $view->assertSee('document.pdf');
        $view->assertSee('contextmenu="file-menu"');
    }

    /** @test */
    public function it_renders_view_file_with_dir()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" dir="rtl" />');

        $view->assertSee('document.pdf');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_file_with_draggable()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" draggable="true" />');

        $view->assertSee('document.pdf');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_file_with_dropzone()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" dropzone="copy" />');

        $view->assertSee('document.pdf');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_file_with_hidden()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" hidden />');

        $view->assertSee('document.pdf');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_file_with_lang()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" lang="en" />');

        $view->assertSee('document.pdf');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_file_with_authorization_can()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" can="view-content" />');

        $view->assertSee('document.pdf');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_file_with_authorization_role()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" role="user" />');

        $view->assertSee('document.pdf');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_file_with_authorization_action()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" action="view" />');

        $view->assertSee('document.pdf');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_file_with_settings_array()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" :settings="[\'validate\' => true]" />');

        $view->assertSee('document.pdf');
    }

    /** @test */
    public function it_renders_view_file_with_empty_value()
    {
        $view = $this->blade('<x-view-file :value="[]" />');

        $view->assertDontSee('x-view-file');
    }

    /** @test */
    public function it_renders_view_file_with_null_value()
    {
        $view = $this->blade('<x-view-file :value="null" />');

        $view->assertDontSee('x-view-file');
    }

    /** @test */
    public function it_renders_view_file_with_different_file_types()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'image.png\']" />');

        $view->assertSee('image.png');
    }

    /** @test */
    public function it_renders_view_file_with_complex_file_name()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'very-long-file-name-with-spaces-and-special-chars.pdf\']" />');

        $view->assertSee('very-long-file-name-with-spaces-and-special-chars.pdf');
    }

    /** @test */
    public function it_renders_view_file_with_icon_null()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" :icon="null" />');

        $view->assertSee('document.pdf');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_file_with_label_null()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" :label="null" />');

        $view->assertSee('document.pdf');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_file_with_thumbnail_and_copy()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'image.jpg\', \'thumb\' => \'/thumbnails/image.jpg\']" copy />');

        $view->assertSee('image.jpg');
        $view->assertSee('/thumbnails/image.jpg');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_view_file_without_thumbnail()
    {
        $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" />');

        $view->assertSee('document.pdf');
        $view->assertDontSee('avatar');
    }
}
