# Accordion Header Component

Renders the header/title part of an accordion item that can be clicked to expand/collapse the content.

## View File

Location: `resources/views/bootstrap-5/accordion/header.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | ID of the header button | 'header-1' |
| target | string | null | ID of the content to control | 'content-1' |
| expanded | boolean | false | Whether the accordion is expanded by default | true |
| parent | string | null | ID of the parent accordion | 'accordion-1' |

## Usage Example

```blade
<x-accordion>
    <x-accordion.item>
        <x-accordion.header>
            Click to expand
        </x-accordion.header>
        <x-accordion.content>
            Content here
        </x-accordion.content>
    </x-accordion.item>
</x-accordion>
```
