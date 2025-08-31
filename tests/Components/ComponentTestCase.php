<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

abstract class ComponentTestCase extends TestCase
{
    /**
     * Test that component renders with basic attributes
     */
    abstract public function test_renders_with_basic_attributes(): void;

    /**
     * Test that component handles all supported attributes
     */
    abstract public function test_handles_all_attributes(): void;

    /**
     * Test component with invalid/edge case data
     */
    public function test_handles_edge_cases(): void
    {
        // Override in specific component tests if needed
        $this->assertTrue(true);
    }

    /**
     * Test authorization attributes if component supports them
     */
    public function test_authorization_attributes(): void
    {
        // Override in specific component tests if needed
        $this->assertTrue(true);
    }

    /**
     * Test Livewire integration if component supports it
     */
    public function test_livewire_integration(): void
    {
        // Override in specific component tests if needed
        $this->assertTrue(true);
    }

    /**
     * Helper to create component instance for testing
     */
    abstract protected function createComponent(array $attributes = []): \Diviky\LaravelComponents\Components\Component;

    /**
     * Get the component's blade tag name
     */
    abstract protected function getComponentName(): string;

    /**
     * Get default attributes for testing
     */
    protected function getDefaultAttributes(): array
    {
        return [];
    }

    /**
     * Get all possible attributes for comprehensive testing
     */
    protected function getAllAttributes(): array
    {
        return $this->getDefaultAttributes();
    }

    /**
     * Test component renders without errors with default attributes
     */
    public function test_component_renders(): void
    {
        $component = $this->createComponent($this->getDefaultAttributes());
        $this->assertComponentRenders($component);
    }

    /**
     * Test component outputs expected HTML structure
     */
    public function test_html_structure(): void
    {
        $component = $this->createComponent($this->getDefaultAttributes());
        $view = $this->component($component);

        // Override in specific tests to check expected HTML elements
        $view->assertStatus(200);
    }

    /**
     * Test component with custom CSS classes
     */
    public function test_custom_css_classes(): void
    {
        $component = $this->createComponent([
            'class' => 'custom-class another-class',
        ]);

        $view = $this->component($component);
        $this->assertHasClass($view, 'custom-class');
        $this->assertHasClass($view, 'another-class');
    }

    /**
     * Test component with disabled state
     */
    public function test_disabled_state(): void
    {
        $component = $this->createComponent(['disabled' => true]);
        $view = $this->component($component);

        $this->assertHasAttribute($view, 'disabled');
    }

    /**
     * Test component with readonly state
     */
    public function test_readonly_state(): void
    {
        $component = $this->createComponent(['readonly' => true]);
        $view = $this->component($component);

        $this->assertHasAttribute($view, 'readonly');
    }
}
