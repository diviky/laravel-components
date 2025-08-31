# Form Select Component

A comprehensive and flexible select dropdown component that supports single/multiple selection, option groups, data binding, and advanced features like search and custom styling. This component serves as the foundation for all select-based form inputs.

## Overview

**Component Type:** Base Form Select  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** `diviky/laravel-form-components` for base functionality  
**Location:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-select.blade.php`

## Files

- **PHP Class:** `Diviky\LaravelFormComponents\Components\FormSelect`
- **View File:** `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-select.blade.php`
- **Documentation:** `docs/form-select.md`
- **Tests:** `tests/Components/FormSelectTest.php`

## Related Components

This package also provides these select-related components:

- **Form Select Group** (`x-form-select-group`) - Checkbox/radio group component
- **Form Select Item** (`x-form-select-item`) - Individual select item
- **Form Choices** (`x-form-choices`) - Advanced select with search and multiple selection

## Basic Usage

```blade
<x-form-select name="country" label="Country" :options="['us' => 'United States', 'uk' => 'United Kingdom']" placeholder="Select country" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Select field name (required) | `'country'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Select label text | `'Country'` |
| options | array\|Collection | [] | Options array or collection | `['us' => 'United States']` |
| value | mixed | null | Initial selected value(s) | `'us'` or `['us', 'uk']` |
| bind | mixed | null | Model to bind values from | `$user` |
| bindKey | string | '' | Key to bind from model | `'country_id'` |
| default | mixed | null | Default value if no binding | `'us'` |
| multiple | boolean | false | Allow multiple selection | `true` |
| placeholder | string | '' | Placeholder text | `'Select country'` |
| required | boolean | false | Whether field is required | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| size | string | null | Select size variant | `'sm'`, `'lg'` |
| icon | string | null | Icon name to display | `'chevron-down'` |
| floating | boolean | false | Use floating label style | `true` |
| flat | boolean | false | Use flat input group style | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| plugin | boolean | true | Enable select plugin (select2/choices) | `false` |
| help | string | null | Help text below select | `'Choose your country'` |
| id | string | auto-generated | Select ID attribute | `'country-select'` |
| title | string | null | Title attribute for tooltip | `'Select your country'` |
| class | string | null | Additional CSS classes | `'custom-select'` |
| wire:model | string | null | Livewire model binding | `'selectedCountry'` |

### Field Mapping Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| valueField | string | 'id' | Field to use as option value | `'code'` |
| labelField | string | 'text' | Field to use as option label | `'name'` |
| disabledField | string | 'disabled' | Field to check for disabled options | `'is_disabled'` |
| childrenField | string | 'children' | Field for option group children | `'options'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| showErrors | boolean | true | Show validation errors | `false` |
| extra-attributes | string | null | Additional HTML attributes | `'data-custom="value"'` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| autocomplete | string | null | Autocomplete attribute | `'country-name'` |
| autofocus | boolean | false | Autofocus the select | `true` |
| form | string | null | Form ID to associate with | `'user-form'` |
| tabindex | string | null | Tab index | `'0'` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to select | `<x-slot name="prepend">Country:</x-slot>` |
| append | Content to append to select | `<x-slot name="append"><button>+</button></x-slot>` |
| before | Content before select options | `<x-slot name="before"><option>-- Select --</option></x-slot>` |
| after | Content after select options | `<x-slot name="after"><option>Other</option></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |
| icon | Custom icon slot | `<x-slot name="icon"><x-icon name="custom" /></x-slot>` |

## Usage Examples

### Basic Select
```blade
<x-form-select 
    name="country" 
    label="Country" 
    :options="['us' => 'United States', 'uk' => 'United Kingdom']" 
    placeholder="Select country" 
/>
```

### Select with Collection
```blade
<x-form-select 
    name="user_id" 
    label="User" 
    :options="$users" 
    placeholder="Select user" 
    value-field="id" 
    label-field="name" 
/>
```

### Multiple Selection
```blade
<x-form-select 
    name="skills[]" 
    label="Skills" 
    :options="$skills" 
    multiple 
    placeholder="Select skills" 
/>
```

### Select with Option Groups
```blade
<x-form-select 
    name="timezone" 
    label="Timezone" 
    :options="$timezones" 
    placeholder="Select timezone" 
/>
```

### Select with Custom Fields
```blade
<x-form-select 
    name="product" 
    label="Product" 
    :options="$products" 
    value-field="sku" 
    label-field="name" 
    placeholder="Select product" 
/>
```

### Floating Label
```blade
<x-form-select 
    name="category" 
    label="Category" 
    :options="$categories" 
    floating 
/>
```

### Disabled Options
```blade
<x-form-select 
    name="plan" 
    label="Plan" 
    :options="$plans" 
    disabled-field="unavailable" 
/>
```

### With Icon
```blade
<x-form-select 
    name="status" 
    label="Status" 
    :options="$statuses" 
    icon="flag" 
/>
```

### With Prepend/Append
```blade
<x-form-select name="currency" label="Price">
    <x-slot name="prepend">$</x-slot>
    <x-slot name="append">USD</x-slot>
    @foreach($currencies as $code => $name)
        <option value="{{ $code }}">{{ $name }}</option>
    @endforeach
</x-form-select>
```

### Livewire Integration
```blade
<x-form-select 
    name="report" 
    label="Report" 
    wire:model.live="selectedReport" 
    :options="$reports" 
/>
```

### Different Sizes
```blade
<x-form-select name="small" label="Small Select" size="sm" :options="$options" />
<x-form-select name="normal" label="Normal Select" :options="$options" />
<x-form-select name="large" label="Large Select" size="lg" :options="$options" />
```

### Without Plugin Enhancement
```blade
<x-form-select 
    name="simple" 
    label="Simple Select" 
    :options="$options" 
    :plugin="false" 
/>
```

### Select with Validation
```blade
<x-form-select 
    name="country" 
    label="Country" 
    :options="$countries" 
    required 
    pattern="[A-Z]{2}"
    title="Please select a valid country"
/>
```

### Select with Custom Help Slot
```blade
<x-form-select name="plan" label="Subscription Plan" :options="$plans">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>Choose the plan that best fits your needs</span>
        </div>
    </x-slot>
</x-form-select>
```

## Real Project Examples

### User Registration Form
```blade
<x-form action="{{ route('users.store') }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="first_name" label="First Name" required />
        </div>
        <div class="col-md-6">
            <x-form-input name="last_name" label="Last Name" required />
        </div>
    </div>
    
    <x-form-input type="email" name="email" label="Email" required />
    
    <div class="row">
        <div class="col-md-6">
            <x-form-select 
                name="role" 
                label="Role" 
                :options="$roles" 
                required 
                placeholder="Select role"
            />
        </div>
        <div class="col-md-6">
            <x-form-select 
                name="department" 
                label="Department" 
                :options="$departments" 
                placeholder="Select department"
            />
        </div>
    </div>
    
    <x-form-select 
        name="skills[]" 
        label="Skills" 
        :options="$skills" 
        multiple 
        placeholder="Select skills"
        help="Hold Ctrl/Cmd to select multiple skills"
    />
    
    <x-form-submit>Create User</x-form-submit>
</x-form>
```

### Search Filter
```blade
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <x-form-select name="filter[status]">
                    <option value="">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="pending">Pending</option>
                </x-form-select>
            </div>
            <div class="col-md-4">
                <x-form-select name="filter[category]" :options="$categories">
                    <option value="">All Categories</option>
                </x-form-select>
            </div>
            <div class="col-md-4">
                <x-form-select name="filter[sort]" size="sm">
                    <option value="name">Sort by Name</option>
                    <option value="created_at">Sort by Date</option>
                    <option value="status">Sort by Status</option>
                </x-form-select>
            </div>
        </div>
    </div>
</div>
```

### Settings Form
```blade
<x-form action="{{ route('settings.update') }}" method="PUT">
    <x-form-select 
        name="timezone" 
        label="Timezone" 
        :options="$timezones" 
        :value="$settings->timezone"
        help="Choose your local timezone"
    />
    
    <x-form-select 
        name="language" 
        label="Language" 
        :options="$languages" 
        :value="$settings->language"
        value-field="code"
        label-field="name"
    />
    
    <x-form-select 
        name="currency" 
        label="Currency" 
        :options="$currencies" 
        :value="$settings->currency"
        value-field="code"
        label-field="name"
    >
        <x-slot name="prepend">💱</x-slot>
    </x-form-select>
    
    <x-form-submit>Save Settings</x-form-submit>
</x-form>
```

## Working with Collections

### Eloquent Models
```blade
<x-form-select 
    name="author_id" 
    label="Author" 
    :options="App\Models\User::all()" 
    value-field="id" 
    label-field="name" 
/>
```

### Collection with Custom Structure
```blade
<x-form-select 
    name="region" 
    label="Region" 
    :options="$regions" 
    value-field="code" 
    label-field="display_name" 
    disabled-field="is_disabled" 
/>
```

### Option Groups Structure
```blade
@php
$timezones = [
    'America' => [
        'America/New_York' => 'Eastern Time',
        'America/Chicago' => 'Central Time',
        'America/Denver' => 'Mountain Time',
        'America/Los_Angeles' => 'Pacific Time',
    ],
    'Europe' => [
        'Europe/London' => 'London',
        'Europe/Paris' => 'Paris',
        'Europe/Berlin' => 'Berlin',
    ],
    'Asia' => [
        'Asia/Tokyo' => 'Tokyo',
        'Asia/Shanghai' => 'Shanghai',
        'Asia/Dubai' => 'Dubai',
    ],
];
@endphp

<x-form-select name="timezone" label="Timezone" :options="$timezones" />
```

## Advanced Configuration

### Select2/Choices.js Integration
```blade
<x-form-select 
    name="tags" 
    label="Tags" 
    :options="$tags" 
    multiple 
    data-select 
    data-select-search="true" 
    data-select-create="true" 
/>
```

### Custom Data Attributes
```blade
<x-form-select 
    name="product" 
    label="Product" 
    :options="$products" 
    data-price-field="price" 
    data-category-field="category" 
/>
```

### AJAX Loading
```blade
<x-form-select 
    name="users" 
    label="Users" 
    data-fetch="{{ route('api.users.search') }}"
    data-method="POST"
    :form-data="['department' => 'sales']"
    placeholder="Search users..."
/>
```

## Option Data Structure

### Simple Array
```php
$options = [
    'value1' => 'Label 1',
    'value2' => 'Label 2',
];
```

### Collection/Array with Objects
```php
$options = [
    ['id' => 1, 'name' => 'Option 1'],
    ['id' => 2, 'name' => 'Option 2'],
];
```

### Option Groups
```php
$options = [
    'Group 1' => [
        'value1' => 'Option 1',
        'value2' => 'Option 2',
    ],
    'Group 2' => [
        'value3' => 'Option 3',
        'value4' => 'Option 4',
    ],
];
```

### With Disabled Options
```php
$options = [
    ['id' => 1, 'name' => 'Available Option', 'disabled' => false],
    ['id' => 2, 'name' => 'Disabled Option', 'disabled' => true],
];
```

## Related Components

### Form Select Group
A checkbox/radio group component for multiple selection:

```blade
<x-form-select-group name="permissions" label="Permissions" :options="$permissions" type="checkbox">
    <x-slot name="help">Select all permissions for this role</x-slot>
</x-form-select-group>
```

### Form Select Item
Individual select item component:

```blade
<x-form-select-item name="plan" value="basic" label="Basic Plan" />
<x-form-select-item name="plan" value="pro" label="Pro Plan" />
<x-form-select-item name="plan" value="enterprise" label="Enterprise Plan" />
```

### Form Choices
Advanced select with search and multiple selection:

```blade
<x-form-choices 
    name="users" 
    label="Select Users" 
    :options="$users" 
    multiple 
    searchable 
    placeholder="Search users..."
/>
```

## Features

### Form Integration
- **Automatic Validation**: Integrates with Laravel's validation system
- **Error Display**: Shows validation errors with proper styling
- **CSRF Protection**: Automatically includes CSRF tokens
- **Method Spoofing**: Supports PUT, PATCH, DELETE methods

### Styling Options
- **Size Variants**: `sm`, `lg` for different select sizes
- **Floating Labels**: Modern floating label design
- **Flat Style**: Alternative flat input group styling
- **Icon Support**: Built-in icon display with `x-icon`
- **Custom Classes**: Additional CSS class support

### Interactive Features
- **Livewire Integration**: Full Livewire model binding support
- **Real-time Validation**: Live validation with `wire:model.live`
- **Multiple Selection**: Support for multiple option selection
- **Option Groups**: Hierarchical option organization
- **Disabled Options**: Individual option disabling

### Advanced Features
- **Data Binding**: Direct model property binding
- **Custom Field Mapping**: Flexible value/label field configuration
- **Plugin Integration**: Select2/Choices.js enhancement
- **AJAX Loading**: Dynamic option loading
- **Search Functionality**: Built-in search capabilities

### Accessibility
- **ARIA Labels**: Proper accessibility labeling
- **Screen Reader Support**: Semantic HTML structure
- **Keyboard Navigation**: Full keyboard accessibility
- **Focus Management**: Proper focus handling

## Common Patterns

### Country Selection
```blade
<x-form-select 
    name="country" 
    label="Country" 
    :options="$countries" 
    value-field="code"
    label-field="name"
    placeholder="Select your country"
/>
```

### Role Assignment
```blade
<x-form-select 
    name="roles[]" 
    label="Roles" 
    :options="$roles" 
    multiple 
    placeholder="Select roles"
    help="Hold Ctrl/Cmd to select multiple roles"
/>
```

### Category Selection
```blade
<x-form-select 
    name="category_id" 
    label="Category" 
    :options="$categories" 
    :value="$product->category_id"
    required
/>
```

### Status Filter
```blade
<x-form-select name="status" size="sm">
    <option value="">All Statuses</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
</x-form-select>
```

## Configuration

### Global Configuration
The component uses the global form components configuration from `diviky/laravel-form-components`:

```php
// config/form-components.php
return [
    'framework' => 'bootstrap-5',
    'floating_labels' => false,
    'show_errors' => true,
    'default_wire' => false,
    'select_plugin' => 'choices', // or 'select2'
];
```

### Component-Specific Configuration
```php
// In your service provider
Blade::component('form-select', FormSelect::class);
```

## JavaScript Integration

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('select-updated', (data) => {
    // Handle select updates
});
```

### Custom JavaScript
```javascript
// Custom select behavior
document.querySelectorAll('[data-custom-select]').forEach(select => {
    select.addEventListener('change', function() {
        // Custom change handling
    });
});
```

### Select2 Integration
```javascript
// Initialize Select2
$('.form-select[data-select2]').select2({
    placeholder: 'Select an option',
    allowClear: true
});
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `aria-describedby` for help text
- `aria-invalid` for validation errors
- `aria-required` for required fields
- `aria-multiselectable` for multiple selection

### Keyboard Navigation
- Tab navigation through form fields
- Arrow keys for option navigation
- Enter/Space for option selection
- Escape key for closing dropdown

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: Not supported

### Feature Support
- **HTML5 Select**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Custom Properties**: Full support

## Troubleshooting

### Common Issues

**Options not displaying**
```blade
<!-- Ensure options are properly formatted -->
<x-form-select name="country" :options="['us' => 'United States']" />
```

**Multiple selection not working**
```blade
<!-- Ensure multiple attribute is set -->
<x-form-select name="skills[]" :options="$skills" multiple />
```

**Custom fields not working**
```blade
<!-- Ensure field mapping is correct -->
<x-form-select name="user" :options="$users" value-field="id" label-field="name" />
```

**Livewire binding issues**
```blade
<!-- Ensure proper wire:model syntax -->
<x-form-select name="country" wire:model="selectedCountry" :options="$countries" />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Performance

### Optimization Tips
1. **Use `plugin="false"`** for simple selects to avoid JavaScript overhead
2. **Consider lazy loading** for large option sets
3. **Use server-side filtering** for very large datasets
4. **Cache option data** when appropriate

### Bundle Size
- **Base Component**: ~3KB
- **With Plugin**: ~15KB
- **With Search**: ~20KB
- **Full Package**: ~25KB

## Examples Gallery

### Basic Selects
```blade
<!-- Simple Select -->
<x-form-select name="country" label="Country" :options="$countries" />

<!-- Multiple Select -->
<x-form-select name="skills[]" label="Skills" :options="$skills" multiple />

<!-- With Placeholder -->
<x-form-select name="category" label="Category" :options="$categories" placeholder="Choose category" />

<!-- Required Select -->
<x-form-select name="role" label="Role" :options="$roles" required />
```

### Advanced Selects
```blade
<!-- With Icon -->
<x-form-select name="status" label="Status" :options="$statuses" icon="flag" />

<!-- Floating Label -->
<x-form-select name="timezone" label="Timezone" :options="$timezones" floating />

<!-- With Help -->
<x-form-select name="plan" label="Plan" :options="$plans" help="Choose your subscription plan" />

<!-- Livewire Select -->
<x-form-select name="filter" wire:model.live="selectedFilter" :options="$filters" />
```

## Changelog

### Version 2.0
- Added floating label support
- Enhanced Livewire integration
- Improved accessibility features
- Added custom field mapping

### Version 1.0
- Initial release
- Basic select functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form Select component:

1. **Test all option formats** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License. 
