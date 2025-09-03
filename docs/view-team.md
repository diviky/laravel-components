# View Team Component

The `View Team` component is a sophisticated display component for rendering team member information with integrated avatar support, featuring customizable sizes, shapes, compact mode, icon integration, label display, and copy-to-clipboard functionality.

## Overview

The View Team component provides a comprehensive way to display team member information including avatars, names, and other team details. It can handle both image-based avatars (with fallback to text initials) and text-based avatars, with configurable sizes and shapes. The component integrates seamlessly with the icon system and provides copy functionality for enhanced user experience.

## Basic Usage

```blade
<!-- Basic team member display with default settings -->
<x-view-team :value="['name' => 'John Doe', 'avatar' => '/avatars/john.jpg']" />

<!-- Team member with custom size and shape -->
<x-view-team 
    :value="['name' => 'Jane Smith', 'avatar' => '/avatars/jane.jpg']" 
    size="lg" 
    shape="rounded" 
/>

<!-- Compact team member display (no name) -->
<x-view-team 
    :value="['name' => 'Admin User', 'avatar' => '/avatars/admin.jpg']" 
    compact 
/>

<!-- Team member with icon and label -->
<x-view-team 
    :value="['name' => 'Moderator', 'avatar' => '/avatars/moderator.jpg']" 
    icon="users" 
    label="Team: " 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `array` | Array containing team member information (name, avatar) |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the team member |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `size` | `string` | `'xs'` | Avatar size (xs, sm, md, lg, xl) |
| `shape` | `string` | `'circle'` | Avatar shape (circle, rounded) |
| `compact` | `boolean` | `false` | Hide team member name for compact display |
| `settings` | `array` | `[]` | Additional settings array |

## Data Structure

The `value` array should contain the following keys:

```php
$teamMember = [
    'name' => 'John Doe',        // Required: Team member's display name
    'avatar' => '/path/to/avatar.jpg',  // Optional: Avatar image URL
];
```

## Avatar Configuration

### Size Options

```blade
<!-- Extra small avatar -->
<x-view-team :value="$teamMember" size="xs" />

<!-- Small avatar -->
<x-view-team :value="$teamMember" size="sm" />

<!-- Default size -->
<x-view-team :value="$teamMember" size="md" />

<!-- Large avatar -->
<x-view-team :value="$teamMember" size="lg" />

<!-- Extra large avatar -->
<x-view-team :value="$teamMember" size="xl" />
```

### Shape Options

```blade
<!-- Circular avatar (default) -->
<x-view-team :value="$teamMember" shape="circle" />

<!-- Rounded square avatar -->
<x-view-team :value="$teamMember" shape="rounded" />
```

### Settings Override

The `settings` array can override the default size and shape:

```blade
<!-- Override with settings -->
<x-view-team 
    :value="$teamMember" 
    :settings="['size' => 'lg', 'shape' => 'rounded']" 
/>
```

## Display Modes

### Full Display (Default)

Shows avatar, name, and all configured elements:

```blade
<x-view-team :value="$teamMember" />
<!-- Renders: [Icon] [Label] [Avatar] John Doe [Copy Icon] -->
```

### Compact Display

Hides the team member name for space-constrained layouts:

```blade
<x-view-team :value="$teamMember" compact />
<!-- Renders: [Icon] [Label] [Avatar] [Copy Icon] -->
```

## Avatar Handling

### Image-Based Avatars

When an avatar image is provided:

```blade
@php
$teamMember = [
    'name' => 'John Doe',
    'avatar' => '/avatars/john.jpg'
];
@endphp

<x-view-team :value="$teamMember" />
```

### Text-Based Avatars

When no avatar image is provided, shows text initials:

```blade
@php
$teamMember = [
    'name' => 'John Doe'
];
@endphp

<x-view-team :value="$teamMember" />
<!-- Shows text 'John Doe' if no avatar -->
```

### Fallback Behavior

The component automatically handles fallbacks:

```blade
@php
$teamMember = [
    'name' => 'John Doe',
    'avatar' => '/broken-image.jpg'
];
@endphp

<x-view-team :value="$teamMember" />
<!-- Shows text 'John Doe' if image fails to load -->
```

## Advanced Usage

### Dynamic Configuration

```blade
@php
$teamConfig = [
    'size' => $teamMember->isLead() ? 'lg' : 'md',
    'shape' => $teamMember->prefersRounded() ? 'rounded' : 'circle',
    'compact' => $isCompactLayout
];
@endphp

<x-view-team 
    :value="$teamMember" 
    :settings="$teamConfig" 
/>
```

### Conditional Display

```blade
@if($teamMember->hasAvatar())
    <x-view-team 
        :value="[
            'name' => $teamMember->name,
            'avatar' => $teamMember->avatar_url
        ]" 
    />
@else
    <x-view-team 
        :value="[
            'name' => $teamMember->name
        ]" 
    />
@endif
```

### Team Member with Additional Information

```blade
<x-view-team 
    :value="[
        'name' => $teamMember->name,
        'avatar' => $teamMember->avatar_url
    ]" 
    icon="users" 
    label="Team Member: " 
    size="lg"
    shape="circle"
    copy
/>
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-team 
    :value="$teamMember" 
    class="my-custom-team" 
/>

<!-- Multiple classes -->
<x-view-team 
    :value="$teamMember" 
    class="team-highlight team-border" 
/>
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-team 
    :value="$teamMember" 
    style="background: #f8f9fa; padding: 10px; border-radius: 8px;" 
/>
```

### Responsive Design

```blade
<!-- Responsive team display -->
<x-view-team 
    :value="$teamMember" 
    class="team-responsive" 
/>
```

## Integration Examples

### Team Member Profile Display

```blade
<div class="team-profile">
    <x-view-team 
        :value="[
            'name' => $teamMember->name,
            'avatar' => $teamMember->avatar_url
        ]" 
        icon="users" 
        label="Team Member: " 
        size="lg"
        shape="circle"
    />
    <div class="team-details">
        <h3>{{ $teamMember->name }}</h3>
        <p>{{ $teamMember->role }}</p>
        <small>{{ $teamMember->department }}</small>
    </div>
</div>
```

### Team List with Avatars

```blade
<div class="team-list">
    @foreach($teamMembers as $member)
        <div class="team-item">
            <x-view-team 
                :value="[
                    'name' => $member->name,
                    'avatar' => $member->avatar_url
                ]" 
                size="md"
                shape="circle"
            />
            <span class="team-role">{{ $member->role }}</span>
        </div>
    @endforeach
</div>
```

### Compact Team Grid

```blade
<div class="team-grid">
    @foreach($teamMembers as $member)
        <div class="team-card">
            <x-view-team 
                :value="[
                    'name' => $member->name,
                    'avatar' => $member->avatar_url
                ]" 
                compact
                size="lg"
                shape="rounded"
            />
            <div class="team-info">
                <strong>{{ $member->name }}</strong>
                <small>{{ $member->department }}</small>
            </div>
        </div>
    @endforeach
</div>
```

### Project Team Display

```blade
<div class="project-team">
    <h4>Project Team</h4>
    @foreach($project->teamMembers as $member)
        <div class="team-member">
            <x-view-team 
                :value="[
                    'name' => $member->name,
                    'avatar' => $member->avatar_url
                ]" 
                size="sm"
                shape="circle"
                copy
            />
            <div class="member-info">
                <strong>{{ $member->name }}</strong>
                <small>{{ $member->role }}</small>
            </div>
        </div>
    @endforeach
</div>
```

### Department Team Display

```blade
<div class="department-team">
    <h3>{{ $department->name }} Team</h3>
    @foreach($department->members as $member)
        <div class="department-member">
            <x-view-team 
                :value="[
                    'name' => $member->name,
                    'avatar' => $member->avatar_url
                ]" 
                icon="users" 
                size="md"
                shape="circle"
            />
            <div class="member-details">
                <strong>{{ $member->name }}</strong>
                <small>{{ $member->position }}</small>
            </div>
        </div>
    @endforeach
</div>
```

### Team Lead Display

```blade
<div class="team-lead">
    <h4>Team Lead</h4>
    <x-view-team 
        :value="[
            'name' => $teamLead->name,
            'avatar' => $teamLead->avatar_url
        ]" 
        icon="crown" 
        label="Lead: " 
        size="lg"
        shape="circle"
        copy
    />
    <div class="lead-info">
        <p>{{ $teamLead->bio }}</p>
        <small>Experience: {{ $teamLead->experience }} years</small>
    </div>
</div>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_team_member()
{
    $teamMember = ['name' => 'Test User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
    
    $view->assertSee('Test User');
    $view->assertSee('avatar');
}
```

### Avatar Image Test

```php
/** @test */
public function it_renders_team_member_with_avatar()
{
    $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
    
    $view->assertSee('User');
    $view->assertSee('background-image: url(/avatar.jpg)');
}
```

### Size Configuration Test

```php
/** @test */
public function it_renders_team_member_with_custom_size()
{
    $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" size="lg" />', ['teamMember' => $teamMember]);
    
    $view->assertSee('User');
    $view->assertSee('avatar-lg');
}
```

### Shape Configuration Test

```php
/** @test */
public function it_renders_team_member_with_custom_shape()
{
    $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" shape="rounded" />', ['teamMember' => $teamMember]);
    
    $view->assertSee('User');
    $view->assertSee('rounded');
    $view->assertDontSee('rounded-circle');
}
```

### Compact Mode Test

```php
/** @test */
public function it_renders_team_member_in_compact_mode()
{
    $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" compact />', ['teamMember' => $teamMember]);
    
    $view->assertSee('avatar');
    $view->assertDontSee('User');
}
```

### Icon Integration Test

```php
/** @test */
public function it_renders_team_member_with_icon()
{
    $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" icon="users" />', ['teamMember' => $teamMember]);
    
    $view->assertSee('User');
    $view->assertSee('users');
    $view->assertSee('me-1');
}
```

### Copy Functionality Test

```php
/** @test */
public function it_renders_team_member_with_copy_functionality()
{
    $teamMember = ['name' => 'Copy Me', 'avatar' => '/avatar.jpg'];
    $view = $this->blade('<x-view-team :value="$teamMember" copy />', ['teamMember' => $teamMember]);
    
    $view->assertSee('Copy Me');
    $view->assertSee('copy');
    $view->assertSee('data-clipboard');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-team 
    :value="$teamMember" 
    aria-label="Team member profile for John Doe"
    role="article"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-team 
    :value="$teamMember" 
    aria-label="Team member avatar and name for John Doe"
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

1. **Team member not displaying**: Ensure the `value` prop is an array with required keys
2. **Avatar not showing**: Verify the avatar path is correct and accessible
3. **Size not applying**: Check if the size value matches Bootstrap avatar classes
4. **Shape not working**: Verify the shape value is either 'circle' or 'rounded'
5. **Icon not showing**: Check if the icon name exists in your icon set
6. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-team :value="$teamMember" :debug="true" />
```

## Related Components

- **View Avatar** - For simple avatar display
- **View User** - For user information display
- **View Badge** - For team member status indicators
- **View Status** - For team member status display
- **Avatar** - Base avatar component
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic team member display functionality
- Avatar integration with fallback support
- Size and shape configuration
- Compact mode support
- Icon integration
- Copy functionality
- Settings-based configuration override

## Contributing

When contributing to the View Team component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various team member data structures

## Support

For support and questions about the View Team component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
