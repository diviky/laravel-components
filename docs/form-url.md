# Form URL Component

A specialized URL input component that extends FormInput with HTML5 URL validation and proper input type attributes.

## Overview

**Component Type:** Form Input Component (URL Specialization)  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4, Tailwind CSS  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap CSS for styling  
**Location:** `resources/views/bootstrap-5/form-url.blade.php`  
**Base Component:** Extends `x-form-input` with `type="url"`

## Files

- **View File:** `resources/views/bootstrap-5/form-url.blade.php`
- **Documentation:** `docs/form-url.md`
- **Tests:** `tests/Components/FormUrlTest.php`

## Basic Usage

```blade
<x-form-url name="website" label="Website URL" placeholder="https://example.com" />
```

## Component Structure

The Form URL component is a simple wrapper around FormInput that automatically sets the input type to "url":

```blade
<x-form-url name="field_name" label="URL Label" placeholder="Enter URL" />
```

## Attributes & Properties

Since this component extends FormInput, it inherits all FormInput attributes and features:

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Input name attribute | 'website' |
| label | string | '' | Input label text | 'Website URL' |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | string | null | Input value | 'https://example.com' |
| placeholder | string | '' | Placeholder text | 'Enter website URL' |
| required | bool | false | Whether the field is required | true |
| readonly | bool | false | Whether the field is readonly | true |
| disabled | bool | false | Whether the field is disabled | true |
| size | string | '' | Input size | 'sm', 'lg' |
| floating | bool | false | Use floating label style | true |
| help | string | null | Help text to display | 'Enter a valid URL' |
| id | string | auto | Input ID attribute | 'website-url' |
| title | string | null | Title attribute for tooltip | 'Enter website URL' |
| class | string | null | Additional CSS classes | 'custom-url-input' |
| wire:model | string | null | Livewire model binding | 'website' |
| pattern | string | null | URL validation pattern | 'https?://.*' |
| maxlength | int | null | Maximum character length | 255 |
| minlength | int | null | Minimum character length | 10 |
| extra-attributes | string | null | Additional HTML attributes | 'data-custom="value"' |

### Inherited Attributes

All components support standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| style | string | null | Inline CSS styles | 'margin: 1rem;' |
| data-* | string | null | Custom data attributes | `data-testid="url-input"` |

## Usage Examples

### Basic URL Input
```blade
<x-form-url name="website" label="Website URL" placeholder="https://example.com" />
```

### Required URL Input
```blade
<x-form-url name="website" label="Website URL" required placeholder="Enter website URL" />
```

### URL Input with Help Text
```blade
<x-form-url name="website" label="Website URL" 
    help="Enter the complete URL including http:// or https://" />
```

### URL Input with Validation Pattern
```blade
<x-form-url name="website" label="Website URL" 
    pattern="https?://.*" title="URL must start with http:// or https://" />
```

### Floating Label URL Input
```blade
<x-form-url name="website" label="Website URL" floating placeholder="https://example.com" />
```

### Small URL Input
```blade
<x-form-url name="website" label="Website URL" size="sm" />
```

### Large URL Input
```blade
<x-form-url name="website" label="Website URL" size="lg" />
```

### Disabled URL Input
```blade
<x-form-url name="website" label="Website URL" disabled value="https://example.com" />
```

### Readonly URL Input
```blade
<x-form-url name="website" label="Website URL" readonly value="https://example.com" />
```

### URL Input with Custom ID
```blade
<x-form-url name="website" label="Website URL" id="custom-website-url" />
```

### URL Input with Custom Class
```blade
<x-form-url name="website" label="Website URL" class="custom-url-input" />
```

### Livewire Integration
```blade
<x-form-url name="website" label="Website URL" wire:model="website" />
```

### URL Input with Character Limits
```blade
<x-form-url name="website" label="Website URL" 
    minlength="10" maxlength="255" 
    placeholder="https://example.com" />
```

### URL Input with Custom Pattern
```blade
<x-form-url name="website" label="Website URL" 
    pattern="https://.*\.com$" 
    title="URL must be HTTPS and end with .com" />
```

## Real Project Examples

### Contact Information Form
```blade
<form method="POST" action="{{ route('contact.store') }}">
    @csrf
    
    <x-form-input name="name" label="Full Name" required />
    <x-form-email name="email" label="Email Address" required />
    <x-form-url name="website" label="Website URL" 
        placeholder="https://your-website.com" 
        help="Optional: Your personal or company website" />
    <x-form-tel name="phone" label="Phone Number" />
    
    <x-form-submit>Submit Contact</x-form-submit>
</form>
```

### Social Media Profile Form
```blade
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
```

### Company Information Form
```blade
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
```

### API Configuration Form
```blade
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
```

### E-commerce Product Form
```blade
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
```

### Developer Profile Form
```blade
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
```

### Livewire Component Example
```blade
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
```

## Advanced Features

### Custom URL Validation
```blade
<x-form-url name="website" label="Website URL" 
    pattern="https://.*\.(com|org|net)$" 
    title="URL must be HTTPS and end with .com, .org, or .net" />
```

### URL with Specific Protocol
```blade
<x-form-url name="secure_site" label="Secure Site" 
    pattern="https://.*" 
    title="Only HTTPS URLs are allowed" />
```

### URL with Domain Restriction
```blade
<x-form-url name="company_site" label="Company Site" 
    pattern="https://.*\.company\.com.*" 
    title="URL must be from company.com domain" />
```

### URL with Path Validation
```blade
<x-form-url name="api_endpoint" label="API Endpoint" 
    pattern="https://api\.example\.com/v[0-9]+/.*" 
    title="URL must be API endpoint with version number" />
```

## Styling and Customization

### Custom CSS Classes
```blade
<x-form-url name="website" label="Website URL" class="custom-url-input" />
```

### Custom Styling
```blade
<x-form-url name="website" label="Website URL" 
    style="background-color: #f8f9fa; border-radius: 10px;" />
```

### Bootstrap Utilities
```blade
<x-form-url name="website" label="Website URL" 
    class="border border-primary bg-light" />
```

## Validation Integration

The component automatically integrates with Laravel's validation system:

```blade
<!-- Will show error styling if validation fails -->
<x-form-url name="website" label="Website URL" required />
```

### Validation Rules
```php
// In your controller
$request->validate([
    'website' => 'required|url',
    'api_url' => 'required|url|starts_with:https://',
    'callback_url' => 'required|url|active_url',
]);
```

### Custom Validation
```php
// Custom URL validation
$request->validate([
    'website' => [
        'required',
        'url',
        function ($attribute, $value, $fail) {
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                $fail('The ' . $attribute . ' must be a valid URL.');
            }
        },
    ],
]);
```

## Styling Classes

The component applies these CSS classes based on props:

- `form-control` - Base input styling
- `form-control-sm` - Small size styling
- `form-control-lg` - Large size styling
- `is-invalid` - Error state styling
- `form-floating` - Floating label styling

## JavaScript Integration

The component can be enhanced with JavaScript:

```javascript
// URL validation
document.querySelectorAll('input[type="url"]').forEach(input => {
    input.addEventListener('blur', function() {
        const url = this.value;
        if (url && !isValidUrl(url)) {
            this.classList.add('is-invalid');
            this.setCustomValidity('Please enter a valid URL');
        } else {
            this.classList.remove('is-invalid');
            this.setCustomValidity('');
        }
    });
});

function isValidUrl(string) {
    try {
        new URL(string);
        return true;
    } catch (_) {
        return false;
    }
}

// Auto-format URLs
document.querySelectorAll('input[type="url"]').forEach(input => {
    input.addEventListener('blur', function() {
        let url = this.value.trim();
        if (url && !url.match(/^https?:\/\//)) {
            url = 'https://' + url;
            this.value = url;
        }
    });
});
```

## Accessibility Features

- Proper label association
- ARIA attributes for screen readers
- Keyboard navigation support
- Focus management
- Error state announcements

```blade
<x-form-url name="accessible" label="Accessible URL" 
    aria-describedby="help-text" aria-required="true" />
```

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **HTML5 URL Validation**: Full support
- **CSS Grid**: Full support
- **Flexbox**: Full support
- **CSS Custom Properties**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**URL validation not working**
```blade
<!-- Ensure proper pattern attribute -->
<x-form-url name="website" label="Website URL" 
    pattern="https?://.*" required />
```

**URL not formatting correctly**
```javascript
// Add JavaScript to auto-format URLs
input.addEventListener('blur', function() {
    if (this.value && !this.value.match(/^https?:\/\//)) {
        this.value = 'https://' + this.value;
    }
});
```

**Validation errors not showing**
```blade
<!-- Ensure validation rules are set -->
<x-form-url name="website" label="Website URL" required />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Input](form-input.md) - Base input component
- [Form Email](form-email.md) - Email input component
- [Form Tel](form-tel.md) - Telephone input component
- [Form Label](form-label.md) - Label component
- [Form Errors](form-errors.md) - Error display component

## Performance

### Optimization Tips
1. **Use appropriate validation** for URL format
2. **Minimize inline styles** when possible
3. **Use Bootstrap classes** for consistent styling
4. **Optimize for mobile** display
5. **Use semantic HTML** for better accessibility

### Bundle Size
- **Base Component**: ~2KB
- **With Bootstrap**: ~50KB (one-time load)
- **With Custom CSS**: ~1KB
- **Full Package**: ~53KB

## Examples Gallery

### Basic URL Inputs
```blade
<!-- Simple URL input -->
<x-form-url name="website" label="Website URL" />

<!-- With placeholder -->
<x-form-url name="website" label="Website URL" placeholder="https://example.com" />

<!-- Required field -->
<x-form-url name="website" label="Website URL" required />
```

### Advanced URL Inputs
```blade
<!-- With validation pattern -->
<x-form-url name="website" label="Website URL" pattern="https://.*" />

<!-- With help text -->
<x-form-url name="website" label="Website URL" help="Enter complete URL" />

<!-- Floating label -->
<x-form-url name="website" label="Website URL" floating />
```

## Changelog

### Version 2.0
- Enhanced URL validation patterns
- Improved accessibility features
- Added floating label support
- Better error handling

### Version 1.0
- Initial release
- Basic URL input functionality
- HTML5 URL validation
- Bootstrap integration

## Contributing

When contributing to the Form URL component:

1. **Test URL validation** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
