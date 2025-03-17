# Card Component

A flexible container component with multiple sections and styling options.

## View File

Location: `resources/views/bootstrap-5/card/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Card title | 'User Profile' |
| subtitle | string | null | Card subtitle | 'Personal Information' |
| class | string | null | Additional CSS classes | 'shadow' |
| id | string | null | Card ID | 'profile-card' |
| border | string | null | Border color | 'primary' |
| background | string | null | Background color | 'light' |

## Usage Example

```blade
<x-card title="User Settings" id="settings-card">
    <x-card.body>
        Card content goes here
    </x-card.body>
    <x-card.footer>
        <button class="btn btn-primary">Save</button>
    </x-card.footer>
</x-card>
```

## Related Components

### Card Header

Location: `resources/views/bootstrap-5/card/header.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Header title | 'Settings' |
| subtitle | string | null | Header subtitle | 'Configure your preferences' |
| class | string | null | Additional CSS classes | 'bg-light' |

### Card Body

Location: `resources/views/bootstrap-5/card/body.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'p-4' |

### Card Footer

Location: `resources/views/bootstrap-5/card/footer.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-end' |

### Card Title

Location: `resources/views/bootstrap-5/card/title.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| subtitle | string | null | Optional subtitle | 'Additional information' |
| class | string | null | Additional CSS classes | 'fw-bold' |
