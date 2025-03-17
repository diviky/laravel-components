# Counter Component

A numerical counter display component that can show values with animations.

## View File

Location: `resources/views/bootstrap-5/counter.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | number | 0 | The value to display | 1250 |
| prefix | string | null | Text to display before the value | '$' |
| suffix | string | null | Text to display after the value | 'users' |
| decimals | integer | 0 | Number of decimal places to show | 2 |
| duration | integer | 1000 | Animation duration in milliseconds | 2000 |
| separator | string | ',' | Thousands separator | ' ' |
| class | string | null | Additional CSS classes | 'text-primary' |

## Usage Example

```blade
<x-counter value="1500" suffix="+" class="h2" />

<x-counter value="19.99" prefix="$" decimals="2" />

<x-counter value="1000000" duration="2500" />
```
