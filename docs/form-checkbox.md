# Form Checkbox Component

A flexible checkbox component for boolean input with validation support, inline display options, and advanced binding capabilities.

## Overview

**Component Type:** Form Input Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4, Tailwind CSS  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-checkbox.blade.php`  
**PHP Class:** `vendor/diviky/laravel-form-components/src/Components/FormCheckbox.php`

## Files

- **View File:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-checkbox.blade.php`
- **PHP Class:** `vendor/diviky/laravel-form-components/src/Components/FormCheckbox.php`
- **Documentation:** `docs/form-checkbox.md`
- **Tests:** `tests/Components/FormCheckboxTest.php`

## Basic Usage

```blade
<x-form-checkbox name="agree" label="I agree to the terms and conditions" />
```

## Component Structure

```blade
<x-form-checkbox name="field_name" label="Checkbox Label" value="1" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Checkbox name attribute | 'agree' |
| label | string | '' | Checkbox label text | 'I agree to terms' |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | mixed | 1 | Checkbox value when checked | 'yes', 1, 'true' |
| bind | mixed | null | Model binding for automatic checked state | $user |
| bindKey | string | '' | Key for model binding | 'id' |
| default | bool | false | Default checked state | true |
| copy | mixed | '0' | Hidden input value when unchecked | '0', false |
| inline | bool | false | Display checkbox inline | true |
| compact | bool | false | Remove margins for compact display | true |
| required | bool | false | Whether the field is required | true |
| disabled | bool | false | Whether the field is disabled | true |
| readonly | bool | false | Whether the field is readonly | true |
| help | string | null | Help text to display | 'Check this if you agree' |
| title | string | null | Title attribute for tooltip | 'Terms and conditions' |
| id | string | auto | Checkbox ID attribute | 'custom-id' |
| class | string | null | Additional CSS classes | 'custom-checkbox' |
| wire:model | string | null | Livewire model binding | 'agree' |

### Inherited Attributes

All components support standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| style | string | null | Inline CSS styles | 'margin: 1rem;' |
| data-* | string | null | Custom data attributes | `data-testid="checkbox"` |

## Usage Examples

### Basic Checkbox
```blade
<x-form-checkbox name="agree" label="I agree to the terms and conditions" />
```

### Checkbox with Custom Value
```blade
<x-form-checkbox name="newsletter" label="Subscribe to newsletter" value="yes" />
```

### Required Checkbox
```blade
<x-form-checkbox name="terms" label="I accept the terms" required />
```

### Checkbox with Help Text
```blade
<x-form-checkbox name="marketing" label="Receive marketing emails" 
    help="We'll send you updates about new features" />
```

### Inline Checkbox
```blade
<x-form-checkbox name="notifications" label="Email notifications" inline />
```

### Compact Checkbox
```blade
<x-form-checkbox name="remember" label="Remember me" compact />
```

### Disabled Checkbox
```blade
<x-form-checkbox name="disabled_field" label="Disabled option" disabled />
```

### Checkbox with Model Binding
```blade
<x-form-checkbox name="is_active" label="Active user" :bind="$user" />
```

### Checkbox with Default State
```blade
<x-form-checkbox name="newsletter" label="Newsletter subscription" :default="true" />
```

### Livewire Integration
```blade
<x-form-checkbox name="agree" label="I agree" wire:model="agree" />
```

### Checkbox with Custom Copy Value
```blade
<x-form-checkbox name="status" label="Active" value="active" copy="inactive" />
```

### Checkbox without Copy Value
```blade
<x-form-checkbox name="feature" label="Enable feature" :copy="false" />
```

### Checkbox with Title
```blade
<x-form-checkbox name="advanced" label="Advanced mode" 
    title="Enable advanced features" />
```

### Checkbox with Custom ID
```blade
<x-form-checkbox name="consent" label="Data processing consent" id="data-consent" />
```

### Checkbox with Custom Class
```blade
<x-form-checkbox name="premium" label="Premium features" class="custom-checkbox" />
```

### Multiple Checkboxes
```blade
<div>
    <x-form-checkbox name="permissions[]" label="Read" value="read" />
    <x-form-checkbox name="permissions[]" label="Write" value="write" />
    <x-form-checkbox name="permissions[]" label="Delete" value="delete" />
</div>
```

### Checkbox with Array Binding
```blade
<x-form-checkbox name="interests[]" label="Technology" value="tech" :bind="$user->interests" />
```

## Real Project Examples

### User Registration Form
```blade
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <x-form-input name="name" label="Full Name" required />
    <x-form-email name="email" label="Email Address" required />
    <x-form-password name="password" label="Password" required />
    
    <x-form-checkbox name="terms" label="I agree to the terms and conditions" required />
    <x-form-checkbox name="newsletter" label="Subscribe to newsletter" 
        help="Receive updates about new features" />
    <x-form-checkbox name="marketing" label="Allow marketing emails" 
        help="We'll send you promotional content" />
    
    <x-form-submit>Register</x-form-submit>
</form>
```

### Settings Configuration
```blade
<div class="settings-section">
    <h3>Notification Settings</h3>
    
    <x-form-checkbox name="email_notifications" label="Email notifications" 
        :bind="$user->settings" help="Receive notifications via email" />
    
    <x-form-checkbox name="sms_notifications" label="SMS notifications" 
        :bind="$user->settings" help="Receive notifications via SMS" />
    
    <x-form-checkbox name="push_notifications" label="Push notifications" 
        :bind="$user->settings" help="Receive browser push notifications" />
    
    <x-form-checkbox name="marketing_emails" label="Marketing emails" 
        :bind="$user->settings" help="Receive promotional content" />
</div>
```

### Product Configuration
```blade
<div class="product-options">
    <h4>Product Features</h4>
    
    <x-form-checkbox name="features[]" label="Free shipping" value="free_shipping" 
        :bind="$product->features" />
    
    <x-form-checkbox name="features[]" label="Warranty" value="warranty" 
        :bind="$product->features" />
    
    <x-form-checkbox name="features[]" label="Installation service" value="installation" 
        :bind="$product->features" />
    
    <x-form-checkbox name="features[]" label="Extended support" value="support" 
        :bind="$product->features" />
</div>
```

### User Permissions
```blade
<div class="permissions-grid">
    <h4>User Permissions</h4>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-checkbox name="permissions[]" label="View users" value="users.view" 
                :bind="$role->permissions" />
            <x-form-checkbox name="permissions[]" label="Create users" value="users.create" 
                :bind="$role->permissions" />
            <x-form-checkbox name="permissions[]" label="Edit users" value="users.edit" 
                :bind="$role->permissions" />
            <x-form-checkbox name="permissions[]" label="Delete users" value="users.delete" 
                :bind="$role->permissions" />
        </div>
        <div class="col-md-6">
            <x-form-checkbox name="permissions[]" label="View posts" value="posts.view" 
                :bind="$role->permissions" />
            <x-form-checkbox name="permissions[]" label="Create posts" value="posts.create" 
                :bind="$role->permissions" />
            <x-form-checkbox name="permissions[]" label="Edit posts" value="posts.edit" 
                :bind="$role->permissions" />
            <x-form-checkbox name="permissions[]" label="Delete posts" value="posts.delete" 
                :bind="$role->permissions" />
        </div>
    </div>
</div>
```

### E-commerce Product Options
```blade
<div class="product-options">
    <h4>Product Options</h4>
    
    <x-form-checkbox name="options[]" label="Available in multiple colors" value="colors" 
        :bind="$product->options" />
    
    <x-form-checkbox name="options[]" label="Available in multiple sizes" value="sizes" 
        :bind="$product->options" />
    
    <x-form-checkbox name="options[]" label="Express shipping available" value="express_shipping" 
        :bind="$product->options" />
    
    <x-form-checkbox name="options[]" label="Gift wrapping available" value="gift_wrapping" 
        :bind="$product->options" />
    
    <x-form-checkbox name="options[]" label="Installation service" value="installation" 
        :bind="$product->options" />
</div>
```

### Contact Form Preferences
```blade
<div class="contact-preferences">
    <h4>Contact Preferences</h4>
    
    <x-form-checkbox name="contact_methods[]" label="Email" value="email" 
        :bind="$contact->preferences" />
    
    <x-form-checkbox name="contact_methods[]" label="Phone" value="phone" 
        :bind="$contact->preferences" />
    
    <x-form-checkbox name="contact_methods[]" label="SMS" value="sms" 
        :bind="$contact->preferences" />
    
    <x-form-checkbox name="contact_methods[]" label="Postal mail" value="mail" 
        :bind="$contact->preferences" />
    
    <x-form-checkbox name="urgent_contact" label="Allow urgent contact outside business hours" 
        :bind="$contact->preferences" 
        help="We may contact you for urgent matters even outside business hours" />
</div>
```

### System Configuration
```blade
<div class="system-settings">
    <h4>System Configuration</h4>
    
    <x-form-checkbox name="maintenance_mode" label="Maintenance mode" 
        :bind="$settings" help="Enable maintenance mode for system updates" />
    
    <x-form-checkbox name="debug_mode" label="Debug mode" 
        :bind="$settings" help="Enable debug logging (development only)" />
    
    <x-form-checkbox name="auto_backup" label="Automatic backups" 
        :bind="$settings" help="Automatically backup data daily" />
    
    <x-form-checkbox name="email_notifications" label="Email notifications" 
        :bind="$settings" help="Send system notifications via email" />
    
    <x-form-checkbox name="two_factor_auth" label="Two-factor authentication" 
        :bind="$settings" help="Require 2FA for all users" />
</div>
```

### Livewire Component Example
```blade
<div>
    <h3>User Preferences</h3>
    
    <x-form-checkbox name="dark_mode" label="Dark mode" wire:model="darkMode" />
    
    <x-form-checkbox name="notifications" label="Enable notifications" wire:model="notifications" />
    
    <x-form-checkbox name="auto_save" label="Auto-save drafts" wire:model="autoSave" 
        help="Automatically save your work as you type" />
    
    <x-form-checkbox name="public_profile" label="Public profile" wire:model="publicProfile" 
        help="Allow others to view your profile" />
    
    <div class="mt-3">
        <button wire:click="savePreferences" class="btn btn-primary">Save Preferences</button>
    </div>
</div>
```

## Advanced Features

### Array Binding
```blade
<!-- With array of values -->
<x-form-checkbox name="interests[]" label="Technology" value="tech" :bind="$user->interests" />
<x-form-checkbox name="interests[]" label="Sports" value="sports" :bind="$user->interests" />
<x-form-checkbox name="interests[]" label="Music" value="music" :bind="$user->interests" />
```

### Collection Binding
```blade
<!-- With Laravel Collection -->
<x-form-checkbox name="tags[]" label="Laravel" value="laravel" :bind="$post->tags" />
<x-form-checkbox name="tags[]" label="Vue.js" value="vue" :bind="$post->tags" />
<x-form-checkbox name="tags[]" label="React" value="react" :bind="$post->tags" />
```

### Custom Copy Values
```blade
<!-- Custom unchecked value -->
<x-form-checkbox name="status" label="Active" value="active" copy="inactive" />

<!-- No hidden input -->
<x-form-checkbox name="feature" label="Enable feature" :copy="false" />
```

### Inline Display
```blade
<div class="checkbox-group">
    <x-form-checkbox name="options[]" label="Option 1" value="1" inline />
    <x-form-checkbox name="options[]" label="Option 2" value="2" inline />
    <x-form-checkbox name="options[]" label="Option 3" value="3" inline />
</div>
```

### Compact Display
```blade
<div class="compact-checkboxes">
    <x-form-checkbox name="quick_actions[]" label="Edit" value="edit" compact />
    <x-form-checkbox name="quick_actions[]" label="Delete" value="delete" compact />
    <x-form-checkbox name="quick_actions[]" label="Share" value="share" compact />
</div>
```

## Styling and Customization

### Custom CSS Classes
```blade
<x-form-checkbox name="custom" label="Custom styled checkbox" class="custom-checkbox" />
```

### Custom Styling
```blade
<x-form-checkbox name="styled" label="Styled checkbox" 
    style="margin: 1rem; padding: 0.5rem;" />
```

### Bootstrap Utilities
```blade
<x-form-checkbox name="utilities" label="With utilities" 
    class="border border-primary bg-light" />
```

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-checkbox name="terms" label="I agree to terms" required />
```

### Validation Rules
```php
// In your controller
$request->validate([
    'terms' => 'required|accepted',
    'newsletter' => 'boolean',
    'permissions' => 'array',
    'permissions.*' => 'string|in:read,write,delete',
]);
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-check` - Base checkbox container
- `form-check-inline` - Inline display styling
- `form-check-input` - Checkbox input styling
- `form-check-label` - Checkbox label styling
- `is-invalid` - Error state styling
- `m-0` - Compact display (no margins)

## JavaScript Integration

The component can be enhanced with JavaScript:

```javascript
// Handle checkbox changes
document.querySelectorAll('.form-check-input').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Handle checkbox state change
        console.log('Checkbox changed:', this.name, this.checked);
    });
});

// Custom validation
function validateCheckboxes() {
    const requiredCheckboxes = document.querySelectorAll('[required]');
    let isValid = true;
    
    requiredCheckboxes.forEach(checkbox => {
        if (!checkbox.checked) {
            isValid = false;
            checkbox.classList.add('is-invalid');
        } else {
            checkbox.classList.remove('is-invalid');
        }
    });
    
    return isValid;
}
```

## Accessibility Features

- Proper label association
- ARIA attributes for screen readers
- Keyboard navigation support
- Focus management
- Error state announcements

```blade
<x-form-checkbox name="accessible" label="Accessible checkbox" 
    aria-describedby="help-text" aria-required="true" />
```

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **CSS Grid**: Full support
- **Flexbox**: Full support
- **CSS Custom Properties**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**Checkbox not showing as checked**
```blade
<!-- Ensure proper binding -->
<x-form-checkbox name="active" label="Active" :bind="$model" />
```

**Multiple checkboxes not working**
```blade
<!-- Use array notation for multiple values -->
<x-form-checkbox name="permissions[]" label="Read" value="read" />
<x-form-checkbox name="permissions[]" label="Write" value="write" />
```

**Validation errors not showing**
```blade
<!-- Ensure validation rules are set -->
<x-form-checkbox name="terms" label="I agree" required />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Input](form-input.md) - Base input component
- [Form Radio](form-radio.md) - Radio button component
- [Form Switch](form-switch.md) - Switch/toggle component
- [Form Label](form-label.md) - Label component
- [Form Errors](form-errors.md) - Error display component

## Performance

### Optimization Tips
1. **Use appropriate binding** for automatic state management
2. **Minimize inline styles** when possible
3. **Use Bootstrap classes** for consistent styling
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~3KB
- **With Bootstrap**: ~50KB (one-time load)
- **With Custom CSS**: ~2KB
- **Full Package**: ~55KB

## Examples Gallery

### Basic Checkboxes
```blade
<!-- Simple checkbox -->
<x-form-checkbox name="agree" label="I agree" />

<!-- With value -->
<x-form-checkbox name="status" label="Active" value="active" />

<!-- Required -->
<x-form-checkbox name="terms" label="Accept terms" required />
```

### Advanced Checkboxes
```blade
<!-- With binding -->
<x-form-checkbox name="is_active" label="Active user" :bind="$user" />

<!-- With help text -->
<x-form-checkbox name="newsletter" label="Newsletter" 
    help="Receive updates" />

<!-- Inline display -->
<x-form-checkbox name="options[]" label="Option 1" value="1" inline />
<x-form-checkbox name="options[]" label="Option 2" value="2" inline />
```

## Changelog

### Version 2.0
- Added array binding support
- Enhanced validation integration
- Improved accessibility features
- Added inline and compact display options

### Version 1.0
- Initial release
- Basic checkbox functionality
- Simple styling support
- Bootstrap integration

## Contributing

When contributing to the Form Checkbox component:

1. **Test validation behavior** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-form-components` package and is licensed under the MIT License.
