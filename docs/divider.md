# Divider Component

A horizontal divider component that creates visual separators with optional text content. This component is ideal for separating sections, content areas, and creating clear visual boundaries in layouts.

## Overview

**Component Type:** View-Only Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `resources/views/bootstrap-5/divider.blade.php`

## Files

- **View File:** `resources/views/bootstrap-5/divider.blade.php`
- **Documentation:** `docs/divider.md`
- **Tests:** `tests/Components/DividerTest.php`

## Basic Usage

```blade
<x-divider>Section Title</x-divider>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| position | string | null | Position of the text (start, center, end) | `'center'` |
| color | string | null | Text color using Bootstrap color classes | `'primary'` |

### Inherited Attributes

This component supports all standard HTML div attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'my-4'` |
| id | string | null | HTML ID attribute | `'section-divider'` |
| style | string | null | Inline CSS styles | `'margin: 2rem 0;'` |
| data-* | string | null | Custom data attributes | `data-section="content"` |

## Usage Examples

### Basic Divider
```blade
<x-divider>Section Title</x-divider>
```

### Centered Divider
```blade
<x-divider position="center">Featured Content</x-divider>
```

### Left-Aligned Divider
```blade
<x-divider position="start">Navigation</x-divider>
```

### Right-Aligned Divider
```blade
<x-divider position="end">Actions</x-divider>
```

### Colored Divider
```blade
<x-divider position="center" color="primary">Important Section</x-divider>
```

### Divider with Custom Styling
```blade
<x-divider position="center" class="my-5" style="border-color: #007bff;">
    Custom Styled Divider
</x-divider>
```

### Divider with Bootstrap Colors
```blade
<x-divider position="center" color="success">Success Section</x-divider>
<x-divider position="center" color="warning">Warning Section</x-divider>
<x-divider position="center" color="danger">Danger Section</x-divider>
<x-divider position="center" color="info">Info Section</x-divider>
```

### Divider with Data Attributes
```blade
<x-divider position="center" data-section="content" data-type="separator">
    Content Separator
</x-divider>
```

### Divider in Card Layout
```blade
<div class="card">
    <div class="card-header">
        <h5>Card Title</h5>
    </div>
    <div class="card-body">
        <p>Some content here...</p>
        <x-divider position="center" color="secondary">More Content</x-divider>
        <p>Additional content...</p>
    </div>
</div>
```

### Divider in Form Sections
```blade
<form>
    <div class="mb-3">
        <label>Personal Information</label>
        <input type="text" class="form-control" />
    </div>
    
    <x-divider position="center" color="primary">Contact Information</x-divider>
    
    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" />
    </div>
    
    <x-divider position="center" color="primary">Additional Information</x-divider>
    
    <div class="mb-3">
        <label>Notes</label>
        <textarea class="form-control"></textarea>
    </div>
</form>
```

### Divider in Navigation
```blade
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Brand</a>
        
        <div class="navbar-nav">
            <a class="nav-link" href="#">Home</a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Services</a>
            
            <x-divider position="center" class="navbar-divider">|</x-divider>
            
            <a class="nav-link" href="#">Contact</a>
            <a class="nav-link" href="#">Login</a>
        </div>
    </div>
</nav>
```

### Divider in Sidebar
```blade
<div class="sidebar">
    <div class="sidebar-section">
        <h6>Main Menu</h6>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Users</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Settings</a></li>
        </ul>
    </div>
    
    <x-divider position="center" color="secondary">Quick Actions</x-divider>
    
    <div class="sidebar-section">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link">Add User</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Export Data</a></li>
        </ul>
    </div>
</div>
```

## Real Project Examples

### Content Management System
```blade
<div class="content-editor">
    <div class="toolbar">
        <button class="btn btn-sm btn-outline-primary">Bold</button>
        <button class="btn btn-sm btn-outline-primary">Italic</button>
        <button class="btn btn-sm btn-outline-primary">Underline</button>
        
        <x-divider position="center" class="mx-2">|</x-divider>
        
        <button class="btn btn-sm btn-outline-secondary">Align Left</button>
        <button class="btn btn-sm btn-outline-secondary">Align Center</button>
        <button class="btn btn-sm btn-outline-secondary">Align Right</button>
        
        <x-divider position="center" class="mx-2">|</x-divider>
        
        <button class="btn btn-sm btn-outline-success">Save</button>
        <button class="btn btn-sm btn-outline-danger">Cancel</button>
    </div>
    
    <div class="editor-content">
        <textarea class="form-control" rows="10"></textarea>
    </div>
</div>
```

### E-commerce Product Page
```blade
<div class="product-page">
    <div class="product-images">
        <!-- Product images here -->
    </div>
    
    <div class="product-info">
        <h1>Product Name</h1>
        <p class="price">$99.99</p>
        <button class="btn btn-primary">Add to Cart</button>
        
        <x-divider position="center" color="secondary">Product Details</x-divider>
        
        <div class="product-description">
            <p>Detailed product description...</p>
        </div>
        
        <x-divider position="center" color="secondary">Specifications</x-divider>
        
        <div class="product-specs">
            <ul>
                <li>Specification 1</li>
                <li>Specification 2</li>
                <li>Specification 3</li>
            </ul>
        </div>
        
        <x-divider position="center" color="secondary">Customer Reviews</x-divider>
        
        <div class="reviews">
            <!-- Reviews content -->
        </div>
    </div>
</div>
```

### Dashboard Layout
```blade
<div class="dashboard">
    <div class="dashboard-header">
        <h2>Dashboard</h2>
        <div class="header-actions">
            <button class="btn btn-primary">Export</button>
            <button class="btn btn-secondary">Settings</button>
        </div>
    </div>
    
    <x-divider position="center" color="primary">Overview</x-divider>
    
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Users</h3>
            <p class="stat-number">1,234</p>
        </div>
        <div class="stat-card">
            <h3>Revenue</h3>
            <p class="stat-number">$45,678</p>
        </div>
        <div class="stat-card">
            <h3>Orders</h3>
            <p class="stat-number">567</p>
        </div>
    </div>
    
    <x-divider position="center" color="primary">Recent Activity</x-divider>
    
    <div class="activity-feed">
        <!-- Activity items -->
    </div>
    
    <x-divider position="center" color="primary">Quick Actions</x-divider>
    
    <div class="quick-actions">
        <button class="btn btn-outline-primary">Add User</button>
        <button class="btn btn-outline-success">Create Order</button>
        <button class="btn btn-outline-info">Generate Report</button>
    </div>
</div>
```

### Blog Post Layout
```blade
<article class="blog-post">
    <header class="post-header">
        <h1>Blog Post Title</h1>
        <div class="post-meta">
            <span class="author">By John Doe</span>
            <span class="date">January 15, 2024</span>
            <span class="category">Technology</span>
        </div>
    </header>
    
    <div class="post-content">
        <p>Introduction paragraph...</p>
        
        <x-divider position="center" color="secondary">Main Content</x-divider>
        
        <p>Main content paragraphs...</p>
        
        <x-divider position="center" color="secondary">Conclusion</x-divider>
        
        <p>Conclusion paragraph...</p>
    </div>
    
    <footer class="post-footer">
        <x-divider position="center" color="primary">Share This Post</x-divider>
        
        <div class="social-share">
            <button class="btn btn-outline-primary">Facebook</button>
            <button class="btn btn-outline-info">Twitter</button>
            <button class="btn btn-outline-success">LinkedIn</button>
        </div>
    </footer>
</article>
```

### Settings Page
```blade
<div class="settings-page">
    <h2>Account Settings</h2>
    
    <div class="settings-section">
        <h4>Personal Information</h4>
        <form>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" />
            </div>
        </form>
    </div>
    
    <x-divider position="center" color="secondary">Security Settings</x-divider>
    
    <div class="settings-section">
        <h4>Password & Security</h4>
        <form>
            <div class="mb-3">
                <label>Current Password</label>
                <input type="password" class="form-control" />
            </div>
            <div class="mb-3">
                <label>New Password</label>
                <input type="password" class="form-control" />
            </div>
        </form>
    </div>
    
    <x-divider position="center" color="secondary">Notification Preferences</x-divider>
    
    <div class="settings-section">
        <h4>Notifications</h4>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="email-notifications" />
            <label class="form-check-label" for="email-notifications">
                Email Notifications
            </label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="sms-notifications" />
            <label class="form-check-label" for="sms-notifications">
                SMS Notifications
            </label>
        </div>
    </div>
</div>
```

### Admin Panel
```blade
<div class="admin-panel">
    <div class="admin-header">
        <h1>Admin Dashboard</h1>
        <div class="admin-actions">
            <button class="btn btn-primary">Add New</button>
            <button class="btn btn-secondary">Bulk Actions</button>
        </div>
    </div>
    
    <x-divider position="center" color="primary">User Management</x-divider>
    
    <div class="user-management">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- User rows -->
            </tbody>
        </table>
    </div>
    
    <x-divider position="center" color="primary">System Statistics</x-divider>
    
    <div class="system-stats">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <h5>Total Users</h5>
                    <p>1,234</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h5>Active Sessions</h5>
                    <p>567</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h5>System Load</h5>
                    <p>45%</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h5>Storage Used</h5>
                    <p>2.5GB</p>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Features

### Text Positioning
- **Start**: Left-aligned text
- **Center**: Centered text (default)
- **End**: Right-aligned text

### Color Options
- **Primary**: Bootstrap primary color
- **Secondary**: Bootstrap secondary color
- **Success**: Bootstrap success color
- **Warning**: Bootstrap warning color
- **Danger**: Bootstrap danger color
- **Info**: Bootstrap info color
- **Light**: Bootstrap light color
- **Dark**: Bootstrap dark color

### Styling Options
- **CSS Class Support**: Accepts custom CSS classes
- **Inline Styles**: Supports inline style attributes
- **Bootstrap Integration**: Works seamlessly with Bootstrap classes
- **Responsive Design**: Adapts to different screen sizes

### Integration
- **Livewire Compatible**: Works with Livewire for dynamic updates
- **Form Integration**: Can be used within forms and other components
- **Data Attributes**: Supports custom data attributes
- **Accessibility**: Proper semantic HTML structure

### Performance
- **Lightweight**: Minimal overhead and fast rendering
- **No JavaScript**: Pure server-side rendering
- **Caching Friendly**: Works well with Laravel's caching system
- **SEO Friendly**: Proper HTML structure for search engines

## CSS Classes

### Default Classes
- `hr-text`: Base divider class
- `hr-text-start`: Left-aligned text
- `hr-text-center`: Centered text
- `hr-text-end`: Right-aligned text

### Color Classes
- `text-primary`: Primary color text
- `text-secondary`: Secondary color text
- `text-success`: Success color text
- `text-warning`: Warning color text
- `text-danger`: Danger color text
- `text-info`: Info color text
- `text-light`: Light color text
- `text-dark`: Dark color text

## Configuration

### Global Configuration
The component uses Bootstrap classes and can be customized:

```css
/* Custom divider styling */
.hr-text {
    position: relative;
    text-align: center;
    border-top: 1px solid #dee2e6;
    margin: 1rem 0;
}

.hr-text::before {
    content: attr(data-content);
    position: relative;
    top: -0.5em;
    background: white;
    padding: 0 1rem;
}

.hr-text-start {
    text-align: left;
}

.hr-text-center {
    text-align: center;
}

.hr-text-end {
    text-align: right;
}
```

### Component Registration
```php
// In your service provider
Blade::component('divider', Divider::class);
```

## JavaScript Integration

### Dynamic Dividers
```javascript
// Create dynamic dividers
function createDivider(text, position = 'center', color = null) {
    const divider = document.createElement('div');
    divider.className = 'hr-text';
    
    if (position) {
        divider.classList.add(`hr-text-${position}`);
    }
    
    if (color) {
        divider.classList.add(`text-${color}`);
    }
    
    divider.textContent = text;
    return divider;
}

// Usage
document.body.appendChild(createDivider('Section Title', 'center', 'primary'));
```

### Livewire Integration
```javascript
// Update divider with Livewire
Livewire.on('divider-updated', (data) => {
    const divider = document.querySelector(`[data-divider-id="${data.id}"]`);
    if (divider) {
        divider.textContent = data.text;
        divider.className = `hr-text hr-text-${data.position} text-${data.color}`;
    }
});
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `role="separator"` for screen readers
- Proper semantic structure
- Accessible text content

### Screen Reader Support
- Clear section announcements
- Proper navigation context
- Descriptive text when needed

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Bootstrap 5**: Full support
- **CSS Pseudo-elements**: Full support

## Troubleshooting

### Common Issues

**Divider not showing correctly**
```blade
<!-- Ensure proper Bootstrap CSS is loaded -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
```

**Text positioning not working**
```blade
<!-- Use correct position values -->
<x-divider position="center">Centered Text</x-divider>
<x-divider position="start">Left Text</x-divider>
<x-divider position="end">Right Text</x-divider>
```

**Color not applying**
```blade
<!-- Use valid Bootstrap color classes -->
<x-divider color="primary">Primary Color</x-divider>
<x-divider color="success">Success Color</x-divider>
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Card](card.md) - Card container component
- [Alert](alert.md) - Alert message component
- [Badge](badge.md) - Badge display component
- [Progress](progress.md) - Progress bar component
- [Table](table.md) - Table component
- [Modal](modal.md) - Modal dialog component

## Performance

### Optimization Tips
1. **Use appropriate positioning** for your layout
2. **Minimize custom styling** for better performance
3. **Use Bootstrap classes** when possible
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~1KB
- **With Custom CSS**: ~2KB
- **With JavaScript**: ~5KB
- **Full Package**: ~8KB

## Examples Gallery

### Basic Dividers
```blade
<!-- Simple divider -->
<x-divider>Section Title</x-divider>

<!-- Centered divider -->
<x-divider position="center">Centered Title</x-divider>

<!-- Colored divider -->
<x-divider position="center" color="primary">Primary Color</x-divider>
```

### Advanced Dividers
```blade
<!-- Custom styled divider -->
<x-divider position="center" class="my-5" style="border-color: #007bff;">
    Custom Styled
</x-divider>

<!-- Divider with data attributes -->
<x-divider position="center" data-section="content" data-type="separator">
    Content Separator
</x-divider>
```

## Changelog

### Version 2.0
- Added text positioning options
- Enhanced color support
- Improved accessibility features
- Added Bootstrap 5 integration

### Version 1.0
- Initial release
- Basic divider functionality
- Bootstrap 4 support
- Simple text display

## Contributing

When contributing to the Divider component:

1. **Test positioning** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
