<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class TableTest extends TestCase
{
    public function test_renders_basic_table(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Test Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('Test Content');
        $view->assertSee('class="table');
        $view->assertSee('table-vcenter');
    }

    public function test_table_with_header(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:header>
                    <x-table.row>
                        <x-table.cell>Header Cell</x-table.cell>
                    </x-table.row>
                </x-slot:header>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Body Cell</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('Header Cell');
        $view->assertSee('Body Cell');
        $view->assertSee('table-head');
    }

    public function test_table_with_footer(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Body Cell</x-table.cell>
                    </x-table.row>
                </x-slot:body>
                <x-slot:footer>
                    <x-table.row>
                        <x-table.cell>Footer Cell</x-table.cell>
                    </x-table.row>
                </x-slot:footer>
            </x-table>
        ');

        $view->assertSee('Body Cell');
        $view->assertSee('Footer Cell');
    }

    public function test_table_responsive(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('table-responsive');
    }

    public function test_table_not_responsive(): void
    {
        $view = $this->blade('
            <x-table :responsive="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('table-responsive');
    }

    public function test_table_bordered(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('table-bordered');
    }

    public function test_table_not_bordered(): void
    {
        $view = $this->blade('
            <x-table :bordered="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('table-bordered');
    }

    public function test_table_card(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('card-table');
    }

    public function test_table_not_card(): void
    {
        $view = $this->blade('
            <x-table :card="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('card-table');
    }

    public function test_table_nowrap(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('text-nowrap');
    }

    public function test_table_not_nowrap(): void
    {
        $view = $this->blade('
            <x-table :nowrap="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('text-nowrap');
    }

    public function test_table_outline(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('table-outline');
    }

    public function test_table_not_outline(): void
    {
        $view = $this->blade('
            <x-table :outline="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('table-outline');
    }

    public function test_table_striped(): void
    {
        $view = $this->blade('
            <x-table striped>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('table-striped');
    }

    public function test_table_not_striped(): void
    {
        $view = $this->blade('
            <x-table :striped="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('table-striped');
    }

    public function test_table_border_top(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('border-top');
    }

    public function test_table_not_border_top(): void
    {
        $view = $this->blade('
            <x-table :borderTop="false">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertDontSee('border-top');
    }

    public function test_table_compact(): void
    {
        $view = $this->blade('
            <x-table compact>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('table-sm');
    }

    public function test_table_size_sm(): void
    {
        $view = $this->blade('
            <x-table size="sm">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('table-sm');
    }

    public function test_table_custom_height(): void
    {
        $view = $this->blade('
            <x-table height="300px">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('min-height: 300px');
    }

    public function test_table_with_column_groups(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:group>
                    <col style="width: 50%">
                    <col style="width: 50%">
                </x-slot:group>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('<colgroup>');
        $view->assertSee('<col style="width: 50%">', false);
    }

    public function test_table_custom_css_classes(): void
    {
        $view = $this->blade('
            <x-table class="custom-table shadow">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('custom-table');
        $view->assertSee('shadow');
        $view->assertSee('table');
        $view->assertSee('table-vcenter');
    }

    public function test_table_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-table
                id="test-table"
                data-testid="table"
                aria-label="Test table">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('id="test-table"');
        $view->assertSee('data-testid="table"');
        $view->assertSee('aria-label="Test table"');
    }

    public function test_table_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-table
                :responsive="true"
                :bordered="true"
                :card="true"
                :nowrap="true"
                :outline="true"
                striped
                :borderTop="true"
                compact
                height="400px"
                class="custom-table">
                <x-slot:header>
                    <x-table.row>
                        <x-table.cell>Header</x-table.cell>
                    </x-table.row>
                </x-slot:header>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Body</x-table.cell>
                    </x-table.row>
                </x-slot:body>
                <x-slot:footer>
                    <x-table.row>
                        <x-table.cell>Footer</x-table.cell>
                    </x-table.row>
                </x-slot:footer>
            </x-table>
        ');

        $view->assertSee('table-responsive');
        $view->assertSee('table-bordered');
        $view->assertSee('card-table');
        $view->assertSee('text-nowrap');
        $view->assertSee('table-outline');
        $view->assertSee('table-striped');
        $view->assertSee('border-top');
        $view->assertSee('table-sm');
        $view->assertSee('min-height: 400px');
        $view->assertSee('custom-table');
        $view->assertSee('Header');
        $view->assertSee('Body');
        $view->assertSee('Footer');
    }

    public function test_table_livewire_integration(): void
    {
        $view = $this->blade('
            <x-table wire:loading.class="opacity-50">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('wire:loading.class="opacity-50"');
    }

    public function test_table_accessibility_features(): void
    {
        $view = $this->blade('
            <x-table
                role="table"
                aria-label="Data table">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('role="table"');
        $view->assertSee('aria-label="Data table"');
    }

    public function test_table_handles_edge_cases(): void
    {
        // Empty table
        $view = $this->blade('<x-table></x-table>');
        $view->assertStatus(200);

        // Table with only header
        $view = $this->blade('
            <x-table>
                <x-slot:header>
                    <x-table.row>
                        <x-table.cell>Header Only</x-table.cell>
                    </x-table.row>
                </x-slot:header>
            </x-table>
        ');
        $view->assertSee('Header Only');

        // Table with only footer
        $view = $this->blade('
            <x-table>
                <x-slot:footer>
                    <x-table.row>
                        <x-table.cell>Footer Only</x-table.cell>
                    </x-table.row>
                </x-slot:footer>
            </x-table>
        ');
        $view->assertSee('Footer Only');
    }

    public function test_table_sub_components(): void
    {
        // Test table.header
        $view = $this->blade('
            <x-table.header class="bg-primary">
                <x-table.row>
                    <x-table.cell>Header Content</x-table.cell>
                </x-table.row>
            </x-table.header>
        ');
        $view->assertSee('Header Content');
        $view->assertSee('bg-primary');
        $view->assertSee('table-head');
        $view->assertSee('<thead', false);

        // Test table.body
        $view = $this->blade('
            <x-table.body class="table-hover">
                <x-table.row>
                    <x-table.cell>Body Content</x-table.cell>
                </x-table.row>
            </x-table.body>
        ');
        $view->assertSee('Body Content');
        $view->assertSee('table-hover');
        $view->assertSee('<tbody', false);

        // Test table.footer
        $view = $this->blade('
            <x-table.footer class="table-light">
                <x-table.row>
                    <x-table.cell>Footer Content</x-table.cell>
                </x-table.row>
            </x-table.footer>
        ');
        $view->assertSee('Footer Content');
        $view->assertSee('table-light');
        $view->assertSee('<tfoot', false);
    }

    public function test_table_header_sticky(): void
    {
        $view = $this->blade('
            <x-table.header sticky>
                <x-table.row>
                    <x-table.cell>Sticky Header</x-table.cell>
                </x-table.row>
            </x-table.header>
        ');

        $view->assertSee('sticky-top');
        $view->assertSee('Sticky Header');
    }

    public function test_table_with_complex_content(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:header>
                    <x-table.row>
                        <x-table.cell>Name</x-table.cell>
                        <x-table.cell>Email</x-table.cell>
                        <x-table.cell>Status</x-table.cell>
                        <x-table.cell>Actions</x-table.cell>
                    </x-table.row>
                </x-slot:header>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>John Doe</x-table.cell>
                        <x-table.cell>john@example.com</x-table.cell>
                        <x-table.cell>
                            <x-badge color="success">Active</x-badge>
                        </x-table.cell>
                        <x-table.cell>
                            <x-form-button sm primary>Edit</x-form-button>
                        </x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('Status');
        $view->assertSee('Actions');
        $view->assertSee('John Doe');
        $view->assertSee('john@example.com');
        $view->assertSee('Active');
        $view->assertSee('Edit');
    }

    public function test_table_performance_attributes(): void
    {
        $view = $this->blade('
            <x-table
                data-testid="table-component"
                data-loading="false"
                data-interactive="true">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('data-testid="table-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }

    public function test_table_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-table id="bootstrapTable">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        // Should have proper Bootstrap table structure
        $view->assertSee('table');
        $view->assertSee('table-vcenter');
        $view->assertSee('id="bootstrapTable"');
    }

    public function test_table_default_slot_content(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:header>
                    <x-table.row>
                        <x-table.cell>Header</x-table.cell>
                    </x-table.row>
                </x-slot:header>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Body</x-table.cell>
                    </x-table.row>
                </x-slot:body>
                Default slot content
                <x-slot:footer>
                    <x-table.row>
                        <x-table.cell>Footer</x-table.cell>
                    </x-table.row>
                </x-slot:footer>
            </x-table>
        ');

        $view->assertSee('Header');
        $view->assertSee('Body');
        $view->assertSee('Default slot content');
        $view->assertSee('Footer');
    }

    public function test_table_with_head_slot(): void
    {
        $view = $this->blade('
            <x-table>
                <x-slot:head>
                    <x-table.row>
                        <x-table.cell>Head Content</x-table.cell>
                    </x-table.row>
                </x-slot:head>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Body Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        $view->assertSee('Head Content');
        $view->assertSee('Body Content');
    }

    public function test_table_css_class_merging(): void
    {
        $view = $this->blade('
            <x-table class="custom-table">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        // Should merge custom class with default classes
        $view->assertSee('custom-table');
        $view->assertSee('table');
        $view->assertSee('table-vcenter');
    }

    public function test_table_height_without_responsive(): void
    {
        $view = $this->blade('
            <x-table :responsive="false" height="300px">
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Content</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        ');

        // Height should not be applied when not responsive
        $view->assertDontSee('min-height: 300px');
    }
}
