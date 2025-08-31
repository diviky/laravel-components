# Icon Component

A flexible icon component that displays Tabler Icons with optional labels, actions, and various styling options. This component is ideal for displaying icons throughout your application with consistent styling and behavior.

## Overview

**Component Type:** Class-Based Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Tabler Icons CSS, Bootstrap CSS for styling  
**Location:** `vendor/diviky/laravel-form-components/src/Components/Icon.php`  
**View:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/icon.blade.php`

## Files

- **Component Class:** `vendor/diviky/laravel-form-components/src/Components/Icon.php`
- **View File:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/icon.blade.php`
- **Documentation:** `docs/icon.md`
- **Tests:** `tests/Components/IconTest.php`

## Basic Usage

```blade
<x-icon name="home" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | null | The name of the Tabler icon to display | `'home'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Optional text label to display next to the icon | `'Home'` |
| action | string | null | JavaScript action to execute when icon is clicked | `'alert("Hello")'` |
| size | string | null | Icon size (sm, md, lg) | `'md'` |
| gap | bool | false | Whether to add margin between icon and label | `true` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'text-primary'` |
| id | string | null | HTML ID attribute | `'home-icon'` |
| style | string | null | Inline CSS styles | `'color: blue;'` |
| title | string | null | Tooltip text (enables Bootstrap tooltip) | `'Go to home'` |
| data-* | string | null | Custom data attributes | `data-action="navigate"` |

## Usage Examples

### Basic Icon
```blade
<x-icon name="home" />
```

### Icon with Label
```blade
<x-icon name="user" label="Profile" />
```

### Icon with Action
```blade
<x-icon name="trash" action="deleteItem(1)" />
```

### Icon with Different Sizes
```blade
<x-icon name="star" size="sm" />
<x-icon name="star" size="md" />
<x-icon name="star" size="lg" />
```

### Icon with Gap
```blade
<x-icon name="heart" label="Like" :gap="true" />
```

### Icon with Tooltip
```blade
<x-icon name="info" title="Click for more information" />
```

### Icon with Custom Styling
```blade
<x-icon name="check" class="text-success" style="font-size: 1.5rem;" />
```

### Icon with Data Attributes
```blade
<x-icon name="edit" data-item-id="123" data-action="edit" />
```

### Icon in Navigation
```blade
<nav class="navbar">
    <div class="navbar-nav">
        <a href="#" class="nav-link">
            <x-icon name="home" label="Home" />
        </a>
        <a href="#" class="nav-link">
            <x-icon name="user" label="Profile" />
        </a>
        <a href="#" class="nav-link">
            <x-icon name="settings" label="Settings" />
        </a>
    </div>
</nav>
```

### Icon in Buttons
```blade
<button class="btn btn-primary">
    <x-icon name="plus" label="Add New" />
</button>

<button class="btn btn-danger">
    <x-icon name="trash" label="Delete" />
</button>

<button class="btn btn-success">
    <x-icon name="check" label="Save" />
</button>
```

### Icon in Cards
```blade
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            <x-icon name="file-text" label="Document" />
        </h5>
    </div>
    <div class="card-body">
        <p>Card content here...</p>
        <div class="card-actions">
            <x-icon name="edit" action="editDocument()" title="Edit" />
            <x-icon name="download" action="downloadDocument()" title="Download" />
            <x-icon name="share" action="shareDocument()" title="Share" />
        </div>
    </div>
</div>
```

### Icon in Forms
```blade
<form>
    <div class="mb-3">
        <label class="form-label">
            <x-icon name="user" label="Username" />
        </label>
        <input type="text" class="form-control" />
    </div>
    
    <div class="mb-3">
        <label class="form-label">
            <x-icon name="mail" label="Email" />
        </label>
        <input type="email" class="form-control" />
    </div>
    
    <div class="mb-3">
        <label class="form-label">
            <x-icon name="lock" label="Password" />
        </label>
        <input type="password" class="form-control" />
    </div>
    
    <button type="submit" class="btn btn-primary">
        <x-icon name="login" label="Sign In" />
    </button>
</form>
```

### Icon in Tables
```blade
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>
                <x-icon name="circle-check" class="text-success" />
            </td>
            <td>
                <x-icon name="edit" action="editUser(1)" title="Edit" />
                <x-icon name="trash" action="deleteUser(1)" title="Delete" />
            </td>
        </tr>
    </tbody>
</table>
```

### Icon in Alerts
```blade
<div class="alert alert-success">
    <x-icon name="check-circle" label="Success" />
    Your changes have been saved successfully.
</div>

<div class="alert alert-warning">
    <x-icon name="alert-triangle" label="Warning" />
    Please review your input before submitting.
</div>

<div class="alert alert-danger">
    <x-icon name="x-circle" label="Error" />
    An error occurred while processing your request.
</div>
```

### Icon in Sidebar
```blade
<div class="sidebar">
    <div class="sidebar-nav">
        <a href="#" class="sidebar-link">
            <x-icon name="dashboard" label="Dashboard" />
        </a>
        <a href="#" class="sidebar-link">
            <x-icon name="users" label="Users" />
        </a>
        <a href="#" class="sidebar-link">
            <x-icon name="settings" label="Settings" />
        </a>
        <a href="#" class="sidebar-link">
            <x-icon name="help-circle" label="Help" />
        </a>
    </div>
</div>
```

### Icon with Livewire
```blade
<div wire:poll.10s>
    <x-icon name="refresh" action="refreshData()" title="Refresh data" />
    <span>Last updated: {{ now() }}</span>
</div>
```

## Real Project Examples

### Dashboard Widgets
```blade
<div class="row">
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-icon">
                <x-icon name="users" size="lg" class="text-primary" />
            </div>
            <div class="widget-content">
                <h3>1,234</h3>
                <p>Total Users</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-icon">
                <x-icon name="shopping-cart" size="lg" class="text-success" />
            </div>
            <div class="widget-content">
                <h3>567</h3>
                <p>Total Orders</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-icon">
                <x-icon name="dollar-sign" size="lg" class="text-warning" />
            </div>
            <div class="widget-content">
                <h3>$45,678</h3>
                <p>Revenue</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="widget">
            <div class="widget-icon">
                <x-icon name="trending-up" size="lg" class="text-info" />
            </div>
            <div class="widget-content">
                <h3>23%</h3>
                <p>Growth</p>
            </div>
        </div>
    </div>
</div>
```

### E-commerce Product Cards
```blade
<div class="row">
    <div class="col-md-4">
        <div class="product-card">
            <img src="product1.jpg" class="product-image" />
            <div class="product-content">
                <h5>Product Name</h5>
                <p class="price">$99.99</p>
                <div class="product-rating">
                    <x-icon name="star" class="text-warning" />
                    <x-icon name="star" class="text-warning" />
                    <x-icon name="star" class="text-warning" />
                    <x-icon name="star" class="text-warning" />
                    <x-icon name="star" class="text-muted" />
                    <span class="rating-text">(4.0)</span>
                </div>
                <div class="product-actions">
                    <button class="btn btn-primary btn-sm">
                        <x-icon name="shopping-cart" label="Add to Cart" />
                    </button>
                    <button class="btn btn-outline-secondary btn-sm">
                        <x-icon name="heart" label="Wishlist" />
                    </button>
                    <button class="btn btn-outline-info btn-sm">
                        <x-icon name="eye" label="Quick View" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
```

### User Profile Header
```blade
<div class="profile-header">
    <div class="profile-avatar">
        <img src="avatar.jpg" class="rounded-circle" />
        <div class="status-indicator">
            <x-icon name="circle" class="text-success" />
        </div>
    </div>
    
    <div class="profile-info">
        <h3>John Doe</h3>
        <p class="text-muted">Software Developer</p>
        
        <div class="profile-stats">
            <span class="stat">
                <x-icon name="users" label="Followers" />
                1,234
            </span>
            <span class="stat">
                <x-icon name="user-plus" label="Following" />
                567
            </span>
            <span class="stat">
                <x-icon name="star" label="Reputation" />
                4.8
            </span>
        </div>
        
        <div class="profile-actions">
            <button class="btn btn-primary">
                <x-icon name="message-circle" label="Message" />
            </button>
            <button class="btn btn-outline-secondary">
                <x-icon name="user-plus" label="Follow" />
            </button>
            <button class="btn btn-outline-info">
                <x-icon name="share" label="Share Profile" />
            </button>
        </div>
    </div>
</div>
```

### File Manager Interface
```blade
<div class="file-manager">
    <div class="toolbar">
        <button class="btn btn-primary btn-sm">
            <x-icon name="upload" label="Upload" />
        </button>
        <button class="btn btn-secondary btn-sm">
            <x-icon name="folder-plus" label="New Folder" />
        </button>
        <button class="btn btn-outline-danger btn-sm">
            <x-icon name="trash" label="Delete" />
        </button>
        <button class="btn btn-outline-info btn-sm">
            <x-icon name="download" label="Download" />
        </button>
    </div>
    
    <div class="file-list">
        <div class="file-item">
            <x-icon name="file-text" class="text-primary" />
            <span>document.pdf</span>
            <div class="file-actions">
                <x-icon name="eye" action="previewFile('document.pdf')" title="Preview" />
                <x-icon name="download" action="downloadFile('document.pdf')" title="Download" />
                <x-icon name="trash" action="deleteFile('document.pdf')" title="Delete" />
            </div>
        </div>
        
        <div class="file-item">
            <x-icon name="folder" class="text-warning" />
            <span>Images</span>
            <div class="file-actions">
                <x-icon name="folder-open" action="openFolder('Images')" title="Open" />
                <x-icon name="trash" action="deleteFolder('Images')" title="Delete" />
            </div>
        </div>
    </div>
</div>
```

### Notification Center
```blade
<div class="notification-center">
    <div class="notification-header">
        <h5>
            <x-icon name="bell" label="Notifications" />
        </h5>
        <button class="btn btn-sm btn-outline-secondary">
            <x-icon name="check-all" label="Mark All Read" />
        </button>
    </div>
    
    <div class="notification-list">
        <div class="notification-item unread">
            <x-icon name="user-plus" class="text-success" />
            <div class="notification-content">
                <p>New user registered</p>
                <small class="text-muted">2 minutes ago</small>
            </div>
            <x-icon name="x" action="dismissNotification(1)" title="Dismiss" />
        </div>
        
        <div class="notification-item">
            <x-icon name="alert-triangle" class="text-warning" />
            <div class="notification-content">
                <p>System maintenance scheduled</p>
                <small class="text-muted">1 hour ago</small>
            </div>
            <x-icon name="x" action="dismissNotification(2)" title="Dismiss" />
        </div>
        
        <div class="notification-item">
            <x-icon name="check-circle" class="text-success" />
            <div class="notification-content">
                <p>Backup completed successfully</p>
                <small class="text-muted">3 hours ago</small>
            </div>
            <x-icon name="x" action="dismissNotification(3)" title="Dismiss" />
        </div>
    </div>
</div>
```

## Features

### Icon Sizing
- **Small (sm)**: `ti-sm` class for smaller icons
- **Medium (md)**: `ti-md` class for medium icons (default)
- **Large (lg)**: `ti-lg` class for larger icons

### Icon Names
- **Tabler Icons**: Uses Tabler Icons library
- **Dot Notation**: Supports dot notation (e.g., `user.profile` becomes `user-profile`)
- **Auto-prefix**: Automatically adds `ti ti-` prefix to icon names

### Interactive Features
- **Click Actions**: JavaScript actions via `action` attribute
- **Tooltips**: Bootstrap tooltips via `title` attribute
- **Livewire Integration**: Works with Livewire for dynamic updates

### Styling Options
- **CSS Classes**: Accepts custom CSS classes
- **Inline Styles**: Supports inline style attributes
- **Bootstrap Integration**: Works seamlessly with Bootstrap classes
- **Responsive Design**: Adapts to different screen sizes

### Label Support
- **Optional Labels**: Text labels next to icons
- **Gap Control**: Configurable spacing between icon and label
- **Label Styling**: Custom classes for label styling

## CSS Classes

### Default Classes
- `ti`: Base Tabler Icons class
- `ti-sm`: Small icon size
- `ti-md`: Medium icon size
- `ti-lg`: Large icon size
- `me-1`: Margin end (when gap is true)

### Icon Name Classes
- `ti ti-{name}`: Standard icon class format
- `ti ti-user`: User icon
- `ti ti-home`: Home icon
- `ti ti-settings`: Settings icon
- And many more from Tabler Icons library

## Configuration

### Tabler Icons Setup
Include Tabler Icons CSS in your application:

```html
<!-- Via CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">

<!-- Or via npm -->
npm install @tabler/icons
```

### Component Registration
The component is automatically registered via the `diviky/laravel-form-components` package.

### Custom Icon Sets
You can extend the component to support other icon libraries:

```php
// In your service provider
Blade::component('icon', CustomIcon::class);
```

## JavaScript Integration

### Dynamic Icons
```javascript
// Change icon dynamically
function changeIcon(elementId, newIconName) {
    const element = document.getElementById(elementId);
    if (element) {
        element.className = `ti ti-${newIconName}`;
    }
}

// Usage
changeIcon('status-icon', 'check-circle');
```

### Icon Actions
```javascript
// Handle icon clicks
function handleIconClick(action) {
    switch(action) {
        case 'edit':
            editItem();
            break;
        case 'delete':
            deleteItem();
            break;
        case 'share':
            shareItem();
            break;
    }
}

// Usage in Blade
<x-icon name="edit" action="handleIconClick('edit')" />
```

### Livewire Integration
```javascript
// Update icon with Livewire
Livewire.on('icon-updated', (data) => {
    const icon = document.querySelector(`[data-icon-id="${data.id}"]`);
    if (icon) {
        icon.className = `ti ti-${data.icon}`;
        icon.title = data.tooltip;
    }
});
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `role="img"` for icon elements
- `aria-label` support via title attribute
- Proper semantic structure

### Screen Reader Support
- Clear icon announcements
- Proper navigation context
- Descriptive labels when provided

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **CSS Font Icons**: Full support
- **ES6+ JavaScript**: Full support
- **Bootstrap 5**: Full support
- **CSS Custom Properties**: Full support

## Troubleshooting

### Common Issues

**Icon not displaying**
```html
<!-- Ensure Tabler Icons CSS is loaded -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
```

**Icon name not working**
```blade
<!-- Use correct icon names from Tabler Icons -->
<x-icon name="user" /> <!-- Correct -->
<x-icon name="user-icon" /> <!-- Incorrect -->
```

**Action not working**
```blade
<!-- Ensure JavaScript function exists -->
<x-icon name="trash" action="deleteItem(1)" />
<script>
function deleteItem(id) {
    // Your delete logic here
}
</script>
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Button](form-button.md) - Button component with icon support
- [Link](link.md) - Link component with icon support
- [Alert](alert.md) - Alert component with icon support
- [Badge](badge.md) - Badge component with icon support
- [Card](card.md) - Card component with icon support

## Performance

### Optimization Tips
1. **Use appropriate icon sizes** for your layout
2. **Minimize custom styling** for better performance
3. **Use Bootstrap classes** when possible
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~2KB
- **With Tabler Icons**: ~50KB (one-time load)
- **With Custom CSS**: ~3KB
- **With JavaScript**: ~5KB
- **Full Package**: ~60KB

## Examples Gallery

### Basic Icons
```blade
<!-- Simple icon -->
<x-icon name="home" />

<!-- Icon with label -->
<x-icon name="user" label="Profile" />

<!-- Icon with action -->
<x-icon name="trash" action="deleteItem()" />
```

### Advanced Icons
```blade
<!-- Icon with tooltip and custom styling -->
<x-icon 
    name="star" 
    size="lg" 
    class="text-warning" 
    title="Rate this item"
    style="cursor: pointer;"
/>

<!-- Icon with data attributes -->
<x-icon 
    name="edit" 
    data-item-id="123" 
    data-action="edit"
    action="editItem(123)"
/>
```

## Changelog

### Version 2.0
- Added size options (sm, md, lg)
- Enhanced action support
- Improved accessibility features
- Added Bootstrap 5 integration

### Version 1.0
- Initial release
- Basic icon functionality
- Tabler Icons integration
- Simple label support

## Contributing

When contributing to the Icon component:

1. **Test icon names** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-form-components` package and is licensed under the MIT License.
