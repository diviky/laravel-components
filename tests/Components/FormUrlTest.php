<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class FormUrlTest extends TestCase
{
    public function test_renders_basic_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('name="website"');
        $view->assertSee('type="url"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_placeholder(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" placeholder="https://example.com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('placeholder="https://example.com"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_value(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" value="https://example.com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('value="https://example.com"');
        $view->assertSee('Website URL');
    }

    public function test_renders_required_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" required />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('required');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_help_text(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" help="Enter the complete URL including http:// or https://" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Enter the complete URL including http:// or https://');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_validation_pattern(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" pattern="https?://.*" title="URL must start with http:// or https://" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="https?://.*"');
        $view->assertSee('title="URL must start with http:// or https://"');
        $view->assertSee('Website URL');
    }

    public function test_renders_floating_label_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" floating placeholder="https://example.com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('form-floating');
        $view->assertSee('Website URL');
    }

    public function test_renders_small_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" size="sm" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control-sm');
        $view->assertSee('Website URL');
    }

    public function test_renders_large_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" size="lg" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control-lg');
        $view->assertSee('Website URL');
    }

    public function test_renders_disabled_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" disabled value="https://example.com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('disabled');
        $view->assertSee('value="https://example.com"');
        $view->assertSee('Website URL');
    }

    public function test_renders_readonly_url_input(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" readonly value="https://example.com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('readonly');
        $view->assertSee('value="https://example.com"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_custom_id(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" id="custom-website-url" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('id="custom-website-url"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_custom_class(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" class="custom-url-input" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('custom-url-input');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_livewire_model(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" wire:model="website" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('wire:model="website"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_character_limits(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" minlength="10" maxlength="255" placeholder="https://example.com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('minlength="10"');
        $view->assertSee('maxlength="255"');
        $view->assertSee('placeholder="https://example.com"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_custom_pattern(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" pattern="https://.*\\.com$" title="URL must be HTTPS and end with .com" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="https://.*\\.com$"');
        $view->assertSee('title="URL must be HTTPS and end with .com"');
        $view->assertSee('Website URL');
    }

    public function test_renders_contact_information_form(): void
    {
        $view = $this->blade('
            <form method="POST" action="/contact">
                @csrf
                <x-form-input name="name" label="Full Name" required />
                <x-form-email name="email" label="Email Address" required />
                <x-form-url name="website" label="Website URL"
                    placeholder="https://your-website.com"
                    help="Optional: Your personal or company website" />
                <x-form-tel name="phone" label="Phone Number" />
                <x-form-submit>Submit Contact</x-form-submit>
            </form>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Website URL');
        $view->assertSee('Optional: Your personal or company website');
        $view->assertSee('placeholder="https://your-website.com"');
    }

    public function test_renders_social_media_profile_form(): void
    {
        $view = $this->blade('
            <div class="social-media-section">
                <h3>Social Media Links</h3>
                <x-form-url name="linkedin" label="LinkedIn Profile"
                    placeholder="https://linkedin.com/in/username"
                    help="Your LinkedIn profile URL" />
                <x-form-url name="twitter" label="Twitter Profile"
                    placeholder="https://twitter.com/username"
                    help="Your Twitter profile URL" />
                <x-form-url name="github" label="GitHub Profile"
                    placeholder="https://github.com/username"
                    help="Your GitHub profile URL" />
                <x-form-url name="portfolio" label="Portfolio Website"
                    placeholder="https://your-portfolio.com"
                    help="Your personal portfolio or website" />
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('LinkedIn Profile');
        $view->assertSee('Twitter Profile');
        $view->assertSee('GitHub Profile');
        $view->assertSee('Portfolio Website');
        $view->assertSee('Your LinkedIn profile URL');
        $view->assertSee('Your Twitter profile URL');
        $view->assertSee('Your GitHub profile URL');
        $view->assertSee('Your personal portfolio or website');
    }

    public function test_renders_company_information_form(): void
    {
        $view = $this->blade('
            <div class="company-info">
                <h3>Company Information</h3>
                <x-form-input name="company_name" label="Company Name" required />
                <x-form-url name="company_website" label="Company Website" required
                    placeholder="https://company.com"
                    help="Official company website URL" />
                <x-form-url name="careers_page" label="Careers Page"
                    placeholder="https://company.com/careers"
                    help="Link to job openings or careers page" />
                <x-form-url name="blog_url" label="Company Blog"
                    placeholder="https://blog.company.com"
                    help="Company blog or news section" />
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Company Website');
        $view->assertSee('Careers Page');
        $view->assertSee('Company Blog');
        $view->assertSee('Official company website URL');
        $view->assertSee('Link to job openings or careers page');
        $view->assertSee('Company blog or news section');
    }

    public function test_renders_api_configuration_form(): void
    {
        $view = $this->blade('
            <div class="api-config">
                <h3>API Configuration</h3>
                <x-form-url name="api_base_url" label="API Base URL" required
                    placeholder="https://api.example.com"
                    help="Base URL for API endpoints" />
                <x-form-url name="webhook_url" label="Webhook URL"
                    placeholder="https://your-app.com/webhooks"
                    help="URL to receive webhook notifications" />
                <x-form-url name="callback_url" label="OAuth Callback URL"
                    placeholder="https://your-app.com/auth/callback"
                    help="OAuth callback URL for authentication" />
                <x-form-url name="redirect_url" label="Redirect URL"
                    placeholder="https://your-app.com/dashboard"
                    help="URL to redirect after successful authentication" />
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('API Base URL');
        $view->assertSee('Webhook URL');
        $view->assertSee('OAuth Callback URL');
        $view->assertSee('Redirect URL');
        $view->assertSee('Base URL for API endpoints');
        $view->assertSee('URL to receive webhook notifications');
        $view->assertSee('OAuth callback URL for authentication');
        $view->assertSee('URL to redirect after successful authentication');
    }

    public function test_renders_ecommerce_product_form(): void
    {
        $view = $this->blade('
            <div class="product-form">
                <h3>Product Information</h3>
                <x-form-input name="product_name" label="Product Name" required />
                <x-form-textarea name="description" label="Description" rows="4" />
                <x-form-url name="product_url" label="Product URL"
                    placeholder="https://example.com/product-name"
                    help="Direct link to the product page" />
                <x-form-url name="affiliate_url" label="Affiliate URL"
                    placeholder="https://example.com/product?ref=your-id"
                    help="Affiliate or referral link" />
                <x-form-url name="review_url" label="Review URL"
                    placeholder="https://trustpilot.com/review/example"
                    help="Link to customer reviews" />
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Product URL');
        $view->assertSee('Affiliate URL');
        $view->assertSee('Review URL');
        $view->assertSee('Direct link to the product page');
        $view->assertSee('Affiliate or referral link');
        $view->assertSee('Link to customer reviews');
    }

    public function test_renders_developer_profile_form(): void
    {
        $view = $this->blade('
            <div class="developer-profile">
                <h3>Developer Profile</h3>
                <x-form-input name="name" label="Full Name" required />
                <x-form-email name="email" label="Email" required />
                <x-form-url name="personal_website" label="Personal Website"
                    placeholder="https://yourname.dev"
                    help="Your personal website or blog" />
                <x-form-url name="github_profile" label="GitHub Profile"
                    placeholder="https://github.com/username"
                    help="Your GitHub profile URL" />
                <x-form-url name="linkedin_profile" label="LinkedIn Profile"
                    placeholder="https://linkedin.com/in/username"
                    help="Your LinkedIn profile URL" />
                <x-form-url name="portfolio_url" label="Portfolio"
                    placeholder="https://portfolio.yourname.dev"
                    help="Your project portfolio URL" />
                <x-form-url name="blog_url" label="Technical Blog"
                    placeholder="https://blog.yourname.dev"
                    help="Your technical blog or articles" />
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Personal Website');
        $view->assertSee('GitHub Profile');
        $view->assertSee('LinkedIn Profile');
        $view->assertSee('Portfolio');
        $view->assertSee('Technical Blog');
        $view->assertSee('Your personal website or blog');
        $view->assertSee('Your GitHub profile URL');
        $view->assertSee('Your LinkedIn profile URL');
        $view->assertSee('Your project portfolio URL');
        $view->assertSee('Your technical blog or articles');
    }

    public function test_renders_livewire_component_example(): void
    {
        $view = $this->blade('
            <div>
                <h3>Website Configuration</h3>
                <x-form-url name="homepage_url" label="Homepage URL"
                    wire:model="homepageUrl"
                    placeholder="https://your-website.com" />
                <x-form-url name="api_docs_url" label="API Documentation"
                    wire:model="apiDocsUrl"
                    placeholder="https://docs.your-website.com" />
                <x-form-url name="support_url" label="Support Page"
                    wire:model="supportUrl"
                    placeholder="https://support.your-website.com" />
                <x-form-url name="privacy_policy_url" label="Privacy Policy"
                    wire:model="privacyPolicyUrl"
                    placeholder="https://your-website.com/privacy" />
                <div class="mt-3">
                    <button wire:click="saveConfiguration" class="btn btn-primary">Save Configuration</button>
                </div>
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Homepage URL');
        $view->assertSee('API Documentation');
        $view->assertSee('Support Page');
        $view->assertSee('Privacy Policy');
        $view->assertSee('wire:model="homepageUrl"');
        $view->assertSee('wire:model="apiDocsUrl"');
        $view->assertSee('wire:model="supportUrl"');
        $view->assertSee('wire:model="privacyPolicyUrl"');
        $view->assertSee('Save Configuration');
    }

    public function test_renders_url_input_with_custom_validation(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" pattern="https://.*\\.(com|org|net)$" title="URL must be HTTPS and end with .com, .org, or .net" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="https://.*\\.(com|org|net)$"');
        $view->assertSee('title="URL must be HTTPS and end with .com, .org, or .net"');
        $view->assertSee('Website URL');
    }

    public function test_renders_url_input_with_specific_protocol(): void
    {
        $view = $this->blade('<x-form-url name="secure_site" label="Secure Site" pattern="https://.*" title="Only HTTPS URLs are allowed" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="https://.*"');
        $view->assertSee('title="Only HTTPS URLs are allowed"');
        $view->assertSee('Secure Site');
    }

    public function test_renders_url_input_with_domain_restriction(): void
    {
        $view = $this->blade('<x-form-url name="company_site" label="Company Site" pattern="https://.*\\.company\\.com.*" title="URL must be from company.com domain" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="https://.*\\.company\\.com.*"');
        $view->assertSee('title="URL must be from company.com domain"');
        $view->assertSee('Company Site');
    }

    public function test_renders_url_input_with_path_validation(): void
    {
        $view = $this->blade('<x-form-url name="api_endpoint" label="API Endpoint" pattern="https://api\\.example\\.com/v[0-9]+/.*" title="URL must be API endpoint with version number" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('pattern="https://api\\.example\\.com/v[0-9]+/.*"');
        $view->assertSee('title="URL must be API endpoint with version number"');
        $view->assertSee('API Endpoint');
    }

    public function test_renders_url_input_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-form-url name="accessible" label="Accessible URL" aria-describedby="help-text" aria-required="true" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('aria-describedby="help-text"');
        $view->assertSee('aria-required="true"');
        $view->assertSee('Accessible URL');
    }

    public function test_renders_url_input_with_data_attributes(): void
    {
        $view = $this->blade('<x-form-url name="data_field" label="Data Field" data-testid="url-input" data-cy="url-input" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-testid="url-input"');
        $view->assertSee('data-cy="url-input"');
        $view->assertSee('Data Field');
    }

    public function test_renders_url_input_with_responsive_classes(): void
    {
        $view = $this->blade('<x-form-url name="responsive" label="Responsive Field" class="d-none d-md-block" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('Responsive Field');
    }

    public function test_renders_url_input_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-form-url name="spaced" label="Spaced Field" class="m-3 p-2" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('Spaced Field');
    }

    public function test_renders_url_input_with_border_utilities(): void
    {
        $view = $this->blade('<x-form-url name="bordered" label="Bordered Field" class="border border-primary" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('Bordered Field');
    }

    public function test_renders_url_input_with_background_utilities(): void
    {
        $view = $this->blade('<x-form-url name="background" label="Background Field" class="bg-light" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('bg-light');
        $view->assertSee('Background Field');
    }

    public function test_renders_url_input_with_text_utilities(): void
    {
        $view = $this->blade('<x-form-url name="text_utils" label="Text Utils Field" class="text-primary fw-bold" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
        $view->assertSee('Text Utils Field');
    }

    public function test_renders_url_input_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-form-url name="shadowed" label="Shadowed Field" class="shadow" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('shadow');
        $view->assertSee('Shadowed Field');
    }

    public function test_renders_url_input_with_position_utilities(): void
    {
        $view = $this->blade('<x-form-url name="positioned" label="Positioned Field" class="position-relative" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('position-relative');
        $view->assertSee('Positioned Field');
    }

    public function test_renders_url_input_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-form-url name="visible" label="Visible Field" class="visible opacity-75" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
        $view->assertSee('Visible Field');
    }

    public function test_renders_url_input_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-form-url name="overflow" label="Overflow Field" class="overflow-auto" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('overflow-auto');
        $view->assertSee('Overflow Field');
    }

    public function test_renders_url_input_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-form-url name="interactive" label="Interactive Field" class="user-select-all" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('user-select-all');
        $view->assertSee('Interactive Field');
    }

    public function test_renders_url_input_with_inline_style(): void
    {
        $view = $this->blade('<x-form-url name="styled" label="Styled Field" style="background-color: #f8f9fa; border-radius: 10px;" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('background-color: #f8f9fa');
        $view->assertSee('border-radius: 10px');
        $view->assertSee('Styled Field');
    }

    public function test_renders_url_input_with_validation_error(): void
    {
        $view = $this->blade('<x-form-url name="website" label="Website URL" required />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Website URL');
        $view->assertSee('required');
    }

    public function test_renders_url_input_with_extra_attributes(): void
    {
        $view = $this->blade('<x-form-url name="extra" label="Extra Field" extra-attributes="data-custom=value" />');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('data-custom=value');
        $view->assertSee('Extra Field');
    }

    public function test_renders_multiple_url_inputs(): void
    {
        $view = $this->blade('
            <div>
                <x-form-url name="website" label="Website URL" placeholder="https://example.com" />
                <x-form-url name="api_url" label="API URL" placeholder="https://api.example.com" />
                <x-form-url name="docs_url" label="Documentation URL" placeholder="https://docs.example.com" />
            </div>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Website URL');
        $view->assertSee('API URL');
        $view->assertSee('Documentation URL');
        $view->assertSee('placeholder="https://example.com"');
        $view->assertSee('placeholder="https://api.example.com"');
        $view->assertSee('placeholder="https://docs.example.com"');
    }

    public function test_renders_url_input_with_slot_content(): void
    {
        $view = $this->blade('
            <x-form-url name="website" label="Website URL">
                <x-slot name="before">
                    <div class="text-muted">URL prefix:</div>
                </x-slot>
                <x-slot name="after">
                    <div class="text-muted">Enter complete URL</div>
                </x-slot>
            </x-form-url>
        ');

        $view->assertSee('form-group');
        $view->assertSee('form-control');
        $view->assertSee('Website URL');
        $view->assertSee('URL prefix:');
        $view->assertSee('Enter complete URL');
    }
}
