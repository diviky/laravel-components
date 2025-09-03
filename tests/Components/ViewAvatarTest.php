<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewAvatarTest extends TestCase
{
    /** @test */
    public function it_renders_basic_avatar()
    {
        $view = $this->blade('<x-view-avatar value="Test User" />');

        $view->assertSee('Test User');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_image()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'image\' => \'/avatar.jpg\']" />');

        $view->assertSee('User');
        $view->assertSee('background-image: url(/avatar.jpg)');
    }

    /** @test */
    public function it_renders_avatar_with_custom_size()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'size\' => \'lg\']" />');

        $view->assertSee('User');
        $view->assertSee('avatar-lg');
    }

    /** @test */
    public function it_renders_avatar_with_custom_shape()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'shape\' => \'rounded\']" />');

        $view->assertSee('User');
        $view->assertSee('rounded');
        $view->assertDontSee('rounded-circle');
    }

    /** @test */
    public function it_renders_avatar_with_icon()
    {
        $view = $this->blade('<x-view-avatar value="User" icon="user" />');

        $view->assertSee('User');
        $view->assertSee('user');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_avatar_with_label()
    {
        $view = $this->blade('<x-view-avatar value="User" label="Profile: " />');

        $view->assertSee('User');
        $view->assertSee('Profile: ');
    }

    /** @test */
    public function it_renders_avatar_with_copy_functionality()
    {
        $view = $this->blade('<x-view-avatar value="Copy Me" copy />');

        $view->assertSee('Copy Me');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Copy Me"');
    }

    /** @test */
    public function it_renders_avatar_with_custom_classes()
    {
        $view = $this->blade('<x-view-avatar value="Custom" class="my-custom-avatar" />');

        $view->assertSee('Custom');
        $view->assertSee('class="my-custom-avatar');
    }

    /** @test */
    public function it_renders_avatar_with_custom_id()
    {
        $view = $this->blade('<x-view-avatar value="Custom" id="custom-id" />');

        $view->assertSee('Custom');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_avatar_with_data_attributes()
    {
        $view = $this->blade('<x-view-avatar value="Custom" data-test="avatar-component" data-type="display-avatar" />');

        $view->assertSee('Custom');
        $view->assertSee('data-test="avatar-component"');
        $view->assertSee('data-type="display-avatar"');
    }

    /** @test */
    public function it_renders_avatar_with_aria_attributes()
    {
        $view = $this->blade('<x-view-avatar value="Custom" aria-label="Avatar display" aria-describedby="avatar-description" />');

        $view->assertSee('Custom');
        $view->assertSee('aria-label="Avatar display"');
        $view->assertSee('aria-describedby="avatar-description"');
    }

    /** @test */
    public function it_renders_avatar_with_role_attribute()
    {
        $view = $this->blade('<x-view-avatar value="Custom" role="img" />');

        $view->assertSee('Custom');
        $view->assertSee('role="img"');
    }

    /** @test */
    public function it_renders_avatar_with_tabindex()
    {
        $view = $this->blade('<x-view-avatar value="Custom" tabindex="0" />');

        $view->assertSee('Custom');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_avatar_with_form_attribute()
    {
        $view = $this->blade('<x-view-avatar value="Custom" form="my-form" />');

        $view->assertSee('Custom');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_avatar_with_autocomplete()
    {
        $view = $this->blade('<x-view-avatar value="Custom" autocomplete="off" />');

        $view->assertSee('Custom');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_avatar_with_novalidate()
    {
        $view = $this->blade('<x-view-avatar value="Custom" novalidate />');

        $view->assertSee('Custom');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_avatar_with_accept()
    {
        $view = $this->blade('<x-view-avatar value="Custom" accept="avatar/*" />');

        $view->assertSee('Custom');
        $view->assertSee('accept="avatar/*"');
    }

    /** @test */
    public function it_renders_avatar_with_capture()
    {
        $view = $this->blade('<x-view-avatar value="Custom" capture="environment" />');

        $view->assertSee('Custom');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_avatar_with_max()
    {
        $view = $this->blade('<x-view-avatar value="Custom" max="100" />');

        $view->assertSee('Custom');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_avatar_with_min()
    {
        $view = $this->blade('<x-view-avatar value="Custom" min="5" />');

        $view->assertSee('Custom');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_avatar_with_step()
    {
        $view = $this->blade('<x-view-avatar value="Custom" step="1" />');

        $view->assertSee('Custom');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_avatar_with_pattern()
    {
        $view = $this->blade('<x-view-avatar value="Custom" pattern="[0-9]+" />');

        $view->assertSee('Custom');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_avatar_with_spellcheck()
    {
        $view = $this->blade('<x-view-avatar value="Custom" spellcheck="false" />');

        $view->assertSee('Custom');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_avatar_with_translate()
    {
        $view = $this->blade('<x-view-avatar value="Custom" translate="no" />');

        $view->assertSee('Custom');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_avatar_with_contenteditable()
    {
        $view = $this->blade('<x-view-avatar value="Custom" contenteditable="true" />');

        $view->assertSee('Custom');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_avatar_with_contextmenu()
    {
        $view = $this->blade('<x-view-avatar value="Custom" contextmenu="avatar-menu" />');

        $view->assertSee('Custom');
        $view->assertSee('contextmenu="avatar-menu"');
    }

    /** @test */
    public function it_renders_avatar_with_dir()
    {
        $view = $this->blade('<x-view-avatar value="Custom" dir="rtl" />');

        $view->assertSee('Custom');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_avatar_with_draggable()
    {
        $view = $this->blade('<x-view-avatar value="Custom" draggable="true" />');

        $view->assertSee('Custom');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_avatar_with_dropzone()
    {
        $view = $this->blade('<x-view-avatar value="Custom" dropzone="copy" />');

        $view->assertSee('Custom');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_avatar_with_hidden()
    {
        $view = $this->blade('<x-view-avatar value="Custom" hidden />');

        $view->assertSee('Custom');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_avatar_with_lang()
    {
        $view = $this->blade('<x-view-avatar value="Custom" lang="en" />');

        $view->assertSee('Custom');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_avatar_with_authorization_can()
    {
        $view = $this->blade('<x-view-avatar value="Custom" can="view-content" />');

        $view->assertSee('Custom');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_avatar_with_authorization_role()
    {
        $view = $this->blade('<x-view-avatar value="Custom" role="user" />');

        $view->assertSee('Custom');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_avatar_with_authorization_action()
    {
        $view = $this->blade('<x-view-avatar value="Custom" action="view" />');

        $view->assertSee('Custom');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_avatar_with_settings_array()
    {
        $view = $this->blade('<x-view-avatar value="Custom" :settings="[\'validate\' => true]" />');

        $view->assertSee('Custom');
    }

    /** @test */
    public function it_renders_avatar_with_different_sizes()
    {
        $sizes = ['xs', 'sm', 'md', 'lg', 'xl'];

        foreach ($sizes as $size) {
            $view = $this->blade("<x-view-avatar value=\"User\" :settings=\"['size' => '$size']\" />");
            $view->assertSee('User');
            $view->assertSee("avatar-$size");
        }
    }

    /** @test */
    public function it_renders_avatar_with_different_shapes()
    {
        $shapes = ['circle', 'rounded'];

        foreach ($shapes as $shape) {
            $view = $this->blade("<x-view-avatar value=\"User\" :settings=\"['shape' => '$shape']\" />");
            $view->assertSee('User');

            if ($shape === 'circle') {
                $view->assertSee('rounded-circle');
            } else {
                $view->assertSee('rounded');
                $view->assertDontSee('rounded-circle');
            }
        }
    }

    /** @test */
    public function it_renders_avatar_with_icon_null()
    {
        $view = $this->blade('<x-view-avatar value="Custom" :icon="null" />');

        $view->assertSee('Custom');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_avatar_with_label_null()
    {
        $view = $this->blade('<x-view-avatar value="Custom" :label="null" />');

        $view->assertSee('Custom');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_avatar_with_copy_false()
    {
        $view = $this->blade('<x-view-avatar value="Custom" :copy="false" />');

        $view->assertSee('Custom');
        $view->assertDontSee('copy');
    }

    /** @test */
    public function it_renders_avatar_with_empty_value()
    {
        $view = $this->blade('<x-view-avatar value="" />');

        $view->assertDontSee('x-view-avatar');
    }

    /** @test */
    public function it_renders_avatar_with_null_value()
    {
        $view = $this->blade('<x-view-avatar :value="null" />');

        $view->assertDontSee('x-view-avatar');
    }

    /** @test */
    public function it_renders_avatar_with_numeric_value()
    {
        $view = $this->blade('<x-view-avatar value="123" />');

        $view->assertSee('123');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_boolean_value()
    {
        $view = $this->blade('<x-view-avatar :value="true" />');

        $view->assertSee('1');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_complex_value()
    {
        $view = $this->blade('<x-view-avatar value="Complex & Special Characters!@#" />');

        $view->assertSee('Complex & Special Characters!@#');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_long_value()
    {
        $longValue = str_repeat('a', 100);
        $view = $this->blade('<x-view-avatar :value="$longValue" />', ['longValue' => $longValue]);

        $view->assertSee($longValue);
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_unicode_value()
    {
        $view = $this->blade('<x-view-avatar value="Unicode: ñáéíóú" />');

        $view->assertSee('Unicode: ñáéíóú');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_html_value()
    {
        $view = $this->blade('<x-view-avatar value="<strong>HTML</strong>" />');

        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_icon_and_label()
    {
        $view = $this->blade('<x-view-avatar value="User" icon="user" label="User Status" />');

        $view->assertSee('user');
        $view->assertSee('User Status');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_icon_and_copy()
    {
        $view = $this->blade('<x-view-avatar value="Copy" icon="copy" copy />');

        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Copy"');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_label_and_copy()
    {
        $view = $this->blade('<x-view-avatar value="Copy" label="Copy Label" copy />');

        $view->assertSee('Copy Label');
        $view->assertSee('data-clipboard="Copy"');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_all_props()
    {
        $view = $this->blade('<x-view-avatar value="All" icon="star" label="All Props" copy />');

        $view->assertSee('star');
        $view->assertSee('All Props');
        $view->assertSee('data-clipboard="All"');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_custom_styling()
    {
        $view = $this->blade('<x-view-avatar value="Styled" style="font-size: 18px; padding: 8px 16px;" />');

        $view->assertSee('Styled');
        $view->assertSee('style="font-size: 18px; padding: 8px 16px;"');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_multiple_classes()
    {
        $view = $this->blade('<x-view-avatar value="Multi" class="avatar-lg avatar-rounded" />');

        $view->assertSee('Multi');
        $view->assertSee('class="avatar-lg avatar-rounded');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_image_and_size()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'image\' => \'/avatar.jpg\', \'size\' => \'lg\']" />');

        $view->assertSee('User');
        $view->assertSee('background-image: url(/avatar.jpg)');
        $view->assertSee('avatar-lg');
    }

    /** @test */
    public function it_renders_avatar_with_image_and_shape()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'image\' => \'/avatar.jpg\', \'shape\' => \'rounded\']" />');

        $view->assertSee('User');
        $view->assertSee('background-image: url(/avatar.jpg)');
        $view->assertSee('rounded');
        $view->assertDontSee('rounded-circle');
    }

    /** @test */
    public function it_renders_avatar_with_custom_text_label()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'label\' => \'JD\']" />');

        $view->assertSee('User');
        $view->assertSee('JD');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_avatar_with_custom_text_and_size()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'label\' => \'JS\', \'size\' => \'xl\']" />');

        $view->assertSee('User');
        $view->assertSee('JS');
        $view->assertSee('avatar-xl');
    }

    /** @test */
    public function it_renders_avatar_with_custom_text_and_shape()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'label\' => \'AB\', \'shape\' => \'rounded\']" />');

        $view->assertSee('User');
        $view->assertSee('AB');
        $view->assertSee('rounded');
        $view->assertDontSee('rounded-circle');
    }

    /** @test */
    public function it_renders_avatar_with_all_settings()
    {
        $view = $this->blade('<x-view-avatar value="User" :settings="[\'image\' => \'/avatar.jpg\', \'size\' => \'lg\', \'shape\' => \'rounded\', \'label\' => \'JD\']" />');

        $view->assertSee('User');
        $view->assertSee('background-image: url(/avatar.jpg)');
        $view->assertSee('avatar-lg');
        $view->assertSee('rounded');
        $view->assertDontSee('rounded-circle');
    }

    /** @test */
    public function it_renders_avatar_with_default_settings()
    {
        $view = $this->blade('<x-view-avatar value="User" />');

        $view->assertSee('User');
        $view->assertSee('avatar');
        $view->assertSee('rounded-circle');
        $view->assertSee('avatar-xs');
    }

    /** @test */
    public function it_renders_avatar_with_flexbox_classes()
    {
        $view = $this->blade('<x-view-avatar value="User" />');

        $view->assertSee('User');
        $view->assertSee('d-flex');
        $view->assertSee('align-items-center');
    }

    /** @test */
    public function it_renders_avatar_with_margin_classes()
    {
        $view = $this->blade('<x-view-avatar value="User" />');

        $view->assertSee('User');
        $view->assertSee('mr-1');
    }

    /** @test */
    public function it_renders_avatar_with_cursor_pointer()
    {
        $view = $this->blade('<x-view-avatar value="Copy" copy />');

        $view->assertSee('Copy');
        $view->assertSee('cursor-pointer');
        $view->assertSee('copy to clipboard');
    }
}
