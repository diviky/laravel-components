# Alert Component

Displays alert messages to users with different styles based on context.

## View File

Location: `resources/views/bootstrap-5/alert/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'info' | Alert type (info, success, warning, danger, error) | 'success' |
| dismissible | boolean | false | Whether the alert can be dismissed | true |
| icon | string | null | Icon to display with the alert | 'check-circle' |
| title | string | null | Optional title for the alert | 'Success!' |

## Usage Example

```blade
<x-alert type="success" dismissible>
    Your changes have been saved successfully.
</x-alert>

<x-alert type="danger" title="Error Occurred">
    Unable to process your request. Please try again.
</x-alert>
```

## Alert Variants

The alert component has several pre-configured variants:

- `<x-alert.success>` - For success messages
- `<x-alert.danger>` - For danger/error messages
- `<x-alert.error>` - Alternative for danger messages
- `<x-alert.warning>` - For warning messages
- `<x-alert.info>` - For informational messages
- `<x-alert.help>` - For help/guidance messages

Each variant automatically sets the appropriate type but accepts all other attributes.
