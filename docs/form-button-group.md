# Form Button Group Component

A sophisticated button group component that provides comprehensive form button grouping capabilities with enhanced user experience and flexible configuration options. This component extends FormSelectGroup to offer intuitive button group functionality with checkbox and radio button support, inline and vertical layouts, and professional form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormSelectGroup component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormSelectGroup)

## Files

- **PHP Class:** `src/Components/FormButtonGroup.php`
- **View File:** `resources/views/bootstrap-5/form-button-group.blade.php`
- **Tests:** `tests/Components/FormButtonGroupTest.php` (to be created)
- **Documentation:** `docs/form-button-group.md`

## Basic Usage

### Simple Button Group
```blade
<x-form-button-group name="options" label="Select Options">
    <x-form-button-item name="options" value="option1">Option 1</x-form-button-item>
    <x-form-button-item name="options" value="option2">Option 2</x-form-button-item>
    <x-form-button-item name="options" value="option3">Option 3</x-form-button-item>
</x-form-button-group>
```

### With Options Array
```blade
<x-form-button-group 
    name="preferences" 
    label="User Preferences"
    :options="['light' => 'Light Theme', 'dark' => 'Dark Theme', 'auto' => 'Auto']">
</x-form-button-group>
```

### With Default Values
```blade
<x-form-button-group 
    name="categories" 
    label="Product Categories"
    :options="['electronics', 'clothing', 'books', 'home']"
    :default="['electronics', 'clothing']">
</x-form-button-group>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'preferences'` or `'categories'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Form field label | `'Select Options'` |
| options | array | [] | Array of options | `['option1', 'option2']` |
| type | string | 'checkbox' | Input type (checkbox/radio) | `'radio'` |
| inline | boolean | false | Display buttons inline | `true` |
| vertical | boolean | false | Display buttons vertically | `true` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'button-group']` |

### Inherited Attributes

This component extends `FormSelectGroup` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'button-group-input'` |
| class | string | '' | CSS classes | `'custom-button-group'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Select options...'` |
| multiple | boolean | false | Allow multiple selections | `true` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-options'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Component Variants

### Checkbox Button Group
**Usage:** `<x-form-button-group type="checkbox">` (default)
**Description:** Multiple selection button group with checkbox behavior
**Features:**
- Multiple option selection
- Checkbox input type
- Professional button styling
- Enhanced user experience

### Radio Button Group
**Usage:** `<x-form-button-group type="radio">`
**Description:** Single selection button group with radio button behavior
**Features:**
- Single option selection
- Radio input type
- Professional button styling
- Enhanced user experience

### Inline Button Group
**Usage:** `<x-form-button-group :inline="true">`
**Description:** Horizontal button group layout
**Features:**
- Horizontal button arrangement
- Space-efficient layout
- Professional appearance
- Responsive design

### Vertical Button Group
**Usage:** `<x-form-button-group :vertical="true">`
**Description:** Vertical button group layout
**Features:**
- Vertical button arrangement
- Stacked layout
- Professional appearance
- Mobile-friendly design

## Slots

### Optional Slots

#### `before`
- **Purpose:** Content before the button group
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:before>
    <div class="button-group-header">
        <strong>Choose your options:</strong>
    </div>
</x-slot:before>
```

#### `after`
- **Purpose:** Content after the button group
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:after>
    <div class="button-group-footer">
        <small class="text-muted">You can select multiple options</small>
    </div>
</x-slot:after>
```

#### `help`
- **Purpose:** Help text below the button group
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    <div class="button-group-help">
        <strong>Selection Guidelines:</strong><br>
        • Choose options that best fit your needs<br>
        • You can select multiple options<br>
        • Changes are saved automatically
    </div>
</x-slot:help>
```

#### Default Slot
- **Purpose:** Fallback content when no options are provided
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-button-group name="custom_options">
    <x-form-button-item name="custom_options" value="custom1">Custom Option 1</x-form-button-item>
    <x-form-button-item name="custom_options" value="custom2">Custom Option 2</x-form-button-item>
</x-form-button-group>
```

## Usage Examples

### Basic Checkbox Button Group
```blade
<x-form-button-group 
    name="interests" 
    label="Interests"
    :options="['sports', 'music', 'reading', 'travel']">
    
    <x-slot:help>
        Select all activities that interest you
    </x-slot:help>
</x-form-button-group>
```

### Radio Button Group
```blade
<x-form-button-group 
    name="theme" 
    label="Theme Selection"
    type="radio"
    :options="['light' => 'Light Theme', 'dark' => 'Dark Theme', 'auto' => 'Auto']">
    
    <x-slot:help>
        Choose your preferred theme
    </x-slot:help>
</x-form-button-group>
```

### Inline Button Group
```blade
<x-form-button-group 
    name="size" 
    label="Size Selection"
    type="radio"
    :inline="true"
    :options="['small', 'medium', 'large']">
    
    <x-slot:help>
        Select your preferred size
    </x-slot:help>
</x-form-button-group>
```

### Vertical Button Group
```blade
<x-form-button-group 
    name="category" 
    label="Product Category"
    type="radio"
    :vertical="true"
    :options="['electronics', 'clothing', 'books', 'home']">
    
    <x-slot:help>
        Choose your product category
    </x-slot:help>
</x-form-button-group>
```

### With Default Values
```blade
<x-form-button-group 
    name="features" 
    label="Product Features"
    :options="['wifi', 'bluetooth', 'gps', 'camera']"
    :default="['wifi', 'bluetooth']">
    
    <x-slot:help>
        Select the features you want
    </x-slot:help>
</x-form-button-group>
```

### With Custom Classes
```blade
<x-form-button-group 
    name="custom_options" 
    label="Custom Options"
    class="custom-button-group-lg">
    
    <x-slot:help>
        <div class="custom-help">
            <strong>Custom Styling:</strong><br>
            This button group has custom CSS classes applied
        </div>
    </x-slot:help>
</x-form-button-group>
```

### With Custom ID
```blade
<x-form-button-group 
    name="custom_id_options" 
    label="Custom ID Options"
    id="custom-button-group-selector">
    
    <x-slot:help>
        This button group has a custom ID attribute
    </x-slot:help>
</x-form-button-group>
```

### With Placeholder
```blade
<x-form-button-group 
    name="placeholder_options" 
    label="Options with Placeholder"
    placeholder="Select your preferred options">
    
    <x-slot:help>
        Use the placeholder text as a guide for selection
    </x-slot:help>
</x-form-button-group>
```

### With Extra Attributes
```blade
<x-form-button-group 
    name="extra_attrs_options" 
    label="Extra Attributes Options"
    data-test="button-group-selector"
    data-selection-type="multiple">
    
    <x-slot:help>
        This button group has additional data attributes
    </x-slot:help>
</x-form-button-group>
```

### Disabled Button Group
```blade
<x-form-button-group 
    name="disabled_options" 
    label="Disabled Options"
    disabled>
    
    <x-slot:help>
        This button group is currently disabled
    </x-slot:help>
</x-form-button-group>
```

### Readonly Button Group
```blade
<x-form-button-group 
    name="readonly_options" 
    label="Readonly Options"
    readonly>
    
    <x-slot:help>
        This button group is currently readonly
    </x-slot:help>
</x-form-button-group>
```

### Required Button Group
```blade
<x-form-button-group 
    name="required_options" 
    label="Required Options"
    required>
    
    <x-slot:help>
        This selection is required to complete your profile
    </x-slot:help>
</x-form-button-group>
```

### Livewire Integration
```blade
<x-form-button-group 
    wire:model.live="selectedOptions"
    name="livewire_options" 
    label="Livewire Options"
    multiple>
    
    <x-slot:help>
        <div class="livewire-status">
            <strong>Selected Options:</strong> 
            <span x-text="$wire.selectedOptions ? $wire.selectedOptions.length + ' options selected' : 'No options selected'">
                {{ $selectedOptions ? count($selectedOptions) . ' options selected' : 'No options selected' }}
            </span>
            <div class="selected-options-preview mt-2" x-show="$wire.selectedOptions && $wire.selectedOptions.length > 0">
                <div class="option-badges">
                    <template x-for="option in $wire.selectedOptions" :key="option">
                        <span class="badge bg-primary" x-text="option"></span>
                    </template>
                </div>
            </div>
        </div>
    </x-slot:help>
</x-form-button-group>
```

### With Model Binding
```blade
<x-form-button-group 
    name="user_options" 
    label="User Options"
    :bind="$user">
    
    <x-slot:help>
        This selection will be bound to the user model
    </x-slot:help>
</x-form-button-group>
```

## Common Patterns

### User Preference Selection
```blade
<div class="user-preference-selection">
    <h4>User Preferences</h4>
    <p>Select your preferences for the application:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-button-group 
                name="theme_preference" 
                label="Theme Preference"
                type="radio"
                :options="['light' => 'Light Theme', 'dark' => 'Dark Theme', 'auto' => 'Auto']"
                :default="'light'">
                
                <x-slot:help>
                    <div class="theme-preference-help">
                        <strong>Theme Guidelines:</strong><br>
                        • Light: Clean and bright interface<br>
                        • Dark: Easy on the eyes<br>
                        • Auto: Follows system preference
                    </div>
                </x-slot:help>
            </x-form-button-group>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-button-group 
                name="notification_preferences" 
                label="Notification Preferences"
                :options="['email', 'sms', 'push', 'in_app']"
                :default="['email', 'push']">
                
                <x-slot:help>
                    <div class="notification-help">
                        <strong>Notification Guidelines:</strong><br>
                        • Email: Important updates<br>
                        • SMS: Urgent notifications<br>
                        • Push: Real-time alerts<br>
                        • In-app: App notifications
                    </div>
                </x-slot:help>
            </x-form-button-group>
        </div>
    </div>
    
    <div class="preference-tips mt-3">
        <h6>Preference Tips</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Theme Selection:</strong><br>
                • Consider your environment<br>
                • Think about eye strain<br>
                • Match your device settings<br>
                • Consider accessibility
            </div>
            <div class="col-md-4">
                <strong>Notifications:</strong><br>
                • Choose based on urgency<br>
                • Consider your workflow<br>
                • Balance information and distraction<br>
                • Review periodically
            </div>
            <div class="col-md-4">
                <strong>Personalization:</strong><br>
                • Make it your own<br>
                • Consider your habits<br>
                • Think about productivity<br>
                • Adjust as needed
            </div>
        </div>
    </div>
</div>
```

### Product Feature Selection
```blade
<div class="product-feature-selection">
    <h4>Product Features</h4>
    <p>Select the features you want in your product:</p>
    
    <x-form-button-group 
        name="product_features" 
        label="Product Features"
        :options="['wifi', 'bluetooth', 'gps', 'camera', 'waterproof', 'shockproof']"
        :default="['wifi', 'bluetooth']">
        
        <x-slot:help>
            <div class="product-features-help">
                <strong>Feature Guidelines:</strong><br>
                • WiFi: Wireless internet connectivity<br>
                • Bluetooth: Wireless device pairing<br>
                • GPS: Location services<br>
                • Camera: Photo and video capture<br>
                • Waterproof: Water resistance<br>
                • Shockproof: Impact resistance
            </div>
        </x-slot:help>
    </x-form-button-group>
    
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

### Survey Question Response
```blade
<div class="survey-question-response">
    <h4>Survey Question</h4>
    <p>How satisfied are you with our service?</p>
    
    <x-form-button-group 
        name="satisfaction_level" 
        label="Satisfaction Level"
        type="radio"
        :options="[
            'very_satisfied' => 'Very Satisfied',
            'satisfied' => 'Satisfied',
            'neutral' => 'Neutral',
            'dissatisfied' => 'Dissatisfied',
            'very_dissatisfied' => 'Very Dissatisfied'
        ]">
        
        <x-slot:help>
            <div class="satisfaction-help">
                <strong>Rating Guidelines:</strong><br>
                • Very Satisfied: Exceeded expectations<br>
                • Satisfied: Met expectations<br>
                • Neutral: Neither satisfied nor dissatisfied<br>
                • Dissatisfied: Below expectations<br>
                • Very Dissatisfied: Significantly below expectations
            </div>
        </x-slot:help>
    </x-form-button-group>
    
    <div class="survey-tips mt-3">
        <h6>Survey Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Honest Feedback:</strong><br>
                • Provide accurate responses<br>
                • Consider your experience<br>
                • Think about improvements<br>
                • Help us serve you better
            </div>
            <div class="col-md-6">
                <strong>Response Quality:</strong><br>
                • Take time to consider<br>
                • Be specific if possible<br>
                • Consider recent interactions<br>
                • Think about overall experience
            </div>
        </div>
    </div>
</div>
```

### Settings Configuration
```blade
<div class="settings-configuration">
    <h4>Application Settings</h4>
    <p>Configure your application preferences:</p>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <x-form-button-group 
                name="privacy_settings" 
                label="Privacy Settings"
                type="radio"
                :options="['public' => 'Public', 'friends' => 'Friends Only', 'private' => 'Private']"
                :default="'friends'">
                
                <x-slot:help>
                    <div class="privacy-help">
                        <strong>Privacy Guidelines:</strong><br>
                        • Public: Visible to everyone<br>
                        • Friends Only: Visible to friends<br>
                        • Private: Visible only to you
                    </div>
                </x-slot:help>
            </x-form-button-group>
        </div>
        
        <div class="col-md-4 mb-3">
            <x-form-button-group 
                name="language_settings" 
                label="Language Settings"
                type="radio"
                :options="['en' => 'English', 'es' => 'Spanish', 'fr' => 'French', 'de' => 'German']"
                :default="'en'">
                
                <x-slot:help>
                    <div class="language-help">
                        <strong>Language Guidelines:</strong><br>
                        • English: Default language<br>
                        • Spanish: Español<br>
                        • French: Français<br>
                        • German: Deutsch
                    </div>
                </x-slot:help>
            </x-form-button-group>
        </div>
        
        <div class="col-md-4 mb-3">
            <x-form-button-group 
                name="accessibility_settings" 
                label="Accessibility Settings"
                :options="['high_contrast', 'large_text', 'screen_reader', 'keyboard_nav']"
                :default="['large_text']">
                
                <x-slot:help>
                    <div class="accessibility-help">
                        <strong>Accessibility Guidelines:</strong><br>
                        • High Contrast: Better visibility<br>
                        • Large Text: Easier reading<br>
                        • Screen Reader: Audio support<br>
                        • Keyboard Nav: Keyboard navigation
                    </div>
                </x-slot:help>
            </x-form-button-group>
        </div>
    </div>
</div>
```

### Filter Selection Interface
```blade
<div class="filter-selection-interface">
    <h4>Filter Options</h4>
    <p>Select filters to narrow down your results:</p>
    
    <x-form-button-group 
        name="category_filters" 
        label="Category Filters"
        :options="['electronics', 'clothing', 'books', 'home', 'sports', 'beauty']"
        :default="['electronics', 'clothing']">
        
        <x-slot:help>
            <div class="filter-help">
                <strong>Filter Guidelines:</strong><br>
                • Select categories to include<br>
                • Multiple selections allowed<br>
                • Results will be filtered accordingly<br>
                • Clear selections to see all results
            </div>
        </x-slot:help>
    </x-form-button-group>
    
    <div class="filter-tips mt-3">
        <h6>Filter Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Effective Filtering:</strong><br>
                • Start with broad categories<br>
                • Add specific filters gradually<br>
                • Use multiple filters together<br>
                • Clear filters to reset
            </div>
            <div class="col-md-6">
                <strong>Filter Management:</strong><br>
                • Save common filter combinations<br>
                • Use filter presets<br>
                • Share filter configurations<br>
                • Export filter settings
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_button_group_with_basic_attributes()
{
    $view = $this->blade('<x-form-button-group name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('btn-group');
}

/** @test */
public function it_renders_form_button_group_with_label()
{
    $view = $this->blade('<x-form-button-group name="options" label="Select Options" />');
    
    $view->assertSee('name="options"');
    $view->assertSee('Select Options');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ButtonGroupComponent::class)
        ->assertSee('<x-form-button-group')
        ->set('selectedOptions', ['option1', 'option2'])
        ->assertSee('option1');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to button group elements
- `aria-describedby`: Links to help text
- `role="group"`: Applied to button group container

### Keyboard Navigation
- Tab navigation to button group
- Enter key for option selection
- Arrow key navigation between options
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Option selection feedback
- Help text communication
- Error message communication

### Button Group Accessibility
- Clear option purpose indication
- Proper validation feedback
- Helpful error messages
- Selection guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormSelectGroup)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Checkbox and radio button support

## Troubleshooting

### Common Issues

#### Button Group Not Displaying
**Problem:** Button group not showing correctly
**Solution:** Check FormSelectGroup component and button group configuration

#### FormSelectGroup Integration Problems
**Problem:** FormSelectGroup extension not working
**Solution:** Check FormSelectGroup component and attribute merging

#### Button Selection Issues
**Problem:** Button selection not working
**Solution:** Verify button selection logic and event handling

#### Styling Issues
**Problem:** Button group doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Multiple Selection Issues
**Problem:** Multiple selection not working
**Solution:** Check multiple attribute and FormSelectGroup configuration

## Related Components

- **Form Select Group:** Base select group component
- **Form Button Item:** Individual button item component
- **Form Button:** Basic button component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with button group functionality
- FormSelectGroup extension with button support
- Checkbox and radio button support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-button-group.blade.php`
2. Update the PHP class: `src/Components/FormButtonGroup.php`
3. Add/update tests in `tests/Components/FormButtonGroupTest.php`
4. Update this documentation

## See Also

- [Form Select Group Component](../form-select-group.md)
- [Form Button Item Component](../form-button-item.md)
- [Form Button Component](../form-button.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Button Groups](https://getbootstrap.com/docs/5.3/components/button-group/)
- [Form Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Button Group Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
