# View Number Component

A sophisticated and feature-rich number display component that provides enhanced numeric rendering with optional icons, labels, copy-to-clipboard functionality, and multiple formatting options. This component offers professional number display with enhanced user experience and flexible formatting capabilities.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, Laravel Number helper
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/number.blade.php`
- **Tests:** `tests/Components/ViewNumberTest.php` (to be created)
- **Documentation:** `docs/view-number.md`

## Basic Usage

### Simple Number Display
```blade
<x-view-number value="1234.56" />
```

### With Label
```blade
<x-view-number value="1234.56" label="Total: " />
```

### With Icon
```blade
<x-view-number value="1234.56" icon="calculator" />
```

### With Copy Functionality
```blade
<x-view-number value="1234.56" copy />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | numeric | Number value to display | `1234.56`, `1000000`, `0.75` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the number | `'calculator'`, `'chart'`, `'trending-up'` |
| label | string | null | Label text to display before the number | `'Total: '`, `'Count: '`, `'Amount: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['format' => 'percent']` |
| format | string | null | Number formatting type | `'percent'`, `'abbreviate'`, `'number'`, `'currency'`, `'normal'` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'number-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="number-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Number Display
**Usage:** `<x-view-number value="1234.56">` (default)
**Description:** Basic number display with automatic formatting
**Features:**
- Automatic number formatting
- Clean, minimal styling
- Responsive design
- Professional appearance

### Labeled Number Display
**Usage:** `<x-view-number value="1234.56" label="Total: ">`
**Description:** Number display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon Number Display
**Usage:** `<x-view-number value="1234.56" icon="calculator">`
**Description:** Number display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Number Display
**Usage:** `<x-view-number value="1234.56" copy>`
**Description:** Number display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Formatted Number Display
**Usage:** `<x-view-number value="0.75" format="percent">`
**Description:** Number display with specific formatting
**Features:**
- Multiple format options
- Professional formatting
- Enhanced readability
- Flexible display options

## Number Formatting Options

### Available Formats

| Format | Description | Example Input | Example Output |
|--------|-------------|---------------|----------------|
| `percent` | Percentage format | `0.75` | `75%` |
| `abbreviate` | Abbreviated format | `1000000` | `1M` |
| `number` | Formatted number | `1234.56` | `1,234.56` |
| `currency` | Currency format | `1234.56` | `$1,234.56` |
| `normal` | Raw number | `1234.56` | `1234.56` |

### Default Formatting
When no format is specified, the component automatically uses Laravel's `Number::format()` method for optimal display.

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Number content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-number value="1234.56">
    Additional Content
</x-view-number>
```

## Usage Examples

### Basic Number Display
```blade
<x-view-number value="1234.56" />
```

### Number with Label
```blade
<x-view-number 
    value="1234.56" 
    label="Total: " />
```

### Number with Icon
```blade
<x-view-number 
    value="1234.56" 
    icon="calculator" />
```

### Number with Copy Functionality
```blade
<x-view-number 
    value="1234.56" 
    copy />
```

### Number with Percentage Format
```blade
<x-view-number 
    value="0.75" 
    format="percent" />
```

### Number with Abbreviated Format
```blade
<x-view-number 
    value="1000000" 
    format="abbreviate" />
```

### Number with Currency Format
```blade
<x-view-number 
    value="1234.56" 
    format="currency" />
```

### Number with Custom Classes
```blade
<x-view-number 
    value="1234.56" 
    class="text-primary fw-bold" />
```

### Number with Custom ID
```blade
<x-view-number 
    value="1234.56" 
    id="custom-number-id" />
```

### Number with Data Attributes
```blade
<x-view-number 
    value="1234.56" 
    data-test="number-component"
    data-type="display-number" />
```

### Number with Aria Attributes
```blade
<x-view-number 
    value="1234.56" 
    aria-label="Number display"
    aria-describedby="number-description" />
```

### Number with Role Attribute
```blade
<x-view-number 
    value="1234.56" 
    role="text" />
```

### Number with Tabindex
```blade
<x-view-number 
    value="1234.56" 
    tabindex="0" />
```

### Number with Form Attribute
```blade
<x-view-number 
    value="1234.56" 
    form="my-form" />
```

### Number with Autocomplete
```blade
<x-view-number 
    value="1234.56" 
    autocomplete="off" />
```

### Number with Novalidate
```blade
<x-view-number 
    value="1234.56" 
    novalidate />
```

### Number with Accept
```blade
<x-view-number 
    value="1234.56" 
    accept="number/*" />
```

### Number with Capture
```blade
<x-view-number 
    value="1234.56" 
    capture="environment" />
```

### Number with Max
```blade
<x-view-number 
    value="1234.56" 
    max="10000" />
```

### Number with Min
```blade
<x-view-number 
    value="1234.56" 
    min="100" />
```

### Number with Step
```blade
<x-view-number 
    value="1234.56" 
    step="100" />
```

### Number with Pattern
```blade
<x-view-number 
    value="1234.56" 
    pattern="[0-9]+" />
```

### Number with Spellcheck
```blade
<x-view-number 
    value="1234.56" 
    spellcheck="false" />
```

### Number with Translate
```blade
<x-view-number 
    value="1234.56" 
    translate="no" />
```

### Number with Contenteditable
```blade
<x-view-number 
    value="1234.56" 
    contenteditable="true" />
```

### Number with Contextmenu
```blade
<x-view-number 
    value="1234.56" 
    contextmenu="number-menu" />
```

### Number with Dir
```blade
<x-view-number 
    value="1234.56" 
    dir="rtl" />
```

### Number with Draggable
```blade
<x-view-number 
    value="1234.56" 
    draggable="true" />
```

### Number with Dropzone
```blade
<x-view-number 
    value="1234.56" 
    dropzone="copy" />
```

### Number with Hidden
```blade
<x-view-number 
    value="1234.56" 
    hidden />
```

### Number with Lang
```blade
<x-view-number 
    value="1234.56" 
    lang="en" />
```

### Number with Settings Array
```blade
<x-view-number 
    value="1234.56" 
    :settings="['format' => 'percent']" />
```

## Common Patterns

### Financial Dashboard Display
```blade
<div class="financial-dashboard-display">
    <h4>Financial Overview</h4>
    
    <x-view-number 
        value="{{ $revenue }}" 
        icon="trending-up" 
        label="Revenue: "
        format="currency" />
    
    <x-view-number 
        value="{{ $growth_rate }}" 
        icon="chart-line" 
        label="Growth: "
        format="percent" />
    
    <x-view-number 
        value="{{ $total_customers }}" 
        icon="users" 
        label="Customers: "
        format="abbreviate" />
    
    <x-view-number 
        value="{{ $profit_margin }}" 
        icon="target" 
        label="Profit Margin: "
        format="percent" />
</div>
```

### Analytics Dashboard Interface
```blade
<div class="analytics-dashboard-interface">
    <h4>Analytics Summary</h4>
    
    <x-view-number 
        value="{{ $page_views }}" 
        icon="eye" 
        label="Page Views: "
        format="abbreviate" />
    
    <x-view-number 
        value="{{ $conversion_rate }}" 
        icon="target" 
        label="Conversion Rate: "
        format="percent" />
    
    <x-view-number 
        value="{{ $bounce_rate }}" 
        icon="arrow-down" 
        label="Bounce Rate: "
        format="percent" />
    
    <x-view-number 
        value="{{ $avg_session_duration }}" 
        icon="clock" 
        label="Avg Session: "
        format="number" />
</div>
```

### Inventory Management Interface
```blade
<div class="inventory-management-interface">
    <h4>Inventory Status</h4>
    
    <x-view-number 
        value="{{ $total_items }}" 
        icon="package" 
        label="Total Items: "
        format="number" />
    
    <x-view-number 
        value="{{ $low_stock_threshold }}" 
        icon="alert-triangle" 
        label="Low Stock Alert: "
        format="number" />
    
    <x-view-number 
        value="{{ $stock_utilization }}" 
        icon="activity" 
        label="Stock Utilization: "
        format="percent" />
    
    <x-view-number 
        value="{{ $inventory_value }}" 
        icon="dollar-sign" 
        label="Inventory Value: "
        format="currency" />
</div>
```

### Performance Metrics Display
```blade
<div class="performance-metrics-display">
    <h4>Performance Metrics</h4>
    
    <x-view-number 
        value="{{ $cpu_usage }}" 
        icon="cpu" 
        label="CPU Usage: "
        format="percent" />
    
    <x-view-number 
        value="{{ $memory_usage }}" 
        icon="memory" 
        label="Memory Usage: "
        format="percent" />
    
    <x-view-number 
        value="{{ $disk_usage }}" 
        icon="hard-drive" 
        label="Disk Usage: "
        format="percent" />
    
    <x-view-number 
        value="{{ $response_time }}" 
        icon="clock" 
        label="Response Time: "
        format="number" />
</div>
```

### Sales Report Interface
```blade
<div class="sales-report-interface">
    <h4>Sales Report</h4>
    
    <x-view-number 
        value="{{ $monthly_sales }}" 
        icon="shopping-cart" 
        label="Monthly Sales: "
        format="currency" />
    
    <x-view-number 
        value="{{ $sales_growth }}" 
        icon="trending-up" 
        label="Sales Growth: "
        format="percent" />
    
    <x-view-number 
        value="{{ $total_orders }}" 
        icon="package" 
        label="Total Orders: "
        format="abbreviate" />
    
    <x-view-number 
        value="{{ $average_order_value }}" 
        icon="dollar-sign" 
        label="Avg Order Value: "
        format="currency" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_number_with_basic_value()
{
    $view = $this->blade('<x-view-number value="1234.56" />');
    
    $view->assertSee('1,234.56');
}

/** @test */
public function it_renders_view_number_with_label()
{
    $view = $this->blade('<x-view-number value="1234.56" label="Total: " />');
    
    $view->assertSee('1,234.56');
    $view->assertSee('Total: ');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewNumberComponent::class)
        ->assertSee('<x-view-number')
        ->set('value', 1234.56)
        ->assertSee('1,234.56');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to number elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to number elements

### Keyboard Navigation
- Tab navigation to number
- Copy functionality accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Number context communication
- Icon description support
- Copy functionality announcement

### Number Accessibility
- Clear number purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Number display with HTML output

## Troubleshooting

### Common Issues

#### Number Not Displaying
**Problem:** Number value not showing
**Solution:** Check if value attribute is set and not null

#### Formatting Not Working
**Problem:** Number formatting not applying correctly
**Solution:** Check format attribute and ensure Laravel Number helper is available

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Number doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with number display functionality
- Multiple formatting options (percent, abbreviate, number, currency, normal)
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/number.blade.php`
2. Add/update tests in `tests/Components/ViewNumberTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [Icon Component](../icon.md)
- [Number Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Number Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
