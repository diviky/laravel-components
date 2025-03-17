# Page Component

A page layout component with structured sections for headers, content, and footers.

## View File

Location: `resources/views/bootstrap-5/page/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Page title | 'Dashboard' |
| subtitle | string | null | Page subtitle | 'Overview of your account' |
| class | string | null | Additional CSS classes | 'admin-page' |
| id | string | null | Page ID | 'dashboard-page' |

## Usage Example

```blade
<x-page title="User Profile" subtitle="Manage your account details">
    <x-page.header>
        <div class="d-flex justify-content-between">
            <h2>Welcome, {{ $user->name }}!</h2>
            <x-button.primary>Edit Profile</x-button.primary>
        </div>
    </x-page.header>
    
    <x-page.body>
        <!-- Page content goes here -->
        <x-card title="Personal Information">
            <!-- Card content -->
        </x-card>
    </x-page.body>
    
    <x-page.footer>
        <p class="text-muted">Last updated: {{ $user->updated_at->format('M d, Y') }}</p>
    </x-page.footer>
</x-page>
```

## Related Components

### Page Header

Location: `resources/views/bootstrap-5/page/header.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Header title | 'Dashboard' |
| subtitle | string | null | Header subtitle | 'Your analytics' |
| class | string | null | Additional CSS classes | 'border-bottom' |

### Page Body

Location: `resources/views/bootstrap-5/page/body.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'py-4' |

### Page Footer

Location: `resources/views/bootstrap-5/page/footer.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'border-top' |

### Page Title

Location: `resources/views/bootstrap-5/page/title.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| subtitle | string | null | Optional subtitle | 'Manage your data' |
| class | string | null | Additional CSS classes | 'display-4' |

### Page Subtitle

Location: `resources/views/bootstrap-5/page/subtitle.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-muted' |
