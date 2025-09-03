# View Time Component

The `View Time` component is a specialized display component for rendering time values with optional icon integration, label support, and copy-to-clipboard functionality.

## Overview

The View Time component provides a clean way to display time information with consistent formatting. It automatically formats time values using Laravel's `datetime()` helper function and supports optional icons, labels, and copy functionality for enhanced user experience. This component is ideal for displaying time-specific information like business hours, meeting times, or any time-related data.

## Basic Usage

```blade
<!-- Basic time display -->
<x-view-time :value="'14:30:00'" />

<!-- Time with icon -->
<x-view-time :value="'14:30:00'" icon="clock" />

<!-- Time with custom label -->
<x-view-time :value="'14:30:00'" label="Start Time: " />

<!-- Time with copy functionality -->
<x-view-time :value="'14:30:00'" copy />

<!-- Complete configuration -->
<x-view-time 
    :value="'14:30:00'" 
    icon="clock" 
    label="Meeting Time: " 
    copy 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The time value to display (Carbon instance, string, or timestamp) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the time |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array (reserved for future use) |

## Data Types Supported

The component accepts various time formats:

```php
// String times
$time = '14:30:00';
<x-view-time :value="$time" />

// Carbon instances
$time = Carbon::parse('14:30:00');
<x-view-time :value="$time" />

// Timestamps
$time = 1705329000; // 2024-01-15 14:30:00
<x-view-time :value="$time" />

// Database time fields
$time = $meeting->start_time;
<x-view-time :value="$time" />
```

## Display Features

### Icon Integration

```blade
<!-- Clock icon for time -->
<x-view-time :value="'14:30:00'" icon="clock" />

<!-- Calendar icon for scheduled times -->
<x-view-time :value="'14:30:00'" icon="calendar" />

<!-- Custom icon -->
<x-view-time :value="'14:30:00'" icon="alarm" />
```

### Label Support

```blade
<!-- Simple label -->
<x-view-time :value="'14:30:00'" label="Start: " />

<!-- HTML label -->
<x-view-time :value="'14:30:00'" label="<strong>End:</strong> " />

<!-- No label (default) -->
<x-view-time :value="'14:30:00'" />
```

### Copy Functionality

```blade
<!-- Enable copy to clipboard -->
<x-view-time :value="'14:30:00'" copy />

<!-- Copy with icon and label -->
<x-view-time 
    :value="'14:30:00'" 
    icon="clock" 
    label="Meeting Time: " 
    copy 
/>
```

## Advanced Usage

### Conditional Display

```blade
@if($meeting->start_time)
    <x-view-time 
        :value="$meeting->start_time" 
        icon="clock" 
        label="Start Time: " 
    />
@else
    <span class="text-muted">Time TBD</span>
@endif
```

### Dynamic Configuration

```blade
@php
$timeConfig = [
    'icon' => $isBusinessHours ? 'clock' : 'moon',
    'label' => $isBusinessHours ? 'Business Hours: ' : 'After Hours: ',
    'copy' => $canCopy
];
@endphp

<x-view-time 
    :value="$time" 
    :settings="$timeConfig" 
/>
```

### Formatted Display

```blade
<!-- Display with custom formatting -->
@php
$formattedTime = $meeting->start_time->format('g:i A');
@endphp

<x-view-time 
    :value="$formattedTime" 
    icon="clock" 
    label="Meeting: " 
/>
```

## Integration Examples

### Business Hours Display

```blade
<div class="business-hours">
    <div class="hours-section">
        <x-view-time 
            :value="'09:00:00'" 
            icon="sun" 
            label="Open: " 
        />
    </div>
    
    <div class="hours-section">
        <x-view-time 
            :value="'17:00:00'" 
            icon="moon" 
            label="Close: " 
        />
    </div>
    
    <div class="hours-section">
        <x-view-time 
            :value="'12:00:00'" 
            icon="coffee" 
            label="Lunch Break: " 
        />
    </div>
</div>
```

### Meeting Schedule

```blade
<div class="meeting-schedule">
    <div class="meeting-time">
        <x-view-time 
            :value="$meeting->start_time" 
            icon="clock" 
            label="Start: " 
            copy
        />
    </div>
    
    <div class="meeting-time">
        <x-view-time 
            :value="$meeting->end_time" 
            icon="clock" 
            label="End: " 
            copy
        />
    </div>
    
    <div class="meeting-time">
        <x-view-time 
            :value="$meeting->created_at" 
            icon="plus-circle" 
            label="Scheduled: " 
        />
    </div>
</div>
```

### Shift Management

```blade
<div class="shift-schedule">
    @foreach($shifts as $shift)
        <div class="shift-item">
            <x-view-time 
                :value="$shift->start_time" 
                icon="clock" 
                label="Shift Start: " 
            />
            <span class="shift-duration">{{ $shift->duration }} hours</span>
        </div>
    @endforeach
</div>
```

### Restaurant Hours

```blade
<div class="restaurant-hours">
    <div class="day-hours">
        <strong>Monday - Friday:</strong>
        <x-view-time 
            :value="'11:00:00'" 
            icon="clock" 
            label="Open: " 
        />
        <x-view-time 
            :value="'22:00:00'" 
            icon="clock" 
            label="Close: " 
        />
    </div>
    
    <div class="day-hours">
        <strong>Weekend:</strong>
        <x-view-time 
            :value="'10:00:00'" 
            icon="clock" 
            label="Open: " 
        />
        <x-view-time 
            :value="'23:00:00'" 
            icon="clock" 
            label="Close: " 
        />
    </div>
</div>
```

### Event Timeline

```blade
<div class="event-timeline">
    <div class="timeline-item">
        <x-view-time 
            :value="'09:00:00'" 
            icon="coffee" 
            label="Registration & Coffee: " 
        />
    </div>
    
    <div class="timeline-item">
        <x-view-time 
            :value="'09:30:00'" 
            icon="presentation" 
            label="Opening Remarks: " 
        />
    </div>
    
    <div class="timeline-item">
        <x-view-time 
            :value="'10:00:00'" 
            icon="users" 
            label="Main Session: " 
        />
    </div>
    
    <div class="timeline-item">
        <x-view-time 
            :value="'12:00:00'" 
            icon="utensils" 
            label="Lunch Break: " 
        />
    </div>
</div>
```

### System Maintenance Windows

```blade
<div class="maintenance-windows">
    <div class="maintenance-item">
        <x-view-time 
            :value="'02:00:00'" 
            icon="tools" 
            label="Maintenance Start: " 
            copy
        />
    </div>
    
    <div class="maintenance-item">
        <x-view-time 
            :value="'04:00:00'" 
            icon="check-circle" 
            label="Maintenance End: " 
            copy
        />
    </div>
    
    <div class="maintenance-item">
        <x-view-time 
            :value="'06:00:00'" 
            icon="users" 
            label="Service Resume: " 
        />
    </div>
</div>
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-time 
    :value="'14:30:00'" 
    class="my-custom-time" 
/>

<!-- Multiple classes -->
<x-view-time 
    :value="'14:30:00'" 
    class="time-highlight time-border" 
/>
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-time 
    :value="'14:30:00'" 
    style="background: #f8f9fa; padding: 8px; border-radius: 4px;" 
/>
```

### Responsive Design

```blade
<!-- Responsive time display -->
<x-view-time 
    :value="'14:30:00'" 
    class="time-responsive" 
/>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_time()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
    
    $view->assertSee('14:30:00');
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_time_with_icon()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" icon="clock" />', ['time' => $time]);
    
    $view->assertSee('clock');
    $view->assertSee('me-1');
}
```

### Label Display Test

```php
/** @test */
public function it_renders_time_with_label()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" label="Start: " />', ['time' => $time]);
    
    $view->assertSee('Start:');
    $view->assertSee('14:30:00');
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_time_with_copy_functionality()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" copy />', ['time' => $time]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard');
}
```

### Null Value Test

```php
/** @test */
public function it_does_not_render_when_value_is_null()
{
    $view = $this->blade('<x-view-time :value="$time" />', ['time' => null]);
    
    $view->assertDontSee('view-time');
}
```

### Settings Array Test

```php
/** @test */
public function it_accepts_settings_array()
{
    $time = '14:30:00';
    $settings = ['custom' => 'setting'];
    $view = $this->blade('<x-view-time :value="$time" :settings="$settings" />', [
        'time' => $time,
        'settings' => $settings
    ]);
    
    $view->assertSee('14:30:00');
}
```

### Carbon Instance Test

```php
/** @test */
public function it_renders_carbon_instance()
{
    $time = Carbon::parse('14:30:00');
    $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
    
    $view->assertSee('14:30:00');
}
```

### String Time Test

```php
/** @test */
public function it_renders_string_time()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
    
    $view->assertSee('14:30:00');
}
```

### Timestamp Test

```php
/** @test */
public function it_renders_timestamp()
{
    $timestamp = 1705329000; // 2024-01-15 14:30:00
    $view = $this->blade('<x-view-time :value="$timestamp" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('14:30:00');
}
```

### HTML Label Test

```php
/** @test */
public function it_renders_with_html_label()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" label="<strong>End:</strong> " />', ['time' => $time]);
    
    $view->assertSee('<strong>End:</strong>');
}
```

### Custom Attributes Test

```php
/** @test */
public function it_renders_with_custom_attributes()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" class="custom-class" id="time-1" />', ['time' => $time]);
    
    $view->assertSee('custom-class');
    $view->assertSee('id="time-1"');
}
```

### ARIA Attributes Test

```php
/** @test */
public function it_renders_with_aria_attributes()
{
    $time = '14:30:00';
    $view = $this->blade('<x-view-time :value="$time" aria-label="Meeting time" role="time" />', ['time' => $time]);
    
    $view->assertSee('aria-label="Meeting time"');
    $view->assertSee('role="time"');
}
```

### Empty String Value Test

```php
/** @test */
public function it_renders_empty_string_value()
{
    $time = '';
    $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
    
    $view->assertSee('view-time');
}
```

### Zero Value Test

```php
/** @test */
public function it_renders_zero_value()
{
    $time = 0;
    $view = $this->blade('<x-view-time :value="$time" />', ['time' => $time]);
    
    $view->assertSee('view-time');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-time 
    :value="'14:30:00'" 
    aria-label="Meeting start time"
    role="time"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-time 
    :value="'14:30:00'" 
    aria-label="Meeting start time: 2:30 PM"
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
- Efficient time formatting through Laravel helpers
- No JavaScript dependencies unless copy is enabled

## Troubleshooting

### Common Issues

1. **Time not displaying**: Ensure the `value` prop contains a valid time value
2. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded when copy is enabled
3. **Icon not showing**: Check if the icon name exists in your icon set
4. **Format not as expected**: Verify the time value format and Laravel's datetime helper

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-time :value="'14:30:00'" :debug="true" />
```

## Related Components

- **View Date** - For date-only display
- **View DateTime** - For date and time display
- **View String** - For general string display
- **View Number** - For numeric display
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic time display functionality
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Settings array support for future extensibility

## Contributing

When contributing to the View Time component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various time formats

## Support

For support and questions about the View Time component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
