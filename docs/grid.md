# Grid Component

A flexible data grid component that provides professional structured information display with enhanced user experience. This component offers advanced grid layout capabilities with title-content pairs and seamless integration with modern web applications.

## Overview

**Component Type:** Layout  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class  
**JavaScript Libraries:** None (pure layout component)

## Files

- **PHP Class:** `src/Components/Grid.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/grid/index.blade.php`
- **Sub-components:** `grid.item`, `grid.title`, `grid.content`
- **Tests:** `tests/Components/GridTest.php`
- **Documentation:** `docs/grid.md`

## Basic Usage

### Simple Data Grid
```blade
<x-grid>
    <x-grid.item title="Name" content="{{ $user->name }}" />
    <x-grid.item title="Email" content="{{ $user->email }}" />
    <x-grid.item title="Role" content="{{ $user->role->name }}" />
</x-grid>
```

### Grid with Custom Content
```blade
<x-grid>
    <x-grid.item title="User Information">
        <div class="user-details">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </x-grid.item>
</x-grid>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Item title | `'User Name'` |
| content | mixed | null | Item content | `$user->name` |

### Sub-component Attributes

#### Grid Item
| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Item title | `'Field Name'` |
| content | mixed | null | Item content | `$value` |

### Inherited Attributes

The component inherits all standard HTML div attributes and Laravel component attributes.

## Usage Examples

### User Profile Grid
```blade
<!-- User Profile Information Grid -->
<x-grid>
    <x-grid.item title="Full Name" content="{{ $user->name }}" />
    <x-grid.item title="Email Address" content="{{ $user->email }}" />
    <x-grid.item title="Phone Number" content="{{ $user->phone ?? 'Not provided' }}" />
    <x-grid.item title="Location" content="{{ $user->location ?? 'Not specified' }}" />
    <x-grid.item title="Role" content="{{ $user->role->name }}" />
    <x-grid.item title="Status">
        <span class="badge badge-{{ $user->isActive() ? 'success' : 'secondary' }}">
            {{ $user->isActive() ? 'Active' : 'Inactive' }}
        </span>
    </x-grid.item>
    <x-grid.item title="Member Since" content="{{ $user->created_at->format('M d, Y') }}" />
    <x-grid.item title="Last Login" content="{{ $user->last_login_at?->diffForHumans() ?? 'Never' }}" />
</x-grid>
```

### Product Information Grid
```blade
<!-- Product Details Grid -->
<x-grid>
    <x-grid.item title="Product Name" content="{{ $product->name }}" />
    <x-grid.item title="SKU" content="{{ $product->sku }}" />
    <x-grid.item title="Category" content="{{ $product->category->name }}" />
    <x-grid.item title="Brand" content="{{ $product->brand->name }}" />
    <x-grid.item title="Price">
        <span class="price">${{ number_format($product->price, 2) }}</span>
        @if($product->original_price > $product->price)
            <span class="original-price text-muted">${{ number_format($product->original_price, 2) }}</span>
        @endif
    </x-grid.item>
    <x-grid.item title="Stock Status">
        <span class="badge badge-{{ $product->inStock() ? 'success' : 'danger' }}">
            {{ $product->inStock() ? 'In Stock' : 'Out of Stock' }}
        </span>
    </x-grid.item>
    <x-grid.item title="Weight" content="{{ $product->weight }} lbs" />
    <x-grid.item title="Dimensions" content="{{ $product->dimensions }}" />
    <x-grid.item title="Created" content="{{ $product->created_at->format('M d, Y') }}" />
</x-grid>
```

### Order Summary Grid
```blade
<!-- Order Information Grid -->
<x-grid>
    <x-grid.item title="Order Number" content="#{{ $order->id }}" />
    <x-grid.item title="Customer" content="{{ $order->customer->name }}" />
    <x-grid.item title="Email" content="{{ $order->customer->email }}" />
    <x-grid.item title="Order Date" content="{{ $order->created_at->format('M d, Y H:i') }}" />
    <x-grid.item title="Status">
        <span class="badge badge-{{ $order->status->color }}">
            {{ $order->status->name }}
        </span>
    </x-grid.item>
    <x-grid.item title="Payment Method" content="{{ $order->payment_method }}" />
    <x-grid.item title="Shipping Address">
        <div class="address">
            <div>{{ $order->shipping_address->street }}</div>
            <div>{{ $order->shipping_address->city }}, {{ $order->shipping_address->state }} {{ $order->shipping_address->zip }}</div>
            <div>{{ $order->shipping_address->country }}</div>
        </div>
    </x-grid.item>
    <x-grid.item title="Subtotal" content="${{ number_format($order->subtotal, 2) }}" />
    <x-grid.item title="Tax" content="${{ number_format($order->tax, 2) }}" />
    <x-grid.item title="Shipping" content="${{ number_format($order->shipping_cost, 2) }}" />
    <x-grid.item title="Total" content="${{ number_format($order->total, 2) }}" />
</x-grid>
```

### System Information Grid
```blade
<!-- System Status Grid -->
<x-grid>
    <x-grid.item title="Server Status">
        <span class="badge badge-success">
            <i class="icon-check"></i> Online
        </span>
    </x-grid.item>
    <x-grid.item title="Database Status">
        <span class="badge badge-success">
            <i class="icon-database"></i> Connected
        </span>
    </x-grid.item>
    <x-grid.item title="Cache Status">
        <span class="badge badge-{{ $cacheStatus ? 'success' : 'warning' }}">
            <i class="icon-{{ $cacheStatus ? 'check' : 'alert-triangle' }}"></i>
            {{ $cacheStatus ? 'Active' : 'Issues' }}
        </span>
    </x-grid.item>
    <x-grid.item title="Disk Usage" content="{{ $diskUsage }}%" />
    <x-grid.item title="Memory Usage" content="{{ $memoryUsage }}%" />
    <x-grid.item title="CPU Usage" content="{{ $cpuUsage }}%" />
    <x-grid.item title="Uptime" content="{{ $uptime }}" />
    <x-grid.item title="Version" content="{{ $appVersion }}" />
    <x-grid.item title="Environment" content="{{ app()->environment() }}" />
</x-grid>
```

### Custom Content Grid
```blade
<!-- Custom Content Grid -->
<x-grid>
    <x-grid.item title="User Avatar">
        <div class="avatar-container">
            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="avatar">
            <button class="btn btn-sm btn-outline-primary mt-2">Change Avatar</button>
        </div>
    </x-grid.item>
    
    <x-grid.item title="Contact Information">
        <div class="contact-info">
            <div class="contact-item">
                <i class="icon-mail"></i>
                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
            </div>
            <div class="contact-item">
                <i class="icon-phone"></i>
                <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
            </div>
            <div class="contact-item">
                <i class="icon-map-pin"></i>
                {{ $user->location }}
            </div>
        </div>
    </x-grid.item>
    
    <x-grid.item title="Social Links">
        <div class="social-links">
            @if($user->twitter)
                <a href="{{ $user->twitter }}" class="social-link" target="_blank">
                    <i class="icon-twitter"></i>
                </a>
            @endif
            @if($user->linkedin)
                <a href="{{ $user->linkedin }}" class="social-link" target="_blank">
                    <i class="icon-linkedin"></i>
                </a>
            @endif
            @if($user->github)
                <a href="{{ $user->github }}" class="social-link" target="_blank">
                    <i class="icon-github"></i>
                </a>
            @endif
        </div>
    </x-grid.item>
    
    <x-grid.item title="Skills">
        <div class="skills-list">
            @foreach($user->skills as $skill)
                <span class="badge badge-primary me-1 mb-1">{{ $skill->name }}</span>
            @endforeach
        </div>
    </x-grid.item>
</x-grid>
```

### Form Data Grid
```blade
<!-- Form Submission Data Grid -->
<x-grid>
    <x-grid.item title="Form ID" content="{{ $submission->form_id }}" />
    <x-grid.item title="Submitted By" content="{{ $submission->user->name }}" />
    <x-grid.item title="Submission Date" content="{{ $submission->created_at->format('M d, Y H:i') }}" />
    <x-grid.item title="IP Address" content="{{ $submission->ip_address }}" />
    <x-grid.item title="User Agent" content="{{ $submission->user_agent }}" />
    <x-grid.item title="Form Data">
        <div class="form-data">
            @foreach($submission->data as $field => $value)
                <div class="form-field">
                    <strong>{{ $field }}:</strong> {{ $value }}
                </div>
            @endforeach
        </div>
    </x-grid.item>
    <x-grid.item title="Status">
        <span class="badge badge-{{ $submission->isProcessed() ? 'success' : 'warning' }}">
            {{ $submission->isProcessed() ? 'Processed' : 'Pending' }}
        </span>
    </x-grid.item>
</x-grid>
```

### API Response Grid
```blade
<!-- API Response Information Grid -->
<x-grid>
    <x-grid.item title="Request ID" content="{{ $request->id }}" />
    <x-grid.item title="Endpoint" content="{{ $request->endpoint }}" />
    <x-grid.item title="Method" content="{{ $request->method }}" />
    <x-grid.item title="Status Code">
        <span class="badge badge-{{ $request->status_code >= 200 && $request->status_code < 300 ? 'success' : 'danger' }}">
            {{ $request->status_code }}
        </span>
    </x-grid.item>
    <x-grid.item title="Response Time" content="{{ $request->response_time }}ms" />
    <x-grid.item title="Request Size" content="{{ $request->request_size }} bytes" />
    <x-grid.item title="Response Size" content="{{ $request->response_size }} bytes" />
    <x-grid.item title="Timestamp" content="{{ $request->created_at->format('M d, Y H:i:s') }}" />
    <x-grid.item title="User Agent" content="{{ $request->user_agent }}" />
    <x-grid.item title="IP Address" content="{{ $request->ip_address }}" />
</x-grid>
```

## Livewire Integration

### Livewire Data Grid
```blade
<div>
    <x-grid>
        <x-grid.item title="Current User" content="{{ $currentUser->name }}" />
        <x-grid.item title="Session Time" content="{{ $sessionTime }}" />
        <x-grid.item title="Last Activity" content="{{ $lastActivity->diffForHumans() }}" />
        <x-grid.item title="Online Status">
            <span class="badge badge-{{ $isOnline ? 'success' : 'secondary' }}">
                {{ $isOnline ? 'Online' : 'Offline' }}
            </span>
        </x-grid.item>
    </x-grid>
</div>
```

### Livewire with Dynamic Content
```blade
<div>
    <x-grid>
        @foreach($dynamicData as $item)
            <x-grid.item title="{{ $item['title'] }}" content="{{ $item['value'] }}" />
        @endforeach
    </x-grid>
</div>
```

## Custom Styling

### Grid Custom Styles
```blade
<x-style>
    .datagrid {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    .datagrid-item {
        display: flex;
        padding: 1rem;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .datagrid-item:last-child {
        border-bottom: none;
    }
    
    .datagrid-item:nth-child(even) {
        background: #f8fafc;
    }
    
    .datagrid-title {
        font-weight: 600;
        color: #374151;
        min-width: 150px;
        margin-right: 1rem;
    }
    
    .datagrid-content {
        flex: 1;
        color: #6b7280;
    }
    
    .datagrid-item:hover {
        background: #f1f5f9;
    }
</x-style>
```

## Related Components

- [Page](page.md) - Page layout component
- [Container](container.md) - Conditional wrapper component
- [Table](table.md) - Table component

## Best Practices

1. **Consistency**: Use consistent title formatting and content structure
2. **Readability**: Ensure proper spacing and typography for easy reading
3. **Responsiveness**: Make sure grid items work well on all screen sizes
4. **Accessibility**: Use proper semantic HTML and ARIA labels
5. **Performance**: Keep content lightweight for fast rendering
6. **Testing**: Test grid layouts across different browsers and devices
7. **Documentation**: Document data structure and content requirements

## Troubleshooting

### Layout Issues
Check that Bootstrap CSS is loaded and the correct framework is configured.

### Content Not Displaying
Verify that data is available and properly formatted.

### Styling Problems
Ensure custom styles are properly applied and don't conflict with Bootstrap.
