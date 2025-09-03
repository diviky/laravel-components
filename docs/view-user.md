# View User Component

The `View User` component is a sophisticated display component for rendering user information with integrated avatar support, featuring customizable sizes, shapes, compact mode, icon integration, label display, and copy-to-clipboard functionality.

## Overview

The View User component provides a comprehensive way to display user information including avatars, names, and other user details. It can handle both image-based avatars (with fallback to text initials) and text-based avatars, with configurable sizes and shapes. The component integrates seamlessly with the icon system and provides copy functionality for enhanced user experience.

## Basic Usage

```blade
<!-- Basic user display with default settings -->
<x-view-user :value="['name' => 'John Doe', 'avatar' => '/avatars/john.jpg']" />

<!-- User with custom size and shape -->
<x-view-user 
    :value="['name' => 'Jane Smith', 'avatar' => '/avatars/jane.jpg']" 
    size="lg" 
    shape="rounded" 
/>

<!-- Compact user display (no name) -->
<x-view-user 
    :value="['name' => 'Admin User', 'avatar' => '/avatars/admin.jpg']" 
    compact 
/>

<!-- User with icon and label -->
<x-view-user 
    :value="['name' => 'Moderator', 'avatar' => '/avatars/moderator.jpg']" 
    icon="user" 
    label="User: " 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `array` | Array containing user information (name, avatar, label) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the user |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `size` | `string` | `'xs'` | Avatar size (xs, sm, md, lg, xl) |
| `shape` | `string` | `'circle'` | Avatar shape (circle, rounded) |
| `compact` | `boolean` | `false` | Hide user name for compact display |
| `settings` | `array` | `[]` | Additional settings array |

## Data Structure

The `value` array should contain the following keys:

```php
$user = [
    'name' => 'John Doe',        // Required: User's display name
    'avatar' => '/path/to/avatar.jpg',  // Optional: Avatar image URL
    'label' => 'JD'              // Optional: Text to display when no avatar
];
```

## Avatar Configuration

### Size Options

```blade
<!-- Extra small avatar -->
<x-view-user :value="$user" size="xs" />

<!-- Small avatar -->
<x-view-user :value="$user" size="sm" />

<!-- Default size -->
<x-view-user :value="$user" size="md" />

<!-- Large avatar -->
<x-view-user :value="$user" size="lg" />

<!-- Extra large avatar -->
<x-view-user :value="$user" size="xl" />
```

### Shape Options

```blade
<!-- Circular avatar (default) -->
<x-view-user :value="$user" shape="circle" />

<!-- Rounded square avatar -->
<x-view-user :value="$user" shape="rounded" />
```

### Settings Override

The `settings` array can override the default size and shape:

```blade
<!-- Override with settings -->
<x-view-user 
    :value="$user" 
    :settings="['size' => 'lg', 'shape' => 'rounded']" 
/>
```

## Display Modes

### Full Display (Default)

Shows avatar, name, and all configured elements:

```blade
<x-view-user :value="$user" />
<!-- Renders: [Icon] [Label] [Avatar] John Doe [Copy Icon] -->
```

### Compact Display

Hides the user name for space-constrained layouts:

```blade
<x-view-user :value="$user" compact />
<!-- Renders: [Icon] [Label] [Avatar] [Copy Icon] -->
```

## Avatar Handling

### Image-Based Avatars

When an avatar image is provided:

```blade
@php
$user = [
    'name' => 'John Doe',
    'avatar' => '/avatars/john.jpg'
];
@endphp

<x-view-user :value="$user" />
```

### Text-Based Avatars

When no avatar image is provided, shows text initials:

```blade
@php
$user = [
    'name' => 'John Doe',
    'label' => 'JD'
];
@endphp

<x-view-user :value="$user" />
```

### Fallback Behavior

The component automatically handles fallbacks:

```blade
@php
$user = [
    'name' => 'John Doe',
    'avatar' => '/broken-image.jpg',
    'label' => 'JD'
];
@endphp

<x-view-user :value="$user" />
<!-- Shows text 'JD' if image fails to load -->
```

## Advanced Usage

### Dynamic Configuration

```blade
@php
$userConfig = [
    'size' => $user->isAdmin() ? 'lg' : 'md',
    'shape' => $user->prefersRounded() ? 'rounded' : 'circle',
    'compact' => $isCompactLayout
];
@endphp

<x-view-user 
    :value="$user" 
    :settings="$userConfig" 
/>
```

### Conditional Display

```blade
@if($user->hasAvatar())
    <x-view-user 
        :value="[
            'name' => $user->name,
            'avatar' => $user->avatar_url
        ]" 
    />
@else
    <x-view-user 
        :value="[
            'name' => $user->name,
            'label' => $user->initials
        ]" 
    />
@endif
```

### User with Additional Information

```blade
<x-view-user 
    :value="[
        'name' => $user->name,
        'avatar' => $user->avatar_url,
        'label' => $user->initials
    ]" 
    icon="user" 
    label="Profile: " 
    size="lg"
    shape="circle"
    copy
/>
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-user 
    :value="$user" 
    class="my-custom-user" 
/>

<!-- Multiple classes -->
<x-view-user 
    :value="$user" 
    class="user-highlight user-border" 
/>
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-user 
    :value="$user" 
    style="background: #f8f9fa; padding: 10px; border-radius: 8px;" 
/>
```

### Responsive Design

```blade
<!-- Responsive user display -->
<x-view-user 
    :value="$user" 
    class="user-responsive" 
/>
```

## Integration Examples

### User Profile Display

```blade
<div class="user-profile">
    <x-view-user 
        :value="[
            'name' => $user->name,
            'avatar' => $user->avatar_url,
            'label' => $user->initials
        ]" 
        icon="user" 
        label="User: " 
        size="lg"
        shape="circle"
    />
    <div class="user-details">
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->email }}</p>
        <small>{{ $user->role }}</small>
    </div>
</div>
```

### User List with Avatars

```blade
<div class="user-list">
    @foreach($users as $user)
        <div class="user-item">
            <x-view-user 
                :value="[
                    'name' => $user->name,
                    'avatar' => $user->avatar_url,
                    'label' => $user->initials
                ]" 
                size="md"
                shape="circle"
            />
            <span class="user-role">{{ $user->role }}</span>
        </div>
    @endforeach
</div>
```

### Compact User Grid

```blade
<div class="user-grid">
    @foreach($users as $user)
        <div class="user-card">
            <x-view-user 
                :value="[
                    'name' => $user->name,
                    'avatar' => $user->avatar_url,
                    'label' => $user->initials
                ]" 
                compact
                size="lg"
                shape="rounded"
            />
            <div class="user-info">
                <strong>{{ $user->name }}</strong>
                <small>{{ $user->department }}</small>
            </div>
        </div>
    @endforeach
</div>
```

### Comment Author Display

```blade
<div class="comment">
    <x-view-user 
        :value="[
            'name' => $comment->author->name,
            'avatar' => $comment->author->avatar_url,
            'label' => $comment->author->initials
        ]" 
        size="sm"
        shape="circle"
        copy
    />
    <div class="comment-content">
        <p>{{ $comment->content }}</p>
        <small>{{ $comment->created_at->diffForHumans() }}</small>
    </div>
</div>
```

### Team Member Display

```blade
<div class="team-members">
    @foreach($team as $member)
        <div class="team-member">
            <x-view-user 
                :value="[
                    'name' => $member->name,
                    'avatar' => $member->avatar_url,
                    'label' => $member->initials
                ]" 
                icon="users" 
                size="md"
                shape="circle"
            />
            <div class="member-info">
                <strong>{{ $member->name }}</strong>
                <small>{{ $member->role }}</small>
            </div>
        </div>
    @endforeach
</div>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_user()
{
    $user = ['name' => 'Test User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" />', ['user' => $user]);
    
    $view->assertSee('Test User');
    $view->assertSee('avatar');
}
```

### Avatar Image Test

```php
/** @test */
public function it_renders_user_with_avatar()
{
    $user = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" />', ['user' => $user]);
    
    $view->assertSee('User');
    $view->assertSee('background-image: url(/avatar.jpg)');
}
```

### Size Configuration Test

```php
/** @test */
public function it_renders_user_with_custom_size()
{
    $user = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" size="lg" />', ['user' => $user]);
    
    $view->assertSee('User');
    $view->assertSee('avatar-lg');
}
```

### Shape Configuration Test

```php
/** @test */
public function it_renders_user_with_custom_shape()
{
    $user = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" shape="rounded" />', ['user' => $user]);
    
    $view->assertSee('User');
    $view->assertSee('rounded');
    $view->assertDontSee('rounded-circle');
}
```

### Compact Mode Test

```php
/** @test */
public function it_renders_user_in_compact_mode()
{
    $user = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" compact />', ['user' => $user]);
    
    $view->assertSee('avatar');
    $view->assertDontSee('User');
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_user_with_icon()
{
    $user = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" icon="user" />', ['user' => $user]);
    
    $view->assertSee('User');
    $view->assertSee('user');
    $view->assertSee('me-1');
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_user_with_copy_functionality()
{
    $user = ['name' => 'Copy Me', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-user :value="$user" copy />', ['user' => $user]);
    
    $view->assertSee('Copy Me');
    $view->assertSee('copy');
    $view->assertSee('data-clipboard="Copy Me"');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-user 
    :value="$user" 
    aria-label="User profile for John Doe"
    role="article"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-user 
    :value="$user" 
    aria-label="User avatar and name for John Doe"
    role="article"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Efficient image loading with fallback handling
- Lightweight component with minimal DOM manipulation
- Copy functionality only loads when enabled
- Optimized icon rendering through the icon system

## Troubleshooting

### Common Issues

1. **User not displaying**: Ensure the `value` prop is an array with required keys
2. **Avatar not showing**: Verify the avatar path is correct and accessible
3. **Size not applying**: Check if the size value matches Bootstrap avatar classes
4. **Shape not working**: Verify the shape value is either 'circle' or 'rounded'
5. **Icon not showing**: Check if the icon name exists in your icon set
6. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-user :value="$user" :debug="true" />
```

## Related Components

- **View Avatar** - For simple avatar display
- **View Badge** - For user status indicators
- **View Status** - For user status display
- **Avatar** - Base avatar component
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic user display functionality
- Avatar integration with fallback support
- Size and shape configuration
- Compact mode support
- Icon integration
- Copy functionality
- Settings-based configuration override

## Contributing

When contributing to the View User component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various user data structures

## Support

For support and questions about the View User component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
