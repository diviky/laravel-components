# Avatar Component

Displays a user avatar image with fallback to initials when no image is available.

## View File

Location: `resources/views/bootstrap-5/avatar.blade.php`

## Class File

Location: `src/Components/Avatar.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| src | string | null | URL to the avatar image | '/images/avatar.jpg' |
| alt | string | 'Avatar' | Alt text for the image | 'John Doe' |
| size | string | 'md' | Avatar size (xs, sm, md, lg, xl) | 'lg' |
| name | string | null | User name (for generating initials) | 'John Doe' |
| shape | string | 'circle' | Shape of avatar (circle, square) | 'square' |
| class | string | null | Additional CSS classes | 'border' |
| status | string | null | User status (online, offline, away) | 'online' |

## Usage Example

```blade
<!-- With image -->
<x-avatar src="/images/user.jpg" alt="John Doe" size="lg" />

<!-- With initials -->
<x-avatar name="John Doe" size="md" status="online" />
```

## Notes

The component automatically generates initials from the provided name when no image source is available. It also supports showing a status indicator when the status attribute is provided.
