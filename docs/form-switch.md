# Form Switch Component

A toggle switch component with comprehensive form integration, validation support, and Livewire compatibility for boolean input fields.

## Overview

**Component Type:** Form Input  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** `diviky/laravel-form-components` for base functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-switch.blade.php`
- **Documentation:** `docs/form-switch.md`
- **Tests:** `tests/Components/FormSwitchTest.php`

## Basic Usage

```blade
<x-form-switch name="notifications" label="Enable Notifications" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Input field name | `'notifications'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Switch label text | `'Enable Feature'` |
| value | string | '1' | Input value when checked | `'on'` |
| checked | boolean | false | Initial checked state | `true` |
| copy | string\|false | '0' | Hidden input value for unchecked state | `'off'` |
| title | string | null | Form group title/label | `'Settings'` |
| help | string | null | Help text below switch | `'Toggle this feature on/off'` |
| inline | boolean | false | Display inline with other switches | `true` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Input ID | `'notifications-switch'` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-switch'` |
| disabled | boolean | false | Disable the switch | `true` |
| required | boolean | false | Make field required | `true` |

## Slots

### Default Slot
- **Purpose:** Additional content after the switch
- **Content Type:** HTML/Components
- **Required:** No

## Usage Examples

### Basic Switch
```blade
<x-form-switch name="notifications" label="Enable Notifications" />
```

### Switch with Title and Help
```blade
<x-form-switch 
    name="dark_mode" 
    label="Dark Mode"
    title="Appearance Settings"
    help="Switch between light and dark themes">
</x-form-switch>
```

### Pre-checked Switch
```blade
<x-form-switch 
    name="auto_save" 
    label="Auto Save"
    :checked="true" />
```

### Custom Values
```blade
<x-form-switch 
    name="status" 
    label="Active Status"
    value="active"
    copy="inactive" />
```

### Inline Switches
```blade
<div class="d-flex gap-3">
    <x-form-switch name="email" label="Email" inline />
    <x-form-switch name="sms" label="SMS" inline />
    <x-form-switch name="push" label="Push" inline />
</div>
```

### Disabled Switch
```blade
<x-form-switch 
    name="premium" 
    label="Premium Features"
    disabled />
```

### Required Switch
```blade
<x-form-switch 
    name="terms" 
    label="I agree to the terms and conditions"
    required />
```

### Switch with Custom Classes
```blade
<x-form-switch 
    name="feature" 
    label="Beta Feature"
    class="custom-switch-lg">
</x-form-switch>
```

### Livewire Integration
```blade
<x-form-switch 
    name="real_time" 
    label="Real-time Updates"
    wire:model="settings.realTime" />
```

### Switch with Validation
```blade
<x-form-switch 
    name="consent" 
    label="I consent to data processing"
    required />
```

### Switch with Custom Help Component
```blade
<x-form-switch name="analytics" label="Analytics">
    <x-slot:help>
        <div class="text-muted small">
            <i class="icon-info"></i>
            Help us improve by sharing anonymous usage data
        </div>
    </x-slot:help>
</x-form-switch>
```

## Features

### Form Integration
- **Name Attribute:** Proper form field naming
- **Value Handling:** Custom values for checked/unchecked states
- **Hidden Input:** Automatic hidden input for unchecked state
- **Validation:** Built-in error handling and display

### Styling Options
- **Bootstrap Switch:** Uses Bootstrap 5 switch styling
- **Inline Display:** Support for inline layout
- **Custom Classes:** Additional CSS class support
- **Form Group:** Proper form group structure

### Livewire Support
- **Wire Model:** Automatic wire:model integration
- **Wire Modifiers:** Support for wire modifiers
- **Real-time Updates:** Livewire compatibility

### Accessibility
- **Proper Labels:** Semantic label structure
- **Form Check:** Bootstrap form-check classes
- **ID Generation:** Automatic ID generation
- **ARIA Support:** Proper accessibility attributes

## Common Patterns

### Settings Panel
```blade
<div class="settings-panel">
    <h4>Notification Settings</h4>
    
    <x-form-switch 
        name="email_notifications" 
        label="Email Notifications"
        title="Email"
        help="Receive notifications via email" />
    
    <x-form-switch 
        name="sms_notifications" 
        label="SMS Notifications"
        title="SMS"
        help="Receive notifications via SMS" />
    
    <x-form-switch 
        name="push_notifications" 
        label="Push Notifications"
        title="Push"
        help="Receive push notifications" />
</div>
```

### Feature Toggles
```blade
<div class="feature-toggles">
    <h5>Beta Features</h5>
    
    <x-form-switch 
        name="dark_mode" 
        label="Dark Mode"
        help="Enable dark theme (beta)" />
    
    <x-form-switch 
        name="advanced_search" 
        label="Advanced Search"
        help="Enable advanced search features" />
    
    <x-form-switch 
        name="real_time_updates" 
        label="Real-time Updates"
        help="Enable real-time data updates" />
</div>
```

### Consent Forms
```blade
<form wire:submit.prevent="saveConsent">
    <x-form-switch 
        name="marketing_consent" 
        label="Marketing Communications"
        help="Receive marketing emails and updates" />
    
    <x-form-switch 
        name="data_processing" 
        label="Data Processing"
        help="Allow processing of personal data"
        required />
    
    <x-form-switch 
        name="third_party" 
        label="Third-party Services"
        help="Allow sharing data with third-party services" />
    
    <x-form-button type="submit">Save Preferences</x-form-button>
</form>
```

### User Preferences
```blade
<div class="user-preferences">
    <x-form-switch 
        name="auto_save" 
        label="Auto Save"
        :checked="true"
        help="Automatically save changes" />
    
    <x-form-switch 
        name="notifications" 
        label="Desktop Notifications"
        help="Show desktop notifications" />
    
    <x-form-switch 
        name="sound_effects" 
        label="Sound Effects"
        help="Play sound effects for actions" />
</div>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-switch' => [
        'view' => 'laravel-components::{framework}.form-switch',
    ],
],
```

## JavaScript Integration

### Custom Switch Behavior
```javascript
// Custom switch toggle behavior
document.querySelectorAll('.form-switch input[type="checkbox"]').forEach(switchInput => {
    switchInput.addEventListener('change', function() {
        const label = this.closest('.form-switch').querySelector('.form-check-label');
        
        if (this.checked) {
            label.classList.add('text-success');
        } else {
            label.classList.remove('text-success');
        }
    });
});
```

### Switch State Management
```javascript
// Programmatically control switches
function toggleSwitch(name, checked) {
    const switchInput = document.querySelector(`input[name="${name}"]`);
    if (switchInput) {
        switchInput.checked = checked;
        switchInput.dispatchEvent(new Event('change'));
    }
}

// Example usage
toggleSwitch('notifications', true);
```

## Accessibility

### ARIA Attributes
- Proper form-check structure
- Semantic label associations
- Screen reader friendly content
- Keyboard navigation support

### Best Practices
- Use descriptive labels
- Provide helpful descriptions
- Ensure sufficient color contrast
- Test with keyboard navigation

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** None (purely CSS-based)
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Switch Not Toggling
**Problem:** Switch doesn't change state
**Solution:** Ensure proper name attribute and form structure

#### Validation Not Working
**Problem:** Validation errors not displaying
**Solution:** Check form validation rules and error handling

#### Livewire Not Updating
**Problem:** Livewire model not updating
**Solution:** Ensure proper wire:model attribute and component structure

#### Styling Issues
**Problem:** Switch doesn't look like expected
**Solution:** Verify Bootstrap CSS is loaded and check custom classes

## Related Components

- **Form Toggle:** Alternative toggle component
- **Form Checkbox:** Traditional checkbox input
- **Form Radio:** Radio button group
- **Form Button:** Form submission buttons

## Performance Considerations

- Use appropriate switch states for user experience
- Consider lazy loading for large numbers of switches
- Optimize Livewire updates for real-time switches

## Examples Gallery

### Admin Dashboard Settings
```blade
<div class="admin-settings">
    <h4>System Settings</h4>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-switch 
                name="maintenance_mode" 
                label="Maintenance Mode"
                title="System"
                help="Enable maintenance mode for system updates" />
            
            <x-form-switch 
                name="debug_mode" 
                label="Debug Mode"
                title="Development"
                help="Enable debug logging and features" />
        </div>
        
        <div class="col-md-6">
            <x-form-switch 
                name="backup_enabled" 
                label="Auto Backup"
                title="Backup"
                help="Enable automatic system backups" />
            
            <x-form-switch 
                name="notifications_enabled" 
                label="System Notifications"
                title="Notifications"
                help="Enable system-wide notifications" />
        </div>
    </div>
</div>
```

### User Profile Preferences
```blade
<div class="profile-preferences">
    <h5>Privacy Settings</h5>
    
    <x-form-switch 
        name="profile_public" 
        label="Public Profile"
        help="Make your profile visible to other users" />
    
    <x-form-switch 
        name="show_email" 
        label="Show Email"
        help="Display your email address on your profile" />
    
    <x-form-switch 
        name="allow_messages" 
        label="Allow Messages"
        help="Allow other users to send you messages" />
    
    <h5>Notification Preferences</h5>
    
    <x-form-switch 
        name="email_notifications" 
        label="Email Notifications"
        :checked="true"
        help="Receive notifications via email" />
    
    <x-form-switch 
        name="push_notifications" 
        label="Push Notifications"
        help="Receive push notifications in your browser" />
</div>
```

### E-commerce Settings
```blade
<div class="store-settings">
    <h4>Store Configuration</h4>
    
    <x-form-switch 
        name="store_open" 
        label="Store Open"
        title="Status"
        help="Make store available for customers" />
    
    <x-form-switch 
        name="inventory_tracking" 
        label="Inventory Tracking"
        title="Inventory"
        help="Track product inventory levels" />
    
    <x-form-switch 
        name="tax_calculation" 
        label="Tax Calculation"
        title="Taxes"
        help="Automatically calculate taxes on orders" />
    
    <x-form-switch 
        name="shipping_calculation" 
        label="Shipping Calculation"
        title="Shipping"
        help="Calculate shipping costs automatically" />
</div>
```

## Changelog

### Version 2.0.0
- Added Livewire integration support
- Enhanced validation error handling
- Improved accessibility features
- Added inline display support

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-switch.blade.php`
2. Add/update tests in `tests/Components/FormSwitchTest.php`
3. Update this documentation 
