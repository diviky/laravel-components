# Form Submit Component

A comprehensive submit button component that provides professional form submission capabilities with extensive styling options and enhanced user experience. This component offers advanced button features including color variants, size options, state management, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class  
**JavaScript Libraries:** None (pure HTML form submission)

## Files

- **PHP Class:** `src/Components/FormSubmit.php`
- **View File:** `resources/views/bootstrap-5/form-submit.blade.php`
- **Tests:** `tests/Components/FormSubmitTest.php`
- **Documentation:** `docs/form-submit.md`

## Basic Usage

### Simple Submit Button
```blade
<x-form-submit>Submit Form</x-form-submit>
```

### With Color Variant
```blade
<x-form-submit primary>Save Changes</x-form-submit>
```

### With Loading State
```blade
<x-form-submit loading>Processing...</x-form-submit>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| outline | boolean | false | Use outline button style | `true` |
| ghost | boolean | false | Use ghost button style | `true` |
| disabled | boolean | false | Disable the button | `true` |
| loading | boolean | false | Show loading state | `true` |
| full | boolean | false | Full width button | `true` |
| primary | boolean | false | Primary color variant | `true` |
| success | boolean | false | Success color variant | `true` |
| warning | boolean | false | Warning color variant | `true` |
| danger | boolean | false | Danger color variant | `true` |
| info | boolean | false | Info color variant | `true` |
| light | boolean | false | Light color variant | `true` |
| dark | boolean | false | Dark color variant | `true` |
| cancel | boolean | false | Cancel button style | `true` |
| square | boolean | false | Square button style | `true` |
| pill | boolean | false | Pill-shaped button | `true` |
| bold | boolean | false | Bold text style | `true` |
| color | string | null | Custom color class | `'purple'` |
| size | string | null | Custom size class | `'xl'` |
| variant | string | null | Custom variant class | `'rounded'` |
| icon | string | null | Icon name | `'save'` |

### Inherited Attributes

The component inherits all standard HTML button attributes and Laravel component attributes.

## Usage Examples

### Basic Form Submission
```blade
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <x-form-input name="name" label="Name" required />
    <x-form-input name="email" label="Email" type="email" required />
    <x-form-submit>Create User</x-form-submit>
</form>
```

### Color Variants
```blade
<!-- Primary Submit Button -->
<x-form-submit primary>Save Changes</x-form-submit>

<!-- Success Submit Button -->
<x-form-submit success>Confirm Order</x-form-submit>

<!-- Danger Submit Button -->
<x-form-submit danger>Delete Account</x-form-submit>

<!-- Warning Submit Button -->
<x-form-submit warning>Update Settings</x-form-submit>

<!-- Info Submit Button -->
<x-form-submit info>Submit Feedback</x-form-submit>
```

### Size Variants
```blade
<!-- Small Submit Button -->
<x-form-submit sm>Save</x-form-submit>

<!-- Large Submit Button -->
<x-form-submit lg>Submit Application</x-form-submit>

<!-- Full Width Submit Button -->
<x-form-submit full>Complete Registration</x-form-submit>
```

### Style Variants
```blade
<!-- Outline Submit Button -->
<x-form-submit outline>Cancel</x-form-submit>

<!-- Ghost Submit Button -->
<x-form-submit ghost>Reset</x-form-submit>

<!-- Pill Submit Button -->
<x-form-submit pill>Submit</x-form-submit>

<!-- Square Submit Button -->
<x-form-submit square>Save</x-form-submit>
```

### With Icons
```blade
<!-- Submit with Save Icon -->
<x-form-submit icon="save">Save Document</x-form-submit>

<!-- Submit with Send Icon -->
<x-form-submit icon="send" primary>Send Message</x-form-submit>

<!-- Submit with Check Icon -->
<x-form-submit icon="check" success>Confirm</x-form-submit>
```

### State Management
```blade
<!-- Disabled Submit Button -->
<x-form-submit disabled>Cannot Submit</x-form-submit>

<!-- Loading Submit Button -->
<x-form-submit loading>Processing...</x-form-submit>

<!-- Conditional State -->
<x-form-submit :disabled="!$isValid" :loading="$isSubmitting">
    {{ $isSubmitting ? 'Saving...' : 'Save Changes' }}
</x-form-submit>
```

### Advanced Form Examples
```blade
<!-- User Registration Form -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <x-form-input name="name" label="Full Name" required />
    <x-form-email name="email" label="Email Address" required />
    <x-form-password name="password" label="Password" required />
    <x-form-password name="password_confirmation" label="Confirm Password" required />
    
    <div class="d-flex gap-2">
        <x-form-submit success>Create Account</x-form-submit>
        <x-form-submit outline>Cancel</x-form-submit>
    </div>
</form>
```

### E-commerce Checkout Form
```blade
<form method="POST" action="{{ route('checkout.process') }}">
    @csrf
    <x-form-input name="billing_name" label="Billing Name" required />
    <x-form-textarea name="billing_address" label="Billing Address" required />
    <x-form-input name="card_number" label="Card Number" required />
    <x-form-input name="expiry_date" label="Expiry Date" placeholder="MM/YY" required />
    <x-form-input name="cvv" label="CVV" required />
    
    <div class="d-flex justify-content-between">
        <x-form-submit outline>Back to Cart</x-form-submit>
        <x-form-submit danger icon="credit-card">Pay ${{ $total }}</x-form-submit>
    </div>
</form>
```

### Contact Form
```blade
<form method="POST" action="{{ route('contact.submit') }}">
    @csrf
    <x-form-input name="name" label="Your Name" required />
    <x-form-email name="email" label="Email Address" required />
    <x-form-tel name="phone" label="Phone Number" />
    <x-form-select name="subject" label="Subject" :options="['General', 'Support', 'Sales', 'Other']" required />
    <x-form-textarea name="message" label="Message" rows="5" required />
    
    <x-form-submit info icon="send">Send Message</x-form-submit>
</form>
```

### Settings Form
```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')
    
    <x-form-switch name="notifications" label="Email Notifications" :value="$user->notifications_enabled" />
    <x-form-switch name="public_profile" label="Public Profile" :value="$user->is_public" />
    <x-form-select name="timezone" label="Timezone" :options="$timezones" :value="$user->timezone" />
    <x-form-select name="language" label="Language" :options="$languages" :value="$user->language" />
    
    <div class="d-flex gap-2">
        <x-form-submit primary>Save Settings</x-form-submit>
        <x-form-submit outline>Reset to Defaults</x-form-submit>
    </div>
</form>
```

## Livewire Integration

### Basic Livewire Form
```blade
<div>
    <form wire:submit.prevent="save">
        <x-form-input wire:model="name" label="Name" required />
        <x-form-email wire:model="email" label="Email" required />
        
        <x-form-submit :loading="$isSubmitting">
            {{ $isSubmitting ? 'Saving...' : 'Save User' }}
        </x-form-submit>
    </form>
</div>
```

### Livewire with Validation
```blade
<div>
    <form wire:submit.prevent="updateProfile">
        <x-form-input wire:model="name" label="Name" required />
        <x-form-email wire:model="email" label="Email" required />
        <x-form-textarea wire:model="bio" label="Bio" />
        
        <x-form-submit 
            :disabled="!$this->isValid" 
            :loading="$isUpdating"
            success>
            {{ $isUpdating ? 'Updating...' : 'Update Profile' }}
        </x-form-submit>
    </form>
</div>
```

## Styling Classes

The component applies these CSS classes based on props:

### Color Classes
- `btn-primary` - Primary color
- `btn-success` - Success color  
- `btn-danger` - Danger color
- `btn-warning` - Warning color
- `btn-info` - Info color
- `btn-light` - Light color
- `btn-dark` - Dark color

### Style Classes
- `btn-outline-primary` - Outline primary
- `btn-ghost-primary` - Ghost primary
- `btn-square` - Square button
- `btn-pill` - Pill-shaped button
- `btn-block` - Full width button

### Size Classes
- `btn-sm` - Small button
- `btn-lg` - Large button

### State Classes
- `btn-loading` - Loading state
- `disabled` - Disabled state

## Related Components

- [Form Button](form-button.md) - General purpose buttons
- [Form](form.md) - Form wrapper component
- [Form Input](form-input.md) - Text input fields
- [Form Select](form-select.md) - Select dropdowns
- [Form Textarea](form-textarea.md) - Multi-line text areas

## Best Practices

1. **Clear Labels**: Use descriptive text that indicates the action
2. **Color Semantics**: Use appropriate colors (success for save, danger for delete)
3. **Loading States**: Show loading state during form submission
4. **Disabled States**: Disable button when form is invalid
5. **Icon Usage**: Use icons to enhance button clarity
6. **Accessibility**: Ensure proper form structure and labeling
7. **Responsive Design**: Use appropriate sizes for different screen sizes

## Troubleshooting

### Button Not Submitting Form
Ensure the button is inside a `<form>` element and has `type="submit"` (default).

### Styling Issues
Check that Bootstrap CSS is loaded and the correct framework is configured.

### Livewire Integration
Make sure to use `wire:submit.prevent` on the form element for Livewire forms.

### Icon Not Showing
Verify that the icon name exists in your icon library (Tabler Icons by default).
