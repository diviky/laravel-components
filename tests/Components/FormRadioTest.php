<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormRadioTest extends TestCase
{
    public function test_renders_basic_radio_button(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('value="male"');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_default_selection(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" :default="true" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('value="male"');
        $view->assertSee('Male');
    }

    public function test_renders_required_radio_button(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" required />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('required');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_help_text(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" help="Select your gender" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('Select your gender');
        $view->assertSee('Male');
    }

    public function test_renders_inline_radio_button(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" inline />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-inline');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('Male');
    }

    public function test_renders_compact_radio_button(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" compact />');

        $view->assertSee('form-check');
        $view->assertSee('m-0');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_custom_id(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" id="gender-male" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('id="gender-male"');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_custom_class(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" class="custom-radio" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('custom-radio');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_livewire_model(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" wire:model="selectedGender" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('wire:model="selectedGender"');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_model_binding(): void
    {
        $view = $this->blade('<x-form-radio name="user_type" label="Admin" value="admin" :bind="$user" bindKey="type" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="user_type"');
        $view->assertSee('type="radio"');
        $view->assertSee('value="admin"');
        $view->assertSee('Admin');
    }

    public function test_renders_disabled_radio_button(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" disabled />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('disabled');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_title(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" title="Select male gender" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('title="Select male gender"');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_group(): void
    {
        $view = $this->blade('
            <div>
                <x-form-radio name="gender" label="Male" value="male" />
                <x-form-radio name="gender" label="Female" value="female" />
                <x-form-radio name="gender" label="Other" value="other" />
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('Male');
        $view->assertSee('Female');
        $view->assertSee('Other');
    }

    public function test_renders_user_registration_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/register">
                @csrf
                <x-form-input name="name" label="Full Name" required />
                <x-form-email name="email" label="Email Address" required />
                <div class="form-group">
                    <label class="form-label">Gender</label>
                    <x-form-radio name="gender" label="Male" value="male" required />
                    <x-form-radio name="gender" label="Female" value="female" required />
                    <x-form-radio name="gender" label="Other" value="other" required />
                </div>
                <x-form-password name="password" label="Password" required />
                <x-form-password name="password_confirmation" label="Confirm Password" required />
                <x-form-submit>Register</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('Male');
        $view->assertSee('Female');
        $view->assertSee('Other');
        $view->assertSee('required');
    }

    public function test_renders_survey_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/survey/submit">
                @csrf
                <x-form-input name="name" label="Your Name" required />
                <x-form-email name="email" label="Email Address" required />
                <div class="form-group">
                    <label class="form-label">Age Group</label>
                    <x-form-radio name="age_group" label="18-24" value="18-24" required />
                    <x-form-radio name="age_group" label="25-34" value="25-34" required />
                    <x-form-radio name="age_group" label="35-44" value="35-44" required />
                    <x-form-radio name="age_group" label="45-54" value="45-54" required />
                    <x-form-radio name="age_group" label="55+" value="55+" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Experience Level</label>
                    <x-form-radio name="experience" label="Beginner" value="beginner" required />
                    <x-form-radio name="experience" label="Intermediate" value="intermediate" required />
                    <x-form-radio name="experience" label="Advanced" value="advanced" required />
                </div>
                <x-form-submit>Submit Survey</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="age_group"');
        $view->assertSee('name="experience"');
        $view->assertSee('type="radio"');
        $view->assertSee('18-24');
        $view->assertSee('25-34');
        $view->assertSee('Beginner');
        $view->assertSee('Intermediate');
        $view->assertSee('Advanced');
        $view->assertSee('required');
    }

    public function test_renders_settings_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/settings/update">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label class="form-label">Theme Preference</label>
                    <x-form-radio name="theme" label="Light" value="light" :bind="$user" bindKey="theme" />
                    <x-form-radio name="theme" label="Dark" value="dark" :bind="$user" bindKey="theme" />
                    <x-form-radio name="theme" label="Auto" value="auto" :bind="$user" bindKey="theme" />
                </div>
                <div class="form-group">
                    <label class="form-label">Language</label>
                    <x-form-radio name="language" label="English" value="en" :bind="$user" bindKey="language" />
                    <x-form-radio name="language" label="Spanish" value="es" :bind="$user" bindKey="language" />
                    <x-form-radio name="language" label="French" value="fr" :bind="$user" bindKey="language" />
                </div>
                <div class="form-group">
                    <label class="form-label">Notifications</label>
                    <x-form-radio name="notifications" label="All" value="all" :bind="$user" bindKey="notifications" />
                    <x-form-radio name="notifications" label="Important Only" value="important" :bind="$user" bindKey="notifications" />
                    <x-form-radio name="notifications" label="None" value="none" :bind="$user" bindKey="notifications" />
                </div>
                <x-form-submit>Save Settings</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="theme"');
        $view->assertSee('name="language"');
        $view->assertSee('name="notifications"');
        $view->assertSee('type="radio"');
        $view->assertSee('Light');
        $view->assertSee('Dark');
        $view->assertSee('Auto');
        $view->assertSee('English');
        $view->assertSee('Spanish');
        $view->assertSee('French');
        $view->assertSee('All');
        $view->assertSee('Important Only');
        $view->assertSee('None');
    }

    public function test_renders_ecommerce_product_options(): void
    {
        $view = $this->blade('
            <form method="POST" action="/cart/add">
                @csrf
                <x-form-hidden name="product_id" value="{{ $product->id }}" />
                <div class="form-group">
                    <label class="form-label">Size</label>
                    <x-form-radio name="size" label="Small" value="S" required />
                    <x-form-radio name="size" label="Medium" value="M" required />
                    <x-form-radio name="size" label="Large" value="L" required />
                    <x-form-radio name="size" label="Extra Large" value="XL" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Color</label>
                    <x-form-radio name="color" label="Red" value="red" required />
                    <x-form-radio name="color" label="Blue" value="blue" required />
                    <x-form-radio name="color" label="Green" value="green" required />
                    <x-form-radio name="color" label="Black" value="black" required />
                </div>
                <x-form-input name="quantity" label="Quantity" type="number" min="1" value="1" required />
                <x-form-submit>Add to Cart</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="size"');
        $view->assertSee('name="color"');
        $view->assertSee('type="radio"');
        $view->assertSee('Small');
        $view->assertSee('Medium');
        $view->assertSee('Large');
        $view->assertSee('Extra Large');
        $view->assertSee('Red');
        $view->assertSee('Blue');
        $view->assertSee('Green');
        $view->assertSee('Black');
        $view->assertSee('required');
    }

    public function test_renders_booking_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/booking/create">
                @csrf
                <x-form-input name="name" label="Full Name" required />
                <x-form-email name="email" label="Email Address" required />
                <x-form-tel name="phone" label="Phone Number" required />
                <div class="form-group">
                    <label class="form-label">Service Type</label>
                    <x-form-radio name="service" label="Consultation" value="consultation" required />
                    <x-form-radio name="service" label="Treatment" value="treatment" required />
                    <x-form-radio name="service" label="Follow-up" value="followup" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Preferred Time</label>
                    <x-form-radio name="time" label="Morning (9 AM - 12 PM)" value="morning" required />
                    <x-form-radio name="time" label="Afternoon (1 PM - 4 PM)" value="afternoon" required />
                    <x-form-radio name="time" label="Evening (5 PM - 8 PM)" value="evening" required />
                </div>
                <x-form-date name="appointment_date" label="Appointment Date" required />
                <x-form-textarea name="notes" label="Additional Notes" rows="3" />
                <x-form-submit>Book Appointment</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="service"');
        $view->assertSee('name="time"');
        $view->assertSee('type="radio"');
        $view->assertSee('Consultation');
        $view->assertSee('Treatment');
        $view->assertSee('Follow-up');
        $view->assertSee('Morning (9 AM - 12 PM)');
        $view->assertSee('Afternoon (1 PM - 4 PM)');
        $view->assertSee('Evening (5 PM - 8 PM)');
        $view->assertSee('required');
    }

    public function test_renders_livewire_component_example(): void
    {
        $view = $this->blade('
            <div>
                <h3>User Preferences</h3>
                <div class="form-group">
                    <label class="form-label">Display Mode</label>
                    <x-form-radio name="display_mode" label="Grid" value="grid" wire:model="displayMode" />
                    <x-form-radio name="display_mode" label="List" value="list" wire:model="displayMode" />
                    <x-form-radio name="display_mode" label="Compact" value="compact" wire:model="displayMode" />
                </div>
                <div class="form-group">
                    <label class="form-label">Sort Order</label>
                    <x-form-radio name="sort_order" label="Newest First" value="newest" wire:model="sortOrder" />
                    <x-form-radio name="sort_order" label="Oldest First" value="oldest" wire:model="sortOrder" />
                    <x-form-radio name="sort_order" label="Alphabetical" value="alphabetical" wire:model="sortOrder" />
                </div>
                <div class="form-group">
                    <label class="form-label">Filter Type</label>
                    <x-form-radio name="filter_type" label="All" value="all" wire:model="filterType" />
                    <x-form-radio name="filter_type" label="Active" value="active" wire:model="filterType" />
                    <x-form-radio name="filter_type" label="Archived" value="archived" wire:model="filterType" />
                </div>
                <div class="mt-3">
                    <button wire:click="savePreferences" class="btn btn-primary">Save Preferences</button>
                    <button wire:click="resetPreferences" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="display_mode"');
        $view->assertSee('name="sort_order"');
        $view->assertSee('name="filter_type"');
        $view->assertSee('type="radio"');
        $view->assertSee('wire:model="displayMode"');
        $view->assertSee('wire:model="sortOrder"');
        $view->assertSee('wire:model="filterType"');
        $view->assertSee('Grid');
        $view->assertSee('List');
        $view->assertSee('Compact');
        $view->assertSee('Newest First');
        $view->assertSee('Oldest First');
        $view->assertSee('Alphabetical');
        $view->assertSee('All');
        $view->assertSee('Active');
        $view->assertSee('Archived');
        $view->assertSee('Save Preferences');
        $view->assertSee('Reset');
    }

    public function test_renders_quiz_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/quiz/submit">
                @csrf
                <x-form-hidden name="quiz_id" value="{{ $quiz->id }}" />
                <x-form-hidden name="user_id" value="{{ auth()->id() }}" />
                @foreach($questions as $question)
                    <div class="question-group mb-4">
                        <h4>{{ $question->text }}</h4>
                        @foreach($question->options as $option)
                            <x-form-radio
                                name="answer_{{ $question->id }}"
                                label="{{ $option->text }}"
                                value="{{ $option->id }}"
                                required
                            />
                        @endforeach
                    </div>
                @endforeach
                <x-form-submit>Submit Quiz</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('type="radio"');
        $view->assertSee('required');
    }

    public function test_renders_subscription_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/subscription/create">
                @csrf
                <x-form-input name="name" label="Full Name" required />
                <x-form-email name="email" label="Email Address" required />
                <div class="form-group">
                    <label class="form-label">Subscription Plan</label>
                    <x-form-radio name="plan" label="Basic ($9/month)" value="basic" required />
                    <x-form-radio name="plan" label="Pro ($19/month)" value="pro" required />
                    <x-form-radio name="plan" label="Enterprise ($49/month)" value="enterprise" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Billing Cycle</label>
                    <x-form-radio name="billing" label="Monthly" value="monthly" required />
                    <x-form-radio name="billing" label="Yearly (Save 20%)" value="yearly" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Payment Method</label>
                    <x-form-radio name="payment_method" label="Credit Card" value="card" required />
                    <x-form-radio name="payment_method" label="PayPal" value="paypal" required />
                    <x-form-radio name="payment_method" label="Bank Transfer" value="bank" required />
                </div>
                <x-form-submit>Start Subscription</x-form-submit>
            </form>
        ');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="plan"');
        $view->assertSee('name="billing"');
        $view->assertSee('name="payment_method"');
        $view->assertSee('type="radio"');
        $view->assertSee('Basic ($9/month)');
        $view->assertSee('Pro ($19/month)');
        $view->assertSee('Enterprise ($49/month)');
        $view->assertSee('Monthly');
        $view->assertSee('Yearly (Save 20%)');
        $view->assertSee('Credit Card');
        $view->assertSee('PayPal');
        $view->assertSee('Bank Transfer');
        $view->assertSee('required');
    }

    public function test_renders_radio_button_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-form-radio name="accessible" label="Accessible Option" value="accessible" aria-describedby="help-text" aria-required="true" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="accessible"');
        $view->assertSee('type="radio"');
        $view->assertSee('aria-describedby="help-text"');
        $view->assertSee('aria-required="true"');
        $view->assertSee('Accessible Option');
    }

    public function test_renders_radio_button_with_data_attributes(): void
    {
        $view = $this->blade('<x-form-radio name="data_field" label="Data Field" value="data" data-testid="radio-input" data-cy="radio-input" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="data_field"');
        $view->assertSee('type="radio"');
        $view->assertSee('data-testid="radio-input"');
        $view->assertSee('data-cy="radio-input"');
        $view->assertSee('Data Field');
    }

    public function test_renders_radio_button_with_responsive_classes(): void
    {
        $view = $this->blade('<x-form-radio name="responsive" label="Responsive Field" value="responsive" class="d-none d-md-block" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="responsive"');
        $view->assertSee('type="radio"');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('Responsive Field');
    }

    public function test_renders_radio_button_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="spaced" label="Spaced Field" value="spaced" class="m-3 p-2" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="spaced"');
        $view->assertSee('type="radio"');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('Spaced Field');
    }

    public function test_renders_radio_button_with_border_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="bordered" label="Bordered Field" value="bordered" class="border border-primary" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="bordered"');
        $view->assertSee('type="radio"');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('Bordered Field');
    }

    public function test_renders_radio_button_with_background_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="background" label="Background Field" value="background" class="bg-light" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="background"');
        $view->assertSee('type="radio"');
        $view->assertSee('bg-light');
        $view->assertSee('Background Field');
    }

    public function test_renders_radio_button_with_text_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="text_utils" label="Text Utils Field" value="text" class="text-primary fw-bold" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="text_utils"');
        $view->assertSee('type="radio"');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
        $view->assertSee('Text Utils Field');
    }

    public function test_renders_radio_button_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="shadowed" label="Shadowed Field" value="shadow" class="shadow" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="shadowed"');
        $view->assertSee('type="radio"');
        $view->assertSee('shadow');
        $view->assertSee('Shadowed Field');
    }

    public function test_renders_radio_button_with_position_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="positioned" label="Positioned Field" value="position" class="position-relative" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="positioned"');
        $view->assertSee('type="radio"');
        $view->assertSee('position-relative');
        $view->assertSee('Positioned Field');
    }

    public function test_renders_radio_button_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="visible" label="Visible Field" value="visible" class="visible opacity-75" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="visible"');
        $view->assertSee('type="radio"');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
        $view->assertSee('Visible Field');
    }

    public function test_renders_radio_button_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="overflow" label="Overflow Field" value="overflow" class="overflow-auto" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="overflow"');
        $view->assertSee('type="radio"');
        $view->assertSee('overflow-auto');
        $view->assertSee('Overflow Field');
    }

    public function test_renders_radio_button_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-form-radio name="interactive" label="Interactive Field" value="interactive" class="user-select-all" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="interactive"');
        $view->assertSee('type="radio"');
        $view->assertSee('user-select-all');
        $view->assertSee('Interactive Field');
    }

    public function test_renders_radio_button_with_inline_style(): void
    {
        $view = $this->blade('<x-form-radio name="styled" label="Styled Field" value="styled" style="margin: 1rem; padding: 0.5rem;" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="styled"');
        $view->assertSee('type="radio"');
        $view->assertSee('margin: 1rem');
        $view->assertSee('padding: 0.5rem');
        $view->assertSee('Styled Field');
    }

    public function test_renders_radio_button_with_validation_error(): void
    {
        $view = $this->blade('<x-form-radio name="gender" label="Male" value="male" required />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="gender"');
        $view->assertSee('type="radio"');
        $view->assertSee('required');
        $view->assertSee('Male');
    }

    public function test_renders_radio_button_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-radio name="extra" label="Extra Field" value="extra" extra-attributes="data-custom=value" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="extra"');
        $view->assertSee('type="radio"');
        $view->assertSee('data-custom=value');
        $view->assertSee('Extra Field');
    }

    public function test_renders_radio_button_with_settings(): void
    {
        $view = $this->blade('<x-form-radio name="configured" label="Configured Field" value="configured" :settings="[\'custom\' => \'value\']" />');

        $view->assertSee('form-check');
        $view->assertSee('form-check-input');
        $view->assertSee('form-check-label');
        $view->assertSee('name="configured"');
        $view->assertSee('type="radio"');
        $view->assertSee('Configured Field');
    }
}
