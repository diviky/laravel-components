# Form Select Group Component

A sophisticated select group component that provides comprehensive form selection grouping capabilities with enhanced user experience and flexible configuration options. This component extends FormSelect to offer intuitive select group functionality with checkbox and radio button support, professional styling, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormSelect component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormSelect)

## Files

- **PHP Class:** `src/Components/FormSelectGroup.php`
- **View File:** `resources/views/bootstrap-5/form-select-group.blade.php`
- **Tests:** `tests/Components/FormSelectGroupTest.php` (to be created)
- **Documentation:** `docs/form-select-group.md`

## Basic Usage

### Simple Select Group
```blade
<x-form-select-group name="options" :options="['option1' => 'Option 1', 'option2' => 'Option 2']" />
```

### With Label
```blade
<x-form-select-group 
    name="preferences" 
    label="Select Preferences"
    :options="['light' => 'Light Theme', 'dark' => 'Dark Theme']">
</x-form-select-group>
```

### With Pills Style
```blade
<x-form-select-group 
    name="features" 
    pills
    :options="['wifi' => 'WiFi', 'bluetooth' => 'Bluetooth']">
</x-form-select-group>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'preferences'` or `'features'` |
| options | array | Available options | `['key' => 'Label', 'key2' => 'Label 2']` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'checkbox' | Input type (radio/checkbox) | `'radio'` |
| label | string | null | Group label text | `'Select Preferences'` |
| pills | boolean | false | Use pills styling | `true` |
| boxes | boolean | false | Use boxes styling | `true` |
| full | boolean | false | Full width layout | `true` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'select-group']` |

### Inherited Attributes

This component extends `FormSelect` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'select-group-input'` |
| class | string | '' | CSS classes | `'custom-select-group'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Select options...'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-options'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Component Variants

### Checkbox Select Group
**Usage:** `<x-form-select-group type="checkbox">` (default)
**Description:** Multiple selection select group with checkbox behavior
**Features:**
- Multiple option selection
- Checkbox input type
- Professional styling
- Enhanced user experience

### Radio Select Group
**Usage:** `<x-form-select-group type="radio">`
**Description:** Single selection select group with radio button behavior
**Features:**
- Single option selection
- Radio input type
- Professional styling
- Enhanced user experience

### Pills Select Group
**Usage:** `<x-form-select-group pills>`
**Description:** Select group with pills styling
**Features:**
- Pills visual style
- Professional appearance
- Enhanced visual appeal
- Flexible styling options

### Boxes Select Group
**Usage:** `<x-form-select-group boxes>`
**Description:** Select group with boxes styling
**Features:**
- Boxes visual style
- Professional appearance
- Enhanced visual appeal
- Flexible styling options

### Full Width Select Group
**Usage:** `<x-form-select-group full>`
**Description:** Full width layout select group
**Features:**
- Full width layout
- Responsive design
- Professional appearance
- Enhanced visual appeal

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Fallback content when no options provided
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-form-select-group name="options">
    <x-form-select-item name="options" value="custom">Custom Option</x-form-select-item>
</x-form-select-group>
```

### Optional Slots

#### Help Slot
- **Purpose:** Help text below the select group
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-form-select-group name="options" :options="$options">
    <x-slot:help>Select one or more options from the list above.</x-slot:help>
</x-form-select-group>
```

## Usage Examples

### Basic Checkbox Select Group
```blade
<x-form-select-group 
    name="features" 
    :options="['wifi' => 'WiFi', 'bluetooth' => 'Bluetooth', 'gps' => 'GPS']">
</x-form-select-group>
```

### Radio Select Group
```blade
<x-form-select-group 
    name="theme" 
    type="radio"
    :options="['light' => 'Light Theme', 'dark' => 'Dark Theme']">
</x-form-select-group>
```

### Select Group with Label
```blade
<x-form-select-group 
    name="size" 
    label="Select Size"
    :options="['small' => 'Small', 'medium' => 'Medium', 'large' => 'Large']">
</x-form-select-group>
```

### Select Group with Pills Style
```blade
<x-form-select-group 
    name="categories" 
    pills
    :options="['tech' => 'Technology', 'design' => 'Design', 'business' => 'Business']">
</x-form-select-group>
```

### Select Group with Boxes Style
```blade
<x-form-select-group 
    name="services" 
    boxes
    :options="['web' => 'Web Development', 'mobile' => 'Mobile Apps', 'consulting' => 'Consulting']">
</x-form-select-group>
```

### Select Group with Full Width
```blade
<x-form-select-group 
    name="interests" 
    full
    :options="['sports' => 'Sports', 'music' => 'Music', 'travel' => 'Travel']">
</x-form-select-group>
```

### Select Group with Custom Classes
```blade
<x-form-select-group 
    name="custom_options" 
    class="custom-select-group-lg"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Custom ID
```blade
<x-form-select-group 
    name="custom_id_options" 
    id="custom-select-group-selector"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Help Text
```blade
<x-form-select-group 
    name="help_options" 
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
    <x-slot:help>Choose the options that best describe your preferences.</x-slot:help>
</x-form-select-group>
```

### Select Group with Livewire
```blade
<x-form-select-group 
    name="livewire_options" 
    wire:model="selectedOptions"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Model Binding
```blade
<x-form-select-group 
    name="model_options" 
    :bind="$user"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Default Values
```blade
<x-form-select-group 
    name="default_options" 
    :default="['option1']"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Error State
```blade
<x-form-select-group 
    name="error_options" 
    class="is-invalid"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Success State
```blade
<x-form-select-group 
    name="success_options" 
    class="is-valid"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Warning State
```blade
<x-form-select-group 
    name="warning_options" 
    class="is-warning"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Info State
```blade
<x-form-select-group 
    name="info_options" 
    class="is-info"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Danger State
```blade
<x-form-select-group 
    name="danger_options" 
    class="is-danger"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Small Size
```blade
<x-form-select-group 
    name="small_options" 
    class="form-selectgroup-sm"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Large Size
```blade
<x-form-select-group 
    name="large_options" 
    class="form-selectgroup-lg"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Primary Style
```blade
<x-form-select-group 
    name="primary_options" 
    class="form-selectgroup-primary"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Secondary Style
```blade
<x-form-select-group 
    name="secondary_options" 
    class="form-selectgroup-secondary"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Success Style
```blade
<x-form-select-group 
    name="success_style_options" 
    class="form-selectgroup-success"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Warning Style
```blade
<x-form-select-group 
    name="warning_style_options" 
    class="form-selectgroup-warning"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Danger Style
```blade
<x-form-select-group 
    name="danger_style_options" 
    class="form-selectgroup-danger"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Info Style
```blade
<x-form-select-group 
    name="info_style_options" 
    class="form-selectgroup-info"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Light Style
```blade
<x-form-select-group 
    name="light_style_options" 
    class="form-selectgroup-light"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Dark Style
```blade
<x-form-select-group 
    name="dark_style_options" 
    class="form-selectgroup-dark"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Outline Style
```blade
<x-form-select-group 
    name="outline_style_options" 
    class="form-selectgroup-outline-primary"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Ghost Style
```blade
<x-form-select-group 
    name="ghost_style_options" 
    class="form-selectgroup-ghost-primary"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Custom Color
```blade
<x-form-select-group 
    name="custom_color_options" 
    color="purple"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Custom Size
```blade
<x-form-select-group 
    name="custom_size_options" 
    size="xl"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Custom Variant
```blade
<x-form-select-group 
    name="custom_variant_options" 
    variant="rounded"
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Dropdown Support
```blade
<x-form-select-group 
    name="dropdown_options" 
    dropdown
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Loading State
```blade
<x-form-select-group 
    name="loading_options" 
    loading
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Square Style
```blade
<x-form-select-group 
    name="square_options" 
    square
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Pill Style
```blade
<x-form-select-group 
    name="pill_options" 
    pill
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Block Style
```blade
<x-form-select-group 
    name="block_options" 
    full
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

### Select Group with Bold Style
```blade
<x-form-select-group 
    name="bold_options" 
    bold
    :options="['option1' => 'Option 1', 'option2' => 'Option 2']">
</x-form-select-group>
```

## Common Patterns

### Feature Selection Interface
```blade
<div class="feature-selection-interface">
    <h4>Product Features</h4>
    <p>Select the features you want:</p>
    
    <x-form-select-group 
        name="features" 
        pills
        :options="[
            'wifi' => 'WiFi',
            'bluetooth' => 'Bluetooth',
            'gps' => 'GPS',
            'camera' => 'Camera',
            'waterproof' => 'Waterproof',
            'shockproof' => 'Shockproof'
        ]">
        <x-slot:help>Choose the features that are important to you.</x-slot:help>
    </x-form-select-group>
    
    <div class="feature-tips mt-3">
        <h6>Feature Selection Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Essential Features:</strong><br>
                • WiFi for connectivity<br>
                • Bluetooth for pairing<br>
                • GPS for location<br>
                • Camera for media
            </div>
            <div class="col-md-6">
                <strong>Optional Features:</strong><br>
                • Waterproof for outdoor use<br>
                • Shockproof for durability<br>
                • Extended battery life<br>
                • Premium materials
            </div>
        </div>
    </div>
</div>
```

### Theme Selection Interface
```blade
<div class="theme-selection-interface">
    <h4>Theme Selection</h4>
    <p>Choose your preferred theme:</p>
    
    <x-form-select-group 
        name="theme" 
        type="radio"
        boxes
        :options="[
            'light' => 'Light Theme',
            'dark' => 'Dark Theme',
            'auto' => 'Auto Theme',
            'custom' => 'Custom Theme'
        ]">
        <x-slot:help>Select a theme that matches your preference.</x-slot:help>
    </x-form-select-group>
    
    <div class="theme-tips mt-3">
        <h6>Theme Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Light Theme:</strong><br>
                • Clean and bright interface<br>
                • Good for daytime use<br>
                • Professional appearance<br>
                • Easy on the eyes
            </div>
            <div class="col-md-6">
                <strong>Dark Theme:</strong><br>
                • Easy on the eyes<br>
                • Good for nighttime use<br>
                • Modern appearance<br>
                • Battery saving on OLED
            </div>
        </div>
    </div>
</div>
```

### Category Selection Interface
```blade
<div class="category-selection-interface">
    <h4>Content Categories</h4>
    <p>Select the categories you're interested in:</p>
    
    <x-form-select-group 
        name="categories" 
        pills
        full
        :options="[
            'technology' => 'Technology',
            'design' => 'Design',
            'business' => 'Business',
            'marketing' => 'Marketing',
            'development' => 'Development',
            'productivity' => 'Productivity',
            'creativity' => 'Creativity',
            'innovation' => 'Innovation'
        ]">
        <x-slot:help>Choose categories that align with your interests and goals.</x-slot:help>
    </x-form-select-group>
    
    <div class="category-tips mt-3">
        <h6>Category Selection Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Primary Categories:</strong><br>
                • Technology: Latest tech trends<br>
                • Design: Visual and UX design<br>
                • Business: Business strategies<br>
                • Marketing: Marketing techniques
            </div>
            <div class="col-md-6">
                <strong>Secondary Categories:</strong><br>
                • Development: Coding and programming<br>
                • Productivity: Time management<br>
                • Creativity: Creative thinking<br>
                • Innovation: New ideas and approaches
            </div>
        </div>
    </div>
</div>
```

### Size Selection Interface
```blade
<div class="size-selection-interface">
    <h4>Size Selection</h4>
    <p>Choose your preferred size:</p>
    
    <x-form-select-group 
        name="size" 
        type="radio"
        boxes
        :options="[
            'xs' => 'Extra Small',
            'small' => 'Small',
            'medium' => 'Medium',
            'large' => 'Large',
            'xl' => 'Extra Large',
            'xxl' => '2XL'
        ]">
        <x-slot:help>Select the size that best fits your needs.</x-slot:help>
    </x-form-select-group>
    
    <div class="size-tips mt-3">
        <h6>Size Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Smaller Sizes:</strong><br>
                • XS: Very compact<br>
                • Small: Compact<br>
                • Medium: Balanced
            </div>
            <div class="col-md-6">
                <strong>Larger Sizes:</strong><br>
                • Large: Spacious<br>
                • XL: Very spacious<br>
                • 2XL: Maximum capacity
            </div>
        </div>
    </div>
</div>
```

### Notification Preference Interface
```blade
<div class="notification-preference-interface">
    <h4>Notification Preferences</h4>
    <p>Select how you want to be notified:</p>
    
    <x-form-select-group 
        name="notifications" 
        pills
        :options="[
            'email' => 'Email',
            'sms' => 'SMS',
            'push' => 'Push Notifications',
            'in_app' => 'In-App Notifications',
            'browser' => 'Browser Notifications',
            'desktop' => 'Desktop Notifications'
        ]">
        <x-slot:help>Choose your preferred notification methods.</x-slot:help>
    </x-form-select-group>
    
    <div class="notification-tips mt-3">
        <h6>Notification Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Urgency Levels:</strong><br>
                • Email: Important updates<br>
                • SMS: Urgent notifications<br>
                • Push: Real-time alerts<br>
                • In-app: App notifications
            </div>
            <div class="col-md-6">
                <strong>Best Practices:</strong><br>
                • Choose based on urgency<br>
                • Consider your workflow<br>
                • Balance information and distraction<br>
                • Review periodically
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_select_group_with_basic_attributes()
{
    $view = $this->blade('<x-form-select-group name="test" :options="[\'option1\' => \'Option 1\']" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-selectgroup');
}

/** @test */
public function it_renders_form_select_group_with_label()
{
    $view = $this->blade('<x-form-select-group name="test" label="Test Label" :options="[\'option1\' => \'Option 1\']" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Label');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(SelectGroupComponent::class)
        ->assertSee('<x-form-select-group')
        ->set('selectedOptions', ['option1'])
        ->assertSee('option1');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to select group elements
- `aria-describedby`: Links to help text
- `role="group"`: Applied to select group elements

### Keyboard Navigation
- Tab navigation to select group
- Arrow keys for option selection
- Enter key for option selection
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Option selection feedback
- Help text communication
- Error message communication

### Select Group Accessibility
- Clear group purpose indication
- Proper validation feedback
- Helpful error messages
- Selection guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormSelect)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Radio and checkbox support

## Troubleshooting

### Common Issues

#### Select Group Not Displaying
**Problem:** Select group not showing correctly
**Solution:** Check FormSelect component and select group configuration

#### FormSelect Integration Problems
**Problem:** FormSelect extension not working
**Solution:** Check FormSelect component and attribute merging

#### Option Selection Issues
**Problem:** Option selection not working
**Solution:** Verify option selection logic and event handling

#### Styling Issues
**Problem:** Select group doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Pills/Boxes Styling Issues
**Problem:** Pills or boxes styling not working
**Solution:** Check CSS classes and styling configuration

## Related Components

- **Form Select:** Base select component
- **Form Select Item:** Individual select item component
- **Form Button Group:** Button group container component
- **Form Button Item:** Individual button item component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with select group functionality
- FormSelect extension with group support
- Checkbox and radio button support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-select-group.blade.php`
2. Update the PHP class: `src/Components/FormSelectGroup.php`
3. Add/update tests in `tests/Components/FormSelectGroupTest.php`
4. Update this documentation

## See Also

- [Form Select Component](../form-select.md)
- [Form Select Item Component](../form-select-item.md)
- [Form Button Group Component](../form-button-group.md)
- [Form Button Item Component](../form-button-item.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Form Select Groups](https://getbootstrap.com/docs/5.3/forms/select/)
- [Form Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Select Group Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
