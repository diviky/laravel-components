# Form Email Component

A specialized email input component that provides a professional interface for email addresses with automatic email validation, comprehensive form integration, and enhanced user experience. This component extends FormInput to offer intuitive email input experiences with proper formatting and validation support.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-email.blade.php`
- **Documentation:** `docs/form-email.md`

## Basic Usage

### Simple Email Input
```blade
<x-form-email name="email" label="Email Address" />
```

### With Default Value
```blade
<x-form-email 
    name="user_email" 
    label="User Email"
    :default="'user@example.com'">
</x-form-email>
```

### With Help Text
```blade
<x-form-email 
    name="contact_email" 
    label="Contact Email"
    help="We'll use this email to send you important updates">
</x-form-email>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'email'` or `'user_email'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Email Address'` |
| value | mixed | null | Current email value | `'user@example.com'` |
| default | mixed | null | Default email value | `'admin@example.com'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'email']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'email-input'` |
| class | string | '' | CSS classes | `'email-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Enter your email'` |
| pattern | string | null | Email validation pattern | `'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'` |
| maxlength | number | null | Maximum email length | `254` |
| minlength | number | null | Minimum email length | `5` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'enter-email'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the email input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Enter a valid email address. We'll use this to send you important updates and notifications.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the email input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-email name="email">
    <small class="text-muted">We'll never share your email with anyone else</small>
</x-form-email>
```

## Usage Examples

### Basic Email Input
```blade
<x-form-email 
    name="email" 
    label="Email Address">
    
    <x-slot:help>
        Enter your email address to receive updates
    </x-slot:help>
</x-form-email>
```

### Required Email Input
```blade
<x-form-email 
    name="user_email" 
    label="User Email"
    required>
    
    <x-slot:help>
        This field is required to create your account
    </x-slot:help>
</x-form-email>
```

### With Custom Validation Pattern
```blade
<x-form-email 
    name="business_email" 
    label="Business Email"
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
    title="Please enter a valid email address">
    
    <x-slot:help>
        Enter your business email address
    </x-slot:help>
</x-form-email>
```

### With Model Binding
```blade
<x-form-email 
    name="profile_email" 
    label="Profile Email"
    :bind="$user"
    bind-key="email">
    
    <x-slot:help>
        Update your profile email address
    </x-slot:help>
</x-form-email>
```

### Livewire Integration
```blade
<x-form-email 
    wire:model="form.email"
    name="registration_email" 
    label="Registration Email"
    required>
    
    <x-slot:help>
        <div class="email-validation">
            <strong>Email Status:</strong> 
            <span class="badge" :class="$wire.form.email && isValidEmail($wire.form.email) ? 'bg-success' : 'bg-secondary'">
                {{ $wire.form.email && isValidEmail($wire.form.email) ? 'Valid' : 'Invalid' }}
            </span>
        </div>
    </x-slot:help>
</x-form-email>
```

### With Custom Classes
```blade
<x-form-email 
    name="custom_email" 
    label="Custom Email"
    class="email-input-lg"
    placeholder="Enter your custom email address">
    
    <x-slot:help>
        <div class="email-tips">
            <i class="fas fa-envelope"></i>
            <strong>Tip:</strong> Use a professional email address
        </div>
    </x-slot:help>
</x-form-email>
```

### Disabled Email Field
```blade
<x-form-email 
    name="locked_email" 
    label="Email"
    disabled>
    
    <x-slot:help>
        This email field is locked and cannot be changed
    </x-slot:help>
</x-form-email>
```

### Readonly Email Field
```blade
<x-form-email 
    name="display_email" 
    label="Current Email"
    readonly>
    
    <x-slot:help>
        Your current email address (cannot be edited)
    </x-slot:help>
</x-form-email>
```

## Component Variants

### Standard Email Input
**Usage:** `<x-form-email>` (default)
**Description:** Basic email input with standard validation
**Features:**
- HTML5 email input type
- Standard email validation
- Help and default slot support
- FormInput extension

### Custom Email Input
**Usage:** `<x-form-email pattern="custom-pattern">`
**Description:** Email input with custom validation pattern
**Features:**
- Custom validation patterns
- Enhanced validation rules
- Flexible email format support
- Improved user experience

### Enhanced Email Input
**Usage:** `<x-form-email maxlength="254" minlength="5">`
**Description:** Email input with length constraints
**Features:**
- Length validation
- Character count limits
- Enhanced validation feedback
- Professional email handling

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-email>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-email' => [
        'view' => 'laravel-components::{framework}.form-email',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'email'`
- **Validation:** HTML5 email validation
- **Pattern:** Standard email pattern
- **Length:** No default constraints

### Email Validation Patterns
```html
<!-- Standard email pattern -->
pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"

<!-- Strict email pattern -->
pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"

<!-- Business email pattern -->
pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
```

## Common Patterns

### User Registration Form
```blade
<div class="user-registration-form">
    <h4>Create Your Account</h4>
    <p>Enter your information to get started:</p>
    
    <x-form-email 
        name="registration_email" 
        label="Email Address"
        required>
        
        <x-slot:help>
            <strong>Email Requirements:</strong><br>
            • Must be a valid email format<br>
            • Will be used for account verification<br>
            • We'll send a confirmation email<br>
            • Choose a professional email address
        </x-slot:help>
    </x-form-email>
    
    <x-form-email 
        name="confirm_email" 
        label="Confirm Email"
        required>
        
        <x-slot:help>
            Please confirm your email address to ensure accuracy
        </x-slot:help>
    </x-form-email>
    
    <div class="email-validation mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Email Validation:</h6>
                <div class="validation-checks">
                    <p class="mb-1"><strong>Format:</strong> <span x-text="isValidEmail($wire.registrationEmail) ? '✅ Valid' : '❌ Invalid'">Checking...</span></p>
                    <p class="mb-1"><strong>Match:</strong> <span x-text="emailsMatch() ? '✅ Match' : '❌ No Match'">Checking...</span></p>
                    <p class="mb-0"><strong>Availability:</strong> <span x-text="emailAvailable() ? '✅ Available' : '❌ Taken'">Checking...</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Contact Form
```blade
<div class="contact-form">
    <h4>Contact Us</h4>
    <p>Send us a message and we'll get back to you:</p>
    
    <x-form-email 
        name="contact_email" 
        label="Your Email"
        required>
        
        <x-slot:help>
            We'll use this email to respond to your inquiry
        </x-slot:help>
    </x-form-email>
    
    <x-form-email 
        name="reply_to_email" 
        label="Reply-to Email (Optional)"
        placeholder="Different email for replies">
        
        <x-slot:help>
            If you want us to reply to a different email address
        </x-slot:help>
    </x-form-email>
    
    <div class="contact-info mt-3">
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <strong>Response Time:</strong> We typically respond within 24 hours during business days.
        </div>
    </div>
</div>
```

### Newsletter Subscription
```blade
<div class="newsletter-subscription">
    <h4>Stay Updated</h4>
    <p>Subscribe to our newsletter for the latest updates:</p>
    
    <x-form-email 
        name="newsletter_email" 
        label="Email Address"
        placeholder="your@email.com"
        required>
        
        <x-slot:help>
            <div class="newsletter-benefits">
                <strong>What you'll receive:</strong><br>
                • Weekly industry insights<br>
                • Product updates and announcements<br>
                • Exclusive offers and promotions<br>
                • Expert tips and tutorials
            </div>
        </x-slot:help>
    </x-form-email>
    
    <div class="subscription-options mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="marketing_emails">
            <label class="form-check-label" for="marketing_emails">
                I also want to receive marketing emails
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="weekly_digest">
            <label class="form-check-label" for="weekly_digest">
                Send me a weekly digest instead of daily emails
            </label>
        </div>
    </div>
    
    <div class="privacy-note mt-3">
        <small class="text-muted">
            By subscribing, you agree to our <a href="/privacy">Privacy Policy</a> and consent to receive emails from us.
        </small>
    </div>
</div>
```

### Profile Management
```blade
<div class="profile-management">
    <h4>Email Preferences</h4>
    <p>Manage your email settings and preferences:</p>
    
    <x-form-email 
        name="primary_email" 
        label="Primary Email"
        required>
        
        <x-slot:help>
            This is your main email address for account communications
        </x-slot:help>
    </x-form-email>
    
    <x-form-email 
        name="secondary_email" 
        label="Secondary Email (Optional)"
        placeholder="backup@email.com">
        
        <x-slot:help>
            Backup email for important notifications
        </x-slot:help>
    </x-form-email>
    
    <x-form-email 
        name="work_email" 
        label="Work Email (Optional)"
        placeholder="name@company.com">
        
        <x-slot:help>
            Professional email for business communications
        </x-slot:help>
    </x-form-email>
    
    <div class="email-preferences mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Email Preferences:</h6>
                <div class="preference-options">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="account_emails" checked>
                        <label class="form-check-label" for="account_emails">
                            Account and security notifications
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="marketing_emails">
                        <label class="form-check-label" for="marketing_emails">
                            Marketing and promotional emails
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newsletter_emails">
                        <label class="form-check-label" for="newsletter_emails">
                            Newsletter and updates
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Password Reset
```blade
<div class="password-reset-form">
    <h4>Reset Your Password</h4>
    <p>Enter your email address to receive password reset instructions:</p>
    
    <x-form-email 
        name="reset_email" 
        label="Email Address"
        placeholder="Enter the email associated with your account"
        required>
        
        <x-slot:help>
            <div class="reset-instructions">
                <strong>What happens next:</strong><br>
                1. Enter your email address<br>
                2. Check your inbox for reset instructions<br>
                3. Click the reset link in the email<br>
                4. Create a new password
            </div>
        </x-slot:help>
    </x-form-email>
    
    <div class="reset-note mt-3">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Note:</strong> If you don't receive an email within a few minutes, check your spam folder.
        </div>
    </div>
    
    <div class="back-to-login mt-3">
        <a href="/login" class="btn btn-link">
            <i class="fas fa-arrow-left"></i> Back to Login
        </a>
    </div>
</div>
```

### Email Verification
```blade
<div class="email-verification">
    <h4>Verify Your Email</h4>
    <p>We've sent a verification code to your email address:</p>
    
    <x-form-email 
        name="verification_email" 
        label="Email Address"
        readonly>
        
        <x-slot:help>
            This is the email where we sent your verification code
        </x-slot:help>
    </x-form-email>
    
    <div class="verification-code mt-3">
        <label for="verification_code" class="form-label">Verification Code</label>
        <input type="text" class="form-control" id="verification_code" placeholder="Enter 6-digit code" maxlength="6">
        <div class="form-text">
            Enter the 6-digit code sent to your email
        </div>
    </div>
    
    <div class="verification-actions mt-3">
        <button type="button" class="btn btn-primary">Verify Email</button>
        <button type="button" class="btn btn-secondary">Resend Code</button>
    </div>
    
    <div class="verification-help mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Need Help?</h6>
                <ul class="mb-0">
                    <li>Check your spam/junk folder</li>
                    <li>Make sure the email address is correct</li>
                    <li>Wait a few minutes for the email to arrive</li>
                    <li>Contact support if you continue to have issues</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_email_with_basic_attributes()
{
    $view = $this->blade('<x-form-email name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-email');
}

/** @test */
public function it_renders_form_email_with_email_type()
{
    $view = $this->blade('<x-form-email name="test" />');
    
    $view->assertSee('type="email"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(EmailComponent::class)
        ->assertSee('<x-form-email')
        ->set('email', 'test@example.com')
        ->assertSee('test@example.com');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to email input
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to email input
- Text input for email addresses
- Enter key for form submission
- Escape key to clear focus

### Screen Reader Support
- Proper labeling and descriptions
- Email format announcements
- Help text communication
- Error message communication

### Email Accessibility
- Clear email format indication
- Proper validation feedback
- Helpful error messages
- Format guidance

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 email input type

## Troubleshooting

### Common Issues

#### Email Validation Not Working
**Problem:** Email validation not functioning correctly
**Solution:** Check HTML5 email input support and validation patterns

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Email Pattern Issues
**Problem:** Custom email patterns not working
**Solution:** Verify pattern attribute syntax and regex validity

#### Styling Issues
**Problem:** Email input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Validation Issues
**Problem:** Email validation errors not displaying
**Solution:** Check form validation rules and error handling

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Text:** Text input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with HTML5 email input type
- FormInput extension with email validation
- Help and default slot support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-email.blade.php`
2. Add/update tests in `tests/Components/FormEmailTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Text Component](../form-text.md)
- [HTML5 Email Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/email)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
