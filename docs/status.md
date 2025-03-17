# Status Component

A component for displaying status information with appropriate styling.

## View File

Location: `resources/views/bootstrap-5/status.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'success' | Status type (success, warning, danger, info, etc.) | 'danger' |
| icon | string | null | Icon to display | 'check-circle' |
| size | string | null | Status indicator size (sm, md, lg) | 'sm' |
| class | string | null | Additional CSS classes | 'border' |
| pill | boolean | false | Whether to display as a pill | true |
| animated | boolean | false | Whether to animate the status | true |

## Usage Example

```blade
<!-- Simple status -->
<x-status type="success">Active</x-status>

<!-- Status with icon -->
<x-status type="danger" icon="exclamation-circle">Failed</x-status>

<!-- Status pill -->
<x-status type="warning" pill>Pending</x-status>

<!-- Status with animation -->
<x-status type="info" animated>Processing</x-status>
```

## Status Types

Common status types include:

- `success`: For positive statuses like "Completed" or "Active"
- `warning`: For cautionary statuses like "Pending" or "On hold"
- `danger`: For negative statuses like "Failed" or "Error"
- `info`: For neutral statuses like "Processing" or "In progress"
- `secondary`: For disabled or inactive statuses
- `primary`: For default or primary statuses
