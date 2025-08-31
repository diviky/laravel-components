# Form Button Component

A versatile button component with outline, ghost, and disabled state support for forms and general UI interactions.

## Overview

**Component Type:** Form/UI  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** None

## Files

- **PHP Class:** `src/Components/FormButton.php`
- **View File:** `resources/views/bootstrap-5/form-button.blade.php`
- **Documentation:** `docs/form-button.md`
- **Tests:** `tests/Components/FormButtonTest.php`

## Basic Usage

```blade
<x-form-button>
    Click Me
</x-form-button>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| outline | boolean | false | Use outline button style | `true` |
| ghost | boolean | false | Use ghost button style (transparent) | `true` |
| disabled | boolean | false | Disable the button | `true` |
| icon | string | null | Icon name to display before text | `'save'` |
| label | string | null | Button label (alternative to slot) | `'Save Changes'` |

### Size Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| sm, small | boolean | false | Small button size | `true` |
| lg, large | boolean | false | Large button size | `true` |
| size | string | null | Custom size variant | `'xs'` |

### Color Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| primary | boolean | false | Primary button color | `true` |
| secondary, light | boolean | false | Secondary/light button color | `true` |
| success | boolean | false | Success button color | `true` |
| warning | boolean | false | Warning button color | `true` |
| info | boolean | false | Info button color | `true` |
| danger | boolean | false | Danger button color | `true` |
| dark | boolean | false | Dark button color | `true` |
| cancel | boolean | false | Cancel button styling | `true` |
| color | string | null | Custom color variant | `'purple'` |

### Style Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| link | boolean | false | Link-style button (no background) | `true` |
| square | boolean | false | Square button shape | `true` |
| pill | boolean | false | Pill-shaped button (rounded) | `true` |
| full | boolean | false | Full-width block button | `true` |
| bold | boolean | false | Bold text styling | `true` |
| loading | boolean | false | Loading state styling | `true` |
| variant | string | null | Custom style variant | `'custom'` |

### Dropdown Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| dropdown | boolean | false | Enable dropdown toggle functionality | `true` |

### Inherited Attributes

This component inherits from `Component` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'button' | Button type (button, submit, reset) | `'submit'` |
| id | string | auto-generated | Element ID | `'save-button'` |
| class | string | null | Additional CSS classes | `'custom-class'` |
| name | string | null | Button name attribute | `'action'` |
| value | string | null | Button value attribute | `'save'` |
| title | string | null | Button title attribute | `'Click to save'` |

## Slots

### Default Slot
- **Purpose:** Button content and text
- **Content Type:** HTML/Text/Icons
- **Required:** Yes

## Usage Examples

### Basic Button with Colors
```blade
<!-- Using color attributes -->
<x-form-button primary>Save Changes</x-form-button>
<x-form-button success>Submit</x-form-button>
<x-form-button danger>Delete</x-form-button>
<x-form-button secondary>Cancel</x-form-button>

<!-- Using custom color -->
<x-form-button color="purple">Custom Color</x-form-button>
```

### Button Sizes
```blade
<!-- Size attributes -->
<x-form-button sm primary>Small Button</x-form-button>
<x-form-button primary>Normal Button</x-form-button>
<x-form-button lg primary>Large Button</x-form-button>

<!-- Custom size -->
<x-form-button size="xs" primary>Extra Small</x-form-button>
```

### Outline and Ghost Styles
```blade
<!-- Outline buttons -->
<x-form-button outline primary>Primary Outline</x-form-button>
<x-form-button outline success>Success Outline</x-form-button>

<!-- Ghost buttons -->
<x-form-button ghost primary>Ghost Primary</x-form-button>
<x-form-button ghost danger>Ghost Danger</x-form-button>
```

### Style Variants
```blade
<!-- Link style -->
<x-form-button link>Link Button</x-form-button>

<!-- Square shape -->
<x-form-button square primary>■</x-form-button>

<!-- Pill shape -->
<x-form-button pill success>Pill Button</x-form-button>

<!-- Full width -->
<x-form-button full primary>Full Width Button</x-form-button>

<!-- Bold text -->
<x-form-button bold warning>Bold Button</x-form-button>
```

### Buttons with Icons
```blade
<!-- Icon before text -->
<x-form-button primary icon="save">Save Document</x-form-button>

<!-- Icon only button -->
<x-form-button sm primary icon="edit" title="Edit item" />

<!-- Custom icon styling -->
<x-form-button success icon="check">
    Complete Task
</x-form-button>
```

### State Buttons
```blade
<!-- Disabled button -->
<x-form-button disabled primary>Processing...</x-form-button>

<!-- Loading state -->
<x-form-button loading primary>Loading...</x-form-button>

<!-- Submit button -->
<x-form-button type="submit" success>Submit Form</x-form-button>
```

### Dropdown Toggle
```blade
<x-form-button dropdown primary>
    Dropdown Menu
</x-form-button>
<!-- Automatically adds data-bs-toggle="dropdown" -->
```

### Using Label Attribute
```blade
<!-- Label instead of slot content -->
<x-form-button primary label="Save Changes" />

<!-- Equivalent to -->
<x-form-button primary>Save Changes</x-form-button>
```

### Combination Styles
```blade
<!-- Outline + Disabled -->
<x-form-button outline disabled class="btn-warning">
    Unavailable
</x-form-button>

<!-- Ghost + Custom Classes -->
<x-form-button ghost class="btn-link text-danger">
    Delete
</x-form-button>
```

### Livewire Integration
```blade
<x-form-button 
    wire:click="save"
    wire:loading.attr="disabled"
    wire:loading.class="opacity-50"
    class="btn-primary">
    
    <span wire:loading.remove>Save</span>
    <span wire:loading>Saving...</span>
</x-form-button>
```

### Button Groups
```blade
<div class="btn-group" role="group">
    <x-form-button class="btn-outline-primary">
        Option 1
    </x-form-button>
    <x-form-button class="btn-outline-primary">
        Option 2
    </x-form-button>
    <x-form-button class="btn-outline-primary">
        Option 3
    </x-form-button>
</div>
```

### Advanced Icon Usage
```blade
<!-- Built-in icon support -->
<x-form-button primary icon="save">Save Document</x-form-button>

<!-- Icon-only buttons with tooltip -->
<x-form-button sm secondary icon="edit" title="Edit item" />
<x-form-button sm danger icon="trash" title="Delete item" />

<!-- Custom icon styling (manual approach) -->
<x-form-button primary>
    <x-icon name="download" class="me-2" />
    Download File
</x-form-button>
```

### Complete Button Examples
```blade
<!-- E-commerce add to cart -->
<x-form-button success icon="shopping-cart" pill>
    Add to Cart
</x-form-button>

<!-- Admin action button -->
<x-form-button sm outline danger icon="ban" title="Block user">
    Block
</x-form-button>

<!-- Primary CTA button -->
<x-form-button lg primary icon="rocket" bold>
    Launch Campaign
</x-form-button>

<!-- Loading state button -->
<x-form-button primary loading disabled>
    Processing...
</x-form-button>
```

## Style Variants

### Color System
The component supports direct color attributes for cleaner syntax:

```blade
<!-- Direct color attributes (recommended) -->
<x-form-button primary>Primary Button</x-form-button>
<!-- Renders: btn btn-primary -->

<x-form-button outline success>Success Outline</x-form-button>
<!-- Renders: btn btn-outline-success -->

<x-form-button ghost danger>Ghost Danger</x-form-button>
<!-- Renders: btn btn-ghost-danger -->
```

### Size System
```blade
<!-- Size attributes -->
<x-form-button sm primary>Small</x-form-button>
<!-- Renders: btn btn-sm btn-primary -->

<x-form-button lg danger>Large</x-form-button>  
<!-- Renders: btn btn-lg btn-danger -->
```

### Style Combinations
```blade
<!-- Combining multiple style attributes -->
<x-form-button outline lg primary pill>
    Large Outline Pill Primary
</x-form-button>
<!-- Renders: btn btn-lg btn-outline-primary btn-pill -->

<!-- Full-width success button with icon -->
<x-form-button full success icon="check" bold>
    Complete All Tasks
</x-form-button>
```

### Priority Logic
1. **Color priority**: Specific color attributes override class-based colors
2. **Style priority**: `ghost` > `outline` > normal style
3. **Size priority**: Specific size attributes override class-based sizes

```blade
<!-- Ghost takes precedence over outline -->
<x-form-button outline ghost primary>Ghost Primary</x-form-button>
<!-- Renders: btn btn-ghost-primary -->
```

## Form Integration

### Form Submission
```blade
<x-form wire:submit.prevent="save">
    <div class="mb-3">
        <x-form-input name="title" label="Title" />
    </div>
    
    <div class="d-flex gap-2">
        <x-form-button type="submit" class="btn-primary">
            Save
        </x-form-button>
        
        <x-form-button type="button" class="btn-secondary" onclick="history.back()">
            Cancel
        </x-form-button>
    </div>
</x-form>
```

### Action Buttons
```blade
<form method="POST" action="/items/{{ $item->id }}">
    @csrf
    @method('DELETE')
    
    <x-form-button 
        type="submit" 
        class="btn-danger"
        onclick="return confirm('Are you sure?')">
        Delete Item
    </x-form-button>
</form>
```

## Common Patterns

### Loading States
```blade
<x-form-button 
    wire:click="process"
    wire:loading.attr="disabled"
    class="btn-primary">
    
    <span wire:loading.remove>
        <x-icon name="play" class="me-2" />
        Start Process
    </span>
    
    <span wire:loading>
        <div class="spinner-border spinner-border-sm me-2" role="status"></div>
        Processing...
    </span>
</x-form-button>
```

### Confirmation Buttons
```blade
<x-form-button 
    class="btn-danger"
    onclick="if(!confirm('Delete this item?')) event.preventDefault()">
    Delete
</x-form-button>
```

### Responsive Button Sizes
```blade
<x-form-button class="btn-primary btn-lg d-none d-md-inline">
    Large Button (Desktop)
</x-form-button>

<x-form-button class="btn-primary btn-sm d-md-none">
    Small Button (Mobile)
</x-form-button>
```

### Modal Triggers
```blade
<x-form-button 
    data-bs-toggle="modal" 
    data-bs-target="#confirmModal"
    class="btn-warning">
    Open Modal
</x-form-button>
```

## Accessibility

### ARIA Attributes
- Proper button semantics with `<button>` element
- Support for `aria-label` and `aria-describedby`
- Disabled state properly communicated to screen readers

### Best Practices
```blade
<!-- Accessible button with description -->
<x-form-button 
    aria-label="Save document changes"
    aria-describedby="save-help"
    class="btn-primary">
    Save
</x-form-button>
<small id="save-help" class="form-text">
    Saves all changes to the current document
</small>
```

## JavaScript Integration

### Event Handling
```blade
<x-form-button 
    id="dynamic-button"
    class="btn-primary">
    Click Me
</x-form-button>

<script>
document.getElementById('dynamic-button').addEventListener('click', function() {
    this.textContent = 'Clicked!';
    this.disabled = true;
});
</script>
```

## Testing

```php
// Test basic button rendering
$component = new FormButton();
$view = $this->component($component);
$view->assertSee('<button');
$view->assertSee('btn');

// Test outline style
$component = new FormButton(outline: true);
$view = $this->component($component, ['class' => 'btn-primary']);
$view->assertSee('btn-outline-primary');

// Test disabled state
$component = new FormButton(disabled: true);
$view = $this->component($component);
$view->assertSee('disabled');
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-button' => [
        'view' => 'laravel-components::{framework}.form-button',
        'class' => Components\FormButton::class,
    ],
],
```

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** None (purely HTML/CSS)
- **CSS Framework Requirements:** Bootstrap 4+ for styling classes

## Troubleshooting

### Common Issues

#### Outline Style Not Showing
**Problem:** `outline="true"` doesn't apply outline style
**Solution:** Ensure you're passing boolean `true`, not string: `:outline="true"` or `outline`

#### Ghost Style Not Working
**Problem:** Ghost style not appearing
**Solution:** Verify Bootstrap theme supports ghost button variants or add custom CSS

#### Button Not Submitting Form
**Problem:** Submit button not working
**Solution:** Ensure `type="submit"` and button is inside `<form>` element

## Related Components

- **Form Button Group:** For grouped button selections
- **Form Button Item:** For button group items
- **Button Variants:** `<x-button.primary>`, `<x-button.secondary>`, etc.

## Changelog

### Version 2.0.0
- Added ghost button style support
- Improved outline style handling
- Enhanced disabled state accessibility

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormButton.php`
2. Update the view file: `resources/views/bootstrap-5/form-button.blade.php`
3. Add/update tests in `tests/Components/FormButtonTest.php`
4. Update this documentation
