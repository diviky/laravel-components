# Form File Component

A sophisticated file input component that provides professional file upload capabilities with comprehensive form integration and enhanced user experience. This component offers advanced file handling features including FilePond integration, MIME type conversion, language support, and seamless form integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, FilePond (optional)
**JavaScript Libraries:** FilePond for enhanced file handling (optional)

## Files

- **PHP Class:** `src/Components/FormFile.php`
- **View File:** `resources/views/bootstrap-5/form-file.blade.php`
- **Tests:** `tests/Components/FormFileTest.php`
- **Documentation:** `docs/form-file.md`

## Basic Usage

### Simple File Upload
```blade
<x-form-file name="document" label="Upload Document" />
```

### With File Type Restrictions
```blade
<x-form-file 
    name="pdf_only" 
    label="PDF Document"
    accept=".pdf,.doc,.docx">
</x-form-file>
```

### With FilePond Integration
```blade
<x-form-file 
    name="filepond_file" 
    label="Enhanced File Upload"
    :pond="true">
</x-form-file>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'document'` or `'file'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Upload File'` |
| value | mixed | '' | Current file value | `'current-file.pdf'` |
| default | mixed | null | Default file value | `'template.docx'` |
| type | string | 'text' | Input type | `'file'` |
| size | string | '' | File size specification | `'10MB'` |
| bind | mixed | null | Model binding | `$document` |
| language | string | null | Language-specific naming | `'en'` |
| showErrors | boolean | true | Show validation errors | `false` |
| floating | boolean | false | Use floating label style | `true` |
| inline | boolean | false | Use inline form style | `true` |
| settings | array | [] | FilePond settings | `['maxFiles' => 5]` |
| accept | string | '*.*' | Accepted file types | `'.pdf,.doc,.docx'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'file']` |

### Inherited Attributes

This component supports standard form attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'file-input'` |
| class | string | '' | CSS classes | `'file-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| multiple | boolean | false | Allow multiple files | `true` |

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
    Supported formats: PDF, DOC, DOCX. Max size: 10MB.
</x-slot:help>
```

## Usage Examples

### Basic File Upload
```blade
<x-form-file 
    name="document" 
    label="Upload Document">
    
    <x-slot:help>
        Please upload your document in a supported format
    </x-slot:help>
</x-form-file>
```

### Required File Upload
```blade
<x-form-file 
    name="required_file" 
    label="Required File"
    required>
    
    <x-slot:help>
        This file is required to complete your submission
    </x-slot:help>
</x-form-file>
```

### With File Type Restrictions
```blade
<x-form-file 
    name="pdf_only" 
    label="PDF Document"
    accept=".pdf"
    required>
    
    <x-slot:help>
        Only PDF files are accepted for this upload
    </x-slot:help>
</x-form-file>
```

### With Multiple File Types
```blade
<x-form-file 
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
</x-form-file>
```

### With FilePond Integration
```blade
<x-form-file 
    name="filepond_file" 
    label="Enhanced File Upload"
    :pond="true"
    :settings="['maxFiles' => 5, 'maxFileSize' => '10MB']">
    
    <x-slot:help>
        Drag and drop files here or click to browse
    </x-slot:help>
</x-form-file>
```

### With Custom FilePond Settings
```blade
<x-form-file 
    name="custom_filepond" 
    label="Custom FilePond"
    :pond="true"
    :settings="[
        'maxFiles' => 10,
        'maxFileSize' => '25MB',
        'acceptedFileTypes' => ['image/*', 'application/pdf'],
        'allowMultiple' => true,
        'allowReplace' => true,
        'allowRevert' => true,
        'instantUpload' => false
    ]">
    
    <x-slot:help>
        <div class="filepond-features">
            <strong>FilePond Features:</strong><br>
            • Drag and drop support<br>
            • Multiple file selection<br>
            • File preview and validation<br>
            • Custom upload handling
        </div>
    </x-slot:help>
</x-form-file>
```

### With Language Support
```blade
<x-form-file 
    name="localized_file" 
    label="Localized File"
    language="en">
    
    <x-slot:help>
        This file will be specific to the English language
    </x-slot:help>
</x-form-file>
```

### With Model Binding
```blade
<x-form-file 
    name="user_document" 
    label="User Document"
    :bind="$user">
    
    <x-slot:help>
        This file will be bound to the user model
    </x-slot:help>
</x-form-file>
```

### With Floating Label Style
```blade
<x-form-file 
    name="floating_file" 
    label="Floating Label File"
    :floating="true">
    
    <x-slot:help>
        This file input uses floating label style
    </x-slot:help>
</x-form-file>
```

### With Inline Form Style
```blade
<x-form-file 
    name="inline_file" 
    label="Inline File"
    :inline="true">
    
    <x-slot:help>
        This file input uses inline form style
    </x-slot:help>
</x-form-file>
```

### With Custom Classes
```blade
<x-form-file 
    name="custom_file" 
    label="Custom File"
    class="custom-file-input"
    accept=".pdf,.doc,.docx">
    
    <x-slot:help>
        <div class="custom-file-help">
            <strong>Custom Styling:</strong><br>
            This file input has custom CSS classes applied
        </div>
    </x-slot:help>
</x-form-file>
```

### With Hidden Errors
```blade
<x-form-file 
    name="hidden_errors_file" 
    label="Hidden Errors File"
    :show-errors="false">
    
    <x-slot:help>
        Validation errors are hidden for this file input
    </x-slot:help>
</x-form-file>
```

### Livewire Integration
```blade
<x-form-file 
    wire:model="selectedFile"
    name="livewire_file" 
    label="Livewire File"
    accept=".pdf,.doc,.docx">
    
    <x-slot:help>
        <div class="livewire-status">
            <strong>Status:</strong> 
            <span x-text="$wire.selectedFile ? 'File selected' : 'No file'">
                {{ $selectedFile ? 'File selected' : 'No file' }}
            </span>
        </div>
    </x-slot:help>
</x-form-file>
```

## Component Variants

### Standard File Upload
**Usage:** `<x-form-file>` (default)
**Description:** Basic file upload with standard functionality
**Features:**
- Standard file input
- Basic validation
- Form integration
- Error display

### FilePond Enhanced Upload
**Usage:** `<x-form-file :pond="true">`
**Description:** File upload with FilePond enhancement
**Features:**
- Drag and drop support
- File preview
- Enhanced validation
- Professional appearance

### Custom FilePond Upload
**Usage:** `<x-form-file :pond="true" :settings="[...]">`
**Description:** File upload with custom FilePond configuration
**Features:**
- Custom FilePond settings
- Advanced file handling
- Flexible configuration
- Professional workflow

### Localized File Upload
**Usage:** `<x-form-file language="en">`
**Description:** Language-specific file upload
**Features:**
- Multi-language support
- Localized naming
- Internationalization ready
- Language-specific validation

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
    ],
],
```

### FilePond Configuration
```blade
<x-form-file 
    name="file" 
    :pond="true"
    :settings="[
        'maxFiles' => 5,
        'maxFileSize' => '10MB',
        'acceptedFileTypes' => ['image/*', 'application/pdf'],
        'allowMultiple' => true,
        'allowReplace' => true,
        'allowRevert' => true,
        'instantUpload' => false,
        'server' => [
            'url' => '/upload',
            'process' => '/process',
            'revert' => '/revert',
            'restore' => '/restore',
            'load' => '/load',
            'fetch' => '/fetch',
            'patch' => '/patch'
        ]
    ]">
</x-form-file>
```

### MIME Type Conversion
The component automatically converts file extensions to MIME types:

| Extension | MIME Types |
|-----------|------------|
| `.pdf` | `application/pdf` |
| `.doc` | `application/msword` |
| `.docx` | `application/vnd.openxmlformats-officedocument.wordprocessingml.document` |
| `.csv` | `text/plain`, `text/csv` |
| `.txt` | `text/plain` |
| `.jpg` | `image/jpeg` |
| `.png` | `image/png` |

### Default Settings
The component uses these default settings:
- **File Type:** `*.*` (all files)
- **FilePond:** Enabled by default
- **MIME Conversion:** Automatic
- **Form Integration:** Full support

## Common Patterns

### Document Upload System
```blade
<div class="document-upload-system">
    <h4>Document Upload</h4>
    <p>Upload your required documents:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-file 
                name="identification" 
                label="Identification Document"
                accept=".pdf,.jpg,.png"
                required>
                
                <x-slot:help>
                    <div class="id-requirements">
                        <strong>ID Requirements:</strong><br>
                        • Government-issued ID<br>
                        • Clear, readable image<br>
                        • PDF, JPG, or PNG format<br>
                        • Maximum size: 5MB
                    </div>
                </x-slot:help>
            </x-form-file>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-file 
                name="proof_of_address" 
                label="Proof of Address"
                accept=".pdf,.jpg,.png"
                required>
                
                <x-slot:help>
                    <div class="address-requirements">
                        <strong>Address Proof Requirements:</strong><br>
                        • Recent utility bill or bank statement<br>
                        • Must show your current address<br>
                        • PDF, JPG, or PNG format<br>
                        • Maximum size: 5MB
                    </div>
                </x-slot:help>
            </x-form-file>
        </div>
    </div>
    
    <div class="upload-guidelines mt-3">
        <h6>Upload Guidelines</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>File Quality:</strong><br>
                • Ensure documents are clear and readable<br>
                • Avoid blurry or low-quality scans<br>
                • Use good lighting when taking photos<br>
                • Check file size before uploading
            </div>
            <div class="col-md-4">
                <strong>File Format:</strong><br>
                • PDF is preferred for documents<br>
                • Images should be high resolution<br>
                • Avoid compressed or corrupted files<br>
                • Use standard file extensions
            </div>
            <div class="col-md-4">
                <strong>Security:</strong><br>
                • Only upload necessary documents<br>
                • Remove sensitive information if possible<br>
                • Use secure connections<br>
                • Keep uploaded files secure
            </div>
        </div>
    </div>
</div>
```

### File Management Interface
```blade
<div class="file-management-interface">
    <h4>File Management</h4>
    <p>Manage your uploaded files:</p>
    
    <x-form-file 
        name="file_upload" 
        label="Upload New File"
        :pond="true"
        :settings="[
            'maxFiles' => 10,
            'maxFileSize' => '25MB',
            'acceptedFileTypes' => ['*/*'],
            'allowMultiple' => true,
            'allowReplace' => true,
            'allowRevert' => true,
            'instantUpload' => false
        ]">
        
        <x-slot:help>
            <div class="filepond-features">
                <strong>FilePond Features:</strong><br>
                • Drag and drop files here<br>
                • Click to browse files<br>
                • Multiple file selection<br>
                • File preview and validation<br>
                • Replace and revert options
            </div>
        </x-slot:help>
    </x-form-file>
    
    <div class="file-categories mt-4">
        <h6>File Categories</h6>
        <div class="row">
            <div class="col-md-3">
                <x-form-file 
                    name="documents" 
                    label="Documents"
                    accept=".pdf,.doc,.docx,.txt"
                    :pond="true"
                    :settings="['maxFiles' => 5, 'acceptedFileTypes' => ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain']]">
                    
                    <div class="category-upload">
                        <i class="fas fa-file-alt fa-2x text-primary"></i>
                        <small>Documents</small>
                    </div>
                </x-form-file>
            </div>
            
            <div class="col-md-3">
                <x-form-file 
                    name="images" 
                    label="Images"
                    accept=".jpg,.jpeg,.png,.gif,.webp"
                    :pond="true"
                    :settings="['maxFiles' => 10, 'acceptedFileTypes' => ['image/*']]">
                    
                    <div class="category-upload">
                        <i class="fas fa-image fa-2x text-success"></i>
                        <small>Images</small>
                    </div>
                </x-form-file>
            </div>
            
            <div class="col-md-3">
                <x-form-file 
                    name="videos" 
                    label="Videos"
                    accept=".mp4,.avi,.mov,.wmv"
                    :pond="true"
                    :settings="['maxFiles' => 3, 'acceptedFileTypes' => ['video/*']]">
                    
                    <div class="category-upload">
                        <i class="fas fa-video fa-2x text-warning"></i>
                        <small>Videos</small>
                    </div>
                </x-form-file>
            </div>
            
            <div class="col-md-3">
                <x-form-file 
                    name="audio" 
                    label="Audio"
                    accept=".mp3,.wav,.aac,.ogg"
                    :pond="true"
                    :settings="['maxFiles' => 5, 'acceptedFileTypes' => ['audio/*']]">
                    
                    <div class="category-upload">
                        <i class="fas fa-music fa-2x text-info"></i>
                        <small>Audio</small>
                    </div>
                </x-form-file>
            </div>
        </div>
    </div>
</div>
```

### Resume Upload System
```blade
<div class="resume-upload-system">
    <h4>Resume Upload</h4>
    <p>Upload your resume for job applications:</p>
    
    <x-form-file 
        name="resume" 
        label="Resume/CV"
        accept=".pdf,.doc,.docx"
        required
        :pond="true"
        :settings="[
            'maxFiles' => 1,
            'maxFileSize' => '5MB',
            'acceptedFileTypes' => ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
            'allowMultiple' => false,
            'allowReplace' => true,
            'instantUpload' => false
        ]">
        
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
    </x-form-file>
    
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

### Portfolio Upload System
```blade
<div class="portfolio-upload-system">
    <h4>Portfolio Upload</h4>
    <p>Upload your work samples and projects:</p>
    
    <x-form-file 
        name="portfolio_files" 
        label="Portfolio Files"
        :pond="true"
        :settings="[
            'maxFiles' => 20,
            'maxFileSize' => '50MB',
            'acceptedFileTypes' => ['*/*'],
            'allowMultiple' => true,
            'allowReplace' => true,
            'allowRevert' => true,
            'instantUpload' => false
        ]">
        
        <x-slot:help>
            <div class="portfolio-guidelines">
                <strong>Portfolio Guidelines:</strong><br>
                • Include your best work samples<br>
                • Show variety in your projects<br>
                • Provide context for each piece<br>
                • Keep file sizes reasonable<br>
                • Use descriptive filenames
            </div>
        </x-slot:help>
    </x-form-file>
    
    <div class="portfolio-categories mt-3">
        <h6>Portfolio Categories</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Design Work:</strong><br>
                • Logo designs<br>
                • Website mockups<br>
                • Print materials<br>
                • Brand guidelines<br>
                • UI/UX designs
            </div>
            <div class="col-md-4">
                <strong>Development:</strong><br>
                • Code samples<br>
                • Project screenshots<br>
                • GitHub repositories<br>
                • Live demos<br>
                • Technical documentation
            </div>
            <div class="col-md-4">
                <strong>Content:</strong><br>
                • Writing samples<br>
                • Blog posts<br>
                • Case studies<br>
                • Presentations<br>
                • Research papers
            </div>
        </div>
    </div>
</div>
```

### Contract Document Upload
```blade
<div class="contract-document-upload">
    <h4>Contract Documents</h4>
    <p>Upload required contract documents:</p>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <x-form-file 
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
            </x-form-file>
        </div>
        
        <div class="col-md-6 mb-3">
            <x-form-file 
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
            </x-form-file>
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
public function it_renders_form_file_with_label()
{
    $view = $this->blade('<x-form-file name="file" label="Upload File" />');
    
    $view->assertSee('name="file"');
    $view->assertSee('Upload File');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(FileComponent::class)
        ->assertSee('<x-form-file')
        ->set('file', 'test.pdf')
        ->assertSee('test.pdf');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to file inputs
- `aria-describedby`: Links to help text
- `role="button"`: Applied to FilePond elements

### Keyboard Navigation
- Tab navigation to file input
- File selection dialog
- FilePond navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- File selection feedback
- Help text communication
- Error message communication

### File Accessibility
- Clear file purpose indication
- Proper validation feedback
- Helpful error messages
- File requirements

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** FilePond (optional)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **File Input Support:** HTML5 file input with FilePond enhancement

## Troubleshooting

### Common Issues

#### File Not Uploading
**Problem:** File upload not working
**Solution:** Check file permissions and upload configuration

#### FilePond Not Working
**Problem:** FilePond enhancement not functioning
**Solution:** Verify FilePond library inclusion and configuration

#### MIME Type Issues
**Problem:** Wrong file types accepted
**Solution:** Check accept attribute and MIME type conversion

#### File Size Issues
**Problem:** File size validation not working
**Solution:** Check server configuration and FilePond settings

#### Language Support Issues
**Problem:** Language-specific naming not working
**Solution:** Verify language parameter and naming logic

## Related Components

- **Form Image:** Image-specific upload component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component
- **Form Dropzone:** Drag-and-drop file upload

## Changelog

### Version 1.0.0
- Initial release with file upload functionality
- FilePond integration for enhanced file handling
- MIME type conversion and validation
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormFile.php`
2. Update the view file: `resources/views/bootstrap-5/form-file.blade.php`
3. Add/update tests in `tests/Components/FormFileTest.php`
4. Update this documentation

## See Also

- [Form Image Component](../form-image.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Form Dropzone Component](../form-dropzone.md)
- [FilePond Documentation](https://pqina.nl/filepond/)
- [Laravel File Uploads](https://laravel.com/docs/file-uploads)
- [HTML5 File Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file)
