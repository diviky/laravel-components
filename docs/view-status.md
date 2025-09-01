# View Status Component

A flexible status display component that renders status indicators with icons, labels, and customizable styling options including animated dots and copy-to-clipboard functionality.

## Overview

**Component Type:** View  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component for status icons

## Files

- **View File:** `resources/views/bootstrap-5/view/status.blade.php`
- **Documentation:** `docs/view-status.md`

## Basic Usage

### Simple Status Display
```blade
<x-view.status value="1" />
```

### Status with Custom Label
```blade
<x-view.status value="1" label="User Status:" />
```

### Status with Icon
```blade
<x-view.status value="1" icon="user" label="User Status:" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | mixed | Status value to display | `'1'`, `'active'`, `'pending'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before status | `'user'`, `'check'`, `'alert'` |
| label | string | null | Text label displayed before status | `'Status:'`, `'User:'` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| dot | boolean | false | Show status dot indicator | `true` |
| animated | boolean | false | Enable animated status dot | `true` |
| options | array | `['1' => 'Active', '0' => 'Inactive']` | Custom status text mapping | `['active' => 'Active User', 'inactive' => 'Inactive User']` |
| settings | array | [] | Additional configuration options | `['color' => 'primary']` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-status'` |
| id | string | auto-generated | Element ID | `'status-indicator'` |
| style | string | null | Inline CSS styles | `'margin-left: 10px;'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-status'` |
| role | string\|array | null | Required user role(s) | `'admin'` or `['admin', 'manager']` |
| action | string | null | Action type for authorization | `'read'` |

## Slots

### Default Slot
- **Purpose:** Additional content after the status display
- **Content Type:** HTML/Text/Components

## Usage Examples

### Basic Status Display
```blade
<x-view.status value="1" />
<!-- Outputs: Active (with green styling) -->
```

### Status with Custom Label and Icon
```blade
<x-view.status 
    value="1" 
    icon="user" 
    label="User Status:" />
<!-- Outputs: [user icon] User Status: Active -->
```

### Custom Status Options
```blade
<x-view.status 
    value="pending"
    :options="[
        'active' => 'Active User',
        'pending' => 'Pending Approval',
        'suspended' => 'Account Suspended'
    ]" />
<!-- Outputs: Pending Approval -->
```

### Advanced Status with Custom Styling
```blade
<x-view.status 
    value="warning"
    :options="[
        'warning' => [
            'text' => 'Needs Attention',
            'color' => 'warning',
            'animated' => true
        ]
    ]"
    dot="true"
    animated="true" />
<!-- Outputs: [icon] Needs Attention [animated dot] -->
```

### Status with Copy Functionality
```blade
<x-view.status 
    value="ACTIVE-2024-001" 
    label="Order Status:"
    copy="true" />
<!-- Outputs: Order Status: Active [copy icon] -->
```

### Livewire Integration
```blade
<x-view.status 
    value="{{ $user->status }}"
    icon="user"
    label="User Status:"
    class="user-status-indicator">
    
    @if($user->status === 'pending')
        <x-button size="sm" wire:click="approveUser({{ $user->id }})">
            Approve
        </x-button>
    @endif
</x-view.status>
```

### Framework-Specific Styling

#### Bootstrap Classes
```blade
<x-view.status 
    value="1"
    class="status-lg text-center"
    label="System Status:" />
```

#### Custom Styling
```blade
<x-view.status 
    value="1"
    class="custom-status-indicator"
    style="font-size: 18px; font-weight: bold;"
    label="Status:" />
```

## Component Variants

### Default Status
**Usage:** `<x-view.status>`
**Description:** Standard status display with default styling
**Features:**
- Automatic color mapping (1 = success, 0 = warning)
- Icon and label support
- Responsive design

### Animated Status
**Usage:** `<x-view.status animated dot>`
**Description:** Status with animated dot indicator
**Features:**
- Pulsing dot animation
- Enhanced visual feedback
- CSS animation support

### Copyable Status
**Usage:** `<x-view.status copy>`
**Description:** Status with copy-to-clipboard functionality
**Features:**
- Clipboard integration
- User-friendly copy button
- Visual feedback on copy

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-view-status>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'view.status' => [
        'view' => 'laravel-components::{framework}.view.status',
    ],
],
```

## Common Patterns

### User Status Management
```blade
<div class="user-status-container">
    <x-view.status 
        value="{{ $user->status }}"
        icon="user"
        label="Status:"
        :options="[
            'active' => 'Active User',
            'pending' => 'Pending Approval',
            'suspended' => 'Suspended',
            'inactive' => 'Inactive'
        ]" />
    
    @if($user->status === 'pending')
        <x-button size="sm" wire:click="approveUser({{ $user->id }})">
            Approve
        </x-button>
    @endif
</div>
```

### System Status Dashboard
```blade
<div class="row">
    <div class="col-md-3">
        <x-view.status 
            value="{{ $systemStatus['database'] }}"
            icon="database"
            label="Database:"
            dot="true"
            animated="{{ $systemStatus['database'] === 'warning' }}" />
    </div>
    <div class="col-md-3">
        <x-view.status 
            value="{{ $systemStatus['cache'] }}"
            icon="server"
            label="Cache:"
            dot="true"
            animated="{{ $systemStatus['cache'] === 'warning' }}" />
    </div>
    <div class="col-md-3">
        <x-view.status 
            value="{{ $systemStatus['queue'] }}"
            icon="clock"
            label="Queue:"
            dot="true"
            animated="{{ $systemStatus['queue'] === 'warning' }}" />
    </div>
    <div class="col-md-3">
        <x-view.status 
            value="{{ $systemStatus['storage'] }}"
            icon="hard-drive"
            label="Storage:"
            dot="true"
            animated="{{ $systemStatus['storage'] === 'warning' }}" />
    </div>
</div>
```

### Order Status Tracking
```blade
<x-view.status 
    value="{{ $order->status }}"
    icon="package"
    label="Order Status:"
    copy="true"
    :options="[
        'pending' => 'Pending Payment',
        'paid' => 'Payment Received',
        'processing' => 'Processing Order',
        'shipped' => 'Shipped',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled'
    ]" />
```

### Task Status with Actions
```blade
<div class="task-status-row">
    <x-view.status 
        value="{{ $task->status }}"
        icon="checklist"
        label="Task:"
        :options="[
            'todo' => 'To Do',
            'in_progress' => 'In Progress',
            'review' => 'Under Review',
            'completed' => 'Completed'
        ]" />
    
    <div class="task-actions">
        @if($task->status === 'todo')
            <x-button size="sm" wire:click="startTask({{ $task->id }})">
                Start
            </x-button>
        @elseif($task->status === 'in_progress')
            <x-button size="sm" wire:click="markForReview({{ $task->id }})">
                Mark for Review
            </x-button>
        @endif
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_basic_status_with_default_options()
{
    $view = $this->blade('<x-view.status value="1" />');
    
    $view->assertSee('Active');
    $view->assertSee('status-success');
}

/** @test */
public function it_renders_status_with_custom_icon_and_label()
{
    $view = $this->blade('<x-view.status value="1" icon="user" label="User Status:" />');
    
    $view->assertSee('User Status:');
    $view->assertSee('user');
    $view->assertSee('Active');
}

/** @test */
public function it_renders_custom_status_options()
{
    $view = $this->blade('<x-view.status value="custom" :options="[\'custom\' => \'Custom Status\']" />');
    
    $view->assertSee('Custom Status');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(UserStatusComponent::class)
        ->assertSee('<x-view.status')
        ->set('userStatus', 'pending')
        ->assertSee('Pending Approval');
}
```

## Accessibility

### ARIA Attributes
- `role="status"`: Applied to status indicators
- `aria-live`: For dynamic status updates
- `aria-label`: For screen readers when copy functionality is enabled

### Keyboard Navigation
- Tab navigation to copy button when enabled
- Enter key activates copy functionality
- Focus management for dynamic updates

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Clipboard API for copy functionality
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling

## Troubleshooting

### Common Issues

#### Status Not Displaying
**Problem:** Status text is not showing
**Solution:** Check that the value exists in the options array or use default options

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard button doesn't copy text
**Solution:** Ensure Clipboard API is supported and check browser console for errors

#### Animated Dot Not Animating
**Problem:** Status dot is visible but not animating
**Solution:** Verify CSS animations are enabled and check for CSS conflicts

#### Custom Colors Not Applied
**Problem:** Custom status colors are not being used
**Solution:** Ensure the options array includes color information in the correct format

## Related Components

- **Icon:** Component used for status icons
- **Badge:** Alternative status display component
- **Alert:** For more prominent status messages
- **ViewBadge:** For badge-style status display

## Changelog

### Version 1.0.0
- Initial release with basic status display
- Icon and label support
- Copy-to-clipboard functionality
- Animated status dots
- Custom status options

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/status.blade.php`
2. Add/update tests in `tests/Components/ViewStatusTest.php`
3. Update this documentation

## See Also

- [Icon Component](../icon.md)
- [Badge Component](../badge.md)
- [Alert Component](../alert.md)
- [View Badge Component](../view-badge.md)
- [Bootstrap Status Documentation](https://getbootstrap.com/docs/5.3/components/badge/)
