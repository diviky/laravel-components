<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewUrlTest extends TestCase
{
    /** @test */
    public function it_renders_view_url_with_basic_value()
    {
        $view = $this->blade('<x-view-url value="https://example.com" />');

        $view->assertSee('https://example.com');
        $view->assertSee('href="https://example.com"');
        $view->assertSee('target="_blank"');
    }

    /** @test */
    public function it_renders_view_url_with_array_value()
    {
        $view = $this->blade('<x-view-url :value="[\'url\' => \'https://example.com\', \'label\' => \'Example Site\']" />');

        $view->assertSee('Example Site');
        $view->assertSee('href="https://example.com"');
    }

    /** @test */
    public function it_renders_view_url_with_label()
    {
        $view = $this->blade('<x-view-url value="https://example.com" label="Website: " />');

        $view->assertSee('https://example.com');
        $view->assertSee('Website: ');
    }

    /** @test */
    public function it_renders_view_url_with_icon()
    {
        $view = $this->blade('<x-view-url value="https://example.com" icon="link" />');

        $view->assertSee('https://example.com');
        $view->assertSee('link');
    }

    /** @test */
    public function it_renders_view_url_with_copy_functionality()
    {
        $view = $this->blade('<x-view-url value="https://example.com" copy />');

        $view->assertSee('https://example.com');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="https://example.com"');
    }

    /** @test */
    public function it_renders_view_url_with_custom_target()
    {
        $view = $this->blade('<x-view-url value="https://example.com" target="_self" />');

        $view->assertSee('https://example.com');
        $view->assertSee('target="_self"');
    }

    /** @test */
    public function it_renders_view_url_with_custom_classes()
    {
        $view = $this->blade('<x-view-url value="https://example.com" class="custom-class" />');

        $view->assertSee('https://example.com');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_url_with_custom_id()
    {
        $view = $this->blade('<x-view-url value="https://example.com" id="custom-id" />');

        $view->assertSee('https://example.com');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_url_with_data_attributes()
    {
        $view = $this->blade('<x-view-url value="https://example.com" data-test="url-component" data-type="display-url" />');

        $view->assertSee('https://example.com');
        $view->assertSee('data-test="url-component"');
        $view->assertSee('data-type="display-url"');
    }

    /** @test */
    public function it_renders_view_url_with_aria_attributes()
    {
        $view = $this->blade('<x-view-url value="https://example.com" aria-label="URL display" aria-describedby="url-description" />');

        $view->assertSee('https://example.com');
        $view->assertSee('aria-label="URL display"');
        $view->assertSee('aria-describedby="url-description"');
    }

    /** @test */
    public function it_renders_view_url_with_role_attribute()
    {
        $view = $this->blade('<x-view-url value="https://example.com" role="text" />');

        $view->assertSee('https://example.com');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_url_with_tabindex()
    {
        $view = $this->blade('<x-view-url value="https://example.com" tabindex="0" />');

        $view->assertSee('https://example.com');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_url_with_form_attribute()
    {
        $view = $this->blade('<x-view-url value="https://example.com" form="my-form" />');

        $view->assertSee('https://example.com');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_url_with_autocomplete()
    {
        $view = $this->blade('<x-view-url value="https://example.com" autocomplete="off" />');

        $view->assertSee('https://example.com');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_url_with_novalidate()
    {
        $view = $this->blade('<x-view-url value="https://example.com" novalidate />');

        $view->assertSee('https://example.com');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_url_with_accept()
    {
        $view = $this->blade('<x-view-url value="https://example.com" accept="url/*" />');

        $view->assertSee('https://example.com');
        $view->assertSee('accept="url/*"');
    }

    /** @test */
    public function it_renders_view_url_with_capture()
    {
        $view = $this->blade('<x-view-url value="https://example.com" capture="environment" />');

        $view->assertSee('https://example.com');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_url_with_max()
    {
        $view = $this->blade('<x-view-url value="https://example.com" max="100" />');

        $view->assertSee('https://example.com');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_url_with_min()
    {
        $view = $this->blade('<x-view-url value="https://example.com" min="5" />');

        $view->assertSee('https://example.com');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_url_with_step()
    {
        $view = $this->blade('<x-view-url value="https://example.com" step="1" />');

        $view->assertSee('https://example.com');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_url_with_pattern()
    {
        $view = $this->blade('<x-view-url value="https://example.com" pattern="https?://.+" />');

        $view->assertSee('https://example.com');
        $view->assertSee('pattern="https?://.+"');
    }

    /** @test */
    public function it_renders_view_url_with_spellcheck()
    {
        $view = $this->blade('<x-view-url value="https://example.com" spellcheck="false" />');

        $view->assertSee('https://example.com');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_url_with_translate()
    {
        $view = $this->blade('<x-view-url value="https://example.com" translate="no" />');

        $view->assertSee('https://example.com');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_url_with_contenteditable()
    {
        $view = $this->blade('<x-view-url value="https://example.com" contenteditable="true" />');

        $view->assertSee('https://example.com');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_url_with_contextmenu()
    {
        $view = $this->blade('<x-view-url value="https://example.com" contextmenu="url-menu" />');

        $view->assertSee('https://example.com');
        $view->assertSee('contextmenu="url-menu"');
    }

    /** @test */
    public function it_renders_view_url_with_dir()
    {
        $view = $this->blade('<x-view-url value="https://example.com" dir="rtl" />');

        $view->assertSee('https://example.com');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_url_with_draggable()
    {
        $view = $this->blade('<x-view-url value="https://example.com" draggable="true" />');

        $view->assertSee('https://example.com');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_url_with_dropzone()
    {
        $view = $this->blade('<x-view-url value="https://example.com" dropzone="copy" />');

        $view->assertSee('https://example.com');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_url_with_hidden()
    {
        $view = $this->blade('<x-view-url value="https://example.com" hidden />');

        $view->assertSee('https://example.com');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_url_with_lang()
    {
        $view = $this->blade('<x-view-url value="https://example.com" lang="en" />');

        $view->assertSee('https://example.com');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_url_with_authorization_can()
    {
        $view = $this->blade('<x-view-url value="https://example.com" can="view-content" />');

        $view->assertSee('https://example.com');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_url_with_authorization_role()
    {
        $view = $this->blade('<x-view-url value="https://example.com" role="user" />');

        $view->assertSee('https://example.com');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_url_with_authorization_action()
    {
        $view = $this->blade('<x-view-url value="https://example.com" action="view" />');

        $view->assertSee('https://example.com');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_url_with_settings_array()
    {
        $view = $this->blade('<x-view-url value="https://example.com" :settings="[\'validate\' => true]" />');

        $view->assertSee('https://example.com');
    }

    /** @test */
    public function it_renders_view_url_with_empty_value()
    {
        $view = $this->blade('<x-view-url value="" />');

        $view->assertDontSee('x-view-url');
    }

    /** @test */
    public function it_renders_view_url_with_null_value()
    {
        $view = $this->blade('<x-view-url :value="null" />');

        $view->assertDontSee('x-view-url');
    }

    /** @test */
    public function it_renders_view_url_with_different_url_formats()
    {
        $view = $this->blade('<x-view-url value="http://example.com" />');

        $view->assertSee('http://example.com');
        $view->assertSee('href="http://example.com"');
    }

    /** @test */
    public function it_renders_view_url_with_complex_url()
    {
        $view = $this->blade('<x-view-url value="https://subdomain.example.com/path?param=value#fragment" />');

        $view->assertSee('https://subdomain.example.com/path?param=value#fragment');
        $view->assertSee('href="https://subdomain.example.com/path?param=value#fragment"');
    }

    /** @test */
    public function it_renders_view_url_with_icon_null()
    {
        $view = $this->blade('<x-view-url value="https://example.com" :icon="null" />');

        $view->assertSee('https://example.com');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_url_with_label_null()
    {
        $view = $this->blade('<x-view-url value="https://example.com" :label="null" />');

        $view->assertSee('https://example.com');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_url_with_default_target()
    {
        $view = $this->blade('<x-view-url value="https://example.com" />');

        $view->assertSee('https://example.com');
        $view->assertSee('target="_blank"');
    }

    /** @test */
    public function it_renders_view_url_with_custom_target_parent()
    {
        $view = $this->blade('<x-view-url value="https://example.com" target="_parent" />');

        $view->assertSee('https://example.com');
        $view->assertSee('target="_parent"');
    }

    /** @test */
    public function it_renders_view_url_with_custom_target_top()
    {
        $view = $this->blade('<x-view-url value="https://example.com" target="_top" />');

        $view->assertSee('https://example.com');
        $view->assertSee('target="_top"');
    }

    /** @test */
    public function it_renders_view_url_with_array_value_and_copy()
    {
        $view = $this->blade('<x-view-url :value="[\'url\' => \'https://example.com\', \'label\' => \'Example Site\']" copy />');

        $view->assertSee('Example Site');
        $view->assertSee('href="https://example.com"');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Example Site"');
    }
}
