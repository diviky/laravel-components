# View Avatar Component

The `View Avatar` component is a sophisticated display component for rendering user avatars with support for both image-based and text-based avatars, featuring customizable sizes, shapes, icon integration, label display, and copy-to-clipboard functionality.

## Overview

The View Avatar component provides a flexible and powerful way to display user avatars, profile pictures, or user representations. It can handle both image-based avatars (with fallback to text initials) and text-based avatars, with configurable sizes and shapes. The component integrates seamlessly with the icon system and provides copy functionality for enhanced user experience.

## Basic Usage

```blade
<!-- Basic avatar with default settings -->
<x-view-avatar value="John Doe" />

<!-- Avatar with custom image -->
<x-view-avatar 
    value="John Doe" 
    :settings="['image' => '/path/to/avatar.jpg']" 
/>

<!-- Avatar with custom size and shape -->
<x-view-avatar 
    value="Jane Smith" 
    :settings="['size' => 'lg', 'shape' => 'rounded']" 
/>

<!-- Avatar with icon and label -->
<x-view-avatar 
    value="Admin User" 
    icon="user" 
    label="User: " 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The value to display (typically user name or identifier) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the avatar |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Avatar configuration settings |

## Settings Configuration

The `settings` array accepts the following configuration options:

### Size Options

```blade
<!-- Extra small avatar -->
<x-view-avatar value="User" :settings="['size' => 'xs']" />

<!-- Small avatar -->
<x-view-avatar value="User" :settings="['size' => 'sm']" />

<!-- Default size -->
<x-view-avatar value="User" :settings="['size' => 'md']" />

<!-- Large avatar -->
<x-view-avatar value="User" :settings="['size' => 'lg']" />

<!-- Extra large avatar -->
<x-view-avatar value="User" :settings="['size' => 'xl']" />
```

### Shape Options

```blade
<!-- Circular avatar (default) -->
<x-view-avatar value="User" :settings="['shape' => 'circle']" />

<!-- Rounded square avatar -->
<x-view-avatar value="User" :settings="['shape' => 'rounded']" />
```

### Image Configuration

```blade
<!-- Avatar with custom image -->
<x-view-avatar 
    value="John Doe" 
    :settings="['image' => '/avatars/john.jpg']" 
/>

<!-- Avatar with image and custom size -->
<x-view-avatar 
    value="Jane Smith" 
    :settings="[
        'image' => '/avatars/jane.jpg',
        'size' => 'lg',
        'shape' => 'rounded'
    ]" 
/>
```

### Text Label Configuration

```blade
<!-- Avatar with custom text label -->
<x-view-avatar 
    value="User" 
    :settings="['label' => 'JD']" 
/>

<!-- Avatar with custom text and size -->
<x-view-avatar 
    value="User" 
    :settings="[
        'label' => 'JS',
        'size' => 'xl',
        'shape' => 'circle'
    ]" 
/>
```

## Avatar Types

### Image-Based Avatars

When an image is provided in settings, the component displays the image:

```blade
@php
$user = [
    'name' => 'John Doe',
    'avatar' => '/avatars/john.jpg'
];
@endphp

<x-view-avatar 
    value="{{ $user['name'] }}" 
    :settings="['image' => $user['avatar']]" 
/>
```

### Text-Based Avatars

When no image is provided, the component displays text initials:

```blade
<!-- Default text (first letter of value) -->
<x-view-avatar value="John Doe" />

<!-- Custom text label -->
<x-view-avatar 
    value="John Doe" 
    :settings="['label' => 'JD']" 
/>
```

### Fallback Behavior

The component automatically handles fallbacks:

```blade
<!-- If image fails to load, shows text fallback -->
<x-view-avatar 
    value="John Doe" 
    :settings="[
        'image' => '/broken-image.jpg',
        'label' => 'JD'
    ]" 
/>
```

## Advanced Usage

### Dynamic Avatar Configuration

```blade
@php
$avatarConfig = [
    'size' => $user->isAdmin() ? 'lg' : 'md',
    'shape' => $user->prefersRounded() ? 'rounded' : 'circle',
    'image' => $user->avatar_url,
    'label' => $user->initials
];
@endphp

<x-view-avatar 
    value="{{ $user->name }}" 
    :settings="$avatarConfig" 
/>
```

### Conditional Avatar Display

```blade
@if($user->hasAvatar())
    <x-view-avatar 
        value="{{ $user->name }}" 
        :settings="['image' => $user->avatar_url]" 
    />
@else
    <x-view-avatar 
        value="{{ $user->name }}" 
        :settings="['label' => $user->initials]" 
    />
@endif
```

### Avatar with Additional Information

```blade
<x-view-avatar 
    value="{{ $user->name }}" 
    icon="user" 
    label="Profile: " 
    :settings="[
        'image' => $user->avatar_url,
        'size' => 'lg',
        'shape' => 'circle'
    ]"
    copy
/>
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-avatar 
    value="User" 
    class="my-custom-avatar" 
/>

<!-- Multiple classes -->
<x-view-avatar 
    value="User" 
    class="avatar-highlight avatar-border" 
/>
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-avatar 
    value="User" 
    style="border: 2px solid #007bff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" 
/>
```

### Responsive Design

```blade
<!-- Responsive avatar -->
<x-view-avatar 
    value="User" 
    class="avatar-responsive" 
/>
```

## Integration Examples

### User Profile Display

```blade
<div class="user-profile">
    <x-view-avatar 
        value="{{ $user->name }}" 
        icon="user" 
        label="User: " 
        :settings="[
            'image' => $user->avatar_url,
            'size' => 'lg',
            'shape' => 'circle'
        ]"
    />
    <div class="user-details">
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->email }}</p>
    </div>
</div>
```

### User List with Avatars

```blade
<div class="user-list">
    @foreach($users as $user)
        <div class="user-item">
            <x-view-avatar 
                value="{{ $user->name }}" 
                :settings="[
                    'image' => $user->avatar_url,
                    'size' => 'md',
                    'shape' => 'circle'
                ]"
            />
            <span class="user-name">{{ $user->name }}</span>
        </div>
    @endforeach
</div>
```

### Team Member Display

```blade
<div class="team-members">
    @foreach($team as $member)
        <div class="team-member">
            <x-view-avatar 
                value="{{ $member->name }}" 
                icon="users" 
                :settings="[
                    'image' => $member->avatar_url,
                    'size' => 'sm',
                    'shape' => 'rounded'
                ]"
            />
            <div class="member-info">
                <strong>{{ $member->name }}</strong>
                <small>{{ $member->role }}</small>
            </div>
        </div>
    @endforeach
</div>
```

### Comment System

```blade
<div class="comment">
    <x-view-avatar 
        value="{{ $comment->author->name }}" 
        :settings="[
            'image' => $comment->author->avatar_url,
            'size' => 'sm',
            'shape' => 'circle'
        ]"
    />
    <div class="comment-content">
        <strong>{{ $comment->author->name }}</strong>
        <p>{{ $comment->content }}</p>
        <small>{{ $comment->created_at->diffForHumans() }}</small>
    </div>
</div>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_avatar()
{
    $view = $this->blade('<x-view-avatar value="Test User" />');
    
    $view->assertSee('Test User');
    $view->assertSee('avatar');
}
```

### Image Avatar Test

```php
/** @test */
public function it_renders_avatar_with_image()
{
    $view = $this->blade('<x-view-avatar value="User" :settings="[\'image\' => \'/avatar.jpg\']" />');
    
    $view->assertSee('User');
    $view->assertSee('background-image: url(/avatar.jpg)');
}
```

### Size Configuration Test

```php
/** @test */
public function it_renders_avatar_with_custom_size()
{
    $view = $this->blade('<x-view-avatar value="User" :settings="[\'size\' => \'lg\']" />');
    
    $view->assertSee('User');
    $view->assertSee('avatar-lg');
}
```

### Shape Configuration Test

```php
/** @test */
public function it_renders_avatar_with_custom_shape()
{
    $view = $this->blade('<x-view-avatar value="User" :settings="[\'shape\' => \'rounded\']" />');
    
    $view->assertSee('User');
    $view->assertSee('rounded');
    $view->assertDontSee('rounded-circle');
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_avatar_with_icon()
{
    $view = $this->blade('<x-view-avatar value="User" icon="user" />');
    
    $view->assertSee('User');
    $view->assertSee('user');
    $view->assertSee('me-1');
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_avatar_with_copy_functionality()
{
    $view = $this->blade('<x-view-avatar value="Copy Me" copy />');
    
    $view->assertSee('Copy Me');
    $view->assertSee('copy');
    $view->assertSee('data-clipboard="Copy Me"');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-avatar 
    value="John Doe" 
    aria-label="Profile picture of John Doe"
    role="img"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-avatar 
    value="Jane Smith" 
    aria-label="Avatar for Jane Smith"
    role="img"
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

1. **Avatar not displaying**: Ensure the `value` prop is not null or empty
2. **Image not showing**: Verify the image path is correct and accessible
3. **Size not applying**: Check if the size value matches Bootstrap avatar classes
4. **Shape not working**: Verify the shape value is either 'circle' or 'rounded'
5. **Icon not showing**: Check if the icon name exists in your icon set
6. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-avatar value="Debug" :debug="true" />
```

## Related Components

- **View User** - For complete user information display
- **View Badge** - For simple user indicators
- **View Status** - For user status indicators
- **Avatar** - Base avatar component
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic avatar functionality
- Image and text avatar support
- Size and shape configuration
- Icon integration
- Copy functionality
- Settings-based configuration

## Contributing

When contributing to the View Avatar component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various image formats and sizes

## Support

For support and questions about the View Avatar component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
