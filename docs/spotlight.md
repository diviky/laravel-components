# Spotlight Component

A powerful search and navigation component that provides professional command palette functionality with enhanced user experience. This component offers advanced search capabilities with keyboard shortcuts, real-time results, and seamless integration with modern web applications.

## Overview

**Component Type:** Navigation  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, Alpine.js, Modal component  
**JavaScript Libraries:** Alpine.js for interactivity

## Files

- **PHP Class:** `src/Components/Spotlight.php`
- **View File:** `resources/views/bootstrap-5/spotlight.blade.php`
- **Tests:** `tests/Components/SpotlightTest.php`
- **Documentation:** `docs/spotlight.md`

## Basic Usage

### Simple Spotlight Search
```blade
<x-spotlight url="/api/search">
    <!-- Search results will be displayed here -->
</x-spotlight>
```

### Custom Search Configuration
```blade
<x-spotlight 
    url="/api/global-search" 
    shortcut="ctrl.k"
    searchText="Search anything..."
    noResultsText="No results found">
    <!-- Custom search interface -->
</x-spotlight>
```

### With Custom Content
```blade
<x-spotlight url="/api/search">
    <div class="search-categories">
        <h6>Quick Actions</h6>
        <div class="quick-actions">
            <button class="btn btn-sm btn-outline-primary">New User</button>
            <button class="btn btn-sm btn-outline-primary">New Order</button>
        </div>
    </div>
</x-spotlight>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| shortcut | string | 'meta.k' | Keyboard shortcut | `'ctrl.k'` |
| searchText | string | 'Search ...' | Search placeholder text | `'Search anything...'` |
| noResultsText | string | 'Nothing found.' | No results message | `'No results found'` |
| url | string | null | Search endpoint URL | `'/api/search'` |
| append | mixed | null | Additional content slot | Custom content |

### Inherited Attributes

The component inherits all standard Laravel component attributes.

## Usage Examples

### Basic Global Search
```blade
<!-- Global Search Spotlight -->
<x-spotlight url="/api/global-search">
    <!-- Search results will be displayed automatically -->
</x-spotlight>

<!-- Custom Keyboard Shortcut -->
<x-spotlight url="/api/search" shortcut="ctrl.shift.s">
    <!-- Search with Ctrl+Shift+S -->
</x-spotlight>
```

### Dashboard Search
```blade
<!-- Dashboard Command Palette -->
<x-spotlight 
    url="/dashboard/search" 
    searchText="Search dashboard..."
    noResultsText="No dashboard items found">
    
    <div class="search-categories">
        <h6 class="text-muted mb-3">Quick Actions</h6>
        <div class="quick-actions-grid">
            <button class="quick-action-btn" onclick="createUser()">
                <i class="icon-user-plus"></i>
                <span>New User</span>
            </button>
            <button class="quick-action-btn" onclick="createOrder()">
                <i class="icon-shopping-cart"></i>
                <span>New Order</span>
            </button>
            <button class="quick-action-btn" onclick="generateReport()">
                <i class="icon-file-text"></i>
                <span>Generate Report</span>
            </button>
        </div>
    </div>
</x-spotlight>
```

### E-commerce Product Search
```blade
<!-- Product Search Spotlight -->
<x-spotlight 
    url="/api/products/search" 
    searchText="Search products..."
    noResultsText="No products found">
    
    <div class="search-filters">
        <h6 class="text-muted mb-3">Filter by Category</h6>
        <div class="filter-buttons">
            <button class="btn btn-sm btn-outline-secondary" data-filter="all">All</button>
            <button class="btn btn-sm btn-outline-secondary" data-filter="electronics">Electronics</button>
            <button class="btn btn-sm btn-outline-secondary" data-filter="clothing">Clothing</button>
            <button class="btn btn-sm btn-outline-secondary" data-filter="books">Books</button>
        </div>
    </div>
</x-spotlight>
```

### User Management Search
```blade
<!-- User Search Spotlight -->
<x-spotlight 
    url="/api/users/search" 
    searchText="Search users..."
    noResultsText="No users found">
    
    <div class="user-actions">
        <h6 class="text-muted mb-3">User Actions</h6>
        <div class="action-buttons">
            <button class="btn btn-sm btn-primary" onclick="createUser()">
                <i class="icon-user-plus"></i> Create User
            </button>
            <button class="btn btn-sm btn-success" onclick="importUsers()">
                <i class="icon-upload"></i> Import Users
            </button>
            <button class="btn btn-sm btn-info" onclick="exportUsers()">
                <i class="icon-download"></i> Export Users
            </button>
        </div>
    </div>
</x-spotlight>
```

### Content Management Search
```blade
<!-- CMS Search Spotlight -->
<x-spotlight 
    url="/api/content/search" 
    searchText="Search content..."
    noResultsText="No content found">
    
    <div class="content-types">
        <h6 class="text-muted mb-3">Content Types</h6>
        <div class="content-type-grid">
            <div class="content-type-item" onclick="searchByType('pages')">
                <i class="icon-file"></i>
                <span>Pages</span>
            </div>
            <div class="content-type-item" onclick="searchByType('posts')">
                <i class="icon-edit"></i>
                <span>Posts</span>
            </div>
            <div class="content-type-item" onclick="searchByType('media')">
                <i class="icon-image"></i>
                <span>Media</span>
            </div>
            <div class="content-type-item" onclick="searchByType('comments')">
                <i class="icon-message-circle"></i>
                <span>Comments</span>
            </div>
        </div>
    </div>
</x-spotlight>
```

### Admin Panel Search
```blade
<!-- Admin Command Palette -->
<x-spotlight 
    url="/admin/search" 
    searchText="Search admin panel..."
    noResultsText="No admin items found">
    
    <div class="admin-shortcuts">
        <h6 class="text-muted mb-3">Admin Shortcuts</h6>
        <div class="shortcut-list">
            <div class="shortcut-item" onclick="navigateTo('/admin/users')">
                <i class="icon-users"></i>
                <span>User Management</span>
                <kbd>Ctrl+U</kbd>
            </div>
            <div class="shortcut-item" onclick="navigateTo('/admin/settings')">
                <i class="icon-settings"></i>
                <span>System Settings</span>
                <kbd>Ctrl+S</kbd>
            </div>
            <div class="shortcut-item" onclick="navigateTo('/admin/logs')">
                <i class="icon-file-text"></i>
                <span>System Logs</span>
                <kbd>Ctrl+L</kbd>
            </div>
            <div class="shortcut-item" onclick="navigateTo('/admin/backup')">
                <i class="icon-database"></i>
                <span>Backup & Restore</span>
                <kbd>Ctrl+B</kbd>
            </div>
        </div>
    </div>
</x-spotlight>
```

## API Integration

### Search Endpoint Structure
The spotlight component expects a JSON response from the search URL:

```php
// Example search endpoint
Route::get('/api/search', function (Request $request) {
    $query = $request->get('search');
    
    $results = collect([
        [
            'name' => 'User Management',
            'description' => 'Manage users and permissions',
            'link' => '/admin/users',
            'icon' => '<i class="icon-users"></i>',
        ],
        [
            'name' => 'Order #12345',
            'description' => 'Recent order from John Doe',
            'link' => '/orders/12345',
            'icon' => '<i class="icon-shopping-cart"></i>',
        ],
        [
            'name' => 'Settings',
            'description' => 'Application settings and configuration',
            'link' => '/settings',
            'icon' => '<i class="icon-settings"></i>',
        ],
    ])->filter(function ($item) use ($query) {
        return stripos($item['name'], $query) !== false || 
               stripos($item['description'], $query) !== false;
    });
    
    return response()->json($results->values());
});
```

### Advanced Search with Categories
```php
Route::get('/api/advanced-search', function (Request $request) {
    $query = $request->get('search');
    $category = $request->get('category', 'all');
    
    $results = [];
    
    if ($category === 'all' || $category === 'users') {
        $users = User::where('name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->limit(5)
                    ->get()
                    ->map(function ($user) {
                        return [
                            'name' => $user->name,
                            'description' => $user->email,
                            'link' => "/users/{$user->id}",
                            'avatar' => $user->avatar_url,
                            'category' => 'Users',
                        ];
                    });
        
        $results = array_merge($results, $users->toArray());
    }
    
    if ($category === 'all' || $category === 'orders') {
        $orders = Order::where('id', 'like', "%{$query}%")
                      ->orWhereHas('customer', function ($q) use ($query) {
                          $q->where('name', 'like', "%{$query}%");
                      })
                      ->limit(5)
                      ->get()
                      ->map(function ($order) {
                          return [
                              'name' => "Order #{$order->id}",
                              'description' => $order->customer->name,
                              'link' => "/orders/{$order->id}",
                              'icon' => '<i class="icon-shopping-cart"></i>',
                              'category' => 'Orders',
                          ];
                      });
        
        $results = array_merge($results, $orders->toArray());
    }
    
    return response()->json($results);
});
```

## Livewire Integration

### Livewire Search Component
```blade
<div>
    <x-spotlight url="/livewire/search">
        <!-- Livewire search results -->
    </x-spotlight>
</div>

<script>
    // Livewire search method
    Livewire.on('search', function(query) {
        @this.search(query);
    });
</script>
```

### Livewire with Real-time Results
```blade
<div>
    <x-spotlight url="/livewire/search">
        <div class="livewire-results">
            @foreach($searchResults as $result)
                <div class="search-result-item" wire:click="selectResult({{ $result['id'] }})">
                    <div class="result-icon">{{ $result['icon'] }}</div>
                    <div class="result-content">
                        <div class="result-name">{{ $result['name'] }}</div>
                        <div class="result-description">{{ $result['description'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-spotlight>
</div>
```

## Custom Styling

### Spotlight Custom Styles
```blade
<x-style>
    .spotlight-modal .modal-content {
        border-radius: 0.75rem;
        border: none;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .spotlight-search {
        border: none;
        font-size: 1.125rem;
        padding: 1rem;
        background: transparent;
    }
    
    .spotlight-search:focus {
        outline: none;
        box-shadow: none;
    }
    
    .spotlight-result {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #f3f4f6;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    
    .spotlight-result:hover {
        background-color: #f8fafc;
    }
    
    .spotlight-result:last-child {
        border-bottom: none;
    }
    
    .result-icon {
        width: 2rem;
        height: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f3f4f6;
        border-radius: 0.375rem;
        margin-right: 0.75rem;
    }
    
    .result-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }
    
    .result-description {
        color: #6b7280;
        font-size: 0.875rem;
    }
</x-style>
```

## Related Components

- [Modal](modal.md) - Modal dialog component
- [Form Search](form-search.md) - Search input component
- [Link](link.md) - Navigation link component

## Best Practices

1. **Performance**: Implement debounced search to avoid excessive API calls
2. **Accessibility**: Ensure proper keyboard navigation and ARIA labels
3. **User Experience**: Provide clear feedback for loading and no results states
4. **Security**: Validate and sanitize search queries on the server side
5. **Caching**: Consider caching search results for better performance
6. **Testing**: Test search functionality across different browsers and devices
7. **Documentation**: Document search API endpoints and expected response format

## Troubleshooting

### Search Not Working
Check that the search URL is correct and returns valid JSON.

### Keyboard Shortcut Not Working
Verify that the shortcut format is correct and doesn't conflict with browser shortcuts.

### Results Not Displaying
Ensure the API response matches the expected format with name, description, and link fields.

### Performance Issues
Implement proper debouncing and consider caching search results.
