# Form Select Item Component

A sophisticated select item component that provides comprehensive individual form selection functionality with enhanced user experience and flexible configuration options. This component offers intuitive select item functionality with checkbox and radio button support, professional styling, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Base Component class, extends core form functionality
**JavaScript Library:** Alpine.js (via base component)

## Files

- **PHP Class:** `src/Components/FormSelectItem.php`
- **View File:** `resources/views/bootstrap-5/form-select-item.blade.php`
- **Tests:** `tests/Components/FormSelectItemTest.php` (to be created)
- **Documentation:** `docs/form-select-item.md`

## Basic Usage

### Simple Select Item
```blade
<x-form-select-item name="options" value="option1">Option 1</x-form-select-item>
```

### With Label
```blade
<x-form-select-item 
    name="preferences" 
    value="light" 
    label="Light Theme">
</x-form-select-item>
```

### With Icon
```blade
<x-form-select-item 
    name="features" 
    value="wifi" 
    icon="wifi">
    WiFi
</x-form-select-item>
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
| label | string | '' | Item label text | `'Light Theme'` |
| type | string | 'radio' | Input type (radio/checkbox) | `'checkbox'` |
| checked | boolean | false | Whether item is checked | `true` |
| show | boolean | false | Show check mark | `true` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'select-item']` |

### Inherited Attributes

This component extends the base `Component` class and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'select-item-input'` |
| class | string | '' | CSS classes | `'custom-select-item'` |
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

### Radio Select Item
**Usage:** `<x-form-select-item type="radio">` (default)
**Description:** Single selection select item with radio button behavior
**Features:**
- Single option selection
- Radio input type
- Professional styling
- Enhanced user experience

### Checkbox Select Item
**Usage:** `<x-form-select-item type="checkbox">`
**Description:** Multiple selection select item with checkbox behavior
**Features:**
- Multiple option selection
- Checkbox input type
- Professional styling
- Enhanced user experience

### Icon Select Item
**Usage:** `<x-form-select-item icon="icon-name">`
**Description:** Select item with icon support
**Features:**
- Icon display support
- Professional styling
- Enhanced visual appeal
- Flexible icon integration

### Show Check Mark Select Item
**Usage:** `<x-form-select-item show>`
**Description:** Select item with visible check mark
**Features:**
- Visible check mark
- Professional styling
- Enhanced visual feedback
- Clear selection indication

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Item content and text
- **Required:** Yes
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-form-select-item name="options" value="option1">
    Option 1
</x-form-select-item>
```

## Usage Examples

### Basic Radio Select Item
```blade
<x-form-select-item 
    name="theme" 
    value="light">
    Light Theme
</x-form-select-item>
```

### Checkbox Select Item
```blade
<x-form-select-item 
    name="features" 
    value="wifi" 
    type="checkbox">
    WiFi
</x-form-select-item>
```

### Select Item with Label
```blade
<x-form-select-item 
    name="size" 
    value="large" 
    label="Large Size">
    Large
</x-form-select-item>
```

### Select Item with Icon
```blade
<x-form-select-item 
    name="notifications" 
    value="email" 
    icon="envelope">
    Email
</x-form-select-item>
```

### Select Item with Show Check Mark
```blade
<x-form-select-item 
    name="show_option" 
    value="show" 
    show>
    Show Option
</x-form-select-item>
```

### Select Item with Custom Classes
```blade
<x-form-select-item 
    name="custom_option" 
    value="custom" 
    class="custom-select-item-lg">
    Custom Option
</x-form-select-item>
```

### Select Item with Custom ID
```blade
<x-form-select-item 
    name="custom_id_option" 
    value="custom" 
    id="custom-select-item-selector">
    Custom ID Option
</x-form-select-item>
```

### Select Item with Data Attributes
```blade
<x-form-select-item 
    name="data_option" 
    value="data" 
    data-test="select-item"
    data-type="selection">
    Data Option
</x-form-select-item>
```

### Select Item with Aria Attributes
```blade
<x-form-select-item 
    name="aria_option" 
    value="aria" 
    aria-label="Select Item"
    aria-describedby="help-text">
    Aria Option
</x-form-select-item>
```

### Select Item with Role Attribute
```blade
<x-form-select-item 
    name="role_option" 
    value="role" 
    role="option">
    Role Option
</x-form-select-item>
```

### Select Item with Tabindex
```blade
<x-form-select-item 
    name="tabindex_option" 
    value="tabindex" 
    tabindex="0">
    Tabindex Option
</x-form-select-item>
```

### Select Item with Form Attribute
```blade
<x-form-select-item 
    name="form_option" 
    value="form" 
    form="my-form">
    Form Option
</x-form-select-item>
```

### Select Item with Autocomplete
```blade
<x-form-select-item 
    name="autocomplete_option" 
    value="autocomplete" 
    autocomplete="off">
    Autocomplete Option
</x-form-select-item>
```

### Select Item with Novalidate
```blade
<x-form-select-item 
    name="novalidate_option" 
    value="novalidate" 
    novalidate>
    Novalidate Option
</x-form-select-item>
```

### Select Item with Accept
```blade
<x-form-select-item 
    name="accept_option" 
    value="accept" 
    accept="image/*">
    Accept Option
</x-form-select-item>
```

### Select Item with Capture
```blade
<x-form-select-item 
    name="capture_option" 
    value="capture" 
    capture="environment">
    Capture Option
</x-form-select-item>
```

### Select Item with Max
```blade
<x-form-select-item 
    name="max_option" 
    value="max" 
    max="5">
    Max Option
</x-form-select-item>
```

### Select Item with Min
```blade
<x-form-select-item 
    name="min_option" 
    value="min" 
    min="1">
    Min Option
</x-form-select-item>
```

### Select Item with Step
```blade
<x-form-select-item 
    name="step_option" 
    value="step" 
    step="0.1">
    Step Option
</x-form-select-item>
```

### Select Item with Pattern
```blade
<x-form-select-item 
    name="pattern_option" 
    value="pattern" 
    pattern="[A-Za-z]{3}">
    Pattern Option
</x-form-select-item>
```

### Select Item with Spellcheck
```blade
<x-form-select-item 
    name="spellcheck_option" 
    value="spellcheck" 
    spellcheck="false">
    Spellcheck Option
</x-form-select-item>
```

### Select Item with Translate
```blade
<x-form-select-item 
    name="translate_option" 
    value="translate" 
    translate="no">
    Translate Option
</x-form-select-item>
```

### Select Item with Contenteditable
```blade
<x-form-select-item 
    name="contenteditable_option" 
    value="contenteditable" 
    contenteditable="true">
    Contenteditable Option
</x-form-select-item>
```

### Select Item with Contextmenu
```blade
<x-form-select-item 
    name="contextmenu_option" 
    value="contextmenu" 
    contextmenu="my-menu">
    Contextmenu Option
</x-form-select-item>
```

### Select Item with Dir
```blade
<x-form-select-item 
    name="dir_option" 
    value="dir" 
    dir="rtl">
    Dir Option
</x-form-select-item>
```

### Select Item with Draggable
```blade
<x-form-select-item 
    name="draggable_option" 
    value="draggable" 
    draggable="true">
    Draggable Option
</x-form-select-item>
```

### Select Item with Dropzone
```blade
<x-form-select-item 
    name="dropzone_option" 
    value="dropzone" 
    dropzone="copy">
    Dropzone Option
</x-form-select-item>
```

### Select Item with Hidden
```blade
<x-form-select-item 
    name="hidden_option" 
    value="hidden" 
    hidden>
    Hidden Option
</x-form-select-item>
```

### Select Item with Lang
```blade
<x-form-select-item 
    name="lang_option" 
    value="lang" 
    lang="en">
    Lang Option
</x-form-select-item>
```

### Select Item with Spellcheck True
```blade
<x-form-select-item 
    name="spellcheck_true_option" 
    value="spellcheck_true" 
    spellcheck="true">
    Spellcheck True Option
</x-form-select-item>
```

### Select Item with Translate Yes
```blade
<x-form-select-item 
    name="translate_yes_option" 
    value="translate_yes" 
    translate="yes">
    Translate Yes Option
</x-form-select-item>
```

### Select Item with Contenteditable False
```blade
<x-form-select-item 
    name="contenteditable_false_option" 
    value="contenteditable_false" 
    contenteditable="false">
    Contenteditable False Option
</x-form-select-item>
```

### Select Item with Draggable False
```blade
<x-form-select-item 
    name="draggable_false_option" 
    value="draggable_false" 
    draggable="false">
    Draggable False Option
</x-form-select-item>
```

### Select Item with Dropzone Move
```blade
<x-form-select-item 
    name="dropzone_move_option" 
    value="dropzone_move" 
    dropzone="move">
    Dropzone Move Option
</x-form-select-item>
```

### Select Item with Dropzone Link
```blade
<x-form-select-item 
    name="dropzone_link_option" 
    value="dropzone_link" 
    dropzone="link">
    Dropzone Link Option
</x-form-select-item>
```

### Select Item with Dropzone Copy Move
```blade
<x-form-select-item 
    name="dropzone_copy_move_option" 
    value="dropzone_copy_move" 
    dropzone="copy move">
    Dropzone Copy Move Option
</x-form-select-item>
```

### Select Item with Dropzone Copy Link
```blade
<x-form-select-item 
    name="dropzone_copy_link_option" 
    value="dropzone_copy_link" 
    dropzone="copy link">
    Dropzone Copy Link Option
</x-form-select-item>
```

### Select Item with Dropzone Move Link
```blade
<x-form-select-item 
    name="dropzone_move_link_option" 
    value="dropzone_move_link" 
    dropzone="move link">
    Dropzone Move Link Option
</x-form-select-item>
```

### Select Item with Dropzone Copy Move Link
```blade
<x-form-select-item 
    name="dropzone_copy_move_link_option" 
    value="dropzone_copy_move_link" 
    dropzone="copy move link">
    Dropzone Copy Move Link Option
</x-form-select-item>
```

## Common Patterns

### Theme Selection Interface
```blade
<div class="theme-selection-interface">
    <h4>Theme Selection</h4>
    <p>Choose your preferred theme:</p>
    
    <div class="form-selectgroup">
        <x-form-select-item 
            name="theme" 
            value="light" 
            icon="sun">
            Light Theme
        </x-form-select-item>
        
        <x-form-select-item 
            name="theme" 
            value="dark" 
            icon="moon">
            Dark Theme
        </x-form-select-item>
        
        <x-form-select-item 
            name="theme" 
            value="auto" 
            icon="adjust">
            Auto Theme
        </x-form-select-item>
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
    
    <div class="form-selectgroup">
        <x-form-select-item 
            name="features" 
            value="wifi" 
            type="checkbox"
            icon="wifi">
            WiFi
        </x-form-select-item>
        
        <x-form-select-item 
            name="features" 
            value="bluetooth" 
            type="checkbox"
            icon="bluetooth">
            Bluetooth
        </x-form-select-item>
        
        <x-form-select-item 
            name="features" 
            value="gps" 
            type="checkbox"
            icon="location-arrow">
            GPS
        </x-form-select-item>
        
        <x-form-select-item 
            name="features" 
            value="camera" 
            type="checkbox"
            icon="camera">
            Camera
        </x-form-select-item>
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
    
    <div class="form-selectgroup">
        <x-form-select-item 
            name="size" 
            value="small" 
            label="Small Size">
            Small
        </x-form-select-item>
        
        <x-form-select-item 
            name="size" 
            value="medium" 
            label="Medium Size">
            Medium
        </x-form-select-item>
        
        <x-form-select-item 
            name="size" 
            value="large" 
            label="Large Size">
            Large
        </x-form-select-item>
        
        <x-form-select-item 
            name="size" 
            value="xl" 
            label="Extra Large Size">
            XL
        </x-form-select-item>
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
    
    <div class="form-selectgroup">
        <x-form-select-item 
            name="notifications" 
            value="email" 
            type="checkbox"
            icon="envelope">
            Email
        </x-form-select-item>
        
        <x-form-select-item 
            name="notifications" 
            value="sms" 
            type="checkbox"
            icon="comment">
            SMS
        </x-form-select-item>
        
        <x-form-select-item 
            name="notifications" 
            value="push" 
            type="checkbox"
            icon="bell">
            Push
        </x-form-select-item>
        
        <x-form-select-item 
            name="notifications" 
            value="in_app" 
            type="checkbox"
            icon="info-circle">
            In-App
        </x-form-select-item>
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
    
    <div class="form-selectgroup">
        <x-form-select-item 
            name="language" 
            value="en" 
            label="English">
            English
        </x-form-select-item>
        
        <x-form-select-item 
            name="language" 
            value="es" 
            label="Spanish">
            Español
        </x-form-select-item>
        
        <x-form-select-item 
            name="language" 
            value="fr" 
            label="French">
            Français
        </x-form-select-item>
        
        <x-form-select-item 
            name="language" 
            value="de" 
            label="German">
            Deutsch
        </x-form-select-item>
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
public function it_renders_form_select_item_with_basic_attributes()
{
    $view = $this->blade('<x-form-select-item name="test" value="option1">Option 1</x-form-select-item>');
    
    $view->assertSee('name="test"');
    $view->assertSee('value="option1"');
    $view->assertSee('Option 1');
}

/** @test */
public function it_renders_form_select_item_with_label()
{
    $view = $this->blade('<x-form-select-item name="test" value="option1" label="Test Label">Option 1</x-form-select-item>');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Label');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(SelectItemComponent::class)
        ->assertSee('<x-form-select-item')
        ->set('selectedOption', 'option1')
        ->assertSee('option1');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to select item elements
- `aria-describedby`: Links to help text
- `role="option"`: Applied to select item elements

### Keyboard Navigation
- Tab navigation to select item
- Enter key for option selection
- Select item navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Option selection feedback
- Help text communication
- Error message communication

### Select Item Accessibility
- Clear option purpose indication
- Proper validation feedback
- Helpful error messages
- Selection guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via base component)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Radio and checkbox support

## Troubleshooting

### Common Issues

#### Select Item Not Displaying
**Problem:** Select item not showing correctly
**Solution:** Check component configuration and attribute merging

#### Option Selection Issues
**Problem:** Option selection not working
**Solution:** Verify option selection logic and event handling

#### Styling Issues
**Problem:** Select item doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Icon Display Issues
**Problem:** Icon not showing correctly
**Solution:** Check icon component and icon name configuration

#### Show Check Mark Issues
**Problem:** Check mark not displaying
**Solution:** Check show attribute and CSS styling

## Related Components

- **Form Select Group:** Select group container component
- **Form Button Group:** Button group container component
- **Form Button Item:** Individual button item component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with select item functionality
- Base component extension with select support
- Radio and checkbox support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-select-item.blade.php`
2. Update the PHP class: `src/Components/FormSelectItem.php`
3. Add/update tests in `tests/Components/FormSelectItemTest.php`
4. Update this documentation

## See Also

- [Form Select Group Component](../form-select-group.md)
- [Form Button Group Component](../form-button-group.md)
- [Form Button Item Component](../form-button-item.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Form Select Groups](https://getbootstrap.com/docs/5.3/forms/select/)
- [Form Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Select Item Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
