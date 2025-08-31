# Nav Component

A navigation component that provides flexible navigation structures with support for pills, cards, segmented navigation, and dropdown integration.

## Overview

**Component Type:** Navigation/Interactive  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for dropdown functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/nav/index.blade.php`
- **Sub-components:** 
  - `nav/item.blade.php` - Navigation item with dropdown support
  - `nav/link.blade.php` - Simple navigation link
- **Documentation:** `docs/nav.md`
- **Tests:** `tests/Components/NavTest.php`

## Basic Usage

```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/users" title="Users" icon="users" />
    <x-nav.item href="/settings" title="Settings" icon="settings" />
</x-nav>
```

## Attributes & Properties

### Nav Container (`<x-nav>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| pills | boolean | false | Use pill-style navigation | `true` |
| card | boolean | false | Use card header pills style | `true` |
| segmented | boolean | false | Use segmented navigation style | `true` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-nav'` |
| turbo | boolean | false | Enable Turbo/PJAX navigation | `true` |

### Nav Item (`<x-nav.item>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| href | string | null | Navigation URL | `'/dashboard'` |
| title | string | null | Navigation title | `'Dashboard'` |
| icon | string | null | Icon name | `'home'` |
| badge | string | null | Badge text | `'New'` |
| dropdown | boolean | false | Enable dropdown functionality | `true` |
| disabled | boolean | false | Disable the navigation item | `true` |
| active | boolean | false | Mark as active | `true` |
| away | boolean | false | Open in new tab | `true` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-item'` |

### Nav Link (`<x-nav.link>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name | `'home'` |

#### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-link'` |

## Slots

### Default Slot (Nav Container)
- **Purpose:** Navigation items
- **Content Type:** Nav item components
- **Required:** Yes

### Default Slot (Nav Item)
- **Purpose:** Navigation content
- **Content Type:** Text, HTML, or components
- **Required:** No (uses title attribute if not provided)

### Default Slot (Nav Link)
- **Purpose:** Link content
- **Content Type:** Text, HTML, or components
- **Required:** Yes

## Usage Examples

### Basic Navigation
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/users" title="Users" icon="users" />
    <x-nav.item href="/settings" title="Settings" icon="settings" />
    <x-nav.item href="/reports" title="Reports" icon="chart" />
</x-nav>
```

### Pill Navigation
```blade
<x-nav pills>
    <x-nav.item href="/overview" title="Overview" icon="eye" />
    <x-nav.item href="/analytics" title="Analytics" icon="chart" />
    <x-nav.item href="/reports" title="Reports" icon="file-text" />
</x-nav>
```

### Card Header Navigation
```blade
<x-nav card>
    <x-nav.item href="/profile" title="Profile" icon="user" />
    <x-nav.item href="/security" title="Security" icon="shield" />
    <x-nav.item href="/notifications" title="Notifications" icon="bell" />
</x-nav>
```

### Segmented Navigation
```blade
<x-nav segmented>
    <x-nav.item href="/monthly" title="Monthly" />
    <x-nav.item href="/quarterly" title="Quarterly" />
    <x-nav.item href="/yearly" title="Yearly" />
</x-nav>
```

### Navigation with Badges
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/messages" title="Messages" icon="message" badge="3" />
    <x-nav.item href="/notifications" title="Notifications" icon="bell" badge="12" />
    <x-nav.item href="/tasks" title="Tasks" icon="check" badge="5" />
</x-nav>
```

### Navigation with Dropdown
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/users" title="Users" icon="users" />
    <x-nav.item dropdown title="More" icon="more-horizontal">
        <x-dropdown.menu>
            <x-dropdown.item href="/settings" label="Settings" />
            <x-dropdown.item href="/profile" label="Profile" />
            <x-dropdown.item href="/logout" label="Logout" />
        </x-dropdown.menu>
    </x-nav.item>
</x-nav>
```

### Navigation with Active States
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" active />
    <x-nav.item href="/users" title="Users" icon="users" />
    <x-nav.item href="/settings" title="Settings" icon="settings" />
</x-nav>
```

### Navigation with External Links
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="https://docs.example.com" title="Documentation" icon="book" away />
    <x-nav.item href="https://support.example.com" title="Support" icon="help-circle" away />
</x-nav>
```

### Navigation with Turbo/PJAX
```blade
<x-nav turbo>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/users" title="Users" icon="users" />
    <x-nav.item href="/settings" title="Settings" icon="settings" />
</x-nav>
```

### Navigation with Custom Styling
```blade
<x-nav class="custom-nav shadow">
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" class="custom-item" />
    <x-nav.item href="/users" title="Users" icon="users" class="custom-item" />
    <x-nav.item href="/settings" title="Settings" icon="settings" class="custom-item" />
</x-nav>
```

### Navigation with Disabled Items
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/users" title="Users" icon="users" disabled />
    <x-nav.item href="/settings" title="Settings" icon="settings" />
</x-nav>
```

### Navigation with Slot Content
```blade
<x-nav>
    <x-nav.item href="/dashboard" icon="home">
        <strong>Dashboard</strong>
    </x-nav.item>
    <x-nav.item href="/users" icon="users">
        <span class="text-primary">Users</span>
    </x-nav.item>
    <x-nav.item href="/settings" icon="settings">
        <div class="d-flex align-items-center">
            <span>Settings</span>
            <x-badge color="warning" class="ms-2">New</x-badge>
        </div>
    </x-nav.item>
</x-nav>
```

### Navigation with Livewire Integration
```blade
<x-nav>
    <x-nav.item wire:click="showDashboard" title="Dashboard" icon="home" />
    <x-nav.item wire:click="showUsers" title="Users" icon="users" />
    <x-nav.item wire:click="showSettings" title="Settings" icon="settings" />
</x-nav>
```

### Navigation with Complex Dropdown
```blade
<x-nav>
    <x-nav.item href="/dashboard" title="Dashboard" icon="home" />
    <x-nav.item href="/users" title="Users" icon="users" />
    <x-nav.item dropdown title="Account" icon="user">
        <x-dropdown.menu>
            <x-dropdown.item href="/profile" label="Profile" icon="user" />
            <x-dropdown.item href="/settings" label="Settings" icon="settings" />
            <x-dropdown.item divider />
            <x-dropdown.item href="/logout" label="Logout" icon="log-out" />
        </x-dropdown.menu>
    </x-nav.item>
</x-nav>
```

## Features

### Navigation Styles
- **Default Navigation:** Standard navigation with underline indicators
- **Pill Navigation:** Rounded pill-style navigation
- **Card Navigation:** Card header pill-style navigation
- **Segmented Navigation:** Segmented control-style navigation

### Interactive Features
- **Active States:** Visual indication of current page
- **Dropdown Integration:** Support for dropdown menus in navigation items
- **Badge Support:** Badge indicators for notifications or counts
- **Icon Integration:** Icon support for visual enhancement
- **External Links:** Support for opening links in new tabs

### Bootstrap Integration
- **Navigation Structure:** Proper Bootstrap navigation HTML structure
- **JavaScript Functionality:** Bootstrap dropdown JavaScript for interactive features
- **CSS Classes:** Bootstrap navigation styling with proper classes
- **Accessibility:** ARIA attributes and keyboard navigation support

### Advanced Features
- **Turbo/PJAX Integration:** Seamless navigation with Turbo Drive
- **Route Matching:** Automatic active state based on current route
- **Custom Styling:** Additional CSS classes for custom appearance
- **Livewire Integration:** Support for Livewire actions and state management

## Common Patterns

### Main Navigation
```blade
<x-nav>
    <x-nav.item href="{{ route('dashboard') }}" title="Dashboard" icon="home" />
    <x-nav.item href="{{ route('users.index') }}" title="Users" icon="users" />
    <x-nav.item href="{{ route('products.index') }}" title="Products" icon="package" />
    <x-nav.item href="{{ route('orders.index') }}" title="Orders" icon="shopping-cart" />
    <x-nav.item href="{{ route('reports.index') }}" title="Reports" icon="chart" />
</x-nav>
```

### User Account Navigation
```blade
<x-nav pills>
    <x-nav.item href="{{ route('profile.show') }}" title="Profile" icon="user" />
    <x-nav.item href="{{ route('profile.security') }}" title="Security" icon="shield" />
    <x-nav.item href="{{ route('profile.notifications') }}" title="Notifications" icon="bell" badge="{{ $unreadCount }}" />
    <x-nav.item href="{{ route('profile.billing') }}" title="Billing" icon="credit-card" />
</x-nav>
```

### Admin Navigation
```blade
<x-nav>
    <x-nav.item href="{{ route('admin.dashboard') }}" title="Dashboard" icon="home" />
    <x-nav.item href="{{ route('admin.users') }}" title="Users" icon="users" />
    <x-nav.item href="{{ route('admin.roles') }}" title="Roles" icon="shield" />
    <x-nav.item dropdown title="Settings" icon="settings">
        <x-dropdown.menu>
            <x-dropdown.item href="{{ route('admin.settings.general') }}" label="General" />
            <x-dropdown.item href="{{ route('admin.settings.email') }}" label="Email" />
            <x-dropdown.item href="{{ route('admin.settings.security') }}" label="Security" />
            <x-dropdown.item divider />
            <x-dropdown.item href="{{ route('admin.logs') }}" label="System Logs" />
        </x-dropdown.menu>
    </x-nav.item>
</x-nav>
```

### Dashboard Navigation
```blade
<x-nav segmented>
    <x-nav.item href="{{ route('dashboard.overview') }}" title="Overview" />
    <x-nav.item href="{{ route('dashboard.analytics') }}" title="Analytics" />
    <x-nav.item href="{{ route('dashboard.reports') }}" title="Reports" />
    <x-nav.item href="{{ route('dashboard.settings') }}" title="Settings" />
</x-nav>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'nav' => [
        'view' => 'laravel-components::{framework}.nav.index',
    ],
    'nav.item' => [
        'view' => 'laravel-components::{framework}.nav.item',
    ],
    'nav.link' => [
        'view' => 'laravel-components::{framework}.nav.link',
    ],
],
```

## JavaScript Integration

### Custom Navigation Behavior
```javascript
// Custom navigation initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all navigation containers
    const navContainers = document.querySelectorAll('.nav');
    
    navContainers.forEach(nav => {
        const navItems = nav.querySelectorAll('.nav-item');
        
        navItems.forEach(item => {
            const link = item.querySelector('a');
            
            if (link) {
                link.addEventListener('click', function(e) {
                    // Custom navigation logic
                    const href = this.getAttribute('href');
                    
                    if (href && !href.startsWith('#')) {
                        // Handle navigation
                        console.log('Navigating to:', href);
                    }
                });
            }
        });
    });
});
```

### Navigation with Analytics
```javascript
// Navigation with analytics tracking
function initializeNavAnalytics() {
    const navItems = document.querySelectorAll('.nav-item a');
    
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            const href = this.getAttribute('href');
            const title = this.textContent.trim();
            
            // Track navigation interactions
            if (typeof gtag !== 'undefined') {
                gtag('event', 'nav_click', {
                    'event_category': 'navigation',
                    'event_label': title,
                    'value': 1
                });
            }
            
            // Track with custom analytics
            if (typeof analytics !== 'undefined') {
                analytics.track('Navigation Click', {
                    href: href,
                    title: title,
                    timestamp: new Date().toISOString()
                });
            }
        });
    });
}
```

### Navigation with Active State Management
```javascript
// Navigation with active state management
function initializeNavActiveStates() {
    const navItems = document.querySelectorAll('.nav-item');
    const currentPath = window.location.pathname;
    
    navItems.forEach(item => {
        const link = item.querySelector('a');
        
        if (link) {
            const href = link.getAttribute('href');
            
            if (href && currentPath.startsWith(href)) {
                // Remove active class from all items
                navItems.forEach(navItem => {
                    navItem.classList.remove('active');
                    const navLink = navItem.querySelector('a');
                    if (navLink) {
                        navLink.classList.remove('active');
                    }
                });
                
                // Add active class to current item
                item.classList.add('active');
                link.classList.add('active');
            }
        }
    });
}
```

## Accessibility

### ARIA Attributes
- Proper navigation role and aria-selected attributes
- Keyboard navigation support
- Screen reader friendly structure
- Focus management

### Best Practices
- Use descriptive navigation labels
- Provide keyboard navigation
- Ensure sufficient color contrast
- Test with screen readers
- Support keyboard-only navigation

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Bootstrap JavaScript for dropdown functionality
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Navigation Not Working
**Problem:** Navigation links don't work properly
**Solution:** Ensure proper href attributes and check for JavaScript conflicts

#### Active States Not Working
**Problem:** Active states not highlighting correctly
**Solution:** Verify active attribute is set correctly and check route matching

#### Dropdown Not Working
**Problem:** Dropdown functionality not working
**Solution:** Ensure Bootstrap JavaScript is loaded and proper data attributes are present

#### Styling Issues
**Problem:** Navigation doesn't look like expected
**Solution:** Ensure Bootstrap CSS is loaded and check custom classes

## Related Components

- **Breadcrumb:** Breadcrumb navigation
- **Dropdown:** Dropdown menus
- **Tabs:** Tabbed interface
- **Accordion:** Collapsible content sections

## Performance Considerations

- Optimize navigation rendering for large navigation structures
- Consider navigation caching for frequently accessed items
- Implement lazy loading for navigation with many items
- Optimize dropdown animations for performance

## Examples Gallery

### E-commerce Navigation
```blade
<x-nav>
    <x-nav.item href="{{ route('shop.home') }}" title="Home" icon="home" />
    <x-nav.item href="{{ route('shop.products') }}" title="Products" icon="package" />
    <x-nav.item href="{{ route('shop.categories') }}" title="Categories" icon="grid" />
    <x-nav.item href="{{ route('shop.deals') }}" title="Deals" icon="tag" badge="Hot" />
    <x-nav.item href="{{ route('shop.about') }}" title="About" icon="info" />
    <x-nav.item href="{{ route('shop.contact') }}" title="Contact" icon="mail" />
</x-nav>
```

### Application Navigation
```blade
<x-nav pills>
    <x-nav.item href="{{ route('app.dashboard') }}" title="Dashboard" icon="home" />
    <x-nav.item href="{{ route('app.projects') }}" title="Projects" icon="folder" />
    <x-nav.item href="{{ route('app.tasks') }}" title="Tasks" icon="check-square" badge="{{ $pendingTasks }}" />
    <x-nav.item href="{{ route('app.calendar') }}" title="Calendar" icon="calendar" />
    <x-nav.item href="{{ route('app.messages') }}" title="Messages" icon="message-circle" badge="{{ $unreadMessages }}" />
    <x-nav.item dropdown title="More" icon="more-horizontal">
        <x-dropdown.menu>
            <x-dropdown.item href="{{ route('app.settings') }}" label="Settings" icon="settings" />
            <x-dropdown.item href="{{ route('app.profile') }}" label="Profile" icon="user" />
            <x-dropdown.item href="{{ route('app.help') }}" label="Help" icon="help-circle" />
            <x-dropdown.item divider />
            <x-dropdown.item href="{{ route('auth.logout') }}" label="Logout" icon="log-out" />
        </x-dropdown.menu>
    </x-nav.item>
</x-nav>
```

### Documentation Navigation
```blade
<x-nav segmented>
    <x-nav.item href="{{ route('docs.getting-started') }}" title="Getting Started" />
    <x-nav.item href="{{ route('docs.installation') }}" title="Installation" />
    <x-nav.item href="{{ route('docs.configuration') }}" title="Configuration" />
    <x-nav.item href="{{ route('docs.components') }}" title="Components" />
    <x-nav.item href="{{ route('docs.examples') }}" title="Examples" />
    <x-nav.item href="{{ route('docs.api') }}" title="API Reference" />
</x-nav>
```

## Changelog

### Version 2.0.0
- Added sub-component architecture
- Enhanced accessibility features
- Improved Bootstrap integration
- Added Livewire compatibility support
- Added Turbo/PJAX integration support

## Contributing

To contribute to this component:
1. Update the view files in `resources/views/bootstrap-5/nav/`
2. Add/update tests in `tests/Components/NavTest.php`
3. Update this documentation
