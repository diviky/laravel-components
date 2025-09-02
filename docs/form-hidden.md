# Form Hidden Component

A specialized hidden input component that provides a professional interface for storing hidden form data with comprehensive form integration and enhanced functionality. This component extends FormInput to offer intuitive hidden input experiences with proper data handling and form state management.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-hidden.blade.php`
- **Documentation:** `docs/form-hidden.md`

## Basic Usage

### Simple Hidden Input
```blade
<x-form-hidden name="token" value="abc123" />
```

### With Default Value
```blade
<x-form-hidden 
    name="user_id" 
    :default="'42'">
</x-form-hidden>
```

### With Extra Attributes
```blade
<x-form-hidden 
    name="session_id" 
    :extra-attributes="['data-test' => 'hidden']">
</x-form-hidden>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'token'` or `'user_id'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | mixed | null | Current hidden value | `'abc123'` |
| default | mixed | null | Default hidden value | `'default_value'` |
| extraAttributes | mixed | null | Additional attributes | `['data-test' => 'hidden']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'hidden-input'` |
| class | string | '' | CSS classes | `'hidden-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'access-hidden'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### No Slots Available

This component does not support slots as it is a hidden input field that is not visible to users.

## Usage Examples

### Basic Hidden Input
```blade
<x-form-hidden name="csrf_token" value="{{ csrf_token() }}" />
```

### With Model Binding
```blade
<x-form-hidden name="user_id" :value="$user->id" />
```

### With Livewire Integration
```blade
<x-form-hidden name="form_id" wire:model="formId" />
```

### With Extra Attributes
```blade
<x-form-hidden 
    name="tracking_id" 
    :extra-attributes="['data-analytics' => 'true']">
</x-form-hidden>
```

### With Dynamic Values
```blade
<x-form-hidden name="timestamp" :value="time()" />
```

### With Computed Values
```blade
<x-form-hidden name="hash" :value="hash('sha256', $data)" />
```

### With Session Data
```blade
<x-form-hidden name="session_token" :value="session('token')" />
```

### With Configuration Values
```blade
<x-form-hidden name="app_version" :value="config('app.version')" />
```

## Component Variants

### Standard Hidden Input
**Usage:** `<x-form-hidden>` (default)
**Description:** Basic hidden input with standard functionality
**Features:**
- HTML5 hidden input type
- Standard hidden input validation
- FormInput extension
- Comprehensive form integration

### Livewire Hidden Input
**Usage:** `<x-form-hidden wire:model="data">`
**Description:** Hidden input with Livewire model binding
**Features:**
- Livewire model binding support
- Real-time data synchronization
- Enhanced form state management
- Dynamic value updates

### Secure Hidden Input
**Usage:** `<x-form-hidden name="secure_token" :value="encrypt($data)">`
**Description:** Hidden input with encrypted values
**Features:**
- Encrypted data storage
- Security-focused implementation
- Professional security handling
- Compliance support

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-hidden>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-hidden' => [
        'view' => 'laravel-components::{framework}.form-hidden',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'hidden'`
- **Visibility:** Hidden from user interface
- **Validation:** Standard hidden input validation
- **Form Integration:** Full form integration support

## Common Patterns

### CSRF Protection
```blade
<div class="secure-form-container">
    <h4>Secure Form Submission</h4>
    <p>Submit your data securely:</p>
    
    <x-form-hidden name="csrf_token" value="{{ csrf_token() }}" />
    <x-form-hidden name="form_hash" :value="hash('sha256', $formData)" />
    <x-form-hidden name="timestamp" :value="time()" />
    
    <x-form-input name="user_input" label="User Input" required />
    
    <x-form-submit>Submit Securely</x-form-submit>
</div>
```

### User Session Management
```blade
<div class="user-session-form">
    <h4>User Session Management</h4>
    <p>Manage your user session:</p>
    
    <x-form-hidden name="user_id" :value="$user->id" />
    <x-form-hidden name="session_id" :value="session('session_id')" />
    <x-form-hidden name="last_activity" :value="time()" />
    <x-form-hidden name="ip_address" :value="request()->ip()" />
    
    <x-form-input name="action" label="Action" required />
    
    <x-form-submit>Update Session</x-form-submit>
</div>
```

### Form State Persistence
```blade
<div class="form-state-form">
    <h4>Form State Persistence</h4>
    <p>Maintain form state across requests:</p>
    
    <x-form-hidden name="form_id" :value="Str::uuid()" />
    <x-form-hidden name="form_version" :value="config('app.version')" />
    <x-form-hidden name="form_timestamp" :value="now()->timestamp" />
    <x-form-hidden name="form_hash" :value="hash('sha256', $formState)" />
    
    <x-form-input name="form_data" label="Form Data" required />
    
    <x-form-submit>Save State</x-form-submit>
</div>
```

### API Integration
```blade
<div class="api-integration-form">
    <h4>API Integration</h4>
    <p>Integrate with external APIs:</p>
    
    <x-form-hidden name="api_key" :value="config('services.api.key')" />
    <x-form-hidden name="api_secret" :value="encrypt(config('services.api.secret'))" />
    <x-form-hidden name="api_endpoint" :value="config('services.api.endpoint')" />
    <x-form-hidden name="request_id" :value="Str::uuid()" />
    
    <x-form-input name="api_data" label="API Data" required />
    
    <x-form-submit>Send to API</x-form-submit>
</div>
```

### E-commerce Order Management
```blade
<div class="order-management-form">
    <h4>Order Management</h4>
    <p>Process your order:</p>
    
    <x-form-hidden name="order_id" :value="$order->id" />
    <x-form-hidden name="customer_id" :value="$customer->id" />
    <x-form-hidden name="order_total" :value="$order->total" />
    <x-form-hidden name="currency" :value="$order->currency" />
    <x-form-hidden name="payment_method" :value="$paymentMethod" />
    
    <x-form-input name="order_notes" label="Order Notes" />
    
    <x-form-submit>Process Order</x-form-submit>
</div>
```

### Content Management
```blade
<div class="content-management-form">
    <h4>Content Management</h4>
    <p>Manage your content:</p>
    
    <x-form-hidden name="content_id" :value="$content->id" />
    <x-form-hidden name="content_type" :value="$content->type" />
    <x-form-hidden name="author_id" :value="$content->author_id" />
    <x-form-hidden name="created_at" :value="$content->created_at->timestamp" />
    <x-form-hidden name="content_hash" :value="hash('sha256', $content->body)" />
    
    <x-form-input name="content_title" label="Content Title" required />
    <x-form-textarea name="content_body" label="Content Body" rows="10" required />
    
    <x-form-submit>Update Content</x-form-submit>
</div>
```

### User Authentication
```blade
<div class="user-authentication-form">
    <h4>User Authentication</h4>
    <p>Authenticate your user:</p>
    
    <x-form-hidden name="auth_token" :value="Str::random(64)" />
    <x-form-hidden name="auth_timestamp" :value="time()" />
    <x-form-hidden name="auth_nonce" :value="Str::random(32)" />
    <x-form-hidden name="auth_signature" :value="hash_hmac('sha256', $data, $secret)" />
    
    <x-form-input name="username" label="Username" required />
    <x-form-password name="password" label="Password" required />
    
    <x-form-submit>Authenticate</x-form-submit>
</div>
```

### File Upload Security
```blade
<div class="file-upload-form">
    <h4>Secure File Upload</h4>
    <p>Upload files securely:</p>
    
    <x-form-hidden name="upload_token" :value="Str::random(32)" />
    <x-form-hidden name="upload_max_size" :value="config('filesystems.max_size')" />
    <x-form-hidden name="upload_allowed_types" :value="json_encode(config('filesystems.allowed_types'))" />
    <x-form-hidden name="upload_hash" :value="hash('sha256', $fileData)" />
    
    <x-form-file name="file" label="Select File" required />
    
    <x-form-submit>Upload File</x-form-submit>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_hidden_with_basic_attributes()
{
    $view = $this->blade('<x-form-hidden name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('type="hidden"');
}

/** @test */
public function it_renders_form_hidden_with_value()
{
    $view = $this->blade('<x-form-hidden name="test" value="hidden_value" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('value="hidden_value"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(HiddenComponent::class)
        ->assertSee('<x-form-hidden')
        ->set('hiddenValue', 'test')
        ->assertSee('test');
}
```

## Accessibility

### ARIA Attributes
- `aria-hidden="true"`: Applied to hidden input
- `role="presentation"`: Applied to input field

### Screen Reader Support
- Hidden inputs are not announced to screen readers
- Proper form structure maintained
- Form validation support
- Error handling support

### Hidden Input Accessibility
- Not visible to users
- Maintains form functionality
- Supports form validation
- Preserves form state

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 hidden input type

## Troubleshooting

### Common Issues

#### Hidden Input Not Working
**Problem:** Hidden input not functioning correctly
**Solution:** Check HTML5 hidden input support and attribute handling

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Value Not Persisting
**Problem:** Hidden input values not persisting
**Solution:** Verify value attribute and form submission handling

#### Styling Issues
**Problem:** Hidden input styling problems
**Solution:** Hidden inputs should not have visible styling

#### Validation Issues
**Problem:** Hidden input validation errors not displaying
**Solution:** Check form validation rules and error handling

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Text:** Text input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with HTML5 hidden input type
- FormInput extension with hidden functionality
- Comprehensive form integration
- Enhanced data handling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-hidden.blade.php`
2. Add/update tests in `tests/Components/FormHiddenTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Text Component](../form-text.md)
- [HTML5 Hidden Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/hidden)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
