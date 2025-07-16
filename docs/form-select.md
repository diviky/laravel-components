# Form Select Component

A flexible select dropdown component that supports single/multiple selection, option groups, and various data sources.

## View File

Location: `vendor/diviky/laravel-form-components/resources/views/bootstrap-5/form-select.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Label text for the select | 'Country' |
| name | string | required | Select name attribute | 'country' |
| options | array\|Collection | [] | Options array or collection | ['us' => 'United States', 'uk' => 'United Kingdom'] |
| value | mixed | null | Initial selected value(s) | 'us' or ['us', 'uk'] |
| bind | mixed | null | Model to bind values from | $user |
| bindKey | string | '' | Key to bind from model | 'country_id' |
| default | mixed | null | Default value if no binding | 'us' |
| multiple | boolean | false | Allow multiple selection | true |
| placeholder | string | '' | Placeholder text | 'Select country' |
| required | boolean | false | Whether the field is required | true |
| disabled | boolean | false | Whether the field is disabled | true |
| size | string | '' | Select size | 'sm', 'lg' |
| icon | string | null | Icon name to display | 'chevron-down' |
| floating | boolean | false | Use floating label style | true |
| flat | boolean | false | Use flat input group style | true |
| inline | boolean | false | Display inline | true |
| plugin | boolean | true | Enable select plugin (select2/choices) | false |
| help | string | null | Help text to display | 'Choose your country' |
| id | string | auto | Select ID attribute | 'country-select' |
| title | string | null | Title attribute for tooltip | 'Select your country' |
| class | string | null | Additional CSS classes | 'custom-select' |
| wire:model | string | null | Livewire model binding | 'selectedCountry' |
| valueField | string | 'id' | Field to use as option value | 'code' |
| labelField | string | 'text' | Field to use as option label | 'name' |
| disabledField | string | 'disabled' | Field to check for disabled options | 'is_disabled' |
| childrenField | string | 'children' | Field for option group children | 'options' |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

## Slot Properties

| Slot | Description | Example |
|------|-------------|---------|
| prepend | Content to prepend to select | `<x-slot name="prepend">Country:</x-slot>` |
| append | Content to append to select | `<x-slot name="append"><button>+</button></x-slot>` |
| before | Content before select options | `<x-slot name="before"><option>-- Select --</option></x-slot>` |
| after | Content after select options | `<x-slot name="after"><option>Other</option></x-slot>` |
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |

## Usage Examples

### Basic Select
```blade
<x-form-select name="country" label="Country" :options="['us' => 'United States', 'uk' => 'United Kingdom']" placeholder="Select country" />
```

### Select with Collection
```blade
<x-form-select name="user_id" label="User" :options="$users" placeholder="Select user" value-field="id" label-field="name" />
```

### Multiple Selection
```blade
<x-form-select name="skills[]" label="Skills" :options="$skills" multiple placeholder="Select skills" />
```

### Select with Option Groups
```blade
<x-form-select name="timezone" label="Timezone" :options="$timezones" placeholder="Select timezone" />
```

### Select with Custom Fields
```blade
<x-form-select name="product" label="Product" :options="$products" 
    value-field="sku" label-field="name" placeholder="Select product" />
```

### Floating Label
```blade
<x-form-select name="category" label="Category" :options="$categories" floating />
```

### Disabled Options
```blade
<x-form-select name="plan" label="Plan" :options="$plans" disabled-field="unavailable" />
```

### With Icon
```blade
<x-form-select name="status" label="Status" :options="$statuses" icon="flag" />
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
<x-form-select name="report" label="Report" wire:model.live="selectedReport" :options="$reports" />
```

### Different Sizes
```blade
<x-form-select name="small" label="Small Select" size="sm" :options="$options" />
<x-form-select name="normal" label="Normal Select" :options="$options" />
<x-form-select name="large" label="Large Select" size="lg" :options="$options" />
```

### Without Plugin Enhancement
```blade
<x-form-select name="simple" label="Simple Select" :options="$options" :plugin="false" />
```

## Real Project Examples

### From SMS Notification Form
```blade
<x-form-select name="report" required label="Report" wire:model.live="report" :options="$this->reports"
    placeholder="Choose Report" value-field="name" label-field="title" />
```

### From SMS Sender Form
```blade
<x-form-select name="country_code" label="Sender Country" :options="$countries" placeholder="Select Country" />
<x-form-select name="service" label="Service" :options="$services" placeholder="Select Service" />
```

### From Search Filter
```blade
<x-form-select name="dfilter[search]">
    <option value="">All</option>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
</x-form-select>
```

## Working with Collections

### Eloquent Models
```blade
<x-form-select name="author_id" label="Author" :options="App\Models\User::all()" 
    value-field="id" label-field="name" />
```

### Collection with Custom Structure
```blade
<x-form-select name="region" label="Region" :options="$regions" 
    value-field="code" label-field="display_name" disabled-field="is_disabled" />
```

## Advanced Configuration

### Select2/Choices.js Integration
```blade
<x-form-select name="tags" label="Tags" :options="$tags" multiple 
    data-select data-select-search="true" data-select-create="true" />
```

### Custom Data Attributes
```blade
<x-form-select name="product" label="Product" :options="$products" 
    data-price-field="price" data-category-field="category" />
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

- [Form Label](form-label.md) - Used internally for labels
- [Form Errors](form-errors.md) - Used internally for error display
- [Form Input Group](form-input-group.md) - Used for prepend/append
- [Icon](icon.md) - Used for select icons
- [Help](help.md) - Used for help text display

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-select name="country" label="Country" :options="$countries" required />
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-select` - Base select styling
- `form-select-sm` - Small size styling
- `form-select-lg` - Large size styling
- `is-invalid` - Error state styling
- `input-group` - Input group wrapper (with prepend/append)
- `form-floating` - Floating label styling

## JavaScript Integration

The component can be enhanced with JavaScript libraries:

- **Select2**: Use `data-select` attribute
- **Choices.js**: Use `data-select` attribute
- **Custom**: Add event listeners to the select element

## Performance Notes

- Use `plugin="false"` for simple selects to avoid JavaScript overhead
- Consider lazy loading for large option sets
- Use server-side filtering for very large datasets 
