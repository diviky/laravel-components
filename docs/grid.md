# Grid Component

A layout component for creating responsive grid systems.

## View File

Location: `resources/views/bootstrap-5/grid/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| columns | integer/string | 12 | Number of grid columns or sizes | 3 |
| gap | integer/string | null | Gap size between items | 4 |
| class | string | null | Additional CSS classes | 'my-grid' |
| itemClass | string | null | Classes applied to each grid item | 'bg-light' |

## Usage Example

```blade
<x-grid columns="3" gap="4">
    <x-grid.item>
        <x-card title="First Card">
            Card content here
        </x-card>
    </x-grid.item>
    
    <x-grid.item>
        <x-card title="Second Card">
            Card content here
        </x-card>
    </x-grid.item>
    
    <x-grid.item>
        <x-card title="Third Card">
            Card content here
        </x-card>
    </x-grid.item>
</x-grid>
```

## Related Components

### Grid Item

Location: `resources/views/bootstrap-5/grid/item.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| cols | integer/string | null | Columns this item should span | 2 |
| class | string | null | Additional CSS classes | 'highlight' |

### Grid Title

Location: `resources/views/bootstrap-5/grid/title.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| subtitle | string | null | Optional subtitle | 'Featured items' |
| class | string | null | Additional CSS classes | 'fw-bold' |

### Grid Content

Location: `resources/views/bootstrap-5/grid/content.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'p-3' |

## Responsive Grid Example

```blade
<!-- Responsive grid with different column counts per breakpoint -->
<x-grid columns="1 md:2 lg:3" gap="3">
    @foreach($items as $item)
        <x-grid.item>
            <!-- Item content -->
        </x-grid.item>
    @endforeach
</x-grid>
```
