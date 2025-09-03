# View String Component

A flexible and feature-rich string display component that provides enhanced text rendering with optional icons, labels, and copy-to-clipboard functionality. This component offers professional string display with enhanced user experience and interactive features.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/string.blade.php`
- **Tests:** `tests/Components/ViewStringTest.php` (to be created)
- **Documentation:** `docs/view-string.md`

## Basic Usage

### Simple String Display
```blade
<x-view-string value="Hello World" />
```

### With Label
```blade
<x-view-string value="john@example.com" label="Email: " />
```

### With Icon
```blade
<x-view-string value="Active" icon="check" />
```

### With Copy Functionality
```blade
<x-view-string value="Copy this text" copy />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | string | String value to display | `'Hello World'` or `'john@example.com'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the string | `'user'`, `'email'`, `'check'` |
| label | string | null | Label text to display before the string | `'Email: '`, `'Status: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['class' => 'custom-class']` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'string-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="string-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard String Display
**Usage:** `<x-view-string value="text">` (default)
**Description:** Basic string display without additional features
**Features:**
- Simple text rendering
- Clean, minimal styling
- Responsive design
- Professional appearance

### Labeled String Display
**Usage:** `<x-view-string value="text" label="Label: ">`
**Description:** String display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon String Display
**Usage:** `<x-view-string value="text" icon="icon-name">`
**Description:** String display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable String Display
**Usage:** `<x-view-string value="text" copy>`
**Description:** String display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

## Slots

### Required Slots

#### Default Slot
- **Purpose:** String content and text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-string value="Custom String Content">
    Additional Content
</x-view-string>
```

## Usage Examples

### Basic String Display
```blade
<x-view-string value="Hello World" />
```

### String with Label
```blade
<x-view-string 
    value="john@example.com" 
    label="Email: " />
```

### String with Icon
```blade
<x-view-string 
    value="Active" 
    icon="check" />
```

### String with Copy Functionality
```blade
<x-view-string 
    value="Copy this text to clipboard" 
    copy />
```

### String with Custom Classes
```blade
<x-view-string 
    value="Custom styled text" 
    class="text-primary fw-bold" />
```

### String with Custom ID
```blade
<x-view-string 
    value="Identified text" 
    id="custom-string-id" />
```

### String with Data Attributes
```blade
<x-view-string 
    value="Data attributed text" 
    data-test="string-component"
    data-type="display-text" />
```

### String with Aria Attributes
```blade
<x-view-string 
    value="Accessible text" 
    aria-label="String display"
    aria-describedby="string-description" />
```

### String with Role Attribute
```blade
<x-view-string 
    value="Role defined text" 
    role="text" />
```

### String with Tabindex
```blade
<x-view-string 
    value="Tab navigable text" 
    tabindex="0" />
```

### String with Form Attribute
```blade
<x-view-string 
    value="Form associated text" 
    form="my-form" />
```

### String with Autocomplete
```blade
<x-view-string 
    value="Autocomplete text" 
    autocomplete="off" />
```

### String with Novalidate
```blade
<x-view-string 
    value="Novalidate text" 
    novalidate />
```

### String with Accept
```blade
<x-view-string 
    value="Accept text" 
    accept="text/*" />
```

### String with Capture
```blade
<x-view-string 
    value="Capture text" 
    capture="environment" />
```

### String with Max
```blade
<x-view-string 
    value="Max text" 
    max="100" />
```

### String with Min
```blade
<x-view-string 
    value="Min text" 
    min="10" />
```

### String with Step
```blade
<x-view-string 
    value="Step text" 
    step="5" />
```

### String with Pattern
```blade
<x-view-string 
    value="Pattern text" 
    pattern="[A-Za-z]+" />
```

### String with Spellcheck
```blade
<x-view-string 
    value="Spellcheck text" 
    spellcheck="false" />
```

### String with Translate
```blade
<x-view-string 
    value="Translate text" 
    translate="no" />
```

### String with Contenteditable
```blade
<x-view-string 
    value="Contenteditable text" 
    contenteditable="true" />
```

### String with Contextmenu
```blade
<x-view-string 
    value="Contextmenu text" 
    contextmenu="string-menu" />
```

### String with Dir
```blade
<x-view-string 
    value="Dir text" 
    dir="rtl" />
```

### String with Draggable
```blade
<x-view-string 
    value="Draggable text" 
    draggable="true" />
```

### String with Dropzone
```blade
<x-view-string 
    value="Dropzone text" 
    dropzone="copy" />
```

### String with Hidden
```blade
<x-view-string 
    value="Hidden text" 
    hidden />
```

### String with Lang
```blade
<x-view-string 
    value="Lang text" 
    lang="en" />
```

### String with Spellcheck True
```blade
<x-view-string 
    value="Spellcheck true text" 
    spellcheck="true" />
```

### String with Translate Yes
```blade
<x-view-string 
    value="Translate yes text" 
    translate="yes" />
```

### String with Contenteditable False
```blade
<x-view-string 
    value="Contenteditable false text" 
    contenteditable="false" />
```

### String with Draggable False
```blade
<x-view-string 
    value="Draggable false text" 
    draggable="false" />
```

### String with Dropzone Move
```blade
<x-view-string 
    value="Dropzone move text" 
    dropzone="move" />
```

### String with Dropzone Link
```blade
<x-view-string 
    value="Dropzone link text" 
    dropzone="link" />
```

### String with Dropzone Copy Move
```blade
<x-view-string 
    value="Dropzone copy move text" 
    dropzone="copy move" />
```

### String with Dropzone Copy Link
```blade
<x-view-string 
    value="Dropzone copy link text" 
    dropzone="copy link" />
```

### String with Dropzone Move Link
```blade
<x-view-string 
    value="Dropzone move link text" 
    dropzone="move link" />
```

### String with Dropzone Copy Move Link
```blade
<x-view-string 
    value="Dropzone copy move link text" 
    dropzone="copy move link" />
```

## Common Patterns

### User Profile Display
```blade
<div class="user-profile-display">
    <h4>User Profile</h4>
    
    <x-view-string 
        value="{{ $user->name }}" 
        icon="user" 
        label="Name: " />
    
    <x-view-string 
        value="{{ $user->email }}" 
        icon="email" 
        label="Email: " />
    
    <x-view-string 
        value="{{ $user->phone }}" 
        icon="phone" 
        label="Phone: " />
    
    <x-view-string 
        value="{{ $user->address }}" 
        icon="map-pin" 
        label="Address: " />
</div>
```

### Status Display Interface
```blade
<div class="status-display-interface">
    <h4>System Status</h4>
    
    <x-view-string 
        value="Online" 
        icon="check-circle" 
        class="text-success" />
    
    <x-view-string 
        value="Database Connected" 
        icon="database" 
        class="text-info" />
    
    <x-view-string 
        value="Cache Active" 
        icon="zap" 
        class="text-warning" />
    
    <x-view-string 
        value="API Responding" 
        icon="activity" 
        class="text-success" />
</div>
```

### Configuration Display
```blade
<div class="configuration-display">
    <h4>Application Configuration</h4>
    
    <x-view-string 
        value="{{ config('app.name') }}" 
        icon="settings" 
        label="App Name: " />
    
    <x-view-string 
        value="{{ config('app.env') }}" 
        icon="server" 
        label="Environment: " />
    
    <x-view-string 
        value="{{ config('app.debug') ? 'Enabled' : 'Disabled' }}" 
        icon="bug" 
        label="Debug Mode: " />
    
    <x-view-string 
        value="{{ config('app.url') }}" 
        icon="link" 
        label="Base URL: " 
        copy />
</div>
```

### Data Display Interface
```blade
<div class="data-display-interface">
    <h4>Data Information</h4>
    
    <x-view-string 
        value="{{ $record->id }}" 
        icon="hash" 
        label="Record ID: " />
    
    <x-view-string 
        value="{{ $record->created_at->format('Y-m-d H:i:s') }}" 
        icon="calendar" 
        label="Created: " />
    
    <x-view-string 
        value="{{ $record->updated_at->format('Y-m-d H:i:s') }}" 
        icon="clock" 
        label="Updated: " />
    
    <x-view-string 
        value="{{ $record->status }}" 
        icon="flag" 
        label="Status: " />
</div>
```

### Settings Display Interface
```blade
<div class="settings-display-interface">
    <h4>User Settings</h4>
    
    <x-view-string 
        value="{{ $settings->theme }}" 
        icon="palette" 
        label="Theme: " />
    
    <x-view-string 
        value="{{ $settings->language }}" 
        icon="globe" 
        label="Language: " />
    
    <x-view-string 
        value="{{ $settings->timezone }}" 
        icon="clock" 
        label="Timezone: " />
    
    <x-view-string 
        value="{{ $settings->notifications ? 'Enabled' : 'Disabled' }}" 
        icon="bell" 
        label="Notifications: " />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_string_with_basic_value()
{
    $view = $this->blade('<x-view-string value="test" />');
    
    $view->assertSee('test');
}

/** @test */
public function it_renders_view_string_with_label()
{
    $view = $this->blade('<x-view-string value="test" label="Label: " />');
    
    $view->assertSee('test');
    $view->assertSee('Label: ');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewStringComponent::class)
        ->assertSee('<x-view-string')
        ->set('value', 'Test Value')
        ->assertSee('Test Value');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to string elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to string elements

### Keyboard Navigation
- Tab navigation to string
- Copy functionality accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- String context communication
- Icon description support
- Copy functionality announcement

### String Accessibility
- Clear string purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** String display with HTML output

## Troubleshooting

### Common Issues

#### String Not Displaying
**Problem:** String value not showing
**Solution:** Check if value attribute is set and not empty

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** String doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

#### Label Issues
**Problem:** Label not displaying correctly
**Solution:** Check label attribute and HTML escaping

## Related Components

- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with string display functionality
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/string.blade.php`
2. Add/update tests in `tests/Components/ViewStringTest.php`
3. Update this documentation

## See Also

- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [Icon Component](../icon.md)
- [String Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View String Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
