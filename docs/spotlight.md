# Spotlight Component

A searchable command palette/spotlight search interface similar to macOS Spotlight or command+k interfaces.

## View File

Location: `resources/views/bootstrap-5/spotlight.blade.php`

## Class File

Location: `src/Components/Spotlight.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| placeholder | string | 'Search...' | Placeholder text for search input | 'Type a command or search...' |
| shortcut | string | 'k' | Keyboard shortcut key | '/' |
| endpoint | string | null | API endpoint for search results | '/api/spotlight' |
| items | array | [] | Static items for the spotlight | [['title' => 'Dashboard', 'url' => '/dashboard']] |
| maxResults | integer | 10 | Maximum number of results to show | 5 |
| minChars | integer | 2 | Minimum characters before searching | 3 |
| autofocus | boolean | false | Whether to autofocus the search input | true |
| class | string | null | Additional CSS classes | 'custom-spotlight' |

## Usage Example

```blade
<!-- Basic spotlight with static items -->
<x-spotlight :items="[
    ['title' => 'Dashboard', 'url' => '/dashboard', 'icon' => 'house'],
    ['title' => 'Profile', 'url' => '/profile', 'icon' => 'user'],
    ['title' => 'Settings', 'url' => '/settings', 'icon' => 'gear'],
    ['title' => 'Logout', 'url' => '/logout', 'icon' => 'power'],
]" />

<!-- Spotlight with API endpoint -->
<x-spotlight 
    endpoint="/api/search" 
    placeholder="Search anything..." 
    shortcut="/"
/>
```

## JSON Response Format

When using an API endpoint, the expected response format is:

```json
{
    "results": [
        {
            "title": "Dashboard",
            "url": "/dashboard", 
            "icon": "house",
            "description": "Go to dashboard" 
        },
        {
            "title": "User Profile", 
            "url": "/profile",
            "icon": "user",
            "description": "View your profile"
        }
    ]
}
```
