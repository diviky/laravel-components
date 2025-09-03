# View Tags Component

The `View Tags` component is a collection display component that renders multiple tags with intelligent limiting and overflow indication. It leverages the individual `View Tag` component to display each tag while providing a clean interface for managing large collections of tags.

## Overview

The View Tags component provides an efficient way to display collections of tags with built-in pagination and overflow handling. It automatically limits the number of displayed tags and shows a count of remaining tags when the limit is exceeded. This component is perfect for displaying user interests, categories, skills, or any other tag-based collections where space constraints require limiting the visible items.

## Basic Usage

```blade
<!-- Basic tags collection -->
<x-view-tags :values="$user->tags" />

<!-- Tags with custom limit -->
<x-view-tags :values="$categories" :limit="5" />

<!-- Tags with custom styling -->
<x-view-tags :values="$technologies" class="tech-tags" />
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `values` | `array` | Array of values to display as tags |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `limit` | `integer` | `10` | Maximum number of tags to display before showing overflow |

## Data Structure

The component expects an array of values that can be either:

### Simple String Values

```blade
@php
$tags = ['PHP', 'Laravel', 'Vue.js', 'React', 'MySQL'];
@endphp

<x-view-tags :values="$tags" />
```

### Array/Object Values

```blade
@php
$technologies = [
    ['name' => 'Laravel', 'color' => 'success'],
    ['name' => 'Vue.js', 'color' => 'info'],
    ['name' => 'React', 'color' => 'primary'],
    ['name' => 'Angular', 'color' => 'danger']
];
@endphp

<x-view-tags :values="$technologies" />
```

### Complex Objects

```blade
@php
$skills = [
    (object) ['name' => 'Backend Development', 'level' => 'Expert', 'color' => 'success'],
    (object) ['name' => 'Frontend Development', 'level' => 'Advanced', 'color' => 'info'],
    (object) ['name' => 'DevOps', 'level' => 'Intermediate', 'color' => 'warning']
];
@endphp

<x-view-tags :values="$skills" />
```

## Limit and Overflow

### Default Limit (10 tags)

```blade
<!-- Shows first 10 tags, then "+ X more" -->
<x-view-tags :values="$largeTagCollection" />
```

### Custom Limit

```blade
<!-- Show only 5 tags -->
<x-view-tags :values="$tags" :limit="5" />

<!-- Show 20 tags -->
<x-view-tags :values="$tags" :limit="20" />
```

### Overflow Display

When the limit is exceeded, the component automatically shows:

```blade
<!-- If you have 15 tags with limit="10" -->
<!-- Shows: Tag1 Tag2 Tag3 ... Tag10 + 5 -->
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-tags :values="$tags" class="my-custom-tags" />

<!-- Multiple classes -->
<x-view-tags :values="$tags" class="tags-container tags-responsive" />
```

### Inline Styles

```blade
<!-- Custom styling -->
<x-view-tags 
    :values="$tags" 
    style="background: #f8f9fa; padding: 20px; border-radius: 8px;" 
/>
```

### Responsive Design

```blade
<!-- Responsive tags container -->
<x-view-tags :values="$tags" class="tags-responsive" />
```

## Advanced Usage

### Dynamic Limit Based on Screen Size

```blade
@php
$limit = request()->isMobile() ? 5 : 10;
@endphp

<x-view-tags :values="$tags" :limit="$limit" />
```

### Conditional Rendering

```blade
@if($user->tags->count() > 0)
    <x-view-tags :values="$user->tags" :limit="8" />
@else
    <span class="text-muted">No tags assigned</span>
@endif
```

### With Custom Tag Attributes

```blade
<x-view-tags 
    :values="$technologies" 
    :limit="6"
    icon="code"
    copy
    class="tech-stack-tags"
/>
```

## Integration Examples

### User Profile Tags

```blade
<div class="user-profile">
    <h3>Skills & Interests</h3>
    <x-view-tags 
        :values="$user->skills" 
        :limit="8"
        class="profile-tags"
    />
</div>
```

### Project Categories

```blade
<div class="project-categories">
    <h4>Categories</h4>
    <x-view-tags 
        :values="$project->categories" 
        :limit="5"
        class="category-tags"
    />
</div>
```

### Technology Stack

```blade
<div class="tech-stack">
    <h4>Technologies Used</h4>
    <x-view-tags 
        :values="$technologies" 
        :limit="12"
        icon="code"
        copy
        class="tech-tags"
    />
</div>
```

### Blog Post Tags

```blade
<div class="blog-post-tags">
    <x-view-tags 
        :values="$post->tags" 
        :limit="6"
        class="post-tags"
    />
</div>
```

### User Roles and Permissions

```blade
<div class="user-permissions">
    <h4>Roles & Permissions</h4>
    <x-view-tags 
        :values="$user->roles" 
        :limit="4"
        icon="shield"
        class="role-tags"
    />
</div>
```

## Performance Considerations

### Large Collections

For very large tag collections, consider implementing server-side pagination:

```blade
@php
// Server-side pagination
$tags = $user->tags()->paginate(20);
@endphp

<x-view-tags :values="$tags->items()" :limit="15" />
```

### Lazy Loading

```blade
@php
// Lazy load tags
$tags = $user->tags()->take(50)->get();
@endphp

<x-view-tags :values="$tags" :limit="20" />
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_tags_collection()
{
    $tags = ['PHP', 'Laravel', 'Vue.js'];
    $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);
    
    $view->assertSee('PHP');
    $view->assertSee('Laravel');
    $view->assertSee('Vue.js');
}
```

### Limit Test

```php
/** @test */
public function it_respects_limit_prop()
{
    $tags = range(1, 15);
    $view = $this->blade('<x-view-tags :values="$tags" :limit="5" />', ['tags' => $tags]);
    
    $view->assertSee('1');
    $view->assertSee('5');
    $view->assertSee('+ 10');
    $view->assertDontSee('6');
}
```

### Empty Collection Test

```php
/** @test */
public function it_handles_empty_collection()
{
    $view = $this->blade('<x-view-tags :values="[]" />');
    
    $view->assertDontSee('x-view-tags');
}
```

### Array Values Test

```php
/** @test */
public function it_renders_array_values()
{
    $tags = [
        ['name' => 'Laravel', 'color' => 'success'],
        ['name' => 'Vue.js', 'color' => 'info']
    ];
    $view = $this->blade('<x-view-tags :values="$tags" />', ['tags' => $tags]);
    
    $view->assertSee('Laravel');
    $view->assertSee('Vue.js');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-tags 
    :values="$tags" 
    aria-label="User skills and interests"
    role="list"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-tags 
    :values="$tags" 
    aria-label="Project technology stack"
    role="list"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Efficient array iteration with early break on limit
- Minimal DOM manipulation
- Leverages existing View Tag component for individual tag rendering
- Automatic overflow calculation

## Troubleshooting

### Common Issues

1. **Tags not displaying**: Ensure the `values` prop is an array and not empty
2. **Limit not working**: Verify the `limit` prop is a positive integer
3. **Overflow not showing**: Check if the collection size exceeds the limit
4. **Individual tag styling**: Customize through the View Tag component props

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-tags :values="$tags" :debug="true" />
```

## Related Components

- **View Tag** - Individual tag component used internally
- **View Badge** - Alternative display for simple badges
- **View Status** - For status indicators
- **Form Tags** - For tag input functionality

## Changelog

### Version 1.0.0
- Initial release
- Basic tags collection functionality
- Limit and overflow support
- Integration with View Tag component
- Responsive design support

## Contributing

When contributing to the View Tags component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various collection sizes and types

## Support

For support and questions about the View Tags component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
