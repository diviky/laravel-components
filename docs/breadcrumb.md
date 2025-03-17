# Breadcrumb Component

Displays a navigation hierarchy as a trail of links.

## View File

Location: `resources/views/bootstrap-5/breadcrumb/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'custom-breadcrumb' |

## Usage Example

```blade
<x-breadcrumb>
    <x-breadcrumb.item href="/">Home</x-breadcrumb.item>
    <x-breadcrumb.item href="/products">Products</x-breadcrumb.item>
    <x-breadcrumb.item active>Category</x-breadcrumb.item>
</x-breadcrumb>
```

## Related Components

### Breadcrumb Item

Location: `resources/views/bootstrap-5/breadcrumb/item.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| href | string | null | URL for the breadcrumb link | '/products' |
| active | boolean | false | Whether this is the active/current item | true |
