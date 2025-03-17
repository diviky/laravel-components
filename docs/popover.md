# Popover Component

A component that displays a small popup with content when triggered.

## View File

Location: `resources/views/bootstrap-5/popover.blade.php`

## Class File

Location: `src/Components/Popover.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Popover title | 'Important Info' |
| content | string | required | Popover content text | 'This is additional information' |
| trigger | string | 'hover' | Trigger type (click, hover, focus) | 'click' |
| placement | string | 'top' | Popover placement (top, right, bottom, left) | 'bottom' |
| html | boolean | false | Whether to allow HTML in content | true |
| class | string | null | Additional CSS classes | 'btn-info' |
| delay | integer/object | 0 | Delay in ms before showing/hiding | 200 |

## Usage Example

```blade
<x-popover 
    title="Help" 
    content="Click this button to submit your form"
    placement="right"
    trigger="click"
    class="btn btn-secondary"
>
    Need Help?
</x-popover>

<x-popover
    content="This field is required"
    placement="top"
>
    <i class="fas fa-info-circle"></i>
</x-popover>
```

## Notes

The popover component wraps its content in a triggering element (usually a button) that reveals the popover when interacted with according to the specified trigger type.
