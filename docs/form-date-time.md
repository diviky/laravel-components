# Form DateTime Component

A sophisticated date and time picker component that integrates with Tempus Dominus for advanced date-time selection capabilities. Features include stacked and side-by-side layouts, Livewire compatibility, custom formatting, and comprehensive configuration options for professional date-time input experiences.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Tempus Dominus JavaScript library, extends FormDate
**JavaScript Library:** Tempus Dominus (modern date-time picker)

## Files

- **PHP Class:** `src/Components/FormDateTime.php`
- **View File:** `resources/views/bootstrap-5/form-date-time.blade.php`
- **Documentation:** `docs/form-date-time.md`

## Basic Usage

### Simple DateTime Picker
```blade
<x-form-date-time name="meeting_time" label="Meeting Time" />
```

### Stacked Layout
```blade
<x-form-date-time 
    name="appointment" 
    label="Appointment"
    :stacked="true">
</x-form-date-time>
```

### With Custom Settings
```blade
<x-form-date-time 
    name="event_time" 
    label="Event Time"
    :settings="['stacked' => true, 'format' => 'Y-m-d H:i']">
</x-form-date-time>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'meeting_time'` or `'appointment'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Meeting Time'` |
| value | mixed | null | Current date-time value | `'2024-01-15 14:30'` |
| default | mixed | null | Default date-time value | `'2024-01-15 09:00'` |
| settings | array | [] | Tempus Dominus configuration | `['stacked' => true]` |
| stacked | boolean | false | Use stacked layout | `true` |

### Inherited Attributes

This component extends `FormDate` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'datetime-input'` |
| class | string | null | Additional CSS classes | `'custom-datetime'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | 'Select Date' | Input placeholder text | `'Choose date and time'` |
| type | string | 'text' | Input type | `'datetime-local'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'schedule-meetings'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the datetime picker
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Select a date and time for your appointment. Available slots are shown in green.
</x-slot:help>
```

#### `icon`
- **Purpose:** Custom icon for the input field
- **Required:** No
- **Content Type:** Icon name or HTML
- **Default:** `'calendar-month'`
- **Example:**
```blade
<x-slot:icon>clock</x-slot:icon>
```

## Usage Examples

### Basic DateTime Selection
```blade
<x-form-date-time 
    name="meeting_time" 
    label="Meeting Time">
    
    <x-slot:help>
        Choose a date and time for your meeting
    </x-slot:help>
</x-form-date-time>
```

### Stacked Layout (Date and Time Together)
```blade
<x-form-date-time 
    name="appointment" 
    label="Appointment"
    :stacked="true"
    :settings="['format' => 'Y-m-d H:i']">
    
    <x-slot:help>
        Select your preferred appointment time
    </x-slot:help>
</x-form-date-time>
```

### Side-by-Side Layout (Date and Time Separate)
```blade
<x-form-date-time 
    name="event_time" 
    label="Event Date and Time"
    :stacked="false">
    
    <x-slot:help>
        Date and time can be selected separately
    </x-slot:help>
</x-form-date-time>
```

### With Model Binding
```blade
<x-form-date-time 
    name="user_appointment" 
    label="Your Appointment"
    :bind="$user"
    bind-key="appointment_time">
</x-form-date-time>
```

### Livewire Integration
```blade
<x-form-date-time 
    wire:model="selectedDateTime"
    name="schedule_time" 
    label="Schedule Time"
    :stacked="true">
    
    <x-slot:help>
        Selected: {{ $selectedDateTime ? \Carbon\Carbon::parse($selectedDateTime)->format('F d, Y g:i A') : 'None' }}
    </x-slot:help>
</x-form-date-time>
```

### With Validation
```blade
<x-form-date-time 
    name="deadline" 
    label="Project Deadline"
    required
    :stacked="true">
    
    <x-slot:help>
        This field is required to proceed
    </x-slot:help>
</x-form-date-time>
```

### Custom Formatting
```blade
<x-form-date-time 
    name="custom_time" 
    label="Custom Format"
    :settings="[
        'format' => 'Y-m-d H:i:s',
        'localization' => ['format' => 'MMMM d yyyy HH:mm:ss']
    ]">
</x-form-date-time>
```

### With Custom Icons
```blade
<x-form-date-time 
    name="event_datetime" 
    label="Event Date & Time"
    :settings="[
        'display' => [
            'icons' => [
                'time' => 'fas fa-clock',
                'date' => 'fas fa-calendar',
                'today' => 'fas fa-calendar-day'
            ]
        ]
    ]">
</x-form-date-time>
```

### Business Hours Only
```blade
<x-form-date-time 
    name="business_appointment" 
    label="Business Appointment"
    :settings="[
        'restrictions' => [
            'enabled' => [
                'hours' => [9, 10, 11, 12, 13, 14, 15, 16, 17]
            ]
        ]
    ]">
    
    <x-slot:help>
        Available during business hours (9 AM - 5 PM)
    </x-slot:help>
</x-form-date-time>
```

### Weekend Exclusions
```blade
<x-form-date-time 
    name="weekday_meeting" 
    label="Weekday Meeting"
    :settings="[
        'restrictions' => [
            'disabled' => [
                'days' => [0, 6] // Sunday and Saturday
            ]
        ]
    ]">
    
    <x-slot:help>
        Meetings available Monday through Friday only
    </x-slot:help>
</x-form-date-time>
```

### With Time Zone Support
```blade
<x-form-date-time 
    name="timezone_meeting" 
    label="Meeting (Your Timezone)"
    :settings="[
        'localization' => [
            'format' => 'MMMM d yyyy hh:mm T',
            'timeZone' => 'America/New_York'
        ]
    ]">
    
    <x-slot:help>
        Times shown in your local timezone
    </x-slot:help>
</x-form-date-time>
```

## Component Variants

### Stacked Layout
**Usage:** `<x-form-date-time :stacked="true">`
**Description:** Date and time selection in a single picker
**Features:**
- Unified date-time interface
- Single input field
- Tempus Dominus integration
- Livewire compatibility

### Side-by-Side Layout
**Usage:** `<x-form-date-time :stacked="false">` (default)
**Description:** Separate date and time pickers
**Features:**
- Date picker (left column)
- Time picker (right column)
- Hidden input for combined value
- Alpine.js state management

### Custom Configuration
**Usage:** `<x-form-date-time :settings="[...]">`
**Description:** Fully customizable Tempus Dominus configuration
**Features:**
- Custom icons and styling
- Format customization
- Restrictions and validation
- Localization support

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-date-time>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-date-time' => [
        'view' => 'laravel-components::{framework}.form-date-time',
        'class' => Components\FormDateTime::class,
    ],
],
```

### Default Settings
The component uses these default settings:
- **Format:** `'F d Y h:m A'` (e.g., "January 15 2024 2:30 PM")
- **Date Format:** `'F d Y'` (e.g., "January 15 2024")
- **Time Format:** `'h:m A'` (e.g., "2:30 PM")
- **Icons:** Tabler Icons (ti-*)
- **Layout:** Side-by-side (date and time separate)

### Tempus Dominus Configuration
```php
protected function config(): array
{
    return [
        'display' => [
            'sideBySide' => false,
            'viewMode' => 'calendar',
            'icons' => [
                'time' => 'ti ti-clock',
                'date' => 'ti ti-calendar-month',
                'up' => 'ti ti-arrow-up',
                'down' => 'ti ti-arrow-down',
                'previous' => 'ti ti-chevron-left',
                'next' => 'ti ti-chevron-right',
                'today' => 'ti ti-calendar',
                'clear' => 'ti ti-x',
                'close' => 'ti ti-square-x',
            ],
        ],
        'promptTimeOnDateChange' => true,
        'localization' => [
            'format' => 'MMMM d yyyy hh:mm T',
        ],
    ];
}
```

## Common Patterns

### Appointment Scheduling System
```blade
<div class="appointment-scheduler">
    <h4>Schedule Your Appointment</h4>
    <p>Choose a convenient date and time:</p>
    
    <x-form-date-time 
        name="appointment_datetime" 
        label="Appointment Date & Time"
        :stacked="true"
        :settings="[
            'restrictions' => [
                'enabled' => [
                    'hours' => [9, 10, 11, 12, 13, 14, 15, 16, 17]
                ],
                'disabled' => [
                    'days' => [0, 6] // No weekends
                ]
            ],
            'promptTimeOnDateChange' => true
        ]">
        
        <x-slot:help>
            <strong>Available times:</strong> Monday-Friday, 9 AM - 5 PM<br>
            <strong>Duration:</strong> 30-minute slots<br>
            <strong>Note:</strong> Please arrive 10 minutes early
        </x-slot:help>
    </x-form-date-time>
    
    <div class="appointment-info mt-3">
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <strong>Appointment Policy:</strong> 
            Cancellations must be made 24 hours in advance. 
            Late cancellations may incur a fee.
        </div>
    </div>
</div>
```

### Event Planning Interface
```blade
<div class="event-planner">
    <h4>Plan Your Event</h4>
    
    <x-form-date-time 
        name="event_start" 
        label="Event Start Time"
        :stacked="true"
        :settings="[
            'format' => 'Y-m-d H:i',
            'localization' => [
                'format' => 'MMMM d yyyy HH:mm'
            ]
        ]">
        
        <x-slot:help>
            Choose when your event will begin
        </x-slot:help>
    </x-form-date-time>
    
    <x-form-date-time 
        name="event_end" 
        label="Event End Time"
        :stacked="true"
        :settings="[
            'format' => 'Y-m-d H:i',
            'localization' => [
                'format' => 'MMMM d yyyy HH:mm'
            ]
        ]">
        
        <x-slot:help>
            Choose when your event will end
        </x-slot:help>
    </x-form-date-time>
    
    <div class="event-duration mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Event Duration:</h6>
                <p class="mb-0" x-text="calculateDuration()">
                    <!-- Duration will be calculated by JavaScript -->
                </p>
            </div>
        </div>
    </div>
</div>
```

### Meeting Room Booking
```blade
<div class="meeting-room-booking">
    <h4>Book Meeting Room</h4>
    <p>Select a date and time for your meeting:</p>
    
    <x-form-date-time 
        name="meeting_datetime" 
        label="Meeting Date & Time"
        :stacked="true"
        :settings="[
            'restrictions' => [
                'enabled' => [
                    'hours' => [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                ]
            ],
            'promptTimeOnDateChange' => true
        ]">
        
        <x-slot:help>
            <strong>Room availability:</strong> 8 AM - 6 PM<br>
            <strong>Booking duration:</strong> 1-hour minimum<br>
            <strong>Capacity:</strong> Up to 12 people
        </x-slot:help>
    </x-form-date-time>
    
    <div class="room-details mt-3">
        <div class="row">
            <div class="col-md-6">
                <h6>Room Features:</h6>
                <ul class="text-muted">
                    <li>Projector and screen</li>
                    <li>Whiteboard</li>
                    <li>Video conferencing</li>
                    <li>Coffee service</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h6>Booking Guidelines:</h6>
                <ul class="text-muted">
                    <li>Book at least 2 hours in advance</li>
                    <li>Maximum 4 hours per booking</li>
                    <li>Clean up after use</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

### Deadline Management
```blade
<div class="deadline-manager">
    <h4>Set Project Deadline</h4>
    
    <x-form-date-time 
        name="project_deadline" 
        label="Project Deadline"
        :stacked="true"
        :settings="[
            'format' => 'Y-m-d H:i',
            'restrictions' => [
                'enabled' => [
                    'hours' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23]
                ]
            ]
        ]">
        
        <x-slot:help>
            Set the final deadline for project completion
        </x-slot:help>
    </x-form-date-time>
    
    <div class="deadline-warning mt-3">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Deadline Notice:</strong> 
            Once set, deadlines cannot be changed without manager approval. 
            Please ensure you have sufficient time for completion.
        </div>
    </div>
    
    <div class="deadline-calculator mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Time Remaining:</h6>
                <p class="mb-0" x-text="calculateTimeRemaining()">
                    <!-- Time remaining will be calculated by JavaScript -->
                </p>
            </div>
        </div>
    </div>
</div>
```

### Multi-Time Zone Meeting
```blade
<div class="timezone-meeting">
    <h4>Schedule Multi-Time Zone Meeting</h4>
    
    <x-form-date-time 
        name="meeting_datetime_local" 
        label="Meeting Time (Your Timezone)"
        :stacked="true"
        :settings="[
            'localization' => [
                'format' => 'MMMM d yyyy hh:mm T',
                'timeZone' => 'America/New_York'
            ]
        ]">
        
        <x-slot:help>
            Select meeting time in your local timezone
        </x-slot:help>
    </x-form-date-time>
    
    <div class="timezone-conversions mt-3">
        <h6>Meeting Time in Other Timezones:</h6>
        <div class="row">
            <div class="col-md-4">
                <strong>Pacific Time:</strong>
                <span x-text="convertTimezone('America/Los_Angeles')">-</span>
            </div>
            <div class="col-md-4">
                <strong>Central Time:</strong>
                <span x-text="convertTimezone('America/Chicago')">-</span>
            </div>
            <div class="col-md-4">
                <strong>UTC:</strong>
                <span x-text="convertTimezone('UTC')">-</span>
            </div>
        </div>
    </div>
    
    <div class="timezone-note mt-3">
        <div class="alert alert-info">
            <i class="fas fa-globe"></i>
            <strong>Time Zone Note:</strong> 
            All participants will receive meeting invitations in their local timezone. 
            Please confirm the time works for all attendees.
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_date_time_with_basic_attributes()
{
    $view = $this->blade('<x-form-date-time name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-date-time');
}

/** @test */
public function it_renders_form_date_time_with_stacked_layout()
{
    $view = $this->blade('<x-form-date-time name="test" :stacked="true" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('stacked');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(DateTimeComponent::class)
        ->assertSee('<x-form-date-time')
        ->set('selectedDateTime', '2024-01-15 14:30')
        ->assertSee('2024-01-15 14:30');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to datetime picker
- `aria-describedby`: Links to help text
- `role="button"`: Applied to picker controls

### Keyboard Navigation
- Tab navigation to datetime inputs
- Arrow keys for date/time selection
- Enter key to confirm selection
- Escape key to close picker

### Screen Reader Support
- Proper labeling and descriptions
- Date and time announcements
- Format information
- Error message communication

## Browser Compatibility

- **Supported Browsers:** All modern browsers with JavaScript support
- **JavaScript Dependencies:** Tempus Dominus library
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Date API Support:** Modern JavaScript Date API required

## Troubleshooting

### Common Issues

#### Tempus Dominus Not Loading
**Problem:** Date-time picker not appearing
**Solution:** Check JavaScript loading and Tempus Dominus installation

#### Livewire Reinitialization Issues
**Problem:** Picker not working after Livewire updates
**Solution:** Verify Livewire hooks and reinitialization logic

#### Format Display Issues
**Problem:** Date/time format not displaying correctly
**Solution:** Check format configuration and localization settings

#### Stacked vs Side-by-Side Layout
**Problem:** Layout not switching between modes
**Solution:** Verify stacked attribute and settings configuration

#### Time Zone Problems
**Problem:** Time zone conversion not working
**Solution:** Check timezone configuration and localization settings

#### Icon Display Issues
**Problem:** Custom icons not showing
**Solution:** Verify icon library loading and icon name configuration

## Related Components

- **Form Date:** Date picker component
- **Form Time:** Time picker component
- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with Tempus Dominus integration
- Stacked and side-by-side layouts
- Livewire compatibility
- Custom formatting and configuration
- Time zone support

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormDateTime.php`
2. Update the view file: `resources/views/bootstrap-5/form-date-time.blade.php`
3. Add/update tests in `tests/Components/FormDateTimeTest.php`
4. Update this documentation

## See Also

- [Form Date Component](../form-date.md)
- [Form Time Component](../form-time.md)
- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Tempus Dominus Documentation](https://getdatepicker.com/)
- [Laravel Date Handling](https://laravel.com/docs/helpers#method-carbon)
