# Form Input Component

A comprehensive and flexible input component that serves as the foundation for all form input types. This component provides extensive customization options, validation integration, Livewire support, and accessibility features.

## Overview

**Component Type:** Base Form Input  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** `diviky/laravel-form-components` for base functionality  
**Location:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-input.blade.php`

## Files

- **PHP Class:** `Diviky\LaravelFormComponents\Components\FormInput`
- **View File:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-input.blade.php`
- **Documentation:** `docs/form-input.md`
- **Tests:** `tests/Components/FormInputTest.php`

## Basic Usage

```blade
<x-form-input name="username" label="Username" placeholder="Enter username" required />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Input field name (required) | `'username'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Input label text | `'Email Address'` |
| type | string | 'text' | Input type | `'email'`, `'password'`, `'number'`, `'tel'`, `'url'`, `'color'`, `'hidden'` |
| value | string | null | Initial input value | `'john@example.com'` |
| placeholder | string | null | Placeholder text | `'Enter your email'` |
| required | boolean | false | Whether field is required | `true` |
| readonly | boolean | false | Whether field is readonly | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| size | string | null | Input size variant | `'sm'`, `'lg'` |
| icon | string | null | Icon name to display | `'user'`, `'email'`, `'lock'` |
| floating | boolean | false | Use floating label style | `true` |
| flat | boolean | false | Use flat input group style | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| help | string | null | Help text below input | `'This is help text'` |
| id | string | auto-generated | Input ID attribute | `'user-email'` |
| title | string | null | Title attribute for tooltip | `'Enter a valid email'` |
| class | string | null | Additional CSS classes | `'custom-input'` |
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
| min | string | null | Minimum value (for number/date) | `'0'` |
| max | string | null | Maximum value (for number/date) | `'100'` |
| step | string | null | Step value (for number/range) | `'0.1'` |
| pattern | string | null | Input pattern for validation | `'[A-Za-z]{3}'` |
| autocomplete | string | null | Autocomplete attribute | `'email'` |
| autofocus | boolean | false | Autofocus the input | `true` |
| form | string | null | Form ID to associate with | `'user-form'` |
| list | string | null | Datalist ID | `'suggestions'` |
| multiple | boolean | false | Allow multiple values | `true` |
| accept | string | null | Accepted file types | `'.jpg,.png'` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to input | `<x-slot name="prepend">@</x-slot>` |
| append | Content to append to input | `<x-slot name="append">.com</x-slot>` |
| before | Content before input (inside input group) | `<x-slot name="before"><button>Button</button></x-slot>` |
| after | Content after input (inside input group) | `<x-slot name="after"><button>Button</button></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |
| icon | Custom icon slot | `<x-slot name="icon"><x-icon name="custom" /></x-slot>` |

## Usage Examples

### Basic Text Input
```blade
<x-form-input name="username" label="Username" placeholder="Enter username" required />
```

### Email Input with Icon
```blade
<x-form-input 
    type="email" 
    name="email" 
    label="Email Address" 
    icon="mail" 
    placeholder="user@example.com" 
    required 
/>
```

### Password Input
```blade
<x-form-input 
    type="password" 
    name="password" 
    label="Password" 
    placeholder="Enter password" 
    required 
/>
```

### Input with Prepend/Append Content
```blade
<x-form-input name="website" label="Website" placeholder="example">
    <x-slot name="prepend">https://</x-slot>
    <x-slot name="append">.com</x-slot>
</x-form-input>
```

### Floating Label Input
```blade
<x-form-input 
    name="title" 
    label="Title" 
    floating 
    placeholder="Enter title" 
/>
```

### Input with Help Text
```blade
<x-form-input 
    name="phone" 
    label="Phone" 
    type="tel" 
    help="Include country code"
>
    <x-slot name="prepend">+1</x-slot>
</x-form-input>
```

### Livewire Integration
```blade
<x-form-input 
    name="search" 
    label="Search" 
    wire:model.live="searchTerm" 
    icon="search" 
/>
```

### Different Sizes
```blade
<x-form-input name="small" label="Small Input" size="sm" />
<x-form-input name="normal" label="Normal Input" />
<x-form-input name="large" label="Large Input" size="lg" />
```

### Readonly and Disabled States
```blade
<x-form-input name="readonly" label="Readonly" value="Cannot edit" readonly />
<x-form-input name="disabled" label="Disabled" value="Cannot interact" disabled />
```

### Hidden Input
```blade
<x-form-input type="hidden" name="user_id" value="123" />
```

### Color Input
```blade
<x-form-input 
    type="color" 
    name="brand_color" 
    label="Brand Color" 
    value="#3498db" 
/>
```

### Number Input with Constraints
```blade
<x-form-input 
    type="number" 
    name="age" 
    label="Age" 
    min="1" 
    max="120" 
    step="1" 
/>
```

### Input with Custom Icon Slot
```blade
<x-form-input name="custom" label="Custom Input">
    <x-slot name="icon">
        <x-icon name="star" class="text-warning" />
    </x-slot>
</x-form-input>
```

### Input with Before/After Content
```blade
<x-form-input name="price" label="Price" type="number">
    <x-slot name="before">
        <span class="input-group-text">$</span>
    </x-slot>
    <x-slot name="after">
        <button type="button" class="btn btn-outline-secondary">Calculate</button>
    </x-slot>
</x-form-input>
```

### Input with Validation
```blade
<x-form-input 
    name="email" 
    label="Email" 
    type="email" 
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
    title="Please enter a valid email address"
    required 
/>
```

### Input with Autocomplete
```blade
<x-form-input 
    name="country" 
    label="Country" 
    autocomplete="country-name"
    list="countries"
/>
<datalist id="countries">
    <option value="United States">
    <option value="Canada">
    <option value="United Kingdom">
</datalist>
```

### Input with Custom Help Slot
```blade
<x-form-input name="password" label="Password" type="password">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>Password must be at least 8 characters long</span>
        </div>
    </x-slot>
</x-form-input>
```

## Real Project Examples

### User Registration Form
```blade
<x-form action="{{ route('users.store') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-input 
                name="first_name" 
                label="First Name" 
                placeholder="Enter first name"
                required 
            />
        </div>
        <div class="col-md-6">
            <x-form-input 
                name="last_name" 
                label="Last Name" 
                placeholder="Enter last name"
                required 
            />
        </div>
    </div>
    
    <x-form-input 
        type="email" 
        name="email" 
        label="Email Address" 
        icon="mail"
        placeholder="user@example.com"
        help="We'll never share your email with anyone else"
        required 
    />
    
    <x-form-input 
        type="password" 
        name="password" 
        label="Password" 
        icon="lock"
        placeholder="Enter password"
        required 
    />
    
    <x-form-submit>Create Account</x-form-submit>
</x-form>
```

### Search Filter
```blade
<div class="card">
    <div class="card-body">
        <x-form-input 
            icon="search" 
            name="filter[search]" 
            placeholder="Search by name, email, or phone"
            wire:model.live.debounce.300ms="search"
        />
    </div>
</div>
```

### Settings Form
```blade
<x-form action="{{ route('settings.update') }}" method="PUT">
    <x-form-input 
        name="company_name" 
        label="Company Name" 
        :value="$settings->company_name"
        help="This will be displayed on invoices and receipts"
    />
    
    <x-form-input 
        type="url" 
        name="website" 
        label="Website" 
        :value="$settings->website"
        placeholder="https://example.com"
    />
    
    <x-form-input 
        type="tel" 
        name="phone" 
        label="Phone Number" 
        :value="$settings->phone"
        pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
        placeholder="123-456-7890"
    />
    
    <x-form-input 
        type="color" 
        name="brand_color" 
        label="Brand Color" 
        :value="$settings->brand_color"
        help="Choose your brand's primary color"
    />
    
    <x-form-submit>Save Settings</x-form-submit>
</x-form>
```

## Features

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
- **File Upload**: File input type support
- **Hidden Fields**: Hidden input type for form data

## Common Patterns

### Search Input Pattern
```blade
<x-form-input 
    name="search" 
    icon="search" 
    placeholder="Search..."
    wire:model.live.debounce.300ms="searchTerm"
/>
```

### Currency Input Pattern
```blade
<x-form-input name="amount" type="number" step="0.01" min="0">
    <x-slot name="prepend">$</x-slot>
</x-form-input>
```

### Phone Input Pattern
```blade
<x-form-input 
    type="tel" 
    name="phone" 
    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
    placeholder="123-456-7890"
>
    <x-slot name="prepend">+1</x-slot>
</x-form-input>
```

### URL Input Pattern
```blade
<x-form-input 
    type="url" 
    name="website" 
    placeholder="https://example.com"
>
    <x-slot name="prepend">https://</x-slot>
</x-form-input>
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
Blade::component('form-input', FormInput::class);
```

## JavaScript Integration

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('input-updated', (data) => {
    // Handle input updates
});
```

### Custom JavaScript
```javascript
// Custom input behavior
document.querySelectorAll('[data-custom-input]').forEach(input => {
    input.addEventListener('input', function() {
        // Custom input handling
    });
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
- Arrow keys for number/date inputs

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: Not supported

### Feature Support
- **HTML5 Input Types**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Custom Properties**: Full support

## Troubleshooting

### Common Issues

**Input not updating with Livewire**
```blade
<!-- Ensure proper wire:model syntax -->
<x-form-input name="email" wire:model="user.email" />
```

**Validation errors not showing**
```blade
<!-- Check if showErrors is enabled -->
<x-form-input name="email" :show-errors="true" />
```

**Icon not displaying**
```blade
<!-- Ensure icon component is available -->
<x-form-input name="email" icon="mail" />
```

**Floating label not working**
```blade
<!-- Ensure floating attribute is set -->
<x-form-input name="email" label="Email" floating />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Email](form-email.md) - Email-specific input
- [Form Password](form-password.md) - Password input with toggle
- [Form Number](form-number.md) - Number input
- [Form Tel](form-tel.md) - Telephone input
- [Form URL](form-url.md) - URL input
- [Form Hidden](form-hidden.md) - Hidden input
- [Form Select](form-select.md) - Select dropdown
- [Form Textarea](form-textarea.md) - Multi-line text input
- [Form Checkbox](form-checkbox.md) - Checkbox input
- [Form Switch](form-switch.md) - Toggle switch

## Performance

### Optimization Tips
1. **Use `wire:model.live.debounce`** for search inputs
2. **Minimize re-renders** with proper Livewire optimization
3. **Use `wire:model.lazy`** for less critical updates
4. **Cache form data** when appropriate

### Bundle Size
- **Base Component**: ~2KB
- **With Icons**: ~5KB
- **With Validation**: ~8KB
- **Full Package**: ~15KB

## Examples Gallery

### Basic Inputs
```blade
<!-- Text Input -->
<x-form-input name="name" label="Name" />

<!-- Email Input -->
<x-form-input type="email" name="email" label="Email" />

<!-- Password Input -->
<x-form-input type="password" name="password" label="Password" />

<!-- Number Input -->
<x-form-input type="number" name="age" label="Age" min="0" max="120" />

<!-- URL Input -->
<x-form-input type="url" name="website" label="Website" />

<!-- Color Input -->
<x-form-input type="color" name="color" label="Color" />
```

### Advanced Inputs
```blade
<!-- Input with Icon -->
<x-form-input name="search" icon="search" placeholder="Search..." />

<!-- Input with Prepend/Append -->
<x-form-input name="price">
    <x-slot name="prepend">$</x-slot>
    <x-slot name="append">USD</x-slot>
</x-form-input>

<!-- Floating Label -->
<x-form-input name="title" label="Title" floating />

<!-- Input with Help -->
<x-form-input name="username" label="Username" help="Must be unique" />

<!-- Livewire Input -->
<x-form-input name="search" wire:model.live.debounce.300ms="searchTerm" />
```

## Changelog

### Version 2.0
- Added floating label support
- Enhanced Livewire integration
- Improved accessibility features
- Added icon slot support

### Version 1.0
- Initial release
- Basic input functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form Input component:

1. **Test all input types** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License. 
