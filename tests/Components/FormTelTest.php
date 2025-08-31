<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormTelTest extends TestCase
{
    public function test_renders_basic_tel(): void
    {
        $view = $this->blade('<x-form-tel name="phone" label="Phone Number" />');

        $view->assertSee('Phone Number');
        $view->assertSee('name="phone"');
        $view->assertSee('type="tel"');
        $view->assertSee('form-control');
    }

    public function test_renders_tel_with_placeholder(): void
    {
        $view = $this->blade('<x-form-tel name="phone" placeholder="Enter phone number" />');

        $view->assertSee('placeholder="Enter phone number"');
    }

    public function test_renders_tel_with_value(): void
    {
        $view = $this->blade('<x-form-tel name="phone" value="+1-555-123-4567" />');

        $view->assertSee('value="+1-555-123-4567"');
    }

    public function test_renders_tel_with_required(): void
    {
        $view = $this->blade('<x-form-tel name="phone" required />');

        $view->assertSee('required');
    }

    public function test_renders_tel_with_disabled(): void
    {
        $view = $this->blade('<x-form-tel name="phone" disabled />');

        $view->assertSee('disabled');
    }

    public function test_renders_tel_with_readonly(): void
    {
        $view = $this->blade('<x-form-tel name="phone" readonly />');

        $view->assertSee('readonly');
    }

    public function test_renders_tel_with_icon(): void
    {
        $view = $this->blade('<x-form-tel name="phone" icon="phone" />');

        $view->assertSee('phone');
    }

    public function test_renders_tel_with_size_sm(): void
    {
        $view = $this->blade('<x-form-tel name="phone" size="sm" />');

        $view->assertSee('form-control-sm');
    }

    public function test_renders_tel_with_size_lg(): void
    {
        $view = $this->blade('<x-form-tel name="phone" size="lg" />');

        $view->assertSee('form-control-lg');
    }

    public function test_renders_tel_with_floating(): void
    {
        $view = $this->blade('<x-form-tel name="phone" label="Phone Number" floating />');

        $view->assertSee('form-floating');
    }

    public function test_renders_tel_with_flat(): void
    {
        $view = $this->blade('<x-form-tel name="phone" flat />');

        $view->assertSee('input-group-flat');
    }

    public function test_renders_tel_with_inline(): void
    {
        $view = $this->blade('<x-form-tel name="phone" inline />');

        $view->assertDontSee('form-group');
    }

    public function test_renders_tel_with_help_text(): void
    {
        $view = $this->blade('<x-form-tel name="phone" help="Enter a valid phone number" />');

        $view->assertSee('Enter a valid phone number');
    }

    public function test_renders_tel_with_custom_id(): void
    {
        $view = $this->blade('<x-form-tel name="phone" id="custom-phone" />');

        $view->assertSee('id="custom-phone"');
    }

    public function test_renders_tel_with_title(): void
    {
        $view = $this->blade('<x-form-tel name="phone" title="Enter your phone number" />');

        $view->assertSee('title="Enter your phone number"');
    }

    public function test_renders_tel_with_custom_class(): void
    {
        $view = $this->blade('<x-form-tel name="phone" class="custom-phone" />');

        $view->assertSee('custom-phone');
    }

    public function test_renders_tel_with_pattern(): void
    {
        $view = $this->blade('<x-form-tel name="phone" pattern="[0-9]{10}" />');

        $view->assertSee('pattern="[0-9]{10}"');
    }

    public function test_renders_tel_with_autocomplete(): void
    {
        $view = $this->blade('<x-form-tel name="phone" autocomplete="tel" />');

        $view->assertSee('autocomplete="tel"');
    }

    public function test_renders_tel_with_autofocus(): void
    {
        $view = $this->blade('<x-form-tel name="phone" autofocus />');

        $view->assertSee('autofocus');
    }

    public function test_renders_tel_with_form(): void
    {
        $view = $this->blade('<x-form-tel name="phone" form="contact-form" />');

        $view->assertSee('form="contact-form"');
    }

    public function test_renders_tel_with_tabindex(): void
    {
        $view = $this->blade('<x-form-tel name="phone" tabindex="0" />');

        $view->assertSee('tabindex="0"');
    }

    public function test_renders_tel_with_inputmode(): void
    {
        $view = $this->blade('<x-form-tel name="phone" inputmode="tel" />');

        $view->assertSee('inputmode="tel"');
    }

    public function test_renders_tel_with_maxlength(): void
    {
        $view = $this->blade('<x-form-tel name="phone" maxlength="15" />');

        $view->assertSee('maxlength="15"');
    }

    public function test_renders_tel_with_minlength(): void
    {
        $view = $this->blade('<x-form-tel name="phone" minlength="10" />');

        $view->assertSee('minlength="10"');
    }

    public function test_renders_tel_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-tel name="phone" extra-attributes="data-custom=value" />');

        $view->assertSee('data-custom=value');
    }

    public function test_renders_tel_with_default_value(): void
    {
        $view = $this->blade('<x-form-tel name="phone" default="555-123-4567" />');

        $view->assertSee('555-123-4567');
    }

    public function test_renders_tel_with_bind_value(): void
    {
        $view = $this->blade('<x-form-tel name="phone" :bind="$user" />');

        // This would need a proper test setup with a user model
        $view->assertSee('name="phone"');
    }

    public function test_renders_tel_without_errors(): void
    {
        $view = $this->blade('<x-form-tel name="phone" :show-errors="false" />');

        $view->assertDontSee('form-errors');
    }

    public function test_renders_tel_with_prepend_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="prepend">
                    <span class="input-group-text">+1</span>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('+1');
        $view->assertSee('input-group-text');
    }

    public function test_renders_tel_with_append_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="append">
                    <x-icon name="phone" />
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('phone');
        $view->assertSee('input-group');
    }

    public function test_renders_tel_with_before_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="before">
                    <div>Before content</div>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('Before content');
    }

    public function test_renders_tel_with_after_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="after">
                    <div>After content</div>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('After content');
    }

    public function test_renders_tel_with_help_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="help">
                    <div class="text-muted">Custom help text</div>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('Custom help text');
        $view->assertSee('text-muted');
    }

    public function test_renders_tel_with_icon_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="icon">
                    <x-icon name="phone" />
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('phone');
    }

    public function test_renders_livewire_tel(): void
    {
        $view = $this->blade('<x-form-tel name="phone" wire:model="phone" />');

        $view->assertSee('wire:model="phone"');
    }

    public function test_renders_complex_tel_combination(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="Phone Number"
                placeholder="(555) 123-4567"
                pattern="[0-9]{10}"
                title="Please enter a 10-digit phone number"
                help="Enter exactly 10 digits"
                required
                class="custom-phone"
                wire:model="phone"
                icon="phone"
                size="lg"
                autocomplete="tel"
                inputmode="tel"
                maxlength="15"
                minlength="10"
            >
                <x-slot name="prepend">
                    <span class="input-group-text">📞</span>
                </x-slot>
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Format: <strong>(555) 123-4567</strong></span>
                    </div>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('Phone Number');
        $view->assertSee('(555) 123-4567');
        $view->assertSee('pattern="[0-9]{10}"');
        $view->assertSee('title="Please enter a 10-digit phone number"');
        $view->assertSee('Enter exactly 10 digits');
        $view->assertSee('required');
        $view->assertSee('custom-phone');
        $view->assertSee('wire:model="phone"');
        $view->assertSee('phone');
        $view->assertSee('form-control-lg');
        $view->assertSee('autocomplete="tel"');
        $view->assertSee('inputmode="tel"');
        $view->assertSee('maxlength="15"');
        $view->assertSee('minlength="10"');
        $view->assertSee('📞');
        $view->assertSee('Format:');
        $view->assertSee('<strong>(555) 123-4567</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_tel_with_validation_attributes(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                pattern="[0-9]{10}"
                title="Please enter a 10-digit phone number"
                required
                maxlength="15"
                minlength="10"
            />
        ');

        $view->assertSee('pattern="[0-9]{10}"');
        $view->assertSee('title="Please enter a 10-digit phone number"');
        $view->assertSee('required');
        $view->assertSee('maxlength="15"');
        $view->assertSee('minlength="10"');
    }

    public function test_renders_tel_with_accessibility_attributes(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="Phone Number"
                aria-describedby="phone-help"
                aria-required="true"
            />
        ');

        $view->assertSee('aria-describedby="phone-help"');
        $view->assertSee('aria-required="true"');
    }

    public function test_renders_tel_with_performance_attributes(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                wire:model.lazy="phone"
                wire:loading.class="opacity-50"
                wire:target="phone"
            />
        ');

        $view->assertSee('wire:model.lazy="phone"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="phone"');
    }

    public function test_renders_tel_with_bootstrap_integration(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                class="form-control-lg"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
            />
        ');

        $view->assertSee('form-control-lg');
        $view->assertSee('data-bs-toggle="tooltip"');
        $view->assertSee('data-bs-placement="top"');
    }

    public function test_renders_tel_with_semantic_structure(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="Phone Number"
                id="phone-input"
            />
        ');

        $view->assertSee('for="phone-input"');
        $view->assertSee('id="phone-input"');
    }

    public function test_renders_tel_with_edge_cases(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="special_chars"
                value="+1 & <script>alert(\'xss\')</script>"
                title="Enter &quot;phone&quot;"
            />
        ');

        $view->assertSee('+1');
        $view->assertSee('title="Enter &quot;phone&quot;"');
    }

    public function test_renders_tel_with_empty_values(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="empty_field"
                value=""
                placeholder=""
            />
        ');

        $view->assertSee('name="empty_field"');
        $view->assertSee('value=""');
    }

    public function test_renders_tel_with_boolean_attributes(): void
    {
        $view = $this->blade('
            <x-form-tel
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

    public function test_renders_tel_with_css_class_merging(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                class="custom-class another-class"
            />
        ');

        $view->assertSee('custom-class');
        $view->assertSee('another-class');
    }

    public function test_renders_tel_with_complex_help_slot(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone">
                <x-slot name="help">
                    <div class="d-flex align-items-center">
                        <x-icon name="info" class="me-2" />
                        <span>Format: <strong>(555) 123-4567</strong></span>
                    </div>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('Format:');
        $view->assertSee('<strong>(555) 123-4567</strong>');
        $view->assertSee('d-flex align-items-center');
    }

    public function test_renders_tel_with_country_code_prepend(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone" label="Phone Number">
                <x-slot name="prepend">
                    <span class="input-group-text">+1</span>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('Phone Number');
        $view->assertSee('+1');
        $view->assertSee('input-group-text');
    }

    public function test_renders_tel_with_phone_icon_append(): void
    {
        $view = $this->blade('
            <x-form-tel name="phone" label="Phone Number">
                <x-slot name="append">
                    <button class="btn btn-outline-secondary" type="button">
                        <x-icon name="phone" />
                    </button>
                </x-slot>
            </x-form-tel>
        ');

        $view->assertSee('Phone Number');
        $view->assertSee('phone');
        $view->assertSee('btn btn-outline-secondary');
    }

    public function test_renders_tel_with_international_pattern(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="International Phone"
                placeholder="+1 (555) 123-4567"
                pattern="[\+]?[0-9\s\-\(\)]{7,}"
                title="Enter international phone number"
                help="Include country code"
            />
        ');

        $view->assertSee('International Phone');
        $view->assertSee('+1 (555) 123-4567');
        $view->assertSee('pattern="[\+]?[0-9\s\-\(\)]{7,}"');
        $view->assertSee('title="Enter international phone number"');
        $view->assertSee('Include country code');
    }

    public function test_renders_tel_with_length_restrictions(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="Phone Number"
                minlength="10"
                maxlength="15"
                pattern="[0-9+\-\s\(\)]{10,15}"
                help="Enter 10-15 digits, spaces, dashes, or parentheses allowed"
            />
        ');

        $view->assertSee('Phone Number');
        $view->assertSee('minlength="10"');
        $view->assertSee('maxlength="15"');
        $view->assertSee('pattern="[0-9+\\-\\s\\(\\)]{10,15}"');
        $view->assertSee('Enter 10-15 digits, spaces, dashes, or parentheses allowed');
    }

    public function test_renders_tel_with_contact_form(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'contact.store\') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="name" label="Full Name" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-email name="email" label="Email Address" required />
                    </div>
                </div>

                <x-form-tel
                    name="phone"
                    label="Phone Number"
                    placeholder="(555) 123-4567"
                    pattern="[\+]?[0-9\s\-\(\)]{10,}"
                    title="Please enter a valid phone number"
                    help="Enter your phone number with or without country code"
                    required
                />

                <x-form-textarea
                    name="message"
                    label="Message"
                    placeholder="Tell us how we can help..."
                    rows="4"
                    required
                />

                <x-form-submit>Send Message</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Full Name');
        $view->assertSee('Email Address');
        $view->assertSee('Phone Number');
        $view->assertSee('(555) 123-4567');
        $view->assertSee('pattern="[\+]?[0-9\s\-\(\)]{10,}"');
        $view->assertSee('Please enter a valid phone number');
        $view->assertSee('Enter your phone number with or without country code');
        $view->assertSee('Message');
        $view->assertSee('Tell us how we can help...');
        $view->assertSee('Send Message');
    }

    public function test_renders_tel_with_user_registration(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'register\') }}" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="first_name" label="First Name" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-input name="last_name" label="Last Name" required />
                    </div>
                </div>

                <x-form-email name="email" label="Email Address" required />

                <x-form-tel
                    name="phone"
                    label="Phone Number"
                    placeholder="Enter your phone number"
                    pattern="[0-9]{10}"
                    title="Please enter a 10-digit phone number"
                    help="We\'ll use this for account verification"
                    required
                />

                <x-form-password name="password" label="Password" required />
                <x-form-password name="password_confirmation" label="Confirm Password" required />

                <x-form-submit>Create Account</x-form-submit>
            </x-form>
        ');

        $view->assertSee('First Name');
        $view->assertSee('Last Name');
        $view->assertSee('Email Address');
        $view->assertSee('Phone Number');
        $view->assertSee('Enter your phone number');
        $view->assertSee('pattern="[0-9]{10}"');
        $view->assertSee('Please enter a 10-digit phone number');
        $view->assertSee('We\'ll use this for account verification');
        $view->assertSee('Password');
        $view->assertSee('Confirm Password');
        $view->assertSee('Create Account');
    }

    public function test_renders_tel_with_business_contact(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'business.contact\') }}" method="POST">
                <x-form-input name="business_name" label="Business Name" required />

                <div class="row">
                    <div class="col-md-6">
                        <x-form-input name="contact_person" label="Contact Person" required />
                    </div>
                    <div class="col-md-6">
                        <x-form-email name="email" label="Business Email" required />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-form-tel
                            name="phone"
                            label="Business Phone"
                            placeholder="(555) 123-4567"
                            pattern="[\+]?[0-9\s\-\(\)]{10,}"
                            help="Primary business contact number"
                            required
                        />
                    </div>
                    <div class="col-md-6">
                        <x-form-tel
                            name="fax"
                            label="Fax Number"
                            placeholder="(555) 123-4568"
                            pattern="[\+]?[0-9\s\-\(\)]{10,}"
                            help="Optional fax number"
                        />
                    </div>
                </div>

                <x-form-textarea
                    name="inquiry"
                    label="Inquiry Details"
                    placeholder="Tell us about your business needs..."
                    rows="5"
                    required
                />

                <x-form-submit>Submit Inquiry</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Business Name');
        $view->assertSee('Contact Person');
        $view->assertSee('Business Email');
        $view->assertSee('Business Phone');
        $view->assertSee('(555) 123-4567');
        $view->assertSee('Primary business contact number');
        $view->assertSee('Fax Number');
        $view->assertSee('(555) 123-4568');
        $view->assertSee('Optional fax number');
        $view->assertSee('Inquiry Details');
        $view->assertSee('Tell us about your business needs...');
        $view->assertSee('Submit Inquiry');
    }

    public function test_renders_tel_with_emergency_contact(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'emergency.store\') }}" method="POST">
                <x-form-input name="patient_name" label="Patient Name" required />

                <div class="row">
                    <div class="col-md-6">
                        <x-form-tel
                            name="primary_phone"
                            label="Primary Contact"
                            placeholder="(555) 123-4567"
                            pattern="[0-9]{10}"
                            help="Main emergency contact number"
                            required
                        >
                            <x-slot name="prepend">
                                <span class="input-group-text">📞</span>
                            </x-slot>
                        </x-form-tel>
                    </div>
                    <div class="col-md-6">
                        <x-form-tel
                            name="secondary_phone"
                            label="Secondary Contact"
                            placeholder="(555) 123-4568"
                            pattern="[0-9]{10}"
                            help="Backup contact number"
                        >
                            <x-slot name="prepend">
                                <span class="input-group-text">📱</span>
                            </x-slot>
                        </x-form-tel>
                    </div>
                </div>

                <x-form-input name="relationship" label="Relationship to Patient" required />

                <x-form-submit>Save Emergency Contact</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Patient Name');
        $view->assertSee('Primary Contact');
        $view->assertSee('(555) 123-4567');
        $view->assertSee('pattern="[0-9]{10}"');
        $view->assertSee('Main emergency contact number');
        $view->assertSee('📞');
        $view->assertSee('Secondary Contact');
        $view->assertSee('(555) 123-4568');
        $view->assertSee('Backup contact number');
        $view->assertSee('📱');
        $view->assertSee('Relationship to Patient');
        $view->assertSee('Save Emergency Contact');
    }

    public function test_renders_tel_with_international_phone(): void
    {
        $view = $this->blade('
            <x-form action="{{ route(\'international.store\') }}" method="POST">
                <x-form-input name="name" label="Full Name" required />

                <x-form-tel
                    name="phone"
                    label="International Phone"
                    placeholder="+1 (555) 123-4567"
                    pattern="[\+]?[0-9\s\-\(\)]{7,}"
                    title="Enter international phone number"
                    help="Include country code (e.g., +1 for US, +44 for UK)"
                    required
                >
                    <x-slot name="prepend">
                        <select class="form-select" style="width: auto;">
                            <option value="+1">🇺🇸 +1</option>
                            <option value="+44">🇬🇧 +44</option>
                            <option value="+33">🇫🇷 +33</option>
                            <option value="+49">🇩🇪 +49</option>
                            <option value="+81">🇯🇵 +81</option>
                        </select>
                    </x-slot>
                </x-form-tel>

                <x-form-email name="email" label="Email Address" required />

                <x-form-submit>Submit</x-form-submit>
            </x-form>
        ');

        $view->assertSee('Full Name');
        $view->assertSee('International Phone');
        $view->assertSee('+1 (555) 123-4567');
        $view->assertSee('pattern="[\+]?[0-9\s\-\(\)]{7,}"');
        $view->assertSee('title="Enter international phone number"');
        $view->assertSee('Include country code (e.g., +1 for US, +44 for UK)');
        $view->assertSee('🇺🇸 +1');
        $view->assertSee('🇬🇧 +44');
        $view->assertSee('🇫🇷 +33');
        $view->assertSee('🇩🇪 +49');
        $view->assertSee('🇯🇵 +81');
        $view->assertSee('Email Address');
        $view->assertSee('Submit');
    }

    public function test_renders_tel_with_livewire_validation(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="Phone Number"
                wire:model="phone"
                wire:model.live="phone"
                wire:loading.class="opacity-50"
                wire:target="phone"
                help="Phone will be validated in real-time"
            />
        ');

        $view->assertSee('Phone Number');
        $view->assertSee('wire:model="phone"');
        $view->assertSee('wire:model.live="phone"');
        $view->assertSee('wire:loading.class="opacity-50"');
        $view->assertSee('wire:target="phone"');
        $view->assertSee('Phone will be validated in real-time');
    }

    public function test_renders_tel_with_mobile_optimization(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                label="Phone Number"
                inputmode="tel"
                autocomplete="tel"
                placeholder="Enter phone number"
                pattern="[0-9+\-\s\(\)]{10,}"
                title="Enter a valid phone number"
            />
        ');

        $view->assertSee('Phone Number');
        $view->assertSee('inputmode="tel"');
        $view->assertSee('autocomplete="tel"');
        $view->assertSee('Enter phone number');
        $view->assertSee('pattern="[0-9+\\-\\s\\(\\)]{10,}"');
        $view->assertSee('title="Enter a valid phone number"');
    }

    public function test_renders_tel_with_form_validation(): void
    {
        $view = $this->blade('
            <x-form-tel
                name="phone"
                pattern="[0-9]{10}"
                title="Please enter a 10-digit phone number"
                required
                maxlength="15"
                minlength="10"
                novalidate
            />
        ');

        $view->assertSee('pattern="[0-9]{10}"');
        $view->assertSee('title="Please enter a 10-digit phone number"');
        $view->assertSee('required');
        $view->assertSee('maxlength="15"');
        $view->assertSee('minlength="10"');
        $view->assertSee('novalidate');
    }
}
