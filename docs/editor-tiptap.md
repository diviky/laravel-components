# Editor TipTap Component

A powerful rich text editor component that provides professional content editing capabilities with TipTap integration and enhanced user experience. This component offers advanced text editing features with a comprehensive toolbar and seamless integration with modern web applications.

## Overview

**Component Type:** Editor  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, TipTap editor, Alpine.js  
**JavaScript Libraries:** TipTap editor, Alpine.js for interactivity

## Files

- **PHP Class:** `src/Components/EditorTipTap.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/editor/tiptap.blade.php`
- **JavaScript:** `resources/assets/tiptap.js`
- **CSS:** `resources/assets/tiptap.css`
- **Tests:** `tests/Components/EditorTipTapTest.php`
- **Documentation:** `docs/editor-tiptap.md`

## Basic Usage

### Simple TipTap Editor
```blade
<x-editor-tiptap name="content" label="Content" />
```

### TipTap with Configuration
```blade
<x-editor-tiptap 
    name="article_content" 
    label="Article Content"
    :value="$article->content"
    upload-url="/api/upload"
    folder="articles"
    prefix="article" />
```

### TipTap with Custom Settings
```blade
<x-editor-tiptap 
    name="description" 
    label="Description"
    :config="['editable' => true, 'placeholder' => 'Enter your content...']" />
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
| config | array | [] | Editor configuration | `['editable' => true]` |

### Inherited Attributes

The component inherits all standard form input attributes and Laravel component attributes.

## Usage Examples

### Basic Content Editor
```blade
<!-- Simple Content Editor -->
<x-editor-tiptap name="content" label="Content" />

<!-- Content Editor with Value -->
<x-editor-tiptap 
    name="description" 
    label="Description"
    :value="$product->description" />

<!-- Content Editor with Help Text -->
<x-editor-tiptap 
    name="body" 
    label="Article Body"
    help="Write your article content here. Use the toolbar to format text." />
```

### Blog Post Editor
```blade
<!-- Blog Post Content Editor -->
<x-editor-tiptap 
    name="post_content" 
    label="Post Content"
    :value="$post->content"
    upload-url="/api/blog/upload"
    folder="blog"
    prefix="post"
    help="Write your blog post content. Images will be uploaded to the blog folder." />
```

### Article Management
```blade
<!-- Article Editor -->
<form method="POST" action="{{ route('articles.store') }}">
    @csrf
    
    <x-form-input name="title" label="Title" required />
    <x-form-input name="slug" label="Slug" />
    
    <x-editor-tiptap 
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
<!-- Product Description Editor -->
<x-editor-tiptap 
    name="description" 
    label="Product Description"
    :value="$product->description"
    upload-url="/api/products/upload"
    folder="products"
    prefix="product"
    help="Describe your product in detail. Include features, benefits, and specifications." />
```

### CMS Content Editor
```blade
<!-- CMS Page Editor -->
<x-editor-tiptap 
    name="page_content" 
    label="Page Content"
    :value="$page->content"
    upload-url="/api/cms/upload"
    folder="cms"
    prefix="page"
    :config="['editable' => true, 'placeholder' => 'Enter page content...']" />
```

### Documentation Editor
```blade
<!-- Documentation Editor -->
<x-editor-tiptap 
    name="documentation" 
    label="Documentation"
    :value="$doc->content"
    upload-url="/api/docs/upload"
    folder="documentation"
    prefix="doc"
    help="Write comprehensive documentation. Use headings, lists, and code blocks for better organization." />
```

### Email Template Editor
```blade
<!-- Email Template Editor -->
<x-editor-tiptap 
    name="template_content" 
    label="Email Template"
    :value="$template->content"
    upload-url="/api/templates/upload"
    folder="templates"
    prefix="email"
    help="Create your email template. Use the toolbar to format text and add images." />
```

## Toolbar Features

### Text Formatting
- **Bold** - Make text bold
- **Italic** - Make text italic
- **Underline** - Underline text
- **Strike** - Strikethrough text

### Headings
- **H1** - Heading 1
- **H2** - Heading 2

### Lists
- **Bullet List** - Unordered list
- **Ordered List** - Numbered list

### Blocks
- **Blockquote** - Quote block
- **Code Block** - Code block

### Media
- **Image** - Insert images
- **Link** - Add links

## Livewire Integration

### Basic Livewire TipTap
```blade
<div>
    <x-editor-tiptap 
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
    <x-editor-tiptap 
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
    <x-editor-tiptap 
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

### TipTap Custom Styles
```blade
<x-style>
    .tiptap-editor {
        min-height: 200px;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 1rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .tiptap-toolbar {
        display: flex;
        gap: 0.25rem;
        padding: 0.5rem;
        border-bottom: 1px solid #e5e7eb;
        background: #f9fafb;
        border-radius: 0.375rem 0.375rem 0 0;
    }
    
    .tiptap-toolbar button {
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        background: white;
        border-radius: 0.25rem;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    .tiptap-toolbar button:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
    }
    
    .tiptap-toolbar button.is-active {
        background: #3b82f6;
        color: white;
        border-color: #2563eb;
    }
    
    .tiptap-editor h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 1rem 0;
        color: #1f2937;
    }
    
    .tiptap-editor h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0.75rem 0;
        color: #374151;
    }
    
    .tiptap-editor ul, .tiptap-editor ol {
        margin: 0.5rem 0;
        padding-left: 1.5rem;
    }
    
    .tiptap-editor blockquote {
        border-left: 4px solid #3b82f6;
        padding-left: 1rem;
        margin: 1rem 0;
        font-style: italic;
        color: #6b7280;
    }
    
    .tiptap-editor code {
        background: #f3f4f6;
        padding: 0.125rem 0.25rem;
        border-radius: 0.25rem;
        font-family: 'Courier New', monospace;
        font-size: 0.875rem;
    }
    
    .tiptap-editor pre {
        background: #1f2937;
        color: #f9fafb;
        padding: 1rem;
        border-radius: 0.375rem;
        overflow-x: auto;
        margin: 1rem 0;
    }
    
    .tiptap-editor img {
        max-width: 100%;
        height: auto;
        border-radius: 0.375rem;
        margin: 0.5rem 0;
    }
    
    .tiptap-editor a {
        color: #3b82f6;
        text-decoration: underline;
    }
    
    .tiptap-editor a:hover {
        color: #2563eb;
    }
</x-style>
```

## Related Components

- [Editor Quill](editor-quill.md) - Quill.js rich text editor
- [Editor TinyMCE](editor-tinymce.md) - TinyMCE rich text editor
- [Form Textarea](form-textarea.md) - Basic textarea component

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
Check that TipTap dependencies are properly installed and loaded.

### Image Upload Issues
Verify that the upload URL is correct and accessible.

### Styling Problems
Ensure that TipTap CSS is loaded and doesn't conflict with Bootstrap.

### Livewire Issues
Use `wire:ignore` to prevent Livewire from interfering with the editor.

### Performance Issues
Consider using lazy loading or virtual scrolling for large documents.
