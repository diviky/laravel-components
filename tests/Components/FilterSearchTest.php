<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FilterSearchTest extends TestCase
{
    /** @test */
    public function it_renders_filter_search_with_basic_attributes()
    {
        $view = $this->blade('<x-filter-search name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control');
    }

    /** @test */
    public function it_renders_filter_search_with_label()
    {
        $view = $this->blade('<x-filter-search name="test" label="Test Label" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test Label');
    }

    /** @test */
    public function it_renders_filter_search_with_custom_type()
    {
        $view = $this->blade('<x-filter-search name="test" type="email" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="email"');
    }

    /** @test */
    public function it_renders_filter_search_with_search_type()
    {
        $view = $this->blade('<x-filter-search name="test" type="search" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="search"');
    }

    /** @test */
    public function it_renders_filter_search_with_floating_label()
    {
        $view = $this->blade('<x-filter-search name="test" floating />');

        $view->assertSee('name="test"');
        $view->assertSee('floating');
    }

    /** @test */
    public function it_renders_filter_search_with_extra_attributes()
    {
        $view = $this->blade('<x-filter-search name="test" :extra-attributes="[\'data-test\' => \'filter-search\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="filter-search"');
    }

    /** @test */
    public function it_renders_filter_search_with_custom_class()
    {
        $view = $this->blade('<x-filter-search name="test" class="custom-filter-search" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-filter-search');
    }

    /** @test */
    public function it_renders_filter_search_with_custom_id()
    {
        $view = $this->blade('<x-filter-search name="test" id="filter-search-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="filter-search-input"');
    }

    /** @test */
    public function it_renders_filter_search_with_disabled_attribute()
    {
        $view = $this->blade('<x-filter-search name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_filter_search_with_readonly_attribute()
    {
        $view = $this->blade('<x-filter-search name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_filter_search_with_required_attribute()
    {
        $view = $this->blade('<x-filter-search name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_filter_search_with_placeholder()
    {
        $view = $this->blade('<x-filter-search name="test" placeholder="Search..." />');

        $view->assertSee('name="test"');
        $view->assertSee('placeholder="Search..."');
    }

    /** @test */
    public function it_renders_filter_search_with_data_attributes()
    {
        $view = $this->blade('<x-filter-search name="test" data-test="filter-search" data-type="advanced-search" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="filter-search"');
        $view->assertSee('data-type="advanced-search"');
    }

    /** @test */
    public function it_renders_filter_search_with_aria_attributes()
    {
        $view = $this->blade('<x-filter-search name="test" aria-label="Advanced Search" aria-describedby="search-help-text" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Advanced Search"');
        $view->assertSee('aria-describedby="search-help-text"');
    }

    /** @test */
    public function it_renders_filter_search_with_role_attribute()
    {
        $view = $this->blade('<x-filter-search name="test" role="searchbox" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="searchbox"');
    }

    /** @test */
    public function it_renders_filter_search_with_tabindex()
    {
        $view = $this->blade('<x-filter-search name="test" tabindex="0" />');

        $view->assertSee('name="test"');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_filter_search_with_form_attribute()
    {
        $view = $this->blade('<x-filter-search name="test" form="my-form" />');

        $view->assertSee('name="test"');
        $view->assertSee('form="my-form"');
    }

    /** @test */
    public function it_renders_filter_search_with_autocomplete()
    {
        $view = $this->blade('<x-filter-search name="test" autocomplete="off" />');

        $view->assertSee('name="test"');
        $view->assertSee('autocomplete="off"');
    }

    /** @test */
    public function it_renders_filter_search_with_novalidate()
    {
        $view = $this->blade('<x-filter-search name="test" novalidate />');

        $view->assertSee('name="test"');
        $view->assertSee('novalidate');
    }

    /** @test */
    public function it_renders_filter_search_with_accept()
    {
        $view = $this->blade('<x-filter-search name="test" accept="text/*" />');

        $view->assertSee('name="test"');
        $view->assertSee('accept="text/*"');
    }

    /** @test */
    public function it_renders_filter_search_with_capture()
    {
        $view = $this->blade('<x-filter-search name="test" capture="environment" />');

        $view->assertSee('name="test"');
        $view->assertSee('capture="environment"');
    }

    /** @test */
    public function it_renders_filter_search_with_max()
    {
        $view = $this->blade('<x-filter-search name="test" max="100" />');

        $view->assertSee('name="test"');
        $view->assertSee('max="100"');
    }

    /** @test */
    public function it_renders_filter_search_with_min()
    {
        $view = $this->blade('<x-filter-search name="test" min="1" />');

        $view->assertSee('name="test"');
        $view->assertSee('min="1"');
    }

    /** @test */
    public function it_renders_filter_search_with_step()
    {
        $view = $this->blade('<x-filter-search name="test" step="0.1" />');

        $view->assertSee('name="test"');
        $view->assertSee('step="0.1"');
    }

    /** @test */
    public function it_renders_filter_search_with_pattern()
    {
        $view = $this->blade('<x-filter-search name="test" pattern="[A-Za-z]{3,}" />');

        $view->assertSee('name="test"');
        $view->assertSee('pattern="[A-Za-z]{3,}"');
    }

    /** @test */
    public function it_renders_filter_search_with_spellcheck()
    {
        $view = $this->blade('<x-filter-search name="test" spellcheck="false" />');

        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="false"');
    }

    /** @test */
    public function it_renders_filter_search_with_translate()
    {
        $view = $this->blade('<x-filter-search name="test" translate="no" />');

        $view->assertSee('name="test"');
        $view->assertSee('translate="no"');
    }

    /** @test */
    public function it_renders_filter_search_with_contenteditable()
    {
        $view = $this->blade('<x-filter-search name="test" contenteditable="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('contenteditable="true"');
    }

    /** @test */
    public function it_renders_filter_search_with_contextmenu()
    {
        $view = $this->blade('<x-filter-search name="test" contextmenu="search-menu" />');

        $view->assertSee('name="test"');
        $view->assertSee('contextmenu="search-menu"');
    }

    /** @test */
    public function it_renders_filter_search_with_dir()
    {
        $view = $this->blade('<x-filter-search name="test" dir="rtl" />');

        $view->assertSee('name="test"');
        $view->assertSee('dir="rtl"');
    }

    /** @test */
    public function it_renders_filter_search_with_draggable()
    {
        $view = $this->blade('<x-filter-search name="test" draggable="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('draggable="true"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="copy" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy"');
    }

    /** @test */
    public function it_renders_filter_search_with_hidden()
    {
        $view = $this->blade('<x-filter-search name="test" hidden />');

        $view->assertSee('name="test"');
        $view->assertSee('hidden');
    }

    /** @test */
    public function it_renders_filter_search_with_lang()
    {
        $view = $this->blade('<x-filter-search name="test" lang="en" />');

        $view->assertSee('name="test"');
        $view->assertSee('lang="en"');
    }

    /** @test */
    public function it_renders_filter_search_with_spellcheck_true()
    {
        $view = $this->blade('<x-filter-search name="test" spellcheck="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('spellcheck="true"');
    }

    /** @test */
    public function it_renders_filter_search_with_translate_yes()
    {
        $view = $this->blade('<x-filter-search name="test" translate="yes" />');

        $view->assertSee('name="test"');
        $view->assertSee('translate="yes"');
    }

    /** @test */
    public function it_renders_filter_search_with_contenteditable_false()
    {
        $view = $this->blade('<x-filter-search name="test" contenteditable="false" />');

        $view->assertSee('name="test"');
        $view->assertSee('contenteditable="false"');
    }

    /** @test */
    public function it_renders_filter_search_with_draggable_false()
    {
        $view = $this->blade('<x-filter-search name="test" draggable="false" />');

        $view->assertSee('name="test"');
        $view->assertSee('draggable="false"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone_move()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="move" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="move"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone_link()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="link"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone_copy_move()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="copy move" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy move"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone_copy_link()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="copy link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy link"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone_move_link()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="move link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="move link"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropzone_copy_move_link()
    {
        $view = $this->blade('<x-filter-search name="test" dropzone="copy move link" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropzone="copy move link"');
    }

    /** @test */
    public function it_renders_filter_search_with_authorization_can()
    {
        $view = $this->blade('<x-filter-search name="test" can="search-data" />');

        $view->assertSee('name="test"');
        $view->assertSee('can="search-data"');
    }

    /** @test */
    public function it_renders_filter_search_with_authorization_role()
    {
        $view = $this->blade('<x-filter-search name="test" role="user" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_filter_search_with_authorization_action()
    {
        $view = $this->blade('<x-filter-search name="test" action="search" />');

        $view->assertSee('name="test"');
        $view->assertSee('action="search"');
    }

    /** @test */
    public function it_renders_filter_search_with_livewire_attributes()
    {
        $view = $this->blade('<x-filter-search name="test" wire:model="searchQuery" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="searchQuery"');
    }

    /** @test */
    public function it_renders_filter_search_with_model_binding()
    {
        $view = $this->blade('<x-filter-search name="test" :bind="$searchModel" />');

        $view->assertSee('name="test"');
        $view->assertSee('bind="$searchModel"');
    }

    /** @test */
    public function it_renders_filter_search_with_default_values()
    {
        $view = $this->blade('<x-filter-search name="test" :default="\'default query\'" />');

        $view->assertSee('name="test"');
        $view->assertSee('default="\'default query\'"');
    }

    /** @test */
    public function it_renders_filter_search_with_error_state()
    {
        $view = $this->blade('<x-filter-search name="test" class="is-invalid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-invalid');
    }

    /** @test */
    public function it_renders_filter_search_with_success_state()
    {
        $view = $this->blade('<x-filter-search name="test" class="is-valid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-valid');
    }

    /** @test */
    public function it_renders_filter_search_with_warning_state()
    {
        $view = $this->blade('<x-filter-search name="test" class="is-warning" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-warning');
    }

    /** @test */
    public function it_renders_filter_search_with_info_state()
    {
        $view = $this->blade('<x-filter-search name="test" class="is-info" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-info');
    }

    /** @test */
    public function it_renders_filter_search_with_danger_state()
    {
        $view = $this->blade('<x-filter-search name="test" class="is-danger" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-danger');
    }

    /** @test */
    public function it_renders_filter_search_with_small_size()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-sm" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-sm');
    }

    /** @test */
    public function it_renders_filter_search_with_large_size()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-lg" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-lg');
    }

    /** @test */
    public function it_renders_filter_search_with_primary_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-primary" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-primary');
    }

    /** @test */
    public function it_renders_filter_search_with_secondary_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-secondary" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-secondary');
    }

    /** @test */
    public function it_renders_filter_search_with_success_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-success" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-success');
    }

    /** @test */
    public function it_renders_filter_search_with_warning_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-warning" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-warning');
    }

    /** @test */
    public function it_renders_filter_search_with_danger_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-danger" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-danger');
    }

    /** @test */
    public function it_renders_filter_search_with_info_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-info" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-info');
    }

    /** @test */
    public function it_renders_filter_search_with_light_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-light" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-light');
    }

    /** @test */
    public function it_renders_filter_search_with_dark_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-dark" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-dark');
    }

    /** @test */
    public function it_renders_filter_search_with_outline_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-outline-primary" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-outline-primary');
    }

    /** @test */
    public function it_renders_filter_search_with_ghost_style()
    {
        $view = $this->blade('<x-filter-search name="test" class="form-control-ghost-primary" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-control-ghost-primary');
    }

    /** @test */
    public function it_renders_filter_search_with_custom_color()
    {
        $view = $this->blade('<x-filter-search name="test" color="purple" />');

        $view->assertSee('name="test"');
        $view->assertSee('color="purple"');
    }

    /** @test */
    public function it_renders_filter_search_with_custom_size()
    {
        $view = $this->blade('<x-filter-search name="test" size="xl" />');

        $view->assertSee('name="test"');
        $view->assertSee('size="xl"');
    }

    /** @test */
    public function it_renders_filter_search_with_custom_variant()
    {
        $view = $this->blade('<x-filter-search name="test" variant="rounded" />');

        $view->assertSee('name="test"');
        $view->assertSee('variant="rounded"');
    }

    /** @test */
    public function it_renders_filter_search_with_dropdown_support()
    {
        $view = $this->blade('<x-filter-search name="test" dropdown />');

        $view->assertSee('name="test"');
        $view->assertSee('dropdown-toggle');
    }

    /** @test */
    public function it_renders_filter_search_with_loading_state()
    {
        $view = $this->blade('<x-filter-search name="test" loading />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-loading');
    }

    /** @test */
    public function it_renders_filter_search_with_square_style()
    {
        $view = $this->blade('<x-filter-search name="test" square />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-square');
    }

    /** @test */
    public function it_renders_filter_search_with_pill_style()
    {
        $view = $this->blade('<x-filter-search name="test" pill />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-pill');
    }

    /** @test */
    public function it_renders_filter_search_with_block_style()
    {
        $view = $this->blade('<x-filter-search name="test" full />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-block');
    }

    /** @test */
    public function it_renders_filter_search_with_bold_style()
    {
        $view = $this->blade('<x-filter-search name="test" bold />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-bold');
    }
}
