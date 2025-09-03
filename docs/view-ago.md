# View Ago Component

The `View Ago` component is a sophisticated relative time display component that provides human-readable time differences (e.g., "2 hours ago", "3 days ago") with optional icons, labels, copy-to-clipboard functionality, and customizable settings. This component is perfect for displaying when events occurred, when content was last updated, or any other relative time information.

## Overview

The View Ago component converts absolute timestamps into human-readable relative time expressions using Laravel's `ago()` helper function. It's designed to provide a user-friendly way to display time differences, making it easier for users to understand when events occurred without having to calculate time differences manually. The component supports various data types and integrates seamlessly with the icon system and copy functionality.

## Basic Usage

```blade
<!-- Basic relative time display -->
<x-view-ago :value="now()" />

<!-- With icon -->
<x-view-ago :value="now()" icon="clock" />

<!-- With custom label -->
<x-view-ago :value="now()" label="Last updated: " />

<!-- With copy functionality -->
<x-view-ago :value="now()" copy />

<!-- With all features -->
<x-view-ago 
    :value="now()" 
    icon="clock" 
    label="Last updated: " 
    copy 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The timestamp value to convert to relative time |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the time |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| `class` | `string` | '' | CSS classes | `'text-muted'`, `'fw-bold'` |
| `id` | `string` | auto-generated | Element ID | `'last-updated'` |
| `style` | `string` | '' | Inline CSS styles | `'color: blue;'` |
| `data-*` | `string` | null | Custom data attributes | `data-test="ago-component"` |

## Data Types Supported

The `value` prop accepts various data types that Laravel's `ago()` helper can process:

### Carbon Instances
```blade
@php
    use Carbon\Carbon;
    $timestamp = Carbon::parse('2024-01-15 14:30:00');
@endphp

<x-view-ago :value="$timestamp" />
<!-- Output: "2 hours ago" -->
```

### DateTime Objects
```blade
@php
    $timestamp = new DateTime('2024-01-15 14:30:00');
@endphp

<x-view-ago :value="$timestamp" />
<!-- Output: "2 hours ago" -->
```

### String Timestamps
```blade
<!-- ISO 8601 format -->
<x-view-ago :value="'2024-01-15T14:30:00Z'" />

<!-- Standard format -->
<x-view-ago :value="'2024-01-15 14:30:00'" />

<!-- Unix timestamp -->
<x-view-ago :value="'1705324200'" />
```

### Unix Timestamps
```blade
<!-- Integer timestamp -->
<x-view-ago :value="1705324200" />

<!-- String timestamp -->
<x-view-ago :value="'1705324200'" />
```

## Display Examples

### Recent Times
```blade
<!-- Just now -->
<x-view-ago :value="now()" />
<!-- Output: "just now" -->

<!-- Minutes ago -->
<x-view-ago :value="now()->subMinutes(5)" />
<!-- Output: "5 minutes ago" -->

<!-- Hours ago -->
<x-view-ago :value="now()->subHours(2)" />
<!-- Output: "2 hours ago" -->
```

### Past Times
```blade
<!-- Days ago -->
<x-view-ago :value="now()->subDays(3)" />
<!-- Output: "3 days ago" -->

<!-- Weeks ago -->
<x-view-ago :value="now()->subWeeks(1)" />
<!-- Output: "1 week ago" -->

<!-- Months ago -->
<x-view-ago :value="now()->subMonths(2)" />
<!-- Output: "2 months ago" -->

<!-- Years ago -->
<x-view-ago :value="now()->subYears(1)" />
<!-- Output: "1 year ago" -->
```

## Advanced Usage

### Dynamic Content
```blade
@php
    $agoConfig = [
        'icon' => $isRecent ? 'clock' : 'history',
        'label' => $isRecent ? 'Recently updated: ' : 'Last updated: '
    ];
@endphp

<x-view-ago 
    :value="$lastUpdated" 
    :icon="$agoConfig['icon']" 
    :label="$agoConfig['label']" 
/>
```

### Conditional Display
```blade
@if($lastActivity)
    <x-view-ago 
        :value="$lastActivity" 
        icon="activity" 
        label="Last activity: " 
    />
@else
    <span class="text-muted">No recent activity</span>
@endif
```

### With Settings Override
```blade
@php
    $settings = [
        'format' => 'short', // if supported by ago() helper
        'locale' => 'en'
    ];
@endphp

<x-view-ago 
    :value="$timestamp" 
    :settings="$settings" 
/>
```

## Integration Examples

### User Activity Display
```blade
<div class="user-activity">
    <h4>Recent Activity</h4>
    @foreach($activities as $activity)
        <div class="activity-item">
            <x-view-ago 
                :value="$activity->created_at" 
                icon="activity" 
                label="Activity: " 
            />
            <span class="activity-description">{{ $activity->description }}</span>
        </div>
    @endforeach
</div>
```

### Content Last Updated
```blade
<div class="content-meta">
    <x-view-ago 
        :value="$content->updated_at" 
        icon="edit" 
        label="Last updated: " 
        copy
    />
    @if($content->created_at != $content->updated_at)
        <small class="text-muted">
            (Originally created 
            <x-view-ago :value="$content->created_at" />)
        </small>
    @endif
</div>
```

### Comment Timestamps
```blade
<div class="comments">
    @foreach($comments as $comment)
        <div class="comment">
            <div class="comment-header">
                <strong>{{ $comment->user->name }}</strong>
                <x-view-ago 
                    :value="$comment->created_at" 
                    icon="clock" 
                    copy
                />
            </div>
            <div class="comment-body">
                {{ $comment->content }}
            </div>
        </div>
    @endforeach
</div>
```

### File Upload Timestamps
```blade
<div class="file-list">
    @foreach($files as $file)
        <div class="file-item">
            <div class="file-info">
                <i class="fas fa-file"></i>
                <span class="file-name">{{ $file->name }}</span>
            </div>
            <div class="file-meta">
                <x-view-ago 
                    :value="$file->uploaded_at" 
                    icon="upload" 
                    label="Uploaded " 
                />
                <span class="file-size">{{ $file->size_formatted }}</span>
            </div>
        </div>
    @endforeach
</div>
```

### Notification Timestamps
```blade
<div class="notifications">
    @foreach($notifications as $notification)
        <div class="notification-item">
            <div class="notification-icon">
                <x-icon :name="$notification->icon" />
            </div>
            <div class="notification-content">
                <p>{{ $notification->message }}</p>
                <x-view-ago 
                    :value="$notification->created_at" 
                    icon="clock" 
                    copy
                />
            </div>
        </div>
    @endforeach
</div>
```

### Order Status Updates
```blade
<div class="order-timeline">
    <h4>Order Timeline</h4>
    @foreach($order->statusUpdates as $update)
        <div class="timeline-item">
            <div class="timeline-icon">
                <x-icon :name="$update->status_icon" />
            </div>
            <div class="timeline-content">
                <strong>{{ $update->status }}</strong>
                <x-view-ago 
                    :value="$update->created_at" 
                    icon="clock" 
                    label="Updated " 
                />
                <p>{{ $update->description }}</p>
            </div>
        </div>
    @endforeach
</div>
```

### System Logs
```blade
<div class="system-logs">
    <h4>Recent System Events</h4>
    @foreach($logs as $log)
        <div class="log-entry">
            <div class="log-level log-level-{{ $log->level }}">
                {{ strtoupper($log->level) }}
            </div>
            <div class="log-message">
                {{ $log->message }}
            </div>
            <div class="log-timestamp">
                <x-view-ago 
                    :value="$log->created_at" 
                    icon="clock" 
                    copy
                />
            </div>
        </div>
    @endforeach
</div>
```

## Styling and Customization

### Custom CSS Classes
```blade
<!-- Add custom classes -->
<x-view-ago 
    :value="$timestamp" 
    class="my-custom-ago" 
/>

<!-- Multiple classes -->
<x-view-ago 
    :value="$timestamp" 
    class="ago-highlight ago-border" 
/>
```

### Inline Styles
```blade
<!-- Custom styling -->
<x-view-ago 
    :value="$timestamp" 
    style="color: #6c757d; font-size: 0.875rem;" 
/>
```

### Responsive Design
```blade
<!-- Responsive time display -->
<x-view-ago 
    :value="$timestamp" 
    class="ago-responsive" 
/>
```

## Testing

### Basic Rendering Test
```php
/** @test */
public function it_renders_basic_ago_time()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('ago');
    // Note: The actual output depends on when the test runs
}
```

### Icon Integration Test
```php
/** @test */
public function it_renders_ago_time_with_icon()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" icon="clock" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('clock');
    $view->assertSee('me-1');
}
```

### Label Display Test
```php
/** @test */
public function it_renders_ago_time_with_label()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" label="Updated: " />', ['timestamp' => $timestamp]);
    
    $view->assertSee('Updated:');
}
```

### Copy Functionality Test
```php
/** @test */
public function it_renders_ago_time_with_copy_functionality()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" copy />', ['timestamp' => $timestamp]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard');
    $view->assertSee('cursor-pointer');
}
```

### Custom Classes Test
```php
/** @test */
public function it_renders_ago_time_with_custom_classes()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" class="custom-class" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('custom-class');
}
```

### Custom ID Test
```php
/** @test */
public function it_renders_ago_time_with_custom_id()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" id="ago-1" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('id="ago-1"');
}
```

### Data Attributes Test
```php
/** @test */
public function it_renders_ago_time_with_data_attributes()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" data-test="ago-component" data-type="display-ago" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('data-test="ago-component"');
    $view->assertSee('data-type="display-ago"');
}
```

### ARIA Attributes Test
```php
/** @test */
public function it_renders_ago_time_with_aria_attributes()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" aria-label="Time ago display" aria-describedby="ago-description" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('aria-label="Time ago display"');
    $view->assertSee('aria-describedby="ago-description"');
}
```

### Role Attribute Test
```php
/** @test */
public function it_renders_ago_time_with_role_attribute()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" role="text" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('role="text"');
}
```

### Inline Styles Test
```php
/** @test */
public function it_renders_ago_time_with_inline_styles()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" style="color: #6c757d;" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('style="color: #6c757d;"');
}
```

### Tabindex Test
```php
/** @test */
public function it_renders_ago_time_with_tabindex()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" tabindex="0" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('tabindex="0"');
}
```

### All Features Test
```php
/** @test */
public function it_renders_ago_time_with_all_features()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" icon="clock" label="Updated: " copy class="custom-class" id="ago-1" />', ['timestamp' => $timestamp]);
    
    $view->assertSee('clock');
    $view->assertSee('Updated:');
    $view->assertSee('copy');
    $view->assertSee('custom-class');
    $view->assertSee('id="ago-1"');
}
```

### Different Data Types Test
```php
/** @test */
public function it_renders_ago_time_with_different_data_types()
{
    // Carbon instance
    $carbon = \Carbon\Carbon::parse('2024-01-15 14:30:00');
    $view1 = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $carbon]);
    $view1->assertSee('ago');
    
    // String timestamp
    $string = '2024-01-15 14:30:00';
    $view2 = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $string]);
    $view2->assertSee('ago');
    
    // Unix timestamp
    $unix = 1705324200;
    $view3 = $this->blade('<x-view-ago :value="$timestamp" />', ['timestamp' => $unix]);
    $view3->assertSee('ago');
}
```

### HTML Label Test
```php
/** @test */
public function it_renders_ago_time_with_html_label()
{
    $timestamp = '2024-01-15 14:30:00';
    $view = $this->blade('<x-view-ago :value="$timestamp" label="<strong>Updated:</strong> " />', ['timestamp' => $timestamp]);
    
    $view->assertSee('<strong>Updated:</strong>');
}
```

### Null Value Test
```php
/** @test */
public function it_renders_nothing_with_null_value()
{
    $view = $this->blade('<x-view-ago :value="null" />');
    
    $view->assertDontSee('ago');
}
```

### Empty String Test
```php
/** @test */
public function it_renders_nothing_with_empty_string()
{
    $view = $this->blade('<x-view-ago :value="\'\'" />');
    
    $view->assertDontSee('ago');
}
```

## Accessibility

### ARIA Labels
```blade
<!-- With ARIA label -->
<x-view-ago 
    :value="$timestamp" 
    aria-label="Time since last update"
    role="text"
/>
```

### Screen Reader Support
```blade
<!-- Screen reader friendly -->
<x-view-ago 
    :value="$timestamp" 
    aria-label="Content was last updated 2 hours ago"
    role="text"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Lightweight component with minimal DOM manipulation
- Uses Laravel's optimized `ago()` helper function
- Copy functionality only loads when enabled
- Efficient icon rendering through the icon system

## Troubleshooting

### Common Issues

1. **Time not displaying**: Ensure the `value` prop contains a valid timestamp
2. **Incorrect time format**: Verify the timestamp format is supported by Laravel's `ago()` helper
3. **Icon not showing**: Check if the icon name exists in your icon set
4. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded
5. **Timezone issues**: Check if your application's timezone is properly configured

### Debug Mode
```blade
<!-- Enable debug mode -->
<x-view-ago :value="$timestamp" :debug="true" />
```

## Related Components

- **View DateTime** - For absolute datetime display
- **View Date** - For date-only display
- **View Time** - For time-only display
- **View Status** - For status information display
- **View Badge** - For status indicators
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic relative time display functionality
- Support for multiple data types (Carbon, DateTime, string, unix)
- Icon integration support
- Label display support with HTML formatting
- Copy functionality
- Settings array support
- Responsive design

## Contributing

When contributing to the View Ago component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various timestamp formats and data types

## Support

For support and questions about the View Ago component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
