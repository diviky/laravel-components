# View Email Component

A sophisticated and feature-rich email display component that provides enhanced email address rendering with optional icons, labels, copy-to-clipboard functionality, and intelligent email linking. This component offers professional email display with enhanced user experience and interactive email functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, email validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/email.blade.php`
- **Tests:** `tests/Components/ViewEmailTest.php` (to be created)
- **Documentation:** `docs/view-email.md`

## Basic Usage

### Simple Email Display
```blade
<x-view-email value="user@example.com" />
```

### With Label
```blade
<x-view-email value="user@example.com" label="Email: " />
```

### With Icon
```blade
<x-view-email value="user@example.com" icon="mail" />
```

### With Copy Functionality
```blade
<x-view-email value="user@example.com" copy />
```

### With Email Linking
```blade
<x-view-email value="user@example.com" linked />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | string | Email address to display | `'user@example.com'`, `'admin@company.com'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the email | `'mail'`, `'envelope'`, `'at-sign'`, `'user'` |
| label | string | null | Label text to display before the email | `'Email: '`, `'Contact: '`, `'Support: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| linked | boolean | false | Enable email linking (mailto: links) | `true` |
| settings | array | [] | Additional settings for customization | `['validate' => true]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'email-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="email-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Email Display
**Usage:** `<x-view-email value="user@example.com">` (default)
**Description:** Basic email display with automatic mailto: linking
**Features:**
- Automatic email linking
- Clean, minimal styling
- Responsive design
- Professional appearance

### Labeled Email Display
**Usage:** `<x-view-email value="user@example.com" label="Email: ">`
**Description:** Email display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon Email Display
**Usage:** `<x-view-email value="user@example.com" icon="mail">`
**Description:** Email display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Email Display
**Usage:** `<x-view-email value="user@example.com" copy>`
**Description:** Email display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Linked Email Display
**Usage:** `<x-view-email value="user@example.com" linked>`
**Description:** Email display with clickable mailto: links
**Features:**
- Email linking
- Interactive features
- User convenience
- Professional styling

## Email Functionality

### Email Linking
The component automatically creates `mailto:` links for email addresses, allowing users to:
- Click to open their default email client
- Pre-fill the recipient field
- Initiate new email composition
- Access email functionality directly

### Email Validation
The component includes built-in email validation to ensure:
- Proper email format
- Valid email structure
- Professional appearance
- User experience consistency

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy email addresses to clipboard
- Paste into other applications
- Share email addresses easily
- Improve workflow efficiency

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Email content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-email value="user@example.com">
    Additional Content
</x-view-email>
```

## Usage Examples

### Basic Email Display
```blade
<x-view-email value="user@example.com" />
```

### Email with Label
```blade
<x-view-email 
    value="user@example.com" 
    label="Email: " />
```

### Email with Icon
```blade
<x-view-email 
    value="user@example.com" 
    icon="mail" />
```

### Email with Copy Functionality
```blade
<x-view-email 
    value="user@example.com" 
    copy />
```

### Email with Linking Disabled
```blade
<x-view-email 
    value="user@example.com" 
    linked />
```

### Email with Custom Classes
```blade
<x-view-email 
    value="user@example.com" 
    class="text-primary fw-bold" />
```

### Email with Custom ID
```blade
<x-view-email 
    value="user@example.com" 
    id="custom-email-id" />
```

### Email with Data Attributes
```blade
<x-view-email 
    value="user@example.com" 
    data-test="email-component"
    data-type="display-email" />
```

### Email with Aria Attributes
```blade
<x-view-email 
    value="user@example.com" 
    aria-label="Email display"
    aria-describedby="email-description" />
```

### Email with Role Attribute
```blade
<x-view-email 
    value="user@example.com" 
    role="text" />
```

### Email with Tabindex
```blade
<x-view-email 
    value="user@example.com" 
    tabindex="0" />
```

### Email with Form Attribute
```blade
<x-view-email 
    value="user@example.com" 
    form="my-form" />
```

### Email with Autocomplete
```blade
<x-view-email 
    value="user@example.com" 
    autocomplete="off" />
```

### Email with Novalidate
```blade
<x-view-email 
    value="user@example.com" 
    novalidate />
```

### Email with Accept
```blade
<x-view-email 
    value="user@example.com" 
    accept="email/*" />
```

### Email with Capture
```blade
<x-view-email 
    value="user@example.com" 
    capture="environment" />
```

### Email with Max
```blade
<x-view-email 
    value="user@example.com" 
    max="100" />
```

### Email with Min
```blade
<x-view-email 
    value="user@example.com" 
    min="5" />
```

### Email with Step
```blade
<x-view-email 
    value="user@example.com" 
    step="1" />
```

### Email with Pattern
```blade
<x-view-email 
    value="user@example.com" 
    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" />
```

### Email with Spellcheck
```blade
<x-view-email 
    value="user@example.com" 
    spellcheck="false" />
```

### Email with Translate
```blade
<x-view-email 
    value="user@example.com" 
    translate="no" />
```

### Email with Contenteditable
```blade
<x-view-email 
    value="user@example.com" 
    contenteditable="true" />
```

### Email with Contextmenu
```blade
<x-view-email 
    value="user@example.com" 
    contextmenu="email-menu" />
```

### Email with Dir
```blade
<x-view-email 
    value="user@example.com" 
    dir="rtl" />
```

### Email with Draggable
```blade
<x-view-email 
    value="user@example.com" 
    draggable="true" />
```

### Email with Dropzone
```blade
<x-view-email 
    value="user@example.com" 
    dropzone="copy" />
```

### Email with Hidden
```blade
<x-view-email 
    value="user@example.com" 
    hidden />
```

### Email with Lang
```blade
<x-view-email 
    value="user@example.com" 
    lang="en" />
```

### Email with Settings Array
```blade
<x-view-email 
    value="user@example.com" 
    :settings="['validate' => true]" />
```

## Common Patterns

### User Profile Interface
```blade
<div class="user-profile-interface">
    <h4>Contact Information</h4>
    
    <x-view-email 
        value="{{ $user->email }}" 
        icon="mail" 
        label="Email: "
        class="text-primary" />
    
    <x-view-email 
        value="{{ $user->work_email }}" 
        icon="briefcase" 
        label="Work Email: "
        class="text-info" />
    
    <x-view-email 
        value="{{ $user->backup_email }}" 
        icon="shield" 
        label="Backup Email: "
        class="text-muted" />
    
    <x-view-email 
        value="{{ $user->support_email }}" 
        icon="help-circle" 
        label="Support Email: "
        class="text-warning" />
</div>
```

### Contact Management Interface
```blade
<div class="contact-management-interface">
    <h4>Contact Details</h4>
    
    <x-view-email 
        value="{{ $contact->primary_email }}" 
        icon="star" 
        label="Primary: "
        class="text-success" />
    
    <x-view-email 
        value="{{ $contact->secondary_email }}" 
        icon="circle" 
        label="Secondary: "
        class="text-info" />
    
    <x-view-email 
        value="{{ $contact->emergency_email }}" 
        icon="alert-triangle" 
        label="Emergency: "
        class="text-danger" />
    
    <x-view-email 
        value="{{ $contact->billing_email }}" 
        icon="credit-card" 
        label="Billing: "
        class="text-warning" />
</div>
```

### Support System Interface
```blade
<div class="support-system-interface">
    <h4>Support Channels</h4>
    
    <x-view-email 
        value="{{ $support->general_email }}" 
        icon="help-circle" 
        label="General Support: "
        class="text-primary" />
    
    <x-view-email 
        value="{{ $support->technical_email }}" 
        icon="settings" 
        label="Technical Support: "
        class="text-info" />
    
    <x-view-email 
        value="{{ $support->billing_email }}" 
        icon="credit-card" 
        label="Billing Support: "
        class="text-warning" />
    
    <x-view-email 
        value="{{ $support->urgent_email }}" 
        icon="alert-triangle" 
        label="Urgent Issues: "
        class="text-danger" />
</div>
```

### Team Management Interface
```blade
<div class="team-management-interface">
    <h4>Team Contacts</h4>
    
    <x-view-email 
        value="{{ $team->lead_email }}" 
        icon="crown" 
        label="Team Lead: "
        class="text-warning" />
    
    <x-view-email 
        value="{{ $team->manager_email }}" 
        icon="user-check" 
        label="Manager: "
        class="text-primary" />
    
    <x-view-email 
        value="{{ $team->coordinator_email }}" 
        icon="users" 
        label="Coordinator: "
        class="text-info" />
    
    <x-view-email 
        value="{{ $team->assistant_email }}" 
        icon="user-plus" 
        label="Assistant: "
        class="text-muted" />
</div>
```

### Customer Service Interface
```blade
<div class="customer-service-interface">
    <h4>Customer Service</h4>
    
    <x-view-email 
        value="{{ $service->inquiries_email }}" 
        icon="message-circle" 
        label="General Inquiries: "
        class="text-primary" />
    
    <x-view-email 
        value="{{ $service->complaints_email }}" 
        icon="alert-circle" 
        label="Complaints: "
        class="text-warning" />
    
    <x-view-email 
        value="{{ $service->feedback_email }}" 
        icon="thumbs-up" 
        label="Feedback: "
        class="text-success" />
    
    <x-view-email 
        value="{{ $service->escalation_email }}" 
        icon="trending-up" 
        label="Escalation: "
        class="text-danger" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_email_with_basic_value()
{
    $view = $this->blade('<x-view-email value="user@example.com" />');
    
    $view->assertSee('user@example.com');
    $view->assertSee('mailto:user@example.com');
}

/** @test */
public function it_renders_view_email_with_label()
{
    $view = $this->blade('<x-view-email value="user@example.com" label="Email: " />');
    
    $view->assertSee('user@example.com');
    $view->assertSee('Email: ');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewEmailComponent::class)
        ->assertSee('<x-view-email')
        ->set('value', 'user@example.com')
        ->assertSee('user@example.com');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to email elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to email elements

### Keyboard Navigation
- Tab navigation to email
- Copy functionality accessibility
- Email link accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Email context communication
- Icon description support
- Copy functionality announcement
- Link purpose indication

### Email Accessibility
- Clear email purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Link accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Email display with HTML output

## Troubleshooting

### Common Issues

#### Email Not Displaying
**Problem:** Email value not showing
**Solution:** Check if value attribute is set and not null

#### Linking Not Working
**Problem:** Email links not functioning correctly
**Solution:** Check linked attribute and email client configuration

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Email doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with email display functionality
- Email linking integration for interactive functionality
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/email.blade.php`
2. Add/update tests in `tests/Components/ViewEmailTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [Icon Component](../icon.md)
- [Email Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Email Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
