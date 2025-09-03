<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewEmailTest extends TestCase
{
    /** @test */
    public function it_renders_view_email_with_basic_value()
    {
        $view = $this->blade('<x-view-email value="user@example.com" />');

        $view->assertSee('user@example.com');
        $view->assertSee('mailto:user@example.com');
    }

    /** @test */
    public function it_renders_view_email_with_label()
    {
        $view = $this->blade('<x-view-email value="user@example.com" label="Email: " />');

        $view->assertSee('user@example.com');
        $view->assertSee('Email: ');
    }

    /** @test */
    public function it_renders_view_email_with_icon()
    {
        $view = $this->blade('<x-view-email value="user@example.com" icon="mail" />');

        $view->assertSee('user@example.com');
        $view->assertSee('mail');
    }

    /** @test */
    public function it_renders_view_email_with_copy_functionality()
    {
        $view = $this->blade('<x-view-email value="user@example.com" copy />');

        $view->assertSee('user@example.com');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="user@example.com"');
    }

    /** @test */
    public function it_renders_view_email_with_linking_disabled()
    {
        $view = $this->blade('<x-view-email value="user@example.com" linked />');

        $view->assertSee('user@example.com');
        $view->assertDontSee('mailto:user@example.com');
    }

    /** @test */
    public function it_renders_view_email_with_custom_classes()
    {
        $view = $this->blade('<x-view-email value="user@example.com" class="custom-class" />');

        $view->assertSee('user@example.com');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_email_with_custom_id()
    {
        $view = $this->blade('<x-view-email value="user@example.com" id="custom-id" />');

        $view->assertSee('user@example.com');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_email_with_data_attributes()
    {
        $view = $this->blade('<x-view-email value="user@example.com" data-test="email-component" data-type="display-email" />');

        $view->assertSee('user@example.com');
        $view->assertSee('data-test="email-component"');
        $view->assertSee('data-type="display-email"');
    }

    /** @test */
    public function it_renders_view_email_with_aria_attributes()
    {
        $view = $this->blade('<x-view-email value="user@example.com" aria-label="Email display" aria-describedby="email-description" />');

        $view->assertSee('user@example.com');
        $view->assertSee('aria-label="Email display"');
        $view->assertSee('aria-describedby="email-description"');
    }

    /** @test */
    public function it_renders_view_email_with_role_attribute()
    {
        $view = $this->blade('<x-view-email value="user@example.com" role="text" />');

        $view->assertSee('user@example.com');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_email_with_tabindex()
    {
        $view = $this->blade('<x-view-email value="user@example.com" tabindex="0" />');

        $view->assertSee('user@example.com');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_email_with_form_attribute()
    {
        $view = $this->blade('<x-view-email value="user@example.com" form="my-form" />');

        $view->assertSee('user@example.com');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_email_with_autocomplete()
    {
        $view = $this->blade('<x-view-email value="user@example.com" autocomplete="off" />');

        $view->assertSee('user@example.com');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_email_with_novalidate()
    {
        $view = $this->blade('<x-view-email value="user@example.com" novalidate />');

        $view->assertSee('user@example.com');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_email_with_accept()
    {
        $view = $this->blade('<x-view-email value="user@example.com" accept="email/*" />');

        $view->assertSee('user@example.com');
        $view->assertSee('accept="email/*"');
    }

    /** @test */
    public function it_renders_view_email_with_capture()
    {
        $view = $this->blade('<x-view-email value="user@example.com" capture="environment" />');

        $view->assertSee('user@example.com');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_email_with_max()
    {
        $view = $this->blade('<x-view-email value="user@example.com" max="100" />');

        $view->assertSee('user@example.com');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_email_with_min()
    {
        $view = $this->blade('<x-view-email value="user@example.com" min="5" />');

        $view->assertSee('user@example.com');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_email_with_step()
    {
        $view = $this->blade('<x-view-email value="user@example.com" step="1" />');

        $view->assertSee('user@example.com');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_email_with_pattern()
    {
        $view = $this->blade('<x-view-email value="user@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />');

        $view->assertSee('user@example.com');
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
    }

    /** @test */
    public function it_renders_view_email_with_spellcheck()
    {
        $view = $this->blade('<x-view-email value="user@example.com" spellcheck="false" />');

        $view->assertSee('user@example.com');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_email_with_translate()
    {
        $view = $this->blade('<x-view-email value="user@example.com" translate="no" />');

        $view->assertSee('user@example.com');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_email_with_contenteditable()
    {
        $view = $this->blade('<x-view-email value="user@example.com" contenteditable="true" />');

        $view->assertSee('user@example.com');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_email_with_contextmenu()
    {
        $view = $this->blade('<x-view-email value="user@example.com" contextmenu="email-menu" />');

        $view->assertSee('user@example.com');
        $view->assertSee('contextmenu="email-menu"');
    }

    /** @test */
    public function it_renders_view_email_with_dir()
    {
        $view = $this->blade('<x-view-email value="user@example.com" dir="rtl" />');

        $view->assertSee('user@example.com');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_email_with_draggable()
    {
        $view = $this->blade('<x-view-email value="user@example.com" draggable="true" />');

        $view->assertSee('user@example.com');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_email_with_dropzone()
    {
        $view = $this->blade('<x-view-email value="user@example.com" dropzone="copy" />');

        $view->assertSee('user@example.com');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_email_with_hidden()
    {
        $view = $this->blade('<x-view-email value="user@example.com" hidden />');

        $view->assertSee('user@example.com');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_email_with_lang()
    {
        $view = $this->blade('<x-view-email value="user@example.com" lang="en" />');

        $view->assertSee('user@example.com');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_email_with_authorization_can()
    {
        $view = $this->blade('<x-view-email value="user@example.com" can="view-content" />');

        $view->assertSee('user@example.com');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_email_with_authorization_role()
    {
        $view = $this->blade('<x-view-email value="user@example.com" role="user" />');

        $view->assertSee('user@example.com');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_email_with_authorization_action()
    {
        $view = $this->blade('<x-view-email value="user@example.com" action="view" />');

        $view->assertSee('user@example.com');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_email_with_settings_array()
    {
        $view = $this->blade('<x-view-email value="user@example.com" :settings="[\'validate\' => true]" />');

        $view->assertSee('user@example.com');
    }

    /** @test */
    public function it_renders_view_email_with_empty_value()
    {
        $view = $this->blade('<x-view-email value="" />');

        $view->assertDontSee('x-view-email');
    }

    /** @test */
    public function it_renders_view_email_with_null_value()
    {
        $view = $this->blade('<x-view-email :value="null" />');

        $view->assertDontSee('x-view-email');
    }

    /** @test */
    public function it_renders_view_email_with_different_email_formats()
    {
        $view = $this->blade('<x-view-email value="admin@company.com" />');

        $view->assertSee('admin@example.com');
        $view->assertSee('mailto:admin@company.com');
    }

    /** @test */
    public function it_renders_view_email_with_complex_email()
    {
        $view = $this->blade('<x-view-email value="user.name+tag@subdomain.example.co.uk" />');

        $view->assertSee('user.name+tag@subdomain.example.co.uk');
        $view->assertSee('mailto:user.name+tag@subdomain.example.co.uk');
    }

    /** @test */
    public function it_renders_view_email_with_icon_null()
    {
        $view = $this->blade('<x-view-email value="user@example.com" :icon="null" />');

        $view->assertSee('user@example.com');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_email_with_label_null()
    {
        $view = $this->blade('<x-view-email value="user@example.com" :label="null" />');

        $view->assertSee('user@example.com');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_email_with_linked_false()
    {
        $view = $this->blade('<x-view-email value="user@example.com" :linked="false" />');

        $view->assertSee('user@example.com');
        $view->assertSee('mailto:user@example.com');
    }

    /** @test */
    public function it_renders_view_email_with_linked_true()
    {
        $view = $this->blade('<x-view-email value="user@example.com" :linked="true" />');

        $view->assertSee('user@example.com');
        $view->assertDontSee('mailto:user@example.com');
    }
}
