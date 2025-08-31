# Form File Component

A specialized file upload component that provides a user-friendly interface for file selection and upload with FilePond integration. This component supports drag-and-drop functionality, file validation, and multiple file types.

## Overview

**Component Type:** Class-Based Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FilePond for enhanced file upload experience  
**Location:** `src/Components/FormFile.php`, `resources/views/bootstrap-5/form-file.blade.php`

## Files

- **Component Class:** `src/Components/FormFile.php`
- **View File:** `resources/views/bootstrap-5/form-file.blade.php`
- **Documentation:** `docs/form-file.md`
- **Tests:** `tests/Components/FormFileTest.php`

## Basic Usage

```blade
<x-form-file name="document" label="Upload Document" accept=".pdf,.doc,.docx" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | File field name (required) | `'document'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | File label text | `'Upload Document'` |
| accept | string | '*.*' | Accepted file types/extensions | `'.pdf,.doc,.docx'` |
| type | string | 'text' | Input type | `'file'` |
| size | string | '' | Input size variant | `'sm'`, `'lg'` |
| language | string | null | Language-specific field | `'en'` |
| floating | boolean | false | Use floating label style | `true` |
| inline | boolean | false | Display inline without form-group wrapper | `true` |
| help | string | null | Help text below input | `'Maximum file size: 10MB'` |
| id | string | auto-generated | Input ID attribute | `'document-upload'` |
| title | string | null | Title attribute for tooltip | `'Select a file to upload'` |
| class | string | null | Additional CSS classes | `'custom-file'` |
| wire:model | string | null | Livewire model binding | `'document'` |
| extra-attributes | string | null | Additional HTML attributes | `'data-custom="value"'` |

### FilePond-Specific Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| pond | boolean | true | Enable FilePond integration | `false` |
| settings | array | [] | FilePond configuration options | `['maxFiles' => 5]` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| default | mixed | null | Default value | `$existingFile` |
| bind | mixed | null | Model binding value | `$user->avatar` |
| showErrors | boolean | true | Show validation errors | `false` |

### Inherited Attributes

This component supports all standard HTML file input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| multiple | boolean | false | Allow multiple file selection | `true` |
| required | boolean | false | Whether field is required | `true` |
| disabled | boolean | false | Whether field is disabled | `true` |
| readonly | boolean | false | Whether field is readonly | `true` |
| autofocus | boolean | false | Autofocus the input | `true` |
| form | string | null | Form ID to associate with | `'upload-form'` |
| tabindex | string | null | Tab index | `'0'` |

## Named Slots

| Slot | Description | Example |
|------|-------------|---------|
| help | Help text slot | `<x-slot name="help">Custom help text</x-slot>` |

## Usage Examples

### Basic File Upload
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    accept=".pdf,.doc,.docx" 
    required 
/>
```

### File Upload with Help Text
```blade
<x-form-file 
    name="avatar" 
    label="Profile Picture" 
    accept="image/*"
    help="Maximum file size: 5MB. Supported formats: JPG, PNG, GIF"
    required 
/>
```

### Multiple File Upload
```blade
<x-form-file 
    name="photos" 
    label="Upload Photos" 
    accept="image/*"
    multiple
    help="You can select multiple photos"
/>
```

### File Upload with Custom Accept Types
```blade
<x-form-file 
    name="spreadsheet" 
    label="Upload Spreadsheet" 
    accept=".xlsx,.xls,.csv"
    help="Upload Excel or CSV files only"
/>
```

### File Upload with FilePond Disabled
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    :pond="false"
    accept=".pdf"
/>
```

### File Upload with FilePond Settings
```blade
<x-form-file 
    name="images" 
    label="Upload Images" 
    accept="image/*"
    :settings="[
        'maxFiles' => 5,
        'maxFileSize' => '5MB',
        'acceptedFileTypes' => ['image/*'],
        'labelIdle' => 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>'
    ]"
/>
```

### Livewire File Upload
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    wire:model="document"
    accept=".pdf,.doc,.docx"
    help="File will be uploaded immediately"
/>
```

### File Upload with Custom Classes
```blade
<x-form-file 
    name="avatar" 
    label="Profile Picture" 
    class="custom-file-upload"
    accept="image/*"
    size="lg"
/>
```

### File Upload with Language Support
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    language="en"
    accept=".pdf,.doc,.docx"
/>
```

### File Upload with Floating Label
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    floating
    accept=".pdf,.doc,.docx"
/>
```

### File Upload with Inline Display
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    inline
    accept=".pdf,.doc,.docx"
/>
```

### File Upload with Custom Help Slot
```blade
<x-form-file name="document" label="Upload Document" accept=".pdf,.doc,.docx">
    <x-slot name="help">
        <div class="d-flex align-items-center">
            <x-icon name="info" class="me-2" />
            <span>Supported formats: <strong>PDF, DOC, DOCX</strong></span>
        </div>
    </x-slot>
</x-form-file>
```

## Real Project Examples

### User Profile Avatar Upload
```blade
<x-form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="name" label="Full Name" :value="$user->name" required />
        </div>
        <div class="col-md-6">
            <x-form-file 
                name="avatar" 
                label="Profile Picture" 
                accept="image/*"
                help="Upload a profile picture (JPG, PNG, GIF). Max size: 2MB"
                :settings="[
                    'maxFileSize' => '2MB',
                    'acceptedFileTypes' => ['image/*'],
                    'labelIdle' => 'Drag & Drop your photo or <span class="filepond--label-action">Browse</span>'
                ]"
            />
        </div>
    </div>
    
    <x-form-submit>Update Profile</x-form-submit>
</x-form>
```

### Document Upload Form
```blade
<x-form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
    <x-form-input name="title" label="Document Title" required />
    
    <x-form-file 
        name="document" 
        label="Upload Document" 
        accept=".pdf,.doc,.docx,.txt"
        help="Supported formats: PDF, DOC, DOCX, TXT. Maximum size: 10MB"
        required
        :settings="[
            'maxFileSize' => '10MB',
            'acceptedFileTypes' => ['.pdf', '.doc', '.docx', '.txt'],
            'labelIdle' => 'Drag & Drop your document or <span class="filepond--label-action">Browse</span>'
        ]"
    />
    
    <x-form-textarea 
        name="description" 
        label="Description" 
        placeholder="Brief description of the document..."
        rows="3"
    />
    
    <x-form-submit>Upload Document</x-form-submit>
</x-form>
```

### Multiple Image Upload
```blade
<x-form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    <x-form-input name="title" label="Gallery Title" required />
    
    <x-form-file 
        name="images" 
        label="Upload Images" 
        accept="image/*"
        multiple
        help="Select multiple images for your gallery. Max 10 files, 5MB each"
        :settings="[
            'maxFiles' => 10,
            'maxFileSize' => '5MB',
            'acceptedFileTypes' => ['image/*'],
            'labelIdle' => 'Drag & Drop your images or <span class="filepond--label-action">Browse</span>',
            'labelFileProcessing' => 'Uploading',
            'labelFileProcessingComplete' => 'Upload complete',
            'labelTapToCancel' => 'Tap to cancel',
            'labelTapToRetry' => 'Tap to retry'
        ]"
    />
    
    <x-form-submit>Create Gallery</x-form-submit>
</x-form>
```

### Resume Upload Form
```blade
<x-form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <x-form-input name="first_name" label="First Name" required />
        </div>
        <div class="col-md-6">
            <x-form-input name="last_name" label="Last Name" required />
        </div>
    </div>
    
    <x-form-email name="email" label="Email Address" required />
    
    <x-form-file 
        name="resume" 
        label="Upload Resume" 
        accept=".pdf,.doc,.docx"
        help="Upload your resume in PDF, DOC, or DOCX format. Max size: 5MB"
        required
        :settings="[
            'maxFileSize' => '5MB',
            'acceptedFileTypes' => ['.pdf', '.doc', '.docx'],
            'labelIdle' => 'Drag & Drop your resume or <span class="filepond--label-action">Browse</span>',
            'labelFileProcessing' => 'Uploading resume...',
            'labelFileProcessingComplete' => 'Resume uploaded successfully'
        ]"
    />
    
    <x-form-textarea 
        name="cover_letter" 
        label="Cover Letter" 
        placeholder="Tell us why you're interested in this position..."
        rows="5"
    />
    
    <x-form-submit>Submit Application</x-form-submit>
</x-form>
```

### Product Image Upload
```blade
<x-form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <x-form-input name="name" label="Product Name" required />
            <x-form-textarea name="description" label="Description" rows="3" />
        </div>
        <div class="col-md-4">
            <x-form-file 
                name="images" 
                label="Product Images" 
                accept="image/*"
                multiple
                help="Upload product images. First image will be the main image"
                :settings="[
                    'maxFiles' => 5,
                    'maxFileSize' => '3MB',
                    'acceptedFileTypes' => ['image/*'],
                    'labelIdle' => 'Drag & Drop product images or <span class="filepond--label-action">Browse</span>',
                    'labelFileProcessing' => 'Uploading image...',
                    'labelFileProcessingComplete' => 'Image uploaded',
                    'labelTapToCancel' => 'Tap to cancel',
                    'labelTapToRetry' => 'Tap to retry'
                ]"
            />
        </div>
    </div>
    
    <x-form-submit>Create Product</x-form-submit>
</x-form>
```

## Features

### File Validation
The component automatically includes file validation:
- **File Type Validation**: Accept attribute with MIME type conversion
- **File Size Validation**: Configurable through FilePond settings
- **Multiple File Support**: Built-in support for multiple file selection
- **Laravel Validation**: Server-side file validation integration
- **Real-time Validation**: Livewire validation support

### FilePond Integration
- **Drag & Drop**: Intuitive drag-and-drop file upload
- **Progress Indicators**: Visual upload progress
- **File Previews**: Image and document previews
- **Upload Controls**: Cancel, retry, and remove functionality
- **Customizable UI**: Extensive styling and behavior options
- **Mobile Support**: Touch-friendly interface

### Form Integration
- **Automatic Validation**: Integrates with Laravel's validation system
- **Error Display**: Shows validation errors with proper styling
- **CSRF Protection**: Automatically includes CSRF tokens
- **Method Support**: Supports POST, PUT, PATCH methods
- **File Handling**: Proper multipart/form-data encoding

### Styling Options
- **Size Variants**: `sm`, `lg` for different input sizes
- **Floating Labels**: Modern floating label design
- **Inline Display**: Alternative inline styling
- **Custom Classes**: Additional CSS class support
- **Bootstrap Integration**: Seamless Bootstrap styling

### Interactive Features
- **Livewire Integration**: Full Livewire model binding support
- **Real-time Upload**: Live file upload with progress
- **File Processing**: Server-side file processing integration
- **Upload Callbacks**: Custom upload success/error handling
- **File Management**: File deletion and replacement

### Accessibility
- **ARIA Labels**: Proper accessibility labeling
- **Screen Reader Support**: Semantic HTML structure
- **Keyboard Navigation**: Full keyboard accessibility
- **Focus Management**: Proper focus handling
- **File Announcements**: Clear file selection announcements

### Advanced Features
- **Language Support**: Multi-language field support
- **Model Binding**: Direct model property binding
- **Custom Validation**: Pattern and constraint validation
- **Mobile Optimization**: Touch-friendly file selection
- **File Type Detection**: Automatic MIME type conversion

## Common Patterns

### File Upload with Progress
```blade
<x-form-file 
    name="document" 
    label="Upload Document" 
    wire:model="document"
    accept=".pdf,.doc,.docx"
    :settings="[
        'maxFileSize' => '10MB',
        'acceptedFileTypes' => ['.pdf', '.doc', '.docx'],
        'labelIdle' => 'Drag & Drop your document or <span class="filepond--label-action">Browse</span>',
        'labelFileProcessing' => 'Uploading document...',
        'labelFileProcessingComplete' => 'Document uploaded successfully',
        'labelTapToCancel' => 'Tap to cancel',
        'labelTapToRetry' => 'Tap to retry'
    ]"
/>
```

### Image Upload with Preview
```blade
<x-form-file 
    name="avatar" 
    label="Profile Picture" 
    accept="image/*"
    :settings="[
        'maxFileSize' => '2MB',
        'acceptedFileTypes' => ['image/*'],
        'labelIdle' => 'Drag & Drop your photo or <span class="filepond--label-action">Browse</span>',
        'imagePreviewHeight' => 170,
        'imageCropAspectRatio' => '1:1',
        'imageResizeTargetWidth' => 200,
        'imageResizeTargetHeight' => 200,
        'styleItemPanelAspectRatio' => 0.5,
        'styleLoadIndicatorPosition' => 'center bottom',
        'styleProgressIndicatorPosition' => 'right bottom',
        'styleButtonRemoveItemPosition' => 'left bottom',
        'styleButtonProcessItemPosition' => 'right bottom'
    ]"
/>
```

### Multiple File Upload with Limits
```blade
<x-form-file 
    name="documents" 
    label="Upload Documents" 
    accept=".pdf,.doc,.docx,.txt"
    multiple
    :settings="[
        'maxFiles' => 5,
        'maxFileSize' => '5MB',
        'acceptedFileTypes' => ['.pdf', '.doc', '.docx', '.txt'],
        'labelIdle' => 'Drag & Drop your documents or <span class="filepond--label-action">Browse</span>',
        'labelMaxFileSizeExceeded' => 'File is too large',
        'labelMaxFileSize' => 'Maximum file size is {filesize}',
        'labelMaxTotalFileSizeExceeded' => 'Total file size is too large',
        'labelMaxTotalFileSize' => 'Maximum total file size is {filesize}'
    ]"
/>
```

### File Upload with Custom Styling
```blade
<x-form-file 
    name="presentation" 
    label="Upload Presentation" 
    accept=".ppt,.pptx,.pdf"
    class="custom-file-upload"
    :settings="[
        'maxFileSize' => '20MB',
        'acceptedFileTypes' => ['.ppt', '.pptx', '.pdf'],
        'labelIdle' => 'Drag & Drop your presentation or <span class="filepond--label-action">Browse</span>',
        'stylePanelLayout' => 'compact',
        'styleButtonRemoveItemPosition' => 'left bottom',
        'styleButtonProcessItemPosition' => 'right bottom',
        'styleLoadIndicatorPosition' => 'center bottom',
        'styleProgressIndicatorPosition' => 'center bottom'
    ]"
/>
```

## Configuration

### Global Configuration
The component uses the global form components configuration:

```php
// config/form-components.php
return [
    'framework' => 'bootstrap-5',
    'floating_labels' => false,
    'show_errors' => true,
    'default_wire' => false,
];
```

### FilePond Configuration
```php
// In your service provider or controller
Blade::component('form-file', FormFile::class);
```

### FilePond Settings
```javascript
// FilePond configuration options
const filePondSettings = {
    maxFiles: 5,
    maxFileSize: '5MB',
    acceptedFileTypes: ['image/*'],
    labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
    labelFileProcessing: 'Uploading',
    labelFileProcessingComplete: 'Upload complete',
    labelTapToCancel: 'Tap to cancel',
    labelTapToRetry: 'Tap to retry'
};
```

## JavaScript Integration

### Custom JavaScript
```javascript
// Custom file validation
document.querySelectorAll('[data-custom-file]').forEach(input => {
    input.addEventListener('change', function() {
        // Custom file validation
        validateFileFormat(this.files[0]);
    });
});
```

### Livewire Integration
```javascript
// Automatic Livewire integration
Livewire.on('file-uploaded', (data) => {
    // Handle file upload completion
    console.log('File uploaded:', data);
});
```

### FilePond Events
```javascript
// FilePond event handlers
FilePond.create(document.querySelector('input[type="file"]'), {
    onaddfile: (error, file) => {
        if (error) {
            console.error('Error adding file:', error);
        } else {
            console.log('File added:', file);
        }
    },
    onprocessfile: (error, file) => {
        if (error) {
            console.error('Error processing file:', error);
        } else {
            console.log('File processed:', file);
        }
    }
});
```

### File Upload Progress
```javascript
// File upload progress tracking
function uploadFile(file) {
    const formData = new FormData();
    formData.append('file', file);
    
    fetch('/upload', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Upload complete:', data);
    })
    .catch(error => {
        console.error('Upload failed:', error);
    });
}
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `aria-describedby` for help text
- `aria-invalid` for validation errors
- `aria-required` for required fields
- `aria-label` for file input descriptions

### Keyboard Navigation
- Tab navigation through form fields
- Enter key for file selection
- Escape key for canceling uploads
- Space key for file dialog activation

### Screen Reader Support
- Proper label association
- Descriptive help text
- Clear error messages
- File selection announcements
- Upload progress announcements

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: Not supported

### Feature Support
- **HTML5 File Input**: Full support
- **Drag & Drop**: Full support
- **File API**: Full support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support

## Troubleshooting

### Common Issues

**File upload not working**
```blade
<!-- Ensure proper form encoding -->
<x-form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    <x-form-file name="file" accept=".pdf,.doc,.docx" />
</x-form>
```

**FilePond not initializing**
```blade
<!-- Ensure FilePond is included -->
<x-form-file name="file" :pond="true" />
```

**File type validation not working**
```blade
<!-- Ensure proper accept attribute -->
<x-form-file name="file" accept=".pdf,.doc,.docx" />
```

**Multiple file upload not working**
```blade
<!-- Ensure multiple attribute is set -->
<x-form-file name="files" multiple accept="image/*" />
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
- [Form Password](form-password.md) - Password input component
- [Form Number](form-number.md) - Number input component
- [Form Tel](form-tel.md) - Telephone input component
- [Form URL](form-url.md) - URL input component
- [Form Hidden](form-hidden.md) - Hidden input component
- [Form Select](form-select.md) - Select dropdown component
- [Form Textarea](form-textarea.md) - Multi-line text input component
- [Form Checkbox](form-checkbox.md) - Checkbox input component
- [Form Switch](form-switch.md) - Toggle switch component

## Performance

### Optimization Tips
1. **Use appropriate file size limits** to prevent memory issues
2. **Implement server-side validation** for security
3. **Use CDN for FilePond assets** for better performance
4. **Optimize image uploads** with compression settings
5. **Implement proper error handling** for failed uploads

### Bundle Size
- **Base Component**: ~5KB
- **With FilePond**: ~50KB
- **With Livewire**: ~55KB
- **Full Package**: ~60KB

## Examples Gallery

### Basic File Uploads
```blade
<!-- Simple File Upload -->
<x-form-file name="document" label="Upload Document" />

<!-- File Upload with Accept -->
<x-form-file name="image" label="Upload Image" accept="image/*" />

<!-- Multiple File Upload -->
<x-form-file name="files" label="Upload Files" multiple accept="*.*" />
```

### Advanced File Uploads
```blade
<!-- FilePond Upload -->
<x-form-file name="file" label="Upload File" :pond="true" />

<!-- Custom FilePond Settings -->
<x-form-file name="images" label="Upload Images" :settings="['maxFiles' => 5]" />

<!-- Livewire Upload -->
<x-form-file name="file" wire:model="file" label="Upload File" />
```

## Changelog

### Version 2.0
- Added FilePond integration
- Enhanced file validation
- Improved accessibility features
- Added custom settings support

### Version 1.0
- Initial release
- Basic file input functionality
- Bootstrap 5 support
- Form validation integration

## Contributing

When contributing to the Form File component:

1. **Test file upload functionality** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
