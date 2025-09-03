# View Currency Component

A sophisticated and feature-rich currency display component that provides enhanced monetary value rendering with optional icons, labels, copy-to-clipboard functionality, and professional currency formatting. This component offers professional currency display with enhanced user experience and Laravel Number helper integration.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, Laravel Number helper
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/currency.blade.php`
- **Tests:** `tests/Components/ViewCurrencyTest.php` (to be created)
- **Documentation:** `docs/view-currency.md`

## Basic Usage

### Simple Currency Display
```blade
<x-view-currency value="1234.56" />
```

### With Label
```blade
<x-view-currency value="1234.56" label="Total: " />
```

### With Icon
```blade
<x-view-currency value="1234.56" icon="dollar-sign" />
```

### With Copy Functionality
```blade
<x-view-currency value="1234.56" copy />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | numeric | Currency value to display | `1234.56`, `1000000`, `0.99` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the currency | `'dollar-sign'`, `'euro'`, `'pound'`, `'credit-card'` |
| label | string | null | Label text to display before the currency | `'Total: '`, `'Price: '`, `'Amount: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['locale' => 'en_US']` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'currency-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="currency-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Currency Display
**Usage:** `<x-view-currency value="1234.56">` (default)
**Description:** Basic currency display with automatic formatting
**Features:**
- Automatic currency formatting
- Clean, minimal styling
- Responsive design
- Professional appearance

### Labeled Currency Display
**Usage:** `<x-view-currency value="1234.56" label="Total: ">`
**Description:** Currency display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon Currency Display
**Usage:** `<x-view-currency value="1234.56" icon="dollar-sign">`
**Description:** Currency display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Currency Display
**Usage:** `<x-view-currency value="1234.56" copy>`
**Description:** Currency display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

## Currency Formatting

### Laravel Number Helper Integration
This component automatically uses Laravel's `Number::currency()` method for professional currency formatting, which includes:
- Proper currency symbol placement
- Thousand separators
- Decimal precision
- Locale-aware formatting
- Currency code support

### Default Formatting
The component automatically formats currency values according to the application's locale settings, providing consistent and professional currency display across the application.

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Currency content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-currency value="1234.56">
    Additional Content
</x-view-currency>
```

## Usage Examples

### Basic Currency Display
```blade
<x-view-currency value="1234.56" />
```

### Currency with Label
```blade
<x-view-currency 
    value="1234.56" 
    label="Total: " />
```

### Currency with Icon
```blade
<x-view-currency 
    value="1234.56" 
    icon="dollar-sign" />
```

### Currency with Copy Functionality
```blade
<x-view-currency 
    value="1234.56" 
    copy />
```

### Currency with Custom Classes
```blade
<x-view-currency 
    value="1234.56" 
    class="text-success fw-bold" />
```

### Currency with Custom ID
```blade
<x-view-currency 
    value="1234.56" 
    id="custom-currency-id" />
```

### Currency with Data Attributes
```blade
<x-view-currency 
    value="1234.56" 
    data-test="currency-component"
    data-type="display-currency" />
```

### Currency with Aria Attributes
```blade
<x-view-currency 
    value="1234.56" 
    aria-label="Currency display"
    aria-describedby="currency-description" />
```

### Currency with Role Attribute
```blade
<x-view-currency 
    value="1234.56" 
    role="text" />
```

### Currency with Tabindex
```blade
<x-view-currency 
    value="1234.56" 
    tabindex="0" />
```

### Currency with Form Attribute
```blade
<x-view-currency 
    value="1234.56" 
    form="my-form" />
```

### Currency with Autocomplete
```blade
<x-view-currency 
    value="1234.56" 
    autocomplete="off" />
```

### Currency with Novalidate
```blade
<x-view-currency 
    value="1234.56" 
    novalidate />
```

### Currency with Accept
```blade
<x-view-currency 
    value="1234.56" 
    accept="currency/*" />
```

### Currency with Capture
```blade
<x-view-currency 
    value="1234.56" 
    capture="environment" />
```

### Currency with Max
```blade
<x-view-currency 
    value="1234.56" 
    max="10000" />
```

### Currency with Min
```blade
<x-view-currency 
    value="1234.56" 
    min="100" />
```

### Currency with Step
```blade
<x-view-currency 
    value="1234.56" 
    step="100" />
```

### Currency with Pattern
```blade
<x-view-currency 
    value="1234.56" 
    pattern="[0-9]+" />
```

### Currency with Spellcheck
```blade
<x-view-currency 
    value="1234.56" 
    spellcheck="false" />
```

### Currency with Translate
```blade
<x-view-currency 
    value="1234.56" 
    translate="no" />
```

### Currency with Contenteditable
```blade
<x-view-currency 
    value="1234.56" 
    contenteditable="true" />
```

### Currency with Contextmenu
```blade
<x-view-currency 
    value="1234.56" 
    contextmenu="currency-menu" />
```

### Currency with Dir
```blade
<x-view-currency 
    value="1234.56" 
    dir="rtl" />
```

### Currency with Draggable
```blade
<x-view-currency 
    value="1234.56" 
    draggable="true" />
```

### Currency with Dropzone
```blade
<x-view-currency 
    value="1234.56" 
    dropzone="copy" />
```

### Currency with Hidden
```blade
<x-view-currency 
    value="1234.56" 
    hidden />
```

### Currency with Lang
```blade
<x-view-currency 
    value="1234.56" 
    lang="en" />
```

### Currency with Settings Array
```blade
<x-view-currency 
    value="1234.56" 
    :settings="['locale' => 'en_US']" />
```

## Common Patterns

### E-commerce Product Display
```blade
<div class="ecommerce-product-display">
    <h4>Product Pricing</h4>
    
    <x-view-currency 
        value="{{ $product->price }}" 
        icon="tag" 
        label="Price: " />
    
    <x-view-currency 
        value="{{ $product->compare_price }}" 
        icon="scissors" 
        label="Compare at: "
        class="text-muted text-decoration-line-through" />
    
    <x-view-currency 
        value="{{ $product->sale_price }}" 
        icon="trending-down" 
        label="Sale Price: "
        class="text-danger fw-bold" />
    
    <x-view-currency 
        value="{{ $product->cost }}" 
        icon="dollar-sign" 
        label="Cost: "
        class="text-muted" />
</div>
```

### Financial Dashboard Interface
```blade
<div class="financial-dashboard-interface">
    <h4>Financial Overview</h4>
    
    <x-view-currency 
        value="{{ $revenue }}" 
        icon="trending-up" 
        label="Revenue: "
        class="text-success" />
    
    <x-view-currency 
        value="{{ $expenses }}" 
        icon="trending-down" 
        label="Expenses: "
        class="text-danger" />
    
    <x-view-currency 
        value="{{ $profit }}" 
        icon="target" 
        label="Profit: "
        class="text-primary fw-bold" />
    
    <x-view-currency 
        value="{{ $cash_flow }}" 
        icon="activity" 
        label="Cash Flow: "
        class="text-info" />
</div>
```

### Invoice Display Interface
```blade
<div class="invoice-display-interface">
    <h4>Invoice Summary</h4>
    
    <x-view-currency 
        value="{{ $invoice->subtotal }}" 
        icon="calculator" 
        label="Subtotal: " />
    
    <x-view-currency 
        value="{{ $invoice->tax }}" 
        icon="receipt" 
        label="Tax: " />
    
    <x-view-currency 
        value="{{ $invoice->discount }}" 
        icon="scissors" 
        label="Discount: "
        class="text-success" />
    
    <x-view-currency 
        value="{{ $invoice->total }}" 
        icon="dollar-sign" 
        label="Total: "
        class="text-primary fw-bold fs-5" />
</div>
```

### Budget Management Interface
```blade
<div class="budget-management-interface">
    <h4>Budget Overview</h4>
    
    <x-view-currency 
        value="{{ $budget->allocated }}" 
        icon="wallet" 
        label="Allocated: "
        class="text-info" />
    
    <x-view-currency 
        value="{{ $budget->spent }}" 
        icon="credit-card" 
        label="Spent: "
        class="text-warning" />
    
    <x-view-currency 
        value="{{ $budget->remaining }}" 
        icon="piggy-bank" 
        label="Remaining: "
        class="text-success" />
    
    <x-view-currency 
        value="{{ $budget->overspent }}" 
        icon="alert-triangle" 
        label="Overspent: "
        class="text-danger" />
</div>
```

### Investment Portfolio Interface
```blade
<div class="investment-portfolio-interface">
    <h4>Portfolio Summary</h4>
    
    <x-view-currency 
        value="{{ $portfolio->total_value }}" 
        icon="chart-line" 
        label="Total Value: "
        class="text-primary fw-bold" />
    
    <x-view-currency 
        value="{{ $portfolio->gain_loss }}" 
        icon="trending-up" 
        label="Gain/Loss: "
        :class="$portfolio->gain_loss >= 0 ? 'text-success' : 'text-danger'" />
    
    <x-view-currency 
        value="{{ $portfolio->initial_investment }}" 
        icon="dollar-sign" 
        label="Initial Investment: "
        class="text-muted" />
    
    <x-view-currency 
        value="{{ $portfolio->returns }}" 
        icon="target" 
        label="Returns: "
        class="text-success" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_currency_with_basic_value()
{
    $view = $this->blade('<x-view-currency value="1234.56" />');
    
    $view->assertSee('$1,234.56');
}

/** @test */
public function it_renders_view_currency_with_label()
{
    $view = $this->blade('<x-view-currency value="1234.56" label="Total: " />');
    
    $view->assertSee('$1,234.56');
    $view->assertSee('Total: ');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewCurrencyComponent::class)
        ->assertSee('<x-view-currency')
        ->set('value', 1234.56)
        ->assertSee('$1,234.56');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to currency elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to currency elements

### Keyboard Navigation
- Tab navigation to currency
- Copy functionality accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Currency context communication
- Icon description support
- Copy functionality announcement

### Currency Accessibility
- Clear currency purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Currency display with HTML output

## Troubleshooting

### Common Issues

#### Currency Not Displaying
**Problem:** Currency value not showing
**Solution:** Check if value attribute is set and not null

#### Formatting Not Working
**Problem:** Currency formatting not applying correctly
**Solution:** Check Laravel Number helper and locale settings

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Currency doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with currency display functionality
- Laravel Number helper integration for professional formatting
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/currency.blade.php`
2. Add/update tests in `tests/Components/ViewCurrencyTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [Icon Component](../icon.md)
- [Currency Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Currency Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
