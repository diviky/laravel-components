# Dropdown Component

A toggleable menu that allows the user to choose one value from a predefined list.

## View File

Location: `resources/views/bootstrap-5/dropdown/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Dropdown ID | 'user-menu' |
| label | string | null | Text for dropdown toggle | 'Options' |
| placement | string | 'bottom-start' | Dropdown menu placement | 'bottom-end' |
| button | boolean | true | Whether to use a button style toggle | false |
| split | boolean | false | Whether to use a split button | true |
| color | string | 'primary' | Button color when in button mode | 'secondary' |
| size | string | null | Dropdown toggle size (sm, lg) | 'sm' |
| class | string | null | Additional CSS classes | 'custom-dropdown' |

## Usage Example

```blade
<x-dropdown label="User Menu">
    <x-dropdown.header>User Options</x-dropdown.header>
    <x-dropdown.item href="/profile">Profile</x-dropdown.item>
    <x-dropdown.item href="/settings">Settings</x-dropdown.item>
    <div class="dropdown-divider"></div>
    <x-dropdown.item href="/logout">Logout</x-dropdown.item>
</x-dropdown>
```

## Related Components

### Dropdown Item

Location: `resources/views/bootstrap-5/dropdown/item.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| href | string | '#' | Link URL | '/settings' |
| active | boolean | false | Whether item is active | true |
| disabled | boolean | false | Whether item is disabled | true |
| icon | string | null | Icon to display | 'gear' |
| class | string | null | Additional CSS classes | 'text-danger' |

### Dropdown Header

Location: `resources/views/bootstrap-5/dropdown/header.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'fw-bold' |

### Dropdown Menu

Location: `resources/views/bootstrap-5/dropdown/menu.blade.php`

### Dropdown Toggle

Location: `resources/views/bootstrap-5/dropdown/toggle.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Button label | 'Options' |
| icon | string | null | Icon to display | 'chevron-down' |
| color | string | 'primary' | Button color | 'secondary' |
| size | string | null | Button size (sm, lg) | 'sm' |
