<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormRatingTest extends TestCase
{
    /** @test */
    public function it_renders_form_rating_with_basic_attributes()
    {
        $view = $this->blade('<x-form-rating name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-rating');
    }

    /** @test */
    public function it_renders_form_rating_with_label()
    {
        $view = $this->blade('<x-form-rating name="rating" label="Rate this product" />');

        $view->assertSee('name="rating"');
        $view->assertSee('Rate this product');
    }

    /** @test */
    public function it_renders_form_rating_with_value()
    {
        $view = $this->blade('<x-form-rating name="rating" value="4" />');

        $view->assertSee('name="rating"');
        $view->assertSee('rating: 4');
    }

    /** @test */
    public function it_renders_form_rating_with_custom_scale()
    {
        $view = $this->blade('<x-form-rating name="rating" :rating="10" />');

        $view->assertSee('name="rating"');
        $view->assertSee('rating: 10');
    }

    /** @test */
    public function it_renders_form_rating_with_icon()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="star" />');

        $view->assertSee('name="rating"');
        $view->assertSee('star');
    }

    /** @test */
    public function it_renders_form_rating_with_size()
    {
        $view = $this->blade('<x-form-rating name="rating" size="lg" />');

        $view->assertSee('name="rating"');
        $view->assertSee('size="lg"');
    }

    /** @test */
    public function it_renders_form_rating_with_language_support()
    {
        $view = $this->blade('<x-form-rating name="rating" language="en" />');

        $view->assertSee('name="rating[en]"');
    }

    /** @test */
    public function it_renders_form_rating_with_default_value()
    {
        $view = $this->blade('<x-form-rating name="rating" :default="3" />');

        $view->assertSee('name="rating"');
        $view->assertSee('rating: 3');
    }

    /** @test */
    public function it_renders_form_rating_with_half_star_support()
    {
        $view = $this->blade('<x-form-rating name="rating" :half="true" />');

        $view->assertSee('name="rating"');
        $view->assertSee('half: true');
    }

    /** @test */
    public function it_renders_form_rating_with_settings()
    {
        $settings = ['rating' => 10, 'icon' => 'star', 'size' => 'lg'];
        $view = $this->blade('<x-form-rating name="rating" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="rating"');
        $view->assertSee('rating: 10');
    }

    /** @test */
    public function it_renders_form_rating_with_custom_class()
    {
        $view = $this->blade('<x-form-rating name="rating" class="custom-rating" />');

        $view->assertSee('name="rating"');
        $view->assertSee('class="custom-rating');
    }

    /** @test */
    public function it_renders_form_rating_with_custom_id()
    {
        $view = $this->blade('<x-form-rating name="rating" id="rating-input" />');

        $view->assertSee('name="rating"');
        $view->assertSee('id="rating-input"');
    }

    /** @test */
    public function it_renders_form_rating_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-rating name="rating" disabled />');

        $view->assertSee('name="rating"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_rating_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-rating name="rating" readonly />');

        $view->assertSee('name="rating"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_rating_with_required_attribute()
    {
        $view = $this->blade('<x-form-rating name="rating" required />');

        $view->assertSee('name="rating"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_rating_with_title_attribute()
    {
        $view = $this->blade('<x-form-rating name="rating" title="Click to rate" />');

        $view->assertSee('name="rating"');
        $view->assertSee('Click to rate');
    }

    /** @test */
    public function it_renders_form_rating_with_help_slot()
    {
        $view = $this->blade('
            <x-form-rating name="rating">
                <x-slot:help>
                    Click on a star to rate from 1 to 5
                </x-slot:help>
            </x-form-rating>
        ');

        $view->assertSee('name="rating"');
        $view->assertSee('Click on a star to rate from 1 to 5');
    }

    /** @test */
    public function it_renders_form_rating_with_alpine_data()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('x-data');
        $view->assertSee('rating:');
        $view->assertSee('current:');
        $view->assertSee('size:');
    }

    /** @test */
    public function it_renders_form_rating_with_alpine_functions()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('rate(star)');
        $view->assertSee('this.rating = star');
    }

    /** @test */
    public function it_renders_form_rating_with_mouse_events()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('@mouseover="current = star"');
        $view->assertSee('@mouseleave="current = rating"');
    }

    /** @test */
    public function it_renders_form_rating_with_click_events()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('@click="rate(star)"');
    }

    /** @test */
    public function it_renders_form_rating_with_form_group_classes()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('form-group');
    }

    /** @test */
    public function it_renders_form_rating_with_form_label()
    {
        $view = $this->blade('<x-form-rating name="rating" label="Rate this" />');

        $view->assertSee('form-label');
        $view->assertSee('Rate this');
    }

    /** @test */
    public function it_renders_form_rating_with_required_indicator()
    {
        $view = $this->blade('<x-form-rating name="rating" label="Rate this" required />');

        $view->assertSee('form-label');
        $view->assertSee('Rate this');
    }

    /** @test */
    public function it_renders_form_rating_with_title_display()
    {
        $view = $this->blade('<x-form-rating name="rating" title="Rating tooltip" />');

        $view->assertSee('title="Rating tooltip"');
    }

    /** @test */
    public function it_renders_form_rating_with_pt_5_class()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('pt-5');
    }

    /** @test */
    public function it_renders_form_rating_with_ms_3_class()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('ms-3');
    }

    /** @test */
    public function it_renders_form_rating_with_template_for()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('x-for="star in size"');
        $view->assertSee(':key="star"');
    }

    /** @test */
    public function it_renders_form_rating_with_number_icon_conditional()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="number" />');

        $view->assertSee('@if ($icon == \'number\')');
        $view->assertSee('@endif');
    }

    /** @test */
    public function it_renders_form_rating_with_number_icon_styling()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="number" />');

        $view->assertSee('badge h-5 me-1');
        $view->assertSee('rounded-xs text-gray-400 fill-current w-8 m-0 cursor-pointer');
    }

    /** @test */
    public function it_renders_form_rating_with_number_icon_text()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="number" />');

        $view->assertSee('x-text="star"');
    }

    /** @test */
    public function it_renders_form_rating_with_custom_icon()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="star" />');

        $view->assertSee('@else');
        $view->assertSee('rounded-xs fill-current w-8 m-0 cursor-pointer');
    }

    /** @test */
    public function it_renders_form_rating_with_icon_component()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="star" />');

        $view->assertSee('<x-icon');
        $view->assertSee('name="star"');
    }

    /** @test */
    public function it_renders_form_rating_with_icon_size()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="star" size="lg" />');

        $view->assertSee('size="lg"');
    }

    /** @test */
    public function it_renders_form_rating_with_dynamic_classes()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee(':class="');
        $view->assertSee('bg-primary text-white');
        $view->assertSee('text-primary');
    }

    /** @test */
    public function it_renders_form_rating_with_conditional_styling()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('current >= star');
        $view->assertSee('rating >= star && current >= star');
    }

    /** @test */
    public function it_renders_form_rating_with_hidden_input()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('type="hidden"');
        $view->assertSee('name="rating"');
        $view->assertSee('x-model="rating"');
    }

    /** @test */
    public function it_renders_form_rating_with_form_errors()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('form-errors');
    }

    /** @test */
    public function it_renders_form_rating_with_help_component()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('x-help');
    }

    /** @test */
    public function it_renders_form_rating_with_livewire_integration()
    {
        $view = $this->blade('<x-form-rating name="rating" wire:model="selectedRating" />');

        $view->assertSee('name="rating"');
        $view->assertSee('wire:model="selectedRating"');
    }

    /** @test */
    public function it_renders_form_rating_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-rating name="rating" data-turbo="true" />');

        $view->assertSee('name="rating"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_rating_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-rating name="rating" aria-label="Rating selection" />');

        $view->assertSee('name="rating"');
        $view->assertSee('aria-label="Rating selection"');
    }

    /** @test */
    public function it_renders_form_rating_with_data_attributes()
    {
        $view = $this->blade('<x-form-rating name="rating" data-test="rating-component" />');

        $view->assertSee('name="rating"');
        $view->assertSee('data-test="rating-component"');
    }

    /** @test */
    public function it_renders_form_rating_with_intval_function()
    {
        $view = $this->blade('<x-form-rating name="rating" value="4.5" />');

        $view->assertSee('intval($value)');
        $view->assertSee('rating: 4');
    }

    /** @test */
    public function it_renders_form_rating_with_settings_override()
    {
        $settings = ['rating' => 10, 'icon' => 'heart', 'size' => 'lg'];
        $view = $this->blade('<x-form-rating name="rating" icon="star" size="sm" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="rating"');
        $view->assertSee('rating: 10');
        $view->assertSee('heart');
        $view->assertSee('size="lg"');
    }

    /** @test */
    public function it_renders_form_rating_with_half_setting_override()
    {
        $settings = ['half' => true];
        $view = $this->blade('<x-form-rating name="rating" :half="false" :settings="$settings" />', ['settings' => $settings]);

        $view->assertSee('name="rating"');
        $view->assertSee('half: true');
    }

    /** @test */
    public function it_renders_form_rating_with_language_naming()
    {
        $view = $this->blade('<x-form-rating name="rating" language="en" />');

        $view->assertSee('name="rating[en]"');
    }

    /** @test */
    public function it_renders_form_rating_with_bind_value()
    {
        $view = $this->blade('<x-form-rating name="rating" :bind="$product" />');

        $view->assertSee('name="rating"');
        $view->assertSee('bind');
    }

    /** @test */
    public function it_renders_form_rating_with_default_value_override()
    {
        $view = $this->blade('<x-form-rating name="rating" :default="3" />');

        $view->assertSee('name="rating"');
        $view->assertSee('rating: 3');
    }

    /** @test */
    public function it_renders_form_rating_with_extra_attributes()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('$extraAttributes ?? \'\'');
    }

    /** @test */
    public function it_renders_form_rating_with_validation_state()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('isRequired');
    }

    /** @test */
    public function it_renders_form_rating_with_error_handling()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('hasError');
    }

    /** @test */
    public function it_renders_form_rating_with_wire_modifier()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('wireModifier');
    }

    /** @test */
    public function it_renders_form_rating_with_checked_state()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('@checked');
    }

    /** @test */
    public function it_renders_form_rating_with_cursor_pointer()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_renders_form_rating_with_text_colors()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('text-gray-400');
        $view->assertSee('text-primary');
        $view->assertSee('text-white');
    }

    /** @test */
    public function it_renders_form_rating_with_background_colors()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('bg-primary');
    }

    /** @test */
    public function it_renders_form_rating_with_fill_current()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('fill-current');
    }

    /** @test */
    public function it_renders_form_rating_with_width_and_margin()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('w-8');
        $view->assertSee('m-0');
    }

    /** @test */
    public function it_renders_form_rating_with_rounded_corners()
    {
        $view = $this->blade('<x-form-rating name="rating" />');

        $view->assertSee('rounded-xs');
    }

    /** @test */
    public function it_renders_form_rating_with_margin_end()
    {
        $view = $this->blade('<x-form-rating name="rating" icon="number" />');

        $view->assertSee('me-1');
    }
}
