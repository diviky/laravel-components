# Nav Component

A component for creating navigation menus and tabs.

## View File

Location: `resources/views/bootstrap-5/nav/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| pills | boolean | false | Use pill style for nav items | true |
| tabs | boolean | false | Use tabs style for nav items | true |
| vertical | boolean | false | Display nav vertically | true |
| fill | boolean | false | Make nav items fill available width | true |
| justified | boolean | false | Make nav items equal width | true |
| class | string | null | Additional CSS classes | 'bg-light' |

## Usage Example

```blade
<x-nav pills>
    <x-nav-item href="/dashboard" active>Dashboard</x-nav-item>
    <x-nav-item href="/profile">Profile</x-nav-item>
    <x-nav-item href="/settings">Settings</x-nav-item>
    <x-nav-item href="/logout">Logout</x-nav-item>
</x-nav>
```

## Nav Item Component

Location: `resources/views/bootstrap-5/nav/item.blade.php`
Class: `src/Components/NavItem.php`

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| href | string | '#' | URL for the nav item | '/profile' |
| active | boolean | auto | Whether item is active | true |
| disabled | boolean | false | Whether item is disabled | true |
| icon | string | null | Icon to display | 'user' |
| class | string | null | Additional CSS classes | 'fw-bold' |

### Usage Example with Icons

```blade
<x-nav>
    <x-nav-item href="/dashboard" icon="dashboard">
        Dashboard
    </x-nav-item>
    <x-nav-item href="/profile" icon="user">
        Profile
    </x-nav-item>
    <x-nav-item href="/settings" icon="gear" disabled>
        Settings
    </x-nav-item>
</x-nav>
```
