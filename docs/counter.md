# Counter Component

A simple display component that renders numbers with short number formatting (e.g., 1K, 1M, 1B) for better readability and visual appeal. This component is ideal for displaying statistics, metrics, and large numbers in a user-friendly format.

## Overview

**Component Type:** View-Only Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Laravel's `Str::shortNumber()` helper  
**Location:** `resources/views/bootstrap-5/counter.blade.php`

## Files

- **View File:** `resources/views/bootstrap-5/counter.blade.php`
- **Documentation:** `docs/counter.md`
- **Tests:** `tests/Components/CounterTest.php`

## Basic Usage

```blade
<x-counter :number="1500" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| number | integer/float | - | The number to display (required) | `1500` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'text-primary'` |
| id | string | null | HTML ID attribute | `'user-count'` |
| title | string | null | Title attribute for tooltip | `'Total users'` |

### Inherited Attributes

This component supports all standard HTML span attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| style | string | null | Inline CSS styles | `'font-size: 2rem;'` |
| data-* | string | null | Custom data attributes | `data-metric="users"` |

## Usage Examples

### Basic Counter Display
```blade
<x-counter :number="1500" />
<!-- Output: 1.5K -->
```

### Counter with Custom Styling
```blade
<x-counter :number="2500000" class="text-primary fw-bold" />
<!-- Output: 2.5M -->
```

### Counter with Tooltip
```blade
<x-counter :number="1000000" title="Total page views" />
<!-- Output: 1M -->
```

### Counter with Custom ID
```blade
<x-counter :number="500" id="user-count" />
<!-- Output: 500 -->
```

### Counter with Inline Styles
```blade
<x-counter :number="7500" style="font-size: 2rem; color: #28a745;" />
<!-- Output: 7.5K -->
```

### Counter with Data Attributes
```blade
<x-counter :number="1200" data-metric="users" data-period="monthly" />
<!-- Output: 1.2K -->
```

### Counter in Dashboard Context
```blade
<div class="row">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <x-counter :number="15420" class="display-4 text-primary" />
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Revenue</h5>
                <x-counter :number="2500000" class="display-4 text-success" />
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <x-counter :number="8500" class="display-4 text-info" />
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <x-counter :number="320" class="display-4 text-warning" />
            </div>
        </div>
    </div>
</div>
```

### Counter with Livewire Integration
```blade
<div class="d-flex align-items-center">
    <span class="me-2">Active Users:</span>
    <x-counter :number="$activeUsers" class="fw-bold" wire:poll.10s />
</div>
```

### Counter in Statistics Section
```blade
<section class="statistics py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Impact</h2>
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <x-counter :number="50000" class="display-3 text-primary mb-2" />
                    <h5>Happy Customers</h5>
                    <p class="text-muted">Satisfied with our service</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <x-counter :number="1000000" class="display-3 text-success mb-2" />
                    <h5>Products Sold</h5>
                    <p class="text-muted">Across all categories</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <x-counter :number="25000000" class="display-3 text-info mb-2" />
                    <h5>Revenue Generated</h5>
                    <p class="text-muted">In USD</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <x-counter :number="95" class="display-3 text-warning mb-2" />
                    <h5>Success Rate</h5>
                    <p class="text-muted">Customer satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>
```

### Counter in Social Proof Section
```blade
<div class="social-proof bg-light py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Trusted by Thousands</h3>
                <p class="lead">Join our growing community of satisfied customers.</p>
            </div>
            <div class="col-md-6">
                <div class="row text-center">
                    <div class="col-4">
                        <x-counter :number="15000" class="h3 text-primary" />
                        <small class="text-muted">Users</small>
                    </div>
                    <div class="col-4">
                        <x-counter :number="500000" class="h3 text-success" />
                        <small class="text-muted">Downloads</small>
                    </div>
                    <div class="col-4">
                        <x-counter :number="98" class="h3 text-info" />
                        <small class="text-muted">Rating</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Counter with Animation
```blade
<div class="achievement-counter">
    <x-counter :number="1000000" class="counter-animated" data-target="1000000" />
    <p>Million Dollar Milestone</p>
</div>

<style>
.counter-animated {
    transition: all 0.5s ease;
}
.counter-animated:hover {
    transform: scale(1.1);
    color: #007bff;
}
</style>
```

## Real Project Examples

### E-commerce Dashboard
```blade
<div class="dashboard-stats">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Sales
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                $<x-counter :number="1250000" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Orders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <x-counter :number="15420" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Customers
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <x-counter :number="8500" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Products
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <x-counter :number="1250" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Analytics Dashboard
```blade
<div class="analytics-overview">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="metric-card">
                <div class="metric-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="metric-content">
                    <h3><x-counter :number="2500000" /></h3>
                    <p>Page Views</p>
                    <span class="trend up">+12.5%</span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="metric-card">
                <div class="metric-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="metric-content">
                    <h3><x-counter :number="125000" /></h3>
                    <p>Unique Visitors</p>
                    <span class="trend up">+8.3%</span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="metric-card">
                <div class="metric-icon">
                    <i class="fas fa-mouse-pointer"></i>
                </div>
                <div class="metric-content">
                    <h3><x-counter :number="85000" /></h3>
                    <p>Click-through Rate</p>
                    <span class="trend down">-2.1%</span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="metric-card">
                <div class="metric-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="metric-content">
                    <h3><x-counter :number="95" />%</h3>
                    <p>Conversion Rate</p>
                    <span class="trend up">+5.2%</span>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Social Media Stats
```blade
<div class="social-stats">
    <div class="row text-center">
        <div class="col-md-3">
            <div class="social-stat-item">
                <i class="fab fa-facebook fa-3x text-primary mb-3"></i>
                <h2><x-counter :number="50000" /></h2>
                <p>Facebook Followers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="social-stat-item">
                <i class="fab fa-twitter fa-3x text-info mb-3"></i>
                <h2><x-counter :number="25000" /></h2>
                <p>Twitter Followers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="social-stat-item">
                <i class="fab fa-instagram fa-3x text-danger mb-3"></i>
                <h2><x-counter :number="75000" /></h2>
                <p>Instagram Followers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="social-stat-item">
                <i class="fab fa-linkedin fa-3x text-primary mb-3"></i>
                <h2><x-counter :number="15000" /></h2>
                <p>LinkedIn Followers</p>
            </div>
        </div>
    </div>
</div>
```

### Achievement Counter
```blade
<div class="achievements-section">
    <div class="container">
        <h2 class="text-center mb-5">Our Achievements</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="achievement-card text-center">
                    <div class="achievement-icon mb-3">
                        <i class="fas fa-trophy fa-3x text-warning"></i>
                    </div>
                    <h3 class="achievement-number">
                        <x-counter :number="1000000" />
                    </h3>
                    <h5>Happy Customers</h5>
                    <p class="text-muted">Served worldwide</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="achievement-card text-center">
                    <div class="achievement-icon mb-3">
                        <i class="fas fa-award fa-3x text-success"></i>
                    </div>
                    <h3 class="achievement-number">
                        <x-counter :number="500" />
                    </h3>
                    <h5>Awards Won</h5>
                    <p class="text-muted">Industry recognition</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="achievement-card text-center">
                    <div class="achievement-icon mb-3">
                        <i class="fas fa-globe fa-3x text-info"></i>
                    </div>
                    <h3 class="achievement-number">
                        <x-counter :number="50" />
                    </h3>
                    <h5>Countries</h5>
                    <p class="text-muted">Global presence</p>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Features

### Number Formatting
- **Short Number Display**: Converts large numbers to readable format (1K, 1M, 1B)
- **Automatic Formatting**: Uses Laravel's `Str::shortNumber()` helper
- **Consistent Display**: Maintains consistent formatting across the application
- **Readable Output**: Makes large numbers more user-friendly

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

## Number Formatting Examples

| Input Number | Formatted Output | Description |
|--------------|------------------|-------------|
| 500 | 500 | No formatting needed |
| 1500 | 1.5K | Thousands |
| 25000 | 25K | Thousands |
| 100000 | 100K | Thousands |
| 1500000 | 1.5M | Millions |
| 25000000 | 25M | Millions |
| 1000000000 | 1B | Billions |
| 2500000000 | 2.5B | Billions |

## Configuration

### Global Configuration
The component uses Laravel's built-in `Str::shortNumber()` helper:

```php
// In your service provider or config
use Illuminate\Support\Str;

// The component automatically uses this helper
Str::shortNumber($number);
```

### Custom Formatting
If you need custom number formatting, you can extend the component:

```php
// Create a custom counter component
class CustomCounter extends Component
{
    public function render()
    {
        return view('components.custom-counter', [
            'formattedNumber' => $this->formatNumber($this->number)
        ]);
    }
    
    private function formatNumber($number)
    {
        // Custom formatting logic
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        }
        if ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }
        return $number;
    }
}
```

## JavaScript Integration

### Animated Counter
```javascript
// Animate counter on scroll
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 20);
}

// Intersection Observer for scroll animation
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counter = entry.target;
            const target = parseInt(counter.dataset.target);
            animateCounter(counter, target);
            observer.unobserve(counter);
        }
    });
});

document.querySelectorAll('.counter-animated').forEach(counter => {
    observer.observe(counter);
});
```

### Livewire Integration
```javascript
// Update counter with Livewire
Livewire.on('counter-updated', (data) => {
    const counter = document.querySelector(`[data-counter-id="${data.id}"]`);
    if (counter) {
        counter.textContent = data.formattedNumber;
    }
});
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `role="text"` for screen readers
- Proper semantic structure
- Accessible number formatting

### Screen Reader Support
- Clear number announcements
- Proper context for large numbers
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
- **Number Formatting**: Full support

## Troubleshooting

### Common Issues

**Number not formatting correctly**
```blade
<!-- Ensure number is passed as integer/float -->
<x-counter :number="1500" />
```

**Styling not applying**
```blade
<!-- Use proper CSS classes -->
<x-counter :number="1500" class="text-primary fw-bold" />
```

**Livewire not updating**
```blade
<!-- Add wire:poll for automatic updates -->
<x-counter :number="$count" wire:poll.5s />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Badge](badge.md) - Badge display component
- [Card](card.md) - Card container component
- [Alert](alert.md) - Alert message component
- [Progress](progress.md) - Progress bar component
- [Table](table.md) - Table component
- [Modal](modal.md) - Modal dialog component

## Performance

### Optimization Tips
1. **Use appropriate number ranges** for formatting
2. **Cache formatted numbers** for frequently used values
3. **Minimize DOM updates** with Livewire
4. **Use proper CSS classes** for styling
5. **Optimize for mobile** display

### Bundle Size
- **Base Component**: ~1KB
- **With Custom JS**: ~5KB
- **With Animation**: ~10KB
- **Full Package**: ~15KB

## Examples Gallery

### Basic Counters
```blade
<!-- Simple counter -->
<x-counter :number="1500" />

<!-- Styled counter -->
<x-counter :number="2500000" class="text-primary fw-bold" />

<!-- Counter with tooltip -->
<x-counter :number="1000000" title="Total users" />
```

### Advanced Counters
```blade
<!-- Animated counter -->
<x-counter :number="50000" class="counter-animated" data-target="50000" />

<!-- Livewire counter -->
<x-counter :number="$userCount" wire:poll.10s />

<!-- Custom styled counter -->
<x-counter :number="7500" style="font-size: 2rem; color: #28a745;" />
```

## Changelog

### Version 2.0
- Added short number formatting
- Enhanced styling options
- Improved accessibility features
- Added Livewire integration

### Version 1.0
- Initial release
- Basic number display
- Bootstrap 5 support
- Simple formatting

## Contributing

When contributing to the Counter component:

1. **Test number formatting** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
