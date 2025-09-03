<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewBooleanTest extends TestCase
{
    /** @test */
    public function it_renders_view_boolean_with_true_value()
    {
        $view = $this->blade('<x-view-boolean value="true" />');

        $view->assertSee('Yes');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_view_boolean_with_false_value()
    {
        $view = $this->blade('<x-view-boolean value="false" />');

        $view->assertSee('No');
        $view->assertSee('badge-warning');
    }

    /** @test */
    public function it_renders_view_boolean_with_label()
    {
        $view = $this->blade('<x-view-boolean value="true" label="Status: " />');

        $view->assertSee('Yes');
        $view->assertSee('Status: ');
    }

    /** @test */
    public function it_renders_view_boolean_with_icon()
    {
        $view = $this->blade('<x-view-boolean value="true" icon="check-circle" />');

        $view->assertSee('Yes');
        $view->assertSee('check-circle');
    }

    /** @test */
    public function it_renders_view_boolean_with_copy_functionality()
    {
        $view = $this->blade('<x-view-boolean value="true" copy />');

        $view->assertSee('Yes');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="true"');
    }

    /** @test */
    public function it_renders_view_boolean_with_custom_classes()
    {
        $view = $this->blade('<x-view-boolean value="true" class="custom-class" />');

        $view->assertSee('Yes');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_boolean_with_custom_id()
    {
        $view = $this->blade('<x-view-boolean value="true" id="custom-id" />');

        $view->assertSee('Yes');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_boolean_with_data_attributes()
    {
        $view = $this->blade('<x-view-boolean value="true" data-test="boolean-component" data-type="display-boolean" />');

        $view->assertSee('Yes');
        $view->assertSee('data-test="boolean-component"');
        $view->assertSee('data-type="display-boolean"');
    }

    /** @test */
    public function it_renders_view_boolean_with_aria_attributes()
    {
        $view = $this->blade('<x-view-boolean value="true" aria-label="Boolean display" aria-describedby="boolean-description" />');

        $view->assertSee('Yes');
        $view->assertSee('aria-label="Boolean display"');
        $view->assertSee('aria-describedby="boolean-description"');
    }

    /** @test */
    public function it_renders_view_boolean_with_role_attribute()
    {
        $view = $this->blade('<x-view-boolean value="true" role="text" />');

        $view->assertSee('Yes');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_boolean_with_tabindex()
    {
        $view = $this->blade('<x-view-boolean value="true" tabindex="0" />');

        $view->assertSee('Yes');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_boolean_with_form_attribute()
    {
        $view = $this->blade('<x-view-boolean value="true" form="my-form" />');

        $view->assertSee('Yes');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_boolean_with_autocomplete()
    {
        $view = $this->blade('<x-view-boolean value="true" autocomplete="off" />');

        $view->assertSee('Yes');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_boolean_with_novalidate()
    {
        $view = $this->blade('<x-view-boolean value="true" novalidate />');

        $view->assertSee('Yes');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_boolean_with_accept()
    {
        $view = $this->blade('<x-view-boolean value="true" accept="boolean/*" />');

        $view->assertSee('Yes');
        $view->assertSee('accept="boolean/*"');
    }

    /** @test */
    public function it_renders_view_boolean_with_capture()
    {
        $view = $this->blade('<x-view-boolean value="true" capture="environment" />');

        $view->assertSee('Yes');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_boolean_with_max()
    {
        $view = $this->blade('<x-view-boolean value="true" max="1" />');

        $view->assertSee('Yes');
        $view->assertSee('max="1"');
    }

    /** @test */
    public function it_renders_view_boolean_with_min()
    {
        $view = $this->blade('<x-view-boolean value="true" min="0" />');

        $view->assertSee('Yes');
        $view->assertSee('min="0"');
    }

    /** @test */
    public function it_renders_view_boolean_with_step()
    {
        $view = $this->blade('<x-view-boolean value="true" step="1" />');

        $view->assertSee('Yes');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_boolean_with_pattern()
    {
        $view = $this->blade('<x-view-boolean value="true" pattern="[01]" />');

        $view->assertSee('Yes');
        $view->assertSee('pattern="[01]"');
    }

    /** @test */
    public function it_renders_view_boolean_with_spellcheck()
    {
        $view = $this->blade('<x-view-boolean value="true" spellcheck="false" />');

        $view->assertSee('Yes');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_boolean_with_translate()
    {
        $view = $this->blade('<x-view-boolean value="true" translate="no" />');

        $view->assertSee('Yes');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_boolean_with_contenteditable()
    {
        $view = $this->blade('<x-view-boolean value="true" contenteditable="true" />');

        $view->assertSee('Yes');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_boolean_with_contextmenu()
    {
        $view = $this->blade('<x-view-boolean value="true" contextmenu="boolean-menu" />');

        $view->assertSee('Yes');
        $view->assertSee('contextmenu="boolean-menu"');
    }

    /** @test */
    public function it_renders_view_boolean_with_dir()
    {
        $view = $this->blade('<x-view-boolean value="true" dir="rtl" />');

        $view->assertSee('Yes');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_boolean_with_draggable()
    {
        $view = $this->blade('<x-view-boolean value="true" draggable="true" />');

        $view->assertSee('Yes');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_boolean_with_dropzone()
    {
        $view = $this->blade('<x-view-boolean value="true" dropzone="copy" />');

        $view->assertSee('Yes');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_boolean_with_hidden()
    {
        $view = $this->blade('<x-view-boolean value="true" hidden />');

        $view->assertSee('Yes');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_boolean_with_lang()
    {
        $view = $this->blade('<x-view-boolean value="true" lang="en" />');

        $view->assertSee('Yes');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_boolean_with_authorization_can()
    {
        $view = $this->blade('<x-view-boolean value="true" can="view-content" />');

        $view->assertSee('Yes');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_boolean_with_authorization_role()
    {
        $view = $this->blade('<x-view-boolean value="true" role="user" />');

        $view->assertSee('Yes');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_boolean_with_authorization_action()
    {
        $view = $this->blade('<x-view-boolean value="true" action="view" />');

        $view->assertSee('Yes');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_boolean_with_settings_array()
    {
        $view = $this->blade('<x-view-boolean value="true" :settings="[\'true_text\' => \'Active\']" />');

        $view->assertSee('Yes');
    }

    /** @test */
    public function it_renders_view_boolean_with_empty_value()
    {
        $view = $this->blade('<x-view-boolean value="" />');

        $view->assertSee('No');
        $view->assertSee('badge-warning');
    }

    /** @test */
    public function it_renders_view_boolean_with_null_value()
    {
        $view = $this->blade('<x-view-boolean :value="null" />');

        $view->assertSee('No');
        $view->assertSee('badge-warning');
    }

    /** @test */
    public function it_renders_view_boolean_with_zero_value()
    {
        $view = $this->blade('<x-view-boolean value="0" />');

        $view->assertSee('No');
        $view->assertSee('badge-warning');
    }

    /** @test */
    public function it_renders_view_boolean_with_false_string()
    {
        $view = $this->blade('<x-view-boolean value="false" />');

        $view->assertSee('No');
        $view->assertSee('badge-warning');
    }

    /** @test */
    public function it_renders_view_boolean_with_integer_one()
    {
        $view = $this->blade('<x-view-boolean value="1" />');

        $view->assertSee('Yes');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_view_boolean_with_string_one()
    {
        $view = $this->blade('<x-view-boolean value="1" />');

        $view->assertSee('Yes');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_view_boolean_with_yes_string()
    {
        $view = $this->blade('<x-view-boolean value="yes" />');

        $view->assertSee('Yes');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_view_boolean_with_on_string()
    {
        $view = $this->blade('<x-view-boolean value="on" />');

        $view->assertSee('Yes');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_view_boolean_with_icon_null()
    {
        $view = $this->blade('<x-view-boolean value="true" :icon="null" />');

        $view->assertSee('Yes');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_boolean_with_label_null()
    {
        $view = $this->blade('<x-view-boolean value="true" :label="null" />');

        $view->assertSee('Yes');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_boolean_with_boolean_true()
    {
        $view = $this->blade('<x-view-boolean :value="true" />');

        $view->assertSee('Yes');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_view_boolean_with_boolean_false()
    {
        $view = $this->blade('<x-view-boolean :value="false" />');

        $view->assertSee('No');
        $view->assertSee('badge-warning');
    }
}
