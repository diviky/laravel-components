# Form Signature Component

A digital signature component with SignaturePad.js integration that provides a professional signature capture experience. Features include responsive canvas, theme-aware styling, touch support, and automatic data extraction for form submission.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, SignaturePad.js

## Files

- **PHP Class:** `src/Components/FormSignature.php`
- **View File:** `resources/views/bootstrap-5/form-signature.blade.php`
- **Documentation:** `docs/form-signature.md`

## Basic Usage

### Simple Signature Input
```blade
<x-form-signature name="signature" label="Digital Signature" />
```

### With Custom Height
```blade
<x-form-signature 
    name="contract_signature" 
    label="Contract Signature"
    height="400">
</x-form-signature>
```

### With Custom Configuration
```blade
<x-form-signature 
    name="signature" 
    label="Official Signature"
    :config="['penColor' => '#007bff', 'backgroundColor' => '#f8f9fa']">
</x-form-signature>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'signature'` or `'contract_signature'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Digital Signature'` |
| value | mixed | null | Current signature value | `'data:image/png;base64,...'` |
| default | mixed | null | Default signature value | `'stored_signature.png'` |
| language | string | null | Language-specific naming | `'en'` |
| height | string | '250' | Canvas height in pixels | `'400'` |
| config | array | [] | SignaturePad.js configuration | `['penColor' => '#007bff']` |
| clearText | string | 'Clear' | Clear button tooltip text | `'Erase Signature'` |

### Inherited Attributes

This component inherits from the base `Component` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'signature-input'` |
| class | string | null | Additional CSS classes | `'custom-signature'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| icon | string | '' | Icon for the component | `'signature'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'sign-documents'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the signature area
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Please sign in the box above using your mouse or touch device
</x-slot:help>
```

## Usage Examples

### Basic Signature Capture
```blade
<x-form-signature 
    name="signature" 
    label="Please sign here"
    height="300">
    
    <x-slot:help>
        Use your mouse or touch device to sign above
    </x-slot:help>
</x-form-signature>
```

### Contract Signature with Custom Styling
```blade
<x-form-signature 
    name="contract_signature" 
    label="Contract Agreement Signature"
    height="400"
    :config="[
        'penColor' => '#dc3545',
        'backgroundColor' => '#f8f9fa',
        'dotSize' => 2,
        'minWidth' => 0.5
    ]">
    
    <x-slot:help>
        By signing below, you agree to the terms and conditions
    </x-slot:help>
</x-form-signature>
```

### Legal Document Signature
```blade
<x-form-signature 
    name="legal_signature" 
    label="Legal Document Signature"
    height="350"
    :config="[
        'penColor' => '#000000',
        'backgroundColor' => '#ffffff',
        'dotSize' => 1.5,
        'minWidth' => 1
    ]">
    
    <x-slot:help>
        This signature will be legally binding
    </x-slot:help>
</x-form-signature>
```

### With Model Binding
```blade
<x-form-signature 
    name="user_signature" 
    label="User Signature"
    :bind="$user"
    bind-key="signature">
</x-form-signature>
```

### Livewire Integration
```blade
<x-form-signature 
    wire:model="signatureData"
    name="signature" 
    label="Digital Signature"
    height="300">
    
    <x-slot:help>
        Signature data: {{ $signatureData ? 'Captured' : 'Not captured' }}
    </x-slot:help>
</x-form-signature>
```

### With Validation
```blade
<x-form-signature 
    name="signature" 
    label="Required Signature"
    required
    height="250">
    
    <x-slot:help>
        This signature is required to proceed
    </x-slot:help>
</x-form-signature>
```

### Custom Styling
```blade
<x-form-signature 
    name="signature" 
    label="Styled Signature"
    class="custom-signature-pad"
    style="--signature-border-color: #007bff;">
</x-form-signature>
```

### With Language Support
```blade
<x-form-signature 
    name="signature" 
    label="Firma Digital"
    language="es"
    height="300">
</x-form-signature>
```

### Professional Document Signature
```blade
<x-form-signature 
    name="professional_signature" 
    label="Professional Certification Signature"
    height="400"
    :config="[
        'penColor' => '#28a745',
        'backgroundColor' => '#ffffff',
        'dotSize' => 2.5,
        'minWidth' => 1.5,
        'throttle' => 16
    ]">
    
    <x-slot:help>
        Please provide your professional signature for certification
    </x-slot:help>
</x-form-signature>
```

### Mobile-Optimized Signature
```blade
<x-form-signature 
    name="mobile_signature" 
    label="Mobile Signature"
    height="200"
    :config="[
        'penColor' => '#6c757d',
        'backgroundColor' => '#f8f9fa',
        'dotSize' => 3,
        'minWidth' => 2
    ]">
    
    <x-slot:help>
        Optimized for touch devices
    </x-slot:help>
</x-form-signature>
```

## Component Variants

### Standard Signature Pad
**Usage:** `<x-form-signature>` (default)
**Description:** Basic signature capture with default settings
**Features:**
- Responsive canvas
- Theme-aware colors
- Touch and mouse support
- Clear functionality

### Custom Height Signature Pad
**Usage:** `<x-form-signature height="400">`
**Description:** Signature pad with custom dimensions
**Features:**
- Adjustable canvas height
- Responsive width
- Custom aspect ratios
- Professional appearance

### Configured Signature Pad
**Usage:** `<x-form-signature :config="[...]">`
**Description:** Fully customizable signature experience
**Features:**
- Custom pen colors
- Background customization
- Pen size control
- Performance tuning

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-signature>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-signature' => [
        'view' => 'laravel-components::{framework}.form-signature',
        'class' => Components\FormSignature::class,
    ],
],
```

### SignaturePad.js Configuration
The component uses SignaturePad.js with these default settings:
- **Pen color:** Theme-aware (CSS variable)
- **Background:** Transparent
- **Canvas:** Responsive with high DPI support
- **Touch support:** Enabled with touch-none class

### Configuration Options

| Setting | Type | Default | Description | Example |
|---------|------|---------|-------------|---------|
| penColor | string | 'var(--tblr-body-color)' | Pen color | `'#007bff'`, `'rgb(0,123,255)'` |
| backgroundColor | string | 'transparent' | Background color | `'#ffffff'`, `'rgba(0,0,0,0.1)'` |
| dotSize | number | 1 | Dot size for single points | `2`, `1.5` |
| minWidth | number | 0.5 | Minimum stroke width | `1`, `2` |
| maxWidth | number | 2.5 | Maximum stroke width | `3`, `4` |
| throttle | number | 16 | Throttle for performance | `8`, `32` |
| velocityFilterWeight | number | 0.7 | Velocity filter weight | `0.5`, `1.0` |

## Common Patterns

### Legal Document Signature
```blade
<x-form-signature 
    name="legal_signature" 
    label="Legal Document Signature"
    height="400"
    :config="[
        'penColor' => '#000000',
        'backgroundColor' => '#ffffff',
        'dotSize' => 1.5,
        'minWidth' => 1,
        'maxWidth' => 3
    ]">
    
    <x-slot:help>
        <strong>Important:</strong> This signature will be legally binding. 
        Please ensure it matches your official signature.
    </x-slot:help>
</x-form-signature>
```

### Contract Agreement Form
```blade
<div class="contract-form">
    <h3>Service Agreement</h3>
    <p>By signing below, you agree to the terms and conditions...</p>
    
    <x-form-signature 
        name="agreement_signature" 
        label="Agreement Signature"
        height="300"
        :config="['penColor' => '#dc3545']">
        
        <x-slot:help>
            Sign to confirm your agreement to the terms
        </x-slot:help>
    </x-form-signature>
    
    <div class="mt-3">
        <small class="text-muted">
            Date: {{ now()->format('M d, Y') }}
        </small>
    </div>
</div>
```

### User Profile Signature
```blade
<div class="profile-signature">
    <x-form-signature 
        name="profile_signature" 
        label="Profile Signature"
        height="200"
        :config="[
            'penColor' => '#6c757d',
            'backgroundColor' => '#f8f9fa'
        ]">
        
        <x-slot:help>
            Add a personal signature to your profile
        </x-slot:help>
    </x-form-signature>
</div>
```

### Multi-Language Signature Forms
```blade
<div class="multilingual-signature">
    <x-form-signature 
        name="signature" 
        label="Digital Signature / Firma Digital"
        language="en"
        height="300">
        
        <x-slot:help>
            <div class="d-flex gap-3">
                <span>🇺🇸 Sign above to proceed</span>
                <span>🇪🇸 Firma arriba para continuar</span>
            </div>
        </x-slot:help>
    </x-form-signature>
</div>
```

### Professional Certification
```blade
<div class="certification-signature">
    <h4>Professional Certification</h4>
    <p>I hereby certify that the information provided is accurate...</p>
    
    <x-form-signature 
        name="certification_signature" 
        label="Certification Signature"
        height="350"
        :config="[
            'penColor' => '#28a745',
            'backgroundColor' => '#ffffff',
            'dotSize' => 2,
            'minWidth' => 1.5
        ]">
        
        <x-slot:help>
            <strong>Certification:</strong> Your signature confirms the accuracy of this information
        </x-slot:help>
    </x-form-signature>
    
    <div class="mt-3">
        <small class="text-muted">
            Certified on: {{ now()->format('F j, Y \a\t g:i A') }}
        </small>
    </div>
</div>
```

### Mobile-First Signature
```blade
<x-form-signature 
    name="mobile_signature" 
    label="Touch Signature"
    height="250"
    :config="[
        'penColor' => '#495057',
        'backgroundColor' => '#f8f9fa',
        'dotSize' => 3,
        'minWidth' => 2,
        'throttle' => 8
    ]">
    
    <x-slot:help>
        <div class="d-none d-md-block">
            Use your mouse to sign above
        </div>
        <div class="d-md-none">
            👆 Use your finger to sign above
        </div>
    </x-slot:help>
</x-form-signature>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_signature_with_basic_attributes()
{
    $view = $this->blade('<x-form-signature name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-signature');
}

/** @test */
public function it_renders_form_signature_with_custom_height()
{
    $view = $this->blade('<x-form-signature name="signature" height="400" />');
    
    $view->assertSee('name="signature"');
    $view->assertSee('height="400"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(SignatureComponent::class)
        ->assertSee('<x-form-signature')
        ->set('signatureData', 'data:image/png;base64,...')
        ->assertSee('Captured');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to signature canvas
- `aria-describedby`: Links to help text
- `role="img"`: Applied to canvas element

### Keyboard Navigation
- Tab navigation to signature area
- Clear button accessibility
- Screen reader support for signature status

### Screen Reader Support
- Proper labeling and descriptions
- Signature capture status announcements
- Clear button functionality communication
- Canvas content description

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x, SignaturePad.js
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Touch Support:** Full touch device compatibility
- **Canvas Support:** HTML5 Canvas API required

## Troubleshooting

### Common Issues

#### Signature Not Capturing
**Problem:** Signature strokes not appearing
**Solution:** Check SignaturePad.js loading and canvas initialization

#### Canvas Not Responsive
**Problem:** Canvas size doesn't match container
**Solution:** Verify height attribute and CSS styling

#### Touch Not Working
**Problem:** Touch gestures not recognized
**Solution:** Ensure touch-none class is applied and device supports touch

#### Theme Colors Not Working
**Problem:** Colors don't match theme
**Solution:** Check CSS variable availability and theme detection

#### Performance Issues
**Problem:** Slow signature rendering
**Solution:** Adjust throttle and velocity filter settings

#### Clear Button Not Working
**Problem:** Clear functionality fails
**Solution:** Verify Alpine.js event handling and SignaturePad clear method

## Related Components

- **Form Input:** Base form component
- **Form File:** File upload component
- **Form Image:** Image upload component
- **Icon:** Clear button icon
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with SignaturePad.js integration
- Responsive canvas with high DPI support
- Theme-aware color system
- Touch and mouse support
- Automatic data extraction

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormSignature.php`
2. Update the view file: `resources/views/bootstrap-5/form-signature.blade.php`
3. Add/update tests in `tests/Components/FormSignatureTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form File Component](../form-file.md)
- [Form Image Component](../form-image.md)
- [Icon Component](../icon.md)
- [SignaturePad.js Documentation](https://github.com/szimek/signature_pad)
- [Alpine.js Documentation](https://alpinejs.dev/)
