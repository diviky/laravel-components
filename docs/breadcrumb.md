# Breadcrumb Component

A navigation breadcrumb component with multiple styling options, Turbo integration, and comprehensive accessibility features for creating hierarchical navigation paths.

## Overview

**Component Type:** Navigation  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** None

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/breadcrumb/index.blade.php`
- **Sub-components:** `breadcrumb/item.blade.php`
- **Documentation:** `docs/breadcrumb.md`
- **Tests:** `tests/Components/BreadcrumbTest.php`

## Basic Usage

```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current Page" />
</x-breadcrumb>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| dots | boolean | false | Use dots as separators | `true` |
| arrows | boolean | true | Use arrows as separators | `false` |
| bullets | boolean | false | Use bullets as separators | `true` |
| turbo | boolean | true | Enable Turbo/PJAX support | `false` |
| design | string | null | Custom design variant | `'custom'` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Breadcrumb ID | `'main-breadcrumb'` |
| class | string | null | Additional CSS classes | `'custom-breadcrumb'` |

## Sub-components

### Breadcrumb Item (`<x-breadcrumb.item>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| active | boolean | false | Mark item as active/current | `true` |
| link | string | null | Direct link URL | `'/products'` |
| route | string | null | Laravel route name | `'products.index'` |
| label | string | null | Item label text | `'Products'` |

## Slots

### Default Slot
- **Purpose:** Breadcrumb items
- **Content Type:** Breadcrumb item components
- **Required:** Yes

## Usage Examples

### Basic Breadcrumb
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current Page" />
</x-breadcrumb>
```

### Breadcrumb with Route Names
```blade
<x-breadcrumb>
    <x-breadcrumb.item route="home" label="Home" />
    <x-breadcrumb.item route="products.index" label="Products" />
    <x-breadcrumb.item route="products.show" label="Product Details" />
    <x-breadcrumb.item active label="Edit Product" />
</x-breadcrumb>
```

### Breadcrumb with Custom Separators
```blade
<!-- Dots separator -->
<x-breadcrumb dots>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>

<!-- Bullets separator -->
<x-breadcrumb bullets>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>

<!-- No arrows -->
<x-breadcrumb :arrows="false">
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>
```

### Breadcrumb with Custom Design
```blade
<x-breadcrumb design="custom">
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>
```

### Breadcrumb without Turbo
```blade
<x-breadcrumb :turbo="false">
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>
```

### Breadcrumb with Custom Classes
```blade
<x-breadcrumb class="custom-breadcrumb shadow">
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>
```

### Breadcrumb with Custom Attributes
```blade
<x-breadcrumb 
    id="main-nav"
    data-testid="breadcrumb"
    aria-label="Main navigation">
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>
```

### Breadcrumb with Complex Items
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/">
        <i class="icon-home"></i>
        <span>Home</span>
    </x-breadcrumb.item>
    
    <x-breadcrumb.item href="/products">
        <i class="icon-package"></i>
        <span>Products</span>
    </x-breadcrumb.item>
    
    <x-breadcrumb.item active>
        <i class="icon-edit"></i>
        <span>Edit Product</span>
    </x-breadcrumb.item>
</x-breadcrumb>
```

### Livewire Integration
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/products" label="Products" />
    <x-breadcrumb.item 
        wire:click="goToCategory({{ $category->id }})"
        label="{{ $category->name }}" />
    <x-breadcrumb.item active label="Current" />
</x-breadcrumb>
```

## Features

### Separator Styles
- **Arrows (`arrows`):** Default arrow separators (→)
- **Dots (`dots`):** Dot separators (•)
- **Bullets (`bullets`):** Bullet separators (●)
- **Custom Design (`design`):** Custom separator styling

### Navigation Integration
- **Route Support:** Laravel route name integration
- **Direct Links:** Direct URL support
- **Turbo/PJAX:** Automatic Turbo integration
- **Active States:** Current page indication

### Accessibility Features
- **ARIA Labels:** Proper breadcrumb labeling
- **Semantic Structure:** Ordered list with proper items
- **Screen Reader Support:** Accessible navigation structure
- **Keyboard Navigation:** Full keyboard support

### Styling Options
- **Bootstrap Integration:** Uses Bootstrap breadcrumb styling
- **Custom Classes:** Additional CSS class support
- **Design Variants:** Multiple design options
- **Responsive Design:** Mobile-friendly navigation

## Common Patterns

### E-commerce Navigation
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/categories" label="Categories" />
    <x-breadcrumb.item href="/categories/electronics" label="Electronics" />
    <x-breadcrumb.item href="/categories/electronics/laptops" label="Laptops" />
    <x-breadcrumb.item active label="MacBook Pro" />
</x-breadcrumb>
```

### Admin Dashboard
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/admin" label="Dashboard" />
    <x-breadcrumb.item href="/admin/users" label="Users" />
    <x-breadcrumb.item href="/admin/users/{{ $user->id }}" label="{{ $user->name }}" />
    <x-breadcrumb.item active label="Edit Profile" />
</x-breadcrumb>
```

### Blog Navigation
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/blog" label="Blog" />
    <x-breadcrumb.item href="/blog/category/{{ $post->category->slug }}" label="{{ $post->category->name }}" />
    <x-breadcrumb.item active label="{{ $post->title }}" />
</x-breadcrumb>
```

### File Management
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/files" label="Files" />
    <x-breadcrumb.item href="/files/documents" label="Documents" />
    <x-breadcrumb.item href="/files/documents/projects" label="Projects" />
    <x-breadcrumb.item href="/files/documents/projects/2024" label="2024" />
    <x-breadcrumb.item active label="Q1 Report.pdf" />
</x-breadcrumb>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'breadcrumb' => [
        'view' => 'laravel-components::{framework}.breadcrumb.index',
    ],
    'breadcrumb.item' => [
        'view' => 'laravel-components::{framework}.breadcrumb.item',
    ],
],
```

## JavaScript Integration

### Custom Breadcrumb Behavior
```javascript
// Custom breadcrumb click handling
document.querySelectorAll('.breadcrumb-item a').forEach(link => {
    link.addEventListener('click', function(e) {
        // Custom navigation logic
        const href = this.getAttribute('href');
        const isActive = this.closest('.breadcrumb-item').classList.contains('active');
        
        if (!isActive) {
            // Handle navigation
            navigateTo(href);
        }
        
        e.preventDefault();
    });
});

// Breadcrumb with custom separators
function updateBreadcrumbSeparators(style) {
    const breadcrumb = document.querySelector('.breadcrumb');
    
    // Remove existing separator classes
    breadcrumb.classList.remove('breadcrumb-arrows', 'breadcrumb-dots', 'breadcrumb-bullets');
    
    // Add new separator class
    breadcrumb.classList.add(`breadcrumb-${style}`);
}
```

### Turbo Integration
```javascript
// Custom Turbo handling for breadcrumbs
document.addEventListener('turbo:load', function() {
    // Update breadcrumb on page load
    updateBreadcrumbFromCurrentPage();
});

function updateBreadcrumbFromCurrentPage() {
    const currentPath = window.location.pathname;
    const breadcrumb = document.querySelector('.breadcrumb');
    
    // Update breadcrumb based on current path
    const pathSegments = currentPath.split('/').filter(Boolean);
    
    // Clear existing items
    breadcrumb.innerHTML = '';
    
    // Add home item
    breadcrumb.appendChild(createBreadcrumbItem('/', 'Home'));
    
    // Add path segments
    let currentPath = '';
    pathSegments.forEach((segment, index) => {
        currentPath += `/${segment}`;
        const isLast = index === pathSegments.length - 1;
        
        breadcrumb.appendChild(createBreadcrumbItem(
            currentPath, 
            segment.charAt(0).toUpperCase() + segment.slice(1),
            isLast
        ));
    });
}

function createBreadcrumbItem(href, label, active = false) {
    const li = document.createElement('li');
    li.className = `breadcrumb-item${active ? ' active' : ''}`;
    
    if (!active) {
        const link = document.createElement('a');
        link.href = href;
        link.textContent = label;
        li.appendChild(link);
    } else {
        li.textContent = label;
    }
    
    return li;
}
```

## Accessibility

### ARIA Attributes
- Proper `aria-label="breadcrumbs"` on the container
- Semantic `<ol>` and `<li>` structure
- Active state indication for current page
- Screen reader friendly navigation

### Best Practices
- Use descriptive labels for each breadcrumb item
- Ensure sufficient color contrast
- Provide alternative text for icons
- Test with keyboard navigation
- Support screen readers

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** None (purely CSS-based)
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Separators Not Displaying
**Problem:** Breadcrumb separators don't appear
**Solution:** Ensure Bootstrap CSS is loaded and check separator class names

#### Turbo Not Working
**Problem:** Turbo navigation doesn't work
**Solution:** Verify `data-pjax` attribute is present and Turbo is enabled

#### Active State Not Working
**Problem:** Active breadcrumb item doesn't highlight
**Solution:** Ensure `active` attribute is set on the correct item

#### Route Not Resolving
**Problem:** Route-based links don't work
**Solution:** Verify route names exist and are accessible

## Related Components

- **Nav:** Main navigation component
- **Dropdown:** Dropdown menu component
- **Link:** Link component used internally
- **Page:** Page layout component

## Performance Considerations

- Use appropriate breadcrumb depth (3-5 levels max)
- Consider lazy loading for dynamic breadcrumbs
- Optimize route resolution for large applications
- Cache breadcrumb generation when possible

## Examples Gallery

### Multi-level E-commerce
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/" label="Home" />
    <x-breadcrumb.item href="/store" label="Store" />
    <x-breadcrumb.item href="/store/electronics" label="Electronics" />
    <x-breadcrumb.item href="/store/electronics/computers" label="Computers" />
    <x-breadcrumb.item href="/store/electronics/computers/laptops" label="Laptops" />
    <x-breadcrumb.item href="/store/electronics/computers/laptops/gaming" label="Gaming" />
    <x-breadcrumb.item active label="Alienware m15" />
</x-breadcrumb>
```

### User Profile Navigation
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/dashboard" label="Dashboard" />
    <x-breadcrumb.item href="/dashboard/profile" label="Profile" />
    <x-breadcrumb.item href="/dashboard/profile/settings" label="Settings" />
    <x-breadcrumb.item href="/dashboard/profile/settings/security" label="Security" />
    <x-breadcrumb.item active label="Two-Factor Authentication" />
</x-breadcrumb>
```

### Content Management
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/admin" label="Admin" />
    <x-breadcrumb.item href="/admin/content" label="Content" />
    <x-breadcrumb.item href="/admin/content/pages" label="Pages" />
    <x-breadcrumb.item href="/admin/content/pages/{{ $page->id }}" label="{{ $page->title }}" />
    <x-breadcrumb.item active label="Edit Page" />
</x-breadcrumb>
```

### Project Management
```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/projects" label="Projects" />
    <x-breadcrumb.item href="/projects/{{ $project->id }}" label="{{ $project->name }}" />
    <x-breadcrumb.item href="/projects/{{ $project->id }}/tasks" label="Tasks" />
    <x-breadcrumb.item href="/projects/{{ $project->id }}/tasks/{{ $task->id }}" label="{{ $task->title }}" />
    <x-breadcrumb.item active label="Task Details" />
</x-breadcrumb>
```

## Changelog

### Version 2.0.0
- Added multiple separator styles (dots, bullets, arrows)
- Enhanced Turbo/PJAX integration
- Improved accessibility features
- Added custom design variants

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/breadcrumb/index.blade.php`
2. Update sub-component views in `resources/views/bootstrap-5/breadcrumb/`
3. Add/update tests in `tests/Components/BreadcrumbTest.php`
4. Update this documentation
