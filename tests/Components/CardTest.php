<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class CardTest extends TestCase
{
    public function test_renders_basic_card(): void
    {
        $view = $this->blade('<x-card>Card content</x-card>');

        $view->assertSee('Card content');
        $view->assertSee('class="card"');
    }

    public function test_renders_with_title_and_subtitle(): void
    {
        $view = $this->blade('
            <x-card title="Card Title" subtitle="Card Subtitle">
                Card content
            </x-card>
        ');

        $view->assertSee('Card Title');
        $view->assertSee('Card Subtitle');
        $view->assertSee('card-title');
        $view->assertSee('card-subtitle');
    }

    public function test_status_indicator(): void
    {
        $view = $this->blade('<x-card status="success">Content</x-card>');

        $view->assertSee('card-status-top');
        $view->assertSee('bg-success');
    }

    public function test_status_side_positions(): void
    {
        $positions = ['top', 'bottom', 'start', 'end'];

        foreach ($positions as $position) {
            $view = $this->blade("<x-card status=\"primary\" statusSide=\"{$position}\">Content</x-card>");

            $view->assertSee("card-status-{$position}");
            $view->assertSee('bg-primary');
        }
    }

    public function test_ribbon_overlay(): void
    {
        $view = $this->blade('
            <x-card :ribbon="[\'text\' => \'New\', \'color\' => \'primary\']">
                Content
            </x-card>
        ');

        $view->assertSee('ribbon');
        $view->assertSee('bg-primary');
        $view->assertSee('New');
    }

    public function test_ribbon_with_default_color(): void
    {
        $view = $this->blade('
            <x-card :ribbon="[\'text\' => \'Featured\']">
                Content
            </x-card>
        ');

        $view->assertSee('ribbon');
        $view->assertSee('bg-primary'); // Default color
        $view->assertSee('Featured');
    }

    public function test_image_top_position(): void
    {
        $view = $this->blade('
            <x-card image="/test.jpg" imagePosition="top">
                Content
            </x-card>
        ');

        $view->assertSee('card-img-top');
        $view->assertSee('src="/test.jpg"');
    }

    public function test_image_bottom_position(): void
    {
        $view = $this->blade('
            <x-card image="/test.jpg" imagePosition="bottom">
                Content
            </x-card>
        ');

        $view->assertSee('card-img-bottom');
        $view->assertSee('src="/test.jpg"');
    }

    public function test_image_not_rendered_when_not_provided(): void
    {
        $view = $this->blade('<x-card>Content</x-card>');

        $view->assertDontSee('card-img-top');
        $view->assertDontSee('card-img-bottom');
    }

    public function test_border_color(): void
    {
        $view = $this->blade('<x-card borderColor="primary">Content</x-card>');

        $view->assertSee('border-primary');
    }

    public function test_text_color(): void
    {
        $view = $this->blade('<x-card textColor="white">Content</x-card>');

        $view->assertSee('text-white');
    }

    public function test_background_color(): void
    {
        $view = $this->blade('<x-card bgColor="dark">Content</x-card>');

        $view->assertSee('bg-dark');
    }

    public function test_size_variant(): void
    {
        $view = $this->blade('<x-card size="sm">Content</x-card>');

        $view->assertSee('bg-sm');
    }

    public function test_stacked_layout(): void
    {
        $view = $this->blade('<x-card stacked>Content</x-card>');

        $view->assertSee('card-stacked');
    }

    public function test_header_slot(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:header>
                    <h4>Header Content</h4>
                </x-slot:header>
                Body content
            </x-card>
        ');

        $view->assertSee('Header Content');
        $view->assertSee('Body content');
    }

    public function test_body_slot(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:body>
                    <p>Body content</p>
                </x-slot:body>
            </x-card>
        ');

        $view->assertSee('Body content');
    }

    public function test_footer_slot(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:footer>
                    <button>Action</button>
                </x-slot:footer>
            </x-card>
        ');

        $view->assertSee('Action');
    }

    public function test_filters_slot(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:filters>
                    <input type="search" placeholder="Search...">
                </x-slot:filters>
                Content
            </x-card>
        ');

        $view->assertSee('Search...');
    }

    public function test_title_without_body_slot(): void
    {
        $view = $this->blade('
            <x-card title="Card Title" subtitle="Card Subtitle">
                Additional content
            </x-card>
        ');

        // Should create card-body div when title/subtitle provided without body slot
        $view->assertSee('card-body');
        $view->assertSee('Card Title');
        $view->assertSee('Card Subtitle');
        $view->assertSee('Additional content');
    }

    public function test_title_with_body_slot(): void
    {
        $view = $this->blade('
            <x-card title="Card Title" subtitle="Card Subtitle">
                <x-slot:body>
                    <p>Body content</p>
                </x-slot:body>
            </x-card>
        ');

        $view->assertSee('Card Title');
        $view->assertSee('Card Subtitle');
        $view->assertSee('Body content');
    }

    public function test_custom_css_classes(): void
    {
        $view = $this->blade('<x-card class="custom-card shadow">Content</x-card>');

        $view->assertSee('custom-card');
        $view->assertSee('shadow');
        $view->assertSee('card');
    }

    public function test_multiple_attributes_combination(): void
    {
        $view = $this->blade('
            <x-card
                status="warning"
                statusSide="start"
                :ribbon="[\'text\' => \'Beta\', \'color\' => \'warning\']"
                title="Test Card"
                subtitle="With all features"
                image="/test.jpg"
                borderColor="warning"
                textColor="white"
                bgColor="dark"
                size="lg"
                stacked
                class="custom-class">
                Content
            </x-card>
        ');

        $view->assertSee('card-status-start');
        $view->assertSee('bg-warning');
        $view->assertSee('ribbon');
        $view->assertSee('Beta');
        $view->assertSee('Test Card');
        $view->assertSee('With all features');
        $view->assertSee('card-img-top');
        $view->assertSee('border-warning');
        $view->assertSee('text-white');
        $view->assertSee('bg-dark');
        $view->assertSee('bg-lg');
        $view->assertSee('card-stacked');
        $view->assertSee('custom-class');
    }

    public function test_livewire_integration(): void
    {
        $view = $this->blade('
            <x-card wire:loading.class="opacity-50">
                <x-slot:header>
                    <h4>{{ $title }}</h4>
                </x-slot:header>
                Content
            </x-card>
        ');

        $view->assertSee('wire:loading.class="opacity-50"');
    }

    public function test_accessibility_features(): void
    {
        $view = $this->blade('
            <x-card
                id="test-card"
                aria-label="Test card"
                role="article">
                Content
            </x-card>
        ');

        $view->assertSee('id="test-card"');
        $view->assertSee('aria-label="test card"');
        $view->assertSee('role="article"');
    }

    public function test_image_alt_text(): void
    {
        $view = $this->blade('
            <x-card image="/test.jpg" imagePosition="top">
                Content
            </x-card>
        ');

        $view->assertSee('alt="Card image"');
    }

    public function test_handles_edge_cases(): void
    {
        // Empty card
        $view = $this->blade('<x-card></x-card>');
        $view->assertStatus(200);

        // Only title, no content
        $view = $this->blade('<x-card title="Title Only" />');
        $view->assertSee('Title Only');

        // Invalid status color (should still render)
        $view = $this->blade('<x-card status="invalid">Content</x-card>');
        $view->assertSee('Content');

        // Empty ribbon array
        $view = $this->blade('<x-card :ribbon="[]">Content</x-card>');
        $view->assertSee('Content');
    }

    public function test_card_sub_components(): void
    {
        // Test card.header
        $view = $this->blade('
            <x-card.header class="bg-primary">
                Header content
            </x-card.header>
        ');
        $view->assertSee('Header content');
        $view->assertSee('bg-primary');

        // Test card.body
        $view = $this->blade('
            <x-card.body class="p-4">
                Body content
            </x-card.body>
        ');
        $view->assertSee('Body content');
        $view->assertSee('p-4');

        // Test card.footer
        $view = $this->blade('
            <x-card.footer class="text-end">
                Footer content
            </x-card.footer>
        ');
        $view->assertSee('Footer content');
        $view->assertSee('text-end');
    }

    public function test_card_with_complex_content(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:header>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Complex Header</h4>
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle">Options</button>
                        </div>
                    </div>
                </x-slot:header>

                <x-slot:body>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Section 1</h5>
                            <p>Content for section 1</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Section 2</h5>
                            <p>Content for section 2</p>
                        </div>
                    </div>
                </x-slot:body>

                <x-slot:footer>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Last updated: 2024-01-01</small>
                        <div>
                            <button class="btn btn-secondary">Cancel</button>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </x-slot:footer>
            </x-card>
        ');

        $view->assertSee('Complex Header');
        $view->assertSee('Section 1');
        $view->assertSee('Section 2');
        $view->assertSee('Last updated: 2024-01-01');
        $view->assertSee('Cancel');
        $view->assertSee('Save');
    }

    public function test_card_with_table_content(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:header>
                    <h4>Data Table</h4>
                </x-slot:header>

                <x-slot:body>
                    <x-table>
                        <x-table.header>
                            <x-table.row>
                                <x-table.cell>Name</x-table.cell>
                                <x-table.cell>Email</x-table.cell>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            <x-table.row>
                                <x-table.cell>John Doe</x-table.cell>
                                <x-table.cell>john@example.com</x-table.cell>
                            </x-table.row>
                        </x-table.body>
                    </x-table>
                </x-slot:body>
            </x-card>
        ');

        $view->assertSee('Data Table');
        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('John Doe');
    }

    public function test_card_with_form_content(): void
    {
        $view = $this->blade('
            <x-card>
                <x-slot:header>
                    <h4>Edit Profile</h4>
                </x-slot:header>

                <x-slot:body>
                    <x-form wire:submit.prevent="save">
                        <div class="mb-3">
                            <x-form-input name="name" label="Name" />
                        </div>
                        <div class="mb-3">
                            <x-form-input name="email" label="Email" type="email" />
                        </div>
                    </x-form>
                </x-slot:body>

                <x-slot:footer>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </x-slot:footer>
            </x-card>
        ');

        $view->assertSee('Edit Profile');
        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('Save Changes');
    }

    public function test_card_performance_attributes(): void
    {
        $view = $this->blade('
            <x-card
                data-testid="card-component"
                data-loading="false"
                data-interactive="true">
                Content
            </x-card>
        ');

        $view->assertSee('data-testid="card-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }
}
