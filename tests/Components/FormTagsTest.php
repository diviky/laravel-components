<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormTagsTest extends TestCase
{
    /** @test */
    public function it_renders_form_tags_with_basic_attributes()
    {
        $view = $this->blade('<x-form-tags name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-tags');
    }

    /** @test */
    public function it_renders_form_tags_with_label()
    {
        $view = $this->blade('<x-form-tags name="skills" label="Skills" />');

        $view->assertSee('name="skills"');
        $view->assertSee('Skills');
    }

    /** @test */
    public function it_renders_form_tags_with_icon()
    {
        $view = $this->blade('<x-form-tags name="tags" icon="tag" />');

        $view->assertSee('name="tags"');
        $view->assertSee('tag');
    }

    /** @test */
    public function it_renders_form_tags_with_default_values()
    {
        $default = ['php', 'laravel', 'vue'];
        $view = $this->blade('<x-form-tags name="skills" :default="$default" />', ['default' => $default]);

        $view->assertSee('name="skills"');
        $view->assertSee('php');
        $view->assertSee('laravel');
        $view->assertSee('vue');
    }

    /** @test */
    public function it_renders_form_tags_with_placeholder()
    {
        $view = $this->blade('<x-form-tags name="tags" placeholder="Add tags..." />');

        $view->assertSee('name="tags"');
        $view->assertSee('Add tags...');
    }

    /** @test */
    public function it_renders_form_tags_with_custom_class()
    {
        $view = $this->blade('<x-form-tags name="tags" class="custom-tags" />');

        $view->assertSee('name="tags"');
        $view->assertSee('class="custom-tags');
    }

    /** @test */
    public function it_renders_form_tags_with_custom_id()
    {
        $view = $this->blade('<x-form-tags name="tags" id="tags-input" />');

        $view->assertSee('name="tags"');
        $view->assertSee('id="tags-input"');
    }

    /** @test */
    public function it_renders_form_tags_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-tags name="tags" disabled />');

        $view->assertSee('name="tags"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_tags_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-tags name="tags" readonly />');

        $view->assertSee('name="tags"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_tags_with_required_attribute()
    {
        $view = $this->blade('<x-form-tags name="tags" required />');

        $view->assertSee('name="tags"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_tags_with_language_support()
    {
        $view = $this->blade('<x-form-tags name="keywords" language="en" />');

        $view->assertSee('name="keywords[en]"');
    }

    /** @test */
    public function it_renders_form_tags_with_floating_label()
    {
        $view = $this->blade('<x-form-tags name="tags" floating />');

        $view->assertSee('name="tags"');
        $view->assertSee('floating');
    }

    /** @test */
    public function it_renders_form_tags_with_help_slot()
    {
        $view = $this->blade('
            <x-form-tags name="tags">
                <x-slot:help>
                    Press Enter to add tags
                </x-slot:help>
            </x-form-tags>
        ');

        $view->assertSee('name="tags"');
        $view->assertSee('Press Enter to add tags');
    }

    /** @test */
    public function it_renders_form_tags_with_alpine_data()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-data');
        $view->assertSee('tags:');
        $view->assertSee('tag: null');
        $view->assertSee('focused: false');
    }

    /** @test */
    public function it_renders_form_tags_with_alpine_functions()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('push()');
        $view->assertSee('remove(');
        $view->assertSee('clear()');
        $view->assertSee('clearAll()');
        $view->assertSee('focus()');
    }

    /** @test */
    public function it_renders_form_tags_with_keyboard_events()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('@keydown.escape');
        $view->assertSee('@keydown.enter.prevent');
        $view->assertSee('@keydown.tab.prevent');
        $view->assertSee('@keyup.prevent');
    }

    /** @test */
    public function it_renders_form_tags_with_click_events()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('@click="focus()"');
        $view->assertSee('@click="clearAll()"');
        $view->assertSee('@click.outside="clear()"');
    }

    /** @test */
    public function it_renders_form_tags_with_input_events()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('@input="focus()"');
        $view->assertSee('@click="focus()"');
    }

    /** @test */
    public function it_renders_form_tags_with_form_group_classes()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('form-group');
    }

    /** @test */
    public function it_renders_form_tags_with_form_control_classes()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('form-control');
        $view->assertSee('relative');
    }

    /** @test */
    public function it_renders_form_tags_with_border_styling()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('border');
        $view->assertSee('border-dashed');
    }

    /** @test */
    public function it_renders_form_tags_with_error_styling()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('input-error');
    }

    /** @test */
    public function it_renders_form_tags_with_icon_positioning()
    {
        $view = $this->blade('<x-form-tags name="tags" icon="tag" />');

        $view->assertSee('ps-10');
        $view->assertSee('absolute');
        $view->assertSee('top-1/2');
        $view->assertSee('-translate-y-1/2');
        $view->assertSee('start-3');
    }

    /** @test */
    public function it_renders_form_tags_with_clear_icon()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x');
        $view->assertSee('cursor-pointer');
        $view->assertSee('end-4');
    }

    /** @test */
    public function it_renders_form_tags_with_tags_list()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('tags-list');
        $view->assertSee('d-inline-flex');
    }

    /** @test */
    public function it_renders_form_tags_with_tag_badges()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('tag');
        $view->assertSee('badge');
        $view->assertSee('badge-sm');
        $view->assertSee('tag-badge');
    }

    /** @test */
    public function it_renders_form_tags_with_search_input()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('type="text"');
        $view->assertSee('outline-hidden');
        $view->assertSee('mt-1');
        $view->assertSee('bg-transparent');
    }

    /** @test */
    public function it_renders_form_tags_with_hidden_inputs()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('type="hidden"');
        $view->assertSee('name="tags"');
    }

    /** @test */
    public function it_renders_form_tags_with_form_errors()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('form-errors');
    }

    /** @test */
    public function it_renders_form_tags_with_help_component()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-help');
    }

    /** @test */
    public function it_renders_form_tags_with_livewire_integration()
    {
        $view = $this->blade('<x-form-tags name="tags" wire:model="selectedTags" />');

        $view->assertSee('name="tags"');
        $view->assertSee('wire:model="selectedTags"');
    }

    /** @test */
    public function it_renders_form_tags_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-tags name="tags" data-turbo="true" />');

        $view->assertSee('name="tags"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_tags_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-tags name="tags" aria-label="Add tags" />');

        $view->assertSee('name="tags"');
        $view->assertSee('aria-label="Add tags"');
    }

    /** @test */
    public function it_renders_form_tags_with_data_attributes()
    {
        $view = $this->blade('<x-form-tags name="tags" data-test="tags-component" />');

        $view->assertSee('name="tags"');
        $view->assertSee('data-test="tags-component"');
    }

    /** @test */
    public function it_renders_form_tags_with_enterkeyhint()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('enterkeyhint="done"');
    }

    /** @test */
    public function it_renders_form_tags_with_x_ref()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-ref="searchInput"');
    }

    /** @test */
    public function it_renders_form_tags_with_x_model()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-model="tag"');
    }

    /** @test */
    public function it_renders_form_tags_with_x_show()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-show="tags.length"');
        $view->assertSee('x-show="!isReadonly"');
    }

    /** @test */
    public function it_renders_form_tags_with_x_for()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-for="(tag, index) in tags"');
    }

    /** @test */
    public function it_renders_form_tags_with_x_text()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-text="tag"');
    }

    /** @test */
    public function it_renders_form_tags_with_wire_key()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('wire:key="tags-');
    }

    /** @test */
    public function it_renders_form_tags_with_livewire_navigation_listener()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('livewire:navigating');
        $view->assertSee('tags-element');
    }

    /** @test */
    public function it_renders_form_tags_with_duplicate_prevention()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('hasTag(tag)');
        $view->assertSee('!this.hasTag(tag)');
    }

    /** @test */
    public function it_renders_form_tags_with_case_insensitive_comparison()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('toLowerCase()');
    }

    /** @test */
    public function it_renders_form_tags_with_comma_handling()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('replace(/,/g');
        $view->assertSee('event.key === \',\'');
    }

    /** @test */
    public function it_renders_form_tags_with_empty_array_initialization()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('this.tags = []');
    }

    /** @test */
    public function it_renders_form_tags_with_null_check()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('this.tags == null');
        $view->assertSee('!Array.isArray(this.tags)');
    }

    /** @test */
    public function it_renders_form_tags_with_conditional_rendering()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('x-if="!Array.isArray(tags)"');
        $view->assertSee('x-if="Array.isArray(tags) && tags.length <= 0"');
        $view->assertSee('x-for="select in Array.isArray(tags) ? tags : []"');
    }

    /** @test */
    public function it_renders_form_tags_with_icon_conditional()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('@if ($icon)');
        $view->assertSee('@endif');
    }

    /** @test */
    public function it_renders_form_tags_with_readonly_conditional()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('@if (!$isReadonly())');
        $view->assertSee('@endif');
    }

    /** @test */
    public function it_renders_form_tags_with_label_conditional()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('@if ($label)');
        $view->assertSee('@endif');
    }

    /** @test */
    public function it_renders_form_tags_with_validation_state()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('isRequired');
        $view->assertSee('isReadonly');
    }

    /** @test */
    public function it_renders_form_tags_with_error_handling()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('$errors->has($name)');
        $view->assertSee('$errors->has($name . \'*\')');
    }

    /** @test */
    public function it_renders_form_tags_with_extra_attributes()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('$extraAttributes ?? \'\'');
    }

    /** @test */
    public function it_renders_form_tags_with_attributes_exclusion()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('except([\'wire:model\', \'wire:model.live\'])');
    }

    /** @test */
    public function it_renders_form_tags_with_icon_size()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('size="sm"');
    }

    /** @test */
    public function it_renders_form_tags_with_pointer_events()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('pointer-events-none');
    }

    /** @test */
    public function it_renders_form_tags_with_hover_states()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('hover:text-gray-600');
    }

    /** @test */
    public function it_renders_form_tags_with_text_colors()
    {
        $view = $this->blade('<x-form-tags name="tags" />');

        $view->assertSee('text-gray-400');
        $view->assertSee('text-gray-600');
    }
}
