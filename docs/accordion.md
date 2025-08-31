# Accordion Component

A collapsible content component that allows users to expand and collapse sections of content, providing an organized way to display large amounts of information in a compact space.

## Overview

**Component Type:** Content Organization/Interactive  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for accordion functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/accordion/index.blade.php`
- **Sub-components:** 
  - `accordion/item.blade.php` - Individual accordion item container
  - `accordion/header.blade.php` - Accordion item header with toggle button
  - `accordion/body.blade.php` - Collapsible accordion content area
- **Documentation:** `docs/accordion.md`
- **Tests:** `tests/Components/AccordionTest.php`

## Basic Usage

```blade
<x-accordion>
    <x-accordion.item id="item-1">
        <x-accordion.header>Section 1</x-accordion.header>
        <x-accordion.body>
            <p>This is the content for section 1.</p>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="item-2">
        <x-accordion.header>Section 2</x-accordion.header>
        <x-accordion.body>
            <p>This is the content for section 2.</p>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

## Attributes & Properties

### Accordion Container (`<x-accordion>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | 'accordion' | Unique identifier for the accordion | `'faq-accordion'` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-accordion'` |

### Accordion Item (`<x-accordion.item>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | 'accordion' | Unique identifier for the item | `'item-1'` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-item'` |

### Accordion Header (`<x-accordion.header>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | Unique identifier (inherited from parent) | `'header-1'` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-header'` |

### Accordion Body (`<x-accordion.body>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| show | boolean | false | Show the body by default | `true` |
| id | string | null | Unique identifier (inherited from parent) | `'body-1'` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-body'` |

## Slots

### Default Slot (Accordion Container)
- **Purpose:** Accordion item components
- **Content Type:** Accordion item components
- **Required:** Yes

### Default Slot (Accordion Item)
- **Purpose:** Header and body components
- **Content Type:** Accordion header and body components
- **Required:** Yes

### Default Slot (Accordion Header)
- **Purpose:** Header content
- **Content Type:** Text, HTML, or components
- **Required:** Yes

### Default Slot (Accordion Body)
- **Purpose:** Collapsible content
- **Content Type:** Any content
- **Required:** Yes

## Usage Examples

### Basic Accordion
```blade
<x-accordion>
    <x-accordion.item id="section-1">
        <x-accordion.header>Getting Started</x-accordion.header>
        <x-accordion.body>
            <p>Learn how to get started with our platform.</p>
            <ul>
                <li>Create an account</li>
                <li>Set up your profile</li>
                <li>Explore features</li>
            </ul>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="section-2">
        <x-accordion.header>Advanced Features</x-accordion.header>
        <x-accordion.body>
            <p>Discover advanced features and customization options.</p>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Accordion with Custom ID
```blade
<x-accordion id="faq-accordion">
    <x-accordion.item id="faq-1">
        <x-accordion.header>What is this service?</x-accordion.header>
        <x-accordion.body>
            <p>This is a comprehensive platform that helps you manage your projects.</p>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="faq-2">
        <x-accordion.header>How do I get support?</x-accordion.header>
        <x-accordion.body>
            <p>Contact our support team through the help center.</p>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Accordion with Pre-expanded Section
```blade
<x-accordion>
    <x-accordion.item id="section-1">
        <x-accordion.header>Important Information</x-accordion.header>
        <x-accordion.body show>
            <p>This section is expanded by default.</p>
            <x-alert type="info">
                This information is important and visible immediately.
            </x-alert>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="section-2">
        <x-accordion.header>Additional Details</x-accordion.header>
        <x-accordion.body>
            <p>This section is collapsed by default.</p>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Accordion with Rich Content
```blade
<x-accordion>
    <x-accordion.item id="rich-content">
        <x-accordion.header>
            <div class="d-flex align-items-center">
                <x-icon name="info" class="me-2" />
                <span>Product Information</span>
                <x-badge color="primary" class="ms-auto">New</x-badge>
            </div>
        </x-accordion.header>
        <x-accordion.body>
            <div class="row">
                <div class="col-md-6">
                    <h5>Features</h5>
                    <ul>
                        <li>Feature 1</li>
                        <li>Feature 2</li>
                        <li>Feature 3</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Specifications</h5>
                    <x-table>
                        <x-slot:body>
                            <x-table.row>
                                <x-table.cell>Weight</x-table.cell>
                                <x-table.cell>2.5 kg</x-table.cell>
                            </x-table.row>
                            <x-table.row>
                                <x-table.cell>Dimensions</x-table.cell>
                                <x-table.cell>10 x 15 x 5 cm</x-table.cell>
                            </x-table.row>
                        </x-slot:body>
                    </x-table>
                </div>
            </div>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Accordion with Custom Styling
```blade
<x-accordion class="custom-accordion shadow">
    <x-accordion.item id="styled-1" class="border-primary">
        <x-accordion.header class="bg-primary text-white">
            <strong>Primary Section</strong>
        </x-accordion.header>
        <x-accordion.body class="bg-light">
            <p>This section has custom styling.</p>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="styled-2" class="border-success">
        <x-accordion.header class="bg-success text-white">
            <strong>Success Section</strong>
        </x-accordion.header>
        <x-accordion.body class="bg-light">
            <p>This section also has custom styling.</p>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Accordion with Livewire Integration
```blade
<x-accordion>
    <x-accordion.item id="livewire-1">
        <x-accordion.header>
            <span wire:click="toggleSection('section1')" style="cursor: pointer;">
                Section 1 ({{ $section1Open ? 'Open' : 'Closed' }})
            </span>
        </x-accordion.header>
        <x-accordion.body show="{{ $section1Open }}">
            <div wire:poll.10s>
                <p>This content updates every 10 seconds.</p>
                <p>Last updated: {{ now()->format('H:i:s') }}</p>
            </div>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="livewire-2">
        <x-accordion.header>
            <span wire:click="toggleSection('section2')" style="cursor: pointer;">
                Section 2 ({{ $section2Open ? 'Open' : 'Closed' }})
            </span>
        </x-accordion.header>
        <x-accordion.body show="{{ $section2Open }}">
            <x-form-input wire:model="searchTerm" placeholder="Search..." />
            <div class="mt-3">
                @foreach($filteredItems as $item)
                    <div class="p-2 border-bottom">{{ $item->name }}</div>
                @endforeach
            </div>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### FAQ Accordion
```blade
<x-accordion id="faq">
    <x-accordion.item id="faq-1">
        <x-accordion.header>
            <strong>How do I create an account?</strong>
        </x-accordion.header>
        <x-accordion.body>
            <p>To create an account, click the "Sign Up" button in the top right corner and follow the registration process.</p>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="faq-2">
        <x-accordion.header>
            <strong>What payment methods do you accept?</strong>
        </x-accordion.header>
        <x-accordion.body>
            <p>We accept all major credit cards, PayPal, and bank transfers.</p>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="faq-3">
        <x-accordion.header>
            <strong>How can I contact support?</strong>
        </x-accordion.header>
        <x-accordion.body>
            <p>You can contact our support team through:</p>
            <ul>
                <li>Email: support@example.com</li>
                <li>Phone: 1-800-123-4567</li>
                <li>Live chat: Available 24/7</li>
            </ul>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Multi-level Accordion
```blade
<x-accordion id="multi-level">
    <x-accordion.item id="level-1">
        <x-accordion.header>Level 1 - Main Category</x-accordion.header>
        <x-accordion.body>
            <p>This is the main category content.</p>
            
            <x-accordion id="sub-accordion">
                <x-accordion.item id="sub-1">
                    <x-accordion.header>Sub-category 1</x-accordion.header>
                    <x-accordion.body>
                        <p>This is sub-category 1 content.</p>
                    </x-accordion.body>
                </x-accordion.item>
                
                <x-accordion.item id="sub-2">
                    <x-accordion.header>Sub-category 2</x-accordion.header>
                    <x-accordion.body>
                        <p>This is sub-category 2 content.</p>
                    </x-accordion.body>
                </x-accordion.item>
            </x-accordion>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

## Features

### Bootstrap Integration
- **Accordion Structure:** Proper Bootstrap accordion HTML structure
- **JavaScript Functionality:** Bootstrap accordion JavaScript for smooth animations
- **CSS Classes:** Bootstrap accordion styling with proper classes
- **Accessibility:** ARIA attributes and keyboard navigation support

### Content Organization
- **Collapsible Sections:** Expandable and collapsible content areas
- **Multiple Items:** Support for multiple accordion items
- **Rich Content:** Support for any type of content in accordion bodies
- **Nested Content:** Support for nested accordions and complex layouts

### Customization Options
- **Custom IDs:** Unique identifiers for each accordion and item
- **Custom Styling:** Additional CSS classes for custom appearance
- **Pre-expanded Sections:** Option to show sections by default
- **Flexible Layout:** Support for complex content layouts

### Interactive Features
- **Smooth Animations:** Bootstrap-powered smooth expand/collapse animations
- **Keyboard Navigation:** Full keyboard accessibility support
- **Focus Management:** Proper focus handling for accessibility
- **Event Handling:** Bootstrap accordion events for custom interactions

## Common Patterns

### FAQ Section
```blade
<x-accordion id="faq-section">
    @foreach($faqs as $faq)
        <x-accordion.item id="faq-{{ $faq->id }}">
            <x-accordion.header>
                <strong>{{ $faq->question }}</strong>
            </x-accordion.header>
            <x-accordion.body>
                {!! $faq->answer !!}
            </x-accordion.body>
        </x-accordion.item>
    @endforeach
</x-accordion>
```

### Product Information
```blade
<x-accordion>
    <x-accordion.item id="product-details">
        <x-accordion.header>
            <x-icon name="info" class="me-2" />
            Product Details
        </x-accordion.header>
        <x-accordion.body>
            <div class="row">
                <div class="col-md-6">
                    <h6>Specifications</h6>
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
                </div>
                <div class="col-md-6">
                    <h6>Features</h6>
                    <ul>
                        @foreach($product->features as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### Settings Panel
```blade
<x-accordion>
    <x-accordion.item id="account-settings">
        <x-accordion.header>
            <x-icon name="user" class="me-2" />
            Account Settings
        </x-accordion.header>
        <x-accordion.body>
            <x-form-input name="name" label="Full Name" />
            <x-form-input name="email" label="Email Address" type="email" />
            <x-form-button>Save Changes</x-form-button>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="privacy-settings">
        <x-accordion.header>
            <x-icon name="shield" class="me-2" />
            Privacy Settings
        </x-accordion.header>
        <x-accordion.body>
            <x-form-switch name="public_profile" label="Public Profile" />
            <x-form-switch name="email_notifications" label="Email Notifications" />
            <x-form-switch name="two_factor" label="Two-Factor Authentication" />
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'accordion' => [
        'view' => 'laravel-components::{framework}.accordion.index',
    ],
    'accordion.item' => [
        'view' => 'laravel-components::{framework}.accordion.item',
    ],
    'accordion.header' => [
        'view' => 'laravel-components::{framework}.accordion.header',
    ],
    'accordion.body' => [
        'view' => 'laravel-components::{framework}.accordion.body',
    ],
],
```

## JavaScript Integration

### Custom Accordion Behavior
```javascript
// Custom accordion initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all accordions
    const accordions = document.querySelectorAll('.accordion');
    
    accordions.forEach(accordion => {
        const items = accordion.querySelectorAll('.accordion-item');
        
        items.forEach(item => {
            const header = item.querySelector('.accordion-header button');
            const body = item.querySelector('.accordion-collapse');
            
            if (header && body) {
                header.addEventListener('click', function(e) {
                    // Custom accordion logic
                    const isExpanded = body.classList.contains('show');
                    
                    if (isExpanded) {
                        body.classList.remove('show');
                        header.setAttribute('aria-expanded', 'false');
                    } else {
                        // Close other items in the same accordion
                        const parentAccordion = accordion;
                        parentAccordion.querySelectorAll('.accordion-collapse.show').forEach(openBody => {
                            if (openBody !== body) {
                                openBody.classList.remove('show');
                                openBody.previousElementSibling.querySelector('button').setAttribute('aria-expanded', 'false');
                            }
                        });
                        
                        body.classList.add('show');
                        header.setAttribute('aria-expanded', 'true');
                    }
                    
                    e.preventDefault();
                });
            }
        });
    });
});
```

### Accordion with Custom Events
```javascript
// Accordion with custom event handling
function initializeCustomAccordion() {
    const accordion = document.querySelector('#custom-accordion');
    const items = accordion.querySelectorAll('.accordion-item');
    
    items.forEach(item => {
        const header = item.querySelector('.accordion-header button');
        const body = item.querySelector('.accordion-collapse');
        
        header.addEventListener('show.bs.collapse', function() {
            console.log('Accordion item opening');
            // Custom logic before item opens
        });
        
        header.addEventListener('shown.bs.collapse', function() {
            console.log('Accordion item opened');
            // Custom logic after item opens
        });
        
        header.addEventListener('hide.bs.collapse', function() {
            console.log('Accordion item closing');
            // Custom logic before item closes
        });
        
        header.addEventListener('hidden.bs.collapse', function() {
            console.log('Accordion item closed');
            // Custom logic after item closes
        });
    });
}
```

### Accordion with Analytics
```javascript
// Accordion with analytics tracking
function initializeAccordionAnalytics() {
    const accordions = document.querySelectorAll('.accordion');
    
    accordions.forEach(accordion => {
        const items = accordion.querySelectorAll('.accordion-item');
        
        items.forEach(item => {
            const header = item.querySelector('.accordion-header button');
            const body = item.querySelector('.accordion-collapse');
            
            if (header && body) {
                header.addEventListener('click', function() {
                    const itemId = item.id;
                    const isExpanded = body.classList.contains('show');
                    
                    // Track accordion interactions
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'accordion_toggle', {
                            'event_category': 'accordion',
                            'event_label': itemId,
                            'value': isExpanded ? 0 : 1
                        });
                    }
                    
                    // Track with custom analytics
                    if (typeof analytics !== 'undefined') {
                        analytics.track('Accordion Toggle', {
                            itemId: itemId,
                            action: isExpanded ? 'close' : 'open',
                            accordionId: accordion.id
                        });
                    }
                });
            }
        });
    });
}
```

## Accessibility

### ARIA Attributes
- Proper accordion role and aria-expanded attributes
- Keyboard navigation support
- Screen reader friendly structure
- Focus management

### Best Practices
- Use descriptive headers for accordion items
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

#### Accordion Not Working
**Problem:** Accordion items don't expand/collapse
**Solution:** Ensure Bootstrap JavaScript is loaded and proper data attributes are present

#### Multiple Items Open
**Problem:** Multiple accordion items are open at the same time
**Solution:** Check that accordion items are properly nested within the accordion container

#### Styling Issues
**Problem:** Accordion doesn't look like expected
**Solution:** Ensure Bootstrap CSS is loaded and check custom classes

#### Animation Issues
**Problem:** Smooth animations not working
**Solution:** Verify Bootstrap JavaScript is loaded and CSS transitions are enabled

## Related Components

- **Collapse:** Simple collapsible content
- **Modal:** Modal dialogs
- **Tabs:** Tabbed interface
- **Card:** Card components

## Performance Considerations

- Lazy load accordion content when possible
- Optimize accordion animations for performance
- Consider accordion size for mobile devices
- Cache accordion state when appropriate

## Examples Gallery

### Documentation Section
```blade
<x-accordion id="documentation">
    <x-accordion.item id="installation">
        <x-accordion.header>
            <div class="d-flex align-items-center">
                <x-icon name="download" class="me-2" />
                <span>Installation</span>
                <x-badge color="success" class="ms-auto">Complete</x-badge>
            </div>
        </x-accordion.header>
        <x-accordion.body>
            <div class="alert alert-info">
                <strong>Prerequisites:</strong> PHP 8.1+, Laravel 10+
            </div>
            <pre><code>composer require diviky/laravel-components</code></pre>
            <p>Follow the installation guide to get started.</p>
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="configuration">
        <x-accordion.header>
            <div class="d-flex align-items-center">
                <x-icon name="settings" class="me-2" />
                <span>Configuration</span>
                <x-badge color="warning" class="ms-auto">Required</x-badge>
            </div>
        </x-accordion.header>
        <x-accordion.body>
            <p>Configure the package in your Laravel application.</p>
            <x-alert type="warning">
                Make sure to publish the configuration file.
            </x-alert>
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

### User Profile Sections
```blade
<x-accordion>
    <x-accordion.item id="personal-info">
        <x-accordion.header>
            <x-icon name="user" class="me-2" />
            Personal Information
        </x-accordion.header>
        <x-accordion.body>
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
        </x-accordion.body>
    </x-accordion.item>
    
    <x-accordion.item id="address-info">
        <x-accordion.header>
            <x-icon name="map-pin" class="me-2" />
            Address Information
        </x-accordion.header>
        <x-accordion.body>
            <x-form-input name="street" label="Street Address" />
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
        </x-accordion.body>
    </x-accordion.item>
</x-accordion>
```

## Changelog

### Version 2.0.0
- Added sub-component architecture
- Enhanced accessibility features
- Improved Bootstrap integration
- Added Livewire compatibility support

## Contributing

To contribute to this component:
1. Update the view files in `resources/views/bootstrap-5/accordion/`
2. Add/update tests in `tests/Components/AccordionTest.php`
3. Update this documentation
