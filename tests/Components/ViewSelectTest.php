<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewSelectTest extends TestCase
{
    /** @test */
    public function it_renders_basic_select_value()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_select_value_with_array()
    {
        $value = ['name' => 'Active', 'color' => 'success'];
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee('Active');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_select_value_with_icon()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" icon="check-circle" />', ['value' => $value]);
        
        $view->assertSee('check-circle');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_select_value_with_label()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" label="Status: " />', ['value' => $value]);
        
        $view->assertSee('Status:');
    }

    /** @test */
    public function it_renders_select_value_with_copy_functionality()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" copy />', ['value' => $value]);
        
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_renders_select_value_with_custom_classes()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" class="custom-class" />', ['value' => $value]);
        
        $view->assertSee('custom-class');
    }

    /** @test */
    public function it_renders_select_value_with_custom_id()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" id="select-1" />', ['value' => $value]);
        
        $view->assertSee('id="select-1"');
    }

    /** @test */
    public function it_renders_select_value_with_data_attributes()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" data-test="select-component" data-type="display-select" />', ['value' => $value]);
        
        $view->assertSee('data-test="select-component"');
        $view->assertSee('data-type="display-select"');
    }

    /** @test */
    public function it_renders_select_value_with_aria_attributes()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" aria-label="Select value display" aria-describedby="select-description" />', ['value' => $value]);
        
        $view->assertSee('aria-label="Select value display"');
        $view->assertSee('aria-describedby="select-description"');
    }

    /** @test */
    public function it_renders_select_value_with_role_attribute()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" role="text" />', ['value' => $value]);
        
        $view->assertSee('role="text"');
    }

    /** @test */
    public function it_renders_select_value_with_inline_styles()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" style="color: #6c757d;" />', ['value' => $value]);
        
        $view->assertSee('style="color: #6c757d;"');
    }

    /** @test */
    public function it_renders_select_value_with_tabindex()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" tabindex="0" />', ['value' => $value]);
        
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_select_value_with_all_features()
    {
        $value = ['name' => 'Active', 'color' => 'success'];
        $view = $this->blade('<x-view-select :value="$value" icon="check-circle" label="Status: " copy class="custom-class" id="select-1" />', ['value' => $value]);
        
        $view->assertSee('Active');
        $view->assertSee('check-circle');
        $view->assertSee('Status:');
        $view->assertSee('copy');
        $view->assertSee('custom-class');
        $view->assertSee('id="select-1"');
    }

    /** @test */
    public function it_renders_select_value_with_different_data_types()
    {
        // String value
        $string = 'Active';
        $view1 = $this->blade('<x-view-select :value="$value" />', ['value' => $string]);
        $view1->assertSee('Active');
        
        // Array value
        $array = ['name' => 'Pending', 'color' => 'warning'];
        $view2 = $this->blade('<x-view-select :value="$value" />', ['value' => $array]);
        $view2->assertSee('Pending');
        $view2->assertSee('text-warning');
        
        // Array with name only
        $arrayNameOnly = ['name' => 'Completed'];
        $view3 = $this->blade('<x-view-select :value="$value" />', ['value' => $arrayNameOnly]);
        $view3->assertSee('Completed');
    }

    /** @test */
    public function it_renders_select_value_with_html_label()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" label="<strong>Status:</strong> " />', ['value' => $value]);
        
        $view->assertSee('<strong>Status:</strong>');
    }

    /** @test */
    public function it_renders_nothing_with_null_value()
    {
        $view = $this->blade('<x-view-select :value="null" />');
        
        $view->assertDontSee('Active');
    }

    /** @test */
    public function it_renders_nothing_with_empty_string()
    {
        $view = $this->blade('<x-view-select :value="\'\'" />');
        
        $view->assertDontSee('Active');
    }

    /** @test */
    public function it_renders_nothing_with_empty_array()
    {
        $view = $this->blade('<x-view-select :value="[]" />');
        
        $view->assertDontSee('Active');
    }

    /** @test */
    public function it_renders_nothing_with_array_without_name()
    {
        $value = ['color' => 'success'];
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertDontSee('Active');
    }

    /** @test */
    public function it_renders_select_value_with_copy_and_array()
    {
        $value = ['name' => 'Active', 'color' => 'success'];
        $view = $this->blade('<x-view-select :value="$value" copy />', ['value' => $value]);
        
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Active"');
    }

    /** @test */
    public function it_renders_select_value_with_copy_and_string()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" copy />', ['value' => $value]);
        
        $view->assertSee('copy');
        $view->assertSee('data-clipboard="Active"');
    }

    /** @test */
    public function it_renders_select_value_with_special_characters()
    {
        $value = 'In Progress...';
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee('In Progress...');
    }

    /** @test */
    public function it_renders_select_value_with_unicode_characters()
    {
        $value = '中文 Español Français';
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee('中文 Español Français');
    }

    /** @test */
    public function it_renders_select_value_with_long_text()
    {
        $value = 'This is a very long select value that might exceed normal length expectations and should still render properly';
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee($value);
    }

    /** @test */
    public function it_renders_select_value_with_array_access_object()
    {
        $value = new class implements \ArrayAccess {
            private $data = ['name' => 'Active', 'color' => 'success'];
            
            public function offsetExists($offset): bool
            {
                return isset($this->data[$offset]);
            }
            
            public function offsetGet($offset): mixed
            {
                return $this->data[$offset];
            }
            
            public function offsetSet($offset, $value): void
            {
                $this->data[$offset] = $value;
            }
            
            public function offsetUnset($offset): void
            {
                unset($this->data[$offset]);
            }
        };
        
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee('Active');
        $view->assertSee('text-success');
    }

    /** @test */
    public function it_renders_select_value_with_settings_array()
    {
        $value = 'Active';
        $settings = ['format' => 'short', 'locale' => 'en'];
        $view = $this->blade('<x-view-select :value="$value" :settings="$settings" />', [
            'value' => $value,
            'settings' => $settings,
        ]);
        
        $view->assertSee('Active');
    }

    /** @test */
    public function it_renders_select_value_with_multiple_custom_classes()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" class="select-highlight select-border" />', ['value' => $value]);
        
        $view->assertSee('select-highlight');
        $view->assertSee('select-border');
    }

    /** @test */
    public function it_renders_select_value_with_responsive_classes()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" class="select-responsive d-none d-md-block" />', ['value' => $value]);
        
        $view->assertSee('select-responsive');
        $view->assertSee('d-none d-md-block');
    }

    /** @test */
    public function it_renders_select_value_with_utility_classes()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" class="text-muted bg-light p-2 rounded" />', ['value' => $value]);
        
        $view->assertSee('text-muted');
        $view->assertSee('bg-light');
        $view->assertSee('p-2');
        $view->assertSee('rounded');
    }

    /** @test */
    public function it_renders_select_value_with_different_colors()
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        
        foreach ($colors as $color) {
            $value = ['name' => ucfirst($color), 'color' => $color];
            $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
            
            $view->assertSee(ucfirst($color));
            $view->assertSee('text-' . $color);
        }
    }

    /** @test */
    public function it_renders_select_value_with_custom_color_class()
    {
        $value = ['name' => 'Custom', 'color' => 'custom-color'];
        $view = $this->blade('<x-view-select :value="$value" />', ['value' => $value]);
        
        $view->assertSee('Custom');
        $view->assertSee('text-custom-color');
    }

    /** @test */
    public function it_renders_select_value_with_icon_and_label()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" icon="check-circle" label="Status: " />', ['value' => $value]);
        
        $view->assertSee('check-circle');
        $view->assertSee('Status:');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_select_value_with_icon_and_copy()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" icon="check-circle" copy />', ['value' => $value]);
        
        $view->assertSee('check-circle');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_select_value_with_label_and_copy()
    {
        $value = 'Active';
        $view = $this->blade('<x-view-select :value="$value" label="Status: " copy />', ['value' => $value]);
        
        $view->assertSee('Status:');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }
}
