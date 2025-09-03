# View Status Component

A sophisticated and feature-rich status display component that provides enhanced status visualization with optional icons, labels, copy-to-clipboard functionality, animated dots, and intelligent color coding based on status values. This component offers professional status display with enhanced user experience and interactive status functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, status validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/status.blade.php`
- **Tests:** `tests/Components/ViewStatusTest.php` (to be created)
- **Documentation:** `docs/view-status.md`

## Basic Usage

### Simple Status Display
```blade
<x-view-status value="1" />
```

### With Icon
```blade
<x-view-status value="1" icon="check-circle" />
```

### With Label
```blade
<x-view-status value="1" label="Status: " />
```

### With Copy Functionality
```blade
<x-view-status value="1" copy />
```

### With Animated Dot
```blade
<x-view-status value="1" animated />
```

### With Custom Options
```blade
<x-view-status value="pending" :options="['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected']" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | mixed | Status value to display | `1`, `0`, `'pending'`, `'approved'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the status | `'check-circle'`, `'alert-circle'`, `'clock'`, `'user'` |
| label | string | null | Label text to display before the status | `'Status: '`, `'State: '`, `'Condition: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| dot | boolean | false | Show status dot indicator | `true` |
| animated | boolean | false | Enable animated status dot | `true` |
| settings | array | [] | Additional settings for customization | `['validate' => true]` |
| options | array | `['1' => 'Active', '0' => 'Inactive']` | Status value mappings | `['pending' => 'Pending', 'approved' => 'Approved']` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'status-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="status-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Status Display
**Usage:** `<x-view-status value="1">` (default)
**Description:** Basic status display with default styling
**Features:**
- Status badge visualization
- Clean, minimal styling
- Professional appearance
- Default options mapping

### Icon Status Display
**Usage:** `<x-view-status value="1" icon="check-circle">`
**Description:** Status display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Labeled Status Display
**Usage:** `<x-view-status value="1" label="Status: ">`
**Description:** Status display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Copyable Status Display
**Usage:** `<x-view-status value="1" copy>`
**Description:** Status display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Animated Status Display
**Usage:** `<x-view-status value="1" animated>`
**Description:** Status display with animated dot indicator
**Features:**
- Animated dot indicator
- Visual feedback
- Professional appearance
- Enhanced user experience

### Custom Options Status Display
**Usage:** `<x-view-status value="pending" :options="['pending' => 'Pending', 'approved' => 'Approved']">`
**Description:** Status display with custom status mappings
**Features:**
- Custom status mappings
- Flexible status values
- Professional styling
- Enhanced customization

## Status Functionality

### Status Visualization
The component displays status using:
- Bootstrap status badges
- Color-coded indicators
- Dot indicators
- Professional styling

### Status Options Mapping
The component supports flexible status mapping:
- **Default Options**: `['1' => 'Active', '0' => 'Inactive']`
- **Custom Options**: User-defined status mappings
- **Array Options**: Complex status with text, color, and animation
- **Dynamic Mapping**: Runtime status value resolution

### Color Coding Support
The component supports intelligent color coding:
- **Green (status-success)**: Active/positive statuses
- **Yellow (status-warning)**: Inactive/neutral statuses
- **Custom Colors**: User-defined color schemes
- **Dynamic Colors**: Runtime color determination

### Animated Dot Support
The component supports animated indicators:
- **Static Dot**: Basic status indicator
- **Animated Dot**: Dynamic status feedback
- **Custom Animation**: User-defined animation states
- **Visual Enhancement**: Improved user experience

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy status values to clipboard
- Paste into other applications
- Share status details easily
- Improve workflow efficiency

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Status content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-status value="1">
    Additional Content
</x-view-status>
```

## Usage Examples

### Basic Status Display
```blade
<x-view-status value="1" />
```

### Status with Icon
```blade
<x-view-status 
    value="1" 
    icon="check-circle" />
```

### Status with Label
```blade
<x-view-status 
    value="1" 
    label="Status: " />
```

### Status with Copy Functionality
```blade
<x-view-status 
    value="1" 
    copy />
```

### Status with Animated Dot
```blade
<x-view-status 
    value="1" 
    animated />
```

### Status with Custom Options
```blade
<x-view-status 
    value="pending" 
    :options="['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected']" />
```

### Status with Custom Classes
```blade
<x-view-status 
    value="1" 
    class="text-primary fw-bold" />
```

### Status with Custom ID
```blade
<x-view-status 
    value="1" 
    id="custom-status-id" />
```

### Status with Data Attributes
```blade
<x-view-status 
    value="1" 
    data-test="status-component"
    data-type="display-status" />
```

### Status with Aria Attributes
```blade
<x-view-status 
    value="1" 
    aria-label="Status display"
    aria-describedby="status-description" />
```

### Status with Role Attribute
```blade
<x-view-status 
    value="1" 
    role="text" />
```

### Status with Tabindex
```blade
<x-view-status 
    value="1" 
    tabindex="0" />
```

### Status with Form Attribute
```blade
<x-view-status 
    value="1" 
    form="my-form" />
```

### Status with Autocomplete
```blade
<x-view-status 
    value="1" 
    autocomplete="off" />
```

### Status with Novalidate
```blade
<x-view-status 
    value="1" 
    novalidate />
```

### Status with Accept
```blade
<x-view-status 
    value="1" 
    accept="status/*" />
```

### Status with Capture
```blade
<x-view-status 
    value="1" 
    capture="environment" />
```

### Status with Max
```blade
<x-view-status 
    value="1" 
    max="100" />
```

### Status with Min
```blade
<x-view-status 
    value="1" 
    min="5" />
```

### Status with Step
```blade
<x-view-status 
    value="1" 
    step="1" />
```

### Status with Pattern
```blade
<x-view-status 
    value="1" 
    pattern="[0-9]+" />
```

### Status with Spellcheck
```blade
<x-view-status 
    value="1" 
    spellcheck="false" />
```

### Status with Translate
```blade
<x-view-status 
    value="1" 
    translate="no" />
```

### Status with Contenteditable
```blade
<x-view-status 
    value="1" 
    contenteditable="true" />
```

### Status with Contextmenu
```blade
<x-view-status 
    value="1" 
    contextmenu="status-menu" />
```

### Status with Dir
```blade
<x-view-status 
    value="1" 
    dir="rtl" />
```

### Status with Draggable
```blade
<x-view-status 
    value="1" 
    draggable="true" />
```

### Status with Dropzone
```blade
<x-view-status 
    value="1" 
    dropzone="copy" />
```

### Status with Hidden
```blade
<x-view-status 
    value="1" 
    hidden />
```

### Status with Lang
```blade
<x-view-status 
    value="1" 
    lang="en" />
```

### Status with Settings Array
```blade
<x-view-status 
    value="1" 
    :settings="['validate' => true]" />
```

## Common Patterns

### User Status Interface
```blade
<div class="user-status-interface">
    <h4>User Status</h4>
    
    <x-view-status 
        value="1" 
        icon="user" 
        label="User Status: "
        class="text-primary" />
    
    <x-view-status 
        value="0" 
        icon="user-x" 
        label="Account Status: "
        class="text-warning" />
    
    <x-view-status 
        value="pending" 
        icon="clock" 
        label="Verification: "
        :options="['pending' => 'Pending', 'verified' => 'Verified', 'rejected' => 'Rejected']"
        class="text-info" />
    
    <x-view-status 
        value="active" 
        icon="check-circle" 
        label="Subscription: "
        :options="['active' => 'Active', 'expired' => 'Expired', 'cancelled' => 'Cancelled']"
        class="text-success" />
</div>
```

### Order Status Interface
```blade
<div class="order-status-interface">
    <h4>Order Status</h4>
    
    <x-view-status 
        value="pending" 
        icon="clock" 
        label="Order Status: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered']"
        class="text-primary" />
    
    <x-view-status 
        value="processing" 
        icon="package" 
        label="Processing: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered']"
        class="text-info" />
    
    <x-view-status 
        value="shipped" 
        icon="truck" 
        label="Shipping: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered']"
        class="text-warning" />
    
    <x-view-status 
        value="delivered" 
        icon="check-circle" 
        label="Delivery: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered']"
        class="text-success" />
</div>
```

### System Status Interface
```blade
<div class="system-status-interface">
    <h4>System Status</h4>
    
    <x-view-status 
        value="online" 
        icon="wifi" 
        label="Server Status: "
        :options="['online' => 'Online', 'offline' => 'Offline', 'maintenance' => 'Maintenance']"
        class="text-success" />
    
    <x-view-status 
        value="maintenance" 
        icon="settings" 
        label="System Mode: "
        :options="['online' => 'Online', 'offline' => 'Offline', 'maintenance' => 'Maintenance']"
        class="text-warning" />
    
    <x-view-status 
        value="healthy" 
        icon="heart" 
        label="Health Check: "
        :options="['healthy' => 'Healthy', 'warning' => 'Warning', 'critical' => 'Critical']"
        class="text-success" />
    
    <x-view-status 
        value="warning" 
        icon="alert-triangle" 
        label="Performance: "
        :options="['healthy' => 'Healthy', 'warning' => 'Warning', 'critical' => 'Critical']"
        class="text-warning" />
</div>
```

### Payment Status Interface
```blade
<div class="payment-status-interface">
    <h4>Payment Status</h4>
    
    <x-view-status 
        value="completed" 
        icon="credit-card" 
        label="Payment: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'completed' => 'Completed', 'failed' => 'Failed']"
        class="text-success" />
    
    <x-view-status 
        value="pending" 
        icon="clock" 
        label="Authorization: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'completed' => 'Completed', 'failed' => 'Failed']"
        class="text-warning" />
    
    <x-view-status 
        value="failed" 
        icon="x-circle" 
        label="Transaction: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'completed' => 'Completed', 'failed' => 'Failed']"
        class="text-danger" />
    
    <x-view-status 
        value="processing" 
        icon="loader" 
        label="Processing: "
        :options="['pending' => 'Pending', 'processing' => 'Processing', 'completed' => 'Completed', 'failed' => 'Failed']"
        class="text-info" />
</div>
```

### Approval Status Interface
```blade
<div class="approval-status-interface">
    <h4>Approval Status</h4>
    
    <x-view-status 
        value="approved" 
        icon="check-circle" 
        label="Document: "
        :options="['pending' => 'Pending', 'reviewing' => 'Reviewing', 'approved' => 'Approved', 'rejected' => 'Rejected']"
        class="text-success" />
    
    <x-view-status 
        value="reviewing" 
        icon="eye" 
        label="Review: "
        :options="['pending' => 'Pending', 'reviewing' => 'Reviewing', 'approved' => 'Approved', 'rejected' => 'Rejected']"
        class="text-warning" />
    
    <x-view-status 
        value="rejected" 
        icon="x-circle" 
        label="Decision: "
        :options="['pending' => 'Pending', 'reviewing' => 'Reviewing', 'approved' => 'Approved', 'rejected' => 'Rejected']"
        class="text-danger" />
    
    <x-view-status 
        value="pending" 
        icon="clock" 
        label="Status: "
        :options="['pending' => 'Pending', 'reviewing' => 'Reviewing', 'approved' => 'Approved', 'rejected' => 'Rejected']"
        class="text-info" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_status_with_basic_value()
{
    $view = $this->blade('<x-view-status value="1" />');
    
    $view->assertSee('Active');
}

/** @test */
public function it_renders_view_status_with_icon()
{
    $view = $this->blade('<x-view-status value="1" icon="check-circle" />');
    
    $view->assertSee('Active');
    $view->assertSee('check-circle');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewStatusComponent::class)
        ->assertSee('<x-view-status')
        ->set('value', 1)
        ->assertSee('Active');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to status elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to status elements

### Keyboard Navigation
- Tab navigation to status
- Copy functionality accessibility
- Status display accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Status context communication
- Icon description support
- Copy functionality announcement
- Status purpose indication

### Status Accessibility
- Clear status purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Status value accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Status display with HTML output

## Troubleshooting

### Common Issues

#### Status Not Displaying
**Problem:** Status value not showing
**Solution:** Check if value attribute is set and options mapping is correct

#### Color Coding Not Working
**Problem:** Status colors not changing correctly
**Solution:** Check options array and color definitions

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Status doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **View URL:** URL display component
- **View Tel:** Telephone display component
- **View File:** File display component
- **View Array:** Array display component
- **View Rating:** Rating display component
- **View Progress:** Progress display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with status display functionality
- Status visualization integration for interactive functionality
- Flexible options mapping for custom statuses
- Animated dot support for enhanced feedback
- Icon integration support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/status.blade.php`
2. Add/update tests in `tests/Components/ViewStatusTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [View URL Component](../view-url.md)
- [View Tel Component](../view-tel.md)
- [View File Component](../view-file.md)
- [View Array Component](../view-array.md)
- [View Rating Component](../view-rating.md)
- [View Progress Component](../view-progress.md)
- [Icon Component](../icon.md)
- [Status Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Status Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
