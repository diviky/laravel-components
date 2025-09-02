# Form Number Component

A specialized number input component that provides a professional interface for numeric values with automatic number validation, comprehensive form integration, and enhanced user experience. This component extends FormInput to offer intuitive number input experiences with proper formatting and validation support.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-number.blade.php`
- **Documentation:** `docs/form-number.md`

## Basic Usage

### Simple Number Input
```blade
<x-form-number name="quantity" label="Quantity" />
```

### With Default Value
```blade
<x-form-number 
    name="amount" 
    label="Amount"
    :default="100">
</x-form-number>
```

### With Help Text
```blade
<x-form-number 
    name="score" 
    label="Test Score"
    help="Enter a score between 0 and 100">
</x-form-number>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'quantity'` or `'amount'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Quantity'` |
| value | mixed | null | Current number value | `'42'` |
| default | mixed | null | Default number value | `'0'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'number']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'number-input'` |
| class | string | '' | CSS classes | `'number-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Enter a number'` |
| min | number | null | Minimum value | `0` |
| max | number | null | Maximum value | `999999` |
| step | number | '1' | Step increment | `0.01` |
| pattern | string | null | Number validation pattern | `'[0-9]*'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'enter-numbers'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the number input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Enter a positive number between 1 and 1000. Decimals are allowed.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the number input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-number name="quantity">
    <small class="text-muted">Maximum order quantity is 1000</small>
</x-form-number>
```

## Usage Examples

### Basic Number Input
```blade
<x-form-number 
    name="quantity" 
    label="Quantity">
    
    <x-slot:help>
        Enter the quantity you want to order
    </x-slot:help>
</x-form-number>
```

### Required Number Input
```blade
<x-form-number 
    name="amount" 
    label="Amount"
    required>
    
    <x-slot:help>
        This field is required to complete your order
    </x-slot:help>
</x-form-number>
```

### With Min/Max Constraints
```blade
<x-form-number 
    name="score" 
    label="Test Score"
    min="0"
    max="100"
    step="0.5"
    placeholder="Enter score (0-100)">
    
    <x-slot:help>
        Score must be between 0 and 100. Half points are allowed.
    </x-slot:help>
</x-form-number>
```

### With Decimal Support
```blade
<x-form-number 
    name="price" 
    label="Price"
    min="0"
    step="0.01"
    placeholder="0.00">
    
    <x-slot:help>
        Enter the price with up to 2 decimal places
    </x-slot:help>
</x-form-number>
```

### With Model Binding
```blade
<x-form-number 
    name="user_age" 
    label="Your Age"
    :bind="$user"
    bind-key="age"
    min="13"
    max="120">
    
    <x-slot:help>
        You must be at least 13 years old to use this service
    </x-slot:help>
</x-form-number>
```

### Livewire Integration
```blade
<x-form-number 
    wire:model="form.quantity"
    name="order_quantity" 
    label="Order Quantity"
    min="1"
    max="1000"
    required>
    
    <x-slot:help>
        <div class="quantity-summary">
            <strong>Order Summary:</strong><br>
            Quantity: <span x-text="$wire.form.quantity ?: '0'">0</span><br>
            Unit Price: $<span x-text="unitPrice">10.00</span><br>
            Total: $<span x-text="calculateTotal($wire.form.quantity)">0.00</span>
        </div>
    </x-slot:help>
</x-form-number>
```

### With Custom Classes
```blade
<x-form-number 
    name="custom_number" 
    label="Custom Number"
    class="number-input-lg"
    placeholder="Enter your custom number">
    
    <x-slot:help>
        <div class="number-tips">
            <i class="fas fa-calculator"></i>
            <strong>Tip:</strong> Use the up/down arrows to adjust values
        </div>
    </x-slot:help>
</x-form-number>
```

### Disabled Number Field
```blade
<x-form-number 
    name="locked_number" 
    label="Number"
    disabled>
    
    <x-slot:help>
        This number field is locked and cannot be changed
    </x-slot:help>
</x-form-number>
```

### Readonly Number Field
```blade
<x-form-number 
    name="display_number" 
    label="Current Number"
    readonly>
    
    <x-slot:help>
        Your current number (cannot be edited)
    </x-slot:help>
</x-form-number>
```

## Component Variants

### Standard Number Input
**Usage:** `<x-form-number>` (default)
**Description:** Basic number input with standard validation
**Features:**
- HTML5 number input type
- Standard number validation
- Help and default slot support
- FormInput extension

### Constrained Number Input
**Usage:** `<x-form-number min="0" max="100">`
**Description:** Number input with value constraints
**Features:**
- Min/max value validation
- Range constraint enforcement
- Enhanced validation feedback
- Improved user experience

### Decimal Number Input
**Usage:** `<x-form-number step="0.01">`
**Description:** Number input with decimal support
**Features:**
- Decimal precision control
- Step increment configuration
- Financial calculation support
- Professional number handling

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-number>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-number' => [
        'view' => 'laravel-components::{framework}.form-number',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'number'`
- **Validation:** HTML5 number validation
- **Step:** `'1'` (integer increments)
- **Constraints:** No default min/max values

### Number Validation Patterns
```html
<!-- Integer only -->
pattern="[0-9]*"

<!-- Positive numbers only -->
pattern="[1-9][0-9]*"

<!-- Decimal numbers -->
pattern="[0-9]*\.?[0-9]+"

<!-- Currency format -->
pattern="[0-9]*\.?[0-9]{0,2}"
```

## Common Patterns

### E-commerce Product Configuration
```blade
<div class="product-configuration-form">
    <h4>Product Configuration</h4>
    <p>Set the configuration for your product:</p>
    
    <x-form-number 
        name="base_quantity" 
        label="Base Quantity"
        min="1"
        required>
        
        <x-slot:help>
            <strong>Quantity Guidelines:</strong><br>
            • Minimum order quantity is 1<br>
            • Consider production capacity<br>
            • Factor in storage costs<br>
            • Quantities are displayed as whole numbers
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="bulk_discount_threshold" 
        label="Bulk Discount Threshold"
        min="10">
        
        <x-slot:help>
            Quantity at which bulk pricing applies
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="unit_price" 
        label="Unit Price"
        min="0"
        step="0.01"
        required>
        
        <x-slot:help>
            Price per unit in your local currency
        </x-slot:help>
    </x-form-number>
    
    <div class="pricing-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Pricing Summary:</h6>
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Base Quantity:</strong> <span x-text="$wire.baseQuantity ?: '0'">0</span></p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Bulk Threshold:</strong> <span x-text="$wire.bulkDiscountThreshold ?: '0'">0</span></p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-1"><strong>Unit Price:</strong> $<span x-text="$wire.unitPrice ?: '0.00'">0.00</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Survey and Assessment Forms
```blade
<div class="survey-assessment-form">
    <h4>Customer Satisfaction Survey</h4>
    <p>Rate your experience with our service:</p>
    
    <x-form-number 
        name="overall_satisfaction" 
        label="Overall Satisfaction"
        min="1"
        max="10"
        required>
        
        <x-slot:help>
            Rate your overall satisfaction from 1 (very dissatisfied) to 10 (very satisfied)
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="product_quality" 
        label="Product Quality"
        min="1"
        max="10">
        
        <x-slot:help>
            Rate the quality of our products
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="customer_service" 
        label="Customer Service"
        min="1"
        max="10">
        
        <x-slot:help>
            Rate the quality of our customer service
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="value_for_money" 
        label="Value for Money"
        min="1"
        max="10">
        
        <x-slot:help>
            Rate the value for money of our products
        </x-slot:help>
    </x-form-number>
    
    <div class="survey-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Survey Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Overall Score:</strong> <span x-text="calculateOverallScore()">0</span>/10</p>
                        <p class="mb-1"><strong>Average Rating:</strong> <span x-text="calculateAverageRating()">0</span>/10</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Recommendation:</strong> <span x-text="getRecommendation()">Neutral</span></p>
                        <p class="mb-0"><strong>Improvement Areas:</strong> <span x-text="getImprovementAreas()">None</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Financial Planning and Budgeting
```blade
<div class="financial-planning-form">
    <h4>Monthly Budget Planning</h4>
    <p>Plan your monthly expenses and savings:</p>
    
    <x-form-number 
        name="monthly_income" 
        label="Monthly Income"
        min="0"
        step="0.01"
        required>
        
        <x-slot:help>
            Your total monthly income from all sources
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="rent_mortgage" 
        label="Rent/Mortgage"
        min="0"
        step="0.01">
        
        <x-slot:help>
            Monthly housing costs
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="utilities" 
        label="Utilities"
        min="0"
        step="0.01">
        
        <x-slot:help>
            Monthly utility bills (electricity, water, gas, internet)
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="groceries" 
        label="Groceries"
        min="0"
        step="0.01">
        
        <x-slot:help>
            Monthly food and household expenses
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="entertainment" 
        label="Entertainment"
        min="0"
        step="0.01">
        
        <x-slot:help>
            Monthly entertainment and recreation expenses
        </x-slot:help>
    </x-form-number>
    
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
                        <p class="mb-0"><strong>Savings Rate:</strong> <span x-text="calculateSavingsRate()">0%</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Inventory Management
```blade
<div class="inventory-management-form">
    <h4>Inventory Management</h4>
    <p>Update your inventory levels:</p>
    
    <x-form-number 
        name="current_stock" 
        label="Current Stock"
        min="0"
        readonly>
        
        <x-slot:help>
            Current inventory level (cannot be edited)
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="reorder_point" 
        label="Reorder Point"
        min="0">
        
        <x-slot:help>
            Stock level at which to reorder
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="order_quantity" 
        label="Order Quantity"
        min="1">
        
        <x-slot:help>
            Quantity to order when reorder point is reached
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="lead_time_days" 
        label="Lead Time (Days)"
        min="1"
        max="365">
        
        <x-slot:help>
            Days from order to delivery
        </x-slot:help>
    </x-form-number>
    
    <div class="inventory-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Inventory Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Stock Status:</strong> <span x-text="getStockStatus()">Normal</span></p>
                        <p class="mb-1"><strong>Days Until Reorder:</strong> <span x-text="getDaysUntilReorder()">0</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Next Order Date:</strong> <span x-text="getNextOrderDate()">N/A</span></p>
                        <p class="mb-0"><strong>Safety Stock:</strong> <span x-text="getSafetyStock()">0</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Performance Metrics
```blade
<div class="performance-metrics-form">
    <h4>Performance Metrics</h4>
    <p>Track your key performance indicators:</p>
    
    <x-form-number 
        name="conversion_rate" 
        label="Conversion Rate (%)"
        min="0"
        max="100"
        step="0.01">
        
        <x-slot:help>
            Percentage of visitors who complete a desired action
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="average_order_value" 
        label="Average Order Value"
        min="0"
        step="0.01">
        
        <x-slot:help>
            Average amount spent per order
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="customer_lifetime_value" 
        label="Customer Lifetime Value"
        min="0"
        step="0.01">
        
        <x-slot:help>
            Total value a customer brings over their lifetime
        </x-slot:help>
    </x-form-number>
    
    <x-form-number 
        name="churn_rate" 
        label="Churn Rate (%)"
        min="0"
        max="100"
        step="0.01">
        
        <x-slot:help>
            Percentage of customers who stop using your service
        </x-slot:help>
    </x-form-number>
    
    <div class="metrics-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Metrics Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Performance Score:</strong> <span x-text="calculatePerformanceScore()">0</span>/100</p>
                        <p class="mb-1"><strong>Growth Rate:</strong> <span x-text="calculateGrowthRate()">0%</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Trend:</strong> <span x-text="getTrend()">Stable</span></p>
                        <p class="mb-0"><strong>Recommendations:</strong> <span x-text="getRecommendations()">None</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_number_with_basic_attributes()
{
    $view = $this->blade('<x-form-number name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-number');
}

/** @test */
public function it_renders_form_number_with_number_type()
{
    $view = $this->blade('<x-form-number name="test" />');
    
    $view->assertSee('type="number"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(NumberComponent::class)
        ->assertSee('<x-form-number')
        ->set('quantity', '42')
        ->assertSee('42');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to number input
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to number input
- Number key input for values
- Arrow key navigation
- Enter key for form submission

### Screen Reader Support
- Proper labeling and descriptions
- Number format announcements
- Help text communication
- Error message communication

### Number Accessibility
- Clear number format indication
- Proper validation feedback
- Helpful error messages
- Format guidance

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 number input type

## Troubleshooting

### Common Issues

#### Number Validation Not Working
**Problem:** Number validation not functioning correctly
**Solution:** Check HTML5 number input support and validation patterns

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Number Pattern Issues
**Problem:** Custom number patterns not working
**Solution:** Verify pattern attribute syntax and regex validity

#### Styling Issues
**Problem:** Number input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Validation Issues
**Problem:** Number validation errors not displaying
**Solution:** Check form validation rules and error handling

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Text:** Text input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with HTML5 number input type
- FormInput extension with number validation
- Help and default slot support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-number.blade.php`
2. Add/update tests in `tests/Components/FormNumberTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Text Component](../form-text.md)
- [HTML5 Number Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/number)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
