# Card Component

A feature-rich content container with status indicators, ribbons, images, and comprehensive styling options.

## Overview

**Component Type:** Layout  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** None

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/card/index.blade.php`
- **Sub-components:** `card/header.blade.php`, `card/body.blade.php`, `card/footer.blade.php`, etc.
- **Documentation:** `docs/card.md`
- **Tests:** `tests/Components/CardTest.php`

## Basic Usage

```blade
<x-card>
    <x-slot:body>
        Simple card content
    </x-slot:body>
</x-card>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| status | string | null | Status color stripe (success, danger, warning, info) | `'success'` |
| statusSide | string | 'top' | Status stripe position (top, bottom, start, end) | `'start'` |
| ribbon | array | null | Ribbon overlay with text and color | `['text' => 'New', 'color' => 'primary']` |
| title | string | null | Card title text | `'User Profile'` |
| subtitle | string | null | Card subtitle text | `'Administrator'` |
| image | string | null | Card image URL | `'/images/card-bg.jpg'` |
| imagePosition | string | 'top' | Image position (top, bottom) | `'bottom'` |
| borderColor | string | null | Border color variant | `'primary'` |
| textColor | string | null | Text color variant | `'white'` |
| bgColor | string | null | Background color variant | `'dark'` |
| size | string | null | Background size variant | `'sm'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| stacked | boolean | false | Enable stacked card layout | `true` |

## Slots

### Named Slots

#### `header`
- **Purpose:** Card header content with optional actions
- **Required:** No
- **Content:** HTML/Components

#### `body`
- **Purpose:** Main card content area
- **Required:** Recommended
- **Content:** HTML/Components  

#### `footer`
- **Purpose:** Card footer with actions or info
- **Required:** No
- **Content:** HTML/Components

#### `filters`
- **Purpose:** Filter controls in card header area
- **Required:** No
- **Content:** Filter components

### Default Slot
- **Purpose:** Additional content between body and footer
- **Content Type:** HTML/Components
- **Required:** No

## Usage Examples

### Basic Card with Content
```blade
<x-card>
    <x-slot:header>
        <h3 class="card-title">User Profile</h3>
    </x-slot:header>
    
    <x-slot:body>
        <p>User information and details go here.</p>
    </x-slot:body>
    
    <x-slot:footer>
        <button class="btn btn-primary">Edit Profile</button>
    </x-slot:footer>
</x-card>
```

### Card with Status Indicator
```blade
<x-card 
    status="success" 
    statusSide="start"
    title="Success Card"
    subtitle="Operation completed">
    
    <x-slot:body>
        Your operation was completed successfully.
    </x-slot:body>
</x-card>
```

### Card with Ribbon
```blade
<x-card :ribbon="['text' => 'Featured', 'color' => 'red']">
    <x-slot:body>
        This is a featured card with a ribbon overlay.
    </x-slot:body>
</x-card>
```

### Card with Image
```blade
<x-card 
    image="/images/landscape.jpg"
    imagePosition="top"
    title="Beautiful Landscape"
    subtitle="Nature photography">
    
    <x-slot:body>
        A stunning view of mountains and lakes captured during sunset.
    </x-slot:body>
</x-card>
```

### Advanced Styled Card
```blade
<x-card 
    borderColor="primary"
    textColor="white"
    bgColor="dark"
    stacked
    class="shadow-lg">
    
    <x-slot:header>
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Dark Theme Card</h4>
            <x-card.options>
                <x-dropdown>
                    <!-- Options menu -->
                </x-dropdown>
            </x-card.options>
        </div>
    </x-slot:header>
    
    <x-slot:body>
        This card uses dark theme styling with custom colors.
    </x-slot:body>
</x-card>
```

### Card with Filters
```blade
<x-card>
    <x-slot:filters>
        <x-filter-search name="search" placeholder="Search users..." />
        <x-filter-dates name="date_range" />
    </x-slot:filters>
    
    <x-slot:body>
        <!-- Filtered content -->
        <x-table>
            <!-- Table content -->
        </x-table>
    </x-slot:body>
</x-card>
```

### Livewire Integration
```blade
<x-card wire:loading.class="opacity-50">
    <x-slot:header>
        <h4>{{ $title }}</h4>
    </x-slot:header>
    
    <x-slot:body>
        @if($loading)
            <div class="spinner-border" role="status"></div>
        @else
            {{ $content }}
        @endif
    </x-slot:body>
    
    <x-slot:footer>
        <button wire:click="refresh" class="btn btn-secondary">
            Refresh
        </button>
    </x-slot:footer>
</x-card>
```

## Sub-components

### Card Header (`<x-card.header>`)
```blade
<x-card.header class="d-flex justify-content-between">
    <h4>{{ $title }}</h4>
    <x-card.options>
        <!-- Dropdown or action buttons -->
    </x-card.options>
</x-card.header>
```

### Card Body (`<x-card.body>`)
```blade
<x-card.body class="p-4">
    <!-- Main content -->
</x-card.body>
```

### Card Footer (`<x-card.footer>`)
```blade
<x-card.footer class="text-end">
    <button class="btn btn-secondary">Cancel</button>
    <button class="btn btn-primary">Save</button>
</x-card.footer>
```

### Card Title (`<x-card.title>`)
```blade
<x-card.title tag="h3" class="text-primary">
    {{ $cardTitle }}
</x-card.title>
```

### Card Actions (`<x-card.actions>`)
```blade
<x-card.actions>
    <button class="btn btn-sm btn-outline-primary">Edit</button>
    <button class="btn btn-sm btn-outline-danger">Delete</button>
</x-card.actions>
```

## Features

### Status Indicators
- Four-sided status stripes (top, bottom, start, end)
- Color variants: success, danger, warning, info, primary
- Visual feedback for card states

### Ribbon Overlays
- Decorative ribbon with custom text
- Color customization
- Perfect for "Featured", "New", "Sale" labels

### Image Integration
- Top or bottom image placement
- Responsive image sizing
- Alt text support

### Flexible Styling
- Border, text, and background color variants
- Stacked layout support
- Custom CSS class support

## Common Patterns

### Dashboard Cards
```blade
<div class="row">
    <div class="col-md-4">
        <x-card status="success" title="Total Users" subtitle="1,234">
            <x-slot:body>
                <h2 class="text-success">1,234</h2>
                <small class="text-muted">+12% from last month</small>
            </x-slot:body>
        </x-card>
    </div>
</div>
```

### Form Cards
```blade
<x-card>
    <x-slot:header>
        <h4>Edit Profile</h4>
    </x-slot:header>
    
    <x-slot:body>
        <x-form wire:submit.prevent="save">
            <!-- Form fields -->
        </x-form>
    </x-slot:body>
</x-card>
```

### Data Cards
```blade
<x-card>
    <x-slot:filters>
        <x-filter-search />
        <x-filter-dates />
    </x-slot:filters>
    
    <x-slot:body>
        <x-table>
            <!-- Data table -->
        </x-table>
    </x-slot:body>
    
    <x-slot:footer>
        {{ $pagination->links() }}
    </x-slot:footer>
</x-card>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'card' => [
        'view' => 'laravel-components::{framework}.card.index',
    ],
    'card.header' => [
        'view' => 'laravel-components::{framework}.card.header',
    ],
    // ... other card sub-components
],
```

## Accessibility

### ARIA Attributes
- Proper heading hierarchy in headers
- Image alt texts for card images
- Semantic structure with appropriate roles

### Best Practices
- Use meaningful titles and subtitles
- Ensure sufficient color contrast
- Provide alternative text for images
- Use semantic HTML in card content

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** None (purely CSS-based)
- **CSS Framework Requirements:** Bootstrap 4+ or equivalent grid system

## Troubleshooting

### Common Issues

#### Status Stripe Not Showing
**Problem:** Status color not appearing
**Solution:** Ensure valid color name (success, danger, warning, info, primary)

#### Ribbon Not Positioned Correctly
**Problem:** Ribbon appears in wrong location
**Solution:** Verify ribbon array structure: `['text' => 'Label', 'color' => 'primary']`

#### Image Not Responsive
**Problem:** Card image overflows or doesn't scale
**Solution:** Use proper Bootstrap image classes or ensure image has appropriate dimensions

#### Slots Not Rendering
**Problem:** Named slots appear empty
**Solution:** Use correct slot syntax: `<x-slot:name>content</x-slot:name>`

## Related Components

- **Modal:** Similar container structure for overlays
- **Accordion:** Collapsible card-like containers
- **Alert:** For status messaging
- **Table:** Often used within card bodies
- **Form:** Frequently wrapped in cards

## Performance Considerations

- Use image optimization for card images
- Consider lazy loading for image-heavy card layouts
- Minimize CSS class combinations for better performance

## Examples Gallery

### E-commerce Product Card
```blade
<x-card 
    image="/products/laptop.jpg"
    :ribbon="['text' => 'Sale', 'color' => 'danger']"
    class="h-100">
    
    <x-slot:body>
        <h5>Gaming Laptop</h5>
        <p class="text-muted">High-performance laptop for gaming</p>
        <h4 class="text-primary">$1,299</h4>
    </x-slot:body>
    
    <x-slot:footer>
        <button class="btn btn-primary w-100">Add to Cart</button>
    </x-slot:footer>
</x-card>
```

### User Profile Card
```blade
<x-card class="text-center">
    <x-slot:body>
        <x-avatar image="/users/john.jpg" size="xl" class="mb-3" />
        <h4>John Doe</h4>
        <p class="text-muted">Software Developer</p>
        <div class="d-flex justify-content-center">
            <x-badge color="primary">PHP</x-badge>
            <x-badge color="secondary">Laravel</x-badge>
        </div>
    </x-slot:body>
    
    <x-slot:footer>
        <button class="btn btn-outline-primary">View Profile</button>
    </x-slot:footer>
</x-card>
```

## Changelog

### Version 2.0.0
- Added ribbon overlay support
- Enhanced status indicator positioning
- Improved image positioning options
- Added stacked layout capability

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/card/index.blade.php`
2. Update sub-component views in `resources/views/bootstrap-5/card/`
3. Add/update tests in `tests/Components/CardTest.php`
4. Update this documentation
