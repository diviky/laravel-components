# Form Component

A comprehensive form wrapper component that handles method spoofing, CSRF protection, validation styling, and various form behaviors.

## View File

Location: `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| action | string | required | Form action URL | '/users/create' |
| method | string | 'POST' | HTTP method | 'GET', 'POST', 'PUT', 'PATCH', 'DELETE' |
| style | string | null | Form style variant | 'floated' |
| floated | boolean | false | Use floating labels for all inputs | true |
| reset | boolean | false | Reset form after successful submission | true |
| render | boolean | false | Enable form rendering behavior | true |
| hide | boolean | false | Hide form after successful submission | true |
| close | boolean | false | Alias for hide | true |
| easy | boolean | false | Enable easy submit behavior | true |
| easysubmit | boolean | false | Alias for easy | true |
| spellcheck | boolean | true | Enable spellcheck on form fields | false |
| hasFiles | boolean | false | Form contains file uploads | true |
| id | string | null | Form ID attribute | 'user-form' |
| class | string | null | Additional CSS classes | 'custom-form' |
| enctype | string | auto | Form encoding type | 'multipart/form-data' |

## Data Attributes

| Attribute | Description | Example |
|-----------|-------------|---------|
| data-reset | Reset form after submission | `data-reset="true"` |
| data-render | Enable form rendering | `data-render="true"` |
| data-hide | Hide form after submission | `data-hide="true"` |
| easysubmit | Enable easy submit | `easysubmit` |

## Usage Examples

### Basic Form
```blade
<x-form action="{{ route('users.store') }}" method="POST">
    <x-form-input name="name" label="Name" required />
    <x-form-input name="email" label="Email" type="email" required />
    <x-form-submit>Create User</x-form-submit>
</x-form>
```

### Form with Method Spoofing
```blade
<x-form action="{{ route('users.update', $user) }}" method="PUT">
    <x-form-input name="name" label="Name" :value="$user->name" required />
    <x-form-input name="email" label="Email" type="email" :value="$user->email" required />
    <x-form-submit>Update User</x-form-submit>
</x-form>
```

### Form with File Upload
```blade
<x-form action="{{ route('profile.avatar') }}" method="POST" hasFiles>
    <x-form-file name="avatar" label="Profile Picture" />
    <x-form-submit>Upload Avatar</x-form-submit>
</x-form>
```

### Floating Labels Form
```blade
<x-form action="{{ route('contact') }}" floated>
    <x-form-input name="name" label="Full Name" placeholder="Enter your name" />
    <x-form-input name="email" label="Email" type="email" placeholder="your@email.com" />
    <x-form-textarea name="message" label="Message" placeholder="Your message" />
    <x-form-submit>Send Message</x-form-submit>
</x-form>
```

### Form with Easy Submit
```blade
<x-form action="{{ route('quick.save') }}" easysubmit>
    <x-form-input name="title" label="Title" />
    <x-form-submit>Save</x-form-submit>
</x-form>
```

### Form with Reset Behavior
```blade
<x-form action="{{ route('data.store') }}" reset>
    <x-form-input name="item" label="Item" />
    <x-form-submit>Add Item</x-form-submit>
</x-form>
```

### Form with Hide Behavior
```blade
<x-form action="{{ route('feedback.store') }}" hide>
    <x-form-textarea name="feedback" label="Feedback" />
    <x-form-submit>Submit Feedback</x-form-submit>
</x-form>
```

### AJAX Form with Render
```blade
<x-form action="{{ route('api.data') }}" render>
    <x-form-input name="query" label="Search Query" />
    <x-form-submit>Search</x-form-submit>
</x-form>
```

### GET Form (Search)
```blade
<x-form action="{{ route('products.index') }}" method="GET">
    <x-form-input name="search" label="Search Products" />
    <x-form-select name="category" label="Category" :options="$categories" />
    <x-form-submit>Search</x-form-submit>
</x-form>
```

### Form without Spellcheck
```blade
<x-form action="{{ route('code.save') }}" :spellcheck="false">
    <x-form-textarea name="code" label="Code" class="font-monospace" />
    <x-form-submit>Save Code</x-form-submit>
</x-form>
```

### Complex Form Example
```blade
<x-form action="{{ route('users.store') }}" method="POST" hasFiles easysubmit reset class="needs-validation">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="first_name" label="First Name" required />
        </div>
        <div class="col-md-6">
            <x-form-input name="last_name" label="Last Name" required />
        </div>
    </div>
    
    <x-form-input name="email" label="Email" type="email" required />
    <x-form-file name="avatar" label="Profile Picture" />
    
    <div class="row">
        <div class="col-md-6">
            <x-form-select name="role" label="Role" :options="$roles" required />
        </div>
        <div class="col-md-6">
            <x-form-select name="department" label="Department" :options="$departments" />
        </div>
    </div>
    
    <x-form-switch name="is_active" label="Active User" checked />
    <x-form-checkbox name="send_welcome" label="Send welcome email" />
    
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary">Cancel</button>
        <x-form-submit class="btn-primary">Create User</x-form-submit>
    </div>
</x-form>
```

## Real Project Examples

### From SMS Notification Form
```blade
<x-form :action="route('sms.notifications.create')" reset hide render easysubmit>
    <x-form-switch name="status" value="1" label="Is active?" />
    <livewire:product.search.tenant label="User" name="tenant_id" placeholder="Search User" />
    <x-form-select name="report" required label="Report" wire:model.live="report" :options="$this->reports" />
    <x-form-submit full> Create </x-form-submit>
</x-form>
```

### From SMS Sender Form
```blade
<x-form :action="route('sms.senders.create')" reset hide render easysubmit>
    <x-form-input type="hidden" name="id" />
    <x-form-switch name="status" value="1" notchecked="0" label="Is active user?" />
    <x-form-input name="name" label="Sender Id/Name" readonly />
    <x-form-submit full> Update </x-form-submit>
</x-form>
```

### From Import Form
```blade
<x-form :action="route('mailer.whitelist.import')" reset hide render easysubmit>
    <x-form-input type="email" name="receiver" label="Receiver Mail" required />
    <x-form-submit full> Create </x-form-submit>
</x-form>
```

## Method Spoofing

Laravel uses method spoofing for PUT, PATCH, and DELETE requests:

```blade
<!-- This form will include @method('PUT') automatically -->
<x-form action="{{ route('users.update', $user) }}" method="PUT">
    <!-- Form fields -->
</x-form>
```

Generated HTML:
```html
<form action="/users/1" method="POST">
    @csrf
    @method('PUT')
    <!-- Form fields -->
</form>
```

## CSRF Protection

CSRF tokens are automatically included for non-GET requests:

```blade
<x-form action="{{ route('users.store') }}" method="POST">
    <!-- @csrf is automatically included -->
</x-form>
```

## File Upload Support

When `hasFiles` is true, the form automatically sets the correct encoding:

```blade
<x-form action="{{ route('upload') }}" hasFiles>
    <!-- enctype="multipart/form-data" is automatically added -->
</x-form>
```

## Validation Integration

The form automatically applies validation classes based on errors:

```blade
<x-form action="{{ route('users.store') }}" class="needs-validation">
    <!-- Form will have 'needs-validation' class if there are errors -->
</x-form>
```

## JavaScript Behaviors

### Easy Submit
Enables AJAX form submission with automatic handling:
```blade
<x-form action="{{ route('api.save') }}" easysubmit>
    <!-- Form will be submitted via AJAX -->
</x-form>
```

### Reset Behavior
Resets form fields after successful submission:
```blade
<x-form action="{{ route('data.store') }}" reset>
    <!-- Form fields will be cleared after success -->
</x-form>
```

### Hide Behavior
Hides the form after successful submission:
```blade
<x-form action="{{ route('feedback.store') }}" hide>
    <!-- Form will be hidden after success -->
</x-form>
```

### Render Behavior
Renders response content in place of form:
```blade
<x-form action="{{ route('search') }}" render>
    <!-- Response will replace form content -->
</x-form>
```

## Styling Classes

The component applies these CSS classes based on props:

- `needs-validation` - When form has validation errors
- `form-floated` - When using floating labels

## Related Components

- [Form Input](form-input.md) - Text input fields
- [Form Select](form-select.md) - Select dropdowns
- [Form Textarea](form-textarea.md) - Multi-line text areas
- [Form Checkbox](form-checkbox.md) - Checkbox inputs
- [Form Switch](form-switch.md) - Toggle switches
- [Form Submit](form-submit.md) - Submit buttons
- [Form File](form-file.md) - File upload inputs

## Best Practices

1. **Always Use CSRF**: Forms automatically include CSRF tokens for security
2. **Method Spoofing**: Use appropriate HTTP methods (PUT, PATCH, DELETE)
3. **File Uploads**: Set `hasFiles="true"` when uploading files
4. **Validation**: Let the form handle validation styling automatically
5. **AJAX Forms**: Use `easysubmit` for simple AJAX behavior
6. **User Experience**: Use `reset` or `hide` for better UX after submission
7. **Accessibility**: Ensure proper form labeling and structure

## JavaScript API

### Events
```javascript
// Form submission start
document.addEventListener('form:submit:start', function(e) {
    console.log('Form submission started', e.detail);
});

// Form submission success
document.addEventListener('form:submit:success', function(e) {
    console.log('Form submitted successfully', e.detail);
});

// Form submission error
document.addEventListener('form:submit:error', function(e) {
    console.log('Form submission failed', e.detail);
});
```

### Manual Form Reset
```javascript
// Reset form programmatically
document.querySelector('#my-form').reset();

// Or using custom event
document.querySelector('#my-form').dispatchEvent(new Event('form:reset'));
``` 
