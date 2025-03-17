# Modal Component

A dialog box or popup window that appears on top of the current page.

## View File

Location: `resources/views/bootstrap-5/modal/index.blade.php`

## Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Modal ID | 'confirm-dialog' |
| title | string | null | Modal title | 'Confirmation' |
| size | string | null | Modal size (sm, lg, xl) | 'lg' |
| static | boolean | false | Prevent closing when clicking outside | true |
| center | boolean | false | Vertically center the modal | true |
| fullscreen | boolean/string | false | Fullscreen mode (true, sm-down, md-down) | true |
| scrollable | boolean | false | Add a scrollable body | true |
| class | string | null | Additional CSS classes | 'custom-modal' |

## Usage Example

```blade
<x-modal id="example-modal" title="Example Modal" size="lg">
    <x-modal.body>
        <p>Modal content goes here</p>
    </x-modal.body>
    
    <x-modal.footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </x-modal.footer>
</x-modal>

<!-- Button to trigger the modal -->
<x-modal.toggle target="example-modal" class="btn btn-primary">
    Open Modal
</x-modal.toggle>
```

## Related Components

### Modal Header

Location: `resources/views/bootstrap-5/modal/header.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| title | string | null | Modal title text | 'Confirmation Required' |
| dismiss | boolean | true | Include close button | false |
| class | string | null | Additional CSS classes | 'bg-light' |

### Modal Body

Location: `resources/views/bootstrap-5/modal/body.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'p-4' |

### Modal Footer

Location: `resources/views/bootstrap-5/modal/footer.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | 'justify-content-start' |

### Modal Toggle

Location: `resources/views/bootstrap-5/modal/toggle.blade.php`

#### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| target | string | required | ID of the modal to toggle | 'confirm-dialog' |
| color | string | 'primary' | Button color | 'secondary' |
| class | string | null | Additional CSS classes | 'btn-sm' |
