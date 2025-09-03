<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewDateTest extends TestCase
{
    /** @test */
    public function it_renders_view_date_with_basic_value()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" />');

        $view->assertSee('Jan 15, 2024');
    }

    /** @test */
    public function it_renders_view_date_with_label()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" label="Created: " />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('Created: ');
    }

    /** @test */
    public function it_renders_view_date_with_icon()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" icon="calendar" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('calendar');
    }

    /** @test */
    public function it_renders_view_date_with_copy_functionality()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" copy />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="2024-01-15"');
    }

    /** @test */
    public function it_renders_view_date_with_custom_classes()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" class="custom-class" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_date_with_custom_id()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" id="custom-id" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_date_with_data_attributes()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" data-test="date-component" data-type="display-date" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('data-test="date-component"');
        $view->assertSee('data-type="display-date"');
    }

    /** @test */
    public function it_renders_view_date_with_aria_attributes()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" aria-label="Date display" aria-describedby="date-description" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('aria-label="Date display"');
        $view->assertSee('aria-describedby="date-description"');
    }

    /** @test */
    public function it_renders_view_date_with_role_attribute()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" role="text" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_date_with_tabindex()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" tabindex="0" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_date_with_form_attribute()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" form="my-form" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_date_with_autocomplete()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" autocomplete="off" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_date_with_novalidate()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" novalidate />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_date_with_accept()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" accept="date/*" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('accept="date/*"');
    }

    /** @test */
    public function it_renders_view_date_with_capture()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" capture="environment" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_date_with_max()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" max="2024-12-31" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('max="2024-12-31"');
    }

    /** @test */
    public function it_renders_view_date_with_min()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" min="2020-01-01" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('min="2020-01-01"');
    }

    /** @test */
    public function it_renders_view_date_with_step()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" step="1" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_date_with_pattern()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"');
    }

    /** @test */
    public function it_renders_view_date_with_spellcheck()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" spellcheck="false" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_date_with_translate()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" translate="no" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_date_with_contenteditable()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" contenteditable="true" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_date_with_contextmenu()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" contextmenu="date-menu" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('contextmenu="date-menu"');
    }

    /** @test */
    public function it_renders_view_date_with_dir()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" dir="rtl" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_date_with_draggable()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" draggable="true" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_date_with_dropzone()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" dropzone="copy" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_date_with_hidden()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" hidden />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_date_with_lang()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" lang="en" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_date_with_authorization_can()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" can="view-content" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_date_with_authorization_role()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" role="user" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_date_with_authorization_action()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" action="view" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_date_with_settings_array()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" :settings="[\'format\' => \'Y-m-d\']" />');

        $view->assertSee('Jan 15, 2024');
    }

    /** @test */
    public function it_renders_view_date_with_empty_value()
    {
        $view = $this->blade('<x-view-date value="" />');

        $view->assertDontSee('x-view-date');
    }

    /** @test */
    public function it_renders_view_date_with_null_value()
    {
        $view = $this->blade('<x-view-date :value="null" />');

        $view->assertDontSee('x-view-date');
    }

    /** @test */
    public function it_renders_view_date_with_zero_value()
    {
        $view = $this->blade('<x-view-date value="0" />');

        $view->assertDontSee('x-view-date');
    }

    /** @test */
    public function it_renders_view_date_with_false_value()
    {
        $view = $this->blade('<x-view-date :value="false" />');

        $view->assertDontSee('x-view-date');
    }

    /** @test */
    public function it_renders_view_date_with_different_date_formats()
    {
        $view = $this->blade('<x-view-date value="2024-12-25" />');

        $view->assertSee('Dec 25, 2024');
    }

    /** @test */
    public function it_renders_view_date_with_datetime_string()
    {
        $view = $this->blade('<x-view-date value="2024-01-15 10:30:00" />');

        $view->assertSee('Jan 15, 2024');
    }

    /** @test */
    public function it_renders_view_date_with_timestamp()
    {
        $view = $this->blade('<x-view-date value="1642233600" />');

        $view->assertSee('Jan 15, 2024');
    }

    /** @test */
    public function it_renders_view_date_with_carbon_instance()
    {
        $carbonDate = \Carbon\Carbon::parse('2024-01-15');
        $view = $this->blade('<x-view-date :value="$carbonDate" />', ['carbonDate' => $carbonDate]);

        $view->assertSee('Jan 15, 2024');
    }

    /** @test */
    public function it_renders_view_date_with_default_class()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" />');

        $view->assertSee('class="view-date');
    }

    /** @test */
    public function it_renders_view_date_with_icon_null()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" :icon="null" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_date_with_label_null()
    {
        $view = $this->blade('<x-view-date value="2024-01-15" :label="null" />');

        $view->assertSee('Jan 15, 2024');
        $view->assertDontSee('null');
    }
}
