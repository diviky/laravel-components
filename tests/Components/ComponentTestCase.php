<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

abstract class ComponentTestCase extends TestCase
{
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
        $view = $this->blade('<x-'.$this->getComponentName().' />');
        $this->assertNotNull($view);
    }

    /**
     * Test component outputs expected HTML structure
     */
    public function test_html_structure(): void
    {
        $view = $this->blade('<x-'.$this->getComponentName().' />');

        // Override in specific tests to check expected HTML elements
        $this->assertNotNull($view);
    }

    /**
     * Test component with custom CSS classes
     */
    public function test_custom_css_classes(): void
    {
        $view = $this->blade('<x-'.$this->getComponentName().' class="custom-class another-class" />');
        $this->assertHasClass($view, 'custom-class');
        $this->assertHasClass($view, 'another-class');
    }

    /**
     * Test component with disabled state
     */
    public function test_disabled_state(): void
    {
        $view = $this->blade('<x-'.$this->getComponentName().' disabled />');
        $this->assertHasAttribute($view, 'disabled');
    }

    /**
     * Test component with readonly state
     */
    public function test_readonly_state(): void
    {
        $view = $this->blade('<x-'.$this->getComponentName().' readonly />');
        $this->assertHasAttribute($view, 'readonly');
    }
}
