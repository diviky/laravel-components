# Form Input Component

A flexible input component that supports various input types, icons, prepend/append content, and validation.

## View File

Location: `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-input.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Label text for the input | 'Email Address' |
| name | string | required | Input name attribute | 'email' |
| type | string | 'text' | Input type | 'email', 'password', 'text', 'number', 'tel', 'url', 'color', 'hidden' |
| value | string | null | Initial value | 'john@example.com' |
| placeholder | string | null | Placeholder text | 'Enter your email' |
| required | boolean | false | Whether the field is required | true |
| readonly | boolean | false | Whether the field is readonly | true |
| disabled | boolean | false | Whether the field is disabled | true |
| size | string | null | Input size | 'sm', 'lg' |
| icon | string | null | Icon name to display | 'user', 'email', 'lock' |
| floating | boolean | false | Use floating label style | true |
| flat | boolean | false | Use flat input group style | true |
| inline | boolean | false | Display inline without form-group wrapper | true |
| help | string | null | Help text to display | 'This is help text' |
| id | string | auto | Input ID attribute | 'user-email' |
| title | string | null | Title attribute for tooltip | 'Enter a valid email' |
| class | string | null | Additional CSS classes | 'custom-input' |
| wire:model | string | null | Livewire model binding | 'user.email' |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

## Slot Properties

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to input | `<x-slot name="prepend">@</x-slot>` |
| append | Content to append to input | `<x-slot name="append">.com</x-slot>` |
| before | Content before input (inside input group) | `<x-slot name="before"><button>Button</button></x-slot>` |
| after | Content after input (inside input group) | `<x-slot name="after"><button>Button</button></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |

## Usage Examples

### Basic Input
```blade
<x-form-input name="username" label="Username" placeholder="Enter username" required />
```

### Email Input with Icon
```blade
<x-form-input type="email" name="email" label="Email Address" icon="mail" placeholder="user@example.com" />
```

### Password Input
```blade
<x-form-input type="password" name="password" label="Password" placeholder="Enter password" required />
```

### Input with Prepend/Append
```blade
<x-form-input name="website" label="Website" placeholder="example">
    <x-slot name="prepend">https://</x-slot>
    <x-slot name="append">.com</x-slot>
</x-form-input>
```

### Floating Label
```blade
<x-form-input name="title" label="Title" floating placeholder="Enter title" />
```

### Input with Help Text
```blade
<x-form-input name="phone" label="Phone" type="tel" help="Include country code">
    <x-slot name="prepend">+1</x-slot>
</x-form-input>
```

### Livewire Integration
```blade
<x-form-input name="search" label="Search" wire:model.live="searchTerm" icon="search" />
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
<x-form-input type="color" name="brand_color" label="Brand Color" value="#3498db" />
```

### Number Input
```blade
<x-form-input type="number" name="age" label="Age" min="1" max="120" />
```

## Real Project Examples

### From Create SMS Sender Form
```blade
<x-form-input name="name" label="Sender Id/Name" readonly />
<x-form-input name="entity_name" label="Entity Name / Company Name" placeholder="Your company name" required />
```

### From Search Filter
```blade
<x-form-input icon="search" name="filter[s.sender]" placeholder="Search by Sender" />
```

### From Import Form
```blade
<x-form-input type="email" name="receiver" label="Receiver Mail" required />
<x-form-input type="hidden" name="task" value="bulk" />
```

## Related Components

- [Form Label](form-label.md) - Used internally for labels
- [Form Errors](form-errors.md) - Used internally for error display
- [Form Group](form-group.md) - Container component
- [Icon](icon.md) - Used for input icons
- [Help](help.md) - Used for help text display

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-input name="email" label="Email" type="email" required />
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-control` - Base input styling
- `form-control-sm` - Small size styling
- `form-control-lg` - Large size styling
- `form-control-color` - Color input styling
- `is-invalid` - Error state styling
- `input-group` - Input group wrapper
- `input-icon` - Icon input styling
- `form-floating` - Floating label styling 
