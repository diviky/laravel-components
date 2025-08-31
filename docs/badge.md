# Badge Component

A versatile badge component for displaying status indicators, labels, and notifications with multiple styling options and interactive features.

## Overview

**Component Type:** UI  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for dismissible functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/badge.blade.php`
- **Documentation:** `docs/badge.md`
- **Tests:** `tests/Components/BadgeTest.php`

## Basic Usage

```blade
<x-badge>Default Badge</x-badge>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| color | string | 'primary' | Badge color variant | `'success'` |
| pill | boolean | false | Use pill-shaped badge | `true` |
| size | string | null | Badge size variant | `'sm'` |
| href | string | null | Make badge a link | `'/users'` |
| dismissible | boolean | false | Add dismissible functionality | `true` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'status-badge'` |
| class | string | null | Additional CSS classes | `'custom-badge'` |

## Slots

### Default Slot
- **Purpose:** Badge content and text
- **Content Type:** Text/HTML
- **Required:** Yes

## Usage Examples

### Basic Badge Variants
```blade
<!-- Default primary badge -->
<x-badge>Primary</x-badge>

<!-- Success badge -->
<x-badge color="success">Success</x-badge>

<!-- Danger badge -->
<x-badge color="danger">Danger</x-badge>

<!-- Warning badge -->
<x-badge color="warning">Warning</x-badge>

<!-- Info badge -->
<x-badge color="info">Info</x-badge>

<!-- Secondary badge -->
<x-badge color="secondary">Secondary</x-badge>

<!-- Light badge -->
<x-badge color="light">Light</x-badge>

<!-- Dark badge -->
<x-badge color="dark">Dark</x-badge>
```

### Pill-shaped Badges
```blade
<!-- Pill badge -->
<x-badge pill>Pill Badge</x-badge>

<!-- Colored pill badge -->
<x-badge color="success" pill>Success Pill</x-badge>
```

### Badge Sizes
```blade
<!-- Small badge -->
<x-badge size="sm">Small</x-badge>

<!-- Default size badge -->
<x-badge>Default</x-badge>

<!-- Large badge -->
<x-badge size="lg">Large</x-badge>
```

### Link Badges
```blade
<!-- Badge as link -->
<x-badge href="/users" color="primary">
    View Users
</x-badge>

<!-- Pill link badge -->
<x-badge href="/notifications" color="warning" pill>
    Notifications
</x-badge>
```

### Dismissible Badges
```blade
<!-- Dismissible badge -->
<x-badge dismissible color="info">
    Dismissible Badge
</x-badge>

<!-- Dismissible pill badge -->
<x-badge dismissible pill color="warning">
    Warning Badge
</x-badge>
```

### Combined Features
```blade
<!-- Large, pill, dismissible, success badge -->
<x-badge 
    size="lg" 
    pill 
    dismissible 
    color="success">
    Complete Badge
</x-badge>

<!-- Link badge with custom styling -->
<x-badge 
    href="/profile" 
    color="primary" 
    pill 
    class="custom-badge">
    Profile
</x-badge>
```

### Livewire Integration
```blade
<!-- Livewire dismissible badge -->
<x-badge 
    dismissible 
    color="info"
    wire:click="dismissBadge">
    {{ $badgeText }}
</x-badge>

<!-- Dynamic color badge -->
<x-badge color="{{ $statusColor }}">
    {{ $statusText }}
</x-badge>
```

## Features

### Color Variants
- **Primary:** Default blue color
- **Success:** Green for positive states
- **Danger:** Red for errors/warnings
- **Warning:** Yellow for caution
- **Info:** Light blue for information
- **Secondary:** Gray for secondary information
- **Light:** Light background with dark text
- **Dark:** Dark background with light text

### Size Variants
- **Small (`sm`):** Compact badge size
- **Default:** Standard badge size
- **Large (`lg`):** Larger badge size

### Shape Options
- **Default:** Rounded rectangle
- **Pill (`pill`):** Fully rounded pill shape

### Interactive Features
- **Link (`href`):** Convert badge to clickable link
- **Dismissible (`dismissible`):** Add close button functionality

## Common Patterns

### Status Indicators
```blade
<!-- User status badges -->
<x-badge color="success">Active</x-badge>
<x-badge color="warning">Pending</x-badge>
<x-badge color="danger">Suspended</x-badge>
<x-badge color="secondary">Inactive</x-badge>
```

### Notification Counters
```blade
<!-- Notification badge -->
<x-badge color="danger" pill>
    {{ $notificationCount }}
</x-badge>

<!-- Unread messages -->
<x-badge color="primary" size="sm">
    {{ $unreadMessages }}
</x-badge>
```

### Category Tags
```blade
<!-- Product categories -->
<x-badge color="info" pill>Electronics</x-badge>
<x-badge color="success" pill>In Stock</x-badge>
<x-badge color="warning" pill>Limited</x-badge>
```

### Action Badges
```blade
<!-- Clickable action badges -->
<x-badge href="/edit" color="primary">
    Edit
</x-badge>

<x-badge href="/delete" color="danger" pill>
    Delete
</x-badge>
```

### Dismissible Notifications
```blade
<!-- Flash message badges -->
@if(session('success'))
    <x-badge dismissible color="success">
        {{ session('success') }}
    </x-badge>
@endif

@if(session('error'))
    <x-badge dismissible color="danger">
        {{ session('error') }}
    </x-badge>
@endif
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'badge' => [
        'view' => 'laravel-components::{framework}.badge',
    ],
],
```

## JavaScript Integration

### Bootstrap Dismissible Functionality
```javascript
// Initialize dismissible badges
document.querySelectorAll('[data-bs-dismiss="badge"]').forEach(button => {
    button.addEventListener('click', function() {
        const badge = this.closest('.badge');
        badge.remove();
    });
});
```

### Custom Dismissible Handler
```javascript
// Custom dismissible functionality
document.querySelectorAll('.badge-dismissible .btn-close').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const badge = this.closest('.badge');
        
        // Add fade out animation
        badge.style.transition = 'opacity 0.3s';
        badge.style.opacity = '0';
        
        setTimeout(() => {
            badge.remove();
        }, 300);
    });
});
```

## Accessibility

### ARIA Attributes
- Proper semantic structure with `<span>` or `<a>` elements
- Close button with `aria-label="Close"` for dismissible badges
- Screen reader friendly content

### Best Practices
- Use meaningful colors for status indicators
- Ensure sufficient color contrast
- Provide alternative text for dismissible badges
- Use semantic colors (success for positive, danger for negative)

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Bootstrap JavaScript for dismissible functionality
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Dismissible Button Not Working
**Problem:** Close button doesn't dismiss badge
**Solution:** Ensure Bootstrap JavaScript is loaded and `data-bs-dismiss="badge"` is present

#### Badge Not Styling Correctly
**Problem:** Badge doesn't apply Bootstrap classes
**Solution:** Verify Bootstrap CSS is loaded and color name is valid

#### Link Badge Not Working
**Problem:** Badge with href doesn't navigate
**Solution:** Ensure href attribute is properly set and URL is valid

#### Size Not Applying
**Problem:** Size attribute doesn't change badge size
**Solution:** Use valid size values: `sm`, `lg` (or check Bootstrap size classes)

## Related Components

- **Alert:** For larger status messages
- **Button:** For action-oriented elements
- **Card:** Often contains badges for status indicators
- **Table:** Badges commonly used in table cells for status

## Performance Considerations

- Use appropriate badge sizes for content
- Consider lazy loading for dynamic badge content
- Optimize dismissible functionality for large numbers of badges

## Examples Gallery

### E-commerce Product Badges
```blade
<div class="product-card">
    <h3>Gaming Laptop</h3>
    
    <div class="badge-group">
        <x-badge color="success" pill>In Stock</x-badge>
        <x-badge color="warning" pill>Limited Time</x-badge>
        <x-badge color="info" pill>Free Shipping</x-badge>
    </div>
    
    <div class="price-badge">
        <x-badge color="danger" size="lg">
            $1,299
        </x-badge>
    </div>
</div>
```

### User Profile Status
```blade
<div class="user-profile">
    <h4>John Doe</h4>
    
    <div class="status-badges">
        <x-badge color="success">Verified</x-badge>
        <x-badge color="primary" pill>Premium</x-badge>
        <x-badge color="info">Online</x-badge>
    </div>
    
    <div class="notification-badge">
        <x-badge color="danger" size="sm">
            {{ $unreadNotifications }}
        </x-badge>
    </div>
</div>
```

### Admin Dashboard
```blade
<div class="dashboard-stats">
    <div class="stat-card">
        <h5>Total Users</h5>
        <span class="stat-number">1,234</span>
        <x-badge color="success" size="sm">+12%</x-badge>
    </div>
    
    <div class="stat-card">
        <h5>Active Orders</h5>
        <span class="stat-number">56</span>
        <x-badge color="warning" size="sm">Pending</x-badge>
    </div>
    
    <div class="stat-card">
        <h5>System Status</h5>
        <x-badge color="success" pill>Operational</x-badge>
    </div>
</div>
```

### Form Validation Badges
```blade
<div class="form-validation">
    <x-form-input name="password" label="Password" />
    
    <div class="validation-badges">
        <x-badge 
            color="{{ strlen($password) >= 8 ? 'success' : 'secondary' }}" 
            size="sm">
            8+ Characters
        </x-badge>
        
        <x-badge 
            color="{{ preg_match('/[A-Z]/', $password) ? 'success' : 'secondary' }}" 
            size="sm">
            Uppercase
        </x-badge>
        
        <x-badge 
            color="{{ preg_match('/[0-9]/', $password) ? 'success' : 'secondary' }}" 
            size="sm">
            Number
        </x-badge>
    </div>
</div>
```

## Changelog

### Version 2.0.0
- Added dismissible functionality
- Enhanced size variants
- Improved accessibility features
- Added link support

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/badge.blade.php`
2. Add/update tests in `tests/Components/BadgeTest.php`
3. Update this documentation
