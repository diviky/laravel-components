<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormCurrencyTest extends TestCase
{
    /** @test */
    public function it_renders_form_currency_with_basic_attributes()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('name="test"');
        $view->assertSee('form-currency');
    }

    /** @test */
    public function it_renders_form_currency_with_label()
    {
        $view = $this->blade('<x-form-currency name="price" label="Product Price" />');

        $view->assertSee('name="price"');
        $view->assertSee('Product Price');
    }

    /** @test */
    public function it_renders_form_currency_with_value()
    {
        $view = $this->blade('<x-form-currency name="amount" value="99.99" />');

        $view->assertSee('name="amount"');
        $view->assertSee('99.99');
    }

    /** @test */
    public function it_renders_form_currency_with_default_value()
    {
        $view = $this->blade('<x-form-currency name="amount" :default="\'50.00\'" />');

        $view->assertSee('name="amount"');
        $view->assertSee('50.00');
    }

    /** @test */
    public function it_renders_form_currency_with_default_currency()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('USD');
    }

    /** @test */
    public function it_renders_form_currency_with_custom_currency()
    {
        $view = $this->blade('<x-form-currency name="test" currency="EUR" />');

        $view->assertSee('name="test"');
        $view->assertSee('EUR');
    }

    /** @test */
    public function it_renders_form_currency_with_extra_attributes()
    {
        $view = $this->blade('<x-form-currency name="test" :extra-attributes="[\'data-test\' => \'currency\']" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="currency"');
    }

    /** @test */
    public function it_renders_form_currency_with_custom_class()
    {
        $view = $this->blade('<x-form-currency name="test" class="custom-currency" />');

        $view->assertSee('name="test"');
        $view->assertSee('class="custom-currency');
    }

    /** @test */
    public function it_renders_form_currency_with_custom_id()
    {
        $view = $this->blade('<x-form-currency name="test" id="currency-input" />');

        $view->assertSee('name="test"');
        $view->assertSee('id="currency-input"');
    }

    /** @test */
    public function it_renders_form_currency_with_disabled_attribute()
    {
        $view = $this->blade('<x-form-currency name="test" disabled />');

        $view->assertSee('name="test"');
        $view->assertSee('disabled');
    }

    /** @test */
    public function it_renders_form_currency_with_readonly_attribute()
    {
        $view = $this->blade('<x-form-currency name="test" readonly />');

        $view->assertSee('name="test"');
        $view->assertSee('readonly');
    }

    /** @test */
    public function it_renders_form_currency_with_required_attribute()
    {
        $view = $this->blade('<x-form-currency name="test" required />');

        $view->assertSee('name="test"');
        $view->assertSee('required');
    }

    /** @test */
    public function it_renders_form_currency_with_placeholder()
    {
        $view = $this->blade('<x-form-currency name="test" placeholder="Enter amount" />');

        $view->assertSee('name="test"');
        $view->assertSee('Enter amount');
    }

    /** @test */
    public function it_renders_form_currency_with_min_attribute()
    {
        $view = $this->blade('<x-form-currency name="test" min="0" />');

        $view->assertSee('name="test"');
        $view->assertSee('min="0"');
    }

    /** @test */
    public function it_renders_form_currency_with_max_attribute()
    {
        $view = $this->blade('<x-form-currency name="test" max="999999.99" />');

        $view->assertSee('name="test"');
        $view->assertSee('max="999999.99"');
    }

    /** @test */
    public function it_renders_form_currency_with_step_attribute()
    {
        $view = $this->blade('<x-form-currency name="test" step="0.01" />');

        $view->assertSee('name="test"');
        $view->assertSee('step="0.01"');
    }

    /** @test */
    public function it_renders_form_currency_with_help_slot()
    {
        $view = $this->blade('
            <x-form-currency name="test">
                <x-slot:help>
                    Enter the price in the selected currency. Prices are displayed with 2 decimal places.
                </x-slot:help>
            </x-form-currency>
        ');

        $view->assertSee('name="test"');
        $view->assertSee('Enter the price in the selected currency. Prices are displayed with 2 decimal places.');
    }

    /** @test */
    public function it_renders_form_currency_with_default_slot()
    {
        $view = $this->blade('<x-form-currency name="test">Prices are subject to change</x-form-currency>');

        $view->assertSee('name="test"');
        $view->assertSee('Prices are subject to change');
    }

    /** @test */
    public function it_renders_form_currency_with_form_input()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_currency_with_form_label()
    {
        $view = $this->blade('<x-form-currency name="test" label="Test Currency" />');

        $view->assertSee('<x-form-label');
        $view->assertSee('Test Currency');
    }

    /** @test */
    public function it_renders_form_currency_with_prepend_slot()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('@slot(\'prepend\')');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_symbol()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{{ $currency }}');
    }

    /** @test */
    public function it_renders_form_currency_with_help_rendering()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_currency_with_attributes_merge()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_currency_with_number_type()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_fallback()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('Number::defaultCurrency()');
    }

    /** @test */
    public function it_renders_form_currency_with_php_currency_logic()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('$currency ??');
    }

    /** @test */
    public function it_renders_form_currency_with_usd_currency()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('USD');
    }

    /** @test */
    public function it_renders_form_currency_with_eur_currency()
    {
        $view = $this->blade('<x-form-currency name="test" currency="EUR" />');

        $view->assertSee('name="test"');
        $view->assertSee('EUR');
    }

    /** @test */
    public function it_renders_form_currency_with_gbp_currency()
    {
        $view = $this->blade('<x-form-currency name="test" currency="GBP" />');

        $view->assertSee('name="test"');
        $view->assertSee('GBP');
    }

    /** @test */
    public function it_renders_form_currency_with_jpy_currency()
    {
        $view = $this->blade('<x-form-currency name="test" currency="JPY" />');

        $view->assertSee('name="test"');
        $view->assertSee('JPY');
    }

    /** @test */
    public function it_renders_form_currency_with_cad_currency()
    {
        $view = $this->blade('<x-form-currency name="test" currency="CAD" />');

        $view->assertSee('name="test"');
        $view->assertSee('CAD');
    }

    /** @test */
    public function it_renders_form_currency_with_aud_currency()
    {
        $view = $this->blade('<x-form-currency name="test" currency="AUD" />');

        $view->assertSee('name="test"');
        $view->assertSee('AUD');
    }

    /** @test */
    public function it_renders_form_currency_with_livewire_integration()
    {
        $view = $this->blade('<x-form-currency name="test" wire:model="price" />');

        $view->assertSee('name="test"');
        $view->assertSee('wire:model="price"');
    }

    /** @test */
    public function it_renders_form_currency_with_turbo_attributes()
    {
        $view = $this->blade('<x-form-currency name="test" data-turbo="true" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-turbo="true"');
    }

    /** @test */
    public function it_renders_form_currency_with_accessibility_attributes()
    {
        $view = $this->blade('<x-form-currency name="test" aria-label="Currency input" />');

        $view->assertSee('name="test"');
        $view->assertSee('aria-label="Currency input"');
    }

    /** @test */
    public function it_renders_form_currency_with_data_attributes()
    {
        $view = $this->blade('<x-form-currency name="test" data-test="currency-component" />');

        $view->assertSee('name="test"');
        $view->assertSee('data-test="currency-component"');
    }

    /** @test */
    public function it_renders_form_currency_with_component_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('form-currency');
        $view->assertSee('<x-form-input');
    }

    /** @test */
    public function it_renders_form_currency_with_form_input_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_currency_with_attributes_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('attributes="$attributes"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_currency_with_slot_structure()
    {
        $view = $this->blade('<x-form-currency name="test">Content</x-form-currency>');

        $view->assertSee('Content');
    }

    /** @test */
    public function it_renders_form_currency_with_help_slot_structure()
    {
        $view = $this->blade('
            <x-form-currency name="test">
                <x-slot:help>Help text</x-slot:help>
            </x-form-currency>
        ');

        $view->assertSee('Help text');
    }

    /** @test */
    public function it_renders_form_currency_with_prepend_slot_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('@slot(\'prepend\')');
        $view->assertSee('{{ $currency }}');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_configuration()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('currency');
        $view->assertSee('USD');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_fallback_logic()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('$currency ??');
        $view->assertSee('Number::defaultCurrency()');
    }

    /** @test */
    public function it_renders_form_currency_with_number_input_type()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_currency_with_form_input_extension()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_symbol_display()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{{ $currency }}');
        $view->assertSee('@slot(\'prepend\')');
    }

    /** @test */
    public function it_renders_form_currency_with_help_slot_display()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-slot:help>');
        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_currency_with_default_slot_display()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_attributes()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('currency');
        $view->assertSee('USD');
    }

    /** @test */
    public function it_renders_form_currency_with_extra_attributes_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('extraAttributes');
        $view->assertSee('extra-attributes="$extraAttributes"');
    }

    /** @test */
    public function it_renders_form_currency_with_attributes_merge_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('attributes->merge');
        $view->assertSee('type="number"');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_symbol_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{{ $currency }}');
        $view->assertSee('@slot(\'prepend\')');
    }

    /** @test */
    public function it_renders_form_currency_with_help_slot_structure_display()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-slot:help>');
        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_currency_with_slot_structure_display()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_configuration_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('currency');
        $view->assertSee('USD');
        $view->assertSee('Number::defaultCurrency()');
    }

    /** @test */
    public function it_renders_form_currency_with_form_input_extension_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-form-input');
        $view->assertSee('extra-attributes="$extraAttributes"');
        $view->assertSee('attributes="$attributes"');
    }

    /** @test */
    public function it_renders_form_currency_with_number_input_type_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('type="number"');
        $view->assertSee('attributes->merge');
    }

    /** @test */
    public function it_renders_form_currency_with_currency_symbol_display_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{{ $currency }}');
        $view->assertSee('@slot(\'prepend\')');
    }

    /** @test */
    public function it_renders_form_currency_with_help_slot_display_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('<x-slot:help>');
        $view->assertSee('$help ?? \'\'');
    }

    /** @test */
    public function it_renders_form_currency_with_default_slot_display_structure()
    {
        $view = $this->blade('<x-form-currency name="test" />');

        $view->assertSee('{!! $slot !!}');
    }

    /** @test */
    public function it_renders_form_currency_with_comprehensive_functionality()
    {
        $view = $this->blade('<x-form-currency name="test" label="Test" currency="EUR" help="Help" />');

        $view->assertSee('name="test"');
        $view->assertSee('Test');
        $view->assertSee('EUR');
        $view->assertSee('Help');
    }
}
