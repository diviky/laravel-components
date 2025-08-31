# Dropdown Component

A comprehensive dropdown menu component with multiple positioning options, custom triggers, and extensive styling capabilities for creating interactive navigation menus and action lists.

## Overview

**Component Type:** Navigation/Interactive  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for dropdown functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/dropdown/index.blade.php`
- **Sub-components:** 
  - `dropdown/action.blade.php` - Dropdown trigger
  - `dropdown/menu.blade.php` - Dropdown menu container
  - `dropdown/item.blade.php` - Dropdown menu items
- **Documentation:** `docs/dropdown.md`
- **Tests:** `tests/Components/DropdownTest.php`

## Basic Usage

```blade
<x-dropdown>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | 'dots' | Icon name for the trigger | `'menu'` |
| position | string | 'right' | Menu positioning | `'left'` |
| header | string | null | Menu header text | `'Actions'` |
| label | string | null | Trigger button label | `'Options'` |
| inline | boolean | true | Display inline | `false` |
| link | string | null | Custom trigger link | `'<button>...</button>'` |
| toggle | boolean | false | Add dropdown-toggle class | `true` |
| autoClose | string | 'true' | Auto-close behavior | `'outside'` |
| dropend | boolean | false | Drop to the right | `true` |
| vertical | boolean | false | Use vertical dots icon | `true` |
| menu | string | null | Custom menu content | `'<div>...</div>'` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Dropdown ID | `'user-dropdown'` |
| class | string | null | Additional CSS classes | `'custom-dropdown'` |

## Sub-components

### Dropdown Action (`<x-dropdown.action>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | 'dots' | Icon name for trigger | `'menu'` |
| position | string | 'right' | Menu positioning | `'left'` |
| header | string | null | Menu header text | `'Actions'` |
| label | string | null | Trigger button label | `'Options'` |
| inline | boolean | true | Display inline | `false` |
| link | string | null | Custom trigger link | `'<button>...</button>'` |
| toggle | boolean | false | Add dropdown-toggle class | `true` |
| autoClose | string | 'true' | Auto-close behavior | `'outside'` |
| dropend | boolean | false | Drop to the right | `true` |
| vertical | boolean | false | Use vertical dots icon | `true` |

### Dropdown Menu (`<x-dropdown.menu>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| position | string | null | Menu positioning | `'left'` |
| header | string | null | Menu header text | `'Actions'` |
| visible | boolean | false | Always visible menu | `true` |
| show | boolean | false | Show menu by default | `true` |

### Dropdown Item (`<x-dropdown.item>`)

#### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Item icon name | `'user'` |
| href | string | '#' | Item link URL | `'/profile'` |
| divider | boolean | false | Add divider after item | `true` |
| separator | boolean | false | Add separator after item | `true` |
| active | boolean | false | Mark item as active | `true` |
| disabled | boolean | false | Disable the item | `true` |
| label | string | null | Item label text | `'Profile'` |
| title | string | null | Item title text | `'View Profile'` |
| enabled | boolean | true | Enable/disable item | `false` |

## Slots

### Default Slot
- **Purpose:** Dropdown menu items
- **Content Type:** Dropdown item components
- **Required:** Yes

## Usage Examples

### Basic Dropdown
```blade
<x-dropdown>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Custom Icon and Label
```blade
<x-dropdown icon="user" label="User Menu">
    <x-dropdown.item href="/profile" label="My Profile" icon="user" />
    <x-dropdown.item href="/settings" label="Settings" icon="settings" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/logout" label="Logout" icon="logout" />
</x-dropdown>
```

### Dropdown with Header
```blade
<x-dropdown header="User Actions">
    <x-dropdown.item href="/profile" label="View Profile" />
    <x-dropdown.item href="/edit" label="Edit Profile" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/logout" label="Sign Out" />
</x-dropdown>
```

### Dropdown with Custom Position
```blade
<x-dropdown position="left">
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Vertical Icon
```blade
<x-dropdown vertical>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Dropend (Right Side)
```blade
<x-dropdown dropend>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Custom Trigger
```blade
<x-dropdown>
    <x-slot:link>
        <button class="btn btn-primary">
            <i class="icon-menu"></i>
            Actions
        </button>
    </x-slot:link>
    
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Toggle Class
```blade
<x-dropdown toggle>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Custom Auto-close
```blade
<x-dropdown auto-close="outside">
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Active Item
```blade
<x-dropdown>
    <x-dropdown.item href="/dashboard" label="Dashboard" />
    <x-dropdown.item href="/profile" label="Profile" active />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Disabled Item
```blade
<x-dropdown>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" disabled />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Dropdown with Icons
```blade
<x-dropdown>
    <x-dropdown.item href="/profile" label="Profile" icon="user" />
    <x-dropdown.item href="/settings" label="Settings" icon="settings" />
    <x-dropdown.item href="/notifications" label="Notifications" icon="bell" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/logout" label="Logout" icon="logout" />
</x-dropdown>
```

### Dropdown with Dividers
```blade
<x-dropdown>
    <x-dropdown.item href="/profile" label="Profile" />
    <x-dropdown.item href="/settings" label="Settings" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/help" label="Help" />
    <x-dropdown.item href="/about" label="About" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/logout" label="Logout" />
</x-dropdown>
```

### Livewire Integration
```blade
<x-dropdown>
    <x-dropdown.item 
        wire:click="editUser({{ $user->id }})"
        label="Edit User" 
        icon="edit" />
    <x-dropdown.item 
        wire:click="deleteUser({{ $user->id }})"
        label="Delete User" 
        icon="trash" />
    <x-dropdown.item divider />
    <x-dropdown.item 
        wire:click="exportUser({{ $user->id }})"
        label="Export Data" 
        icon="download" />
</x-dropdown>
```

### Dropdown with Complex Items
```blade
<x-dropdown>
    <x-dropdown.item href="/profile">
        <div class="d-flex align-items-center">
            <img src="{{ $user->avatar }}" class="rounded-circle me-2" width="24" height="24">
            <div>
                <div class="fw-bold">{{ $user->name }}</div>
                <small class="text-muted">{{ $user->email }}</small>
            </div>
        </div>
    </x-dropdown.item>
    
    <x-dropdown.item divider />
    
    <x-dropdown.item href="/settings" label="Settings" icon="settings" />
    <x-dropdown.item href="/logout" label="Logout" icon="logout" />
</x-dropdown>
```

## Features

### Positioning Options
- **Right (`position="right"`):** Default right-aligned menu
- **Left (`position="left"`):** Left-aligned menu
- **Dropend (`dropend`):** Menu drops to the right side
- **Custom Positions:** Additional Bootstrap positioning classes

### Trigger Options
- **Icon Triggers:** Custom icon with optional label
- **Vertical Icons:** Vertical dots for compact triggers
- **Custom Triggers:** Custom link/button triggers
- **Toggle Class:** Bootstrap dropdown-toggle styling

### Menu Behavior
- **Auto-close:** Configurable auto-close behavior
- **Always Visible:** Menu can be always visible
- **Show by Default:** Menu can be shown initially
- **Headers:** Menu headers for organization

### Item Features
- **Icons:** Individual item icons
- **Active States:** Current item highlighting
- **Disabled States:** Disabled item styling
- **Dividers:** Visual separators between items
- **Custom Content:** Complex item content support

### Styling Options
- **Bootstrap Integration:** Full Bootstrap dropdown styling
- **Custom Classes:** Additional CSS class support
- **Inline Display:** Inline or block display options
- **Responsive Design:** Mobile-friendly dropdowns

## Common Patterns

### User Menu
```blade
<x-dropdown icon="user" label="Account">
    <x-dropdown.item href="/profile" label="My Profile" icon="user" />
    <x-dropdown.item href="/settings" label="Settings" icon="settings" />
    <x-dropdown.item href="/notifications" label="Notifications" icon="bell" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/help" label="Help" icon="help" />
    <x-dropdown.item href="/logout" label="Sign Out" icon="logout" />
</x-dropdown>
```

### Action Menu
```blade
<x-dropdown vertical>
    <x-dropdown.item 
        wire:click="editItem({{ $item->id }})"
        label="Edit" 
        icon="edit" />
    <x-dropdown.item 
        wire:click="duplicateItem({{ $item->id }})"
        label="Duplicate" 
        icon="copy" />
    <x-dropdown.item divider />
    <x-dropdown.item 
        wire:click="deleteItem({{ $item->id }})"
        label="Delete" 
        icon="trash" />
</x-dropdown>
```

### Filter Menu
```blade
<x-dropdown icon="filter" label="Filter">
    <x-dropdown.item href="?status=active" label="Active" />
    <x-dropdown.item href="?status=inactive" label="Inactive" />
    <x-dropdown.item href="?status=pending" label="Pending" />
    <x-dropdown.item divider />
    <x-dropdown.item href="?status=all" label="Show All" />
</x-dropdown>
```

### Export Menu
```blade
<x-dropdown icon="download" label="Export">
    <x-dropdown.item 
        wire:click="exportPDF"
        label="Export as PDF" 
        icon="file-pdf" />
    <x-dropdown.item 
        wire:click="exportExcel"
        label="Export as Excel" 
        icon="file-excel" />
    <x-dropdown.item 
        wire:click="exportCSV"
        label="Export as CSV" 
        icon="file-csv" />
</x-dropdown>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'dropdown' => [
        'view' => 'laravel-components::{framework}.dropdown.index',
    ],
    'dropdown.action' => [
        'view' => 'laravel-components::{framework}.dropdown.action',
    ],
    'dropdown.menu' => [
        'view' => 'laravel-components::{framework}.dropdown.menu',
    ],
    'dropdown.item' => [
        'view' => 'laravel-components::{framework}.dropdown.item',
    ],
],
```

## JavaScript Integration

### Custom Dropdown Behavior
```javascript
// Custom dropdown initialization
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all dropdowns
    const dropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');
    
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            // Custom dropdown logic
            const menu = this.nextElementSibling;
            
            if (menu.classList.contains('show')) {
                menu.classList.remove('show');
            } else {
                // Close other dropdowns
                document.querySelectorAll('.dropdown-menu.show').forEach(openMenu => {
                    openMenu.classList.remove('show');
                });
                
                menu.classList.add('show');
            }
            
            e.preventDefault();
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
});
```

### Dropdown with Custom Events
```javascript
// Dropdown with custom event handling
function initializeCustomDropdown() {
    const dropdown = document.querySelector('#custom-dropdown');
    const menu = dropdown.querySelector('.dropdown-menu');
    
    dropdown.addEventListener('show.bs.dropdown', function() {
        console.log('Dropdown opening');
        // Custom logic before dropdown opens
    });
    
    dropdown.addEventListener('shown.bs.dropdown', function() {
        console.log('Dropdown opened');
        // Custom logic after dropdown opens
    });
    
    dropdown.addEventListener('hide.bs.dropdown', function() {
        console.log('Dropdown closing');
        // Custom logic before dropdown closes
    });
    
    dropdown.addEventListener('hidden.bs.dropdown', function() {
        console.log('Dropdown closed');
        // Custom logic after dropdown closes
    });
}
```

### Dropdown Item Actions
```javascript
// Handle dropdown item clicks
document.addEventListener('click', function(e) {
    if (e.target.closest('.dropdown-item')) {
        const item = e.target.closest('.dropdown-item');
        const action = item.dataset.action;
        const itemId = item.dataset.id;
        
        switch(action) {
            case 'edit':
                editItem(itemId);
                break;
            case 'delete':
                deleteItem(itemId);
                break;
            case 'duplicate':
                duplicateItem(itemId);
                break;
            default:
                // Handle default link navigation
                break;
        }
    }
});

function editItem(id) {
    // Custom edit logic
    console.log('Editing item:', id);
}

function deleteItem(id) {
    // Custom delete logic
    if (confirm('Are you sure you want to delete this item?')) {
        console.log('Deleting item:', id);
    }
}

function duplicateItem(id) {
    // Custom duplicate logic
    console.log('Duplicating item:', id);
}
```

## Accessibility

### ARIA Attributes
- Proper dropdown role and aria-expanded attributes
- Keyboard navigation support
- Screen reader friendly structure
- Focus management

### Best Practices
- Use descriptive labels for dropdown triggers
- Provide keyboard navigation
- Ensure sufficient color contrast
- Test with screen readers
- Support keyboard-only navigation

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Bootstrap JavaScript
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Dropdown Not Opening
**Problem:** Dropdown menu doesn't appear
**Solution:** Ensure Bootstrap JavaScript is loaded and data-bs-toggle is present

#### Menu Positioning Issues
**Problem:** Menu appears in wrong position
**Solution:** Check position attribute and Bootstrap positioning classes

#### Auto-close Not Working
**Problem:** Dropdown doesn't close automatically
**Solution:** Verify autoClose attribute and Bootstrap configuration

#### Styling Issues
**Problem:** Dropdown doesn't look like expected
**Solution:** Ensure Bootstrap CSS is loaded and check custom classes

## Related Components

- **Nav:** Main navigation component
- **Breadcrumb:** Navigation breadcrumbs
- **Button:** Button components
- **Link:** Link component used internally

## Performance Considerations

- Lazy load dropdown content when possible
- Optimize dropdown positioning calculations
- Consider dropdown size for mobile devices
- Cache dropdown state when appropriate

## Examples Gallery

### Admin Dashboard Actions
```blade
<x-dropdown vertical>
    <x-dropdown.item 
        wire:click="viewUser({{ $user->id }})"
        label="View Details" 
        icon="eye" />
    <x-dropdown.item 
        wire:click="editUser({{ $user->id }})"
        label="Edit User" 
        icon="edit" />
    <x-dropdown.item 
        wire:click="resetPassword({{ $user->id }})"
        label="Reset Password" 
        icon="key" />
    <x-dropdown.item divider />
    <x-dropdown.item 
        wire:click="suspendUser({{ $user->id }})"
        label="Suspend User" 
        icon="pause" />
    <x-dropdown.item 
        wire:click="deleteUser({{ $user->id }})"
        label="Delete User" 
        icon="trash" />
</x-dropdown>
```

### File Management
```blade
<x-dropdown icon="file" label="File Actions">
    <x-dropdown.item href="/preview/{{ $file->id }}" label="Preview" icon="eye" />
    <x-dropdown.item href="/download/{{ $file->id }}" label="Download" icon="download" />
    <x-dropdown.item href="/share/{{ $file->id }}" label="Share" icon="share" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/rename/{{ $file->id }}" label="Rename" icon="edit" />
    <x-dropdown.item href="/move/{{ $file->id }}" label="Move" icon="folder" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/delete/{{ $file->id }}" label="Delete" icon="trash" />
</x-dropdown>
```

### E-commerce Product Actions
```blade
<x-dropdown icon="more" label="Product Actions">
    <x-dropdown.item href="/products/{{ $product->id }}" label="View Product" icon="eye" />
    <x-dropdown.item href="/products/{{ $product->id }}/edit" label="Edit Product" icon="edit" />
    <x-dropdown.item href="/products/{{ $product->id }}/variants" label="Manage Variants" icon="layers" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/products/{{ $product->id }}/images" label="Manage Images" icon="image" />
    <x-dropdown.item href="/products/{{ $product->id }}/inventory" label="Inventory" icon="package" />
    <x-dropdown.item divider />
    <x-dropdown.item href="/products/{{ $product->id }}/duplicate" label="Duplicate" icon="copy" />
    <x-dropdown.item href="/products/{{ $product->id }}/delete" label="Delete" icon="trash" />
</x-dropdown>
```

## Changelog

### Version 2.0.0
- Added multiple positioning options
- Enhanced trigger customization
- Improved accessibility features
- Added Livewire integration support

## Contributing

To contribute to this component:
1. Update the view files in `resources/views/bootstrap-5/dropdown/`
2. Add/update tests in `tests/Components/DropdownTest.php`
3. Update this documentation
