# Form Button Item Component

A specialized button item component that provides comprehensive individual button functionality within button groups with enhanced user experience and flexible configuration options. This component extends FormSelectItem to offer intuitive button item functionality with checkbox and radio button support, professional styling, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormSelectItem component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormSelectItem)

## Files

- **PHP Class:** `src/Components/FormButtonItem.php`
- **View File:** `resources/views/bootstrap-5/form-button-item.blade.php`
- **Tests:** `tests/Components/FormButtonItemTest.php` (to be created)
- **Documentation:** `docs/form-button-item.md`

## Basic Usage

### Simple Button Item
```blade
<x-form-button-item name="options" value="option1">Option 1</x-form-button-item>
```

### With Label
```blade
<x-form-button-item 
    name="preferences" 
    value="light" 
    label="Light Theme">
</x-form-button-item>
```

### With Icon
```blade
<x-form-button-item 
    name="features" 
    value="wifi" 
    icon="wifi">
    WiFi
</x-form-button-item>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'preferences'` or `'features'` |
| value | mixed | Input value attribute | `'light'` or `'wifi'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Button label text | `'Light Theme'` |
| type | string | 'radio' | Input type (radio/checkbox) | `'checkbox'` |
| checked | boolean | false | Whether item is checked | `true` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'button-item']` |

### Inherited Attributes

This component extends `FormSelectItem` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'button-item-input'` |
| class | string | '' | CSS classes | `'custom-button-item'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Select option...'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-option'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Component Variants

### Radio Button Item
**Usage:** `<x-form-button-item type="radio">` (default)
**Description:** Single selection button item with radio button behavior
**Features:**
- Single option selection
- Radio input type
- Professional button styling
- Enhanced user experience

### Checkbox Button Item
**Usage:** `<x-form-button-item type="checkbox">`
**Description:** Multiple selection button item with checkbox behavior
**Features:**
- Multiple option selection
- Checkbox input type
- Professional button styling
- Enhanced user experience

### Icon Button Item
**Usage:** `<x-form-button-item icon="icon-name">`
**Description:** Button item with icon support
**Features:**
- Icon display support
- Professional button styling
- Enhanced visual appeal
- Flexible icon integration

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Button content and text
- **Required:** Yes
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-form-button-item name="options" value="option1">
    Option 1
</x-form-button-item>
```

## Usage Examples

### Basic Radio Button Item
```blade
<x-form-button-item 
    name="theme" 
    value="light">
    Light Theme
</x-form-button-item>
```

### Checkbox Button Item
```blade
<x-form-button-item 
    name="features" 
    value="wifi" 
    type="checkbox">
    WiFi
</x-form-button-item>
```

### Button Item with Label
```blade
<x-form-button-item 
    name="size" 
    value="large" 
    label="Large Size">
    Large
</x-form-button-item>
```

### Button Item with Icon
```blade
<x-form-button-item 
    name="notifications" 
    value="email" 
    icon="envelope">
    Email
</x-form-button-item>
```

### Button Item with Custom Classes
```blade
<x-form-button-item 
    name="custom_option" 
    value="custom" 
    class="custom-button-item-lg">
    Custom Option
</x-form-button-item>
```

### Button Item with Custom ID
```blade
<x-form-button-item 
    name="custom_id_option" 
    value="custom" 
    id="custom-button-item-selector">
    Custom ID Option
</x-form-button-item>
```

### Button Item with Title
```blade
<x-form-button-item 
    name="title_option" 
    value="title" 
    title="Button Item Tooltip">
    Title Option
</x-form-button-item>
```

### Button Item with Data Attributes
```blade
<x-form-button-item 
    name="data_option" 
    value="data" 
    data-test="button-item"
    data-type="selection">
    Data Option
</x-form-button-item>
```

### Button Item with Aria Attributes
```blade
<x-form-button-item 
    name="aria_option" 
    value="aria" 
    aria-label="Button Item"
    aria-describedby="help-text">
    Aria Option
</x-form-button-item>
```

### Button Item with Role Attribute
```blade
<x-form-button-item 
    name="role_option" 
    value="role" 
    role="button">
    Role Option
</x-form-button-item>
```

### Button Item with Tabindex
```blade
<x-form-button-item 
    name="tabindex_option" 
    value="tabindex" 
    tabindex="0">
    Tabindex Option
</x-form-button-item>
```

### Button Item with Form Attribute
```blade
<x-form-button-item 
    name="form_option" 
    value="form" 
    form="my-form">
    Form Option
</x-form-button-item>
```

### Button Item with Autocomplete
```blade
<x-form-button-item 
    name="autocomplete_option" 
    value="autocomplete" 
    autocomplete="off">
    Autocomplete Option
</x-form-button-item>
```

### Button Item with Novalidate
```blade
<x-form-button-item 
    name="novalidate_option" 
    value="novalidate" 
    novalidate>
    Novalidate Option
</x-form-button-item>
```

### Button Item with Accept
```blade
<x-form-button-item 
    name="accept_option" 
    value="accept" 
    accept="image/*">
    Accept Option
</x-form-button-item>
```

### Button Item with Capture
```blade
<x-form-button-item 
    name="capture_option" 
    value="capture" 
    capture="environment">
    Capture Option
</x-form-button-item>
```

### Button Item with Max
```blade
<x-form-button-item 
    name="max_option" 
    value="max" 
    max="5">
    Max Option
</x-form-button-item>
```

### Button Item with Min
```blade
<x-form-button-item 
    name="min_option" 
    value="min" 
    min="1">
    Min Option
</x-form-button-item>
```

### Button Item with Step
```blade
<x-form-button-item 
    name="step_option" 
    value="step" 
    step="0.1">
    Step Option
</x-form-button-item>
```

### Button Item with Pattern
```blade
<x-form-button-item 
    name="pattern_option" 
    value="pattern" 
    pattern="[A-Za-z]{3}">
    Pattern Option
</x-form-button-item>
```

### Button Item with Spellcheck
```blade
<x-form-button-item 
    name="spellcheck_option" 
    value="spellcheck" 
    spellcheck="false">
    Spellcheck Option
</x-form-button-item>
```

### Button Item with Translate
```blade
<x-form-button-item 
    name="translate_option" 
    value="translate" 
    translate="no">
    Translate Option
</x-form-button-item>
```

### Button Item with Contenteditable
```blade
<x-form-button-item 
    name="contenteditable_option" 
    value="contenteditable" 
    contenteditable="true">
    Contenteditable Option
</x-form-button-item>
```

### Button Item with Contextmenu
```blade
<x-form-button-item 
    name="contextmenu_option" 
    value="contextmenu" 
    contextmenu="my-menu">
    Contextmenu Option
</x-form-button-item>
```

### Button Item with Dir
```blade
<x-form-button-item 
    name="dir_option" 
    value="dir" 
    dir="rtl">
    Dir Option
</x-form-button-item>
```

### Button Item with Draggable
```blade
<x-form-button-item 
    name="draggable_option" 
    value="draggable" 
    draggable="true">
    Draggable Option
</x-form-button-item>
```

### Button Item with Dropzone
```blade
<x-form-button-item 
    name="dropzone_option" 
    value="dropzone" 
    dropzone="copy">
    Dropzone Option
</x-form-button-item>
```

### Button Item with Hidden
```blade
<x-form-button-item 
    name="hidden_option" 
    value="hidden" 
    hidden>
    Hidden Option
</x-form-button-item>
```

### Button Item with Lang
```blade
<x-form-button-item 
    name="lang_option" 
    value="lang" 
    lang="en">
    Lang Option
</x-form-button-item>
```

### Button Item with Spellcheck True
```blade
<x-form-button-item 
    name="spellcheck_true_option" 
    value="spellcheck_true" 
    spellcheck="true">
    Spellcheck True Option
</x-form-button-item>
```

### Button Item with Translate Yes
```blade
<x-form-button-item 
    name="translate_yes_option" 
    value="translate_yes" 
    translate="yes">
    Translate Yes Option
</x-form-button-item>
```

### Button Item with Contenteditable False
```blade
<x-form-button-item 
    name="contenteditable_false_option" 
    value="contenteditable_false" 
    contenteditable="false">
    Contenteditable False Option
</x-form-button-item>
```

### Button Item with Draggable False
```blade
<x-form-button-item 
    name="draggable_false_option" 
    value="draggable_false" 
    draggable="false">
    Draggable False Option
</x-form-button-item>
```

### Button Item with Dropzone Move
```blade
<x-form-button-item 
    name="dropzone_move_option" 
    value="dropzone_move" 
    dropzone="move">
    Dropzone Move Option
</x-form-button-item>
```

### Button Item with Dropzone Link
```blade
<x-form-button-item 
    name="dropzone_link_option" 
    value="dropzone_link" 
    dropzone="link">
    Dropzone Link Option
</x-form-button-item>
```

### Button Item with Dropzone Copy Move
```blade
<x-form-button-item 
    name="dropzone_copy_move_option" 
    value="dropzone_copy_move" 
    dropzone="copy move">
    Dropzone Copy Move Option
</x-form-button-item>
```

### Button Item with Dropzone Copy Link
```blade
<x-form-button-item 
    name="dropzone_copy_link_option" 
    value="dropzone_copy_link" 
    dropzone="copy link">
    Dropzone Copy Link Option
</x-form-button-item>
```

### Button Item with Dropzone Move Link
```blade
<x-form-button-item 
    name="dropzone_move_link_option" 
    value="dropzone_move_link" 
    dropzone="move link">
    Dropzone Move Link Option
</x-form-button-item>
```

### Button Item with Dropzone Copy Move Link
```blade
<x-form-button-item 
    name="dropzone_copy_move_link_option" 
    value="dropzone_copy_move_link" 
    dropzone="copy move link">
    Dropzone Copy Move Link Option
</x-form-button-item>
```

## Common Patterns

### Theme Selection Interface
```blade
<div class="theme-selection-interface">
    <h4>Theme Selection</h4>
    <p>Choose your preferred theme:</p>
    
    <div class="btn-group" role="group">
        <x-form-button-item 
            name="theme" 
            value="light" 
            icon="sun">
            Light Theme
        </x-form-button-item>
        
        <x-form-button-item 
            name="theme" 
            value="dark" 
            icon="moon">
            Dark Theme
        </x-form-button-item>
        
        <x-form-button-item 
            name="theme" 
            value="auto" 
            icon="adjust">
            Auto Theme
        </x-form-button-item>
    </div>
    
    <div class="theme-tips mt-3">
        <h6>Theme Tips</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Light Theme:</strong><br>
                • Clean and bright interface<br>
                • Good for daytime use<br>
                • Professional appearance<br>
                • Easy on the eyes
            </div>
            <div class="col-md-4">
                <strong>Dark Theme:</strong><br>
                • Easy on the eyes<br>
                • Good for nighttime use<br>
                • Modern appearance<br>
                • Battery saving on OLED
            </div>
            <div class="col-md-4">
                <strong>Auto Theme:</strong><br>
                • Follows system preference<br>
                • Automatic switching<br>
                • User-friendly<br>
                • Context-aware
            </div>
        </div>
    </div>
</div>
```

### Feature Selection Interface
```blade
<div class="feature-selection-interface">
    <h4>Product Features</h4>
    <p>Select the features you want:</p>
    
    <div class="btn-group" role="group">
        <x-form-button-item 
            name="features" 
            value="wifi" 
            type="checkbox"
            icon="wifi">
            WiFi
        </x-form-button-item>
        
        <x-form-button-item 
            name="features" 
            value="bluetooth" 
            type="checkbox"
            icon="bluetooth">
            Bluetooth
        </x-form-button-item>
        
        <x-form-button-item 
            name="features" 
            value="gps" 
            type="checkbox"
            icon="location-arrow">
            GPS
        </x-form-button-item>
        
        <x-form-button-item 
            name="features" 
            value="camera" 
            type="checkbox"
            icon="camera">
            Camera
        </x-form-button-item>
    </div>
    
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

### Size Selection Interface
```blade
<div class="size-selection-interface">
    <h4>Size Selection</h4>
    <p>Choose your preferred size:</p>
    
    <div class="btn-group" role="group">
        <x-form-button-item 
            name="size" 
            value="small" 
            label="Small Size">
            Small
        </x-form-button-item>
        
        <x-form-button-item 
            name="size" 
            value="medium" 
            label="Medium Size">
            Medium
        </x-form-button-item>
        
        <x-form-button-item 
            name="size" 
            value="large" 
            label="Large Size">
            Large
        </x-form-button-item>
        
        <x-form-button-item 
            name="size" 
            value="xl" 
            label="Extra Large Size">
            XL
        </x-form-button-item>
    </div>
    
    <div class="size-tips mt-3">
        <h6>Size Selection Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Consider Your Needs:</strong><br>
                • Small: Compact and portable<br>
                • Medium: Balanced size<br>
                • Large: More features<br>
                • XL: Maximum capacity
            </div>
            <div class="col-md-6">
                <strong>Think About:</strong><br>
                • Portability requirements<br>
                • Feature needs<br>
                • Budget constraints<br>
                • Usage patterns
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
    
    <div class="btn-group" role="group">
        <x-form-button-item 
            name="notifications" 
            value="email" 
            type="checkbox"
            icon="envelope">
            Email
        </x-form-button-item>
        
        <x-form-button-item 
            name="notifications" 
            value="sms" 
            type="checkbox"
            icon="comment">
            SMS
        </x-form-button-item>
        
        <x-form-button-item 
            name="notifications" 
            value="push" 
            type="checkbox"
            icon="bell">
            Push
        </x-form-button-item>
        
        <x-form-button-item 
            name="notifications" 
            value="in_app" 
            type="checkbox"
            icon="info-circle">
            In-App
        </x-form-button-item>
    </div>
    
    <div class="notification-tips mt-3">
        <h6>Notification Tips</h6>
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

### Language Selection Interface
```blade
<div class="language-selection-interface">
    <h4>Language Selection</h4>
    <p>Choose your preferred language:</p>
    
    <div class="btn-group" role="group">
        <x-form-button-item 
            name="language" 
            value="en" 
            label="English">
            English
        </x-form-button-item>
        
        <x-form-button-item 
            name="language" 
            value="es" 
            label="Spanish">
            Español
        </x-form-button-item>
        
        <x-form-button-item 
            name="language" 
            value="fr" 
            label="French">
            Français
        </x-form-button-item>
        
        <x-form-button-item 
            name="language" 
            value="de" 
            label="German">
            Deutsch
        </x-form-button-item>
    </div>
    
    <div class="language-tips mt-3">
        <h6>Language Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Language Guidelines:</strong><br>
                • English: Default language<br>
                • Spanish: Español<br>
                • French: Français<br>
                • German: Deutsch
            </div>
            <div class="col-md-6">
                <strong>Considerations:</strong><br>
                • Your native language<br>
                • Business requirements<br>
                • Target audience<br>
                • Regional preferences
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_button_item_with_basic_attributes()
{
    $view = $this->blade('<x-form-button-item name="test" value="option1">Option 1</x-form-button-item>');
    
    $view->assertSee('name="test"');
    $view->assertSee('value="option1"');
    $view->assertSee('Option 1');
}

/** @test */
public function it_renders_form_button_item_with_label()
{
    $view = $this->blade('<x-form-button_item name="test" value="option1" label="Test Label">Option 1</x-form-button-item>');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Label');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ButtonItemComponent::class)
        ->assertSee('<x-form-button-item')
        ->set('selectedOption', 'option1')
        ->assertSee('option1');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to button item elements
- `aria-describedby`: Links to help text
- `role="button"`: Applied to button item elements

### Keyboard Navigation
- Tab navigation to button item
- Enter key for option selection
- Button item navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Option selection feedback
- Help text communication
- Error message communication

### Button Item Accessibility
- Clear option purpose indication
- Proper validation feedback
- Helpful error messages
- Selection guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormSelectItem)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Radio and checkbox button support

## Troubleshooting

### Common Issues

#### Button Item Not Displaying
**Problem:** Button item not showing correctly
**Solution:** Check FormSelectItem component and button item configuration

#### FormSelectItem Integration Problems
**Problem:** FormSelectItem extension not working
**Solution:** Check FormSelectItem component and attribute merging

#### Button Selection Issues
**Problem:** Button selection not working
**Solution:** Verify button selection logic and event handling

#### Styling Issues
**Problem:** Button item doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Icon Display Issues
**Problem:** Icon not showing correctly
**Solution:** Check icon component and icon name configuration

## Related Components

- **Form Select Item:** Base select item component
- **Form Button Group:** Button group container component
- **Form Button:** Basic button component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with button item functionality
- FormSelectItem extension with button support
- Radio and checkbox button support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-button-item.blade.php`
2. Update the PHP class: `src/Components/FormButtonItem.php`
3. Add/update tests in `tests/Components/FormButtonItemTest.php`
4. Update this documentation

## See Also

- [Form Select Item Component](../form-select-item.md)
- [Form Button Group Component](../form-button-group.md)
- [Form Button Component](../form-button.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Button Groups](https://getbootstrap.com/docs/5.3/components/button-group/)
- [Form Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Button Item Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
