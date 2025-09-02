# Editor Quill Component

A sophisticated rich text editor component that provides comprehensive text editing functionality with enhanced user experience and flexible configuration options. This component offers intuitive rich text editing with Quill.js integration, professional styling, and seamless form integration.

## Overview

**Component Type:** Editor  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Quill.js, Alpine.js, extends base Editor class
**JavaScript Library:** Quill.js, Alpine.js

## Files

- **PHP Class:** `src/Components/EditorQuill.php`
- **View File:** `resources/views/bootstrap-5/editor/quill.blade.php`
- **Tests:** `tests/Components/EditorQuillTest.php` (to be created)
- **Documentation:** `docs/editor-quill.md`

## Basic Usage

### Simple Editor Quill
```blade
<x-editor-quill name="content" label="Content" />
```

### With Custom Value
```blade
<x-editor-quill 
    name="content" 
    label="Content" 
    value="<p>Initial content</p>">
</x-editor-quill>
```

### With Custom Label
```blade
<x-editor-quill 
    name="description" 
    label="Description" 
    placeholder="Enter description...">
</x-editor-quill>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'content'` or `'description'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Editor label text | `'Content Editor'` |
| value | string | '' | Initial editor content | `'<p>Initial content</p>'` |
| placeholder | string | 'Write something...' | Placeholder text | `'Start writing...'` |
| help | string | null | Help text below editor | `'Use the toolbar to format text'` |
| prefix | string | '' | File upload prefix | `'uploads'` |
| folder | string | '' | Upload folder path | `'content'` |
| uploadUrl | string | '' | File upload URL | `'/api/upload'` |
| accept | string | 'image/*' | Accepted file types | `'image/*,video/*'` |
| settings | array | [] | Custom Quill settings | `['theme' => 'bubble']` |

### Inherited Attributes

This component extends the base `Editor` class and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'quill-editor'` |
| class | string | '' | CSS classes | `'custom-quill-editor'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'edit-content'` |
| role | string\|array | null | Required user role(s) | `'editor'` or `['editor', 'admin']` |
| action | string | null | Action type for authorization | `'edit'` |

## Component Variants

### Standard Editor Quill
**Usage:** `<x-editor-quill name="content">` (default)
**Description:** Standard rich text editor with Quill.js
**Features:**
- Rich text editing
- Toolbar with formatting options
- Image and video support
- Professional styling
- Enhanced user experience

### Custom Theme Editor Quill
**Usage:** `<x-editor-quill name="content" :settings="['theme' => 'bubble']">`
**Description:** Custom theme configuration
**Features:**
- Custom Quill themes
- Flexible configuration
- Professional styling
- Enhanced user experience

### Readonly Editor Quill
**Usage:** `<x-editor-quill name="content" readonly>`
**Description:** Readonly content display
**Features:**
- Content display only
- No editing capabilities
- Professional styling
- Enhanced user experience

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Editor content and text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-editor-quill name="content">
    Custom Editor Content
</x-editor-quill>
```

## Usage Examples

### Basic Rich Text Editor
```blade
<x-editor-quill 
    name="content" 
    label="Content" 
    placeholder="Start writing your content...">
</x-editor-quill>
```

### Editor with File Upload
```blade
<x-editor-quill 
    name="content" 
    label="Content" 
    upload-url="/api/upload"
    folder="content"
    accept="image/*,video/*">
</x-editor-quill>
```

### Editor with Custom Settings
```blade
<x-editor-quill 
    name="content" 
    label="Content" 
    :settings="[
        'theme' => 'bubble',
        'placeholder' => 'Custom placeholder...',
        'modules' => [
            'toolbar' => [
                ['bold', 'italic'],
                ['link', 'image']
            ]
        ]
    ]">
</x-editor-quill>
```

### Editor with Help Text
```blade
<x-editor-quill 
    name="content" 
    label="Content" 
    help="Use the toolbar to format your text. You can upload images and videos.">
</x-editor-quill>
```

### Editor with Custom Classes
```blade
<x-editor-quill 
    name="custom_content" 
    class="custom-quill-editor-lg"
    label="Custom Editor">
</x-editor-quill>
```

### Editor with Custom ID
```blade
<x-editor-quill 
    name="custom_id_content" 
    id="custom-quill-editor-selector"
    label="Custom ID Editor">
</x-editor-quill>
```

### Editor with Data Attributes
```blade
<x-editor-quill 
    name="data_content" 
    data-test="quill-editor"
    data-type="rich-text-editor"
    label="Data Editor">
</x-editor-quill>
```

### Editor with Aria Attributes
```blade
<x-editor-quill 
    name="aria_content" 
    aria-label="Rich Text Editor"
    aria-describedby="editor-help-text"
    label="Aria Editor">
</x-editor-quill>
```

### Editor with Role Attribute
```blade
<x-editor-quill 
    name="role_content" 
    role="textbox"
    label="Role Editor">
</x-editor-quill>
```

### Editor with Tabindex
```blade
<x-editor-quill 
    name="tabindex_content" 
    tabindex="0"
    label="Tabindex Editor">
</x-editor-quill>
```

### Editor with Form Attribute
```blade
<x-editor-quill 
    name="form_content" 
    form="my-form"
    label="Form Editor">
</x-editor-quill>
```

### Editor with Autocomplete
```blade
<x-editor-quill 
    name="autocomplete_content" 
    autocomplete="off"
    label="Autocomplete Editor">
</x-editor-quill>
```

### Editor with Novalidate
```blade
<x-editor-quill 
    name="novalidate_content" 
    novalidate
    label="Novalidate Editor">
</x-editor-quill>
```

### Editor with Accept
```blade
<x-editor-quill 
    name="accept_content" 
    accept="image/*"
    label="Accept Editor">
</x-editor-quill>
```

### Editor with Capture
```blade
<x-editor-quill 
    name="capture_content" 
    capture="environment"
    label="Capture Editor">
</x-editor-quill>
```

### Editor with Max
```blade
<x-editor-quill 
    name="max_content" 
    max="10000"
    label="Max Editor">
</x-editor-quill>
```

### Editor with Min
```blade
<x-editor-quill 
    name="min_content" 
    min="100"
    label="Min Editor">
</x-editor-quill>
```

### Editor with Step
```blade
<x-editor-quill 
    name="step_content" 
    step="100"
    label="Step Editor">
</x-editor-quill>
```

### Editor with Pattern
```blade
<x-editor-quill 
    name="pattern_content" 
    pattern="[A-Za-z0-9\s]+"
    label="Pattern Editor">
</x-editor-quill>
```

### Editor with Spellcheck
```blade
<x-editor-quill 
    name="spellcheck_content" 
    spellcheck="false"
    label="Spellcheck Editor">
</x-editor-quill>
```

### Editor with Translate
```blade
<x-editor-quill 
    name="translate_content" 
    translate="no"
    label="Translate Editor">
</x-editor-quill>
```

### Editor with Contenteditable
```blade
<x-editor-quill 
    name="contenteditable_content" 
    contenteditable="true"
    label="Contenteditable Editor">
</x-editor-quill>
```

### Editor with Contextmenu
```blade
<x-editor-quill 
    name="contextmenu_content" 
    contextmenu="editor-menu"
    label="Contextmenu Editor">
</x-editor-quill>
```

### Editor with Dir
```blade
<x-editor-quill 
    name="dir_content" 
    dir="rtl"
    label="Dir Editor">
</x-editor-quill>
```

### Editor with Draggable
```blade
<x-editor-quill 
    name="draggable_content" 
    draggable="true"
    label="Draggable Editor">
</x-editor-quill>
```

### Editor with Dropzone
```blade
<x-editor-quill 
    name="dropzone_content" 
    dropzone="copy"
    label="Dropzone Editor">
</x-editor-quill>
```

### Editor with Hidden
```blade
<x-editor-quill 
    name="hidden_content" 
    hidden
    label="Hidden Editor">
</x-editor-quill>
```

### Editor with Lang
```blade
<x-editor-quill 
    name="lang_content" 
    lang="en"
    label="Lang Editor">
</x-editor-quill>
```

### Editor with Spellcheck True
```blade
<x-editor-quill 
    name="spellcheck_true_content" 
    spellcheck="true"
    label="Spellcheck True Editor">
</x-editor-quill>
```

### Editor with Translate Yes
```blade
<x-editor-quill 
    name="translate_yes_content" 
    translate="yes"
    label="Translate Yes Editor">
</x-editor-quill>
```

### Editor with Contenteditable False
```blade
<x-editor-quill 
    name="contenteditable_false_content" 
    contenteditable="false"
    label="Contenteditable False Editor">
</x-editor-quill>
```

### Editor with Draggable False
```blade
<x-editor-quill 
    name="draggable_false_content" 
    draggable="false"
    label="Draggable False Editor">
</x-editor-quill>
```

### Editor with Dropzone Move
```blade
<x-editor-quill 
    name="dropzone_move_content" 
    dropzone="move"
    label="Dropzone Move Editor">
</x-editor-quill>
```

### Editor with Dropzone Link
```blade
<x-editor-quill 
    name="dropzone_link_content" 
    dropzone="link"
    label="Dropzone Link Editor">
</x-editor-quill>
```

### Editor with Dropzone Copy Move
```blade
<x-editor-quill 
    name="dropzone_copy_move_content" 
    dropzone="copy move"
    label="Dropzone Copy Move Editor">
</x-editor-quill>
```

### Editor with Dropzone Copy Link
```blade
<x-editor-quill 
    name="dropzone_copy_link_content" 
    dropzone="copy link"
    label="Dropzone Copy Link Editor">
</x-editor-quill>
```

### Editor with Dropzone Move Link
```blade
<x-editor-quill 
    name="dropzone_move_link_content" 
    dropzone="move link"
    label="Dropzone Move Link Editor">
</x-editor-quill>
```

### Editor with Dropzone Copy Move Link
```blade
<x-editor-quill 
    name="dropzone_copy_move_link_content" 
    dropzone="copy move link"
    label="Dropzone Copy Move Link Editor">
</x-editor-quill>
```

## Common Patterns

### Blog Post Editor Interface
```blade
<div class="blog-post-editor-interface">
    <h4>Blog Post Editor</h4>
    <p>Write your blog post content:</p>
    
    <x-editor-quill 
        name="blog_content" 
        title="Blog Content" 
        label="Post Content"
        help="Use the toolbar to format your text. You can add images, videos, and links."
        upload-url="/api/blog/upload"
        folder="blog"
        accept="image/*,video/*">
    </x-editor-quill>
    
    <div class="editor-tips mt-3">
        <h6>Editor Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Text Formatting:</strong><br>
                • Bold, italic, underline<br>
                • Headers and subheaders<br>
                • Lists and indentation<br>
                • Blockquotes and code blocks
            </div>
            <div class="col-md-6">
                <strong>Media Support:</strong><br>
                • Image uploads<br>
                • Video embeds<br>
                • Link management<br>
                • File attachments
            </div>
        </div>
    </div>
</div>
```

### Document Editor Interface
```blade
<div class="document-editor-interface">
    <h4>Document Editor</h4>
    <p>Create and edit your document:</p>
    
    <x-editor-quill 
        name="document_content" 
        title="Document Content" 
        label="Document"
        help="Rich text editor with advanced formatting options and collaboration features."
        upload-url="/api/documents/upload"
        folder="documents"
        accept="image/*,application/pdf">
    </x-editor-quill>
    
    <div class="document-tips mt-3">
        <h6>Document Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Document Features:</strong><br>
                • Rich text formatting<br>
                • Table creation<br>
                • Image insertion<br>
                • Link management
            </div>
            <div class="col-md-6">
                <strong>Collaboration:</strong><br>
                • Real-time editing<br>
                • Comment system<br>
                • Version control<br>
                • Export options
            </div>
        </div>
    </div>
</div>
```

### Email Editor Interface
```blade
<div class="email-editor-interface">
    <h4>Email Editor</h4>
    <p>Compose your email message:</p>
    
    <x-editor-quill 
        name="email_content" 
        title="Email Content" 
        label="Message"
        help="Professional email editor with templates and signature support."
        upload-url="/api/email/upload"
        folder="emails"
        accept="image/*">
    </x-editor-quill>
    
    <div class="email-tips mt-3">
        <h6>Email Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Email Features:</strong><br>
                • Rich text formatting<br>
                • Template selection<br>
                • Signature management<br>
                • Attachment support
            </div>
            <div class="col-md-6">
                <strong>Best Practices:</strong><br>
                • Professional formatting<br>
                • Clear structure<br>
                • Appropriate images<br>
                • Mobile compatibility
            </div>
        </div>
    </div>
</div>
```

### Content Management Interface
```blade
<div class="content-management-interface">
    <h4>Content Management</h4>
    <p>Manage your website content:</p>
    
    <x-editor-quill 
        name="page_content" 
        title="Page Content" 
        label="Page Content"
        help="Advanced content editor with SEO tools and publishing options."
        upload-url="/api/content/upload"
        folder="content"
        accept="image/*,video/*,application/pdf">
    </x-editor-quill>
    
    <div class="content-tips mt-3">
        <h6>Content Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Content Features:</strong><br>
                • Rich text editing<br>
                • Media management<br>
                • SEO optimization<br>
                • Publishing workflow
            </div>
            <div class="col-md-6">
                <strong>Management Tools:</strong><br>
                • Version control<br>
                • Approval process<br>
                • Analytics tracking<br>
                • Performance optimization
            </div>
        </div>
    </div>
</div>
```

### Knowledge Base Editor Interface
```blade
<div class="knowledge-base-editor-interface">
    <h4>Knowledge Base Editor</h4>
    <p>Create knowledge base articles:</p>
    
    <x-editor-quill 
        name="article_content" 
        title="Article Content" 
        label="Article"
        help="Knowledge base editor with structured content and search optimization."
        upload-url="/api/kb/upload"
        folder="knowledge-base"
        accept="image/*,video/*,application/pdf">
    </x-editor-quill>
    
    <div class="kb-tips mt-3">
        <h6>Knowledge Base Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Article Features:</strong><br>
                • Structured content<br>
                • Step-by-step guides<br>
                • Screenshot support<br>
                • Video tutorials
            </div>
            <div class="col-md-6">
                <strong>Organization:</strong><br>
                • Category management<br>
                • Tag system<br>
                • Search optimization<br>
                • User feedback
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_editor_quill_with_basic_attributes()
{
    $view = $this->blade('<x-editor-quill name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('quill-editor');
}

/** @test */
public function it_renders_editor_quill_with_label()
{
    $view = $this->blade('<x-editor-quill name="test" label="Test Editor" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Editor');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(EditorQuillComponent::class)
        ->assertSee('<x-editor-quill')
        ->set('content', '<p>Test content</p>')
        ->assertSee('Test content');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to editor elements
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to editor elements

### Keyboard Navigation
- Tab navigation to editor
- Enter key for line breaks
- Editor navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Editor state feedback
- Help text communication
- Error message communication

### Editor Accessibility
- Clear editor purpose indication
- Proper validation feedback
- Helpful error messages
- Editor guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Quill.js, Alpine.js
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Rich text editing with HTML output

## Troubleshooting

### Common Issues

#### Editor Not Loading
**Problem:** Quill editor not initializing correctly
**Solution:** Check Quill.js library loading and configuration

#### File Upload Issues
**Problem:** File uploads not working
**Solution:** Check upload URL, CSRF token, and folder permissions

#### Content Not Saving
**Problem:** Editor content not being saved
**Solution:** Check Livewire integration and form submission

#### Styling Issues
**Problem:** Editor doesn't look like expected
**Solution:** Check Quill.js CSS and custom styles

#### Toolbar Issues
**Problem:** Toolbar not displaying correctly
**Solution:** Check Quill.js configuration and module loading

## Related Components

- **Editor TinyMCE:** TinyMCE editor component
- **Editor TipTap:** TipTap editor component
- **Editor Lexical:** Lexical editor component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with Quill.js editor functionality
- Base Editor extension with Quill support
- Professional editor styling
- Comprehensive editor integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/editor/quill.blade.php`
2. Update the PHP class: `src/Components/EditorQuill.php`
3. Add/update tests in `tests/Components/EditorQuillTest.php`
4. Update this documentation

## See Also

- [Editor TinyMCE Component](../editor-tinymce.md)
- [Editor TipTap Component](../editor-tiptap.md)
- [Editor Lexical Component](../editor-lexical.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Quill.js Documentation](https://quilljs.com/docs/)
- [Rich Text Editor Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Editor Quill Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
