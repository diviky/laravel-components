# Editor JS Component

A powerful block-based editor component that provides professional content editing capabilities with EditorJS integration and enhanced user experience. This component offers advanced block-based editing features with a comprehensive set of tools and seamless integration with modern web applications.

## Overview

**Component Type:** Editor  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, EditorJS editor, Alpine.js  
**JavaScript Libraries:** EditorJS editor, Alpine.js for interactivity

## Files

- **PHP Class:** `src/Components/EditorJS.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/editor/editorjs.blade.php`
- **JavaScript:** `resources/assets/editorjs.js`
- **CSS:** `resources/assets/editorjs.css`
- **Tests:** `tests/Components/EditorJSTest.php`
- **Documentation:** `docs/editor-js.md`

## Basic Usage

### Simple EditorJS Editor
```blade
<x-editor-js name="content" label="Content" />
```

### EditorJS with Configuration
```blade
<x-editor-js 
    name="article_content" 
    label="Article Content"
    :value="$article->content"
    upload-url="/api/upload"
    folder="articles"
    prefix="article" />
```

### EditorJS with Custom Settings
```blade
<x-editor-js 
    name="description" 
    label="Description"
    :config="['readOnly' => false, 'placeholder' => 'Start writing...']" />
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Field name | `'content'` |
| label | string | '' | Field label | `'Article Content'` |
| value | mixed | null | Editor content | `$article->content` |
| upload-url | string | '' | Image upload endpoint | `'/api/upload'` |
| folder | string | 'assets' | Upload folder | `'articles'` |
| prefix | string | '' | File prefix | `'article'` |
| config | array | [] | Editor configuration | `['readOnly' => false]` |

### Inherited Attributes

The component inherits all standard form input attributes and Laravel component attributes.

## Usage Examples

### Basic Block Editor
```blade
<!-- Simple Block Editor -->
<x-editor-js name="content" label="Content" />

<!-- Block Editor with Value -->
<x-editor-js 
    name="description" 
    label="Description"
    :value="$product->description" />

<!-- Block Editor with Help Text -->
<x-editor-js 
    name="body" 
    label="Article Body"
    help="Write your article content using blocks. Add paragraphs, headings, images, and more." />
```

### Blog Post Editor
```blade
<!-- Blog Post Block Editor -->
<x-editor-js 
    name="post_content" 
    label="Post Content"
    :value="$post->content"
    upload-url="/api/blog/upload"
    folder="blog"
    prefix="post"
    help="Write your blog post content using blocks. Add paragraphs, headings, images, and more." />
```

### Article Management
```blade
<!-- Article Block Editor -->
<form method="POST" action="{{ route('articles.store') }}">
    @csrf
    
    <x-form-input name="title" label="Title" required />
    <x-form-input name="slug" label="Slug" />
    
    <x-editor-js 
        name="content" 
        label="Content"
        :value="old('content')"
        upload-url="/api/articles/upload"
        folder="articles"
        prefix="article"
        required />
    
    <x-form-submit>Save Article</x-form-submit>
</form>
```

### E-commerce Product Description
```blade
<!-- Product Description Block Editor -->
<x-editor-js 
    name="description" 
    label="Product Description"
    :value="$product->description"
    upload-url="/api/products/upload"
    folder="products"
    prefix="product"
    help="Describe your product using blocks. Add paragraphs, images, lists, and more." />
```

### CMS Content Editor
```blade
<!-- CMS Page Block Editor -->
<x-editor-js 
    name="page_content" 
    label="Page Content"
    :value="$page->content"
    upload-url="/api/cms/upload"
    folder="cms"
    prefix="page"
    :config="['readOnly' => false, 'placeholder' => 'Start writing your page content...']" />
```

### Documentation Editor
```blade
<!-- Documentation Block Editor -->
<x-editor-js 
    name="documentation" 
    label="Documentation"
    :value="$doc->content"
    upload-url="/api/docs/upload"
    folder="documentation"
    prefix="doc"
    help="Write comprehensive documentation using blocks. Add headings, paragraphs, code blocks, and more." />
```

### Email Template Editor
```blade
<!-- Email Template Block Editor -->
<x-editor-js 
    name="template_content" 
    label="Email Template"
    :value="$template->content"
    upload-url="/api/templates/upload"
    folder="templates"
    prefix="email"
    help="Create your email template using blocks. Add text, images, buttons, and more." />
```

## Block Types

### Text Blocks
- **Paragraph** - Basic text content
- **Header** - H1, H2, H3, H4, H5, H6 headings
- **List** - Ordered and unordered lists
- **Quote** - Blockquotes and citations
- **Code** - Inline and block code

### Media Blocks
- **Image** - Images with captions
- **Video** - Embedded videos
- **Audio** - Audio files
- **Gallery** - Image galleries

### Interactive Blocks
- **Button** - Call-to-action buttons
- **Link** - External links
- **Table** - Data tables
- **Checklist** - Task lists

### Layout Blocks
- **Delimiter** - Visual separators
- **Warning** - Alert boxes
- **Alert** - Notification blocks
- **Raw** - Custom HTML

## Livewire Integration

### Basic Livewire EditorJS
```blade
<div>
    <x-editor-js 
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
    <x-editor-js 
        name="article_content" 
        label="Article Content"
        wire:model="articleContent"
        upload-url="/api/upload"
        folder="articles" />
    
    <div class="mt-4">
        <button wire:click="saveDraft" class="btn btn-outline-primary">Save Draft</button>
        <button wire:click="publish" class="btn btn-primary">Publish</button>
    </div>
</div>
```

### Livewire with Auto-save
```blade
<div>
    <x-editor-js 
        name="content" 
        label="Content"
        wire:model.lazy="content"
        upload-url="/api/upload" />
    
    <div class="mt-2">
        <small class="text-muted">Auto-saved at: {{ $lastSaved }}</small>
    </div>
</div>
```

## Image Upload Integration

### Laravel Route for Image Upload
```php
// routes/web.php
Route::post('/api/upload', function (Request $request) {
    $request->validate([
        'file' => 'required|image|max:2048',
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
            'file' => 'required|image|max:5120', // 5MB max
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

### EditorJS Custom Styles
```blade
<x-style>
    .editor-js-container {
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        overflow: hidden;
        min-height: 200px;
    }
    
    .editor-js-container .codex-editor {
        padding: 1rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .editor-js-container .codex-editor__redactor {
        padding-bottom: 0;
    }
    
    .editor-js-container .ce-block {
        margin: 0.5rem 0;
    }
    
    .editor-js-container .ce-block__content {
        max-width: none;
    }
    
    .editor-js-container .ce-paragraph {
        line-height: 1.6;
        margin: 0.5rem 0;
    }
    
    .editor-js-container .ce-header {
        margin: 1rem 0 0.5rem 0;
        font-weight: 600;
        color: #1f2937;
    }
    
    .editor-js-container .ce-header[data-level="1"] {
        font-size: 2rem;
    }
    
    .editor-js-container .ce-header[data-level="2"] {
        font-size: 1.5rem;
    }
    
    .editor-js-container .ce-header[data-level="3"] {
        font-size: 1.25rem;
    }
    
    .editor-js-container .ce-list {
        margin: 0.5rem 0;
        padding-left: 1.5rem;
    }
    
    .editor-js-container .ce-list__item {
        margin: 0.25rem 0;
    }
    
    .editor-js-container .ce-quote {
        border-left: 4px solid #3b82f6;
        padding-left: 1rem;
        margin: 1rem 0;
        font-style: italic;
        color: #6b7280;
        background: #f8fafc;
        padding: 1rem;
        border-radius: 0.25rem;
    }
    
    .editor-js-container .ce-code {
        background: #f3f4f6;
        padding: 0.125rem 0.25rem;
        border-radius: 0.25rem;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.875rem;
    }
    
    .editor-js-container .ce-code__textarea {
        background: #1f2937;
        color: #f9fafb;
        padding: 1rem;
        border-radius: 0.375rem;
        overflow-x: auto;
        margin: 1rem 0;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.875rem;
        line-height: 1.5;
    }
    
    .editor-js-container .ce-image {
        margin: 1rem 0;
    }
    
    .editor-js-container .ce-image__picture {
        max-width: 100%;
        height: auto;
        border-radius: 0.375rem;
    }
    
    .editor-js-container .ce-image__caption {
        text-align: center;
        font-size: 0.875rem;
        color: #6b7280;
        margin-top: 0.5rem;
    }
    
    .editor-js-container .ce-delimiter {
        text-align: center;
        margin: 2rem 0;
    }
    
    .editor-js-container .ce-delimiter::before {
        content: '***';
        font-size: 2rem;
        color: #d1d5db;
    }
    
    .editor-js-container .ce-warning {
        background: #fef3c7;
        border: 1px solid #f59e0b;
        border-radius: 0.375rem;
        padding: 1rem;
        margin: 1rem 0;
    }
    
    .editor-js-container .ce-warning__title {
        font-weight: 600;
        color: #92400e;
        margin-bottom: 0.5rem;
    }
    
    .editor-js-container .ce-warning__message {
        color: #92400e;
    }
    
    .editor-js-container .ce-alert {
        background: #dbeafe;
        border: 1px solid #3b82f6;
        border-radius: 0.375rem;
        padding: 1rem;
        margin: 1rem 0;
    }
    
    .editor-js-container .ce-alert__title {
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 0.5rem;
    }
    
    .editor-js-container .ce-alert__message {
        color: #1e40af;
    }
    
    .editor-js-container .ce-table {
        margin: 1rem 0;
        overflow-x: auto;
    }
    
    .editor-js-container .ce-table table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #e5e7eb;
    }
    
    .editor-js-container .ce-table th,
    .editor-js-container .ce-table td {
        border: 1px solid #e5e7eb;
        padding: 0.5rem;
        text-align: left;
    }
    
    .editor-js-container .ce-table th {
        background: #f9fafb;
        font-weight: 600;
    }
    
    .editor-js-loading {
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
    
    .editor-js-loading .loading {
        margin-top: 0.5rem;
    }
</x-style>
```

## Related Components

- [Editor TipTap](editor-tiptap.md) - TipTap rich text editor
- [Editor Lexical](editor-lexical.md) - Lexical rich text editor
- [Editor EasyMDE](editor-easymde.md) - EasyMDE markdown editor
- [Editor GrapesJS](editor-grapesjs.md) - GrapesJS visual editor
- [Editor Quill](editor-quill.md) - Quill.js rich text editor
- [Editor TinyMCE](editor-tinymce.md) - TinyMCE rich text editor

## Best Practices

1. **Performance**: Use lazy loading for large content
2. **Accessibility**: Ensure proper ARIA labels and keyboard navigation
3. **Security**: Validate and sanitize uploaded images
4. **User Experience**: Provide clear feedback for uploads and errors
5. **Content**: Use semantic HTML structure for better SEO
6. **Testing**: Test editor functionality across different browsers
7. **Documentation**: Document custom configurations and extensions

## Troubleshooting

### Editor Not Loading
Check that EditorJS dependencies are properly installed and loaded.

### Image Upload Issues
Verify that the upload URL is correct and accessible.

### Styling Problems
Ensure that EditorJS CSS is loaded and doesn't conflict with Bootstrap.

### Livewire Issues
Use `wire:ignore` to prevent Livewire from interfering with the editor.

### Performance Issues
Consider using lazy loading or virtual scrolling for large documents.

### Block Issues
Ensure that all required EditorJS tools are properly loaded and configured.
