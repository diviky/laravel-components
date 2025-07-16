# Form Switch Component

A modern toggle switch component for boolean values with enhanced styling and accessibility.

## View File

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/form-switch.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Label text for the switch | 'Enable notifications' |
| name | string | required | Switch name attribute | 'notifications' |
| value | string | '1' | Value when switch is checked | '1' |
| copy | string\|false | '0' | Hidden input value when unchecked | '0' |
| checked | boolean | false | Whether switch is initially checked | true |
| required | boolean | false | Whether the field is required | true |
| disabled | boolean | false | Whether the switch is disabled | true |
| inline | boolean | false | Display switch inline | true |
| help | string | null | Help text to display | 'Toggle to enable feature' |
| id | string | auto | Switch ID attribute | 'notification-switch' |
| title | string | null | Title attribute for tooltip | 'Toggle notifications' |
| class | string | null | Additional CSS classes | 'custom-switch' |
| wire:model | string | null | Livewire model binding | 'isEnabled' |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

## Usage Examples

### Basic Switch
```blade
<x-form-switch name="enabled" label="Enable Feature" />
```

### Checked by Default
```blade
<x-form-switch name="notifications" label="Enable Notifications" checked />
```

### With Custom Values
```blade
<x-form-switch name="status" label="Active Status" value="active" copy="inactive" />
```

### Disabled Switch
```blade
<x-form-switch name="premium" label="Premium Feature" disabled checked />
```

### Inline Switch
```blade
<x-form-switch name="terms" label="I agree to terms" inline />
```

### With Help Text
```blade
<x-form-switch name="newsletter" label="Subscribe to Newsletter" 
    help="Receive updates about new features" />
```

### Required Switch
```blade
<x-form-switch name="consent" label="Privacy Consent" required />
```

### Livewire Integration
```blade
<x-form-switch name="auto_save" label="Auto Save" wire:model.live="autoSave" />
```

### With Custom Styling
```blade
<x-form-switch name="theme" label="Dark Mode" class="theme-switch" />
```

### Switch with Title
```blade
<x-form-switch name="sync" label="Sync Data" title="Automatically sync data with server" />
```

### Multiple Switches
```blade
<x-form-switch name="email_notifications" label="Email Notifications" />
<x-form-switch name="sms_notifications" label="SMS Notifications" />
<x-form-switch name="push_notifications" label="Push Notifications" />
```

### Switch Groups
```blade
<div class="form-group">
    <label class="form-label">Notification Preferences</label>
    <x-form-switch name="notifications[email]" label="Email" />
    <x-form-switch name="notifications[sms]" label="SMS" />
    <x-form-switch name="notifications[push]" label="Push" />
</div>
```

## Real Project Examples

### From SMS Sender Form
```blade
<x-form-switch name="status" value="1" notchecked="0" label="Is active user?" />
```

### From SMS Notification Form
```blade
<x-form-switch name="status" value="1" label="Is active?" />
```

### From Settings Form
```blade
<x-form-switch name="settings[auto_backup]" label="Auto Backup" 
    help="Automatically backup data daily" />
```

### From Feature Toggles
```blade
<x-form-switch name="features[api_v2]" label="Enable API v2" 
    title="Enable new API version" />
```

## Advanced Usage

### Dynamic Switch States
```blade
<x-form-switch name="dynamic" label="Dynamic Switch" 
    :checked="$user->hasPremium()" 
    :disabled="!$user->canTogglePremium()" />
```

### Switch with JavaScript Event
```blade
<x-form-switch name="live_updates" label="Live Updates" 
    onchange="toggleLiveUpdates(this.checked)" />
```

### Switch with Data Attributes
```blade
<x-form-switch name="feature" label="Feature Toggle" 
    data-feature-id="123" data-track-change="true" />
```

### Conditional Switch
```blade
@if($user->isAdmin())
    <x-form-switch name="admin_mode" label="Admin Mode" />
@endif
```

### Switch with Confirmation
```blade
<x-form-switch name="delete_account" label="Delete Account" 
    onclick="return confirm('Are you sure?')" />
```

## Form Integration

### With Form Component
```blade
<x-form action="/settings" method="post">
    <x-form-switch name="notifications" label="Enable Notifications" />
    <x-form-switch name="marketing" label="Marketing Emails" />
    <x-form-submit>Save Settings</x-form-submit>
</x-form>
```

### With Validation
```blade
<x-form-switch name="terms" label="I agree to terms and conditions" required />
@error('terms')
    <div class="text-danger">{{ $message }}</div>
@enderror
```

## Styling Variants

### Custom CSS Classes
```blade
<x-form-switch name="custom" label="Custom Switch" class="switch-primary" />
<x-form-switch name="custom2" label="Custom Switch 2" class="switch-success" />
```

### Size Variations
```blade
<x-form-switch name="small" label="Small Switch" class="form-switch-sm" />
<x-form-switch name="normal" label="Normal Switch" />
<x-form-switch name="large" label="Large Switch" class="form-switch-lg" />
```

### Color Variations
```blade
<x-form-switch name="primary" label="Primary" class="switch-primary" />
<x-form-switch name="success" label="Success" class="switch-success" />
<x-form-switch name="warning" label="Warning" class="switch-warning" />
<x-form-switch name="danger" label="Danger" class="switch-danger" />
```

## Hidden Input Behavior

The component automatically creates a hidden input with the `copy` value when unchecked:

```html
<!-- When copy="0" (default) -->
<input type="hidden" value="0" name="status" />
<input type="checkbox" value="1" name="status" />

<!-- When copy="false" -->
<!-- No hidden input is created -->
<input type="checkbox" value="1" name="status" />
```

## JavaScript Integration

### Getting Switch Value
```javascript
// Get switch state
const isChecked = document.querySelector('#switch-id').checked;

// Set switch state
document.querySelector('#switch-id').checked = true;
```

### Event Handling
```javascript
document.querySelector('#switch-id').addEventListener('change', function() {
    if (this.checked) {
        console.log('Switch is ON');
    } else {
        console.log('Switch is OFF');
    }
});
```

### Livewire Integration
```javascript
// Listen for Livewire updates
Livewire.on('switchUpdated', function(data) {
    console.log('Switch updated:', data);
});
```

## Related Components

- [Form Checkbox](form-checkbox.md) - Traditional checkbox component
- [Form Label](form-label.md) - Used internally for labels
- [Form Errors](form-errors.md) - Used internally for error display
- [Help](help.md) - Used for help text display
- [Form](form.md) - Form container component

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-switch name="terms" label="Accept Terms" required />
```

## Styling Classes

The component applies these CSS classes:

- `form-check` - Base form check styling
- `form-switch` - Switch-specific styling
- `form-check-input` - Input element styling
- `form-check-label` - Label styling
- `form-check-inline` - Inline display styling
- `is-invalid` - Error state styling

## Accessibility Features

- Proper label association with `for` attribute
- ARIA attributes for screen readers
- Keyboard navigation support (Space to toggle)
- Focus management
- High contrast support
- Screen reader announcements

## Browser Support

- Modern browsers with CSS3 support
- Fallback to regular checkbox in older browsers
- Progressive enhancement approach

## Best Practices

1. **Clear Labels**: Use descriptive labels that clearly indicate what the switch controls
2. **Immediate Feedback**: Provide immediate visual feedback when toggled
3. **Consistent Behavior**: Maintain consistent switch behavior across the application
4. **Accessibility**: Always provide proper labels and ARIA attributes
5. **Form Integration**: Use within forms for proper data submission 
