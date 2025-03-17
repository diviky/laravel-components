# Tab Component

A component for creating tabbed interfaces with multiple content panes.

## View File

Location: `resources/views/bootstrap-5/tabs/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Tab container ID | 'profile-tabs' |
| pills | boolean | false | Use pills style for tabs | true |
| vertical | boolean | false | Display tabs vertically | true |
| fill | boolean | false | Make tabs fill available width | true |
| justified | boolean | false | Make tabs equal width | true |
| class | string | null | Additional CSS classes | 'custom-tabs' |

## Usage Example

```blade
<x-tab id="content-tabs">
    <x-tab.item id="home" active>
        Home
    </x-tab.item>
    <x-tab.item id="profile">
        Profile
    </x-tab.item>
    <x-tab.item id="messages">
        Messages
    </x-tab.item>
    
    <x-tab.content>
        <x-tab.pane id="home" active>
            <p>Home tab content</p>
        </x-tab.pane>
        
        <x-tab.pane id="profile">
            <p>Profile tab content</p>
        </x-tab.pane>
        
        <x-tab.pane id="messages">
            <p>Messages tab content</p>
        </x-tab.pane>
    </x-tab.content>
</x-tab>
```

## Related Components

### Tab Item

Location: `resources/views/bootstrap-5/tabs/item.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | required | Tab ID (must match pane ID) | 'home-tab' |
| active | boolean | false | Whether tab is active by default | true |
| disabled | boolean | false | Whether tab is disabled | true |
| icon | string | null | Icon to display | 'house' |
| class | string | null | Additional CSS classes | 'text-uppercase' |

### Tab Content

Location: `resources/views/bootstrap-5/tabs/content.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'p-3' |

### Tab Pane

Location: `resources/views/bootstrap-5/tabs/pane.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | required | Pane ID (must match tab ID) | 'home-tab' |
| active | boolean | false | Whether pane is active by default | true |
| class | string | null | Additional CSS classes | 'p-4' |
