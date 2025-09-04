# Container Component

A simple conditional wrapper component that provides basic content rendering control with enhanced user experience. This component offers conditional display functionality for wrapping content based on boolean conditions.

## Overview

**Component Type:** Layout  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class  
**JavaScript Libraries:** None (server-side conditional rendering)

## Files

- **PHP Class:** `src/Components/Container.php`
- **View File:** `resources/views/bootstrap-5/container.blade.php`
- **Tests:** `tests/Components/ContainerTest.php`
- **Documentation:** `docs/container.md`

## Basic Usage

### Simple Conditional Wrapper
```blade
<x-container :enabled="$user->isActive">
    <p>This content is only shown for active users.</p>
</x-container>
```

### Boolean Check
```blade
<x-container :enabled="count($items) > 0">
    <div class="items-list">
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
</x-container>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| enabled | mixed | true | Enable/disable rendering | `$user->isActive` |

### Inherited Attributes

The component inherits all standard Laravel component attributes.

## Usage Examples

### Basic Conditional Rendering
```blade
<!-- Simple Boolean Check -->
<x-container :enabled="$user->isActive">
    <div class="alert alert-success">User is active!</div>
</x-container>

<!-- Variable Check -->
<x-container :enabled="$hasPermission">
    <button class="btn btn-primary">Allowed Action</button>
</x-container>

<!-- Expression Check -->
<x-container :enabled="count($items) > 0">
    <div class="items-list">
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
</x-container>
```

### User Interface Examples
```blade
<!-- User Status Check -->
<x-container :enabled="$user->status === 'active' && $user->email_verified_at">
    <div class="verified-user">
        <span class="badge badge-success">Verified Active User</span>
    </div>
</x-container>

<!-- Time-based Rendering -->
<x-container :enabled="now()->isWeekday()">
    <div class="weekday-message">
        <p>This message only shows on weekdays.</p>
    </div>
</x-container>

<!-- Feature Flag -->
<x-container :enabled="config('features.new_dashboard')">
    <div class="new-dashboard">
        <h3>New Dashboard Feature</h3>
        <p>This is a new feature that can be toggled.</p>
    </div>
</x-container>
```

### Content Management Examples
```blade
<!-- Article Visibility -->
<x-container :enabled="$article->isPublished()">
    <div class="published-article">
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
    </div>
</x-container>

<!-- E-commerce Product Availability -->
<x-container :enabled="$product->inStock()">
    <div class="product-actions">
        <button class="btn btn-primary">Add to Cart</button>
        <button class="btn btn-outline-secondary">Add to Wishlist</button>
    </div>
</x-container>

<!-- Admin Panel Features -->
<x-container :enabled="$user->isAdmin()">
    <div class="admin-tools">
        <button class="btn btn-warning">Admin Action</button>
    </div>
</x-container>
```

### Dashboard Examples
```blade
<!-- Conditional Dashboard Widgets -->
<div class="dashboard">
    <x-container :enabled="auth()->user()->hasRole('admin')">
        <div class="admin-stats">
            <h3>Admin Statistics</h3>
            <p>Total Users: {{ $totalUsers }}</p>
            <p>Total Orders: {{ $totalOrders }}</p>
        </div>
    </x-container>
    
    <x-container :enabled="auth()->user()->hasRole('manager')">
        <div class="manager-widgets">
            <h3>Manager Tools</h3>
            <button class="btn btn-info">Generate Report</button>
        </div>
    </x-container>
    
    <x-container :enabled="auth()->user()->isCustomer()">
        <div class="customer-dashboard">
            <h3>Your Account</h3>
            <p>Welcome back, {{ auth()->user()->name }}!</p>
        </div>
    </x-container>
</div>
```

### Form Examples
```blade
<!-- Conditional Form Fields -->
<form method="POST" action="/profile">
    @csrf
    
    <x-form-input name="name" label="Name" required />
    <x-form-email name="email" label="Email" required />
    
    <x-container :enabled="$user->isAdmin()">
        <x-form-select name="role" label="Role" :options="$roles" />
    </x-container>
    
    <x-container :enabled="$user->isPremium()">
        <x-form-switch name="premium_features" label="Premium Features" />
    </x-container>
    
    <x-form-submit>Update Profile</x-form-submit>
</form>
```

## Livewire Integration

### Basic Livewire Container
```blade
<div>
    <x-container :enabled="$showContent">
        <p>This content is conditionally rendered.</p>
    </x-container>
    
    <button wire:click="toggleContent">Toggle Content</button>
</div>
```

### Livewire with Dynamic Conditions
```blade
<div>
    <x-container :enabled="$isAdmin && $featureEnabled">
        <div class="admin-feature">
            <h3>Admin Feature</h3>
            <button wire:click="adminAction">Admin Action</button>
        </div>
    </x-container>
</div>
```

## Related Components

- [Show](show.md) - Conditional rendering with authorization
- [Link](link.md) - Navigation links
- [Form Submit](form-submit.md) - Submit buttons

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
