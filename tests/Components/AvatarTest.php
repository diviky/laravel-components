<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Components\Avatar;

class AvatarTest extends ComponentTestCase
{
    public function test_renders_with_basic_attributes(): void
    {
        $component = $this->createComponent(['label' => 'John Doe']);
        $view = $this->component($component);

        $view->assertSee('JD'); // Generated initials
        $this->assertHasClass($view, 'avatar');
    }

    public function test_handles_all_attributes(): void
    {
        $component = $this->createComponent([
            'label' => 'John Doe Smith',
            'image' => '/path/to/image.jpg',
            'size' => 'lg',
            'color' => 'bg-blue-lt',
            'stacked' => true,
        ]);

        $view = $this->component($component);

        $this->assertHasClass($view, 'avatar');
        $this->assertHasClass($view, 'avatar-lg');
        $this->assertHasClass($view, 'bg-blue-lt');
        $view->assertSee('avatar-list avatar-list-stacked', false);
        $view->assertSee('background-image: url(/path/to/image.jpg)', false);
    }

    public function test_generates_initials_from_name(): void
    {
        $testCases = [
            'John Doe' => 'JD',
            'Jane Smith Wilson' => 'JS', // Takes first two words
            'Madonna' => 'M',
            'Jean-Pierre François' => 'JF',
            '' => '', // Empty case
        ];

        foreach ($testCases as $name => $expectedInitials) {
            $component = $this->createComponent(['label' => $name]);
            $view = $this->component($component);

            if ($expectedInitials) {
                $view->assertSee($expectedInitials);
            }
        }
    }

    public function test_color_generation_consistency(): void
    {
        // Same name should always generate same color
        $component1 = $this->createComponent(['label' => 'John Doe']);
        $component2 = $this->createComponent(['label' => 'John Doe']);

        $this->assertEquals($component1->color, $component2->color);
    }

    public function test_image_takes_precedence_over_initials(): void
    {
        $component = $this->createComponent([
            'label' => 'John Doe',
            'image' => '/avatar.jpg',
        ]);

        $view = $this->component($component);

        $view->assertSee('background-image: url(/avatar.jpg)', false);
        $view->assertDontSee('JD'); // Initials should not be visible when image is present
    }

    public function test_stacked_mode(): void
    {
        $component = $this->createComponent([
            'label' => 'John Doe',
            'stacked' => true,
        ]);

        $view = $this->component($component);

        $view->assertSee('avatar-list avatar-list-stacked', false);
    }

    public function test_size_variants(): void
    {
        $sizes = ['xs', 'sm', 'md', 'lg', 'xl'];

        foreach ($sizes as $size) {
            $component = $this->createComponent([
                'label' => 'John Doe',
                'size' => $size,
            ]);

            $view = $this->component($component);
            $this->assertHasClass($view, "avatar-{$size}");
        }
    }

    public function test_attribute_variants(): void
    {
        // Test various attribute combinations that should add CSS classes
        $attributes = [
            'circle' => 'rounded-circle',
            'rounded' => 'rounded',
            'xs' => 'avatar-xs',
            'sm' => 'avatar-sm',
            'lg' => 'avatar-lg',
            'xl' => 'avatar-xl',
            'md' => 'avatar-md',
        ];

        foreach ($attributes as $attribute => $expectedClass) {
            $component = $this->createComponent([
                'label' => 'John Doe',
                $attribute => true,
            ]);

            $view = $this->component($component);
            $this->assertHasClass($view, $expectedClass);
        }
    }

    public function test_handles_edge_cases(): void
    {
        // Test with null/empty values
        $component = $this->createComponent(['label' => null]);
        $view = $this->component($component);
        $view->assertStatus(200);

        // Test with very long names
        $component = $this->createComponent(['label' => 'This Is A Very Long Name With Many Words']);
        $view = $this->component($component);
        $view->assertSee('TI'); // Should take first two initials

        // Test with special characters
        $component = $this->createComponent(['label' => 'José María']);
        $view = $this->component($component);
        $view->assertSee('JM');
    }

    public function test_name_parameter_alias(): void
    {
        // Test that 'name' parameter works as alias for 'label'
        $component = new Avatar(name: 'John Doe');
        $view = $this->component($component);

        $view->assertSee('JD');
        $this->assertEquals('John Doe', $component->label);
    }

    public function test_color_randomization(): void
    {
        // Test that different names generate different colors (most of the time)
        $names = ['Alice', 'Bob', 'Charlie', 'Diana', 'Eve'];
        $colors = [];

        foreach ($names as $name) {
            $component = $this->createComponent(['label' => $name]);
            $colors[] = $component->color;
        }

        // Should have some variety in colors (not all the same)
        $uniqueColors = array_unique($colors);
        $this->assertGreaterThan(1, count($uniqueColors));
    }

    protected function createComponent(array $attributes = []): Avatar
    {
        return new Avatar(
            label: $attributes['label'] ?? null,
            name: $attributes['name'] ?? null,
            image: $attributes['image'] ?? '',
            color: $attributes['color'] ?? null,
            size: $attributes['size'] ?? null,
            stacked: $attributes['stacked'] ?? false
        );
    }

    protected function getComponentName(): string
    {
        return 'avatar';
    }

    protected function getDefaultAttributes(): array
    {
        return [
            'label' => 'John Doe',
        ];
    }

    protected function getAllAttributes(): array
    {
        return [
            'label' => 'John Doe Smith',
            'name' => 'John Doe Smith',
            'image' => '/path/to/avatar.jpg',
            'color' => 'bg-blue-lt',
            'size' => 'lg',
            'stacked' => true,
            'class' => 'custom-avatar-class',
            'circle' => true,
            'rounded' => true,
            'xs' => false,
            'sm' => false,
            'lg' => true,
            'xl' => false,
            'md' => false,
        ];
    }
}
