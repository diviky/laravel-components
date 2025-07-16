# Card Component

A flexible and feature-rich container component with multiple sections, styling options, and advanced features like status indicators, ribbons, and image support.

## View File

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Card title | 'User Profile' |
| subtitle | string | null | Card subtitle | 'Personal Information' |
| status | string | null | Status indicator color | 'primary', 'success', 'warning', 'danger' |
| statusSide | string | 'top' | Status indicator position | 'top', 'bottom', 'left', 'right' |
| ribbon | array | null | Ribbon configuration | ['text' => 'New', 'color' => 'primary'] |
| image | string | null | Image URL for card | 'https://example.com/image.jpg' |
| imagePosition | string | 'top' | Image position | 'top', 'bottom' |
| borderColor | string | null | Border color | 'primary', 'secondary', 'success' |
| textColor | string | null | Text color | 'primary', 'secondary', 'muted' |
| bgColor | string | null | Background color | 'light', 'dark', 'primary' |
| size | string | null | Card size variant | 'sm', 'lg' |
| stacked | boolean | false | Stacked card style | true |
| class | string | null | Additional CSS classes | 'shadow' |
| id | string | null | Card ID | 'profile-card' |

## Slot Properties

| Slot | Description | Example |
|------|-------------|---------|
| header | Card header content | `<x-slot:header>Header Content</x-slot:header>` |
| body | Card body content | `<x-slot:body>Body Content</x-slot:body>` |
| footer | Card footer content | `<x-slot:footer>Footer Content</x-slot:footer>` |
| filters | Card filters section | `<x-slot:filters>Filter Content</x-slot:filters>` |

## Usage Examples

### Basic Card
```blade
<x-card title="User Profile" subtitle="Personal Information">
    <x-card.body>
        <p>This is the card content.</p>
    </x-card.body>
</x-card>
```

### Card with Status Indicator
```blade
<x-card title="Server Status" status="success" statusSide="top">
    <x-card.body>
        Server is running normally.
    </x-card.body>
</x-card>
```

### Card with Ribbon
```blade
<x-card title="Premium Plan" :ribbon="['text' => 'Popular', 'color' => 'primary']">
    <x-card.body>
        Premium features included.
    </x-card.body>
</x-card>
```

### Card with Image
```blade
<x-card title="Product Card" image="/images/product.jpg" imagePosition="top">
    <x-card.body>
        <p>Product description here.</p>
    </x-card.body>
</x-card>
```

### Card with Custom Colors
```blade
<x-card title="Custom Card" borderColor="primary" bgColor="light" textColor="primary">
    <x-card.body>
        Custom styled card content.
    </x-card.body>
</x-card>
```

### Stacked Card
```blade
<x-card title="Stacked Card" stacked>
    <x-card.body>
        This card has a stacked appearance.
    </x-card.body>
</x-card>
```

### Card with Slots
```blade
<x-card>
    <x-slot:header>
        <h5>Custom Header</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>Card body content</p>
    </x-slot:body>
    
    <x-slot:footer>
        <button class="btn btn-primary">Action</button>
    </x-slot:footer>
</x-card>
```

### Card with Filters
```blade
<x-card title="Data Table">
    <x-slot:filters>
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            <div class="col-md-6">
                <select class="form-select">
                    <option>All Categories</option>
                </select>
            </div>
        </div>
    </x-slot:filters>
    
    <x-slot:body>
        Table content here...
    </x-slot:body>
</x-card>
```

### Full-Featured Card
```blade
<x-card 
    title="Advanced Card" 
    subtitle="With all features"
    status="warning"
    statusSide="left"
    :ribbon="['text' => 'Beta', 'color' => 'warning']"
    image="/images/banner.jpg"
    borderColor="warning"
    class="shadow-lg">
    
    <x-slot:header>
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Custom Header</h5>
            <div class="card-actions">
                <button class="btn btn-sm btn-outline-primary">Edit</button>
            </div>
        </div>
    </x-slot:header>
    
    <x-slot:body>
        <p>This card demonstrates all available features.</p>
    </x-slot:body>
    
    <x-slot:footer>
        <div class="d-flex justify-content-between">
            <small class="text-muted">Last updated: {{ now()->format('M j, Y') }}</small>
            <div>
                <button class="btn btn-sm btn-secondary">Cancel</button>
                <button class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </x-slot:footer>
</x-card>
```

## Real Project Examples

### From Dashboard
```blade
<x-card title="Statistics" status="success">
    <x-card.body>
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <h3>1,234</h3>
                    <p class="text-muted">Total Users</p>
                </div>
            </div>
        </div>
    </x-card.body>
</x-card>
```

### From User Profile
```blade
<x-card title="Profile Information" :ribbon="['text' => 'Verified', 'color' => 'success']">
    <x-card.body>
        <div class="row">
            <div class="col-md-8">
                <h5>{{ $user->name }}</h5>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
        </div>
    </x-card.body>
</x-card>
```

## Related Components

### Card Header

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/header.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Header title | 'Settings' |
| subtitle | string | null | Header subtitle | 'Configure your preferences' |
| class | string | null | Additional CSS classes | 'bg-light' |

### Card Body

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/body.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'p-4' |

### Card Footer

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/footer.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-end' |

### Card Title

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/title.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| subtitle | string | null | Optional subtitle | 'Additional information' |
| class | string | null | Additional CSS classes | 'fw-bold' |

### Card Actions

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/actions.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-end' |

### Card Options

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/options.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'dropdown' |

### Card Filter

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/card/filter.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'card-header' |

## Advanced Features

### Status Indicators
Cards can display status indicators on any side:
```blade
<x-card status="primary" statusSide="top">...</x-card>
<x-card status="success" statusSide="left">...</x-card>
<x-card status="danger" statusSide="right">...</x-card>
```

### Ribbon Badges
Add attention-grabbing ribbons:
```blade
<x-card :ribbon="['text' => 'New Feature', 'color' => 'success']">...</x-card>
```

### Image Integration
Cards support images at the top or bottom:
```blade
<x-card image="/path/to/image.jpg" imagePosition="top">...</x-card>
```

### Color Customization
Full control over card colors:
```blade
<x-card borderColor="primary" bgColor="light" textColor="dark">...</x-card>
```

## Styling Classes

The component applies these CSS classes based on props:

- `card` - Base card styling
- `card-stacked` - Stacked appearance
- `border-{color}` - Border color variants
- `text-{color}` - Text color variants
- `bg-{color}` - Background color variants
- `card-status-{side}` - Status indicator positioning
- `ribbon` - Ribbon badge styling

## Accessibility Features

- Proper semantic HTML structure
- ARIA labels and roles where appropriate
- Keyboard navigation support
- Screen reader friendly content
- Focus management for interactive elements

## Best Practices

1. **Consistent Spacing**: Use consistent padding and margins
2. **Clear Hierarchy**: Maintain clear visual hierarchy with titles and content
3. **Responsive Design**: Ensure cards work well on all screen sizes
4. **Meaningful Status**: Use status indicators meaningfully
5. **Accessible Content**: Ensure all content is accessible to screen readers
