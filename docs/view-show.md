# View Show Component

A simple conditional display component that provides professional content visibility control with enhanced user experience. This component offers basic conditional rendering functionality for displaying content based on boolean conditions.

## Overview

**Component Type:** View  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class  
**JavaScript Libraries:** None (server-side conditional rendering)

## Files

- **PHP Class:** `src/Components/ViewShow.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/view/show.blade.php`
- **Tests:** `tests/Components/ViewShowTest.php`
- **Documentation:** `docs/view-show.md`

## Basic Usage

### Simple Conditional Display
```blade
<x-view-show :enabled="$user->isActive">
    <div class="user-status">
        <span class="badge badge-success">Active User</span>
    </div>
</x-view-show>
```

### Boolean Check
```blade
<x-view-show :enabled="count($items) > 0">
    <div class="items-count">
        <p>Total items: {{ count($items) }}</p>
    </div>
</x-view-show>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| enabled | mixed | true | Enable/disable content display | `$user->isActive` |

### Inherited Attributes

The component inherits all standard Laravel component attributes.

## Usage Examples

### Basic Conditional Display
```blade
<!-- Simple Boolean Check -->
<x-view-show :enabled="$user->isActive">
    <div class="alert alert-success">User is active!</div>
</x-view-show>

<!-- Variable Check -->
<x-view-show :enabled="$hasPermission">
    <button class="btn btn-primary">Allowed Action</button>
</x-view-show>

<!-- Expression Check -->
<x-view-show :enabled="count($items) > 0">
    <div class="items-list">
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
</x-view-show>
```

### User Interface Examples
```blade
<!-- User Status Display -->
<x-view-show :enabled="$user->status === 'active' && $user->email_verified_at">
    <div class="verified-user">
        <span class="badge badge-success">Verified Active User</span>
    </div>
</x-view-show>

<!-- Time-based Display -->
<x-view-show :enabled="now()->isWeekday()">
    <div class="weekday-message">
        <p>This message only shows on weekdays.</p>
    </div>
</x-view-show>

<!-- Feature Flag Display -->
<x-view-show :enabled="config('features.new_dashboard')">
    <div class="new-dashboard">
        <h3>New Dashboard Feature</h3>
        <p>This is a new feature that can be toggled.</p>
    </div>
</x-view-show>
```

### Data Display Examples
```blade
<!-- Article Visibility -->
<x-view-show :enabled="$article->isPublished()">
    <div class="published-article">
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
    </div>
</x-view-show>

<!-- E-commerce Product Availability -->
<x-view-show :enabled="$product->inStock()">
    <div class="product-actions">
        <button class="btn btn-primary">Add to Cart</button>
        <button class="btn btn-outline-secondary">Add to Wishlist</button>
    </div>
</x-view-show>

<!-- Admin Panel Features -->
<x-view-show :enabled="$user->isAdmin()">
    <div class="admin-tools">
        <button class="btn btn-warning">Admin Action</button>
    </div>
</x-view-show>
```

### Dashboard Examples
```blade
<!-- Conditional Dashboard Widgets -->
<div class="dashboard">
    <x-view-show :enabled="auth()->user()->hasRole('admin')">
        <div class="admin-stats">
            <h3>Admin Statistics</h3>
            <p>Total Users: {{ $totalUsers }}</p>
            <p>Total Orders: {{ $totalOrders }}</p>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="auth()->user()->hasRole('manager')">
        <div class="manager-widgets">
            <h3>Manager Tools</h3>
            <button class="btn btn-info">Generate Report</button>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="auth()->user()->isCustomer()">
        <div class="customer-dashboard">
            <h3>Your Account</h3>
            <p>Welcome back, {{ auth()->user()->name }}!</p>
        </div>
    </x-view-show>
</div>
```

### Form Examples
```blade
<!-- Conditional Form Fields -->
<form method="POST" action="/profile">
    @csrf
    
    <x-form-input name="name" label="Name" required />
    <x-form-email name="email" label="Email" required />
    
    <x-view-show :enabled="$user->isAdmin()">
        <x-form-select name="role" label="Role" :options="$roles" />
    </x-view-show>
    
    <x-view-show :enabled="$user->isPremium()">
        <x-form-switch name="premium_features" label="Premium Features" />
    </x-view-show>
    
    <x-form-submit>Update Profile</x-form-submit>
</form>
```

### Content Management Examples
```blade
<!-- Conditional Content Blocks -->
<div class="content-blocks">
    <x-view-show :enabled="$content->isPublished()">
        <div class="published-content">
            <h2>{{ $content->title }}</h2>
            <div class="content-body">
                {!! $content->body !!}
            </div>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="$content->isDraft()">
        <div class="draft-content">
            <div class="alert alert-warning">
                <strong>Draft Content</strong>
                <p>This content is not yet published.</p>
            </div>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="$content->isArchived()">
        <div class="archived-content">
            <div class="alert alert-info">
                <strong>Archived Content</strong>
                <p>This content has been archived.</p>
            </div>
        </div>
    </x-view-show>
</div>
```

### E-commerce Examples
```blade
<!-- Product Display -->
<div class="product-card">
    <h3>{{ $product->name }}</h3>
    <p class="price">${{ $product->price }}</p>
    
    <x-view-show :enabled="$product->inStock()">
        <div class="stock-info">
            <span class="badge badge-success">In Stock</span>
            <p>Available: {{ $product->stock_quantity }} units</p>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="!$product->inStock()">
        <div class="stock-info">
            <span class="badge badge-danger">Out of Stock</span>
            <p>This item is currently unavailable.</p>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="$product->onSale()">
        <div class="sale-info">
            <span class="badge badge-warning">On Sale</span>
            <p>Save {{ $product->discount_percentage }}%</p>
        </div>
    </x-view-show>
</div>
```

## Livewire Integration

### Basic Livewire View Show
```blade
<div>
    <x-view-show :enabled="$showContent">
        <p>This content is conditionally displayed.</p>
    </x-view-show>
    
    <button wire:click="toggleContent">Toggle Content</button>
</div>
```

### Livewire with Dynamic Conditions
```blade
<div>
    <x-view-show :enabled="$isAdmin && $featureEnabled">
        <div class="admin-feature">
            <h3>Admin Feature</h3>
            <button wire:click="adminAction">Admin Action</button>
        </div>
    </x-view-show>
</div>
```

### Livewire with Real-time Updates
```blade
<div>
    <x-view-show :enabled="$user->isOnline">
        <div class="online-indicator">
            <span class="badge badge-success">Online</span>
        </div>
    </x-view-show>
    
    <x-view-show :enabled="!$user->isOnline">
        <div class="offline-indicator">
            <span class="badge badge-secondary">Offline</span>
            <p>Last seen: {{ $user->last_seen_at->diffForHumans() }}</p>
        </div>
    </x-view-show>
</div>
```

## Related Components

- [Show](show.md) - Conditional rendering with authorization
- [Container](container.md) - Conditional wrapper component
- [View Empty](view-empty.md) - Empty state display component

## Best Practices

1. **Simple Conditions**: Use for basic boolean checks and expressions
2. **Performance**: Use efficient conditional checks
3. **User Experience**: Provide clear feedback for hidden content
4. **Accessibility**: Ensure proper ARIA attributes for dynamic content
5. **Testing**: Test all conditional rendering scenarios
6. **Documentation**: Document complex conditional logic
7. **Consistency**: Use consistent patterns across the application

## Troubleshooting

### Content Not Showing
Check that the enabled condition evaluates to true.

### Performance Issues
Optimize conditional checks and avoid complex queries in conditions.

### Complex Logic
For complex authorization logic, consider using the [Show](show.md) component instead.

### Livewire Issues
Ensure that Livewire properties are properly reactive and updated.
