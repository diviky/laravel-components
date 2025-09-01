<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormColorTest extends TestCase
{
    /** @test */
    public function it_renders_form_color_with_basic_attributes()
    {
        $view = $this->blade('<x-form-color name="test_color" />');

        $view->assertSee('name="test_color"');
        $view->assertSee('type="color"');
        $view->assertSee('form-control-color');
    }

    /** @test */
    public function it_renders_form_color_with_value()
    {
        $view = $this->blade('<x-form-color name="theme_color" value="#ff0000" />');

        $view->assertSee('name="theme_color"');
        $view->assertSee('value="#ff0000"');
        $view->assertSee('type="color"');
    }

    /** @test */
    public function it_renders_form_color_with_placeholder()
    {
        $view = $this->blade('<x-form-color name="color" placeholder="Choose a color" />');

        $view->assertSee('name="color"');
        $view->assertSee('placeholder="Choose a color"');
    }

    /** @test */
    public function it_renders_form_color_with_custom_class()
    {
        $view = $this->blade('<x-form-color name="color" class="custom-color-picker" />');

        $view->assertSee('name="color"');
        $view->assertSee('class="custom-color-picker"');
    }

    /** @test */
    public function it_renders_form_color_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-color name="color" disabled />');

        $view->assertSee('name="color"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_color_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-color name="color" readonly />');

        $view->assertSee('name="color"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_color_with_required_attribute()
    {
        $view = $this->blade('<x-form-color name="color" required />');

        $view->assertSee('name="color"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_color_with_autocomplete_attribute()
    {
        $view = $this->blade('<x-form-color name="color" autocomplete="off" />');

        $view->assertSee('name="color"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_form_color_with_custom_id()
    {
        $view = $this->blade('<x-form-color name="color" id="custom-color-id" />');

        $view->assertSee('name="color"');
        $view->assertSee('id="custom-color-id"');
    }

    /** @test */
    public function it_renders_form_color_with_extra_attributes()
    {
        $view = $this->blade('<x-form-color name="color" data-test="color-picker" />');

        $view->assertSee('name="color"');
        $view->assertSee('data-test="color-picker"');
    }

    /** @test */
    public function it_renders_form_color_with_slot_content()
    {
        $view = $this->blade('<x-form-color name="color">Additional content</x-form-color>');

        $view->assertSee('name="color"');
        $view->assertSee('Additional content');
    }

    /** @test */
    public function it_renders_form_colors_with_basic_attributes()
    {
        $view = $this->blade('<x-form-colors name="brand_color" />');

        $view->assertSee('name="brand_color"');
        $view->assertSee('blue');
        $view->assertSee('primary');
    }

    /** @test */
    public function it_renders_form_colors_with_predefined_color_options()
    {
        $view = $this->blade('<x-form-colors name="color" />');

        // Check for basic colors
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
        $view = $this->blade('<x-form-colors name="color" />');

        // Check for social media brand colors
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
    public function it_renders_form_colors_with_badge_styling()
    {
        $view = $this->blade('<x-form-colors name="color" />');

        $view->assertSee('class="badge bg-blue"');
        $view->assertSee('class="badge bg-primary"');
        $view->assertSee('class="badge bg-red"');
    }

    /** @test */
    public function it_renders_form_colors_with_help_slot()
    {
        $view = $this->blade('<x-form-colors name="color"><x-slot:help>Choose your brand color</x-slot:help></x-form-colors>');

        $view->assertSee('name="color"');
        $view->assertSee('Choose your brand color');
    }

    /** @test */
    public function it_renders_form_colors_with_custom_class()
    {
        $view = $this->blade('<x-form-colors name="color" class="custom-colors" />');

        $view->assertSee('name="color"');
        $view->assertSee('class="custom-colors"');
    }

    /** @test */
    public function it_renders_form_colors_with_extra_attributes()
    {
        $view = $this->blade('<x-form-colors name="color" data-test="color-selector" />');

        $view->assertSee('name="color"');
        $view->assertSee('data-test="color-selector"');
    }

    /** @test */
    public function it_renders_form_colors_with_multiple_selection()
    {
        $view = $this->blade('<x-form-colors name="colors[]" multiple />');

        $view->assertSee('name="colors[]"');
        $view->assertSee('multiple');
    }

    /** @test */
    public function it_renders_form_colors_with_required_attribute()
    {
        $view = $this->blade('<x-form-colors name="color" required />');

        $view->assertSee('name="color"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_colors_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-colors name="color" disabled />');

        $view->assertSee('name="color"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_colors_with_custom_id()
    {
        $view = $this->blade('<x-form-colors name="color" id="brand-color-selector" />');

        $view->assertSee('name="color"');
        $view->assertSee('id="brand-color-selector"');
    }

    /** @test */
    public function it_renders_form_colors_with_placeholder()
    {
        $view = $this->blade('<x-form-colors name="color" placeholder="Select brand color" />');

        $view->assertSee('name="color"');
        $view->assertSee('placeholder="Select brand color"');
    }

    /** @test */
    public function it_renders_form_colors_with_autocomplete()
    {
        $view = $this->blade('<x-form-colors name="color" autocomplete="off" />');

        $view->assertSee('name="color"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_form_colors_with_validation_error()
    {
        $view = $this->blade('<x-form-colors name="color" :error="Invalid color selection" />');

        $view->assertSee('name="color"');
        $view->assertSee('Invalid color selection');
    }

    /** @test */
    public function it_renders_form_colors_with_livewire_attributes()
    {
        $view = $this->blade('<x-form-colors name="color" wire:model="brandColor" wire:change="updateBrand" />');

        $view->assertSee('name="color"');
        $view->assertSee('wire:model="brandColor"');
        $view->assertSee('wire:change="updateBrand"');
    }

    /** @test */
    public function it_renders_form_colors_with_custom_options()
    {
        $customColors = [
            'custom1' => '<span class="badge bg-custom1">Custom 1</span>',
            'custom2' => '<span class="badge bg-custom2">Custom 2</span>',
        ];

        $view = $this->blade('<x-form-colors name="color" :colors="$customColors" />', ['colors' => $customColors]);

        $view->assertSee('name="color"');
        $view->assertSee('Custom 1');
        $view->assertSee('Custom 2');
    }

    /** @test */
    public function it_renders_form_colors_with_empty_colors_array()
    {
        $view = $this->blade('<x-form-colors name="color" :colors="[]" />', ['colors' => []]);

        $view->assertSee('name="color"');
        // Should still render the component even with empty colors
        $view->assertSee('x-form-choices');
    }

    /** @test */
    public function it_renders_form_colors_with_default_colors_when_none_provided()
    {
        $view = $this->blade('<x-form-colors name="color" />');

        $view->assertSee('name="color"');
        // Should render with default colors
        $view->assertSee('blue');
        $view->assertSee('primary');
        $view->assertSee('red');
    }

    /** @test */
    public function it_renders_form_colors_with_help_text()
    {
        $view = $this->blade('<x-form-colors name="color" help="Select a color from the palette" />');

        $view->assertSee('name="color"');
        $view->assertSee('Select a color from the palette');
    }

    /** @test */
    public function it_renders_form_colors_with_label()
    {
        $view = $this->blade('<x-form-colors name="color" label="Brand Color" />');

        $view->assertSee('name="color"');
        $view->assertSee('Brand Color');
    }

    /** @test */
    public function it_renders_form_colors_with_description()
    {
        $view = $this->blade('<x-form-colors name="color" description="Choose your primary brand color" />');

        $view->assertSee('name="color"');
        $view->assertSee('Choose your primary brand color');
    }

    /** @test */
    public function it_renders_form_colors_with_validation_rules()
    {
        $view = $this->blade('<x-form-colors name="color" rules="required|in:blue,red,green" />');

        $view->assertSee('name="color"');
        $view->assertSee('required|in:blue,red,green');
    }

    /** @test */
    public function it_renders_form_colors_with_custom_validation_message()
    {
        $view = $this->blade('<x-form-colors name="color" validation-message="Please select a valid brand color" />');

        $view->assertSee('name="color"');
        $view->assertSee('Please select a valid brand color');
    }

    /** @test */
    public function it_renders_form_colors_with_size_variant()
    {
        $view = $this->blade('<x-form-colors name="color" size="lg" />');

        $view->assertSee('name="color"');
        $view->assertSee('size="lg"');
    }

    /** @test */
    public function it_renders_form_colors_with_floating_label()
    {
        $view = $this->blade('<x-form-colors name="color" floating />');

        $view->assertSee('name="color"');
        $view->assertSee('floating');
    }

    /** @test */
    public function it_renders_form_colors_with_inline_display()
    {
        $view = $this->blade('<x-form-colors name="color" inline />');

        $view->assertSee('name="color"');
        $view->assertSee('inline');
    }

    /** @test */
    public function it_renders_form_colors_with_flat_styling()
    {
        $view = $this->blade('<x-form-colors name="color" flat />');

        $view->assertSee('name="color"');
        $view->assertSee('flat');
    }

    /** @test */
    public function it_renders_form_colors_with_search_functionality()
    {
        $view = $this->blade('<x-form-colors name="color" searchable />');

        $view->assertSee('name="color"');
        $view->assertSee('searchable');
    }

    /** @test */
    public function it_renders_form_colors_with_clear_button()
    {
        $view = $this->blade('<x-form-colors name="color" clearable />');

        $view->assertSee('name="color"');
        $view->assertSee('clearable');
    }

    /** @test */
    public function it_renders_form_colors_with_loading_state()
    {
        $view = $this->blade('<x-form-colors name="color" loading />');

        $view->assertSee('name="color"');
        $view->assertSee('loading');
    }

    /** @test */
    public function it_renders_form_colors_with_error_state()
    {
        $view = $this->blade('<x-form-colors name="color" error="Invalid selection" />');

        $view->assertSee('name="color"');
        $view->assertSee('Invalid selection');
    }

    /** @test */
    public function it_renders_form_colors_with_success_state()
    {
        $view = $this->blade('<x-form-colors name="color" success="Color selected successfully" />');

        $view->assertSee('name="color"');
        $view->assertSee('Color selected successfully');
    }

    /** @test */
    public function it_renders_form_colors_with_warning_state()
    {
        $view = $this->blade('<x-form-colors name="color" warning="Consider accessibility when choosing colors" />');

        $view->assertSee('name="color"');
        $view->assertSee('Consider accessibility when choosing colors');
    }

    /** @test */
    public function it_renders_form_colors_with_info_state()
    {
        $view = $this->blade('<x-form-colors name="color" info="Colors will be applied to your brand assets" />');

        $view->assertSee('name="color"');
        $view->assertSee('Colors will be applied to your brand assets');
    }
}
