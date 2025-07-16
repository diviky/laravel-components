# Page Component

A flexible page layout component that provides a structured container with header, body, and footer sections for consistent page layouts.

## View File

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'page-wrapper' | CSS classes for page wrapper | 'custom-page' |
| id | string | null | Page ID attribute | 'main-page' |

## Slot Properties

| Slot | Description | Example |
|------|-------------|---------|
| header | Page header content | `<x-slot:header>Header Content</x-slot:header>` |
| body | Page body content | `<x-slot:body>Body Content</x-slot:body>` |
| footer | Page footer content | `<x-slot:footer>Footer Content</x-slot:footer>` |

## Usage Examples

### Basic Page Layout
```blade
<x-page>
    <x-page.header>
        <h1>Dashboard</h1>
    </x-page.header>
    
    <x-page.body>
        <p>Page content goes here</p>
    </x-page.body>
    
    <x-page.footer>
        <p>&copy; 2024 Company Name</p>
    </x-page.footer>
</x-page>
```

### Page with Slots
```blade
<x-page>
    <x-slot:header>
        <div class="d-flex justify-content-between align-items-center">
            <h1>User Management</h1>
            <button class="btn btn-primary">Add User</button>
        </div>
    </x-slot:header>
    
    <x-slot:body>
        <div class="row">
            <div class="col-12">
                <!-- Content here -->
            </div>
        </div>
    </x-slot:body>
</x-page>
```

### Page without Explicit Sections
```blade
<x-page>
    <div class="container">
        <h1>Simple Page</h1>
        <p>Content directly in page wrapper</p>
    </div>
</x-page>
```

### Custom Page Wrapper
```blade
<x-page class="custom-layout" id="special-page">
    <x-page.header>
        <nav>Navigation</nav>
    </x-page.header>
    
    <x-page.body>
        <main>Main content</main>
    </x-page.body>
</x-page>
```

## Real Project Examples

### From Pulse Dashboard
```blade
<x-page>
    @include('partials.sidebar')
    @include('partials.header')

    <div class="page-wrapper ps-4 pe-4 mt-3">
        <div data-pjax-container class="relative m-1 flex flex-col flex-1">
            <x-page.header>
                <x-page.title>Pulse</x-page.title>
                <x-page.options>
                    <livewire:pulse.period-selector />
                </x-page.options>
            </x-page.header>
            <div class="mx-auto grid default:grid-cols-12 default:gap-6 container">
                <livewire:pulse.servers cols="full" />
                <!-- More components -->
            </div>
        </div>
    </div>
</x-page>
```

## Related Components

### Page Header

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/header.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'bg-light' |
| id | string | null | Header ID | 'page-header' |

#### Usage Examples

```blade
<x-page.header class="border-bottom">
    <h1>Page Title</h1>
</x-page.header>
```

### Page Body

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/body.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'container' |
| id | string | null | Body ID | 'page-body' |

#### Usage Examples

```blade
<x-page.body class="container-fluid">
    <div class="row">
        <div class="col-12">
            Content here
        </div>
    </div>
</x-page.body>
```

### Page Footer

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/footer.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'mt-auto' |
| id | string | null | Footer ID | 'page-footer' |

#### Usage Examples

```blade
<x-page.footer class="bg-light text-center py-3">
    <p class="mb-0">&copy; 2024 Your Company</p>
</x-page.footer>
```

### Page Title

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/title.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-primary' |
| level | string | 'h1' | Heading level | 'h1', 'h2', 'h3' |

#### Usage Examples

```blade
<x-page.title>Dashboard Overview</x-page.title>
<x-page.title level="h2" class="text-muted">Subsection</x-page.title>
```

### Page Subtitle

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/subtitle.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'text-muted' | Additional CSS classes | 'small' |

#### Usage Examples

```blade
<x-page.subtitle>Additional information about this page</x-page.subtitle>
```

### Page Options

Location: `vendor/diviky/laravel-components/resources/views/bootstrap-5/page/options.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'ms-auto' |

#### Usage Examples

```blade
<x-page.options>
    <button class="btn btn-primary">Add New</button>
    <button class="btn btn-secondary">Export</button>
</x-page.options>
```

## Advanced Usage

### Complete Page Layout
```blade
<x-page class="min-vh-100 d-flex flex-column">
    <x-page.header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <x-page.title class="text-white mb-0">Application Name</x-page.title>
            <x-page.options>
                <nav>
                    <a href="#" class="text-white me-3">Home</a>
                    <a href="#" class="text-white">About</a>
                </nav>
            </x-page.options>
        </div>
    </x-page.header>
    
    <x-page.body class="flex-grow-1">
        <div class="container my-4">
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        <h5>Sidebar</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                    <main>
                        <h2>Main Content Area</h2>
                        <p>Page content goes here...</p>
                    </main>
                </div>
            </div>
        </div>
    </x-page.body>
    
    <x-page.footer class="bg-light text-center py-3 mt-auto">
        <div class="container">
            <x-page.subtitle>&copy; 2024 Your Company. All rights reserved.</x-page.subtitle>
        </div>
    </x-page.footer>
</x-page>
```

### Dashboard Layout
```blade
<x-page>
    <x-page.header class="border-bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <x-page.title>Dashboard</x-page.title>
                    <x-page.subtitle>Welcome back, {{ auth()->user()->name }}</x-page.subtitle>
                </div>
                <div class="col-auto">
                    <x-page.options>
                        <button class="btn btn-primary">
                            <i class="icon-plus"></i> Add New
                        </button>
                    </x-page.options>
                </div>
            </div>
        </div>
    </x-page.header>
    
    <x-page.body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Dashboard widgets -->
                    <div class="row">
                        <div class="col-md-3">
                            <x-card title="Users" status="primary">
                                <x-card.body>1,234</x-card.body>
                            </x-card>
                        </div>
                        <!-- More cards -->
                    </div>
                </div>
            </div>
        </div>
    </x-page.body>
</x-page>
```

### Content Management Layout
```blade
<x-page>
    <x-page.header>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <x-page.title>Content Management</x-page.title>
                <x-page.subtitle>Manage your website content</x-page.subtitle>
            </div>
            <x-page.options>
                <div class="btn-group">
                    <button class="btn btn-outline-secondary">Import</button>
                    <button class="btn btn-outline-secondary">Export</button>
                    <button class="btn btn-primary">Create</button>
                </div>
            </x-page.options>
        </div>
    </x-page.header>
    
    <x-page.body>
        <!-- Content table or grid -->
        <x-card>
            <x-card.body>
                <!-- Data table here -->
            </x-card.body>
        </x-card>
    </x-page.body>
</x-page>
```

## Styling Classes

The page component uses these default classes:

- `page-wrapper` - Main page container styling
- Custom classes can be added via the `class` attribute

## Integration with Other Components

### With Navigation
```blade
<x-page>
    @include('partials.navbar')
    
    <x-page.body>
        <!-- Content -->
    </x-page.body>
</x-page>
```

### With Breadcrumbs
```blade
<x-page>
    <x-page.header>
        <x-breadcrumb :items="$breadcrumbs" />
        <x-page.title>{{ $pageTitle }}</x-page.title>
    </x-page.header>
    
    <x-page.body>
        <!-- Content -->
    </x-page.body>
</x-page>
```

## Responsive Design

The page component is fully responsive and works well with Bootstrap's grid system:

```blade
<x-page>
    <x-page.body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <!-- Sidebar for large screens -->
                </div>
                <div class="col-lg-9">
                    <!-- Main content -->
                </div>
            </div>
        </div>
    </x-page.body>
</x-page>
```

## Best Practices

1. **Semantic Structure**: Use page sections semantically (header, main, footer)
2. **Responsive Design**: Ensure proper responsive behavior
3. **Consistent Spacing**: Use consistent padding and margins
4. **Accessibility**: Include proper ARIA roles and landmarks
5. **Performance**: Keep page structure simple and performant
6. **Navigation**: Include clear navigation and breadcrumbs
7. **Content Hierarchy**: Maintain clear visual hierarchy 
