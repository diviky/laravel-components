# Form Dropzone Component

A sophisticated drag-and-drop file upload component that provides professional file handling capabilities with comprehensive form integration and enhanced user experience. This component offers advanced file upload features including drag-and-drop functionality, progress tracking, file preview, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, JavaScript for drag-and-drop functionality
**JavaScript Libraries:** Custom drag-and-drop implementation with progress tracking

## Files

- **PHP Class:** `src/Components/FormDropzone.php`
- **View File:** `resources/views/bootstrap-5/form-dropzone.blade.php`
- **Tests:** `tests/Components/FormDropzoneTest.php`
- **Documentation:** `docs/form-dropzone.md`

## Basic Usage

### Simple Dropzone
```blade
<x-form-dropzone name="files" label="Upload Files" />
```

### With Custom Text
```blade
<x-form-dropzone 
    name="documents" 
    label="Document Upload">
</x-form-dropzone>
```

### With Multiple Files
```blade
<x-form-dropzone 
    name="multiple_files" 
    label="Multiple Files"
    multiple>
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
| value | mixed | '' | Current file value | `'current-file.pdf'` |
| default | mixed | null | Default file value | `'template.docx'` |
| bind | mixed | null | Model binding | `$document` |
| language | string | null | Language-specific naming | `'en'` |
| showErrors | boolean | true | Show validation errors | `false` |
| extraAttributes | array | [] | Additional attributes | `['multiple' => true]` |

### Inherited Attributes

This component supports standard form attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'dropzone-input'` |
| class | string | '' | CSS classes | `'dropzone-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| multiple | boolean | false | Allow multiple files | `true` |
| accept | string | '' | Accepted file types | `'.pdf,.doc,.docx'` |

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
    Drag and drop files here or click to browse. Supported formats: PDF, DOC, DOCX.
</x-slot:help>
```

## Usage Examples

### Basic Dropzone
```blade
<x-form-dropzone 
    name="files" 
    label="Upload Files">
    
    <x-slot:help>
        Drag and drop files here or click to browse
    </x-slot:help>
</x-form-dropzone>
```

### Required Dropzone
```blade
<x-form-dropzone 
    name="required_files" 
    label="Required Files"
    required>
    
    <x-slot:help>
        This file upload is required to complete your submission
    </x-slot:help>
</x-form-dropzone>
```

### With File Type Restrictions
```blade
<x-form-dropzone 
    name="pdf_only" 
    label="PDF Documents"
    accept=".pdf"
    required>
    
    <x-slot:help>
        Only PDF files are accepted for this upload
    </x-slot:help>
</x-form-dropzone>
```

### With Multiple File Types
```blade
<x-form-dropzone 
    name="documents" 
    label="Documents"
    accept=".pdf,.doc,.docx,.txt"
    multiple>
    
    <x-slot:help>
        <div class="file-requirements">
            <strong>Accepted Formats:</strong><br>
            • PDF files (.pdf)<br>
            • Word documents (.doc, .docx)<br>
            • Text files (.txt)<br>
            • Maximum file size: 10MB
        </div>
    </x-slot:help>
</x-form-dropzone>
```

### With Custom Classes
```blade
<x-form-dropzone 
    name="custom_dropzone" 
    label="Custom Dropzone"
    class="custom-dropzone-lg"
    accept=".pdf,.doc,.docx">
    
    <x-slot:help>
        <div class="custom-dropzone-help">
            <strong>Custom Styling:</strong><br>
            This dropzone has custom CSS classes applied
        </div>
    </x-slot:help>
</x-form-dropzone>
```

### With Language Support
```blade
<x-form-dropzone 
    name="localized_files" 
    label="Localized Files"
    language="en">
    
    <x-slot:help>
        This file upload will be specific to the English language
    </x-slot:help>
</x-form-dropzone>
```

### With Model Binding
```blade
<x-form-dropzone 
    name="user_documents" 
    label="User Documents"
    :bind="$user">
    
    <x-slot:help>
        This file upload will be bound to the user model
    </x-slot:help>
</x-form-dropzone>
```

### With Hidden Errors
```blade
<x-form-dropzone 
    name="hidden_errors_files" 
    label="Hidden Errors Files"
    :show-errors="false">
    
    <x-slot:help>
        Validation errors are hidden for this dropzone
    </x-slot:help>
</x-form-dropzone>
```

### With Custom ID
```blade
<x-form-dropzone 
    name="custom_id_files" 
    label="Custom ID Files"
    id="custom-dropzone-input">
    
    <x-slot:help>
        This dropzone has a custom ID attribute
    </x-slot:help>
</x-form-dropzone>
```

### With Disabled State
```blade
<x-form-dropzone 
    name="disabled_files" 
    label="Disabled Files"
    disabled>
    
    <x-slot:help>
        This dropzone is currently disabled
    </x-slot:help>
</x-form-dropzone>
```

### With Readonly State
```blade
<x-form-dropzone 
    name="readonly_files" 
    label="Readonly Files"
    readonly>
    
    <x-slot:help>
        This dropzone is currently readonly
    </x-slot:help>
</x-form-dropzone>
```

### Livewire Integration
```blade
<x-form-dropzone 
    wire:model="selectedFiles"
    name="livewire_files" 
    label="Livewire Files"
    accept=".pdf,.doc,.docx">
    
    <x-slot:help>
        <div class="livewire-status">
            <strong>Status:</strong> 
            <span x-text="$wire.selectedFiles ? 'Files selected' : 'No files'">
                {{ $selectedFiles ? 'Files selected' : 'No files' }}
            </span>
        </div>
    </x-slot:help>
</x-form-dropzone>
```

## Component Variants

### Standard Dropzone
**Usage:** `<x-form-dropzone>` (default)
**Description:** Basic dropzone with drag-and-drop functionality
**Features:**
- Drag and drop file upload
- Click to browse functionality
- Progress tracking
- File preview

### Enhanced Dropzone
**Usage:** `<x-form-dropzone class="enhanced-dropzone">`
**Description:** Dropzone with custom styling and enhanced features
**Features:**
- Custom CSS classes
- Enhanced visual feedback
- Professional appearance
- Flexible styling

### Localized Dropzone
**Usage:** `<x-form-dropzone language="en">`
**Description:** Language-specific dropzone
**Features:**
- Multi-language support
- Localized naming
- Internationalization ready
- Language-specific validation

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
    ],
],
```

### JavaScript Configuration
The component includes built-in JavaScript for drag-and-drop functionality:

```javascript
// Built-in functionality includes:
// - Drag and drop event handling
// - File preview generation
// - Progress bar updates
// - File input management
```

### Default Settings
The component uses these default settings:
- **File Type:** All files (configurable via accept attribute)
- **Progress Tracking:** Enabled with Bootstrap progress bar
- **Drag and Drop:** Enabled by default
- **Form Integration:** Full support

## Common Patterns

### Document Upload Dropzone
```blade
<div class="document-upload-dropzone">
    <h4>Document Upload</h4>
    <p>Drag and drop your documents here:</p>
    
    <x-form-dropzone 
        name="document_files" 
        label="Document Files"
        accept=".pdf,.doc,.docx,.txt"
        multiple
        required>
        
        <x-slot:help>
            <div class="document-requirements">
                <strong>Document Requirements:</strong><br>
                • PDF files preferred<br>
                • Word documents accepted<br>
                • Text files supported<br>
                • Maximum file size: 10MB<br>
                • Multiple files allowed
            </div>
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="upload-instructions mt-3">
        <h6>Upload Instructions</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Drag and Drop:</strong><br>
                • Simply drag files from your computer<br>
                • Drop them anywhere in the dropzone<br>
                • Files will be automatically uploaded<br>
                • Progress will be shown in real-time
            </div>
            <div class="col-md-4">
                <strong>Click to Browse:</strong><br>
                • Click anywhere in the dropzone<br>
                • Select files from your computer<br>
                • Choose multiple files if needed<br>
                • Files will be processed immediately
            </div>
            <div class="col-md-4">
                <strong>File Management:</strong><br>
                • Remove files by clicking the X<br>
                • Replace files by dropping new ones<br>
                • Preview files before upload<br>
                • Check file types and sizes
            </div>
        </div>
    </div>
</div>
```

### Image Gallery Dropzone
```blade
<div class="image-gallery-dropzone">
    <h4>Image Gallery Upload</h4>
    <p>Upload images for your gallery:</p>
    
    <x-form-dropzone 
        name="gallery_images" 
        label="Gallery Images"
        accept=".jpg,.jpeg,.png,.gif,.webp"
        multiple
        class="gallery-dropzone">
        
        <x-slot:help>
            <div class="gallery-requirements">
                <strong>Image Requirements:</strong><br>
                • High-quality images recommended<br>
                • Supported formats: JPG, PNG, GIF, WebP<br>
                • Maximum file size: 5MB per image<br>
                • Multiple images can be uploaded<br>
                • Drag and drop or click to browse
            </div>
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="gallery-tips mt-3">
        <h6>Gallery Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Image Quality:</strong><br>
                • Use high-resolution images<br>
                • Ensure good lighting<br>
                • Avoid blurry or pixelated images<br>
                • Consider image composition<br>
                • Maintain consistent style
            </div>
            <div class="col-md-6">
                <strong>Organization:</strong><br>
                • Use descriptive filenames<br>
                • Group related images together<br>
                • Consider image order<br>
                • Maintain consistent aspect ratios<br>
                • Optimize file sizes
            </div>
        </div>
    </div>
</div>
```

### Bulk File Upload Dropzone
```blade
<div class="bulk-file-upload-dropzone">
    <h4>Bulk File Upload</h4>
    <p>Upload multiple files at once:</p>
    
    <x-form-dropzone 
        name="bulk_files" 
        label="Bulk Files"
        accept="*/*"
        multiple
        class="bulk-dropzone">
        
        <x-slot:help>
            <div class="bulk-upload-features">
                <strong>Bulk Upload Features:</strong><br>
                • Drag and drop multiple files<br>
                • Click to browse and select many files<br>
                • Progress tracking for each file<br>
                • File type validation<br>
                • Size limit enforcement
            </div>
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="bulk-upload-guidelines mt-3">
        <h6>Bulk Upload Guidelines</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>File Preparation:</strong><br>
                • Organize files in folders<br>
                • Use consistent naming<br>
                • Check file types<br>
                • Verify file sizes<br>
                • Remove unnecessary files
            </div>
            <div class="col-md-4">
                <strong>Upload Process:</strong><br>
                • Upload in smaller batches<br>
                • Monitor progress bars<br>
                • Check for errors<br>
                • Verify successful uploads<br>
                • Keep browser open
            </div>
            <div class="col-md-4">
                <strong>After Upload:</strong><br>
                • Verify all files uploaded<br>
                • Check file integrity<br>
                • Organize uploaded files<br>
                • Update file references<br>
                • Backup if necessary
            </div>
        </div>
    </div>
</div>
```

### Contract Document Dropzone
```blade
<div class="contract-document-dropzone">
    <h4>Contract Documents</h4>
    <p>Upload your contract documents:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-dropzone 
                name="contract_agreement" 
                label="Contract Agreement"
                accept=".pdf,.doc,.docx"
                required>
                
                <x-slot:help>
                    <div class="contract-requirements">
                        <strong>Contract Requirements:</strong><br>
                        • Signed contract agreement<br>
                        • All pages included<br>
                        • Clear, readable text<br>
                        • PDF or Word format<br>
                        • Maximum size: 10MB
                    </div>
                </x-slot:help>
            </x-form-dropzone>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-dropzone 
                name="supporting_documents" 
                label="Supporting Documents"
                accept=".pdf,.doc,.docx,.jpg,.png"
                multiple>
                
                <x-slot:help>
                    <div class="supporting-requirements">
                        <strong>Supporting Documents:</strong><br>
                        • Financial statements<br>
                        • Insurance certificates<br>
                        • Licenses and permits<br>
                        • References and testimonials<br>
                        • Any additional relevant files
                    </div>
                </x-slot:help>
            </x-form-dropzone>
        </div>
    </div>
    
    <div class="contract-checklist mt-3">
        <h6>Contract Checklist</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Required Documents:</strong><br>
                ☐ Signed contract agreement<br>
                ☐ Company registration<br>
                ☐ Tax identification<br>
                ☐ Insurance certificates<br>
                ☐ Financial statements
            </div>
            <div class="col-md-6">
                <strong>Optional Documents:</strong><br>
                ☐ Project portfolio<br>
                ☐ Team resumes<br>
                ☐ Client references<br>
                ☐ Awards and certifications<br>
                ☐ Previous work samples
            </div>
        </div>
    </div>
</div>
```

### Resume Upload Dropzone
```blade
<div class="resume-upload-dropzone">
    <h4>Resume Upload</h4>
    <p>Upload your resume for job applications:</p>
    
    <x-form-dropzone 
        name="resume_file" 
        label="Resume/CV"
        accept=".pdf,.doc,.docx"
        required
        class="resume-dropzone">
        
        <x-slot:help>
            <div class="resume-requirements">
                <strong>Resume Requirements:</strong><br>
                • PDF format preferred<br>
                • Word documents accepted<br>
                • Maximum file size: 5MB<br>
                • Include contact information<br>
                • List relevant experience and skills
            </div>
        </x-slot:help>
    </x-form-dropzone>
    
    <div class="resume-tips mt-3">
        <h6>Resume Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Content Tips:</strong><br>
                • Keep it concise (1-2 pages)<br>
                • Use clear, professional language<br>
                • Highlight relevant achievements<br>
                • Include keywords from job description<br>
                • Proofread for errors
            </div>
            <div class="col-md-6">
                <strong>Format Tips:</strong><br>
                • Use consistent formatting<br>
                • Choose readable fonts<br>
                • Include proper spacing<br>
                • Use bullet points for lists<br>
                • Ensure good contrast
            </div>
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
public function it_renders_form_dropzone_with_label()
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
        ->set('files', 'test.pdf')
        ->assertSee('test.pdf');
}
```

## Accessibility

### ARIA Attributes
- `role="progressbar"`: Applied to progress elements
- `aria-label`: Applied to dropzone elements
- `aria-describedby`: Links to help text

### Keyboard Navigation
- Tab navigation to dropzone
- Enter key for file selection
- File management navigation
- Progress tracking

### Screen Reader Support
- Proper labeling and descriptions
- File selection feedback
- Help text communication
- Error message communication

### Dropzone Accessibility
- Clear dropzone purpose indication
- Proper validation feedback
- Helpful error messages
- File requirements

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Custom drag-and-drop implementation
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **File Input Support:** HTML5 file input with drag-and-drop enhancement

## Troubleshooting

### Common Issues

#### Drag and Drop Not Working
**Problem:** Drag and drop functionality not working
**Solution:** Check JavaScript loading and browser compatibility

#### File Upload Issues
**Problem:** File upload not working
**Solution:** Check file permissions and upload configuration

#### Progress Bar Issues
**Problem:** Progress tracking not working
**Solution:** Check JavaScript implementation and CSS styling

#### File Preview Issues
**Problem:** File preview not displaying
**Solution:** Verify file input and preview logic

#### Styling Issues
**Problem:** Dropzone doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

## Related Components

- **Form File:** Basic file input component
- **Form Image:** Image-specific upload component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with drag-and-drop functionality
- File upload with progress tracking
- File preview and validation
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormDropzone.php`
2. Update the view file: `resources/views/bootstrap-5/form-dropzone.blade.php`
3. Add/update tests in `tests/Components/FormDropzoneTest.php`
4. Update this documentation

## See Also

- [Form File Component](../form-file.md)
- [Form Image Component](../form-image.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [HTML5 Drag and Drop](https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API)
- [Laravel File Uploads](https://laravel.com/docs/file-uploads)
- [Bootstrap Progress Bars](https://getbootstrap.com/docs/5.3/components/progress/)
