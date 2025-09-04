# Editor EasyMDE Component

A powerful markdown editor component that provides professional markdown editing capabilities with EasyMDE integration and enhanced user experience. This component offers advanced markdown editing features with a comprehensive toolbar and seamless integration with modern web applications.

## Overview

**Component Type:** Editor  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, EasyMDE editor, Alpine.js  
**JavaScript Libraries:** EasyMDE editor, Alpine.js for interactivity

## Files

- **PHP Class:** `src/Components/EditorEasyMDE.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/editor/easymde.blade.php`
- **JavaScript:** `resources/assets/easymde.js`
- **CSS:** `resources/assets/easymde.css`
- **Tests:** `tests/Components/EditorEasyMDETest.php`
- **Documentation:** `docs/editor-easymde.md`

## Basic Usage

### Simple EasyMDE Editor
```blade
<x-editor-easymde name="content" label="Content" />
```

### EasyMDE with Configuration
```blade
<x-editor-easymde 
    name="article_content" 
    label="Article Content"
    :value="$article->content"
    upload-url="/api/upload"
    folder="articles"
    prefix="article" />
```

### EasyMDE with Custom Settings
```blade
<x-editor-easymde 
    name="description" 
    label="Description"
    :config="['spellChecker' => false, 'placeholder' => 'Enter your markdown content...']" />
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
| config | array | [] | Editor configuration | `['spellChecker' => false]` |

### Inherited Attributes

The component inherits all standard form input attributes and Laravel component attributes.

## Usage Examples

### Basic Markdown Editor
```blade
<!-- Simple Markdown Editor -->
<x-editor-easymde name="content" label="Content" />

<!-- Markdown Editor with Value -->
<x-editor-easymde 
    name="description" 
    label="Description"
    :value="$product->description" />

<!-- Markdown Editor with Help Text -->
<x-editor-easymde 
    name="body" 
    label="Article Body"
    help="Write your article content in markdown format. Use the toolbar to format text." />
```

### Blog Post Editor
```blade
<!-- Blog Post Markdown Editor -->
<x-editor-easymde 
    name="post_content" 
    label="Post Content"
    :value="$post->content"
    upload-url="/api/blog/upload"
    folder="blog"
    prefix="post"
    help="Write your blog post content in markdown. Images will be uploaded to the blog folder." />
```

### Article Management
```blade
<!-- Article Markdown Editor -->
<form method="POST" action="{{ route('articles.store') }}">
    @csrf
    
    <x-form-input name="title" label="Title" required />
    <x-form-input name="slug" label="Slug" />
    
    <x-editor-easymde 
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
<!-- Product Description Markdown Editor -->
<x-editor-easymde 
    name="description" 
    label="Product Description"
    :value="$product->description"
    upload-url="/api/products/upload"
    folder="products"
    prefix="product"
    help="Describe your product in markdown format. Include features, benefits, and specifications." />
```

### CMS Content Editor
```blade
<!-- CMS Page Markdown Editor -->
<x-editor-easymde 
    name="page_content" 
    label="Page Content"
    :value="$page->content"
    upload-url="/api/cms/upload"
    folder="cms"
    prefix="page"
    :config="['spellChecker' => false, 'placeholder' => 'Enter page content in markdown...']" />
```

### Documentation Editor
```blade
<!-- Documentation Markdown Editor -->
<x-editor-easymde 
    name="documentation" 
    label="Documentation"
    :value="$doc->content"
    upload-url="/api/docs/upload"
    folder="documentation"
    prefix="doc"
    help="Write comprehensive documentation in markdown format. Use headings, lists, and code blocks for better organization." />
```

### Email Template Editor
```blade
<!-- Email Template Markdown Editor -->
<x-editor-easymde 
    name="template_content" 
    label="Email Template"
    :value="$template->content"
    upload-url="/api/templates/upload"
    folder="templates"
    prefix="email"
    help="Create your email template in markdown format. Use the toolbar to format text and add images." />
```

## Markdown Features

### Text Formatting
- **Bold** - `**bold text**` or `__bold text__`
- **Italic** - `*italic text*` or `_italic text_`
- **Strikethrough** - `~~strikethrough text~~`
- **Inline Code** - `` `code` ``

### Headings
- **H1** - `# Heading 1`
- **H2** - `## Heading 2`
- **H3** - `### Heading 3`
- **H4** - `#### Heading 4`
- **H5** - `##### Heading 5`
- **H6** - `###### Heading 6`

### Lists
- **Unordered List** - `- Item` or `* Item`
- **Ordered List** - `1. Item`
- **Task List** - `- [ ] Task` or `- [x] Completed`

### Links and Images
- **Links** - `[Link Text](URL)`
- **Images** - `![Alt Text](Image URL)`
- **Reference Links** - `[Link Text][reference]`

### Code Blocks
- **Fenced Code** - ``` ```language ```
- **Indented Code** - 4 spaces or 1 tab

### Tables
```markdown
| Column 1 | Column 2 | Column 3 |
|----------|----------|----------|
| Row 1    | Data     | Data     |
| Row 2    | Data     | Data     |
```

### Blockquotes
```markdown
> This is a blockquote
> It can span multiple lines
```

## Livewire Integration

### Basic Livewire EasyMDE
```blade
<div>
    <x-editor-easymde 
        name="content" 
        label="Content"
        wire:model="content" />
    
    <div class="mt-4">
        <h4>Preview:</h4>
        <div class="border p-3">
            {!! Str::markdown($content) !!}
        </div>
    </div>
</div>
```

### Livewire with Real-time Updates
```blade
<div>
    <x-editor-easymde 
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
    <x-editor-easymde 
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

### EasyMDE Custom Styles
```blade
<x-style>
    .EasyMDEContainer {
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        overflow: hidden;
    }
    
    .EasyMDEContainer .CodeMirror {
        min-height: 200px;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 14px;
        line-height: 1.5;
        border: none;
        background: #ffffff;
    }
    
    .EasyMDEContainer .CodeMirror-focused .CodeMirror-cursor {
        border-left: 2px solid #3b82f6;
    }
    
    .EasyMDEContainer .editor-toolbar {
        background: #f9fafb;
        border-bottom: 1px solid #e5e7eb;
        padding: 0.5rem;
        display: flex;
        gap: 0.25rem;
        flex-wrap: wrap;
    }
    
    .EasyMDEContainer .editor-toolbar button {
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        background: white;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 2rem;
        height: 2rem;
    }
    
    .EasyMDEContainer .editor-toolbar button:hover {
        background: #f3f4f6;
        border-color: #9ca3af;
    }
    
    .EasyMDEContainer .editor-toolbar button.active {
        background: #3b82f6;
        color: white;
        border-color: #2563eb;
    }
    
    .EasyMDEContainer .editor-toolbar i {
        font-size: 14px;
    }
    
    .EasyMDEContainer .editor-preview {
        background: #ffffff;
        padding: 1rem;
        border-left: 1px solid #e5e7eb;
    }
    
    .EasyMDEContainer .editor-preview h1,
    .EasyMDEContainer .editor-preview h2,
    .EasyMDEContainer .editor-preview h3,
    .EasyMDEContainer .editor-preview h4,
    .EasyMDEContainer .editor-preview h5,
    .EasyMDEContainer .editor-preview h6 {
        margin: 1rem 0 0.5rem 0;
        font-weight: 600;
        color: #1f2937;
    }
    
    .EasyMDEContainer .editor-preview h1 {
        font-size: 2rem;
    }
    
    .EasyMDEContainer .editor-preview h2 {
        font-size: 1.5rem;
    }
    
    .EasyMDEContainer .editor-preview h3 {
        font-size: 1.25rem;
    }
    
    .EasyMDEContainer .editor-preview p {
        margin: 0.5rem 0;
        line-height: 1.6;
    }
    
    .EasyMDEContainer .editor-preview ul,
    .EasyMDEContainer .editor-preview ol {
        margin: 0.5rem 0;
        padding-left: 1.5rem;
    }
    
    .EasyMDEContainer .editor-preview blockquote {
        border-left: 4px solid #3b82f6;
        padding-left: 1rem;
        margin: 1rem 0;
        font-style: italic;
        color: #6b7280;
        background: #f8fafc;
        padding: 1rem;
        border-radius: 0.25rem;
    }
    
    .EasyMDEContainer .editor-preview code {
        background: #f3f4f6;
        padding: 0.125rem 0.25rem;
        border-radius: 0.25rem;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        font-size: 0.875rem;
    }
    
    .EasyMDEContainer .editor-preview pre {
        background: #1f2937;
        color: #f9fafb;
        padding: 1rem;
        border-radius: 0.375rem;
        overflow-x: auto;
        margin: 1rem 0;
    }
    
    .EasyMDEContainer .editor-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 0.375rem;
        margin: 0.5rem 0;
    }
    
    .EasyMDEContainer .editor-preview a {
        color: #3b82f6;
        text-decoration: underline;
    }
    
    .EasyMDEContainer .editor-preview a:hover {
        color: #2563eb;
    }
    
    .EasyMDEContainer .editor-preview table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
    }
    
    .EasyMDEContainer .editor-preview th,
    .EasyMDEContainer .editor-preview td {
        border: 1px solid #e5e7eb;
        padding: 0.5rem;
        text-align: left;
    }
    
    .EasyMDEContainer .editor-preview th {
        background: #f9fafb;
        font-weight: 600;
    }
</x-style>
```

## Related Components

- [Editor TipTap](editor-tiptap.md) - TipTap rich text editor
- [Editor Lexical](editor-lexical.md) - Lexical rich text editor
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
Check that EasyMDE dependencies are properly installed and loaded.

### Image Upload Issues
Verify that the upload URL is correct and accessible.

### Styling Problems
Ensure that EasyMDE CSS is loaded and doesn't conflict with Bootstrap.

### Livewire Issues
Use `wire:ignore` to prevent Livewire from interfering with the editor.

### Performance Issues
Consider using lazy loading or virtual scrolling for large documents.

### Markdown Parsing Issues
Ensure that markdown content is properly parsed when displaying.
