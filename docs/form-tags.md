# Form Tags Component

An interactive tag input component with Alpine.js integration that allows users to add, remove, and manage multiple tags. Features include real-time tag management, keyboard navigation, duplicate prevention, and Livewire compatibility.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, extends base Component class

## Files

- **PHP Class:** `src/Components/FormTags.php`
- **View File:** `resources/views/bootstrap-5/form-tags.blade.php`
- **Documentation:** `docs/form-tags.md`

## Basic Usage

### Simple Tag Input
```blade
<x-form-tags name="skills" label="Skills" />
```

### With Default Values
```blade
<x-form-tags 
    name="tags" 
    label="Tags"
    :default="['php', 'laravel', 'vue']">
</x-form-tags>
```

### With Icon
```blade
<x-form-tags 
    name="categories" 
    label="Categories"
    icon="tag">
</x-form-tags>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'skills'` or `'tags[]'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Select Skills'` |
| icon | string | '' | Icon name for the input | `'tag'`, `'hash'` |
| bind | mixed | null | Model binding | `$user` |
| default | mixed | null | Default tag values | `['php', 'laravel']` |
| language | string | null | Language-specific naming | `'en'`, `'es'` |
| showErrors | boolean | true | Display validation errors | `false` |
| floating | boolean | false | Use floating label style | `true` |

### Inherited Attributes

This component supports all standard HTML input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'skills-input'` |
| class | string | null | Additional CSS classes | `'custom-tags'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Placeholder text | `'Add tags...'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'manage-tags'` |
| role | string\|array | null | Required user role(s) | `'admin'` or `['admin', 'user']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Press Enter or Tab to add tags, comma to separate multiple tags
</x-slot:help>
```

## Usage Examples

### Basic Tag Input
```blade
<x-form-tags 
    name="skills" 
    label="Skills"
    placeholder="Add your skills">
</x-form-tags>
```

### With Default Tags
```blade
<x-form-tags 
    name="interests" 
    label="Interests"
    :default="['reading', 'music', 'travel']">
</x-form-tags>
```

### With Icon and Custom Styling
```blade
<x-form-tags 
    name="categories" 
    label="Categories"
    icon="folder"
    class="custom-tags-input"
    placeholder="Add categories">
    
    <x-slot:help>
        Organize your content with relevant categories
    </x-slot:help>
</x-form-tags>
```

### With Model Binding
```blade
<x-form-tags 
    name="tags" 
    label="Tags"
    :bind="$post"
    bind-key="tags">
</x-form-tags>
```

### With Language Support
```blade
<x-form-tags 
    name="keywords" 
    label="Keywords"
    language="en"
    :default="['laravel', 'php', 'web']">
</x-form-tags>
```

### Livewire Integration
```blade
<x-form-tags 
    wire:model="selectedTags"
    name="tags[]" 
    label="Select Tags"
    :default="$availableTags">
    
    <x-slot:help>
        {{ count($selectedTags) }} tags selected
    </x-slot:help>
</x-form-tags>
```

### With Validation
```blade
<x-form-tags 
    name="tags" 
    label="Tags"
    required
    rules="required|min:1|max:10">
    
    <x-slot:help>
        Add between 1 and 10 tags
    </x-slot:help>
</x-form-tags>
```

### Compact Tag Display
```blade
<x-form-tags 
    name="labels" 
    label="Labels"
    class="compact-tags"
    :default="['urgent', 'review', 'approved']">
</x-form-tags>
```

### With Custom Error Handling
```blade
<x-form-tags 
    name="tags" 
    label="Tags"
    :show-errors="false">
    
    @error('tags')
        <div class="text-danger text-sm mt-1">{{ $message }}</div>
    @enderror
</x-form-tags>
```

## Component Variants

### Standard Tags
**Usage:** `<x-form-tags>` (default)
**Description:** Standard tag input with add/remove functionality
**Features:**
- Add tags with Enter/Tab keys
- Remove individual tags
- Clear all tags
- Duplicate prevention

### Readonly Tags
**Usage:** `<x-form-tags readonly>`
**Description:** Display-only tags without editing
**Features:**
- Read-only display
- No add/remove functionality
- Dashed border styling

### Required Tags
**Usage:** `<x-form-tags required>`
**Description:** Tags field with validation
**Features:**
- Required field validation
- Error state styling
- Form submission validation

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-tags>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-tags' => [
        'view' => 'laravel-components::{framework}.form-tags',
        'class' => Components\FormTags::class,
    ],
],
```

### Alpine.js Configuration
The component uses Alpine.js with these default settings:
- **Tag management:** Array-based with reactive updates
- **Keyboard shortcuts:** Enter, Tab, Comma for adding tags
- **Escape key:** Clears current input
- **Livewire integration:** Automatic cleanup on navigation

## Common Patterns

### Skill Management
```blade
<x-form-tags 
    name="skills[]" 
    label="Technical Skills"
    icon="code"
    :default="$user->skills"
    placeholder="Add your technical skills">
    
    <x-slot:help>
        Add programming languages, frameworks, and tools you know
    </x-slot:help>
</x-form-tags>
```

### Content Categorization
```blade
<x-form-tags 
    name="categories[]" 
    label="Content Categories"
    icon="folder"
    :default="$post->categories"
    placeholder="Add content categories">
    
    <x-slot:help>
        Categorize your content for better organization
    </x-slot:help>
</x-form-tags>
```

### User Interests
```blade
<x-form-tags 
    name="interests[]" 
    label="Interests & Hobbies"
    icon="heart"
    :default="$profile->interests"
    placeholder="Add your interests">
    
    <x-slot:help>
        Share what you're passionate about
    </x-slot:help>
</x-form-tags>
```

### Project Labels
```blade
<x-form-tags 
    name="labels[]" 
    label="Project Labels"
    icon="tag"
    :default="$project->labels"
    placeholder="Add project labels">
    
    <x-slot:help>
        Use labels to organize and prioritize projects
    </x-slot:help>
</x-form-tags>
```

### Multi-language Keywords
```blade
<x-form-tags 
    name="keywords" 
    label="Keywords (English)"
    language="en"
    icon="globe"
    :default="$content->keywords['en'] ?? []"
    placeholder="Add English keywords">
    
    <x-slot:help>
        SEO keywords for English content
    </x-slot:help>
</x-form-tags>

<x-form-tags 
    name="keywords" 
    label="Keywords (Spanish)"
    language="es"
    icon="globe"
    :default="$content->keywords['es'] ?? []"
    placeholder="Add Spanish keywords">
    
    <x-slot:help>
        SEO keywords for Spanish content
    </x-slot:help>
</x-form-tags>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_tags_with_basic_attributes()
{
    $view = $this->blade('<x-form-tags name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-tags');
}

/** @test */
public function it_renders_form_tags_with_default_values()
{
    $default = ['tag1', 'tag2'];
    $view = $this->blade('<x-form-tags name="tags" :default="$default" />', ['default' => $default]);
    
    $view->assertSee('tag1');
    $view->assertSee('tag2');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(TagsComponent::class)
        ->assertSee('<x-form-tags')
        ->set('selectedTags', ['tag1', 'tag2'])
        ->assertSee('tag1')
        ->assertSee('tag2');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to input field
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to input field
- Enter key to add tags
- Tab key to add tags
- Comma key to add tags
- Escape key to clear input
- Arrow keys for tag navigation

### Screen Reader Support
- Proper labeling and descriptions
- Tag state announcements
- Add/remove tag feedback
- Error state communication

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling

## Troubleshooting

### Common Issues

#### Tags Not Adding
**Problem:** Tags don't get added when pressing Enter
**Solution:** Ensure Alpine.js is properly loaded and check for JavaScript errors

#### Duplicate Tags
**Problem:** Same tag can be added multiple times
**Solution:** The component automatically prevents duplicates (case-insensitive)

#### Livewire Integration Issues
**Problem:** Tags don't persist in Livewire
**Solution:** Use proper wire:model binding and ensure component re-renders

#### Styling Conflicts
**Problem:** Component styling doesn't match design
**Solution:** Override default CSS classes and check for framework conflicts

#### Validation Errors
**Problem:** Validation errors not displaying
**Solution:** Ensure showErrors is true and check form validation setup

## Related Components

- **Form Input:** Basic input component
- **Form Choices:** Advanced select with search
- **Form Select:** Standard select component
- **Badge:** Tag display component
- **Icon:** Icon display component

## Changelog

### Version 1.0.0
- Initial release with Alpine.js integration
- Tag add/remove functionality
- Duplicate prevention
- Livewire compatibility
- Keyboard navigation support

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormTags.php`
2. Update the view file: `resources/views/bootstrap-5/form-tags.blade.php`
3. Add/update tests in `tests/Components/FormTagsTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Choices Component](../form-choices.md)
- [Badge Component](../badge.md)
- [Icon Component](../icon.md)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel Form Components](https://github.com/diviky/laravel-form-components)
