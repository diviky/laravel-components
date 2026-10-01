<?php

namespace Diviky\LaravelComponents\Tests\Feature;

use Diviky\LaravelComponents\Tests\TestCase;

class Bootstrap4Test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (config('laravel-components.framework') !== 'bootstrap-4') {
            $this->markTestSkipped('Other framework configured');
        }
    }

    /** @test */
    public function it_can_append_to_an_input()
    {
        $this->registerTestRoute('bootstrap-append');

        $this->visit('/bootstrap-append')
            ->seeInElement('.input-group-text', '.protone.media');
    }

    /** @test */
    public function it_can_prepend_to_an_input()
    {
        $this->registerTestRoute('bootstrap-prepend');

        $this->visit('/bootstrap-prepend')
            ->seeInElement('.input-group-text', 'info@');
    }
}
