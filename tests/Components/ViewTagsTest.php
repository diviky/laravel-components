<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewTagsTest extends TestCase
{
    /** @test */
    public function it_renders_tags_collection()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
    }

    /** @test */
    public function it_respects_limit_prop()
    {
        $tags = range(1, 15);
        $view = $this->blade('<x-view-tags :values="$tags" :limit="5" />', ['tags' => $tags]);

        $view->assertSee('1');
        $view->assertSee('5');
        $view->assertSee('+ 10');
        $view->assertDontSee('6');
    }

    /** @test */
    public function it_handles_empty_collection()
    {
        $view = $this->blade('<x-view-tags :values="[]" />');

        $view->assertDontSee('x-view-tags');
    }

    /** @test */
    public function it_renders_array_values()
    {
        $tags = [
            ['name' => 'Laravel', 'color' => 'success'],
            ['name' => 'Vue.js', 'color' => 'info'],
        ];
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
    }

    /** @test */
    public function it_renders_with_default_limit()
    {
        $tags = range(1, 15);
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('1');
        $view->assertSee('10');
        $view->assertSee('+ 5');
        $view->assertDontSee('11');
    }

    /** @test */
    public function it_renders_with_custom_limit()
    {
        $tags = range(1, 20);
        $view = $this->blade('<x-view-tags :values="$tags" :limit="7" />', ['tags' => $tags]);

        $view->assertSee('1');
        $view->assertSee('7');
        $view->assertSee('+ 13');
        $view->assertDontSee('8');
    }

    /** @test */
    public function it_renders_with_limit_greater_than_collection()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="10" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_limit_equal_to_collection()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js', 'React'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="4" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertSee('React');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_limit_one()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="1" />', ['tags' => $tags]);

        $view->assertSee('1');
        $view->assertSee('+ 2');
        $view->assertDontSee('Laravel');
        $view->assertDontSee('Vue.js');
    }

    /** @test */
    public function it_renders_with_custom_classes()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" class="my-custom-tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('class="my-custom-tags');
    }

    /** @test */
    public function it_renders_with_custom_id()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" id="custom-id" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('id="custom-id"');
    }

    /** @test */
    public function it_renders_with_data_attributes()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" data-test="tags-component" data-type="display-tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('data-test="tags-component"');
        $view->assertSee('data-type="display-tags"');
    }

    /** @test */
    public function it_renders_with_aria_attributes()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" aria-label="Tags display" aria-describedby="tags-description" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('aria-label="Tags display"');
        $view->assertSee('aria-describedby="tags-description"');
    }

    /** @test */
    public function it_renders_with_role_attribute()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tag :values="$tags" role="list" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('role="list"');
    }

    /** @test */
    public function it_renders_with_tabindex()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" tabindex="0" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_with_form_attribute()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" form="my-form" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_with_autocomplete()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" autocomplete="off" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_with_novalidate()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" novalidate />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_with_accept()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" accept="tags/*" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('accept="tags/*"');
    }

    /** @test */
    public function it_renders_with_capture()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" capture="environment" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_with_max()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" max="100" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_with_min()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" min="5" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('min="5"');
    }

    /** @test */
    public function it_renders_with_step()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" step="1" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('step="1"');
    }

    /** @test */
    public function it_renders_with_pattern()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" pattern="[0-9]+" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('pattern="[0-9]+"');
    }

    /** @test */
    public function it_renders_with_spellcheck()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" spellcheck="false" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_with_translate()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" translate="no" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_with_contenteditable()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" contenteditable="true" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_with_contextmenu()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" contextmenu="tags-menu" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('contextmenu="tags-menu"');
    }

    /** @test */
    public function it_renders_with_dir()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" dir="rtl" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_with_draggable()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" draggable="true" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_with_dropzone()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" dropzone="copy" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_with_hidden()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" hidden />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_with_lang()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" lang="en" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_with_authorization_can()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" can="view-content" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('can="view-content"');
    }

    /** @test */
    public function it_renders_with_authorization_role()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" role="user" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_with_authorization_action()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" action="view" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('action="view"');
    }

    /** @test */
    public function it_renders_with_null_values()
    {
        $view = $this->blade('<x-view-tags :values="null" />');

        $view->assertDontSee('x-view-tags');
    }

    /** @test */
    public function it_renders_with_string_values()
    {
        $view = $this->blade('<x-view-tags values="not-an-array" />');

        $view->assertDontSee('x-view-tags');
    }

    /** @test */
    public function it_renders_with_numeric_values()
    {
        $view = $this->blade('<x-view-tags :values="123" />');

        $view->assertDontSee('x-view-tags');
    }

    /** @test */
    public function it_renders_with_boolean_values()
    {
        $view = $this->blade('<x-view-tags :values="true" />');

        $view->assertDontSee('x-view-tags');
    }

    /** @test */
    public function it_renders_with_object_values()
    {
        $object = new \stdClass;
        $object->tags = ['PHP', 'Laravel'];

        $view = $this->blade('<x-view-tags :values="$object" />', ['object' => $object]);

        $view->assertDontSee('x-view-tags');
    }

    /** @test */
    public function it_renders_with_collection_values()
    {
        $tags = collect(['PHP', 'Laravel', 'Vue.js']);
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
    }

    /** @test */
    public function it_renders_with_iterator_values()
    {
        $tags = new \ArrayIterator(['PHP', 'Laravel', 'Vue.js']);
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
    }

    /** @test */
    public function it_renders_with_limit_zero()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="0" />', ['tags' => $tags]);

        $view->assertDontSee('PHP');
        $view->assertDontSee('Laravel');
        $view->assertDontSee('Vue.js');
        $view->assertSee('+ 3');
    }

    /** @test */
    public function it_renders_with_negative_limit()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="-1" />', ['tags' => $tags]);

        $view->assertDontSee('PHP');
        $view->assertDontSee('Laravel');
        $view->assertDontSee('Vue.js');
        $view->assertSee('+ 3');
    }

    /** @test */
    public function it_renders_with_float_limit()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="2.5" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('+ 1');
        $view->assertDontSee('Vue.js');
    }

    /** @test */
    public function it_renders_with_string_limit()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" limit="2" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('+ 1');
        $view->assertDontSee('Vue.js');
    }

    /** @test */
    public function it_renders_with_null_limit()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="null" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_empty_string_limit()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js'];
        $view = $this->blade('<x-view-tags :values="$tags" limit="" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_single_tag()
    {
        $tags = ['PHP'];
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_two_tags()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_exactly_limit_tags()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js', 'React', 'Angular'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="5" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertSee('React');
        $view->assertSee('Angular');
        $view->assertDontSee('+');
    }

    /** @test */
    public function it_renders_with_one_more_than_limit()
    {
        $tags = ['PHP', 'Laravel', 'Vue.js', 'React', 'Angular', 'Svelte'];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="5" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertSee('React');
        $view->assertSee('Angular');
        $view->assertSee('+ 1');
        $view->assertDontSee('Svelte');
    }

    /** @test */
    public function it_renders_with_custom_styling()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" style="background: #f8f9fa; padding: 20px;" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('style="background: #f8f9fa; padding: 20px;"');
    }

    /** @test */
    public function it_renders_with_multiple_classes()
    {
        $tags = ['PHP', 'Laravel'];
        $view = $this->blade('<x-view-tags :values="$tags" class="tags-container tags-responsive" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('class="tags-container tags-responsive');
    }

    /** @test */
    public function it_renders_with_complex_array_values()
    {
        $tags = [
            ['name' => 'Laravel', 'color' => 'success', 'version' => '10.x'],
            ['name' => 'Vue.js', 'color' => 'info', 'version' => '3.x'],
            ['name' => 'React', 'color' => 'primary', 'version' => '18.x'],
        ];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="2" />', ['tags' => $tags]);

        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertSee('+ 1');
        $view->assertDontSee('React');
    }

    /** @test */
    public function it_renders_with_mixed_value_types()
    {
        $tags = [
            'PHP',
            ['name' => 'Laravel', 'color' => 'success'],
            'Vue.js',
            (object) ['name' => 'React', 'color' => 'primary'],
        ];
        $view = $this->blade('<x-view-tags :values="$tags" :limit="3" />', ['tags' => $tags]);

        $view->assertSee('PHP');
        $view->assertSee('Laravel');
        $view->assertSee('Vue.js');
        $view->assertSee('+ 1');
        $view->assertDontSee('React');
    }
}
