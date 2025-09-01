# Form Password Component

A sophisticated password input component with Alpine.js integration for password visibility toggling, featuring eye icons for show/hide functionality and comprehensive form integration. This component provides a secure and user-friendly password input experience with modern JavaScript interactivity and professional styling.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js for interactivity, extends FormInput
**JavaScript Library:** Alpine.js (password visibility toggle)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-password.blade.php`
- **Documentation:** `docs/form-password.md`

## Basic Usage

### Simple Password Input
```blade
<x-form-password name="password" label="Password" />
```

### With Help Text
```blade
<x-form-password 
    name="password" 
    label="Password"
    help="Must be at least 8 characters long">
</x-form-password>
```

### With Validation
```blade
<x-form-password 
    name="password" 
    label="Password"
    required
    minlength="8">
</x-form-password>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'password'` or `'confirm_password'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Enter Password'` |
| value | mixed | null | Current password value | `'current_password'` |
| default | mixed | null | Default password value | `''` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'password']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'password-input'` |
| class | string | '' | CSS classes | `'password-field'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Enter your password'` |
| minlength | integer | null | Minimum password length | `8` |
| maxlength | integer | null | Maximum password length | `128` |
| pattern | string | null | Password pattern regex | `'^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'change-password'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'update'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the password input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Password must be at least 8 characters and contain letters and numbers.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the password input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-password name="password">
    <small class="text-muted">Password strength indicator will appear here</small>
</x-form-password>
```

## Usage Examples

### Basic Password Input
```blade
<x-form-password 
    name="password" 
    label="Password">
    
    <x-slot:help>
        Enter your password to access your account
    </x-slot:help>
</x-form-password>
```

### Required Password with Validation
```blade
<x-form-password 
    name="password" 
    label="Password"
    required
    minlength="8"
    maxlength="128"
    pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
    
    <x-slot:help>
        <strong>Password requirements:</strong><br>
        • Minimum 8 characters<br>
        • At least one letter and one number<br>
        • Maximum 128 characters
    </x-slot:help>
</x-form-password>
```

### Password Confirmation
```blade
<div class="row">
    <div class="col-md-6">
        <x-form-password 
            name="password" 
            label="New Password"
            required
            minlength="8">
            
            <x-slot:help>
                Create a strong password for your account
            </x-slot:help>
        </x-form-password>
    </div>
    
    <div class="col-md-6">
        <x-form-password 
            name="password_confirmation" 
            label="Confirm Password"
            required
            minlength="8">
            
            <x-slot:help>
                Re-enter your password to confirm
            </x-slot:help>
        </x-form-password>
    </div>
</div>
```

### With Model Binding
```blade
<x-form-password 
    name="user_password" 
    label="Your Password"
    :bind="$user"
    bind-key="password">
    
    <x-slot:help>
        Update your account password
    </x-slot:help>
</x-form-password>
```

### Livewire Integration
```blade
<x-form-password 
    wire:model="form.password"
    name="password" 
    label="Password"
    required>
    
    <x-slot:help>
        <div class="password-strength">
            <strong>Strength:</strong> 
            <span class="badge" :class="getPasswordStrengthClass()">
                {{ getPasswordStrengthText() }}
            </span>
        </div>
    </x-slot:help>
</x-form-password>
```

### With Custom Classes
```blade
<x-form-password 
    name="password" 
    label="Password"
    class="password-field-lg"
    placeholder="Enter your secure password">
    
    <x-slot:help>
        <div class="password-tips">
            <i class="fas fa-lightbulb"></i>
            <strong>Tip:</strong> Use a mix of uppercase, lowercase, numbers, and symbols
        </div>
    </x-slot:help>
</x-form-password>
```

### Disabled Password Field
```blade
<x-form-password 
    name="locked_password" 
    label="Password"
    disabled>
    
    <x-slot:help>
        This password field is locked and cannot be changed
    </x-slot:help>
</x-form-password>
```

### Readonly Password Field
```blade
<x-form-password 
    name="display_password" 
    label="Current Password"
    readonly>
    
    <x-slot:help>
        Your current password (cannot be edited)
    </x-slot:help>
</x-form-password>
```

## Component Variants

### Standard Password Input
**Usage:** `<x-form-password>` (default)
**Description:** Basic password input with visibility toggle
**Features:**
- Password visibility toggle with eye icons
- Alpine.js integration for interactivity
- FormInput extension with comprehensive attributes
- Help and default slots

### Interactive Password Input
**Usage:** `<x-form-password x-data="customPassword">`
**Description:** Password input with custom Alpine.js functionality
**Features:**
- Custom password validation logic
- Password strength indicators
- Real-time feedback and suggestions
- Enhanced user experience

### Secure Password Input
**Usage:** `<x-form-password :attributes="['autocomplete' => 'new-password']">`
**Description:** Password input with enhanced security features
**Features:**
- Autocomplete prevention
- Secure password handling
- Validation patterns
- Accessibility compliance

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-password>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-password' => [
        'view' => 'laravel-components::{framework}.form-password',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'password'` (with toggle to `'text'`)
- **Show State:** `true` (password hidden by default)
- **Icons:** Eye and eye-closed icons
- **Toggle Behavior:** Click to show/hide password

### Alpine.js Configuration
```javascript
x-data="{ show: true }"
```
- **show:** Boolean controlling password visibility
- **Toggle Logic:** `show = !show` on icon click
- **Icon Display:** Conditional classes based on show state

## Common Patterns

### User Registration Form
```blade
<div class="registration-form">
    <h4>Create Your Account</h4>
    <p>Please provide your information to create an account:</p>
    
    <x-form-password 
        name="password" 
        label="Password"
        required
        minlength="8"
        maxlength="128">
        
        <x-slot:help>
            <div class="password-requirements">
                <strong>Password must contain:</strong>
                <ul class="mb-0">
                    <li>At least 8 characters</li>
                    <li>One uppercase letter</li>
                    <li>One lowercase letter</li>
                    <li>One number</li>
                    <li>One special character</li>
                </ul>
            </div>
        </x-slot:help>
    </x-form-password>
    
    <x-form-password 
        name="password_confirmation" 
        label="Confirm Password"
        required
        minlength="8">
        
        <x-slot:help>
            Re-enter your password to confirm it matches
        </x-slot:help>
    </x-form-password>
    
    <div class="form-note mt-3">
        <div class="alert alert-info">
            <i class="fas fa-shield-alt"></i>
            <strong>Security Note:</strong> 
            Your password is encrypted and never stored in plain text. 
            We recommend using a unique password for this account.
        </div>
    </div>
</div>
```

### Password Change Form
```blade
<div class="password-change-form">
    <h4>Change Your Password</h4>
    <p>Update your account password:</p>
    
    <x-form-password 
        name="current_password" 
        label="Current Password"
        required>
        
        <x-slot:help>
            Enter your current password to verify your identity
        </x-slot:help>
    </x-form-password>
    
    <x-form-password 
        name="new_password" 
        label="New Password"
        required
        minlength="8">
        
        <x-slot:help>
            <div class="password-strength-meter">
                <strong>Password Strength:</strong>
                <div class="progress mt-2" style="height: 8px;">
                    <div class="progress-bar" 
                         :class="getStrengthClass()" 
                         :style="'width: ' + getStrengthPercentage() + '%'">
                    </div>
                </div>
                <small class="text-muted" x-text="getStrengthText()">
                    <!-- Strength text will be calculated by JavaScript -->
                </small>
            </div>
        </x-slot:help>
    </x-form-password>
    
    <x-form-password 
        name="new_password_confirmation" 
        label="Confirm New Password"
        required
        minlength="8">
        
        <x-slot:help>
            Re-enter your new password to confirm
        </x-slot:help>
    </x-form-password>
    
    <div class="password-policy mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Password Policy:</h6>
                <ul class="mb-0 text-muted">
                    <li>Minimum 8 characters</li>
                    <li>Cannot be the same as your current password</li>
                    <li>Must be different from your last 5 passwords</li>
                    <li>Will expire in 90 days</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

### Admin User Management
```blade
<div class="admin-user-form">
    <h4>Manage User Account</h4>
    <p>Update user account settings:</p>
    
    <x-form-password 
        name="admin_password" 
        label="Admin Password"
        required
        minlength="12">
        
        <x-slot:help>
            <div class="admin-password-requirements">
                <strong>Admin Password Requirements:</strong><br>
                • Minimum 12 characters<br>
                • Must include uppercase, lowercase, numbers, and symbols<br>
                • Cannot contain common words or patterns<br>
                • Must be changed every 30 days
            </div>
        </x-slot:help>
    </x-form-password>
    
    <div class="admin-security-note mt-3">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Security Warning:</strong> 
            Admin passwords have higher security requirements and shorter expiration periods. 
            Ensure strong password practices are followed.
        </div>
    </div>
</div>
```

### Password Reset Form
```blade
<div class="password-reset-form">
    <h4>Reset Your Password</h4>
    <p>Enter your new password below:</p>
    
    <x-form-password 
        name="reset_password" 
        label="New Password"
        required
        minlength="8">
        
        <x-slot:help>
            <div class="reset-password-help">
                <strong>Create a strong password:</strong><br>
                • Use a mix of letters, numbers, and symbols<br>
                • Avoid personal information<br>
                • Make it unique to this account<br>
                • Consider using a passphrase
            </div>
        </x-slot:help>
    </x-form-password>
    
    <x-form-password 
        name="reset_password_confirmation" 
        label="Confirm New Password"
        required
        minlength="8">
        
        <x-slot:help>
            Re-enter your new password to confirm
        </x-slot:help>
    </x-form-password>
    
    <div class="reset-success-note mt-3">
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <strong>Success:</strong> 
            Your password has been reset. You can now log in with your new password.
        </div>
    </div>
</div>
```

### API Key Management
```blade
<div class="api-key-form">
    <h4>Generate API Key</h4>
    <p>Create a secure API key for external access:</p>
    
    <x-form-password 
        name="api_secret" 
        label="API Secret"
        required
        minlength="32"
        maxlength="128">
        
        <x-slot:help>
            <div class="api-secret-help">
                <strong>API Secret Requirements:</strong><br>
                • Minimum 32 characters for security<br>
                • Use random characters and symbols<br>
                • Store securely and never share<br>
                • Rotate regularly for security
            </div>
        </x-slot:help>
    </x-form-password>
    
    <div class="api-security-note mt-3">
        <div class="alert alert-danger">
            <i class="fas fa-shield-alt"></i>
            <strong>Security Critical:</strong> 
            API secrets provide full access to your account. 
            Keep them secure and never expose them in client-side code.
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_password_with_basic_attributes()
{
    $view = $this->blade('<x-form-password name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-password');
}

/** @test */
public function it_renders_form_password_with_alpine_data()
{
    $view = $this->blade('<x-form-password name="test" />');
    
    $view->assertSee('x-data');
    $view->assertSee('show: true');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(PasswordComponent::class)
        ->assertSee('<x-form-password')
        ->set('password', 'newpassword123')
        ->assertSee('newpassword123');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to password input
- `aria-describedby`: Links to help text
- `role="button"`: Applied to toggle buttons

### Keyboard Navigation
- Tab navigation to password input
- Enter key to submit form
- Space key to toggle password visibility
- Escape key to close any open dialogs

### Screen Reader Support
- Proper labeling and descriptions
- Password visibility state announcements
- Help text communication
- Error message communication

### Security Considerations
- Password visibility toggle for user convenience
- Secure password handling
- Input type switching for accessibility
- Proper autocomplete attributes

## Browser Compatibility

- **Supported Browsers:** All modern browsers with JavaScript support
- **JavaScript Dependencies:** Alpine.js library
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 password and text input types

## Troubleshooting

### Common Issues

#### Password Toggle Not Working
**Problem:** Password visibility toggle not functioning
**Solution:** Check Alpine.js loading and JavaScript console for errors

#### Icons Not Displaying
**Problem:** Eye icons not showing
**Solution:** Verify icon component availability and CSS loading

#### Form Submission Issues
**Problem:** Password not submitting correctly
**Solution:** Check form structure and validation rules

#### Styling Problems
**Problem:** Password field not styled correctly
**Solution:** Verify Bootstrap CSS and custom styles are loaded

#### Alpine.js Integration Issues
**Problem:** Alpine.js functionality not working
**Solution:** Check Alpine.js installation and initialization

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Icon:** Icon display component
- **Form Button:** Form submission buttons

## Changelog

### Version 1.0.0
- Initial release with Alpine.js integration
- Password visibility toggle functionality
- Eye icon integration for show/hide
- FormInput extension with comprehensive attributes
- Help and default slot support

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-password.blade.php`
2. Add/update tests in `tests/Components/FormPasswordTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Icon Component](../icon.md)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
