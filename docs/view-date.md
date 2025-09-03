# View Date Component

A sophisticated and feature-rich date display component that provides enhanced date rendering with optional icons, labels, copy-to-clipboard functionality, and professional date formatting using Carbon. This component offers professional date display with enhanced user experience and flexible formatting capabilities.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, Carbon date library
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/date.blade.php`
- **Tests:** `tests/Components/ViewDateTest.php` (to be created)
- **Documentation:** `docs/view-date.md`

## Basic Usage

### Simple Date Display
```blade
<x-view-date value="2024-01-15" />
```

### With Label
```blade
<x-view-date value="2024-01-15" label="Created: " />
```

### With Icon
```blade
<x-view-date value="2024-01-15" icon="calendar" />
```

### With Copy Functionality
```blade
<x-view-date value="2024-01-15" copy />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | string\|Carbon | Date value to display | `'2024-01-15'`, `$carbonDate`, `'2024-01-15 10:30:00'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the date | `'calendar'`, `'clock'`, `'time'`, `'event'` |
| label | string | null | Label text to display before the date | `'Created: '`, `'Updated: '`, `'Date: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['format' => 'Y-m-d']` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | 'view-date' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'date-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="date-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Date Display
**Usage:** `<x-view-date value="2024-01-15">` (default)
**Description:** Basic date display with automatic formatting
**Features:**
- Automatic date formatting using Carbon
- Clean, minimal styling
- Responsive design
- Professional appearance

### Labeled Date Display
**Usage:** `<x-view-date value="2024-01-15" label="Created: ">`
**Description:** Date display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon Date Display
**Usage:** `<x-view-date value="2024-01-15" icon="calendar">`
**Description:** Date display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable Date Display
**Usage:** `<x-view-date value="2024-01-15" copy>`
**Description:** Date display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

## Date Formatting

### Carbon Integration
This component automatically uses Laravel's Carbon library for professional date formatting, which includes:
- Flexible date parsing
- Multiple format options
- Timezone handling
- Localization support
- Relative time formatting

### Default Formatting
The component automatically formats dates using Carbon with the format `'M d, Y'` (e.g., "Jan 15, 2024"), providing consistent and professional date display across the application.

### Supported Date Formats
The component accepts various date input formats:
- **ISO 8601**: `'2024-01-15'`, `'2024-01-15T10:30:00'`
- **Carbon Instances**: `$carbonDate`
- **Timestamps**: `1642233600`
- **DateTime Strings**: `'2024-01-15 10:30:00'`

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Date content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-date value="2024-01-15">
    Additional Content
</x-view-date>
```

## Usage Examples

### Basic Date Display
```blade
<x-view-date value="2024-01-15" />
```

### Date with Label
```blade
<x-view-date 
    value="2024-01-15" 
    label="Created: " />
```

### Date with Icon
```blade
<x-view-date 
    value="2024-01-15" 
    icon="calendar" />
```

### Date with Copy Functionality
```blade
<x-view-date 
    value="2024-01-15" 
    copy />
```

### Date with Custom Classes
```blade
<x-view-date 
    value="2024-01-15" 
    class="text-primary fw-bold" />
```

### Date with Custom ID
```blade
<x-view-date 
    value="2024-01-15" 
    id="custom-date-id" />
```

### Date with Data Attributes
```blade
<x-view-date 
    value="2024-01-15" 
    data-test="date-component"
    data-type="display-date" />
```

### Date with Aria Attributes
```blade
<x-view-date 
    value="2024-01-15" 
    aria-label="Date display"
    aria-describedby="date-description" />
```

### Date with Role Attribute
```blade
<x-view-date 
    value="2024-01-15" 
    role="text" />
```

### Date with Tabindex
```blade
<x-view-date 
    value="2024-01-15" 
    tabindex="0" />
```

### Date with Form Attribute
```blade
<x-view-date 
    value="2024-01-15" 
    form="my-form" />
```

### Date with Autocomplete
```blade
<x-view-date 
    value="2024-01-15" 
    autocomplete="off" />
```

### Date with Novalidate
```blade
<x-view-date 
    value="2024-01-15" 
    novalidate />
```

### Date with Accept
```blade
<x-view-date 
    value="2024-01-15" 
    accept="date/*" />
```

### Date with Capture
```blade
<x-view-date 
    value="2024-01-15" 
    capture="environment" />
```

### Date with Max
```blade
<x-view-date 
    value="2024-01-15" 
    max="2024-12-31" />
```

### Date with Min
```blade
<x-view-date 
    value="2024-01-15" 
    min="2020-01-01" />
```

### Date with Step
```blade
<x-view-date 
    value="2024-01-15" 
    step="1" />
```

### Date with Pattern
```blade
<x-view-date 
    value="2024-01-15" 
    pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />
```

### Date with Spellcheck
```blade
<x-view-date 
    value="2024-01-15" 
    spellcheck="false" />
```

### Date with Translate
```blade
<x-view-date 
    value="2024-01-15" 
    translate="no" />
```

### Date with Contenteditable
```blade
<x-view-date 
    value="2024-01-15" 
    contenteditable="true" />
```

### Date with Contextmenu
```blade
<x-view-date 
    value="2024-01-15" 
    contextmenu="date-menu" />
```

### Date with Dir
```blade
<x-view-date 
    value="2024-01-15" 
    dir="rtl" />
```

### Date with Draggable
```blade
<x-view-date 
    value="2024-01-15" 
    draggable="true" />
```

### Date with Dropzone
```blade
<x-view-date 
    value="2024-01-15" 
    dropzone="copy" />
```

### Date with Hidden
```blade
<x-view-date 
    value="2024-01-15" 
    hidden />
```

### Date with Lang
```blade
<x-view-date 
    value="2024-01-15" 
    lang="en" />
```

### Date with Settings Array
```blade
<x-view-date 
    value="2024-01-15" 
    :settings="['format' => 'Y-m-d']" />
```

## Common Patterns

### Content Management Interface
```blade
<div class="content-management-interface">
    <h4>Content Information</h4>
    
    <x-view-date 
        value="{{ $article->created_at }}" 
        icon="plus-circle" 
        label="Created: "
        class="text-muted" />
    
    <x-view-date 
        value="{{ $article->updated_at }}" 
        icon="edit" 
        label="Last Updated: "
        class="text-info" />
    
    <x-view-date 
        value="{{ $article->published_at }}" 
        icon="eye" 
        label="Published: "
        class="text-success" />
    
    <x-view-date 
        value="{{ $article->expires_at }}" 
        icon="clock" 
        label="Expires: "
        class="text-warning" />
</div>
```

### User Profile Interface
```blade
<div class="user-profile-interface">
    <h4>Profile Information</h4>
    
    <x-view-date 
        value="{{ $user->birth_date }}" 
        icon="gift" 
        label="Birth Date: "
        class="text-primary" />
    
    <x-view-date 
        value="{{ $user->joined_at }}" 
        icon="user-plus" 
        label="Member Since: "
        class="text-success" />
    
    <x-view-date 
        value="{{ $user->last_login_at }}" 
        icon="log-in" 
        label="Last Login: "
        class="text-info" />
    
    <x-view-date 
        value="{{ $user->email_verified_at }}" 
        icon="check-circle" 
        label="Email Verified: "
        class="text-success" />
</div>
```

### Event Management Interface
```blade
<div class="event-management-interface">
    <h4>Event Schedule</h4>
    
    <x-view-date 
        value="{{ $event->start_date }}" 
        icon="play" 
        label="Start Date: "
        class="text-success" />
    
    <x-view-date 
        value="{{ $event->end_date }}" 
        icon="stop" 
        label="End Date: "
        class="text-danger" />
    
    <x-view-date 
        value="{{ $event->registration_deadline }}" 
        icon="clock" 
        label="Registration Deadline: "
        class="text-warning" />
    
    <x-view-date 
        value="{{ $event->created_at }}" 
        icon="plus" 
        label="Event Created: "
        class="text-muted" />
</div>
```

### Project Management Interface
```blade
<div class="project-management-interface">
    <h4>Project Timeline</h4>
    
    <x-view-date 
        value="{{ $project->start_date }}" 
        icon="play-circle" 
        label="Project Start: "
        class="text-success" />
    
    <x-view-date 
        value="{{ $project->due_date }}" 
        icon="target" 
        label="Due Date: "
        class="text-warning" />
    
    <x-view-date 
        value="{{ $project->completed_at }}" 
        icon="check-circle" 
        label="Completed: "
        class="text-primary" />
    
    <x-view-date 
        value="{{ $project->created_at }}" 
        icon="plus" 
        label="Project Created: "
        class="text-muted" />
</div>
```

### Order Management Interface
```blade
<div class="order-management-interface">
    <h4>Order Information</h4>
    
    <x-view-date 
        value="{{ $order->order_date }}" 
        icon="shopping-cart" 
        label="Order Date: "
        class="text-primary" />
    
    <x-view-date 
        value="{{ $order->shipped_date }}" 
        icon="truck" 
        label="Shipped: "
        class="text-info" />
    
    <x-view-date 
        value="{{ $order->delivered_date }}" 
        icon="package" 
        label="Delivered: "
        class="text-success" />
    
    <x-view-date 
        value="{{ $order->cancelled_at }}" 
        icon="x-circle" 
        label="Cancelled: "
        class="text-danger" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_date_with_basic_value()
{
    $view = $this->blade('<x-view-date value="2024-01-15" />');
    
    $view->assertSee('Jan 15, 2024');
}

/** @test */
public function it_renders_view_date_with_label()
{
    $view = $this->blade('<x-view-date value="2024-01-15" label="Created: " />');
    
    $view->assertSee('Jan 15, 2024');
    $view->assertSee('Created: ');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewDateComponent::class)
        ->assertSee('<x-view-date')
        ->set('value', '2024-01-15')
        ->assertSee('Jan 15, 2024');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to date elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to date elements

### Keyboard Navigation
- Tab navigation to date
- Copy functionality accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Date context communication
- Icon description support
- Copy functionality announcement

### Date Accessibility
- Clear date purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Date display with HTML output

## Troubleshooting

### Common Issues

#### Date Not Displaying
**Problem:** Date value not showing
**Solution:** Check if value attribute is set and not null

#### Formatting Not Working
**Problem:** Date formatting not applying correctly
**Solution:** Check Carbon library and date format settings

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Date doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with date display functionality
- Carbon integration for professional date formatting
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/date.blade.php`
2. Add/update tests in `tests/Components/ViewDateTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [Icon Component](../icon.md)
- [Date Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Date Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
