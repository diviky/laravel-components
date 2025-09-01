# Form Pin Component

A PIN input component that provides a user-friendly interface for entering PIN codes, verification codes, or other numeric sequences. Features include individual input boxes, automatic focus management, copy-paste support, and responsive design.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, extends FormInput from laravel-form-components

## Files

- **PHP Class:** `src/Components/FormPin.php`
- **View File:** `resources/views/bootstrap-5/form-pin.blade.php`
- **Documentation:** `docs/form-pin.md`

## Basic Usage

### Simple PIN Input
```blade
<x-form-pin name="verification_code" label="Enter Verification Code" />
```

### Custom Length PIN
```blade
<x-form-pin 
    name="security_pin" 
    label="Security PIN"
    :length="4">
</x-form-pin>
```

### With Default Value
```blade
<x-form-pin 
    name="access_code" 
    label="Access Code"
    :value="'123456'">
</x-form-pin>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'verification_code'` or `'security_pin'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Enter PIN'` |
| value | mixed | null | Current PIN value | `'123456'` |
| default | mixed | null | Default PIN value | `'000000'` |
| length | int | 6 | Number of PIN digits | `4`, `8` |
| extraAttributes | array | [] | Additional HTML attributes | `['placeholder' => 'Enter code']` |

### Inherited Attributes

This component inherits from `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'pin-input'` |
| class | string | null | Additional CSS classes | `'custom-pin'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| title | string | null | Title attribute | `'Enter 6-digit code'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'enter-pin'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### No Slots Available

This component does not support slots as it generates individual input boxes automatically based on the length attribute.

## Usage Examples

### Basic Verification Code
```blade
<x-form-pin 
    name="verification_code" 
    label="Enter the 6-digit verification code sent to your phone">
</x-form-pin>
```

### 4-Digit Security PIN
```blade
<x-form-pin 
    name="security_pin" 
    label="Security PIN"
    :length="4">
</x-form-pin>
```

### 8-Digit Access Code
```blade
<x-form-pin 
    name="access_code" 
    label="8-Digit Access Code"
    :length="8">
</x-form-pin>
```

### With Model Binding
```blade
<x-form-pin 
    name="user_pin" 
    label="User PIN"
    :bind="$user"
    bind-key="pin">
</x-form-pin>
```

### Livewire Integration
```blade
<x-form-pin 
    wire:model="verificationCode"
    name="code" 
    label="Verification Code"
    :length="6">
</x-form-pin>
```

### With Validation
```blade
<x-form-pin 
    name="pin" 
    label="Required PIN"
    required
    :length="6">
</x-form-pin>
```

### Custom Styling
```blade
<x-form-pin 
    name="pin" 
    label="Styled PIN Input"
    class="custom-pin-input"
    style="--pin-border-color: #007bff;">
</x-form-pin>
```

### With Title Attribute
```blade
<x-form-pin 
    name="pin" 
    label="PIN Code"
    title="Enter the 6-digit PIN from your authenticator app">
</x-form-pin>
```

### Disabled State
```blade
<x-form-pin 
    name="pin" 
    label="PIN (Disabled)"
    disabled
    :length="6">
</x-form-pin>
```

### Readonly State
```blade
<x-form-pin 
    name="pin" 
    label="PIN (Readonly)"
    readonly
    :length="6">
</x-form-pin>
```

## Component Variants

### Standard PIN Input
**Usage:** `<x-form-pin>` (default)
**Description:** 6-digit PIN input with standard styling
**Features:**
- 6 individual input boxes
- Automatic focus management
- Copy-paste support
- Responsive design

### Custom Length PIN Input
**Usage:** `<x-form-pin :length="4">`
**Description:** PIN input with customizable number of digits
**Features:**
- Configurable length (4, 6, 8, etc.)
- Same functionality as standard
- Flexible for different use cases

### Large PIN Input
**Usage:** `<x-form-pin>` (default)
**Description:** PIN input with large input boxes
**Features:**
- `form-control-lg` class applied
- Better mobile experience
- Improved accessibility

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-pin>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-pin' => [
        'view' => 'laravel-components::{framework}.form-pin',
        'class' => Components\FormPin::class,
    ],
],
```

### Default Settings
The component uses these default settings:
- **Length:** 6 digits
- **Input type:** text
- **Max length:** 1 character per input
- **Styling:** Bootstrap form-control-lg
- **Layout:** Responsive grid with g-2 spacing

## Common Patterns

### Two-Factor Authentication
```blade
<div class="2fa-setup">
    <h4>Two-Factor Authentication Setup</h4>
    <p>Enter the 6-digit code from your authenticator app:</p>
    
    <x-form-pin 
        name="2fa_code" 
        label="Authentication Code"
        :length="6">
    </x-form-pin>
    
    <div class="mt-3">
        <small class="text-muted">
            Code expires in <span id="countdown">5:00</span>
        </small>
    </div>
</div>
```

### Phone Verification
```blade
<div class="phone-verification">
    <h4>Verify Your Phone Number</h4>
    <p>We've sent a verification code to {{ $phone }}</p>
    
    <x-form-pin 
        name="phone_verification_code" 
        label="Verification Code"
        :length="6">
    </x-form-pin>
    
    <div class="mt-3">
        <button type="button" class="btn btn-link" onclick="resendCode()">
            Didn't receive the code? Resend
        </button>
    </div>
</div>
```

### Security PIN Setup
```blade
<div class="pin-setup">
    <h4>Set Your Security PIN</h4>
    <p>Choose a 4-digit PIN for account security:</p>
    
    <x-form-pin 
        name="security_pin" 
        label="Security PIN"
        :length="4">
    </x-form-pin>
    
    <div class="mt-3">
        <small class="text-muted">
            This PIN will be used for sensitive operations
        </small>
    </div>
</div>
```

### Access Code Entry
```blade
<div class="access-code">
    <h4>Enter Access Code</h4>
    <p>Please enter the 8-digit access code provided:</p>
    
    <x-form-pin 
        name="access_code" 
        label="Access Code"
        :length="8">
    </x-form-pin>
    
    <div class="mt-3">
        <small class="text-muted">
            Access codes are case-sensitive
        </small>
    </div>
</div>
```

### Multi-Step Form PIN
```blade
<div class="multi-step-form">
    <div class="step-indicator">
        <span class="step active">Step 1</span>
        <span class="step">Step 2</span>
        <span class="step">Step 3</span>
    </div>
    
    <div class="step-content">
        <h4>Enter Verification Code</h4>
        <p>Please enter the code sent to your email:</p>
        
        <x-form-pin 
            name="verification_code" 
            label="Verification Code"
            :length="6">
        </x-form-pin>
        
        <div class="mt-4">
            <button type="button" class="btn btn-primary" onclick="nextStep()">
                Continue
            </button>
        </div>
    </div>
</div>
```

### PIN with Custom Validation
```blade
<div class="pin-validation">
    <x-form-pin 
        name="custom_pin" 
        label="Custom PIN"
        :length="4">
    </x-form-pin>
    
    <div class="validation-rules mt-2">
        <small class="text-muted">
            PIN must contain at least one number and one letter
        </small>
    </div>
    
    <div class="mt-3">
        <button type="submit" class="btn btn-primary" 
                :disabled="!isValidPin">
            Submit
        </button>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_pin_with_basic_attributes()
{
    $view = $this->blade('<x-form-pin name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-pin');
}

/** @test */
public function it_renders_form_pin_with_custom_length()
{
    $view = $this->blade('<x-form-pin name="pin" :length="4" />');
    
    $view->assertSee('name="pin"');
    $view->assertSee('length="4"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(PinComponent::class)
        ->assertSee('<x-form-pin')
        ->set('verificationCode', '123456')
        ->assertSee('123456');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to individual input fields
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input fields

### Keyboard Navigation
- Tab navigation between input fields
- Arrow key navigation
- Backspace key handling
- Space key prevention

### Screen Reader Support
- Proper labeling and descriptions
- Input field announcements
- Focus management communication
- Copy-paste operation feedback

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Support:** HTML5 text input compatibility

## Troubleshooting

### Common Issues

#### PIN Not Accepting Input
**Problem:** Individual input boxes don't accept characters
**Solution:** Check Alpine.js loading and input event handling

#### Focus Not Moving
**Problem:** Focus doesn't automatically move to next input
**Solution:** Verify Alpine.js functions and DOM element references

#### Copy-Paste Not Working
**Problem:** Paste functionality fails
**Solution:** Check clipboard API support and event listener setup

#### Styling Issues
**Problem:** PIN input boxes don't look correct
**Solution:** Verify Bootstrap CSS loading and custom styling conflicts

#### Mobile Responsiveness
**Problem:** PIN input not mobile-friendly
**Solution:** Check responsive grid classes and touch input handling

#### Validation Problems
**Problem:** PIN validation fails
**Solution:** Verify form submission and hidden input value binding

## Related Components

- **Form Input:** Base input component
- **Form Number:** Numeric input component
- **Form Password:** Password input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with PIN input functionality
- Individual input box management
- Automatic focus navigation
- Copy-paste support
- Responsive design

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormPin.php`
2. Update the view file: `resources/views/bootstrap-5/form-pin.blade.php`
3. Add/update tests in `tests/Components/FormPinTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Number Component](../form-number.md)
- [Form Password Component](../form-password.md)
- [Form Label Component](../form-label.md)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel Form Components](https://github.com/diviky/laravel-form-components)
