<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewEmptyTest extends TestCase
{
    /** @test */
    public function it_renders_basic_empty_state()
    {
        $view = $this->blade('<x-view-empty />');

        $view->assertSee('No results found');
        $view->assertSee('Try adjusting your search or filter to find what you\'re looking for.');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_custom_title()
    {
        $view = $this->blade('<x-view-empty title="Custom Title" />');

        $view->assertSee('Custom Title');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_custom_subtitle()
    {
        $view = $this->blade('<x-view-empty subtitle="Custom subtitle" />');

        $view->assertSee('Custom subtitle');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_both_custom_title_and_subtitle()
    {
        $view = $this->blade('<x-view-empty title="Custom Title" subtitle="Custom subtitle" />');

        $view->assertSee('Custom Title');
        $view->assertSee('Custom subtitle');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_slot_content()
    {
        $view = $this->blade('<x-view-empty><button>Action</button></x-view-empty>');

        $view->assertSee('Action');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_complex_slot_content()
    {
        $view = $this->blade('<x-view-empty><div class="actions"><button>Primary</button><button>Secondary</button></div></x-view-empty>');

        $view->assertSee('Primary');
        $view->assertSee('Secondary');
        $view->assertSee('actions');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_custom_classes()
    {
        $view = $this->blade('<x-view-empty class="custom-class" />');

        $view->assertSee('custom-class');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_multiple_custom_classes()
    {
        $view = $this->blade('<x-view-empty class="custom-class empty-highlight" />');

        $view->assertSee('custom-class');
        $view->assertSee('empty-highlight');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_custom_id()
    {
        $view = $this->blade('<x-view-empty id="empty-1" />');

        $view->assertSee('id="empty-1"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_data_attributes()
    {
        $view = $this->blade('<x-view-empty data-test="empty-component" data-type="display-empty" />');

        $view->assertSee('data-test="empty-component"');
        $view->assertSee('data-type="display-empty"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_aria_attributes()
    {
        $view = $this->blade('<x-view-empty aria-label="Empty state display" aria-describedby="empty-description" />');

        $view->assertSee('aria-label="Empty state display"');
        $view->assertSee('aria-describedby="empty-description"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_role_attribute()
    {
        $view = $this->blade('<x-view-empty role="region" />');

        $view->assertSee('role="region"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_inline_styles()
    {
        $view = $this->blade('<x-view-empty style="background: #f8f9fa;" />');

        $view->assertSee('style="background: #f8f9fa;"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_tabindex()
    {
        $view = $this->blade('<x-view-empty tabindex="0" />');

        $view->assertSee('tabindex="0"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_all_features()
    {
        $view = $this->blade('<x-view-empty title="Custom Title" subtitle="Custom subtitle" class="custom-class" id="empty-1" />');

        $view->assertSee('Custom Title');
        $view->assertSee('Custom subtitle');
        $view->assertSee('custom-class');
        $view->assertSee('id="empty-1"');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_svg_illustration()
    {
        $view = $this->blade('<x-view-empty />');

        $view->assertSee('empty-img');
        $view->assertSee('svg');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_empty_title_class()
    {
        $view = $this->blade('<x-view-empty />');

        $view->assertSee('empty-title');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_empty_subtitle_class()
    {
        $view = $this->blade('<x-view-empty />');

        $view->assertSee('empty-subtitle');
        $view->assertSee('text-secondary');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_empty_action_class()
    {
        $view = $this->blade('<x-view-empty><button>Action</button></x-view-empty>');

        $view->assertSee('empty-action');
        $view->assertSee('Action');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_long_title()
    {
        $longTitle = 'This is a very long title that might exceed normal length expectations and should still render properly';
        $view = $this->blade('<x-view-empty :title="$title" />', ['title' => $longTitle]);

        $view->assertSee($longTitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_long_subtitle()
    {
        $longSubtitle = 'This is a very long subtitle that might exceed normal length expectations and should still render properly with proper text wrapping and formatting';
        $view = $this->blade('<x-view-empty :subtitle="$subtitle" />', ['subtitle' => $longSubtitle]);

        $view->assertSee($longSubtitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_special_characters_in_title()
    {
        $specialTitle = 'Special Characters: & < > " \' &amp; &lt; &gt; &quot; &#39;';
        $view = $this->blade('<x-view-empty :title="$title" />', ['title' => $specialTitle]);

        $view->assertSee($specialTitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_special_characters_in_subtitle()
    {
        $specialSubtitle = 'Special Characters: & < > " \' &amp; &lt; &gt; &quot; &#39;';
        $view = $this->blade('<x-view-empty :subtitle="$subtitle" />', ['subtitle' => $specialSubtitle]);

        $view->assertSee($specialSubtitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_unicode_characters()
    {
        $unicodeTitle = 'Unicode: 中文 Español Français Deutsch 日本語';
        $view = $this->blade('<x-view-empty :title="$title" />', ['title' => $unicodeTitle]);

        $view->assertSee($unicodeTitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_html_in_title()
    {
        $htmlTitle = '<strong>Bold Title</strong> with <em>emphasis</em>';
        $view = $this->blade('<x-view-empty :title="$title" />', ['title' => $htmlTitle]);

        $view->assertSee($htmlTitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_html_in_subtitle()
    {
        $htmlSubtitle = '<strong>Bold Subtitle</strong> with <em>emphasis</em>';
        $view = $this->blade('<x-view-empty :subtitle="$subtitle" />', ['subtitle' => $htmlSubtitle]);

        $view->assertSee($htmlSubtitle);
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_empty_title()
    {
        $view = $this->blade('<x-view-empty title="" />');

        $view->assertSee('empty');
        $view->assertDontSee('No results found');
    }

    /** @test */
    public function it_renders_empty_state_with_empty_subtitle()
    {
        $view = $this->blade('<x-view-empty subtitle="" />');

        $view->assertSee('No results found');
        $view->assertSee('empty');
        $view->assertDontSee('Try adjusting your search or filter to find what you\'re looking for.');
    }

    /** @test */
    public function it_renders_empty_state_with_null_title()
    {
        $view = $this->blade('<x-view-empty :title="null" />');

        $view->assertSee('No results found');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_null_subtitle()
    {
        $view = $this->blade('<x-view-empty :subtitle="null" />');

        $view->assertSee('Try adjusting your search or filter to find what you\'re looking for.');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_form_elements_in_slot()
    {
        $view = $this->blade('<x-view-empty><form><input type="text" name="search" /><button type="submit">Search</button></form></x-view-empty>');

        $view->assertSee('input');
        $view->assertSee('Search');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_button_group_in_slot()
    {
        $view = $this->blade('<x-view-empty><div class="btn-group"><button class="btn btn-primary">Primary</button><button class="btn btn-secondary">Secondary</button></div></x-view-empty>');

        $view->assertSee('btn-group');
        $view->assertSee('Primary');
        $view->assertSee('Secondary');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_icon_in_slot()
    {
        $view = $this->blade('<x-view-empty><i class="fas fa-plus"></i> Add Item</x-view-empty>');

        $view->assertSee('fas fa-plus');
        $view->assertSee('Add Item');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_link_in_slot()
    {
        $view = $this->blade('<x-view-empty><a href="/create" class="btn btn-link">Create New</a></x-view-empty>');

        $view->assertSee('href="/create"');
        $view->assertSee('Create New');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_multiple_buttons_in_slot()
    {
        $view = $this->blade('<x-view-empty><button class="btn btn-primary">Primary Action</button><button class="btn btn-outline-secondary">Secondary Action</button><button class="btn btn-link">Link Action</button></x-view-empty>');

        $view->assertSee('Primary Action');
        $view->assertSee('Secondary Action');
        $view->assertSee('Link Action');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_custom_styling_classes()
    {
        $view = $this->blade('<x-view-empty class="empty-custom empty-highlight empty-border" />');

        $view->assertSee('empty-custom');
        $view->assertSee('empty-highlight');
        $view->assertSee('empty-border');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_responsive_classes()
    {
        $view = $this->blade('<x-view-empty class="empty-responsive d-none d-md-block" />');

        $view->assertSee('empty-responsive');
        $view->assertSee('d-none d-md-block');
        $view->assertSee('empty');
    }

    /** @test */
    public function it_renders_empty_state_with_utility_classes()
    {
        $view = $this->blade('<x-view-empty class="text-center bg-light p-4 rounded" />');

        $view->assertSee('text-center');
        $view->assertSee('bg-light');
        $view->assertSee('p-4');
        $view->assertSee('rounded');
        $view->assertSee('empty');
    }
}
