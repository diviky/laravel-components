<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormSelectTest extends TestCase
{
    public function test_renders_basic_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" label="Country" :options="[\'us\' => \'United States\', \'uk\' => \'United Kingdom\']" />
        ');
        
        $view->assertSee('Country');
        $view->assertSee('name="country"');
        $view->assertSee('United States');
        $view->assertSee('United Kingdom');
        $view->assertSee('form-select');
    }

    public function test_renders_select_with_placeholder(): void
    {
        $view = $this->blade('
            <x-form-select name="country" placeholder="Select country" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('Select country');
    }

    public function test_renders_select_with_value(): void
    {
        $view = $this->blade('
            <x-form-select name="country" :options="[\'us\' => \'United States\']" value="us" />
        ');
        
        $view->assertSee('selected');
    }

    public function test_renders_required_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" :options="[\'us\' => \'United States\']" required />
        ');
        
        $view->assertSee('required');
    }

    public function test_renders_disabled_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" :options="[\'us\' => \'United States\']" disabled />
        ');
        
        $view->assertSee('disabled');
    }

    public function test_renders_multiple_select(): void
    {
        $view = $this->blade('
            <x-form-select name="skills[]" :options="[\'php\' => \'PHP\', \'js\' => \'JavaScript\']" multiple />
        ');
        
        $view->assertSee('multiple');
        $view->assertSee('name="skills[]"');
    }

    public function test_renders_small_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" size="sm" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('form-select-sm');
    }

    public function test_renders_large_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" size="lg" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('form-select-lg');
    }

    public function test_renders_floating_label_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" label="Country" floating :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('form-floating');
    }

    public function test_renders_flat_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" flat :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('input-group-flat');
    }

    public function test_renders_inline_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" inline :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertDontSee('form-group');
    }

    public function test_renders_select_with_icon(): void
    {
        $view = $this->blade('
            <x-form-select name="country" icon="flag" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('flag');
    }

    public function test_renders_select_with_help_text(): void
    {
        $view = $this->blade('
            <x-form-select name="country" help="Choose your country" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('Choose your country');
    }

    public function test_renders_select_with_custom_id(): void
    {
        $view = $this->blade('
            <x-form-select name="country" id="custom-country" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('id="custom-country"');
    }

    public function test_renders_select_with_title(): void
    {
        $view = $this->blade('
            <x-form-select name="country" title="Select your country" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('title="Select your country"');
    }

    public function test_renders_select_with_custom_class(): void
    {
        $view = $this->blade('
            <x-form-select name="country" class="custom-select" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('custom-select');
    }

    public function test_renders_select_without_plugin(): void
    {
        $view = $this->blade('
            <x-form-select name="country" :plugin="false" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertDontSee('data-select');
    }

    public function test_renders_select_with_prepend_slot(): void
    {
        $view = $this->blade('
            <x-form-select name="currency" :options="[\'usd\' => \'USD\']">
                <x-slot name="prepend">$</x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('$');
        $view->assertSee('input-group');
    }

    public function test_renders_select_with_append_slot(): void
    {
        $view = $this->blade('
            <x-form-select name="currency" :options="[\'usd\' => \'USD\']">
                <x-slot name="append">USD</x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('USD');
        $view->assertSee('input-group');
    }

    public function test_renders_select_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-select name="category" :options="[\'tech\' => \'Technology\']">
                <x-slot name="before">
                    <option value="">-- Select --</option>
                </x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('-- Select --');
    }

    public function test_renders_select_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-select name="category" :options="[\'tech\' => \'Technology\']">
                <x-slot name="after">
                    <option value="other">Other</option>
                </x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('Other');
    }

    public function test_renders_select_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-select name="plan" :options="[\'basic\' => \'Basic\']">
                <x-slot name="help">
                    <div class="text-muted">Choose your plan</div>
                </x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('Choose your plan');
        $view->assertSee('text-muted');
    }

    public function test_renders_select_with_icon_slot(): void
    {
        $view = $this->blade('
            <x-form-select name="custom" :options="[\'option\' => \'Option\']">
                <x-slot name="icon">
                    <x-icon name="star" class="text-warning" />
                </x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('star');
        $view->assertSee('text-warning');
    }

    public function test_renders_livewire_select(): void
    {
        $view = $this->blade('
            <x-form-select name="country" wire:model.live="selectedCountry" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('wire:model.live="selectedCountry"');
    }

    public function test_renders_select_with_extra_attributes(): void
    {
        $view = $this->blade('
            <x-form-select name="country" extra-attributes="data-custom=value" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('data-custom=value');
    }

    public function test_renders_select_with_default_value(): void
    {
        $view = $this->blade('
            <x-form-select name="country" default="us" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('us');
    }

    public function test_renders_select_with_bind_value(): void
    {
        $view = $this->blade('
            <x-form-select name="country" :bind="$user" :options="[\'us\' => \'United States\']" />
        ');
        
        // This would need a proper test setup with a user model
        $view->assertSee('name="country"');
    }

    public function test_renders_select_without_errors(): void
    {
        $view = $this->blade('
            <x-form-select name="country" :show-errors="false" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertDontSee('form-errors');
    }

    public function test_renders_select_with_custom_field_mapping(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="user" 
                :options="[[\'code\' => \'user1\', \'name\' => \'User 1\']]" 
                value-field="code" 
                label-field="name" 
            />
        ');
        
        $view->assertSee('User 1');
    }

    public function test_renders_select_with_disabled_field(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="plan" 
                :options="[[\'id\' => 1, \'name\' => \'Basic\', \'disabled\' => false], [\'id\' => 2, \'name\' => \'Pro\', \'disabled\' => true]]" 
                disabled-field="disabled" 
            />
        ');
        
        $view->assertSee('Basic');
        $view->assertSee('Pro');
    }

    public function test_renders_select_with_children_field(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="category" 
                :options="[\'tech\' => [\'children\' => [[\'id\' => 1, \'name\' => \'Programming\']]]]" 
                children-field="children" 
            />
        ');
        
        $view->assertSee('Programming');
    }

    public function test_renders_select_with_autocomplete(): void
    {
        $view = $this->blade('
            <x-form-select name="country" autocomplete="country-name" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('autocomplete="country-name"');
    }

    public function test_renders_select_with_autofocus(): void
    {
        $view = $this->blade('
            <x-form-select name="country" autofocus :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('autofocus');
    }

    public function test_renders_select_with_form(): void
    {
        $view = $this->blade('
            <x-form-select name="country" form="user-form" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('form="user-form"');
    }

    public function test_renders_select_with_tabindex(): void
    {
        $view = $this->blade('
            <x-form-select name="country" tabindex="0" :options="[\'us\' => \'United States\']" />
        ');
        
        $view->assertSee('tabindex="0"');
    }

    public function test_renders_complex_select_combination(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="country" 
                label="Country" 
                :options="[\'us\' => \'United States\', \'uk\' => \'United Kingdom\']"
                placeholder="Select country"
                help="Choose your country"
                required
                class="custom-select"
                wire:model.live="selectedCountry"
                size="lg"
                icon="flag"
            >
                <x-slot name="prepend">🌍</x-slot>
                <x-slot name="append">Country</x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('Country');
        $view->assertSee('United States');
        $view->assertSee('United Kingdom');
        $view->assertSee('Select country');
        $view->assertSee('Choose your country');
        $view->assertSee('required');
        $view->assertSee('custom-select');
        $view->assertSee('wire:model.live="selectedCountry"');
        $view->assertSee('form-select-lg');
        $view->assertSee('flag');
        $view->assertSee('🌍');
        $view->assertSee('Country');
    }

    public function test_renders_select_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="country" 
                :options="[\'us\' => \'United States\']" 
                required 
                pattern="[A-Z]{2}"
                title="Please select a valid country"
            />
        ');
        
        $view->assertSee('required');
        $view->assertSee('pattern="[A-Z]{2}"');
        $view->assertSee('title="Please select a valid country"');
    }

    public function test_renders_select_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="country" 
                label="Country"
                aria-describedby="country-help"
                aria-required="true"
            />
        ');
        
        $view->assertSee('aria-describedby="country-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_select_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="filter" 
                wire:model.lazy="selectedFilter" 
                wire:loading.class="opacity-50"
                wire:target="selectedFilter"
                :options="[\'all\' => \'All\']"
            />
        ');
        
        $view->assertSee('wire:model.lazy="selectedFilter"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="selectedFilter"');
    }

    public function test_renders_select_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="country" 
                class="form-select-lg"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                :options="[\'us\' => \'United States\']"
            />
        ');
        
        $view->assertSee('form-select-lg');
        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('data-bs-placement="top"');
    }

    public function test_renders_select_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="country" 
                label="Country"
                id="user-country"
                :options="[\'us\' => \'United States\']"
            />
        ');
        
        $view->assertSee('for="user-country"');
        $view->assertSee('id="user-country"');
    }

    public function test_renders_select_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="special_chars" 
                :options="[\'test@example.com\' => \'Test User\']"
                placeholder="Select &quot;user&quot;"
            />
        ');
        
        $view->assertSee('Test User');
        $view->assertSee('Select &quot;user&quot;');
    }

    public function test_renders_select_with_empty_options(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="empty_field" 
                :options="[]"
                placeholder=""
            />
        ');
        
        $view->assertSee('name="empty_field"');
    }

    public function test_renders_select_with_numeric_values(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="age" 
                :options="[\'18\' => \'18+\', \'21\' => \'21+\']"
                value="18"
            />
        ');
        
        $view->assertSee('18+');
        $view->assertSee('21+');
    }

    public function test_renders_select_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="test" 
                required
                disabled
                autofocus
                :options="[\'option\' => \'Option\']"
            />
        ');
        
        $view->assertSee('required');
        $view->assertSee('disabled');
        $view->assertSee('autofocus');
    }

    public function test_renders_select_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="country" 
                class="custom-class another-class"
                size="lg"
                :options="[\'us\' => \'United States\']"
            />
        ');
        
        $view->assertSee('custom-class');
        $view->assertSee('another-class');
        $view->assertSee('form-select-lg');
    }

    public function test_renders_select_with_complex_slot_content(): void
    {
        $view = $this->blade('
            <x-form-select name="complex" :options="[\'option\' => \'Option\']">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Complex help text with <strong>HTML</strong></span>
                    </div>
                </x-slot>
            </x-form-select>
        ');
        
        $view->assertSee('Complex help text with');
        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_select_with_option_groups(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="timezone" 
                :options="[
                    \'America\' => [
                        \'America/New_York\' => \'Eastern Time\',
                        \'America/Chicago\' => \'Central Time\'
                    ],
                    \'Europe\' => [
                        \'Europe/London\' => \'London\',
                        \'Europe/Paris\' => \'Paris\'
                    ]
                ]"
            />
        ');
        
        $view->assertSee('America');
        $view->assertSee('Eastern Time');
        $view->assertSee('Europe');
        $view->assertSee('London');
    }

    public function test_renders_select_with_collection_options(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="user" 
                :options="collect([[\'id\' => 1, \'name\' => \'User 1\'], [\'id\' => 2, \'name\' => \'User 2\']])"
                value-field="id"
                label-field="name"
            />
        ');
        
        $view->assertSee('User 1');
        $view->assertSee('User 2');
    }

    public function test_renders_select_with_ajax_attributes(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="users" 
                data-fetch="/api/users"
                data-method="POST"
                data-form-data="{\"department\": \"sales\"}"
                placeholder="Search users..."
                :options="[]"
            />
        ');
        
        $view->assertSee('data-fetch="/api/users"');
        $view->assertSee('data-method="POST"');
        $view->assertSee('data-form-data');
        $view->assertSee('Search users...');
    }

    public function test_renders_select_with_plugin_attributes(): void
    {
        $view = $this->blade('
            <x-form-select 
                name="tags" 
                data-select
                data-select-search="true"
                data-select-create="true"
                :options="[\'tag1\' => \'Tag 1\']"
            />
        ');
        
        $view->assertSee('data-select');
        $view->assertSee('data-select-search="true"');
        $view->assertSee('data-select-create="true"');
    }
}
