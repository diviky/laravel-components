# Form Color Component

A specialized color input component that provides professional color selection capabilities with comprehensive form integration and enhanced user experience. This component extends FormInput to offer intuitive color picker functionality with proper formatting and color-specific features.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-color.blade.php`
- **Tests:** `tests/Components/FormColorTest.php`
- **Documentation:** `docs/form-color.md`

## Basic Usage

### Simple Color Input
```blade
<x-form-color name="theme_color" label="Choose Theme Color" />
```

### With Default Value
```blade
<x-form-color 
    name="primary_color" 
    label="Primary Color"
    :default="'#007bff'">
</x-form-color>
```

### With Help Text
```blade
<x-form-color 
    name="accent_color" 
    label="Accent Color"
    help="Select a color that complements your design">
</x-form-color>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'theme_color'` or `'primary_color'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Choose Color'` |
| value | mixed | null | Current color value | `'#ff0000'` |
| default | mixed | null | Default color value | `'#007bff'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'color']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'color-input'` |
| class | string | 'form-control-color' | CSS classes | `'custom-color-picker'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Choose a color...'` |
| autocomplete | string | 'off' | Autocomplete behavior | `'on'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-colors'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the color input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Choose a color that matches your brand guidelines.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the color input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-color name="color">
    <small class="text-muted">Colors are in hexadecimal format</small>
</x-form-color>
```

## Usage Examples

### Basic Color Input
```blade
<x-form-color 
    name="theme_color" 
    label="Theme Color">
    
    <x-slot:help>
        Choose the primary color for your theme
    </x-slot:help>
</x-form-color>
```

### Required Color Input
```blade
<x-form-color 
    name="required_color" 
    label="Required Color"
    required>
    
    <x-slot:help>
        This color selection is required to complete your design
    </x-slot:help>
</x-form-color>
```

### With Default Color Value
```blade
<x-form-color 
    name="brand_color" 
    label="Brand Color"
    :default="'#28a745'">
    
    <x-slot:help>
        Default brand color is green (#28a745)
    </x-slot:help>
</x-form-color>
```

### With Custom Classes
```blade
<x-form-color 
    name="custom_color" 
    label="Custom Color"
    class="custom-color-picker-lg">
    
    <x-slot:help>
        <div class="custom-color-help">
            <strong>Custom Styling:</strong><br>
            This color picker has custom CSS classes applied
        </div>
    </x-slot:help>
</x-form-color>
```

### With Custom ID
```blade
<x-form-color 
    name="custom_id_color" 
    label="Custom ID Color"
    id="brand-color-picker">
    
    <x-slot:help>
        This color picker has a custom ID attribute
    </x-slot:help>
</x-form-color>
```

### With Placeholder
```blade
<x-form-color 
    name="placeholder_color" 
    label="Color with Placeholder"
    placeholder="Select your preferred color">
    
    <x-slot:help>
        Use the placeholder text as a guide for color selection
    </x-slot:help>
</x-form-color>
```

### With Autocomplete
```blade
<x-form-color 
    name="autocomplete_color" 
    label="Autocomplete Color"
    autocomplete="on">
    
    <x-slot:help>
        Autocomplete is enabled for this color picker
    </x-slot:help>
</x-form-color>
```

### With Extra Attributes
```blade
<x-form-color 
    name="extra_attrs_color" 
    label="Extra Attributes Color"
    data-test="color-picker"
    data-color-format="hex">
    
    <x-slot:help>
        This color picker has additional data attributes
    </x-slot:help>
</x-form-color>
```

### Disabled Color Field
```blade
<x-form-color 
    name="disabled_color" 
    label="Disabled Color"
    disabled>
    
    <x-slot:help>
        This color field is currently disabled
    </x-slot:help>
</x-form-color>
```

### Readonly Color Field
```blade
<x-form-color 
    name="readonly_color" 
    label="Readonly Color"
    readonly>
    
    <x-slot:help>
        This color field is currently readonly
    </x-slot:help>
</x-form-color>
```

### Livewire Integration
```blade
<x-form-color 
    wire:model.live="selectedColor"
    name="livewire_color" 
    label="Livewire Color">
    
    <x-slot:help>
        <div class="livewire-status">
            <strong>Selected Color:</strong> 
            <span x-text="$wire.selectedColor ?: 'None selected'">None selected</span>
            <div class="color-preview mt-2" x-show="$wire.selectedColor">
                <div class="color-swatch" :style="`background-color: ${$wire.selectedColor}`"></div>
                <small x-text="$wire.selectedColor"></small>
            </div>
        </div>
    </x-slot:help>
</x-form-color>
```

### With Model Binding
```blade
<x-form-color 
    name="user_color" 
    label="User Color"
    :bind="$user">
    
    <x-slot:help>
        This color will be bound to the user model
    </x-slot:help>
</x-form-color>
```

## Component Variants

### Standard Color Input
**Usage:** `<x-form-color>` (default)
**Description:** Basic color input with standard functionality
**Features:**
- HTML5 color input type
- Bootstrap form-control-color styling
- Standard color validation
- FormInput extension

### Enhanced Color Input
**Usage:** `<x-form-color class="enhanced-color-picker">`
**Description:** Color input with custom styling
**Features:**
- Custom CSS classes
- Enhanced visual appearance
- Professional styling
- Flexible customization

### Livewire Color Input
**Usage:** `<x-form-color wire:model.live="color">`
**Description:** Color input with real-time updates
**Features:**
- Livewire real-time color selection
- Dynamic color preview
- Enhanced user experience
- Performance optimization

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
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'color'`
- **Class:** `'form-control-color'`
- **Validation:** Standard color validation
- **Form Integration:** Full form integration support

### Color Format Support
The component supports various color formats:
- **Hexadecimal:** `#ff0000`, `#f00`
- **RGB:** `rgb(255, 0, 0)`
- **RGBA:** `rgba(255, 0, 0, 0.5)`
- **HSL:** `hsl(0, 100%, 50%)`
- **Named Colors:** `red`, `blue`, `green`

## Common Patterns

### Brand Color Selection
```blade
<div class="brand-color-selection">
    <h4>Brand Color Selection</h4>
    <p>Choose colors for your brand identity:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-color 
                name="primary_brand_color" 
                label="Primary Brand Color"
                :default="'#007bff'"
                required>
                
                <x-slot:help>
                    <div class="primary-color-help">
                        <strong>Primary Color Guidelines:</strong><br>
                        • Should represent your main brand identity<br>
                        • Use for primary buttons and links<br>
                        • Ensure good contrast with text<br>
                        • Consider accessibility standards
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-color 
                name="secondary_brand_color" 
                label="Secondary Brand Color"
                :default="'#6c757d'">
                
                <x-slot:help>
                    <div class="secondary-color-help">
                        <strong>Secondary Color Guidelines:</strong><br>
                        • Should complement your primary color<br>
                        • Use for secondary elements<br>
                        • Maintain visual hierarchy<br>
                        • Ensure good contrast
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
    </div>
    
    <div class="brand-color-tips mt-3">
        <h6>Brand Color Tips</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Color Psychology:</strong><br>
                • Blue: Trust, professionalism<br>
                • Green: Growth, nature<br>
                • Red: Energy, passion<br>
                • Yellow: Optimism, creativity
            </div>
            <div class="col-md-4">
                <strong>Accessibility:</strong><br>
                • Ensure sufficient contrast<br>
                • Test with color blindness<br>
                • Consider dark mode support<br>
                • Use color as enhancement
            </div>
            <div class="col-md-4">
                <strong>Consistency:</strong><br>
                • Use colors consistently<br>
                • Document color values<br>
                • Create color palette<br>
                • Maintain brand guidelines
            </div>
        </div>
    </div>
</div>
```

### Theme Color Management
```blade
<div class="theme-color-management">
    <h4>Theme Color Management</h4>
    <p>Configure colors for your application theme:</p>
    
    <x-form-color 
        name="theme_primary" 
        label="Theme Primary Color"
        :default="'#007bff'"
        required>
        
        <x-slot:help>
            <div class="theme-primary-help">
                <strong>Primary Theme Color:</strong><br>
                • Main color for your application<br>
                • Used for primary actions<br>
                • Should be accessible and professional<br>
                • Consider your target audience
            </div>
        </x-slot:help>
    </x-form-color>
    
    <div class="theme-color-palette mt-3">
        <h6>Theme Color Palette</h6>
        <div class="row">
            <div class="col-md-3">
                <x-form-color 
                    name="theme_success" 
                    label="Success Color"
                    :default="'#28a745'">
                    
                    <x-slot:help>
                        Color for success messages and actions
                    </x-slot:help>
                </x-form-color>
            </div>
            
            <div class="col-md-3">
                <x-form-color 
                    name="theme_warning" 
                    label="Warning Color"
                    :default="'#ffc107'">
                    
                    <x-slot:help>
                        Color for warning messages and actions
                    </x-slot:help>
                </x-form-color>
            </div>
            
            <div class="col-md-3">
                <x-form-color 
                    name="theme_danger" 
                    label="Danger Color"
                    :default="'#dc3545'">
                    
                    <x-slot:help>
                        Color for error messages and actions
                    </x-slot:help>
                </x-form-color>
            </div>
            
            <div class="col-md-3">
                <x-form-color 
                    name="theme_info" 
                    label="Info Color"
                    :default="'#17a2b8'">
                    
                    <x-slot:help>
                        Color for informational messages
                    </x-slot:help>
                </x-form-color>
            </div>
        </div>
    </div>
</div>
```

### UI Component Color Selection
```blade
<div class="ui-component-color-selection">
    <h4>UI Component Colors</h4>
    <p>Select colors for specific UI components:</p>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <x-form-color 
                name="button_color" 
                label="Button Color"
                :default="'#007bff'">
                
                <x-slot:help>
                    <div class="button-color-help">
                        <strong>Button Color Guidelines:</strong><br>
                        • Should have good contrast with text<br>
                        • Consider hover and active states<br>
                        • Ensure accessibility compliance<br>
                        • Match your brand identity
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
        
        <div class="col-md-4 mb-3">
            <x-form-color 
                name="link_color" 
                label="Link Color"
                :default="'#007bff'">
                
                <x-slot:help>
                    <div class="link-color-help">
                        <strong>Link Color Guidelines:</strong><br>
                        • Should be distinct from regular text<br>
                        • Consider visited and hover states<br>
                        • Ensure sufficient contrast<br>
                        • Follow web accessibility guidelines
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
        
        <div class="col-md-4 mb-3">
            <x-form-color 
                name="background_color" 
                label="Background Color"
                :default="'#ffffff'">
                
                <x-slot:help>
                    <div class="background-color-help">
                        <strong>Background Color Guidelines:</strong><br>
                        • Should not interfere with readability<br>
                        • Consider content contrast<br>
                        • Support for dark mode<br>
                        • Maintain visual hierarchy
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
    </div>
</div>
```

### Accessibility Color Testing
```blade
<div class="accessibility-color-testing">
    <h4>Accessibility Color Testing</h4>
    <p>Test your color combinations for accessibility:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-color 
                name="text_color" 
                label="Text Color"
                :default="'#000000'">
                
                <x-slot:help>
                    <div class="text-color-help">
                        <strong>Text Color Guidelines:</strong><br>
                        • Should have sufficient contrast with background<br>
                        • Test with various background colors<br>
                        • Consider color blindness<br>
                        • Ensure readability in all conditions
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-color 
                name="background_test_color" 
                label="Background Test Color"
                :default="'#ffffff'">
                
                <x-slot:help>
                    <div class="background-test-help">
                        <strong>Background Test Guidelines:</strong><br>
                        • Test contrast with selected text color<br>
                        • Ensure WCAG compliance<br>
                        • Consider different lighting conditions<br>
                        • Test with color vision deficiencies
                    </div>
                </x-slot:help>
            </x-form-color>
        </div>
    </div>
    
    <div class="contrast-testing mt-3">
        <h6>Contrast Testing</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>WCAG Guidelines:</strong><br>
                • AA: 4.5:1 for normal text<br>
                • AAA: 7:1 for normal text<br>
                • Large text: 3:1 ratio<br>
                • UI components: 3:1 ratio
            </div>
            <div class="col-md-6">
                <strong>Testing Tools:</strong><br>
                • WebAIM Contrast Checker<br>
                • Chrome DevTools<br>
                • Color Contrast Analyzer<br>
                • Browser extensions
            </div>
        </div>
    </div>
</div>
```

### Creative Design Color Selection
```blade
<div class="creative-design-color-selection">
    <h4>Creative Design Colors</h4>
    <p>Choose colors for creative design projects:</p>
    
    <x-form-color 
        name="creative_primary" 
        label="Creative Primary Color"
        :default="'#ff6b6b'">
        
        <x-slot:help>
            <div class="creative-primary-help">
                <strong>Creative Primary Color:</strong><br>
                • Should reflect your creative vision<br>
                • Consider emotional impact<br>
                • Think about target audience<br>
                • Balance creativity with usability
            </div>
        </x-slot:help>
    </x-form-color>
    
    <div class="creative-color-palette mt-3">
        <h6>Creative Color Palette</h6>
        <div class="row">
            <div class="col-md-3">
                <x-form-color 
                    name="creative_accent_1" 
                    label="Accent Color 1"
                    :default="'#4ecdc4'">
                    
                    <x-slot:help>
                        First accent color for creative elements
                    </x-slot:help>
                </x-form-color>
            </div>
            
            <div class="col-md-3">
                <x-form-color 
                    name="creative_accent_2" 
                    label="Accent Color 2"
                    :default="'#45b7d1'">
                    
                    <x-slot:help>
                        Second accent color for creative elements
                    </x-slot:help>
                </x-form-color>
            </div>
            
            <div class="col-md-3">
                <x-form-color 
                    name="creative_accent_3" 
                    label="Accent Color 3"
                    :default="'#96ceb4'">
                    
                    <x-slot:help>
                        Third accent color for creative elements
                    </x-slot:help>
                </x-form-color>
            </div>
            
            <div class="col-md-3">
                <x-form-color 
                    name="creative_accent_4" 
                    label="Accent Color 4"
                    :default="'#feca57'">
                    
                    <x-slot:help>
                        Fourth accent color for creative elements
                    </x-slot:help>
                </x-form-color>
            </div>
        </div>
    </div>
    
    <div class="creative-color-tips mt-3">
        <h6>Creative Color Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Color Harmony:</strong><br>
                • Use complementary colors<br>
                • Consider analogous schemes<br>
                • Think about triadic harmony<br>
                • Balance warm and cool tones
            </div>
            <div class="col-md-6">
                <strong>Creative Expression:</strong><br>
                • Colors can convey emotions<br>
                • Consider cultural meanings<br>
                • Think about symbolism<br>
                • Express your unique style
            </div>
        </div>
    </div>
</div>
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
public function it_renders_form_color_with_label()
{
    $view = $this->blade('<x-form-color name="color" label="Choose Color" />');
    
    $view->assertSee('name="color"');
    $view->assertSee('Choose Color');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ColorComponent::class)
        ->assertSee('<x-form-color')
        ->set('color', '#ff0000')
        ->assertSee('#ff0000');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to color input
- `aria-describedby`: Links to help text
- `role="button"`: Applied to color picker

### Keyboard Navigation
- Tab navigation to color input
- Enter key for color picker
- Color selection navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Color selection feedback
- Help text communication
- Error message communication

### Color Accessibility
- Clear color purpose indication
- Proper validation feedback
- Helpful error messages
- Color guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 color input type

## Troubleshooting

### Common Issues

#### Color Not Displaying
**Problem:** Color picker not showing correctly
**Solution:** Check browser support and CSS styling

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Color Validation Issues
**Problem:** Color validation not working
**Solution:** Verify color validation rules and error handling

#### Styling Issues
**Problem:** Color input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Color Format Issues
**Problem:** Color format not working
**Solution:** Check color format support and validation

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component
- **Form Colors:** Multiple color input component

## Changelog

### Version 1.0.0
- Initial release with color input functionality
- FormInput extension with color support
- Help and default slot support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-color.blade.php`
2. Add/update tests in `tests/Components/FormColorTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Form Colors Component](../form-colors.md)
- [HTML5 Color Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/color)
- [CSS Color Values](https://developer.mozilla.org/en-US/docs/Web/CSS/color_value)
- [Web Color Accessibility](https://www.w3.org/WAI/WCAG21/Understanding/contrast-minimum.html)
