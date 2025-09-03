<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewStatusTest extends TestCase
{
    /** @test */
    public function it_renders_view_status_with_basic_value()
    {
        $view = $this->blade('<x-view-status value="1" />');

        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_view_status_with_icon()
    {
        $view = $this->blade('<x-view-status value="1" icon="check-circle" />');

        $view->assertSee('Active');
        $view->assertSee('check-circle');
    }

    /** @test */
    public function it_renders_view_status_with_label()
    {
        $view = $this->blade('<x-view-status value="1" label="Status: " />');

        $view->assertSee('Active');
        $view->assertSee('Status: ');
    }

    /** @test */
    public function it_renders_view_status_with_copy_functionality()
    {
        $view = $this->blade('<x-view-status value="1" copy />');

        $view->assertSee('Active');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="1"');
    }

    /** @test */
    public function it_renders_view_status_with_animated_dot()
    {
        $view = $this->blade('<x-view-status value="1" animated />');

        $view->assertSee('Active');
        $view->assertSee('status-dot-animated');
    }

    /** @test */
    public function it_renders_view_status_with_custom_options()
    {
        $view = $this->blade('<x-view-status value="pending" :options="[\'pending\' => \'Pending\', \'approved\' => \'Approved\']" />');

        $view->assertSee('Pending');
    }

    /** @test */
    public function it_renders_view_status_with_custom_classes()
    {
        $view = $this->blade('<x-view-status value="1" class="custom-class" />');

        $view->assertSee('Active');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_status_with_custom_id()
    {
        $view = $this->blade('<x-view-status value="1" id="custom-id" />');

        $view->assertSee('Active');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_status_with_data_attributes()
    {
        $view = $this->blade('<x-view-status value="1" data-test="status-component" data-type="display-status" />');

        $view->assertSee('Active');
        $view->assertSee('data-test="status-component"');
        $view->assertSee('data-type="display-status"');
    }

    /** @test */
    public function it_renders_view_status_with_aria_attributes()
    {
        $view = $this->blade('<x-view-status value="1" aria-label="Status display" aria-describedby="status-description" />');

        $view->assertSee('Active');
        $view->assertSee('aria-label="Status display"');
        $view->assertSee('aria-describedby="status-description"');
    }

    /** @test */
    public function it_renders_view_status_with_role_attribute()
    {
        $view = $this->blade('<x-view-status value="1" role="text" />');

        $view->assertSee('Active');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_status_with_tabindex()
    {
        $view = $this->blade('<x-view-status value="1" tabindex="0" />');

        $view->assertSee('Active');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_status_with_form_attribute()
    {
        $view = $this->blade('<x-view-status value="1" form="my-form" />');

        $view->assertSee('Active');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_status_with_autocomplete()
    {
        $view = $this->blade('<x-view-status value="1" autocomplete="off" />');

        $view->assertSee('Active');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_status_with_novalidate()
    {
        $view = $this->blade('<x-view-status value="1" novalidate />');

        $view->assertSee('Active');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_status_with_accept()
    {
        $view = $this->blade('<x-view-status value="1" accept="status/*" />');

        $view->assertSee('Active');
        $view->assertSee('accept="status/*"');
    }

    /** @test */
    public function it_renders_view_status_with_capture()
    {
        $view = $this->blade('<x-view-status value="1" capture="environment" />');

        $view->assertSee('Active');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_status_with_max()
    {
        $view = $this->blade('<x-view-status value="1" max="100" />');

        $view->assertSee('Active');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_status_with_min()
    {
        $view = $this->blade('<x-view-status value="1" min="5" />');

        $view->assertSee('Active');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_status_with_step()
    {
        $view = $this->blade('<x-view-status value="1" step="1" />');

        $view->assertSee('Active');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_status_with_pattern()
    {
        $view = $this->blade('<x-view-status value="1" pattern="[0-9]+" />');

        $view->assertSee('Active');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_view_status_with_spellcheck()
    {
        $view = $this->blade('<x-view-status value="1" spellcheck="false" />');

        $view->assertSee('Active');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_status_with_translate()
    {
        $view = $this->blade('<x-view-status value="1" translate="no" />');

        $view->assertSee('Active');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_status_with_contenteditable()
    {
        $view = $this->blade('<x-view-status value="1" contenteditable="true" />');

        $view->assertSee('Active');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_status_with_contextmenu()
    {
        $view = $this->blade('<x-view-status value="1" contextmenu="status-menu" />');

        $view->assertSee('Active');
        $view->assertSee('contextmenu="status-menu"');
    }

    /** @test */
    public function it_renders_view_status_with_dir()
    {
        $view = $this->blade('<x-view-status value="1" dir="rtl" />');

        $view->assertSee('Active');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_status_with_draggable()
    {
        $view = $this->blade('<x-view-status value="1" draggable="true" />');

        $view->assertSee('Active');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_status_with_dropzone()
    {
        $view = $this->blade('<x-view-status value="1" dropzone="copy" />');

        $view->assertSee('Active');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_status_with_hidden()
    {
        $view = $this->blade('<x-view-status value="1" hidden />');

        $view->assertSee('Active');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_status_with_lang()
    {
        $view = $this->blade('<x-view-status value="1" lang="en" />');

        $view->assertSee('Active');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_status_with_authorization_can()
    {
        $view = $this->blade('<x-view-status value="1" can="view-content" />');

        $view->assertSee('Active');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_status_with_authorization_role()
    {
        $view = $this->blade('<x-view-status value="1" role="user" />');

        $view->assertSee('Active');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_status_with_authorization_action()
    {
        $view = $this->blade('<x-view-status value="1" action="view" />');

        $view->assertSee('Active');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_status_with_settings_array()
    {
        $view = $this->blade('<x-view-status value="1" :settings="[\'validate\' => true]" />');

        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_view_status_with_zero_value()
    {
        $view = $this->blade('<x-view-status value="0" />');

        $view->assertSee('Inactive');
    }

    /** @test */
    public function it_renders_view_status_with_string_value()
    {
        $view = $this->blade('<x-view-status value="pending" :options="[\'pending\' => \'Pending\', \'approved\' => \'Approved\']" />');

        $view->assertSee('Pending');
    }

    /** @test */
    public function it_renders_view_status_with_icon_null()
    {
        $view = $this->blade('<x-view-status value="1" :icon="null" />');

        $view->assertSee('Active');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_status_with_label_null()
    {
        $view = $this->blade('<x-view-status value="1" :label="null" />');

        $view->assertSee('Active');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_status_with_dot_true()
    {
        $view = $this->blade('<x-view-status value="1" dot />');

        $view->assertSee('Active');
        $view->assertSee('status-dot');
    }

    /** @test */
    public function it_renders_view_status_with_dot_false()
    {
        $view = $this->blade('<x-view-status value="1" :dot="false" />');

        $view->assertSee('Active');
        $view->assertDontSee('status-dot');
    }

    /** @test */
    public function it_renders_view_status_with_animated_true()
    {
        $view = $this->blade('<x-view-status value="1" animated />');

        $view->assertSee('Active');
        $view->assertSee('status-dot-animated');
    }

    /** @test */
    public function it_renders_view_status_with_animated_false()
    {
        $view = $this->blade('<x-view-status value="1" :animated="false" />');

        $view->assertSee('Active');
        $view->assertDontSee('status-dot-animated');
    }

    /** @test */
    public function it_renders_view_status_with_default_options()
    {
        $view = $this->blade('<x-view-status value="1" />');

        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_view_status_with_custom_options_mapping()
    {
        $view = $this->blade('<x-view-status value="approved" :options="[\'approved\' => \'Approved\', \'rejected\' => \'Rejected\']" />');

        $view->assertSee('Approved');
    }

    /** @test */
    public function it_renders_view_status_with_complex_options()
    {
        $view = $this->blade('<x-view-status value="warning" :options="[\'warning\' => [\'text\' => \'Warning\', \'color\' => \'warning\', \'animated\' => true]]" />');

        $view->assertSee('Warning');
    }

    /** @test */
    public function it_renders_view_status_with_status_badge()
    {
        $view = $this->blade('<x-view-status value="1" />');

        $view->assertSee('Active');
        $view->assertSee('status');
        $view->assertSee('status-success');
    }

    /** @test */
    public function it_renders_view_status_with_inactive_value()
    {
        $view = $this->blade('<x-view-status value="0" />');

        $view->assertSee('Inactive');
        $view->assertSee('status-warning');
    }

    /** @test */
    public function it_renders_view_status_with_custom_status_class()
    {
        $view = $this->blade('<x-view-status value="1" class="custom-status" />');

        $view->assertSee('Active');
        $view->assertSee('custom-status');
    }
}
