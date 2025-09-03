# View Tel Component

A sophisticated and feature-rich telephone display component that provides enhanced phone number rendering with optional icons, labels, copy-to-clipboard functionality, and intelligent telephone linking with click-to-call capabilities. This component offers professional telephone display with enhanced user experience and interactive calling functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, telephone validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/tel.blade.php`
- **Tests:** `tests/Components/ViewTelTest.php` (to be created)
- **Documentation:** `docs/view-tel.md`

## Basic Usage

### Simple Telephone Display
```blade
<x-view-tel value="+1-555-123-4567" />
```

### With Label
```blade
<x-view-tel value="+1-555-123-4567" label="Phone: " />
```

### With Icon
```blade
<x-view-tel value="+1-555-123-4567" icon="phone" />
```

### With Copy Functionality
```blade
<x-view-tel value="+1-555-123-4567" copy />
```

### With Telephone Linking Disabled
```blade
<x-view-tel value="+1-555-123-4567" linked />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | string | Telephone number to display | `'+1-555-123-4567'`, `'555-123-4567'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the telephone | `'phone'`, `'phone-call'`, `'telephone'`, `'call'` |
| label | string | null | Label text to display before the telephone | `'Phone: '`, `'Call: '`, `'Contact: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| linked | boolean | false | Enable telephone linking (tel: links) | `true` |
| settings | array | [] | Additional settings for customization | `['validate' => true]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'tel-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="tel-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Telephone Display
**Usage:** `<x-view-tel value="+1-555-123-4567">` (default)
**Description:** Basic telephone display with automatic tel: linking
**Features:**
- Automatic telephone linking
- Click-to-call functionality
- Clean, minimal styling
- Professional appearance

### Labeled Telephone Display
**Usage:** `<x-view-tel value="+1-555-123-4567" label="Phone: ">`
**Description:** Telephone display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon Telephone Display
**Usage:** `<x-view-tel value="+1-555-123-4567" icon="phone">`
**Description:** Telephone display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Telephone Display
**Usage:** `<x-view-tel value="+1-555-123-4567" copy>`
**Description:** Telephone display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Linked Telephone Display
**Usage:** `<x-view-tel value="+1-555-123-4567" linked>`
**Description:** Telephone display with click-to-call links
**Features:**
- Telephone linking
- Interactive features
- User convenience
- Professional styling

## Telephone Functionality

### Telephone Linking
The component automatically creates `tel:` links for telephone numbers, allowing users to:
- Click to initiate phone calls
- Pre-fill the dialer
- Access calling functionality directly
- Improve mobile user experience

### Telephone Validation
The component includes built-in telephone validation to ensure:
- Proper telephone format
- Valid telephone structure
- Professional appearance
- User experience consistency

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy telephone numbers to clipboard
- Paste into other applications
- Share telephone numbers easily
- Improve workflow efficiency

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Telephone content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-tel value="+1-555-123-4567">
    Additional Content
</x-view-tel>
```

## Usage Examples

### Basic Telephone Display
```blade
<x-view-tel value="+1-555-123-4567" />
```

### Telephone with Label
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    label="Phone: " />
```

### Telephone with Icon
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    icon="phone" />
```

### Telephone with Copy Functionality
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    copy />
```

### Telephone with Linking Disabled
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    linked />
```

### Telephone with Custom Classes
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    class="text-primary fw-bold" />
```

### Telephone with Custom ID
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    id="custom-tel-id" />
```

### Telephone with Data Attributes
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    data-test="tel-component"
    data-type="display-tel" />
```

### Telephone with Aria Attributes
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    aria-label="Telephone display"
    aria-describedby="tel-description" />
```

### Telephone with Role Attribute
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    role="text" />
```

### Telephone with Tabindex
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    tabindex="0" />
```

### Telephone with Form Attribute
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    form="my-form" />
```

### Telephone with Autocomplete
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    autocomplete="off" />
```

### Telephone with Novalidate
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    novalidate />
```

### Telephone with Accept
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    accept="tel/*" />
```

### Telephone with Capture
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    capture="environment" />
```

### Telephone with Max
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    max="100" />
```

### Telephone with Min
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    min="5" />
```

### Telephone with Step
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    step="1" />
```

### Telephone with Pattern
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    pattern="[\+]?[0-9\s\-\(\)]+" />
```

### Telephone with Spellcheck
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    spellcheck="false" />
```

### Telephone with Translate
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    translate="no" />
```

### Telephone with Contenteditable
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    contenteditable="true" />
```

### Telephone with Contextmenu
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    contextmenu="tel-menu" />
```

### Telephone with Dir
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    dir="rtl" />
```

### Telephone with Draggable
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    draggable="true" />
```

### Telephone with Dropzone
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    dropzone="copy" />
```

### Telephone with Hidden
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    hidden />
```

### Telephone with Lang
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    lang="en" />
```

### Telephone with Settings Array
```blade
<x-view-tel 
    value="+1-555-123-4567" 
    :settings="['validate' => true]" />
```

## Common Patterns

### Contact Information Interface
```blade
<div class="contact-information-interface">
    <h4>Contact Details</h4>
    
    <x-view-tel 
        value="{{ $contact->primary_phone }}" 
        icon="phone" 
        label="Primary Phone: "
        class="text-primary" />
    
    <x-view-tel 
        value="{{ $contact->mobile_phone }}" 
        icon="smartphone" 
        label="Mobile: "
        class="text-success" />
    
    <x-view-tel 
        value="{{ $contact->work_phone }}" 
        icon="briefcase" 
        label="Work: "
        class="text-info" />
    
    <x-view-tel 
        value="{{ $contact->emergency_phone }}" 
        icon="alert-triangle" 
        label="Emergency: "
        class="text-danger" />
</div>
```

### Customer Service Interface
```blade
<div class="customer-service-interface">
    <h4>Customer Service</h4>
    
    <x-view-tel 
        value="{{ $service->general_phone }}" 
        icon="phone" 
        label="General Inquiries: "
        class="text-primary" />
    
    <x-view-tel 
        value="{{ $service->technical_phone }}" 
        icon="settings" 
        label="Technical Support: "
        class="text-info" />
    
    <x-view-tel 
        value="{{ $service->billing_phone }}" 
        icon="credit-card" 
        label="Billing Support: "
        class="text-warning" />
    
    <x-view-tel 
        value="{{ $service->urgent_phone }}" 
        icon="alert-circle" 
        label="Urgent Issues: "
        class="text-danger" />
</div>
```

### Team Contact Interface
```blade
<div class="team-contact-interface">
    <h4>Team Contacts</h4>
    
    <x-view-tel 
        value="{{ $team->lead_phone }}" 
        icon="crown" 
        label="Team Lead: "
        class="text-warning" />
    
    <x-view-tel 
        value="{{ $team->manager_phone }}" 
        icon="user-check" 
        label="Manager: "
        class="text-primary" />
    
    <x-view-tel 
        value="{{ $team->coordinator_phone }}" 
        icon="users" 
        label="Coordinator: "
        class="text-info" />
    
    <x-view-tel 
        value="{{ $team->assistant_phone }}" 
        icon="user-plus" 
        label="Assistant: "
        class="text-muted" />
</div>
```

### Support Hotline Interface
```blade
<div class="support-hotline-interface">
    <h4>Support Hotlines</h4>
    
    <x-view-tel 
        value="{{ $support->24h_phone }}" 
        icon="clock" 
        label="24/7 Support: "
        class="text-success" />
    
    <x-view-tel 
        value="{{ $support->business_phone }}" 
        icon="briefcase" 
        label="Business Hours: "
        class="text-primary" />
    
    <x-view-tel 
        value="{{ $support->weekend_phone }}" 
        icon="calendar" 
        label="Weekend: "
        class="text-info" />
    
    <x-view-tel 
        value="{{ $support->holiday_phone }}" 
        icon="gift" 
        label="Holiday: "
        class="text-warning" />
</div>
```

### Sales Contact Interface
```blade
<div class="sales-contact-interface">
    <h4>Sales Contacts</h4>
    
    <x-view-tel 
        value="{{ $sales->inquiries_phone }}" 
        icon="message-circle" 
        label="General Inquiries: "
        class="text-primary" />
    
    <x-view-tel 
        value="{{ $sales->enterprise_phone }}" 
        icon="building" 
        label="Enterprise Sales: "
        class="text-success" />
    
    <x-view-tel 
        value="{{ $sales->partnership_phone }}" 
        icon="handshake" 
        label="Partnerships: "
        class="text-info" />
    
    <x-view-tel 
        value="{{ $sales->demo_phone }}" 
        icon="play" 
        label="Demo Requests: "
        class="text-warning" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_tel_with_basic_value()
{
    $view = $this->blade('<x-view-tel value="+1-555-123-4567" />');
    
    $view->assertSee('+1-555-123-4567');
    $view->assertSee('tel:+1-555-123-4567');
}

/** @test */
public function it_renders_view_tel_with_label()
{
    $view = $this->blade('<x-view-tel value="+1-555-123-4567" label="Phone: " />');
    
    $view->assertSee('+1-555-123-4567');
    $view->assertSee('Phone: ');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewTelComponent::class)
        ->assertSee('<x-view-tel')
        ->set('value', '+1-555-123-4567')
        ->assertSee('+1-555-123-4567');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to telephone elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to telephone elements

### Keyboard Navigation
- Tab navigation to telephone
- Copy functionality accessibility
- Telephone link accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Telephone context communication
- Icon description support
- Copy functionality announcement
- Link purpose indication

### Telephone Accessibility
- Clear telephone purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Link accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Telephone display with HTML output

## Troubleshooting

### Common Issues

#### Telephone Not Displaying
**Problem:** Telephone value not showing
**Solution:** Check if value attribute is set and not null

#### Linking Not Working
**Problem:** Telephone links not functioning correctly
**Solution:** Check telephone format and device capabilities

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Telephone doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **View URL:** URL display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with telephone display functionality
- Telephone linking integration for interactive functionality
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/tel.blade.php`
2. Add/update tests in `tests/Components/ViewTelTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [View URL Component](../view-url.md)
- [Icon Component](../icon.md)
- [Telephone Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Tel Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
