# Accordion Content Component

Renders the content of an accordion item.

## View File

Location: `resources/views/bootstrap-5/accordion/body.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | ID of the accordion content | 'content-1' |
| show | boolean | false | Whether the content is shown by default | true |
| parent | string | null | ID of the parent accordion | 'accordion-1' |

## Usage Example

```blade
<x-accordion>
    <x-accordion.item>
        <x-accordion.header>Accordion Header</x-accordion.header>
        <x-accordion.content>
            This is the accordion content that will be shown/hidden.
        </x-accordion.content>
    </x-accordion.item>
</x-accordion>
```
