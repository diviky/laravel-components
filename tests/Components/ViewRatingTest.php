<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewRatingTest extends TestCase
{
    /** @test */
    public function it_renders_view_rating_with_basic_value()
    {
        $view = $this->blade('<x-view-rating value="4" />');

        $view->assertSee('4');
    }

    /** @test */
    public function it_renders_view_rating_with_icon()
    {
        $view = $this->blade('<x-view-rating value="4" icon="star" />');

        $view->assertSee('4');
        $view->assertSee('star');
    }

    /** @test */
    public function it_renders_view_rating_with_label()
    {
        $view = $this->blade('<x-view-rating value="4" label="Rating: " />');

        $view->assertSee('4');
        $view->assertSee('Rating: ');
    }

    /** @test */
    public function it_renders_view_rating_with_custom_rating_scale()
    {
        $view = $this->blade('<x-view-rating value="4" rating="10" />');

        $view->assertSee('4');
    }

    /** @test */
    public function it_renders_view_rating_with_number_icons()
    {
        $view = $this->blade('<x-view-rating value="4" icon="number" />');

        $view->assertSee('4');
        $view->assertSee('number');
    }

    /** @test */
    public function it_renders_view_rating_with_custom_classes()
    {
        $view = $this->blade('<x-view-rating value="4" class="custom-class" />');

        $view->assertSee('4');
        $view->assertSee('class="custom-class');
    }

    /** @test */
    public function it_renders_view_rating_with_custom_id()
    {
        $view = $this->blade('<x-view-rating value="4" id="custom-id" />');

        $view->assertSee('4');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_view_rating_with_data_attributes()
    {
        $view = $this->blade('<x-view-rating value="4" data-test="rating-component" data-type="display-rating" />');

        $view->assertSee('4');
        $view->assertSee('data-test="rating-component"');
        $view->assertSee('data-type="display-rating"');
    }

    /** @test */
    public function it_renders_view_rating_with_aria_attributes()
    {
        $view = $this->blade('<x-view-rating value="4" aria-label="Rating display" aria-describedby="rating-description" />');

        $view->assertSee('4');
        $view->assertSee('aria-label="Rating display"');
        $view->assertSee('aria-describedby="rating-description"');
    }

    /** @test */
    public function it_renders_view_rating_with_role_attribute()
    {
        $view = $this->blade('<x-view-rating value="4" role="text" />');

        $view->assertSee('4');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_view_rating_with_tabindex()
    {
        $view = $this->blade('<x-view-rating value="4" tabindex="0" />');

        $view->assertSee('4');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_view_rating_with_form_attribute()
    {
        $view = $this->blade('<x-view-rating value="4" form="my-form" />');

        $view->assertSee('4');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_view_rating_with_autocomplete()
    {
        $view = $this->blade('<x-view-rating value="4" autocomplete="off" />');

        $view->assertSee('4');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_view_rating_with_novalidate()
    {
        $view = $this->blade('<x-view-rating value="4" novalidate />');

        $view->assertSee('4');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_view_rating_with_accept()
    {
        $view = $this->blade('<x-view-rating value="4" accept="rating/*" />');

        $view->assertSee('4');
        $view->assertSee('accept="rating/*"');
    }

    /** @test */
    public function it_renders_view_rating_with_capture()
    {
        $view = $this->blade('<x-view-rating value="4" capture="environment" />');

        $view->assertSee('4');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_view_rating_with_max()
    {
        $view = $this->blade('<x-view-rating value="4" max="100" />');

        $view->assertSee('4');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_view_rating_with_min()
    {
        $view = $this->blade('<x-view-rating value="4" min="5" />');

        $view->assertSee('4');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_view_rating_with_step()
    {
        $view = $this->blade('<x-view-rating value="4" step="1" />');

        $view->assertSee('4');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_view_rating_with_pattern()
    {
        $view = $this->blade('<x-view-rating value="4" pattern="[0-9]+" />');

        $view->assertSee('4');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_view_rating_with_spellcheck()
    {
        $view = $this->blade('<x-view-rating value="4" spellcheck="false" />');

        $view->assertSee('4');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_view_rating_with_translate()
    {
        $view = $this->blade('<x-view-rating value="4" translate="no" />');

        $view->assertSee('4');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_view_rating_with_contenteditable()
    {
        $view = $this->blade('<x-view-rating value="4" contenteditable="true" />');

        $view->assertSee('4');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_view_rating_with_contextmenu()
    {
        $view = $this->blade('<x-view-rating value="4" contextmenu="rating-menu" />');

        $view->assertSee('4');
        $view->assertSee('contextmenu="rating-menu"');
    }

    /** @test */
    public function it_renders_view_rating_with_dir()
    {
        $view = $this->blade('<x-view-rating value="4" dir="rtl" />');

        $view->assertSee('4');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_view_rating_with_draggable()
    {
        $view = $this->blade('<x-view-rating value="4" draggable="true" />');

        $view->assertSee('4');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_view_rating_with_dropzone()
    {
        $view = $this->blade('<x-view-rating value="4" dropzone="copy" />');

        $view->assertSee('4');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_view_rating_with_hidden()
    {
        $view = $this->blade('<x-view-rating value="4" hidden />');

        $view->assertSee('4');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_view_rating_with_lang()
    {
        $view = $this->blade('<x-view-rating value="4" lang="en" />');

        $view->assertSee('4');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_view_rating_with_authorization_can()
    {
        $view = $this->blade('<x-view-rating value="4" can="view-content" />');

        $view->assertSee('4');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_view_rating_with_authorization_role()
    {
        $view = $this->blade('<x-view-rating value="4" role="user" />');

        $view->assertSee('4');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_view_rating_with_authorization_action()
    {
        $view = $this->blade('<x-view-rating value="4" action="view" />');

        $view->assertSee('4');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_view_rating_with_settings_array()
    {
        $view = $this->blade('<x-view-rating value="4" :settings="[\'icon\' => \'star\', \'rating\' => 10]" />');

        $view->assertSee('4');
    }

    /** @test */
    public function it_renders_view_rating_with_zero_value()
    {
        $view = $this->blade('<x-view-rating value="0" />');

        $view->assertSee('0');
    }

    /** @test */
    public function it_renders_view_rating_with_negative_value()
    {
        $view = $this->blade('<x-view-rating value="-1" />');

        $view->assertSee('-1');
    }

    /** @test */
    public function it_renders_view_rating_with_decimal_value()
    {
        $view = $this->blade('<x-view-rating value="3.5" />');

        $view->assertSee('3.5');
    }

    /** @test */
    public function it_renders_view_rating_with_large_value()
    {
        $view = $this->blade('<x-view-rating value="100" />');

        $view->assertSee('100');
    }

    /** @test */
    public function it_renders_view_rating_with_different_rating_scales()
    {
        $view = $this->blade('<x-view-rating value="4" rating="7" />');

        $view->assertSee('4');
    }

    /** @test */
    public function it_renders_view_rating_with_icon_null()
    {
        $view = $this->blade('<x-view-rating value="4" :icon="null" />');

        $view->assertSee('4');
    }

    /** @test */
    public function it_renders_view_rating_with_label_null()
    {
        $view = $this->blade('<x-view-rating value="4" :label="null" />');

        $view->assertSee('4');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_view_rating_with_settings_override()
    {
        $view = $this->blade('<x-view-rating value="4" icon="heart" :settings="[\'icon\' => \'star\']" />');

        $view->assertSee('4');
        $view->assertSee('star');
    }

    /** @test */
    public function it_renders_view_rating_with_settings_rating_override()
    {
        $view = $this->blade('<x-view-rating value="4" rating="5" :settings="[\'rating\' => 10]" />');

        $view->assertSee('4');
    }

    /** @test */
    public function it_renders_view_rating_with_star_icons()
    {
        $view = $this->blade('<x-view-rating value="4" icon="star" />');

        $view->assertSee('4');
        $view->assertSee('star');
    }

    /** @test */
    public function it_renders_view_rating_with_heart_icons()
    {
        $view = $this->blade('<x-view-rating value="4" icon="heart" />');

        $view->assertSee('4');
        $view->assertSee('heart');
    }

    /** @test */
    public function it_renders_view_rating_with_thumbs_up_icons()
    {
        $view = $this->blade('<x-view-rating value="4" icon="thumbs-up" />');

        $view->assertSee('4');
        $view->assertSee('thumbs-up');
    }
}
