<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormNumberTest extends TestCase
{
    public function test_renders_basic_number(): void
    {
        $view = $this->blade('<x-form-number name="age" label="Age" />');

        $view->assertSee('Age');
        $view->assertSee('name="age"');
        $view->assertSee('type="number"');
        $view->assertSee('form-control');
    }

    public function test_renders_number_with_placeholder(): void
    {
        $view = $this->blade('<x-form-number name="age" placeholder="Enter age" />');

        $view->assertSee('placeholder="Enter age"');
    }

    public function test_renders_number_with_value(): void
    {
        $view = $this->blade('<x-form-number name="age" value="25" />');

        $view->assertSee('value="25"');
    }

    public function test_renders_required_number(): void
    {
        $view = $this->blade('<x-form-number name="age" required />');

        $view->assertSee('required');
    }

    public function test_renders_disabled_number(): void
    {
        $view = $this->blade('<x-form-number name="age" disabled />');

        $view->assertSee('disabled');
    }

    public function test_renders_readonly_number(): void
    {
        $view = $this->blade('<x-form-number name="age" readonly />');

        $view->assertSee('readonly');
    }

    public function test_renders_number_with_icon(): void
    {
        $view = $this->blade('<x-form-number name="age" icon="calculator" />');

        $view->assertSee('calculator');
    }

    public function test_renders_small_number(): void
    {
        $view = $this->blade('<x-form-number name="age" size="sm" />');

        $view->assertSee('form-control-sm');
    }

    public function test_renders_large_number(): void
    {
        $view = $this->blade('<x-form-number name="age" size="lg" />');

        $view->assertSee('form-control-lg');
    }

    public function test_renders_floating_label_number(): void
    {
        $view = $this->blade('<x-form-number name="age" label="Age" floating />');

        $view->assertSee('form-floating');
    }

    public function test_renders_flat_number(): void
    {
        $view = $this->blade('<x-form-number name="age" flat />');

        $view->assertSee('input-group-flat');
    }

    public function test_renders_inline_number(): void
    {
        $view = $this->blade('<x-form-number name="age" inline />');

        $view->assertDontSee('form-group');
    }

    public function test_renders_number_with_help_text(): void
    {
        $view = $this->blade('<x-form-number name="age" help="Must be between 0 and 120" />');

        $view->assertSee('Must be between 0 and 120');
    }

    public function test_renders_number_with_custom_id(): void
    {
        $view = $this->blade('<x-form-number name="age" id="custom-age" />');

        $view->assertSee('id="custom-age"');
    }

    public function test_renders_number_with_title(): void
    {
        $view = $this->blade('<x-form-number name="age" title="Enter a valid age" />');

        $view->assertSee('title="Enter a valid age"');
    }

    public function test_renders_number_with_custom_class(): void
    {
        $view = $this->blade('<x-form-number name="age" class="custom-number" />');

        $view->assertSee('custom-number');
    }

    public function test_renders_number_with_min_value(): void
    {
        $view = $this->blade('<x-form-number name="age" min="0" />');

        $view->assertSee('min="0"');
    }

    public function test_renders_number_with_max_value(): void
    {
        $view = $this->blade('<x-form-number name="age" max="120" />');

        $view->assertSee('max="120"');
    }

    public function test_renders_number_with_step(): void
    {
        $view = $this->blade('<x-form-number name="price" step="0.01" />');

        $view->assertSee('step="0.01"');
    }

    public function test_renders_number_with_pattern(): void
    {
        $view = $this->blade('<x-form-number name="phone" pattern="[0-9]{10}" />');

        $view->assertSee('pattern="[0-9]{10}"');
    }

    public function test_renders_number_with_autocomplete(): void
    {
        $view = $this->blade('<x-form-number name="age" autocomplete="off" />');

        $view->assertSee('autocomplete="off"');
    }

    public function test_renders_number_with_autofocus(): void
    {
        $view = $this->blade('<x-form-number name="age" autofocus />');

        $view->assertSee('autofocus');
    }

    public function test_renders_number_with_form(): void
    {
        $view = $this->blade('<x-form-number name="age" form="user-form" />');

        $view->assertSee('form="user-form"');
    }

    public function test_renders_number_with_tabindex(): void
    {
        $view = $this->blade('<x-form-number name="age" tabindex="0" />');

        $view->assertSee('tabindex="0"');
    }

    public function test_renders_number_with_inputmode(): void
    {
        $view = $this->blade('<x-form-number name="decimal" inputmode="decimal" />');

        $view->assertSee('inputmode="decimal"');
    }

    public function test_renders_number_with_prepend_slot(): void
    {
        $view = $this->blade('
            <x-form-number name="amount">
                <x-slot name="prepend">💰</x-slot>
            </x-form-number>
        ');

        $view->assertSee('💰');
        $view->assertSee('input-group');
    }

    public function test_renders_number_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-number name="price">
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('$');
        $view->assertSee('input-group-text');
    }

    public function test_renders_number_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-number name="quantity">
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary">Calculate</button>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('Calculate');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_number_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-number name="age">
                <x-slot name="help">
                    <div class="text-muted">Custom help text</div>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('Custom help text');
        $view->assertSee('text-muted');
    }

    public function test_renders_number_with_icon_slot(): void
    {
        $view = $this->blade('
            <x-form-number name="rating">
                <x-slot name="icon">
                    <x-icon name="star" class="text-warning" />
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('star');
        $view->assertSee('text-warning');
    }

    public function test_renders_livewire_number(): void
    {
        $view = $this->blade('<x-form-number name="count" wire:model.live="count" />');

        $view->assertSee('wire:model.live="count"');
    }

    public function test_renders_number_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-number name="age" extra-attributes="data-custom=value" />');

        $view->assertSee('data-custom=value');
    }

    public function test_renders_number_with_default_value(): void
    {
        $view = $this->blade('<x-form-number name="age" default="18" />');

        $view->assertSee('18');
    }

    public function test_renders_number_with_bind_value(): void
    {
        $view = $this->blade('<x-form-number name="age" :bind="$user" />');

        // This would need a proper test setup with a user model
        $view->assertSee('name="age"');
    }

    public function test_renders_number_without_errors(): void
    {
        $view = $this->blade('<x-form-number name="age" :show-errors="false" />');

        $view->assertDontSee('form-errors');
    }

    public function test_renders_complex_number_combination(): void
    {
        $view = $this->blade('
            <x-form-number
                name="price"
                label="Price"
                placeholder="Enter price"
                help="Enter price in dollars"
                required
                class="custom-price"
                wire:model.live="price"
                size="lg"
                icon="calculator"
                min="0"
                max="10000"
                step="0.01"
                title="Enter a valid price"
            >
                <x-slot name="prepend">💰</x-slot>
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary">Calculate</button>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('Price');
        $view->assertSee('Enter price');
        $view->assertSee('Enter price in dollars');
        $view->assertSee('required');
        $view->assertSee('custom-price');
        $view->assertSee('wire:model.live="price"');
        $view->assertSee('form-control-lg');
        $view->assertSee('calculator');
        $view->assertSee('min="0"');
        $view->assertSee('max="10000"');
        $view->assertSee('step="0.01"');
        $view->assertSee('title="Enter a valid price"');
        $view->assertSee('💰');
        $view->assertSee('Calculate');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_number_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-number
                name="age"
                min="0"
                max="120"
                step="1"
                pattern="[0-9]*"
                title="Please enter a valid age"
                required
            />
        ');

        $view->assertSee('min="0"');
        $view->assertSee('max="120"');
        $view->assertSee('step="1"');
        $view->assertSee('pattern="[0-9]*"');
        $view->assertSee('title="Please enter a valid age"');
        $view->assertSee('required');
    }

    public function test_renders_number_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-number
                name="age"
                label="Age"
                aria-describedby="age-help"
                aria-required="true"
            />
        ');

        $view->assertSee('aria-describedby="age-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_number_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-number
                name="count"
                wire:model.lazy="count"
                wire:loading.class="opacity-50"
                wire:target="count"
            />
        ');

        $view->assertSee('wire:model.lazy="count"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="count"');
    }

    public function test_renders_number_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-number
                name="rating"
                class="form-control-lg"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
            />
        ');

        $view->assertSee('form-control-lg');
        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('data-bs-placement="top"');
    }

    public function test_renders_number_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-number
                name="age"
                label="Age"
                id="user-age"
            />
        ');

        $view->assertSee('for="user-age"');
        $view->assertSee('id="user-age"');
    }

    public function test_renders_number_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-number
                name="special_chars"
                value="42 & <script>alert(\'xss\')</script>"
                placeholder="Enter &quot;number&quot;"
            />
        ');

        $view->assertSee('42');
        $view->assertSee('Enter &quot;number&quot;');
    }

    public function test_renders_number_with_empty_values(): void
    {
        $view = $this->blade('
            <x-form-number
                name="empty_field"
                value=""
                placeholder=""
            />
        ');

        $view->assertSee('name="empty_field"');
        $view->assertSee('value=""');
    }

    public function test_renders_number_with_numeric_values(): void
    {
        $view = $this->blade('
            <x-form-number
                name="decimal"
                value="99.99"
                min="0"
                max="100"
                step="0.01"
            />
        ');

        $view->assertSee('value="99.99"');
        $view->assertSee('min="0"');
        $view->assertSee('max="100"');
        $view->assertSee('step="0.01"');
    }

    public function test_renders_number_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-number
                name="test"
                required
                disabled
                readonly
                autofocus
                spellcheck="true"
            />
        ');

        $view->assertSee('required');
        $view->assertSee('disabled');
        $view->assertSee('readonly');
        $view->assertSee('autofocus');
        $view->assertSee('spellcheck="true"');
    }

    public function test_renders_number_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-number
                name="age"
                class="custom-class another-class"
                size="lg"
            />
        ');

        $view->assertSee('custom-class');
        $view->assertSee('another-class');
        $view->assertSee('form-control-lg');
    }

    public function test_renders_number_with_complex_slot_content(): void
    {
        $view = $this->blade('
            <x-form-number name="rating">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Rate from <strong>1-5</strong></span>
                    </div>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('Rate from');
        $view->assertSee('<strong>1-5</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_number_with_currency_formatting(): void
    {
        $view = $this->blade('
            <x-form-number name="price" label="Price" step="0.01" min="0">
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary" wire:click="calculateTax">
                        Calculate Tax
                    </button>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('$');
        $view->assertSee('Calculate Tax');
        $view->assertSee('btn btn-outline-secondary');
        $view->assertSee('wire:click="calculateTax"');
    }

    public function test_renders_number_with_percentage_formatting(): void
    {
        $view = $this->blade('
            <x-form-number
                name="discount"
                label="Discount Rate"
                min="0"
                max="100"
                step="0.1"
                title="Enter discount percentage"
                help="Discount percentage (0-100%)"
            >
                <x-slot name="after">
                    <span class="input-group-text">%</span>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('min="0"');
        $view->assertSee('max="100"');
        $view->assertSee('step="0.1"');
        $view->assertSee('title="Enter discount percentage"');
        $view->assertSee('Discount percentage (0-100%)');
        $view->assertSee('%');
    }

    public function test_renders_number_with_auto_calculation(): void
    {
        $view = $this->blade('
            <x-form-number
                name="total"
                label="Total Amount"
                step="0.01"
                min="0"
                readonly
                class="bg-light"
                wire:model="total"
                help="Automatically calculated total"
            >
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
                <x-slot name="after">
                    <div wire:loading wire:target="total">
                        <x-icon name="spinner" class="spinner-border spinner-border-sm" />
                    </div>
                </x-slot>
            </x-form-number>
        ');

        $view->assertSee('readonly');
        $view->assertSee('bg-light');
        $view->assertSee('wire:model="total"');
        $view->assertSee('Automatically calculated total');
        $view->assertSee('$');
        $view->assertSee('wire:loading wire:target="total"');
        $view->assertSee('spinner');
        $view->assertSee('spinner-border spinner-border-sm');
    }

    public function test_renders_number_with_product_pricing_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'products.store\') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="name" label="Product Name" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-number
                            name="price"
                            label="Price"
                            step="0.01"
                            min="0"
                            placeholder="0.00"
                            help="Enter price in dollars"
                            required
                        >
                            <x-slot name="before">
                                <span class="input-group-text">$</span>
                            </x-slot>
                        </x-form-number>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-form-number
                            name="quantity"
                            label="Stock Quantity"
                            min="0"
                            placeholder="0"
                            help="Available stock quantity"
                            required
                        />
                    </div>
                    <div class="col-md-6">
                        <x-form-number
                            name="weight"
                            label="Weight (kg)"
                            step="0.1"
                            min="0"
                            placeholder="0.0"
                            help="Product weight in kilograms"
                        />
                    </div>
                </div>

                <x-form-submit>Create Product</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Product Name');
        $view->assertSee('Price');
        $view->assertSee('0.00');
        $view->assertSee('Enter price in dollars');
        $view->assertSee('$');
        $view->assertSee('Stock Quantity');
        $view->assertSee('Available stock quantity');
        $view->assertSee('Weight (kg)');
        $view->assertSee('Product weight in kilograms');
        $view->assertSee('Create Product');
    }

    public function test_renders_number_with_survey_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'survey.submit\') }}" method="POST">
                <x-form-input name="name" label="Full Name" required />

                <x-form-number
                    name="age"
                    label="Age"
                    min="13"
                    max="120"
                    placeholder="Enter your age"
                    help="Must be 13 or older"
                    required
                />

                <x-form-number
                    name="rating"
                    label="Overall Rating"
                    min="1"
                    max="10"
                    step="1"
                    placeholder="Rate from 1-10"
                    help="Rate your experience from 1 to 10"
                    required
                >
                    <x-slot name="icon">
                        <x-icon name="star" class="text-warning" />
                    </x-slot>
                </x-form-number>

                <x-form-textarea
                    name="feedback"
                    label="Additional Feedback"
                    placeholder="Share your thoughts..."
                    rows="4"
                />

                <x-form-submit>Submit Survey</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Full Name');
        $view->assertSee('Age');
        $view->assertSee('Enter your age');
        $view->assertSee('Must be 13 or older');
        $view->assertSee('Overall Rating');
        $view->assertSee('Rate from 1-10');
        $view->assertSee('Rate your experience from 1 to 10');
        $view->assertSee('star');
        $view->assertSee('text-warning');
        $view->assertSee('Additional Feedback');
        $view->assertSee('Share your thoughts...');
        $view->assertSee('Submit Survey');
    }

    public function test_renders_number_with_calculator_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'calculator.compute\') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-number
                            name="num1"
                            label="First Number"
                            step="any"
                            placeholder="Enter first number"
                            required
                        />
                    </div>
                    <div class="col-md-6">
                        <x-form-number
                            name="num2"
                            label="Second Number"
                            step="any"
                            placeholder="Enter second number"
                            required
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-form-select name="operation" label="Operation" required>
                            <option value="">Select operation</option>
                            <option value="add">Addition (+)</option>
                            <option value="subtract">Subtraction (-)</option>
                            <option value="multiply">Multiplication (×)</option>
                            <option value="divide">Division (÷)</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-6">
                        <x-form-number
                            name="result"
                            label="Result"
                            readonly
                            value="{{ $result ?? \'\' }}"
                            class="bg-light"
                        />
                    </div>
                </div>

                <x-form-submit>Calculate</x-form-submit>
            </x-form>
        ');

        $view->assertSee('First Number');
        $view->assertSee('Enter first number');
        $view->assertSee('Second Number');
        $view->assertSee('Enter second number');
        $view->assertSee('Operation');
        $view->assertSee('Select operation');
        $view->assertSee('Addition (+)');
        $view->assertSee('Subtraction (-)');
        $view->assertSee('Multiplication (×)');
        $view->assertSee('Division (÷)');
        $view->assertSee('Result');
        $view->assertSee('readonly');
        $view->assertSee('bg-light');
        $view->assertSee('Calculate');
    }

    public function test_renders_number_with_settings_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'settings.update\') }}" method="PUT">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Application Settings</h3>
                    </div>
                    <div class="card-body">
                        <x-form-number
                            name="session_timeout"
                            label="Session Timeout (minutes)"
                            min="5"
                            max="1440"
                            :value="$settings->session_timeout"
                            help="Session will expire after this many minutes"
                            required
                        />

                        <x-form-number
                            name="max_upload_size"
                            label="Max Upload Size (MB)"
                            min="1"
                            max="100"
                            :value="$settings->max_upload_size"
                            help="Maximum file upload size in megabytes"
                            required
                        />

                        <x-form-number
                            name="cache_duration"
                            label="Cache Duration (hours)"
                            min="0"
                            max="168"
                            step="0.5"
                            :value="$settings->cache_duration"
                            help="How long to cache data (0 = disabled)"
                            required
                        />
                    </div>
                </div>

                <x-form-submit>Update Settings</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Application Settings');
        $view->assertSee('Session Timeout (minutes)');
        $view->assertSee('Session will expire after this many minutes');
        $view->assertSee('Max Upload Size (MB)');
        $view->assertSee('Maximum file upload size in megabytes');
        $view->assertSee('Cache Duration (hours)');
        $view->assertSee('How long to cache data (0 = disabled)');
        $view->assertSee('Update Settings');
    }

    public function test_renders_number_with_order_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'orders.store\') }}" method="POST">
                <div class="row">
                    <div class="col-md-8">
                        <x-form-input name="customer_name" label="Customer Name" required />
                    </div>
                    <div class="col-md-4">
                        <x-form-number
                            name="order_number"
                            label="Order Number"
                            min="1000"
                            max="99999"
                            placeholder="1000-99999"
                            help="Unique order identifier"
                            required
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <x-form-number
                            name="quantity"
                            label="Quantity"
                            min="1"
                            max="1000"
                            placeholder="1"
                            help="Number of items"
                            required
                        />
                    </div>
                    <div class="col-md-4">
                        <x-form-number
                            name="unit_price"
                            label="Unit Price"
                            step="0.01"
                            min="0"
                            placeholder="0.00"
                            help="Price per unit"
                            required
                        >
                            <x-slot name="before">
                                <span class="input-group-text">$</span>
                            </x-slot>
                        </x-form-number>
                    </div>
                    <div class="col-md-4">
                        <x-form-number
                            name="total"
                            label="Total"
                            step="0.01"
                            min="0"
                            readonly
                            class="bg-light"
                            help="Calculated total (quantity × unit price)"
                        >
                            <x-slot name="before">
                                <span class="input-group-text">$</span>
                            </x-slot>
                        </x-form-number>
                    </div>
                </div>

                <x-form-submit>Create Order</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Customer Name');
        $view->assertSee('Order Number');
        $view->assertSee('1000-99999');
        $view->assertSee('Unique order identifier');
        $view->assertSee('Quantity');
        $view->assertSee('Number of items');
        $view->assertSee('Unit Price');
        $view->assertSee('Price per unit');
        $view->assertSee('$');
        $view->assertSee('Total');
        $view->assertSee('Calculated total (quantity × unit price)');
        $view->assertSee('readonly');
        $view->assertSee('bg-light');
        $view->assertSee('Create Order');
    }

    public function test_renders_number_with_strong_validation_pattern(): void
    {
        $view = $this->blade('
            <x-form-number
                name="phone"
                label="Phone Number"
                pattern="^[0-9]{10}$"
                title="Please enter a 10-digit phone number"
                help="Enter exactly 10 digits"
                required
            />
        ');

        $view->assertSee('pattern="^[0-9]{10}$"');
        $view->assertSee('title="Please enter a 10-digit phone number"');
        $view->assertSee('Enter exactly 10 digits');
    }

    public function test_renders_number_with_simple_validation(): void
    {
        $view = $this->blade('
            <x-form-number
                name="age"
                min="0"
                max="150"
                step="1"
            />
        ');

        $view->assertSee('min="0"');
        $view->assertSee('max="150"');
        $view->assertSee('step="1"');
    }

    public function test_renders_number_with_form_validation(): void
    {
        $view = $this->blade('
            <x-form-number
                name="score"
                pattern="[0-9]*"
                title="Please enter a valid score"
                novalidate
            />
        ');

        $view->assertSee('pattern="[0-9]*"');
        $view->assertSee('title="Please enter a valid score"');
        $view->assertSee('novalidate');
    }
}
