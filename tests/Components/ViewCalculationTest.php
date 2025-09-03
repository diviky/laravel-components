<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewCalculationTest extends TestCase
{
    /** @test */
    public function it_renders_basic_calculation_value()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('42');
    }

    /** @test */
    public function it_renders_calculation_with_icon()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" icon="calculator" />', ['value' => $value]);
        
        $view->assertSee('calculator');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_calculation_with_label()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" label="Result: " />', ['value' => $value]);
        
        $view->assertSee('Result:');
    }

    /** @test */
    public function it_renders_calculation_with_copy_functionality()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" copy />', ['value' => $value]);
        
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_renders_calculation_with_custom_classes()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" class="custom-class" />', ['value' => $value]);
        
        $view->assertSee('custom-class');
    }

    /** @test */
    public function it_renders_calculation_with_custom_id()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" id="calc-1" />', ['value' => $value]);
        
        $view->assertSee('id="calc-1"');
    }

    /** @test */
    public function it_renders_calculation_with_data_attributes()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" data-test="calculation-component" data-type="display-calculation" />', ['value' => $value]);
        
        $view->assertSee('data-test="calculation-component"');
        $view->assertSee('data-type="display-calculation"');
    }

    /** @test */
    public function it_renders_calculation_with_aria_attributes()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" aria-label="Calculation result display" aria-describedby="calculation-description" />', ['value' => $value]);
        
        $view->assertSee('aria-label="Calculation result display"');
        $view->assertSee('aria-describedby="calculation-description"');
    }

    /** @test */
    public function it_renders_calculation_with_role_attribute()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" role="text" />', ['value' => $value]);
        
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_calculation_with_inline_styles()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" style="color: #6c757d;" />', ['value' => $value]);
        
        $view->assertSee('style="color: #6c757d;"');
    }

    /** @test */
    public function it_renders_calculation_with_tabindex()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" tabindex="0" />', ['value' => $value]);
        
        $view->assertSee('tabindex="0"');
    }

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

    /** @test */
    public function it_renders_calculation_with_html_label()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" label="<strong>Result:</strong> " />', ['value' => $value]);
        
        $view->assertSee('<strong>Result:</strong>');
    }

    /** @test */
    public function it_renders_nothing_with_null_value()
    {
        $view = $this->blade('<x-view-calculation :value="null" />');
        
        $view->assertDontSee('42');
    }

    /** @test */
    public function it_renders_nothing_with_empty_string()
    {
        $view = $this->blade('<x-view-calculation :value="\'\'" />');
        
        $view->assertDontSee('42');
    }

    /** @test */
    public function it_renders_calculation_with_zero_value()
    {
        $value = 0;
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('0');
    }

    /** @test */
    public function it_renders_calculation_with_negative_value()
    {
        $value = -15.75;
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('-15.75');
    }

    /** @test */
    public function it_renders_calculation_with_large_number()
    {
        $value = 1000000;
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('1000000');
    }

    /** @test */
    public function it_renders_calculation_with_mathematical_expression()
    {
        $value = '2 + 2 = 4';
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('2 + 2 = 4');
    }

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

    /** @test */
    public function it_renders_calculation_with_special_characters()
    {
        $value = 'π × r²';
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('π × r²');
    }

    /** @test */
    public function it_renders_calculation_with_unicode_characters()
    {
        $value = '√(16) = 4';
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee('√(16) = 4');
    }

    /** @test */
    public function it_renders_calculation_with_long_text()
    {
        $value = 'This is a very long calculation result that might exceed normal length expectations and should still render properly';
        $view = $this->blade('<x-view-calculation :value="$value" />', ['value' => $value]);
        
        $view->assertSee($value);
    }

    /** @test */
    public function it_renders_calculation_with_settings_array()
    {
        $value = 42;
        $settings = ['format' => 'scientific', 'precision' => 4];
        $view = $this->blade('<x-view-calculation :value="$value" :settings="$settings" />', [
            'value' => $value,
            'settings' => $settings,
        ]);
        
        $view->assertSee('42');
    }

    /** @test */
    public function it_renders_calculation_with_multiple_custom_classes()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" class="calculation-highlight calculation-border" />', ['value' => $value]);
        
        $view->assertSee('calculation-highlight');
        $view->assertSee('calculation-border');
    }

    /** @test */
    public function it_renders_calculation_with_responsive_classes()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" class="calculation-responsive d-none d-md-block" />', ['value' => $value]);
        
        $view->assertSee('calculation-responsive');
        $view->assertSee('d-none d-md-block');
    }

    /** @test */
    public function it_renders_calculation_with_utility_classes()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" class="text-muted bg-light p-2 rounded" />', ['value' => $value]);
        
        $view->assertSee('text-muted');
        $view->assertSee('bg-light');
        $view->assertSee('p-2');
        $view->assertSee('rounded');
    }

    /** @test */
    public function it_renders_calculation_with_icon_and_label()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" icon="calculator" label="Result: " />', ['value' => $value]);
        
        $view->assertSee('calculator');
        $view->assertSee('Result:');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_calculation_with_icon_and_copy()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" icon="calculator" copy />', ['value' => $value]);
        
        $view->assertSee('calculator');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_calculation_with_label_and_copy()
    {
        $value = 42;
        $view = $this->blade('<x-view-calculation :value="$value" label="Result: " copy />', ['value' => $value]);
        
        $view->assertSee('Result:');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_calculation_with_formatted_currency()
    {
        $value = '$1,234.56';
        $view = $this->blade('<x-view-calculation :value="$value" icon="dollar-sign" />', ['value' => $value]);
        
        $view->assertSee('$1,234.56');
        $view->assertSee('dollar-sign');
    }

    /** @test */
    public function it_renders_calculation_with_percentage()
    {
        $value = '15.5%';
        $view = $this->blade('<x-view-calculation :value="$value" icon="percent" />', ['value' => $value]);
        
        $view->assertSee('15.5%');
        $view->assertSee('percent');
    }

    /** @test */
    public function it_renders_calculation_with_scientific_notation()
    {
        $value = '1.23 × 10⁶';
        $view = $this->blade('<x-view-calculation :value="$value" icon="zap" />', ['value' => $value]);
        
        $view->assertSee('1.23 × 10⁶');
        $view->assertSee('zap');
    }

    /** @test */
    public function it_renders_calculation_with_formula()
    {
        $value = 'A = π × r²';
        $view = $this->blade('<x-view-calculation :value="$value" icon="circle" />', ['value' => $value]);
        
        $view->assertSee('A = π × r²');
        $view->assertSee('circle');
    }

    /** @test */
    public function it_renders_calculation_with_statistical_result()
    {
        $value = 'Mean = 42.5';
        $view = $this->blade('<x-view-calculation :value="$value" icon="bar-chart" />', ['value' => $value]);
        
        $view->assertSee('Mean = 42.5');
        $view->assertSee('bar-chart');
    }

    /** @test */
    public function it_renders_calculation_with_engineering_result()
    {
        $value = 'F = m × a = 25.5 N';
        $view = $this->blade('<x-view-calculation :value="$value" icon="zap" />', ['value' => $value]);
        
        $view->assertSee('F = m × a = 25.5 N');
        $view->assertSee('zap');
    }
}
