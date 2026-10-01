<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewLoadingTest extends TestCase
{
    /** @test */
    public function it_renders_a_livewire_loading_overlay_for_a_target(): void
    {
        $view = $this->blade('<x-view.loading target="setActive" />');

        $view->assertSee('wire:loading.flex', false)
            ->assertSee('wire:target="setActive"', false)
            ->assertSee('spinner-border', false)
            ->assertSee('Loading...', false);
    }
}
