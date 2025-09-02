<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormColorsTest extends TestCase
{
    /** @test */
    public function it_renders_form_colors_with_basic_attributes()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-colors');
    }

    /** @test */
    public function it_renders_form_colors_with_label()
    {
        $view = $this->blade('<x-form-colors name="theme_color" label="Theme Color" />');

        $view->assertSee('name="theme_color"');
        $view->assertSee('Theme Color');
    }

    /** @test */
    public function it_renders_form_colors_with_value()
    {
        $view = $this->blade('<x-form-colors name="brand_color" value="blue" />');

        $view->assertSee('name="brand_color"');
        $view->assertSee('blue');
    }

    /** @test */
    public function it_renders_form_colors_with_default_value()
    {
        $view = $this->blade('<x-form-colors name="brand_color" :default="\'blue\'" />');

        $view->assertSee('name="brand_color"');
        $view->assertSee('blue');
    }

    /** @test */
    public function it_renders_form_colors_with_extra_attributes()
    {
        $view = $this->blade('<x-form-colors name="test" :extra-attributes="[\'data-test\' => \'colors\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="colors"');
    }

    /** @test */
    public function it_renders_form_colors_with_custom_class()
    {
        $view = $this->blade('<x-form-colors name="test" class="custom-colors" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-colors');
    }

    /** @test */
    public function it_renders_form_colors_with_custom_id()
    {
        $view = $this->blade('<x-form-colors name="test" id="color-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="color-input"');
    }

    /** @test */
    public function it_renders_form_colors_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_colors_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_colors_with_required_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_colors_with_placeholder()
    {
        $view = $this->blade('<x-form-colors name="test" placeholder="Choose color" />');

        $view->assertSee('name="test"');
        $view->assertSee('Choose color');
    }

    /** @test */
    public function it_renders_form_colors_with_multiple_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" multiple />');

        $view->assertSee('name="test"');
        $view->assertSee('multiple');
    }

    /** @test */
    public function it_renders_form_colors_with_searchable_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" searchable />');

        $view->assertSee('name="test"');
        $view->assertSee('searchable');
    }

    /** @test */
    public function it_renders_form_colors_with_help_slot()
    {
        $view = $this->blade('
            <x-form-colors name="test">
                <x-slot:help>
                    Choose a color that represents your brand identity and appeals to your target audience.
                </x-slot:help>
            </x-form-colors>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('Choose a color that represents your brand identity and appeals to your target audience.');
    }

    /** @test */
    public function it_renders_form_colors_with_default_slot()
    {
        $view = $this->blade('<x-form-colors name="test">Color preview will appear here</x-form-colors>');

        $view->assertSee('name="test"');
        $view->assertSee('Color preview will appear here');
    }

    /** @test */
    public function it_renders_form_colors_with_form_choices()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('<x-form-choices');
    }

    /** @test */
    public function it_renders_form_colors_with_form_label()
    {
        $view = $this->blade('<x-form-colors name="test" label="Test Colors" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Test Colors');
    }

    /** @test */
    public function it_renders_form_colors_with_default_colors()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('blue');
        $view->assertSee('azure');
        $view->assertSee('primary');
        $view->assertSee('indigo');
        $view->assertSee('purple');
        $view->assertSee('orange');
        $view->assertSee('pink');
        $view->assertSee('yellow');
        $view->assertSee('red');
        $view->assertSee('lime');
        $view->assertSee('green');
        $view->assertSee('teal');
        $view->assertSee('cyan');
    }

    /** @test */
    public function it_renders_form_colors_with_social_media_colors()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('facebook');
        $view->assertSee('twitter');
        $view->assertSee('linkedin');
        $view->assertSee('google');
        $view->assertSee('youtube');
        $view->assertSee('vimeo');
        $view->assertSee('dribbble');
        $view->assertSee('github');
        $view->assertSee('instagram');
    }

    /** @test */
    public function it_renders_form_colors_with_color_badges()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('badge bg-blue');
        $view->assertSee('badge bg-primary');
        $view->assertSee('badge bg-facebook');
        $view->assertSee('badge bg-twitter');
    }

    /** @test */
    public function it_renders_form_colors_with_options_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('options="$colors"');
    }

    /** @test */
    public function it_renders_form_colors_with_attributes_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_colors_with_extra_attributes_attribute()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_colors_with_help_rendering()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_colors_with_blue_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('blue');
        $view->assertSee('badge bg-blue');
    }

    /** @test */
    public function it_renders_form_colors_with_azure_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('azure');
        $view->assertSee('badge bg-azure');
    }

    /** @test */
    public function it_renders_form_colors_with_primary_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('primary');
        $view->assertSee('badge bg-primary');
    }

    /** @test */
    public function it_renders_form_colors_with_indigo_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('indigo');
        $view->assertSee('badge bg-indigo');
    }

    /** @test */
    public function it_renders_form_colors_with_purple_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('purple');
        $view->assertSee('badge bg-purple');
    }

    /** @test */
    public function it_renders_form_colors_with_orange_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('orange');
        $view->assertSee('badge bg-orange');
    }

    /** @test */
    public function it_renders_form_colors_with_pink_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('pink');
        $view->assertSee('badge bg-pink');
    }

    /** @test */
    public function it_renders_form_colors_with_yellow_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('yellow');
        $view->assertSee('badge bg-yellow');
    }

    /** @test */
    public function it_renders_form_colors_with_red_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('red');
        $view->assertSee('badge bg-red');
    }

    /** @test */
    public function it_renders_form_colors_with_lime_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('lime');
        $view->assertSee('badge bg-lime');
    }

    /** @test */
    public function it_renders_form_colors_with_green_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('green');
        $view->assertSee('badge bg-green');
    }

    /** @test */
    public function it_renders_form_colors_with_teal_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('teal');
        $view->assertSee('badge bg-teal');
    }

    /** @test */
    public function it_renders_form_colors_with_cyan_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('cyan');
        $view->assertSee('badge bg-cyan');
    }

    /** @test */
    public function it_renders_form_colors_with_facebook_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('facebook');
        $view->assertSee('badge bg-facebook');
    }

    /** @test */
    public function it_renders_form_colors_with_twitter_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('twitter');
        $view->assertSee('badge bg-twitter');
    }

    /** @test */
    public function it_renders_form_colors_with_linkedin_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('linkedin');
        $view->assertSee('badge bg-linkedin');
    }

    /** @test */
    public function it_renders_form_colors_with_google_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('google');
        $view->assertSee('badge bg-google');
    }

    /** @test */
    public function it_renders_form_colors_with_youtube_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('youtube');
        $view->assertSee('badge bg-youtube');
    }

    /** @test */
    public function it_renders_form_colors_with_vimeo_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('vimeo');
        $view->assertSee('badge bg-vimeo');
    }

    /** @test */
    public function it_renders_form_colors_with_dribbble_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('dribbble');
        $view->assertSee('badge bg-dribbble');
    }

    /** @test */
    public function it_renders_form_colors_with_github_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('github');
        $view->assertSee('badge bg-github');
    }

    /** @test */
    public function it_renders_form_colors_with_instagram_color()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('instagram');
        $view->assertSee('badge bg-instagram');
    }

    /** @test */
    public function it_renders_form_colors_with_livewire_integration()
    {
        $view = $this->blade('<x-form-colors name="test" wire:model="brandColor" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="brandColor"');
    }

    /** @test */
    public function it_renders_form_colors_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-colors name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_colors_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-colors name="test" aria-label="Color picker" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Color picker"');
    }

    /** @test */
    public function it_renders_form_colors_with_data_attributes()
    {
        $view = $this->blade('<x-form-colors name="test" data-test="color-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="color-component"');
    }

    /** @test */
    public function it_renders_form_colors_with_component_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('form-colors');
        $view->assertSee('<x-form-choices');
    }

    /** @test */
    public function it_renders_form_colors_with_form_choices_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('<x-form-choices');
        $view->assertSee('options="$colors"');
    }

    /** @test */
    public function it_renders_form_colors_with_attributes_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_colors_with_slot_structure()
    {
        $view = $this->blade('<x-form-colors name="test">Content</x-form-colors>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_colors_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-colors name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-colors>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_colors_with_default_colors_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('blue');
        $view->assertSee('primary');
        $view->assertSee('facebook');
        $view->assertSee('badge bg-blue');
        $view->assertSee('badge bg-primary');
        $view->assertSee('badge bg-facebook');
    }

    /** @test */
    public function it_renders_form_colors_with_color_palette_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('colors');
        $view->assertSee('blue');
        $view->assertSee('azure');
        $view->assertSee('primary');
        $view->assertSee('indigo');
        $view->assertSee('purple');
        $view->assertSee('orange');
        $view->assertSee('pink');
        $view->assertSee('yellow');
        $view->assertSee('red');
        $view->assertSee('lime');
        $view->assertSee('green');
        $view->assertSee('teal');
        $view->assertSee('cyan');
    }

    /** @test */
    public function it_renders_form_colors_with_social_media_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('facebook');
        $view->assertSee('twitter');
        $view->assertSee('linkedin');
        $view->assertSee('google');
        $view->assertSee('youtube');
        $view->assertSee('vimeo');
        $view->assertSee('dribbble');
        $view->assertSee('github');
        $view->assertSee('instagram');
    }

    /** @test */
    public function it_renders_form_colors_with_badge_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('badge bg-blue');
        $view->assertSee('badge bg-azure');
        $view->assertSee('badge bg-primary');
        $view->assertSee('badge bg-indigo');
        $view->assertSee('badge bg-purple');
        $view->assertSee('badge bg-orange');
        $view->assertSee('badge bg-pink');
        $view->assertSee('badge bg-yellow');
        $view->assertSee('badge bg-red');
        $view->assertSee('badge bg-lime');
        $view->assertSee('badge bg-green');
        $view->assertSee('badge bg-teal');
        $view->assertSee('badge bg-cyan');
    }

    /** @test */
    public function it_renders_form_colors_with_social_badge_structure()
    {
        $view = $this->blade('<x-form-colors name="test" />');

        $view->assertSee('badge bg-facebook');
        $view->assertSee('badge bg-twitter');
        $view->assertSee('badge bg-linkedin');
        $view->assertSee('badge bg-google');
        $view->assertSee('badge bg-youtube');
        $view->assertSee('badge bg-vimeo');
        $view->assertSee('badge bg-dribbble');
        $view->assertSee('badge bg-github');
        $view->assertSee('badge bg-instagram');
    }
}
