# Page Component

A flexible page layout component that provides a structured container with header, body, and footer sections for consistent page layouts. This component is ideal for creating organized page structures with clear separation of content areas.

## Overview

**Component Type:** View-Only Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `resources/views/bootstrap-5/page/index.blade.php`  
**Sub-components:** `page.header`, `page.body`, `page.footer`, `page.title`, `page.subtitle`, `page.options`

## Files

- **Main Page:** `resources/views/bootstrap-5/page/index.blade.php`
- **Page Header:** `resources/views/bootstrap-5/page/header.blade.php`
- **Page Body:** `resources/views/bootstrap-5/page/body.blade.php`
- **Page Footer:** `resources/views/bootstrap-5/page/footer.blade.php`
- **Page Title:** `resources/views/bootstrap-5/page/title.blade.php`
- **Page Subtitle:** `resources/views/bootstrap-5/page/subtitle.blade.php`
- **Page Options:** `resources/views/bootstrap-5/page/options.blade.php`
- **Documentation:** `docs/page.md`
- **Tests:** `tests/Components/PageTest.php`

## Basic Usage

```blade
<x-page>
    <x-page.header>
        <h1>Dashboard</h1>
    </x-page.header>
    
    <x-page.body>
        <p>Page content goes here</p>
    </x-page.body>
    
    <x-page.footer>
        <p>&copy; 2024 Company Name</p>
    </x-page.footer>
</x-page>
```

## Component Structure

### Main Page Container
```blade
<x-page>
    <!-- Page content and sections -->
</x-page>
```

### Page Header
```blade
<x-page.header>
    <!-- Header content -->
</x-page.header>
```

### Page Body
```blade
<x-page.body>
    <!-- Main content -->
</x-page.body>
```

### Page Footer
```blade
<x-page.footer>
    <!-- Footer content -->
</x-page.footer>
```

### Page Title
```blade
<x-page.title>
    <!-- Page title -->
</x-page.title>
```

### Page Subtitle
```blade
<x-page.subtitle>
    <!-- Page subtitle -->
</x-page.subtitle>
```

### Page Options
```blade
<x-page.options>
    <!-- Action buttons, filters, etc. -->
</x-page.options>
```

## Attributes & Properties

### Main Page Container

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| header | slot | null | Page header content | `<x-slot:header>Header</x-slot:header>` |
| body | slot | null | Page body content | `<x-slot:body>Body</x-slot:body>` |
| footer | slot | null | Page footer content | `<x-slot:footer>Footer</x-slot:footer>` |
| class | string | 'page-wrapper' | Additional CSS classes | 'custom-page' |

### Page Header

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| border | boolean | false | Add border to header | `border="true"` |
| class | string | 'page-header' | Additional CSS classes | 'border-bottom' |

### Page Body

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| fragment | string | null | Fragment name for AJAX content | 'content-fragment' |
| class | string | 'page-body' | Additional CSS classes | 'py-4' |

### Page Footer

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'page-footer' | Additional CSS classes | 'border-top' |

### Page Title

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Page title text | 'Dashboard' |
| class | string | 'page-title' | Additional CSS classes | 'display-4' |

### Page Subtitle

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Page subtitle text | 'Overview' |
| class | string | 'page-subtitle mb-0 mt-2' | Additional CSS classes | 'text-muted' |

### Page Options

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'page-options d-flex' | Additional CSS classes | 'justify-content-end' |

### Inherited Attributes

All components support standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | HTML ID attribute | 'main-page' |
| style | string | null | Inline CSS styles | 'margin: 1rem;' |
| data-* | string | null | Custom data attributes | `data-page-id="123"` |

## Usage Examples

### Basic Page Layout
```blade
<x-page>
    <x-page.header>
        <h1>Dashboard</h1>
    </x-page.header>
    
    <x-page.body>
        <p>Welcome to your dashboard!</p>
    </x-page.body>
    
    <x-page.footer>
        <p>&copy; 2024 Company Name</p>
    </x-page.footer>
</x-page>
```

### Page with Slots
```blade
<x-page>
    <x-slot:header>
        <div class="d-flex justify-content-between align-items-center">
            <h1>User Management</h1>
            <button class="btn btn-primary">Add User</button>
        </div>
    </x-slot:header>
    
    <x-slot:body>
        <div class="row">
            <div class="col-12">
                <!-- Content here -->
            </div>
        </div>
    </x-slot:body>
    
    <x-slot:footer>
        <p class="text-muted">Last updated: {{ now()->format('M d, Y') }}</p>
    </x-slot:footer>
</x-page>
```

### Page with Title and Options
```blade
<x-page>
    <x-page.header>
        <x-page.title>User Profile</x-page.title>
        <x-page.subtitle>Manage your account settings</x-page.subtitle>
        <x-page.options>
            <button class="btn btn-primary">Edit Profile</button>
            <button class="btn btn-secondary">Export Data</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <!-- Profile content -->
    </x-page.body>
</x-page>
```

### Page with Bordered Header
```blade
<x-page>
    <x-page.header border="true">
        <x-page.title>Settings</x-page.title>
        <x-page.options>
            <button class="btn btn-success">Save Changes</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <!-- Settings form -->
    </x-page.body>
</x-page>
```

### Page with Fragment Support
```blade
<x-page>
    <x-page.header>
        <x-page.title>Dynamic Content</x-page.title>
    </x-page.header>
    
    <x-page.body fragment="dynamic-content">
        <!-- This content can be updated via AJAX -->
        <div class="content-area">
            <p>This content can be refreshed without page reload.</p>
        </div>
    </x-page.body>
</x-page>
```

### Page without Explicit Sections
```blade
<x-page>
    <div class="container">
        <h1>Simple Page</h1>
        <p>Content directly in page wrapper</p>
    </div>
</x-page>
```

### Custom Page Wrapper
```blade
<x-page class="custom-layout" id="special-page">
    <x-page.header>
        <nav>Navigation</nav>
    </x-page.header>
    
    <x-page.body>
        <main>Main content</main>
    </x-page.body>
</x-page>
```

### Page with Complex Header Layout
```blade
<x-page>
    <x-page.header>
        <div class="row align-items-center">
            <div class="col">
                <x-page.title>Product Catalog</x-page.title>
                <x-page.subtitle>Browse and manage your products</x-page.subtitle>
            </div>
            <div class="col-auto">
                <x-page.options>
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary">Filter</button>
                        <button class="btn btn-outline-secondary">Sort</button>
                    </div>
                    <button class="btn btn-primary ms-2">Add Product</button>
                </x-page.options>
            </div>
        </div>
    </x-page.header>
    
    <x-page.body>
        <!-- Product grid -->
    </x-page.body>
</x-page>
```

## Real Project Examples

### Dashboard Layout
```blade
<x-page>
    <x-page.header>
        <x-page.title>Analytics Dashboard</x-page.title>
        <x-page.subtitle>Real-time insights and metrics</x-page.subtitle>
        <x-page.options>
            <x-form-select name="time_period" :options="['Today', 'Week', 'Month', 'Year']" />
            <button class="btn btn-primary ms-2">Export Report</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-3">
                <x-card>
                    <x-counter :number="1234" title="Total Users" />
                </x-card>
            </div>
            <div class="col-md-3">
                <x-card>
                    <x-counter :number="567" title="Active Sessions" />
                </x-card>
            </div>
            <div class="col-md-3">
                <x-card>
                    <x-counter :number="89" title="Revenue" prefix="$" />
                </x-card>
            </div>
            <div class="col-md-3">
                <x-card>
                    <x-counter :number="12" title="Orders" />
                </x-card>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-8">
                <x-card title="Sales Chart">
                    <!-- Chart component -->
                </x-card>
            </div>
            <div class="col-md-4">
                <x-card title="Recent Activity">
                    <!-- Activity feed -->
                </x-card>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <p class="text-muted">Data refreshed every 5 minutes</p>
    </x-page.footer>
</x-page>
```

### User Profile Page
```blade
<x-page>
    <x-page.header>
        <div class="d-flex align-items-center">
            <img src="{{ $user->avatar }}" class="rounded-circle me-3" width="60" height="60" alt="Avatar" />
            <div>
                <x-page.title>{{ $user->name }}</x-page.title>
                <x-page.subtitle>{{ $user->email }}</x-page.subtitle>
            </div>
        </div>
        <x-page.options>
            <button class="btn btn-outline-primary">Edit Profile</button>
            <button class="btn btn-outline-secondary">Change Password</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-8">
                <x-card title="Personal Information">
                    <x-grid>
                        <x-grid.item title="Full Name" content="{{ $user->full_name }}" />
                        <x-grid.item title="Email" content="{{ $user->email }}" />
                        <x-grid.item title="Phone" content="{{ $user->phone }}" />
                        <x-grid.item title="Location" content="{{ $user->location }}" />
                        <x-grid.item title="Joined" content="{{ $user->created_at->format('M d, Y') }}" />
                    </x-grid>
                </x-card>
            </div>
            <div class="col-md-4">
                <x-card title="Account Status">
                    <x-badge color="success">Active</x-badge>
                    <p class="mt-2">Member since {{ $user->created_at->diffForHumans() }}</p>
                </x-card>
            </div>
        </div>
    </x-page.body>
</x-page>
```

### E-commerce Product Page
```blade
<x-page>
    <x-page.header>
        <x-page.title>{{ $product->name }}</x-page.title>
        <x-page.subtitle>{{ $product->category->name }}</x-page.subtitle>
        <x-page.options>
            <button class="btn btn-primary">Add to Cart</button>
            <button class="btn btn-outline-secondary">Add to Wishlist</button>
            <button class="btn btn-outline-secondary">Share</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->image_url }}" class="img-fluid rounded" alt="{{ $product->name }}" />
            </div>
            <div class="col-md-6">
                <x-card>
                    <h3>${{ number_format($product->price, 2) }}</h3>
                    <p class="text-muted">{{ $product->description }}</p>
                    
                    <x-grid>
                        <x-grid.item title="SKU" content="{{ $product->sku }}" />
                        <x-grid.item title="Availability" content="{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}" />
                        <x-grid.item title="Brand" content="{{ $product->brand->name }}" />
                    </x-grid>
                </x-card>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <p class="text-muted">Free shipping on orders over $50</p>
    </x-page.footer>
</x-page>
```

### Admin Settings Page
```blade
<x-page>
    <x-page.header border="true">
        <x-page.title>System Settings</x-page.title>
        <x-page.subtitle>Configure application preferences</x-page.subtitle>
        <x-page.options>
            <button class="btn btn-success">Save All Changes</button>
            <button class="btn btn-outline-secondary">Reset to Defaults</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-6">
                <x-card title="General Settings">
                    <x-form-input name="site_name" label="Site Name" value="{{ $settings['site_name'] }}" />
                    <x-form-textarea name="site_description" label="Site Description" value="{{ $settings['site_description'] }}" />
                    <x-form-switch name="maintenance_mode" label="Maintenance Mode" :checked="$settings['maintenance_mode']" />
                </x-card>
            </div>
            <div class="col-md-6">
                <x-card title="Email Settings">
                    <x-form-input name="smtp_host" label="SMTP Host" value="{{ $settings['smtp_host'] }}" />
                    <x-form-input name="smtp_port" label="SMTP Port" value="{{ $settings['smtp_port'] }}" />
                    <x-form-switch name="email_notifications" label="Enable Email Notifications" :checked="$settings['email_notifications']" />
                </x-card>
            </div>
        </div>
    </x-page.body>
</x-page>
```

### Blog Post Page
```blade
<x-page>
    <x-page.header>
        <x-page.title>{{ $post->title }}</x-page.title>
        <x-page.subtitle>By {{ $post->author->name }} • {{ $post->published_at->format('M d, Y') }}</x-page.subtitle>
        <x-page.options>
            <button class="btn btn-outline-primary">Share</button>
            <button class="btn btn-outline-secondary">Bookmark</button>
            <button class="btn btn-outline-secondary">Print</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-8">
                <article>
                    <img src="{{ $post->featured_image }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}" />
                    <div class="content">
                        {!! $post->content !!}
                    </div>
                </article>
            </div>
            <div class="col-md-4">
                <x-card title="About the Author">
                    <div class="d-flex align-items-center">
                        <img src="{{ $post->author->avatar }}" class="rounded-circle me-3" width="50" height="50" alt="Author" />
                        <div>
                            <h6>{{ $post->author->name }}</h6>
                            <p class="text-muted">{{ $post->author->bio }}</p>
                        </div>
                    </div>
                </x-card>
                
                <x-card title="Related Posts" class="mt-3">
                    @foreach($relatedPosts as $relatedPost)
                        <div class="mb-2">
                            <a href="{{ route('posts.show', $relatedPost) }}">{{ $relatedPost->title }}</a>
                        </div>
                    @endforeach
                </x-card>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-muted">Published {{ $post->published_at->diffForHumans() }}</p>
            <div>
                <span class="badge bg-primary">{{ $post->category->name }}</span>
                @foreach($post->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    </x-page.footer>
</x-page>
```

### Livewire Dashboard
```blade
<x-page>
    <x-page.header>
        <x-page.title>Live Dashboard</x-page.title>
        <x-page.subtitle>Real-time data updates</x-page.subtitle>
        <x-page.options>
            <button wire:click="refreshData" class="btn btn-outline-primary">Refresh</button>
            <button wire:click="exportData" class="btn btn-primary">Export</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div wire:poll.30s>
            <div class="row">
                <div class="col-md-3">
                    <x-card>
                        <x-counter :number="$stats['users']" title="Total Users" />
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-counter :number="$stats['orders']" title="Orders Today" />
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-counter :number="$stats['revenue']" title="Revenue" prefix="$" />
                    </x-card>
                </div>
                <div class="col-md-3">
                    <x-card>
                        <x-counter :number="$stats['visitors']" title="Active Visitors" />
                    </x-card>
                </div>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <p class="text-muted">Last updated: {{ now()->format('H:i:s') }}</p>
    </x-page.footer>
</x-page>
```

## Features

### Structured Layout
- **Header Section**: Title, subtitle, and action buttons
- **Body Section**: Main content area with flexible layout
- **Footer Section**: Additional information and links
- **Fragment Support**: AJAX content loading capabilities

### Flexible Content
- **Slot-based**: Use named slots for structured content
- **Direct Content**: Place content directly in page wrapper
- **Mixed Approach**: Combine slots with direct content

### Responsive Design
- **Mobile-Friendly**: Adapts to different screen sizes
- **Bootstrap Integration**: Works seamlessly with Bootstrap grid
- **Flexible Layout**: Supports various content arrangements

### Component Integration
- **Sub-components**: Title, subtitle, options for header organization
- **Other Components**: Works with cards, grids, forms, and more
- **Livewire Support**: Full compatibility with Livewire components

## CSS Classes

### Default Classes
- `page-wrapper`: Main page container
- `page-header`: Page header section
- `page-header-border`: Header with border
- `page-body`: Page body section
- `page-footer`: Page footer section
- `page-title`: Page title styling
- `page-subtitle`: Page subtitle styling
- `page-options`: Page options/actions area

### Bootstrap Integration
- `d-flex`: Flexbox display
- `justify-content-between`: Space between items
- `align-items-center`: Vertical centering
- `border-bottom`: Bottom border
- `border-top`: Top border
- `py-4`: Vertical padding
- `mt-2`, `mb-0`: Margin utilities

### Custom Styling
```css
/* Custom page styling */
.page-wrapper {
    min-height: 100vh;
    background: #f8f9fa;
}

.page-header {
    background: white;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.page-header-border {
    border-bottom: 1px solid #dee2e6;
}

.page-body {
    padding: 2rem;
    flex: 1;
}

.page-footer {
    background: white;
    padding: 1rem;
    border-top: 1px solid #dee2e6;
}

.page-title {
    font-size: 2rem;
    font-weight: 600;
    color: #212529;
    margin-bottom: 0.5rem;
}

.page-subtitle {
    color: #6c757d;
    font-size: 1rem;
}

.page-options {
    gap: 0.5rem;
}
```

## Configuration

### Component Registration
The page components are automatically registered via the Laravel service provider:

```php
// In LaravelServiceProvider.php
Blade::component('page', 'laravel-components::bootstrap-5.page.index');
Blade::component('page.header', 'laravel-components::bootstrap-5.page.header');
Blade::component('page.body', 'laravel-components::bootstrap-5.page.body');
Blade::component('page.footer', 'laravel-components::bootstrap-5.page.footer');
Blade::component('page.title', 'laravel-components::bootstrap-5.page.title');
Blade::component('page.subtitle', 'laravel-components::bootstrap-5.page.subtitle');
Blade::component('page.options', 'laravel-components::bootstrap-5.page.options');
```

### Custom Styling
You can customize the page appearance by overriding the CSS classes:

```css
/* app.css or your custom stylesheet */
.page-wrapper {
    /* Your custom styles */
}

.page-header {
    /* Your custom styles */
}

.page-body {
    /* Your custom styles */
}

.page-footer {
    /* Your custom styles */
}
```

## JavaScript Integration

### Fragment Loading
```javascript
// Load content into page body fragment
function loadFragment(fragmentName, url) {
    const fragment = document.querySelector(`[ajax-content="${fragmentName}"]`);
    if (fragment) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                fragment.innerHTML = html;
            });
    }
}

// Usage
loadFragment('dynamic-content', '/api/content');
```

### Livewire Integration
```javascript
// Livewire event listeners for page updates
Livewire.on('page-updated', (data) => {
    const page = document.querySelector(`[data-page-id="${data.pageId}"]`);
    if (page) {
        // Update page content
        page.innerHTML = data.html;
    }
});
```

## Accessibility

### ARIA Attributes
The page component supports proper accessibility attributes:

```blade
<x-page role="main" aria-label="Main Content">
    <x-page.header role="banner">
        <x-page.title>Page Title</x-page.title>
    </x-page.header>
    
    <x-page.body role="main">
        <!-- Main content -->
    </x-page.body>
    
    <x-page.footer role="contentinfo">
        <!-- Footer content -->
    </x-page.footer>
</x-page>
```

### Screen Reader Support
- **Semantic Structure**: Proper HTML structure for screen readers
- **Landmark Roles**: Clear page sections with appropriate roles
- **Navigation**: Logical tab order and keyboard navigation

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **CSS Grid**: Full support
- **Flexbox**: Full support
- **CSS Custom Properties**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**Page not displaying properly**
```html
<!-- Ensure Bootstrap CSS is loaded -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
```

**Header not showing**
```blade
<!-- Use proper slot syntax -->
<x-page>
    <x-slot:header>
        <h1>Header Content</h1>
    </x-slot:header>
</x-page>
```

**Fragment not working**
```blade
<!-- Ensure fragment name is set -->
<x-page.body fragment="my-fragment">
    <!-- Content -->
</x-page.body>
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Card](card.md) - Card container component
- [Grid](grid.md) - Grid layout component
- [Form Input](form-input.md) - Form input components
- [Button](form-button.md) - Button component
- [Badge](badge.md) - Badge component for status indicators

## Performance

### Optimization Tips
1. **Use appropriate sections** for content organization
2. **Minimize complex layouts** in page body
3. **Use Bootstrap classes** when possible
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~2KB
- **With Bootstrap**: ~50KB (one-time load)
- **With Custom CSS**: ~3KB
- **Full Package**: ~55KB

## Examples Gallery

### Basic Pages
```blade
<!-- Simple page -->
<x-page>
    <h1>Welcome</h1>
    <p>Simple page content</p>
</x-page>

<!-- Page with sections -->
<x-page>
    <x-page.header>
        <h1>Page Title</h1>
    </x-page.header>
    <x-page.body>
        <p>Page content</p>
    </x-page.body>
</x-page>
```

### Advanced Pages
```blade
<!-- Complex page layout -->
<x-page class="dashboard-layout">
    <x-page.header border="true">
        <x-page.title>Dashboard</x-page.title>
        <x-page.options>
            <button class="btn btn-primary">Action</button>
        </x-page.options>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-8">
                <!-- Main content -->
            </div>
            <div class="col-md-4">
                <!-- Sidebar -->
            </div>
        </div>
    </x-page.body>
</x-page>
```

## Changelog

### Version 2.0
- Added fragment support for AJAX content
- Enhanced slot-based content organization
- Improved accessibility features
- Added page options component

### Version 1.0
- Initial release
- Basic page structure with header, body, footer
- Simple styling support
- Bootstrap integration

## Contributing

When contributing to the Page component:

1. **Test responsive behavior** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
