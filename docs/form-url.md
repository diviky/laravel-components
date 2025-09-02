# Form URL Component

A specialized URL input component that provides a professional interface for web addresses with automatic URL validation, comprehensive form integration, and enhanced user experience. This component extends FormInput to offer intuitive URL input experiences with proper formatting and validation support.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-url.blade.php`
- **Documentation:** `docs/form-url.md`

## Basic Usage

### Simple URL Input
```blade
<x-form-url name="website" label="Website URL" />
```

### With Default Value
```blade
<x-form-url 
    name="homepage" 
    label="Homepage"
    :default="'https://example.com'">
</x-form-url>
```

### With Help Text
```blade
<x-form-url 
    name="profile_url" 
    label="Profile URL"
    help="Enter your social media profile URL">
</x-form-url>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'website'` or `'profile_url'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Website URL'` |
| value | mixed | null | Current URL value | `'https://example.com'` |
| default | mixed | null | Default URL value | `'https://example.com'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'url']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'url-input'` |
| class | string | '' | CSS classes | `'url-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'https://example.com'` |
| pattern | string | null | URL validation pattern | `'https?://.*'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'enter-urls'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the URL input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Enter a valid URL including the protocol (http:// or https://)
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the URL input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-url name="website">
    <small class="text-muted">Must be a valid website URL</small>
</x-form-url>
```

## Usage Examples

### Basic URL Input
```blade
<x-form-url 
    name="website" 
    label="Website URL">
    
    <x-slot:help>
        Enter your website URL
    </x-slot:help>
</x-form-url>
```

### Required URL Input
```blade
<x-form-url 
    name="homepage" 
    label="Homepage URL"
    required>
    
    <x-slot:help>
        This field is required to complete your profile
    </x-slot:help>
</x-form-url>
```

### With Pattern Validation
```blade
<x-form-url 
    name="secure_url" 
    label="Secure URL"
    pattern="https://.*"
    placeholder="https://example.com">
    
    <x-slot:help>
        Only HTTPS URLs are allowed for security reasons
    </x-slot:help>
</x-form-url>
```

### With Custom Placeholder
```blade
<x-form-url 
    name="social_profile" 
    label="Social Media Profile"
    placeholder="https://twitter.com/username">
    
    <x-slot:help>
        Enter your social media profile URL
    </x-slot:help>
</x-form-url>
```

### Livewire Integration
```blade
<x-form-url 
    wire:model="form.website"
    name="company_website" 
    label="Company Website"
    required>
    
    <x-slot:help>
        <div class="url-validation">
            <strong>URL Status:</strong><br>
            <span x-text="validateUrl($wire.form.website)">Enter a URL to validate</span>
        </div>
    </x-slot:help>
</x-form-url>
```

### With Custom Classes
```blade
<x-form-url 
    name="custom_url" 
    label="Custom URL"
    class="url-input-lg"
    placeholder="Enter your custom URL">
    
    <x-slot:help>
        <div class="url-tips">
            <i class="fas fa-link"></i>
            <strong>Tip:</strong> Include the protocol (http:// or https://)
        </div>
    </x-slot:help>
</x-form-url>
```

### Disabled URL Field
```blade
<x-form-url 
    name="locked_url" 
    label="URL"
    disabled>
    
    <x-slot:help>
        This URL field is locked and cannot be changed
    </x-slot:help>
</x-form-url>
```

### Readonly URL Field
```blade
<x-form-url 
    name="display_url" 
    label="Current URL"
    readonly>
    
    <x-slot:help>
        Your current URL (cannot be edited)
    </x-slot:help>
</x-form-url>
```

## Component Variants

### Standard URL Input
**Usage:** `<x-form-url>` (default)
**Description:** Basic URL input with standard validation
**Features:**
- HTML5 URL input type
- Standard URL validation
- Help and default slot support
- FormInput extension

### Pattern-Constrained URL Input
**Usage:** `<x-form-url pattern="https://.*">`
**Description:** URL input with specific pattern constraints
**Features:**
- Custom URL pattern validation
- Protocol enforcement
- Enhanced validation feedback
- Improved user experience

### Secure URL Input
**Usage:** `<x-form-url pattern="https://.*">`
**Description:** URL input that only accepts HTTPS URLs
**Features:**
- HTTPS-only validation
- Security-focused input
- Professional security handling
- Compliance support

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-url>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-url' => [
        'view' => 'laravel-components::{framework}.form-url',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'url'`
- **Validation:** HTML5 URL validation
- **Pattern:** No default pattern constraints
- **Protocol:** Accepts both HTTP and HTTPS

### URL Validation Patterns
```html
<!-- HTTPS only -->
pattern="https://.*"

<!-- HTTP or HTTPS -->
pattern="https?://.*"

<!-- Specific domain -->
pattern="https?://(www\.)?example\.com.*"

<!-- Social media URLs -->
pattern="https?://(www\.)?(twitter|facebook|linkedin)\.com.*"
```

## Common Patterns

### Contact Information Forms
```blade
<div class="contact-information-form">
    <h4>Contact Information</h4>
    <p>Provide your contact details:</p>
    
    <x-form-url 
        name="personal_website" 
        label="Personal Website"
        placeholder="https://yourname.com">
        
        <x-slot:help>
            Your personal website or portfolio URL
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="linkedin_profile" 
        label="LinkedIn Profile"
        placeholder="https://linkedin.com/in/username">
        
        <x-slot:help>
            Your LinkedIn professional profile URL
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="github_profile" 
        label="GitHub Profile"
        placeholder="https://github.com/username">
        
        <x-slot:help>
            Your GitHub profile URL for code samples
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="portfolio_url" 
        label="Portfolio URL"
        placeholder="https://portfolio.com">
        
        <x-slot:help>
            URL to your work portfolio or showcase
        </x-slot:help>
    </x-form-url>
</div>
```

### Business Profile Forms
```blade
<div class="business-profile-form">
    <h4>Business Information</h4>
    <p>Update your business profile:</p>
    
    <x-form-url 
        name="company_website" 
        label="Company Website"
        pattern="https://.*"
        required>
        
        <x-slot:help>
            Your company's main website URL (HTTPS required)
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="online_store" 
        label="Online Store"
        placeholder="https://store.company.com">
        
        <x-slot:help>
            URL to your online store or e-commerce platform
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="support_portal" 
        label="Support Portal"
        placeholder="https://support.company.com">
        
        <x-slot:help>
            Customer support and help center URL
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="documentation_url" 
        label="Documentation"
        placeholder="https://docs.company.com">
        
        <x-slot:help>
            Product documentation and user guides URL
        </x-slot:help>
    </x-form-url>
</div>
```

### Social Media Management
```blade
<div class="social-media-management-form">
    <h4>Social Media Profiles</h4>
    <p>Manage your social media presence:</p>
    
    <x-form-url 
        name="facebook_page" 
        label="Facebook Page"
        placeholder="https://facebook.com/pagename">
        
        <x-slot:help>
            Your Facebook business page URL
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="twitter_profile" 
        label="Twitter Profile"
        placeholder="https://twitter.com/username">
        
        <x-slot:help>
            Your Twitter profile URL
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="instagram_profile" 
        label="Instagram Profile"
        placeholder="https://instagram.com/username">
        
        <x-slot:help>
            Your Instagram profile URL
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="youtube_channel" 
        label="YouTube Channel"
        placeholder="https://youtube.com/channel/...">
        
        <x-slot:help>
            Your YouTube channel URL
        </x-slot:help>
    </x-form-url>
    
    <div class="social-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Social Media Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Total Profiles:</strong> <span x-text="countSocialProfiles()">0</span></p>
                        <p class="mb-1"><strong>Active Profiles:</strong> <span x-text="countActiveProfiles()">0</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Profile Status:</strong> <span x-text="getProfileStatus()">Incomplete</span></p>
                        <p class="mb-0"><strong>Recommendations:</strong> <span x-text="getSocialRecommendations()">None</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Application Configuration
```blade
<div class="application-configuration-form">
    <h4>Application Settings</h4>
    <p>Configure your application URLs:</p>
    
    <x-form-url 
        name="app_url" 
        label="Application URL"
        pattern="https://.*"
        required>
        
        <x-slot:help>
            Your application's main URL (HTTPS required for production)
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="api_base_url" 
        label="API Base URL"
        placeholder="https://api.example.com">
        
        <x-slot:help>
            Base URL for your API endpoints
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="webhook_url" 
        label="Webhook URL"
        placeholder="https://webhook.example.com">
        
        <x-slot:help>
            URL for receiving webhook notifications
        </x-slot:help>
    </x-form-url>
    
    <x-form-url 
        name="callback_url" 
        label="OAuth Callback URL"
        placeholder="https://app.example.com/auth/callback">
        
        <x-slot:help>
            OAuth callback URL for authentication
        </x-slot:help>
    </x-form-url>
    
    <div class="url-validation mt-3">
        <div class="card">
            <div class="card-body">
                <h6>URL Validation:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Valid URLs:</strong> <span x-text="countValidUrls()">0</span></p>
                        <p class="mb-1"><strong>HTTPS URLs:</strong> <span x-text="countHttpsUrls()">0</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Status:</strong> <span x-text="getUrlValidationStatus()">Pending</span></p>
                        <p class="mb-0"><strong>Issues:</strong> <span x-text="getUrlIssues()">None</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_url_with_basic_attributes()
{
    $view = $this->blade('<x-form-url name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-url');
}

/** @test */
public function it_renders_form_url_with_url_type()
{
    $view = $this->blade('<x-form-url name="test" />');
    
    $view->assertSee('type="url"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(UrlComponent::class)
        ->assertSee('<x-form-url')
        ->set('website', 'https://example.com')
        ->assertSee('https://example.com');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to URL input
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to URL input
- URL key input for values
- Enter key for form submission
- Copy/paste support for URLs

### Screen Reader Support
- Proper labeling and descriptions
- URL format announcements
- Help text communication
- Error message communication

### URL Accessibility
- Clear URL format indication
- Proper validation feedback
- Helpful error messages
- Format guidance

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 URL input type

## Troubleshooting

### Common Issues

#### URL Validation Not Working
**Problem:** URL validation not functioning correctly
**Solution:** Check HTML5 URL input support and validation patterns

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### URL Pattern Issues
**Problem:** Custom URL patterns not working
**Solution:** Verify pattern attribute syntax and regex validity

#### Styling Issues
**Problem:** URL input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Validation Issues
**Problem:** URL validation errors not displaying
**Solution:** Check form validation rules and error handling

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Text:** Text input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with HTML5 URL input type
- FormInput extension with URL validation
- Help and default slot support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-url.blade.php`
2. Add/update tests in `tests/Components/FormUrlTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Text Component](../form-text.md)
- [HTML5 URL Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/url)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
