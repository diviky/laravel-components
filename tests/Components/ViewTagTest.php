<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewTagTest extends TestCase
{
    /** @test */
    public function it_renders_basic_tag()
    {
        $view = $this->blade('<x-view-tag value="Test" />');

        $view->assertSee('Test');
        $view->assertSee('badge');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_array_value()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'Laravel\', \'color\' => \'success\']" />');

        $view->assertSee('Laravel');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_tag_with_custom_field_mapping()
    {
        $view = $this->blade('<x-view-tag :value="[\'title\' => \'Vue.js\', \'theme\' => \'info\']" value-field="title" color-field="theme" />');

        $view->assertSee('Vue.js');
        $view->assertSee('text-info');
    }

    /** @test */
    public function it_renders_tag_with_icon()
    {
        $view = $this->blade('<x-view-tag value="User" icon="user" />');

        $view->assertSee('user');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_tag_with_label()
    {
        $view = $this->blade('<x-view-tag value="123" label="Issues: " />');

        $view->assertSee('Issues: ');
    }

    /** @test */
    public function it_renders_tag_with_copy_functionality()
    {
        $view = $this->blade('<x-view-tag value="Copy Me" copy />');

        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Copy Me"');
    }

    /** @test */
    public function it_renders_tag_with_custom_classes()
    {
        $view = $this->blade('<x-view-tag value="Custom" class="my-custom-tag" />');

        $view->assertSee('Custom');
        $view->assertSee('class="my-custom-tag');
    }

    /** @test */
    public function it_renders_tag_with_custom_id()
    {
        $view = $this->blade('<x-view-tag value="Custom" id="custom-id" />');

        $view->assertSee('Custom');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_tag_with_data_attributes()
    {
        $view = $this->blade('<x-view-tag value="Custom" data-test="tag-component" data-type="display-tag" />');

        $view->assertSee('Custom');
        $view->assertSee('data-test="tag-component"');
        $view->assertSee('data-type="display-tag"');
    }

    /** @test */
    public function it_renders_tag_with_aria_attributes()
    {
        $view = $this->blade('<x-view-tag value="Custom" aria-label="Tag display" aria-describedby="tag-description" />');

        $view->assertSee('Custom');
        $view->assertSee('aria-label="Tag display"');
        $view->assertSee('aria-describedby="tag-description"');
    }

    /** @test */
    public function it_renders_tag_with_role_attribute()
    {
        $view = $this->blade('<x-view-tag value="Custom" role="text" />');

        $view->assertSee('Custom');
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_tag_with_tabindex()
    {
        $view = $this->blade('<x-view-tag value="Custom" tabindex="0" />');

        $view->assertSee('Custom');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_tag_with_form_attribute()
    {
        $view = $this->blade('<x-view-tag value="Custom" form="my-form" />');

        $view->assertSee('Custom');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_tag_with_autocomplete()
    {
        $view = $this->blade('<x-view-tag value="Custom" autocomplete="off" />');

        $view->assertSee('Custom');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_tag_with_novalidate()
    {
        $view = $this->blade('<x-view-tag value="Custom" novalidate />');

        $view->assertSee('Custom');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_tag_with_accept()
    {
        $view = $this->blade('<x-view-tag value="Custom" accept="tag/*" />');

        $view->assertSee('Custom');
        $view->assertSee('accept="tag/*"');
    }

    /** @test */
    public function it_renders_tag_with_capture()
    {
        $view = $this->blade('<x-view-tag value="Custom" capture="environment" />');

        $view->assertSee('Custom');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_tag_with_max()
    {
        $view = $this->blade('<x-view-tag value="Custom" max="100" />');

        $view->assertSee('Custom');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_tag_with_min()
    {
        $view = $this->blade('<x-view-tag value="Custom" min="5" />');

        $view->assertSee('Custom');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_tag_with_step()
    {
        $view = $this->blade('<x-view-tag value="Custom" step="1" />');

        $view->assertSee('Custom');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_tag_with_pattern()
    {
        $view = $this->blade('<x-view-tag value="Custom" pattern="[0-9]+" />');

        $view->assertSee('Custom');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_tag_with_spellcheck()
    {
        $view = $this->blade('<x-view-tag value="Custom" spellcheck="false" />');

        $view->assertSee('Custom');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_tag_with_translate()
    {
        $view = $this->blade('<x-view-tag value="Custom" translate="no" />');

        $view->assertSee('Custom');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_tag_with_contenteditable()
    {
        $view = $this->blade('<x-view-tag value="Custom" contenteditable="true" />');

        $view->assertSee('Custom');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_tag_with_contextmenu()
    {
        $view = $this->blade('<x-view-tag value="Custom" contextmenu="tag-menu" />');

        $view->assertSee('Custom');
        $view->assertSee('contextmenu="tag-menu"');
    }

    /** @test */
    public function it_renders_tag_with_dir()
    {
        $view = $this->blade('<x-view-tag value="Custom" dir="rtl" />');

        $view->assertSee('Custom');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_tag_with_draggable()
    {
        $view = $this->blade('<x-view-tag value="Custom" draggable="true" />');

        $view->assertSee('Custom');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_tag_with_dropzone()
    {
        $view = $this->blade('<x-view-tag value="Custom" dropzone="copy" />');

        $view->assertSee('Custom');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_tag_with_hidden()
    {
        $view = $this->blade('<x-view-tag value="Custom" hidden />');

        $view->assertSee('Custom');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_tag_with_lang()
    {
        $view = $this->blade('<x-view-tag value="Custom" lang="en" />');

        $view->assertSee('Custom');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_tag_with_authorization_can()
    {
        $view = $this->blade('<x-view-tag value="Custom" can="view-content" />');

        $view->assertSee('Custom');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_tag_with_authorization_role()
    {
        $view = $this->blade('<x-view-tag value="Custom" role="user" />');

        $view->assertSee('Custom');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_tag_with_authorization_action()
    {
        $view = $this->blade('<x-view-tag value="Custom" action="view" />');

        $view->assertSee('Custom');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_tag_with_settings_array()
    {
        $view = $this->blade('<x-view-tag value="Custom" :settings="[\'validate\' => true]" />');

        $view->assertSee('Custom');
    }

    /** @test */
    public function it_renders_tag_with_different_colors()
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        foreach ($colors as $color) {
            $view = $this->blade("<x-view-tag value=\"$color\" color=\"$color\" />");
            $view->assertSee($color);
            $view->assertSee("text-$color");
        }
    }

    /** @test */
    public function it_renders_tag_with_icon_null()
    {
        $view = $this->blade('<x-view-tag value="Custom" :icon="null" />');

        $view->assertSee('Custom');
        $view->assertDontSee('me-1');
    }

    /** @test */
    public function it_renders_tag_with_label_null()
    {
        $view = $this->blade('<x-view-tag value="Custom" :label="null" />');

        $view->assertSee('Custom');
        $view->assertDontSee('null');
    }

    /** @test */
    public function it_renders_tag_with_copy_false()
    {
        $view = $this->blade('<x-view-tag value="Custom" :copy="false" />');

        $view->assertSee('Custom');
        $view->assertDontSee('copy');
    }

    /** @test */
    public function it_renders_tag_with_empty_value()
    {
        $view = $this->blade('<x-view-tag value="" />');

        $view->assertDontSee('x-view-tag');
    }

    /** @test */
    public function it_renders_tag_with_null_value()
    {
        $view = $this->blade('<x-view-tag :value="null" />');

        $view->assertDontSee('x-view-tag');
    }

    /** @test */
    public function it_renders_tag_with_numeric_value()
    {
        $view = $this->blade('<x-view-tag value="123" />');

        $view->assertSee('123');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_boolean_value()
    {
        $view = $this->blade('<x-view-tag :value="true" />');

        $view->assertSee('1');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_complex_value()
    {
        $view = $this->blade('<x-view-tag value="Complex & Special Characters!@#" />');

        $view->assertSee('Complex & Special Characters!@#');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_long_value()
    {
        $longValue = str_repeat('a', 100);
        $view = $this->blade('<x-view-tag :value="$longValue" />', ['longValue' => $longValue]);

        $view->assertSee($longValue);
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_unicode_value()
    {
        $view = $this->blade('<x-view-tag value="Unicode: ñáéíóú" />');

        $view->assertSee('Unicode: ñáéíóú');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_html_value()
    {
        $view = $this->blade('<x-view-tag value="<strong>HTML</strong>" />');

        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_icon_and_label()
    {
        $view = $this->blade('<x-view-tag value="User" icon="user" label="User Status" />');

        $view->assertSee('user');
        $view->assertSee('User Status');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_icon_and_copy()
    {
        $view = $this->blade('<x-view-tag value="Copy" icon="copy" copy />');

        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Copy"');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_label_and_copy()
    {
        $view = $this->blade('<x-view-tag value="Copy" label="Copy Label" copy />');

        $view->assertSee('Copy Label');
        $view->assertSee('data-clipboard="Copy"');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_all_props()
    {
        $view = $this->blade('<x-view-tag value="All" icon="star" label="All Props" color="primary" copy />');

        $view->assertSee('star');
        $view->assertSee('All Props');
        $view->assertSee('text-primary');
        $view->assertSee('data-clipboard="All"');
    }

    /** @test */
    public function it_renders_tag_with_custom_styling()
    {
        $view = $this->blade('<x-view-tag value="Styled" style="font-size: 18px; padding: 8px 16px;" />');

        $view->assertSee('Styled');
        $view->assertSee('style="font-size: 18px; padding: 8px 16px;"');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_multiple_classes()
    {
        $view = $this->blade('<x-view-tag value="Multi" class="tag-lg tag-rounded" />');

        $view->assertSee('Multi');
        $view->assertSee('class="tag-lg tag-rounded');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_array_value_and_copy()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'Laravel\', \'color\' => \'success\']" copy />');

        $view->assertSee('Laravel');
        $view->assertSee('text-success');
        $view->assertSee('data-clipboard="Laravel"');
    }

    /** @test */
    public function it_renders_tag_with_array_value_and_icon()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'Vue.js\', \'color\' => \'info\']" icon="code" />');

        $view->assertSee('Vue.js');
        $view->assertSee('text-info');
        $view->assertSee('code');
    }

    /** @test */
    public function it_renders_tag_with_array_value_and_label()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'React\', \'color\' => \'primary\']" label="Framework: " />');

        $view->assertSee('React');
        $view->assertSee('text-primary');
        $view->assertSee('Framework: ');
    }

    /** @test */
    public function it_renders_tag_with_object_value()
    {
        $object = new \stdClass();
        $object->name = 'Laravel';
        $object->color = 'success';
        
        $view = $this->blade('<x-view-tag :value="$object" />', ['object' => $object]);

        $view->assertSee('Laravel');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_tag_with_array_access_object()
    {
        $object = new class implements \ArrayAccess {
            private $data = ['name' => 'Laravel', 'color' => 'success'];
            
            public function offsetExists($offset): bool { return isset($this->data[$offset]); }
            public function offsetGet($offset): mixed { return $this->data[$offset]; }
            public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
            public function offsetUnset($offset): void { unset($this->data[$offset]); }
        };
        
        $view = $this->blade('<x-view-tag :value="$object" />', ['object' => $object]);

        $view->assertSee('Laravel');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_tag_with_custom_value_field()
    {
        $view = $this->blade('<x-view-tag :value="[\'title\' => \'Vue.js\', \'color\' => \'info\']" value-field="title" />');

        $view->assertSee('Vue.js');
        $view->assertSee('text-info');
    }

    /** @test */
    public function it_renders_tag_with_custom_color_field()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'React\', \'theme\' => \'primary\']" color-field="theme" />');

        $view->assertSee('React');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_tag_with_both_custom_fields()
    {
        $view = $this->blade('<x-view-tag :value="[\'label\' => \'Angular\', \'style\' => \'warning\']" value-field="label" color-field="style" />');

        $view->assertSee('Angular');
        $view->assertSee('text-warning');
    }

    /** @test */
    public function it_renders_tag_with_settings_color_override()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'Laravel\', \'color\' => \'success\']" :settings="[\'color\' => \'warning\']" />');

        $view->assertSee('Laravel');
        $view->assertSee('text-warning');
    }

    /** @test */
    public function it_renders_tag_with_array_value_outline_style()
    {
        $view = $this->blade('<x-view-tag :value="[\'name\' => \'Laravel\', \'color\' => \'success\']" />');

        $view->assertSee('Laravel');
        $view->assertSee('badge-outline');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_tag_with_string_value_no_outline()
    {
        $view = $this->blade('<x-view-tag value="Laravel" />');

        $view->assertSee('Laravel');
        $view->assertDontSee('badge-outline');
        $view->assertSee('text-primary');
    }
}
