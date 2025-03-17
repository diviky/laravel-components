# Editor Components

Rich text editor components for different use cases.

## Common Editor Attributes

Most editor components accept these common attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | required | Input name attribute | 'content' |
| id | string | same as name | Input ID attribute | 'article-content' |
| value | string | null | Editor content | '<p>Initial content</p>' |
| label | string | null | Input label text | 'Article Content' |
| placeholder | string | null | Placeholder text | 'Enter content here...' |
| readonly | boolean | false | Whether editor is readonly | true |
| disabled | boolean | false | Whether editor is disabled | true |
| height | string/integer | null | Editor height | '300px' or 300 |
| toolbar | string/array | default set | Toolbar configuration | ['bold', 'italic', 'link'] |
| class | string | null | Additional CSS classes | 'editor-lg' |

## TinyMCE Editor

Location: `resources/views/bootstrap-5/editor/tinymce.blade.php`
Class: `src/Components/FormEditor.php`

A full-featured WYSIWYG editor using TinyMCE.

### Additional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| plugins | array | defaults | TinyMCE plugins to enable | ['code', 'table'] |
| skin | string | null | TinyMCE skin | 'oxide-dark' |
| toolbar | string | default set | Toolbar configuration | 'bold italic | link image' |
| menubar | boolean | false | Show menu bar | true |
| inline | boolean | false | Use inline mode | true |

### Usage Example

```blade
<x-form-editor
    name="content"
    label="Article Content"
    value="<p>Initial content</p>"
    height="400"
/>

<x-form-editor
    name="description"
    toolbar="bold italic link | bullist numlist"
    plugins="['lists']"
    menubar="false"
/>
```

## Markdown Editor (EasyMDE)

Location: `resources/views/bootstrap-5/editor/easymde.blade.php`
Class: `src/Components/FormMarkdown.php`

A Markdown editor using EasyMDE.

### Additional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| autosave | boolean | false | Enable autosave | true |
| spellcheck | boolean | false | Enable spell checking | true |
| toolbar | array | default set | Toolbar buttons | ['bold', 'italic', 'heading'] |
| preview | boolean | true | Show preview button | false |

### Usage Example

```blade
<x-form-markdown
    name="content"
    label="Article Content"
    value="# Heading\n\nThis is a paragraph."
    autosave
/>
```

## Quill Editor

Location: `resources/views/bootstrap-5/editor/quill.blade.php`
Class: `src/Components/EditorQuill.php`

A rich text editor using Quill.

### Additional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| theme | string | 'snow' | Quill theme (snow, bubble) | 'bubble' |
| modules | array | defaults | Quill modules configuration | ['syntax' => true] |
| formats | array | defaults | Allowed formats | ['header', 'bold', 'link'] |
| toolbar | array | default set | Toolbar configuration | [['bold', 'italic'], ['link']] |

### Usage Example

```blade
<x-editor.quill
    name="content"
    label="Article Content"
    theme="snow"
    :toolbar="[
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [['header' => 1], ['header' => 2]],
        [['list' => 'ordered'], ['list' => 'bullet']],
        ['link', 'image'],
        ['clean']
    ]"
/>
```

## Notes on Editor Integration

For all editors, you may need to ensure the necessary JavaScript libraries are included in your layout. The Laravel Components package typically includes the required assets, but you may need to publish them or include them from CDNs depending on your setup.
