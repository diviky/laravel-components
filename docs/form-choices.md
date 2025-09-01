# Form Choices Component

An advanced, feature-rich select component with search, multi-selection, option groups, custom rendering, and AJAX integration capabilities. Built with Alpine.js for enhanced interactivity and Livewire compatibility.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, extends FormSelect from laravel-form-components

## Files

- **PHP Class:** `src/Components/FormChoices.php`
- **View File:** `resources/views/bootstrap-5/form-choices.blade.php`
- **Documentation:** `docs/form-choices.md`

## Basic Usage

### Simple Single Selection
```blade
<x-form-choices name="country" label="Select Country">
    <x-slot:options>
        ['us' => 'United States', 'ca' => 'Canada', 'uk' => 'United Kingdom']
    </x-slot:options>
</x-form-choices>
```

### Multi-Selection with Search
```blade
<x-form-choices name="skills[]" label="Select Skills" multiple>
    <x-slot:options>
        ['php' => 'PHP', 'js' => 'JavaScript', 'python' => 'Python']
    </x-slot:options>
</x-form-choices>
```

### With Custom Data Binding
```blade
<x-form-choices 
    name="user_id" 
    label="Select User"
    :options="$users"
    value-field="id"
    label-field="name">
</x-form-choices>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'country'` or `'skills[]'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Form field label | `'Select Country'` |
| options | array\|Collection | [] | Available options | `['us' => 'United States']` |
| bind | mixed | null | Model binding | `$user` |
| bindKey | string | '' | Model binding key | `'id'` |
| default | mixed | null | Default selected value | `'us'` |
| multiple | boolean | false | Enable multi-selection | `true` |
| showErrors | boolean | true | Display validation errors | `false` |
| floating | boolean | false | Use floating label style | `true` |
| inline | boolean | false | Inline display mode | `true` |
| placeholder | string | '' | Placeholder text | `'Choose an option'` |
| size | string | '' | Input size variant | `'sm'`, `'lg'` |

### Advanced Configuration Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| valueField | string | null | Custom value field name | `'id'` |
| labelField | string | null | Custom label field name | `'name'` |
| imageField | string | null | Field for avatar images | `'avatar'` |
| disabledField | string | null | Field for disabled state | `'disabled'` |
| childrenField | string | null | Field for option groups | `'children'` |
| searchable | boolean | true | Enable search functionality | `false` |
| compact | boolean | false | Compact display mode | `true` |
| compactText | string | 'selected' | Text for compact mode | `'items'` |
| minChars | int | 2 | Minimum characters for search | `3` |
| height | string | 'max-h-64' | Options list height | `'max-h-96'` |
| allowAllText | string | 'Select all' | Text for select all option | `'Select All'` |
| removeAllText | string | 'Remove all' | Text for remove all option | `'Clear All'` |
| noResultText | string | 'No results found.' | Text when no results | `'No matches'` |
| debounce | string | '100ms' | Search debounce delay | `'300ms'` |
| searchFunction | string | null | Livewire search method | `'searchUsers'` |

### Inherited Attributes

This component inherits from `FormSelect` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'country-select'` |
| class | string | null | Additional CSS classes | `'custom-select'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-countries'` |
| role | string\|array | null | Required user role(s) | `'admin'` or `['admin', 'user']` |
| action | string | null | Action type for authorization | `'read'` |

## Slots

### Required Slots

#### `options`
- **Purpose:** Available options for selection
- **Required:** Yes (unless passed as attribute)
- **Content Type:** Array/Collection
- **Example:**
```blade
<x-slot:options>
    ['us' => 'United States', 'ca' => 'Canada']
</x-slot:options>
```

### Optional Slots

#### `item`
- **Purpose:** Custom rendering for each option
- **Required:** No
- **Content Type:** Closure/Component
- **Example:**
```blade
<x-slot:item>
    @props(['option'])
    <div class="custom-option">
        <x-avatar :image="$option->avatar" size="sm" />
        <span>{{ $option->name }}</span>
    </div>
</x-slot:item>
```

#### `selection`
- **Purpose:** Custom rendering for selected options
- **Required:** No
- **Content Type:** Closure/Component
- **Example:**
```blade
<x-slot:selection>
    @props(['option'])
    <span class="selected-option">{{ $option->name }}</span>
</x-slot:selection>
```

#### `prepend`
- **Purpose:** Content before the input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:prepend>
    <x-icon name="globe" />
</x-slot:prepend>
```

#### `append`
- **Purpose:** Content after the input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:append>
    <x-icon name="chevron-down" />
</x-slot:append>
```

#### `before`
- **Purpose:** Content before the input group
- **Required:** No
- **Content Type:** HTML/Text/Components

#### `after`
- **Purpose:** Content after the input group
- **Required:** No
- **Content Type:** HTML/Text/Components

#### `help`
- **Purpose:** Help text below the input
- **Required:** No
- **Content Type:** HTML/Text/Components

#### `icon`
- **Purpose:** Icon inside the input
- **Required:** No
- **Content Type:** Icon component

## Usage Examples

### Basic Single Selection
```blade
<x-form-choices 
    name="country" 
    label="Select Country"
    placeholder="Choose your country">
    
    <x-slot:options>
        [
            'us' => 'United States',
            'ca' => 'Canada',
            'uk' => 'United Kingdom',
            'au' => 'Australia'
        ]
    </x-slot:options>
</x-form-choices>
```

### Multi-Selection with Search
```blade
<x-form-choices 
    name="skills[]" 
    label="Select Skills"
    multiple
    placeholder="Choose your skills"
    :options="$skills">
</x-form-choices>
```

### With Model Binding
```blade
<x-form-choices 
    name="user_id" 
    label="Select User"
    :bind="$users"
    value-field="id"
    label-field="name"
    placeholder="Choose a user">
</x-form-choices>
```

### With Option Groups
```blade
<x-form-choices 
    name="category" 
    label="Select Category"
    :options="$categories"
    children-field="subcategories">
</x-form-choices>
```

### With Custom Rendering
```blade
<x-form-choices 
    name="users[]" 
    label="Select Users"
    multiple
    :options="$users"
    value-field="id"
    label-field="name"
    image-field="avatar">
    
    <x-slot:item>
        @props(['option'])
        <div class="d-flex align-items-center">
            <x-avatar :image="$option->avatar" size="sm" class="me-2" />
            <div>
                <div class="fw-bold">{{ $option->name }}</div>
                <small class="text-muted">{{ $option->email }}</small>
            </div>
        </div>
    </x-slot:item>
</x-form-choices>
```

### With AJAX Search
```blade
<x-form-choices 
    name="search_user" 
    label="Search Users"
    :options="[]"
    searchable
    search-function="searchUsers"
    debounce="300ms"
    data-fetch="/api/users/search"
    data-method="POST"
    :form-data="['type' => 'active']">
</x-form-choices>
```

### Compact Mode
```blade
<x-form-choices 
    name="tags[]" 
    label="Select Tags"
    multiple
    compact
    compact-text="tags selected"
    :options="$tags">
</x-form-choices>
```

### With Custom Styling
```blade
<x-form-choices 
    name="theme" 
    label="Select Theme"
    class="custom-choices"
    size="lg"
    floating
    :options="$themes">
    
    <x-slot:prepend>
        <x-icon name="palette" />
    </x-slot:prepend>
    
    <x-slot:help>
        Choose a theme for your dashboard
    </x-slot:help>
</x-form-choices>
```

### Livewire Integration
```blade
<x-form-choices 
    wire:model="selectedUsers"
    name="users[]" 
    label="Select Users"
    multiple
    :options="$availableUsers"
    value-field="id"
    label-field="name">
    
    <x-slot:help>
        {{ count($selectedUsers) }} users selected
    </x-slot:help>
</x-form-choices>
```

### Framework-Specific Styling

#### Bootstrap Classes
```blade
<x-form-choices 
    name="option"
    class="form-select-lg"
    :options="$options">
</x-form-choices>
```

#### Custom Styling
```blade
<x-form-choices 
    name="option"
    class="custom-choices-theme"
    style="--choice-border-color: #007bff;"
    :options="$options">
</x-form-choices>
```

## Component Variants

### Single Selection
**Usage:** `<x-form-choices>` (default)
**Description:** Standard single-choice select
**Features:**
- Single value selection
- Search functionality
- Custom rendering support

### Multi-Selection
**Usage:** `<x-form-choices multiple>`
**Description:** Multi-choice select with tags
**Features:**
- Multiple value selection
- Tag-based display
- Select all/remove all options
- Individual tag removal

### Searchable
**Usage:** `<x-form-choices searchable>`
**Description:** Enhanced search capabilities
**Features:**
- Real-time search
- Minimum character requirements
- Custom search functions
- AJAX integration

### Compact Mode
**Usage:** `<x-form-choices compact>`
**Description:** Space-efficient display
**Features:**
- Collapsed tag display
- Count indicator
- Space optimization

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-choices>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-choices' => [
        'view' => 'laravel-components::{framework}.form-choices',
        'class' => Components\FormChoices::class,
    ],
],
```

### Alpine.js Configuration
The component uses Alpine.js with these default settings:
- **Search debounce:** 100ms (configurable)
- **Minimum search chars:** 2 (configurable)
- **Options list height:** max-h-64 (configurable)
- **Keyboard navigation:** Arrow keys, Enter, Escape

## Common Patterns

### User Selection with Avatars
```blade
<x-form-choices 
    name="assigned_users[]" 
    label="Assign Users"
    multiple
    :options="$users"
    value-field="id"
    label-field="name"
    image-field="avatar">
    
    <x-slot:item>
        @props(['option'])
        <div class="d-flex align-items-center">
            <x-avatar :image="$option->avatar" size="sm" class="me-2" />
            <div>
                <div class="fw-bold">{{ $option->name }}</div>
                <small class="text-muted">{{ $option->role }}</small>
            </div>
        </div>
    </x-slot:item>
</x-form-choices>
```

### Category Selection with Groups
```blade
<x-form-choices 
    name="categories[]" 
    label="Select Categories"
    multiple
    :options="$categories"
    children-field="subcategories"
    value-field="id"
    label-field="name">
    
    <x-slot:help>
        Select main categories and subcategories
    </x-slot:help>
</x-form-choices>
```

### Dynamic Search with AJAX
```blade
<x-form-choices 
    name="search_product" 
    label="Search Products"
    :options="[]"
    searchable
    search-function="searchProducts"
    debounce="500ms"
    data-fetch="/api/products/search"
    data-method="GET"
    :form-data="['category' => $currentCategory]">
    
    <x-slot:help>
        Start typing to search products
    </x-slot:help>
</x-form-choices>
```

### Compact Tag Selection
```blade
<x-form-choices 
    name="tags[]" 
    label="Select Tags"
    multiple
    compact
    compact-text="tags selected"
    :options="$availableTags"
    placeholder="Choose tags">
    
    <x-slot:help>
        Selected tags will be applied to your content
    </x-slot:help>
</x-form-choices>
```

### With Custom Selection Display
```blade
<x-form-choices 
    name="priority" 
    label="Select Priority"
    :options="$priorities"
    value-field="id"
    label-field="name">
    
    <x-slot:selection>
        @props(['option'])
        <span class="priority-badge priority-{{ $option->level }}">
            {{ $option->name }}
        </span>
    </x-slot:selection>
    
    <x-slot:item>
        @props(['option'])
        <div class="d-flex align-items-center">
            <x-icon :name="$option->icon" class="me-2" />
            <span>{{ $option->name }}</span>
        </div>
    </x-slot:item>
</x-form-choices>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_choices_with_basic_attributes()
{
    $view = $this->blade('<x-form-choices name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-choices');
}

/** @test */
public function it_renders_form_choices_with_options()
{
    $options = ['us' => 'United States', 'ca' => 'Canada'];
    $view = $this->blade('<x-form-choices name="country" :options="$options" />', ['options' => $options]);
    
    $view->assertSee('United States');
    $view->assertSee('Canada');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ChoicesComponent::class)
        ->assertSee('<x-form-choices')
        ->set('selectedOptions', ['option1'])
        ->assertSee('option1');
}
```

## Accessibility

### ARIA Attributes
- `aria-expanded`: Dynamically managed for dropdown state
- `aria-haspopup`: Indicates dropdown functionality
- `aria-labelledby`: Links to form label
- `role="combobox"`: Applied to search input

### Keyboard Navigation
- Tab navigation to input field
- Arrow keys for option navigation
- Enter key for selection
- Escape key to close dropdown
- Space key for selection

### Screen Reader Support
- Proper labeling and descriptions
- Option state announcements
- Search functionality communication
- Multi-selection feedback

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling

## Troubleshooting

### Common Issues

#### Search Not Working
**Problem:** Search functionality doesn't filter options
**Solution:** Ensure searchable attribute is true and check Alpine.js initialization

#### Options Not Displaying
**Problem:** Options list is empty
**Solution:** Verify options data structure and field mappings

#### AJAX Integration Issues
**Problem:** AJAX search not working
**Solution:** Check fetch URL, method, and CSRF token configuration

#### Styling Conflicts
**Problem:** Component styling doesn't match design
**Solution:** Override default CSS classes and check for framework conflicts

#### Livewire Integration Issues
**Problem:** Livewire updates not reflecting
**Solution:** Ensure proper wire:model binding and check for Alpine.js conflicts

## Related Components

- **FormSelect:** Base select component
- **FormSelectGroup:** Option group wrapper
- **FormSelectItem:** Individual option wrapper
- **FormInput:** Basic input component
- **FormTags:** Simple tag input component

## Changelog

### Version 1.0.0
- Initial release with Alpine.js integration
- Search and multi-selection support
- Option groups and custom rendering
- AJAX integration capabilities
- Livewire compatibility

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormChoices.php`
2. Update the view file: `resources/views/bootstrap-5/form-choices.blade.php`
3. Add/update tests in `tests/Components/FormChoicesTest.php`
4. Update this documentation

## See Also

- [Form Select Component](../form-select.md)
- [Form Select Group Component](../form-select-group.md)
- [Form Select Item Component](../form-select-item.md)
- [Form Tags Component](../form-tags.md)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel Form Components](https://github.com/diviky/laravel-form-components)
