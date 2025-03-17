# Accordion Item Component

Represents a single item in an accordion group with a header and collapsible content.

## View File

Location: `resources/views/bootstrap-5/accordion/item.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | Unique ID for the accordion item | 'item-1' |
| show | boolean | false | Whether this item is expanded by default | true |
| class | string | null | Additional CSS classes | 'my-custom-class' |

## Usage Example

```blade
<x-accordion>
    <x-accordion.item id="item1" show>
        <x-accordion.header>First Item</x-accordion.header>
        <x-accordion.content>
            Content for the first accordion item
        </x-accordion.content>
    </x-accordion.item>
    
    <x-accordion.item id="item2">
        <x-accordion.header>Second Item</x-accordion.header>
        <x-accordion.content>
            Content for the second accordion item
        </x-accordion.content>
    </x-accordion.item>
</x-accordion>
```
