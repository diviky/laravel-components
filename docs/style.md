# Style Component

A component for including CSS styles, either inline or from an external source.

## View File

Location: `resources/views/bootstrap-5/style.blade.php`

## Class File

Location: `src/Components/Style.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| href | string | null | External stylesheet URL | '/css/custom.css' |
| media | string | null | Media query | 'screen and (max-width: 768px)' |
| id | string | null | Style ID | 'theme-styles' |
| nonce | string | null | Content Security Policy nonce | 'abc123' |

## Usage Example

```blade
<!-- Inline styles -->
<x-style>
    .custom-element {
        color: blue;
        padding: 10px;
        margin: 1rem;
    }
    
    .highlight {
        background-color: yellow;
    }
</x-style>

<!-- External stylesheet -->
<x-style href="/css/component-specific.css" />

<!-- Media query styles -->
<x-style media="screen and (max-width: 768px)">
    .container {
        padding: 0.5rem;
    }
</x-style>
```

## Notes

The style component provides a convenient way to include CSS in your Blade templates. It can be used for both inline styles and external stylesheet references.
