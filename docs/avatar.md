# Avatar Component

Displays a user avatar with image or auto-generated initials, featuring consistent color assignment and stacked layouts.

## Overview

**Component Type:** UI  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** None

## Files

- **PHP Class:** `src/Components/Avatar.php`
- **View File:** `resources/views/bootstrap-5/avatar.blade.php`
- **Documentation:** `docs/avatar.md`
- **Tests:** `tests/Components/AvatarTest.php`

## Basic Usage

```blade
<x-avatar label="John Doe" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| label or name | string | User name for initials generation | `'John Doe'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| image | string | '' | URL to avatar image | `'/images/avatar.jpg'` |
| size | string | null | Avatar size (xs, sm, md, lg, xl) | `'lg'` |
| color | string | auto-generated | Background color class | `'bg-blue-lt'` |
| stacked | boolean | false | Enable stacked layout | `true` |

### Inherited Attributes

This component inherits from `Component` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'user-avatar'` |
| class | string | null | Additional CSS classes | `'border shadow'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| circle | boolean | false | Add rounded-circle class | `true` |
| rounded | boolean | false | Add rounded class | `true` |
| xs, sm, md, lg, xl | boolean | false | Size variant classes | `true` |

## Slots

### Default Slot
- **Purpose:** Additional content inside avatar span
- **Content Type:** HTML/Text
- **Required:** No

## Usage Examples

### Basic Avatar with Initials
```blade
<x-avatar label="John Doe" />
<!-- Outputs: JD with auto-generated color -->
```

### Avatar with Image
```blade
<x-avatar 
    label="John Doe" 
    image="/images/john-doe.jpg" 
    size="lg" />
```

### Stacked Avatars
```blade
<x-avatar label="John Doe" stacked />
<x-avatar label="Jane Smith" stacked />
<x-avatar label="Bob Johnson" stacked />
```

### Size Variants
```blade
<x-avatar label="John Doe" size="xs" />
<x-avatar label="John Doe" size="sm" />
<x-avatar label="John Doe" size="md" />
<x-avatar label="John Doe" size="lg" />
<x-avatar label="John Doe" size="xl" />
```

### Custom Styling
```blade
<x-avatar 
    label="John Doe"
    circle
    class="border border-primary shadow"
    color="bg-primary" />
```

### Livewire Integration
```blade
<x-avatar 
    label="{{ $user->name }}"
    image="{{ $user->avatar }}"
    wire:click="selectUser({{ $user->id }})" />
```

## Features

### Automatic Initial Generation
- Extracts first letter of first two words
- Handles special characters and Unicode
- Falls back to random letter if name is empty

### Consistent Color Assignment  
- Same name always generates same color
- Uses character-based algorithm for distribution
- 14 predefined color variants

### Stacked Layout Support
- Wraps multiple avatars in `avatar-list avatar-list-stacked`
- Overlapping display for user groups

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'avatar' => [
        'view' => 'laravel-components::{framework}.avatar',
        'class' => Components\Avatar::class,
    ],
],
```

## Color Variants

The component automatically assigns one of these colors based on the name:

```php
$colors = [
    'bg-blue-lt', 'bg-azure-lt', 'bg-indigo-lt', 'bg-purple-lt',
    'bg-pink-lt', 'bg-red-lt', 'bg-orange-lt', 'bg-yellow-lt',
    'bg-lime-lt', 'bg-green-lt', 'bg-teal-lt', 'bg-cyan-lt',
    'bg-gray-200', 'bg-gray-300'
];
```

## Testing

```php
// Basic test
$component = new Avatar(label: 'John Doe');
$this->assertEquals('JD', $component->label);

// Color consistency test  
$avatar1 = new Avatar(label: 'John Doe');
$avatar2 = new Avatar(label: 'John Doe');
$this->assertEquals($avatar1->color, $avatar2->color);

// Image precedence test
$component = new Avatar(label: 'John Doe', image: '/avatar.jpg');
$view = $this->component($component);
$view->assertSee('background-image: url(/avatar.jpg)', false);
```

## Accessibility

### ARIA Attributes
- Inherits alt text from label when no image provided
- Image alt attribute for screen readers

### Best Practices
- Always provide meaningful label/name
- Use appropriate size for context
- Consider color contrast for custom colors

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** None
- **CSS Framework Requirements:** Bootstrap 4+ or custom CSS

## Troubleshooting

### Common Issues

#### Initials Not Showing
**Problem:** Empty or missing label/name attribute
**Solution:** Ensure label or name parameter is provided with valid text

#### Colors Not Consistent
**Problem:** Different color each time for same name
**Solution:** Verify the name string is exactly identical (case-sensitive)

#### Stacked Layout Not Working
**Problem:** Multiple avatars not overlapping
**Solution:** Ensure all avatars in group have `stacked="true"` attribute

## Related Components

- **Badge:** For status indicators
- **Card:** Often contains avatars in headers
- **Nav Item:** Frequently used in navigation with user avatars

## Changelog

### Version 2.0.0
- Added automatic color generation algorithm
- Improved Unicode support for initials
- Added stacked layout support

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/Avatar.php`
2. Update the view file: `resources/views/bootstrap-5/avatar.blade.php`
3. Add/update tests in `tests/Components/AvatarTest.php`
4. Update this documentation
