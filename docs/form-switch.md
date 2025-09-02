# Form Switch Component

A sophisticated toggle switch component that provides a modern alternative to traditional checkboxes, featuring inline display options, copy functionality, Livewire integration, and comprehensive form validation. This component creates accessible toggle switches with enhanced user experience and flexible configuration options.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via Livewire integration)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-switch.blade.php`
- **Documentation:** `docs/form-switch.md`

## Basic Usage

### Simple Toggle Switch
```blade
<x-form-switch name="notifications" label="Enable Notifications" />
```

### With Default Value
```blade
<x-form-switch 
    name="newsletter" 
    label="Subscribe to Newsletter"
    :checked="true">
</x-form-switch>
```

### With Help Text
```blade
<x-form-switch 
    name="marketing" 
    label="Marketing Communications"
    help="Receive promotional emails and special offers">
</x-form-switch>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'notifications'` or `'newsletter'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Switch label text | `'Enable Feature'` |
| value | mixed | '1' | Switch value when checked | `'enabled'` |
| checked | boolean | false | Whether switch is checked | `true` |
| copy | mixed | true | Copy value for form submission | `false` |
| help | string | '' | Help text below switch | `'Enable this feature'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'switch']` |

### Inherited Attributes

This component extends base form functionality and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'switch-input'` |
| class | string | `'form-check-input'` | CSS classes | `'custom-switch'` |
| disabled | boolean | false | Disable the switch | `true` |
| readonly | boolean | false | Make switch readonly | `true` |
| required | boolean | false | Make field required | `true` |
| inline | boolean | false | Display inline | `true` |
| title | string | null | Title attribute | `'Toggle Switch'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'toggle-feature'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'update'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the switch
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Enable this feature to receive real-time updates and notifications.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the switch
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-switch name="feature">
    <small class="text-muted">Feature status will be updated immediately</small>
</x-form-switch>
```

## Usage Examples

### Basic Toggle Switch
```blade
<x-form-switch 
    name="notifications" 
    label="Enable Notifications">
    
    <x-slot:help>
        Receive email and push notifications for important updates
    </x-slot:help>
</x-form-switch>
```

### Required Toggle Switch
```blade
<x-form-switch 
    name="terms" 
    label="I agree to the Terms and Conditions"
    required>
    
    <x-slot:help>
        You must accept the terms to continue
    </x-slot:help>
</x-form-switch>
```

### With Custom Value
```blade
<x-form-switch 
    name="status" 
    label="Account Status"
    value="active"
    :checked="true">
    
    <x-slot:help>
        Toggle between active and inactive account status
    </x-slot:help>
</x-form-switch>
```

### Inline Display
```blade
<x-form-switch 
    name="preferences" 
    label="Email Preferences"
    inline>
    
    <x-slot:help>
        Choose your email notification preferences
    </x-slot:help>
</x-form-switch>
```

### With Model Binding
```blade
<x-form-switch 
    name="user_notifications" 
    label="Your Notification Settings"
    :bind="$user"
    bind-key="notifications_enabled">
    
    <x-slot:help>
        Manage your personal notification preferences
    </x-slot:help>
</x-form-switch>
```

### Livewire Integration
```blade
<x-form-switch 
    wire:model="form.enableFeature"
    name="feature_toggle" 
    label="Enable Advanced Feature"
    required>
    
    <x-slot:help>
        <div class="feature-status">
            <strong>Status:</strong> 
            <span class="badge" :class="$wire.form.enableFeature ? 'bg-success' : 'bg-secondary'">
                {{ $wire.form.enableFeature ? 'Enabled' : 'Disabled' }}
            </span>
        </div>
    </x-slot:help>
</x-form-switch>
```

### With Custom Classes
```blade
<x-form-switch 
    name="custom_switch" 
    label="Custom Styled Switch"
    class="custom-switch-lg"
    title="Toggle this feature on or off">
    
    <x-slot:help>
        <div class="switch-tips">
            <i class="fas fa-lightbulb"></i>
            <strong>Tip:</strong> This switch has custom styling applied
        </div>
    </x-slot:help>
</x-form-switch>
```

### Disabled Switch
```blade
<x-form-switch 
    name="locked_feature" 
    label="Premium Feature"
    disabled>
    
    <x-slot:help>
        This feature is locked and cannot be changed
    </x-slot:help>
</x-form-switch>
```

### Readonly Switch
```blade
<x-form-switch 
    name="display_status" 
    label="Current Status"
    readonly>
    
    <x-slot:help>
        Your current status (cannot be edited)
    </x-slot:help>
</x-form-switch>
```

## Component Variants

### Standard Toggle Switch
**Usage:** `<x-form-switch>` (default)
**Description:** Basic toggle switch with standard styling
**Features:**
- Bootstrap form-switch styling
- Standard checkbox functionality
- Help text and label support
- Form validation integration

### Inline Toggle Switch
**Usage:** `<x-form-switch inline>`
**Description:** Switch displayed inline with other form elements
**Features:**
- Horizontal layout
- Compact form design
- Consistent spacing
- Responsive behavior

### Copy-Enabled Switch
**Usage:** `<x-form-switch :copy="true">`
**Description:** Switch with copy value functionality
**Features:**
- Hidden input for form submission
- Copy value when switch is off
- Flexible copy value configuration
- Form data consistency

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-switch>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-switch' => [
        'view' => 'laravel-components::{framework}.form-switch',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'checkbox'`
- **Class:** `'form-check-input'`
- **Copy:** `true` (enabled by default)
- **Inline:** `false` (disabled by default)

### Bootstrap Classes
```css
.form-switch {
    /* Bootstrap 5 switch styling */
}

.form-check-inline {
    /* Inline display styling */
}

.form-check-input {
    /* Input styling */
}

.form-check-label {
    /* Label styling */
}
```

## Common Patterns

### User Preferences Form
```blade
<div class="user-preferences-form">
    <h4>Notification Preferences</h4>
    <p>Choose how you want to receive notifications:</p>
    
    <x-form-switch 
        name="email_notifications" 
        label="Email Notifications"
        :checked="true">
        
        <x-slot:help>
            Receive important updates via email
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="push_notifications" 
        label="Push Notifications"
        :checked="true">
        
        <x-slot:help>
            Receive real-time push notifications
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="sms_notifications" 
        label="SMS Notifications"
        :checked="false">
        
        <x-slot:help>
            Receive urgent notifications via SMS
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="marketing_emails" 
        label="Marketing Communications"
        :checked="false">
        
        <x-slot:help>
            Receive promotional emails and special offers
        </x-slot:help>
    </x-form-switch>
    
    <div class="preferences-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Your Notification Summary:</h6>
                <ul class="mb-0 text-muted">
                    <li>Email: <span x-text="$wire.emailNotifications ? 'Enabled' : 'Disabled'">Enabled</span></li>
                    <li>Push: <span x-text="$wire.pushNotifications ? 'Enabled' : 'Disabled'">Enabled</span></li>
                    <li>SMS: <span x-text="$wire.smsNotifications ? 'Enabled' : 'Disabled'">Disabled</span></li>
                    <li>Marketing: <span x-text="$wire.marketingEmails ? 'Enabled' : 'Disabled'">Disabled</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

### Feature Toggle Management
```blade
<div class="feature-toggle-management">
    <h4>Feature Management</h4>
    <p>Enable or disable system features:</p>
    
    <x-form-switch 
        name="maintenance_mode" 
        label="Maintenance Mode"
        :checked="false">
        
        <x-slot:help>
            <div class="maintenance-warning">
                <strong>Warning:</strong> Enabling maintenance mode will restrict user access
            </div>
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="debug_mode" 
        label="Debug Mode"
        :checked="false">
        
        <x-slot:help>
            Enable detailed error logging and debugging information
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="api_rate_limiting" 
        label="API Rate Limiting"
        :checked="true">
        
        <x-slot:help>
            Limit API requests to prevent abuse
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="user_registration" 
        label="User Registration"
        :checked="true">
        
        <x-slot:help>
            Allow new users to create accounts
        </x-slot:help>
    </x-form-switch>
    
    <div class="feature-status mt-3">
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <strong>Note:</strong> Feature changes take effect immediately. 
            Some features may require a system restart.
        </div>
    </div>
</div>
```

### Settings Configuration
```blade
<div class="settings-configuration">
    <h4>Account Settings</h4>
    <p>Configure your account preferences:</p>
    
    <x-form-switch 
        name="two_factor_auth" 
        label="Two-Factor Authentication"
        :checked="true">
        
        <x-slot:help>
            <div class="security-info">
                <strong>Security:</strong> Add an extra layer of protection to your account
            </div>
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="session_timeout" 
        label="Extended Session Timeout"
        :checked="false">
        
        <x-slot:help>
            Keep your session active for longer periods
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="activity_logging" 
        label="Activity Logging"
        :checked="true">
        
        <x-slot:help>
            Log your account activities for security purposes
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="data_export" 
        label="Data Export Access"
        :checked="false">
        
        <x-slot:help>
            Allow downloading your account data
        </x-slot:help>
    </x-form-switch>
    
    <div class="settings-note mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Settings Information:</h6>
                <ul class="mb-0 text-muted">
                    <li>Two-factor authentication enhances account security</li>
                    <li>Extended sessions may reduce security</li>
                    <li>Activity logging helps track account usage</li>
                    <li>Data export includes all your stored information</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

### Permission Management
```blade
<div class="permission-management">
    <h4>User Permissions</h4>
    <p>Manage user access and permissions:</p>
    
    <x-form-switch 
        name="can_create_users" 
        label="Create Users"
        :checked="false">
        
        <x-slot:help>
            Allow this user to create new user accounts
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="can_edit_users" 
        label="Edit Users"
        :checked="false">
        
        <x-slot:help>
            Allow this user to modify existing user accounts
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="can_delete_users" 
        label="Delete Users"
        :checked="false">
        
        <x-slot:help>
            Allow this user to remove user accounts
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="can_manage_roles" 
        label="Manage Roles"
        :checked="false">
        
        <x-slot:help>
            Allow this user to assign and modify user roles
        </x-slot:help>
    </x-form-switch>
    
    <div class="permission-warning mt-3">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Permission Warning:</strong> 
            Granting these permissions gives users significant control over the system. 
            Only assign to trusted administrators.
        </div>
    </div>
</div>
```

### System Configuration
```blade
<div class="system-configuration">
    <h4>System Configuration</h4>
    <p>Configure system-wide settings:</p>
    
    <x-form-switch 
        name="auto_backup" 
        label="Automatic Backups"
        :checked="true">
        
        <x-slot:help>
            Automatically create system backups
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="error_reporting" 
        label="Error Reporting"
        :checked="true">
        
        <x-slot:help>
            Report errors to monitoring services
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="performance_monitoring" 
        label="Performance Monitoring"
        :checked="true">
        
        <x-slot:help>
            Monitor system performance metrics
        </x-slot:help>
    </x-form-switch>
    
    <x-form-switch 
        name="security_scanning" 
        label="Security Scanning"
        :checked="true">
        
        <x-slot:help>
            Regularly scan for security vulnerabilities
        </x-slot:help>
    </x-form-switch>
    
    <div class="system-info mt-3">
        <div class="card">
            <div class="card-body">
                <h6>System Status:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Last Backup:</strong> <span x-text="lastBackupDate">Never</span></p>
                        <p class="mb-1"><strong>System Health:</strong> <span class="badge bg-success">Good</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Uptime:</strong> <span x-text="systemUptime">Calculating...</span></p>
                        <p class="mb-1"><strong>Version:</strong> <span x-text="systemVersion">1.0.0</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_switch_with_basic_attributes()
{
    $view = $this->blade('<x-form-switch name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-switch');
}

/** @test */
public function it_renders_form_switch_with_inline_attribute()
{
    $view = $this->blade('<x-form-switch name="test" inline />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-check-inline');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(SwitchComponent::class)
        ->assertSee('<x-form-switch')
        ->set('enableFeature', true)
        ->assertSee('Enabled');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to switch input
- `aria-describedby`: Links to help text
- `role="checkbox"`: Applied to switch input

### Keyboard Navigation
- Tab navigation to switch
- Space key to toggle switch
- Enter key to toggle switch
- Escape key to clear focus

### Screen Reader Support
- Proper labeling and descriptions
- Switch state announcements
- Help text communication
- Error message communication

### Switch Accessibility
- Clear visual indication of state
- High contrast for state changes
- Proper focus management
- Keyboard-only operation support

## Browser Compatibility

- **Supported Browsers:** All modern browsers with CSS support
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling
- **JavaScript Dependencies:** Alpine.js (via Livewire)
- **Input Type Support:** HTML5 checkbox input type

## Troubleshooting

### Common Issues

#### Switch Not Styling Correctly
**Problem:** Switch doesn't look like a toggle
**Solution:** Check Bootstrap CSS and form-switch classes

#### Livewire Integration Issues
**Problem:** Switch not updating with Livewire
**Solution:** Verify wire:model syntax and Livewire setup

#### Copy Functionality Not Working
**Problem:** Copy value not submitting correctly
**Solution:** Check copy attribute and hidden input generation

#### Inline Display Problems
**Problem:** Inline switches not displaying correctly
**Solution:** Verify inline attribute and CSS classes

#### Form Validation Issues
**Problem:** Switch validation not working
**Solution:** Check form structure and validation rules

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Checkbox:** Alternative checkbox component
- **Form Toggle:** Alternative toggle component

## Changelog

### Version 1.0.0
- Initial release with Bootstrap 5 switch styling
- Inline display support
- Copy functionality for form submission
- Livewire integration support
- Comprehensive form validation

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-switch.blade.php`
2. Add/update tests in `tests/Components/FormSwitchTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Checkbox Component](../form-checkbox.md)
- [Bootstrap Form Switch](https://getbootstrap.com/docs/5.3/forms/checks-radios/#switches)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components) 
