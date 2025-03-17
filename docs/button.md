# Button Components

A collection of button components for various purposes.

## Button Types

### Primary Button

Location: `resources/views/bootstrap-5/button/primary.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| type | string | 'button' | Button type attribute | 'submit' |
| size | string | null | Button size (sm, lg) | 'lg' |
| color | string | 'primary' | Button color variant | 'success' |
| icon | string | null | Icon to display | 'save' |
| disabled | boolean | false | Whether the button is disabled | true |
| class | string | null | Additional CSS classes | 'w-100' |

#### Usage Example

```blade
<x-button.primary type="submit" icon="save">
    Save Changes
</x-button.primary>
```

### Secondary Button

Location: `resources/views/bootstrap-5/button/secondary.blade.php`

#### Arguments & Attributes

Same as Primary Button, but with default color set to 'secondary'.

#### Usage Example

```blade
<x-button.secondary>
    Cancel
</x-button.secondary>
```

### Cancel Button

Location: `resources/views/bootstrap-5/button/cancel.blade.php`

#### Arguments & Attributes

Same as Primary Button, but with default color typically set to 'light' or 'secondary'.

#### Usage Example

```blade
<x-button.cancel>
    Cancel
</x-button.cancel>
```
