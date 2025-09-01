# Form Image Component

An advanced image upload component with built-in cropping capabilities, progress tracking, and Livewire integration. Features include drag-and-drop image uploads, real-time cropping with Cropper.js, progress bars, and customizable crop settings.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, Cropper.js, Livewire file uploads

## Files

- **PHP Class:** `src/Components/FormImage.php`
- **View File:** `resources/views/bootstrap-5/form-image.blade.php`
- **Documentation:** `docs/form-image.md`

## Basic Usage

### Simple Image Upload
```blade
<x-form-image name="profile_photo" label="Profile Photo" />
```

### With Default Image
```blade
<x-form-image 
    name="avatar" 
    label="Avatar"
    :default="$user->avatar_url">
    <img src="{{ $user->avatar_url }}" alt="Current avatar" class="w-32 h-32 rounded-full" />
</x-form-image>
```

### With Cropping Enabled
```blade
<x-form-image 
    name="banner_image" 
    label="Banner Image"
    :crop-after-change="true">
    <img src="{{ $banner_url }}" alt="Current banner" class="w-full h-32 object-cover" />
</x-form-image>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'profile_photo'` or `'banner_image'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Upload Image'` |
| value | mixed | null | Current image value | `'path/to/image.jpg'` |
| default | mixed | null | Default image value | `'default-avatar.jpg'` |
| language | string | null | Language-specific naming | `'en'` |
| hideProgress | boolean | false | Hide upload progress bar | `true` |
| cropAfterChange | boolean | false | Auto-crop after file change | `true` |
| changeText | string | 'Change' | Text for change button | `'Update Image'` |
| cropTitleText | string | 'Crop image' | Crop modal title | `'Adjust Image'` |
| cropCancelText | string | 'Cancel' | Crop cancel button text | `'Discard'` |
| cropSaveText | string | 'Crop' | Crop save button text | `'Apply Changes'` |
| cropConfig | array | [] | Cropper.js configuration | `['aspectRatio' => 16/9]` |

### Inherited Attributes

This component inherits from the base `Component` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'image-input'` |
| class | string | null | Additional CSS classes | `'custom-image'` |
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

### Default Slot
- **Purpose:** Preview image display
- **Required:** No (but recommended for better UX)
- **Content Type:** HTML/Image elements
- **Example:**
```blade
<x-form-image name="avatar">
    <img src="{{ $user->avatar }}" alt="Current avatar" class="w-24 h-24 rounded-full" />
</x-form-image>
```

### Optional Slots

#### `help`
- **Purpose:** Help text below the input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Supported formats: JPG, PNG, GIF. Max size: 5MB
</x-slot:help>
```

## Usage Examples

### Basic Image Upload
```blade
<x-form-image 
    name="photo" 
    label="Upload Photo"
    accept="image/jpeg,image/png">
    
    <x-slot:help>
        Please upload a clear, high-quality photo
    </x-slot:help>
</x-form-image>
```

### Profile Picture with Cropping
```blade
<x-form-image 
    name="profile_picture" 
    label="Profile Picture"
    :crop-after-change="true"
    :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
    
    @if($user->profile_picture)
        <img src="{{ $user->profile_picture }}" 
             alt="Current profile picture" 
             class="w-32 h-32 rounded-full object-cover" />
    @else
        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
            <x-icon name="user" class="w-16 h-16 text-gray-400" />
        </div>
    @endif
</x-form-image>
```

### Banner Image with Custom Crop Settings
```blade
<x-form-image 
    name="banner_image" 
    label="Banner Image"
    :crop-after-change="true"
    :crop-config="[
        'aspectRatio' => 16/9,
        'viewMode' => 1,
        'dragMode' => 'move',
        'autoCropArea' => 0.8
    ]">
    
    @if($page->banner_image)
        <img src="{{ $page->banner_image }}" 
             alt="Current banner" 
             class="w-full h-48 object-cover rounded-lg" />
    @else
        <div class="w-full h-48 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
            <span class="text-white text-lg">Click to upload banner image</span>
        </div>
    @endif
</x-form-image>
```

### Product Gallery Image
```blade
<x-form-image 
    name="product_image" 
    label="Product Image"
    :hide-progress="true"
    :crop-config="['aspectRatio' => 4/3]">
    
    @if($product->image)
        <img src="{{ $product->image }}" 
             alt="{{ $product->name }}" 
             class="w-48 h-36 object-cover rounded-lg" />
    @else
        <div class="w-48 h-36 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
            <div class="text-center">
                <x-icon name="image" class="w-8 h-8 text-gray-400 mx-auto mb-2" />
                <span class="text-sm text-gray-500">Upload image</span>
            </div>
        </div>
    @endif
</x-form-image>
```

### With Model Binding
```blade
<x-form-image 
    name="cover_image" 
    label="Cover Image"
    :bind="$article"
    bind-key="cover_image">
    
    @if($article->cover_image)
        <img src="{{ $article->cover_image }}" 
             alt="Article cover" 
             class="w-full h-64 object-cover rounded-lg" />
    @endif
</x-form-image>
```

### Livewire Integration
```blade
<x-form-image 
    wire:model="selectedImage"
    name="image" 
    label="Select Image"
    :crop-after-change="true">
    
    @if($selectedImage)
        <img src="{{ $selectedImage }}" 
             alt="Selected image" 
             class="w-40 h-40 object-cover rounded-lg" />
    @endif
</x-form-image>
```

### With Validation
```blade
<x-form-image 
    name="logo" 
    label="Company Logo"
    required
    accept="image/png,image/svg+xml">
    
    <x-slot:help>
        Please upload a PNG or SVG logo file
    </x-slot:help>
</x-form-image>
```

### Custom Styling
```blade
<x-form-image 
    name="hero_image" 
    label="Hero Image"
    class="custom-image-upload"
    style="--upload-border-color: #007bff;">
    
    <div class="w-full h-64 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl border-2 border-dashed border-blue-200 flex items-center justify-center hover:border-blue-400 transition-colors">
        <div class="text-center">
            <x-icon name="upload" class="w-12 h-12 text-blue-400 mx-auto mb-3" />
            <h3 class="text-lg font-medium text-gray-900 mb-1">Upload hero image</h3>
            <p class="text-sm text-gray-500">PNG, JPG up to 10MB</p>
        </div>
    </div>
</x-form-image>
```

### With Custom Crop Configuration
```blade
<x-form-image 
    name="thumbnail" 
    label="Thumbnail"
    :crop-after-change="true"
    :crop-config="[
        'aspectRatio' => 1,
        'viewMode' => 2,
        'dragMode' => 'move',
        'autoCropArea' => 0.9,
        'restore' => false,
        'guides' => true,
        'center' => true,
        'highlight' => false,
        'cropBoxMovable' => true,
        'cropBoxResizable' => true,
        'toggleDragModeOnDblclick' => false
    ]">
    
    @if($post->thumbnail)
        <img src="{{ $post->thumbnail }}" 
             alt="Post thumbnail" 
             class="w-24 h-24 object-cover rounded-lg" />
    @endif
</x-form-image>
```

## Component Variants

### Standard Image Upload
**Usage:** `<x-form-image>` (default)
**Description:** Basic image upload with file input
**Features:**
- File selection
- Progress tracking
- Error handling
- Basic validation

### Preview Image Upload
**Usage:** `<x-form-image>...</x-form-image>`
**Description:** Image upload with preview area
**Features:**
- Current image display
- Click to change functionality
- Progress overlay
- Better user experience

### Auto-Crop Image Upload
**Usage:** `<x-form-image :crop-after-change="true">`
**Description:** Automatic cropping after file selection
**Features:**
- Immediate crop modal
- Cropper.js integration
- Real-time preview
- Optimized workflow

### Custom Crop Image Upload
**Usage:** `<x-form-image :crop-config="[...]">`
**Description:** Fully customizable cropping experience
**Features:**
- Custom aspect ratios
- Advanced crop settings
- Professional editing tools
- Flexible configuration

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
        'class' => Components\FormImage::class,
    ],
],
```

### Cropper.js Configuration
The component uses Cropper.js with these default settings:
- **Auto crop area:** 100% (full image)
- **View mode:** 1 (restrict crop box to container)
- **Drag mode:** 'move' (move image within crop box)

### Crop Configuration Options

| Setting | Type | Default | Description | Example |
|---------|------|---------|-------------|---------|
| aspectRatio | number | null | Fixed aspect ratio | `16/9`, `1`, `4/3` |
| viewMode | number | 1 | View mode restriction | `0`, `1`, `2`, `3` |
| dragMode | string | 'move' | Drag behavior | `'move'`, `'crop'`, `'none'` |
| autoCropArea | number | 1 | Auto crop area size | `0.8`, `0.5` |
| restore | boolean | true | Restore crop area | `false` |
| guides | boolean | true | Show crop guides | `false` |
| center | boolean | true | Show center indicator | `false` |
| highlight | boolean | true | Highlight crop area | `false` |
| cropBoxMovable | boolean | true | Allow crop box movement | `false` |
| cropBoxResizable | boolean | true | Allow crop box resizing | `false` |

## Common Patterns

### Profile Picture Upload
```blade
<x-form-image 
    name="avatar" 
    label="Profile Picture"
    :crop-after-change="true"
    :crop-config="['aspectRatio' => 1, 'viewMode' => 2]">
    
    @if($user->avatar)
        <img src="{{ $user->avatar }}" 
             alt="{{ $user->name }}'s avatar" 
             class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg" />
    @else
        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center border-4 border-white shadow-lg">
            <x-icon name="user" class="w-16 h-16 text-white" />
        </div>
    @endif
</x-form-image>
```

### Product Image Gallery
```blade
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @foreach(['main_image', 'image_1', 'image_2', 'image_3'] as $imageField)
        <x-form-image 
            name="{{ $imageField }}" 
            label="{{ ucfirst(str_replace('_', ' ', $imageField)) }}"
            :crop-after-change="true"
            :crop-config="['aspectRatio' => 1]">
            
            @if($product->{$imageField})
                <img src="{{ $product->{$imageField} }}" 
                     alt="Product {{ $loop->iteration }}" 
                     class="w-full h-32 object-cover rounded-lg" />
            @else
                <div class="w-full h-32 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                    <x-icon name="plus" class="w-6 h-6 text-gray-400" />
                </div>
            @endif
        </x-form-image>
    @endforeach
</div>
```

### Hero Section Image
```blade
<x-form-image 
    name="hero_image" 
    label="Hero Background"
    :crop-after-change="true"
    :crop-config="['aspectRatio' => 21/9, 'viewMode' => 1]">
    
    @if($page->hero_image)
        <img src="{{ $page->hero_image }}" 
             alt="Hero background" 
             class="w-full h-64 object-cover rounded-xl shadow-lg" />
    @else
        <div class="w-full h-64 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl flex items-center justify-center">
            <div class="text-center text-white">
                <x-icon name="image" class="w-16 h-16 mx-auto mb-4 opacity-75" />
                <h3 class="text-xl font-semibold mb-2">Upload hero image</h3>
                <p class="text-blue-100">Recommended: 1920x800px landscape</p>
            </div>
        </div>
    @endif
</x-form-image>
```

### Document Image Upload
```blade
<x-form-image 
    name="document_image" 
    label="Document Scan"
    accept="image/jpeg,image/png"
    :crop-after-change="true"
    :crop-config="['aspectRatio' => 8.5/11, 'viewMode' => 1]">
    
    @if($document->image)
        <img src="{{ $document->image }}" 
             alt="Document scan" 
             class="w-48 h-64 object-cover rounded-lg border shadow-sm" />
    @else
        <div class="w-48 h-64 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
            <div class="text-center">
                <x-icon name="document" class="w-12 h-12 text-gray-400 mx-auto mb-3" />
                <span class="text-sm text-gray-500">Scan document</span>
            </div>
        </div>
    @endif
</x-form-image>
```

### Social Media Image
```blade
<x-form-image 
    name="social_image" 
    label="Social Media Preview"
    :crop-after-change="true"
    :crop-config="['aspectRatio' => 1.91/1, 'viewMode' => 1]">
    
    @if($post->social_image)
        <img src="{{ $post->social_image }}" 
             alt="Social media preview" 
             class="w-80 h-42 object-cover rounded-lg" />
    @else
        <div class="w-80 h-42 bg-gradient-to-br from-pink-100 to-purple-100 rounded-lg border-2 border-dashed border-pink-300 flex items-center justify-center">
            <div class="text-center">
                <x-icon name="share" class="w-10 h-10 text-pink-400 mx-auto mb-2" />
                <span class="text-sm text-pink-600">Social preview image</span>
            </div>
        </div>
    @endif
</x-form-image>
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
public function it_renders_form_image_with_cropping_enabled()
{
    $view = $this->blade('<x-form-image name="image" :crop-after-change="true" />');
    
    $view->assertSee('name="image"');
    $view->assertSee('cropAfterChange');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ImageComponent::class)
        ->assertSee('<x-form-image')
        ->set('selectedImage', 'test-image.jpg')
        ->assertSee('test-image.jpg');
}
```

## Accessibility

### ARIA Attributes
- `role="progressbar"`: Applied to progress bar
- `aria-label`: Applied to file input
- `aria-describedby`: Links to help text

### Keyboard Navigation
- Tab navigation to file input
- Enter key for file selection
- Escape key to close crop modal
- Arrow keys for crop adjustments

### Screen Reader Support
- Proper labeling and descriptions
- Progress announcements
- File selection feedback
- Crop operation communication

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x, Cropper.js
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **File API Support:** Required for drag-and-drop functionality

## Troubleshooting

### Common Issues

#### Image Not Uploading
**Problem:** File upload fails
**Solution:** Check Livewire configuration, file size limits, and permissions

#### Cropper Not Initializing
**Problem:** Crop modal doesn't work
**Solution:** Ensure Cropper.js is properly loaded and check for JavaScript errors

#### Progress Bar Not Showing
**Problem:** Upload progress not displayed
**Solution:** Check `hideProgress` setting and Livewire upload configuration

#### Crop Modal Not Closing
**Problem:** Modal persists after crop operation
**Solution:** Verify Alpine.js event handling and modal state management

#### File Type Validation
**Problem:** Wrong file types accepted
**Solution:** Check `accept` attribute and server-side validation

#### Image Preview Issues
**Problem:** Preview not displaying correctly
**Solution:** Verify image paths, check for broken links, ensure proper file permissions

## Related Components

- **Form File:** Basic file upload component
- **Form Dropzone:** Drag-and-drop file upload
- **Modal:** Crop modal container
- **Form Button:** Modal action buttons
- **Icon:** UI icons for upload states

## Changelog

### Version 1.0.0
- Initial release with image upload functionality
- Cropper.js integration for image editing
- Livewire file upload support
- Progress tracking and error handling
- Customizable crop configuration

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormImage.php`
2. Update the view file: `resources/views/bootstrap-5/form-image.blade.php`
3. Add/update tests in `tests/Components/FormImageTest.php`
4. Update this documentation

## See Also

- [Form File Component](../form-file.md)
- [Form Dropzone Component](../form-dropzone.md)
- [Modal Component](../modal.md)
- [Form Button Component](../form-button.md)
- [Cropper.js Documentation](https://cropperjs.com/)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Livewire File Uploads](https://laravel-livewire.com/docs/file-uploads)
