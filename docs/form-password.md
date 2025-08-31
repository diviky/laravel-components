# Form Password Component

A specialized password input component that extends the base Form Input with built-in password visibility toggle functionality. This component provides a secure and user-friendly way to handle password inputs with show/hide capability.

## Overview

**Component Type:** Form Input Extension  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** 
- `diviky/laravel-form-components` for base functionality
- Alpine.js for password toggle interactivity  
**Location:** `resources/views/bootstrap-5/form-password.blade.php`

## Files

- **PHP Class:** `src/Components/FormPassword.php`
- **View File:** `resources/views/bootstrap-5/form-password.blade.php`
- **Documentation:** `docs/form-password.md`
- **Tests:** `tests/Components/FormPasswordTest.php`

## Basic Usage

```blade
<x-form-password name="password" label="Password" placeholder="Enter your password" required />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Password field name (required) | `'password'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Password label text | `'Password'` |
| value | string | null | Initial password value | `'secret123'` |
| placeholder | string | null | Placeholder text | `'Enter your password'` |
| required | boolean | false | Whether field is required | `true` |
| readonly | boolean | false | Whether field is readonly | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| size | string | null | Input size variant | `'sm'`, `'lg'` |
| icon | string | null | Icon name to display | `'lock'` |
| floating | boolean | false | Use floating label style | `true` |
| flat | boolean | false | Use flat input group style | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| help | string | null | Help text below input | `'Must be at least 8 characters'` |
| id | string | auto-generated | Input ID attribute | `'user-password'` |
| title | string | null | Title attribute for tooltip | `'Enter a strong password'` |
| class | string | null | Additional CSS classes | `'custom-password'` |
| wire:model | string | null | Livewire model binding | `'user.password'` |
| extra-attributes | string | null | Additional HTML attributes | `'data-custom="value"'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| default | string | null | Default value | `'default123'` |
| bind | mixed | null | Model binding value | `$user->password` |
| language | string | null | Language-specific field | `'en'` |
| showErrors | boolean | true | Show validation errors | `false` |

### Inherited Attributes

This component supports all standard HTML input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| minlength | string | null | Minimum password length | `'8'` |
| maxlength | string | null | Maximum password length | `'128'` |
| pattern | string | null | Password pattern for validation | `'^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$'` |
| autocomplete | string | null | Autocomplete attribute | `'current-password'` |
| autofocus | boolean | false | Autofocus the input | `true` |
| form | string | null | Form ID to associate with | `'user-form'` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to input | `<x-slot name="prepend">🔒</x-slot>` |
| append | Content to append to input (overridden by toggle) | `<x-slot name="append">Custom</x-slot>` |
| before | Content before input (inside input group) | `<x-slot name="before"><button>Button</button></x-slot>` |
| after | Content after input (inside input group) | `<x-slot name="after"><button>Button</button></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |
| icon | Custom icon slot | `<x-slot name="icon"><x-icon name="custom" /></x-slot>` |

## Usage Examples

### Basic Password Input
```blade
<x-form-password 
    name="password" 
    label="Password" 
    placeholder="Enter your password" 
    required 
/>
```

### Password with Help Text
```blade
<x-form-password 
    name="password" 
    label="Password" 
    help="Must be at least 8 characters long with uppercase, lowercase, and number"
    required 
/>
```

### Password with Validation Pattern
```blade
<x-form-password 
    name="password" 
    label="Password" 
    pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$"
    title="Password must be at least 8 characters with letters and numbers"
    required 
/>
```

### Password with Icon
```blade
<x-form-password 
    name="password" 
    label="Password" 
    icon="lock" 
    placeholder="Enter your password" 
/>
```

### Floating Label Password
```blade
<x-form-password 
    name="password" 
    label="Password" 
    floating 
    placeholder="Enter your password" 
/>
```

### Password with Custom Size
```blade
<x-form-password 
    name="password" 
    label="Password" 
    size="lg" 
    placeholder="Enter your password" 
/>
```

### Livewire Password Input
```blade
<x-form-password 
    name="password" 
    label="Password" 
    wire:model.live="password" 
    placeholder="Enter your password" 
/>
```

### Password with Prepend Content
```blade
<x-form-password name="password" label="Password">
    <x-slot name="prepend">🔒</x-slot>
</x-form-password>
```

### Password with Custom Help Slot
```blade
<x-form-password name="password" label="Password">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>Password must be at least 8 characters long</span>
        </div>
    </x-slot>
</x-form-password>
```

### Password with Custom Icon Slot
```blade
<x-form-password name="password" label="Password">
    <x-slot name="icon">
        <x-icon name="shield" class="text-success" />
    </x-slot>
</x-form-password>
```

### Password with Before/After Content
```blade
<x-form-password name="password" label="Password">
    <x-slot name="before">
        <span class="input-group-text">🔐</span>
    </x-slot>
    <x-slot name="after">
        <button type="button" class="btn btn-outline-secondary">Generate</button>
    </x-slot>
</x-form-password>
```

### Disabled Password Input
```blade
<x-form-password 
    name="password" 
    label="Password" 
    disabled 
    value="cannot-change" 
/>
```

### Readonly Password Input
```blade
<x-form-password 
    name="password" 
    label="Password" 
    readonly 
    value="readonly-value" 
/>
```

### Password with Autocomplete
```blade
<x-form-password 
    name="current_password" 
    label="Current Password" 
    autocomplete="current-password" 
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
    
    <x-form-input type="email" name="email" label="Email" required />
    
    <x-form-password 
        name="password" 
        label="Password" 
        placeholder="Create a strong password"
        help="Must be at least 8 characters with uppercase, lowercase, and number"
        required 
    />
    
    <x-form-password 
        name="password_confirmation" 
        label="Confirm Password" 
        placeholder="Confirm your password"
        help="Please enter the same password again"
        required 
    />
    
    <x-form-submit>Create Account</x-form-submit>
</x-form>
```

### Login Form
```blade
<x-form action="{{ route('login') }}" method="POST">
    <x-form-input 
        type="email" 
        name="email" 
        label="Email" 
        placeholder="your@email.com"
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

### Password Change Form
```blade
<x-form action="{{ route('password.update') }}" method="PUT">
    <x-form-password 
        name="current_password" 
        label="Current Password" 
        autocomplete="current-password"
        help="Enter your current password to verify your identity"
        required 
    />
    
    <x-form-password 
        name="password" 
        label="New Password" 
        autocomplete="new-password"
        help="Create a new strong password"
        required 
    />
    
    <x-form-password 
        name="password_confirmation" 
        label="Confirm New Password" 
        autocomplete="new-password"
        help="Confirm your new password"
        required 
    />
    
    <x-form-submit>Update Password</x-form-submit>
</x-form>
```

### Settings Form
```blade
<x-form action="{{ route('settings.security') }}" method="PUT">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Security Settings</h3>
        </div>
        <div class="card-body">
            <x-form-password 
                name="current_password" 
                label="Current Password" 
                help="Required to make security changes"
                required 
            />
            
            <x-form-password 
                name="new_password" 
                label="New Password" 
                help="Leave blank to keep current password"
            />
            
            <x-form-password 
                name="new_password_confirmation" 
                label="Confirm New Password" 
                help="Confirm your new password"
            />
        </div>
    </div>
    
    <x-form-submit>Update Security Settings</x-form-submit>
</x-form>
```

## Features

### Password Visibility Toggle
The component automatically includes a show/hide password toggle using Alpine.js:

- **Eye Icon**: Shows when password is hidden (click to show)
- **Eye-Closed Icon**: Shows when password is visible (click to hide)
- **Smooth Transitions**: Icons fade in/out smoothly
- **Keyboard Accessible**: Can be activated with keyboard navigation

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
- **Security Features**: Proper password field handling

## Common Patterns

### Strong Password Pattern
```blade
<x-form-password 
    name="password" 
    label="Password" 
    pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
    title="Password must be at least 8 characters with letters, numbers, and special characters"
    help="Include uppercase, lowercase, numbers, and special characters"
    required 
/>
```

### Simple Password Pattern
```blade
<x-form-password 
    name="password" 
    label="Password" 
    minlength="6"
    maxlength="50"
    help="Password must be between 6 and 50 characters"
    required 
/>
```

### Password with Strength Indicator
```blade
<x-form-password 
    name="password" 
    label="Password" 
    wire:model.live="password"
    help="Password strength: {{ $passwordStrength }}"
>
    <x-slot name="after">
        <div class="password-strength" wire:loading.class="opacity-50">
            <div class="progress" style="height: 4px;">
                <div class="progress-bar bg-{{ $strengthColor }}" style="width: {{ $strengthPercentage }}%"></div>
            </div>
        </div>
    </x-slot>
</x-form-password>
```

### Password with Generate Button
```blade
<x-form-password name="password" label="Password">
    <x-slot name="after">
        <button type="button" class="btn btn-outline-secondary" wire:click="generatePassword">
            Generate
        </button>
    </x-slot>
</x-form-password>
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
Blade::component('form-password', FormPassword::class);
```

## JavaScript Integration

### Alpine.js Integration
The component uses Alpine.js for password toggle functionality:

```javascript
// The component automatically initializes Alpine.js
// No additional JavaScript required
```

### Custom JavaScript
```javascript
// Custom password behavior
document.querySelectorAll('[data-custom-password]').forEach(input => {
    input.addEventListener('input', function() {
        // Custom password validation
        validatePasswordStrength(this.value);
    });
});
```

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('password-updated', (data) => {
    // Handle password updates
});
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
- Space key for password toggle

### Screen Reader Support
- Proper label association
- Descriptive help text
- Clear error messages
- Password toggle announcements

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: Not supported

### Feature Support
- **HTML5 Password Input**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Custom Properties**: Full support
- **Alpine.js**: Full support

## Troubleshooting

### Common Issues

**Password toggle not working**
```blade
<!-- Ensure Alpine.js is loaded -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

**Validation errors not showing**
```blade
<!-- Check if showErrors is enabled -->
<x-form-password name="password" :show-errors="true" />
```

**Icon not displaying**
```blade
<!-- Ensure icon component is available -->
<x-form-password name="password" icon="lock" />
```

**Livewire binding issues**
```blade
<!-- Ensure proper wire:model syntax -->
<x-form-password name="password" wire:model="user.password" />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Input](form-input.md) - Base input component
- [Form Email](form-email.md) - Email input component
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
1. **Use `wire:model.lazy`** for less critical password updates
2. **Minimize re-renders** with proper Livewire optimization
3. **Cache validation rules** when appropriate
4. **Use debounced validation** for real-time password strength checking

### Bundle Size
- **Base Component**: ~3KB
- **With Alpine.js**: ~8KB
- **With Validation**: ~10KB
- **Full Package**: ~12KB

## Examples Gallery

### Basic Password Inputs
```blade
<!-- Simple Password -->
<x-form-password name="password" label="Password" />

<!-- Required Password -->
<x-form-password name="password" label="Password" required />

<!-- Password with Help -->
<x-form-password name="password" label="Password" help="Must be at least 8 characters" />

<!-- Password with Icon -->
<x-form-password name="password" label="Password" icon="lock" />
```

### Advanced Password Inputs
```blade
<!-- Floating Label -->
<x-form-password name="password" label="Password" floating />

<!-- Large Password -->
<x-form-password name="password" label="Password" size="lg" />

<!-- Livewire Password -->
<x-form-password name="password" wire:model.live="password" />

<!-- Password with Pattern -->
<x-form-password name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />
```

## Changelog

### Version 2.0
- Added Alpine.js password toggle functionality
- Enhanced accessibility features
- Improved icon integration
- Added custom slot support

### Version 1.0
- Initial release
- Basic password input functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form Password component:

1. **Test password toggle** functionality thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
