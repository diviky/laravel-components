# Fragment Component

A utility component for loading content asynchronously via AJAX/fetch.

## View File

Location: `resources/views/bootstrap-5/fragment.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| url | string | required | URL to fetch content from | '/api/notifications' |
| method | string | 'GET' | HTTP method to use | 'POST' |
| trigger | string | 'load' | When to load (load, click, hover) | 'click' |
| target | string | null | Target element selector to update | '#content-area' |
| swap | string | 'innerHTML' | How to update the target (innerHTML, outerHTML, beforebegin, etc.) | 'afterend' |
| lazy | boolean | false | Defer loading until visible | true |
| placeholder | string | null | Content to show while loading | 'Loading...' |
| class | string | null | Additional CSS classes | 'ajax-fragment' |
| id | string | null | Element ID | 'notifications-fragment' |
| interval | integer | null | Auto-refresh interval in ms | 5000 |
| headers | array | [] | Additional HTTP headers | ['X-Custom-Header' => 'value'] |
| data | array | [] | Data to send with request | ['type' => 'notification'] |

## Usage Example

```blade
<!-- Load content on page load -->
<x-fragment url="/api/dashboard/stats">
    <div class="placeholder-glow">
        <div class="placeholder col-12 h-100"></div>
    </div>
</x-fragment>

<!-- Load content when clicked -->
<x-fragment 
    url="/api/notifications" 
    trigger="click" 
    class="btn btn-primary"
>
    Load Notifications
</x-fragment>

<!-- Auto-refreshing content -->
<x-fragment 
    url="/api/live-stats" 
    interval="5000"
    id="live-stats"
>
    <p>Loading stats...</p>
</x-fragment>
```

## Notes

The fragment component is useful for:
- Lazy loading content
- Creating click-to-load functionality
- Implementing auto-refreshing sections of a page
- Reducing initial page load time by deferring non-essential content
