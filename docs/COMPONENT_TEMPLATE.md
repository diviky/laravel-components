# [Component Name] Component

[Brief description of what the component does and its primary use case]

## Overview

**Component Type:** [UI/Form/Layout/View/Editor]  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** [Yes/No]  
**Dependencies:** [List any dependencies]

## Files

- **PHP Class:** `src/Components/[ClassName].php` (if applicable)
- **View File:** `resources/views/bootstrap-5/[component-path].blade.php`
- **Documentation:** `docs/[component-name].md`

## Basic Usage

```blade
<x-[component-name] [basic-required-attributes]>
    [Default slot content]
</x-[component-name]>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| [attribute] | [type] | [description] | `[example]` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| [attribute] | [type] | [default] | [description] | `[example]` |

### Inherited Attributes

This component inherits from `[BaseClass]` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | null | Input name attribute | `'user_email'` |
| id | string | auto-generated | Element ID | `'email-input'` |
| class | string | null | Additional CSS classes | `'custom-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'edit-users'` |
| role | string\|array | null | Required user role(s) | `'admin'` or `['admin', 'editor']` |
| action | string | null | Action type for authorization | `'create'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| [hidden-attribute] | [type] | [default] | [description] | `[example]` |

## Slots

### Default Slot
- **Purpose:** [Description of what goes in the default slot]
- **Content Type:** [HTML/Text/Components]

### Named Slots

#### `[slot-name]`
- **Purpose:** [Description]
- **Required:** [Yes/No]
- **Example:**
```blade
<x-slot:[slot-name]>
    [content]
</x-slot:[slot-name]>
```

## Usage Examples

### Basic Example
```blade
<x-[component-name] [basic-attributes]>
    [content]
</x-[component-name]>
```

### Advanced Example with All Features
```blade
<x-[component-name] 
    [attribute1]="[value1]"
    [attribute2]="[value2]"
    [advanced-attributes]
    class="[custom-classes]">
    
    <x-slot:[named-slot]>
        [slot content]
    </x-slot:[named-slot]>
    
    [main content]
</x-[component-name]>
```

### Livewire Integration
```blade
<x-[component-name] 
    wire:model="[property]"
    wire:change="[method]"
    [other-attributes]>
    [content]
</x-[component-name]>
```

### Framework-Specific Styling

#### TailwindCSS Classes
```blade
<x-[component-name] 
    class="[tailwind-classes]"
    [attributes]>
    [content]
</x-[component-name]>
```

#### Bootstrap Classes
```blade
<x-[component-name] 
    class="[bootstrap-classes]"
    [attributes]>
    [content]
</x-[component-name]>
```

## Component Variants

### [Variant Name]
**Usage:** `<x-[component-name].[variant]>`
**Description:** [What this variant does]
**Example:**
```blade
<x-[component-name].[variant] [attributes]>
    [content]
</x-[component-name].[variant]>
```

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-[component]>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    '[component-name]' => [
        'view' => 'laravel-components::{framework}.[view-path]',
        'class' => Components\[ClassName]::class, // if applicable
        'alias' => '[alternative-name]', // if applicable
    ],
],
```

## Common Patterns

### Error Handling
```blade
<x-[component-name] 
    [attributes]
    :error="$errors->first('[field-name]')">
    [content]
</x-[component-name]>
```

### Conditional Rendering
```blade
@if($condition)
    <x-[component-name] [attributes]>
        [content]
    </x-[component-name]>
@endif
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_[component_name]_with_basic_attributes()
{
    $component = new [ClassName]([basic-params]);
    
    $view = $this->component($component);
    
    $view->assertSee('[expected-content]');
    $view->assertSeeInOrder(['[element1]', '[element2]']);
}

/** @test */
public function it_handles_[specific_feature]()
{
    $component = new [ClassName]([params-for-feature]);
    
    $view = $this->component($component);
    
    $view->assertSee('[expected-output]');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test([LivewireComponent]::class)
        ->assertSee('<x-[component-name]')
        ->set('[property]', '[value]')
        ->assertSee('[expected-result]');
}
```

### Browser Tests (Dusk)
```php
/** @test */
public function user_can_interact_with_[component_name]()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('[route]')
                ->waitFor('[component-selector]')
                ->click('[interaction-element]')
                ->assertSee('[expected-result]');
    });
}
```

## Accessibility

### ARIA Attributes
- [List relevant ARIA attributes the component supports]
- [Accessibility features built into the component]

### Keyboard Navigation
- [Describe keyboard shortcuts and navigation]
- [Tab order considerations]

## Browser Compatibility

- **Supported Browsers:** [List supported browsers]
- **JavaScript Dependencies:** [List any JS dependencies]
- **CSS Framework Requirements:** Bootstrap 4+ or TailwindCSS 2+

## Troubleshooting

### Common Issues

#### [Issue 1]
**Problem:** [Description]
**Solution:** [How to fix]

#### [Issue 2]
**Problem:** [Description]
**Solution:** [How to fix]

## Related Components

- **[Related Component 1]:** [How they relate]
- **[Related Component 2]:** [How they relate]

## Changelog

### Version [X.X.X]
- [Changes for this version]

## Contributing

To contribute to this component:
1. Update the PHP class if needed: `src/Components/[ClassName].php`
2. Update the view file: `resources/views/bootstrap-5/[path].blade.php`
3. Add/update tests in `tests/Components/[ComponentName]Test.php`
4. Update this documentation

## See Also

- [Link to related documentation]
- [Link to examples]
- [Link to GitHub issues]
