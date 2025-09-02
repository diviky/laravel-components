# Form Icon Component

A specialized icon input component that provides a professional interface for icon selection and display with comprehensive form integration and enhanced user experience. This component extends FormInput to offer intuitive icon input experiences with proper formatting and icon-specific functionality.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-icon.blade.php`
- **Documentation:** `docs/form-icon.md`

## Basic Usage

### Simple Icon Input
```blade
<x-form-icon name="icon" label="Select Icon" />
```

### With Default Value
```blade
<x-form-icon 
    name="default_icon" 
    label="Icon"
    :default="'star'">
</x-form-icon>
```

### With Help Text
```blade
<x-form-icon 
    name="icon_choice" 
    label="Choose Icon"
    help="Select an icon that represents your content">
</x-form-icon>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'icon'` or `'icon_choice'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Select Icon'` |
| value | mixed | null | Current icon value | `'star'` |
| default | mixed | null | Default icon value | `'default_icon'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'icon']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'icon-input'` |
| class | string | '' | CSS classes | `'icon-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Enter icon name...'` |
| maxlength | number | null | Maximum character length | `50` |
| minlength | number | null | Minimum character length | `2` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-icons'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the icon input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Choose an icon that best represents your content or category.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the icon input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-icon name="icon">
    <small class="text-muted">Icons are from Font Awesome</small>
</x-form-icon>
```

## Usage Examples

### Basic Icon Input
```blade
<x-form-icon 
    name="icon" 
    label="Select Icon">
    
    <x-slot:help>
        Choose an icon for your content
    </x-slot:help>
</x-form-icon>
```

### Required Icon Input
```blade
<x-form-icon 
    name="required_icon" 
    label="Required Icon"
    required>
    
    <x-slot:help>
        This field is required to complete your content
    </x-slot:help>
</x-form-icon>
```

### With Custom Placeholder
```blade
<x-form-icon 
    name="icon_name" 
    label="Icon Name"
    placeholder="Enter icon name (e.g., star, heart, check)">
    
    <x-slot:help>
        Enter the name of the icon you want to use
    </x-slot:help>
</x-form-icon>
```

### With Character Limits
```blade
<x-form-icon 
    name="icon_input" 
    label="Icon"
    minlength="2"
    maxlength="30"
    placeholder="Icon name (2-30 characters)">
    
    <x-slot:help>
        Icon name must be between 2 and 30 characters
    </x-slot:help>
</x-form-icon>
```

### Livewire Integration
```blade
<x-form-icon 
    wire:model.live="selectedIcon"
    name="live_icon" 
    label="Live Icon Selection"
    placeholder="Type to search icons...">
    
    <x-slot:help>
        <div class="icon-preview">
            <strong>Selected Icon:</strong><br>
            <i class="fas fa-{{ $wire.selectedIcon ?: 'question' }}"></i>
            <span x-text="$wire.selectedIcon ?: 'None selected'">None selected</span>
        </div>
    </x-slot:help>
</x-form-icon>
```

### With Custom Classes
```blade
<x-form-icon 
    name="custom_icon" 
    label="Custom Icon"
    class="icon-input-lg"
    placeholder="Enter your custom icon name">
    
    <x-slot:help>
        <div class="icon-tips">
            <i class="fas fa-lightbulb"></i>
            <strong>Tip:</strong> Use descriptive icon names
        </div>
    </x-slot:help>
</x-form-icon>
```

### Disabled Icon Field
```blade
<x-form-icon 
    name="locked_icon" 
    label="Icon"
    disabled>
    
    <x-slot:help>
        This icon field is locked and cannot be changed
    </x-slot:help>
</x-form-icon>
```

### Readonly Icon Field
```blade
<x-form-icon 
    name="display_icon" 
    label="Current Icon"
    readonly>
    
    <x-slot:help>
        Your current icon selection (cannot be edited)
    </x-slot:help>
</x-form-icon>
```

## Component Variants

### Standard Icon Input
**Usage:** `<x-form-icon>` (default)
**Description:** Basic icon input with standard functionality
**Features:**
- Text input type for icon names
- Standard icon input validation
- Help and default slot support
- FormInput extension

### Livewire Icon Input
**Usage:** `<x-form-icon wire:model.live="icon">`
**Description:** Icon input with real-time updates
**Features:**
- Livewire real-time icon selection
- Dynamic icon preview
- Enhanced user experience
- Performance optimization

### Icon Preview Input
**Usage:** `<x-form-icon><x-slot:help><i class="fas fa-{{ icon }}"></i></x-slot:help></x-form-icon>`
**Description:** Icon input with visual preview
**Features:**
- Icon preview in help text
- Visual icon representation
- Enhanced user experience
- Professional appearance

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-icon>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-icon' => [
        'view' => 'laravel-components::{framework}.form-icon',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'text'`
- **Validation:** Standard text validation
- **Icon Support:** Text-based icon names
- **Form Integration:** Full form integration support

### Icon Library Support
```blade
<!-- Font Awesome icons -->
<x-form-icon name="icon" placeholder="Enter Font Awesome icon name" />

<!-- Bootstrap icons -->
<x-form-icon name="icon" placeholder="Enter Bootstrap icon name" />

<!-- Custom icon library -->
<x-form-icon name="icon" placeholder="Enter custom icon identifier" />
```

## Common Patterns

### Icon Selection Interface
```blade
<div class="icon-selection-interface">
    <h4>Icon Selection</h4>
    <p>Choose an icon for your content:</p>
    
    <x-form-icon 
        name="selected_icon" 
        label="Icon Name"
        placeholder="Type icon name or browse below"
        required>
        
        <x-slot:help>
            <div class="icon-guidelines">
                <strong>Icon Guidelines:</strong><br>
                • Use descriptive names: "user", "settings", "home"<br>
                • Avoid generic terms: "icon", "symbol", "image"<br>
                • Consider context: "edit" for edit buttons, "delete" for delete actions<br>
                • Maintain consistency across your application
            </div>
        </x-slot:help>
    </x-form-icon>
    
    <div class="icon-browser mt-3">
        <h6>Popular Icons</h6>
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="setIcon('user')">
                    <i class="fas fa-user"></i> User
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="setIcon('home')">
                    <i class="fas fa-home"></i> Home
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="setIcon('cog')">
                    <i class="fas fa-cog"></i> Settings
                </button>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="setIcon('star')">
                    <i class="fas fa-star"></i> Star
                </button>
            </div>
        </div>
    </div>
</div>
```

### Category Icon Management
```blade
<div class="category-icon-management">
    <h4>Category Icon Management</h4>
    <p>Set icons for your content categories:</p>
    
    <x-form-icon 
        name="category_icon" 
        label="Category Icon"
        placeholder="Enter icon name for this category"
        required>
        
        <x-slot:help>
            <div class="category-icon-preview">
                <strong>Current Icon:</strong><br>
                <i class="fas fa-{{ $wire.categoryIcon ?: 'question' }}"></i>
                <span x-text="$wire.categoryIcon ?: 'None selected'">None selected</span>
            </div>
        </x-slot:help>
    </x-form-icon>
    
    <div class="category-icon-suggestions mt-3">
        <h6>Suggested Icons by Category Type</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Content:</strong>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('file-alt')">
                    <i class="fas fa-file-alt"></i> file-alt
                </button>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('image')">
                    <i class="fas fa-image"></i> image
                </button>
            </div>
            <div class="col-md-4">
                <strong>Actions:</strong>
                <button type="button" class="btn btn-sm btn-outline-success" onclick="setIcon('plus')">
                    <i class="fas fa-plus"></i> plus
                </button>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('edit')">
                    <i class="fas fa-edit"></i> edit
                </button>
            </div>
            <div class="col-md-4">
                <strong>Status:</strong>
                <button type="button" class="btn btn-sm btn-outline-info" onclick="setIcon('check')">
                    <i class="fas fa-check"></i> check
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="setIcon('times')">
                    <i class="fas fa-times"></i> times
                </button>
            </div>
        </div>
    </div>
</div>
```

### User Profile Icon Selection
```blade
<div class="user-profile-icon-selection">
    <h4>Profile Icon Selection</h4>
    <p>Choose an icon for your user profile:</p>
    
    <x-form-icon 
        name="profile_icon" 
        label="Profile Icon"
        placeholder="Enter your preferred icon name"
        required>
        
        <x-slot:help>
            <div class="profile-icon-help">
                <strong>Profile Icon Tips:</strong><br>
                • Choose an icon that represents your personality or profession<br>
                • Consider your industry: "code" for developers, "paint-brush" for artists<br>
                • Use consistent style: stick to one icon library<br>
                • Avoid overly complex or detailed icons
            </div>
        </x-slot:help>
    </x-form-icon>
    
    <div class="profile-icon-categories mt-3">
        <h6>Icon Categories</h6>
        <div class="row">
            <div class="col-md-3">
                <strong>Professions:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('code')">
                    <i class="fas fa-code"></i> Developer
                </button>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('paint-brush')">
                    <i class="fas fa-paint-brush"></i> Artist
                </button>
            </div>
            <div class="col-md-3">
                <strong>Interests:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-success" onclick="setIcon('music')">
                    <i class="fas fa-music"></i> Music
                </button>
                <button type="button" class="btn btn-sm btn-outline-success" onclick="setIcon('gamepad')">
                    <i class="fas fa-gamepad"></i> Gaming
                </button>
            </div>
            <div class="col-md-3">
                <strong>Personality:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('heart')">
                    <i class="fas fa-heart"></i> Caring
                </button>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('lightbulb')">
                    <i class="fas fa-lightbulb"></i> Creative
                </button>
            </div>
            <div class="col-md-3">
                <strong>Animals:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-info" onclick="setIcon('cat')">
                    <i class="fas fa-cat"></i> Cat
                </button>
                <button type="button" class="btn btn-sm btn-outline-info" onclick="setIcon('dog')">
                    <i class="fas fa-dog"></i> Dog
                </button>
            </div>
        </div>
    </div>
</div>
```

### Application Settings Icons
```blade
<div class="application-settings-icons">
    <h4>Application Settings Icons</h4>
    <p>Configure icons for your application settings:</p>
    
    <x-form-icon 
        name="settings_icon" 
        label="Settings Icon"
        placeholder="Enter icon name for settings section"
        required>
        
        <x-slot:help>
            <div class="settings-icon-preview">
                <strong>Current Settings Icon:</strong><br>
                <i class="fas fa-{{ $wire.settingsIcon ?: 'cog' }}"></i>
                <span x-text="$wire.settingsIcon ?: 'cog (default)'">cog (default)</span>
            </div>
        </x-slot:help>
    </x-form-icon>
    
    <div class="settings-icon-options mt-3">
        <h6>Common Settings Icons</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>General Settings:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="setIcon('cog')">
                    <i class="fas fa-cog"></i> cog
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="setIcon('sliders-h')">
                    <i class="fas fa-sliders-h"></i> sliders-h
                </button>
            </div>
            <div class="col-md-4">
                <strong>User Settings:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('user-cog')">
                    <i class="fas fa-user-cog"></i> user-cog
                </button>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('user-edit')">
                    <i class="fas fa-user-edit"></i> user-edit
                </button>
            </div>
            <div class="col-md-4">
                <strong>System Settings:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('server')">
                    <i class="fas fa-server"></i> server
                </button>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('database')">
                    <i class="fas fa-database"></i> database
                </button>
            </div>
        </div>
    </div>
</div>
```

### Navigation Menu Icons
```blade
<div class="navigation-menu-icons">
    <h4>Navigation Menu Icons</h4>
    <p>Set icons for your navigation menu items:</p>
    
    <x-form-icon 
        name="menu_icon" 
        label="Menu Icon"
        placeholder="Enter icon name for this menu item"
        required>
        
        <x-slot:help>
            <div class="menu-icon-help">
                <strong>Menu Icon Guidelines:</strong><br>
                • Use intuitive icons that users will recognize<br>
                • Keep icons simple and clear<br>
                • Maintain consistent style across your menu<br>
                • Consider cultural differences in icon meanings
            </div>
        </x-slot:help>
    </x-form-icon>
    
    <div class="menu-icon-examples mt-3">
        <h6>Common Menu Icons</h6>
        <div class="row">
            <div class="col-md-3">
                <strong>Main Navigation:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('home')">
                    <i class="fas fa-home"></i> Home
                </button>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="setIcon('user')">
                    <i class="fas fa-user"></i> Profile
                </button>
            </div>
            <div class="col-md-3">
                <strong>Content:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-success" onclick="setIcon('file-alt')">
                    <i class="fas fa-file-alt"></i> Documents
                </button>
                <button type="button" class="btn btn-sm btn-outline-success" onclick="setIcon('images')">
                    <i class="fas fa-images"></i> Gallery
                </button>
            </div>
            <div class="col-md-3">
                <strong>Actions:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('plus')">
                    <i class="fas fa-plus"></i> Create
                </button>
                <button type="button" class="btn btn-sm btn-outline-warning" onclick="setIcon('search')">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
            <div class="col-md-3">
                <strong>Communication:</strong><br>
                <button type="button" class="btn btn-sm btn-outline-info" onclick="setIcon('envelope')">
                    <i class="fas fa-envelope"></i> Messages
                </button>
                <button type="button" class="btn btn-sm btn-outline-info" onclick="setIcon('bell')">
                    <i class="fas fa-bell"></i> Notifications
                </button>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_icon_with_basic_attributes()
{
    $view = $this->blade('<x-form-icon name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-icon');
}

/** @test */
public function it_renders_form_icon_with_label()
{
    $view = $this->blade('<x-form-icon name="icon" label="Select Icon" />');
    
    $view->assertSee('name="icon"');
    $view->assertSee('Select Icon');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(IconComponent::class)
        ->assertSee('<x-form-icon')
        ->set('icon', 'star')
        ->assertSee('star');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to icon input
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to icon input
- Text key input for icon names
- Enter key for form submission
- Icon selection button navigation

### Screen Reader Support
- Proper labeling and descriptions
- Icon functionality announcements
- Help text communication
- Error message communication

### Icon Accessibility
- Clear icon purpose indication
- Proper validation feedback
- Helpful error messages
- Icon guidance

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 text input type for icon names

## Troubleshooting

### Common Issues

#### Icon Not Displaying
**Problem:** Icon not showing correctly
**Solution:** Check icon library availability and CSS loading

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Icon Validation Issues
**Problem:** Icon validation not working
**Solution:** Verify icon validation rules and error handling

#### Styling Issues
**Problem:** Icon input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Icon Library Issues
**Problem:** Icon library not loading
**Solution:** Check icon library CSS and JavaScript inclusion

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Text:** Text input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with icon input functionality
- FormInput extension with icon support
- Help and default slot support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-icon.blade.php`
2. Add/update tests in `tests/Components/FormIconTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Text Component](../form-text.md)
- [Font Awesome Icons](https://fontawesome.com/icons)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
