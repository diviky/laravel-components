# View Empty Component

The `View Empty` component is a sophisticated empty state display component that provides a visually appealing and informative way to show when there's no content to display. It features a built-in SVG illustration, customizable title and subtitle, and support for action buttons through slots.

## Overview

The View Empty component is designed to handle empty states gracefully across your application. It provides a professional, user-friendly interface when there are no results, no data, or when content is not yet available. The component includes a built-in computer fix illustration that automatically adapts to light/dark themes and supports custom content through slots.

## Basic Usage

```blade
<!-- Basic empty state -->
<x-view-empty />

<!-- Custom title and subtitle -->
<x-view-empty 
    title="No projects found" 
    subtitle="Get started by creating your first project." 
/>

<!-- With action buttons -->
<x-view-empty 
    title="No data available" 
    subtitle="Click the button below to add some data."
>
    <x-button>Add Data</x-button>
</x-view-empty>
```

## Component Props

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string` | `'No results found'` | The main title to display |
| `subtitle` | `string` | `"Try adjusting your search or filter to find what you're looking for."` | The subtitle text below the title |

### Slot Content

The component supports a default slot for action buttons or additional content:

```blade
<x-view-empty>
    <!-- Action buttons, forms, or other content -->
    <x-button>Create New</x-button>
    <x-button variant="outline">Import Data</x-button>
</x-view-empty>
```

## Built-in Features

### Automatic Theme Support

The component automatically detects and adapts to light/dark themes:

```blade
<!-- Automatically adapts to theme -->
<x-view-empty />
```

### Responsive Design

The component is fully responsive and works on all device sizes:

```blade
<!-- Responsive empty state -->
<x-view-empty class="my-responsive-empty" />
```

### Built-in Illustration

The component includes a professional SVG illustration that represents a "computer fix" scenario, perfect for technical applications.

## Advanced Usage

### Custom Styling

```blade
<!-- Custom CSS classes -->
<x-view-empty 
    title="No items found" 
    subtitle="Start building your collection."
    class="my-custom-empty custom-border" 
/>

<!-- Inline styles -->
<x-view-empty 
    title="Empty state" 
    subtitle="Custom styling applied."
    style="background: #f8f9fa; border-radius: 8px;" 
/>
```

### Dynamic Content

```blade
@php
    $emptyConfig = [
        'title' => $hasFilters ? 'No results match your filters' : 'No data available',
        'subtitle' => $hasFilters ? 'Try adjusting your search criteria.' : 'Get started by adding some data.'
    ];
@endphp

<x-view-empty 
    :title="$emptyConfig['title']" 
    :subtitle="$emptyConfig['subtitle']"
>
    @if($hasFilters)
        <x-button variant="outline">Clear Filters</x-button>
    @else
        <x-button>Add Data</x-button>
    @endif
</x-view-empty>
```

### Conditional Actions

```blade
<x-view-empty 
    title="No projects found" 
    subtitle="Create your first project to get started."
>
    @if($user->can('create', 'project'))
        <x-button>Create Project</x-button>
    @else
        <x-button variant="outline" disabled>Contact Admin</x-button>
    @endif
</x-view-empty>
```

## Integration Examples

### Search Results Empty State

```blade
@if($searchResults->isEmpty())
    <x-view-empty 
        title="No search results found" 
        subtitle="Try adjusting your search terms or browse our categories."
    >
        <div class="d-flex gap-2">
            <x-button variant="outline">Clear Search</x-button>
            <x-button>Browse Categories</x-button>
        </div>
    </x-view-empty>
@else
    <!-- Display search results -->
@endif
```

### Data Table Empty State

```blade
@if($users->isEmpty())
    <x-view-empty 
        title="No users found" 
        subtitle="Get started by inviting team members to your organization."
    >
        <x-button>Invite User</x-button>
        <x-button variant="outline">Import Users</x-button>
    </x-view-empty>
@else
    <!-- Display user table -->
@endif
```

### Project Dashboard Empty State

```blade
@if($projects->isEmpty())
    <x-view-empty 
        title="No projects yet" 
        subtitle="Create your first project to start organizing your work."
    >
        <div class="d-flex flex-column gap-2">
            <x-button size="lg">Create Project</x-button>
            <x-button variant="outline">View Templates</x-button>
        </div>
    </x-view-empty>
@else
    <!-- Display project dashboard -->
@endif
```

### File Manager Empty State

```blade
@if($files->isEmpty())
    <x-view-empty 
        title="No files uploaded" 
        subtitle="Upload your first file to get started with file management."
    >
        <div class="d-flex gap-2">
            <x-button>Upload File</x-button>
            <x-button variant="outline">Create Folder</x-button>
        </div>
    </x-view-empty>
@else
    <!-- Display file list -->
@endif
```

### Notification Center Empty State

```blade
@if($notifications->isEmpty())
    <x-view-empty 
        title="All caught up!" 
        subtitle="You have no new notifications at the moment."
    >
        <x-button variant="outline">View All</x-button>
    </x-view-empty>
@else
    <!-- Display notifications -->
@endif
```

### Shopping Cart Empty State

```blade
@if($cart->isEmpty())
    <x-view-empty 
        title="Your cart is empty" 
        subtitle="Add some items to get started with your shopping."
    >
        <x-button>Continue Shopping</x-button>
        <x-button variant="outline">View Wishlist</x-button>
    </x-view-empty>
@else
    <!-- Display cart items -->
@endif
```

### Analytics Dashboard Empty State

```blade
@if($analyticsData->isEmpty())
    <x-view-empty 
        title="No analytics data yet" 
        subtitle="Start collecting data to see insights and trends."
    >
        <div class="d-flex gap-2">
            <x-button>Set Up Tracking</x-button>
            <x-button variant="outline">View Documentation</x-button>
        </div>
    </x-view-empty>
@else
    <!-- Display analytics charts -->
@endif
```

## Styling and Customization

### Custom CSS Classes

```blade
<!-- Add custom classes -->
<x-view-empty 
    title="Custom styled" 
    subtitle="With custom CSS classes"
    class="my-custom-empty empty-highlight" 
/>
```

### CSS Customization

You can customize the appearance using CSS:

```css
/* Custom empty state styling */
.my-custom-empty {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 16px;
    padding: 2rem;
}

.my-custom-empty .empty-title {
    color: white;
    font-weight: 600;
}

.my-custom-empty .empty-subtitle {
    color: rgba(255, 255, 255, 0.8);
}

.my-custom-empty .empty-img {
    filter: brightness(0) invert(1);
}
```

### Responsive Design

```blade
<!-- Responsive empty state -->
<x-view-empty 
    title="Responsive design" 
    subtitle="Adapts to all screen sizes"
    class="empty-responsive" 
/>
```

## Testing

### Basic Rendering Test

```php
/** @test */
public function it_renders_basic_empty_state()
{
    $view = $this->blade('<x-view-empty />');
    
    $view->assertSee('No results found');
    $view->assertSee('Try adjusting your search or filter to find what you\'re looking for.');
    $view->assertSee('empty');
}
```

### Custom Title Test

```php
/** @test */
public function it_renders_empty_state_with_custom_title()
{
    $view = $this->blade('<x-view-empty title="Custom Title" />');
    
    $view->assertSee('Custom Title');
    $view->assertSee('empty');
}
```

### Custom Subtitle Test

```php
/** @test */
public function it_renders_empty_state_with_custom_subtitle()
{
    $view = $this->blade('<x-view-empty subtitle="Custom subtitle" />');
    
    $view->assertSee('Custom subtitle');
    $view->assertSee('empty');
}
```

### Slot Content Test

```php
/** @test */
public function it_renders_empty_state_with_slot_content()
{
    $view = $this->blade('<x-view-empty><button>Action</button></x-view-empty>');
    
    $view->assertSee('Action');
    $view->assertSee('empty');
}
```

### Custom Classes Test

```php
/** @test */
public function it_renders_empty_state_with_custom_classes()
{
    $view = $this->blade('<x-view-empty class="custom-class" />');
    
    $view->assertSee('custom-class');
    $view->assertSee('empty');
}
```

### Custom ID Test

```php
/** @test */
public function it_renders_empty_state_with_custom_id()
{
    $view = $this->blade('<x-view-empty id="empty-1" />');
    
    $view->assertSee('id="empty-1"');
    $view->assertSee('empty');
}
```

### Data Attributes Test

```php
/** @test */
public function it_renders_empty_state_with_data_attributes()
{
    $view = $this->blade('<x-view-empty data-test="empty-component" data-type="display-empty" />');
    
    $view->assertSee('data-test="empty-component"');
    $view->assertSee('data-type="display-empty"');
    $view->assertSee('empty');
}
```

### ARIA Attributes Test

```php
/** @test */
public function it_renders_empty_state_with_aria_attributes()
{
    $view = $this->blade('<x-view-empty aria-label="Empty state display" aria-describedby="empty-description" />');
    
    $view->assertSee('aria-label="Empty state display"');
    $view->assertSee('aria-describedby="empty-description"');
    $view->assertSee('empty');
}
```

### Role Attribute Test

```php
/** @test */
public function it_renders_empty_state_with_role_attribute()
{
    $view = $this->blade('<x-view-empty role="region" />');
    
    $view->assertSee('role="region"');
    $view->assertSee('empty');
}
```

### Inline Styles Test

```php
/** @test */
public function it_renders_empty_state_with_inline_styles()
{
    $view = $this->blade('<x-view-empty style="background: #f8f9fa;" />');
    
    $view->assertSee('style="background: #f8f9fa;"');
    $view->assertSee('empty');
}
```

### Tabindex Test

```php
/** @test */
public function it_renders_empty_state_with_tabindex()
{
    $view = $this->blade('<x-view-empty tabindex="0" />');
    
    $view->assertSee('tabindex="0"');
    $view->assertSee('empty');
}
```

### All Features Test

```php
/** @test */
public function it_renders_empty_state_with_all_features()
{
    $view = $this->blade('<x-view-empty title="Custom Title" subtitle="Custom subtitle" class="custom-class" id="empty-1" />');
    
    $view->assertSee('Custom Title');
    $view->assertSee('Custom subtitle');
    $view->assertSee('custom-class');
    $view->assertSee('id="empty-1"');
    $view->assertSee('empty');
}
```

## Accessibility

### ARIA Labels

```blade
<!-- With ARIA label -->
<x-view-empty 
    title="No data available" 
    subtitle="Start by adding some data."
    aria-label="Empty state for data section"
    role="region"
/>
```

### Screen Reader Support

```blade
<!-- Screen reader friendly -->
<x-view-empty 
    title="No results found" 
    subtitle="Try adjusting your search criteria."
    aria-label="Search results empty state"
    role="region"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Lightweight component with minimal DOM manipulation
- SVG illustration is inline and optimized
- No JavaScript dependencies
- Efficient theme detection through CSS

## Troubleshooting

### Common Issues

1. **Empty state not displaying**: Ensure the component is properly closed and has valid content
2. **Styling not applying**: Check if custom CSS classes are properly defined
3. **Theme not adapting**: Verify that your CSS theme variables are properly set
4. **Slot content not showing**: Ensure the slot content is properly placed between opening and closing tags

### Debug Mode

```blade
<!-- Enable debug mode -->
<x-view-empty :debug="true" />
```

## Related Components

- **View Status** - For status information display
- **View Badge** - For status indicators
- **View Tag** - For individual tag display
- **View Tags** - For multiple tag display
- **Alert** - For alert messages
- **Card** - For content containers

## Changelog

### Version 1.0.0
- Initial release
- Basic empty state display functionality
- Built-in SVG illustration with theme support
- Customizable title and subtitle
- Slot support for action buttons
- Responsive design
- Automatic theme detection

## Contributing

When contributing to the View Empty component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various content types and themes

## Support

For support and questions about the View Empty component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
