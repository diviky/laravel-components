# Accordion Component

A collapsible content container that can have multiple expandable items.

## View File

Location: `resources/views/bootstrap-5/accordion/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Unique ID for the accordion | 'faq-accordion' |
| flush | boolean | false | Whether to remove borders and background | true |
| class | string | null | Additional CSS classes | 'mb-4' |

## Usage Example

```blade
<x-accordion id="my-accordion">
    <x-accordion.item>
        <x-accordion.header>First Section</x-accordion.header>
        <x-accordion.content>
            Content for the first section
        </x-accordion.content>
    </x-accordion.item>
    
    <x-accordion.item>
        <x-accordion.header>Second Section</x-accordion.header>
        <x-accordion.content>
            Content for the second section
        </x-accordion.content>
    </x-accordion.item>
</x-accordion>
```

## Notes

The accordion component works together with its child components: `accordion.item`, `accordion.header`, and `accordion.content` to create a fully functional accordion group.
