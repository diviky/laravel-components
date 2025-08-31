# Table Component

A feature-rich table component with responsive design, styling options, and comprehensive Bootstrap integration for displaying structured data.

## Overview

**Component Type:** Data Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** None

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/table/index.blade.php`
- **Sub-components:** `table/header.blade.php`, `table/body.blade.php`, `table/footer.blade.php`, `table/row.blade.php`, `table/cell.blade.php`
- **Documentation:** `docs/table.md`
- **Tests:** `tests/Components/TableTest.php`

## Basic Usage

```blade
<x-table>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Email</x-table.cell>
            <x-table.cell>Status</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>John Doe</x-table.cell>
            <x-table.cell>john@example.com</x-table.cell>
            <x-table.cell><x-badge color="success">Active</x-badge></x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| responsive | boolean | true | Enable responsive table wrapper | `false` |
| bordered | boolean | true | Add borders to table cells | `false` |
| card | boolean | true | Apply card table styling | `false` |
| nowrap | boolean | true | Prevent text wrapping | `false` |
| outline | boolean | true | Apply outline styling | `false` |
| striped | boolean | false | Add striped row styling | `true` |
| height | string | '50vh' | Minimum height for responsive wrapper | `'300px'` |
| borderTop | boolean | true | Add top border | `false` |
| size | string | null | Table size variant | `'sm'` |
| compact | boolean | false | Use compact table styling | `true` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Table ID | `'users-table'` |
| class | string | null | Additional CSS classes | `'custom-table'` |

## Slots

### Named Slots

#### `header` or `head`
- **Purpose:** Table header content
- **Required:** No
- **Content:** Table rows with header cells

#### `body`
- **Purpose:** Table body content
- **Required:** No
- **Content:** Table rows with data cells

#### `footer`
- **Purpose:** Table footer content
- **Required:** No
- **Content:** Table rows with footer cells

#### `group`
- **Purpose:** Column group definitions
- **Required:** No
- **Content:** `<col>` elements

### Default Slot
- **Purpose:** Additional content between body and footer
- **Content Type:** Table rows
- **Required:** No

## Usage Examples

### Basic Table
```blade
<x-table>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Email</x-table.cell>
            <x-table.cell>Role</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>John Doe</x-table.cell>
            <x-table.cell>john@example.com</x-table.cell>
            <x-table.cell>Admin</x-table.cell>
        </x-table.row>
        <x-table.row>
            <x-table.cell>Jane Smith</x-table.cell>
            <x-table.cell>jane@example.com</x-table.cell>
            <x-table.cell>User</x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

### Striped Table
```blade
<x-table striped>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Product</x-table.cell>
            <x-table.cell>Price</x-table.cell>
            <x-table.cell>Stock</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>Laptop</x-table.cell>
            <x-table.cell>$1,299</x-table.cell>
            <x-table.cell>15</x-table.cell>
        </x-table.row>
        <x-table.row>
            <x-table.cell>Mouse</x-table.cell>
            <x-table.cell>$25</x-table.cell>
            <x-table.cell>50</x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

### Compact Table
```blade
<x-table compact>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>ID</x-table.cell>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Status</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>1</x-table.cell>
            <x-table.cell>John Doe</x-table.cell>
            <x-table.cell><x-badge color="success">Active</x-badge></x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

### Non-responsive Table
```blade
<x-table :responsive="false" :bordered="false">
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Simple Header</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>Simple Content</x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

### Table with Custom Height
```blade
<x-table height="400px">
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Long List</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        @for ($i = 1; $i <= 100; $i++)
            <x-table.row>
                <x-table.cell>Item {{ $i }}</x-table.cell>
            </x-table.row>
        @endfor
    </x-slot:body>
</x-table>
```

### Table with Column Groups
```blade
<x-table>
    <x-slot:group>
        <col style="width: 30%">
        <col style="width: 40%">
        <col style="width: 30%">
    </x-slot:group>
    
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Description</x-table.cell>
            <x-table.cell>Actions</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>Product A</x-table.cell>
            <x-table.cell>Long description here...</x-table.cell>
            <x-table.cell>
                <x-form-button sm primary>Edit</x-form-button>
            </x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

### Livewire Integration
```blade
<x-table wire:loading.class="opacity-50">
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Email</x-table.cell>
            <x-table.cell>Actions</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        @foreach($users as $user)
            <x-table.row wire:key="{{ $user->id }}">
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>
                    <x-form-button sm wire:click="editUser({{ $user->id }})">
                        Edit
                    </x-form-button>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-slot:body>
</x-table>
```

## Sub-components

### Table Header (`<x-table.header>`)
```blade
<x-table.header sticky>
    <x-table.row>
        <x-table.cell>Sticky Header</x-table.cell>
    </x-table.row>
</x-table.header>
```

### Table Body (`<x-table.body>`)
```blade
<x-table.body>
    <x-table.row>
        <x-table.cell>Body Content</x-table.cell>
    </x-table.row>
</x-table.body>
```

### Table Footer (`<x-table.footer>`)
```blade
<x-table.footer>
    <x-table.row>
        <x-table.cell>Footer Content</x-table.cell>
    </x-table.row>
</x-table.footer>
```

### Table Row (`<x-table.row>`)
```blade
<x-table.row class="table-active">
    <x-table.cell>Active Row</x-table.cell>
</x-table.row>
```

### Table Cell (`<x-table.cell>`)
```blade
<x-table.cell class="text-center">
    Centered Content
</x-table.cell>
```

## Features

### Responsive Design
- **Responsive (`responsive`):** Wraps table in responsive container
- **Height Control (`height`):** Sets minimum height for responsive wrapper
- **Auto-scrolling:** Handles overflow content gracefully

### Styling Options
- **Bordered (`bordered`):** Adds borders to all cells
- **Card (`card`):** Applies card-like styling
- **Outline (`outline`):** Uses outline styling variant
- **Striped (`striped`):** Alternating row colors
- **Border Top (`borderTop`):** Adds top border

### Size Variants
- **Default:** Standard table size
- **Small (`size="sm"` or `compact`):** Compact table styling

### Text Handling
- **No Wrap (`nowrap`):** Prevents text wrapping in cells
- **Flexible Content:** Supports complex content in cells

### Header Features
- **Sticky Header (`sticky`):** Makes header stick to top when scrolling
- **Flexible Structure:** Supports complex header layouts

## Common Patterns

### Data Table with Actions
```blade
<x-table>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Email</x-table.cell>
            <x-table.cell>Status</x-table.cell>
            <x-table.cell>Actions</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        @foreach($users as $user)
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>
                    <x-badge color="{{ $user->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($user->status) }}
                    </x-badge>
                </x-table.cell>
                <x-table.cell>
                    <div class="btn-group">
                        <x-form-button sm outline primary>Edit</x-form-button>
                        <x-form-button sm outline danger>Delete</x-form-button>
                    </div>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-slot:body>
</x-table>
```

### Summary Table
```blade
<x-table>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Category</x-table.cell>
            <x-table.cell>Count</x-table.cell>
            <x-table.cell>Percentage</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>Active Users</x-table.cell>
            <x-table.cell>1,234</x-table.cell>
            <x-table.cell>75%</x-table.cell>
        </x-table.row>
        <x-table.row>
            <x-table.cell>Inactive Users</x-table.cell>
            <x-table.cell>412</x-table.cell>
            <x-table.cell>25%</x-table.cell>
        </x-table.row>
    </x-slot:body>
    
    <x-slot:footer>
        <x-table.row>
            <x-table.cell><strong>Total</strong></x-table.cell>
            <x-table.cell><strong>1,646</strong></x-table.cell>
            <x-table.cell><strong>100%</strong></x-table.cell>
        </x-table.row>
    </x-slot:footer>
</x-table>
```

### Comparison Table
```blade
<x-table striped>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Feature</x-table.cell>
            <x-table.cell>Basic Plan</x-table.cell>
            <x-table.cell>Pro Plan</x-table.cell>
            <x-table.cell>Enterprise</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>Users</x-table.cell>
            <x-table.cell>5</x-table.cell>
            <x-table.cell>25</x-table.cell>
            <x-table.cell>Unlimited</x-table.cell>
        </x-table.row>
        <x-table.row>
            <x-table.cell>Storage</x-table.cell>
            <x-table.cell>10GB</x-table.cell>
            <x-table.cell>100GB</x-table.cell>
            <x-table.cell>1TB</x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'table' => [
        'view' => 'laravel-components::{framework}.table.index',
    ],
    'table.header' => [
        'view' => 'laravel-components::{framework}.table.header',
    ],
    // ... other table sub-components
],
```

## Accessibility

### ARIA Attributes
- Proper table semantics with `<table>`, `<thead>`, `<tbody>`, `<tfoot>`
- Screen reader friendly structure
- Keyboard navigation support

### Best Practices
- Use meaningful header cells
- Ensure sufficient color contrast
- Provide alternative text for complex content
- Use semantic table structure

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** None (purely CSS-based)
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Table Not Responsive
**Problem:** Table doesn't scroll horizontally on mobile
**Solution:** Ensure `responsive="true"` (default) and Bootstrap CSS is loaded

#### Styling Not Applied
**Problem:** Table doesn't look like expected
**Solution:** Verify Bootstrap CSS is loaded and check attribute values

#### Content Overflow
**Problem:** Content overflows table cells
**Solution:** Use `nowrap="false"` to allow text wrapping or adjust column widths

#### Sticky Header Not Working
**Problem:** Header doesn't stick when scrolling
**Solution:** Ensure `sticky` attribute is set on table header

## Related Components

- **Card:** Often contains tables
- **Badge:** Commonly used in table cells for status
- **Button:** Used for table actions
- **Form:** Tables often contain form elements

## Performance Considerations

- Use appropriate table sizes for data volume
- Consider pagination for large datasets
- Optimize responsive behavior for mobile devices
- Use efficient rendering for dynamic content

## Examples Gallery

### User Management Table
```blade
<x-table>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Avatar</x-table.cell>
            <x-table.cell>Name</x-table.cell>
            <x-table.cell>Email</x-table.cell>
            <x-table.cell>Role</x-table.cell>
            <x-table.cell>Status</x-table.cell>
            <x-table.cell>Actions</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        @foreach($users as $user)
            <x-table.row>
                <x-table.cell>
                    <x-avatar image="{{ $user->avatar }}" size="sm" />
                </x-table.cell>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>{{ $user->role }}</x-table.cell>
                <x-table.cell>
                    <x-badge color="{{ $user->status === 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($user->status) }}
                    </x-badge>
                </x-table.cell>
                <x-table.cell>
                    <div class="btn-group">
                        <x-form-button sm outline primary>Edit</x-form-button>
                        <x-form-button sm outline danger>Delete</x-form-button>
                    </div>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-slot:body>
</x-table>
```

### Analytics Dashboard Table
```blade
<x-table striped>
    <x-slot:header>
        <x-table.row>
            <x-table.cell>Metric</x-table.cell>
            <x-table.cell>This Month</x-table.cell>
            <x-table.cell>Last Month</x-table.cell>
            <x-table.cell>Change</x-table.cell>
        </x-table.row>
    </x-slot:header>
    
    <x-slot:body>
        <x-table.row>
            <x-table.cell>Revenue</x-table.cell>
            <x-table.cell>$45,230</x-table.cell>
            <x-table.cell>$38,450</x-table.cell>
            <x-table.cell>
                <x-badge color="success">+17.6%</x-badge>
            </x-table.cell>
        </x-table.row>
        <x-table.row>
            <x-table.cell>Users</x-table.cell>
            <x-table.cell>1,234</x-table.cell>
            <x-table.cell>1,156</x-table.cell>
            <x-table.cell>
                <x-badge color="success">+6.7%</x-badge>
            </x-table.cell>
        </x-table.row>
    </x-slot:body>
</x-table>
```

## Changelog

### Version 2.0.0
- Added responsive design support
- Enhanced styling options
- Improved accessibility features
- Added sticky header support

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/table/index.blade.php`
2. Update sub-component views in `resources/views/bootstrap-5/table/`
3. Add/update tests in `tests/Components/TableTest.php`
4. Update this documentation
