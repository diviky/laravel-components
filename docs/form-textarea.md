# Form Textarea Component

A flexible textarea component for multi-line text input with validation support and floating labels.

## View File

Location: `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-textarea.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Label text for the textarea | 'Description' |
| name | string | required | Textarea name attribute | 'description' |
| value | string | null | Initial value | 'Default text content' |
| placeholder | string | '' | Placeholder text | 'Enter description' |
| required | boolean | false | Whether the field is required | true |
| readonly | boolean | false | Whether the field is readonly | true |
| disabled | boolean | false | Whether the field is disabled | true |
| rows | int | 3 | Number of visible rows | 5 |
| cols | int | null | Number of visible columns | 30 |
| size | string | '' | Textarea size | 'sm', 'lg' |
| floating | boolean | false | Use floating label style | true |
| help | string | null | Help text to display | 'Enter detailed description' |
| id | string | auto | Textarea ID attribute | 'content-area' |
| title | string | null | Title attribute for tooltip | 'Enter content here' |
| class | string | null | Additional CSS classes | 'custom-textarea' |
| wire:model | string | null | Livewire model binding | 'content' |
| maxlength | int | null | Maximum character length | 1000 |
| minlength | int | null | Minimum character length | 10 |
| data-length | boolean | false | Show character counter | true |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

## Slot Properties

| Slot | Description | Example |
|------|-------------|---------|
| before | Content before textarea | `<x-slot name="before">Prefix content</x-slot>` |
| after | Content after textarea | `<x-slot name="after">Suffix content</x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |

## Usage Examples

### Basic Textarea
```blade
<x-form-textarea name="description" label="Description" placeholder="Enter description" rows="4" />
```

### Textarea with Character Limit
```blade
<x-form-textarea name="content" label="Content" maxlength="500" data-length rows="5" />
```

### Required Textarea
```blade
<x-form-textarea name="message" label="Message" required placeholder="Your message here" />
```

### Floating Label
```blade
<x-form-textarea name="notes" label="Notes" floating placeholder="Enter notes" />
```

### With Help Text
```blade
<x-form-textarea name="bio" label="Biography" help="Tell us about yourself" rows="6" />
```

### Readonly Textarea
```blade
<x-form-textarea name="terms" label="Terms & Conditions" readonly value="Terms content here..." />
```

### Disabled Textarea
```blade
<x-form-textarea name="disabled_field" label="Disabled Field" disabled value="Cannot edit this" />
```

### Different Sizes
```blade
<x-form-textarea name="small_text" label="Small Textarea" size="sm" rows="3" />
<x-form-textarea name="normal_text" label="Normal Textarea" rows="4" />
<x-form-textarea name="large_text" label="Large Textarea" size="lg" rows="5" />
```

### Livewire Integration
```blade
<x-form-textarea name="comment" label="Comment" wire:model.live="comment" rows="4" />
```

### With Character Counter
```blade
<x-form-textarea name="post_content" label="Post Content" 
    data-length maxlength="2000" rows="8" 
    placeholder="Write your post..." />
```

### With Before/After Slots
```blade
<x-form-textarea name="email_body" label="Email Body" rows="6">
    <x-slot name="before">
        <div class="text-muted small">Email template:</div>
    </x-slot>
    <x-slot name="after">
        <div class="text-muted small">Variables: {name}, {email}</div>
    </x-slot>
</x-form-textarea>
```

### With Custom Help
```blade
<x-form-textarea name="feedback" label="Feedback" rows="5">
    <x-slot name="help">
        <div class="small text-muted">
            Please provide detailed feedback. <a href="#guidelines">See guidelines</a>
        </div>
    </x-slot>
</x-form-textarea>
```

### Code Input
```blade
<x-form-textarea name="code" label="Code" rows="10" class="font-monospace" 
    placeholder="Enter your code here..." />
```

### Auto-expanding Textarea
```blade
<x-form-textarea name="dynamic_content" label="Dynamic Content" 
    rows="3" data-auto-expand="true" />
```

## Real Project Examples

### From SMS Notification Form
```blade
<x-form-textarea name="send[to]" label="Send To" data-length required maxlength="2000" cols="30" rows="5">
    @slot('help')
        <div class="small pt-1"><b>Note:</b> Multiple emails are separated by comma (,)</div>
    @endslot
</x-form-textarea>
```

### From Email Template Editor
```blade
<x-form-textarea name="template_content" label="Email Template" 
    rows="12" maxlength="5000" data-length 
    placeholder="Enter email template content..." />
```

### From Contact Form
```blade
<x-form-textarea name="message" label="Message" required 
    rows="6" placeholder="How can we help you?" />
```

## Advanced Features

### Rich Text Editor Integration
```blade
<x-form-textarea name="content" label="Content" 
    data-editor="tinymce" rows="10" 
    data-editor-config='{"toolbar": "bold italic | link"}' />
```

### Markdown Support
```blade
<x-form-textarea name="markdown_content" label="Markdown Content" 
    rows="8" data-markdown="true" 
    help="Supports Markdown syntax" />
```

### Auto-save Feature
```blade
<x-form-textarea name="draft" label="Draft" 
    rows="8" data-auto-save="true" 
    data-auto-save-interval="30000" />
```

### Spell Check
```blade
<x-form-textarea name="content" label="Content" 
    rows="6" spellcheck="true" />
```

### Custom Validation
```blade
<x-form-textarea name="custom_field" label="Custom Field" 
    rows="4" pattern="[A-Za-z\s]+" 
    title="Only letters and spaces allowed" />
```

## Styling and Customization

### Custom CSS Classes
```blade
<x-form-textarea name="styled" label="Styled Textarea" 
    class="custom-textarea border-primary" rows="5" />
```

### Custom Styling
```blade
<x-form-textarea name="custom_style" label="Custom Style" 
    style="background-color: #f8f9fa; border-radius: 10px;" rows="4" />
```

## Related Components

- [Form Label](form-label.md) - Used internally for labels
- [Form Errors](form-errors.md) - Used internally for error display
- [Help](help.md) - Used for help text display
- [Editor Components](editor-components.md) - Rich text editors for advanced content

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-textarea name="content" label="Content" required />
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-control` - Base textarea styling
- `form-control-sm` - Small size styling
- `form-control-lg` - Large size styling
- `is-invalid` - Error state styling
- `form-floating` - Floating label styling

## JavaScript Integration

The component can be enhanced with JavaScript:

```javascript
// Character counter
document.querySelectorAll('[data-length]').forEach(textarea => {
    // Add character counter functionality
});

// Auto-expand
document.querySelectorAll('[data-auto-expand]').forEach(textarea => {
    // Add auto-expand functionality
});
```

## Accessibility Features

- Proper label association
- ARIA attributes for screen readers
- Keyboard navigation support
- Focus management
- Error state announcements 
