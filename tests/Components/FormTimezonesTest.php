<?php

declare(strict_types=1);

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Components\FormTimezones;
use Diviky\LaravelComponents\Support\Timezone;
use Diviky\LaravelComponents\Tests\TestCase;

class FormTimezonesTest extends TestCase
{
    /** @test */
    public function it_builds_timezone_options_for_select(): void
    {
        $component = new FormTimezones(name: 'timezone');

        $this->assertSame('timezone', $component->name);
        $this->assertNotEmpty($component->options);

        $generalGroup = collect($component->options)->firstWhere('id', 'General');

        $this->assertNotNull($generalGroup);
        $this->assertContains('UTC', collect($generalGroup['children'])->pluck('id')->all());
    }

    /** @test */
    public function it_limits_timezone_regions_when_only_is_set(): void
    {
        $component = new FormTimezones(name: 'timezone', only: 'Europe');

        $regionIds = collect($component->options)->pluck('id')->all();

        $this->assertContains('Europe', $regionIds);
        $this->assertNotContains('America', $regionIds);
    }

    /** @test */
    public function it_defaults_to_searchable_choices_with_grouped_options(): void
    {
        $component = new FormTimezones(name: 'timezone', label: 'Time Zone');

        $this->assertTrue($component->searchable);
        $this->assertSame(1, $component->minChars);
        $this->assertSame('children', $component->childrenField);
        $this->assertSame('Select timezone', $component->placeholder);
    }

    /** @test */
    public function it_caches_mapped_timezone_options(): void
    {
        $first = Timezone::mapped();
        $second = Timezone::mapped();

        $this->assertSame($first, $second);
    }
}
