# Form Dropzone Component

A drag-and-drop file upload component that provides an intuitive interface for file selection with visual feedback, progress tracking, and modern UX patterns. Features include drag-and-drop zones, file previews, progress bars, and comprehensive error handling.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Custom dropzone JavaScript, extends base Component

## Files

- **PHP Class:** `src/Components/FormDropzone.php`
- **View File:** `resources/views/bootstrap-5/form-dropzone.blade.php`
- **Documentation:** `docs/form-dropzone.md`

## Basic Usage

### Simple Dropzone
```blade
<x-form-dropzone name="files" label="Upload Files" />
```

### With Custom Styling
```blade
<x-form-dropzone 
    name="documents" 
    label="Drop Documents Here"
    class="custom-dropzone">
</x-form-dropzone>
```

### With Language Support
```blade
<x-form-dropzone 
    name="files" 
    label="Upload Files"
    language="en">
</x-form-dropzone>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'files'` or `'documents'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Upload Files'` |
| value | mixed | null | Current file value | `'document.pdf'` |
| default | mixed | null | Default file value | `'template.docx'` |
| language | string | null | Language-specific naming | `'en'` |
| extraAttributes | array | [] | Additional HTML attributes | `['multiple' => true]` |

### Inherited Attributes

This component inherits from the base `Component` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'dropzone-input'` |
| class | string | null | Additional CSS classes | `'custom-dropzone'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| multiple | boolean | false | Allow multiple files | `true` |
| accept | string | null | Accepted file types | `'.pdf,.doc,.docx'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'upload-files'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the dropzone
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Drag and drop files here or click to browse. Maximum 10 files, 5MB each.
</x-slot:help>
```

## Usage Examples

### Basic File Dropzone
```blade
<x-form-dropzone 
    name="files" 
    label="Upload Files">
    
    <x-slot:help>
        Drag and drop files here or click to browse
    </x-slot:help>
</x-form-dropzone>
```

### Multiple File Dropzone
```blade
<x-form-dropzone 
    name="documents" 
    label="Upload Documents"
    multiple
    accept=".pdf,.doc,.docx">
    
    <x-slot:help>
        You can upload multiple documents at once
    </x-slot:help>
</x-form-dropzone>
```

### Image Dropzone
```blade
<x-form-dropzone 
    name="images" 
    label="Upload Images"
    accept="image/*"
    multiple>
    
    <x-slot:help>
        Supported formats: JPG, PNG, GIF. Max size: 5MB per image
    </x-slot:help>
</x-form-dropzone>
```

### With Model Binding
```blade
<x-form-dropzone 
    name="user_files" 
    label="User Files"
    :bind="$user"
    bind-key="files">
</x-form-dropzone>
```

### Livewire Integration
```blade
<x-form-dropzone 
    wire:model="selectedFiles"
    name="files" 
    label="Select Files"
    multiple>
    
    <x-slot:help>
        Selected: {{ count($selectedFiles) }} files
    </x-slot:help>
</x-form-dropzone>
```

### With Validation
```blade
<x-form-dropzone 
    name="files" 
    label="Required Files"
    required
    multiple>
    
    <x-slot:help>
        This field is required to proceed
    </x-slot:help>
</x-form-dropzone>
```

### Custom Styling
```blade
<x-form-dropzone 
    name="files" 
    label="Styled Dropzone"
    class="custom-dropzone"
    style="--dropzone-border-color: #007bff;">
</x-form-dropzone>
```

### With Language Support
```blade
<x-form-dropzone 
    name="files" 
    label="Archivos"
    language="es"
    multiple>
</x-form-dropzone>
```

### Document Dropzone
```blade
<x-form-dropzone 
    name="documents" 
    label="Document Repository"
    accept=".pdf,.doc,.docx,.txt,.xlsx"
    multiple>
    
    <x-slot:help>
        <strong>Supported formats:</strong> PDF, DOC, DOCX, TXT, XLSX<br>
        <strong>Maximum size:</strong> 10MB per file<br>
        <strong>Note:</strong> All documents will be scanned for viruses
    </x-slot:help>
</x-form-dropzone>
```

### Media Dropzone
```blade
<x-form-dropzone 
    name="media" 
    label="Media Files"
    accept=".mp3,.mp4,.avi,.mov,.jpg,.png"
    multiple>
    
    <x-slot:help>
        Upload audio, video, or image files
    </x-slot:help>
</x-form-dropzone>
```

## Component Variants

### Standard Dropzone
**Usage:** `<x-form-dropzone>` (default)
**Description:** Basic drag-and-drop file upload
**Features:**
- Drag and drop interface
- Click to browse functionality
- Progress tracking
- Error handling

### Multiple File Dropzone
**Usage:** `<x-form-dropzone multiple>`
**Description:** Dropzone supporting multiple file uploads
**Features:**
- Multiple file selection
- Batch upload support
- File preview list
- Progress tracking per file

### Restricted File Types
**Usage:** `<x-form-dropzone accept=".pdf,.doc">`
**Description:** Dropzone with specific file type restrictions
**Features:**
- File type validation
- Visual feedback for invalid files
- Enhanced user experience

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-dropzone>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-dropzone' => [
        'view' => 'laravel-components::{framework}.form-dropzone',
        'class' => Components\FormDropzone::class,
    ],
],
```

### Default Settings
The component uses these default settings:
- **Dropzone class:** `dropzone`
- **Data attributes:** `data-drop`, `data-dropzone`
- **Progress bar:** Bootstrap progress component
- **File input:** Hidden file input for form submission

## Common Patterns

### File Management System
```blade
<div class="file-management">
    <h4>File Repository</h4>
    <p>Upload and manage your documents:</p>
    
    <x-form-dropzone 
        name="repository_files" 
        label="Document Repository"
        accept=".pdf,.doc,.docx,.txt,.xlsx,.csv"
        multiple>
        
        <x-slot:help>
            <strong>Supported formats:</strong> PDF, DOC, DOCX, TXT, XLSX, CSV<br>
            <strong>Maximum files:</strong> 20 files per upload<br>
            <strong>File size limit:</strong> 10MB per file
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="mt-3">
        <small class="text-muted">
            Files will be automatically organized by type and date
        </small>
    </div>
</div>
```

### Image Gallery Upload
```blade
<div class="gallery-upload">
    <h4>Upload Gallery Images</h4>
    
    <x-form-dropzone 
        name="gallery_images" 
        label="Gallery Images"
        accept="image/*"
        multiple>
        
        <x-slot:help>
            Drag and drop images here or click to browse. 
            First image will be the gallery cover.
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="upload-tips mt-3">
        <h6>Upload Tips:</h6>
        <ul class="text-muted">
            <li>Use high-quality images (minimum 1200x800px)</li>
            <li>Supported formats: JPG, PNG, GIF, WebP</li>
            <li>Maximum file size: 5MB per image</li>
        </ul>
    </div>
</div>
```

### Document Processing Center
```blade
<div class="document-processing">
    <h4>Document Processing Center</h4>
    <p>Upload documents for processing and analysis:</p>
    
    <x-form-dropzone 
        name="processing_documents" 
        label="Processing Documents"
        accept=".pdf,.doc,.docx,.txt,.rtf"
        multiple>
        
        <x-slot:help>
            <strong>Processing includes:</strong><br>
            • Text extraction and OCR<br>
            • Content analysis and categorization<br>
            • Metadata extraction<br>
            • Security scanning
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="processing-status mt-3">
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            Documents will be processed in the order received. 
            Processing time varies by document size and complexity.
        </div>
    </div>
</div>
```

### Multi-Language File Upload
```blade
<div class="multilingual-upload">
    <x-form-dropzone 
        name="files" 
        label="Files / Archivos"
        language="en"
        multiple>
        
        <x-slot:help>
            <div class="d-flex gap-3">
                <span>🇺🇸 Drag and drop files here or click to browse</span>
                <span>🇪🇸 Arrastra y suelta archivos aquí o haz clic para explorar</span>
            </div>
        </x-slot:help>
    </x-form-dropzone>
</div>
```

### Batch File Upload
```blade
<div class="batch-upload">
    <h4>Batch File Upload</h4>
    <p>Upload multiple files at once for batch processing:</p>
    
    <x-form-dropzone 
        name="batch_files" 
        label="Batch Files"
        accept=".csv,.xlsx,.xls,.txt"
        multiple>
        
        <x-slot:help>
            <strong>Batch processing features:</strong><br>
            • Bulk data import<br>
            • Automated validation<br>
            • Error reporting<br>
            • Progress tracking
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="batch-info mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Batch Upload Guidelines:</h6>
                <ul class="mb-0">
                    <li>Maximum 100 files per batch</li>
                    <li>Total size limit: 500MB</li>
                    <li>Processing time: 2-5 minutes</li>
                    <li>Email notification when complete</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

### Secure File Upload
```blade
<div class="secure-upload">
    <h4>Secure File Upload</h4>
    <p>Upload sensitive documents with enhanced security:</p>
    
    <x-form-dropzone 
        name="secure_files" 
        label="Secure Documents"
        accept=".pdf,.doc,.docx,.txt"
        multiple>
        
        <x-slot:help>
            <strong>Security features:</strong><br>
            • End-to-end encryption<br>
            • Virus scanning<br>
            • Access control<br>
            • Audit logging
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="security-notice mt-3">
        <div class="alert alert-warning">
            <i class="fas fa-shield-alt"></i>
            <strong>Security Notice:</strong> 
            All uploaded files are encrypted and scanned for security threats. 
            Access is restricted to authorized personnel only.
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_dropzone_with_basic_attributes()
{
    $view = $this->blade('<x-form-dropzone name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-dropzone');
}

/** @test */
public function it_renders_form_dropzone_with_custom_label()
{
    $view = $this->blade('<x-form-dropzone name="files" label="Upload Files" />');
    
    $view->assertSee('name="files"');
    $view->assertSee('Upload Files');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(DropzoneComponent::class)
        ->assertSee('<x-form-dropzone')
        ->set('selectedFiles', ['file1.pdf', 'file2.docx'])
        ->assertSee('file1.pdf');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to dropzone area
- `aria-describedby`: Links to help text
- `role="button"`: Applied to clickable areas

### Keyboard Navigation
- Tab navigation to dropzone
- Enter key to open file dialog
- Space key to open file dialog

### Screen Reader Support
- Proper labeling and descriptions
- File selection announcements
- Progress updates
- Error message communication

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Custom dropzone implementation
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **File API Support:** HTML5 File API required

## Troubleshooting

### Common Issues

#### Drag and Drop Not Working
**Problem:** Files can't be dragged and dropped
**Solution:** Check JavaScript loading and data attributes

#### File Preview Not Showing
**Problem:** File previews not displaying
**Solution:** Verify dropzone JavaScript and CSS

#### Progress Bar Not Updating
**Problem:** Upload progress not showing
**Solution:** Check progress bar implementation and JavaScript

#### File Validation Failing
**Problem:** File type validation not working
**Solution:** Verify accept attribute and file input configuration

#### Multiple File Upload Issues
**Problem:** Multiple files not being accepted
**Solution:** Check multiple attribute and JavaScript handling

#### Language Support Not Working
**Problem:** Language-specific naming not functioning
**Solution:** Check language attribute and name formatting

## Related Components

- **Form File:** Basic file upload component
- **Form Image:** Image-specific upload component
- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with drag-and-drop functionality
- File preview support
- Progress tracking
- Error handling
- Language support

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormDropzone.php`
2. Update the view file: `resources/views/bootstrap-5/form-dropzone.blade.php`
3. Add/update tests in `tests/Components/FormDropzoneTest.php`
4. Update this documentation

## See Also

- [Form File Component](../form-file.md)
- [Form Image Component](../form-image.md)
- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [HTML5 Drag and Drop API](https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API)
- [Laravel File Uploads](https://laravel.com/docs/file-uploads)
