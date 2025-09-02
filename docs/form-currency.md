# Form Currency Component

A specialized currency input component that provides a professional interface for monetary values with automatic currency symbol prepending, flexible currency configuration, and comprehensive form integration. This component extends FormInput to offer intuitive currency input experiences with proper formatting and validation support.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-currency.blade.php`
- **Documentation:** `docs/form-currency.md`

## Basic Usage

### Simple Currency Input
```blade
<x-form-currency name="price" label="Product Price" />
```

### With Custom Currency
```blade
<x-form-currency 
    name="amount" 
    label="Amount"
    currency="EUR">
</x-form-currency>
```

### With Help Text
```blade
<x-form-currency 
    name="total" 
    label="Total Amount"
    help="Enter the total amount including taxes">
</x-form-currency>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'price'` or `'amount'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Product Price'` |
| value | mixed | null | Current currency value | `'99.99'` |
| default | mixed | null | Default currency value | `'0.00'` |
| currency | string | 'USD' | Currency code/symbol | `'EUR'` or `'GBP'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'currency']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'currency-input'` |
| class | string | '' | CSS classes | `'currency-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Enter amount'` |
| min | number | null | Minimum value | `0` |
| max | number | null | Maximum value | `999999.99` |
| step | number | '0.01' | Step increment | `0.01` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'enter-prices'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `prepend`
- **Purpose:** Content before the input field (currency symbol)
- **Required:** No (auto-populated with currency)
- **Content Type:** Text/Currency symbol
- **Example:**
```blade
<x-form-currency name="price" currency="EUR">
    <x-slot:prepend>€</x-slot:prepend>
</x-form-currency>
```

#### `help`
- **Purpose:** Help text below the currency input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Enter the price in the selected currency. Prices are displayed with 2 decimal places.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the currency input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-currency name="price">
    <small class="text-muted">Prices are subject to change</small>
</x-form-currency>
```

## Usage Examples

### Basic Currency Input
```blade
<x-form-currency 
    name="price" 
    label="Product Price">
    
    <x-slot:help>
        Enter the product price in USD
    </x-slot:help>
</x-form-currency>
```

### Required Currency Input
```blade
<x-form-currency 
    name="total" 
    label="Total Amount"
    required>
    
    <x-slot:help>
        This field is required to complete your order
    </x-slot:help>
</x-form-currency>
```

### With Custom Currency
```blade
<x-form-currency 
    name="amount" 
    label="Amount"
    currency="EUR"
    placeholder="Enter amount in euros">
    
    <x-slot:help>
        Amount will be converted to your local currency
    </x-slot:help>
</x-form-currency>
```

### With Model Binding
```blade
<x-form-currency 
    name="user_budget" 
    label="Your Budget"
    :bind="$user"
    bind-key="monthly_budget">
    
    <x-slot:help>
        Set your monthly spending limit
    </x-slot:help>
</x-form-currency>
```

### Livewire Integration
```blade
<x-form-currency 
    wire:model="form.price"
    name="product_price" 
    label="Product Price"
    currency="USD"
    required>
    
    <x-slot:help>
        <div class="price-summary">
            <strong>Price Summary:</strong><br>
            Base Price: $<span x-text="$wire.form.price ?: '0.00'">0.00</span><br>
            Tax (8.5%): $<span x-text="calculateTax($wire.form.price)">0.00</span><br>
            Total: $<span x-text="calculateTotal($wire.form.price)">0.00</span>
        </div>
    </x-slot:help>
</x-form-currency>
```

### With Custom Classes
```blade
<x-form-currency 
    name="custom_price" 
    label="Custom Price"
    class="currency-input-lg"
    placeholder="Enter your custom price">
    
    <x-slot:help>
        <div class="currency-tips">
            <i class="fas fa-dollar-sign"></i>
            <strong>Tip:</strong> Enter prices without the currency symbol
        </div>
    </x-slot:help>
</x-form-currency>
```

### Disabled Currency Field
```blade
<x-form-currency 
    name="locked_price" 
    label="Price"
    disabled>
    
    <x-slot:help>
        This price field is locked and cannot be changed
    </x-slot:help>
</x-form-currency>
```

### Readonly Currency Field
```blade
<x-form-currency 
    name="display_price" 
    label="Current Price"
    readonly>
    
    <x-slot:help>
        Your current price (cannot be edited)
    </x-slot:help>
</x-form-currency>
```

## Component Variants

### Standard Currency Input
**Usage:** `<x-form-currency>` (default)
**Description:** Basic currency input with USD symbol
**Features:**
- Automatic USD currency symbol
- Number input type with decimal support
- Help and default slot support
- FormInput extension

### Custom Currency Input
**Usage:** `<x-form-currency currency="EUR">`
**Description:** Currency input with custom currency symbol
**Features:**
- Custom currency symbol configuration
- Flexible currency code support
- International currency support
- Enhanced user experience

### Dynamic Currency Input
**Usage:** `<x-form-currency :currency="$dynamicCurrency">`
**Description:** Currency input with dynamic currency selection
**Features:**
- Dynamic currency symbol loading
- User preference integration
- Multi-currency support
- Real-time currency switching

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-currency>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-currency' => [
        'view' => 'laravel-components::{framework}.form-currency',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'number'`
- **Currency:** `'USD'` (or `\Illuminate\Support\Number::defaultCurrency()`)
- **Step:** `'0.01'` (2 decimal places)
- **Prepend:** Currency symbol automatically added

### Currency Configuration
```php
// Default currency fallback
$currency = $currency ?? \Illuminate\Support\Number::defaultCurrency();

// Common currency codes
'USD' => '$',
'EUR' => '€',
'GBP' => '£',
'JPY' => '¥',
'CAD' => 'C$',
'AUD' => 'A$',
```

## Common Patterns

### E-commerce Product Pricing
```blade
<div class="product-pricing-form">
    <h4>Product Pricing</h4>
    <p>Set the pricing for your product:</p>
    
    <x-form-currency 
        name="base_price" 
        label="Base Price"
        currency="USD"
        required>
        
        <x-slot:help>
            <strong>Base Price Guidelines:</strong><br>
            • Should cover your production costs<br>
            • Consider market competition<br>
            • Factor in profit margins<br>
            • Prices are displayed in USD
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="sale_price" 
        label="Sale Price"
        currency="USD">
        
        <x-slot:help>
            Optional sale price for promotions
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="wholesale_price" 
        label="Wholesale Price"
        currency="USD">
        
        <x-slot:help>
            Price for bulk orders and resellers
        </x-slot:help>
    </x-form-currency>
    
    <div class="pricing-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Pricing Summary:</h6>
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Base Price:</strong> $<span x-text="$wire.basePrice ?: '0.00'">0.00</span></p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Sale Price:</strong> $<span x-text="$wire.salePrice ?: '0.00'">0.00</span></p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Wholesale:</strong> $<span x-text="$wire.wholesalePrice ?: '0.00'">0.00</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Invoice and Billing
```blade
<div class="invoice-billing-form">
    <h4>Invoice Details</h4>
    <p>Enter the billing information:</p>
    
    <x-form-currency 
        name="subtotal" 
        label="Subtotal"
        currency="USD"
        readonly>
        
        <x-slot:help>
            Automatically calculated from line items
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="tax_amount" 
        label="Tax Amount"
        currency="USD">
        
        <x-slot:help>
            Enter applicable tax amount
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="shipping_cost" 
        label="Shipping Cost"
        currency="USD">
        
        <x-slot:help>
            Shipping and handling charges
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="discount_amount" 
        label="Discount Amount"
        currency="USD">
        
        <x-slot:help>
            Any applicable discounts or coupons
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="total_amount" 
        label="Total Amount"
        currency="USD"
        readonly>
        
        <x-slot:help>
            <div class="total-breakdown">
                <strong>Total Breakdown:</strong><br>
                Subtotal: $<span x-text="$wire.subtotal ?: '0.00'">0.00</span><br>
                Tax: $<span x-text="$wire.taxAmount ?: '0.00'">0.00</span><br>
                Shipping: $<span x-text="$wire.shippingCost ?: '0.00'">0.00</span><br>
                Discount: -$<span x-text="$wire.discountAmount ?: '0.00'">0.00</span><br>
                <strong>Total: $<span x-text="calculateTotal()">0.00</span></strong>
            </div>
        </x-slot:help>
    </x-form-currency>
</div>
```

### Budget Management
```blade
<div class="budget-management-form">
    <h4>Monthly Budget Planning</h4>
    <p>Plan your monthly expenses:</p>
    
    <x-form-currency 
        name="monthly_income" 
        label="Monthly Income"
        currency="USD"
        required>
        
        <x-slot:help>
            Your total monthly income from all sources
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="housing_expenses" 
        label="Housing Expenses"
        currency="USD">
        
        <x-slot:help>
            Rent, mortgage, utilities, and maintenance
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="transportation_costs" 
        label="Transportation Costs"
        currency="USD">
        
        <x-slot:help>
            Gas, public transit, car payments, and insurance
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="food_expenses" 
        label="Food Expenses"
        currency="USD">
        
        <x-slot:help>
            Groceries, dining out, and food delivery
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="entertainment_budget" 
        label="Entertainment Budget"
        currency="USD">
        
        <x-slot:help>
            Movies, concerts, hobbies, and recreation
        </x-slot:help>
    </x-form-currency>
    
    <div class="budget-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Budget Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Total Income:</strong> $<span x-text="$wire.monthlyIncome ?: '0.00'">0.00</span></p>
                        <p class="mb-1"><strong>Total Expenses:</strong> $<span x-text="calculateTotalExpenses()">0.00</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Remaining:</strong> $<span x-text="calculateRemaining()">0.00</span></p>
                        <p class="mb-1"><strong>Savings Rate:</strong> <span x-text="calculateSavingsRate()">0%</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Financial Planning
```blade
<div class="financial-planning-form">
    <h4>Financial Goals</h4>
    <p>Set your financial targets:</p>
    
    <x-form-currency 
        name="emergency_fund" 
        label="Emergency Fund Goal"
        currency="USD">
        
        <x-slot:help>
            Recommended: 3-6 months of living expenses
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="retirement_savings" 
        label="Annual Retirement Savings"
        currency="USD">
        
        <x-slot:help>
            Target 15-20% of your annual income
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="debt_payoff" 
        label="Debt Payoff Goal"
        currency="USD">
        
        <x-slot:help>
            Total amount you want to pay off
        </x-slot:help>
    </x-form-currency>
    
    <x-form-currency 
        name="investment_goal" 
        label="Investment Goal"
        currency="USD">
        
        <x-slot:help>
            Amount you want to invest annually
        </x-slot:help>
    </x-form-currency>
    
    <div class="financial-progress mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Progress Tracking:</h6>
                <div class="progress-bars">
                    <div class="mb-2">
                        <label>Emergency Fund: <span x-text="emergencyFundProgress()">0%</span></label>
                        <div class="progress">
                            <div class="progress-bar" :style="'width: ' + emergencyFundProgress() + '%'"></div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label>Retirement Savings: <span x-text="retirementProgress()">0%</span></label>
                        <div class="progress">
                            <div class="progress-bar" :style="'width: ' + retirementProgress() + '%'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Currency Conversion
```blade
<div class="currency-conversion-form">
    <h4>Currency Converter</h4>
    <p>Convert between different currencies:</p>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-currency 
                name="source_amount" 
                label="Amount"
                currency="USD">
                
                <x-slot:help>
                    Enter the amount to convert
                </x-slot:help>
            </x-form-currency>
        </div>
        <div class="col-md-6">
            <x-form-currency 
                name="converted_amount" 
                label="Converted Amount"
                currency="EUR"
                readonly>
                
                <x-slot:help>
                    Amount in target currency
                </x-slot:help>
            </x-form-currency>
        </div>
    </div>
    
    <div class="conversion-info mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Conversion Details:</h6>
                <p class="mb-1"><strong>Exchange Rate:</strong> 1 USD = <span x-text="exchangeRate">0.85</span> EUR</p>
                <p class="mb-1"><strong>Last Updated:</strong> <span x-text="lastUpdated">Loading...</span></p>
                <p class="mb-0"><strong>Fee:</strong> <span x-text="conversionFee">0.00</span>%</p>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_currency_with_basic_attributes()
{
    $view = $this->blade('<x-form-currency name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-currency');
}

/** @test */
public function it_renders_form_currency_with_default_currency()
{
    $view = $this->blade('<x-form-currency name="test" />');
    
    $view->assertSee('USD');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(CurrencyComponent::class)
        ->assertSee('<x-form-currency')
        ->set('price', '99.99')
        ->assertSee('99.99');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to currency input
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to currency input
- Number key input for values
- Decimal point support
- Arrow key navigation

### Screen Reader Support
- Proper labeling and descriptions
- Currency symbol announcements
- Help text communication
- Error message communication

### Currency Accessibility
- Clear currency symbol display
- Proper number formatting
- Decimal place indication
- Currency code support

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 number input type

## Troubleshooting

### Common Issues

#### Currency Symbol Not Displaying
**Problem:** Currency symbol not showing correctly
**Solution:** Check currency attribute and prepend slot

#### Number Input Issues
**Problem:** Number input not working correctly
**Solution:** Verify HTML5 number input support and step attributes

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Currency Configuration Issues
**Problem:** Custom currency not displaying
**Solution:** Verify currency attribute and fallback logic

#### Styling Issues
**Problem:** Currency input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Number:** Number input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with currency symbol prepending
- Automatic currency fallback to system default
- FormInput extension with number type
- Help and default slot support

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-currency.blade.php`
2. Add/update tests in `tests/Components/FormCurrencyTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Number Component](../form-number.md)
- [Laravel Number Helper](https://laravel.com/docs/10.x/helpers#number-helper)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
