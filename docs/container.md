# Container Component

A responsive container element that provides consistent padding and centering.

## View File

Location: `resources/views/bootstrap-5/container.blade.php`

## Class File

Location: `src/Components/Container.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| fluid | boolean | false | Whether the container is fluid (full-width) | true |
| size | string | null | Container size (sm, md, lg, xl) | 'lg' |
| class | string | null | Additional CSS classes | 'my-5' |
| id | string | null | Container ID | 'main-container' |

## Usage Example

```blade
<x-container>
    <h1>Regular container</h1>
    <p>Content with default margins</p>
</x-container>

<x-container fluid>
    <h1>Fluid container</h1>
    <p>Full-width container with padding</p>
</x-container>

<x-container size="lg">
    <h1>Large container</h1>
    <p>Fixed width container with responsive behavior</p>
</x-container>
```

## Notes

The container component provides consistent layout wrapping for your content. Use the fluid attribute for full-width containers that still maintain horizontal padding.
