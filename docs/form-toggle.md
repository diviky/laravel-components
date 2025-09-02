# Form Toggle Component

A sophisticated toggle switch component that provides comprehensive toggle functionality with enhanced user experience and flexible configuration options. This component offers intuitive toggle switching with checkbox behavior, professional styling, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormCheckbox base class, extends core form functionality
**JavaScript Library:** Alpine.js (via base component)

## Files

- **PHP Class:** `src/Components/FormToggle.php`
- **View File:** `resources/views/bootstrap-5/form-toggle.blade.php`
- **Tests:** `tests/Components/FormToggleTest.php` (to be created)
- **Documentation:** `docs/form-toggle.md`

## Basic Usage

### Simple Form Toggle
```blade
<x-form-toggle name="notifications" label="Enable Notifications" />
```

### With Custom Value
```blade
<x-form-toggle 
    name="newsletter" 
    label="Subscribe to Newsletter" 
    value="yes">
</x-form-toggle>
```

### With Title
```blade
<x-form-toggle 
    name="settings" 
    title="User Preferences" 
    label="Dark Mode">
</x-form-toggle>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'notifications'` or `'settings'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Toggle label text | `'Enable Feature'` |
| value | mixed | 1 | Toggle value when checked | `'yes'` or `'enabled'` |
| title | string | null | Title displayed above toggle | `'User Preferences'` |
| copy | mixed | '0' | Hidden input value when unchecked | `'0'` or `false` |
| inline | boolean | false | Display toggle inline | `true` |
| checked | boolean | false | Whether toggle is checked | `true` |
| help | string | null | Help text below toggle | `'This will enable the feature'` |
| hint | string | null | Hint text for tooltip | `'Click for more info'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'toggle']` |

### Inherited Attributes

This component extends the base `FormCheckbox` class and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'toggle-input'` |
| class | string | '' | CSS classes | `'custom-toggle'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Toggle option...'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'toggle-feature'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'toggle'` |

## Component Variants

### Standard Form Toggle
**Usage:** `<x-form-toggle name="feature">` (default)
**Description:** Standard toggle switch with checkbox behavior
**Features:**
- Toggle switch styling
- Checkbox input type
- Professional appearance
- Enhanced user experience

### Inline Form Toggle
**Usage:** `<x-form-toggle name="feature" inline>`
**Description:** Inline toggle display
**Features:**
- Inline layout
- Compact display
- Professional styling
- Enhanced user experience

### Titled Form Toggle
**Usage:** `<x-form-toggle name="feature" title="Section Title">`
**Description:** Toggle with section title
**Features:**
- Section title display
- Organized grouping
- Professional styling
- Enhanced user experience

### Hinted Form Toggle
**Usage:** `<x-form-toggle name="feature" hint="Additional info">`
**Description:** Toggle with hint tooltip
**Features:**
- Help icon with tooltip
- Additional information
- Professional styling
- Enhanced user experience

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Toggle content and text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-form-toggle name="feature">
    Custom Toggle Content
</x-form-toggle>
```

## Usage Examples

### Basic Form Toggle
```blade
<x-form-toggle 
    name="notifications" 
    label="Enable Email Notifications">
</x-form-toggle>
```

### Form Toggle with Custom Value
```blade
<x-form-toggle 
    name="newsletter" 
    label="Subscribe to Newsletter" 
    value="yes">
</x-form-toggle>
```

### Form Toggle with Title
```blade
<x-form-toggle 
    name="dark_mode" 
    title="Display Settings" 
    label="Dark Mode">
</x-form-toggle>
```

### Form Toggle with Help Text
```blade
<x-form-toggle 
    name="analytics" 
    label="Enable Analytics" 
    help="This will collect usage data to improve the service">
</x-form-toggle>
```

### Form Toggle with Hint
```blade
<x-form-toggle 
    name="advanced" 
    label="Advanced Features" 
    hint="Click for more information about advanced features">
</x-form-toggle>
```

### Form Toggle with Custom Classes
```blade
<x-form-toggle 
    name="custom_toggle" 
    class="custom-toggle-lg"
    label="Custom Toggle">
</x-form-toggle>
```

### Form Toggle with Custom ID
```blade
<x-form-toggle 
    name="custom_id_toggle" 
    id="custom-toggle-selector"
    label="Custom ID Toggle">
</x-form-toggle>
```

### Form Toggle with Data Attributes
```blade
<x-form-toggle 
    name="data_toggle" 
    data-test="toggle"
    data-type="feature-toggle"
    label="Data Toggle">
</x-form-toggle>
```

### Form Toggle with Aria Attributes
```blade
<x-form-toggle 
    name="aria_toggle" 
    aria-label="Feature Toggle"
    aria-describedby="toggle-help-text"
    label="Aria Toggle">
</x-form-toggle>
```

### Form Toggle with Role Attribute
```blade
<x-form-toggle 
    name="role_toggle" 
    role="switch"
    label="Role Toggle">
</x-form-toggle>
```

### Form Toggle with Tabindex
```blade
<x-form-toggle 
    name="tabindex_toggle" 
    tabindex="0"
    label="Tabindex Toggle">
</x-form-toggle>
```

### Form Toggle with Form Attribute
```blade
<x-form-toggle 
    name="form_toggle" 
    form="my-form"
    label="Form Toggle">
</x-form-toggle>
```

### Form Toggle with Autocomplete
```blade
<x-form-toggle 
    name="autocomplete_toggle" 
    autocomplete="off"
    label="Autocomplete Toggle">
</x-form-toggle>
```

### Form Toggle with Novalidate
```blade
<x-form-toggle 
    name="novalidate_toggle" 
    novalidate
    label="Novalidate Toggle">
</x-form-toggle>
```

### Form Toggle with Accept
```blade
<x-form-toggle 
    name="accept_toggle" 
    accept="feature/*"
    label="Accept Toggle">
</x-form-toggle>
```

### Form Toggle with Capture
```blade
<x-form-toggle 
    name="capture_toggle" 
    capture="environment"
    label="Capture Toggle">
</x-form-toggle>
```

### Form Toggle with Max
```blade
<x-form-toggle 
    name="max_toggle" 
    max="5"
    label="Max Toggle">
</x-form-toggle>
```

### Form Toggle with Min
```blade
<x-form-toggle 
    name="min_toggle" 
    min="1"
    label="Min Toggle">
</x-form-toggle>
```

### Form Toggle with Step
```blade
<x-form-toggle 
    name="step_toggle" 
    step="0.1"
    label="Step Toggle">
</x-form-toggle>
```

### Form Toggle with Pattern
```blade
<x-form-toggle 
    name="pattern_toggle" 
    pattern="[A-Za-z]{3,}"
    label="Pattern Toggle">
</x-form-toggle>
```

### Form Toggle with Spellcheck
```blade
<x-form-toggle 
    name="spellcheck_toggle" 
    spellcheck="false"
    label="Spellcheck Toggle">
</x-form-toggle>
```

### Form Toggle with Translate
```blade
<x-form-toggle 
    name="translate_toggle" 
    translate="no"
    label="Translate Toggle">
</x-form-toggle>
```

### Form Toggle with Contenteditable
```blade
<x-form-toggle 
    name="contenteditable_toggle" 
    contenteditable="true"
    label="Contenteditable Toggle">
</x-form-toggle>
```

### Form Toggle with Contextmenu
```blade
<x-form-toggle 
    name="contextmenu_toggle" 
    contextmenu="toggle-menu"
    label="Contextmenu Toggle">
</x-form-toggle>
```

### Form Toggle with Dir
```blade
<x-form-toggle 
    name="dir_toggle" 
    dir="rtl"
    label="Dir Toggle">
</x-form-toggle>
```

### Form Toggle with Draggable
```blade
<x-form-toggle 
    name="draggable_toggle" 
    draggable="true"
    label="Draggable Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone
```blade
<x-form-toggle 
    name="dropzone_toggle" 
    dropzone="copy"
    label="Dropzone Toggle">
</x-form-toggle>
```

### Form Toggle with Hidden
```blade
<x-form-toggle 
    name="hidden_toggle" 
    hidden
    label="Hidden Toggle">
</x-form-toggle>
```

### Form Toggle with Lang
```blade
<x-form-toggle 
    name="lang_toggle" 
    lang="en"
    label="Lang Toggle">
</x-form-toggle>
```

### Form Toggle with Spellcheck True
```blade
<x-form-toggle 
    name="spellcheck_true_toggle" 
    spellcheck="true"
    label="Spellcheck True Toggle">
</x-form-toggle>
```

### Form Toggle with Translate Yes
```blade
<x-form-toggle 
    name="translate_yes_toggle" 
    translate="yes"
    label="Translate Yes Toggle">
</x-form-toggle>
```

### Form Toggle with Contenteditable False
```blade
<x-form-toggle 
    name="contenteditable_false_toggle" 
    contenteditable="false"
    label="Contenteditable False Toggle">
</x-form-toggle>
```

### Form Toggle with Draggable False
```blade
<x-form-toggle 
    name="draggable_false_toggle" 
    draggable="false"
    label="Draggable False Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone Move
```blade
<x-form-toggle 
    name="dropzone_move_toggle" 
    dropzone="move"
    label="Dropzone Move Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone Link
```blade
<x-form-toggle 
    name="dropzone_link_toggle" 
    dropzone="link"
    label="Dropzone Link Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone Copy Move
```blade
<x-form-toggle 
    name="dropzone_copy_move_toggle" 
    dropzone="copy move"
    label="Dropzone Copy Move Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone Copy Link
```blade
<x-form-toggle 
    name="dropzone_copy_link_toggle" 
    dropzone="copy link"
    label="Dropzone Copy Link Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone Move Link
```blade
<x-form-toggle 
    name="dropzone_move_link_toggle" 
    dropzone="move link"
    label="Dropzone Move Link Toggle">
</x-form-toggle>
```

### Form Toggle with Dropzone Copy Move Link
```blade
<x-form-toggle 
    name="dropzone_copy_move_link_toggle" 
    dropzone="copy move link"
    label="Dropzone Copy Move Link Toggle">
</x-form-toggle>
```

## Common Patterns

### User Preferences Toggle Interface
```blade
<div class="user-preferences-toggle-interface">
    <h4>User Preferences</h4>
    <p>Customize your experience:</p>
    
    <x-form-toggle 
        name="notifications" 
        title="Notification Settings" 
        label="Email Notifications"
        help="Receive email notifications for important updates">
    </x-form-toggle>
    
    <x-form-toggle 
        name="dark_mode" 
        inline
        label="Dark Mode"
        help="Switch to dark theme for better visibility">
    </x-form-toggle>
    
    <x-form-toggle 
        name="analytics" 
        label="Usage Analytics"
        help="Help us improve by sharing anonymous usage data"
        hint="Click for more information about data collection">
    </x-form-toggle>
    
    <div class="preferences-tips mt-3">
        <h6>Preference Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Notification Types:</strong><br>
                • Email notifications<br>
                • Push notifications<br>
                • SMS alerts<br>
                • In-app notifications
            </div>
            <div class="col-md-6">
                <strong>Privacy Settings:</strong><br>
                • Data collection<br>
                • Usage analytics<br>
                • Personalization<br>
                • Third-party sharing
            </div>
        </div>
    </div>
</div>
```

### Feature Toggle Management Interface
```blade
<div class="feature-toggle-management-interface">
    <h4>Feature Management</h4>
    <p>Enable or disable system features:</p>
    
    <x-form-toggle 
        name="advanced_search" 
        title="Search Features" 
        label="Advanced Search"
        help="Enable advanced search with filters and sorting">
    </x-form-toggle>
    
    <x-form-toggle 
        name="real_time_updates" 
        inline
        label="Real-time Updates"
        help="Enable live updates without page refresh">
    </x-form-toggle>
    
    <x-form-toggle 
        name="beta_features" 
        label="Beta Features"
        help="Access experimental features and improvements"
        hint="Beta features may be unstable">
    </x-form-toggle>
    
    <div class="feature-tips mt-3">
        <h6>Feature Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Performance Impact:</strong><br>
                • Advanced search: Moderate<br>
                • Real-time updates: High<br>
                • Beta features: Variable<br>
                • Analytics: Minimal
            </div>
            <div class="col-md-6">
                <strong>User Experience:</strong><br>
                • Enhanced functionality<br>
                • Improved performance<br>
                • Better accessibility<br>
                • Modern interface
            </div>
        </div>
    </div>
</div>
```

### System Settings Toggle Interface
```blade
<div class="system-settings-toggle-interface">
    <h4>System Settings</h4>
    <p>Configure system behavior:</p>
    
    <x-form-toggle 
        name="auto_save" 
        title="Auto-save Settings" 
        label="Auto-save Documents"
        help="Automatically save documents every few minutes">
    </x-form-toggle>
    
    <x-form-toggle 
        name="backup_enabled" 
        inline
        label="Automatic Backups"
        help="Create daily backups of your data">
    </x-form-toggle>
    
    <x-form-toggle 
        name="maintenance_mode" 
        label="Maintenance Mode"
        help="Enable maintenance mode for system updates"
        hint="Users will see maintenance page">
    </x-form-toggle>
    
    <div class="system-tips mt-3">
        <h6>System Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Data Safety:</strong><br>
                • Auto-save: Every 5 minutes<br>
                • Backups: Daily at 2 AM<br>
                • Version history: 30 days<br>
                • Recovery options: Available
            </div>
            <div class="col-md-6">
                <strong>System Impact:</strong><br>
                • Performance: Minimal<br>
                • Storage: Moderate<br>
                • Network: Low<br>
                • Security: Enhanced
            </div>
        </div>
    </div>
</div>
```

### Security Settings Toggle Interface
```blade
<div class="security-settings-toggle-interface">
    <h4>Security Settings</h4>
    <p>Configure security preferences:</p>
    
    <x-form-toggle 
        name="two_factor" 
        title="Two-Factor Authentication" 
        label="Enable 2FA"
        help="Add an extra layer of security to your account">
    </x-form-toggle>
    
    <x-form-toggle 
        name="login_notifications" 
        inline
        label="Login Notifications"
        help="Receive alerts for new login attempts">
    </x-form-toggle>
    
    <x-form-toggle 
        name="session_timeout" 
        label="Session Timeout"
        help="Automatically log out after inactivity"
        hint="Recommended for shared devices">
    </x-form-toggle>
    
    <div class="security-tips mt-3">
        <h6>Security Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Security Features:</strong><br>
                • Two-factor authentication<br>
                • Login notifications<br>
                • Session management<br>
                • Device tracking
            </div>
            <div class="col-md-6">
                <strong>Best Practices:</strong><br>
                • Use strong passwords<br>
                • Enable 2FA<br>
                • Monitor login activity<br>
                • Regular security reviews
            </div>
        </div>
    </div>
</div>
```

### Accessibility Toggle Interface
```blade
<div class="accessibility-toggle-interface">
    <h4>Accessibility Settings</h4>
    <p>Customize accessibility features:</p>
    
    <x-form-toggle 
        name="high_contrast" 
        title="Visual Accessibility" 
        label="High Contrast Mode"
        help="Increase contrast for better visibility">
    </x-form-toggle>
    
    <x-form-toggle 
        name="screen_reader" 
        inline
        label="Screen Reader Support"
        help="Optimize interface for screen readers">
    </x-form-toggle>
    
    <x-form-toggle 
        name="keyboard_navigation" 
        label="Keyboard Navigation"
        help="Enable full keyboard navigation support"
        hint="Use Tab, Enter, and arrow keys">
    </x-form-toggle>
    
    <div class="accessibility-tips mt-3">
        <h6>Accessibility Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Visual Support:</strong><br>
                • High contrast mode<br>
                • Large text options<br>
                • Color blind support<br>
                • Focus indicators
            </div>
            <div class="col-md-6">
                <strong>Navigation Support:</strong><br>
                • Keyboard navigation<br>
                • Screen reader support<br>
                • Voice commands<br>
                • Alternative text
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_toggle_with_basic_attributes()
{
    $view = $this->blade('<x-form-toggle name="test" label="Test Toggle" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Toggle');
}

/** @test */
public function it_renders_form_toggle_with_title()
{
    $view = $this->blade('<x-form-toggle name="test" title="Test Title" label="Test Toggle" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Title');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(FormToggleComponent::class)
        ->assertSee('<x-form-toggle')
        ->set('toggleValue', true)
        ->assertSee('checked');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to toggle elements
- `aria-describedby`: Links to help text
- `role="switch"`: Applied to toggle elements

### Keyboard Navigation
- Tab navigation to toggle
- Enter key for toggle switching
- Toggle navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Toggle state feedback
- Help text communication
- Error message communication

### Toggle Accessibility
- Clear toggle purpose indication
- Proper validation feedback
- Helpful error messages
- Toggle guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via base component)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Checkbox support with toggle styling

## Troubleshooting

### Common Issues

#### Toggle Not Working
**Problem:** Toggle functionality not working correctly
**Solution:** Check component configuration and checkbox behavior

#### Styling Issues
**Problem:** Toggle doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Icon Display Issues
**Problem:** Help icon not showing correctly
**Solution:** Check icon component and icon name configuration

#### Title Display Issues
**Problem:** Title not displaying correctly
**Solution:** Check title attribute and CSS styling

#### Hint Tooltip Issues
**Problem:** Hint tooltip not working
**Solution:** Check Bootstrap tooltip JavaScript and CSS

## Related Components

- **Form Checkbox:** Base checkbox component
- **Form Switch:** Switch input component
- **Form Radio:** Radio button component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with form toggle functionality
- FormCheckbox extension with toggle support
- Professional toggle styling
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-toggle.blade.php`
2. Update the PHP class: `src/Components/FormToggle.php`
3. Add/update tests in `tests/Components/FormToggleTest.php`
4. Update this documentation

## See Also

- [Form Checkbox Component](../form-checkbox.md)
- [Form Switch Component](../form-switch.md)
- [Form Radio Component](../form-radio.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Form Checks](https://getbootstrap.com/docs/5.3/forms/checks-radios/)
- [Toggle Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Form Toggle Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
