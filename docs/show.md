# Show Component

A conditional rendering component that provides professional content visibility control with authorization support and enhanced user experience. This component offers advanced conditional display features including permission-based rendering, role-based access control, and seamless content management.

## Overview

**Component Type:** Conditional Rendering  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, Authorize trait  
**JavaScript Libraries:** None (server-side conditional rendering)

## Files

- **PHP Class:** `src/Components/Show.php`
- **View File:** `resources/views/bootstrap-5/view/show.blade.php`
- **Tests:** `tests/Components/ShowTest.php`
- **Documentation:** `docs/show.md`

## Basic Usage

### Simple Conditional Rendering
```blade
<x-show :enabled="$user->isActive">
    <p>This content is only shown for active users.</p>
</x-show>
```

### Permission-based Rendering
```blade
<x-show can="edit-users">
    <button>Edit User</button>
</x-show>
```

### Role-based Rendering
```blade
<x-show role="admin">
    <div class="admin-panel">Admin only content</div>
</x-show>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| enabled | mixed | true | Enable/disable rendering | `$user->isActive` |
| can | string\|bool | null | Permission check | `'edit-users'` |
| action | string | null | Action for permission check | `'update'` |
| role | string | null | Required role | `'admin'` |

### Inherited Attributes

The component inherits all standard Laravel component attributes.

## Usage Examples

### Basic Conditional Rendering
```blade
<!-- Simple Boolean Check -->
<x-show :enabled="$user->isActive">
    <div class="alert alert-success">User is active!</div>
</x-show>

<!-- Variable Check -->
<x-show :enabled="$hasPermission">
    <button class="btn btn-primary">Allowed Action</button>
</x-show>

<!-- Expression Check -->
<x-show :enabled="count($items) > 0">
    <div class="items-list">
        @foreach($items as $item)
            <div>{{ $item->name }}</div>
        @endforeach
    </div>
</x-show>
```

### Permission-based Rendering
```blade
<!-- Simple Permission Check -->
<x-show can="edit-users">
    <button class="btn btn-primary">Edit User</button>
</x-show>

<!-- Multiple Permission Checks -->
<x-show can="delete-users">
    <button class="btn btn-danger">Delete User</button>
</x-show>

<!-- Permission with Action -->
<x-show can="users.update" action="update">
    <form method="POST" action="/users/{{ $user->id }}">
        @method('PUT')
        <button type="submit">Update User</button>
    </form>
</x-show>
```

### Role-based Rendering
```blade
<!-- Admin Only Content -->
<x-show role="admin">
    <div class="admin-dashboard">
        <h2>Admin Dashboard</h2>
        <p>This content is only visible to administrators.</p>
    </div>
</x-show>

<!-- Manager Role -->
<x-show role="manager">
    <div class="manager-tools">
        <button class="btn btn-warning">Manager Action</button>
    </div>
</x-show>

<!-- Multiple Roles -->
<x-show role="admin,manager">
    <div class="privileged-content">
        <p>Content for admins and managers only.</p>
    </div>
</x-show>
```

### Complex Conditional Logic
```blade
<!-- User Status Check -->
<x-show :enabled="$user->status === 'active' && $user->email_verified_at">
    <div class="verified-user">
        <span class="badge badge-success">Verified Active User</span>
    </div>
</x-show>

<!-- Time-based Rendering -->
<x-show :enabled="now()->isWeekday()">
    <div class="weekday-message">
        <p>This message only shows on weekdays.</p>
    </div>
</x-show>

<!-- Feature Flag -->
<x-show :enabled="config('features.new_dashboard')">
    <div class="new-dashboard">
        <h3>New Dashboard Feature</h3>
        <p>This is a new feature that can be toggled.</p>
    </div>
</x-show>
```

### User Interface Examples
```blade
<!-- User Profile Actions -->
<div class="user-actions">
    <x-show can="users.edit">
        <button class="btn btn-primary">Edit Profile</button>
    </x-show>
    
    <x-show can="users.delete">
        <button class="btn btn-danger">Delete Account</button>
    </x-show>
    
    <x-show :enabled="$user->id === auth()->id()">
        <button class="btn btn-secondary">My Profile</button>
    </x-show>
</div>

<!-- Navigation Menu -->
<nav class="sidebar">
    <x-show can="dashboard.view">
        <a href="/dashboard">Dashboard</a>
    </x-show>
    
    <x-show can="users.view">
        <a href="/users">Users</a>
    </x-show>
    
    <x-show role="admin">
        <a href="/admin">Admin Panel</a>
    </x-show>
    
    <x-show :enabled="auth()->user()->isPremium()">
        <a href="/premium">Premium Features</a>
    </x-show>
</nav>
```

### Content Management Examples
```blade
<!-- Article Actions -->
<div class="article-actions">
    <x-show can="articles.edit" :enabled="$article->isPublished()">
        <button class="btn btn-primary">Edit Article</button>
    </x-show>
    
    <x-show can="articles.publish" :enabled="!$article->isPublished()">
        <button class="btn btn-success">Publish Article</button>
    </x-show>
    
    <x-show can="articles.delete">
        <button class="btn btn-danger">Delete Article</button>
    </x-show>
</div>

<!-- E-commerce Product Actions -->
<div class="product-actions">
    <x-show :enabled="$product->inStock()">
        <button class="btn btn-primary">Add to Cart</button>
    </x-show>
    
    <x-show :enabled="$user->isWishlistEnabled()">
        <button class="btn btn-outline-secondary">Add to Wishlist</button>
    </x-show>
    
    <x-show can="products.manage">
        <button class="btn btn-warning">Manage Product</button>
    </x-show>
</div>
```

### Dashboard Examples
```blade
<!-- Admin Dashboard -->
<div class="dashboard">
    <x-show role="admin">
        <div class="admin-stats">
            <h3>Admin Statistics</h3>
            <p>Total Users: {{ $totalUsers }}</p>
            <p>Total Orders: {{ $totalOrders }}</p>
        </div>
    </x-show>
    
    <x-show :enabled="auth()->user()->hasRole('manager')">
        <div class="manager-widgets">
            <h3>Manager Tools</h3>
            <button class="btn btn-info">Generate Report</button>
        </div>
    </x-show>
    
    <x-show :enabled="auth()->user()->isCustomer()">
        <div class="customer-dashboard">
            <h3>Your Account</h3>
            <p>Welcome back, {{ auth()->user()->name }}!</p>
        </div>
    </x-show>
</div>
```

### Form Examples
```blade
<!-- Conditional Form Fields -->
<form method="POST" action="/profile">
    @csrf
    
    <x-form-input name="name" label="Name" required />
    <x-form-email name="email" label="Email" required />
    
    <x-show can="users.edit-role">
        <x-form-select name="role" label="Role" :options="$roles" />
    </x-show>
    
    <x-show :enabled="$user->isAdmin()">
        <x-form-switch name="is_active" label="Active Status" />
    </x-show>
    
    <x-show can="users.edit">
        <x-form-submit>Update Profile</x-form-submit>
    </x-show>
</form>
```

## Livewire Integration

### Basic Livewire Show
```blade
<div>
    <x-show :enabled="$showContent">
        <p>This content is conditionally rendered.</p>
    </x-show>
    
    <button wire:click="toggleContent">Toggle Content</button>
</div>
```

### Livewire with Permissions
```blade
<div>
    <x-show can="edit-users">
        <button wire:click="editUser({{ $user->id }})">Edit User</button>
    </x-show>
</div>
```

### Livewire with Dynamic Conditions
```blade
<div>
    <x-show :enabled="$isAdmin && $featureEnabled">
        <div class="admin-feature">
            <h3>Admin Feature</h3>
            <button wire:click="adminAction">Admin Action</button>
        </div>
    </x-show>
</div>
```

## Authorization Integration

The Show component integrates with Laravel's authorization system:

### Permission Checks
```blade
<!-- Using Gate -->
<x-show can="edit-users">
    <button>Edit</button>
</x-show>

<!-- Using Policy -->
<x-show can="update" :model="$user">
    <button>Update User</button>
</x-show>
```

### Role Checks
```blade
<!-- Single Role -->
<x-show role="admin">
    <div>Admin content</div>
</x-show>

<!-- Multiple Roles -->
<x-show role="admin,manager">
    <div>Admin or Manager content</div>
</x-show>
```

## Related Components

- [Link](link.md) - Navigation links with authorization
- [Form Submit](form-submit.md) - Submit buttons
- [Form Button](form-button.md) - General purpose buttons

## Best Practices

1. **Security First**: Always use authorization for sensitive content
2. **Performance**: Use efficient conditional checks
3. **User Experience**: Provide clear feedback for hidden content
4. **Accessibility**: Ensure proper ARIA attributes for dynamic content
5. **Testing**: Test all conditional rendering scenarios
6. **Documentation**: Document complex conditional logic
7. **Consistency**: Use consistent patterns across the application

## Troubleshooting

### Content Not Showing
Check that all conditions are met (enabled, permissions, roles).

### Permission Issues
Verify that the user has the required permissions or roles.

### Performance Issues
Optimize conditional checks and avoid complex queries in conditions.

### Authorization Errors
Ensure proper authorization policies and gates are defined.
