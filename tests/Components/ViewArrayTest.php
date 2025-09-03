<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewArrayTest extends TestCase
{
    /** @test */
    public function it_renders_view_array_with_basic_value()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" />');

        $view->assertSee('Array Item');
    }

    /** @test */
    public function it_renders_view_array_with_icon()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" icon="list" />');

        $view->assertSee('Array Item');
        $view->assertSee('list');
    }

    /** @test */
    public function it_renders_view_array_with_copy_functionality()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" copy />');

        $view->assertSee('Array Item');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_view_array_with_custom_classes()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" class="custom-class" />');

        $view->assertSee('Array Item');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_array_with_custom_id()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" id="custom-id" />');

        $view->assertSee('Array Item');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_array_with_data_attributes()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" data-test="array-component" data-type="display-array" />');

        $view->assertSee('Array Item');
        $view->assertSee('data-test="array-component"');
        $view->assertSee('data-type="display-array"');
    }

    /** @test */
    public function it_renders_view_array_with_aria_attributes()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" aria-label="Array display" aria-describedby="array-description" />');

        $view->assertSee('Array Item');
        $view->assertSee('aria-label="Array display"');
        $view->assertSee('aria-describedby="array-description"');
    }

    /** @test */
    public function it_renders_view_array_with_role_attribute()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" role="text" />');

        $view->assertSee('Array Item');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_array_with_tabindex()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" tabindex="0" />');

        $view->assertSee('Array Item');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_array_with_form_attribute()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" form="my-form" />');

        $view->assertSee('Array Item');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_array_with_autocomplete()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" autocomplete="off" />');

        $view->assertSee('Array Item');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_array_with_novalidate()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" novalidate />');

        $view->assertSee('Array Item');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_array_with_accept()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" accept="array/*" />');

        $view->assertSee('Array Item');
        $view->assertSee('accept="array/*"');
    }

    /** @test */
    public function it_renders_view_array_with_capture()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" capture="environment" />');

        $view->assertSee('Array Item');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_array_with_max()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" max="100" />');

        $view->assertSee('Array Item');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_array_with_min()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" min="5" />');

        $view->assertSee('Array Item');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_array_with_step()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" step="1" />');

        $view->assertSee('Array Item');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_array_with_pattern()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" pattern=".*" />');

        $view->assertSee('Array Item');
        $view->assertSee('pattern=".*"');
    }

    /** @test */
    public function it_renders_view_array_with_spellcheck()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" spellcheck="false" />');

        $view->assertSee('Array Item');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_array_with_translate()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" translate="no" />');

        $view->assertSee('Array Item');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_array_with_contenteditable()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" contenteditable="true" />');

        $view->assertSee('Array Item');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_array_with_contextmenu()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" contextmenu="array-menu" />');

        $view->assertSee('Array Item');
        $view->assertSee('contextmenu="array-menu"');
    }

    /** @test */
    public function it_renders_view_array_with_dir()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" dir="rtl" />');

        $view->assertSee('Array Item');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_array_with_draggable()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" draggable="true" />');

        $view->assertSee('Array Item');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_array_with_dropzone()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" dropzone="copy" />');

        $view->assertSee('Array Item');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_array_with_hidden()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" hidden />');

        $view->assertSee('Array Item');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_array_with_lang()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" lang="en" />');

        $view->assertSee('Array Item');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_array_with_authorization_can()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" can="view-content" />');

        $view->assertSee('Array Item');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_array_with_authorization_role()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" role="user" />');

        $view->assertSee('Array Item');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_array_with_authorization_action()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" action="view" />');

        $view->assertSee('Array Item');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_array_with_settings_array()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" :settings="[\'validate\' => true]" />');

        $view->assertSee('Array Item');
    }

    /** @test */
    public function it_renders_view_array_with_empty_value()
    {
        $view = $this->blade('<x-view-array :value="[]" />');

        $view->assertDontSee('x-view-array');
    }

    /** @test */
    public function it_renders_view_array_with_null_value()
    {
        $view = $this->blade('<x-view-array :value="null" />');

        $view->assertDontSee('x-view-array');
    }

    /** @test */
    public function it_renders_view_array_with_different_array_labels()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Different Label\']" />');

        $view->assertSee('Different Label');
    }

    /** @test */
    public function it_renders_view_array_with_complex_array_label()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Very Long Array Label With Spaces And Special Characters\']" />');

        $view->assertSee('Very Long Array Label With Spaces And Special Characters');
    }

    /** @test */
    public function it_renders_view_array_with_icon_null()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" :icon="null" />');

        $view->assertSee('Array Item');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_array_with_copy_and_icon()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" icon="list" copy />');

        $view->assertSee('Array Item');
        $view->assertSee('list');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_view_array_without_icon()
    {
        $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" />');

        $view->assertSee('Array Item');
        $view->assertDontSee('me-1');
    }
}
