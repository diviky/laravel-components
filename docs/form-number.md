# Form Number Component

A specialized number input component that extends the base Form Input with number-specific functionality. This component provides a user-friendly way to handle numeric inputs with built-in number validation, step controls, and proper HTML5 number input type.

## Overview

**Component Type:** View-Only Form Input Extension  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** `diviky/laravel-form-components` for base functionality  
**Location:** `resources/views/bootstrap-5/form-number.blade.php`

## Files

- **View File:** `resources/views/bootstrap-5/form-number.blade.php`
- **Documentation:** `docs/form-number.md`
- **Tests:** `tests/Components/FormNumberTest.php`

## Basic Usage

```blade
<x-form-number name="age" label="Age" placeholder="Enter your age" min="0" max="120" required />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Number field name (required) | `'age'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Number label text | `'Age'` |
| value | number | null | Initial number value | `25` |
| placeholder | string | null | Placeholder text | `'Enter your age'` |
| required | boolean | false | Whether field is required | `true` |
| readonly | boolean | false | Whether field is readonly | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| size | string | null | Input size variant | `'sm'`, `'lg'` |
| icon | string | null | Icon name to display | `'calculator'` |
| floating | boolean | false | Use floating label style | `true` |
| flat | boolean | false | Use flat input group style | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| help | string | null | Help text below input | `'Must be between 0 and 120'` |
| id | string | auto-generated | Input ID attribute | `'user-age'` |
| title | string | null | Title attribute for tooltip | `'Enter a valid age'` |
| class | string | null | Additional CSS classes | `'custom-number'` |
| wire:model | string | null | Livewire model binding | `'user.age'` |
| extra-attributes | string | null | Additional HTML attributes | `'data-custom="value"'` |

### Number-Specific Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| min | number | null | Minimum allowed value | `0` |
| max | number | null | Maximum allowed value | `100` |
| step | number | 1 | Step increment value | `0.5`, `10` |
| pattern | string | null | Number pattern for validation | `'[0-9]*'` |
| autocomplete | string | null | Autocomplete attribute | `'off'` |
| autofocus | boolean | false | Autofocus the input | `true` |
| form | string | null | Form ID to associate with | `'user-form'` |
| tabindex | string | null | Tab index | `'0'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| default | number | null | Default value | `18` |
| bind | mixed | null | Model binding value | `$user->age` |
| language | string | null | Language-specific field | `'en'` |
| showErrors | boolean | true | Show validation errors | `false` |

### Inherited Attributes

This component supports all standard HTML input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| inputmode | string | null | Input mode for mobile | `'numeric'`, `'decimal'` |
| spellcheck | boolean | false | Enable spellcheck | `true` |
| novalidate | boolean | false | Disable validation | `true` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to input | `<x-slot name="prepend">💰</x-slot>` |
| append | Content to append to input | `<x-slot name="append"><button>Calculate</button></x-slot>` |
| before | Content before input (inside input group) | `<x-slot name="before"><span class="input-group-text">$</span></x-slot>` |
| after | Content after input (inside input group) | `<x-slot name="after"><button>Calculate</button></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |
| icon | Custom icon slot | `<x-slot name="icon"><x-icon name="custom" /></x-slot>` |

## Usage Examples

### Basic Number Input
```blade
<x-form-number 
    name="age" 
    label="Age" 
    placeholder="Enter your age" 
    min="0" 
    max="120" 
    required 
/>
```

### Number with Step Control
```blade
<x-form-number 
    name="price" 
    label="Price" 
    step="0.01" 
    min="0" 
    placeholder="Enter price" 
/>
```

### Number with Help Text
```blade
<x-form-number 
    name="quantity" 
    label="Quantity" 
    help="Must be between 1 and 100"
    min="1" 
    max="100" 
    required 
/>
```

### Number with Icon
```blade
<x-form-number 
    name="score" 
    label="Score" 
    icon="star" 
    min="0" 
    max="100" 
    placeholder="Enter score" 
/>
```

### Floating Label Number
```blade
<x-form-number 
    name="temperature" 
    label="Temperature" 
    floating 
    step="0.1" 
    placeholder="Enter temperature" 
/>
```

### Number with Custom Size
```blade
<x-form-number 
    name="weight" 
    label="Weight (kg)" 
    size="lg" 
    step="0.1" 
    min="0" 
    placeholder="Enter weight" 
/>
```

### Livewire Number Input
```blade
<x-form-number 
    name="count" 
    label="Count" 
    wire:model.live="count" 
    min="0" 
    placeholder="Enter count" 
/>
```

### Number with Prepend Content
```blade
<x-form-number name="amount" label="Amount">
    <x-slot name="prepend">💰</x-slot>
</x-form-number>
```

### Number with Custom Help Slot
```blade
<x-form-number name="percentage" label="Percentage" min="0" max="100">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>Enter a value between 0 and 100</span>
        </div>
    </x-slot>
</x-form-number>
```

### Number with Custom Icon Slot
```blade
<x-form-number name="rating" label="Rating" min="1" max="5">
    <x-slot name="icon">
        <x-icon name="star" class="text-warning" />
    </x-slot>
</x-form-number>
```

### Number with Before/After Content
```blade
<x-form-number name="price" label="Price" step="0.01" min="0">
    <x-slot name="before">
        <span class="input-group-text">$</span>
    </x-slot>
    <x-slot name="after">
        <button type="button" class="btn btn-outline-secondary">Calculate</button>
    </x-slot>
</x-form-number>
```

### Disabled Number Input
```blade
<x-form-number 
    name="fixed_value" 
    label="Fixed Value" 
    disabled 
    value="42" 
/>
```

### Readonly Number Input
```blade
<x-form-number 
    name="calculated_value" 
    label="Calculated Value" 
    readonly 
    value="99.99" 
/>
```

### Number with Pattern Validation
```blade
<x-form-number 
    name="phone" 
    label="Phone Number" 
    pattern="[0-9]{10}" 
    title="Please enter a 10-digit phone number"
    placeholder="1234567890" 
/>
```

### Number with Input Mode
```blade
<x-form-number 
    name="decimal" 
    label="Decimal Value" 
    step="0.01" 
    inputmode="decimal"
    placeholder="Enter decimal" 
/>
```

## Real Project Examples

### Product Pricing Form
```blade
<x-form action="{{ route('products.store') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="name" label="Product Name" required />
        </div>
        <div class="col-md-6">
            <x-form-number 
                name="price" 
                label="Price" 
                step="0.01" 
                min="0" 
                placeholder="0.00"
                help="Enter price in dollars"
                required 
            >
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
            </x-form-number>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-number 
                name="quantity" 
                label="Stock Quantity" 
                min="0" 
                placeholder="0"
                help="Available stock quantity"
                required 
            />
        </div>
        <div class="col-md-6">
            <x-form-number 
                name="weight" 
                label="Weight (kg)" 
                step="0.1" 
                min="0" 
                placeholder="0.0"
                help="Product weight in kilograms"
            />
        </div>
    </div>
    
    <x-form-submit>Create Product</x-form-submit>
</x-form>
```

### Survey Form
```blade
<x-form action="{{ route('survey.submit') }}" method="POST">
    <x-form-input name="name" label="Full Name" required />
    
    <x-form-number 
        name="age" 
        label="Age" 
        min="13" 
        max="120" 
        placeholder="Enter your age"
        help="Must be 13 or older"
        required 
    />
    
    <x-form-number 
        name="rating" 
        label="Overall Rating" 
        min="1" 
        max="10" 
        step="1"
        placeholder="Rate from 1-10"
        help="Rate your experience from 1 to 10"
        required 
    >
        <x-slot name="icon">
            <x-icon name="star" class="text-warning" />
        </x-slot>
    </x-form-number>
    
    <x-form-textarea 
        name="feedback" 
        label="Additional Feedback" 
        placeholder="Share your thoughts..."
        rows="4"
    />
    
    <x-form-submit>Submit Survey</x-form-submit>
</x-form>
```

### Calculator Form
```blade
<x-form action="{{ route('calculator.compute') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-number 
                name="num1" 
                label="First Number" 
                step="any"
                placeholder="Enter first number"
                required 
            />
        </div>
        <div class="col-md-6">
            <x-form-number 
                name="num2" 
                label="Second Number" 
                step="any"
                placeholder="Enter second number"
                required 
            />
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-select name="operation" label="Operation" required>
                <option value="">Select operation</option>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (×)</option>
                <option value="divide">Division (÷)</option>
            </x-form-select>
        </div>
        <div class="col-md-6">
            <x-form-number 
                name="result" 
                label="Result" 
                readonly 
                value="{{ $result ?? '' }}"
                class="bg-light"
            />
        </div>
    </div>
    
    <x-form-submit>Calculate</x-form-submit>
</x-form>
```

### Settings Form
```blade
<x-form action="{{ route('settings.update') }}" method="PUT">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application Settings</h3>
        </div>
        <div class="card-body">
            <x-form-number 
                name="session_timeout" 
                label="Session Timeout (minutes)" 
                min="5" 
                max="1440"
                :value="$settings->session_timeout"
                help="Session will expire after this many minutes"
                required 
            />
            
            <x-form-number 
                name="max_upload_size" 
                label="Max Upload Size (MB)" 
                min="1" 
                max="100"
                :value="$settings->max_upload_size"
                help="Maximum file upload size in megabytes"
                required 
            />
            
            <x-form-number 
                name="cache_duration" 
                label="Cache Duration (hours)" 
                min="0" 
                max="168"
                step="0.5"
                :value="$settings->cache_duration"
                help="How long to cache data (0 = disabled)"
                required 
            />
        </div>
    </div>
    
    <x-form-submit>Update Settings</x-form-submit>
</x-form>
```

### Order Form
```blade
<x-form action="{{ route('orders.store') }}" method="POST">
    <div class="row">
        <div class="col-md-8">
            <x-form-input name="customer_name" label="Customer Name" required />
        </div>
        <div class="col-md-4">
            <x-form-number 
                name="order_number" 
                label="Order Number" 
                min="1000" 
                max="99999"
                placeholder="1000-99999"
                help="Unique order identifier"
                required 
            />
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <x-form-number 
                name="quantity" 
                label="Quantity" 
                min="1" 
                max="1000"
                placeholder="1"
                help="Number of items"
                required 
            />
        </div>
        <div class="col-md-4">
            <x-form-number 
                name="unit_price" 
                label="Unit Price" 
                step="0.01" 
                min="0"
                placeholder="0.00"
                help="Price per unit"
                required 
            >
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
            </x-form-number>
        </div>
        <div class="col-md-4">
            <x-form-number 
                name="total" 
                label="Total" 
                step="0.01" 
                min="0"
                readonly
                class="bg-light"
                help="Calculated total (quantity × unit price)"
            >
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
            </x-form-number>
        </div>
    </div>
    
    <x-form-submit>Create Order</x-form-submit>
</x-form>
```

## Features

### Number Validation
The component automatically includes number validation:
- **HTML5 Validation**: Browser-native number format validation
- **Range Validation**: Min/max value constraints
- **Step Validation**: Increment/decrement step control
- **Pattern Validation**: Custom regex pattern support
- **Laravel Validation**: Server-side number validation integration
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
- **Step Controls**: Browser-native step up/down buttons
- **Input Mode**: Mobile-optimized numeric input modes

### Accessibility
- **ARIA Labels**: Proper accessibility labeling
- **Screen Reader Support**: Semantic HTML structure
- **Keyboard Navigation**: Full keyboard accessibility
- **Focus Management**: Proper focus handling
- **Number Announcements**: Clear number format announcements

### Advanced Features
- **Language Support**: Multi-language field support
- **Model Binding**: Direct model property binding
- **Custom Validation**: Pattern and constraint validation
- **Mobile Optimization**: Touch-friendly numeric input
- **Decimal Support**: Flexible decimal precision control

## Common Patterns

### Number with Currency
```blade
<x-form-number 
    name="price" 
    label="Price" 
    step="0.01" 
    min="0"
    wire:model.live="price"
    help="Enter price in dollars"
>
    <x-slot name="before">
        <span class="input-group-text">$</span>
    </x-slot>
    <x-slot name="after">
        <button type="button" class="btn btn-outline-secondary" wire:click="calculateTax">
            Calculate Tax
        </button>
    </x-slot>
</x-form-number>
```

### Number with Percentage
```blade
<x-form-number 
    name="discount" 
    label="Discount Rate" 
    min="0" 
    max="100" 
    step="0.1"
    title="Enter discount percentage"
    help="Discount percentage (0-100%)"
>
    <x-slot name="after">
        <span class="input-group-text">%</span>
    </x-slot>
</x-form-number>
```

### Number with Range Slider
```blade
<x-form-number 
    name="volume" 
    label="Volume" 
    min="0" 
    max="100" 
    step="1"
    wire:model.live="volume"
    help="Adjust volume level"
>
    <x-slot name="icon">
        <x-icon name="volume" class="text-primary" />
    </x-slot>
</x-form-number>
```

### Number with Auto-calculation
```blade
<x-form-number 
    name="total" 
    label="Total Amount" 
    step="0.01" 
    min="0"
    readonly
    class="bg-light"
    wire:model="total"
    help="Automatically calculated total"
>
    <x-slot name="before">
        <span class="input-group-text">$</span>
    </x-slot>
    <x-slot name="after">
        <div wire:loading wire:target="total">
            <x-icon name="spinner" class="spinner-border spinner-border-sm" />
        </div>
    </x-slot>
</x-form-number>
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
Blade::component('form-number', FormNumber::class);
```

## JavaScript Integration

### Custom JavaScript
```javascript
// Custom number validation
document.querySelectorAll('[data-custom-number]').forEach(input => {
    input.addEventListener('input', function() {
        // Custom number validation
        validateNumberFormat(this.value);
    });
});
```

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('number-updated', (data) => {
    // Handle number updates
});
```

### Number Formatting
```javascript
// Number formatting functionality
function formatNumber(value, decimals = 2) {
    return parseFloat(value).toFixed(decimals);
}

function formatCurrency(value) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(value);
}
```

### Auto-calculation
```javascript
// Auto-calculation functionality
function calculateTotal(quantity, unitPrice) {
    const total = quantity * unitPrice;
    document.getElementById('total').value = total.toFixed(2);
    return total;
}
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `aria-describedby` for help text
- `aria-invalid` for validation errors
- `aria-required` for required fields
- `aria-label` for icon-only inputs
- `aria-valuemin` and `aria-valuemax` for range constraints

### Keyboard Navigation
- Tab navigation through form fields
- Enter key submission
- Escape key for clearing input
- Arrow keys for step increment/decrement
- Space key for button activation

### Screen Reader Support
- Proper label association
- Descriptive help text
- Clear error messages
- Number format announcements
- Range constraint announcements

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: Not supported

### Feature Support
- **HTML5 Number Input**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Custom Properties**: Full support
- **Step Controls**: Full support

## Troubleshooting

### Common Issues

**Number validation not working**
```blade
<!-- Ensure proper min/max attributes -->
<x-form-number name="age" min="0" max="120" />
```

**Step controls not working**
```blade
<!-- Ensure step attribute is set -->
<x-form-number name="price" step="0.01" />
```

**Livewire binding issues**
```blade
<!-- Ensure proper wire:model syntax -->
<x-form-number name="count" wire:model="user.count" />
```

**Icon not displaying**
```blade
<!-- Ensure icon component is available -->
<x-form-number name="score" icon="star" />
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
- [Form Tel](form-tel.md) - Telephone input component
- [Form URL](form-url.md) - URL input component
- [Form Hidden](form-hidden.md) - Hidden input component
- [Form Select](form-select.md) - Select dropdown component
- [Form Textarea](form-textarea.md) - Multi-line text input component
- [Form Checkbox](form-checkbox.md) - Checkbox input component
- [Form Switch](form-switch.md) - Toggle switch component

## Performance

### Optimization Tips
1. **Use `wire:model.lazy`** for less critical number updates
2. **Minimize re-renders** with proper Livewire optimization
3. **Cache validation rules** when appropriate
4. **Use debounced validation** for real-time number checking

### Bundle Size
- **Base Component**: ~2KB
- **With Validation**: ~5KB
- **With Livewire**: ~8KB
- **Full Package**: ~10KB

## Examples Gallery

### Basic Number Inputs
```blade
<!-- Simple Number -->
<x-form-number name="age" label="Age" />

<!-- Required Number -->
<x-form-number name="quantity" label="Quantity" required />

<!-- Number with Help -->
<x-form-number name="score" label="Score" help="Enter score from 0-100" />

<!-- Number with Icon -->
<x-form-number name="rating" label="Rating" icon="star" />
```

### Advanced Number Inputs
```blade
<!-- Floating Label -->
<x-form-number name="temperature" label="Temperature" floating />

<!-- Large Number -->
<x-form-number name="weight" label="Weight" size="lg" />

<!-- Livewire Number -->
<x-form-number name="count" wire:model.live="count" />

<!-- Number with Step -->
<x-form-number name="price" step="0.01" min="0" />
```

## Changelog

### Version 2.0
- Added enhanced number validation patterns
- Improved accessibility features
- Enhanced step control integration
- Added custom slot support

### Version 1.0
- Initial release
- Basic number input functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form Number component:

1. **Test number validation** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
