# Editor GrapesJS Component

A powerful visual page builder component that provides professional drag-and-drop website building capabilities with GrapesJS integration and enhanced user experience. This component offers advanced visual editing features with a comprehensive interface and seamless integration with modern web applications.

## Overview

**Component Type:** Editor  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, GrapesJS editor, Alpine.js  
**JavaScript Libraries:** GrapesJS editor, Alpine.js for interactivity

## Files

- **PHP Class:** `src/Components/EditorGrapesJS.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/editor/grapesjs.blade.php`
- **JavaScript:** `resources/assets/grapesjs.js`
- **CSS:** `resources/assets/grapesjs.css`
- **Tests:** `tests/Components/EditorGrapesJSTest.php`
- **Documentation:** `docs/editor-grapesjs.md`

## Basic Usage

### Simple GrapesJS Editor
```blade
<x-editor-grapesjs name="content" label="Content" />
```

### GrapesJS with Configuration
```blade
<x-editor-grapesjs 
    name="page_content" 
    label="Page Content"
    :value="$page->content"
    upload-url="/api/upload"
    folder="pages"
    prefix="page" />
```

### GrapesJS with Custom Settings
```blade
<x-editor-grapesjs 
    name="template" 
    label="Template"
    :config="['height' => '600px', 'storageManager' => false]" />
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Field name | `'content'` |
| label | string | '' | Field label | `'Page Content'` |
| value | mixed | null | Editor content | `$page->content` |
| upload-url | string | '' | Asset upload endpoint | `'/api/upload'` |
| folder | string | 'assets' | Upload folder | `'pages'` |
| prefix | string | '' | File prefix | `'page'` |
| config | array | [] | Editor configuration | `['height' => '600px']` |

### Inherited Attributes

The component inherits all standard form input attributes and Laravel component attributes.

## Usage Examples

### Basic Page Builder
```blade
<!-- Simple Page Builder -->
<x-editor-grapesjs name="content" label="Content" />

<!-- Page Builder with Value -->
<x-editor-grapesjs 
    name="page_content" 
    label="Page Content"
    :value="$page->content" />

<!-- Page Builder with Help Text -->
<x-editor-grapesjs 
    name="template" 
    label="Template"
    help="Build your page using the drag-and-drop interface. Add components, style them, and create responsive layouts." />
```

### Website Builder
```blade
<!-- Website Builder -->
<x-editor-grapesjs 
    name="website_content" 
    label="Website Content"
    :value="$website->content"
    upload-url="/api/website/upload"
    folder="website"
    prefix="site"
    help="Build your website using the visual editor. Drag and drop components to create your layout." />
```

### Landing Page Builder
```blade
<!-- Landing Page Builder -->
<form method="POST" action="{{ route('landing-pages.store') }}">
    @csrf
    
    <x-form-input name="title" label="Title" required />
    <x-form-input name="slug" label="Slug" />
    
    <x-editor-grapesjs 
        name="content" 
        label="Page Content"
        :value="old('content')"
        upload-url="/api/landing-pages/upload"
        folder="landing-pages"
        prefix="landing"
        required />
    
    <x-form-submit>Save Landing Page</x-form-submit>
</form>
```

### E-commerce Product Page Builder
```blade
<!-- Product Page Builder -->
<x-editor-grapesjs 
    name="product_page" 
    label="Product Page"
    :value="$product->page_content"
    upload-url="/api/products/upload"
    folder="products"
    prefix="product"
    help="Create a custom product page layout. Add product images, descriptions, and call-to-action buttons." />
```

### CMS Page Builder
```blade
<!-- CMS Page Builder -->
<x-editor-grapesjs 
    name="cms_content" 
    label="CMS Content"
    :value="$cms->content"
    upload-url="/api/cms/upload"
    folder="cms"
    prefix="page"
    :config="['height' => '800px', 'storageManager' => false]" />
```

### Email Template Builder
```blade
<!-- Email Template Builder -->
<x-editor-grapesjs 
    name="email_template" 
    label="Email Template"
    :value="$template->content"
    upload-url="/api/templates/upload"
    folder="templates"
    prefix="email"
    help="Create responsive email templates. Use the visual editor to design your email layout." />
```

### Portfolio Builder
```blade
<!-- Portfolio Builder -->
<x-editor-grapesjs 
    name="portfolio_content" 
    label="Portfolio Content"
    :value="$portfolio->content"
    upload-url="/api/portfolio/upload"
    folder="portfolio"
    prefix="portfolio"
    help="Build your portfolio using the visual editor. Showcase your work with galleries, testimonials, and contact forms." />
```

## Visual Editor Features

### Components
- **Text** - Add and edit text content
- **Images** - Upload and manage images
- **Buttons** - Create call-to-action buttons
- **Forms** - Build contact and lead forms
- **Maps** - Embed Google Maps
- **Videos** - Add video content
- **Social Media** - Social media integration

### Layout Tools
- **Grid System** - Responsive grid layouts
- **Flexbox** - Modern flexbox layouts
- **Columns** - Multi-column layouts
- **Spacing** - Margin and padding controls
- **Alignment** - Content alignment tools

### Styling
- **Typography** - Font family, size, weight
- **Colors** - Text and background colors
- **Borders** - Border styles and radius
- **Shadows** - Box and text shadows
- **Animations** - CSS animations and transitions

### Responsive Design
- **Mobile View** - Mobile-specific editing
- **Tablet View** - Tablet-specific editing
- **Desktop View** - Desktop-specific editing
- **Breakpoints** - Custom breakpoint management

## Livewire Integration

### Basic Livewire GrapesJS
```blade
<div>
    <x-editor-grapesjs 
        name="content" 
        label="Content"
        wire:model="content" />
    
    <div class="mt-4">
        <h4>Preview:</h4>
        <div class="border p-3">
            {!! $content !!}
        </div>
    </div>
</div>
```

### Livewire with Real-time Updates
```blade
<div>
    <x-editor-grapesjs 
        name="page_content" 
        label="Page Content"
        wire:model="pageContent"
        upload-url="/api/upload"
        folder="pages" />
    
    <div class="mt-4">
        <button wire:click="saveDraft" class="btn btn-outline-primary">Save Draft</button>
        <button wire:click="publish" class="btn btn-primary">Publish</button>
    </div>
</div>
```

### Livewire with Auto-save
```blade
<div>
    <x-editor-grapesjs 
        name="content" 
        label="Content"
        wire:model.lazy="content"
        upload-url="/api/upload" />
    
    <div class="mt-2">
        <small class="text-muted">Auto-saved at: {{ $lastSaved }}</small>
    </div>
</div>
```

## Asset Upload Integration

### Laravel Route for Asset Upload
```php
// routes/web.php
Route::post('/api/upload', function (Request $request) {
    $request->validate([
        'file' => 'required|file|max:10240', // 10MB max
        'folder' => 'string',
        'prefix' => 'string',
    ]);
    
    $file = $request->file('file');
    $folder = $request->input('folder', 'uploads');
    $prefix = $request->input('prefix', '');
    
    $filename = $prefix . '_' . time() . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs($folder, $filename, 'public');
    
    return response()->json([
        'url' => Storage::url($path),
        'filename' => $filename,
    ]);
});
```

### Custom Upload Handler
```php
// app/Http/Controllers/UploadController.php
class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'folder' => 'string',
            'prefix' => 'string',
        ]);
        
        $file = $request->file('file');
        $folder = $request->input('folder', 'uploads');
        $prefix = $request->input('prefix', '');
        
        // Generate unique filename
        $filename = $prefix . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Store file
        $path = $file->storeAs($folder, $filename, 'public');
        
        // Return URL for editor
        return response()->json([
            'url' => Storage::url($path),
            'filename' => $filename,
            'size' => $file->getSize(),
        ]);
    }
}
```

## Custom Styling

### GrapesJS Custom Styles
```blade
<x-style>
    .grapesjs-editor-container {
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        overflow: hidden;
        min-height: 400px;
    }
    
    .grapesjs-editor-container .gjs-editor {
        height: 100%;
    }
    
    .grapesjs-editor-container .gjs-cv-canvas {
        background: #ffffff;
    }
    
    .grapesjs-editor-container .gjs-pn-panel {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .grapesjs-editor-container .gjs-pn-btn {
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin: 0.25rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .grapesjs-editor-container .gjs-pn-btn:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
    }
    
    .grapesjs-editor-container .gjs-pn-btn.gjs-pn-active {
        background: #3b82f6;
        color: white;
        border-color: #2563eb;
    }
    
    .grapesjs-editor-container .gjs-blocks-cs {
        background: #f9fafb;
        border-right: 1px solid #e5e7eb;
    }
    
    .grapesjs-editor-container .gjs-block {
        background: white;
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin: 0.25rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .grapesjs-editor-container .gjs-block:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
    }
    
    .grapesjs-editor-container .gjs-sm-sector {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .grapesjs-editor-container .gjs-sm-property {
        background: white;
        border-bottom: 1px solid #f3f4f6;
        padding: 0.5rem;
    }
    
    .grapesjs-editor-container .gjs-sm-property input,
    .grapesjs-editor-container .gjs-sm-property select {
        border: 1px solid #d1d5db;
        border-radius: 0.25rem;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    
    .grapesjs-editor-container .gjs-sm-property input:focus,
    .grapesjs-editor-container .gjs-sm-property select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .editor-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(255, 255, 255, 0.9);
        padding: 1rem;
        border-radius: 0.375rem;
        text-align: center;
        z-index: 1000;
    }
    
    .editor-loading .loading {
        margin-top: 0.5rem;
    }
</x-style>
```

## Related Components

- [Editor TipTap](editor-tiptap.md) - TipTap rich text editor
- [Editor Lexical](editor-lexical.md) - Lexical rich text editor
- [Editor EasyMDE](editor-easymde.md) - EasyMDE markdown editor
- [Editor Quill](editor-quill.md) - Quill.js rich text editor
- [Editor TinyMCE](editor-tinymce.md) - TinyMCE rich text editor

## Best Practices

1. **Performance**: Use lazy loading for large content
2. **Accessibility**: Ensure proper ARIA labels and keyboard navigation
3. **Security**: Validate and sanitize uploaded assets
4. **User Experience**: Provide clear feedback for uploads and errors
5. **Content**: Use semantic HTML structure for better SEO
6. **Testing**: Test editor functionality across different browsers
7. **Documentation**: Document custom configurations and extensions

## Troubleshooting

### Editor Not Loading
Check that GrapesJS dependencies are properly installed and loaded.

### Asset Upload Issues
Verify that the upload URL is correct and accessible.

### Styling Problems
Ensure that GrapesJS CSS is loaded and doesn't conflict with Bootstrap.

### Livewire Issues
Use `wire:ignore` to prevent Livewire from interfering with the editor.

### Performance Issues
Consider using lazy loading or virtual scrolling for large documents.

### Component Issues
Ensure that all required GrapesJS plugins are properly loaded.
