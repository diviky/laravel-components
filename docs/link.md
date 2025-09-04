# Link Component

A comprehensive link component that provides professional navigation capabilities with extensive styling options, authorization support, and enhanced user experience. This component offers advanced link features including route matching, modal integration, confirmation dialogs, and seamless navigation.

## Overview

**Component Type:** Navigation  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, Authorize trait  
**JavaScript Libraries:** Bootstrap JavaScript (for modals and confirmations)

## Files

- **PHP Class:** `src/Components/Link.php`
- **View File:** `resources/views/bootstrap-5/link.blade.php`
- **Tests:** `tests/Components/LinkTest.php`
- **Documentation:** `docs/link.md`

## Basic Usage

### Simple Link
```blade
<x-link href="/dashboard">Dashboard</x-link>
```

### Route-based Link
```blade
<x-link route="users.index">Users</x-link>
```

### Button-style Link
```blade
<x-link button primary href="/create">Create New</x-link>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| action | string | '' | Action URL or route name | `'users.store'` |
| href | string | '#' | Direct URL | `'/dashboard'` |
| route | string | null | Laravel route name | `'users.index'` |
| url | string | null | URL helper | `'users/create'` |
| params | array | [] | Route parameters | `['id' => 1]` |
| modal | boolean | false | Open in modal | `true` |
| confirm | boolean | false | Show confirmation dialog | `true` |
| button | boolean | false | Render as button | `true` |
| away | boolean | false | External link (target="_blank") | `true` |
| slideover | boolean | false | Open in slideover | `true` |
| outline | boolean | false | Outline button style | `true` |
| ghost | boolean | false | Ghost button style | `true` |
| active | boolean | null | Force active state | `true` |
| icon | string | null | Icon name | `'home'` |
| enabled | mixed | true | Enable/disable link | `false` |
| disabled | boolean | false | Disable the link | `true` |
| external | boolean | false | External link indicator | `true` |
| badge | string | null | Badge text | `'New'` |
| badgeClasses | string | null | Badge CSS classes | `'badge-danger'` |
| can | string\|bool | null | Authorization check | `'edit-users'` |
| role | string | null | Required role | `'admin'` |
| match | string | null | Route pattern match | `'admin.*'` |
| exact | boolean | false | Exact route match | `true` |
| title | string | null | Link title attribute | `'Go to dashboard'` |
| tab | boolean | false | Tab navigation | `true` |

### Inherited Attributes

The component inherits all standard HTML anchor attributes and Laravel component attributes.

## Usage Examples

### Basic Navigation Links
```blade
<!-- Simple Link -->
<x-link href="/dashboard">Dashboard</x-link>

<!-- Route-based Link -->
<x-link route="users.index">Users</x-link>

<!-- Link with Parameters -->
<x-link route="users.show" :params="['user' => $user->id]">View User</x-link>

<!-- External Link -->
<x-link href="https://example.com" away>External Site</x-link>
```

### Button-style Links
```blade
<!-- Primary Button Link -->
<x-link button primary href="/create">Create New</x-link>

<!-- Success Button Link -->
<x-link button success route="orders.create">New Order</x-link>

<!-- Danger Button Link -->
<x-link button danger href="/delete">Delete</x-link>

<!-- Outline Button Link -->
<x-link button outline primary href="/edit">Edit</x-link>

<!-- Ghost Button Link -->
<x-link button ghost secondary href="/cancel">Cancel</x-link>
```

### Links with Icons
```blade
<!-- Link with Icon -->
<x-link href="/dashboard" icon="home">Dashboard</x-link>

<!-- Button Link with Icon -->
<x-link button primary icon="plus" href="/create">Add New</x-link>

<!-- Icon-only Link -->
<x-link href="/settings" icon="settings" title="Settings"></x-link>
```

### Links with Badges
```blade
<!-- Link with Badge -->
<x-link href="/notifications" badge="5">Notifications</x-link>

<!-- Link with Custom Badge -->
<x-link href="/messages" badge="New" badgeClasses="badge-danger">Messages</x-link>

<!-- Button Link with Badge -->
<x-link button primary badge="3" href="/cart">Shopping Cart</x-link>
```

### Modal Links
```blade
<!-- Modal Link -->
<x-link modal href="/modal-content">Open Modal</x-link>

<!-- Modal Button Link -->
<x-link button primary modal href="/user-form">Add User</x-link>

<!-- Slideover Link -->
<x-link slideover href="/slideover-content">Open Slideover</x-link>
```

### Confirmation Links
```blade
<!-- Confirmation Link -->
<x-link confirm href="/delete-item">Delete Item</x-link>

<!-- Confirmation Button Link -->
<x-link button danger confirm href="/delete-user">Delete User</x-link>

<!-- Modal with Confirmation -->
<x-link button danger modal confirm href="/delete-confirm">Delete</x-link>
```

### Authorization Links
```blade
<!-- Permission-based Link -->
<x-link can="edit-users" href="/users/edit">Edit Users</x-link>

<!-- Role-based Link -->
<x-link role="admin" href="/admin">Admin Panel</x-link>

<!-- Route-based Permission -->
<x-link can="name:users.edit" route="users.edit" :params="['user' => $user->id]">Edit</x-link>
```

### Active State Links
```blade
<!-- Auto-active Link (based on current route) -->
<x-link route="dashboard">Dashboard</x-link>

<!-- Force Active State -->
<x-link href="/current-page" active>Current Page</x-link>

<!-- Pattern Matching -->
<x-link match="admin.*" href="/admin">Admin</x-link>

<!-- Exact Match -->
<x-link exact route="home" href="/">Home</x-link>
```

### Navigation Examples
```blade
<!-- Main Navigation -->
<nav class="navbar">
    <x-link route="home">Home</x-link>
    <x-link route="about">About</x-link>
    <x-link route="contact">Contact</x-link>
    <x-link route="blog.index">Blog</x-link>
</nav>

<!-- User Menu -->
<div class="dropdown">
    <x-link button dropdown href="#" icon="user">User Menu</x-link>
    <div class="dropdown-menu">
        <x-link href="/profile">Profile</x-link>
        <x-link href="/settings">Settings</x-link>
        <x-link href="/logout" confirm>Logout</x-link>
    </div>
</div>

<!-- Action Buttons -->
<div class="btn-group">
    <x-link button primary icon="edit" href="/edit">Edit</x-link>
    <x-link button success icon="eye" href="/view">View</x-link>
    <x-link button danger icon="trash" href="/delete" confirm>Delete</x-link>
</div>
```

### E-commerce Examples
```blade
<!-- Product Actions -->
<div class="product-actions">
    <x-link button primary icon="cart" href="/add-to-cart">Add to Cart</x-link>
    <x-link button outline icon="heart" href="/add-to-wishlist">Wishlist</x-link>
    <x-link button ghost icon="share" href="/share">Share</x-link>
</div>

<!-- Order Management -->
<div class="order-actions">
    <x-link button success href="/orders/{{ $order->id }}/view">View Order</x-link>
    <x-link button primary href="/orders/{{ $order->id }}/edit">Edit Order</x-link>
    <x-link button danger confirm href="/orders/{{ $order->id }}/cancel">Cancel Order</x-link>
</div>
```

### Admin Panel Examples
```blade
<!-- Admin Navigation -->
<nav class="admin-nav">
    <x-link route="admin.dashboard" icon="dashboard">Dashboard</x-link>
    <x-link route="admin.users" icon="users">Users</x-link>
    <x-link route="admin.orders" icon="shopping-cart">Orders</x-link>
    <x-link route="admin.settings" icon="settings">Settings</x-link>
</nav>

<!-- Data Table Actions -->
<div class="table-actions">
    <x-link button primary sm icon="plus" href="/admin/users/create">Add User</x-link>
    <x-link button success sm icon="download" href="/admin/users/export">Export</x-link>
    <x-link button warning sm icon="upload" href="/admin/users/import">Import</x-link>
</div>
```

## Livewire Integration

### Basic Livewire Link
```blade
<div>
    <x-link wire:click="navigateToUsers">Go to Users</x-link>
</div>
```

### Livewire with Parameters
```blade
<div>
    <x-link wire:click="editUser({{ $user->id }})">Edit User</x-link>
</div>
```

### Livewire Modal Link
```blade
<div>
    <x-link button primary wire:click="$set('showModal', true)">Open Modal</x-link>
</div>
```

## Styling Classes

The component applies these CSS classes based on props:

### Button Classes
- `btn` - Base button class
- `btn-primary` - Primary color
- `btn-success` - Success color
- `btn-danger` - Danger color
- `btn-warning` - Warning color
- `btn-info` - Info color
- `btn-light` - Light color
- `btn-dark` - Dark color

### Style Classes
- `btn-outline-primary` - Outline primary
- `btn-ghost-primary` - Ghost primary
- `btn-square` - Square button
- `btn-pill` - Pill-shaped button
- `btn-block` - Full width button

### Size Classes
- `btn-sm` - Small button
- `btn-lg` - Large button

### State Classes
- `active` - Active state
- `disabled` - Disabled state
- `nav-link` - Navigation link

## Related Components

- [Form Submit](form-submit.md) - Submit buttons
- [Form Button](form-button.md) - General purpose buttons
- [Nav](nav.md) - Navigation components
- [Dropdown](dropdown.md) - Dropdown menus

## Best Practices

1. **Semantic URLs**: Use meaningful URLs and route names
2. **Authorization**: Always check permissions for sensitive actions
3. **Confirmation**: Use confirmation for destructive actions
4. **Accessibility**: Provide proper titles and ARIA labels
5. **Active States**: Use automatic active state detection
6. **External Links**: Mark external links appropriately
7. **Loading States**: Show loading states for async actions

## Troubleshooting

### Link Not Working
Check that the route exists and parameters are correct.

### Authorization Issues
Verify that the user has the required permissions or roles.

### Active State Not Working
Ensure the route matching logic is correct and routes are properly named.

### Modal Not Opening
Check that Bootstrap JavaScript is loaded and modal functionality is enabled.

### Styling Issues
Verify that Bootstrap CSS is loaded and the correct framework is configured.
