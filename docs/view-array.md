# View Array Component

A sophisticated and feature-rich array display component that provides enhanced array data rendering with optional icons, labels, and copy-to-clipboard functionality. This component offers professional array display with enhanced user experience and interactive data functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, array validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/array.blade.php`
- **Tests:** `tests/Components/ViewArrayTest.php` (to be created)
- **Documentation:** `docs/view-array.md`

## Basic Usage

### Simple Array Display
```blade
<x-view-array :value="['label' => 'Array Item']" />
```

### With Icon
```blade
<x-view-array :value="['label' => 'Array Item']" icon="list" />
```

### With Copy Functionality
```blade
<x-view-array :value="['label' => 'Array Item']" copy />
```

### With Custom Classes
```blade
<x-view-array :value="['label' => 'Array Item']" class="text-primary" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | array | Array data to display | `['label' => 'Array Item']` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the array | `'list'`, `'array'`, `'collection'`, `'items'` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['validate' => true]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'array-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="array-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Array Display
**Usage:** `<x-view-array :value="['label' => 'Array Item']">` (default)
**Description:** Basic array display with label
**Features:**
- Array label display
- Clean, minimal styling
- Professional appearance
- Array value support

### Icon Array Display
**Usage:** `<x-view-array :value="['label' => 'Array Item']" icon="list">`
**Description:** Array display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Array Display
**Usage:** `<x-view-array :value="['label' => 'Array Item']" copy>`
**Description:** Array display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Custom Styled Array Display
**Usage:** `<x-view-array :value="['label' => 'Array Item']" class="text-primary">`
**Description:** Array display with custom styling
**Features:**
- Custom styling
- Professional appearance
- Enhanced visual appeal
- User experience control

## Array Functionality

### Array Information Display
The component displays array information including:
- Array label
- Array metadata
- Professional styling
- Enhanced visual appeal

### Array Validation
The component includes built-in array validation to ensure:
- Proper array format
- Valid array structure
- Professional appearance
- User experience consistency

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy array information to clipboard
- Paste into other applications
- Share array details easily
- Improve workflow efficiency

### Icon Support
The component supports icon display:
- Automatic icon rendering
- Contextual icons
- Professional styling
- Enhanced visual appeal

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Array content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-array :value="['label' => 'Array Item']">
    Additional Content
</x-view-array>
```

## Usage Examples

### Basic Array Display
```blade
<x-view-array :value="['label' => 'Array Item']" />
```

### Array with Icon
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    icon="list" />
```

### Array with Copy Functionality
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    copy />
```

### Array with Custom Classes
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    class="text-primary fw-bold" />
```

### Array with Custom ID
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    id="custom-array-id" />
```

### Array with Data Attributes
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    data-test="array-component"
    data-type="display-array" />
```

### Array with Aria Attributes
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    aria-label="Array display"
    aria-describedby="array-description" />
```

### Array with Role Attribute
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    role="text" />
```

### Array with Tabindex
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    tabindex="0" />
```

### Array with Form Attribute
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    form="my-form" />
```

### Array with Autocomplete
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    autocomplete="off" />
```

### Array with Novalidate
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    novalidate />
```

### Array with Accept
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    accept="array/*" />
```

### Array with Capture
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    capture="environment" />
```

### Array with Max
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    max="100" />
```

### Array with Min
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    min="5" />
```

### Array with Step
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    step="1" />
```

### Array with Pattern
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    pattern=".*" />
```

### Array with Spellcheck
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    spellcheck="false" />
```

### Array with Translate
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    translate="no" />
```

### Array with Contenteditable
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    contenteditable="true" />
```

### Array with Contextmenu
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    contextmenu="array-menu" />
```

### Array with Dir
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    dir="rtl" />
```

### Array with Draggable
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    draggable="true" />
```

### Array with Dropzone
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    dropzone="copy" />
```

### Array with Hidden
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    hidden />
```

### Array with Lang
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    lang="en" />
```

### Array with Settings Array
```blade
<x-view-array 
    :value="['label' => 'Array Item']" 
    :settings="['validate' => true]" />
```

## Common Patterns

### List Management Interface
```blade
<div class="list-management-interface">
    <h4>Lists</h4>
    
    <x-view-array 
        :value="['label' => 'User List']" 
        icon="users" 
        class="text-primary" />
    
    <x-view-array 
        :value="['label' => 'Product List']" 
        icon="package" 
        class="text-info" />
    
    <x-view-array 
        :value="['label' => 'Order List']" 
        icon="shopping-cart" 
        class="text-success" />
    
    <x-view-array 
        :value="['label' => 'Category List']" 
        icon="folder" 
        class="text-warning" />
</div>
```

### Collection Interface
```blade
<div class="collection-interface">
    <h4>Collections</h4>
    
    <x-view-array 
        :value="['label' => 'Image Collection']" 
        icon="image" 
        class="text-primary" />
    
    <x-view-array 
        :value="['label' => 'Document Collection']" 
        icon="file-text" 
        class="text-info" />
    
    <x-view-array 
        :value="['label' => 'Video Collection']" 
        icon="video" 
        class="text-success" />
    
    <x-view-array 
        :value="['label' => 'Audio Collection']" 
        icon="music" 
        class="text-warning" />
</div>
```

### Data Set Interface
```blade
<div class="data-set-interface">
    <h4>Data Sets</h4>
    
    <x-view-array 
        :value="['label' => 'Analytics Data']" 
        icon="chart-bar" 
        class="text-primary" />
    
    <x-view-array 
        :value="['label' => 'User Metrics']" 
        icon="trending-up" 
        class="text-info" />
    
    <x-view-array 
        :value="['label' => 'Performance Data']" 
        icon="activity" 
        class="text-success" />
    
    <x-view-array 
        :value="['label' => 'Error Logs']" 
        icon="alert-circle" 
        class="text-warning" />
</div>
```

### Configuration Interface
```blade
<div class="configuration-interface">
    <h4>Configurations</h4>
    
    <x-view-array 
        :value="['label' => 'System Settings']" 
        icon="settings" 
        class="text-primary" />
    
    <x-view-array 
        :value="['label' => 'User Preferences']" 
        icon="user" 
        class="text-info" />
    
    <x-view-array 
        :value="['label' => 'Theme Options']" 
        icon="palette" 
        class="text-success" />
    
    <x-view-array 
        :value="['label' => 'Security Settings']" 
        icon="shield" 
        class="text-warning" />
</div>
```

### Menu Interface
```blade
<div class="menu-interface">
    <h4>Menus</h4>
    
    <x-view-array 
        :value="['label' => 'Main Navigation']" 
        icon="menu" 
        class="text-primary" />
    
    <x-view-array 
        :value="['label' => 'Sidebar Menu']" 
        icon="sidebar" 
        class="text-info" />
    
    <x-view-array 
        :value="['label' => 'Footer Links']" 
        icon="link" 
        class="text-success" />
    
    <x-view-array 
        :value="['label' => 'Quick Actions']" 
        icon="zap" 
        class="text-warning" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_array_with_basic_value()
{
    $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" />');
    
    $view->assertSee('Array Item');
}

/** @test */
public function it_renders_view_array_with_icon()
{
    $view = $this->blade('<x-view-array :value="[\'label\' => \'Array Item\']" icon="list" />');
    
    $view->assertSee('Array Item');
    $view->assertSee('list');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewArrayComponent::class)
        ->assertSee('<x-view-array')
        ->set('value', ['label' => 'Array Item'])
        ->assertSee('Array Item');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to array elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to array elements

### Keyboard Navigation
- Tab navigation to array
- Copy functionality accessibility
- Array display accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Array context communication
- Icon description support
- Copy functionality announcement
- Array purpose indication

### Array Accessibility
- Clear array purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Array content accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Array display with HTML output

## Troubleshooting

### Common Issues

#### Array Not Displaying
**Problem:** Array value not showing
**Solution:** Check if value attribute is set and is an array

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Array doesn't look like expected
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
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with array display functionality
- Array information integration for interactive functionality
- Icon integration support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/array.blade.php`
2. Add/update tests in `tests/Components/ViewArrayTest.php`
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
- [Icon Component](../icon.md)
- [Array Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Array Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
