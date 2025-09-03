# View File Component

A sophisticated and feature-rich file display component that provides enhanced file information rendering with optional icons, labels, copy-to-clipboard functionality, and intelligent file thumbnail display. This component offers professional file display with enhanced user experience and interactive file functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, file validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/file.blade.php`
- **Tests:** `tests/Components/ViewFileTest.php` (to be created)
- **Documentation:** `docs/view-file.md`

## Basic Usage

### Simple File Display
```blade
<x-view-file :value="['file_name' => 'document.pdf', 'thumb' => '/thumbnails/document.jpg']" />
```

### With Label
```blade
<x-view-file :value="['file_name' => 'document.pdf']" label="File: " />
```

### With Icon
```blade
<x-view-file :value="['file_name' => 'document.pdf']" icon="file" />
```

### With Copy Functionality
```blade
<x-view-file :value="['file_name' => 'document.pdf']" copy />
```

### With Thumbnail
```blade
<x-view-file :value="['file_name' => 'image.jpg', 'thumb' => '/thumbnails/image.jpg']" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | array\|ArrayAccess | File information array to display | `['file_name' => 'document.pdf', 'thumb' => '/thumbnails/document.jpg']` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the file | `'file'`, `'file-text'`, `'file-image'`, `'download'` |
| label | string | null | Label text to display before the file | `'File: '`, `'Document: '`, `'Attachment: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['validate' => true]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'file-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="file-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard File Display
**Usage:** `<x-view-file :value="['file_name' => 'document.pdf']">` (default)
**Description:** Basic file display with file name
**Features:**
- File name display
- Clean, minimal styling
- Professional appearance
- Array value support

### Labeled File Display
**Usage:** `<x-view-file :value="['file_name' => 'document.pdf']" label="File: ">`
**Description:** File display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon File Display
**Usage:** `<x-view-file :value="['file_name' => 'document.pdf']" icon="file">`
**Description:** File display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable File Display
**Usage:** `<x-view-file :value="['file_name' => 'document.pdf']" copy>`
**Description:** File display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Thumbnail File Display
**Usage:** `<x-view-file :value="['file_name' => 'image.jpg', 'thumb' => '/thumbnails/image.jpg']">`
**Description:** File display with thumbnail preview
**Features:**
- Thumbnail display
- Visual file representation
- Professional styling
- Enhanced user experience

## File Functionality

### File Information Display
The component displays file information including:
- File name
- Thumbnail preview (if available)
- File metadata
- Professional styling

### File Validation
The component includes built-in file validation to ensure:
- Proper file format
- Valid file structure
- Professional appearance
- User experience consistency

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy file information to clipboard
- Paste into other applications
- Share file details easily
- Improve workflow efficiency

### Thumbnail Support
The component supports thumbnail display:
- Automatic thumbnail rendering
- Fallback to file name
- Professional styling
- Enhanced visual appeal

## Slots

### Required Slots

#### Default Slot
- **Purpose:** File content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-file :value="['file_name' => 'document.pdf']">
    Additional Content
</x-view-file>
```

## Usage Examples

### Basic File Display
```blade
<x-view-file :value="['file_name' => 'document.pdf']" />
```

### File with Label
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    label="File: " />
```

### File with Icon
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    icon="file" />
```

### File with Copy Functionality
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    copy />
```

### File with Thumbnail
```blade
<x-view-file 
    :value="['file_name' => 'image.jpg', 'thumb' => '/thumbnails/image.jpg']" />
```

### File with Custom Classes
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    class="text-primary fw-bold" />
```

### File with Custom ID
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    id="custom-file-id" />
```

### File with Data Attributes
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    data-test="file-component"
    data-type="display-file" />
```

### File with Aria Attributes
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    aria-label="File display"
    aria-describedby="file-description" />
```

### File with Role Attribute
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    role="text" />
```

### File with Tabindex
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    tabindex="0" />
```

### File with Form Attribute
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    form="my-form" />
```

### File with Autocomplete
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    autocomplete="off" />
```

### File with Novalidate
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    novalidate />
```

### File with Accept
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    accept="file/*" />
```

### File with Capture
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    capture="environment" />
```

### File with Max
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    max="100" />
```

### File with Min
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    min="5" />
```

### File with Step
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    step="1" />
```

### File with Pattern
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    pattern=".*\.(pdf|doc|docx)" />
```

### File with Spellcheck
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    spellcheck="false" />
```

### File with Translate
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    translate="no" />
```

### File with Contenteditable
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    contenteditable="true" />
```

### File with Contextmenu
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    contextmenu="file-menu" />
```

### File with Dir
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    dir="rtl" />
```

### File with Draggable
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    draggable="true" />
```

### File with Dropzone
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    dropzone="copy" />
```

### File with Hidden
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    hidden />
```

### File with Lang
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    lang="en" />
```

### File with Settings Array
```blade
<x-view-file 
    :value="['file_name' => 'document.pdf']" 
    :settings="['validate' => true]" />
```

## Common Patterns

### Document Management Interface
```blade
<div class="document-management-interface">
    <h4>Documents</h4>
    
    <x-view-file 
        :value="['file_name' => 'report.pdf', 'thumb' => '/thumbnails/report.jpg']" 
        icon="file-text" 
        label="Report: "
        class="text-primary" />
    
    <x-view-file 
        :value="['file_name' => 'presentation.pptx', 'thumb' => '/thumbnails/presentation.jpg']" 
        icon="file-text" 
        label="Presentation: "
        class="text-info" />
    
    <x-view-file 
        :value="['file_name' => 'spreadsheet.xlsx', 'thumb' => '/thumbnails/spreadsheet.jpg']" 
        icon="file-text" 
        label="Spreadsheet: "
        class="text-success" />
    
    <x-view-file 
        :value="['file_name' => 'contract.docx', 'thumb' => '/thumbnails/contract.jpg']" 
        icon="file-text" 
        label="Contract: "
        class="text-warning" />
</div>
```

### Image Gallery Interface
```blade
<div class="image-gallery-interface">
    <h4>Images</h4>
    
    <x-view-file 
        :value="['file_name' => 'photo1.jpg', 'thumb' => '/thumbnails/photo1.jpg']" 
        icon="image" 
        label="Photo 1: "
        class="text-primary" />
    
    <x-view-file 
        :value="['file_name' => 'photo2.png', 'thumb' => '/thumbnails/photo2.jpg']" 
        icon="image" 
        label="Photo 2: "
        class="text-info" />
    
    <x-view-file 
        :value="['file_name' => 'photo3.gif', 'thumb' => '/thumbnails/photo3.jpg']" 
        icon="image" 
        label="Photo 3: "
        class="text-success" />
    
    <x-view-file 
        :value="['file_name' => 'photo4.webp', 'thumb' => '/thumbnails/photo4.jpg']" 
        icon="image" 
        label="Photo 4: "
        class="text-warning" />
</div>
```

### Media Library Interface
```blade
<div class="media-library-interface">
    <h4>Media Files</h4>
    
    <x-view-file 
        :value="['file_name' => 'video.mp4', 'thumb' => '/thumbnails/video.jpg']" 
        icon="video" 
        label="Video: "
        class="text-primary" />
    
    <x-view-file 
        :value="['file_name' => 'audio.mp3', 'thumb' => '/thumbnails/audio.jpg']" 
        icon="music" 
        label="Audio: "
        class="text-info" />
    
    <x-view-file 
        :value="['file_name' => 'archive.zip', 'thumb' => '/thumbnails/archive.jpg']" 
        icon="archive" 
        label="Archive: "
        class="text-success" />
    
    <x-view-file 
        :value="['file_name' => 'code.js', 'thumb' => '/thumbnails/code.jpg']" 
        icon="code" 
        label="Code: "
        class="text-warning" />
</div>
```

### File Upload Interface
```blade
<div class="file-upload-interface">
    <h4>Uploaded Files</h4>
    
    <x-view-file 
        :value="['file_name' => 'user_avatar.jpg', 'thumb' => '/thumbnails/user_avatar.jpg']" 
        icon="user" 
        label="Avatar: "
        class="text-primary" />
    
    <x-view-file 
        :value="['file_name' => 'company_logo.png', 'thumb' => '/thumbnails/company_logo.jpg']" 
        icon="building" 
        label="Logo: "
        class="text-info" />
    
    <x-view-file 
        :value="['file_name' => 'product_image.jpg', 'thumb' => '/thumbnails/product_image.jpg']" 
        icon="package" 
        label="Product: "
        class="text-success" />
    
    <x-view-file 
        :value="['file_name' => 'banner.jpg', 'thumb' => '/thumbnails/banner.jpg']" 
        icon="image" 
        label="Banner: "
        class="text-warning" />
</div>
```

### Attachment Interface
```blade
<div class="attachment-interface">
    <h4>Attachments</h4>
    
    <x-view-file 
        :value="['file_name' => 'invoice.pdf', 'thumb' => '/thumbnails/invoice.jpg']" 
        icon="file-text" 
        label="Invoice: "
        class="text-primary" />
    
    <x-view-file 
        :value="['file_name' => 'receipt.jpg', 'thumb' => '/thumbnails/receipt.jpg']" 
        icon="image" 
        label="Receipt: "
        class="text-info" />
    
    <x-view-file 
        :value="['file_name' => 'contract.pdf', 'thumb' => '/thumbnails/contract.jpg']" 
        icon="file-text" 
        label="Contract: "
        class="text-success" />
    
    <x-view-file 
        :value="['file_name' => 'photo.jpg', 'thumb' => '/thumbnails/photo.jpg']" 
        icon="image" 
        label="Photo: "
        class="text-warning" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_file_with_basic_value()
{
    $view = $this->blade('<x-view-file :value="[\'file_name\' => \'document.pdf\']" />');
    
    $view->assertSee('document.pdf');
}

/** @test */
public function it_renders_view_file_with_thumbnail()
{
    $view = $this->blade('<x-view-file :value="[\'file_name\' => \'image.jpg\', \'thumb\' => \'/thumbnails/image.jpg\']" />');
    
    $view->assertSee('image.jpg');
    $view->assertSee('/thumbnails/image.jpg');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewFileComponent::class)
        ->assertSee('<x-view-file')
        ->set('value', ['file_name' => 'document.pdf'])
        ->assertSee('document.pdf');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to file elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to file elements

### Keyboard Navigation
- Tab navigation to file
- Copy functionality accessibility
- File display accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- File context communication
- Icon description support
- Copy functionality announcement
- Thumbnail description

### File Accessibility
- Clear file purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Thumbnail accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** File display with HTML output

## Troubleshooting

### Common Issues

#### File Not Displaying
**Problem:** File value not showing
**Solution:** Check if value attribute is set and is an array

#### Thumbnail Not Showing
**Problem:** Thumbnail not displaying correctly
**Solution:** Check thumbnail path and ensure image exists

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** File doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **View URL:** URL display component
- **View Tel:** Telephone display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with file display functionality
- File information integration for interactive functionality
- Thumbnail support for visual file representation
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/file.blade.php`
2. Add/update tests in `tests/Components/ViewFileTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [View URL Component](../view-url.md)
- [View Tel Component](../view-tel.md)
- [Icon Component](../icon.md)
- [File Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View File Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
