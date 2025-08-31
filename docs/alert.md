# Alert Component

Displays contextual alert messages with automatic icon selection, dismissible functionality, and multiple style variants.

## Overview

**Component Type:** UI  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component (for automatic icons)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/alert/index.blade.php`
- **Variants:** `alert/success.blade.php`, `alert/danger.blade.php`, `alert/warning.blade.php`, `alert/help.blade.php`, `alert/error.blade.php`
- **Documentation:** `docs/alert.md`
- **Tests:** `tests/Components/AlertTest.php`

## Basic Usage

```blade
<x-alert type="success">
    Operation completed successfully!
</x-alert>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'info' | Alert type (info, success, warning, danger, help) | `'success'` |
| dismissible | boolean | false | Whether alert can be dismissed | `true` |
| icon | string | auto-generated | Icon name to display | `'check-circle'` |
| title | string | null | Optional alert title | `'Success!'` |
| message | string | null | Alert message text | `'Operation completed'` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'alert-message'` |
| class | string | null | Additional CSS classes | `'mb-4 shadow'` |

## Slots

### Default Slot
- **Purpose:** Main alert content when message attribute not used
- **Content Type:** HTML/Text
- **Required:** Yes (if message not provided)

## Automatic Icon Mapping

The component automatically selects appropriate icons based on type:

| Type | Default Icon | Purpose |
|------|-------------|---------|
| info | info-circle | Informational messages |
| help | help | Help and guidance |
| success | rosette-discount-check | Success confirmations |
| warning | alert-triangle | Warning messages |
| danger | alert-hexagon | Error and danger alerts |

## Usage Examples

### Basic Alert Types
```blade
<!-- Info alert (default) -->
<x-alert>
    This is an informational message.
</x-alert>

<!-- Success alert -->
<x-alert type="success">
    Your profile has been updated successfully.
</x-alert>

<!-- Warning alert -->
<x-alert type="warning">
    Please review your settings before continuing.
</x-alert>

<!-- Danger alert -->
<x-alert type="danger">
    An error occurred while processing your request.
</x-alert>
```

### Alert with Title and Message
```blade
<x-alert 
    type="success" 
    title="Profile Updated" 
    message="Your profile information has been saved successfully." />
```

### Dismissible Alert
```blade
<x-alert type="warning" dismissible title="Important Notice">
    This feature will be deprecated in the next version.
</x-alert>
```

### Custom Icon Alert
```blade
<x-alert type="info" icon="lightbulb" title="Pro Tip">
    You can use keyboard shortcuts to navigate faster.
</x-alert>
```

### Alert with Rich Content
```blade
<x-alert type="danger" dismissible>
    <strong>Validation Error:</strong>
    <ul class="mb-0 mt-2">
        <li>Password must be at least 8 characters</li>
        <li>Email address is required</li>
    </ul>
</x-alert>
```

### Livewire Integration
```blade
<x-alert 
    type="{{ $alertType }}" 
    :dismissible="true"
    wire:click="dismissAlert">
    {{ $alertMessage }}
</x-alert>
```

## Component Variants

The alert component includes convenient pre-configured variants:

### Success Alert (`<x-alert.success>`)
```blade
<x-alert.success dismissible>
    Profile updated successfully!
</x-alert.success>
```

### Danger Alert (`<x-alert.danger>`)
```blade
<x-alert.danger title="Delete Confirmation">
    This action cannot be undone.
</x-alert.danger>
```

### Error Alert (`<x-alert.error>`)
```blade
<x-alert.error>
    Failed to save changes. Please try again.
</x-alert.error>
```

### Warning Alert (`<x-alert.warning>`)
```blade
<x-alert.warning dismissible>
    Your session will expire in 5 minutes.
</x-alert.warning>
```

### Info Alert (`<x-alert.info>`)
```blade
<x-alert.info icon="info-circle">
    Click here to learn more about this feature.
</x-alert.info>
```

### Help Alert (`<x-alert.help>`)
```blade
<x-alert.help title="Need Help?">
    Check our documentation for detailed instructions.
</x-alert.help>
```

## Advanced Examples

### Flash Message Integration
```blade
@if(session('success'))
    <x-alert.success dismissible>
        {{ session('success') }}
    </x-alert.success>
@endif

@if(session('error'))
    <x-alert.danger dismissible>
        {{ session('error') }}
    </x-alert.danger>
@endif
```

### Validation Error Display
```blade
@if($errors->any())
    <x-alert.danger dismissible title="Please fix the following errors:">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert.danger>
@endif
```

### Progressive Enhancement
```blade
<x-alert type="info" class="fade-in" dismissible>
    <div class="d-flex align-items-center">
        <div class="flex-grow-1">
            New features are available!
        </div>
        <div class="ms-3">
            <a href="/features" class="btn btn-sm btn-outline-primary">
                Learn More
            </a>
        </div>
    </div>
</x-alert>
```

## CSS Classes Applied

The component applies these Bootstrap classes based on attributes:

- `alert` - Base alert styling
- `alert-{type}` - Contextual colors (alert-info, alert-success, etc.)
- `alert-dismissible` - When dismissible=true
- `text-sm` - Smaller text size
- `max-w-xl` - Maximum width constraint
- `d-flex align-items-center` - When icon is present

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'alert' => [
        'view' => 'laravel-components::{framework}.alert.index',
    ],
    'alert.success' => [
        'view' => 'laravel-components::{framework}.alert.success',
    ],
    // ... other variants
],
```

### Icon Customization
Override default icons by passing the icon attribute:
```blade
<x-alert type="success" icon="checkmark">
    Custom success icon
</x-alert>
```

## Common Patterns

### Toast-style Notifications
```blade
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
    <x-alert type="success" dismissible class="toast-alert">
        Changes saved successfully!
    </x-alert>
</div>
```

### Inline Form Validation
```blade
<x-form-input name="email" label="Email">
    @error('email')
        <x-alert type="danger" class="mt-2 mb-0">
            {{ $message }}
        </x-alert>
    @enderror
</x-form-input>
```

### Status Messages
```blade
@switch($order->status)
    @case('pending')
        <x-alert type="warning" icon="clock">
            Order is being processed
        </x-alert>
        @break
    @case('completed')
        <x-alert type="success" icon="check">
            Order completed successfully
        </x-alert>
        @break
    @case('failed')
        <x-alert type="danger" icon="x">
            Order processing failed
        </x-alert>
        @break
@endswitch
```

## JavaScript Integration

### Auto-dismiss Alerts
```blade
<x-alert type="info" dismissible class="auto-dismiss" data-timeout="5000">
    This message will disappear automatically.
</x-alert>

<script>
document.querySelectorAll('.auto-dismiss').forEach(alert => {
    const timeout = alert.dataset.timeout || 5000;
    setTimeout(() => {
        alert.querySelector('.btn-close')?.click();
    }, timeout);
});
</script>
```

## Accessibility

### ARIA Attributes
- `role="alert"` automatically applied
- Proper color contrast for all variants
- Screen reader friendly content structure

### Best Practices
- Use meaningful titles and messages
- Ensure sufficient color contrast
- Provide alternative ways to convey information beyond color
- Test with screen readers

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Bootstrap's alert plugin for dismissible functionality
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Dismissible Button Not Working
**Problem:** Close button doesn't dismiss alert
**Solution:** Ensure Bootstrap JavaScript is loaded and data-bs-dismiss="alert" is present

#### Icon Not Displaying
**Problem:** Icon doesn't appear with alert
**Solution:** Verify icon component is available and icon name is valid

#### Custom Classes Not Applied
**Problem:** Additional CSS classes not showing
**Solution:** Use class attribute: `<x-alert class="my-custom-class">`

#### Alert Not Responsive
**Problem:** Alert doesn't look good on mobile
**Solution:** Use Bootstrap responsive utilities and test on different screen sizes

## Related Components

- **Badge:** For smaller status indicators
- **Toast:** For temporary notifications
- **Modal:** For important alerts requiring user interaction
- **Card:** For more complex alert layouts

## Testing Examples

```php
// Test basic alert rendering
$view = $this->blade('<x-alert type="success">Success message</x-alert>');
$view->assertSee('Success message');
$view->assertSee('alert-success');

// Test dismissible alert
$view = $this->blade('<x-alert dismissible>Message</x-alert>');
$view->assertSee('alert-dismissible');
$view->assertSee('btn-close');

// Test alert variants
$view = $this->blade('<x-alert.danger>Error message</x-alert.danger>');
$view->assertSee('alert-danger');
```

## Changelog

### Version 2.0.0
- Added automatic icon selection
- Improved accessibility with proper ARIA attributes
- Enhanced dismissible functionality
- Added message attribute for cleaner syntax

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/alert/index.blade.php`
2. Update variant views in `resources/views/bootstrap-5/alert/`
3. Add/update tests in `tests/Components/AlertTest.php`
4. Update this documentation
