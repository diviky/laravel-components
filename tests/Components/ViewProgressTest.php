<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewProgressTest extends TestCase
{
    /** @test */
    public function it_renders_view_progress_with_basic_value()
    {
        $view = $this->blade('<x-view-progress value="75" />');

        $view->assertSee('75');
        $view->assertSee('75%');
    }

    /** @test */
    public function it_renders_view_progress_with_icon()
    {
        $view = $this->blade('<x-view-progress value="75" icon="trending-up" />');

        $view->assertSee('75');
        $view->assertSee('trending-up');
    }

    /** @test */
    public function it_renders_view_progress_with_label()
    {
        $view = $this->blade('<x-view-progress value="75" label="Progress: " />');

        $view->assertSee('75');
        $view->assertSee('Progress: ');
    }

    /** @test */
    public function it_renders_view_progress_with_copy_functionality()
    {
        $view = $this->blade('<x-view-progress value="75" copy />');

        $view->assertSee('75');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="75"');
    }

    /** @test */
    public function it_renders_view_progress_with_color_thresholds()
    {
        $view = $this->blade('<x-view-progress value="75" :settings="[\'positive\' => 80, \'negative\' => 30]" />');

        $view->assertSee('75');
    }

    /** @test */
    public function it_renders_view_progress_with_custom_classes()
    {
        $view = $this->blade('<x-view-progress value="75" class="custom-class" />');

        $view->assertSee('75');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_progress_with_custom_id()
    {
        $view = $this->blade('<x-view-progress value="75" id="custom-id" />');

        $view->assertSee('75');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_progress_with_data_attributes()
    {
        $view = $this->blade('<x-view-progress value="75" data-test="progress-component" data-type="display-progress" />');

        $view->assertSee('75');
        $view->assertSee('data-test="progress-component"');
        $view->assertSee('data-type="display-progress"');
    }

    /** @test */
    public function it_renders_view_progress_with_aria_attributes()
    {
        $view = $this->blade('<x-view-progress value="75" aria-label="Progress display" aria-describedby="progress-description" />');

        $view->assertSee('75');
        $view->assertSee('aria-label="Progress display"');
        $view->assertSee('aria-describedby="progress-description"');
    }

    /** @test */
    public function it_renders_view_progress_with_role_attribute()
    {
        $view = $this->blade('<x-view-progress value="75" role="text" />');

        $view->assertSee('75');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_progress_with_tabindex()
    {
        $view = $this->blade('<x-view-progress value="75" tabindex="0" />');

        $view->assertSee('75');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_progress_with_form_attribute()
    {
        $view = $this->blade('<x-view-progress value="75" form="my-form" />');

        $view->assertSee('75');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_progress_with_autocomplete()
    {
        $view = $this->blade('<x-view-progress value="75" autocomplete="off" />');

        $view->assertSee('75');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_progress_with_novalidate()
    {
        $view = $this->blade('<x-view-progress value="75" novalidate />');

        $view->assertSee('75');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_progress_with_accept()
    {
        $view = $this->blade('<x-view-progress value="75" accept="progress/*" />');

        $view->assertSee('75');
        $view->assertSee('accept="progress/*"');
    }

    /** @test */
    public function it_renders_view_progress_with_capture()
    {
        $view = $this->blade('<x-view-progress value="75" capture="environment" />');

        $view->assertSee('75');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_progress_with_max()
    {
        $view = $this->blade('<x-view-progress value="75" max="100" />');

        $view->assertSee('75');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_progress_with_min()
    {
        $view = $this->blade('<x-view-progress value="75" min="5" />');

        $view->assertSee('75');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_progress_with_step()
    {
        $view = $this->blade('<x-view-progress value="75" step="1" />');

        $view->assertSee('75');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_progress_with_pattern()
    {
        $view = $this->blade('<x-view-progress value="75" pattern="[0-9]+" />');

        $view->assertSee('75');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_view_progress_with_spellcheck()
    {
        $view = $this->blade('<x-view-progress value="75" spellcheck="false" />');

        $view->assertSee('75');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_progress_with_translate()
    {
        $view = $this->blade('<x-view-progress value="75" translate="no" />');

        $view->assertSee('75');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_progress_with_contenteditable()
    {
        $view = $this->blade('<x-view-progress value="75" contenteditable="true" />');

        $view->assertSee('75');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_progress_with_contextmenu()
    {
        $view = $this->blade('<x-view-progress value="75" contextmenu="progress-menu" />');

        $view->assertSee('75');
        $view->assertSee('contextmenu="progress-menu"');
    }

    /** @test */
    public function it_renders_view_progress_with_dir()
    {
        $view = $this->blade('<x-view-progress value="75" dir="rtl" />');

        $view->assertSee('75');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_progress_with_draggable()
    {
        $view = $this->blade('<x-view-progress value="75" draggable="true" />');

        $view->assertSee('75');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_progress_with_dropzone()
    {
        $view = $this->blade('<x-view-progress value="75" dropzone="copy" />');

        $view->assertSee('75');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_progress_with_hidden()
    {
        $view = $this->blade('<x-view-progress value="75" hidden />');

        $view->assertSee('75');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_progress_with_lang()
    {
        $view = $this->blade('<x-view-progress value="75" lang="en" />');

        $view->assertSee('75');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_progress_with_authorization_can()
    {
        $view = $this->blade('<x-view-progress value="75" can="view-content" />');

        $view->assertSee('75');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_progress_with_authorization_role()
    {
        $view = $this->blade('<x-view-progress value="75" role="user" />');

        $view->assertSee('75');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_progress_with_authorization_action()
    {
        $view = $this->blade('<x-view-progress value="75" action="view" />');

        $view->assertSee('75');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_progress_with_settings_array()
    {
        $view = $this->blade('<x-view-progress value="75" :settings="[\'positive\' => 80, \'negative\' => 30]" />');

        $view->assertSee('75');
    }

    /** @test */
    public function it_renders_view_progress_with_zero_value()
    {
        $view = $this->blade('<x-view-progress value="0" />');

        $view->assertSee('0');
        $view->assertSee('0%');
    }

    /** @test */
    public function it_renders_view_progress_with_negative_value()
    {
        $view = $this->blade('<x-view-progress value="-10" />');

        $view->assertSee('-10');
        $view->assertSee('-10%');
    }

    /** @test */
    public function it_renders_view_progress_with_decimal_value()
    {
        $view = $this->blade('<x-view-progress value="75.5" />');

        $view->assertSee('75.5');
        $view->assertSee('75.5%');
    }

    /** @test */
    public function it_renders_view_progress_with_100_percent()
    {
        $view = $this->blade('<x-view-progress value="100" />');

        $view->assertSee('100');
        $view->assertSee('100%');
    }

    /** @test */
    public function it_renders_view_progress_with_icon_null()
    {
        $view = $this->blade('<x-view-progress value="75" :icon="null" />');

        $view->assertSee('75');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_view_progress_with_label_null()
    {
        $view = $this->blade('<x-view-progress value="75" :label="null" />');

        $view->assertSee('75');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_progress_with_positive_threshold()
    {
        $view = $this->blade('<x-view-progress value="85" :settings="[\'positive\' => 80]" />');

        $view->assertSee('85');
    }

    /** @test */
    public function it_renders_view_progress_with_negative_threshold()
    {
        $view = $this->blade('<x-view-progress value="25" :settings="[\'negative\' => 30]" />');

        $view->assertSee('25');
    }

    /** @test */
    public function it_renders_view_progress_with_both_thresholds()
    {
        $view = $this->blade('<x-view-progress value="50" :settings="[\'positive\' => 80, \'negative\' => 30]" />');

        $view->assertSee('50');
    }

    /** @test */
    public function it_renders_view_progress_with_progress_bar()
    {
        $view = $this->blade('<x-view-progress value="75" />');

        $view->assertSee('75');
        $view->assertSee('progress');
        $view->assertSee('progress-bar');
    }

    /** @test */
    public function it_renders_view_progress_with_percentage_display()
    {
        $view = $this->blade('<x-view-progress value="75" />');

        $view->assertSee('75%');
    }

    /** @test */
    public function it_renders_view_progress_with_custom_height()
    {
        $view = $this->blade('<x-view-progress value="75" />');

        $view->assertSee('75');
        $view->assertSee('height:15px');
    }
}
