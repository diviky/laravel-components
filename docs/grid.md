# Grid Component

A data grid component for displaying structured information in a tabular-like format with titles and content sections. This component is ideal for creating organized layouts for displaying key-value pairs, settings, user information, and other structured data.

## Overview

**Component Type:** View-Only Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `resources/views/bootstrap-5/grid/index.blade.php`  
**Sub-components:** `grid.item`, `grid.title`, `grid.content`

## Files

- **Main Grid:** `resources/views/bootstrap-5/grid/index.blade.php`
- **Grid Item:** `resources/views/bootstrap-5/grid/item.blade.php`
- **Grid Title:** `resources/views/bootstrap-5/grid/title.blade.php`
- **Grid Content:** `resources/views/bootstrap-5/grid/content.blade.php`
- **Documentation:** `docs/grid.md`
- **Tests:** `tests/Components/GridTest.php`

## Basic Usage

```blade
<x-grid>
    <x-grid.item title="Name" content="John Doe" />
    <x-grid.item title="Email" content="john@example.com" />
    <x-grid.item title="Role" content="Administrator" />
</x-grid>
```

## Component Structure

### Main Grid Container
```blade
<x-grid>
    <!-- Grid items go here -->
</x-grid>
```

### Grid Item
```blade
<x-grid.item title="Title" content="Content">
    <!-- Optional slot content -->
</x-grid.item>
```

### Grid Title (Sub-component)
```blade
<x-grid.title>
    <!-- Title content -->
</x-grid.title>
```

### Grid Content (Sub-component)
```blade
<x-grid.content>
    <!-- Content -->
</x-grid.content>
```

## Attributes & Properties

### Main Grid Container

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'datagrid' | Additional CSS classes | 'custom-grid' |

### Grid Item

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Title text for the grid item | 'User Name' |
| content | string | null | Content text for the grid item | 'John Doe' |
| class | string | 'datagrid-item' | Additional CSS classes | 'highlight-item' |

### Grid Title (Sub-component)

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'datagrid-title' | Additional CSS classes | 'fw-bold' |

### Grid Content (Sub-component)

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'datagrid-content' | Additional CSS classes | 'text-muted' |

### Inherited Attributes

All components support standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | HTML ID attribute | 'user-grid' |
| style | string | null | Inline CSS styles | 'margin: 1rem;' |
| data-* | string | null | Custom data attributes | `data-user-id="123"` |

## Usage Examples

### Basic User Information Grid
```blade
<x-grid>
    <x-grid.item title="Full Name" content="John Doe" />
    <x-grid.item title="Email Address" content="john.doe@example.com" />
    <x-grid.item title="Phone Number" content="+1 (555) 123-4567" />
    <x-grid.item title="Department" content="Engineering" />
    <x-grid.item title="Position" content="Senior Developer" />
    <x-grid.item title="Start Date" content="January 15, 2023" />
</x-grid>
```

### Grid with Custom Styling
```blade
<x-grid class="border rounded p-3">
    <x-grid.item title="Status" content="Active" class="border-bottom" />
    <x-grid.item title="Last Login" content="2 hours ago" class="border-bottom" />
    <x-grid.item title="Permissions" content="Admin" />
</x-grid>
```

### Grid with Slot Content
```blade
<x-grid>
    <x-grid.item title="Profile Picture">
        <x-grid.content>
            <img src="avatar.jpg" class="rounded-circle" width="50" height="50" alt="Avatar" />
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="Actions">
        <x-grid.content>
            <button class="btn btn-primary btn-sm">Edit</button>
            <button class="btn btn-danger btn-sm">Delete</button>
        </x-grid.content>
    </x-grid.item>
</x-grid>
```

### Grid with Complex Content
```blade
<x-grid>
    <x-grid.item title="Skills">
        <x-grid.content>
            <span class="badge bg-primary me-1">PHP</span>
            <span class="badge bg-success me-1">Laravel</span>
            <span class="badge bg-info me-1">Vue.js</span>
            <span class="badge bg-warning">MySQL</span>
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="Projects">
        <x-grid.content>
            <ul class="list-unstyled mb-0">
                <li>E-commerce Platform</li>
                <li>CRM System</li>
                <li>Mobile App Backend</li>
            </ul>
        </x-grid.content>
    </x-grid.item>
</x-grid>
```

### Grid with Conditional Content
```blade
<x-grid>
    <x-grid.item title="Email" content="{{ $user->email }}" />
    <x-grid.item title="Phone" content="{{ $user->phone ?? 'Not provided' }}" />
    
    @if($user->isAdmin())
        <x-grid.item title="Admin Level" content="Super Admin" />
    @endif
    
    <x-grid.item title="Status">
        <x-grid.content>
            @if($user->isActive())
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </x-grid.content>
    </x-grid.item>
</x-grid>
```

### Grid in Cards
```blade
<div class="card">
    <div class="card-header">
        <h5 class="card-title">User Information</h5>
    </div>
    <div class="card-body">
        <x-grid>
            <x-grid.item title="Name" content="{{ $user->name }}" />
            <x-grid.item title="Email" content="{{ $user->email }}" />
            <x-grid.item title="Role" content="{{ $user->role }}" />
            <x-grid.item title="Created" content="{{ $user->created_at->format('M d, Y') }}" />
        </x-grid>
    </div>
</div>
```

### Grid with Icons
```blade
<x-grid>
    <x-grid.item title="Contact">
        <x-grid.content>
            <x-icon name="mail" class="me-2" />
            {{ $user->email }}
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="Location">
        <x-grid.content>
            <x-icon name="map-pin" class="me-2" />
            {{ $user->location }}
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="Website">
        <x-grid.content>
            <x-icon name="link" class="me-2" />
            <a href="{{ $user->website }}" target="_blank">{{ $user->website }}</a>
        </x-grid.content>
    </x-grid.item>
</x-grid>
```

### Grid with Forms
```blade
<x-grid>
    <x-grid.item title="Current Password">
        <x-grid.content>
            <x-form-password name="current_password" />
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="New Password">
        <x-grid.content>
            <x-form-password name="new_password" />
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="Confirm Password">
        <x-grid.content>
            <x-form-password name="password_confirmation" />
        </x-grid.content>
    </x-grid.item>
</x-grid>
```

### Grid with Livewire
```blade
<div wire:poll.10s>
    <x-grid>
        <x-grid.item title="Last Updated" content="{{ now()->format('H:i:s') }}" />
        <x-grid.item title="Status">
            <x-grid.content>
                @if($isOnline)
                    <span class="badge bg-success">Online</span>
                @else
                    <span class="badge bg-secondary">Offline</span>
                @endif
            </x-grid.content>
        </x-grid.item>
    </x-grid>
</div>
```

## Real Project Examples

### User Profile Settings
```blade
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Personal Information</h5>
            </div>
            <div class="card-body">
                <x-grid>
                    <x-grid.item title="First Name" content="{{ $user->first_name }}" />
                    <x-grid.item title="Last Name" content="{{ $user->last_name }}" />
                    <x-grid.item title="Date of Birth" content="{{ $user->birth_date?->format('M d, Y') }}" />
                    <x-grid.item title="Gender" content="{{ $user->gender }}" />
                    <x-grid.item title="Nationality" content="{{ $user->nationality }}" />
                </x-grid>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Contact Information</h5>
            </div>
            <div class="card-body">
                <x-grid>
                    <x-grid.item title="Email" content="{{ $user->email }}" />
                    <x-grid.item title="Phone" content="{{ $user->phone }}" />
                    <x-grid.item title="Address" content="{{ $user->address }}" />
                    <x-grid.item title="City" content="{{ $user->city }}" />
                    <x-grid.item title="Country" content="{{ $user->country }}" />
                </x-grid>
            </div>
        </div>
    </div>
</div>
```

### Product Information Display
```blade
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Product Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $product->image_url }}" class="img-fluid rounded" alt="{{ $product->name }}" />
            </div>
            <div class="col-md-8">
                <x-grid>
                    <x-grid.item title="Product Name" content="{{ $product->name }}" />
                    <x-grid.item title="SKU" content="{{ $product->sku }}" />
                    <x-grid.item title="Category" content="{{ $product->category->name }}" />
                    <x-grid.item title="Brand" content="{{ $product->brand->name }}" />
                    <x-grid.item title="Price" content="${{ number_format($product->price, 2) }}" />
                    <x-grid.item title="Stock" content="{{ $product->stock_quantity }} units" />
                    <x-grid.item title="Weight" content="{{ $product->weight }} kg" />
                    <x-grid.item title="Dimensions" content="{{ $product->dimensions }}" />
                    <x-grid.item title="Status">
                        <x-grid.content>
                            @if($product->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </x-grid.content>
                    </x-grid.item>
                </x-grid>
            </div>
        </div>
    </div>
</div>
```

### Order Summary
```blade
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Order #{{ $order->order_number }}</h5>
    </div>
    <div class="card-body">
        <x-grid>
            <x-grid.item title="Order Date" content="{{ $order->created_at->format('M d, Y H:i') }}" />
            <x-grid.item title="Customer" content="{{ $order->customer->full_name }}" />
            <x-grid.item title="Email" content="{{ $order->customer->email }}" />
            <x-grid.item title="Phone" content="{{ $order->customer->phone }}" />
            <x-grid.item title="Shipping Address" content="{{ $order->shipping_address }}" />
            <x-grid.item title="Payment Method" content="{{ $order->payment_method }}" />
            <x-grid.item title="Subtotal" content="${{ number_format($order->subtotal, 2) }}" />
            <x-grid.item title="Tax" content="${{ number_format($order->tax, 2) }}" />
            <x-grid.item title="Shipping" content="${{ number_format($order->shipping_cost, 2) }}" />
            <x-grid.item title="Total" content="${{ number_format($order->total, 2) }}" />
            <x-grid.item title="Status">
                <x-grid.content>
                    @switch($order->status)
                        @case('pending')
                            <span class="badge bg-warning">Pending</span>
                            @break
                        @case('processing')
                            <span class="badge bg-info">Processing</span>
                            @break
                        @case('shipped')
                            <span class="badge bg-primary">Shipped</span>
                            @break
                        @case('delivered')
                            <span class="badge bg-success">Delivered</span>
                            @break
                        @case('cancelled')
                            <span class="badge bg-danger">Cancelled</span>
                            @break
                    @endswitch
                </x-grid.content>
            </x-grid.item>
        </x-grid>
    </div>
</div>
```

### System Information Dashboard
```blade
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Server Information</h5>
            </div>
            <div class="card-body">
                <x-grid>
                    <x-grid.item title="Server Name" content="{{ gethostname() }}" />
                    <x-grid.item title="PHP Version" content="{{ phpversion() }}" />
                    <x-grid.item title="Laravel Version" content="{{ app()->version() }}" />
                    <x-grid.item title="Database" content="{{ config('database.default') }}" />
                    <x-grid.item title="Cache Driver" content="{{ config('cache.default') }}" />
                    <x-grid.item title="Queue Driver" content="{{ config('queue.default') }}" />
                    <x-grid.item title="Environment" content="{{ config('app.env') }}" />
                    <x-grid.item title="Debug Mode">
                        <x-grid.content>
                            @if(config('app.debug'))
                                <span class="badge bg-warning">Enabled</span>
                            @else
                                <span class="badge bg-success">Disabled</span>
                            @endif
                        </x-grid.content>
                    </x-grid.item>
                </x-grid>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Application Statistics</h5>
            </div>
            <div class="card-body">
                <x-grid>
                    <x-grid.item title="Total Users" content="{{ number_format($stats['users']) }}" />
                    <x-grid.item title="Active Users" content="{{ number_format($stats['active_users']) }}" />
                    <x-grid.item title="Total Orders" content="{{ number_format($stats['orders']) }}" />
                    <x-grid.item title="Revenue" content="${{ number_format($stats['revenue'], 2) }}" />
                    <x-grid.item title="Products" content="{{ number_format($stats['products']) }}" />
                    <x-grid.item title="Categories" content="{{ number_format($stats['categories']) }}" />
                    <x-grid.item title="Disk Usage" content="{{ $stats['disk_usage'] }}" />
                    <x-grid.item title="Memory Usage" content="{{ $stats['memory_usage'] }}" />
                </x-grid>
            </div>
        </div>
    </div>
</div>
```

### Settings Configuration
```blade
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Application Settings</h5>
    </div>
    <div class="card-body">
        <x-grid>
            <x-grid.item title="Site Name">
                <x-grid.content>
                    <x-form-input name="site_name" value="{{ $settings['site_name'] }}" />
                </x-grid.content>
            </x-grid.item>
            
            <x-grid.item title="Site Description">
                <x-grid.content>
                    <x-form-textarea name="site_description" value="{{ $settings['site_description'] }}" />
                </x-grid.content>
            </x-grid.item>
            
            <x-grid.item title="Maintenance Mode">
                <x-grid.content>
                    <x-form-switch name="maintenance_mode" :checked="$settings['maintenance_mode']" />
                </x-grid.content>
            </x-grid.item>
            
            <x-grid.item title="Registration Enabled">
                <x-grid.content>
                    <x-form-switch name="registration_enabled" :checked="$settings['registration_enabled']" />
                </x-grid.content>
            </x-grid.item>
            
            <x-grid.item title="Email Notifications">
                <x-grid.content>
                    <x-form-switch name="email_notifications" :checked="$settings['email_notifications']" />
                </x-grid.content>
            </x-grid.item>
            
            <x-grid.item title="Default Language">
                <x-grid.content>
                    <x-form-select name="default_language" :options="$languages" :selected="$settings['default_language']" />
                </x-grid.content>
            </x-grid.item>
        </x-grid>
    </div>
</div>
```

## Features

### Structured Data Display
- **Title-Content Pairs**: Organized display of key-value information
- **Flexible Content**: Support for text, HTML, components, and complex content
- **Consistent Styling**: Bootstrap-based styling with datagrid classes

### Responsive Design
- **Mobile-Friendly**: Adapts to different screen sizes
- **Bootstrap Integration**: Works seamlessly with Bootstrap grid system
- **Flexible Layout**: Can be used in cards, modals, and other containers

### Content Flexibility
- **Text Content**: Simple string content via `content` attribute
- **Slot Content**: Complex HTML and components via slots
- **Conditional Content**: Dynamic content based on conditions
- **Component Integration**: Works with other components (forms, icons, badges)

### Styling Options
- **CSS Classes**: Custom styling via class attributes
- **Bootstrap Utilities**: Integration with Bootstrap utility classes
- **Custom Styling**: Inline styles and custom CSS support

## CSS Classes

### Default Classes
- `datagrid`: Main grid container
- `datagrid-item`: Individual grid item
- `datagrid-title`: Grid item title
- `datagrid-content`: Grid item content

### Bootstrap Integration
- `card`: Card container styling
- `card-header`: Card header styling
- `card-body`: Card body styling
- `border`: Border styling
- `rounded`: Rounded corners
- `p-3`: Padding utilities
- `mb-3`: Margin utilities

### Custom Styling
```css
/* Custom datagrid styling */
.datagrid {
    background: #f8f9fa;
    border-radius: 0.375rem;
    padding: 1rem;
}

.datagrid-item {
    border-bottom: 1px solid #dee2e6;
    padding: 0.75rem 0;
}

.datagrid-item:last-child {
    border-bottom: none;
}

.datagrid-title {
    font-weight: 600;
    color: #495057;
    min-width: 120px;
}

.datagrid-content {
    color: #6c757d;
}
```

## Configuration

### Component Registration
The grid components are automatically registered via the Laravel service provider:

```php
// In LaravelServiceProvider.php
Blade::component('grid', 'laravel-components::bootstrap-5.grid.index');
Blade::component('grid.item', 'laravel-components::bootstrap-5.grid.item');
Blade::component('grid.title', 'laravel-components::bootstrap-5.grid.title');
Blade::component('grid.content', 'laravel-components::bootstrap-5.grid.content');
```

### Custom Styling
You can customize the datagrid appearance by overriding the CSS classes:

```css
/* app.css or your custom stylesheet */
.datagrid {
    /* Your custom styles */
}

.datagrid-item {
    /* Your custom styles */
}

.datagrid-title {
    /* Your custom styles */
}

.datagrid-content {
    /* Your custom styles */
}
```

## JavaScript Integration

### Dynamic Content Updates
```javascript
// Update grid content dynamically
function updateGridItem(gridId, itemIndex, title, content) {
    const grid = document.getElementById(gridId);
    const items = grid.querySelectorAll('.datagrid-item');
    
    if (items[itemIndex]) {
        const titleElement = items[itemIndex].querySelector('.datagrid-title');
        const contentElement = items[itemIndex].querySelector('.datagrid-content');
        
        if (titleElement) titleElement.textContent = title;
        if (contentElement) contentElement.textContent = content;
    }
}

// Usage
updateGridItem('user-grid', 0, 'Updated Name', 'Jane Doe');
```

### Livewire Integration
```javascript
// Livewire event listeners for grid updates
Livewire.on('grid-updated', (data) => {
    const grid = document.querySelector(`[data-grid-id="${data.gridId}"]`);
    if (grid) {
        // Update grid content
        grid.innerHTML = data.html;
    }
});
```

## Accessibility

### ARIA Attributes
The grid component supports proper accessibility attributes:

```blade
<x-grid role="grid" aria-label="User Information">
    <x-grid.item role="row" title="Name" content="John Doe" />
    <x-grid.item role="row" title="Email" content="john@example.com" />
</x-grid>
```

### Screen Reader Support
- **Semantic Structure**: Proper HTML structure for screen readers
- **Descriptive Labels**: Clear title-content relationships
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

**Grid not displaying properly**
```html
<!-- Ensure Bootstrap CSS is loaded -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
```

**Content not showing**
```blade
<!-- Use slot content for complex HTML -->
<x-grid.item title="Actions">
    <x-grid.content>
        <button class="btn btn-primary">Edit</button>
    </x-grid.content>
</x-grid.item>
```

**Styling issues**
```css
/* Override default styles if needed */
.datagrid {
    background: white;
    border: 1px solid #dee2e6;
}
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Card](card.md) - Card container component
- [Table](table.md) - Table component for data display
- [Form Input](form-input.md) - Form input components
- [Badge](badge.md) - Badge component for status indicators
- [Icon](icon.md) - Icon component for visual elements

## Performance

### Optimization Tips
1. **Use appropriate content types** for your data
2. **Minimize complex HTML** in grid items
3. **Use Bootstrap classes** when possible
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~1KB
- **With Bootstrap**: ~50KB (one-time load)
- **With Custom CSS**: ~2KB
- **Full Package**: ~53KB

## Examples Gallery

### Basic Grids
```blade
<!-- Simple information grid -->
<x-grid>
    <x-grid.item title="Name" content="John Doe" />
    <x-grid.item title="Email" content="john@example.com" />
</x-grid>

<!-- Grid with custom styling -->
<x-grid class="border rounded">
    <x-grid.item title="Status" content="Active" />
    <x-grid.item title="Role" content="Admin" />
</x-grid>
```

### Advanced Grids
```blade
<!-- Grid with complex content -->
<x-grid>
    <x-grid.item title="Profile">
        <x-grid.content>
            <img src="avatar.jpg" class="rounded-circle" width="40" />
            <span class="ms-2">John Doe</span>
        </x-grid.content>
    </x-grid.item>
    
    <x-grid.item title="Actions">
        <x-grid.content>
            <button class="btn btn-sm btn-primary">Edit</button>
            <button class="btn btn-sm btn-danger">Delete</button>
        </x-grid.content>
    </x-grid.item>
</x-grid>
```

## Changelog

### Version 2.0
- Added support for complex slot content
- Enhanced accessibility features
- Improved Bootstrap integration
- Added responsive design support

### Version 1.0
- Initial release
- Basic title-content structure
- Simple styling support
- Bootstrap integration

## Contributing

When contributing to the Grid component:

1. **Test responsive behavior** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
