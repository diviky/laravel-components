<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormHiddenTest extends TestCase
{
    public function test_renders_basic_hidden_input(): void
    {
        $view = $this->blade('<x-form-hidden name="user_id" value="123" />');

        $view->assertSee('form-control');
        $view->assertSee('name="user_id"');
        $view->assertSee('type="hidden"');
        $view->assertSee('value="123"');
    }

    public function test_renders_hidden_input_with_custom_id(): void
    {
        $view = $this->blade('<x-form-hidden name="token" value="{{ csrf_token() }}" id="csrf-token" />');

        $view->assertSee('form-control');
        $view->assertSee('name="token"');
        $view->assertSee('type="hidden"');
        $view->assertSee('id="csrf-token"');
    }

    public function test_renders_hidden_input_with_livewire_model(): void
    {
        $view = $this->blade('<x-form-hidden name="selected_id" wire:model="selectedId" />');

        $view->assertSee('form-control');
        $view->assertSee('name="selected_id"');
        $view->assertSee('type="hidden"');
        $view->assertSee('wire:model="selectedId"');
    }

    public function test_renders_hidden_input_with_custom_class(): void
    {
        $view = $this->blade('<x-form-hidden name="session_id" value="{{ session()->getId() }}" class="session-input" />');

        $view->assertSee('form-control');
        $view->assertSee('name="session_id"');
        $view->assertSee('type="hidden"');
        $view->assertSee('session-input');
    }

    public function test_renders_hidden_input_with_data_attributes(): void
    {
        $view = $this->blade('<x-form-hidden name="tracking_id" value="{{ $trackingId }}" data-testid="tracking-input" />');

        $view->assertSee('form-control');
        $view->assertSee('name="tracking_id"');
        $view->assertSee('type="hidden"');
        $view->assertSee('data-testid="tracking-input"');
    }

    public function test_renders_hidden_input_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-hidden name="form_version" value="2.0" extra-attributes="data-version=2.0" />');

        $view->assertSee('form-control');
        $view->assertSee('name="form_version"');
        $view->assertSee('type="hidden"');
        $view->assertSee('value="2.0"');
        $view->assertSee('data-version=2.0');
    }

    public function test_renders_multiple_hidden_inputs(): void
    {
        $view = $this->blade('
            <div>
                <x-form-hidden name="user_id" value="{{ $user->id }}" />
                <x-form-hidden name="role_id" value="{{ $user->role_id }}" />
                <x-form-hidden name="permissions" value="{{ json_encode($user->permissions) }}" />
            </div>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="user_id"');
        $view->assertSee('name="role_id"');
        $view->assertSee('name="permissions"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_user_authentication_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/login">
                @csrf
                <x-form-hidden name="redirect_to" value="{{ request(\'redirect_to\', \'/dashboard\') }}" />
                <x-form-hidden name="remember" value="1" />
                <x-form-email name="email" label="Email Address" required />
                <x-form-password name="password" label="Password" required />
                <x-form-submit>Login</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="redirect_to"');
        $view->assertSee('name="remember"');
        $view->assertSee('type="hidden"');
        $view->assertSee('value="1"');
    }

    public function test_renders_ecommerce_product_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/cart/add">
                @csrf
                <x-form-hidden name="product_id" value="{{ $product->id }}" />
                <x-form-hidden name="product_price" value="{{ $product->price }}" />
                <x-form-hidden name="product_sku" value="{{ $product->sku }}" />
                <x-form-hidden name="category_id" value="{{ $product->category_id }}" />
                <x-form-input name="quantity" label="Quantity" type="number" min="1" value="1" />
                <x-form-submit>Add to Cart</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="product_id"');
        $view->assertSee('name="product_price"');
        $view->assertSee('name="product_sku"');
        $view->assertSee('name="category_id"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_multi_step_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/registration/step2">
                @csrf
                <x-form-hidden name="step" value="2" />
                <x-form-hidden name="registration_token" value="{{ $registrationToken }}" />
                <x-form-hidden name="email_verified" value="{{ $emailVerified ? \'1\' : \'0\' }}" />
                <x-form-input name="first_name" label="First Name" required />
                <x-form-input name="last_name" label="Last Name" required />
                <x-form-tel name="phone" label="Phone Number" />
                <x-form-submit>Continue</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="step"');
        $view->assertSee('name="registration_token"');
        $view->assertSee('name="email_verified"');
        $view->assertSee('type="hidden"');
        $view->assertSee('value="2"');
    }

    public function test_renders_api_integration_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/api/webhook">
                @csrf
                <x-form-hidden name="api_key" value="{{ config(\'services.api.key\') }}" />
                <x-form-hidden name="webhook_id" value="{{ $webhook->id }}" />
                <x-form-hidden name="timestamp" value="{{ time() }}" />
                <x-form-hidden name="signature" value="{{ $signature }}" />
                <x-form-input name="event_type" label="Event Type" required />
                <x-form-textarea name="payload" label="Event Payload" rows="5" required />
                <x-form-submit>Send Webhook</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="api_key"');
        $view->assertSee('name="webhook_id"');
        $view->assertSee('name="timestamp"');
        $view->assertSee('name="signature"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_file_upload_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/files/upload" enctype="multipart/form-data">
                @csrf
                <x-form-hidden name="folder_id" value="{{ $folder->id }}" />
                <x-form-hidden name="max_size" value="{{ config(\'files.max_size\') }}" />
                <x-form-hidden name="allowed_types" value="{{ json_encode($allowedTypes) }}" />
                <x-form-hidden name="upload_token" value="{{ $uploadToken }}" />
                <x-form-file name="file" label="Select File" required />
                <x-form-input name="description" label="File Description" />
                <x-form-submit>Upload File</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="folder_id"');
        $view->assertSee('name="max_size"');
        $view->assertSee('name="allowed_types"');
        $view->assertSee('name="upload_token"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_survey_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/survey/submit">
                @csrf
                <x-form-hidden name="survey_id" value="{{ $survey->id }}" />
                <x-form-hidden name="user_id" value="{{ auth()->id() }}" />
                <x-form-hidden name="started_at" value="{{ $startedAt }}" />
                <x-form-hidden name="session_id" value="{{ session()->getId() }}" />
                <x-form-input name="name" label="Your Name" required />
                <x-form-email name="email" label="Email Address" required />
                @foreach($questions as $question)
                    <x-form-textarea name="answer_{{ $question->id }}" label="{{ $question->text }}" rows="3" />
                @endforeach
                <x-form-submit>Submit Survey</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="survey_id"');
        $view->assertSee('name="user_id"');
        $view->assertSee('name="started_at"');
        $view->assertSee('name="session_id"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_livewire_component_example(): void
    {
        $view = $this->blade('
            <div>
                <h3>User Profile Update</h3>
                <x-form-hidden name="user_id" wire:model="userId" />
                <x-form-hidden name="last_updated" wire:model="lastUpdated" />
                <x-form-hidden name="version" wire:model="version" />
                <x-form-input name="name" label="Full Name" wire:model="name" required />
                <x-form-email name="email" label="Email Address" wire:model="email" required />
                <x-form-tel name="phone" label="Phone Number" wire:model="phone" />
                <div class="mt-3">
                    <button wire:click="saveProfile" class="btn btn-primary">Save Profile</button>
                    <button wire:click="resetForm" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="user_id"');
        $view->assertSee('name="last_updated"');
        $view->assertSee('name="version"');
        $view->assertSee('type="hidden"');
        $view->assertSee('wire:model="userId"');
        $view->assertSee('wire:model="lastUpdated"');
        $view->assertSee('wire:model="version"');
        $view->assertSee('Save Profile');
        $view->assertSee('Reset');
    }

    public function test_renders_payment_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/payment/process">
                @csrf
                <x-form-hidden name="order_id" value="{{ $order->id }}" />
                <x-form-hidden name="amount" value="{{ $order->total }}" />
                <x-form-hidden name="currency" value="{{ $order->currency }}" />
                <x-form-hidden name="payment_method" value="{{ $paymentMethod }}" />
                <x-form-hidden name="return_url" value="{{ route(\'payment.success\') }}" />
                <x-form-hidden name="cancel_url" value="{{ route(\'payment.cancel\') }}" />
                <x-form-input name="card_number" label="Card Number" required />
                <x-form-input name="expiry_date" label="Expiry Date (MM/YY)" required />
                <x-form-input name="cvv" label="CVV" required />
                <x-form-submit>Process Payment</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="order_id"');
        $view->assertSee('name="amount"');
        $view->assertSee('name="currency"');
        $view->assertSee('name="payment_method"');
        $view->assertSee('name="return_url"');
        $view->assertSee('name="cancel_url"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_blog_post_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/posts/store">
                @csrf
                <x-form-hidden name="author_id" value="{{ auth()->id() }}" />
                <x-form-hidden name="draft" value="{{ $isDraft ? \'1\' : \'0\' }}" />
                <x-form-hidden name="scheduled_at" value="{{ $scheduledAt ?? \'\' }}" />
                <x-form-hidden name="meta_data" value="{{ json_encode($metaData) }}" />
                <x-form-input name="title" label="Post Title" required />
                <x-form-textarea name="content" label="Post Content" rows="10" required />
                <x-form-input name="slug" label="URL Slug" />
                <x-form-submit>{{ $isDraft ? \'Save Draft\' : \'Publish Post\' }}</x-form-submit>
            </form>
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="author_id"');
        $view->assertSee('name="draft"');
        $view->assertSee('name="scheduled_at"');
        $view->assertSee('name="meta_data"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_csrf_protection(): void
    {
        $view = $this->blade('<x-form-hidden name="_token" value="{{ csrf_token() }}" />');

        $view->assertSee('form-control');
        $view->assertSee('name="_token"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_session_data(): void
    {
        $view = $this->blade('
            <x-form-hidden name="session_id" value="{{ session()->getId() }}" />
            <x-form-hidden name="user_session" value="{{ json_encode(session()->all()) }}" />
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="session_id"');
        $view->assertSee('name="user_session"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_configuration_data(): void
    {
        $view = $this->blade('
            <x-form-hidden name="app_version" value="{{ config(\'app.version\') }}" />
            <x-form-hidden name="environment" value="{{ config(\'app.env\') }}" />
            <x-form-hidden name="timezone" value="{{ config(\'app.timezone\') }}" />
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="app_version"');
        $view->assertSee('name="environment"');
        $view->assertSee('name="timezone"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_api_tokens(): void
    {
        $view = $this->blade('
            <x-form-hidden name="api_token" value="{{ $apiToken }}" />
            <x-form-hidden name="client_id" value="{{ $clientId }}" />
            <x-form-hidden name="client_secret" value="{{ $clientSecret }}" />
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="api_token"');
        $view->assertSee('name="client_id"');
        $view->assertSee('name="client_secret"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_tracking_data(): void
    {
        $view = $this->blade('
            <x-form-hidden name="utm_source" value="{{ request(\'utm_source\') }}" />
            <x-form-hidden name="utm_medium" value="{{ request(\'utm_medium\') }}" />
            <x-form-hidden name="utm_campaign" value="{{ request(\'utm_campaign\') }}" />
            <x-form-hidden name="referrer" value="{{ request()->headers->get(\'referer\') }}" />
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="utm_source"');
        $view->assertSee('name="utm_medium"');
        $view->assertSee('name="utm_campaign"');
        $view->assertSee('name="referrer"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_form_state_management(): void
    {
        $view = $this->blade('
            <x-form-hidden name="form_step" value="{{ $currentStep }}" />
            <x-form-hidden name="form_data" value="{{ json_encode($formData) }}" />
            <x-form-hidden name="validation_rules" value="{{ json_encode($validationRules) }}" />
        ');

        $view->assertSee('form-control');
        $view->assertSee('name="form_step"');
        $view->assertSee('name="form_data"');
        $view->assertSee('name="validation_rules"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_custom_styling(): void
    {
        $view = $this->blade('<x-form-hidden name="styled_field" value="styled_value" style="display: none; visibility: hidden;" />');

        $view->assertSee('form-control');
        $view->assertSee('name="styled_field"');
        $view->assertSee('type="hidden"');
        $view->assertSee('display: none');
        $view->assertSee('visibility: hidden');
    }

    public function test_renders_hidden_input_with_bootstrap_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="utility_field" value="utility_value" class="d-none invisible" />');

        $view->assertSee('form-control');
        $view->assertSee('name="utility_field"');
        $view->assertSee('type="hidden"');
        $view->assertSee('d-none');
        $view->assertSee('invisible');
    }

    public function test_renders_hidden_input_with_validation_error(): void
    {
        $view = $this->blade('<x-form-hidden name="required_field" value="{{ $value }}" required />');

        $view->assertSee('form-control');
        $view->assertSee('name="required_field"');
        $view->assertSee('type="hidden"');
        $view->assertSee('required');
    }

    public function test_renders_hidden_input_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-form-hidden name="accessible" value="accessible_value" aria-describedby="help-text" />');

        $view->assertSee('form-control');
        $view->assertSee('name="accessible"');
        $view->assertSee('type="hidden"');
        $view->assertSee('aria-describedby="help-text"');
    }

    public function test_renders_hidden_input_with_responsive_classes(): void
    {
        $view = $this->blade('<x-form-hidden name="responsive" value="responsive_value" class="d-none d-md-block" />');

        $view->assertSee('form-control');
        $view->assertSee('name="responsive"');
        $view->assertSee('type="hidden"');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
    }

    public function test_renders_hidden_input_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="spaced" value="spaced_value" class="m-3 p-2" />');

        $view->assertSee('form-control');
        $view->assertSee('name="spaced"');
        $view->assertSee('type="hidden"');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
    }

    public function test_renders_hidden_input_with_border_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="bordered" value="bordered_value" class="border border-primary" />');

        $view->assertSee('form-control');
        $view->assertSee('name="bordered"');
        $view->assertSee('type="hidden"');
        $view->assertSee('border');
        $view->assertSee('border-primary');
    }

    public function test_renders_hidden_input_with_background_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="background" value="background_value" class="bg-light" />');

        $view->assertSee('form-control');
        $view->assertSee('name="background"');
        $view->assertSee('type="hidden"');
        $view->assertSee('bg-light');
    }

    public function test_renders_hidden_input_with_text_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="text_utils" value="text_value" class="text-primary fw-bold" />');

        $view->assertSee('form-control');
        $view->assertSee('name="text_utils"');
        $view->assertSee('type="hidden"');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
    }

    public function test_renders_hidden_input_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="shadowed" value="shadow_value" class="shadow" />');

        $view->assertSee('form-control');
        $view->assertSee('name="shadowed"');
        $view->assertSee('type="hidden"');
        $view->assertSee('shadow');
    }

    public function test_renders_hidden_input_with_position_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="positioned" value="position_value" class="position-relative" />');

        $view->assertSee('form-control');
        $view->assertSee('name="positioned"');
        $view->assertSee('type="hidden"');
        $view->assertSee('position-relative');
    }

    public function test_renders_hidden_input_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="visible" value="visible_value" class="visible opacity-75" />');

        $view->assertSee('form-control');
        $view->assertSee('name="visible"');
        $view->assertSee('type="hidden"');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
    }

    public function test_renders_hidden_input_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="overflow" value="overflow_value" class="overflow-auto" />');

        $view->assertSee('form-control');
        $view->assertSee('name="overflow"');
        $view->assertSee('type="hidden"');
        $view->assertSee('overflow-auto');
    }

    public function test_renders_hidden_input_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-form-hidden name="interactive" value="interactive_value" class="user-select-all" />');

        $view->assertSee('form-control');
        $view->assertSee('name="interactive"');
        $view->assertSee('type="hidden"');
        $view->assertSee('user-select-all');
    }

    public function test_renders_hidden_input_with_small_size(): void
    {
        $view = $this->blade('<x-form-hidden name="small" value="small_value" size="sm" />');

        $view->assertSee('form-control');
        $view->assertSee('form-control-sm');
        $view->assertSee('name="small"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_large_size(): void
    {
        $view = $this->blade('<x-form-hidden name="large" value="large_value" size="lg" />');

        $view->assertSee('form-control');
        $view->assertSee('form-control-lg');
        $view->assertSee('name="large"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_json_value(): void
    {
        $view = $this->blade('<x-form-hidden name="json_data" value="{{ json_encode($data) }}" />');

        $view->assertSee('form-control');
        $view->assertSee('name="json_data"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_boolean_value(): void
    {
        $view = $this->blade('<x-form-hidden name="is_active" value="{{ $isActive ? \'1\' : \'0\' }}" />');

        $view->assertSee('form-control');
        $view->assertSee('name="is_active"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_null_value(): void
    {
        $view = $this->blade('<x-form-hidden name="nullable_field" value="{{ $nullableValue }}" />');

        $view->assertSee('form-control');
        $view->assertSee('name="nullable_field"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_empty_value(): void
    {
        $view = $this->blade('<x-form-hidden name="empty_field" value="" />');

        $view->assertSee('form-control');
        $view->assertSee('name="empty_field"');
        $view->assertSee('type="hidden"');
        $view->assertSee('value=""');
    }

    public function test_renders_hidden_input_with_special_characters(): void
    {
        $view = $this->blade('<x-form-hidden name="special_field" value="&quot;quoted&quot; &amp; escaped" />');

        $view->assertSee('form-control');
        $view->assertSee('name="special_field"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_long_value(): void
    {
        $longValue = str_repeat('a', 1000);
        $view = $this->blade('<x-form-hidden name="long_field" value="'.$longValue.'" />');

        $view->assertSee('form-control');
        $view->assertSee('name="long_field"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_numeric_value(): void
    {
        $view = $this->blade('<x-form-hidden name="numeric_field" value="123.45" />');

        $view->assertSee('form-control');
        $view->assertSee('name="numeric_field"');
        $view->assertSee('type="hidden"');
        $view->assertSee('value="123.45"');
    }

    public function test_renders_hidden_input_with_array_value(): void
    {
        $view = $this->blade('<x-form-hidden name="array_field" value="{{ json_encode([1, 2, 3]) }}" />');

        $view->assertSee('form-control');
        $view->assertSee('name="array_field"');
        $view->assertSee('type="hidden"');
    }

    public function test_renders_hidden_input_with_object_value(): void
    {
        $view = $this->blade('<x-form-hidden name="object_field" value="{{ json_encode($object) }}" />');

        $view->assertSee('form-control');
        $view->assertSee('name="object_field"');
        $view->assertSee('type="hidden"');
    }
}
