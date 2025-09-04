# Page Component

A comprehensive page layout component that provides professional page structure with header, body, and footer sections. This component offers advanced page organization with flexible content management and seamless integration with modern web applications.

## Overview

**Component Type:** Layout  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class  
**JavaScript Libraries:** None (pure layout component)

## Files

- **PHP Class:** `src/Components/Page.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/page/index.blade.php`
- **Sub-components:** `page.header`, `page.body`, `page.footer`, `page.title`, `page.subtitle`, `page.options`
- **Tests:** `tests/Components/PageTest.php`
- **Documentation:** `docs/page.md`

## Basic Usage

### Simple Page Layout
```blade
<x-page>
    <x-page.header>
        <h1>Page Title</h1>
    </x-page.header>
    
    <x-page.body>
        <p>Page content goes here.</p>
    </x-page.body>
    
    <x-page.footer>
        <p>&copy; 2024 Your Company</p>
    </x-page.footer>
</x-page>
```

### Page with Slots
```blade
<x-page 
    :header="$pageHeader" 
    :body="$pageBody" 
    :footer="$pageFooter">
    <!-- Additional content -->
</x-page>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| header | mixed | null | Header content slot | `$headerContent` |
| body | mixed | null | Body content slot | `$bodyContent` |
| footer | mixed | null | Footer content slot | `$footerContent` |

### Sub-component Attributes

#### Page Header
| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| border | boolean | false | Add border to header | `true` |

### Inherited Attributes

The component inherits all standard HTML div attributes and Laravel component attributes.

## Usage Examples

### Basic Page Structure
```blade
<!-- Simple Page Layout -->
<x-page>
    <x-page.header>
        <div class="d-flex justify-content-between align-items-center">
            <h1>Dashboard</h1>
            <div class="page-actions">
                <button class="btn btn-primary">New Item</button>
            </div>
        </div>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Main Content</h5>
                        <p>This is the main content area of the page.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Sidebar</h5>
                        <p>This is the sidebar content.</p>
                    </div>
                </div>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <div class="text-center text-muted">
            <p>&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </x-page.footer>
</x-page>
```

### Dashboard Page
```blade
<!-- Dashboard Page Layout -->
<x-page>
    <x-page.header border>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>Dashboard</h1>
                <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
            </div>
            <div class="dashboard-actions">
                <button class="btn btn-outline-primary me-2">Export Data</button>
                <button class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </x-page.header>
    
    <x-page.body>
        <div class="dashboard-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="icon-users"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total Users</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="icon-shopping-cart"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $totalOrders }}</h3>
                    <p>Total Orders</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="icon-dollar-sign"></i>
                </div>
                <div class="stat-content">
                    <h3>${{ number_format($totalRevenue) }}</h3>
                    <p>Total Revenue</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Recent Activity</h5>
                    </div>
                    <div class="card-body">
                        @foreach($recentActivities as $activity)
                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="{{ $activity->icon }}"></i>
                                </div>
                                <div class="activity-content">
                                    <p class="mb-1">{{ $activity->description }}</p>
                                    <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="quick-actions">
                            <button class="btn btn-outline-primary w-100 mb-2">Create User</button>
                            <button class="btn btn-outline-success w-100 mb-2">New Order</button>
                            <button class="btn btn-outline-info w-100 mb-2">View Reports</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <small class="text-muted">Last updated: {{ now()->format('M d, Y H:i') }}</small>
            </div>
            <div>
                <small class="text-muted">Version 1.0.0</small>
            </div>
        </div>
    </x-page.footer>
</x-page>
```

### User Profile Page
```blade
<!-- User Profile Page -->
<x-page>
    <x-page.header>
        <div class="profile-header">
            <div class="profile-avatar">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="avatar-lg">
            </div>
            <div class="profile-info">
                <h1>{{ $user->name }}</h1>
                <p class="text-muted">{{ $user->email }}</p>
                <div class="profile-badges">
                    <span class="badge badge-{{ $user->isActive() ? 'success' : 'secondary' }}">
                        {{ $user->isActive() ? 'Active' : 'Inactive' }}
                    </span>
                    <span class="badge badge-primary">{{ $user->role->name }}</span>
                </div>
            </div>
            <div class="profile-actions">
                <button class="btn btn-outline-primary">Edit Profile</button>
                <button class="btn btn-primary">Send Message</button>
            </div>
        </div>
    </x-page.header>
    
    <x-page.body>
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
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-input name="name" label="Full Name" :value="$user->name" required />
                                </div>
                                <div class="col-md-6">
                                    <x-form-email name="email" label="Email Address" :value="$user->email" required />
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <x-form-tel name="phone" label="Phone Number" :value="$user->phone" />
                                </div>
                                <div class="col-md-6">
                                    <x-form-input name="location" label="Location" :value="$user->location" />
                                </div>
                            </div>
                            
                            <x-form-textarea name="bio" label="Bio" :value="$user->bio" rows="4" />
                            
                            <div class="form-actions">
                                <x-form-submit>Update Profile</x-form-submit>
                                <button type="button" class="btn btn-outline-secondary">Cancel</button>
                            </div>
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
                            <div class="setting-item">
                                <label>Public Profile</label>
                                <x-form-switch name="public_profile" :value="$user->is_public" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-3">
                    <div class="card-header">
                        <h5>Account Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="stats-list">
                            <div class="stat-item">
                                <span class="stat-label">Member Since</span>
                                <span class="stat-value">{{ $user->created_at->format('M Y') }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Last Login</span>
                                <span class="stat-value">{{ $user->last_login_at?->diffForHumans() ?? 'Never' }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Total Orders</span>
                                <span class="stat-value">{{ $user->orders_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <div class="text-center">
            <small class="text-muted">
                Profile last updated: {{ $user->updated_at->format('M d, Y H:i') }}
            </small>
        </div>
    </x-page.footer>
</x-page>
```

### E-commerce Product Page
```blade
<!-- Product Page Layout -->
<x-page>
    <x-page.header>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active">{{ $product->category->name }}</li>
            </ol>
        </nav>
    </x-page.header>
    
    <x-page.body>
        <div class="row">
            <div class="col-md-6">
                <div class="product-gallery">
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
            </div>
            
            <div class="col-md-6">
                <div class="product-info">
                    <h1>{{ $product->name }}</h1>
                    <div class="product-rating">
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="icon-star{{ $i <= $product->rating ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                        <span class="rating-text">({{ $product->reviews_count }} reviews)</span>
                    </div>
                    
                    <div class="product-price">
                        <span class="current-price">${{ $product->price }}</span>
                        @if($product->original_price > $product->price)
                            <span class="original-price">${{ $product->original_price }}</span>
                        @endif
                    </div>
                    
                    <div class="product-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    
                    <div class="product-options">
                        @if($product->hasVariants())
                            <div class="variant-selector">
                                <label>Size:</label>
                                <select class="form-select">
                                    @foreach($product->variants as $variant)
                                        <option value="{{ $variant->id }}">{{ $variant->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        
                        <div class="quantity-selector">
                            <label>Quantity:</label>
                            <div class="quantity-controls">
                                <button class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
                                <input type="number" class="form-control" value="1" min="1" max="{{ $product->stock }}">
                                <button class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="product-actions">
                        <x-container :enabled="$product->inStock()">
                            <button class="btn btn-primary btn-lg">Add to Cart</button>
                        </x-container>
                        <button class="btn btn-outline-secondary">Add to Wishlist</button>
                        <button class="btn btn-outline-info">Share</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12">
                <div class="product-tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#description">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#specifications">Specifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#reviews">Reviews</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description">
                            <div class="p-4">
                                <p>{{ $product->full_description }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="specifications">
                            <div class="p-4">
                                <table class="table">
                                    @foreach($product->specifications as $spec)
                                        <tr>
                                            <td><strong>{{ $spec->name }}</strong></td>
                                            <td>{{ $spec->value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <div class="p-4">
                                @foreach($product->reviews as $review)
                                    <div class="review-item">
                                        <div class="review-header">
                                            <div class="reviewer-info">
                                                <strong>{{ $review->user->name }}</strong>
                                                <div class="review-rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="icon-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                        </div>
                                        <p class="review-content">{{ $review->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer>
        <div class="text-center">
            <small class="text-muted">
                Product ID: {{ $product->id }} | Last updated: {{ $product->updated_at->format('M d, Y') }}
            </small>
        </div>
    </x-page.footer>
</x-page>
```

## Livewire Integration

### Livewire Page Component
```blade
<div>
    <x-page>
        <x-page.header>
            <h1>{{ $pageTitle }}</h1>
        </x-page.header>
        
        <x-page.body>
            <div class="content">
                {{ $content }}
            </div>
        </x-page.body>
    </x-page>
</div>
```

### Livewire with Dynamic Content
```blade
<div>
    <x-page>
        <x-page.header>
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $currentSection }}</h1>
                <button wire:click="refreshData" class="btn btn-outline-primary">
                    <i class="icon-refresh"></i> Refresh
                </button>
            </div>
        </x-page.header>
        
        <x-page.body>
            @if($loading)
                <div class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            @else
                <div class="data-content">
                    {{ $data }}
                </div>
            @endif
        </x-page.body>
    </x-page>
</div>
```

## Related Components

- [Container](container.md) - Conditional wrapper component
- [Grid](grid.md) - Grid layout component
- [Fragment](fragment.md) - Content fragment component

## Best Practices

1. **Structure**: Use consistent page structure across your application
2. **Responsiveness**: Ensure page layout works on all screen sizes
3. **Accessibility**: Use proper heading hierarchy and semantic HTML
4. **Performance**: Optimize page loading and content delivery
5. **User Experience**: Provide clear navigation and content organization
6. **Testing**: Test page layouts across different browsers and devices
7. **Documentation**: Document page structure and content requirements

## Troubleshooting

### Layout Issues
Check that Bootstrap CSS is loaded and the correct framework is configured.

### Content Not Displaying
Verify that slots are properly passed and content is available.

### Responsive Problems
Ensure proper Bootstrap grid classes and responsive design principles are used.
