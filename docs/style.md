# Style Component

A secure stylesheet component that provides professional CSS integration with Content Security Policy (CSP) support and enhanced security features. This component offers advanced stylesheet management with automatic nonce generation and seamless integration with modern web applications.

## Overview

**Component Type:** Utility  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, SecureHeaders package (optional)  
**JavaScript Libraries:** None (component for managing CSS)

## Files

- **PHP Class:** `src/Components/Style.php`
- **View File:** `resources/views/bootstrap-5/style.blade.php`
- **Tests:** `tests/Components/StyleTest.php`
- **Documentation:** `docs/style.md`

## Basic Usage

### Simple Inline Styles
```blade
<x-style>
    .custom-component {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 0.375rem;
    }
</x-style>
```

### Component-specific Styles
```blade
<x-style>
    .user-card {
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .user-card:hover {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
</x-style>
```

### Dynamic Styles
```blade
<x-style>
    :root {
        --primary-color: {{ $theme->primary_color }};
        --secondary-color: {{ $theme->secondary_color }};
    }
    
    .theme-primary {
        color: var(--primary-color);
    }
</x-style>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| nonce | string | auto | CSP nonce value | `'random-nonce'` |
| media | string | null | Media query | `'print'` |
| type | string | 'text/css' | Stylesheet MIME type | `'text/css'` |

### Inherited Attributes

The component inherits all standard HTML style attributes and Laravel component attributes.

## Usage Examples

### Basic Component Styles
```blade
<!-- Custom Button Styles -->
<x-style>
    .btn-custom {
        background: linear-gradient(45deg, #007bff, #0056b3);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }
</x-style>

<!-- Custom Card Styles -->
<x-style>
    .card-elevated {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 0.75rem;
        transition: box-shadow 0.3s ease;
    }
    
    .card-elevated:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
</x-style>
```

### Dashboard Styles
```blade
<!-- Dashboard Layout -->
<x-style>
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        padding: 1rem;
    }
    
    .dashboard-widget {
        background: white;
        border-radius: 0.5rem;
        padding: 1.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .dashboard-widget h3 {
        margin-bottom: 1rem;
        color: #374151;
        font-size: 1.125rem;
        font-weight: 600;
    }
    
    .stat-card {
        text-align: center;
        padding: 2rem;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1f2937;
        display: block;
    }
    
    .stat-label {
        color: #6b7280;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</x-style>
```

### Form Enhancement Styles
```blade
<!-- Enhanced Form Styles -->
<x-style>
    .form-floating-enhanced .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        padding: 1rem 0.75rem;
        transition: all 0.3s ease;
    }
    
    .form-floating-enhanced .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .form-floating-enhanced .form-label {
        color: #6b7280;
        font-weight: 500;
    }
    
    .form-floating-enhanced .form-control:focus ~ .form-label,
    .form-floating-enhanced .form-control:not(:placeholder-shown) ~ .form-label {
        color: #3b82f6;
        transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    }
</x-style>

<!-- File Upload Styles -->
<x-style>
    .file-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .file-upload-area:hover {
        border-color: #3b82f6;
        background-color: #f8fafc;
    }
    
    .file-upload-area.dragover {
        border-color: #3b82f6;
        background-color: #eff6ff;
    }
    
    .file-upload-icon {
        font-size: 3rem;
        color: #9ca3af;
        margin-bottom: 1rem;
    }
</x-style>
```

### E-commerce Styles
```blade
<!-- Product Card Styles -->
<x-style>
    .product-card {
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }
    
    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .product-info {
        padding: 1.5rem;
    }
    
    .product-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }
    
    .product-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #059669;
    }
    
    .product-actions {
        padding: 1rem 1.5rem;
        border-top: 1px solid #f3f4f6;
        display: flex;
        gap: 0.5rem;
    }
</x-style>

<!-- Shopping Cart Styles -->
<x-style>
    .cart-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .cart-item-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 0.375rem;
        margin-right: 1rem;
    }
    
    .cart-item-details {
        flex: 1;
    }
    
    .cart-item-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }
    
    .cart-item-price {
        color: #059669;
        font-weight: 600;
    }
    
    .cart-item-quantity {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0 1rem;
    }
    
    .quantity-btn {
        width: 32px;
        height: 32px;
        border: 1px solid #d1d5db;
        background: white;
        border-radius: 0.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    
    .quantity-btn:hover {
        background: #f9fafb;
    }
</x-style>
```

### Admin Panel Styles
```blade
<!-- Admin Navigation -->
<x-style>
    .admin-sidebar {
        background: #1f2937;
        min-height: 100vh;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
    }
    
    .admin-sidebar .nav-link {
        color: #d1d5db;
        padding: 0.75rem 1.5rem;
        border-radius: 0;
        transition: all 0.3s ease;
    }
    
    .admin-sidebar .nav-link:hover {
        background: #374151;
        color: white;
    }
    
    .admin-sidebar .nav-link.active {
        background: #3b82f6;
        color: white;
    }
    
    .admin-content {
        margin-left: 250px;
        padding: 2rem;
    }
</x-style>

<!-- Data Table Styles -->
<x-style>
    .data-table-enhanced {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .data-table-enhanced th {
        background: #f8fafc;
        color: #374151;
        font-weight: 600;
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .data-table-enhanced td {
        padding: 1rem;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .data-table-enhanced tbody tr:hover {
        background: #f9fafb;
    }
    
    .data-table-enhanced tbody tr:last-child td {
        border-bottom: none;
    }
</x-style>
```

### Responsive Design Styles
```blade
<!-- Responsive Grid -->
<x-style>
    .responsive-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .responsive-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }
    
    @media (min-width: 1200px) {
        .responsive-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</x-style>

<!-- Mobile-First Navigation -->
<x-style>
    .mobile-nav {
        display: none;
        background: white;
        border-bottom: 1px solid #e5e7eb;
        padding: 1rem;
    }
    
    .mobile-nav-toggle {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }
    
    @media (max-width: 768px) {
        .mobile-nav {
            display: block;
        }
        
        .desktop-nav {
            display: none;
        }
    }
</x-style>
```

### Animation Styles
```blade
<!-- Loading Animations -->
<x-style>
    .loading-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid #3b82f6;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .slide-in {
        animation: slideIn 0.3s ease-out;
    }
    
    @keyframes slideIn {
        from { transform: translateX(-100%); }
        to { transform: translateX(0); }
    }
</x-style>
```

## Livewire Integration

### Dynamic Theme Styles
```blade
<div>
    <x-style>
        :root {
            --primary-color: {{ $theme->primary_color }};
            --secondary-color: {{ $theme->secondary_color }};
            --accent-color: {{ $theme->accent_color }};
        }
        
        .theme-primary {
            background-color: var(--primary-color);
        }
        
        .theme-secondary {
            background-color: var(--secondary-color);
        }
    </x-style>
</div>
```

### Conditional Styles
```blade
<div>
    <x-style>
        @if($darkMode)
            .app-container {
                background-color: #1f2937;
                color: #f9fafb;
            }
            
            .card {
                background-color: #374151;
                border-color: #4b5563;
            }
        @else
            .app-container {
                background-color: #ffffff;
                color: #1f2937;
            }
        @endif
    </x-style>
</div>
```

## Content Security Policy (CSP) Integration

### Automatic Nonce Generation
The component automatically generates nonces when the SecureHeaders package is available:

```blade
<!-- Automatically includes nonce for CSP -->
<x-style>
    .secure-style {
        color: #3b82f6;
    }
</x-style>
```

### Manual Nonce
```blade
<!-- Manual nonce -->
<x-style nonce="{{ csp_nonce('style') }}">
    .manual-nonce-style {
        background: #f8fafc;
    }
</x-style>
```

## Related Components

- [Script](script.md) - JavaScript component
- [Container](container.md) - Conditional wrapper component
- [Show](show.md) - Conditional rendering component

## Best Practices

1. **Security**: Always use CSP nonces for inline styles
2. **Performance**: Minimize inline styles and use external stylesheets when possible
3. **Organization**: Group related styles together
4. **Responsiveness**: Use mobile-first responsive design
5. **Accessibility**: Ensure proper contrast ratios and focus states
6. **Testing**: Test styles across different browsers and devices
7. **Documentation**: Document complex CSS patterns and variables

## Troubleshooting

### Styles Not Applying
Check that the CSS selectors are correct and specific enough.

### CSP Violations
Ensure that nonces are properly generated and included.

### Performance Issues
Consider using external stylesheets for large amounts of CSS.

### Browser Compatibility
Test styles across different browsers and use appropriate vendor prefixes.
