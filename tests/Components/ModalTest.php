<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ModalTest extends TestCase
{
    public function test_renders_basic_modal(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:body>
                    Modal content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('Modal content');
        $view->assertSee('class="modal"');
        $view->assertSee('modal-dialog');
        $view->assertSee('modal-content');
    }

    public function test_modal_with_header(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:header>
                    <h5>Modal Title</h5>
                </x-slot:header>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('Modal Title');
        $view->assertSee('modal-header');
    }

    public function test_modal_with_footer(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:body>
                    Content
                </x-slot:body>
                <x-slot:footer>
                    <button>Action</button>
                </x-slot:footer>
            </x-modal>
        ');

        $view->assertSee('Action');
        $view->assertSee('modal-footer');
    }

    public function test_modal_with_toggle(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:toggle>
                    <button type="button" class="btn btn-primary">Open Modal</button>
                </x-slot:toggle>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('Open Modal');
    }

    public function test_modal_show_attribute(): void
    {
        $view = $this->blade('
            <x-modal :show="true">
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('show');
        $view->assertDontSee('fade');
    }

    public function test_modal_fade_when_not_shown(): void
    {
        $view = $this->blade('
            <x-modal :show="false">
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('fade');
        $view->assertDontSee('show');
    }

    public function test_modal_blur_effect(): void
    {
        $view = $this->blade('
            <x-modal blur>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('modal-blur');
    }

    public function test_modal_close_button_disabled(): void
    {
        $view = $this->blade('
            <x-modal :close="false">
                <x-slot:header>
                    <h5>Title</h5>
                </x-slot:header>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertDontSee('btn-close');
    }

    public function test_modal_close_button_enabled(): void
    {
        $view = $this->blade('
            <x-modal :close="true">
                <x-slot:header>
                    <h5>Title</h5>
                </x-slot:header>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('btn-close');
        $view->assertSee('data-bs-dismiss="modal"');
    }

    public function test_modal_small_size(): void
    {
        $view = $this->blade('
            <x-modal small>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('modal-sm');
    }

    public function test_modal_large_size(): void
    {
        $view = $this->blade('
            <x-modal large>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('modal-lg');
    }

    public function test_modal_centered(): void
    {
        $view = $this->blade('
            <x-modal center>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('modal-dialog-centered');
    }

    public function test_modal_scrollable(): void
    {
        $view = $this->blade('
            <x-modal scrollable>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('modal-dialog-scrollable');
    }

    public function test_modal_box_class(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('modal-box');
    }

    public function test_modal_without_center_attribute(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertDontSee('modal-dialog-centered');
    }

    public function test_modal_custom_css_classes(): void
    {
        $view = $this->blade('
            <x-modal class="custom-modal shadow">
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('custom-modal');
        $view->assertSee('shadow');
        $view->assertSee('modal');
    }

    public function test_modal_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-modal
                id="test-modal"
                tabindex="0"
                aria-labelledby="modal-title">
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('id="test-modal"');
        $view->assertSee('tabindex="0"');
        $view->assertSee('aria-labelledby="modal-title"');
    }

    public function test_modal_multiple_attributes_combination(): void
    {
        $view = $this->blade('
            <x-modal
                :show="true"
                blur
                large
                center
                scrollable
                :close="false"
                class="custom-modal">
                <x-slot:header>
                    <h5>Title</h5>
                </x-slot:header>
                <x-slot:body>
                    Content
                </x-slot:body>
                <x-slot:footer>
                    <button>Action</button>
                </x-slot:footer>
            </x-modal>
        ');

        $view->assertSee('show');
        $view->assertSee('modal-blur');
        $view->assertSee('modal-lg');
        $view->assertSee('modal-dialog-centered');
        $view->assertSee('modal-dialog-scrollable');
        $view->assertDontSee('btn-close');
        $view->assertSee('custom-modal');
        $view->assertSee('Title');
        $view->assertSee('Content');
        $view->assertSee('Action');
    }

    public function test_modal_livewire_integration(): void
    {
        $view = $this->blade('
            <x-modal wire:ignore.self>
                <x-slot:header>
                    <h5>{{ $title }}</h5>
                </x-slot:header>
                <x-slot:body>
                    {{ $content }}
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('wire:ignore.self');
    }

    public function test_modal_accessibility_features(): void
    {
        $view = $this->blade('
            <x-modal
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-title">
                <x-slot:header>
                    <h5 id="modal-title">Accessible Modal</h5>
                </x-slot:header>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('role="dialog"');
        $view->assertSee('aria-modal="true"');
        $view->assertSee('aria-labelledby="modal-title"');
        $view->assertSee('id="modal-title"');
    }

    public function test_modal_close_button_accessibility(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:header>
                    <h5>Title</h5>
                </x-slot:header>
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('aria-label="Close"');
        $view->assertSee('data-bs-dismiss="modal"');
    }

    public function test_modal_handles_edge_cases(): void
    {
        // Empty modal
        $view = $this->blade('<x-modal></x-modal>');
        $view->assertStatus(200);

        // Only header, no body
        $view = $this->blade('
            <x-modal>
                <x-slot:header>
                    <h5>Header Only</h5>
                </x-slot:header>
            </x-modal>
        ');
        $view->assertSee('Header Only');

        // Only footer, no body
        $view = $this->blade('
            <x-modal>
                <x-slot:footer>
                    <button>Footer Only</button>
                </x-slot:footer>
            </x-modal>
        ');
        $view->assertSee('Footer Only');
    }

    public function test_modal_sub_components(): void
    {
        // Test modal.header
        $view = $this->blade('
            <x-modal.header class="bg-primary">
                Header content
            </x-modal.header>
        ');
        $view->assertSee('Header content');
        $view->assertSee('bg-primary');
        $view->assertSee('modal-header');

        // Test modal.body
        $view = $this->blade('
            <x-modal.body class="p-4">
                Body content
            </x-modal.body>
        ');
        $view->assertSee('Body content');
        $view->assertSee('p-4');
        $view->assertSee('modal-body');

        // Test modal.footer
        $view = $this->blade('
            <x-modal.footer class="text-end">
                Footer content
            </x-modal.footer>
        ');
        $view->assertSee('Footer content');
        $view->assertSee('text-end');
        $view->assertSee('modal-footer');

        // Test modal.title
        $view = $this->blade('
            <x-modal.title class="text-primary">
                Modal Title
            </x-modal.title>
        ');
        $view->assertSee('Modal Title');
        $view->assertSee('text-primary');

        // Test modal.toggle
        $view = $this->blade('
            <x-modal.toggle>
                Toggle button
            </x-modal.toggle>
        ');
        $view->assertSee('Toggle button');
    }

    public function test_modal_with_complex_content(): void
    {
        $view = $this->blade('
            <x-modal large>
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
                        <small class="text-muted">Modal actions</small>
                        <div>
                            <button class="btn btn-secondary">Cancel</button>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </x-slot:footer>
            </x-modal>
        ');

        $view->assertSee('Complex Header');
        $view->assertSee('Section 1');
        $view->assertSee('Section 2');
        $view->assertSee('Modal actions');
        $view->assertSee('Cancel');
        $view->assertSee('Save');
        $view->assertSee('modal-lg');
    }

    public function test_modal_with_form_content(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:header>
                    <h4>Edit Form</h4>
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
            </x-modal>
        ');

        $view->assertSee('Edit Form');
        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('Save Changes');
    }

    public function test_modal_with_table_content(): void
    {
        $view = $this->blade('
            <x-modal large>
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
            </x-modal>
        ');

        $view->assertSee('Data Table');
        $view->assertSee('Name');
        $view->assertSee('Email');
        $view->assertSee('John Doe');
    }

    public function test_modal_performance_attributes(): void
    {
        $view = $this->blade('
            <x-modal
                data-testid="modal-component"
                data-loading="false"
                data-interactive="true">
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        $view->assertSee('data-testid="modal-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
    }

    public function test_modal_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-modal id="bootstrapModal">
                <x-slot:body>
                    Content
                </x-slot:body>
            </x-modal>
        ');

        // Should have proper Bootstrap modal structure
        $view->assertSee('modal');
        $view->assertSee('modal-dialog');
        $view->assertSee('modal-content');
        $view->assertSee('id="bootstrapModal"');
    }

    public function test_modal_default_slot_content(): void
    {
        $view = $this->blade('
            <x-modal>
                <x-slot:header>
                    <h5>Title</h5>
                </x-slot:header>
                <x-slot:body>
                    Body content
                </x-slot:body>
                Default slot content
                <x-slot:footer>
                    <button>Footer</button>
                </x-slot:footer>
            </x-modal>
        ');

        $view->assertSee('Title');
        $view->assertSee('Body content');
        $view->assertSee('Default slot content');
        $view->assertSee('Footer');
    }
}
