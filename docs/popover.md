# Popover Component

An interactive popover component built with Alpine.js that provides hover-triggered content overlays with customizable positioning, timing, and styling options.

## Overview

**Component Type:** UI  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, TailwindCSS utility classes

## Files

- **View File:** `resources/views/bootstrap-5/popover.blade.php`
- **Documentation:** `docs/popover.md`

## Basic Usage

### Simple Popover
```blade
<x-popover>
    <x-slot:trigger>
        <span>Hover me</span>
    </x-slot:trigger>
    
    <x-slot:content>
        <p>This is the popover content</p>
    </x-slot:content>
</x-popover>
```

### Popover with Custom Position
```blade
<x-popover position="top" offset="10">
    <x-slot:trigger>
        <x-button>Click for info</x-button>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="p-2">
            <h4>Information</h4>
            <p>Additional details here</p>
        </div>
    </x-slot:content>
</x-popover>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| trigger | slot | Content that triggers the popover | `<x-slot:trigger>Hover me</x-slot:trigger>` |
| content | slot | Content displayed in the popover | `<x-slot:content>Popover content</x-slot:content>` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| position | string | `'bottom'` | Popover positioning relative to trigger | `'top'`, `'bottom'`, `'left'`, `'right'` |
| offset | number | `0` | Distance offset from trigger element | `10`, `20`, `-5` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-popover'` |
| id | string | auto-generated | Element ID | `'info-popover'` |
| style | string | null | Inline CSS styles | `'z-index: 1000;'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-popover'` |
| role | string\|array | null | Required user role(s) | `'admin'` or `['admin', 'user']` |
| action | string | null | Action type for authorization | `'read'` |

## Slots

### Required Slots

#### `trigger`
- **Purpose:** Content that triggers the popover display
- **Required:** Yes
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:trigger>
    <x-button>Show Info</x-button>
</x-slot:trigger>
```

#### `content`
- **Purpose:** Content displayed inside the popover
- **Required:** Yes
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:content>
    <div class="p-3">
        <h4>Title</h4>
        <p>Content here</p>
    </div>
</x-slot:content>
```

## Usage Examples

### Basic Information Popover
```blade
<x-popover>
    <x-slot:trigger>
        <x-icon name="info-circle" class="text-blue-500" />
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="text-sm">
            <p>This field is required for form submission.</p>
        </div>
    </x-slot:content>
</x-popover>
```

### User Profile Popover
```blade
<x-popover position="bottom" offset="10">
    <x-slot:trigger>
        <x-avatar label="{{ $user->name }}" size="sm" />
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="min-w-[200px]">
            <div class="flex items-center space-x-3 mb-3">
                <x-avatar label="{{ $user->name }}" size="md" />
                <div>
                    <h4 class="font-semibold">{{ $user->name }}</h4>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
            <div class="border-t pt-3">
                <x-button size="sm" wire:click="viewProfile({{ $user->id }})">
                    View Profile
                </x-button>
            </div>
        </div>
    </x-slot:content>
</x-popover>
```

### Form Help Popover
```blade
<x-popover position="right" offset="15">
    <x-slot:trigger>
        <x-icon name="help" class="text-gray-400 cursor-help" />
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="max-w-xs">
            <h4 class="font-medium mb-2">Password Requirements</h4>
            <ul class="text-sm space-y-1">
                <li>• At least 8 characters</li>
                <li>• One uppercase letter</li>
                <li>• One lowercase letter</li>
                <li>• One number</li>
                <li>• One special character</li>
            </ul>
        </div>
    </x-slot:content>
</x-popover>
```

### Livewire Integration
```blade
<x-popover position="top">
    <x-slot:trigger>
        <x-button size="sm" wire:loading.class="opacity-50">
            Actions
        </x-button>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="space-y-2">
            <x-button size="sm" wire:click="editItem({{ $item->id }})">
                Edit
            </x-button>
            <x-button size="sm" color="danger" wire:click="deleteItem({{ $item->id }})">
                Delete
            </x-button>
        </div>
    </x-slot:content>
</x-popover>
```

### Framework-Specific Styling

#### Bootstrap Classes
```blade
<x-popover class="bootstrap-popover">
    <x-slot:trigger>
        <span class="btn btn-primary">Bootstrap Button</span>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="bootstrap-content">
            Bootstrap styled content
        </div>
    </x-slot:content>
</x-popover>
```

#### TailwindCSS Classes
```blade
<x-popover class="tailwind-popover">
    <x-slot:trigger>
        <span class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tailwind Button
        </span>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-4">
            Tailwind styled content
        </div>
    </x-slot:content>
</x-popover>
```

## Component Variants

### Default Popover
**Usage:** `<x-popover>`
**Description:** Standard popover with bottom positioning
**Features:**
- Hover trigger
- 300ms hide delay
- Bottom positioning
- Default styling

### Positioned Popover
**Usage:** `<x-popover position="top|bottom|left|right">`
**Description:** Popover with custom positioning
**Features:**
- 4-direction positioning
- Custom offset support
- Responsive positioning

### Custom Styled Popover
**Usage:** `<x-popover class="custom-styles">`
**Description:** Popover with custom CSS classes
**Features:**
- Custom styling support
- Flexible content layout
- Responsive design

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-popover>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'popover' => [
        'view' => 'laravel-components::{framework}.popover',
    ],
],
```

### Alpine.js Configuration
The component uses Alpine.js with these default settings:
- **Show delay:** Immediate on hover
- **Hide delay:** 300ms after mouse leave
- **Positioning:** Uses Alpine.js anchor positioning
- **Z-index:** `z-1` (configurable via CSS)

## Common Patterns

### Tooltip-Style Popover
```blade
<x-popover position="top" offset="5">
    <x-slot:trigger>
        <span class="text-gray-400 cursor-help">?</span>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="text-sm text-gray-700 bg-gray-50 p-2 rounded">
            Simple tooltip content
        </div>
    </x-slot:content>
</x-popover>
```

### Rich Content Popover
```blade
<x-popover position="bottom" offset="10">
    <x-slot:trigger>
        <x-button size="sm" outline>
            <x-icon name="settings" class="mr-2" />
            Settings
        </x-button>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="w-80">
            <div class="border-b pb-3 mb-3">
                <h4 class="font-semibold">Quick Settings</h4>
                <p class="text-sm text-gray-600">Configure your preferences</p>
            </div>
            
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span>Dark Mode</span>
                    <x-form-switch wire:model="darkMode" />
                </div>
                <div class="flex items-center justify-between">
                    <span>Notifications</span>
                    <x-form-switch wire:model="notifications" />
                </div>
                <div class="flex items-center justify-between">
                    <span>Auto-save</span>
                    <x-form-switch wire:model="autoSave" />
                </div>
            </div>
            
            <div class="border-t pt-3 mt-3">
                <x-button size="sm" wire:click="saveSettings">
                    Save Changes
                </x-button>
            </div>
        </div>
    </x-slot:content>
</x-popover>
```

### Navigation Popover
```blade
<x-popover position="bottom" offset="5">
    <x-slot:trigger>
        <x-icon name="menu" class="cursor-pointer" />
    </x-slot:trigger>
    
    <x-slot:content>
        <nav class="min-w-[150px]">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-sm hover:bg-gray-100 rounded">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="block px-3 py-2 text-sm hover:bg-gray-100 rounded">
                        Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class="block px-3 py-2 text-sm hover:bg-gray-100 rounded">
                        Settings
                    </a>
                </li>
                <li class="border-t pt-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </x-slot:content>
</x-popover>
```

### Data Display Popover
```blade
<x-popover position="right" offset="15">
    <x-slot:trigger>
        <x-badge color="info" class="cursor-help">
            {{ $itemCount }} items
        </x-badge>
    </x-slot:trigger>
    
    <x-slot:content>
        <div class="min-w-[250px]">
            <h4 class="font-medium mb-3">Item Breakdown</h4>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <span>Active:</span>
                    <span class="font-medium">{{ $activeCount }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Pending:</span>
                    <span class="font-medium">{{ $pendingCount }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Archived:</span>
                    <span class="font-medium">{{ $archivedCount }}</span>
                </div>
            </div>
            <div class="border-t pt-3 mt-3">
                <x-button size="sm" wire:click="viewAllItems">
                    View All Items
                </x-button>
            </div>
        </div>
    </x-slot:content>
</x-popover>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_popover_with_trigger_and_content()
{
    $view = $this->blade('
        <x-popover>
            <x-slot:trigger>Hover me</x-slot:trigger>
            <x-slot:content>Popover content</x-slot:content>
        </x-popover>
    ');
    
    $view->assertSee('Hover me');
    $view->assertSee('Popover content');
    $view->assertSee('x-data');
}

/** @test */
public function it_renders_popover_with_custom_position()
{
    $view = $this->blade('
        <x-popover position="top" offset="10">
            <x-slot:trigger>Button</x-slot:trigger>
            <x-slot:content>Content</x-slot:content>
        </x-popover>
    ');
    
    $view->assertSee('x-anchor.top.offset.10');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(PopoverComponent::class)
        ->assertSee('<x-popover')
        ->assertSee('Livewire content');
}
```

## Accessibility

### ARIA Attributes
- `aria-expanded`: Dynamically managed for screen readers
- `aria-describedby`: Links popover content to trigger
- `role="tooltip"`: Applied when appropriate

### Keyboard Navigation
- Tab navigation to trigger elements
- Escape key closes popover
- Focus management for interactive content

### Screen Reader Support
- Content is properly announced
- Position changes are communicated
- Interactive elements are accessible

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x
- **CSS Framework Requirements:** TailwindCSS utility classes (can be customized)

## Troubleshooting

### Common Issues

#### Popover Not Displaying
**Problem:** Popover content is not visible on hover
**Solution:** Check that Alpine.js is loaded and check browser console for errors

#### Positioning Issues
**Problem:** Popover appears in wrong position
**Solution:** Verify the position attribute and ensure the trigger element is properly positioned

#### Styling Conflicts
**Problem:** Popover styling doesn't match design
**Solution:** Override default TailwindCSS classes with custom CSS or additional classes

#### Performance Issues
**Problem:** Popover causes lag or stuttering
**Solution:** Reduce content complexity or implement lazy loading for heavy content

## Related Components

- **Tooltip:** For simpler text-only overlays
- **Modal:** For more prominent content overlays
- **Dropdown:** For click-triggered menus
- **Alert:** For non-interactive information display

## Changelog

### Version 1.0.0
- Initial release with Alpine.js integration
- Hover-based trigger system
- Customizable positioning
- Responsive design support

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/popover.blade.php`
2. Add/update tests in `tests/Components/PopoverTest.php`
3. Update this documentation

## See Also

- [Tooltip Component](../tooltip.md)
- [Modal Component](../modal.md)
- [Dropdown Component](../dropdown.md)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [TailwindCSS Documentation](https://tailwindcss.com/)
