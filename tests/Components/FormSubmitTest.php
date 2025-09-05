<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Components\FormSubmit;

class FormSubmitTest extends ComponentTestCase
{
    protected function getComponentClass(): string
    {
        return FormSubmit::class;
    }

    protected function getComponentName(): string
    {
        return 'form-submit';
    }

    public function test_can_render_basic_submit_button(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn">Submit</button>',
            '<x-form-submit>Submit</x-form-submit>'
        );
    }

    public function test_can_render_with_custom_text(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn">Save Changes</button>',
            '<x-form-submit>Save Changes</x-form-submit>'
        );
    }

    public function test_can_render_primary_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-primary">Save</button>',
            '<x-form-submit primary>Save</x-form-submit>'
        );
    }

    public function test_can_render_success_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-success">Confirm</button>',
            '<x-form-submit success>Confirm</x-form-submit>'
        );
    }

    public function test_can_render_danger_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-danger">Delete</button>',
            '<x-form-submit danger>Delete</x-form-submit>'
        );
    }

    public function test_can_render_warning_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-warning">Update</button>',
            '<x-form-submit warning>Update</x-form-submit>'
        );
    }

    public function test_can_render_info_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-info">Submit</button>',
            '<x-form-submit info>Submit</x-form-submit>'
        );
    }

    public function test_can_render_light_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-light">Submit</button>',
            '<x-form-submit light>Submit</x-form-submit>'
        );
    }

    public function test_can_render_dark_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-dark">Submit</button>',
            '<x-form-submit dark>Submit</x-form-submit>'
        );
    }

    public function test_can_render_outline_style(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-outline-primary">Submit</button>',
            '<x-form-submit outline primary>Submit</x-form-submit>'
        );
    }

    public function test_can_render_ghost_style(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-ghost-primary">Submit</button>',
            '<x-form-submit ghost primary>Submit</x-form-submit>'
        );
    }

    public function test_can_render_small_size(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-sm">Submit</button>',
            '<x-form-submit sm>Submit</x-form-submit>'
        );
    }

    public function test_can_render_large_size(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-lg">Submit</button>',
            '<x-form-submit lg>Submit</x-form-submit>'
        );
    }

    public function test_can_render_full_width(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-block">Submit</button>',
            '<x-form-submit full>Submit</x-form-submit>'
        );
    }

    public function test_can_render_square_style(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-square">Submit</button>',
            '<x-form-submit square>Submit</x-form-submit>'
        );
    }

    public function test_can_render_pill_style(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-pill">Submit</button>',
            '<x-form-submit pill>Submit</x-form-submit>'
        );
    }

    public function test_can_render_bold_style(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-bold">Submit</button>',
            '<x-form-submit bold>Submit</x-form-submit>'
        );
    }

    public function test_can_render_disabled_state(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn disabled">Submit</button>',
            '<x-form-submit disabled>Submit</x-form-submit>'
        );
    }

    public function test_can_render_loading_state(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-loading">Submit</button>',
            '<x-form-submit loading>Submit</x-form-submit>'
        );
    }

    public function test_can_render_cancel_style(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-cancel">Cancel</button>',
            '<x-form-submit cancel>Cancel</x-form-submit>'
        );
    }

    public function test_can_render_with_custom_color(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-purple">Submit</button>',
            '<x-form-submit color="purple">Submit</x-form-submit>'
        );
    }

    public function test_can_render_with_custom_size(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-xl">Submit</button>',
            '<x-form-submit size="xl">Submit</x-form-submit>'
        );
    }

    public function test_can_render_with_custom_variant(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-rounded">Submit</button>',
            '<x-form-submit variant="rounded">Submit</x-form-submit>'
        );
    }

    public function test_can_render_with_icon(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn"><x-icon name="save" class="me-1" />Save</button>',
            '<x-form-submit icon="save">Save</x-form-submit>'
        );
    }

    public function test_can_render_with_icon_and_color(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-primary"><x-icon name="check" class="me-1" />Confirm</button>',
            '<x-form-submit icon="check" primary>Confirm</x-form-submit>'
        );
    }

    public function test_can_render_multiple_attributes(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-primary btn-sm btn-pill">Submit</button>',
            '<x-form-submit primary sm pill>Submit</x-form-submit>'
        );
    }

    public function test_can_render_with_custom_attributes(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn" id="submit-btn" data-test="value">Submit</button>',
            '<x-form-submit id="submit-btn" data-test="value">Submit</x-form-submit>'
        );
    }

    public function test_can_render_in_form_context(): void
    {
        $this->assertComponentRenders(
            '<form method="POST" action="/submit">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </form>',
            '<form method="POST" action="/submit">
                <x-form-submit primary>Submit Form</x-form-submit>
            </form>'
        );
    }

    public function test_can_render_with_livewire_attributes(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn" wire:click="submit">Submit</button>',
            '<x-form-submit wire:click="submit">Submit</x-form-submit>'
        );
    }

    public function test_can_render_conditional_states(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-primary btn-loading">Processing...</button>',
            '<x-form-submit primary loading>Processing...</x-form-submit>'
        );
    }

    public function test_can_render_complex_combination(): void
    {
        $this->assertComponentRenders(
            '<button type="submit" class="btn btn-outline-success btn-lg btn-pill" id="save-btn">Save Changes</button>',
            '<x-form-submit outline success lg pill id="save-btn">Save Changes</x-form-submit>'
        );
    }
}
