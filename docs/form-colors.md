# Form Colors Component

A specialized multiple color selection component that provides professional color palette selection capabilities with comprehensive form integration and enhanced user experience. This component extends FormChoices to offer intuitive color selection with predefined color options, social media brand colors, and professional color management.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormChoices component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormChoices)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-colors.blade.php`
- **Tests:** `tests/Components/FormColorsTest.php`
- **Documentation:** `docs/form-colors.md`

## Basic Usage

### Simple Color Selection
```blade
<x-form-colors name="theme_color" label="Choose Theme Color" />
```

### With Default Value
```blade
<x-form-colors 
    name="brand_color" 
    label="Brand Color"
    :default="'blue'">
</x-form-colors>
```

### With Help Text
```blade
<x-form-colors 
    name="accent_color" 
    label="Accent Color"
    help="Select a color that complements your design">
</x-form-colors>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'theme_color'` or `'brand_color'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Choose Color'` |
| value | mixed | null | Current color value | `'blue'` |
| default | mixed | null | Default color value | `'primary'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'colors']` |

### Inherited Attributes

This component extends `FormChoices` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'colors-input'` |
| class | string | '' | CSS classes | `'custom-colors'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Select colors...'` |
| multiple | boolean | false | Allow multiple selections | `true` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-colors'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Predefined Color Options

The component includes a comprehensive set of predefined colors:

### Basic Colors
- **blue** - Standard blue color
- **azure** - Light blue/azure color
- **primary** - Bootstrap primary color
- **indigo** - Indigo color
- **purple** - Purple color
- **orange** - Orange color
- **pink** - Pink color
- **yellow** - Yellow color
- **red** - Red color
- **lime** - Lime green color
- **green** - Green color
- **teal** - Teal color
- **cyan** - Cyan color

### Social Media Brand Colors
- **facebook** - Facebook brand blue
- **twitter** - Twitter brand blue
- **linkedin** - LinkedIn brand blue
- **google** - Google brand colors
- **youtube** - YouTube brand red
- **vimeo** - Vimeo brand blue
- **dribbble** - Dribbble brand pink
- **github** - GitHub brand colors
- **instagram** - Instagram brand gradient

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the color selection
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Choose colors that match your brand guidelines.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the color selection
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-colors name="colors">
    <small class="text-muted">Colors are displayed as badges</small>
</x-form-colors>
```

## Usage Examples

### Basic Color Selection
```blade
<x-form-colors 
    name="theme_color" 
    label="Theme Color">
    
    <x-slot:help>
        Choose the primary color for your theme
    </x-slot:help>
</x-form-colors>
```

### Required Color Selection
```blade
<x-form-colors 
    name="required_color" 
    label="Required Color"
    required>
    
    <x-slot:help>
        This color selection is required to complete your design
    </x-slot:help>
</x-form-colors>
```

### With Default Color Value
```blade
<x-form-colors 
    name="brand_color" 
    label="Brand Color"
    :default="'blue'">
    
    <x-slot:help>
        Default brand color is blue
    </x-slot:help>
</x-form-colors>
```

### Multiple Color Selection
```blade
<x-form-colors 
    name="multiple_colors" 
    label="Multiple Colors"
    multiple>
    
    <x-slot:help>
        <div class="multiple-colors-help">
            <strong>Multiple Selection:</strong><br>
            • Select multiple colors for your palette<br>
            • Use Ctrl/Cmd+Click for multiple selection<br>
            • Colors will be displayed as badges<br>
            • Maximum of 5 colors recommended
        </div>
    </x-slot:help>
</x-form-colors>
```

### With Custom Classes
```blade
<x-form-colors 
    name="custom_colors" 
    label="Custom Colors"
    class="custom-colors-lg">
    
    <x-slot:help>
        <div class="custom-colors-help">
            <strong>Custom Styling:</strong><br>
            This color selector has custom CSS classes applied
        </div>
    </x-slot:help>
</x-form-colors>
```

### With Custom ID
```blade
<x-form-colors 
    name="custom_id_colors" 
    label="Custom ID Colors"
    id="brand-colors-selector">
    
    <x-slot:help>
        This color selector has a custom ID attribute
    </x-slot:help>
</x-form-colors>
```

### With Placeholder
```blade
<x-form-colors 
    name="placeholder_colors" 
    label="Colors with Placeholder"
    placeholder="Select your preferred colors">
    
    <x-slot:help>
        Use the placeholder text as a guide for color selection
    </x-slot:help>
</x-form-colors>
```

### With Extra Attributes
```blade
<x-form-colors 
    name="extra_attrs_colors" 
    label="Extra Attributes Colors"
    data-test="color-selector"
    data-color-format="predefined">
    
    <x-slot:help>
        This color selector has additional data attributes
    </x-slot:help>
</x-form-colors>
```

### Disabled Color Field
```blade
<x-form-colors 
    name="disabled_colors" 
    label="Disabled Colors"
    disabled>
    
    <x-slot:help>
        This color field is currently disabled
    </x-slot:help>
</x-form-colors>
```

### Readonly Color Field
```blade
<x-form-colors 
    name="readonly_colors" 
    label="Readonly Colors"
    readonly>
    
    <x-slot:help>
        This color field is currently readonly
    </x-slot:help>
</x-form-colors>
```

### Livewire Integration
```blade
<x-form-colors 
    wire:model.live="selectedColors"
    name="livewire_colors" 
    label="Livewire Colors"
    multiple>
    
    <x-slot:help>
        <div class="livewire-status">
            <strong>Selected Colors:</strong> 
            <span x-text="$wire.selectedColors ? $wire.selectedColors.length + ' colors selected' : 'No colors selected'">
                {{ $selectedColors ? count($selectedColors) . ' colors selected' : 'No colors selected' }}
            </span>
            <div class="selected-colors-preview mt-2" x-show="$wire.selectedColors && $wire.selectedColors.length > 0">
                <div class="color-badges">
                    <template x-for="color in $wire.selectedColors" :key="color">
                        <span class="badge" :class="`bg-${color}`" x-text="color"></span>
                    </template>
                </div>
            </div>
        </div>
    </x-slot:help>
</x-form-colors>
```

### With Model Binding
```blade
<x-form-colors 
    name="user_colors" 
    label="User Colors"
    :bind="$user">
    
    <x-slot:help>
        This color selection will be bound to the user model
    </x-slot:help>
</x-form-colors>
```

## Component Variants

### Standard Color Selection
**Usage:** `<x-form-colors>` (default)
**Description:** Basic color selection with predefined options
**Features:**
- Predefined color palette
- Badge-style color display
- Single color selection
- FormChoices extension

### Multiple Color Selection
**Usage:** `<x-form-colors multiple>`
**Description:** Multiple color selection with enhanced functionality
**Features:**
- Multiple color selection
- Enhanced user experience
- Professional color management
- Flexible selection options

### Enhanced Color Selection
**Usage:** `<x-form-colors class="enhanced-colors">`
**Description:** Color selection with custom styling
**Features:**
- Custom CSS classes
- Enhanced visual appearance
- Professional styling
- Flexible customization

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-colors>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-colors' => [
        'view' => 'laravel-components::{framework}.form-colors',
    ],
],
```

### Custom Color Options
You can customize the available colors by modifying the view file:

```blade
@props([
    'colors' => [
        'custom-blue' => '<span class="badge bg-custom-blue">Custom Blue</span>',
        'brand-red' => '<span class="badge bg-brand-red">Brand Red</span>',
        'accent-green' => '<span class="badge bg-accent-green">Accent Green</span>',
    ],
])
```

### Default Settings
The component uses these default settings:
- **Color Options:** 22 predefined colors including social media brands
- **Display Format:** Badge-style color representation
- **Selection Mode:** Single selection (configurable to multiple)
- **Form Integration:** Full form integration support

## Common Patterns

### Brand Color Palette Selection
```blade
<div class="brand-color-palette-selection">
    <h4>Brand Color Palette</h4>
    <p>Select colors for your brand identity:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-colors 
                name="primary_brand_color" 
                label="Primary Brand Color"
                :default="'blue'"
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
            </x-form-colors>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-colors 
                name="secondary_brand_color" 
                label="Secondary Brand Color"
                :default="'indigo'">
                
                <x-slot:help>
                    <div class="secondary-color-help">
                        <strong>Secondary Color Guidelines:</strong><br>
                        • Should complement your primary color<br>
                        • Use for secondary elements<br>
                        • Maintain visual hierarchy<br>
                        • Ensure good contrast
                    </div>
                </x-slot:help>
            </x-form-colors>
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

### Social Media Brand Color Selection
```blade
<div class="social-media-brand-colors">
    <h4>Social Media Brand Colors</h4>
    <p>Choose colors that match your social media presence:</p>
    
    <x-form-colors 
        name="social_media_colors" 
        label="Social Media Colors"
        multiple
        :default="['facebook', 'twitter']">
        
        <x-slot:help>
            <div class="social-media-help">
                <strong>Social Media Color Guidelines:</strong><br>
                • Facebook: Professional blue for business<br>
                • Twitter: Communication and news<br>
                • LinkedIn: Professional networking<br>
                • Instagram: Creative and visual content<br>
                • YouTube: Video and entertainment<br>
                • GitHub: Technical and development
            </div>
        </x-slot:help>
    </x-form-colors>
    
    <div class="social-media-tips mt-3">
        <h6>Social Media Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Brand Consistency:</strong><br>
                • Use consistent colors across platforms<br>
                • Match your brand identity<br>
                • Consider platform-specific guidelines<br>
                • Maintain visual recognition
            </div>
            <div class="col-md-6">
                <strong>Platform Optimization:</strong><br>
                • Optimize for each platform<br>
                • Consider platform demographics<br>
                • Use platform-specific features<br>
                • Monitor engagement metrics
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
    
    <x-form-colors 
        name="theme_primary" 
        label="Theme Primary Color"
        :default="'primary'"
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
    </x-form-colors>
    
    <div class="theme-color-palette mt-3">
        <h6>Theme Color Palette</h6>
        <div class="row">
            <div class="col-md-3">
                <x-form-colors 
                    name="theme_success" 
                    label="Success Color"
                    :default="'green'">
                    
                    <x-slot:help>
                        Color for success messages and actions
                    </x-slot:help>
                </x-form-colors>
            </div>
            
            <div class="col-md-3">
                <x-form-colors 
                    name="theme_warning" 
                    label="Warning Color"
                    :default="'yellow'">
                    
                    <x-slot:help>
                        Color for warning messages and actions
                    </x-slot:help>
                </x-form-colors>
            </div>
            
            <div class="col-md-3">
                <x-form-colors 
                    name="theme_danger" 
                    label="Danger Color"
                    :default="'red'">
                    
                    <x-slot:help>
                        Color for error messages and actions
                    </x-slot:help>
                </x-form-colors>
            </div>
            
            <div class="col-md-3">
                <x-form-colors 
                    name="theme_info" 
                    label="Info Color"
                    :default="'cyan'">
                    
                    <x-slot:help>
                        Color for informational messages
                    </x-slot:help>
                </x-form-colors>
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
    
    <x-form-colors 
        name="creative_colors" 
        label="Creative Colors"
        multiple
        :default="['pink', 'purple', 'orange']">
        
        <x-slot:help>
            <div class="creative-colors-help">
                <strong>Creative Color Guidelines:</strong><br>
                • Pink: Creative and playful<br>
                • Purple: Artistic and imaginative<br>
                • Orange: Energetic and enthusiastic<br>
                • Yellow: Optimistic and cheerful<br>
                • Green: Natural and balanced<br>
                • Blue: Calm and trustworthy
            </div>
        </x-slot:help>
    </x-form-colors>
    
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

### UI Component Color Selection
```blade
<div class="ui-component-color-selection">
    <h4>UI Component Colors</h4>
    <p>Select colors for specific UI components:</p>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <x-form-colors 
                name="button_color" 
                label="Button Color"
                :default="'primary'">
                
                <x-slot:help>
                    <div class="button-color-help">
                        <strong>Button Color Guidelines:</strong><br>
                        • Should have good contrast with text<br>
                        • Consider hover and active states<br>
                        • Ensure accessibility compliance<br>
                        • Match your brand identity
                    </div>
                </x-slot:help>
            </x-form-colors>
        </div>
        
        <div class="col-md-4 mb-3">
            <x-form-colors 
                name="link_color" 
                label="Link Color"
                :default="'blue'">
                
                <x-slot:help>
                    <div class="link-color-help">
                        <strong>Link Color Guidelines:</strong><br>
                        • Should be distinct from regular text<br>
                        • Consider visited and hover states<br>
                        • Ensure sufficient contrast<br>
                        • Follow web accessibility guidelines
                    </div>
                </x-slot:help>
            </x-form-colors>
        </div>
        
        <div class="col-md-4 mb-3">
            <x-form-colors 
                name="background_color" 
                label="Background Color"
                :default="'white'">
                
                <x-slot:help>
                    <div class="background-color-help">
                        <strong>Background Color Guidelines:</strong><br>
                        • Should not interfere with readability<br>
                        • Consider content contrast<br>
                        • Support for dark mode<br>
                        • Maintain visual hierarchy
                    </div>
                </x-slot:help>
            </x-form-colors>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_colors_with_basic_attributes()
{
    $view = $this->blade('<x-form-colors name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-colors');
}

/** @test */
public function it_renders_form_colors_with_label()
{
    $view = $this->blade('<x-form-colors name="theme_color" label="Theme Color" />');
    
    $view->assertSee('name="theme_color"');
    $view->assertSee('Theme Color');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ColorsComponent::class)
        ->assertSee('<x-form-colors')
        ->set('colors', ['blue', 'green'])
        ->assertSee('blue');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to color selection elements
- `aria-describedby`: Links to help text
- `role="button"`: Applied to color option elements

### Keyboard Navigation
- Tab navigation to color selection
- Enter key for color selection
- Color option navigation
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
- **JavaScript Dependencies:** Alpine.js (via FormChoices)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** FormChoices with color options

## Troubleshooting

### Common Issues

#### Colors Not Displaying
**Problem:** Color options not showing correctly
**Solution:** Check FormChoices component and color configuration

#### FormChoices Integration Problems
**Problem:** FormChoices extension not working
**Solution:** Check FormChoices component and attribute merging

#### Color Selection Issues
**Problem:** Color selection not working
**Solution:** Verify color selection logic and event handling

#### Styling Issues
**Problem:** Color badges don't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Multiple Selection Issues
**Problem:** Multiple color selection not working
**Solution:** Check multiple attribute and FormChoices configuration

## Related Components

- **Form Choices:** Base choices component
- **Form Color:** Single color input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with color selection functionality
- FormChoices extension with color support
- Predefined color palette with social media brands
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-colors.blade.php`
2. Add/update tests in `tests/Components/FormColorsTest.php`
3. Update this documentation

## See Also

- [Form Choices Component](../form-choices.md)
- [Form Color Component](../form-color.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Badges](https://getbootstrap.com/docs/5.3/components/badge/)
- [Color Theory](https://en.wikipedia.org/wiki/Color_theory)
- [Brand Color Guidelines](https://www.smashingmagazine.com/2010/02/color-theory-for-designers-part-1-the-meaning-of-color/)
