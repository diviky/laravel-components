# Form File Component

A file upload component that provides a user-friendly interface for file selection with automatic MIME type conversion, FilePond integration, and comprehensive file type validation. Features include intelligent accept attribute handling, language support, and Livewire compatibility.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FilePond (optional), extends base Component

## Files

- **PHP Class:** `src/Components/FormFile.php`
- **View File:** `resources/views/bootstrap-5/form-file.blade.php`
- **Documentation:** `docs/form-file.md`

## Basic Usage

### Simple File Upload
```blade
<x-form-file name="document" label="Upload Document" />
```

### With File Type Restrictions
```blade
<x-form-file 
    name="image" 
    label="Upload Image"
    accept=".jpg,.png,.gif">
</x-form-file>
```

### With FilePond Integration
```blade
<x-form-file 
    name="files" 
    label="Upload Files"
    :pond="true">
</x-form-file>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'document'` or `'image'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Upload File'` |
| value | mixed | null | Current file value | `'document.pdf'` |
| default | mixed | null | Default file value | `'template.docx'` |
| type | string | 'text' | Input type | `'file'` |
| size | string | '' | File size limit | `'10MB'` |
| language | string | null | Language-specific naming | `'en'` |
| accept | string | '*.*' | Accepted file types | `'.pdf,.doc,.docx'` |
| pond | boolean | true | Enable FilePond integration | `false` |
| settings | array | [] | FilePond configuration | `['maxFiles' => 5]` |

### Inherited Attributes

This component inherits from the base `Component` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'file-input'` |
| class | string | null | Additional CSS classes | `'custom-file'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| multiple | boolean | false | Allow multiple files | `true` |
| max | string | null | Maximum file size | `'5MB'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'upload-files'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the file input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Maximum file size: 10MB. Supported formats: PDF, DOC, DOCX
</x-slot:help>
```

#### `prepend` (inherited from FormInput)
- **Purpose:** Content before the input field
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:prepend>
    <i class="fas fa-upload"></i>
</x-slot:prepend>
```

## Usage Examples

### Basic File Upload
```blade
<x-form-file 
    name="document" 
    label="Upload Document">
    
    <x-slot:help>
        Please select a file to upload
    </x-slot:help>
</x-form-file>
```

### Image Upload with Restrictions
```blade
<x-form-file 
    name="profile_image" 
    label="Profile Picture"
    accept=".jpg,.png,.gif"
    :pond="false">
    
    <x-slot:help>
        Supported formats: JPG, PNG, GIF. Max size: 5MB
    </x-slot:help>
</x-form-file>
```

### Document Upload with Multiple Files
```blade
<x-form-file 
    name="documents" 
    label="Upload Documents"
    accept=".pdf,.doc,.docx,.txt"
    multiple
    :pond="true">
    
    <x-slot:help>
        You can upload multiple documents at once
    </x-slot:help>
</x-form-file>
```

### With Model Binding
```blade
<x-form-file 
    name="user_avatar" 
    label="User Avatar"
    :bind="$user"
    bind-key="avatar">
</x-form-file>
```

### Livewire Integration
```blade
<x-form-file 
    wire:model="selectedFile"
    name="file" 
    label="Select File"
    accept=".csv,.xlsx">
    
    <x-slot:help>
        Selected: {{ $selectedFile ? $selectedFile->getClientOriginalName() : 'No file selected' }}
    </x-slot:help>
</x-form-file>
```

### With Validation
```blade
<x-form-file 
    name="file" 
    label="Required File"
    required
    accept=".pdf">
    
    <x-slot:help>
        This file is required to proceed
    </x-slot:help>
</x-form-file>
```

### Custom Styling
```blade
<x-form-file 
    name="file" 
    label="Styled File Input"
    class="custom-file-input"
    style="--file-border-color: #007bff;">
</x-form-file>
```

### With Language Support
```blade
<x-form-file 
    name="file" 
    label="Archivo"
    language="es"
    accept=".pdf,.doc">
</x-form-file>
```

### FilePond Configuration
```blade
<x-form-file 
    name="files" 
    label="Advanced File Upload"
    :pond="true"
    :settings="[
        'maxFiles' => 5,
        'maxFileSize' => '10MB',
        'acceptedFileTypes' => ['image/*', 'application/pdf']
    ]">
    
    <x-slot:help>
        Drag and drop files here or click to browse
    </x-slot:help>
</x-form-file>
```

### Audio/Video Upload
```blade
<x-form-file 
    name="media" 
    label="Media Files"
    accept=".mp3,.mp4,.avi,.mov"
    :pond="true">
    
    <x-slot:help>
        Supported formats: MP3, MP4, AVI, MOV
    </x-slot:help>
</x-form-file>
```

## Component Variants

### Standard File Input
**Usage:** `<x-form-file>` (default)
**Description:** Basic file input with standard styling
**Features:**
- Standard HTML file input
- Bootstrap form styling
- File type validation
- Error handling

### FilePond Enhanced Input
**Usage:** `<x-form-file :pond="true">`
**Description:** File input with FilePond drag-and-drop interface
**Features:**
- Drag and drop functionality
- File preview
- Progress indicators
- Advanced configuration options

### Restricted File Types
**Usage:** `<x-form-file accept=".pdf,.doc">`
**Description:** File input with specific file type restrictions
**Features:**
- MIME type conversion
- File extension validation
- Intelligent accept attribute handling

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-file>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-file' => [
        'view' => 'laravel-components::{framework}.form-file',
        'class' => Components\FormFile::class,
    ],
],
```

### FilePond Configuration
The component supports FilePond configuration through the settings attribute:
- **maxFiles:** Maximum number of files
- **maxFileSize:** Maximum file size
- **acceptedFileTypes:** Array of accepted MIME types
- **server:** Custom server configuration
- **instantUpload:** Enable/disable instant upload

### MIME Type Conversion
The component automatically converts file extensions to MIME types:
- **Input:** `.pdf,.doc,.jpg`
- **Output:** `application/pdf,application/msword,image/jpeg`

## Common Patterns

### Document Management System
```blade
<div class="document-upload">
    <h4>Upload Documents</h4>
    <p>Please upload the required documents:</p>
    
    <x-form-file 
        name="identification" 
        label="Identification Document"
        accept=".pdf,.jpg,.png"
        required>
        
        <x-slot:help>
            Upload a valid ID, passport, or driver's license
        </x-slot:help>
    </x-form-file>
    
    <x-form-file 
        name="proof_of_address" 
        label="Proof of Address"
        accept=".pdf,.jpg,.png"
        required>
        
        <x-slot:help>
            Recent utility bill or bank statement
        </x-slot:help>
    </x-form-file>
    
    <div class="mt-3">
        <small class="text-muted">
            All documents must be clear and legible
        </small>
    </div>
</div>
```

### Image Gallery Upload
```blade
<div class="gallery-upload">
    <h4>Upload Gallery Images</h4>
    
    <x-form-file 
        name="gallery_images" 
        label="Gallery Images"
        accept=".jpg,.png,.gif"
        multiple
        :pond="true"
        :settings="[
            'maxFiles' => 10,
            'maxFileSize' => '5MB',
            'acceptedFileTypes' => ['image/*']
        ]">
        
        <x-slot:help>
            Drag and drop images here or click to browse. Max 10 images, 5MB each.
        </x-slot:help>
    </x-form-file>
</div>
```

### Resume Upload Form
```blade
<div class="resume-upload">
    <h4>Upload Your Resume</h4>
    <p>Please upload your resume in one of the supported formats:</p>
    
    <x-form-file 
        name="resume" 
        label="Resume/CV"
        accept=".pdf,.doc,.docx,.txt"
        required>
        
        <x-slot:help>
            <strong>Supported formats:</strong> PDF, DOC, DOCX, TXT<br>
            <strong>Maximum size:</strong> 10MB<br>
            <strong>Note:</strong> PDF format is preferred
        </x-slot:help>
    </x-form-file>
    
    <div class="mt-3">
        <small class="text-muted">
            Your resume will be reviewed by our HR team
        </small>
    </div>
</div>
```

### Multi-Language File Upload
```blade
<div class="multilingual-upload">
    <x-form-file 
        name="document" 
        label="Document / Documento"
        language="en"
        accept=".pdf,.doc">
        
        <x-slot:help>
            <div class="d-flex gap-3">
                <span>🇺🇸 Upload your document here</span>
                <span>🇪🇸 Sube tu documento aquí</span>
            </div>
        </x-slot:help>
    </x-form-file>
</div>
```

### File Upload with Progress
```blade
<div class="file-upload-progress">
    <x-form-file 
        name="large_file" 
        label="Large File Upload"
        accept=".zip,.rar,.7z"
        :pond="true"
        :settings="[
            'maxFileSize' => '100MB',
            'instantUpload' => false,
            'server' => [
                'url' => '/upload',
                'process' => '/upload/process',
                'revert' => '/upload/revert'
            ]
        ]">
        
        <x-slot:help>
            Large files will show upload progress. Please be patient.
        </x-slot:help>
    </x-form-file>
</div>
```

### Audio/Video Upload System
```blade
<div class="media-upload">
    <h4>Media Upload</h4>
    
    <x-form-file 
        name="audio_files" 
        label="Audio Files"
        accept=".mp3,.wav,.ogg"
        multiple
        :pond="true">
        
        <x-slot:help>
            Supported audio formats: MP3, WAV, OGG
        </x-slot:help>
    </x-form-file>
    
    <x-form-file 
        name="video_files" 
        label="Video Files"
        accept=".mp4,.avi,.mov"
        multiple
        :pond="true">
        
        <x-slot:help>
            Supported video formats: MP4, AVI, MOV
        </x-slot:help>
    </x-form-file>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_file_with_basic_attributes()
{
    $view = $this->blade('<x-form-file name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-file');
}

/** @test */
public function it_renders_form_file_with_custom_accept()
{
    $view = $this->blade('<x-form-file name="file" accept=".pdf,.doc" />');
    
    $view->assertSee('name="file"');
    $view->assertSee('accept=".pdf,.doc"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(FileComponent::class)
        ->assertSee('<x-form-file')
        ->set('selectedFile', 'test.pdf')
        ->assertSee('test.pdf');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to file input
- `aria-describedby`: Links to help text
- `role="button"`: Applied to file input when styled

### Keyboard Navigation
- Tab navigation to file input
- Enter key to open file dialog
- Space key to open file dialog

### Screen Reader Support
- Proper labeling and descriptions
- File selection announcements
- Error message communication
- File type restrictions announcement

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** FilePond (optional)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **File API Support:** HTML5 File API required

## Troubleshooting

### Common Issues

#### File Not Uploading
**Problem:** Files not being uploaded
**Solution:** Check form enctype and server configuration

#### File Type Restrictions Not Working
**Problem:** Wrong file types being accepted
**Solution:** Verify accept attribute and MIME type conversion

#### FilePond Not Loading
**Problem:** FilePond interface not appearing
**Solution:** Check FilePond CSS/JS loading and pond attribute

#### Large File Uploads Failing
**Problem:** Large files causing timeouts
**Solution:** Check server upload limits and FilePond configuration

#### MIME Type Conversion Errors
**Problem:** Incorrect MIME types being generated
**Solution:** Verify file extension format and MimeTypes class

#### Language Support Not Working
**Problem:** Language-specific naming not functioning
**Solution:** Check language attribute and name formatting

## Related Components

- **Form Input:** Base input component
- **Form Image:** Image-specific upload component
- **Form Dropzone:** Drag-and-drop file upload
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with file upload functionality
- MIME type conversion support
- FilePond integration
- Language support
- Comprehensive file validation

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormFile.php`
2. Update the view file: `resources/views/bootstrap-5/form-file.blade.php`
3. Add/update tests in `tests/Components/FormFileTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Image Component](../form-image.md)
- [Form Dropzone Component](../form-dropzone.md)
- [Form Label Component](../form-label.md)
- [FilePond Documentation](https://pqina.nl/filepond/)
- [Laravel File Uploads](https://laravel.com/docs/file-uploads)
