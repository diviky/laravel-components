<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class TabsTest extends TestCase
{
    public function test_renders_basic_tabs(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="tab1" label="Tab 1" active />
                <x-tabs.item id="tab2" label="Tab 2" />
                <x-tabs.item id="tab3" label="Tab 3" />

                <x-tabs.content>
                    <x-tabs.pane id="tab1" active>
                        <p>Content for tab 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2">
                        <p>Content for tab 2</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab3">
                        <p>Content for tab 3</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Tab 3');
        $view->assertSee('Content for tab 1');
        $view->assertSee('Content for tab 2');
        $view->assertSee('Content for tab 3');
        $view->assertSee('nav-tabs');
        $view->assertSee('tab-content');
    }

    public function test_tabs_with_pills_style(): void
    {
        $view = $this->blade('
            <x-tabs type="pills">
                <x-tabs.item id="tab1" label="Tab 1" active />
                <x-tabs.item id="tab2" label="Tab 2" />

                <x-tabs.content>
                    <x-tabs.pane id="tab1" active>
                        <p>Content for tab 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2">
                        <p>Content for tab 2</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Content for tab 1');
        $view->assertSee('Content for tab 2');
        $view->assertSee('nav-pills');
        $view->assertDontSee('nav-tabs');
    }

    public function test_tabs_with_custom_classes(): void
    {
        $view = $this->blade('
            <x-tabs class="custom-tabs shadow">
                <x-tabs.item id="tab1" label="Tab 1" active class="border-primary" />
                <x-tabs.item id="tab2" label="Tab 2" class="border-secondary" />

                <x-tabs.content class="bg-light p-3">
                    <x-tabs.pane id="tab1" active class="bg-white p-3">
                        <p>Content for tab 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2" class="bg-white p-3">
                        <p>Content for tab 2</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('custom-tabs');
        $view->assertSee('shadow');
        $view->assertSee('border-primary');
        $view->assertSee('border-secondary');
        $view->assertSee('bg-light p-3');
        $view->assertSee('bg-white p-3');
        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Content for tab 1');
        $view->assertSee('Content for tab 2');
    }

    public function test_tabs_with_custom_attributes(): void
    {
        $view = $this->blade('
            <x-tabs
                id="test-tabs"
                data-testid="tabs"
                aria-label="Test tabs">
                <x-tabs.item id="tab1" label="Tab 1" active />
                <x-tabs.item id="tab2" label="Tab 2" />

                <x-tabs.content>
                    <x-tabs.pane id="tab1" active>
                        <p>Content for tab 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2">
                        <p>Content for tab 2</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('id="test-tabs"');
        $view->assertSee('data-testid="tabs"');
        $view->assertSee('aria-label="Test tabs"');
        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Content for tab 1');
        $view->assertSee('Content for tab 2');
    }

    public function test_tab_item_with_label_attribute(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="tab1" label="Settings Tab" active />
                <x-tabs.item id="tab2" label="Profile Tab" />

                <x-tabs.content>
                    <x-tabs.pane id="tab1" active>
                        <p>Settings content</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2">
                        <p>Profile content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('Settings Tab');
        $view->assertSee('Profile Tab');
        $view->assertSee('Settings content');
        $view->assertSee('Profile content');
    }

    public function test_tab_item_with_slot_content(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="tab1" active>
                    <i class="icon-settings me-2"></i>
                    Settings
                </x-tabs.item>
                <x-tabs.item id="tab2">
                    <i class="icon-user me-2"></i>
                    Profile
                </x-tabs.item>

                <x-tabs.content>
                    <x-tabs.pane id="tab1" active>
                        <p>Settings content</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2">
                        <p>Profile content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('<i class="icon-settings me-2"></i>', false);
        $view->assertSee('<i class="icon-user me-2"></i>', false);
        $view->assertSee('Settings');
        $view->assertSee('Profile');
        $view->assertSee('Settings content');
        $view->assertSee('Profile content');
    }

    public function test_tab_item_with_active_state(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="tab1" label="Tab 1" active />
                <x-tabs.item id="tab2" label="Tab 2" />

                <x-tabs.content>
                    <x-tabs.pane id="tab1" active>
                        <p>Content for tab 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2">
                        <p>Content for tab 2</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('nav-link active');
        $view->assertSee('tab-pane active show');
        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Content for tab 1');
        $view->assertSee('Content for tab 2');
    }

    public function test_tab_pane_with_active_state(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="tab1" label="Tab 1" />
                <x-tabs.item id="tab2" label="Tab 2" active />

                <x-tabs.content>
                    <x-tabs.pane id="tab1">
                        <p>Content for tab 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2" active>
                        <p>Content for tab 2</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('nav-link active');
        $view->assertSee('tab-pane active show');
        $view->assertSee('Tab 1');
        $view->assertSee('Tab 2');
        $view->assertSee('Content for tab 1');
        $view->assertSee('Content for tab 2');
    }

    public function test_tabs_with_rich_content(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="info" active>
                    <i class="icon-info me-2"></i>
                    Information
                </x-tabs.item>
                <x-tabs.item id="stats">
                    <i class="icon-chart me-2"></i>
                    Statistics
                </x-tabs.item>

                <x-tabs.content>
                    <x-tabs.pane id="info" active>
                        <div class="alert alert-info">
                            <strong>Info:</strong> This is important information.
                        </div>
                        <p>Additional information content here.</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="stats">
                        <h4>Statistics</h4>
                        <ul>
                            <li>Total Users: 1,234</li>
                            <li>Active Users: 987</li>
                        </ul>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('Information');
        $view->assertSee('Statistics');
        $view->assertSee('Info: This is important information.');
        $view->assertSee('Additional information content here.');
        $view->assertSee('Total Users: 1,234');
        $view->assertSee('Active Users: 987');
    }

    public function test_tabs_with_livewire_integration(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="livewire-tab" label="Livewire Tab" active />
                <x-tabs.item id="static-tab" label="Static Tab" />

                <x-tabs.content>
                    <x-tabs.pane id="livewire-tab" active>
                        <div wire:poll.5s>
                            <h4>Livewire Content</h4>
                            <p>This content updates every 5 seconds.</p>
                            <p>Last updated: 12:00:00</p>
                        </div>
                    </x-tabs.pane>
                    <x-tabs.pane id="static-tab">
                        <h4>Static Content</h4>
                        <p>This content doesn\'t change.</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('wire:poll.5s');
        $view->assertSee('Livewire Tab');
        $view->assertSee('Static Tab');
        $view->assertSee('Livewire Content');
        $view->assertSee('This content updates every 5 seconds.');
        $view->assertSee('Last updated: 12:00:00');
        $view->assertSee('Static Content');
        $view->assertSee('This content doesn\'t change.');
    }

    public function test_tabs_with_icons_and_badges(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="notifications" active>
                    <i class="icon-bell me-2"></i>
                    Notifications
                    <span class="badge bg-danger ms-2">3</span>
                </x-tabs.item>
                <x-tabs.item id="messages">
                    <i class="icon-message me-2"></i>
                    Messages
                    <span class="badge bg-primary ms-2">12</span>
                </x-tabs.item>

                <x-tabs.content>
                    <x-tabs.pane id="notifications" active>
                        <h4>Notifications</h4>
                        <p>Notification content here.</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="messages">
                        <h4>Messages</h4>
                        <p>Message content here.</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('<i class="icon-bell me-2"></i>', false);
        $view->assertSee('<i class="icon-message me-2"></i>', false);
        $view->assertSee('Notifications');
        $view->assertSee('Messages');
        $view->assertSee('<span class="badge bg-danger ms-2">3</span>', false);
        $view->assertSee('<span class="badge bg-primary ms-2">12</span>', false);
        $view->assertSee('Notification content here.');
        $view->assertSee('Message content here.');
    }

    public function test_tabs_with_form_content(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="personal" label="Personal Info" active />
                <x-tabs.item id="contact" label="Contact Info" />

                <x-tabs.content>
                    <x-tabs.pane id="personal" active>
                        <h4>Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                        </div>
                    </x-tabs.pane>
                    <x-tabs.pane id="contact">
                        <h4>Contact Information</h4>
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('Personal Info');
        $view->assertSee('Contact Info');
        $view->assertSee('Personal Information');
        $view->assertSee('Contact Information');
        $view->assertSee('First Name');
        $view->assertSee('Last Name');
        $view->assertSee('Email');
        $view->assertSee('name="first_name"');
        $view->assertSee('name="last_name"');
        $view->assertSee('name="email"');
    }

    public function test_tabs_multiple_features_combination(): void
    {
        $view = $this->blade('
            <x-tabs
                type="pills"
                class="custom-tabs"
                id="complex-tabs"
                data-testid="tabs">
                <x-tabs.item id="tab1" label="Primary Tab" active class="border-primary" />
                <x-tabs.item id="tab2" label="Secondary Tab" class="border-secondary" />

                <x-tabs.content class="bg-light p-3">
                    <x-tabs.pane id="tab1" active class="bg-white p-3">
                        <div class="alert alert-info">
                            <strong>Info:</strong> This tab has custom styling.
                        </div>
                        <p>Primary content here.</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="tab2" class="bg-white p-3">
                        <h4>Secondary Content</h4>
                        <p>Secondary content here.</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('nav-pills');
        $view->assertSee('custom-tabs');
        $view->assertSee('id="complex-tabs"');
        $view->assertSee('data-testid="tabs"');
        $view->assertSee('border-primary');
        $view->assertSee('border-secondary');
        $view->assertSee('bg-light p-3');
        $view->assertSee('bg-white p-3');
        $view->assertSee('Primary Tab');
        $view->assertSee('Secondary Tab');
        $view->assertSee('Info: This tab has custom styling.');
        $view->assertSee('Primary content here.');
        $view->assertSee('Secondary Content');
        $view->assertSee('Secondary content here.');
    }

    public function test_tabs_accessibility_features(): void
    {
        $view = $this->blade('
            <x-tabs
                role="tablist"
                aria-label="Main navigation">
                <x-tabs.item id="accessible-1" label="Accessible Tab" active />
                <x-tabs.item id="accessible-2" label="Another Tab" />

                <x-tabs.content>
                    <x-tabs.pane id="accessible-1" active>
                        <p>Accessible content</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="accessible-2">
                        <p>Another content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('role="tablist"');
        $view->assertSee('aria-label="Main navigation"');
        $view->assertSee('Accessible Tab');
        $view->assertSee('Another Tab');
        $view->assertSee('Accessible content');
        $view->assertSee('Another content');
    }

    public function test_tabs_handles_edge_cases(): void
    {
        // Empty tabs
        $view = $this->blade('<x-tabs></x-tabs>');
        $view->assertStatus(200);

        // Tabs with empty content
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="empty" label="Empty Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="empty" active></x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');
        $view->assertSee('Empty Tab');
        $view->assertStatus(200);

        // Tabs with special characters
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="special" label="Tab & Content" active />
                <x-tabs.content>
                    <x-tabs.pane id="special" active>
                        <p>Content with "quotes" and &amp; symbols</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');
        $view->assertSee('Tab &amp; Content');
        $view->assertSee('Content with "quotes" and &amp; symbols');
    }

    public function test_tabs_semantic_structure(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="semantic" label="Semantic Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="semantic" active>
                        <p>Semantic content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        // Should have proper semantic structure
        $view->assertSee('<ul', false);
        $view->assertSee('<li', false);
        $view->assertSee('<a', false);
        $view->assertSee('<div', false);
        $view->assertSee('nav-tabs');
        $view->assertSee('tab-content');
        $view->assertSee('tab-pane');
    }

    public function test_tabs_css_class_merging(): void
    {
        $view = $this->blade('
            <x-tabs class="custom-tabs">
                <x-tabs.item id="merged" label="Merged Tab" active class="custom-tab" />
                <x-tabs.content class="custom-content">
                    <x-tabs.pane id="merged" active class="custom-pane">
                        <p>Content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        // Should merge custom classes with default classes
        $view->assertSee('custom-tabs');
        $view->assertSee('custom-tab');
        $view->assertSee('custom-content');
        $view->assertSee('custom-pane');
        $view->assertSee('Merged Tab');
        $view->assertSee('Content');
    }

    public function test_tabs_performance_attributes(): void
    {
        $view = $this->blade('
            <x-tabs
                data-testid="tabs-component"
                data-loading="false"
                data-interactive="true">
                <x-tabs.item id="performance" label="Performance Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="performance" active>
                        <p>Performance content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('data-testid="tabs-component"');
        $view->assertSee('data-loading="false"');
        $view->assertSee('data-interactive="true"');
        $view->assertSee('Performance Tab');
        $view->assertSee('Performance content');
    }

    public function test_tabs_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-tabs id="bootstrapTabs">
                <x-tabs.item id="bootstrap-tab" label="Bootstrap Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="bootstrap-tab" active>
                        <p>Bootstrap content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        // Should have proper Bootstrap tab structure
        $view->assertSee('nav-tabs');
        $view->assertSee('tab-content');
        $view->assertSee('tab-pane');
        $view->assertSee('nav-link');
        $view->assertSee('data-bs-toggle="tab"');
        $view->assertSee('id="bootstrapTabs"');
        $view->assertSee('Bootstrap Tab');
        $view->assertSee('Bootstrap content');
    }

    public function test_tabs_with_long_content(): void
    {
        $longContent = 'This is a very long content that might wrap to multiple lines and test how the tabs handle extended content with various formatting and structure.';
        $view = $this->blade("
            <x-tabs>
                <x-tabs.item id=\"long-content\" label=\"Long Content Tab\" active />
                <x-tabs.content>
                    <x-tabs.pane id=\"long-content\" active>
                        <p>{$longContent}</p>
                        <p>Additional paragraph with more content to test scrolling and layout.</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ");

        $view->assertSee($longContent);
        $view->assertSee('Long Content Tab');
        $view->assertSee('Additional paragraph with more content to test scrolling and layout.');
    }

    public function test_tabs_with_html_content(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="html-content" active>
                    <strong>Bold</strong> <em>Italic</em> <span class="text-primary">Colored</span> Tab
                </x-tabs.item>
                <x-tabs.content>
                    <x-tabs.pane id="html-content" active>
                        <div class="alert alert-info">
                            <strong>Info:</strong> This is an alert within tab content.
                        </div>
                        <ul>
                            <li><strong>Bold item</strong></li>
                            <li><em>Italic item</em></li>
                            <li><span class="badge bg-primary">Badge item</span></li>
                        </ul>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('<strong>Bold</strong>', false);
        $view->assertSee('<em>Italic</em>', false);
        $view->assertSee('<span class="text-primary">Colored</span>', false);
        $view->assertSee('Info: This is an alert within tab content.');
        $view->assertSee('<strong>Bold item</strong>', false);
        $view->assertSee('<em>Italic item</em>', false);
        $view->assertSee('<span class="badge bg-primary">Badge item</span>', false);
    }

    public function test_tabs_with_empty_slots(): void
    {
        // Test tabs with empty item
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="empty-item" active></x-tabs.item>
                <x-tabs.content>
                    <x-tabs.pane id="empty-item" active>
                        <p>Content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');
        $view->assertSee('Content');
        $view->assertStatus(200);

        // Test tabs with empty pane
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="empty-pane" label="Empty Pane" active />
                <x-tabs.content>
                    <x-tabs.pane id="empty-pane" active></x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');
        $view->assertSee('Empty Pane');
        $view->assertStatus(200);
    }

    public function test_tabs_with_multiple_active_items(): void
    {
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="active-1" label="Active 1" active />
                <x-tabs.item id="active-2" label="Active 2" active />

                <x-tabs.content>
                    <x-tabs.pane id="active-1" active>
                        <p>Content 1</p>
                    </x-tabs.pane>
                    <x-tabs.pane id="active-2" active>
                        <p>Content 2</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('Active 1');
        $view->assertSee('Active 2');
        $view->assertSee('Content 1');
        $view->assertSee('Content 2');
        $view->assertSee('nav-link active');
        $view->assertSee('tab-pane active show');
    }

    public function test_tabs_with_complex_id_generation(): void
    {
        $view = $this->blade('
            <x-tabs id="complex-123">
                <x-tabs.item id="tab-456" label="Complex Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="tab-456" active>
                        <p>Complex content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('id="complex-123"');
        $view->assertSee('Complex Tab');
        $view->assertSee('Complex content');
    }

    public function test_tabs_with_data_attributes(): void
    {
        $view = $this->blade('
            <x-tabs
                data-bs-parent="#parent"
                data-testid="tabs">
                <x-tabs.item id="data-tab" label="Data Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="data-tab" active>
                        <p>Data content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('data-bs-parent="#parent"');
        $view->assertSee('data-testid="tabs"');
        $view->assertSee('Data Tab');
        $view->assertSee('Data content');
    }

    public function test_tabs_with_aria_attributes(): void
    {
        $view = $this->blade('
            <x-tabs
                aria-label="Tab navigation"
                aria-describedby="tabs-description">
                <x-tabs.item id="aria-tab" label="Aria Tab" active />
                <x-tabs.content>
                    <x-tabs.pane id="aria-tab" active>
                        <p>Aria content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');

        $view->assertSee('aria-label="Tab navigation"');
        $view->assertSee('aria-describedby="tabs-description"');
        $view->assertSee('Aria Tab');
        $view->assertSee('Aria content');
    }

    public function test_tabs_with_boolean_active_attribute(): void
    {
        // Test active=true
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="boolean-active" label="Boolean Active" :active="true" />
                <x-tabs.content>
                    <x-tabs.pane id="boolean-active" :active="true">
                        <p>Boolean active content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');
        $view->assertSee('nav-link active');
        $view->assertSee('tab-pane active show');
        $view->assertSee('Boolean Active');
        $view->assertSee('Boolean active content');

        // Test active=false
        $view = $this->blade('
            <x-tabs>
                <x-tabs.item id="boolean-inactive" label="Boolean Inactive" :active="false" />
                <x-tabs.content>
                    <x-tabs.pane id="boolean-inactive" :active="false">
                        <p>Boolean inactive content</p>
                    </x-tabs.pane>
                </x-tabs.content>
            </x-tabs>
        ');
        $view->assertSee('nav-link');
        $view->assertDontSee('nav-link active');
        $view->assertSee('tab-pane');
        $view->assertDontSee('tab-pane active show');
        $view->assertSee('Boolean Inactive');
        $view->assertSee('Boolean inactive content');
    }
}
