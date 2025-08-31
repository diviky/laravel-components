<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class AccordionTest extends TestCase
{
    public function test_renders_basic_accordion(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="item-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
        $view->assertSee('accordion');
        $view->assertSee('accordion-item');
        $view->assertSee('accordion-header');
        $view->assertSee('accordion-body');
    }

    public function test_accordion_with_custom_id(): void
    {
        $view = $this->blade('
            <x-accordion id="custom-accordion">
                <x-accordion.item id="item-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('id="custom-accordion"');
        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
    }

    public function test_accordion_with_multiple_items(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="item-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
                <x-accordion.item id="item-2">
                    <x-accordion.header>Section 2</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 2</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Section 1');
        $view->assertSee('Section 2');
        $view->assertSee('Content for section 1');
        $view->assertSee('Content for section 2');
    }

    public function test_accordion_item_with_custom_id(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="custom-item">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
        $view->assertSee('accordion-item');
    }

    public function test_accordion_header_content(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="item-1">
                    <x-accordion.header>
                        <strong>Bold Header</strong>
                    </x-accordion.header>
                    <x-accordion.body>
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('<strong>Bold Header</strong>', false);
        $view->assertSee('Content');
        $view->assertSee('accordion-header');
    }

    public function test_accordion_body_with_show_attribute(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="item-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body show>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
        $view->assertSee('accordion-collapse collapse show');
    }

    public function test_accordion_body_without_show_attribute(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="item-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
        $view->assertSee('accordion-collapse collapse');
        $view->assertDontSee('accordion-collapse collapse show');
    }

    public function test_accordion_with_custom_classes(): void
    {
        $view = $this->blade('
            <x-accordion class="custom-accordion shadow">
                <x-accordion.item id="item-1" class="border-primary">
                    <x-accordion.header class="bg-primary text-white">
                        Section 1
                    </x-accordion.header>
                    <x-accordion.body class="bg-light">
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('custom-accordion');
        $view->assertSee('shadow');
        $view->assertSee('border-primary');
        $view->assertSee('bg-primary text-white');
        $view->assertSee('bg-light');
        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
    }

    public function test_accordion_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-accordion
                id="test-accordion"
                data-testid="accordion"
                aria-label="Test accordion">
                <x-accordion.item id="item-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body>
                        <p>Content for section 1</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('id="test-accordion"');
        $view->assertSee('data-testid="accordion"');
        $view->assertSee('aria-label="Test accordion"');
        $view->assertSee('Section 1');
        $view->assertSee('Content for section 1');
    }

    public function test_accordion_with_rich_content(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="rich-content">
                    <x-accordion.header>
                        <div class="d-flex align-items-center">
                            <i class="icon-info me-2"></i>
                            <span>Product Information</span>
                            <span class="badge bg-primary ms-auto">New</span>
                        </div>
                    </x-accordion.header>
                    <x-accordion.body>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Features</h5>
                                <ul>
                                    <li>Feature 1</li>
                                    <li>Feature 2</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Specifications</h5>
                                <p>Product specs here</p>
                            </div>
                        </div>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Product Information');
        $view->assertSee('New');
        $view->assertSee('Features');
        $view->assertSee('Feature 1');
        $view->assertSee('Feature 2');
        $view->assertSee('Specifications');
        $view->assertSee('Product specs here');
    }

    public function test_accordion_with_livewire_integration(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="livewire-1">
                    <x-accordion.header>
                        <span wire:click="toggleSection(\'section1\')" style="cursor: pointer;">
                            Section 1 (Open)
                        </span>
                    </x-accordion.header>
                    <x-accordion.body show>
                        <div wire:poll.10s>
                            <p>This content updates every 10 seconds.</p>
                            <p>Last updated: 12:00:00</p>
                        </div>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('wire:click="toggleSection(\'section1\')"');
        $view->assertSee('Section 1 (Open)');
        $view->assertSee('wire:poll.10s');
        $view->assertSee('This content updates every 10 seconds.');
        $view->assertSee('Last updated: 12:00:00');
    }

    public function test_accordion_with_faq_structure(): void
    {
        $view = $this->blade('
            <x-accordion id="faq">
                <x-accordion.item id="faq-1">
                    <x-accordion.header>
                        <strong>How do I create an account?</strong>
                    </x-accordion.header>
                    <x-accordion.body>
                        <p>To create an account, click the "Sign Up" button.</p>
                    </x-accordion.body>
                </x-accordion.item>
                <x-accordion.item id="faq-2">
                    <x-accordion.header>
                        <strong>What payment methods do you accept?</strong>
                    </x-accordion.header>
                    <x-accordion.body>
                        <p>We accept all major credit cards and PayPal.</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('How do I create an account?');
        $view->assertSee('To create an account, click the "Sign Up" button.');
        $view->assertSee('What payment methods do you accept?');
        $view->assertSee('We accept all major credit cards and PayPal.');
    }

    public function test_accordion_with_nested_content(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="nested">
                    <x-accordion.header>Main Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Main content</p>
                        <div class="alert alert-info">
                            <strong>Note:</strong> This is a nested alert.
                        </div>
                        <ul>
                            <li>Item 1</li>
                            <li>Item 2</li>
                        </ul>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Main Section');
        $view->assertSee('Main content');
        $view->assertSee('Note: This is a nested alert.');
        $view->assertSee('Item 1');
        $view->assertSee('Item 2');
    }

    public function test_accordion_with_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-accordion
                id="complex-accordion"
                class="custom-accordion"
                data-testid="accordion">
                <x-accordion.item id="item-1" class="border-primary">
                    <x-accordion.header class="bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="icon-info me-2"></i>
                            <span>Section 1</span>
                            <span class="badge bg-light text-dark ms-auto">New</span>
                        </div>
                    </x-accordion.header>
                    <x-accordion.body show class="bg-light">
                        <p>Content for section 1</p>
                        <div class="alert alert-info">
                            <strong>Info:</strong> This section is expanded by default.
                        </div>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('id="complex-accordion"');
        $view->assertSee('custom-accordion');
        $view->assertSee('data-testid="accordion"');
        $view->assertSee('border-primary');
        $view->assertSee('bg-primary text-white');
        $view->assertSee('Section 1');
        $view->assertSee('New');
        $view->assertSee('accordion-collapse collapse show');
        $view->assertSee('bg-light');
        $view->assertSee('Content for section 1');
        $view->assertSee('Info: This section is expanded by default.');
    }

    public function test_accordion_accessibility_features(): void
    {
        $view = $this->blade('
            <x-accordion
                role="region"
                aria-label="FAQ section">
                <x-accordion.item id="accessible-1">
                    <x-accordion.header>Accessible Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Accessible content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('role="region"');
        $view->assertSee('aria-label="FAQ section"');
        $view->assertSee('Accessible Section');
        $view->assertSee('Accessible content');
    }

    public function test_accordion_handles_edge_cases(): void
    {
        // Empty accordion
        $view = $this->blade('<x-accordion></x-accordion>');
        $view->assertStatus(200);

        // Accordion with empty item
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="empty-item">
                    <x-accordion.header></x-accordion.header>
                    <x-accordion.body></x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');
        $view->assertStatus(200);

        // Accordion with special characters
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="special-chars">
                    <x-accordion.header>Section & Content</x-accordion.header>
                    <x-accordion.body>
                        <p>Content with "quotes" and &amp; symbols</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');
        $view->assertSee('Section &amp; Content');
        $view->assertSee('Content with "quotes" and &amp; symbols');
    }

    public function test_accordion_semantic_structure(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="semantic">
                    <x-accordion.header>Semantic Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Semantic content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        // Should have proper semantic structure
        $view->assertSee('<div', false);
        $view->assertSee('accordion');
        $view->assertSee('accordion-item');
        $view->assertSee('accordion-header');
        $view->assertSee('accordion-body');
    }

    public function test_accordion_css_class_merging(): void
    {
        $view = $this->blade('
            <x-accordion class="custom-class">
                <x-accordion.item id="merged" class="item-class">
                    <x-accordion.header class="header-class">Section</x-accordion.header>
                    <x-accordion.body class="body-class">
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        // Should merge custom classes with default classes
        $view->assertSee('custom-class');
        $view->assertSee('item-class');
        $view->assertSee('header-class');
        $view->assertSee('body-class');
        $view->assertSee('Section');
        $view->assertSee('Content');
    }

    public function test_accordion_performance_attributes(): void
    {
        $view = $this->blade('
            <x-accordion
                data-testid="accordion-component"
                data-loading="false"
                data-interactive="true">
                <x-accordion.item id="performance">
                    <x-accordion.header>Performance Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Performance content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('data-testid="accordion-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
        $view->assertSee('Performance Section');
        $view->assertSee('Performance content');
    }

    public function test_accordion_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-accordion id="bootstrapAccordion">
                <x-accordion.item id="bootstrap-item">
                    <x-accordion.header>Bootstrap Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Bootstrap content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        // Should have proper Bootstrap accordion structure
        $view->assertSee('accordion');
        $view->assertSee('accordion-item');
        $view->assertSee('accordion-header');
        $view->assertSee('accordion-body');
        $view->assertSee('accordion-collapse collapse');
        $view->assertSee('id="bootstrapAccordion"');
        $view->assertSee('Bootstrap Section');
        $view->assertSee('Bootstrap content');
    }

    public function test_accordion_with_long_content(): void
    {
        $longContent = 'This is a very long content that might wrap to multiple lines and test how the accordion handles extended content with various formatting and structure.';
        $view = $this->blade("
            <x-accordion>
                <x-accordion.item id=\"long-content\">
                    <x-accordion.header>Long Content Section</x-accordion.header>
                    <x-accordion.body>
                        <p>{$longContent}</p>
                        <p>Additional paragraph with more content to test scrolling and layout.</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ");

        $view->assertSee($longContent);
        $view->assertSee('Long Content Section');
        $view->assertSee('Additional paragraph with more content to test scrolling and layout.');
    }

    public function test_accordion_with_html_content(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="html-content">
                    <x-accordion.header>
                        <strong>Bold</strong> <em>Italic</em> <span class="text-primary">Colored</span> Header
                    </x-accordion.header>
                    <x-accordion.body>
                        <div class="alert alert-info">
                            <strong>Info:</strong> This is an alert within accordion content.
                        </div>
                        <ul>
                            <li><strong>Bold item</strong></li>
                            <li><em>Italic item</em></li>
                            <li><span class="badge bg-primary">Badge item</span></li>
                        </ul>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('<strong>Bold</strong>', false);
        $view->assertSee('<em>Italic</em>', false);
        $view->assertSee('<span class="text-primary">Colored</span>', false);
        $view->assertSee('Info: This is an alert within accordion content.');
        $view->assertSee('<strong>Bold item</strong>', false);
        $view->assertSee('<em>Italic item</em>', false);
        $view->assertSee('<span class="badge bg-primary">Badge item</span>', false);
    }

    public function test_accordion_with_empty_slots(): void
    {
        // Test accordion with empty header
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="empty-header">
                    <x-accordion.header></x-accordion.header>
                    <x-accordion.body>
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');
        $view->assertSee('Content');
        $view->assertStatus(200);

        // Test accordion with empty body
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="empty-body">
                    <x-accordion.header>Header</x-accordion.header>
                    <x-accordion.body></x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');
        $view->assertSee('Header');
        $view->assertStatus(200);
    }

    public function test_accordion_with_multiple_show_sections(): void
    {
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="show-1">
                    <x-accordion.header>Section 1</x-accordion.header>
                    <x-accordion.body show>
                        <p>Content 1</p>
                    </x-accordion.body>
                </x-accordion.item>
                <x-accordion.item id="show-2">
                    <x-accordion.header>Section 2</x-accordion.header>
                    <x-accordion.body show>
                        <p>Content 2</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Section 1');
        $view->assertSee('Section 2');
        $view->assertSee('Content 1');
        $view->assertSee('Content 2');
        $view->assertSee('accordion-collapse collapse show');
    }

    public function test_accordion_with_nested_accordions(): void
    {
        $view = $this->blade('
            <x-accordion id="parent">
                <x-accordion.item id="parent-item">
                    <x-accordion.header>Parent Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Parent content</p>
                        <x-accordion id="child">
                            <x-accordion.item id="child-item">
                                <x-accordion.header>Child Section</x-accordion.header>
                                <x-accordion.body>
                                    <p>Child content</p>
                                </x-accordion.body>
                            </x-accordion.item>
                        </x-accordion>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('Parent Section');
        $view->assertSee('Parent content');
        $view->assertSee('Child Section');
        $view->assertSee('Child content');
        $view->assertSee('id="parent"');
        $view->assertSee('id="child"');
    }

    public function test_accordion_with_boolean_show_attribute(): void
    {
        // Test show=true
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="boolean-show">
                    <x-accordion.header>Section</x-accordion.header>
                    <x-accordion.body :show="true">
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');
        $view->assertSee('accordion-collapse collapse show');
        $view->assertSee('Section');
        $view->assertSee('Content');

        // Test show=false
        $view = $this->blade('
            <x-accordion>
                <x-accordion.item id="boolean-hide">
                    <x-accordion.header>Section</x-accordion.header>
                    <x-accordion.body :show="false">
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');
        $view->assertSee('accordion-collapse collapse');
        $view->assertDontSee('accordion-collapse collapse show');
        $view->assertSee('Section');
        $view->assertSee('Content');
    }

    public function test_accordion_with_complex_id_generation(): void
    {
        $view = $this->blade('
            <x-accordion id="complex-123">
                <x-accordion.item id="item-456">
                    <x-accordion.header>Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('id="complex-123"');
        $view->assertSee('Section');
        $view->assertSee('Content');
    }

    public function test_accordion_with_data_attributes(): void
    {
        $view = $this->blade('
            <x-accordion
                data-bs-parent="#parent"
                data-testid="accordion">
                <x-accordion.item id="data-item">
                    <x-accordion.header>Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('data-bs-parent="#parent"');
        $view->assertSee('data-testid="accordion"');
        $view->assertSee('Section');
        $view->assertSee('Content');
    }

    public function test_accordion_with_aria_attributes(): void
    {
        $view = $this->blade('
            <x-accordion
                aria-label="FAQ section"
                aria-describedby="accordion-description">
                <x-accordion.item id="aria-item">
                    <x-accordion.header>Section</x-accordion.header>
                    <x-accordion.body>
                        <p>Content</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        ');

        $view->assertSee('aria-label="FAQ section"');
        $view->assertSee('aria-describedby="accordion-description"');
        $view->assertSee('Section');
        $view->assertSee('Content');
    }
}
