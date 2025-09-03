# View Select Component

The `View Select` component is a sophisticated display component for rendering select option values with enhanced formatting, color support, icon integration, label display, and copy-to-clipboard functionality. This component is designed to handle both simple string values and complex array-based select options with color coding and additional metadata.

## Overview

The View Select component provides a comprehensive way to display select option values in a user-friendly format. It can handle both simple string values and complex array-based select options that include color coding, names, and other metadata. The component integrates seamlessly with the icon system and provides copy functionality for enhanced user experience. It's particularly useful for displaying form selections, status values, category selections, and any other select-based data.

## Basic Usage

```blade
<!-- Basic select value display -->
<x-view-select :value="'Active'" />

<!-- With icon -->
<x-view-select :value="'Active'" icon="check-circle" />

<!-- With custom label -->
<x-view-select :value="'Active'" label="Status: " />

<!-- With copy functionality -->
<x-view-select :value="'Active'" copy />

<!-- With all features -->
<x-view-select 
    :value="'Active'" 
    icon="check-circle" 
    label="Status: " 
    copy 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The select value to display (string or array) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the value |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| `class` | `string` | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| `id` | `string` | auto-generated | Element ID | `'status-display'` |
| `style` | `string` | '' | Inline CSS styles | `'color: blue;'` |
| `data-*` | `string` | null | Custom data attributes | `data-test="select-component"` |

## Data Types Supported

The `value` prop accepts various data types:

### Simple String Values
```blade
<!-- Basic string value -->
<x-view-select :value="'Active'" />

<!-- String with special characters -->
<x-view-select :value="'In Progress...'" />

<!-- Empty string -->
<x-view-select :value="''" />
```

### Array-Based Select Options
```blade
<!-- Array with name and color -->
<x-view-select :value="['name' => 'Active', 'color' => 'success']" />

<!-- Array with name only -->
<x-view-select :value="['name' => 'Pending']" />

<!-- Array with additional metadata -->
<x-view-select :value="['name' => 'Completed', 'color' => 'success', 'count' => 5]" />
```

### ArrayAccess Objects
```blade
<!-- Collection items -->
<x-view-select :value="$statusOption" />

<!-- Model instances -->
<x-view-select :value="$category" />
```

## Display Examples

### Status Values
```blade
<!-- Active status -->
<x-view-select :value="['name' => 'Active', 'color' => 'success']" icon="check-circle" />

<!-- Pending status -->
<x-view-select :value="['name' => 'Pending', 'color' => 'warning']" icon="clock" />

<!-- Inactive status -->
<x-view-select :value="['name' => 'Inactive', 'color' => 'danger']" icon="x-circle" />
```

### Category Selections
```blade
<!-- Primary category -->
<x-view-select :value="['name' => 'Technology', 'color' => 'primary']" icon="folder" />

<!-- Secondary category -->
<x-view-select :value="['name' => 'Business', 'color' => 'secondary']" icon="briefcase" />

<!-- Success category -->
<x-view-select :value="['name' => 'Health', 'color' => 'success']" icon="heart" />
```

### Priority Levels
```blade
<!-- High priority -->
<x-view-select :value="['name' => 'High', 'color' => 'danger']" icon="alert-triangle" />

<!-- Medium priority -->
<x-view-select :value="['name' => 'Medium', 'color' => 'warning']" icon="alert-circle" />

<!-- Low priority -->
<x-view-select :value="['name' => 'Low', 'color' => 'info']" icon="info" />
```

## Advanced Usage

### Dynamic Content
```blade
@php
    $selectConfig = [
        'icon' => $status->isActive() ? 'check-circle' : 'x-circle',
        'label' => $status->isActive() ? 'Current Status: ' : 'Previous Status: '
    ];
@endphp

<x-view-select 
    :value="$status->toArray()" 
    :icon="$selectConfig['icon']" 
    :label="$selectConfig['label']" 
/>
```

### Conditional Display
```blade
@if($selectedOption)
    <x-view-select 
        :value="$selectedOption" 
        icon="check" 
        label="Selected: " 
    />
@else
    <span class="text-muted">No option selected</span>
@endif
```

### With Settings Override
```blade
@php
    $settings = [
        'format' => 'short',
        'locale' => 'en'
    ];
@endphp

<x-view-select 
    :value="$option" 
    :settings="$settings" 
/>
```

## Integration Examples

### Form Selection Display
```blade
<div class="form-selection">
    <h4>Selected Options</h4>
    
    <!-- Category selection -->
    @if($selectedCategory)
        <div class="selection-item">
            <x-view-select 
                :value="$selectedCategory" 
                icon="folder" 
                label="Category: " 
                copy
            />
        </div>
    @endif
    
    <!-- Status selection -->
    @if($selectedStatus)
        <div class="selection-item">
            <x-view-select 
                :value="$selectedStatus" 
                icon="check-circle" 
                label="Status: " 
                copy
            />
        </div>
    @endif
    
    <!-- Priority selection -->
    @if($selectedPriority)
        <div class="selection-item">
            <x-view-select 
                :value="$selectedPriority" 
                icon="alert-triangle" 
                label="Priority: " 
                copy
            />
        </div>
    @endif
</div>
```

### Dashboard Status Display
```blade
<div class="dashboard-status">
    <h4>System Status</h4>
    
    <!-- Database status -->
    <div class="status-item">
        <x-view-select 
            :value="['name' => 'Online', 'color' => 'success']" 
            icon="database" 
            label="Database: " 
        />
    </div>
    
    <!-- Cache status -->
    <div class="status-item">
        <x-view-select 
            :value="['name' => 'Running', 'color' => 'info']" 
            icon="zap" 
            label="Cache: " 
        />
    </div>
    
    <!-- Queue status -->
    <div class="status-item">
        <x-view-select 
            :value="['name' => 'Idle', 'color' => 'warning']" 
            icon="clock" 
            label="Queue: " 
        />
    </div>
</div>
```

### User Role Display
```blade
<div class="user-roles">
    <h4>User Roles</h4>
    
    @foreach($user->roles as $role)
        <div class="role-item">
            <x-view-select 
                :value="['name' => $role->name, 'color' => $role->color]" 
                icon="user" 
                label="Role: " 
                copy
            />
        </div>
    @endforeach
</div>
```

### Product Category Display
```blade
<div class="product-categories">
    <h4>Product Categories</h4>
    
    @foreach($product->categories as $category)
        <div class="category-item">
            <x-view-select 
                :value="['name' => $category->name, 'color' => $category->color]" 
                icon="tag" 
                label="Category: " 
                copy
            />
        </div>
    @endforeach
</div>
```

### Order Status Timeline
```blade
<div class="order-timeline">
    <h4>Order Status History</h4>
    
    @foreach($order->statusHistory as $status)
        <div class="timeline-item">
            <div class="timeline-icon">
                <x-icon :name="$status->icon" />
            </div>
            <div class="timeline-content">
                <x-view-select 
                    :value="['name' => $status->name, 'color' => $status->color]" 
                    icon="clock" 
                    label="Status: " 
                />
                <small class="text-muted">
                    {{ $status->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    @endforeach
</div>
```

### Notification Preferences
```blade
<div class="notification-preferences">
    <h4>Notification Settings</h4>
    
    <!-- Email notifications -->
    <div class="preference-item">
        <x-view-select 
            :value="['name' => 'Enabled', 'color' => 'success']" 
            icon="mail" 
            label="Email: " 
        />
    </div>
    
    <!-- SMS notifications -->
    <div class="preference-item">
        <x-view-select 
            :value="['name' => 'Disabled', 'color' => 'danger']" 
            icon="message-circle" 
            label="SMS: " 
        />
    </div>
    
    <!-- Push notifications -->
    <div class="preference-item">
        <x-view-select 
            :value="['name' => 'Enabled', 'color' => 'success']" 
            icon="bell" 
            label="Push: " 
        />
    </div>
</div>
```

## Styling and Customization

### Custom CSS Classes
```blade
<!-- Add custom classes -->
<x-view-select 
    :value="$option" 
    class="my-custom-select" 
/>

<!-- Multiple classes -->
<x-view-select 
    :value="$option" 
    class="select-highlight select-border" 
/>
```

### Inline Styles
```blade
<!-- Custom styling -->
<x-view-select 
    :value="$option" 
    style="background: #f8f9fa; padding: 8px; border-radius: 4px;" 
/>
```

### Color Integration
```blade
<!-- Bootstrap color classes are automatically applied -->
<x-view-select :value="['name' => 'Success', 'color' => 'success']" />
<!-- Renders with class="text-success" -->

<!-- Custom color classes -->
<x-view-select :value="['name' => 'Custom', 'color' => 'custom-color']" />
<!-- Renders with class="text-custom-color" -->
```

### Responsive Design
```blade
<!-- Responsive select display -->
<x-view-select 
    :value="$option" 
    class="select-responsive" 
/>
```

## Testing

### Basic Rendering Test
```php
/** @test */
public function it_renders_basic_select_value()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
    
    $view->assertSee('Active');
}
```

### Array Value Test
```php
/** @test */
public function it_renders_select_value_with_array()
{
    $value = ['name' => 'Active', 'color' => 'success'];
    $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
    
    $view->assertSee('Active');
    $view->assertSee('text-success');
}
```

### Icon Integration Test
```php
/** @test */
public function it_renders_select_value_with_icon()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" icon="check-circle" />', ['value' => $value]);
    
    $view->assertSee('check-circle');
    $view->assertSee('me-1');
}
```

### Label Display Test
```php
/** @test */
public function it_renders_select_value_with_label()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" label="Status: " />', ['value' => $value]);
    
    $view->assertSee('Status:');
}
```

### Copy Functionality Test
```php
/** @test */
public function it_renders_select_value_with_copy_functionality()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" copy />', ['value' => $value]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard');
    $view->assertSee('cursor-pointer');
}
```

### Custom Classes Test
```php
/** @test */
public function it_renders_select_value_with_custom_classes()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" class="custom-class" />', ['value' => $value]);
    
    $view->assertSee('custom-class');
}
```

### Custom ID Test
```php
/** @test */
public function it_renders_select_value_with_custom_id()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" id="select-1" />', ['value' => $value]);
    
    $view->assertSee('id="select-1"');
}
```

### Data Attributes Test
```php
/** @test */
public function it_renders_select_value_with_data_attributes()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" data-test="select-component" data-type="display-select" />', ['value' => $value]);
    
    $view->assertSee('data-test="select-component"');
    $view->assertSee('data-type="display-select"');
}
```

### ARIA Attributes Test
```php
/** @test */
public function it_renders_select_value_with_aria_attributes()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" aria-label="Select value display" aria-describedby="select-description" />', ['value' => $value]);
    
    $view->assertSee('aria-label="Select value display"');
    $view->assertSee('aria-describedby="select-description"');
}
```

### Role Attribute Test
```php
/** @test */
public function it_renders_select_value_with_role_attribute()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" role="text" />', ['value' => $value]);
    
    $view->assertSee('role="text"');
}
```

### Inline Styles Test
```php
/** @test */
public function it_renders_select_value_with_inline_styles()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" style="color: #6c757d;" />', ['value' => $value]);
    
    $view->assertSee('style="color: #6c757d;"');
}
```

### Tabindex Test
```php
/** @test */
public function it_renders_select_value_with_tabindex()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" tabindex="0" />', ['value' => $value]);
    
    $view->assertSee('tabindex="0"');
}
```

### All Features Test
```php
/** @test */
public function it_renders_select_value_with_all_features()
{
    $value = ['name' => 'Active', 'color' => 'success'];
    $view = $this->blade('<x-view-select :value="$value" icon="check-circle" label="Status: " copy class="custom-class" id="select-1" />', ['value' => $value]);
    
    $view->assertSee('Active');
    $view->assertSee('check-circle');
    $view->assertSee('Status:');
    $view->assertSee('copy');
    $view->assertSee('custom-class');
    $view->assertSee('id="select-1"');
}
```

### Different Data Types Test
```php
/** @test */
public function it_renders_select_value_with_different_data_types()
{
        // String value
        $string = 'Active';
        $view1 = $this->blade('<x-view-select :value="$value" />', ['value' => $string]);
        $view1->assertSee('Active');
        
        // Array value
        $array = ['name' => 'Pending', 'color' => 'warning'];
        $view2 = $this->blade('<x-view-select :value="$value" />', ['value' => $array]);
        $view2->assertSee('Pending');
        $view2->assertSee('text-warning');
        
        // Array with name only
        $arrayNameOnly = ['name' => 'Completed'];
        $view3 = $this->blade('<x-view-select :value="$value" />', ['value' => $arrayNameOnly]);
        $view3->assertSee('Completed');
}
```

### HTML Label Test
```php
/** @test */
public function it_renders_select_value_with_html_label()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" label="<strong>Status:</strong> " />', ['value' => $value]);
    
    $view->assertSee('<strong>Status:</strong>');
}
```

### Null Value Test
```php
/** @test */
public function it_renders_nothing_with_null_value()
{
    $view = $this->blade('<x-view-select :value="null" />');
    
    $view->assertDontSee('Active');
}
```

### Empty String Test
```php
/** @test */
public function it_renders_nothing_with_empty_string()
{
    $view = $this->blade('<x-view-select :value="\'\'" />');
    
    $view->assertDontSee('Active');
}
```

### Empty Array Test
```php
/** @test */
public function it_renders_nothing_with_empty_array()
{
    $view = $this->blade('<x-view-select :value="[]" />');
    
    $view->assertDontSee('Active');
}
```

### Array Without Name Test
```php
/** @test */
public function it_renders_nothing_with_array_without_name()
{
    $value = ['color' => 'success'];
    $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
    
    $view->assertDontSee('Active');
}
```

### Copy With Array Value Test
```php
/** @test */
public function it_renders_select_value_with_copy_and_array()
{
    $value = ['name' => 'Active', 'color' => 'success'];
    $view = $this->blade('<x-view-select :value="$value" copy />', ['value' => $value]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard="Active"');
}
```

### Copy With String Value Test
```php
/** @test */
public function it_renders_select_value_with_copy_and_string()
{
    $value = 'Active';
    $view = $this->blade('<x-view-select :value="$value" copy />', ['value' => $value]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard="Active"');
}
```

## Accessibility

### ARIA Labels
```blade
<!-- With ARIA label -->
<x-view-select 
    :value="$option" 
    aria-label="Selected option display"
    role="text"
/>
```

### Screen Reader Support
```blade
<!-- Screen reader friendly -->
<x-view-select 
    :value="$option" 
    aria-label="Status is currently set to Active"
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
- Efficient array handling and conditional rendering
- Copy functionality only loads when enabled
- Optimized icon rendering through the icon system

## Troubleshooting

### Common Issues

1. **Value not displaying**: Ensure the `value` prop contains valid data
2. **Array not rendering**: Check if the array has a 'name' key
3. **Color not applying**: Verify the color value matches Bootstrap color classes
4. **Icon not showing**: Check if the icon name exists in your icon set
5. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded

### Debug Mode
```blade
<!-- Enable debug mode -->
<x-view-select :value="$option" :debug="true" />
```

## Related Components

- **View Status** - For status information display
- **View Badge** - For status indicators
- **View Tag** - For individual tag display
- **View Tags** - For multiple tag display
- **Form Select** - For select input forms
- **Form Select Group** - For grouped select options
- **Form Select Item** - For individual select items

## Changelog

### Version 1.0.0
- Initial release
- Basic select value display functionality
- Support for string and array values
- Color integration for array-based values
- Icon integration support
- Label display support with HTML formatting
- Copy functionality
- Settings array support
- Responsive design

## Contributing

When contributing to the View Select component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various data types and structures

## Support

For support and questions about the View Select component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
