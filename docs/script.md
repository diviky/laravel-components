# Script Component

A secure script component that provides professional JavaScript integration with Content Security Policy (CSP) support and enhanced security features. This component offers advanced script management with automatic nonce generation and seamless integration with modern web applications.

## Overview

**Component Type:** Utility  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, SecureHeaders package (optional)  
**JavaScript Libraries:** None (component for managing JavaScript)

## Files

- **PHP Class:** `src/Components/Script.php`
- **View File:** `resources/views/bootstrap-5/script.blade.php`
- **Tests:** `tests/Components/ScriptTest.php`
- **Documentation:** `docs/script.md`

## Basic Usage

### Simple Script Tag
```blade
<x-script>
    console.log('Hello from Laravel Components!');
</x-script>
```

### Script with Attributes
```blade
<x-script src="/js/custom.js" defer>
    // Fallback content if script fails to load
    console.log('Script loaded successfully');
</x-script>
```

### Inline Script
```blade
<x-script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize components
        initializeComponents();
    });
</x-script>
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| src | string | null | External script URL | `'/js/app.js'` |
| defer | boolean | false | Defer script execution | `true` |
| async | boolean | false | Async script execution | `true` |
| type | string | 'text/javascript' | Script MIME type | `'module'` |
| nonce | string | auto | CSP nonce value | `'random-nonce'` |

### Inherited Attributes

The component inherits all standard HTML script attributes and Laravel component attributes.

## Usage Examples

### Basic Script Integration
```blade
<!-- Simple Inline Script -->
<x-script>
    console.log('Application initialized');
</x-script>

<!-- External Script -->
<x-script src="/js/bootstrap.bundle.min.js"></x-script>

<!-- Script with Defer -->
<x-script src="/js/app.js" defer></x-script>

<!-- Async Script -->
<x-script src="/js/analytics.js" async></x-script>
```

### Component Initialization Scripts
```blade
<!-- Initialize Form Components -->
<x-script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize form components
        initializeFormComponents();
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</x-script>

<!-- Initialize Custom Components -->
<x-script>
    window.addEventListener('load', function() {
        // Initialize custom components
        if (typeof initializeCustomComponents === 'function') {
            initializeCustomComponents();
        }
    });
</x-script>
```

### Dashboard Scripts
```blade
<!-- Dashboard Analytics -->
<x-script src="/js/analytics.js" async></x-script>

<!-- Dashboard Charts -->
<x-script src="/js/chart.js"></x-script>
<x-script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize dashboard charts
        initializeCharts();
    });
</x-script>

<!-- Real-time Updates -->
<x-script>
    // WebSocket connection for real-time updates
    const socket = new WebSocket('ws://localhost:8080');
    
    socket.onmessage = function(event) {
        const data = JSON.parse(event.data);
        updateDashboard(data);
    };
</x-script>
```

### Form Enhancement Scripts
```blade
<!-- Form Validation -->
<x-script src="/js/form-validation.js"></x-script>
<x-script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize form validation
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    });
</x-script>

<!-- File Upload Enhancement -->
<x-script src="/js/file-upload.js"></x-script>
<x-script>
    // Initialize file upload components
    document.addEventListener('DOMContentLoaded', function() {
        initializeFileUploads();
    });
</x-script>
```

### E-commerce Scripts
```blade
<!-- Shopping Cart -->
<x-script>
    // Shopping cart functionality
    class ShoppingCart {
        constructor() {
            this.items = JSON.parse(localStorage.getItem('cart') || '[]');
            this.updateCartDisplay();
        }
        
        addItem(productId, quantity = 1) {
            const existingItem = this.items.find(item => item.id === productId);
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                this.items.push({ id: productId, quantity });
            }
            this.saveCart();
            this.updateCartDisplay();
        }
        
        saveCart() {
            localStorage.setItem('cart', JSON.stringify(this.items));
        }
        
        updateCartDisplay() {
            const cartCount = this.items.reduce((total, item) => total + item.quantity, 0);
            document.querySelector('.cart-count').textContent = cartCount;
        }
    }
    
    // Initialize shopping cart
    window.shoppingCart = new ShoppingCart();
</x-script>

<!-- Product Gallery -->
<x-script>
    // Product image gallery
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.product-thumbnail');
        const mainImage = document.querySelector('.product-main-image');
        
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                const newSrc = this.src.replace('_thumb', '');
                mainImage.src = newSrc;
                
                // Update active thumbnail
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</x-script>
```

### Admin Panel Scripts
```blade
<!-- Data Tables -->
<x-script src="/js/datatables.min.js"></x-script>
<x-script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize data tables
        $('.data-table').DataTable({
            responsive: true,
            pageLength: 25,
            order: [[0, 'desc']]
        });
    });
</x-script>

<!-- Admin Dashboard -->
<x-script>
    // Admin dashboard functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize admin components
        initializeAdminDashboard();
        
        // Real-time notifications
        initializeNotifications();
        
        // Auto-save forms
        initializeAutoSave();
    });
</x-script>
```

### Security Scripts
```blade
<!-- CSRF Token Setup -->
<x-script>
    // Setup CSRF token for AJAX requests
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    };
    
    // Setup default headers for fetch requests
    if (typeof fetch !== 'undefined') {
        const originalFetch = fetch;
        window.fetch = function(url, options = {}) {
            options.headers = {
                'X-CSRF-TOKEN': window.Laravel.csrfToken,
                'Content-Type': 'application/json',
                ...options.headers
            };
            return originalFetch(url, options);
        };
    }
</x-script>

<!-- Security Headers -->
<x-script>
    // Security enhancements
    document.addEventListener('DOMContentLoaded', function() {
        // Prevent right-click on sensitive content
        document.addEventListener('contextmenu', function(e) {
            if (e.target.closest('.sensitive-content')) {
                e.preventDefault();
            }
        });
        
        // Disable text selection on sensitive content
        document.querySelectorAll('.sensitive-content').forEach(element => {
            element.style.userSelect = 'none';
        });
    });
</x-script>
```

## Livewire Integration

### Basic Livewire Script
```blade
<div>
    <x-script>
        // Livewire event listeners
        document.addEventListener('livewire:load', function() {
            Livewire.on('userUpdated', (data) => {
                console.log('User updated:', data);
                showNotification('User updated successfully');
            });
        });
    </x-script>
</div>
```

### Livewire with Custom Events
```blade
<div>
    <x-script>
        // Custom Livewire events
        document.addEventListener('livewire:load', function() {
            Livewire.on('showModal', (data) => {
                const modal = new bootstrap.Modal(document.getElementById(data.modalId));
                modal.show();
            });
            
            Livewire.on('hideModal', (data) => {
                const modal = bootstrap.Modal.getInstance(document.getElementById(data.modalId));
                if (modal) {
                    modal.hide();
                }
            });
        });
    </x-script>
</div>
```

## Content Security Policy (CSP) Integration

### Automatic Nonce Generation
The component automatically generates nonces when the SecureHeaders package is available:

```blade
<!-- Automatically includes nonce for CSP -->
<x-script>
    console.log('This script has automatic CSP nonce');
</x-script>
```

### Manual Nonce
```blade
<!-- Manual nonce -->
<x-script nonce="{{ csp_nonce('script') }}">
    console.log('This script uses manual nonce');
</x-script>
```

## Related Components

- [Style](style.md) - CSS stylesheet component
- [Container](container.md) - Conditional wrapper component
- [Show](show.md) - Conditional rendering component

## Best Practices

1. **Security**: Always use CSP nonces for inline scripts
2. **Performance**: Use defer/async attributes appropriately
3. **Organization**: Group related scripts together
4. **Error Handling**: Include error handling in scripts
5. **Accessibility**: Ensure scripts don't break accessibility
6. **Testing**: Test scripts in different browsers
7. **Documentation**: Document complex script functionality

## Troubleshooting

### Script Not Loading
Check that the script path is correct and accessible.

### CSP Violations
Ensure that nonces are properly generated and included.

### Performance Issues
Consider using defer/async attributes or code splitting.

### JavaScript Errors
Check browser console for errors and ensure proper error handling.
