# Form Time Component

An advanced time picker component with Tempus Dominus integration that provides a rich, interactive time selection experience. Features include customizable time stepping, time restrictions, localization support, and Livewire compatibility.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Tempus Dominus, Alpine.js, extends FormInput from laravel-form-components

## Files

- **PHP Class:** `src/Components/FormTime.php`
- **View File:** `resources/views/bootstrap-5/form-time.blade.php`
- **Documentation:** `docs/form-time.md`

## Basic Usage

### Simple Time Input
```blade
<x-form-time name="start_time" label="Start Time" />
```

### With Default Value
```blade
<x-form-time 
    name="meeting_time" 
    label="Meeting Time"
    :default="'14:30'">
</x-form-time>
```

### With Custom Format
```blade
<x-form-time 
    name="appointment_time" 
    label="Appointment Time"
    :settings="['format' => 'HH:mm']">
</x-form-time>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'start_time'` or `'end_time'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Select Time'` |
| value | mixed | null | Current time value | `'14:30'` |
| default | mixed | null | Default time value | `'09:00'` |
| settings | array | [] | Time picker configuration | `['stepping' => 15]` |

### Inherited Attributes

This component inherits from `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'time-input'` |
| class | string | null | Additional CSS classes | `'custom-time'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | 'Select Date' | Placeholder text | `'Choose time'` |
| type | string | 'text' | Input type | `'time'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-time'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'read'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Select a time between 9 AM and 5 PM
</x-slot:help>
```

#### `icon`
- **Purpose:** Custom icon for the input
- **Required:** No
- **Content Type:** Icon name/component
- **Default:** `'clock'`

## Usage Examples

### Basic Time Selection
```blade
<x-form-time 
    name="start_time" 
    label="Start Time"
    placeholder="Choose start time">
</x-form-time>
```

### With Custom Time Stepping
```blade
<x-form-time 
    name="meeting_time" 
    label="Meeting Time"
    :settings="['stepping' => 15]">
    
    <x-slot:help>
        Time slots are available every 15 minutes
    </x-slot:help>
</x-form-time>
```

### With Time Restrictions
```blade
<x-form-time 
    name="business_hours" 
    label="Business Hours"
    :settings="[
        'stepping' => 30,
        'restrictions' => [
            'enabledHours' => [9, 10, 11, 12, 13, 14, 15, 16, 17]
        ]
    ]">
    
    <x-slot:help>
        Available between 9 AM and 5 PM
    </x-slot:help>
</x-form-time>
```

### With Custom Format
```blade
<x-form-time 
    name="appointment_time" 
    label="Appointment Time"
    :settings="[
        'format' => 'HH:mm',
        'localization' => ['format' => 'HH:mm']
    ]">
</x-form-time>
```

### With Default Value
```blade
<x-form-time 
    name="lunch_time" 
    label="Lunch Time"
    :default="'12:00'">
</x-form-time>
```

### With Model Binding
```blade
<x-form-time 
    name="start_time" 
    label="Start Time"
    :bind="$event"
    bind-key="start_time">
</x-form-time>
```

### Livewire Integration
```blade
<x-form-time 
    wire:model="selectedTime"
    name="time" 
    label="Select Time"
    :settings="['stepping' => 15]">
    
    <x-slot:help>
        Selected time: {{ $selectedTime }}
    </x-slot:help>
</x-form-time>
```

### With Validation
```blade
<x-form-time 
    name="time" 
    label="Select Time"
    required
    :settings="['stepping' => 30]">
    
    <x-slot:help>
        Please select a valid time
    </x-slot:help>
</x-form-time>
```

### Custom Styling
```blade
<x-form-time 
    name="time" 
    label="Select Time"
    class="custom-time-picker"
    style="--time-picker-color: #007bff;">
</x-form-time>
```

### With Time Intervals
```blade
<x-form-time 
    name="break_time" 
    label="Break Time"
    :settings="[
        'stepping' => 15,
        'restrictions' => [
            'disabledTimeIntervals' => [
                ['from' => '12:00', 'until' => '13:00']
            ]
        ]
    ]">
    
    <x-slot:help>
        Lunch hour (12-1 PM) is not available
    </x-slot:help>
</x-form-time>
```

## Component Variants

### Standard Time Picker
**Usage:** `<x-form-time>` (default)
**Description:** Standard time picker with clock interface
**Features:**
- Clock view mode
- Customizable stepping
- Time restrictions
- Localization support

### Custom Stepping
**Usage:** `<x-form-time :settings="['stepping' => 15]">`
**Description:** Time picker with custom minute intervals
**Features:**
- 15-minute intervals
- 30-minute intervals
- Custom minute stepping
- Business-friendly time slots

### Restricted Time
**Usage:** `<x-form-time :settings="['restrictions' => [...]]">`
**Description:** Time picker with business hour restrictions
**Features:**
- Enabled hours only
- Disabled time intervals
- Business hour constraints
- Custom time ranges

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-time>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-time' => [
        'view' => 'laravel-components::{framework}.form-time',
        'class' => Components\FormTime::class,
    ],
],
```

### Tempus Dominus Configuration
The component uses Tempus Dominus with these default settings:
- **Display mode:** Clock view
- **Stepping:** 1 minute (configurable)
- **Format:** 12-hour with AM/PM
- **Icons:** Tabler Icons
- **Localization:** English (configurable)

### Settings Options

| Setting | Type | Default | Description | Example |
|---------|------|---------|-------------|---------|
| stepping | int | 1 | Minute intervals | `15`, `30` |
| format | string | 'hh:mm T' | Time format | `'HH:mm'`, `'h:mm A'` |
| enabledHours | array | [] | Allowed hours | `[9, 10, 11, 12, 13, 14, 15, 16, 17]` |
| disabledHours | array | [] | Blocked hours | `[0, 1, 2, 3, 4, 5, 6, 7, 8, 22, 23]` |
| disabledTimeIntervals | array | [] | Blocked time ranges | `[['from' => '12:00', 'until' => '13:00']]` |

## Common Patterns

### Business Hours Time Picker
```blade
<x-form-time 
    name="appointment_time" 
    label="Appointment Time"
    :settings="[
        'stepping' => 30,
        'restrictions' => [
            'enabledHours' => [9, 10, 11, 12, 13, 14, 15, 16, 17],
            'disabledTimeIntervals' => [
                ['from' => '12:00', 'until' => '13:00']
            ]
        ]
    ]">
    
    <x-slot:help>
        Available times: 9 AM - 5 PM (30-minute slots, lunch hour excluded)
    </x-slot:help>
</x-form-time>
```

### Meeting Scheduler
```blade
<x-form-time 
    name="meeting_time" 
    label="Meeting Time"
    :settings="[
        'stepping' => 15,
        'restrictions' => [
            'enabledHours' => [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
        ]
    ]">
    
    <x-slot:help>
        Schedule meetings in 15-minute slots between 8 AM and 6 PM
    </x-slot:help>
</x-form-time>
```

### Restaurant Reservation
```blade
<x-form-time 
    name="reservation_time" 
    label="Reservation Time"
    :settings="[
        'stepping' => 30,
        'restrictions' => [
            'enabledHours' => [11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
        ]
    ]">
    
    <x-slot:help>
        Reservations available from 11 AM to 9 PM
    </x-slot:help>
</x-form-time>
```

### Shift Scheduling
```blade
<div class="shift-scheduler">
    <x-form-time 
        name="shift_start" 
        label="Shift Start Time"
        :settings="[
            'stepping' => 15,
            'restrictions' => [
                'enabledHours' => [6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
            ]
        ]">
    </x-form-time>
    
    <x-form-time 
        name="shift_end" 
        label="Shift End Time"
        :settings="[
            'stepping' => 15,
            'restrictions' => [
                'enabledHours' => [7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]
            ]
        ]">
    </x-form-time>
</div>
```

### Event Time Selection
```blade
<x-form-time 
    name="event_time" 
    label="Event Start Time"
    :settings="[
        'stepping' => 60,
        'restrictions' => [
            'enabledHours' => [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
        ]
    ]">
    
    <x-slot:help>
        Events can start on the hour between 10 AM and 8 PM
    </x-slot:help>
</x-form-time>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_time_with_basic_attributes()
{
    $view = $this->blade('<x-form-time name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-time');
}

/** @test */
public function it_renders_form_time_with_custom_stepping()
{
    $view = $this->blade('<x-form-time name="time" :settings="[\'stepping\' => 15]" />');
    
    $view->assertSee('name="time"');
    $view->assertSee('stepping');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(TimeComponent::class)
        ->assertSee('<x-form-time')
        ->set('selectedTime', '14:30')
        ->assertSee('14:30');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to time input field
- `aria-describedby`: Links to help text
- `role="textbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to input field
- Arrow keys for time adjustment
- Enter key for time selection
- Escape key to close picker

### Screen Reader Support
- Proper labeling and descriptions
- Time format announcements
- Interactive feedback communication
- Stepping information

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Tempus Dominus, Alpine.js 3.x
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling

## Troubleshooting

### Common Issues

#### Time Picker Not Initializing
**Problem:** Time picker doesn't appear
**Solution:** Ensure Tempus Dominus is properly loaded and check for JavaScript errors

#### Time Format Issues
**Problem:** Time format doesn't match expected output
**Solution:** Check format settings and localization configuration

#### Livewire Integration Issues
**Problem:** Time picker doesn't work after Livewire updates
**Solution:** Ensure proper reinitialization hooks are in place

#### Styling Conflicts
**Problem:** Time picker styling doesn't match design
**Solution:** Override default CSS classes and check for framework conflicts

#### Time Restrictions Not Working
**Problem:** Time restrictions don't apply
**Solution:** Verify restrictions array format and check JavaScript console

## Related Components

- **Form Input:** Base input component
- **Form Date:** Date picker component
- **Form DateTime:** Date and time picker component
- **Form Date Range:** Date range picker component
- **Icon:** Icon display component

## Changelog

### Version 1.0.0
- Initial release with Tempus Dominus integration
- Customizable time stepping
- Time restrictions and business hours
- Localization support
- Livewire compatibility

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormTime.php`
2. Update the view file: `resources/views/bootstrap-5/form-time.blade.php`
3. Add/update tests in `tests/Components/FormTimeTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Date Component](../form-date.md)
- [Form DateTime Component](../form-date-time.md)
- [Form Date Range Component](../form-date-range.md)
- [Tempus Dominus Documentation](https://tempus-dominus.dev/)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel Form Components](https://github.com/diviky/laravel-form-components)
