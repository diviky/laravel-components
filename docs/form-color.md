# Form Color Component

A color input component that provides both a native HTML5 color picker and a predefined color selection interface with badge-style options.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Extends FormInput and FormChoices components

## Files

- **View File:** `resources/views/bootstrap-5/form-color.blade.php`
- **View File:** `resources/views/bootstrap-5/form-colors.blade.php`
- **Documentation:** `docs/form-color.md`

## Basic Usage

### Single Color Picker
```blade
<x-form-color name="theme_color" />
```

### Predefined Color Selection
```blade
<x-form-colors name="brand_color" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'theme_color'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'color-input'` |
| class | string | null | Additional CSS classes | `'custom-color'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |

### Inherited Attributes

This component inherits from `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | string | null | Current color value | `'#ff0000'` |
| placeholder | string | null | Placeholder text | `'Choose a color'` |
| required | boolean | false | Make field required | `true` |
| autocomplete | string | null | Autocomplete behavior | `'off'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'edit-theme'` |
| role | string\|array | null | Required user role(s) | `'admin'` or `['admin', 'designer']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Default Slot
- **Purpose:** Additional content after the color input
- **Content Type:** HTML/Text/Components

### Named Slots

#### `help`
- **Purpose:** Help text displayed below the input
- **Required:** No
- **Example:**
```blade
<x-slot:help>
    Choose a color that matches your brand guidelines
</x-slot:help>
```

## Usage Examples

### Basic Color Picker
```blade
<x-form-color 
    name="primary_color" 
    value="#007bff"
    placeholder="Select primary color">
</x-form-color>
```

### Color Picker with Validation
```blade
<x-form-color 
    name="accent_color"
    required
    class="form-control-lg"
    :error="$errors->first('accent_color')">
    
    <x-slot:help>
        This color will be used for buttons and links
    </x-slot:help>
</x-form-color>
```

### Predefined Color Selection
```blade
<x-form-colors 
    name="brand_color"
    class="mb-3">
    
    <x-slot:help>
        Select from our predefined brand color palette
    </x-slot:help>
</x-form-colors>
```

### Livewire Integration
```blade
<x-form-color 
    wire:model="theme.primary_color"
    wire:change="updateTheme"
    name="primary_color">
</x-form-color>
```

### Framework-Specific Styling

#### Bootstrap Classes
```blade
<x-form-color 
    class="form-control-color form-control-lg"
    name="color">
</x-form-color>
```

#### Custom Styling
```blade
<x-form-color 
    class="custom-color-picker border-2"
    style="width: 100px; height: 40px;"
    name="color">
</x-form-color>
```

## Component Variants

### form-color
**Usage:** `<x-form-color>`
**Description:** Native HTML5 color picker input
**Features:**
- Native browser color picker
- Bootstrap form-control-color styling
- Extends FormInput with type="color"

### form-colors
**Usage:** `<x-form-colors>`
**Description:** Predefined color selection with badge-style options
**Features:**
- 25+ predefined colors including brand colors
- Badge-style visual representation
- Extends FormChoices component
- Social media brand colors included

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-color>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-color' => [
        'view' => 'laravel-components::{framework}.form-color',
    ],
    'form-colors' => [
        'view' => 'laravel-components::{framework}.form-colors',
    ],
],
```

## Common Patterns

### Theme Color Selection
```blade
<div class="row">
    <div class="col-md-6">
        <x-form-color 
            name="primary_color"
            label="Primary Color"
            :error="$errors->first('primary_color')">
        </x-form-color>
    </div>
    <div class="col-md-6">
        <x-form-colors 
            name="accent_color"
            label="Accent Color">
        </x-form-colors>
    </div>
</div>
```

### Brand Color Management
```blade
<x-form-colors 
    name="brand_colors[]"
    multiple
    label="Select Brand Colors">
    
    <x-slot:help>
        Choose up to 3 colors for your brand palette
    </x-slot:help>
</x-form-colors>
```

### Color Validation
```blade
<x-form-color 
    name="theme_color"
    required
    pattern="^#[0-9A-Fa-f]{6}$"
    :error="$errors->first('theme_color')">
    
    <x-slot:help>
        Must be a valid 6-digit hex color code
    </x-slot:help>
</x-form-color>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_color_with_basic_attributes()
{
    $view = $this->blade('<x-form-color name="test_color" />');
    
    $view->assertSee('name="test_color"');
    $view->assertSee('type="color"');
    $view->assertSee('form-control-color');
}

/** @test */
public function it_renders_form_colors_with_predefined_options()
{
    $view = $this->blade('<x-form-colors name="brand_color" />');
    
    $view->assertSee('blue');
    $view->assertSee('primary');
    $view->assertSee('twitter');
    $view->assertSee('github');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ColorPickerComponent::class)
        ->assertSee('<x-form-color')
        ->set('primaryColor', '#ff0000')
        ->assertSee('value="#ff0000"');
}
```

## Accessibility

### ARIA Attributes
- `aria-describedby`: Links to help text when provided
- `aria-invalid`: Applied when validation errors exist
- `aria-required`: Applied when field is required

### Keyboard Navigation
- Tab navigation to color input
- Enter key opens color picker
- Arrow keys navigate color options in predefined selection

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 color input support
- **JavaScript Dependencies:** None (native HTML5)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling

## Troubleshooting

### Common Issues

#### Color Picker Not Opening
**Problem:** Clicking the color input doesn't open the color picker
**Solution:** Ensure the input is not disabled or readonly, and check browser compatibility

#### Predefined Colors Not Displaying
**Problem:** Form-colors component shows empty options
**Solution:** Verify that FormChoices component is properly configured and accessible

#### Color Value Not Saving
**Problem:** Selected color value is not being submitted with the form
**Solution:** Check that the name attribute is set and the form is properly configured

## Related Components

- **FormInput:** Base input component that form-color extends
- **FormChoices:** Component that form-colors extends for predefined options
- **FormHidden:** For storing additional color-related data
- **ViewColor:** For displaying color values in read-only format

## Changelog

### Version 1.0.0
- Initial release with HTML5 color input support
- Predefined color selection with badge styling
- Bootstrap 5 integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-color.blade.php`
2. Update the view file: `resources/views/bootstrap-5/form-colors.blade.php`
3. Add/update tests in `tests/Components/FormColorTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Choices Component](../form-choices.md)
- [View Color Component](../view-color.md)
- [Bootstrap Color Input Documentation](https://getbootstrap.com/docs/5.3/forms/form-controls/#color)
