# Form Image Component

A sophisticated image input component that provides professional image upload, preview, and cropping capabilities with comprehensive form integration and enhanced user experience. This component offers advanced image handling features including real-time preview, image cropping, progress tracking, and seamless Livewire integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, Alpine.js, Cropper.js
**JavaScript Libraries:** Alpine.js, Cropper.js for image manipulation

## Files

- **PHP Class:** `src/Components/FormImage.php`
- **View File:** `resources/views/bootstrap-5/form-image.blade.php`
- **Tests:** `tests/Components/FormImageTest.php`
- **Documentation:** `docs/form-image.md`

## Basic Usage

### Simple Image Upload
```blade
<x-form-image name="profile_image" label="Profile Picture" />
```

### With Default Value
```blade
<x-form-image 
    name="avatar" 
    label="Avatar"
    :default="'default-avatar.jpg'">
</x-form-image>
```

### With Custom Preview Content
```blade
<x-form-image name="banner" label="Banner Image">
    <div class="banner-preview">
        <i class="fas fa-image fa-3x"></i>
        <p>Click to upload banner image</p>
    </div>
</x-form-image>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'profile_image'` or `'banner'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Upload Image'` |
| value | mixed | '' | Current image value | `'current-image.jpg'` |
| default | mixed | null | Default image value | `'default.jpg'` |
| language | string | null | Language-specific naming | `'en'` |
| bind | mixed | null | Model binding | `$user` |
| hideProgress | boolean | false | Hide progress bar | `true` |
| cropAfterChange | boolean | false | Auto-crop after file change | `true` |
| changeText | string | 'Change' | Change button text | `'Update Image'` |
| cropTitleText | string | 'Crop image' | Crop modal title | `'Adjust Image'` |
| cropCancelText | string | 'Cancel' | Crop cancel button text | `'Discard'` |
| cropSaveText | string | 'Crop' | Crop save button text | `'Apply'` |
| cropConfig | array | [] | Cropper.js configuration | `['aspectRatio' => 1]` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'image']` |

### Inherited Attributes

This component supports standard form attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'image-input'` |
| class | string | '' | CSS classes | `'image-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| accept | string | 'image/*' | Accepted file types | `'image/jpeg,image/png'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'upload-images'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### Default Slot
- **Purpose:** Custom preview content and upload trigger
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-image name="image">
    <div class="custom-preview">
        <i class="fas fa-cloud-upload-alt fa-2x"></i>
        <p>Click to upload image</p>
    </div>
</x-form-image>
```

#### `help`
- **Purpose:** Help text below the image input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Supported formats: JPEG, PNG, GIF. Max size: 5MB.
</x-slot:help>
```

## Usage Examples

### Basic Image Upload
```blade
<x-form-image 
    name="profile_photo" 
    label="Profile Photo">
    
    <x-slot:help>
        Upload a clear, professional photo for your profile
    </x-slot:help>
</x-form-image>
```

### Required Image Upload
```blade
<x-form-image 
    name="required_image" 
    label="Required Image"
    required>
    
    <x-slot:help>
        This image is required to complete your profile
    </x-slot:help>
</x-form-image>
```

### With Custom Preview Content
```blade
<x-form-image 
    name="banner_image" 
    label="Banner Image">
    
    <div class="banner-upload-area">
        <div class="upload-icon">
            <i class="fas fa-image fa-4x text-muted"></i>
        </div>
        <div class="upload-text">
            <h5>Upload Banner Image</h5>
            <p class="text-muted">Click here to select an image</p>
            <small class="text-muted">Recommended: 1200x400 pixels</small>
        </div>
    </div>
    
    <x-slot:help>
        <div class="banner-guidelines">
            <strong>Banner Guidelines:</strong><br>
            • Minimum size: 800x300 pixels<br>
            • Maximum size: 5MB<br>
            • Supported formats: JPEG, PNG, WebP
        </div>
    </x-slot:help>
</x-form-image>
```

### With Language Support
```blade
<x-form-image 
    name="localized_image" 
    label="Localized Image"
    language="en">
    
    <x-slot:help>
        This image will be specific to the English language
    </x-slot:help>
</x-form-image>
```

### With Auto-Crop After Change
```blade
<x-form-image 
    name="auto_crop_image" 
    label="Auto-Crop Image"
    :crop-after-change="true">
    
    <x-slot:help>
        Image will automatically open in crop mode after selection
    </x-slot:help>
</x-form-image>
```

### With Custom Crop Configuration
```blade
<x-form-image 
    name="square_image" 
    label="Square Image"
    :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
    
    <x-slot:help>
        Image will be constrained to a square aspect ratio
    </x-slot:help>
</x-form-image>
```

### With Hidden Progress Bar
```blade
<x-form-image 
    name="hidden_progress_image" 
    label="Image Upload"
    :hide-progress="true">
    
    <x-slot:help>
        Progress bar is hidden for this upload
    </x-slot:help>
</x-form-image>
```

### With Custom Change Text
```blade
<x-form-image 
    name="custom_change_image" 
    label="Custom Change Image"
    change-text="Replace Image"
    crop-title-text="Adjust Image Size"
    crop-cancel-text="Keep Original"
    crop-save-text="Apply Changes">
    
    <x-slot:help>
        Custom text for all buttons and modal titles
    </x-slot:help>
</x-form-image>
```

### Livewire Integration
```blade
<x-form-image 
    wire:model="profileImage"
    name="livewire_image" 
    label="Livewire Image"
    :crop-after-change="true">
    
    <div class="livewire-preview">
        @if($profileImage)
            <img src="{{ $profileImage }}" alt="Profile" class="img-thumbnail">
        @else
            <div class="placeholder">
                <i class="fas fa-user fa-3x text-muted"></i>
                <p>No image selected</p>
            </div>
        @endif
    </div>
    
    <x-slot:help>
        <div class="livewire-status">
            <strong>Status:</strong> 
            <span x-text="$wire.profileImage ? 'Image uploaded' : 'No image'">
                {{ $profileImage ? 'Image uploaded' : 'No image' }}
            </span>
        </div>
    </x-slot:help>
</x-form-image>
```

### With Model Binding
```blade
<x-form-image 
    name="user_avatar" 
    label="User Avatar"
    :bind="$user">
    
    <x-slot:help>
        This image will be bound to the user model
    </x-slot:help>
</x-form-image>
```

## Component Variants

### Standard Image Upload
**Usage:** `<x-form-image>` (default)
**Description:** Basic image upload with preview
**Features:**
- File input with image preview
- Progress tracking
- Basic form integration
- Standard validation

### Custom Preview Image Upload
**Usage:** `<x-form-image><div class="custom-preview">...</div></x-form-image>`
**Description:** Image upload with custom preview content
**Features:**
- Custom preview area
- Enhanced user experience
- Professional appearance
- Flexible content layout

### Auto-Crop Image Upload
**Usage:** `<x-form-image :crop-after-change="true">`
**Description:** Image upload with automatic cropping
**Features:**
- Automatic crop modal
- Enhanced user workflow
- Professional image editing
- Streamlined process

### Localized Image Upload
**Usage:** `<x-form-image language="en">`
**Description:** Language-specific image upload
**Features:**
- Multi-language support
- Localized naming
- Internationalization ready
- Language-specific validation

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-image>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-image' => [
        'view' => 'laravel-components::{framework}.form-image',
    ],
],
```

### Cropper.js Configuration
```blade
<x-form-image 
    name="image" 
    :crop-config="[
        'aspectRatio' => 16/9,
        'viewMode' => 2,
        'dragMode' => 'crop',
        'autoCropArea' => 0.8,
        'restore' => false,
        'guides' => true,
        'center' => true,
        'highlight' => false,
        'cropBoxMovable' => true,
        'cropBoxResizable' => true,
        'toggleDragModeOnDblclick' => false
    ]">
</x-form-image>
```

### Default Settings
The component uses these default settings:
- **File Type:** `image/*`
- **Progress Tracking:** Enabled
- **Auto-Crop:** Disabled
- **Crop Configuration:** Standard Cropper.js defaults

## Common Patterns

### Profile Picture Upload
```blade
<div class="profile-picture-upload">
    <h4>Profile Picture</h4>
    <p>Upload a professional photo for your profile:</p>
    
    <x-form-image 
        name="profile_picture" 
        label="Profile Picture"
        :crop-after-change="true"
        :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
        
        <div class="profile-upload-area">
            <div class="avatar-placeholder">
                <i class="fas fa-user fa-4x text-muted"></i>
            </div>
            <div class="upload-instructions">
                <h6>Click to Upload</h6>
                <p class="text-muted">Choose a clear, professional photo</p>
                <small class="text-muted">Square format recommended</small>
            </div>
        </div>
        
        <x-slot:help>
            <div class="profile-picture-guidelines">
                <strong>Photo Guidelines:</strong><br>
                • Use a clear, high-quality image<br>
                • Square format works best<br>
                • Professional appearance recommended<br>
                • File size under 5MB
            </div>
        </x-slot:help>
    </x-form-image>
    
    <div class="profile-picture-tips mt-3">
        <h6>Tips for Great Profile Pictures</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Lighting:</strong><br>
                • Good natural lighting<br>
                • Avoid harsh shadows<br>
                • Face should be well-lit
            </div>
            <div class="col-md-4">
                <strong>Composition:</strong><br>
                • Center your face<br>
                • Leave some space around<br>
                • Avoid extreme close-ups
            </div>
            <div class="col-md-4">
                <strong>Background:</strong><br>
                • Simple, clean background<br>
                • Avoid busy patterns<br>
                • Professional setting
            </div>
        </div>
    </div>
</div>
```

### Product Image Management
```blade
<div class="product-image-management">
    <h4>Product Images</h4>
    <p>Upload images for your product:</p>
    
    <x-form-image 
        name="product_main_image" 
        label="Main Product Image"
        :crop-after-change="true"
        :crop-config="['aspectRatio' => 4/3, 'viewMode' => 1]">
        
        <div class="product-image-upload">
            <div class="image-placeholder">
                <i class="fas fa-box fa-4x text-muted"></i>
            </div>
            <div class="upload-text">
                <h6>Main Product Image</h6>
                <p class="text-muted">This will be the primary image</p>
                <small class="text-muted">4:3 aspect ratio recommended</small>
            </div>
        </div>
        
        <x-slot:help>
            <div class="product-image-requirements">
                <strong>Image Requirements:</strong><br>
                • High resolution (minimum 800x600)<br>
                • 4:3 aspect ratio recommended<br>
                • Clear product visibility<br>
                • Professional lighting
            </div>
        </x-slot:help>
    </x-form-image>
    
    <div class="product-image-gallery mt-3">
        <h6>Additional Product Images</h6>
        <div class="row">
            <div class="col-md-3">
                <x-form-image 
                    name="product_image_1" 
                    label="Additional Image 1"
                    :crop-config="['aspectRatio' => 4/3]">
                    
                    <div class="gallery-upload">
                        <i class="fas fa-plus fa-2x text-muted"></i>
                        <small>Add Image</small>
                    </div>
                </x-form-image>
            </div>
            <div class="col-md-3">
                <x-form-image 
                    name="product_image_2" 
                    label="Additional Image 2"
                    :crop-config="['aspectRatio' => 4/3]">
                    
                    <div class="gallery-upload">
                        <i class="fas fa-plus fa-2x text-muted"></i>
                        <small>Add Image</small>
                    </div>
                </x-form-image>
            </div>
            <div class="col-md-3">
                <x-form-image 
                    name="product_image_3" 
                    label="Additional Image 3"
                    :crop-config="['aspectRatio' => 4/3]">
                    
                    <div class="gallery-upload">
                        <i class="fas fa-plus fa-2x text-muted"></i>
                        <small>Add Image</small>
                    </div>
                </x-form-image>
            </div>
            <div class="col-md-3">
                <x-form-image 
                    name="product_image_4" 
                    label="Additional Image 4"
                    :crop-config="['aspectRatio' => 4/3]">
                    
                    <div class="gallery-upload">
                        <i class="fas fa-plus fa-2x text-muted"></i>
                        <small>Add Image</small>
                    </div>
                </x-form-image>
            </div>
        </div>
    </div>
</div>
```

### Banner Image Upload
```blade
<div class="banner-image-upload">
    <h4>Banner Image</h4>
    <p>Upload a banner image for your page:</p>
    
    <x-form-image 
        name="banner_image" 
        label="Banner Image"
        :crop-after-change="true"
        :crop-config="['aspectRatio' => 3/1, 'viewMode' => 1]">
        
        <div class="banner-upload-area">
            <div class="banner-placeholder">
                <i class="fas fa-image fa-4x text-muted"></i>
            </div>
            <div class="banner-text">
                <h6>Banner Image</h6>
                <p class="text-muted">Upload a wide banner image</p>
                <small class="text-muted">3:1 aspect ratio recommended</small>
            </div>
        </div>
        
        <x-slot:help>
            <div class="banner-image-specs">
                <strong>Banner Specifications:</strong><br>
                • Width: 1200px minimum<br>
                • Height: 400px minimum<br>
                • 3:1 aspect ratio<br>
                • File size under 2MB
            </div>
        </x-slot:help>
    </x-form-image>
    
    <div class="banner-preview mt-3">
        <h6>Banner Preview</h6>
        <div class="banner-preview-container">
            <div class="banner-preview-placeholder">
                <p class="text-muted">Banner preview will appear here</p>
                <small class="text-muted">Upload an image to see preview</small>
            </div>
        </div>
    </div>
</div>
```

### Gallery Image Upload
```blade
<div class="gallery-image-upload">
    <h4>Gallery Images</h4>
    <p>Upload multiple images for your gallery:</p>
    
    <div class="gallery-upload-grid">
        <div class="row">
            <div class="col-md-4 mb-3">
                <x-form-image 
                    name="gallery_image_1" 
                    label="Gallery Image 1"
                    :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
                    
                    <div class="gallery-upload-item">
                        <i class="fas fa-image fa-3x text-muted"></i>
                        <p class="text-muted">Image 1</p>
                    </div>
                </x-form-image>
            </div>
            
            <div class="col-md-4 mb-3">
                <x-form-image 
                    name="gallery_image_2" 
                    label="Gallery Image 2"
                    :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
                    
                    <div class="gallery-upload-item">
                        <i class="fas fa-image fa-3x text-muted"></i>
                        <p class="text-muted">Image 2</p>
                    </div>
                </x-form-image>
            </div>
            
            <div class="col-md-4 mb-3">
                <x-form-image 
                    name="gallery_image_3" 
                    label="Gallery Image 3"
                    :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
                    
                    <div class="gallery-upload-item">
                        <i class="fas fa-image fa-3x text-muted"></i>
                        <p class="text-muted">Image 3</p>
                    </div>
                </x-form-image>
            </div>
        </div>
    </div>
    
    <div class="gallery-instructions mt-3">
        <h6>Gallery Instructions</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Image Requirements:</strong><br>
                • Square format (1:1 aspect ratio)<br>
                • High resolution (minimum 800x800)<br>
                • Consistent lighting and style<br>
                • Professional quality
            </div>
            <div class="col-md-6">
                <strong>Upload Tips:</strong><br>
                • Use descriptive filenames<br>
                • Optimize file sizes<br>
                • Maintain consistent style<br>
                • Consider image order
            </div>
        </div>
    </div>
</div>
```

### Document Image Upload
```blade
<div class="document-image-upload">
    <h4>Document Images</h4>
    <p>Upload images of your documents:</p>
    
    <x-form-image 
        name="document_image" 
        label="Document Image"
        :crop-after-change="true"
        :crop-config="['aspectRatio' => 4/3, 'viewMode' => 1]">
        
        <div class="document-upload-area">
            <div class="document-placeholder">
                <i class="fas fa-file-image fa-4x text-muted"></i>
            </div>
            <div class="document-text">
                <h6>Document Image</h6>
                <p class="text-muted">Upload a clear image of your document</p>
                <small class="text-muted">Ensure all text is readable</small>
            </div>
        </div>
        
        <x-slot:help>
            <div class="document-image-guidelines">
                <strong>Document Guidelines:</strong><br>
                • Ensure all text is clearly visible<br>
                • Use good lighting to avoid shadows<br>
                • Capture the entire document<br>
                • Avoid blurry or low-quality images
            </div>
        </x-slot:help>
    </x-form-image>
    
    <div class="document-examples mt-3">
        <h6>Good vs. Bad Examples</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="good-example">
                    <h6 class="text-success">✅ Good Example</h6>
                    <ul class="text-success">
                        <li>Clear, readable text</li>
                        <li>Good lighting</li>
                        <li>Entire document visible</li>
                        <li>High resolution</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bad-example">
                    <h6 class="text-danger">❌ Bad Example</h6>
                    <ul class="text-danger">
                        <li>Blurry or unclear text</li>
                        <li>Poor lighting</li>
                        <li>Partial document visible</li>
                        <li>Low resolution</li>
                    </ul>
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
public function it_renders_form_image_with_basic_attributes()
{
    $view = $this->blade('<x-form-image name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-image');
}

/** @test */
public function it_renders_form_image_with_label()
{
    $view = $this->blade('<x-form-image name="image" label="Upload Image" />');
    
    $view->assertSee('name="image"');
    $view->assertSee('Upload Image');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ImageComponent::class)
        ->assertSee('<x-form-image')
        ->set('image', 'test.jpg')
        ->assertSee('test.jpg');
}
```

## Accessibility

### ARIA Attributes
- `role="progressbar"`: Applied to progress elements
- `aria-label`: Applied to image inputs
- `aria-describedby`: Links to help text

### Keyboard Navigation
- Tab navigation to image input
- File selection dialog
- Crop modal navigation
- Progress tracking

### Screen Reader Support
- Proper labeling and descriptions
- Progress announcements
- Help text communication
- Error message communication

### Image Accessibility
- Clear image purpose indication
- Proper validation feedback
- Helpful error messages
- Image guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js, Cropper.js
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **File Input Support:** HTML5 file input with image preview

## Troubleshooting

### Common Issues

#### Image Not Uploading
**Problem:** Image upload not working
**Solution:** Check file permissions and upload configuration

#### Cropper Not Working
**Problem:** Image cropping not functioning
**Solution:** Verify Cropper.js library inclusion

#### Progress Bar Issues
**Problem:** Progress tracking not working
**Solution:** Check Livewire upload configuration

#### Preview Not Showing
**Problem:** Image preview not displaying
**Solution:** Verify file input and preview logic

#### Crop Modal Issues
**Problem:** Crop modal not opening
**Solution:** Check modal component and Cropper.js initialization

## Related Components

- **Form File:** Base file input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component
- **Modal:** Crop modal component

## Changelog

### Version 1.0.0
- Initial release with image upload functionality
- Image preview and cropping capabilities
- Progress tracking and Livewire integration
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormImage.php`
2. Update the view file: `resources/views/bootstrap-5/form-image.blade.php`
3. Add/update tests in `tests/Components/FormImageTest.php`
4. Update this documentation

## See Also

- [Form File Component](../form-file.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Modal Component](../modal.md)
- [Cropper.js Documentation](https://cropperjs.com/)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel File Uploads](https://laravel.com/docs/file-uploads)
