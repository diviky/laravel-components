# View Boolean Component

A sophisticated and feature-rich boolean display component that provides enhanced true/false value rendering with optional icons, labels, copy-to-clipboard functionality, and professional badge styling. This component offers professional boolean display with enhanced user experience and visual clarity.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, Bootstrap badge styling
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/boolean.blade.php`
- **Tests:** `tests/Components/ViewBooleanTest.php` (to be created)
- **Documentation:** `docs/view-boolean.md`

## Basic Usage

### Simple Boolean Display
```blade
<x-view-boolean value="true" />
```

### With Label
```blade
<x-view-boolean value="true" label="Status: " />
```

### With Icon
```blade
<x-view-boolean value="true" icon="check-circle" />
```

### With Copy Functionality
```blade
<x-view-boolean value="true" copy />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | mixed | Boolean value to display | `true`, `false`, `1`, `0`, `'yes'`, `'no'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the boolean | `'check-circle'`, `'x-circle'`, `'toggle-on'`, `'toggle-off'` |
| label | string | null | Label text to display before the boolean | `'Status: '`, `'Active: '`, `'Enabled: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['true_text' => 'Active']` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'badge badge-success'/'badge badge-warning' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'boolean-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="boolean-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Boolean Display
**Usage:** `<x-view-boolean value="true">` (default)
**Description:** Basic boolean display with automatic badge styling
**Features:**
- Automatic boolean value detection
- Professional badge styling
- Responsive design
- Visual clarity

### Labeled Boolean Display
**Usage:** `<x-view-boolean value="true" label="Status: ">`
**Description:** Boolean display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon Boolean Display
**Usage:** `<x-view-boolean value="true" icon="check-circle">`
**Description:** Boolean display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Boolean Display
**Usage:** `<x-view-boolean value="true" copy>`
**Description:** Boolean display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

## Boolean Value Handling

### Truthy Values
The component treats the following as `true`:
- `true` (boolean)
- `1` (integer)
- `'1'` (string)
- `'yes'` (string)
- `'on'` (string)
- Any non-empty value

### Falsy Values
The component treats the following as `false`:
- `false` (boolean)
- `0` (integer)
- `'0'` (string)
- `''` (empty string)
- `null`
- `undefined`

### Visual Representation
- **True Values**: Green badge with "Yes" text (`badge badge-success`)
- **False Values**: Warning badge with "No" text (`badge badge-warning`)

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Boolean content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-boolean value="true">
    Additional Content
</x-view-boolean>
```

## Usage Examples

### Basic Boolean Display
```blade
<x-view-boolean value="true" />
```

### Boolean with Label
```blade
<x-view-boolean 
    value="true" 
    label="Status: " />
```

### Boolean with Icon
```blade
<x-view-boolean 
    value="true" 
    icon="check-circle" />
```

### Boolean with Copy Functionality
```blade
<x-view-boolean 
    value="true" 
    copy />
```

### Boolean with Custom Classes
```blade
<x-view-boolean 
    value="true" 
    class="text-primary fw-bold" />
```

### Boolean with Custom ID
```blade
<x-view-boolean 
    value="true" 
    id="custom-boolean-id" />
```

### Boolean with Data Attributes
```blade
<x-view-boolean 
    value="true" 
    data-test="boolean-component"
    data-type="display-boolean" />
```

### Boolean with Aria Attributes
```blade
<x-view-boolean 
    value="true" 
    aria-label="Boolean display"
    aria-describedby="boolean-description" />
```

### Boolean with Role Attribute
```blade
<x-view-boolean 
    value="true" 
    role="text" />
```

### Boolean with Tabindex
```blade
<x-view-boolean 
    value="true" 
    tabindex="0" />
```

### Boolean with Form Attribute
```blade
<x-view-boolean 
    value="true" 
    form="my-form" />
```

### Boolean with Autocomplete
```blade
<x-view-boolean 
    value="true" 
    autocomplete="off" />
```

### Boolean with Novalidate
```blade
<x-view-boolean 
    value="true" 
    novalidate />
```

### Boolean with Accept
```blade
<x-view-boolean 
    value="true" 
    accept="boolean/*" />
```

### Boolean with Capture
```blade
<x-view-boolean 
    value="true" 
    capture="environment" />
```

### Boolean with Max
```blade
<x-view-boolean 
    value="true" 
    max="1" />
```

### Boolean with Min
```blade
<x-view-boolean 
    value="true" 
    min="0" />
```

### Boolean with Step
```blade
<x-view-boolean 
    value="true" 
    step="1" />
```

### Boolean with Pattern
```blade
<x-view-boolean 
    value="true" 
    pattern="[01]" />
```

### Boolean with Spellcheck
```blade
<x-view-boolean 
    value="true" 
    spellcheck="false" />
```

### Boolean with Translate
```blade
<x-view-boolean 
    value="true" 
    translate="no" />
```

### Boolean with Contenteditable
```blade
<x-view-boolean 
    value="true" 
    contenteditable="true" />
```

### Boolean with Contextmenu
```blade
<x-view-boolean 
    value="true" 
    contextmenu="boolean-menu" />
```

### Boolean with Dir
```blade
<x-view-boolean 
    value="true" 
    dir="rtl" />
```

### Boolean with Draggable
```blade
<x-view-boolean 
    value="true" 
    draggable="true" />
```

### Boolean with Dropzone
```blade
<x-view-boolean 
    value="true" 
    dropzone="copy" />
```

### Boolean with Hidden
```blade
<x-view-boolean 
    value="true" 
    hidden />
```

### Boolean with Lang
```blade
<x-view-boolean 
    value="true" 
    lang="en" />
```

### Boolean with Settings Array
```blade
<x-view-boolean 
    value="true" 
    :settings="['true_text' => 'Active']" />
```

## Common Patterns

### User Status Interface
```blade
<div class="user-status-interface">
    <h4>User Status</h4>
    
    <x-view-boolean 
        value="{{ $user->is_active }}" 
        icon="user-check" 
        label="Active: "
        class="text-success" />
    
    <x-view-boolean 
        value="{{ $user->is_verified }}" 
        icon="shield-check" 
        label="Verified: "
        class="text-primary" />
    
    <x-view-boolean 
        value="{{ $user->is_premium }}" 
        icon="star" 
        label="Premium: "
        class="text-warning" />
    
    <x-view-boolean 
        value="{{ $user->is_banned }}" 
        icon="ban" 
        label="Banned: "
        class="text-danger" />
</div>
```

### System Configuration Interface
```blade
<div class="system-configuration-interface">
    <h4>System Settings</h4>
    
    <x-view-boolean 
        value="{{ $config->maintenance_mode }}" 
        icon="tools" 
        label="Maintenance Mode: "
        class="text-warning" />
    
    <x-view-boolean 
        value="{{ $config->debug_mode }}" 
        icon="bug" 
        label="Debug Mode: "
        class="text-info" />
    
    <x-view-boolean 
        value="{{ $config->ssl_enabled }}" 
        icon="lock" 
        label="SSL Enabled: "
        class="text-success" />
    
    <x-view-boolean 
        value="{{ $config->backup_enabled }}" 
        icon="save" 
        label="Backup Enabled: "
        class="text-primary" />
</div>
```

### Feature Toggle Interface
```blade
<div class="feature-toggle-interface">
    <h4>Feature Flags</h4>
    
    <x-view-boolean 
        value="{{ $features->dark_mode }}" 
        icon="moon" 
        label="Dark Mode: "
        class="text-primary" />
    
    <x-view-boolean 
        value="{{ $features->notifications }}" 
        icon="bell" 
        label="Notifications: "
        class="text-success" />
    
    <x-view-boolean 
        value="{{ $features->analytics }}" 
        icon="chart-bar" 
        label="Analytics: "
        class="text-info" />
    
    <x-view-boolean 
        value="{{ $features->beta_features }}" 
        icon="flask" 
        label="Beta Features: "
        class="text-warning" />
</div>
```

### Permission Management Interface
```blade
<div class="permission-management-interface">
    <h4>User Permissions</h4>
    
    <x-view-boolean 
        value="{{ $permissions->can_edit }}" 
        icon="edit" 
        label="Can Edit: "
        class="text-success" />
    
    <x-view-boolean 
        value="{{ $permissions->can_delete }}" 
        icon="trash" 
        label="Can Delete: "
        class="text-danger" />
    
    <x-view-boolean 
        value="{{ $permissions->can_export }}" 
        icon="download" 
        label="Can Export: "
        class="text-info" />
    
    <x-view-boolean 
        value="{{ $permissions->is_admin }}" 
        icon="crown" 
        label="Is Admin: "
        class="text-warning" />
</div>
```

### Integration Status Interface
```blade
<div class="integration-status-interface">
    <h4>Integration Status</h4>
    
    <x-view-boolean 
        value="{{ $integrations->stripe_connected }}" 
        icon="credit-card" 
        label="Stripe Connected: "
        class="text-success" />
    
    <x-view-boolean 
        value="{{ $integrations->slack_connected }}" 
        icon="message-circle" 
        label="Slack Connected: "
        class="text-primary" />
    
    <x-view-boolean 
        value="{{ $integrations->github_connected }}" 
        icon="github" 
        label="GitHub Connected: "
        class="text-dark" />
    
    <x-view-boolean 
        value="{{ $integrations->aws_connected }}" 
        icon="cloud" 
        label="AWS Connected: "
        class="text-warning" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_boolean_with_true_value()
{
    $view = $this->blade('<x-view-boolean value="true" />');
    
    $view->assertSee('Yes');
    $view->assertSee('badge-success');
}

/** @test */
public function it_renders_view_boolean_with_false_value()
{
    $view = $this->blade('<x-view-boolean value="false" />');
    
    $view->assertSee('No');
    $view->assertSee('badge-warning');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewBooleanComponent::class)
        ->assertSee('<x-view-boolean')
        ->set('value', true)
        ->assertSee('Yes');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to boolean elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to boolean elements

### Keyboard Navigation
- Tab navigation to boolean
- Copy functionality accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Boolean context communication
- Icon description support
- Copy functionality announcement

### Boolean Accessibility
- Clear boolean purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Boolean display with HTML output

## Troubleshooting

### Common Issues

#### Boolean Not Displaying
**Problem:** Boolean value not showing
**Solution:** Check if value attribute is set and not null

#### Styling Not Working
**Problem:** Badge styling not applying correctly
**Solution:** Check Bootstrap CSS and badge classes

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Boolean doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Email:** Email display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with boolean display functionality
- Bootstrap badge integration for professional styling
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/boolean.blade.php`
2. Add/update tests in `tests/Components/ViewBooleanTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Email Component](../view-email.md)
- [Icon Component](../icon.md)
- [Boolean Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Boolean Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
