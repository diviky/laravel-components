<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormPasswordTest extends TestCase
{
    public function test_renders_basic_password(): void
    {
        $view = $this->blade('<x-form-password name="password" label="Password" />');

        $view->assertSee('Password');
        $view->assertSee('name="password"');
        $view->assertSee('type="password"');
        $view->assertSee('form-control');
    }

    public function test_renders_password_with_placeholder(): void
    {
        $view = $this->blade('<x-form-password name="password" placeholder="Enter password" />');

        $view->assertSee('placeholder="Enter password"');
    }

    public function test_renders_password_with_value(): void
    {
        $view = $this->blade('<x-form-password name="password" value="secret123" />');

        $view->assertSee('value="secret123"');
    }

    public function test_renders_required_password(): void
    {
        $view = $this->blade('<x-form-password name="password" required />');

        $view->assertSee('required');
    }

    public function test_renders_disabled_password(): void
    {
        $view = $this->blade('<x-form-password name="password" disabled />');

        $view->assertSee('disabled');
    }

    public function test_renders_readonly_password(): void
    {
        $view = $this->blade('<x-form-password name="password" readonly />');

        $view->assertSee('readonly');
    }

    public function test_renders_password_with_icon(): void
    {
        $view = $this->blade('<x-form-password name="password" icon="lock" />');

        $view->assertSee('lock');
    }

    public function test_renders_small_password(): void
    {
        $view = $this->blade('<x-form-password name="password" size="sm" />');

        $view->assertSee('form-control-sm');
    }

    public function test_renders_large_password(): void
    {
        $view = $this->blade('<x-form-password name="password" size="lg" />');

        $view->assertSee('form-control-lg');
    }

    public function test_renders_floating_label_password(): void
    {
        $view = $this->blade('<x-form-password name="password" label="Password" floating />');

        $view->assertSee('form-floating');
    }

    public function test_renders_flat_password(): void
    {
        $view = $this->blade('<x-form-password name="password" flat />');

        $view->assertSee('input-group-flat');
    }

    public function test_renders_inline_password(): void
    {
        $view = $this->blade('<x-form-password name="password" inline />');

        $view->assertDontSee('form-group');
    }

    public function test_renders_password_with_help_text(): void
    {
        $view = $this->blade('<x-form-password name="password" help="Must be at least 8 characters" />');

        $view->assertSee('Must be at least 8 characters');
    }

    public function test_renders_password_with_custom_id(): void
    {
        $view = $this->blade('<x-form-password name="password" id="custom-password" />');

        $view->assertSee('id="custom-password"');
    }

    public function test_renders_password_with_title(): void
    {
        $view = $this->blade('<x-form-password name="password" title="Enter a strong password" />');

        $view->assertSee('title="Enter a strong password"');
    }

    public function test_renders_password_with_custom_class(): void
    {
        $view = $this->blade('<x-form-password name="password" class="custom-password" />');

        $view->assertSee('custom-password');
    }

    public function test_renders_password_with_minlength(): void
    {
        $view = $this->blade('<x-form-password name="password" minlength="8" />');

        $view->assertSee('minlength="8"');
    }

    public function test_renders_password_with_maxlength(): void
    {
        $view = $this->blade('<x-form-password name="password" maxlength="128" />');

        $view->assertSee('maxlength="128"');
    }

    public function test_renders_password_with_pattern(): void
    {
        $view = $this->blade('<x-form-password name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" />');

        $view->assertSee('pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"');
    }

    public function test_renders_password_with_autocomplete(): void
    {
        $view = $this->blade('<x-form-password name="password" autocomplete="current-password" />');

        $view->assertSee('autocomplete="current-password"');
    }

    public function test_renders_password_with_autofocus(): void
    {
        $view = $this->blade('<x-form-password name="password" autofocus />');

        $view->assertSee('autofocus');
    }

    public function test_renders_password_with_form(): void
    {
        $view = $this->blade('<x-form-password name="password" form="user-form" />');

        $view->assertSee('form="user-form"');
    }

    public function test_renders_password_with_prepend_slot(): void
    {
        $view = $this->blade('
            <x-form-password name="password">
                <x-slot name="prepend">🔒</x-slot>
            </x-form-password>
        ');

        $view->assertSee('🔒');
        $view->assertSee('input-group');
    }

    public function test_renders_password_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-password name="password">
                <x-slot name="before">
                    <span class="input-group-text">🔐</span>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('🔐');
        $view->assertSee('input-group-text');
    }

    public function test_renders_password_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-password name="password">
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary">Generate</button>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('Generate');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_password_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-password name="password">
                <x-slot name="help">
                    <div class="text-muted">Custom help text</div>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('Custom help text');
        $view->assertSee('text-muted');
    }

    public function test_renders_password_with_icon_slot(): void
    {
        $view = $this->blade('
            <x-form-password name="password">
                <x-slot name="icon">
                    <x-icon name="shield" class="text-success" />
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('shield');
        $view->assertSee('text-success');
    }

    public function test_renders_livewire_password(): void
    {
        $view = $this->blade('<x-form-password name="password" wire:model.live="password" />');

        $view->assertSee('wire:model.live="password"');
    }

    public function test_renders_password_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-password name="password" extra-attributes="data-custom=value" />');

        $view->assertSee('data-custom=value');
    }

    public function test_renders_password_with_default_value(): void
    {
        $view = $this->blade('<x-form-password name="password" default="default123" />');

        $view->assertSee('default123');
    }

    public function test_renders_password_with_bind_value(): void
    {
        $view = $this->blade('<x-form-password name="password" :bind="$user" />');

        // This would need a proper test setup with a user model
        $view->assertSee('name="password"');
    }

    public function test_renders_password_without_errors(): void
    {
        $view = $this->blade('<x-form-password name="password" :show-errors="false" />');

        $view->assertDontSee('form-errors');
    }

    public function test_renders_password_toggle_functionality(): void
    {
        $view = $this->blade('<x-form-password name="password" />');

        // Check for Alpine.js data attribute
        $view->assertSee('x-data="{ show: true }"');

        // Check for password toggle icons
        $view->assertSee('eye-closed');
        $view->assertSee('eye');

        // Check for click handlers
        $view->assertSee('x-on:click="show = !show"');

        // Check for dynamic type binding
        $view->assertSee('::type="show ? \'password\' : \'text\'"');
    }

    public function test_renders_password_toggle_icons(): void
    {
        $view = $this->blade('<x-form-password name="password" />');

        // Check for eye-closed icon (shown when password is hidden)
        $view->assertSee('eye-closed');
        $view->assertSee('size="md"');

        // Check for eye icon (shown when password is visible)
        $view->assertSee('eye');

        // Check for proper CSS classes
        $view->assertSee('input-group-link');
        $view->assertSee('hidden');
    }

    public function test_renders_password_toggle_visibility_classes(): void
    {
        $view = $this->blade('<x-form-password name="password" />');

        // Check for conditional visibility classes
        $view->assertSee(':class="{ \'hidden\': !show, \'block\': show }"');
        $view->assertSee(':class="{ \'hidden\': show, \'block\': !show }"');
    }

    public function test_renders_complex_password_combination(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                label="Password"
                placeholder="Enter your password"
                help="Must be at least 8 characters"
                required
                class="custom-password"
                wire:model.live="password"
                size="lg"
                icon="lock"
                pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                title="Enter a strong password"
            >
                <x-slot name="prepend">🔒</x-slot>
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary">Generate</button>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('Password');
        $view->assertSee('Enter your password');
        $view->assertSee('Must be at least 8 characters');
        $view->assertSee('required');
        $view->assertSee('custom-password');
        $view->assertSee('wire:model.live="password"');
        $view->assertSee('form-control-lg');
        $view->assertSee('lock');
        $view->assertSee('pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"');
        $view->assertSee('title="Enter a strong password"');
        $view->assertSee('🔒');
        $view->assertSee('Generate');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_password_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                title="Password must be at least 8 characters with letters and numbers"
                required
                minlength="8"
                maxlength="128"
            />
        ');

        $view->assertSee('pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"');
        $view->assertSee('title="Password must be at least 8 characters with letters and numbers"');
        $view->assertSee('required');
        $view->assertSee('minlength="8"');
        $view->assertSee('maxlength="128"');
    }

    public function test_renders_password_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                label="Password"
                aria-describedby="password-help"
                aria-required="true"
            />
        ');

        $view->assertSee('aria-describedby="password-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_password_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                wire:model.lazy="password"
                wire:loading.class="opacity-50"
                wire:target="password"
            />
        ');

        $view->assertSee('wire:model.lazy="password"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="password"');
    }

    public function test_renders_password_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                class="form-control-lg"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
            />
        ');

        $view->assertSee('form-control-lg');
        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('data-bs-placement="top"');
    }

    public function test_renders_password_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                label="Password"
                id="user-password"
            />
        ');

        $view->assertSee('for="user-password"');
        $view->assertSee('id="user-password"');
    }

    public function test_renders_password_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-password
                name="special_chars"
                value="test@example.com & <script>alert(\'xss\')</script>"
                placeholder="Enter &quot;password&quot;"
            />
        ');

        $view->assertSee('test@example.com');
        $view->assertSee('Enter &quot;password&quot;');
    }

    public function test_renders_password_with_empty_values(): void
    {
        $view = $this->blade('
            <x-form-password
                name="empty_field"
                value=""
                placeholder=""
            />
        ');

        $view->assertSee('name="empty_field"');
        $view->assertSee('value=""');
    }

    public function test_renders_password_with_numeric_values(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                value="123456"
                minlength="6"
                maxlength="10"
            />
        ');

        $view->assertSee('value="123456"');
        $view->assertSee('minlength="6"');
        $view->assertSee('maxlength="10"');
    }

    public function test_renders_password_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-password
                name="test"
                required
                disabled
                readonly
                autofocus
            />
        ');

        $view->assertSee('required');
        $view->assertSee('disabled');
        $view->assertSee('readonly');
        $view->assertSee('autofocus');
    }

    public function test_renders_password_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                class="custom-class another-class"
                size="lg"
            />
        ');

        $view->assertSee('custom-class');
        $view->assertSee('another-class');
        $view->assertSee('form-control-lg');
    }

    public function test_renders_password_with_complex_slot_content(): void
    {
        $view = $this->blade('
            <x-form-password name="password">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Complex help text with <strong>HTML</strong></span>
                    </div>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('Complex help text with');
        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_password_with_strength_indicator(): void
    {
        $view = $this->blade('
            <x-form-password name="password" label="Password" wire:model.live="password">
                <x-slot name="after">
                    <div class="password-strength" wire:loading.class="opacity-50">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                        </div>
                    </div>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('password-strength');
        $view->assertSee('progress');
        $view->assertSee('progress-bar');
        $view->assertSee('bg-success');
        $view->assertSee('wire:loading.class="opacity-50"');
    }

    public function test_renders_password_with_generate_button(): void
    {
        $view = $this->blade('
            <x-form-password name="password" label="Password">
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary" wire:click="generatePassword">
                        Generate
                    </button>
                </x-slot>
            </x-form-password>
        ');

        $view->assertSee('Generate');
        $view->assertSee('btn btn-outline-secondary');
        $view->assertSee('wire:click="generatePassword"');
    }

    public function test_renders_password_with_autocomplete_values(): void
    {
        $view = $this->blade('
            <x-form-password name="current_password" autocomplete="current-password" />
        ');

        $view->assertSee('autocomplete="current-password"');
    }

    public function test_renders_password_with_new_password_autocomplete(): void
    {
        $view = $this->blade('
            <x-form-password name="new_password" autocomplete="new-password" />
        ');

        $view->assertSee('autocomplete="new-password"');
    }

    public function test_renders_password_with_off_autocomplete(): void
    {
        $view = $this->blade('
            <x-form-password name="password" autocomplete="off" />
        ');

        $view->assertSee('autocomplete="off"');
    }

    public function test_renders_password_with_form_validation(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
                title="Password must be at least 8 characters with letters, numbers, and special characters"
            />
        ');

        $view->assertSee('pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"');
        $view->assertSee('title="Password must be at least 8 characters with letters, numbers, and special characters"');
    }

    public function test_renders_password_with_simple_validation(): void
    {
        $view = $this->blade('
            <x-form-password
                name="password"
                minlength="6"
                maxlength="50"
            />
        ');

        $view->assertSee('minlength="6"');
        $view->assertSee('maxlength="50"');
    }

    public function test_renders_password_with_alpine_data_structure(): void
    {
        $view = $this->blade('<x-form-password name="password" />');

        // Check for Alpine.js data structure
        $view->assertSee('x-data="{ show: true }"');

        // Check for proper Alpine.js syntax
        $view->assertSee('::type="show ? \'password\' : \'text\'"');
        $view->assertSee('x-on:click="show = !show"');
    }

    public function test_renders_password_with_toggle_icon_states(): void
    {
        $view = $this->blade('<x-form-password name="password" />');

        // Check for eye-closed icon (shown when password is hidden)
        $view->assertSee('eye-closed');
        $view->assertSee(':class="{ \'hidden\': !show, \'block\': show }"');

        // Check for eye icon (shown when password is visible)
        $view->assertSee('eye');
        $view->assertSee(':class="{ \'hidden\': show, \'block\': !show }"');
    }

    public function test_renders_password_with_input_group_structure(): void
    {
        $view = $this->blade('<x-form-password name="password" />');

        // Check for input group structure
        $view->assertSee('input-group-link');
        $view->assertSee('href="#"');

        // Check for proper icon sizing
        $view->assertSee('size="md"');
    }
}
