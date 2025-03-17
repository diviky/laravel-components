# Filter Components

Components for filtering data in tables and lists.

## Filter Dates Component

Location: `resources/views/bootstrap-5/filters/dates.blade.php`
Class: `src/Components/FilterDates.php`

A component for selecting date ranges to filter content.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | 'dates' | Name for the form input | 'date_range' |
| label | string | 'Date Range' | Label text | 'Filter by Date' |
| ranges | array | predefined | Available date ranges | ['Today', 'Yesterday', 'Last 7 Days'] |
| startDate | string | null | Initial start date | '2023-01-01' |
| endDate | string | null | Initial end date | '2023-01-31' |
| format | string | 'Y-m-d' | Date format | 'M d, Y' |
| class | string | null | Additional CSS classes | 'custom-filter' |

### Usage Example

```blade
<x-filter-dates 
    name="report_dates"
    label="Report Period"
/>
```

## Filter Search Component

Location: `resources/views/bootstrap-5/filters/search.blade.php`
Class: `src/Components/FilterSearch.php`

A search input component for filtering data.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | 'search' | Name for the search input | 'query' |
| placeholder | string | 'Search...' | Placeholder text | 'Search products...' |
| value | string | null | Initial search value | 'laptop' |
| button | boolean | true | Show search button | false |
| buttonText | string | 'Search' | Text for search button | 'Find' |
| class | string | null | Additional CSS classes | 'border-primary' |
| containerClass | string | null | Classes for the container | 'mb-3' |

### Usage Example

```blade
<x-filter-search 
    name="product_search" 
    placeholder="Search products..."
/>

<x-filter-search 
    name="user_search"
    placeholder="Find users..." 
    buttonText="Find"
    :button="false"
/>
```
