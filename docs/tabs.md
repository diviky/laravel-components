# Tabs Component

A tabbed interface component that allows users to switch between different content sections, providing an organized way to display multiple content areas in a single view.

## Overview

**Component Type:** Content Organization/Interactive  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for tab functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/tabs/index.blade.php`
- **Sub-components:** 
  - `tabs/item.blade.php` - Individual tab navigation item
  - `tabs/content.blade.php` - Tab content container
  - `tabs/pane.blade.php` - Individual tab content pane
- **Documentation:** `docs/tabs.md`
- **Tests:** `tests/Components/TabsTest.php`

## Basic Usage

```blade
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
```

## Attributes & Properties

### Tabs Container (`<x-tabs>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'tabs' | Tab style (tabs, pills) | `'pills'` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-tabs'` |

### Tab Item (`<x-tabs.item>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Tab label text | `'Settings'` |
| id | string | '' | Tab ID for linking | `'settings-tab'` |
| active | boolean | false | Mark tab as active | `true` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-tab'` |

### Tab Content (`<x-tabs.content>`)

#### Optional Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-content'` |

### Tab Pane (`<x-tabs.pane>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | '' | Pane ID for linking | `'settings-pane'` |
| active | boolean | false | Mark pane as active | `true` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-pane'` |

## Slots

### Default Slot (Tabs Container)
- **Purpose:** Tab items and content
- **Content Type:** Tab item and content components
- **Required:** Yes

### Default Slot (Tab Item)
- **Purpose:** Tab label content
- **Content Type:** Text, HTML, or components
- **Required:** No (uses label attribute if not provided)

### Default Slot (Tab Content)
- **Purpose:** Tab panes
- **Content Type:** Tab pane components
- **Required:** Yes

### Default Slot (Tab Pane)
- **Purpose:** Tab content
- **Content Type:** Any content
- **Required:** Yes

## Usage Examples

### Basic Tabs
```blade
<x-tabs>
    <x-tabs.item id="home" label="Home" active />
    <x-tabs.item id="profile" label="Profile" />
    <x-tabs.item id="settings" label="Settings" />
    
    <x-tabs.content>
        <x-tabs.pane id="home" active>
            <h3>Welcome Home</h3>
            <p>This is the home tab content.</p>
        </x-tabs.pane>
        <x-tabs.pane id="profile">
            <h3>User Profile</h3>
            <p>This is the profile tab content.</p>
        </x-tabs.pane>
        <x-tabs.pane id="settings">
            <h3>Settings</h3>
            <p>This is the settings tab content.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Pills Style Tabs
```blade
<x-tabs type="pills">
    <x-tabs.item id="overview" label="Overview" active />
    <x-tabs.item id="details" label="Details" />
    <x-tabs.item id="reviews" label="Reviews" />
    
    <x-tabs.content>
        <x-tabs.pane id="overview" active>
            <h4>Product Overview</h4>
            <p>This is the product overview content.</p>
        </x-tabs.pane>
        <x-tabs.pane id="details">
            <h4>Product Details</h4>
            <p>This is the product details content.</p>
        </x-tabs.pane>
        <x-tabs.pane id="reviews">
            <h4>Customer Reviews</h4>
            <p>This is the reviews content.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Tabs with Custom Content
```blade
<x-tabs>
    <x-tabs.item id="info" active>
        <i class="icon-info me-2"></i>
        Information
    </x-tabs.item>
    <x-tabs.item id="stats">
        <i class="icon-chart me-2"></i>
        Statistics
    </x-tabs.item>
    <x-tabs.item id="actions">
        <i class="icon-settings me-2"></i>
        Actions
    </x-tabs.item>
    
    <x-tabs.content>
        <x-tabs.pane id="info" active>
            <div class="alert alert-info">
                <strong>Info:</strong> This is important information.
            </div>
            <p>Additional information content here.</p>
        </x-tabs.pane>
        <x-tabs.pane id="stats">
            <x-table>
                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Total Users</x-table.cell>
                        <x-table.cell>1,234</x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Active Users</x-table.cell>
                        <x-table.cell>987</x-table.cell>
                    </x-table.row>
                </x-slot:body>
            </x-table>
        </x-tabs.pane>
        <x-tabs.pane id="actions">
            <x-form-button>Edit</x-form-button>
            <x-form-button color="danger">Delete</x-form-button>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Tabs with Livewire Integration
```blade
<x-tabs>
    <x-tabs.item id="livewire-tab" label="Livewire Tab" active />
    <x-tabs.item id="static-tab" label="Static Tab" />
    
    <x-tabs.content>
        <x-tabs.pane id="livewire-tab" active>
            <div wire:poll.5s>
                <h4>Livewire Content</h4>
                <p>This content updates every 5 seconds.</p>
                <p>Last updated: {{ now()->format('H:i:s') }}</p>
                <x-form-input wire:model="searchTerm" placeholder="Search..." />
                <div class="mt-3">
                    @foreach($filteredItems as $item)
                        <div class="p-2 border-bottom">{{ $item->name }}</div>
                    @endforeach
                </div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="static-tab">
            <h4>Static Content</h4>
            <p>This content doesn't change.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Tabs with Custom Styling
```blade
<x-tabs class="custom-tabs shadow">
    <x-tabs.item id="styled-1" label="Primary Tab" active class="border-primary" />
    <x-tabs.item id="styled-2" label="Secondary Tab" class="border-secondary" />
    
    <x-tabs.content class="bg-light p-3">
        <x-tabs.pane id="styled-1" active class="bg-white p-3">
            <h4>Primary Content</h4>
            <p>This tab has custom styling.</p>
        </x-tabs.pane>
        <x-tabs.pane id="styled-2" class="bg-white p-3">
            <h4>Secondary Content</h4>
            <p>This tab also has custom styling.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Tabs with Icons and Badges
```blade
<x-tabs>
    <x-tabs.item id="notifications" active>
        <i class="icon-bell me-2"></i>
        Notifications
        <x-badge color="danger" class="ms-2">3</x-badge>
    </x-tabs.item>
    <x-tabs.item id="messages">
        <i class="icon-message me-2"></i>
        Messages
        <x-badge color="primary" class="ms-2">12</x-badge>
    </x-tabs.item>
    <x-tabs.item id="tasks">
        <i class="icon-check me-2"></i>
        Tasks
        <x-badge color="success" class="ms-2">5</x-badge>
    </x-tabs.item>
    
    <x-tabs.content>
        <x-tabs.pane id="notifications" active>
            <h4>Notifications</h4>
            <div class="list-group">
                <div class="list-group-item">New user registration</div>
                <div class="list-group-item">System update available</div>
                <div class="list-group-item">Backup completed</div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="messages">
            <h4>Messages</h4>
            <p>Your messages will appear here.</p>
        </x-tabs.pane>
        <x-tabs.pane id="tasks">
            <h4>Tasks</h4>
            <p>Your tasks will appear here.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Tabs with Form Content
```blade
<x-tabs>
    <x-tabs.item id="personal" label="Personal Info" active />
    <x-tabs.item id="contact" label="Contact Info" />
    <x-tabs.item id="preferences" label="Preferences" />
    
    <x-tabs.content>
        <x-tabs.pane id="personal" active>
            <h4>Personal Information</h4>
            <div class="row">
                <div class="col-md-6">
                    <x-form-input name="first_name" label="First Name" />
                </div>
                <div class="col-md-6">
                    <x-form-input name="last_name" label="Last Name" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <x-form-input name="email" label="Email" type="email" />
                </div>
                <div class="col-md-6">
                    <x-form-input name="phone" label="Phone" type="tel" />
                </div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="contact">
            <h4>Contact Information</h4>
            <x-form-input name="address" label="Address" />
            <div class="row">
                <div class="col-md-6">
                    <x-form-input name="city" label="City" />
                </div>
                <div class="col-md-3">
                    <x-form-input name="state" label="State" />
                </div>
                <div class="col-md-3">
                    <x-form-input name="zip" label="ZIP Code" />
                </div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="preferences">
            <h4>Preferences</h4>
            <x-form-switch name="email_notifications" label="Email Notifications" />
            <x-form-switch name="sms_notifications" label="SMS Notifications" />
            <x-form-switch name="marketing_emails" label="Marketing Emails" />
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

## Features

### Tab Styles
- **Tabs (`type="tabs"`):** Default tab style with underline indicators
- **Pills (`type="pills"`):** Pill-style tabs with rounded appearance
- **Custom Styling:** Additional CSS classes for custom appearance

### Content Organization
- **Tab Navigation:** Clickable tab headers for content switching
- **Content Panes:** Individual content areas for each tab
- **Active States:** Visual indication of current active tab
- **Rich Content:** Support for any type of content in tab panes

### Interactive Features
- **Smooth Transitions:** Bootstrap-powered smooth tab switching
- **Keyboard Navigation:** Full keyboard accessibility support
- **Focus Management:** Proper focus handling for accessibility
- **Event Handling:** Bootstrap tab events for custom interactions

### Bootstrap Integration
- **Tab Structure:** Proper Bootstrap tab HTML structure
- **JavaScript Functionality:** Bootstrap tab JavaScript for smooth switching
- **CSS Classes:** Bootstrap tab styling with proper classes
- **Accessibility:** ARIA attributes and keyboard navigation support

## Common Patterns

### Product Information Tabs
```blade
<x-tabs>
    <x-tabs.item id="description" label="Description" active />
    <x-tabs.item id="specifications" label="Specifications" />
    <x-tabs.item id="reviews" label="Reviews" />
    <x-tabs.item id="shipping" label="Shipping" />
    
    <x-tabs.content>
        <x-tabs.pane id="description" active>
            <h4>Product Description</h4>
            <p>{{ $product->description }}</p>
        </x-tabs.pane>
        <x-tabs.pane id="specifications">
            <h4>Technical Specifications</h4>
            <x-table>
                <x-slot:body>
                    @foreach($product->specifications as $spec)
                        <x-table.row>
                            <x-table.cell>{{ $spec->name }}</x-table.cell>
                            <x-table.cell>{{ $spec->value }}</x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot:body>
            </x-table>
        </x-tabs.pane>
        <x-tabs.pane id="reviews">
            <h4>Customer Reviews</h4>
            @foreach($product->reviews as $review)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $review->user->name }}</strong>
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
            @endforeach
        </x-tabs.pane>
        <x-tabs.pane id="shipping">
            <h4>Shipping Information</h4>
            <p>Shipping details and policies will appear here.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### User Profile Tabs
```blade
<x-tabs>
    <x-tabs.item id="profile" label="Profile" active />
    <x-tabs.item id="security" label="Security" />
    <x-tabs.item id="notifications" label="Notifications" />
    <x-tabs.item id="billing" label="Billing" />
    
    <x-tabs.content>
        <x-tabs.pane id="profile" active>
            <h4>Profile Information</h4>
            <x-form-input name="name" label="Full Name" />
            <x-form-input name="email" label="Email" type="email" />
            <x-form-input name="bio" label="Bio" />
        </x-tabs.pane>
        <x-tabs.pane id="security">
            <h4>Security Settings</h4>
            <x-form-input name="current_password" label="Current Password" type="password" />
            <x-form-input name="new_password" label="New Password" type="password" />
            <x-form-input name="confirm_password" label="Confirm Password" type="password" />
        </x-tabs.pane>
        <x-tabs.pane id="notifications">
            <h4>Notification Preferences</h4>
            <x-form-switch name="email_notifications" label="Email Notifications" />
            <x-form-switch name="sms_notifications" label="SMS Notifications" />
            <x-form-switch name="push_notifications" label="Push Notifications" />
        </x-tabs.pane>
        <x-tabs.pane id="billing">
            <h4>Billing Information</h4>
            <p>Billing details and payment methods will appear here.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Dashboard Tabs
```blade
<x-tabs>
    <x-tabs.item id="overview" label="Overview" active />
    <x-tabs.item id="analytics" label="Analytics" />
    <x-tabs.item id="reports" label="Reports" />
    <x-tabs.item id="settings" label="Settings" />
    
    <x-tabs.content>
        <x-tabs.pane id="overview" active>
            <div class="row">
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <h5>Total Users</h5>
                            <h2>{{ $totalUsers }}</h2>
                        </x-slot:body>
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <h5>Active Users</h5>
                            <h2>{{ $activeUsers }}</h2>
                        </x-slot:body>
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <h5>Revenue</h5>
                            <h2>${{ number_format($revenue) }}</h2>
                        </x-slot:body>
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <h5>Orders</h5>
                            <h2>{{ $orders }}</h2>
                        </x-slot:body>
                    </x-card>
                </div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="analytics">
            <h4>Analytics Dashboard</h4>
            <p>Charts and analytics will appear here.</p>
        </x-tabs.pane>
        <x-tabs.pane id="reports">
            <h4>Reports</h4>
            <p>Generated reports will appear here.</p>
        </x-tabs.pane>
        <x-tabs.pane id="settings">
            <h4>Dashboard Settings</h4>
            <p>Dashboard configuration options will appear here.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'tabs' => [
        'view' => 'laravel-components::{framework}.tabs.index',
    ],
    'tabs.item' => [
        'view' => 'laravel-components::{framework}.tabs.item',
    ],
    'tabs.content' => [
        'view' => 'laravel-components::{framework}.tabs.content',
    ],
    'tabs.pane' => [
        'view' => 'laravel-components::{framework}.tabs.pane',
    ],
],
```

## JavaScript Integration

### Custom Tab Behavior
```javascript
// Custom tab initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all tabs
    const tabContainers = document.querySelectorAll('.nav-tabs, .nav-pills');
    
    tabContainers.forEach(container => {
        const tabItems = container.querySelectorAll('.nav-link');
        
        tabItems.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all tabs
                tabItems.forEach(item => {
                    item.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Hide all tab panes
                const tabContent = this.closest('.nav').nextElementSibling;
                const panes = tabContent.querySelectorAll('.tab-pane');
                panes.forEach(pane => {
                    pane.classList.remove('active', 'show');
                });
                
                // Show target pane
                const targetId = this.getAttribute('href').substring(1);
                const targetPane = document.getElementById(targetId);
                if (targetPane) {
                    targetPane.classList.add('active', 'show');
                }
            });
        });
    });
});
```

### Tabs with Custom Events
```javascript
// Tabs with custom event handling
function initializeCustomTabs() {
    const tabs = document.querySelectorAll('.nav-link');
    
    tabs.forEach(tab => {
        tab.addEventListener('show.bs.tab', function(e) {
            console.log('Tab opening:', e.target.getAttribute('href'));
            // Custom logic before tab opens
        });
        
        tab.addEventListener('shown.bs.tab', function(e) {
            console.log('Tab opened:', e.target.getAttribute('href'));
            // Custom logic after tab opens
        });
        
        tab.addEventListener('hide.bs.tab', function(e) {
            console.log('Tab closing:', e.target.getAttribute('href'));
            // Custom logic before tab closes
        });
        
        tab.addEventListener('hidden.bs.tab', function(e) {
            console.log('Tab closed:', e.target.getAttribute('href'));
            // Custom logic after tab closes
        });
    });
}
```

### Tabs with Analytics
```javascript
// Tabs with analytics tracking
function initializeTabAnalytics() {
    const tabs = document.querySelectorAll('.nav-link');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const tabId = this.getAttribute('href').substring(1);
            const tabLabel = this.textContent.trim();
            
            // Track tab interactions
            if (typeof gtag !== 'undefined') {
                gtag('event', 'tab_click', {
                    'event_category': 'tabs',
                    'event_label': tabLabel,
                    'value': 1
                });
            }
            
            // Track with custom analytics
            if (typeof analytics !== 'undefined') {
                analytics.track('Tab Click', {
                    tabId: tabId,
                    tabLabel: tabLabel,
                    timestamp: new Date().toISOString()
                });
            }
        });
    });
}
```

## Accessibility

### ARIA Attributes
- Proper tab role and aria-selected attributes
- Keyboard navigation support
- Screen reader friendly structure
- Focus management

### Best Practices
- Use descriptive tab labels
- Provide keyboard navigation
- Ensure sufficient color contrast
- Test with screen readers
- Support keyboard-only navigation

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Bootstrap JavaScript
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Tabs Not Switching
**Problem:** Clicking tabs doesn't switch content
**Solution:** Ensure Bootstrap JavaScript is loaded and proper data attributes are present

#### Content Not Showing
**Problem:** Tab content doesn't appear
**Solution:** Check that tab pane IDs match tab item href attributes

#### Styling Issues
**Problem:** Tabs don't look like expected
**Solution:** Ensure Bootstrap CSS is loaded and check custom classes

#### Active State Issues
**Problem:** Active tab not highlighted correctly
**Solution:** Verify active attribute is set correctly on both tab item and pane

## Related Components

- **Accordion:** Collapsible content sections
- **Modal:** Modal dialogs
- **Dropdown:** Dropdown menus
- **Nav:** Navigation components

## Performance Considerations

- Lazy load tab content when possible
- Optimize tab switching animations
- Consider tab content size for mobile devices
- Cache tab state when appropriate

## Examples Gallery

### E-commerce Product Tabs
```blade
<x-tabs>
    <x-tabs.item id="product-details" label="Details" active />
    <x-tabs.item id="product-reviews" label="Reviews" />
    <x-tabs.item id="product-shipping" label="Shipping" />
    <x-tabs.item id="product-returns" label="Returns" />
    
    <x-tabs.content>
        <x-tabs.pane id="product-details" active>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
                </div>
                <div class="col-md-6">
                    <h3>{{ $product->name }}</h3>
                    <p class="text-muted">{{ $product->sku }}</p>
                    <h4 class="text-primary">${{ number_format($product->price, 2) }}</h4>
                    <p>{{ $product->description }}</p>
                    <x-form-button color="primary" size="lg">Add to Cart</x-form-button>
                </div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="product-reviews">
            <h4>Customer Reviews</h4>
            @foreach($product->reviews as $review)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $review->user->name }}</strong>
                            <div class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="icon-star{{ $i <= $review->rating ? '-filled' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mt-2">{{ $review->comment }}</p>
                </div>
            @endforeach
        </x-tabs.pane>
        <x-tabs.pane id="product-shipping">
            <h4>Shipping Information</h4>
            <div class="alert alert-info">
                <strong>Free shipping</strong> on orders over $50
            </div>
            <ul>
                <li>Standard shipping: 3-5 business days</li>
                <li>Express shipping: 1-2 business days</li>
                <li>Overnight shipping: Next business day</li>
            </ul>
        </x-tabs.pane>
        <x-tabs.pane id="product-returns">
            <h4>Return Policy</h4>
            <p>We offer a 30-day return policy for all unused items in original packaging.</p>
            <x-alert type="warning">
                <strong>Note:</strong> Some items may have different return policies.
            </x-alert>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

### Admin Dashboard Tabs
```blade
<x-tabs>
    <x-tabs.item id="dashboard-overview" label="Overview" active />
    <x-tabs.item id="dashboard-users" label="Users" />
    <x-tabs.item id="dashboard-orders" label="Orders" />
    <x-tabs.item id="dashboard-analytics" label="Analytics" />
    
    <x-tabs.content>
        <x-tabs.pane id="dashboard-overview" active>
            <div class="row">
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="icon-users text-primary" style="font-size: 2rem;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Users</h6>
                                    <h3 class="mb-0">{{ number_format($totalUsers) }}</h3>
                                </div>
                            </div>
                        </x-slot:body>
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="icon-shopping-cart text-success" style="font-size: 2rem;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Orders</h6>
                                    <h3 class="mb-0">{{ number_format($totalOrders) }}</h3>
                                </div>
                            </div>
                        </x-slot:body>
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="icon-dollar text-warning" style="font-size: 2rem;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Revenue</h6>
                                    <h3 class="mb-0">${{ number_format($revenue) }}</h3>
                                </div>
                            </div>
                        </x-slot:body>
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-slot:body>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="icon-trending-up text-info" style="font-size: 2rem;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Growth</h6>
                                    <h3 class="mb-0">{{ $growth }}%</h3>
                                </div>
                            </div>
                        </x-slot:body>
                    </x-card>
                </div>
            </div>
        </x-tabs.pane>
        <x-tabs.pane id="dashboard-users">
            <h4>User Management</h4>
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
                    @foreach($users as $user)
                        <x-table.row>
                            <x-table.cell>{{ $user->name }}</x-table.cell>
                            <x-table.cell>{{ $user->email }}</x-table.cell>
                            <x-table.cell>
                                <x-badge color="{{ $user->active ? 'success' : 'danger' }}">
                                    {{ $user->active ? 'Active' : 'Inactive' }}
                                </x-badge>
                            </x-table.cell>
                            <x-table.cell>
                                <x-dropdown>
                                    <x-dropdown.item href="/users/{{ $user->id }}/edit" label="Edit" />
                                    <x-dropdown.item href="/users/{{ $user->id }}/delete" label="Delete" />
                                </x-dropdown>
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot:body>
            </x-table>
        </x-tabs.pane>
        <x-tabs.pane id="dashboard-orders">
            <h4>Order Management</h4>
            <p>Order management interface will appear here.</p>
        </x-tabs.pane>
        <x-tabs.pane id="dashboard-analytics">
            <h4>Analytics Dashboard</h4>
            <p>Analytics charts and reports will appear here.</p>
        </x-tabs.pane>
    </x-tabs.content>
</x-tabs>
```

## Changelog

### Version 2.0.0
- Added sub-component architecture
- Enhanced accessibility features
- Improved Bootstrap integration
- Added Livewire compatibility support

## Contributing

To contribute to this component:
1. Update the view files in `resources/views/bootstrap-5/tabs/`
2. Add/update tests in `tests/Components/TabsTest.php`
3. Update this documentation
