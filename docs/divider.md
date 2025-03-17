# Divider Component

A horizontal line that separates content with an optional label.

## View File

Location: `resources/views/bootstrap-5/divider.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Optional text to display in the divider | 'OR' |
| position | string | 'center' | Position of the label (start, center, end) | 'start' |
| class | string | null | Additional CSS classes | 'my-5' |
| labelClass | string | null | Classes for the label | 'text-muted' |

## Usage Example

```blade
<!-- Simple divider -->
<x-divider class="my-4" />

<!-- Divider with centered text -->
<x-divider label="OR" />

<!-- Divider with positioned text -->
<x-divider label="CONTINUE" position="end" labelClass="text-primary" />
```
