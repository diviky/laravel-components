<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewNumberTest extends TestCase
{
    /** @test */
    public function it_renders_view_number_with_basic_value()
    {
        $view = $this->blade('<x-view-number value="1234.56" />');

        $view->assertSee('1,234.56');
    }

    /** @test */
    public function it_renders_view_number_with_label()
    {
        $view = $this->blade('<x-view-number value="1234.56" label="Total: " />');

        $view->assertSee('1,234.56');
        $view->assertSee('Total: ');
    }

    /** @test */
    public function it_renders_view_number_with_icon()
    {
        $view = $this->blade('<x-view-number value="1234.56" icon="calculator" />');

        $view->assertSee('1,234.56');
        $view->assertSee('calculator');
    }

    /** @test */
    public function it_renders_view_number_with_copy_functionality()
    {
        $view = $this->blade('<x-view-number value="1234.56" copy />');

        $view->assertSee('1,234.56');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="1234.56"');
    }

    /** @test */
    public function it_renders_view_number_with_percent_format()
    {
        $view = $this->blade('<x-view-number value="0.75" format="percent" />');

        $view->assertSee('75%');
    }

    /** @test */
    public function it_renders_view_number_with_abbreviate_format()
    {
        $view = $this->blade('<x-view-number value="1000000" format="abbreviate" />');

        $view->assertSee('1M');
    }

    /** @test */
    public function it_renders_view_number_with_currency_format()
    {
        $view = $this->blade('<x-view-number value="1234.56" format="currency" />');

        $view->assertSee('$1,234.56');
    }

    /** @test */
    public function it_renders_view_number_with_number_format()
    {
        $view = $this->blade('<x-view-number value="1234.56" format="number" />');

        $view->assertSee('1,234.56');
    }

    /** @test */
    public function it_renders_view_number_with_normal_format()
    {
        $view = $this->blade('<x-view-number value="1234.56" format="normal" />');

        $view->assertSee('1234.56');
    }

    /** @test */
    public function it_renders_view_number_with_custom_classes()
    {
        $view = $this->blade('<x-view-number value="1234.56" class="custom-class" />');

        $view->assertSee('1,234.56');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_number_with_custom_id()
    {
        $view = $this->blade('<x-view-number value="1234.56" id="custom-id" />');

        $view->assertSee('1,234.56');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_number_with_data_attributes()
    {
        $view = $this->blade('<x-view-number value="1234.56" data-test="number-component" data-type="display-number" />');

        $view->assertSee('1,234.56');
        $view->assertSee('data-test="number-component"');
        $view->assertSee('data-type="display-number"');
    }

    /** @test */
    public function it_renders_view_number_with_aria_attributes()
    {
        $view = $this->blade('<x-view-number value="1234.56" aria-label="Number display" aria-describedby="number-description" />');

        $view->assertSee('1,234.56');
        $view->assertSee('aria-label="Number display"');
        $view->assertSee('aria-describedby="number-description"');
    }

    /** @test */
    public function it_renders_view_number_with_role_attribute()
    {
        $view = $this->blade('<x-view-number value="1234.56" role="text" />');

        $view->assertSee('1,234.56');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_number_with_tabindex()
    {
        $view = $this->blade('<x-view-number value="1234.56" tabindex="0" />');

        $view->assertSee('1,234.56');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_number_with_form_attribute()
    {
        $view = $this->blade('<x-view-number value="1234.56" form="my-form" />');

        $view->assertSee('1,234.56');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_number_with_autocomplete()
    {
        $view = $this->blade('<x-view-number value="1234.56" autocomplete="off" />');

        $view->assertSee('1,234.56');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_number_with_novalidate()
    {
        $view = $this->blade('<x-view-number value="1234.56" novalidate />');

        $view->assertSee('1,234.56');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_number_with_accept()
    {
        $view = $this->blade('<x-view-number value="1234.56" accept="number/*" />');

        $view->assertSee('1,234.56');
        $view->assertSee('accept="number/*"');
    }

    /** @test */
    public function it_renders_view_number_with_capture()
    {
        $view = $this->blade('<x-view-number value="1234.56" capture="environment" />');

        $view->assertSee('1,234.56');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_number_with_max()
    {
        $view = $this->blade('<x-view-number value="1234.56" max="10000" />');

        $view->assertSee('1,234.56');
        $view->assertSee('max="10000"');
    }

    /** @test */
    public function it_renders_view_number_with_min()
    {
        $view = $this->blade('<x-view-number value="1234.56" min="100" />');

        $view->assertSee('1,234.56');
        $view->assertSee('min="100"');
    }

    /** @test */
    public function it_renders_view_number_with_step()
    {
        $view = $this->blade('<x-view-number value="1234.56" step="100" />');

        $view->assertSee('1,234.56');
        $view->assertSee('step="100"');
    }

    /** @test */
    public function it_renders_view_number_with_pattern()
    {
        $view = $this->blade('<x-view-number value="1234.56" pattern="[0-9]+" />');

        $view->assertSee('1,234.56');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_view_number_with_spellcheck()
    {
        $view = $this->blade('<x-view-number value="1234.56" spellcheck="false" />');

        $view->assertSee('1,234.56');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_number_with_translate()
    {
        $view = $this->blade('<x-view-number value="1234.56" translate="no" />');

        $view->assertSee('1,234.56');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_number_with_contenteditable()
    {
        $view = $this->blade('<x-view-number value="1234.56" contenteditable="true" />');

        $view->assertSee('1,234.56');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_number_with_contextmenu()
    {
        $view = $this->blade('<x-view-number value="1234.56" contextmenu="number-menu" />');

        $view->assertSee('1,234.56');
        $view->assertSee('contextmenu="number-menu"');
    }

    /** @test */
    public function it_renders_view_number_with_dir()
    {
        $view = $this->blade('<x-view-number value="1234.56" dir="rtl" />');

        $view->assertSee('1,234.56');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_number_with_draggable()
    {
        $view = $this->blade('<x-view-number value="1234.56" draggable="true" />');

        $view->assertSee('1,234.56');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_number_with_dropzone()
    {
        $view = $this->blade('<x-view-number value="1234.56" dropzone="copy" />');

        $view->assertSee('1,234.56');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_number_with_hidden()
    {
        $view = $this->blade('<x-view-number value="1234.56" hidden />');

        $view->assertSee('1,234.56');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_number_with_lang()
    {
        $view = $this->blade('<x-view-number value="1234.56" lang="en" />');

        $view->assertSee('1,234.56');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_number_with_authorization_can()
    {
        $view = $this->blade('<x-view-number value="1234.56" can="view-content" />');

        $view->assertSee('1,234.56');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_number_with_authorization_role()
    {
        $view = $this->blade('<x-view-number value="1234.56" role="user" />');

        $view->assertSee('1,234.56');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_number_with_authorization_action()
    {
        $view = $this->blade('<x-view-number value="1234.56" action="view" />');

        $view->assertSee('1,234.56');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_number_with_settings_array()
    {
        $view = $this->blade('<x-view-number value="1234.56" :settings="[\'format\' => \'percent\']" />');

        $view->assertSee('123%');
    }

    /** @test */
    public function it_renders_view_number_with_empty_value()
    {
        $view = $this->blade('<x-view-number value="" />');

        $view->assertDontSee('x-view-number');
    }

    /** @test */
    public function it_renders_view_number_with_null_value()
    {
        $view = $this->blade('<x-view-number :value="null" />');

        $view->assertDontSee('x-view-number');
    }

    /** @test */
    public function it_renders_view_number_with_zero_value()
    {
        $view = $this->blade('<x-view-number value="0" />');

        $view->assertSee('0');
    }

    /** @test */
    public function it_renders_view_number_with_negative_value()
    {
        $view = $this->blade('<x-view-number value="-1234.56" />');

        $view->assertSee('-1,234.56');
    }

    /** @test */
    public function it_renders_view_number_with_large_value()
    {
        $view = $this->blade('<x-view-number value="999999999" />');

        $view->assertSee('999,999,999');
    }

    /** @test */
    public function it_renders_view_number_with_decimal_value()
    {
        $view = $this->blade('<x-view-number value="0.001" />');

        $view->assertSee('0.001');
    }
}
