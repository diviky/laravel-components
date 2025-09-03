<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewTelTest extends TestCase
{
    /** @test */
    public function it_renders_view_tel_with_basic_value()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('tel:+1-555-123-4567');
    }

    /** @test */
    public function it_renders_view_tel_with_label()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" label="Phone: " />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('Phone: ');
    }

    /** @test */
    public function it_renders_view_tel_with_icon()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" icon="phone" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('phone');
    }

    /** @test */
    public function it_renders_view_tel_with_copy_functionality()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" copy />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="+1-555-123-4567"');
    }

    /** @test */
    public function it_renders_view_tel_with_linking_disabled()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" linked />');

        $view->assertSee('+1-555-123-4567');
        $view->assertDontSee('tel:+1-555-123-4567');
    }

    /** @test */
    public function it_renders_view_tel_with_custom_classes()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" class="custom-class" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_tel_with_custom_id()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" id="custom-id" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_tel_with_data_attributes()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" data-test="tel-component" data-type="display-tel" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('data-test="tel-component"');
        $view->assertSee('data-type="display-tel"');
    }

    /** @test */
    public function it_renders_view_tel_with_aria_attributes()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" aria-label="Telephone display" aria-describedby="tel-description" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('aria-label="Telephone display"');
        $view->assertSee('aria-describedby="tel-description"');
    }

    /** @test */
    public function it_renders_view_tel_with_role_attribute()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" role="text" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_tel_with_tabindex()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" tabindex="0" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_tel_with_form_attribute()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" form="my-form" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_tel_with_autocomplete()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" autocomplete="off" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_tel_with_novalidate()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" novalidate />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_tel_with_accept()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" accept="tel/*" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('accept="tel/*"');
    }

    /** @test */
    public function it_renders_view_tel_with_capture()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" capture="environment" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_tel_with_max()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" max="100" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_tel_with_min()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" min="5" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_tel_with_step()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" step="1" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_tel_with_pattern()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" pattern="[\+]?[0-9\s\-\(\)]+" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('pattern="[\+]?[0-9\s\-\(\)]+"');
    }

    /** @test */
    public function it_renders_view_tel_with_spellcheck()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" spellcheck="false" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_tel_with_translate()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" translate="no" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_tel_with_contenteditable()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" contenteditable="true" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_tel_with_contextmenu()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" contextmenu="tel-menu" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('contextmenu="tel-menu"');
    }

    /** @test */
    public function it_renders_view_tel_with_dir()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" dir="rtl" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_tel_with_draggable()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" draggable="true" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_tel_with_dropzone()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" dropzone="copy" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_tel_with_hidden()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" hidden />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_tel_with_lang()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" lang="en" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_tel_with_authorization_can()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" can="view-content" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_tel_with_authorization_role()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" role="user" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_tel_with_authorization_action()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" action="view" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_tel_with_settings_array()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" :settings="[\'validate\' => true]" />');

        $view->assertSee('+1-555-123-4567');
    }

    /** @test */
    public function it_renders_view_tel_with_empty_value()
    {
        $view = $this->blade('<x-view-tel value="" />');

        $view->assertDontSee('x-view-tel');
    }

    /** @test */
    public function it_renders_view_tel_with_null_value()
    {
        $view = $this->blade('<x-view-tel :value="null" />');

        $view->assertDontSee('x-view-tel');
    }

    /** @test */
    public function it_renders_view_tel_with_different_phone_formats()
    {
        $view = $this->blade('<x-view-tel value="555-123-4567" />');

        $view->assertSee('555-123-4567');
        $view->assertSee('tel:555-123-4567');
    }

    /** @test */
    public function it_renders_view_tel_with_complex_phone()
    {
        $view = $this->blade('<x-view-tel value="+1 (555) 123-4567 ext. 123" />');

        $view->assertSee('+1 (555) 123-4567 ext. 123');
        $view->assertSee('tel:+1 (555) 123-4567 ext. 123');
    }

    /** @test */
    public function it_renders_view_tel_with_icon_null()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" :icon="null" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_tel_with_label_null()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" :label="null" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_tel_with_linked_false()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" :linked="false" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertSee('tel:+1-555-123-4567');
    }

    /** @test */
    public function it_renders_view_tel_with_linked_true()
    {
        $view = $this->blade('<x-view-tel value="+1-555-123-4567" :linked="true" />');

        $view->assertSee('+1-555-123-4567');
        $view->assertDontSee('tel:+1-555-123-4567');
    }
}
