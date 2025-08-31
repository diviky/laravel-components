# Form Radio Component

A flexible radio button component for single-choice input with validation support, inline display options, and advanced binding capabilities.

## Overview

**Component Type:** Form Input Component (Radio Button)  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4, Tailwind CSS  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-radio.blade.php`  
**PHP Class:** `vendor/diviky/laravel-form-components/src/Components/FormRadio.php`

## Files

- **View File:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-radio.blade.php`
- **PHP Class:** `vendor/diviky/laravel-form-components/src/Components/FormRadio.php`
- **Documentation:** `docs/form-radio.md`
- **Tests:** `tests/Components/FormRadioTest.php`

## Basic Usage

```blade
<x-form-radio name="gender" label="Male" value="male" />
<x-form-radio name="gender" label="Female" value="female" />
```

## Component Structure

The Form Radio component renders a radio button with label and validation support:

```blade
<x-form-radio name="field_name" label="Radio Label" value="radio_value" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Radio button name attribute | 'gender' |
| label | string | '' | Radio button label text | 'Male' |
| value | mixed | 1 | Radio button value | 'male', 1, 'option1' |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| bind | mixed | null | Model binding value | $user, $post |
| bindKey | string | '' | Model binding key | 'id', 'slug' |
| default | bool | false | Default checked state | true |
| required | bool | false | Whether the field is required | true |
| disabled | bool | false | Whether the field is disabled | true |
| readonly | bool | false | Whether the field is readonly | true |
| inline | bool | false | Display radio buttons inline | true |
| compact | bool | false | Use compact styling | true |
| help | string | null | Help text to display | 'Select your gender' |
| id | string | auto | Radio button ID attribute | 'gender-male' |
| title | string | null | Title attribute for tooltip | 'Select gender' |
| class | string | null | Additional CSS classes | 'custom-radio' |
| wire:model | string | null | Livewire model binding | 'selectedGender' |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

### Inherited Attributes

All components support standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| style | string | null | Inline CSS styles | 'margin: 1rem;' |
| data-* | string | null | Custom data attributes | `data-testid="radio-input"` |

## Usage Examples

### Basic Radio Buttons
```blade
<x-form-radio name="gender" label="Male" value="male" />
<x-form-radio name="gender" label="Female" value="female" />
<x-form-radio name="gender" label="Other" value="other" />
```

### Radio Buttons with Default Selection
```blade
<x-form-radio name="gender" label="Male" value="male" :default="true" />
<x-form-radio name="gender" label="Female" value="female" />
```

### Required Radio Buttons
```blade
<x-form-radio name="gender" label="Male" value="male" required />
<x-form-radio name="gender" label="Female" value="female" required />
```

### Radio Buttons with Help Text
```blade
<x-form-radio name="gender" label="Male" value="male" help="Select your gender" />
<x-form-radio name="gender" label="Female" value="female" help="Select your gender" />
```

### Inline Radio Buttons
```blade
<x-form-radio name="gender" label="Male" value="male" inline />
<x-form-radio name="gender" label="Female" value="female" inline />
<x-form-radio name="gender" label="Other" value="other" inline />
```

### Compact Radio Buttons
```blade
<x-form-radio name="gender" label="Male" value="male" compact />
<x-form-radio name="gender" label="Female" value="female" compact />
```

### Radio Buttons with Custom ID
```blade
<x-form-radio name="gender" label="Male" value="male" id="gender-male" />
<x-form-radio name="gender" label="Female" value="female" id="gender-female" />
```

### Radio Buttons with Custom Class
```blade
<x-form-radio name="gender" label="Male" value="male" class="custom-radio" />
<x-form-radio name="gender" label="Female" value="female" class="custom-radio" />
```

### Livewire Integration
```blade
<x-form-radio name="gender" label="Male" value="male" wire:model="selectedGender" />
<x-form-radio name="gender" label="Female" value="female" wire:model="selectedGender" />
```

### Radio Buttons with Model Binding
```blade
<x-form-radio name="user_type" label="Admin" value="admin" :bind="$user" bindKey="type" />
<x-form-radio name="user_type" label="User" value="user" :bind="$user" bindKey="type" />
```

### Disabled Radio Buttons
```blade
<x-form-radio name="gender" label="Male" value="male" disabled />
<x-form-radio name="gender" label="Female" value="female" disabled />
```

### Radio Buttons with Title
```blade
<x-form-radio name="gender" label="Male" value="male" title="Select male gender" />
<x-form-radio name="gender" label="Female" value="female" title="Select female gender" />
```

## Real Project Examples

### User Registration Form
```blade
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <x-form-input name="name" label="Full Name" required />
    <x-form-email name="email" label="Email Address" required />
    
    <div class="form-group">
        <label class="form-label">Gender</label>
        <x-form-radio name="gender" label="Male" value="male" required />
        <x-form-radio name="gender" label="Female" value="female" required />
        <x-form-radio name="gender" label="Other" value="other" required />
    </div>
    
    <x-form-password name="password" label="Password" required />
    <x-form-password name="password_confirmation" label="Confirm Password" required />
    
    <x-form-submit>Register</x-form-submit>
</form>
```

### Survey Form
```blade
<form method="POST" action="{{ route('survey.submit') }}">
    @csrf
    
    <x-form-input name="name" label="Your Name" required />
    <x-form-email name="email" label="Email Address" required />
    
    <div class="form-group">
        <label class="form-label">Age Group</label>
        <x-form-radio name="age_group" label="18-24" value="18-24" required />
        <x-form-radio name="age_group" label="25-34" value="25-34" required />
        <x-form-radio name="age_group" label="35-44" value="35-44" required />
        <x-form-radio name="age_group" label="45-54" value="45-54" required />
        <x-form-radio name="age_group" label="55+" value="55+" required />
    </div>
    
    <div class="form-group">
        <label class="form-label">Experience Level</label>
        <x-form-radio name="experience" label="Beginner" value="beginner" required />
        <x-form-radio name="experience" label="Intermediate" value="intermediate" required />
        <x-form-radio name="experience" label="Advanced" value="advanced" required />
    </div>
    
    <x-form-submit>Submit Survey</x-form-submit>
</form>
```

### Settings Form
```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label class="form-label">Theme Preference</label>
        <x-form-radio name="theme" label="Light" value="light" :bind="$user" bindKey="theme" />
        <x-form-radio name="theme" label="Dark" value="dark" :bind="$user" bindKey="theme" />
        <x-form-radio name="theme" label="Auto" value="auto" :bind="$user" bindKey="theme" />
    </div>
    
    <div class="form-group">
        <label class="form-label">Language</label>
        <x-form-radio name="language" label="English" value="en" :bind="$user" bindKey="language" />
        <x-form-radio name="language" label="Spanish" value="es" :bind="$user" bindKey="language" />
        <x-form-radio name="language" label="French" value="fr" :bind="$user" bindKey="language" />
    </div>
    
    <div class="form-group">
        <label class="form-label">Notifications</label>
        <x-form-radio name="notifications" label="All" value="all" :bind="$user" bindKey="notifications" />
        <x-form-radio name="notifications" label="Important Only" value="important" :bind="$user" bindKey="notifications" />
        <x-form-radio name="notifications" label="None" value="none" :bind="$user" bindKey="notifications" />
    </div>
    
    <x-form-submit>Save Settings</x-form-submit>
</form>
```

### E-commerce Product Options
```blade
<form method="POST" action="{{ route('cart.add') }}">
    @csrf
    
    <x-form-hidden name="product_id" value="{{ $product->id }}" />
    
    <div class="form-group">
        <label class="form-label">Size</label>
        <x-form-radio name="size" label="Small" value="S" required />
        <x-form-radio name="size" label="Medium" value="M" required />
        <x-form-radio name="size" label="Large" value="L" required />
        <x-form-radio name="size" label="Extra Large" value="XL" required />
    </div>
    
    <div class="form-group">
        <label class="form-label">Color</label>
        <x-form-radio name="color" label="Red" value="red" required />
        <x-form-radio name="color" label="Blue" value="blue" required />
        <x-form-radio name="color" label="Green" value="green" required />
        <x-form-radio name="color" label="Black" value="black" required />
    </div>
    
    <x-form-input name="quantity" label="Quantity" type="number" min="1" value="1" required />
    <x-form-submit>Add to Cart</x-form-submit>
</form>
```

### Booking Form
```blade
<form method="POST" action="{{ route('booking.create') }}">
    @csrf
    
    <x-form-input name="name" label="Full Name" required />
    <x-form-email name="email" label="Email Address" required />
    <x-form-tel name="phone" label="Phone Number" required />
    
    <div class="form-group">
        <label class="form-label">Service Type</label>
        <x-form-radio name="service" label="Consultation" value="consultation" required />
        <x-form-radio name="service" label="Treatment" value="treatment" required />
        <x-form-radio name="service" label="Follow-up" value="followup" required />
    </div>
    
    <div class="form-group">
        <label class="form-label">Preferred Time</label>
        <x-form-radio name="time" label="Morning (9 AM - 12 PM)" value="morning" required />
        <x-form-radio name="time" label="Afternoon (1 PM - 4 PM)" value="afternoon" required />
        <x-form-radio name="time" label="Evening (5 PM - 8 PM)" value="evening" required />
    </div>
    
    <x-form-date name="appointment_date" label="Appointment Date" required />
    <x-form-textarea name="notes" label="Additional Notes" rows="3" />
    
    <x-form-submit>Book Appointment</x-form-submit>
</form>
```

### Livewire Component Example
```blade
<div>
    <h3>User Preferences</h3>
    
    <div class="form-group">
        <label class="form-label">Display Mode</label>
        <x-form-radio name="display_mode" label="Grid" value="grid" wire:model="displayMode" />
        <x-form-radio name="display_mode" label="List" value="list" wire:model="displayMode" />
        <x-form-radio name="display_mode" label="Compact" value="compact" wire:model="displayMode" />
    </div>
    
    <div class="form-group">
        <label class="form-label">Sort Order</label>
        <x-form-radio name="sort_order" label="Newest First" value="newest" wire:model="sortOrder" />
        <x-form-radio name="sort_order" label="Oldest First" value="oldest" wire:model="sortOrder" />
        <x-form-radio name="sort_order" label="Alphabetical" value="alphabetical" wire:model="sortOrder" />
    </div>
    
    <div class="form-group">
        <label class="form-label">Filter Type</label>
        <x-form-radio name="filter_type" label="All" value="all" wire:model="filterType" />
        <x-form-radio name="filter_type" label="Active" value="active" wire:model="filterType" />
        <x-form-radio name="filter_type" label="Archived" value="archived" wire:model="filterType" />
    </div>
    
    <div class="mt-3">
        <button wire:click="savePreferences" class="btn btn-primary">Save Preferences</button>
        <button wire:click="resetPreferences" class="btn btn-secondary">Reset</button>
    </div>
</div>
```

### Quiz Form
```blade
<form method="POST" action="{{ route('quiz.submit') }}">
    @csrf
    
    <x-form-hidden name="quiz_id" value="{{ $quiz->id }}" />
    <x-form-hidden name="user_id" value="{{ auth()->id() }}" />
    
    @foreach($questions as $question)
        <div class="question-group mb-4">
            <h4>{{ $question->text }}</h4>
            
            @foreach($question->options as $option)
                <x-form-radio 
                    name="answer_{{ $question->id }}" 
                    label="{{ $option->text }}" 
                    value="{{ $option->id }}" 
                    required 
                />
            @endforeach
        </div>
    @endforeach
    
    <x-form-submit>Submit Quiz</x-form-submit>
</form>
```

### Subscription Form
```blade
<form method="POST" action="{{ route('subscription.create') }}">
    @csrf
    
    <x-form-input name="name" label="Full Name" required />
    <x-form-email name="email" label="Email Address" required />
    
    <div class="form-group">
        <label class="form-label">Subscription Plan</label>
        <x-form-radio name="plan" label="Basic ($9/month)" value="basic" required />
        <x-form-radio name="plan" label="Pro ($19/month)" value="pro" required />
        <x-form-radio name="plan" label="Enterprise ($49/month)" value="enterprise" required />
    </div>
    
    <div class="form-group">
        <label class="form-label">Billing Cycle</label>
        <x-form-radio name="billing" label="Monthly" value="monthly" required />
        <x-form-radio name="billing" label="Yearly (Save 20%)" value="yearly" required />
    </div>
    
    <div class="form-group">
        <label class="form-label">Payment Method</label>
        <x-form-radio name="payment_method" label="Credit Card" value="card" required />
        <x-form-radio name="payment_method" label="PayPal" value="paypal" required />
        <x-form-radio name="payment_method" label="Bank Transfer" value="bank" required />
    </div>
    
    <x-form-submit>Start Subscription</x-form-submit>
</form>
```

## Advanced Features

### Model Binding with Collections
```blade
@foreach($options as $option)
    <x-form-radio 
        name="selected_option" 
        label="{{ $option->name }}" 
        value="{{ $option->id }}" 
        :bind="$selectedOption" 
        bindKey="id" 
    />
@endforeach
```

### Array Binding
```blade
@foreach($categories as $category)
    <x-form-radio 
        name="category" 
        label="{{ $category['name'] }}" 
        value="{{ $category['id'] }}" 
        :bind="$selectedCategory" 
    />
@endforeach
```

### Conditional Rendering
```blade
@foreach($options as $option)
    @if($option->is_available)
        <x-form-radio 
            name="option" 
            label="{{ $option->name }}" 
            value="{{ $option->id }}" 
            :disabled="!$option->is_enabled"
        />
    @endif
@endforeach
```

### Dynamic Values
```blade
@foreach($dynamicOptions as $option)
    <x-form-radio 
        name="dynamic_option" 
        label="{{ $option->label }}" 
        value="{{ $option->value }}" 
        :default="$option->is_default"
        help="{{ $option->description }}"
    />
@endforeach
```

## Styling and Customization

### Custom CSS Classes
```blade
<x-form-radio name="custom" label="Custom Option" value="custom" class="custom-radio-input" />
```

### Custom Styling
```blade
<x-form-radio 
    name="styled" 
    label="Styled Option" 
    value="styled" 
    style="margin: 1rem; padding: 0.5rem;" 
/>
```

### Bootstrap Utilities
```blade
<x-form-radio name="utility" label="Utility Option" value="utility" class="border border-primary bg-light" />
```

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-radio name="required_field" label="Option" value="option" required />
```

### Validation Rules
```php
// In your controller
$request->validate([
    'gender' => 'required|in:male,female,other',
    'age_group' => 'required|in:18-24,25-34,35-44,45-54,55+',
    'experience' => 'required|in:beginner,intermediate,advanced',
]);
```

### Custom Validation
```php
// Custom radio validation
$request->validate([
    'user_type' => [
        'required',
        'in:admin,user,moderator',
        function ($attribute, $value, $fail) {
            if (!UserType::isValid($value)) {
                $fail('The ' . $attribute . ' must be a valid user type.');
            }
        },
    ],
]);
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-check` - Base radio container styling
- `form-check-inline` - Inline display styling
- `form-check-input` - Radio input styling
- `form-check-label` - Radio label styling
- `is-invalid` - Error state styling
- `m-0` - Compact styling (no margin)

## JavaScript Integration

The component can be enhanced with JavaScript:

```javascript
// Radio button change detection
document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        console.log('Radio changed:', this.name, '=', this.value);
        
        // Trigger custom events
        this.dispatchEvent(new CustomEvent('radioChange', {
            detail: { name: this.name, value: this.value }
        }));
    });
});

// Form validation
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        const requiredRadios = this.querySelectorAll('input[type="radio"][required]');
        const radioGroups = {};
        
        requiredRadios.forEach(radio => {
            if (!radioGroups[radio.name]) {
                radioGroups[radio.name] = [];
            }
            radioGroups[radio.name].push(radio);
        });
        
        for (const [name, radios] of Object.entries(radioGroups)) {
            const checked = radios.some(radio => radio.checked);
            if (!checked) {
                e.preventDefault();
                alert(`Please select an option for ${name}`);
                return;
            }
        }
    });
});

// Dynamic radio updates
function updateRadioOptions(name, options) {
    const container = document.querySelector(`[data-radio-group="${name}"]`);
    if (container) {
        container.innerHTML = '';
        options.forEach(option => {
            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = name;
            radio.value = option.value;
            radio.id = `${name}-${option.value}`;
            
            const label = document.createElement('label');
            label.htmlFor = radio.id;
            label.textContent = option.label;
            
            container.appendChild(radio);
            container.appendChild(label);
        });
    }
}
```

## Accessibility Features

- Proper label association
- ARIA attributes for screen readers
- Keyboard navigation support
- Focus management
- Error state announcements

```blade
<x-form-radio 
    name="accessible" 
    label="Accessible Option" 
    value="accessible" 
    aria-describedby="help-text" 
    aria-required="true" 
/>
```

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **HTML5 Radio Input**: Full support
- **CSS Grid**: Full support
- **Flexbox**: Full support
- **CSS Custom Properties**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**Radio buttons not working**
```blade
<!-- Ensure same name attribute for radio group -->
<x-form-radio name="gender" label="Male" value="male" />
<x-form-radio name="gender" label="Female" value="female" />
```

**Default selection not working**
```blade
<!-- Use default attribute or model binding -->
<x-form-radio name="gender" label="Male" value="male" :default="true" />
```

**Validation errors not showing**
```blade
<!-- Ensure validation rules are set -->
<x-form-radio name="gender" label="Male" value="male" required />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Checkbox](form-checkbox.md) - Checkbox input component
- [Form Input](form-input.md) - Base input component
- [Form Select](form-select.md) - Select dropdown component
- [Form Label](form-label.md) - Label component
- [Form Errors](form-errors.md) - Error display component

## Performance

### Optimization Tips
1. **Use appropriate validation** for radio selections
2. **Minimize inline styles** when possible
3. **Use Bootstrap classes** for consistent styling
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~2KB
- **With Bootstrap**: ~50KB (one-time load)
- **With Custom CSS**: ~1KB
- **Full Package**: ~53KB

## Examples Gallery

### Basic Radio Groups
```blade
<!-- Simple radio group -->
<x-form-radio name="option" label="Option 1" value="1" />
<x-form-radio name="option" label="Option 2" value="2" />

<!-- With default selection -->
<x-form-radio name="option" label="Option 1" value="1" :default="true" />
<x-form-radio name="option" label="Option 2" value="2" />
```

### Advanced Radio Groups
```blade
<!-- Inline display -->
<x-form-radio name="inline_option" label="Option 1" value="1" inline />
<x-form-radio name="inline_option" label="Option 2" value="2" inline />

<!-- With help text -->
<x-form-radio name="option" label="Option 1" value="1" help="Select this option" />
<x-form-radio name="option" label="Option 2" value="2" help="Select this option" />
```

## Changelog

### Version 2.0
- Enhanced model binding capabilities
- Improved accessibility features
- Better error handling
- Livewire compatibility improvements

### Version 1.0
- Initial release
- Basic radio button functionality
- HTML5 radio input support
- Bootstrap integration

## Contributing

When contributing to the Form Radio component:

1. **Test radio group behavior** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-form-components` package and is licensed under the MIT License.
