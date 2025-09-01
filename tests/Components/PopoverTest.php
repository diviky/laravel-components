<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class PopoverTest extends TestCase
{
    /** @test */
    public function it_renders_popover_with_trigger_and_content()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Hover me</x-slot:trigger>
                <x-slot:content>Popover content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('Hover me');
        $view->assertSee('Popover content');
        $view->assertSee('x-data');
    }

    /** @test */
    public function it_renders_popover_with_custom_position()
    {
        $view = $this->blade('
            <x-popover position="top" offset="10">
                <x-slot:trigger>Button</x-slot:trigger>
                <x-slot:content>Content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.top.offset.10');
        $view->assertSee('Button');
        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_popover_with_bottom_position()
    {
        $view = $this->blade('
            <x-popover position="bottom">
                <x-slot:trigger>Trigger</x-slot:trigger>
                <x-slot:content>Content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.bottom');
        $view->assertSee('Trigger');
        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_popover_with_left_position()
    {
        $view = $this->blade('
            <x-popover position="left" offset="5">
                <x-slot:trigger>Left trigger</x-slot:trigger>
                <x-slot:content>Left content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.left.offset.5');
        $view->assertSee('Left trigger');
        $view->assertSee('Left content');
    }

    /** @test */
    public function it_renders_popover_with_right_position()
    {
        $view = $this->blade('
            <x-popover position="right" offset="15">
                <x-slot:trigger>Right trigger</x-slot:trigger>
                <x-slot:content>Right content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.right.offset.15');
        $view->assertSee('Right trigger');
        $view->assertSee('Right content');
    }

    /** @test */
    public function it_renders_popover_with_default_positioning()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Default trigger</x-slot:trigger>
                <x-slot:content>Default content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.bottom');
        $view->assertSee('Default trigger');
        $view->assertSee('Default content');
    }

    /** @test */
    public function it_renders_popover_with_custom_offset()
    {
        $view = $this->blade('
            <x-popover offset="20">
                <x-slot:trigger>Offset trigger</x-slot:trigger>
                <x-slot:content>Offset content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.bottom.offset.20');
        $view->assertSee('Offset trigger');
        $view->assertSee('Offset content');
    }

    /** @test */
    public function it_renders_popover_with_zero_offset()
    {
        $view = $this->blade('
            <x-popover offset="0">
                <x-slot:trigger>Zero offset trigger</x-slot:trigger>
                <x-slot:content>Zero offset content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.bottom.offset.0');
        $view->assertSee('Zero offset trigger');
        $view->assertSee('Zero offset content');
    }

    /** @test */
    public function it_renders_popover_with_negative_offset()
    {
        $view = $this->blade('
            <x-popover offset="-10">
                <x-slot:trigger>Negative offset trigger</x-slot:trigger>
                <x-slot:content>Negative offset content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-anchor.bottom.offset.-10');
        $view->assertSee('Negative offset trigger');
        $view->assertSee('Negative offset content');
    }

    /** @test */
    public function it_renders_popover_with_custom_class()
    {
        $view = $this->blade('
            <x-popover class="custom-popover">
                <x-slot:trigger>Class trigger</x-slot:trigger>
                <x-slot:content>Class content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('class="custom-popover');
        $view->assertSee('Class trigger');
        $view->assertSee('Class content');
    }

    /** @test */
    public function it_renders_popover_with_custom_id()
    {
        $view = $this->blade('
            <x-popover id="popover-123">
                <x-slot:trigger>ID trigger</x-slot:trigger>
                <x-slot:content>ID content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('id="popover-123"');
        $view->assertSee('ID trigger');
        $view->assertSee('ID content');
    }

    /** @test */
    public function it_renders_popover_with_inline_styles()
    {
        $view = $this->blade('
            <x-popover style="z-index: 1000;">
                <x-slot:trigger>Style trigger</x-slot:trigger>
                <x-slot:content>Style content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('style="z-index: 1000;"');
        $view->assertSee('Style trigger');
        $view->assertSee('Style content');
    }

    /** @test */
    public function it_renders_popover_with_alpine_data()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Alpine trigger</x-slot:trigger>
                <x-slot:content>Alpine content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-data');
        $view->assertSee('open: false');
        $view->assertSee('timer: null');
        $view->assertSee('show()');
        $view->assertSee('hide()');
    }

    /** @test */
    public function it_renders_popover_with_mouse_events()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Mouse trigger</x-slot:trigger>
                <x-slot:content>Mouse content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('@mouseover="show()"');
        $view->assertSee('@mouseout="hide()"');
        $view->assertSee('Mouse trigger');
        $view->assertSee('Mouse content');
    }

    /** @test */
    public function it_renders_popover_with_trigger_attributes()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>
                    <span class="trigger-class">Trigger with class</span>
                </x-slot:trigger>
                <x-slot:content>Content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('class="trigger-class');
        $view->assertSee('Trigger with class');
        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_popover_with_content_attributes()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Trigger</x-slot:trigger>
                <x-slot:content>
                    <div class="content-class">Content with class</div>
                </x-slot:content>
            </x-popover>
        ');

        $view->assertSee('class="content-class');
        $view->assertSee('Content with class');
        $view->assertSee('Trigger');
    }

    /** @test */
    public function it_renders_popover_with_complex_trigger()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>
                    <x-button size="sm" color="primary">
                        <x-icon name="info" class="mr-2" />
                        Complex Trigger
                    </x-button>
                </x-slot:trigger>
                <x-slot:content>Complex content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('Complex Trigger');
        $view->assertSee('Complex content');
        $view->assertSee('x-button');
    }

    /** @test */
    public function it_renders_popover_with_complex_content()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Simple trigger</x-slot:trigger>
                <x-slot:content>
                    <div class="p-4">
                        <h4 class="text-lg font-bold">Title</h4>
                        <p class="text-gray-600">Description text</p>
                        <div class="mt-3">
                            <x-button size="sm">Action</x-button>
                        </div>
                    </div>
                </x-slot:content>
            </x-popover>
        ');

        $view->assertSee('Simple trigger');
        $view->assertSee('Title');
        $view->assertSee('Description text');
        $view->assertSee('Action');
    }

    /** @test */
    public function it_renders_popover_with_livewire_attributes()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>
                    <x-button wire:loading.class="opacity-50">Livewire Trigger</x-button>
                </x-slot:trigger>
                <x-slot:content>
                    <div wire:click="action">Livewire Content</div>
                </x-slot:content>
            </x-popover>
        ');

        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:click="action"');
        $view->assertSee('Livewire Trigger');
        $view->assertSee('Livewire Content');
    }

    /** @test */
    public function it_renders_popover_with_turbo_attributes()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>
                    <a href="/link" data-turbo="true">Turbo Trigger</a>
                </x-slot:trigger>
                <x-slot:content>Turbo content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('data-turbo="true"');
        $view->assertSee('Turbo Trigger');
        $view->assertSee('Turbo content');
    }

    /** @test */
    public function it_renders_popover_with_accessibility_attributes()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>
                    <span aria-label="Help information" role="button">Accessible trigger</span>
                </x-slot:trigger>
                <x-slot:content>
                    <div role="tooltip">Accessible content</div>
                </x-slot:content>
            </x-popover>
        ');

        $view->assertSee('aria-label="Help information"');
        $view->assertSee('role="button"');
        $view->assertSee('role="tooltip"');
        $view->assertSee('Accessible trigger');
        $view->assertSee('Accessible content');
    }

    /** @test */
    public function it_renders_popover_with_data_attributes()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>
                    <span data-test="popover-trigger" data-id="123">Data trigger</span>
                </x-slot:trigger>
                <x-slot:content>
                    <div data-test="popover-content">Data content</div>
                </x-slot:content>
            </x-popover>
        ');

        $view->assertSee('data-test="popover-trigger"');
        $view->assertSee('data-id="123"');
        $view->assertSee('data-test="popover-content"');
        $view->assertSee('Data trigger');
        $view->assertSee('Data content');
    }

    /** @test */
    public function it_renders_popover_with_cursor_pointer()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Cursor trigger</x-slot:trigger>
                <x-slot:content>Cursor content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('cursor-pointer');
        $view->assertSee('Cursor trigger');
        $view->assertSee('Cursor content');
    }

    /** @test */
    public function it_renders_popover_with_z_index()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Z-index trigger</x-slot:trigger>
                <x-slot:content>Z-index content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('z-1');
        $view->assertSee('Z-index trigger');
        $view->assertSee('Z-index content');
    }

    /** @test */
    public function it_renders_popover_with_shadow()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Shadow trigger</x-slot:trigger>
                <x-slot:content>Shadow content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('shadow-xl');
        $view->assertSee('Shadow trigger');
        $view->assertSee('Shadow content');
    }

    /** @test */
    public function it_renders_popover_with_border()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Border trigger</x-slot:trigger>
                <x-slot:content>Border content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('border');
        $view->assertSee('Border trigger');
        $view->assertSee('Border content');
    }

    /** @test */
    public function it_renders_popover_with_width_fit()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Width trigger</x-slot:trigger>
                <x-slot:content>Width content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('w-fit');
        $view->assertSee('Width trigger');
        $view->assertSee('Width content');
    }

    /** @test */
    public function it_renders_popover_with_padding()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Padding trigger</x-slot:trigger>
                <x-slot:content>Padding content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('p-3');
        $view->assertSee('Padding trigger');
        $view->assertSee('Padding content');
    }

    /** @test */
    public function it_renders_popover_with_rounded_corners()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Rounded trigger</x-slot:trigger>
                <x-slot:content>Rounded content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('rounded-md');
        $view->assertSee('Rounded trigger');
        $view->assertSee('Rounded content');
    }

    /** @test */
    public function it_renders_popover_with_background()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Background trigger</x-slot:trigger>
                <x-slot:content>Background content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('bg-base-100');
        $view->assertSee('Background trigger');
        $view->assertSee('Background content');
    }

    /** @test */
    public function it_renders_popover_with_x_cloak()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Cloak trigger</x-slot:trigger>
                <x-slot:content>Cloak content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-cloak');
        $view->assertSee('Cloak trigger');
        $view->assertSee('Cloak content');
    }

    /** @test */
    public function it_renders_popover_with_show_condition()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Show trigger</x-slot:trigger>
                <x-slot:content>Show content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-show="open"');
        $view->assertSee('Show trigger');
        $view->assertSee('Show content');
    }

    /** @test */
    public function it_renders_popover_with_anchor_reference()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Anchor trigger</x-slot:trigger>
                <x-slot:content>Anchor content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('x-ref="myTrigger"');
        $view->assertSee('Anchor trigger');
        $view->assertSee('Anchor content');
    }

    /** @test */
    public function it_renders_popover_with_timer_functionality()
    {
        $view = $this->blade('
            <x-popover>
                <x-slot:trigger>Timer trigger</x-slot:trigger>
                <x-slot:content>Timer content</x-slot:content>
            </x-popover>
        ');

        $view->assertSee('clearTimeout(this.timer)');
        $view->assertSee('setTimeout(() => this.open = false, 300)');
        $view->assertSee('Timer trigger');
        $view->assertSee('Timer content');
    }
}
