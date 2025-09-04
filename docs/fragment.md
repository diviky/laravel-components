# Fragment Component

A specialized content fragment component that provides AJAX content loading capabilities with enhanced user experience. This component offers advanced fragment management for dynamic content updates and seamless integration with modern web applications.

## Overview

**Component Type:** Layout  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class  
**JavaScript Libraries:** None (server-side fragment management)

## Files

- **PHP Class:** `src/Components/Fragment.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/fragment.blade.php`
- **Tests:** `tests/Components/FragmentTest.php`
- **Documentation:** `docs/fragment.md`

## Basic Usage

### Simple Fragment
```blade
<x-fragment name="user-profile">
    <div class="user-info">
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->email }}</p>
    </div>
</x-fragment>
```

### Fragment with Attributes
```blade
<x-fragment name="dashboard-stats" class="stats-container">
    <div class="stat-item">
        <span class="stat-value">{{ $totalUsers }}</span>
        <span class="stat-label">Total Users</span>
    </div>
</x-fragment>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | null | Fragment identifier | `'user-profile'` |

### Inherited Attributes

The component inherits all standard HTML div attributes and Laravel component attributes.

## Usage Examples

### Basic Fragment Usage
```blade
<!-- Simple Fragment -->
<x-fragment name="welcome-message">
    <div class="alert alert-info">
        <h4>Welcome to our application!</h4>
        <p>This is a dynamic fragment that can be updated via AJAX.</p>
    </div>
</x-fragment>

<!-- Fragment with Content -->
<x-fragment name="user-stats">
    <div class="stats-grid">
        <div class="stat-card">
            <h3>{{ $userCount }}</h3>
            <p>Total Users</p>
        </div>
        <div class="stat-card">
            <h3>{{ $orderCount }}</h3>
            <p>Total Orders</p>
        </div>
    </div>
</x-fragment>
```

### Dashboard Fragments
```blade
<!-- Dashboard Header Fragment -->
<x-fragment name="dashboard-header" class="dashboard-header">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Dashboard</h1>
        <div class="dashboard-actions">
            <button class="btn btn-primary">Refresh</button>
            <button class="btn btn-secondary">Settings</button>
        </div>
    </div>
</x-fragment>

<!-- Dashboard Content Fragment -->
<x-fragment name="dashboard-content" class="dashboard-content">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Activity</h5>
                </div>
                <div class="card-body">
                    @foreach($recentActivities as $activity)
                        <div class="activity-item">
                            <span class="activity-time">{{ $activity->created_at->diffForHumans() }}</span>
                            <span class="activity-description">{{ $activity->description }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Quick Stats</h5>
                </div>
                <div class="card-body">
                    <div class="stats-row">
                        <div class="stat">
                            <span class="stat-number">{{ $totalUsers }}</span>
                            <span class="stat-label">Users</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">{{ $totalOrders }}</span>
                            <span class="stat-label">Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-fragment>
```

### User Profile Fragments
```blade
<!-- User Profile Header -->
<x-fragment name="profile-header" class="profile-header">
    <div class="profile-avatar">
        <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="avatar-lg">
    </div>
    <div class="profile-info">
        <h2>{{ $user->name }}</h2>
        <p class="text-muted">{{ $user->email }}</p>
        <span class="badge badge-{{ $user->isActive() ? 'success' : 'secondary' }}">
            {{ $user->isActive() ? 'Active' : 'Inactive' }}
        </span>
    </div>
</x-fragment>

<!-- User Profile Content -->
<x-fragment name="profile-content" class="profile-content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Profile Information</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <x-form-input name="name" label="Full Name" :value="$user->name" required />
                        <x-form-email name="email" label="Email Address" :value="$user->email" required />
                        <x-form-tel name="phone" label="Phone Number" :value="$user->phone" />
                        
                        <x-form-submit>Update Profile</x-form-submit>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Account Settings</h5>
                </div>
                <div class="card-body">
                    <div class="settings-list">
                        <div class="setting-item">
                            <label>Email Notifications</label>
                            <x-form-switch name="email_notifications" :value="$user->email_notifications" />
                        </div>
                        <div class="setting-item">
                            <label>Two-Factor Authentication</label>
                            <x-form-switch name="two_factor" :value="$user->two_factor_enabled" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-fragment>
```

### E-commerce Product Fragments
```blade
<!-- Product Gallery Fragment -->
<x-fragment name="product-gallery" class="product-gallery">
    <div class="gallery-container">
        <div class="main-image">
            <img src="{{ $product->main_image_url }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="thumbnail-list">
            @foreach($product->images as $image)
                <div class="thumbnail">
                    <img src="{{ $image->url }}" alt="{{ $product->name }}" class="img-thumbnail">
                </div>
            @endforeach
        </div>
    </div>
</x-fragment>

<!-- Product Details Fragment -->
<x-fragment name="product-details" class="product-details">
    <div class="product-info">
        <h1>{{ $product->name }}</h1>
        <p class="product-price">${{ $product->price }}</p>
        <p class="product-description">{{ $product->description }}</p>
        
        <div class="product-actions">
            <x-container :enabled="$product->inStock()">
                <button class="btn btn-primary btn-lg">Add to Cart</button>
            </x-container>
            <button class="btn btn-outline-secondary">Add to Wishlist</button>
        </div>
    </div>
</x-fragment>
```

### Sortable Fragments
```blade
<!-- Sortable Dashboard Widgets -->
<x-fragment name="dashboard-widgets" class="dashboard-widgets" sortable>
    <div class="widget" data-widget="stats">
        <div class="widget-header">
            <h5>Statistics</h5>
        </div>
        <div class="widget-body">
            <div class="stat-item">
                <span class="stat-value">{{ $totalUsers }}</span>
                <span class="stat-label">Users</span>
            </div>
        </div>
    </div>
    
    <div class="widget" data-widget="recent-activity">
        <div class="widget-header">
            <h5>Recent Activity</h5>
        </div>
        <div class="widget-body">
            @foreach($recentActivities as $activity)
                <div class="activity-item">
                    <span class="activity-time">{{ $activity->created_at->diffForHumans() }}</span>
                    <span class="activity-description">{{ $activity->description }}</span>
                </div>
            @endforeach
        </div>
    </div>
</x-fragment>
```

## Livewire Integration

### Basic Livewire Fragment
```blade
<div>
    <x-fragment name="dynamic-content">
        <p>This content can be updated via Livewire.</p>
        <p>Current count: {{ $count }}</p>
    </x-fragment>
    
    <button wire:click="increment">Increment</button>
</div>
```

### Livewire with Fragment Updates
```blade
<div>
    <x-fragment name="user-list">
        <div class="user-list">
            @foreach($users as $user)
                <div class="user-item">
                    <span>{{ $user->name }}</span>
                    <button wire:click="deleteUser({{ $user->id }})">Delete</button>
                </div>
            @endforeach
        </div>
    </x-fragment>
</div>
```

## AJAX Integration

### JavaScript Fragment Loading
```javascript
// Load fragment content via AJAX
function loadFragment(fragmentName) {
    fetch(`/fragments/${fragmentName}`)
        .then(response => response.text())
        .then(html => {
            const fragment = document.querySelector(`[fragment="${fragmentName}"]`);
            if (fragment) {
                fragment.innerHTML = html;
            }
        });
}

// Update fragment content
function updateFragment(fragmentName, data) {
    const fragment = document.querySelector(`[fragment="${fragmentName}"]`);
    if (fragment) {
        fragment.innerHTML = data;
    }
}
```

### Laravel Route for Fragment Loading
```php
// routes/web.php
Route::get('/fragments/{name}', function ($name) {
    return view("fragments.{$name}");
})->name('fragments.show');
```

## Related Components

- [Container](container.md) - Conditional wrapper component
- [Show](show.md) - Conditional rendering with authorization
- [Page](page.md) - Page layout component

## Best Practices

1. **Naming**: Use descriptive fragment names for easy identification
2. **Performance**: Keep fragment content lightweight for fast loading
3. **Caching**: Consider caching fragment content for better performance
4. **Accessibility**: Ensure proper ARIA attributes for dynamic content
5. **Testing**: Test fragment loading and updating scenarios
6. **Documentation**: Document fragment dependencies and requirements
7. **Consistency**: Use consistent fragment naming conventions

## Troubleshooting

### Fragment Not Loading
Check that the fragment name is correct and the route exists.

### Content Not Updating
Verify that the fragment selector matches the name attribute.

### Performance Issues
Consider caching fragment content or optimizing the content size.

### JavaScript Errors
Ensure that fragment loading JavaScript is properly implemented.
