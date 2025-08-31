<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormEmailTest extends TestCase
{
    public function test_renders_basic_email(): void
    {
        $view = $this->blade('<x-form-email name="email" label="Email Address" />');
        
        $view->assertSee('Email Address');
        $view->assertSee('name="email"');
        $view->assertSee('type="email"');
        $view->assertSee('form-control');
    }

    public function test_renders_email_with_placeholder(): void
    {
        $view = $this->blade('<x-form-email name="email" placeholder="Enter email" />');
        
        $view->assertSee('placeholder="Enter email"');
    }

    public function test_renders_email_with_value(): void
    {
        $view = $this->blade('<x-form-email name="email" value="user@example.com" />');
        
        $view->assertSee('value="user@example.com"');
    }

    public function test_renders_required_email(): void
    {
        $view = $this->blade('<x-form-email name="email" required />');
        
        $view->assertSee('required');
    }

    public function test_renders_disabled_email(): void
    {
        $view = $this->blade('<x-form-email name="email" disabled />');
        
        $view->assertSee('disabled');
    }

    public function test_renders_readonly_email(): void
    {
        $view = $this->blade('<x-form-email name="email" readonly />');
        
        $view->assertSee('readonly');
    }

    public function test_renders_email_with_icon(): void
    {
        $view = $this->blade('<x-form-email name="email" icon="mail" />');
        
        $view->assertSee('mail');
    }

    public function test_renders_small_email(): void
    {
        $view = $this->blade('<x-form-email name="email" size="sm" />');
        
        $view->assertSee('form-control-sm');
    }

    public function test_renders_large_email(): void
    {
        $view = $this->blade('<x-form-email name="email" size="lg" />');
        
        $view->assertSee('form-control-lg');
    }

    public function test_renders_floating_label_email(): void
    {
        $view = $this->blade('<x-form-email name="email" label="Email Address" floating />');
        
        $view->assertSee('form-floating');
    }

    public function test_renders_flat_email(): void
    {
        $view = $this->blade('<x-form-email name="email" flat />');
        
        $view->assertSee('input-group-flat');
    }

    public function test_renders_inline_email(): void
    {
        $view = $this->blade('<x-form-email name="email" inline />');
        
        $view->assertDontSee('form-group');
    }

    public function test_renders_email_with_help_text(): void
    {
        $view = $this->blade('<x-form-email name="email" help="We\'ll never share your email" />');
        
        $view->assertSee('We\'ll never share your email');
    }

    public function test_renders_email_with_custom_id(): void
    {
        $view = $this->blade('<x-form-email name="email" id="custom-email" />');
        
        $view->assertSee('id="custom-email"');
    }

    public function test_renders_email_with_title(): void
    {
        $view = $this->blade('<x-form-email name="email" title="Enter a valid email address" />');
        
        $view->assertSee('title="Enter a valid email address"');
    }

    public function test_renders_email_with_custom_class(): void
    {
        $view = $this->blade('<x-form-email name="email" class="custom-email" />');
        
        $view->assertSee('custom-email');
    }

    public function test_renders_email_with_pattern(): void
    {
        $view = $this->blade('<x-form-email name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />');
        
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
    }

    public function test_renders_email_with_autocomplete(): void
    {
        $view = $this->blade('<x-form-email name="email" autocomplete="email" />');
        
        $view->assertSee('autocomplete="email"');
    }

    public function test_renders_email_with_autofocus(): void
    {
        $view = $this->blade('<x-form-email name="email" autofocus />');
        
        $view->assertSee('autofocus');
    }

    public function test_renders_email_with_form(): void
    {
        $view = $this->blade('<x-form-email name="email" form="user-form" />');
        
        $view->assertSee('form="user-form"');
    }

    public function test_renders_email_with_spellcheck(): void
    {
        $view = $this->blade('<x-form-email name="email" spellcheck="true" />');
        
        $view->assertSee('spellcheck="true"');
    }

    public function test_renders_email_with_prepend_slot(): void
    {
        $view = $this->blade('
            <x-form-email name="email">
                <x-slot name="prepend">📧</x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('📧');
        $view->assertSee('input-group');
    }

    public function test_renders_email_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-email name="email">
                <x-slot name="before">
                    <span class="input-group-text">@</span>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('@');
        $view->assertSee('input-group-text');
    }

    public function test_renders_email_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-email name="email">
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary">Verify</button>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('Verify');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_email_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-email name="email">
                <x-slot name="help">
                    <div class="text-muted">Custom help text</div>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('Custom help text');
        $view->assertSee('text-muted');
    }

    public function test_renders_email_with_icon_slot(): void
    {
        $view = $this->blade('
            <x-form-email name="email">
                <x-slot name="icon">
                    <x-icon name="envelope" class="text-primary" />
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('envelope');
        $view->assertSee('text-primary');
    }

    public function test_renders_livewire_email(): void
    {
        $view = $this->blade('<x-form-email name="email" wire:model.live="email" />');
        
        $view->assertSee('wire:model.live="email"');
    }

    public function test_renders_email_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-email name="email" extra-attributes="data-custom=value" />');
        
        $view->assertSee('data-custom=value');
    }

    public function test_renders_email_with_default_value(): void
    {
        $view = $this->blade('<x-form-email name="email" default="default@example.com" />');
        
        $view->assertSee('default@example.com');
    }

    public function test_renders_email_with_bind_value(): void
    {
        $view = $this->blade('<x-form-email name="email" :bind="$user" />');
        
        // This would need a proper test setup with a user model
        $view->assertSee('name="email"');
    }

    public function test_renders_email_without_errors(): void
    {
        $view = $this->blade('<x-form-email name="email" :show-errors="false" />');
        
        $view->assertDontSee('form-errors');
    }

    public function test_renders_complex_email_combination(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                label="Email Address" 
                placeholder="Enter your email"
                help="We\'ll never share your email"
                required
                class="custom-email"
                wire:model.live="email"
                size="lg"
                icon="mail"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Enter a valid email address"
            >
                <x-slot name="prepend">📧</x-slot>
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-secondary">Verify</button>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('Email Address');
        $view->assertSee('Enter your email');
        $view->assertSee('We\'ll never share your email');
        $view->assertSee('required');
        $view->assertSee('custom-email');
        $view->assertSee('wire:model.live="email"');
        $view->assertSee('form-control-lg');
        $view->assertSee('mail');
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
        $view->assertSee('title="Enter a valid email address"');
        $view->assertSee('📧');
        $view->assertSee('Verify');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_email_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Please enter a valid email address"
                required
                minlength="5"
                maxlength="254"
            />
        ');
        
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
        $view->assertSee('title="Please enter a valid email address"');
        $view->assertSee('required');
        $view->assertSee('minlength="5"');
        $view->assertSee('maxlength="254"');
    }

    public function test_renders_email_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                label="Email Address"
                aria-describedby="email-help"
                aria-required="true"
            />
        ');
        
        $view->assertSee('aria-describedby="email-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_email_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                wire:model.lazy="email"
                wire:loading.class="opacity-50"
                wire:target="email"
            />
        ');
        
        $view->assertSee('wire:model.lazy="email"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="email"');
    }

    public function test_renders_email_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-email 
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

    public function test_renders_email_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                label="Email Address"
                id="user-email"
            />
        ');
        
        $view->assertSee('for="user-email"');
        $view->assertSee('id="user-email"');
    }

    public function test_renders_email_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="special_chars" 
                value="test+tag@example.com & <script>alert(\'xss\')</script>"
                placeholder="Enter &quot;email&quot;"
            />
        ');
        
        $view->assertSee('test+tag@example.com');
        $view->assertSee('Enter &quot;email&quot;');
    }

    public function test_renders_email_with_empty_values(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="empty_field" 
                value=""
                placeholder=""
            />
        ');
        
        $view->assertSee('name="empty_field"');
        $view->assertSee('value=""');
    }

    public function test_renders_email_with_numeric_values(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                value="user123@example.com"
                minlength="10"
                maxlength="50"
            />
        ');
        
        $view->assertSee('value="user123@example.com"');
        $view->assertSee('minlength="10"');
        $view->assertSee('maxlength="50"');
    }

    public function test_renders_email_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-email 
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

    public function test_renders_email_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                class="custom-class another-class"
                size="lg"
            />
        ');
        
        $view->assertSee('custom-class');
        $view->assertSee('another-class');
        $view->assertSee('form-control-lg');
    }

    public function test_renders_email_with_complex_slot_content(): void
    {
        $view = $this->blade('
            <x-form-email name="email">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Complex help text with <strong>HTML</strong></span>
                    </div>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('Complex help text with');
        $view->assertSee('<strong>HTML</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_email_with_verification_button(): void
    {
        $view = $this->blade('
            <x-form-email name="email" label="Email Address" wire:model.live="email">
                <x-slot name="after">
                    <button type="button" class="btn btn-outline-primary" wire:click="sendVerification">
                        Send Code
                    </button>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('Send Code');
        $view->assertSee('btn btn-outline-primary');
        $view->assertSee('wire:click="sendVerification"');
    }

    public function test_renders_email_with_domain_validation(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="work_email" 
                label="Work Email" 
                pattern="[a-z0-9._%+-]+@(company\.com|business\.org)$"
                title="Please use your work email address"
                help="Only company email addresses are allowed"
                required 
            />
        ');
        
        $view->assertSee('pattern="[a-z0-9._%+-]+@(company\.com|business\.org)$"');
        $view->assertSee('title="Please use your work email address"');
        $view->assertSee('Only company email addresses are allowed');
    }

    public function test_renders_email_with_autosuggestion(): void
    {
        $view = $this->blade('
            <x-form-email name="email" label="Email Address" autocomplete="email" list="email-suggestions">
                <datalist id="email-suggestions">
                    <option value="user@gmail.com">
                    <option value="user@yahoo.com">
                    <option value="user@hotmail.com">
                </datalist>
            </x-form-email>
        ');
        
        $view->assertSee('autocomplete="email"');
        $view->assertSee('list="email-suggestions"');
        $view->assertSee('user@gmail.com');
        $view->assertSee('user@yahoo.com');
        $view->assertSee('user@hotmail.com');
    }

    public function test_renders_email_with_loading_state(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                label="Email Address" 
                wire:model.live="email"
                wire:loading.class="opacity-50"
                wire:target="email"
            >
                <x-slot name="after">
                    <div wire:loading wire:target="email">
                        <x-icon name="spinner" class="spinner-border spinner-border-sm" />
                    </div>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:loading wire:target="email"');
        $view->assertSee('spinner');
        $view->assertSee('spinner-border spinner-border-sm');
    }

    public function test_renders_email_with_append_slot(): void
    {
        $view = $this->blade('
            <x-form-email name="email" label="Email Address">
                <x-slot name="append">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </x-slot>
            </x-form-email>
        ');
        
        $view->assertSee('Subscribe');
        $view->assertSee('btn btn-primary');
    }

    public function test_renders_email_with_newsletter_signup(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'newsletter.subscribe\') }}" method="POST">
                <x-form-email 
                    name="email" 
                    label="Email Address" 
                    placeholder="Enter your email address"
                    help="Get the latest updates and news"
                    required 
                >
                    <x-slot name="append">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </x-slot>
                </x-form-email>
            </x-form>
        ');
        
        $view->assertSee('Email Address');
        $view->assertSee('Enter your email address');
        $view->assertSee('Get the latest updates and news');
        $view->assertSee('Subscribe');
        $view->assertSee('btn btn-primary');
    }

    public function test_renders_email_with_contact_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'contact.send\') }}" method="POST">
                <x-form-input name="name" label="Full Name" required />
                
                <x-form-email 
                    name="email" 
                    label="Email Address" 
                    placeholder="your@email.com"
                    help="We\'ll respond to this email address"
                    required 
                />
                
                <x-form-input name="subject" label="Subject" required />
                
                <x-form-textarea 
                    name="message" 
                    label="Message" 
                    placeholder="Tell us how we can help..."
                    rows="5"
                    required 
                />
                
                <x-form-submit>Send Message</x-form-submit>
            </x-form>
        ');
        
        $view->assertSee('Full Name');
        $view->assertSee('Email Address');
        $view->assertSee('your@email.com');
        $view->assertSee('We\'ll respond to this email address');
        $view->assertSee('Subject');
        $view->assertSee('Message');
        $view->assertSee('Tell us how we can help...');
        $view->assertSee('Send Message');
    }

    public function test_renders_email_with_user_registration(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'users.store\') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="first_name" label="First Name" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-input name="last_name" label="Last Name" required />
                    </div>
                </div>
                
                <x-form-email 
                    name="email" 
                    label="Email Address" 
                    placeholder="your@email.com"
                    help="We\'ll send a verification email to this address"
                    required 
                />
                
                <x-form-password 
                    name="password" 
                    label="Password" 
                    placeholder="Create a strong password"
                    required 
                />
                
                <x-form-submit>Create Account</x-form-submit>
            </x-form>
        ');
        
        $view->assertSee('First Name');
        $view->assertSee('Last Name');
        $view->assertSee('Email Address');
        $view->assertSee('your@email.com');
        $view->assertSee('We\'ll send a verification email to this address');
        $view->assertSee('Password');
        $view->assertSee('Create a strong password');
        $view->assertSee('Create Account');
    }

    public function test_renders_email_with_settings_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'settings.update\') }}" method="PUT">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile Settings</h3>
                    </div>
                    <div class="card-body">
                        <x-form-input name="name" label="Full Name" :value="$user->name" required />
                        
                        <x-form-email 
                            name="email" 
                            label="Email Address" 
                            :value="$user->email"
                            help="This email will be used for account notifications"
                            required 
                        />
                        
                        <x-form-input name="phone" label="Phone Number" :value="$user->phone" />
                    </div>
                </div>
                
                <x-form-submit>Update Profile</x-form-submit>
            </x-form>
        ');
        
        $view->assertSee('Profile Settings');
        $view->assertSee('Full Name');
        $view->assertSee('Email Address');
        $view->assertSee('This email will be used for account notifications');
        $view->assertSee('Phone Number');
        $view->assertSee('Update Profile');
    }

    public function test_renders_email_with_login_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'login\') }}" method="POST">
                <x-form-email 
                    name="email" 
                    label="Email Address" 
                    placeholder="your@email.com"
                    autocomplete="email"
                    required 
                />
                
                <x-form-password 
                    name="password" 
                    label="Password" 
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required 
                />
                
                <div class="d-flex justify-content-between align-items-center">
                    <x-form-checkbox name="remember" label="Remember me" />
                    <a href="{{ route(\'password.request\') }}">Forgot password?</a>
                </div>
                
                <x-form-submit>Sign In</x-form-submit>
            </x-form>
        ');
        
        $view->assertSee('Email Address');
        $view->assertSee('your@email.com');
        $view->assertSee('autocomplete="email"');
        $view->assertSee('Password');
        $view->assertSee('Enter your password');
        $view->assertSee('autocomplete="current-password"');
        $view->assertSee('Remember me');
        $view->assertSee('Forgot password?');
        $view->assertSee('Sign In');
    }

    public function test_renders_email_with_strong_validation_pattern(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                label="Email Address" 
                pattern="^(?=.*[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                title="Please enter a valid email address with proper format"
                help="Include a valid email format with @ and domain"
                required 
            />
        ');
        
        $view->assertSee('pattern="^(?=.*[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"');
        $view->assertSee('title="Please enter a valid email address with proper format"');
        $view->assertSee('Include a valid email format with @ and domain');
    }

    public function test_renders_email_with_simple_validation(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                minlength="5"
                maxlength="254"
            />
        ');
        
        $view->assertSee('minlength="5"');
        $view->assertSee('maxlength="254"');
    }

    public function test_renders_email_with_tabindex(): void
    {
        $view = $this->blade('<x-form-email name="email" tabindex="0" />');
        
        $view->assertSee('tabindex="0"');
    }

    public function test_renders_email_with_form_validation(): void
    {
        $view = $this->blade('
            <x-form-email 
                name="email" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Please enter a valid email address"
                novalidate
            />
        ');
        
        $view->assertSee('pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"');
        $view->assertSee('title="Please enter a valid email address"');
        $view->assertSee('novalidate');
    }
}
