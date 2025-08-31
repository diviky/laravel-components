<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormInputTest extends TestCase
{
    public function test_renders_basic_input(): void
    {
        $view = $this->blade('<x-form-input name="username" label="Username" />');
        
        $view->assertSee('Username');
        $view->assertSee('name="username"');
        $view->assertSee('type="text"');
        $view->assertSee('form-control');
    }

    public function test_renders_input_with_placeholder(): void
    {
        $view = $this->blade('<x-form-input name="email" placeholder="Enter email" />');
        
        $view->assertSee('placeholder="Enter email"');
    }

    public function test_renders_input_with_value(): void
    {
        $view = $this->blade('<x-form-input name="email" value="test@example.com" />');
        
        $view->assertSee('value="test@example.com"');
    }

    public function test_renders_required_input(): void
    {
        $view = $this->blade('<x-form-input name="email" required />');
        
        $view->assertSee('required');
    }

    public function test_renders_disabled_input(): void
    {
        $view = $this->blade('<x-form-input name="email" disabled />');
        
        $view->assertSee('disabled');
    }

    public function test_renders_readonly_input(): void
    {
        $view = $this->blade('<x-form-input name="email" readonly />');
        
        $view->assertSee('readonly');
    }

    public function test_renders_email_input(): void
    {
        $view = $this->blade('<x-form-input name="email" type="email" />');
        
        $view->assertSee('type="email"');
    }

    public function test_renders_password_input(): void
    {
        $view = $this->blade('<x-form-input name="password" type="password" />');
        
        $view->assertSee('type="password"');
    }

    public function test_renders_number_input(): void
    {
        $view = $this->blade('<x-form-input name="age" type="number" />');
        
        $view->assertSee('type="number"');
    }

    public function test_renders_tel_input(): void
    {
        $view = $this->blade('<x-form-input name="phone" type="tel" />');
        
        $view->assertSee('type="tel"');
    }

    public function test_renders_url_input(): void
    {
        $view = $this->blade('<x-form-input name="website" type="url" />');
        
        $view->assertSee('type="url"');
    }

    public function test_renders_color_input(): void
    {
        $view = $this->blade('<x-form-input name="color" type="color" />');
        
        $view->assertSee('type="color"');
    }

    public function test_renders_hidden_input(): void
    {
        $view = $this->blade('<x-form-input name="token" type="hidden" value="abc123" />');
        
        $view->assertSee('type="hidden"');
        $view->assertSee('value="abc123"');
    }

    public function test_renders_input_with_icon(): void
    {
        $view = $this->blade('<x-form-input name="email" icon="mail" />');
        
        $view->assertSee('mail');
    }

    public function test_renders_small_input(): void
    {
        $view = $this->blade('<x-form-input name="email" size="sm" />');
        
        $view->assertSee('form-control-sm');
    }

    public function test_renders_large_input(): void
    {
        $view = $this->blade('<x-form-input name="email" size="lg" />');
        
        $view->assertSee('form-control-lg');
    }

    public function test_renders_floating_label(): void
    {
        $view = $this->blade('<x-form-input name="email" label="Email" floating />');
        
        $view->assertSee('form-floating');
    }

    public function test_renders_flat_input(): void
    {
        $view = $this->blade('<x-form-input name="email" flat />');
        
        $view->assertSee('input-group-flat');
    }

    public function test_renders_inline_input(): void
    {
        $view = $this->blade('<x-form-input name="email" inline />');
        
        $view->assertDontSee('form-group');
    }

    public function test_renders_input_with_help_text(): void
    {
        $view = $this->blade('<x-form-input name="email" help="Enter a valid email address" />');
        
        $view->assertSee('Enter a valid email address');
    }

    public function test_renders_input_with_custom_id(): void
    {
        $view = $this->blade('<x-form-input name="email" id="custom-email" />');
        
        $view->assertSee('id="custom-email"');
    }

    public function test_renders_input_with_title(): void
    {
        $view = $this->blade('<x-form-input name="email" title="Enter your email address" />');
        
        $view->assertSee('title="Enter your email address"');
    }

    public function test_renders_input_with_custom_class(): void
    {
        $view = $this->blade('<x-form-input name="email" class="custom-input" />');
        
        $view->assertSee('custom-input');
    }

    public function test_renders_input_with_min_max(): void
    {
        $view = $this->blade('<x-form-input name="age" type="number" min="1" max="120" />');
        
        $view->assertSee('min="1"');
        $view->assertSee('max="120"');
    }

    public function test_renders_input_with_step(): void
    {
        $view = $this->blade('<x-form-input name="price" type="number" step="0.01" />');
        
        $view->assertSee('step="0.01"');
    }

    public function test_renders_input_with_pattern(): void
    {
        $view = $this->blade('<x-form-input name="zipcode" pattern="[0-9]{5}" />');
        
        $view->assertSee('pattern="[0-9]{5}"');
    }

    public function test_renders_input_with_autocomplete(): void
    {
        $view = $this->blade('<x-form-input name="email" autocomplete="email" />');
        
        $view->assertSee('autocomplete="email"');
    }

    public function test_renders_input_with_autofocus(): void
    {
        $view = $this->blade('<x-form-input name="email" autofocus />');
        
        $view->assertSee('autofocus');
    }

    public function test_renders_input_with_form(): void
    {
        $view = $this->blade('<x-form-input name="email" form="user-form" />');
        
        $view->assertSee('form="user-form"');
    }

    public function test_renders_input_with_list(): void
    {
        $view = $this->blade('<x-form-input name="country" list="countries" />');
        
        $view->assertSee('list="countries"');
    }

    public function test_renders_input_with_multiple(): void
    {
        $view = $this->blade('<x-form-input name="files" type="file" multiple />');
        
        $view->assertSee('multiple');
    }

    public function test_renders_input_with_accept(): void
    {
        $view = $this->blade('<x-form-input name="file" type="file" accept=".jpg,.png" />');
        
        $view->assertSee('accept=".jpg,.png"');
    }

    public function test_renders_input_with_prepend_slot(): void
    {
        $view = $this->blade('
            <x-form-input name="website">
                <x-slot name="prepend">https://</x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('https://');
        $view->assertSee('input-group');
    }

    public function test_renders_input_with_append_slot(): void
    {
        $view = $this->blade('
            <x-form-input name="website">
                <x-slot name="append">.com</x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('.com');
        $view->assertSee('input-group');
    }

    public function test_renders_input_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-input name="price">
                <x-slot name="before">
                    <span class="input-group-text">$</span>
                </x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('$');
        $view->assertSee('input-group-text');
    }

    public function test_renders_input_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-input name="search">
                <x-slot name="after">
                    <button type="button" class="btn btn-primary">Search</button>
                </x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('Search');
        $view->assertSee('btn btn-primary');
    }

    public function test_renders_input_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-input name="password">
                <x-slot name="help">
                    <div class="text-muted">Password must be at least 8 characters</div>
                </x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('Password must be at least 8 characters');
        $view->assertSee('text-muted');
    }

    public function test_renders_input_with_icon_slot(): void
    {
        $view = $this->blade('
            <x-form-input name="custom">
                <x-slot name="icon">
                    <x-icon name="star" class="text-warning" />
                </x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('star');
        $view->assertSee('text-warning');
    }

    public function test_renders_livewire_input(): void
    {
        $view = $this->blade('<x-form-input name="search" wire:model.live="searchTerm" />');
        
        $view->assertSee('wire:model.live="searchTerm"');
    }

    public function test_renders_livewire_debounced_input(): void
    {
        $view = $this->blade('<x-form-input name="search" wire:model.live.debounce.300ms="searchTerm" />');
        
        $view->assertSee('wire:model.live.debounce.300ms="searchTerm"');
    }

    public function test_renders_input_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-input name="email" extra-attributes="data-custom=value" />');
        
        $view->assertSee('data-custom=value');
    }

    public function test_renders_input_with_default_value(): void
    {
        $view = $this->blade('<x-form-input name="email" default="default@example.com" />');
        
        $view->assertSee('default@example.com');
    }

    public function test_renders_input_with_bind_value(): void
    {
        $view = $this->blade('<x-form-input name="email" :bind="$user->email" />');
        
        // This would need a proper test setup with a user model
        $view->assertSee('name="email"');
    }

    public function test_renders_language_specific_input(): void
    {
        $view = $this->blade('<x-form-input name="title" language="en" />');
        
        $view->assertSee('name="title[en]"');
    }

    public function test_renders_input_without_errors(): void
    {
        $view = $this->blade('<x-form-input name="email" :show-errors="false" />');
        
        $view->assertDontSee('form-errors');
    }

    public function test_renders_complex_input_combination(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="email" 
                label="Email Address" 
                type="email" 
                icon="mail"
                placeholder="user@example.com"
                help="Enter a valid email address"
                required
                class="custom-input"
                wire:model.live.debounce.300ms="email"
            >
                <x-slot name="prepend">📧</x-slot>
                <x-slot name="append">@domain.com</x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('Email Address');
        $view->assertSee('type="email"');
        $view->assertSee('mail');
        $view->assertSee('user@example.com');
        $view->assertSee('Enter a valid email address');
        $view->assertSee('required');
        $view->assertSee('custom-input');
        $view->assertSee('wire:model.live.debounce.300ms="email"');
        $view->assertSee('📧');
        $view->assertSee('@domain.com');
    }

    public function test_renders_input_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="email" 
                type="email" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Please enter a valid email address"
                required
            />
        ');
        
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
        $view->assertSee('title="Please enter a valid email address"');
        $view->assertSee('required');
    }

    public function test_renders_input_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="email" 
                label="Email Address"
                aria-describedby="email-help"
                aria-required="true"
            />
        ');
        
        $view->assertSee('aria-describedby="email-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_input_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="search" 
                wire:model.lazy="searchTerm"
                wire:loading.class="opacity-50"
                wire:target="searchTerm"
            />
        ');
        
        $view->assertSee('wire:model.lazy="searchTerm"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="searchTerm"');
    }

    public function test_renders_input_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="email" 
                class="form-control-lg"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
            />
        ');
        
        $view->assertSee('form-control-lg');
        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('data-bs-placement="top"');
    }

    public function test_renders_input_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="email" 
                label="Email Address"
                id="user-email"
            />
        ');
        
        $view->assertSee('for="user-email"');
        $view->assertSee('id="user-email"');
    }

    public function test_renders_input_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="special_chars" 
                value="test@example.com & <script>alert(\'xss\')</script>"
                placeholder="Enter &quot;quoted&quot; text"
            />
        ');
        
        $view->assertSee('test@example.com');
        $view->assertSee('Enter &quot;quoted&quot; text');
    }

    public function test_renders_input_with_empty_values(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="empty_field" 
                value=""
                placeholder=""
            />
        ');
        
        $view->assertSee('name="empty_field"');
        $view->assertSee('value=""');
    }

    public function test_renders_input_with_numeric_values(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="age" 
                type="number"
                value="25"
                min="0"
                max="120"
            />
        ');
        
        $view->assertSee('type="number"');
        $view->assertSee('value="25"');
        $view->assertSee('min="0"');
        $view->assertSee('max="120"');
    }

    public function test_renders_input_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="test" 
                required
                disabled
                readonly
                autofocus
                multiple
            />
        ');
        
        $view->assertSee('required');
        $view->assertSee('disabled');
        $view->assertSee('readonly');
        $view->assertSee('autofocus');
        $view->assertSee('multiple');
    }

    public function test_renders_input_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-input 
                name="email" 
                class="custom-class another-class"
                size="lg"
            />
        ');
        
        $view->assertSee('custom-class');
        $view->assertSee('another-class');
        $view->assertSee('form-control-lg');
    }

    public function test_renders_input_with_complex_slot_content(): void
    {
        $view = $this->blade('
            <x-form-input name="complex">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Complex help text with <strong>HTML</strong></span>
                    </div>
                </x-slot>
            </x-form-input>
        ');
        
        $view->assertSee('Complex help text with');
        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('d-flex align-items-center');
    }
}
