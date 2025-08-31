# Form Hidden Component

A specialized hidden input component that extends FormInput with HTML5 hidden input type for storing data that should not be visible to users but needs to be submitted with forms.

## Overview

**Component Type:** Form Input Component (Hidden Specialization)  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4, Tailwind CSS  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-hidden.blade.php`  
**PHP Class:** `vendor/diviky/laravel-form-components/src/Components/FormHidden.php`  
**Base Component:** Extends `FormInput` with `type="hidden"`

## Files

- **View File:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-hidden.blade.php`
- **PHP Class:** `vendor/diviky/laravel-form-components/src/Components/FormHidden.php`
- **Documentation:** `docs/form-hidden.md`
- **Tests:** `tests/Components/FormHiddenTest.php`

## Basic Usage

```blade
<x-form-hidden name="user_id" value="{{ $user->id }}" />
```

## Component Structure

The Form Hidden component extends FormInput and automatically sets the input type to "hidden":

```blade
<x-form-hidden name="field_name" value="field_value" />
```

## Attributes & Properties

Since this component extends FormInput, it inherits all FormInput attributes and features:

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Input name attribute | 'user_id' |
| value | mixed | null | Input value | '123', $user->id |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto | Input ID attribute | 'custom-hidden-id' |
| class | string | null | Additional CSS classes | 'custom-hidden-input' |
| wire:model | string | null | Livewire model binding | 'userId' |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

### Inherited Attributes

All components support standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| style | string | null | Inline CSS styles | 'display: none;' |
| data-* | string | null | Custom data attributes | `data-testid="hidden-input"` |

## Usage Examples

### Basic Hidden Input
```blade
<x-form-hidden name="user_id" value="{{ $user->id }}" />
```

### Hidden Input with Custom ID
```blade
<x-form-hidden name="token" value="{{ csrf_token() }}" id="csrf-token" />
```

### Hidden Input with Livewire Model
```blade
<x-form-hidden name="selected_id" wire:model="selectedId" />
```

### Hidden Input with Custom Class
```blade
<x-form-hidden name="session_id" value="{{ session()->getId() }}" class="session-input" />
```

### Hidden Input with Data Attributes
```blade
<x-form-hidden name="tracking_id" value="{{ $trackingId }}" data-testid="tracking-input" />
```

### Hidden Input with Extra Attributes
```blade
<x-form-hidden name="form_version" value="2.0" extra-attributes="data-version=2.0" />
```

### Multiple Hidden Inputs
```blade
<x-form-hidden name="user_id" value="{{ $user->id }}" />
<x-form-hidden name="role_id" value="{{ $user->role_id }}" />
<x-form-hidden name="permissions" value="{{ json_encode($user->permissions) }}" />
```

## Real Project Examples

### User Authentication Form
```blade
<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <x-form-hidden name="redirect_to" value="{{ request('redirect_to', '/dashboard') }}" />
    <x-form-hidden name="remember" value="1" />
    
    <x-form-email name="email" label="Email Address" required />
    <x-form-password name="password" label="Password" required />
    
    <x-form-submit>Login</x-form-submit>
</form>
```

### E-commerce Product Form
```blade
<form method="POST" action="{{ route('cart.add') }}">
    @csrf
    
    <x-form-hidden name="product_id" value="{{ $product->id }}" />
    <x-form-hidden name="product_price" value="{{ $product->price }}" />
    <x-form-hidden name="product_sku" value="{{ $product->sku }}" />
    <x-form-hidden name="category_id" value="{{ $product->category_id }}" />
    
    <x-form-input name="quantity" label="Quantity" type="number" min="1" value="1" />
    <x-form-submit>Add to Cart</x-form-submit>
</form>
```

### Multi-step Form
```blade
<form method="POST" action="{{ route('registration.step2') }}">
    @csrf
    
    <x-form-hidden name="step" value="2" />
    <x-form-hidden name="registration_token" value="{{ $registrationToken }}" />
    <x-form-hidden name="email_verified" value="{{ $emailVerified ? '1' : '0' }}" />
    
    <x-form-input name="first_name" label="First Name" required />
    <x-form-input name="last_name" label="Last Name" required />
    <x-form-tel name="phone" label="Phone Number" />
    
    <x-form-submit>Continue</x-form-submit>
</form>
```

### API Integration Form
```blade
<form method="POST" action="{{ route('api.webhook') }}">
    @csrf
    
    <x-form-hidden name="api_key" value="{{ config('services.api.key') }}" />
    <x-form-hidden name="webhook_id" value="{{ $webhook->id }}" />
    <x-form-hidden name="timestamp" value="{{ time() }}" />
    <x-form-hidden name="signature" value="{{ $signature }}" />
    
    <x-form-input name="event_type" label="Event Type" required />
    <x-form-textarea name="payload" label="Event Payload" rows="5" required />
    
    <x-form-submit>Send Webhook</x-form-submit>
</form>
```

### File Upload Form
```blade
<form method="POST" action="{{ route('files.upload') }}" enctype="multipart/form-data">
    @csrf
    
    <x-form-hidden name="folder_id" value="{{ $folder->id }}" />
    <x-form-hidden name="max_size" value="{{ config('files.max_size') }}" />
    <x-form-hidden name="allowed_types" value="{{ json_encode($allowedTypes) }}" />
    <x-form-hidden name="upload_token" value="{{ $uploadToken }}" />
    
    <x-form-file name="file" label="Select File" required />
    <x-form-input name="description" label="File Description" />
    
    <x-form-submit>Upload File</x-form-submit>
</form>
```

### Survey Form
```blade
<form method="POST" action="{{ route('survey.submit') }}">
    @csrf
    
    <x-form-hidden name="survey_id" value="{{ $survey->id }}" />
    <x-form-hidden name="user_id" value="{{ auth()->id() }}" />
    <x-form-hidden name="started_at" value="{{ $startedAt }}" />
    <x-form-hidden name="session_id" value="{{ session()->getId() }}" />
    
    <x-form-input name="name" label="Your Name" required />
    <x-form-email name="email" label="Email Address" required />
    
    @foreach($questions as $question)
        <x-form-textarea name="answer_{{ $question->id }}" label="{{ $question->text }}" rows="3" />
    @endforeach
    
    <x-form-submit>Submit Survey</x-form-submit>
</form>
```

### Livewire Component Example
```blade
<div>
    <h3>User Profile Update</h3>
    
    <x-form-hidden name="user_id" wire:model="userId" />
    <x-form-hidden name="last_updated" wire:model="lastUpdated" />
    <x-form-hidden name="version" wire:model="version" />
    
    <x-form-input name="name" label="Full Name" wire:model="name" required />
    <x-form-email name="email" label="Email Address" wire:model="email" required />
    <x-form-tel name="phone" label="Phone Number" wire:model="phone" />
    
    <div class="mt-3">
        <button wire:click="saveProfile" class="btn btn-primary">Save Profile</button>
        <button wire:click="resetForm" class="btn btn-secondary">Reset</button>
    </div>
</div>
```

### Payment Form
```blade
<form method="POST" action="{{ route('payment.process') }}">
    @csrf
    
    <x-form-hidden name="order_id" value="{{ $order->id }}" />
    <x-form-hidden name="amount" value="{{ $order->total }}" />
    <x-form-hidden name="currency" value="{{ $order->currency }}" />
    <x-form-hidden name="payment_method" value="{{ $paymentMethod }}" />
    <x-form-hidden name="return_url" value="{{ route('payment.success') }}" />
    <x-form-hidden name="cancel_url" value="{{ route('payment.cancel') }}" />
    
    <x-form-input name="card_number" label="Card Number" required />
    <x-form-input name="expiry_date" label="Expiry Date (MM/YY)" required />
    <x-form-input name="cvv" label="CVV" required />
    
    <x-form-submit>Process Payment</x-form-submit>
</form>
```

### Blog Post Form
```blade
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    
    <x-form-hidden name="author_id" value="{{ auth()->id() }}" />
    <x-form-hidden name="draft" value="{{ $isDraft ? '1' : '0' }}" />
    <x-form-hidden name="scheduled_at" value="{{ $scheduledAt ?? '' }}" />
    <x-form-hidden name="meta_data" value="{{ json_encode($metaData) }}" />
    
    <x-form-input name="title" label="Post Title" required />
    <x-form-textarea name="content" label="Post Content" rows="10" required />
    <x-form-input name="slug" label="URL Slug" />
    
    <x-form-submit>{{ $isDraft ? 'Save Draft' : 'Publish Post' }}</x-form-submit>
</form>
```

## Advanced Features

### CSRF Protection
```blade
<!-- Automatically included in forms -->
<x-form-hidden name="_token" value="{{ csrf_token() }}" />
```

### Session Data
```blade
<x-form-hidden name="session_id" value="{{ session()->getId() }}" />
<x-form-hidden name="user_session" value="{{ json_encode(session()->all()) }}" />
```

### Configuration Data
```blade
<x-form-hidden name="app_version" value="{{ config('app.version') }}" />
<x-form-hidden name="environment" value="{{ config('app.env') }}" />
<x-form-hidden name="timezone" value="{{ config('app.timezone') }}" />
```

### API Tokens
```blade
<x-form-hidden name="api_token" value="{{ $apiToken }}" />
<x-form-hidden name="client_id" value="{{ $clientId }}" />
<x-form-hidden name="client_secret" value="{{ $clientSecret }}" />
```

### Tracking Data
```blade
<x-form-hidden name="utm_source" value="{{ request('utm_source') }}" />
<x-form-hidden name="utm_medium" value="{{ request('utm_medium') }}" />
<x-form-hidden name="utm_campaign" value="{{ request('utm_campaign') }}" />
<x-form-hidden name="referrer" value="{{ request()->headers->get('referer') }}" />
```

### Form State Management
```blade
<x-form-hidden name="form_step" value="{{ $currentStep }}" />
<x-form-hidden name="form_data" value="{{ json_encode($formData) }}" />
<x-form-hidden name="validation_rules" value="{{ json_encode($validationRules) }}" />
```

## Styling and Customization

### Custom CSS Classes
```blade
<x-form-hidden name="custom_field" value="custom_value" class="custom-hidden-input" />
```

### Custom Styling
```blade
<x-form-hidden name="styled_field" value="styled_value" 
    style="display: none; visibility: hidden;" />
```

### Bootstrap Utilities
```blade
<x-form-hidden name="utility_field" value="utility_value" 
    class="d-none invisible" />
```

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-hidden name="required_field" value="{{ $value }}" required />
```

### Validation Rules
```php
// In your controller
$request->validate([
    'user_id' => 'required|exists:users,id',
    'token' => 'required|string',
    'session_id' => 'required|string',
]);
```

### Custom Validation
```php
// Custom hidden field validation
$request->validate([
    'api_token' => [
        'required',
        'string',
        function ($attribute, $value, $fail) {
            if (!ApiToken::isValid($value)) {
                $fail('The ' . $attribute . ' is invalid.');
            }
        },
    ],
]);
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-control` - Base input styling
- `form-control-sm` - Small size styling
- `form-control-lg` - Large size styling
- `is-invalid` - Error state styling

## JavaScript Integration

The component can be enhanced with JavaScript:

```javascript
// Access hidden input values
document.querySelectorAll('input[type="hidden"]').forEach(input => {
    console.log('Hidden field:', input.name, '=', input.value);
});

// Update hidden field values dynamically
function updateHiddenField(name, value) {
    const field = document.querySelector(`input[name="${name}"]`);
    if (field) {
        field.value = value;
    }
}

// Track form changes
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function() {
        const hiddenFields = this.querySelectorAll('input[type="hidden"]');
        hiddenFields.forEach(field => {
            console.log('Submitting hidden field:', field.name, '=', field.value);
        });
    });
});
```

## Accessibility Features

- Proper label association (though hidden)
- ARIA attributes for screen readers
- Keyboard navigation support
- Focus management

```blade
<x-form-hidden name="accessible" value="accessible_value" 
    aria-describedby="help-text" />
```

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **HTML5 Hidden Input**: Full support
- **CSS Grid**: Full support
- **Flexbox**: Full support
- **CSS Custom Properties**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**Hidden field not submitting**
```blade
<!-- Ensure proper name attribute -->
<x-form-hidden name="field_name" value="field_value" />
```

**Value not updating**
```blade
<!-- Use Livewire model for dynamic updates -->
<x-form-hidden name="dynamic_field" wire:model="dynamicValue" />
```

**Validation errors not showing**
```blade
<!-- Ensure validation rules are set -->
<x-form-hidden name="required_field" value="{{ $value }}" required />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Input](form-input.md) - Base input component
- [Form URL](form-url.md) - URL input component
- [Form Email](form-email.md) - Email input component
- [Form Label](form-label.md) - Label component
- [Form Errors](form-errors.md) - Error display component

## Performance

### Optimization Tips
1. **Minimize hidden fields** to reduce form size
2. **Use appropriate validation** for hidden data
3. **Avoid storing sensitive data** in hidden fields
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~1KB
- **With Bootstrap**: ~50KB (one-time load)
- **With Custom CSS**: ~0.5KB
- **Full Package**: ~51.5KB

## Examples Gallery

### Basic Hidden Inputs
```blade
<!-- Simple hidden input -->
<x-form-hidden name="id" value="123" />

<!-- With custom ID -->
<x-form-hidden name="token" value="{{ csrf_token() }}" id="csrf-token" />

<!-- With Livewire model -->
<x-form-hidden name="user_id" wire:model="userId" />
```

### Advanced Hidden Inputs
```blade
<!-- With data attributes -->
<x-form-hidden name="tracking" value="track123" data-testid="tracking" />

<!-- With extra attributes -->
<x-form-hidden name="version" value="2.0" extra-attributes="data-version=2.0" />

<!-- With custom class -->
<x-form-hidden name="session" value="{{ session()->getId() }}" class="session-input" />
```

## Changelog

### Version 2.0
- Enhanced validation integration
- Improved accessibility features
- Better error handling
- Livewire compatibility improvements

### Version 1.0
- Initial release
- Basic hidden input functionality
- HTML5 hidden input support
- Bootstrap integration

## Contributing

When contributing to the Form Hidden component:

1. **Test validation behavior** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-form-components` package and is licensed under the MIT License.
