# View Calculation Component

The `View Calculation` component is a sophisticated display component for rendering calculation results, mathematical expressions, and computed values with optional icons, labels, copy-to-clipboard functionality, and customizable settings. This component is designed to handle various types of calculated data including mathematical results, statistical values, financial calculations, and any other computed information.

## Overview

The View Calculation component provides a comprehensive way to display calculation results and computed values in a user-friendly format. It can handle various data types including numbers, strings, mathematical expressions, and formatted calculation results. The component integrates seamlessly with the icon system and provides copy functionality for enhanced user experience. It's particularly useful for displaying financial calculations, statistical results, mathematical computations, and any other calculated data that needs to be presented clearly to users.

## Basic Usage

```blade
<!-- Basic calculation result display -->
<x-view-calculation :value="42" />

<!-- With icon -->
<x-view-calculation :value="42" icon="calculator" />

<!-- With custom label -->
<x-view-calculation :value="42" label="Result: " />

<!-- With copy functionality -->
<x-view-calculation :value="42" copy />

<!-- With all features -->
<x-view-calculation 
    :value="42" 
    icon="calculator" 
    label="Result: " 
    copy 
/>
```

## Component Props

### Required Props

| Prop | Type | Description |
|------|------|-------------|
| `value` | `mixed` | The calculation result or computed value to display |

### Optional Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `icon` | `string|null` | `null` | Icon name to display before the value |
| `label` | `string|null` | `null` | Custom label text to display |
| `copy` | `boolean` | `false` | Enable copy-to-clipboard functionality |
| `settings` | `array` | `[]` | Additional settings array |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| `class` | `string` | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| `id` | `string` | auto-generated | Element ID | `'calculation-result'` |
| `style` | `string` | '' | Inline CSS styles | `'color: blue;'` |
| `data-*` | `string` | null | Custom data attributes | `data-test="calculation-component"` |

## Data Types Supported

The `value` prop accepts various data types:

### Numeric Values
```blade
<!-- Integer results -->
<x-view-calculation :value="42" />

<!-- Float results -->
<x-view-calculation :value="3.14159" />

<!-- Large numbers -->
<x-view-calculation :value="1000000" />

<!-- Negative numbers -->
<x-view-calculation :value="-15.75" />
```

### String Values
```blade
<!-- Mathematical expressions -->
<x-view-calculation :value="'2 + 2 = 4'" />

<!-- Formula results -->
<x-view-calculation :value="'π × r²'" />

<!-- Calculation descriptions -->
<x-view-calculation :value="'Total: $1,234.56'" />
```

### Formatted Values
```blade
<!-- Currency formatting -->
<x-view-calculation :value="number_format(1234.56, 2)" />

<!-- Percentage formatting -->
<x-view-calculation :value="'15.5%'" />

<!-- Scientific notation -->
<x-view-calculation :value="'1.23 × 10⁶'" />
```

## Display Examples

### Mathematical Calculations
```blade
<!-- Basic arithmetic -->
<x-view-calculation :value="'2 + 2 = 4'" icon="plus" />

<!-- Complex calculations -->
<x-view-calculation :value="'√(16) = 4'" icon="square-root" />

<!-- Formula results -->
<x-view-calculation :value="'A = π × r²'" icon="circle" />
```

### Financial Calculations
```blade
<!-- Interest calculation -->
<x-view-calculation :value="'Interest: $45.67'" icon="dollar-sign" />

<!-- Total amount -->
<x-view-calculation :value="'Total: $1,234.56'" icon="calculator" />

<!-- Percentage change -->
<x-view-calculation :value="'+15.5%'" icon="trending-up" />
```

### Statistical Results
```blade
<!-- Average calculation -->
<x-view-calculation :value="'Mean: 42.5'" icon="bar-chart" />

<!-- Standard deviation -->
<x-view-calculation :value="'σ = 12.34'" icon="activity" />

<!-- Correlation coefficient -->
<x-view-calculation :value="'r = 0.85'" icon="trending-up" />
```

## Advanced Usage

### Dynamic Content
```blade
@php
    $calculationConfig = [
        'icon' => $result > 0 ? 'trending-up' : 'trending-down',
        'label' => $isPercentage ? 'Change: ' : 'Result: '
    ];
@endphp

<x-view-calculation 
    :value="$formattedResult" 
    :icon="$calculationConfig['icon']" 
    :label="$calculationConfig['label']" 
/>
```

### Conditional Display
```blade
@if($calculationResult)
    <x-view-calculation 
        :value="$calculationResult" 
        icon="calculator" 
        label="Calculation: " 
    />
@else
    <span class="text-muted">No calculation available</span>
@endif
```

### With Settings Override
```blade
@php
    $settings = [
        'format' => 'scientific',
        'precision' => 4
    ];
@endphp

<x-view-calculation 
    :value="$result" 
    :settings="$settings" 
/>
```

## Integration Examples

### Financial Dashboard
```blade
<div class="financial-calculations">
    <h4>Financial Summary</h4>
    
    <!-- Revenue calculation -->
    <div class="calculation-item">
        <x-view-calculation 
            :value="'Revenue: $' . number_format($revenue, 2)" 
            icon="dollar-sign" 
            copy
        />
    </div>
    
    <!-- Profit margin -->
    <div class="calculation-item">
        <x-view-calculation 
            :value="'Profit Margin: ' . number_format($profitMargin, 1) . '%'" 
            icon="percent" 
            copy
        />
    </div>
    
    <!-- Growth rate -->
    <div class="calculation-item">
        <x-view-calculation 
            :value="'Growth: ' . ($growthRate > 0 ? '+' : '') . number_format($growthRate, 1) . '%'" 
            icon="trending-up" 
            copy
        />
    </div>
</div>
```

### Mathematical Calculator Display
```blade
<div class="calculator-results">
    <h4>Calculation Results</h4>
    
    <!-- Basic arithmetic -->
    <div class="result-item">
        <x-view-calculation 
            :value="'2 + 3 = 5'" 
            icon="plus" 
            label="Addition: " 
        />
    </div>
    
    <!-- Multiplication -->
    <div class="result-item">
        <x-view-calculation 
            :value="'4 × 6 = 24'" 
            icon="x" 
            label="Multiplication: " 
        />
    </div>
    
    <!-- Division -->
    <div class="result-item">
        <x-view-calculation 
            :value="'15 ÷ 3 = 5'" 
            icon="divide" 
            label="Division: " 
        />
    </div>
    
    <!-- Power -->
    <div class="result-item">
        <x-view-calculation 
            :value="'2³ = 8'" 
            icon="zap" 
            label="Power: " 
        />
    </div>
</div>
```

### Statistical Analysis Display
```blade
<div class="statistical-results">
    <h4>Statistical Analysis</h4>
    
    <!-- Sample size -->
    <div class="stat-item">
        <x-view-calculation 
            :value="'n = 150'" 
            icon="users" 
            label="Sample Size: " 
        />
    </div>
    
    <!-- Mean -->
    <div class="stat-item">
        <x-view-calculation 
            :value="'Mean = 42.5'" 
            icon="bar-chart" 
            label="Average: " 
        />
    </div>
    
    <!-- Standard deviation -->
    <div class="stat-item">
        <x-view-calculation 
            :value="'σ = 12.34'" 
            icon="activity" 
            label="Std Dev: " 
        />
    </div>
    
    <!-- Confidence interval -->
    <div class="stat-item">
        <x-view-calculation 
            :value="'95% CI: [38.2, 46.8]'" 
            icon="target" 
            label="Confidence: " 
        />
    </div>
</div>
```

### Engineering Calculations
```blade
<div class="engineering-calculations">
    <h4>Engineering Results</h4>
    
    <!-- Area calculation -->
    <div class="calc-item">
        <x-view-calculation 
            :value="'Area = π × r² = ' . number_format($area, 2) . ' m²'" 
            icon="square" 
            copy
        />
    </div>
    
    <!-- Volume calculation -->
    <div class="calc-item">
        <x-view-calculation 
            :value="'Volume = l × w × h = ' . number_format($volume, 2) . ' m³'" 
            icon="box" 
            copy
        />
    </div>
    
    <!-- Force calculation -->
    <div class="calc-item">
        <x-view-calculation 
            :value="'F = m × a = ' . number_format($force, 2) . ' N'" 
            icon="zap" 
            copy
        />
    </div>
</div>
```

### Scientific Notation Display
```blade
<div class="scientific-calculations">
    <h4>Scientific Results</h4>
    
    <!-- Large numbers -->
    <div class="sci-item">
        <x-view-calculation 
            :value="'1.23 × 10⁶'" 
            icon="zap" 
            label="Large Number: " 
        />
    </div>
    
    <!-- Small numbers -->
    <div class="sci-item">
        <x-view-calculation 
            :value="'6.02 × 10⁻²³'" 
            icon="atom" 
            label="Avogadro\'s Number: " 
        />
    </div>
    
    <!-- Constants -->
    <div class="sci-item">
        <x-view-calculation 
            :value="'π = 3.14159...'" 
            icon="circle" 
            label="Pi: " 
        />
    </div>
</div>
```

### Business Metrics Display
```blade
<div class="business-metrics">
    <h4>Business Calculations</h4>
    
    <!-- Conversion rate -->
    <div class="metric-item">
        <x-view-calculation 
            :value="'Conversion Rate: ' . number_format($conversionRate, 2) . '%'" 
            icon="target" 
            copy
        />
    </div>
    
    <!-- Customer lifetime value -->
    <div class="metric-item">
        <x-view-calculation 
            :value="'CLV: $' . number_format($customerLifetimeValue, 2)" 
            icon="user" 
            copy
        />
    </div>
    
    <!-- Return on investment -->
    <div class="metric-item">
        <x-view-calculation 
            :value="'ROI: ' . number_format($roi, 1) . '%'" 
            icon="trending-up" 
            copy
        />
    </div>
</div>
```

## Styling and Customization

### Custom CSS Classes
```blade
<!-- Add custom classes -->
<x-view-calculation 
    :value="$result" 
    class="my-custom-calculation" 
/>

<!-- Multiple classes -->
<x-view-calculation 
    :value="$result" 
    class="calculation-highlight calculation-border" 
/>
```

### Inline Styles
```blade
<!-- Custom styling -->
<x-view-calculation 
    :value="$result" 
    style="background: #f8f9fa; padding: 8px; border-radius: 4px;" 
/>
```

### Responsive Design
```blade
<!-- Responsive calculation display -->
<x-view-calculation 
    :value="$result" 
    class="calculation-responsive" 
/>
```

## Testing

### Basic Rendering Test
```php
/** @test */
public function it_renders_basic_calculation_value()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
    
    $view->assertSee('42');
}
```

### Icon Integration Test
```php
/** @test */
public function it_renders_calculation_with_icon()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" icon="calculator" />', ['value' => $value]);
    
    $view->assertSee('calculator');
    $view->assertSee('me-1');
}
```

### Label Display Test
```php
/** @test */
public function it_renders_calculation_with_label()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" label="Result: " />', ['value' => $value]);
    
    $view->assertSee('Result:');
}
```

### Copy Functionality Test
```php
/** @test */
public function it_renders_calculation_with_copy_functionality()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" copy />', ['value' => $value]);
    
    $view->assertSee('copy');
    $view->assertSee('data-clipboard');
    $view->assertSee('cursor-pointer');
}
```

### Custom Classes Test
```php
/** @test */
public function it_renders_calculation_with_custom_classes()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" class="custom-class" />', ['value' => $value]);
    
    $view->assertSee('custom-class');
}
```

### Custom ID Test
```php
/** @test */
public function it_renders_calculation_with_custom_id()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" id="calc-1" />', ['value' => $value]);
    
    $view->assertSee('id="calc-1"');
}
```

### Data Attributes Test
```php
/** @test */
public function it_renders_calculation_with_data_attributes()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" data-test="calculation-component" data-type="display-calculation" />', ['value' => $value]);
    
    $view->assertSee('data-test="calculation-component"');
    $view->assertSee('data-type="display-calculation"');
}
```

### ARIA Attributes Test
```php
/** @test */
public function it_renders_calculation_with_aria_attributes()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" aria-label="Calculation result display" aria-describedby="calculation-description" />', ['value' => $value]);
    
    $view->assertSee('aria-label="Calculation result display"');
    $view->assertSee('aria-describedby="calculation-description"');
}
```

### Role Attribute Test
```php
/** @test */
public function it_renders_calculation_with_role_attribute()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" role="text" />', ['value' => $value]);
    
    $view->assertSee('role="text"');
}
```

### Inline Styles Test
```php
/** @test */
public function it_renders_calculation_with_inline_styles()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" style="color: #6c757d;" />', ['value' => $value]);
    
    $view->assertSee('style="color: #6c757d;"');
}
```

### Tabindex Test
```php
/** @test */
public function it_renders_calculation_with_tabindex()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" tabindex="0" />', ['value' => $value]);
    
    $view->assertSee('tabindex="0"');
}
```

### All Features Test
```php
/** @test */
public function it_renders_calculation_with_all_features()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" icon="calculator" label="Result: " copy class="custom-class" id="calc-1" />', ['value' => $value]);
    
    $view->assertSee('42');
    $view->assertSee('calculator');
    $view->assertSee('Result:');
    $view->assertSee('copy');
    $view->assertSee('custom-class');
    $view->assertSee('id="calc-1"');
}
```

### Different Data Types Test
```php
/** @test */
public function it_renders_calculation_with_different_data_types()
{
    // Integer value
    $integer = 42;
    $view1 = $this->blade('<x-view-calculation :value="$value" />', ['value' => $integer]);
    $view1->assertSee('42');
    
    // Float value
    $float = 3.14159;
    $view2 = $this->blade('<x-view-calculation :value="$value" />', ['value' => $float]);
    $view2->assertSee('3.14159');
    
    // String value
    $string = '2 + 2 = 4';
    $view3 = $this->blade('<x-view-calculation :value="$value" />', ['value' => $string]);
    $view3->assertSee('2 + 2 = 4');
}
```

### HTML Label Test
```php
/** @test */
public function it_renders_calculation_with_html_label()
{
    $value = 42;
    $view = $this->blade('<x-view-calculation :value="$value" label="<strong>Result:</strong> " />', ['value' => $value]);
    
    $view->assertSee('<strong>Result:</strong>');
}
```

### Null Value Test
```php
/** @test */
public function it_renders_nothing_with_null_value()
{
    $view = $this->blade('<x-view-calculation :value="null" />');
    
    $view->assertDontSee('42');
}
```

### Empty String Test
```php
/** @test */
public function it_renders_nothing_with_empty_string()
{
    $view = $this->blade('<x-view-calculation :value="\'\'" />');
    
    $view->assertDontSee('42');
}
```

### Zero Value Test
```php
/** @test */
public function it_renders_calculation_with_zero_value()
{
    $value = 0;
    $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
    
    $view->assertSee('0');
}
```

### Negative Value Test
```php
/** @test */
public function it_renders_calculation_with_negative_value()
{
    $value = -15.75;
    $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
    
    $view->assertSee('-15.75');
}
```

### Large Number Test
```php
/** @test */
public function it_renders_calculation_with_large_number()
{
    $value = 1000000;
    $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
    
    $view->assertSee('1000000');
}
```

### Mathematical Expression Test
/** @test */
public function it_renders_calculation_with_mathematical_expression()
{
    $value = '2 + 2 = 4';
    $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
    
    $view->assertSee('2 + 2 = 4');
}
```

### Copy With Different Values Test
```php
/** @test */
public function it_renders_calculation_with_copy_and_different_values()
{
    // Integer value
    $integer = 42;
    $view1 = $this->blade('<x-view-calculation :value="$value" copy />', ['value' => $integer]);
    $view1->assertSee('copy');
    $view1->assertSee('data-clipboard="42"');
    
    // String value
    $string = '2 + 2 = 4';
    $view2 = $this->blade('<x-view-calculation :value="$value" copy />', ['value' => $string]);
    $view2->assertSee('copy');
    $view2->assertSee('data-clipboard="2 + 2 = 4"');
}
```

## Accessibility

### ARIA Labels
```blade
<!-- With ARIA label -->
<x-view-calculation 
    :value="$result" 
    aria-label="Calculation result display"
    role="text"
/>
```

### Screen Reader Support
```blade
<!-- Screen reader friendly -->
<x-view-calculation 
    :value="$result" 
    aria-label="The calculation result is 42"
    role="text"
/>
```

## Browser Compatibility

- **Chrome/Edge**: Full support
- **Firefox**: Full support
- **Safari**: Full support
- **Mobile browsers**: Full support

## Performance Considerations

- Lightweight component with minimal DOM manipulation
- Efficient value handling and conditional rendering
- Copy functionality only loads when enabled
- Optimized icon rendering through the icon system

## Troubleshooting

### Common Issues

1. **Value not displaying**: Ensure the `value` prop contains valid data
2. **Icon not showing**: Check if the icon name exists in your icon set
3. **Copy not working**: Ensure Alpine.js or clipboard.js is loaded
4. **Formatting issues**: Verify the value format is appropriate for your use case
5. **Mathematical expressions**: Ensure proper escaping for special characters

### Debug Mode
```blade
<!-- Enable debug mode -->
<x-view-calculation :value="$result" :debug="true" />
```

## Related Components

- **View Number** - For numeric value display
- **View Currency** - For currency formatting
- **View Status** - For status information display
- **View Badge** - For result indicators
- **View Tag** - For calculation labels
- **Icon** - Icon system component

## Changelog

### Version 1.0.0
- Initial release
- Basic calculation result display functionality
- Support for multiple data types (numbers, strings, expressions)
- Icon integration support
- Label display support with HTML formatting
- Copy functionality
- Settings array support
- Responsive design

## Contributing

When contributing to the View Calculation component:

1. Follow the established coding standards
2. Add comprehensive tests for new features
3. Update documentation for any changes
4. Ensure accessibility compliance
5. Test with various data types and mathematical expressions

## Support

For support and questions about the View Calculation component:

- Check the documentation
- Review the test files
- Open an issue on GitHub
- Contact the development team
