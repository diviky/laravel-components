<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormToggleTest extends TestCase
{
    /** @test */
    public function it_renders_form_toggle_with_basic_attributes()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test Toggle');
    }

    /** @test */
    public function it_renders_form_toggle_with_title()
    {
        $view = $this->blade('<x-form-toggle name="test" title="Test Title" label="Test Toggle" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test Title');
    }

    /** @test */
    public function it_renders_form_toggle_with_custom_value()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" value="yes" />');

        $view->assertSee('name="test"');
        $view->assertSee('value="yes"');
    }

    /** @test */
    public function it_renders_form_toggle_with_inline()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" inline />');

        $view->assertSee('name="test"');
        $view->assertSee('form-check-inline');
    }

    /** @test */
    public function it_renders_form_toggle_with_help()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" help="Help text" />');

        $view->assertSee('name="test"');
        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_toggle_with_hint()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" hint="Hint text" />');

        $view->assertSee('name="test"');
        $view->assertSee('Hint text');
    }

    /** @test */
    public function it_renders_form_toggle_with_custom_classes()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" class="custom-toggle" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-toggle');
    }

    /** @test */
    public function it_renders_form_toggle_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_toggle_with_required_attribute()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_toggle_with_livewire_attributes()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" wire:model="toggleValue" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="toggleValue"');
    }

    /** @test */
    public function it_renders_form_toggle_with_error_state()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" class="is-invalid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-invalid');
    }

    /** @test */
    public function it_renders_form_toggle_with_success_state()
    {
        $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" class="is-valid" />');

        $view->assertSee('name="test"');
        $view->assertSee('is-valid');
    }
}
