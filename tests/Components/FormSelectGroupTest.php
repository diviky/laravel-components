<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormSelectGroupTest extends TestCase
{
    /** @test */
    public function it_renders_form_select_group_with_basic_attributes()
    {
        $view = $this->blade('<x-form-select-group name="test" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup');
    }

    /** @test */
    public function it_renders_form_select_group_with_label()
    {
        $view = $this->blade('<x-form-select-group name="test" label="Test Label" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test Label');
    }

    /** @test */
    public function it_renders_form_select_group_with_pills_style()
    {
        $view = $this->blade('<x-form-select-group name="test" pills :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-pills');
    }

    /** @test */
    public function it_renders_form_select_group_with_boxes_style()
    {
        $view = $this->blade('<x-form-select-group name="test" boxes :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-boxes');
    }

    /** @test */
    public function it_renders_form_select_group_with_full_width()
    {
        $view = $this->blade('<x-form-select-group name="test" full :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('flex-column');
    }

    /** @test */
    public function it_renders_form_select_group_with_radio_type()
    {
        $view = $this->blade('<x-form-select-group name="test" type="radio" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="radio"');
    }

    /** @test */
    public function it_renders_form_select_group_with_checkbox_type()
    {
        $view = $this->blade('<x-form-select-group name="test" type="checkbox" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('type="checkbox"');
    }

    /** @test */
    public function it_renders_form_select_group_with_extra_attributes()
    {
        $view = $this->blade('<x-form-select-group name="test" :extra-attributes="[\'data-test\' => \'select-group\']" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="select-group"');
    }

    /** @test */
    public function it_renders_form_select_group_with_custom_class()
    {
        $view = $this->blade('<x-form-select-group name="test" class="custom-select-group" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-select-group');
    }

    /** @test */
    public function it_renders_form_select_group_with_custom_id()
    {
        $view = $this->blade('<x-form-select-group name="test" id="select-group-input" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="select-group-input"');
    }

    /** @test */
    public function it_renders_form_select_group_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-select-group name="test" disabled :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_select_group_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-select-group name="test" readonly :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_select_group_with_required_attribute()
    {
        $view = $this->blade('<x-form-select-group name="test" required :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_select_group_with_placeholder()
    {
        $view = $this->blade('<x-form-select-group name="test" placeholder="Select options..." :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('placeholder="Select options..."');
    }

    /** @test */
    public function it_renders_form_select_group_with_help_slot()
    {
        $view = $this->blade('<x-form-select-group name="test" :options="[\'option1\' => \'Option 1\']"><x-slot:help>Help text</x-slot:help></x-form-select-group>');

        $view->assertSee('name="test"');
        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_select_group_with_default_slot()
    {
        $view = $this->blade('<x-form-select-group name="test"><x-form-select-item name="test" value="custom">Custom Option</x-form-select-item></x-form-select-group>');

        $view->assertSee('name="test"');
        $view->assertSee('Custom Option');
    }

    /** @test */
    public function it_renders_form_select_group_with_authorization_can()
    {
        $view = $this->blade('<x-form-select-group name="test" can="select-options" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('can="select-options"');
    }

    /** @test */
    public function it_renders_form_select_group_with_authorization_role()
    {
        $view = $this->blade('<x-form-select-group name="test" role="user" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('role="user"');
    }

    /** @test */
    public function it_renders_form_select_group_with_authorization_action()
    {
        $view = $this->blade('<x-form-select-group name="test" action="create" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('action="create"');
    }

    /** @test */
    public function it_renders_form_select_group_with_livewire_attributes()
    {
        $view = $this->blade('<x-form-select-group name="test" wire:model="selectedOptions" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="selectedOptions"');
    }

    /** @test */
    public function it_renders_form_select_group_with_model_binding()
    {
        $view = $this->blade('<x-form-select-group name="test" :bind="$user" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('bind="$user"');
    }

    /** @test */
    public function it_renders_form_select_group_with_default_values()
    {
        $view = $this->blade('<x-form-select-group name="test" :default="[\'option1\']" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('default="[\'option1\']"');
    }

    /** @test */
    public function it_renders_form_select_group_with_error_state()
    {
        $view = $this->blade('<x-form-select-group name="test" class="is-invalid" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-invalid');
    }

    /** @test */
    public function it_renders_form_select_group_with_success_state()
    {
        $view = $this->blade('<x-form-select-group name="test" class="is-valid" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-valid');
    }

    /** @test */
    public function it_renders_form_select_group_with_warning_state()
    {
        $view = $this->blade('<x-form-select-group name="test" class="is-warning" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-warning');
    }

    /** @test */
    public function it_renders_form_select_group_with_info_state()
    {
        $view = $this->blade('<x-form-select-group name="test" class="is-info" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-info');
    }

    /** @test */
    public function it_renders_form_select_group_with_danger_state()
    {
        $view = $this->blade('<x-form-select-group name="test" class="is-danger" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-danger');
    }

    /** @test */
    public function it_renders_form_select_group_with_small_size()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-sm" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-sm');
    }

    /** @test */
    public function it_renders_form_select_group_with_large_size()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-lg" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-lg');
    }

    /** @test */
    public function it_renders_form_select_group_with_primary_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-primary" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-primary');
    }

    /** @test */
    public function it_renders_form_select_group_with_secondary_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-secondary" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-secondary');
    }

    /** @test */
    public function it_renders_form_select_group_with_success_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-success" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-success');
    }

    /** @test */
    public function it_renders_form_select_group_with_warning_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-warning" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-warning');
    }

    /** @test */
    public function it_renders_form_select_group_with_danger_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-danger" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-danger');
    }

    /** @test */
    public function it_renders_form_select_group_with_info_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-info" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-info');
    }

    /** @test */
    public function it_renders_form_select_group_with_light_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-light" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-light');
    }

    /** @test */
    public function it_renders_form_select_group_with_dark_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-dark" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-dark');
    }

    /** @test */
    public function it_renders_form_select_group_with_outline_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-outline-primary" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-outline-primary');
    }

    /** @test */
    public function it_renders_form_select_group_with_ghost_style()
    {
        $view = $this->blade('<x-form-select-group name="test" class="form-selectgroup-ghost-primary" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-selectgroup-ghost-primary');
    }

    /** @test */
    public function it_renders_form_select_group_with_custom_color()
    {
        $view = $this->blade('<x-form-select-group name="test" color="purple" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('color="purple"');
    }

    /** @test */
    public function it_renders_form_select_group_with_custom_size()
    {
        $view = $this->blade('<x-form-select-group name="test" size="xl" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('size="xl"');
    }

    /** @test */
    public function it_renders_form_select_group_with_custom_variant()
    {
        $view = $this->blade('<x-form-select-group name="test" variant="rounded" :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('variant="rounded"');
    }

    /** @test */
    public function it_renders_form_select_group_with_dropdown_support()
    {
        $view = $this->blade('<x-form-select-group name="test" dropdown :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('dropdown-toggle');
    }

    /** @test */
    public function it_renders_form_select_group_with_loading_state()
    {
        $view = $this->blade('<x-form-select-group name="test" loading :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-loading');
    }

    /** @test */
    public function it_renders_form_select_group_with_square_style()
    {
        $view = $this->blade('<x-form-select-group name="test" square :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-square');
    }

    /** @test */
    public function it_renders_form_select_group_with_pill_style()
    {
        $view = $this->blade('<x-form-select-group name="test" pill :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-pill');
    }

    /** @test */
    public function it_renders_form_select_group_with_block_style()
    {
        $view = $this->blade('<x-form-select-group name="test" full :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-block');
    }

    /** @test */
    public function it_renders_form_select_group_with_bold_style()
    {
        $view = $this->blade('<x-form-select-group name="test" bold :options="[\'option1\' => \'Option 1\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('btn-bold');
    }
}
