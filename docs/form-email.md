# Form Email Component

A specialized email input component that extends the base Form Input with email-specific functionality. This component provides a user-friendly way to handle email inputs with built-in email validation and proper HTML5 email input type.

## Overview

**Component Type:** View-Only Form Input Extension  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** `diviky/laravel-form-components` for base functionality  
**Location:** `resources/views/bootstrap-5/form-email.blade.php`

## Files

- **View File:** `resources/views/bootstrap-5/form-email.blade.php`
- **Documentation:** `docs/form-email.md`
- **Tests:** `tests/Components/FormEmailTest.php`

## Basic Usage

```blade
<x-form-email name="email" label="Email Address" placeholder="Enter your email" required />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Email field name (required) | `'email'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Email label text | `'Email Address'` |
| value | string | null | Initial email value | `'user@example.com'` |
| placeholder | string | null | Placeholder text | `'Enter your email'` |
| required | boolean | false | Whether field is required | `true` |
| readonly | boolean | false | Whether field is readonly | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| size | string | null | Input size variant | `'sm'`, `'lg'` |
| icon | string | null | Icon name to display | `'mail'` |
| floating | boolean | false | Use floating label style | `true` |
| flat | boolean | false | Use flat input group style | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| help | string | null | Help text below input | `'We\'ll never share your email'` |
| id | string | auto-generated | Input ID attribute | `'user-email'` |
| title | string | null | Title attribute for tooltip | `'Enter a valid email address'` |
| class | string | null | Additional CSS classes | `'custom-email'` |
| wire:model | string | null | Livewire model binding | `'user.email'` |
| extra-attributes | string | null | Additional HTML attributes | `'data-custom="value"'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| default | string | null | Default value | `'default@example.com'` |
| bind | mixed | null | Model binding value | `$user->email` |
| language | string | null | Language-specific field | `'en'` |
| showErrors | boolean | true | Show validation errors | `false` |

### Inherited Attributes

This component supports all standard HTML input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| pattern | string | null | Email pattern for validation | `'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'` |
| autocomplete | string | null | Autocomplete attribute | `'email'` |
| autofocus | boolean | false | Autofocus the input | `true` |
| form | string | null | Form ID to associate with | `'user-form'` |
| tabindex | string | null | Tab index | `'0'` |
| spellcheck | boolean | false | Enable spellcheck | `true` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to input | `<x-slot name="prepend">📧</x-slot>` |
| append | Content to append to input | `<x-slot name="append"><button>Verify</button></x-slot>` |
| before | Content before input (inside input group) | `<x-slot name="before"><span class="input-group-text">@</span></x-slot>` |
| after | Content after input (inside input group) | `<x-slot name="after"><button>Check</button></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |
| icon | Custom icon slot | `<x-slot name="icon"><x-icon name="custom" /></x-slot>` |

## Usage Examples

### Basic Email Input
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    placeholder="Enter your email" 
    required 
/>
```

### Email with Help Text
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    help="We'll never share your email with anyone else"
    required 
/>
```

### Email with Validation Pattern
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
    title="Please enter a valid email address"
    required 
/>
```

### Email with Icon
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    icon="mail" 
    placeholder="Enter your email" 
/>
```

### Floating Label Email
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    floating 
    placeholder="Enter your email" 
/>
```

### Email with Custom Size
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    size="lg" 
    placeholder="Enter your email" 
/>
```

### Livewire Email Input
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    wire:model.live="email" 
    placeholder="Enter your email" 
/>
```

### Email with Prepend Content
```blade
<x-form-email name="email" label="Email Address">
    <x-slot name="prepend">📧</x-slot>
</x-form-email>
```

### Email with Custom Help Slot
```blade
<x-form-email name="email" label="Email Address">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>We'll send a verification email to this address</span>
        </div>
    </x-slot>
</x-form-email>
```

### Email with Custom Icon Slot
```blade
<x-form-email name="email" label="Email Address">
    <x-slot name="icon">
        <x-icon name="envelope" class="text-primary" />
    </x-slot>
</x-form-email>
```

### Email with Before/After Content
```blade
<x-form-email name="email" label="Email Address">
    <x-slot name="before">
        <span class="input-group-text">@</span>
    </x-slot>
    <x-slot name="after">
        <button type="button" class="btn btn-outline-secondary">Verify</button>
    </x-slot>
</x-form-email>
```

### Disabled Email Input
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    disabled 
    value="cannot-change@example.com" 
/>
```

### Readonly Email Input
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    readonly 
    value="readonly@example.com" 
/>
```

### Email with Autocomplete
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    autocomplete="email" 
/>
```

### Email with Spellcheck
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    spellcheck="true" 
/>
```

## Real Project Examples

### User Registration Form
```blade
<x-form action="{{ route('users.store') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="first_name" label="First Name" required />
        </div>
        <div class="col-md-6">
            <x-form-input name="last_name" label="Last Name" required />
        </div>
    </div>
    
    <x-form-email 
        name="email" 
        label="Email Address" 
        placeholder="your@email.com"
        help="We'll send a verification email to this address"
        required 
    />
    
    <x-form-password 
        name="password" 
        label="Password" 
        placeholder="Create a strong password"
        required 
    />
    
    <x-form-submit>Create Account</x-form-submit>
</x-form>
```

### Contact Form
```blade
<x-form action="{{ route('contact.send') }}" method="POST">
    <x-form-input name="name" label="Full Name" required />
    
    <x-form-email 
        name="email" 
        label="Email Address" 
        placeholder="your@email.com"
        help="We'll respond to this email address"
        required 
    />
    
    <x-form-input name="subject" label="Subject" required />
    
    <x-form-textarea 
        name="message" 
        label="Message" 
        placeholder="Tell us how we can help..."
        rows="5"
        required 
    />
    
    <x-form-submit>Send Message</x-form-submit>
</x-form>
```

### Newsletter Signup
```blade
<x-form action="{{ route('newsletter.subscribe') }}" method="POST">
    <x-form-email 
        name="email" 
        label="Email Address" 
        placeholder="Enter your email address"
        help="Get the latest updates and news"
        required 
    >
        <x-slot name="append">
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </x-slot>
    </x-form-email>
</x-form>
```

### Settings Form
```blade
<x-form action="{{ route('settings.update') }}" method="PUT">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Profile Settings</h3>
        </div>
        <div class="card-body">
            <x-form-input name="name" label="Full Name" :value="$user->name" required />
            
            <x-form-email 
                name="email" 
                label="Email Address" 
                :value="$user->email"
                help="This email will be used for account notifications"
                required 
            />
            
            <x-form-input name="phone" label="Phone Number" :value="$user->phone" />
        </div>
    </div>
    
    <x-form-submit>Update Profile</x-form-submit>
</x-form>
```

### Login Form
```blade
<x-form action="{{ route('login') }}" method="POST">
    <x-form-email 
        name="email" 
        label="Email Address" 
        placeholder="your@email.com"
        autocomplete="email"
        required 
    />
    
    <x-form-password 
        name="password" 
        label="Password" 
        placeholder="Enter your password"
        autocomplete="current-password"
        required 
    />
    
    <div class="d-flex justify-content-between align-items-center">
        <x-form-checkbox name="remember" label="Remember me" />
        <a href="{{ route('password.request') }}">Forgot password?</a>
    </div>
    
    <x-form-submit>Sign In</x-form-submit>
</x-form>
```

## Features

### Email Validation
The component automatically includes email validation:
- **HTML5 Validation**: Browser-native email format validation
- **Pattern Validation**: Custom regex pattern support
- **Laravel Validation**: Server-side email validation integration
- **Real-time Validation**: Livewire validation support

### Form Integration
- **Automatic Validation**: Integrates with Laravel's validation system
- **Error Display**: Shows validation errors with proper styling
- **CSRF Protection**: Automatically includes CSRF tokens
- **Method Spoofing**: Supports PUT, PATCH, DELETE methods

### Styling Options
- **Size Variants**: `sm`, `lg` for different input sizes
- **Floating Labels**: Modern floating label design
- **Flat Style**: Alternative flat input group styling
- **Icon Support**: Built-in icon display with `x-icon`
- **Custom Classes**: Additional CSS class support

### Interactive Features
- **Livewire Integration**: Full Livewire model binding support
- **Real-time Validation**: Live validation with `wire:model.live`
- **Debounced Input**: Support for debounced model updates
- **Autocomplete**: HTML5 autocomplete attribute support

### Accessibility
- **ARIA Labels**: Proper accessibility labeling
- **Screen Reader Support**: Semantic HTML structure
- **Keyboard Navigation**: Full keyboard accessibility
- **Focus Management**: Proper focus handling

### Advanced Features
- **Language Support**: Multi-language field support
- **Model Binding**: Direct model property binding
- **Custom Validation**: Pattern and constraint validation
- **Spellcheck**: Built-in spellcheck support

## Common Patterns

### Email with Verification
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    wire:model.live="email"
    help="We'll send a verification code to this email"
>
    <x-slot name="after">
        <button type="button" class="btn btn-outline-primary" wire:click="sendVerification">
            Send Code
        </button>
    </x-slot>
</x-form-email>
```

### Email with Domain Validation
```blade
<x-form-email 
    name="email" 
    label="Work Email" 
    pattern="[a-z0-9._%+-]+@(company\.com|business\.org)$"
    title="Please use your work email address"
    help="Only company email addresses are allowed"
    required 
/>
```

### Email with Auto-suggestion
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    autocomplete="email"
    list="email-suggestions"
>
    <datalist id="email-suggestions">
        <option value="user@gmail.com">
        <option value="user@yahoo.com">
        <option value="user@hotmail.com">
    </datalist>
</x-form-email>
```

### Email with Loading State
```blade
<x-form-email 
    name="email" 
    label="Email Address" 
    wire:model.live="email"
    wire:loading.class="opacity-50"
    wire:target="email"
>
    <x-slot name="after">
        <div wire:loading wire:target="email">
            <x-icon name="spinner" class="spinner-border spinner-border-sm" />
        </div>
    </x-slot>
</x-form-email>
```

## Configuration

### Global Configuration
The component uses the global form components configuration from `diviky/laravel-form-components`:

```php
// config/form-components.php
return [
    'framework' => 'bootstrap-5',
    'floating_labels' => false,
    'show_errors' => true,
    'default_wire' => false,
];
```

### Component-Specific Configuration
```php
// In your service provider
Blade::component('form-email', FormEmail::class);
```

## JavaScript Integration

### Custom JavaScript
```javascript
// Custom email validation
document.querySelectorAll('[data-custom-email]').forEach(input => {
    input.addEventListener('input', function() {
        // Custom email validation
        validateEmailFormat(this.value);
    });
});
```

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('email-updated', (data) => {
    // Handle email updates
});
```

### Email Verification
```javascript
// Email verification functionality
function verifyEmail(email) {
    fetch('/api/verify-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        // Handle verification response
    });
}
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `aria-describedby` for help text
- `aria-invalid` for validation errors
- `aria-required` for required fields
- `aria-label` for icon-only inputs

### Keyboard Navigation
- Tab navigation through form fields
- Enter key submission
- Escape key for clearing input
- Space key for button activation

### Screen Reader Support
- Proper label association
- Descriptive help text
- Clear error messages
- Email format announcements

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: Not supported

### Feature Support
- **HTML5 Email Input**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Custom Properties**: Full support

## Troubleshooting

### Common Issues

**Email validation not working**
```blade
<!-- Ensure proper pattern attribute -->
<x-form-email name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
```

**Autocomplete not working**
```blade
<!-- Ensure autocomplete attribute is set -->
<x-form-email name="email" autocomplete="email" />
```

**Livewire binding issues**
```blade
<!-- Ensure proper wire:model syntax -->
<x-form-email name="email" wire:model="user.email" />
```

**Icon not displaying**
```blade
<!-- Ensure icon component is available -->
<x-form-email name="email" icon="mail" />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Input](form-input.md) - Base input component
- [Form Password](form-password.md) - Password input component
- [Form Number](form-number.md) - Number input component
- [Form Tel](form-tel.md) - Telephone input component
- [Form URL](form-url.md) - URL input component
- [Form Hidden](form-hidden.md) - Hidden input component
- [Form Select](form-select.md) - Select dropdown component
- [Form Textarea](form-textarea.md) - Multi-line text input component
- [Form Checkbox](form-checkbox.md) - Checkbox input component
- [Form Switch](form-switch.md) - Toggle switch component

## Performance

### Optimization Tips
1. **Use `wire:model.lazy`** for less critical email updates
2. **Minimize re-renders** with proper Livewire optimization
3. **Cache validation rules** when appropriate
4. **Use debounced validation** for real-time email checking

### Bundle Size
- **Base Component**: ~2KB
- **With Validation**: ~5KB
- **With Livewire**: ~8KB
- **Full Package**: ~10KB

## Examples Gallery

### Basic Email Inputs
```blade
<!-- Simple Email -->
<x-form-email name="email" label="Email Address" />

<!-- Required Email -->
<x-form-email name="email" label="Email Address" required />

<!-- Email with Help -->
<x-form-email name="email" label="Email Address" help="We'll never share your email" />

<!-- Email with Icon -->
<x-form-email name="email" label="Email Address" icon="mail" />
```

### Advanced Email Inputs
```blade
<!-- Floating Label -->
<x-form-email name="email" label="Email Address" floating />

<!-- Large Email -->
<x-form-email name="email" label="Email Address" size="lg" />

<!-- Livewire Email -->
<x-form-email name="email" wire:model.live="email" />

<!-- Email with Pattern -->
<x-form-email name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
```

## Changelog

### Version 2.0
- Added enhanced email validation patterns
- Improved accessibility features
- Enhanced icon integration
- Added custom slot support

### Version 1.0
- Initial release
- Basic email input functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form Email component:

1. **Test email validation** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
