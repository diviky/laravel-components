<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewBadgeTest extends TestCase
{
    /** @test */
    public function it_renders_basic_badge()
    {
        $view = $this->blade('<x-view-badge value="Test" />');

        $view->assertSee('Test');
        $view->assertSee('badge');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_custom_color()
    {
        $view = $this->blade('<x-view-badge value="Warning" color="warning" />');

        $view->assertSee('Warning');
        $view->assertSee('badge-warning');
    }

    /** @test */
    public function it_renders_badge_with_icon()
    {
        $view = $this->blade('<x-view-badge value="User" icon="user" />');

        $view->assertSee('user');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_badge_with_label()
    {
        $view = $this->blade('<x-view-badge value="123" label="Notifications" />');

        $view->assertSee('Notifications');
    }

    /** @test */
    public function it_renders_badge_with_copy_functionality()
    {
        $view = $this->blade('<x-view-badge value="Copy Me" copy />');

        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Copy Me"');
    }

    /** @test */
    public function it_renders_badge_with_custom_classes()
    {
        $view = $this->blade('<x-view-badge value="Custom" class="my-custom-badge" />');

        $view->assertSee('Custom');
        $view->assertSee('class="my-custom-badge');
    }

    /** @test */
    public function it_renders_badge_with_custom_id()
    {
        $view = $this->blade('<x-view-badge value="Custom" id="custom-id" />');

        $view->assertSee('Custom');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_badge_with_data_attributes()
    {
        $view = $this->blade('<x-view-badge value="Custom" data-test="badge-component" data-type="display-badge" />');

        $view->assertSee('Custom');
        $view->assertSee('data-test="badge-component"');
        $view->assertSee('data-type="display-badge"');
    }

    /** @test */
    public function it_renders_badge_with_aria_attributes()
    {
        $view = $this->blade('<x-view-badge value="Custom" aria-label="Badge display" aria-describedby="badge-description" />');

        $view->assertSee('Custom');
        $view->assertSee('aria-label="Badge display"');
        $view->assertSee('aria-describedby="badge-description"');
    }

    /** @test */
    public function it_renders_badge_with_role_attribute()
    {
        $view = $this->blade('<x-view-badge value="Custom" role="text" />');

        $view->assertSee('Custom');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_badge_with_tabindex()
    {
        $view = $this->blade('<x-view-badge value="Custom" tabindex="0" />');

        $view->assertSee('Custom');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_badge_with_form_attribute()
    {
        $view = $this->blade('<x-view-badge value="Custom" form="my-form" />');

        $view->assertSee('Custom');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_badge_with_autocomplete()
    {
        $view = $this->blade('<x-view-badge value="Custom" autocomplete="off" />');

        $view->assertSee('Custom');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_badge_with_novalidate()
    {
        $view = $this->blade('<x-view-badge value="Custom" novalidate />');

        $view->assertSee('Custom');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_badge_with_accept()
    {
        $view = $this->blade('<x-view-badge value="Custom" accept="badge/*" />');

        $view->assertSee('Custom');
        $view->assertSee('accept="badge/*"');
    }

    /** @test */
    public function it_renders_badge_with_capture()
    {
        $view = $this->blade('<x-view-badge value="Custom" capture="environment" />');

        $view->assertSee('Custom');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_badge_with_max()
    {
        $view = $this->blade('<x-view-badge value="Custom" max="100" />');

        $view->assertSee('Custom');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_badge_with_min()
    {
        $view = $this->blade('<x-view-badge value="Custom" min="5" />');

        $view->assertSee('Custom');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_badge_with_step()
    {
        $view = $this->blade('<x-view-badge value="Custom" step="1" />');

        $view->assertSee('Custom');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_badge_with_pattern()
    {
        $view = $this->blade('<x-view-badge value="Custom" pattern="[0-9]+" />');

        $view->assertSee('Custom');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_badge_with_spellcheck()
    {
        $view = $this->blade('<x-view-badge value="Custom" spellcheck="false" />');

        $view->assertSee('Custom');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_badge_with_translate()
    {
        $view = $this->blade('<x-view-badge value="Custom" translate="no" />');

        $view->assertSee('Custom');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_badge_with_contenteditable()
    {
        $view = $this->blade('<x-view-badge value="Custom" contenteditable="true" />');

        $view->assertSee('Custom');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_badge_with_contextmenu()
    {
        $view = $this->blade('<x-view-badge value="Custom" contextmenu="badge-menu" />');

        $view->assertSee('Custom');
        $view->assertSee('contextmenu="badge-menu"');
    }

    /** @test */
    public function it_renders_badge_with_dir()
    {
        $view = $this->blade('<x-view-badge value="Custom" dir="rtl" />');

        $view->assertSee('Custom');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_badge_with_draggable()
    {
        $view = $this->blade('<x-view-badge value="Custom" draggable="true" />');

        $view->assertSee('Custom');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_badge_with_dropzone()
    {
        $view = $this->blade('<x-view-badge value="Custom" dropzone="copy" />');

        $view->assertSee('Custom');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_badge_with_hidden()
    {
        $view = $this->blade('<x-view-badge value="Custom" hidden />');

        $view->assertSee('Custom');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_badge_with_lang()
    {
        $view = $this->blade('<x-view-badge value="Custom" lang="en" />');

        $view->assertSee('Custom');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_badge_with_authorization_can()
    {
        $view = $this->blade('<x-view-badge value="Custom" can="view-content" />');

        $view->assertSee('Custom');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_badge_with_authorization_role()
    {
        $view = $this->blade('<x-view-badge value="Custom" role="user" />');

        $view->assertSee('Custom');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_badge_with_authorization_action()
    {
        $view = $this->blade('<x-view-badge value="Custom" action="view" />');

        $view->assertSee('Custom');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_badge_with_settings_array()
    {
        $view = $this->blade('<x-view-badge value="Custom" :settings="[\'validate\' => true]" />');

        $view->assertSee('Custom');
    }

    /** @test */
    public function it_renders_badge_with_different_colors()
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        foreach ($colors as $color) {
            $view = $this->blade("<x-view-badge value=\"$color\" color=\"$color\" />");
            $view->assertSee($color);
            $view->assertSee("badge-$color");
        }
    }

    /** @test */
    public function it_renders_badge_with_icon_null()
    {
        $view = $this->blade('<x-view-badge value="Custom" :icon="null" />');

        $view->assertSee('Custom');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_badge_with_label_null()
    {
        $view = $this->blade('<x-view-badge value="Custom" :label="null" />');

        $view->assertSee('Custom');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_badge_with_copy_false()
    {
        $view = $this->blade('<x-view-badge value="Custom" :copy="false" />');

        $view->assertSee('Custom');
        $view->assertDontSee('copy');
    }

    /** @test */
    public function it_renders_badge_with_empty_value()
    {
        $view = $this->blade('<x-view-badge value="" />');

        $view->assertSee('badge');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_null_value()
    {
        $view = $this->blade('<x-view-badge :value="null" />');

        $view->assertSee('badge');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_numeric_value()
    {
        $view = $this->blade('<x-view-badge value="123" />');

        $view->assertSee('123');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_boolean_value()
    {
        $view = $this->blade('<x-view-badge :value="true" />');

        $view->assertSee('1');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_array_value()
    {
        $view = $this->blade('<x-view-badge :value="[\'name\' => \'Test\']" />');

        $view->assertSee('badge');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_object_value()
    {
        $object = new \stdClass();
        $object->name = 'Test';
        
        $view = $this->blade('<x-view-badge :value="$object" />', ['object' => $object]);

        $view->assertSee('badge');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_complex_value()
    {
        $view = $this->blade('<x-view-badge value="Complex & Special Characters!@#" />');

        $view->assertSee('Complex & Special Characters!@#');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_long_value()
    {
        $longValue = str_repeat('a', 100);
        $view = $this->blade('<x-view-badge :value="$longValue" />', ['longValue' => $longValue]);

        $view->assertSee($longValue);
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_unicode_value()
    {
        $view = $this->blade('<x-view-badge value="Unicode: ñáéíóú" />');

        $view->assertSee('Unicode: ñáéíóú');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_html_value()
    {
        $view = $this->blade('<x-view-badge value="<strong>HTML</strong>" />');

        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_icon_and_label()
    {
        $view = $this->blade('<x-view-badge value="User" icon="user" label="User Status" />');

        $view->assertSee('user');
        $view->assertSee('User Status');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_icon_and_copy()
    {
        $view = $this->blade('<x-view-badge value="Copy" icon="copy" copy />');

        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Copy"');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_label_and_copy()
    {
        $view = $this->blade('<x-view-badge value="Copy" label="Copy Label" copy />');

        $view->assertSee('Copy Label');
        $view->assertSee('data-clipboard="Copy"');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_all_props()
    {
        $view = $this->blade('<x-view-badge value="All" icon="star" label="All Props" color="primary" copy />');

        $view->assertSee('star');
        $view->assertSee('All Props');
        $view->assertSee('badge-primary');
        $view->assertSee('data-clipboard="All"');
    }

    /** @test */
    public function it_renders_badge_with_custom_styling()
    {
        $view = $this->blade('<x-view-badge value="Styled" style="font-size: 18px; padding: 8px 16px;" />');

        $view->assertSee('Styled');
        $view->assertSee('style="font-size: 18px; padding: 8px 16px;"');
        $view->assertSee('badge-success');
    }

    /** @test */
    public function it_renders_badge_with_multiple_classes()
    {
        $view = $this->blade('<x-view-badge value="Multi" class="badge-lg badge-rounded" />');

        $view->assertSee('Multi');
        $view->assertSee('class="badge-lg badge-rounded');
        $view->assertSee('badge-success');
    }
}
