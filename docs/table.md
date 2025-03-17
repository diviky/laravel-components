# Table Component

A versatile table component for displaying tabular data.

## View File

Location: `resources/views/bootstrap-5/table/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| striped | boolean | false | Apply striped rows | true |
| hover | boolean | false | Add hover effect | true |
| bordered | boolean | false | Add borders | true |
| small | boolean | false | Make table more compact | true |
| responsive | boolean | false | Make table responsive | true |
| caption | string | null | Table caption | 'List of Users' |
| class | string | null | Additional CSS classes | 'custom-table' |
| id | string | null | Table ID | 'users-table' |

## Usage Example

```blade
<x-table striped hover responsive>
    <x-table.header>
        <tr>
            <x-table.heading>Name</x-table.heading>
            <x-table.heading>Email</x-table.heading>
            <x-table.heading>Role</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </tr>
    </x-table.header>
    
    <x-table.body>
        @foreach($users as $user)
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>{{ $user->role }}</x-table.cell>
                <x-table.cell>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">Edit</a>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table.body>
</x-table>
```

## Related Components

### Table Header

Location: `resources/views/bootstrap-5/table/header.blade.php`

### Table Body

Location: `resources/views/bootstrap-5/table/body.blade.php`

### Table Footer

Location: `resources/views/bootstrap-5/table/footer.blade.php`

### Table Row

Location: `resources/views/bootstrap-5/table/row.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'bg-light' |
| id | string | null | Row ID | 'row-1' |

### Table Cell

Location: `resources/views/bootstrap-5/table/cell.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-center' |
| colspan | integer | null | Number of columns to span | 2 |
| rowspan | integer | null | Number of rows to span | 2 |

### Table Heading

Location: `resources/views/bootstrap-5/table/heading.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'text-uppercase' |
| scope | string | 'col' | Scope attribute (col, row) | 'row' |
| sortable | boolean | false | Make column sortable | true |
| sort | string | null | Current sort direction (asc, desc) | 'asc' |
