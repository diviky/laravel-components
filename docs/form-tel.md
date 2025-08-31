# Form Tel Component

A specialized telephone input component that provides a user-friendly interface for phone number entry with HTML5 validation and mobile keyboard optimization. This component extends the base FormInput component and sets the input type to `tel`.

## Overview

**Component Type:** View-Only Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Base FormInput component from `diviky/laravel-form-components`  
**Location:** `resources/views/bootstrap-5/form-tel.blade.php`

## Files

- **View File:** `resources/views/bootstrap-5/form-tel.blade.php`
- **Documentation:** `docs/form-tel.md`
- **Tests:** `tests/Components/FormTelTest.php`

## Basic Usage

```blade
<x-form-tel name="phone" label="Phone Number" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Field name (required) | `'phone'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Field label text | `'Phone Number'` |
| placeholder | string | null | Placeholder text | `'Enter phone number'` |
| value | string | null | Field value | `'+1-555-123-4567'` |
| required | boolean | false | Whether field is required | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| readonly | boolean | false | Whether field is readonly | `true` |
| icon | string | null | Icon name | `'phone'` |
| size | string | '' | Input size variant | `'sm'`, `'lg'` |
| floating | boolean | false | Use floating label style | `true` |
| flat | boolean | false | Use flat styling | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| help | string | null | Help text below input | `'Enter a valid phone number'` |
| id | string | auto-generated | Input ID attribute | `'phone-input'` |
| title | string | null | Title attribute for tooltip | `'Enter your phone number'` |
| class | string | null | Additional CSS classes | `'custom-phone'` |
| wire:model | string | null | Livewire model binding | `'phone'` |
| extra-attributes | string | null | Additional HTML attributes | `'data-custom="value"'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| default | mixed | null | Default value | `$user->phone` |
| bind | mixed | null | Model binding value | `$user` |
| showErrors | boolean | true | Show validation errors | `false` |

### Inherited Attributes

This component supports all standard HTML tel input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| pattern | string | null | Input pattern for validation | `'[0-9]{10}'` |
| autocomplete | string | null | Autocomplete attribute | `'tel'` |
| autofocus | boolean | false | Autofocus the input | `true` |
| form | string | null | Form ID to associate with | `'contact-form'` |
| tabindex | string | null | Tab index | `'0'` |
| inputmode | string | null | Input mode for mobile keyboards | `'tel'` |
| maxlength | string | null | Maximum input length | `'15'` |
| minlength | string | null | Minimum input length | `'10'` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content before input | `<x-slot name="prepend">+1</x-slot>` |
| append | Content after input | `<x-slot name="append"><x-icon name="phone" /></x-slot>` |
| before | Content before form group | `<x-slot name="before"><div>Before</div></x-slot>` |
| after | Content after form group | `<x-slot name="after"><div>After</div></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |
| icon | Icon slot | `<x-slot name="icon"><x-icon name="phone" /></x-slot>` |

## Usage Examples

### Basic Phone Input
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    placeholder="Enter your phone number"
    required 
/>
```

### Phone Input with Pattern Validation
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    pattern="[0-9]{10}"
    title="Please enter a 10-digit phone number"
    help="Enter exactly 10 digits"
    required 
/>
```

### Phone Input with Country Code
```blade
<x-form-tel name="phone" label="Phone Number">
    <x-slot name="prepend">
        <span class="input-group-text">+1</span>
    </x-slot>
</x-form-tel>
```

### Phone Input with Icon
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    icon="phone"
    placeholder="(555) 123-4567"
/>
```

### Phone Input with Custom Styling
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    class="custom-phone-input"
    size="lg"
    floating
/>
```

### Phone Input with Livewire
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    wire:model="phone"
    wire:model.live="phone"
    help="Phone will be validated in real-time"
/>
```

### Phone Input with Input Mode
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    inputmode="tel"
    autocomplete="tel"
    placeholder="Enter phone number"
/>
```

### Phone Input with Length Restrictions
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    minlength="10"
    maxlength="15"
    pattern="[0-9+\-\s\(\)]{10,15}"
    help="Enter 10-15 digits, spaces, dashes, or parentheses allowed"
/>
```

### Phone Input with Custom Help Slot
```blade
<x-form-tel name="phone" label="Phone Number">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>Format: <strong>(555) 123-4567</strong></span>
        </div>
    </x-slot>
</x-form-tel>
```

### Phone Input with Prepend/Append
```blade
<x-form-tel name="phone" label="Phone Number">
    <x-slot name="prepend">
        <span class="input-group-text">📞</span>
    </x-slot>
    <x-slot name="append">
        <button class="btn btn-outline-secondary" type="button">
            <x-icon name="phone" />
        </button>
    </x-slot>
</x-form-tel>
```

## Real Project Examples

### Contact Information Form
```blade
<x-form action="{{ route('contact.store') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="name" label="Full Name" required />
        </div>
        <div class="col-md-6">
            <x-form-email name="email" label="Email Address" required />
        </div>
    </div>
    
    <x-form-tel 
        name="phone" 
        label="Phone Number" 
        placeholder="(555) 123-4567"
        pattern="[\+]?[0-9\s\-\(\)]{10,}"
        title="Please enter a valid phone number"
        help="Enter your phone number with or without country code"
        required
    />
    
    <x-form-textarea 
        name="message" 
        label="Message" 
        placeholder="Tell us how we can help..."
        rows="4"
        required
    />
    
    <x-form-submit>Send Message</x-form-submit>
</x-form>
```

### User Registration Form
```blade
<x-form action="{{ route('register') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="first_name" label="First Name" required />
        </div>
        <div class="col-md-6">
            <x-form-input name="last_name" label="Last Name" required />
        </div>
    </div>
    
    <x-form-email name="email" label="Email Address" required />
    
    <x-form-tel 
        name="phone" 
        label="Phone Number" 
        placeholder="Enter your phone number"
        pattern="[0-9]{10}"
        title="Please enter a 10-digit phone number"
        help="We'll use this for account verification"
        required
    />
    
    <x-form-password name="password" label="Password" required />
    <x-form-password name="password_confirmation" label="Confirm Password" required />
    
    <x-form-submit>Create Account</x-form-submit>
</x-form>
```

### Business Contact Form
```blade
<x-form action="{{ route('business.contact') }}" method="POST">
    <x-form-input name="business_name" label="Business Name" required />
    
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="contact_person" label="Contact Person" required />
        </div>
        <div class="col-md-6">
            <x-form-email name="email" label="Business Email" required />
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-tel 
                name="phone" 
                label="Business Phone" 
                placeholder="(555) 123-4567"
                pattern="[\+]?[0-9\s\-\(\)]{10,}"
                help="Primary business contact number"
                required
            />
        </div>
        <div class="col-md-6">
            <x-form-tel 
                name="fax" 
                label="Fax Number" 
                placeholder="(555) 123-4568"
                pattern="[\+]?[0-9\s\-\(\)]{10,}"
                help="Optional fax number"
            />
        </div>
    </div>
    
    <x-form-textarea 
        name="inquiry" 
        label="Inquiry Details" 
        placeholder="Tell us about your business needs..."
        rows="5"
        required
    />
    
    <x-form-submit>Submit Inquiry</x-form-submit>
</x-form>
```

### Emergency Contact Form
```blade
<x-form action="{{ route('emergency.store') }}" method="POST">
    <x-form-input name="patient_name" label="Patient Name" required />
    
    <div class="row">
        <div class="col-md-6">
            <x-form-tel 
                name="primary_phone" 
                label="Primary Contact" 
                placeholder="(555) 123-4567"
                pattern="[0-9]{10}"
                help="Main emergency contact number"
                required
            >
                <x-slot name="prepend">
                    <span class="input-group-text">📞</span>
                </x-slot>
            </x-form-tel>
        </div>
        <div class="col-md-6">
            <x-form-tel 
                name="secondary_phone" 
                label="Secondary Contact" 
                placeholder="(555) 123-4568"
                pattern="[0-9]{10}"
                help="Backup contact number"
            >
                <x-slot name="prepend">
                    <span class="input-group-text">📱</span>
                </x-slot>
            </x-form-tel>
        </div>
    </div>
    
    <x-form-input name="relationship" label="Relationship to Patient" required />
    
    <x-form-submit>Save Emergency Contact</x-form-submit>
</x-form>
```

### International Phone Input
```blade
<x-form action="{{ route('international.store') }}" method="POST">
    <x-form-input name="name" label="Full Name" required />
    
    <x-form-tel 
        name="phone" 
        label="International Phone" 
        placeholder="+1 (555) 123-4567"
        pattern="[\+]?[0-9\s\-\(\)]{7,}"
        title="Enter international phone number"
        help="Include country code (e.g., +1 for US, +44 for UK)"
        required
    >
        <x-slot name="prepend">
            <select class="form-select" style="width: auto;">
                <option value="+1">🇺🇸 +1</option>
                <option value="+44">🇬🇧 +44</option>
                <option value="+33">🇫🇷 +33</option>
                <option value="+49">🇩🇪 +49</option>
                <option value="+81">🇯🇵 +81</option>
            </select>
        </x-slot>
    </x-form-tel>
    
    <x-form-email name="email" label="Email Address" required />
    
    <x-form-submit>Submit</x-form-submit>
</x-form>
```

## Features

### HTML5 Validation
The component automatically includes HTML5 validation:
- **Type Validation**: `type="tel"` for telephone input
- **Pattern Validation**: Custom regex patterns for phone formats
- **Length Validation**: Min/max length restrictions
- **Required Validation**: Server-side validation integration
- **Real-time Validation**: Livewire validation support

### Mobile Optimization
- **Input Mode**: `inputmode="tel"` for numeric keyboard on mobile
- **Autocomplete**: `autocomplete="tel"` for browser suggestions
- **Touch-friendly**: Optimized for mobile touch interfaces
- **Keyboard Optimization**: Numeric keypad on mobile devices

### Form Integration
- **Automatic Validation**: Integrates with Laravel's validation system
- **Error Display**: Shows validation errors with proper styling
- **CSRF Protection**: Automatically includes CSRF tokens
- **Method Support**: Supports POST, PUT, PATCH methods
- **Model Binding**: Direct model property binding

### Styling Options
- **Size Variants**: `sm`, `lg` for different input sizes
- **Floating Labels**: Modern floating label design
- **Flat Styling**: Alternative flat design
- **Inline Display**: Alternative inline styling
- **Custom Classes**: Additional CSS class support
- **Bootstrap Integration**: Seamless Bootstrap styling

### Interactive Features
- **Livewire Integration**: Full Livewire model binding support
- **Real-time Validation**: Live validation with feedback
- **Input Formatting**: Automatic phone number formatting
- **Icon Integration**: Built-in icon support
- **Prepend/Append**: Content before/after input

### Accessibility
- **ARIA Labels**: Proper accessibility labeling
- **Screen Reader Support**: Semantic HTML structure
- **Keyboard Navigation**: Full keyboard accessibility
- **Focus Management**: Proper focus handling
- **Form Association**: Proper form field association

### Advanced Features
- **Language Support**: Multi-language field support
- **Model Binding**: Direct model property binding
- **Custom Validation**: Pattern and constraint validation
- **Mobile Optimization**: Touch-friendly input
- **International Support**: Country code integration

## Common Patterns

### Phone Number with Country Code
```blade
<x-form-tel name="phone" label="Phone Number">
    <x-slot name="prepend">
        <span class="input-group-text">+1</span>
    </x-slot>
</x-form-tel>
```

### Phone Number with Icon
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    icon="phone"
    placeholder="(555) 123-4567"
/>
```

### Phone Number with Validation
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    pattern="[0-9]{10}"
    title="Please enter a 10-digit phone number"
    help="Enter exactly 10 digits"
    required
/>
```

### Phone Number with Livewire
```blade
<x-form-tel 
    name="phone" 
    label="Phone Number" 
    wire:model="phone"
    wire:model.live="phone"
    wire:loading.class="opacity-50"
/>
```

### International Phone Number
```blade
<x-form-tel 
    name="phone" 
    label="International Phone" 
    placeholder="+1 (555) 123-4567"
    pattern="[\+]?[0-9\s\-\(\)]{7,}"
    title="Enter international phone number"
    help="Include country code"
/>
```

## Configuration

### Global Configuration
The component uses the global form components configuration:

```php
// config/form-components.php
return [
    'framework' => 'bootstrap-5',
    'floating_labels' => false,
    'show_errors' => true,
    'default_wire' => false,
];
```

### Component Registration
```php
// In your service provider
Blade::component('form-tel', FormTel::class);
```

### Validation Rules
```php
// Laravel validation rules
$request->validate([
    'phone' => 'required|regex:/^[0-9\s\-\(\)\+]{10,}$/',
]);
```

## JavaScript Integration

### Custom JavaScript
```javascript
// Phone number formatting
document.querySelectorAll('input[type="tel"]').forEach(input => {
    input.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
        } else if (value.length >= 3) {
            value = value.replace(/(\d{3})(\d{0,3})/, '($1) $2');
        }
        e.target.value = value;
    });
});
```

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('phone-validated', (data) => {
    // Handle phone validation completion
    console.log('Phone validated:', data);
});
```

### Input Masking
```javascript
// Phone number masking with IMask
const phoneInput = document.querySelector('input[type="tel"]');
const maskOptions = {
    mask: '(000) 000-0000'
};
const mask = IMask(phoneInput, maskOptions);
```

### Validation Feedback
```javascript
// Custom validation feedback
function validatePhone(phone) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    return phoneRegex.test(phone);
}

document.querySelector('input[type="tel"]').addEventListener('blur', function() {
    const isValid = validatePhone(this.value);
    this.classList.toggle('is-valid', isValid);
    this.classList.toggle('is-invalid', !isValid);
});
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `aria-describedby` for help text
- `aria-invalid` for validation errors
- `aria-required` for required fields
- `aria-label` for input descriptions

### Keyboard Navigation
- Tab navigation through form fields
- Enter key for form submission
- Escape key for clearing input
- Space key for button activation

### Screen Reader Support
- Proper label association
- Descriptive help text
- Clear error messages
- Input announcements
- Validation feedback

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **HTML5 Tel Input**: Full support
- **Input Mode**: Full support
- **Pattern Validation**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**Phone validation not working**
```blade
<!-- Ensure proper pattern attribute -->
<x-form-tel name="phone" pattern="[0-9]{10}" title="Enter 10 digits" />
```

**Mobile keyboard not showing numbers**
```blade
<!-- Add inputmode attribute -->
<x-form-tel name="phone" inputmode="tel" />
```

**Phone formatting not working**
```blade
<!-- Use JavaScript for formatting -->
<script>
document.querySelector('input[type="tel"]').addEventListener('input', function(e) {
    // Format phone number
});
</script>
```

**International numbers not accepted**
```blade
<!-- Use flexible pattern -->
<x-form-tel name="phone" pattern="[\+]?[0-9\s\-\(\)]{7,}" />
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
- [Form Password](form-password.md) - Password input component
- [Form Number](form-number.md) - Number input component
- [Form URL](form-url.md) - URL input component
- [Form Hidden](form-hidden.md) - Hidden input component
- [Form Select](form-select.md) - Select dropdown component
- [Form Textarea](form-textarea.md) - Multi-line text input component
- [Form Checkbox](form-checkbox.md) - Checkbox input component
- [Form Switch](form-switch.md) - Toggle switch component

## Performance

### Optimization Tips
1. **Use appropriate patterns** for validation
2. **Implement client-side formatting** for better UX
3. **Use inputmode="tel"** for mobile optimization
4. **Implement proper error handling** for validation
5. **Use autocomplete="tel"** for browser suggestions

### Bundle Size
- **Base Component**: ~2KB
- **With Livewire**: ~5KB
- **With Custom JS**: ~10KB
- **Full Package**: ~15KB

## Examples Gallery

### Basic Phone Inputs
```blade
<!-- Simple Phone Input -->
<x-form-tel name="phone" label="Phone Number" />

<!-- Phone Input with Placeholder -->
<x-form-tel name="phone" label="Phone Number" placeholder="(555) 123-4567" />

<!-- Required Phone Input -->
<x-form-tel name="phone" label="Phone Number" required />
```

### Advanced Phone Inputs
```blade
<!-- Phone Input with Pattern -->
<x-form-tel name="phone" pattern="[0-9]{10}" label="Phone Number" />

<!-- Phone Input with Icon -->
<x-form-tel name="phone" icon="phone" label="Phone Number" />

<!-- Livewire Phone Input -->
<x-form-tel name="phone" wire:model="phone" label="Phone Number" />
```

## Changelog

### Version 2.0
- Added HTML5 tel input support
- Enhanced mobile keyboard optimization
- Improved accessibility features
- Added pattern validation support

### Version 1.0
- Initial release
- Basic tel input functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form Tel component:

1. **Test phone validation** thoroughly
2. **Ensure mobile compatibility** across devices
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
