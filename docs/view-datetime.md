# View DateTime Component

The `View DateTime` component is a simple yet effective display component for rendering datetime values with optional icon integration, label support, and copy-to-clipboard functionality.

## Overview

The View DateTime component provides a clean way to display datetime information with consistent formatting. It automatically formats datetime values using Laravel's `datetime()` helper function and supports optional icons, labels, and copy functionality for enhanced user experience.

## Basic Usage

```blade
<!-- Basic datetime display -->
<x-view-datetime :value="now()" />

<!-- Datetime with icon -->
<x-view-datetime :value="now()" icon="calendar" />

<!-- Datetime with custom label -->
<x-view-datetime :value="now()" label="Created: " />

<!-- Datetime with copy functionality -->
<x-view-datetime :value="now()" copy />

<!-- Complete configuration -->
<x-view-datetime 
    :value="now()" 
    icon="clock" 
    label="Last Updated: " 
    copy 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The datetime value to display (Carbon instance, string, or timestamp) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the datetime |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array (reserved for future use) |

## Data Types Supported

The component accepts various datetime formats:

```php
// Carbon instances
$datetime = now();
<x-view-datetime :value="$datetime" />

// String dates
$datetime = '2024-01-15 14:30:00';
<x-view-datetime :value="$datetime" />

// Timestamps
$datetime = 1705329000;
<x-view-datetime :value="$datetime" />

// Database datetime fields
$datetime = $user->created_at;
<x-view-datetime :value="$datetime" />
```

## Display Features

### Icon Integration

```blade
<!-- Calendar icon for dates -->
<x-view-datetime :value="now()" icon="calendar" />

<!-- Clock icon for times -->
<x-view-datetime :value="now()" icon="clock" />

<!-- Custom icon -->
<x-view-datetime :value="now()" icon="calendar-event" />
```

### Label Support

```blade
<!-- Simple label -->
<x-view-datetime :value="now()" label="Created: " />

<!-- HTML label -->
<x-view-datetime :value="now()" label="<strong>Updated:</strong> " />

<!-- No label (default) -->
<x-view-datetime :value="now()" />
```

### Copy Functionality

```blade
<!-- Enable copy to clipboard -->
<x-view-datetime :value="now()" copy />

<!-- Copy with icon and label -->
<x-view-datetime 
    :value="now()" 
    icon="calendar" 
    label="Event Date: " 
    copy 
/>
```

## Advanced Usage

### Conditional Display

```blade
@if($user->last_login_at)
    <x-view-datetime 
        :value="$user->last_login_at" 
        icon="clock" 
        label="Last Login: " 
    />
@else
    <span class="text-muted">Never logged in</span>
@endif
```

### Dynamic Configuration

```blade
@php
$datetimeConfig = [
    'icon' => $isEvent ? 'calendar-event' : 'clock',
    'label' => $isEvent ? 'Event Date: ' : 'Time: ',
    'copy' => $canCopy
];
@endphp

<x-view-datetime 
    :value="$datetime" 
    :settings="$datetimeConfig" 
/>
```

### Formatted Display

```blade
<!-- Display with custom formatting -->
@php
$formattedDate = $user->created_at->format('F j, Y \a\t g:i A');
@endphp

<x-view-datetime 
    :value="$formattedDate" 
    icon="user-plus" 
    label="Member Since: " 
/>
```

## Integration Examples

### User Profile Display

```blade
<div class="user-profile">
    <div class="profile-section">
        <x-view-datetime 
            :value="$user->created_at" 
            icon="user-plus" 
            label="Member Since: " 
        />
    </div>
    
    <div class="profile-section">
        <x-view-datetime 
            :value="$user->last_login_at" 
            icon="clock" 
            label="Last Login: " 
            copy
        />
    </div>
    
    <div class="profile-section">
        <x-view-datetime 
            :value="$user->email_verified_at" 
            icon="check-circle" 
            label="Email Verified: " 
        />
    </div>
</div>
```

### Event Management

```blade
<div class="event-details">
    <div class="event-time">
        <x-view-datetime 
            :value="$event->start_time" 
            icon="calendar-event" 
            label="Start Time: " 
            copy
        />
    </div>
    
    <div class="event-time">
        <x-view-datetime 
            :value="$event->end_time" 
            icon="calendar-event" 
            label="End Time: " 
            copy
        />
    </div>
    
    <div class="event-time">
        <x-view-datetime 
            :value="$event->created_at" 
            icon="plus-circle" 
            label="Created: " 
        />
    </div>
</div>
```

### Order Tracking

```blade
<div class="order-timeline">
    <div class="timeline-item">
        <x-view-datetime 
            :value="$order->created_at" 
            icon="shopping-cart" 
            label="Order Placed: " 
        />
    </div>
    
    <div class="timeline-item">
        <x-view-datetime 
            :value="$order->processed_at" 
            icon="check-circle" 
            label="Processed: " 
        />
    </div>
    
    <div class="timeline-item">
        <x-view-datetime 
            :value="$order->shipped_at" 
            icon="truck" 
            label="Shipped: " 
        />
    </div>
    
    <div class="timeline-item">
        <x-view-datetime 
            :value="$order->delivered_at" 
            icon="package" 
            label="Delivered: " 
        />
    </div>
</div>
```

### Content Management

```blade
<div class="content-meta">
    <div class="meta-item">
        <x-view-datetime 
            :value="$post->published_at" 
            icon="calendar" 
            label="Published: " 
            copy
        />
    </div>
    
    <div class="meta-item">
        <x-view-datetime 
            :value="$post->updated_at" 
            icon="edit" 
            label="Last Updated: " 
        />
    </div>
    
    @if($post->scheduled_at)
        <div class="meta-item">
            <x-view-datetime 
                :value="$post->scheduled_at" 
                icon="clock" 
                label="Scheduled for: " 
            />
        </div>
    @endif
</div>
```

### System Logs

```blade
<div class="system-logs">
    @foreach($logs as $log)
        <div class="log-entry">
            <x-view-datetime 
                :value="$log->created_at" 
                icon="file-text" 
                label="Log Entry: " 
                copy
            />
            <span class="log-message">{{ $log->message }}</span>
        </div>
    @endforeach
</div>
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-datetime 
    :value="now()" 
    class="my-custom-datetime" 
/>

<!-- Multiple classes -->
<x-view-datetime 
    :value="now()" 
    class="datetime-highlight datetime-border" 
/>
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-datetime 
    :value="now()" 
    style="background: #f8f9fa; padding: 8px; border-radius: 4px;" 
/>
```

### Responsive Design

```blade
<!-- Responsive datetime display -->
<x-view-datetime 
    :value="now()" 
    class="datetime-responsive" 
/>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_datetime()
{
    $datetime = now();
    $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => $datetime]);
    
    $view->assertSee($datetime->format('Y-m-d H:i:s'));
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_datetime_with_icon()
{
    $datetime = now();
    $view = $this->blade('<x-view-datetime :value="$datetime" icon="calendar" />', ['datetime' => $datetime]);
    
    $view->assertSee('calendar');
    $view->assertSee('me-1');
}
```

### Label Display Test

```php
/** @test */
public function it_renders_datetime_with_label()
{
    $datetime = now();
    $view = $this->blade('<x-view-datetime :value="$datetime" label="Created: " />', ['datetime' => $datetime]);
    
    $view->assertSee('Created:');
    $view->assertSee($datetime->format('Y-m-d H:i:s'));
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_datetime_with_copy_functionality()
{
    $datetime = now();
    $view = $this->blade('<x-view-datetime :value="$datetime" copy />', ['datetime' => $datetime]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard');
}
```

### Null Value Test

```php
/** @test */
public function it_does_not_render_when_value_is_null()
{
    $view = $this->blade('<x-view-datetime :value="$datetime" />', ['datetime' => null]);
    
    $view->assertDontSee('view-datetime');
}
```

### Settings Array Test

```php
/** @test */
public function it_accepts_settings_array()
{
    $datetime = now();
    $settings = ['custom' => 'setting'];
    $view = $this->blade('<x-view-datetime :value="$datetime" :settings="$settings" />', [
        'datetime' => $datetime,
        'settings' => $settings
    ]);
    
    $view->assertSee($datetime->format('Y-m-d H:i:s'));
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-datetime 
    :value="now()" 
    aria-label="Event start time"
    role="time"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-datetime 
    :value="now()" 
    aria-label="Event start time: January 15, 2024 at 2:30 PM"
    role="time"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Lightweight component with minimal DOM manipulation
- Copy functionality only loads when enabled
- Efficient datetime formatting through Laravel helpers
- No JavaScript dependencies unless copy is enabled

## Troubleshooting

### Common Issues

1. **Datetime not displaying**: Ensure the `value` prop contains a valid datetime value
2. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded when copy is enabled
3. **Icon not showing**: Check if the icon name exists in your icon set
4. **Format not as expected**: Verify the datetime value format and Laravel's datetime helper

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-datetime :value="now()" :debug="true" />
```

## Related Components

- **View Date** - For date-only display
- **View Time** - For time-only display
- **View String** - For general string display
- **View Number** - For numeric display
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic datetime display functionality
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Settings array support for future extensibility

## Contributing

When contributing to the View DateTime component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various datetime formats

## Support

For support and questions about the View DateTime component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
