# Modal Component

A flexible dialog component with advanced features including blur effects, multiple sizes, positioning options, and comprehensive Bootstrap integration.

## Overview

**Component Type:** UI  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for modal functionality

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/modal/index.blade.php`
- **Sub-components:** `modal/header.blade.php`, `modal/body.blade.php`, `modal/footer.blade.php`, `modal/title.blade.php`, `modal/toggle.blade.php`
- **Documentation:** `docs/modal.md`
- **Tests:** `tests/Components/ModalTest.php`

## Basic Usage

```blade
<x-modal>
    <x-slot:header>
        <h5>Modal Title</h5>
    </x-slot:header>
    
    <x-slot:body>
        Modal content goes here.
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </x-slot:footer>
</x-modal>
```

## Attributes & Properties

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| show | boolean | false | Show modal immediately | `true` |
| blur | boolean | false | Add blur effect to backdrop | `true` |
| close | boolean | true | Show close button in header | `false` |
| size | string | null | Modal size (sm, lg) | `'lg'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| small | boolean | false | Small modal size | `true` |
| large | boolean | false | Large modal size | `true` |
| center | boolean | false | Center modal vertically | `true` |
| scrollable | boolean | false | Make modal content scrollable | `true` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Modal ID | `'example-modal'` |
| class | string | null | Additional CSS classes | `'custom-modal'` |
| tabindex | string | '-1' | Tab index for focus management | `'0'` |

## Slots

### Named Slots

#### `header`
- **Purpose:** Modal header with title and close button
- **Required:** No
- **Content:** HTML/Components

#### `body`
- **Purpose:** Main modal content area
- **Required:** Recommended
- **Content:** HTML/Components

#### `footer`
- **Purpose:** Modal footer with actions
- **Required:** No
- **Content:** HTML/Components

#### `toggle`
- **Purpose:** Button/element to trigger modal
- **Required:** No
- **Content:** HTML/Components

### Default Slot
- **Purpose:** Additional content between body and footer
- **Content Type:** HTML/Components
- **Required:** No

## Usage Examples

### Basic Modal
```blade
<x-modal>
    <x-slot:header>
        <h5 class="modal-title">Basic Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This is a basic modal with header, body, and footer.</p>
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </x-slot:footer>
</x-modal>
```

### Modal with Toggle Button
```blade
<x-modal>
    <x-slot:toggle>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
    </x-slot:toggle>
    
    <x-slot:header>
        <h5 class="modal-title">Modal with Toggle</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This modal has a toggle button that opens it.</p>
    </x-slot:body>
</x-modal>
```

### Large Modal
```blade
<x-modal large>
    <x-slot:header>
        <h5 class="modal-title">Large Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This is a large modal for more content.</p>
    </x-slot:body>
</x-modal>
```

### Small Modal
```blade
<x-modal small>
    <x-slot:header>
        <h5 class="modal-title">Small Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This is a small modal for quick actions.</p>
    </x-slot:body>
</x-modal>
```

### Centered Modal
```blade
<x-modal center>
    <x-slot:header>
        <h5 class="modal-title">Centered Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This modal is vertically centered.</p>
    </x-slot:body>
</x-modal>
```

### Scrollable Modal
```blade
<x-modal scrollable>
    <x-slot:header>
        <h5 class="modal-title">Scrollable Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <!-- Long content that will scroll -->
        @for ($i = 1; $i <= 50; $i++)
            <p>Content line {{ $i }}</p>
        @endfor
    </x-slot:body>
</x-modal>
```

### Modal with Blur Effect
```blade
<x-modal blur>
    <x-slot:header>
        <h5 class="modal-title">Blur Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This modal has a blur effect on the backdrop.</p>
    </x-slot:body>
</x-modal>
```

### Modal Without Close Button
```blade
<x-modal :close="false">
    <x-slot:header>
        <h5 class="modal-title">No Close Button</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This modal doesn't have a close button in the header.</p>
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
    </x-slot:footer>
</x-modal>
```

### Pre-shown Modal
```blade
<x-modal :show="true">
    <x-slot:header>
        <h5 class="modal-title">Pre-shown Modal</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>This modal is shown immediately when the page loads.</p>
    </x-slot:body>
</x-modal>
```

### Livewire Integration
```blade
<x-modal wire:ignore.self>
    <x-slot:header>
        <h5 class="modal-title">{{ $modalTitle }}</h5>
    </x-slot:header>
    
    <x-slot:body>
        @if($loading)
            <div class="spinner-border" role="status"></div>
        @else
            {{ $modalContent }}
        @endif
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
        <button type="button" class="btn btn-primary" wire:click="saveData">Save</button>
    </x-slot:footer>
</x-modal>
```

## Sub-components

### Modal Header (`<x-modal.header>`)
```blade
<x-modal.header :close="true" class="bg-primary text-white">
    <h5 class="modal-title">Custom Header</h5>
</x-modal.header>
```

### Modal Body (`<x-modal.body>`)
```blade
<x-modal.body class="p-4">
    <!-- Modal content -->
</x-modal.body>
```

### Modal Footer (`<x-modal.footer>`)
```blade
<x-modal.footer class="justify-content-between">
    <button type="button" class="btn btn-secondary">Cancel</button>
    <button type="button" class="btn btn-primary">Save</button>
</x-modal.footer>
```

### Modal Title (`<x-modal.title>`)
```blade
<x-modal.title class="text-primary">
    {{ $title }}
</x-modal.title>
```

### Modal Toggle (`<x-modal.toggle>`)
```blade
<x-modal.toggle>
    <button type="button" class="btn btn-primary">
        Open Modal
    </button>
</x-modal.toggle>
```

## Features

### Size Variants
- **Default:** Standard modal size
- **Small (`small`):** Compact modal for quick actions
- **Large (`large`):** Wide modal for more content

### Positioning Options
- **Default:** Standard positioning
- **Centered (`center`):** Vertically centered modal

### Content Options
- **Default:** Standard content area
- **Scrollable (`scrollable`):** Scrollable content for long content

### Visual Effects
- **Blur (`blur`):** Adds blur effect to backdrop
- **Fade:** Automatic fade animation (when not shown)

### Display Control
- **Show (`show`):** Control initial visibility
- **Close (`close`):** Control close button visibility

## Common Patterns

### Confirmation Modal
```blade
<x-modal id="confirmModal">
    <x-slot:header>
        <h5 class="modal-title">Confirm Action</h5>
    </x-slot:header>
    
    <x-slot:body>
        <p>Are you sure you want to delete this item?</p>
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" wire:click="deleteItem">Delete</button>
    </x-slot:footer>
</x-modal>
```

### Form Modal
```blade
<x-modal large>
    <x-slot:header>
        <h5 class="modal-title">Edit User</h5>
    </x-slot:header>
    
    <x-slot:body>
        <x-form wire:submit.prevent="saveUser">
            <div class="mb-3">
                <x-form-input name="name" label="Name" />
            </div>
            <div class="mb-3">
                <x-form-input name="email" label="Email" type="email" />
            </div>
        </x-form>
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save User</button>
    </x-slot:footer>
</x-modal>
```

### Image Gallery Modal
```blade
<x-modal large center>
    <x-slot:header>
        <h5 class="modal-title">Image Gallery</h5>
    </x-slot:header>
    
    <x-slot:body>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 mb-3">
                    <img src="{{ $image->url }}" class="img-fluid" alt="{{ $image->alt }}">
                </div>
            @endforeach
        </div>
    </x-slot:body>
</x-modal>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'modal' => [
        'view' => 'laravel-components::{framework}.modal.index',
    ],
    'modal.header' => [
        'view' => 'laravel-components::{framework}.modal.header',
    ],
    // ... other modal sub-components
],
```

## JavaScript Integration

### Bootstrap Modal Methods
```javascript
// Show modal
const modal = new bootstrap.Modal(document.getElementById('myModal'));
modal.show();

// Hide modal
modal.hide();

// Toggle modal
modal.toggle();
```

### Event Listeners
```javascript
// Modal shown event
document.getElementById('myModal').addEventListener('shown.bs.modal', function () {
    console.log('Modal is shown');
});

// Modal hidden event
document.getElementById('myModal').addEventListener('hidden.bs.modal', function () {
    console.log('Modal is hidden');
});
```

## Accessibility

### ARIA Attributes
- Proper modal role and attributes
- Focus management
- Keyboard navigation support
- Screen reader compatibility

### Best Practices
- Always provide a way to close the modal
- Use meaningful titles
- Ensure sufficient color contrast
- Test with keyboard navigation

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Bootstrap 5 JavaScript
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Modal Not Opening
**Problem:** Modal doesn't open when toggle button is clicked
**Solution:** Ensure Bootstrap JavaScript is loaded and data-bs-toggle/data-bs-target attributes are correct

#### Modal Not Centering
**Problem:** Modal doesn't center vertically
**Solution:** Add `center` attribute to the modal component

#### Content Not Scrolling
**Problem:** Long content overflows modal
**Solution:** Add `scrollable` attribute to enable scrolling

#### Close Button Not Working
**Problem:** Close button doesn't dismiss modal
**Solution:** Ensure `data-bs-dismiss="modal"` attribute is present

## Related Components

- **Card:** Often used within modal bodies
- **Form:** Frequently used in modal forms
- **Button:** Used for modal triggers and actions
- **Alert:** For displaying messages in modals

## Performance Considerations

- Use `wire:ignore.self` for Livewire modals to prevent unnecessary re-renders
- Consider lazy loading for modal content
- Optimize images and content within modals

## Examples Gallery

### User Profile Modal
```blade
<x-modal large>
    <x-slot:header>
        <h5 class="modal-title">User Profile</h5>
    </x-slot:header>
    
    <x-slot:body>
        <div class="row">
            <div class="col-md-4 text-center">
                <x-avatar image="/users/john.jpg" size="xl" class="mb-3" />
                <h4>John Doe</h4>
                <p class="text-muted">Software Developer</p>
            </div>
            <div class="col-md-8">
                <h6>Contact Information</h6>
                <p><strong>Email:</strong> john@example.com</p>
                <p><strong>Phone:</strong> +1 234 567 8900</p>
                
                <h6>Skills</h6>
                <div class="d-flex gap-2">
                    <x-badge color="primary">PHP</x-badge>
                    <x-badge color="secondary">Laravel</x-badge>
                    <x-badge color="success">JavaScript</x-badge>
                </div>
            </div>
        </div>
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Edit Profile</button>
    </x-slot:footer>
</x-modal>
```

### Settings Modal
```blade
<x-modal scrollable>
    <x-slot:header>
        <h5 class="modal-title">Application Settings</h5>
    </x-slot:header>
    
    <x-slot:body>
        <x-form wire:submit.prevent="saveSettings">
            <div class="mb-3">
                <x-form-switch name="notifications" label="Enable Notifications" />
            </div>
            <div class="mb-3">
                <x-form-switch name="dark_mode" label="Dark Mode" />
            </div>
            <div class="mb-3">
                <x-form-select name="language" label="Language" :options="['English', 'Spanish', 'French']" />
            </div>
            <div class="mb-3">
                <x-form-input name="timezone" label="Timezone" />
            </div>
        </x-form>
    </x-slot:body>
    
    <x-slot:footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </x-slot:footer>
</x-modal>
```

## Changelog

### Version 2.0.0
- Added blur effect support
- Enhanced size variants (small, large)
- Improved positioning options (center)
- Added scrollable content support
- Enhanced accessibility features

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/modal/index.blade.php`
2. Update sub-component views in `resources/views/bootstrap-5/modal/`
3. Add/update tests in `tests/Components/ModalTest.php`
4. Update this documentation
