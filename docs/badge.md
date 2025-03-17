# Badge Component

Displays a small count, label, or status indicator.

## View File

Location: `resources/views/bootstrap-5/badge.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'primary' | Badge type/color | 'success' |
| pill | boolean | false | Whether to display as a rounded pill | true |
| class | string | null | Additional CSS classes | 'text-uppercase' |
| size | string | null | Badge size (sm, md, lg) | 'sm' |

## Usage Example

```blade
<x-badge>Default</x-badge>

<x-badge type="success">Success</x-badge>

<x-badge type="danger" pill>42</x-badge>

<span>Messages <x-badge type="info">New</x-badge></span>
```

## Available Types

- primary (default)
- secondary
- success
- danger
- warning
- info
- light
- dark
