# View Badge Component

The `View Badge` component is a versatile display component for rendering badge-style information with optional icon, label, color customization, and copy-to-clipboard functionality.

## Overview

The View Badge component provides a clean and consistent way to display status indicators, labels, or small pieces of information in a badge format. It supports Bootstrap badge styling with customizable colors and integrates seamlessly with the icon system and copy functionality.

## Basic Usage

```blade
<!-- Basic badge with default success color -->
<x-view-badge value="Active" />

<!-- Badge with custom color -->
<x-view-badge value="Pending" color="warning" />

<!-- Badge with icon and label -->
<x-view-badge value="New" icon="star" label="New Item" color="primary" />

<!-- Badge with copy functionality -->
<x-view-badge value="Copy Me" copy />
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The value to display in the badge |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the badge |
| `color` | `string` | `'success'` | Bootstrap color class for the badge |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array |

## Color Variants

The component supports all Bootstrap badge color classes:

```blade
<!-- Success (default) -->
<x-view-badge value="Completed" color="success" />

<!-- Primary -->
<x-view-badge value="Info" color="primary" />

<!-- Secondary -->
<x-view-badge value="Default" color="secondary" />

<!-- Warning -->
<x-view-badge value="Pending" color="warning" />

<!-- Danger -->
<x-view-badge value="Error" color="danger" />

<!-- Info -->
<x-view-badge value="Note" color="info" />

<!-- Light -->
<x-view-badge value="Light" color="light" />

<!-- Dark -->
<x-view-badge value="Dark" color="dark" />
```

## Icon Integration

Add icons to enhance the visual appearance:

```blade
<!-- With icon -->
<x-view-badge value="User" icon="user" />

<!-- With different icon -->
<x-view-badge value="Settings" icon="settings" color="primary" />

<!-- Icon with custom color -->
<x-view-badge value="Alert" icon="alert-triangle" color="warning" />
```

## Label Customization

Customize the label text displayed in the badge:

```blade
<!-- With custom label -->
<x-view-badge value="123" label="Notifications" />

<!-- Label with icon -->
<x-view-badge value="5" icon="bell" label="New Messages" color="primary" />

<!-- Label only (no value display) -->
<x-view-badge value="hidden" label="Featured" color="success" />
```

## Copy Functionality

Enable copy-to-clipboard functionality:

```blade
<!-- Copy the value -->
<x-view-badge value="Copy this text" copy />

<!-- Copy with custom styling -->
<x-view-badge value="Important Info" copy color="warning" />

<!-- Copy with icon and label -->
<x-view-badge value="API Key" icon="key" label="API Key" copy color="dark" />
```

## Advanced Usage

### With Settings Array

```blade
@php
$settings = [
    'validate' => true,
    'theme' => 'dark'
];
@endphp

<x-view-badge value="Custom" :settings="$settings" color="primary" />
```

### Dynamic Color Based on Value

```blade
@php
$status = 'active';
$color = $status === 'active' ? 'success' : 'secondary';
@endphp

<x-view-badge value="{{ $status }}" color="{{ $color }}" />
```

### Conditional Rendering

```blade
@if($user->isVerified())
    <x-view-badge value="Verified" icon="check-circle" color="success" />
@else
    <x-view-badge value="Unverified" icon="x-circle" color="secondary" />
@endif
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-badge value="Custom" class="my-custom-badge" />

<!-- Multiple classes -->
<x-view-badge value="Styled" class="badge-lg badge-rounded" />
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-badge value="Styled" style="font-size: 16px; padding: 8px 16px;" />
```

### Responsive Design

```blade
<!-- Responsive badge -->
<x-view-badge value="Responsive" class="badge-responsive" />
```

## Integration Examples

### User Status Display

```blade
<div class="user-status">
    <x-view-badge 
        value="{{ $user->status }}" 
        icon="user" 
        :color="$user->status === 'active' ? 'success' : 'secondary'"
    />
</div>
```

### Notification Counter

```blade
<div class="notification-badge">
    <x-view-badge 
        value="{{ $notifications->count() }}" 
        icon="bell" 
        color="danger"
        copy
    />
</div>
```

### Feature Tags

```blade
<div class="feature-tags">
    @foreach($features as $feature)
        <x-view-badge 
            value="{{ $feature->name }}" 
            :color="$feature->priority === 'high' ? 'danger' : 'info'"
        />
    @endforeach
</div>
```

### Status Indicators

```blade
<div class="system-status">
    <x-view-badge value="Online" icon="wifi" color="success" />
    <x-view-badge value="Maintenance" icon="tools" color="warning" />
    <x-view-badge value="Error" icon="alert-triangle" color="danger" />
</div>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_badge()
{
    $view = $this->blade('<x-view-badge value="Test" />');
    
    $view->assertSee('Test');
    $view->assertSee('badge');
    $view->assertSee('badge-success');
}
```

### Color Variant Test

```php
/** @test */
public function it_renders_badge_with_custom_color()
{
    $view = $this->blade('<x-view-badge value="Warning" color="warning" />');
    
    $view->assertSee('Warning');
    $view->assertSee('badge-warning');
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_badge_with_icon()
{
    $view = $this->blade('<x-view-badge value="User" icon="user" />');
    
    $view->assertSee('user');
    $view->assertSee('me-1');
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_badge_with_copy_functionality()
{
    $view = $this->blade('<x-view-badge value="Copy Me" copy />');
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard="Copy Me"');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-badge 
    value="Status" 
    aria-label="User status indicator"
    role="status"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-badge 
    value="5" 
    aria-label="5 unread notifications"
    role="status"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Lightweight component with minimal DOM manipulation
- Efficient icon rendering through the icon system
- Copy functionality only loads when enabled

## Troubleshooting

### Common Issues

1. **Badge not displaying**: Ensure the `value` prop is not null or empty
2. **Color not applying**: Verify the color value matches Bootstrap color classes
3. **Icon not showing**: Check if the icon name exists in your icon set
4. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-badge value="Debug" :debug="true" />
```

## Related Components

- **View Status** - For status indicators with more complex logic
- **View Tag** - For tag-style displays
- **Badge** - Base badge component
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic badge functionality
- Color variants support
- Icon integration
- Copy functionality

## Contributing

When contributing to the View Badge component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test across different browsers and devices

## Support

For support and questions about the View Badge component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
