# Steps Component

A component for displaying a multi-step process or workflow.

## View File

Location: `resources/views/bootstrap-5/steps/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| current | integer | 1 | Current active step | 2 |
| total | integer | count of items | Total number of steps | 4 |
| class | string | null | Additional CSS classes | 'my-custom-steps' |
| vertical | boolean | false | Display steps vertically | true |
| numbered | boolean | true | Show step numbers | false |

## Usage Example

```blade
<x-steps current="2">
    <x-steps.item title="Personal Info" complete>
        Enter your personal information
    </x-steps.item>
    
    <x-steps.item title="Address" active>
        Enter your shipping address
    </x-steps.item>
    
    <x-steps.item title="Payment">
        Enter payment details
    </x-steps.item>
    
    <x-steps.item title="Confirmation">
        Confirm your order
    </x-steps.item>
</x-steps>
```

## Related Components

### Steps Item

Location: `resources/views/bootstrap-5/steps/item.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | required | Step title | 'Payment Info' |
| active | boolean | false | Whether step is active | true |
| complete | boolean | false | Whether step is completed | true |
| number | integer | auto | Step number | 2 |
| icon | string | null | Icon to display | 'check' |
| class | string | null | Additional CSS classes | 'highlight' |

### Steps Actions

Location: `resources/views/bootstrap-5/steps/actions.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'justify-content-between' |
| prevText | string | 'Previous' | Text for previous button | 'Back' |
| nextText | string | 'Next' | Text for next button | 'Continue' |
| prevDisabled | boolean | false | Whether previous button is disabled | true |
| nextDisabled | boolean | false | Whether next button is disabled | true |

#### Usage Example

```blade
<x-steps.actions 
    prevText="Back"
    nextText="Continue"
    class="mt-4"
/>
```
