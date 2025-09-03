# View Tag Component

The `View Tag` component is a sophisticated display component for rendering tag-style information with support for both simple values and complex array objects, featuring icon integration, label customization, copy-to-clipboard functionality, and intelligent color handling.

## Overview

The View Tag component provides a flexible and powerful way to display tags, labels, or categorized information. It can handle both simple string values and complex array/object data structures, automatically extracting color and value information based on configurable field mappings. The component integrates seamlessly with the icon system and provides copy functionality for enhanced user experience.

## Basic Usage

```blade
<!-- Simple tag with default styling -->
<x-view-tag value="JavaScript" />

<!-- Tag with custom color -->
<x-view-tag value="React" color="primary" />

<!-- Tag with icon and label -->
<x-view-tag value="Vue.js" icon="code" label="Framework: " />

<!-- Tag with copy functionality -->
<x-view-tag value="Copy Me" copy />

<!-- Tag with array data -->
<x-view-tag :value="['name' => 'Laravel', 'color' => 'success']" />
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The value to display in the tag (string or array/object) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the tag |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array |
| `valueField` | `string` | `'name'` | Field name to extract value from array/object |
| `colorField` | `string` | `'color'` | Field name to extract color from array/object |

## Data Handling

### Simple String Values

For simple string values, the component renders a basic tag:

```blade
<!-- Simple string -->
<x-view-tag value="PHP" />

<!-- With custom color -->
<x-view-tag value="Python" color="warning" />

<!-- With icon -->
<x-view-tag value="Ruby" icon="gem" />
```

### Array/Object Values

For array or object values, the component automatically extracts information:

```blade
<!-- Array with name and color -->
<x-view-tag :value="['name' => 'Laravel', 'color' => 'success']" />

<!-- Object with custom field mappings -->
<x-view-tag 
    :value="['title' => 'Vue.js', 'theme' => 'info']" 
    value-field="title" 
    color-field="theme" 
/>

<!-- Complex object -->
<x-view-tag :value="$technology" />
```

## Color Variants

The component supports all Bootstrap color classes:

```blade
<!-- Primary (default) -->
<x-view-tag value="Primary" color="primary" />

<!-- Success -->
<x-view-tag value="Success" color="success" />

<!-- Warning -->
<x-view-tag value="Warning" color="warning" />

<!-- Danger -->
<x-view-tag value="Danger" color="danger" />

<!-- Info -->
<x-view-tag value="Info" color="info" />

<!-- Secondary -->
<x-view-tag value="Secondary" color="secondary" />

<!-- Light -->
<x-view-tag value="Light" color="light" />

<!-- Dark -->
<x-view-tag value="Dark" color="dark" />
```

## Icon Integration

Add icons to enhance the visual appearance:

```blade
<!-- With icon -->
<x-view-tag value="Database" icon="database" />

<!-- Different icon -->
<x-view-tag value="API" icon="code" color="primary" />

<!-- Icon with custom color -->
<x-view-tag value="Security" icon="shield" color="danger" />
```

## Label Customization

Customize the label text displayed before the tag:

```blade
<!-- With custom label -->
<x-view-tag value="123" label="Issues: " />

<!-- Label with icon -->
<x-view-tag value="5" icon="bug" label="Bugs Found: " color="danger" />

<!-- Label only (no value display) -->
<x-view-tag value="hidden" label="Category: " color="info" />
```

## Copy Functionality

Enable copy-to-clipboard functionality:

```blade
<!-- Copy the value -->
<x-view-tag value="Copy this text" copy />

<!-- Copy with custom styling -->
<x-view-tag value="Important Info" copy color="warning" />

<!-- Copy with icon and label -->
<x-view-tag value="API Key" icon="key" label="Key: " copy color="dark" />
```

## Field Mapping

Customize how the component extracts data from arrays/objects:

```blade
<!-- Default field mapping (name, color) -->
<x-view-tag :value="['name' => 'Laravel', 'color' => 'success']" />

<!-- Custom field mapping -->
<x-view-tag 
    :value="['title' => 'Vue.js', 'theme' => 'info']" 
    value-field="title" 
    color-field="theme" 
/>

<!-- Different field names -->
<x-view-tag 
    :value="['label' => 'React', 'style' => 'primary']" 
    value-field="label" 
    color-field="style" 
/>
```

## Advanced Usage

### With Settings Array

```blade
@php
$settings = [
    'color' => 'warning',
    'validate' => true,
    'theme' => 'dark'
];
@endphp

<x-view-tag value="Custom" :settings="$settings" />
```

### Dynamic Color Based on Value

```blade
@php
$status = 'active';
$color = $status === 'active' ? 'success' : 'secondary';
@endphp

<x-view-tag value="{{ $status }}" color="{{ $color }}" />
```

### Conditional Rendering

```blade
@if($user->hasRole('admin'))
    <x-view-tag value="Admin" icon="shield" color="danger" />
@else
    <x-view-tag value="User" icon="user" color="primary" />
@endif
```

### Complex Data Structures

```blade
@php
$technologies = [
    ['name' => 'Laravel', 'color' => 'success', 'version' => '10.x'],
    ['name' => 'Vue.js', 'color' => 'info', 'version' => '3.x'],
    ['name' => 'React', 'color' => 'primary', 'version' => '18.x']
];
@endphp

@foreach($technologies as $tech)
    <x-view-tag 
        :value="$tech" 
        :label="$tech['version'] . ' '"
        copy 
    />
@endforeach
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-tag value="Custom" class="my-custom-tag" />

<!-- Multiple classes -->
<x-view-tag value="Styled" class="tag-lg tag-rounded" />
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-tag value="Styled" style="font-size: 16px; padding: 8px 16px;" />
```

### Responsive Design

```blade
<!-- Responsive tag -->
<x-view-tag value="Responsive" class="tag-responsive" />
```

## Integration Examples

### Technology Stack Display

```blade
<div class="tech-stack">
    @foreach($technologies as $tech)
        <x-view-tag 
            :value="$tech" 
            icon="code" 
            copy 
        />
    @endforeach
</div>
```

### Category Tags

```blade
<div class="categories">
    @foreach($categories as $category)
        <x-view-tag 
            :value="$category" 
            :label="'Category: '"
            copy 
        />
    @endforeach
</div>
```

### Status Indicators

```blade
<div class="status-tags">
    <x-view-tag value="Online" icon="wifi" color="success" />
    <x-view-tag value="Maintenance" icon="tools" color="warning" />
    <x-view-tag value="Error" icon="alert-triangle" color="danger" />
</div>
```

### User Roles

```blade
<div class="user-roles">
    @foreach($user->roles as $role)
        <x-view-tag 
            :value="$role" 
            icon="user-check" 
            copy 
        />
    @endforeach
</div>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_tag()
{
    $view = $this->blade('<x-view-tag value="Test" />');
    
    $view->assertSee('Test');
    $view->assertSee('badge');
    $view->assertSee('text-primary');
}
```

### Array Value Test

```php
/** @test */
public function it_renders_tag_with_array_value()
{
    $view = $this->blade('<x-view-tag :value="[\'name\' => \'Laravel\', \'color\' => \'success\']" />');
    
    $view->assertSee('Laravel');
    $view->assertSee('text-success');
}
```

### Custom Field Mapping Test

```php
/** @test */
public function it_renders_tag_with_custom_field_mapping()
{
    $view = $this->blade('<x-view-tag :value="[\'title\' => \'Vue.js\', \'theme\' => \'info\']" value-field="title" color-field="theme" />');
    
    $view->assertSee('Vue.js');
    $view->assertSee('text-info');
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_tag_with_icon()
{
    $view = $this->blade('<x-view-tag value="User" icon="user" />');
    
    $view->assertSee('user');
    $view->assertSee('me-1');
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_tag_with_copy_functionality()
{
    $view = $this->blade('<x-view-tag value="Copy Me" copy />');
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard="Copy Me"');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-tag 
    value="Status" 
    aria-label="Technology tag indicator"
    role="status"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-tag 
    value="Laravel" 
    aria-label="Laravel framework tag"
    role="tag"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Efficient array/object property access
- Lightweight component with minimal DOM manipulation
- Copy functionality only loads when enabled
- Optimized icon rendering through the icon system

## Troubleshooting

### Common Issues

1. **Tag not displaying**: Ensure the `value` prop is not null or empty
2. **Color not applying**: Verify the color value matches Bootstrap color classes
3. **Array data not working**: Check field mapping configuration
4. **Icon not showing**: Check if the icon name exists in your icon set
5. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-tag value="Debug" :debug="true" />
```

## Related Components

- **View Badge** - For simpler badge-style displays
- **View Tags** - For multiple tag collections
- **View Status** - For status indicators
- **Badge** - Base badge component
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic tag functionality
- Array/object value support
- Field mapping configuration
- Color variants support
- Icon integration
- Copy functionality

## Contributing

When contributing to the View Tag component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test across different browsers and devices

## Support

For support and questions about the View Tag component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
