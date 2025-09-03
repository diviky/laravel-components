<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewStringTest extends TestCase
{
    /** @test */
    public function it_renders_view_string_with_basic_value()
    {
        $view = $this->blade('<x-view-string value="test" />');

        $view->assertSee('test');
    }

    /** @test */
    public function it_renders_view_string_with_label()
    {
        $view = $this->blade('<x-view-string value="test" label="Label: " />');

        $view->assertSee('test');
        $view->assertSee('Label: ');
    }

    /** @test */
    public function it_renders_view_string_with_icon()
    {
        $view = $this->blade('<x-view-string value="test" icon="user" />');

        $view->assertSee('test');
        $view->assertSee('user');
    }

    /** @test */
    public function it_renders_view_string_with_copy_functionality()
    {
        $view = $this->blade('<x-view-string value="test" copy />');

        $view->assertSee('test');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="test"');
    }

    /** @test */
    public function it_renders_view_string_with_custom_classes()
    {
        $view = $this->blade('<x-view-string value="test" class="custom-class" />');

        $view->assertSee('test');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_string_with_custom_id()
    {
        $view = $this->blade('<x-view-string value="test" id="custom-id" />');

        $view->assertSee('test');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_string_with_data_attributes()
    {
        $view = $this->blade('<x-view-string value="test" data-test="string-component" data-type="display-text" />');

        $view->assertSee('test');
        $view->assertSee('data-test="string-component"');
        $view->assertSee('data-type="display-text"');
    }

    /** @test */
    public function it_renders_view_string_with_aria_attributes()
    {
        $view = $this->blade('<x-view-string value="test" aria-label="String display" aria-describedby="string-description" />');

        $view->assertSee('test');
        $view->assertSee('aria-label="String display"');
        $view->assertSee('aria-describedby="string-description"');
    }

    /** @test */
    public function it_renders_view_string_with_role_attribute()
    {
        $view = $this->blade('<x-view-string value="test" role="text" />');

        $view->assertSee('test');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_string_with_tabindex()
    {
        $view = $this->blade('<x-view-string value="test" tabindex="0" />');

        $view->assertSee('test');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_string_with_form_attribute()
    {
        $view = $this->blade('<x-view-string value="test" form="my-form" />');

        $view->assertSee('test');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_string_with_autocomplete()
    {
        $view = $this->blade('<x-view-string value="test" autocomplete="off" />');

        $view->assertSee('test');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_string_with_novalidate()
    {
        $view = $this->blade('<x-view-string value="test" novalidate />');

        $view->assertSee('test');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_string_with_accept()
    {
        $view = $this->blade('<x-view-string value="test" accept="text/*" />');

        $view->assertSee('test');
        $view->assertSee('accept="text/*"');
    }

    /** @test */
    public function it_renders_view_string_with_capture()
    {
        $view = $this->blade('<x-view-string value="test" capture="environment" />');

        $view->assertSee('test');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_string_with_max()
    {
        $view = $this->blade('<x-view-string value="test" max="100" />');

        $view->assertSee('test');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_string_with_min()
    {
        $view = $this->blade('<x-view-string value="test" min="10" />');

        $view->assertSee('test');
        $view->assertSee('min="10"');
    }

    /** @test */
    public function it_renders_view_string_with_step()
    {
        $view = $this->blade('<x-view-string value="test" step="5" />');

        $view->assertSee('test');
        $view->assertSee('step="5"');
    }

    /** @test */
    public function it_renders_view_string_with_pattern()
    {
        $view = $this->blade('<x-view-string value="test" pattern="[A-Za-z]+" />');

        $view->assertSee('test');
        $view->assertSee('pattern="[A-Za-z]+"');
    }

    /** @test */
    public function it_renders_view_string_with_spellcheck()
    {
        $view = $this->blade('<x-view-string value="test" spellcheck="false" />');

        $view->assertSee('test');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_string_with_translate()
    {
        $view = $this->blade('<x-view-string value="test" translate="no" />');

        $view->assertSee('test');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_string_with_contenteditable()
    {
        $view = $this->blade('<x-view-string value="test" contenteditable="true" />');

        $view->assertSee('test');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_string_with_contextmenu()
    {
        $view = $this->blade('<x-view-string value="test" contextmenu="string-menu" />');

        $view->assertSee('test');
        $view->assertSee('contextmenu="string-menu"');
    }

    /** @test */
    public function it_renders_view_string_with_dir()
    {
        $view = $this->blade('<x-view-string value="test" dir="rtl" />');

        $view->assertSee('test');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_string_with_draggable()
    {
        $view = $this->blade('<x-view-string value="test" draggable="true" />');

        $view->assertSee('test');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_string_with_dropzone()
    {
        $view = $this->blade('<x-view-string value="test" dropzone="copy" />');

        $view->assertSee('test');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_string_with_hidden()
    {
        $view = $this->blade('<x-view-string value="test" hidden />');

        $view->assertSee('test');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_string_with_lang()
    {
        $view = $this->blade('<x-view-string value="test" lang="en" />');

        $view->assertSee('test');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_string_with_authorization_can()
    {
        $view = $this->blade('<x-view-string value="test" can="view-content" />');

        $view->assertSee('test');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_string_with_authorization_role()
    {
        $view = $this->blade('<x-view-string value="test" role="user" />');

        $view->assertSee('test');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_string_with_authorization_action()
    {
        $view = $this->blade('<x-view-string value="test" action="view" />');

        $view->assertSee('test');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_string_with_settings()
    {
        $view = $this->blade('<x-view-string value="test" :settings="[\'class\' => \'custom-class\']" />');

        $view->assertSee('test');
    }

    /** @test */
    public function it_renders_view_string_with_empty_value()
    {
        $view = $this->blade('<x-view-string value="" />');

        $view->assertDontSee('x-view-string');
    }

    /** @test */
    public function it_renders_view_string_with_null_value()
    {
        $view = $this->blade('<x-view-string :value="null" />');

        $view->assertDontSee('x-view-string');
    }
}
