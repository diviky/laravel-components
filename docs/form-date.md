# Form Date Component

A sophisticated date picker component that integrates with Tempus Dominus for advanced date selection capabilities. Features include Livewire compatibility, custom formatting, comprehensive restrictions and validation, and professional date input experiences with modern JavaScript library integration.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Tempus Dominus JavaScript library, extends FormInput
**JavaScript Library:** Tempus Dominus (modern date picker)

## Files

- **PHP Class:** `src/Components/FormDate.php`
- **View File:** `resources/views/bootstrap-5/form-date.blade.php`
- **Documentation:** `docs/form-date.md`

## Basic Usage

### Simple Date Picker
```blade
<x-form-date name="birth_date" label="Birth Date" />
```

### With Custom Format
```blade
<x-form-date 
    name="event_date" 
    label="Event Date"
    :settings="['format' => 'Y-m-d']">
</x-form-date>
```

### With Date Restrictions
```blade
<x-form-date 
    name="appointment_date" 
    label="Appointment Date"
    :settings="['allowed' => 'future', 'buffer' => 1]">
</x-form-date>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'birth_date'` or `'event_date'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Event Date'` |
| value | mixed | null | Current date value | `'2024-01-15'` |
| default | mixed | null | Default date value | `'2024-01-15'` |
| settings | array | [] | Tempus Dominus configuration | `['allowed' => 'future']` |
| type | string | 'text' | Input type attribute | `'date'` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'date-input'` |
| class | string | `'date'` | CSS classes | `'custom-date'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | 'Select Date' | Input placeholder text | `'Choose date'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-dates'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the date picker
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Select a date for your appointment. Available dates are shown in green.
</x-slot:help>
```

#### `icon`
- **Purpose:** Custom icon for the input field
- **Required:** No
- **Content Type:** Icon name or HTML
- **Default:** `'calendar-month'`
- **Example:**
```blade
<x-slot:icon>calendar-day</x-slot:icon>
```

## Usage Examples

### Basic Date Selection
```blade
<x-form-date 
    name="event_date" 
    label="Event Date">
    
    <x-slot:help>
        Choose a date for your event
    </x-slot:help>
</x-form-date>
```

### Future Dates Only
```blade
<x-form-date 
    name="appointment_date" 
    label="Appointment Date"
    :settings="['allowed' => 'future', 'buffer' => 1]">
    
    <x-slot:help>
        Select a future date (minimum 1 day from today)
    </x-slot:help>
</x-form-date>
```

### Past Dates Only
```blade
<x-form-date 
    name="birth_date" 
    label="Birth Date"
    :settings="['allowed' => 'past']">
    
    <x-slot:help>
        Select your date of birth
    </x-slot:help>
</x-form-date>
```

### Specific Date Range
```blade
<x-form-date 
    name="project_date" 
    label="Project Date"
    :settings="['allowed' => 'specific', 'range' => '2024-01-01-2024-12-31']">
    
    <x-slot:help>
        Select a date within the project timeline
    </x-slot:help>
</x-form-date>
```

### Rolling Date Range
```blade
<x-form-date 
    name="rolling_date" 
    label="Rolling Date"
    :settings="['allowed' => 'future', 'future' => 'rolling', 'rolling' => 30]">
    
    <x-slot:help>
        Select a date within the next 30 days
    </x-slot:help>
</x-form-date>
```

### With Model Binding
```blade
<x-form-date 
    name="user_birth_date" 
    label="Your Birth Date"
    :bind="$user"
    bind-key="birth_date">
</x-form-date>
```

### Livewire Integration
```blade
<x-form-date 
    wire:model="selectedDate"
    name="schedule_date" 
    label="Schedule Date"
    :settings="['allowed' => 'future']">
    
    <x-slot:help>
        Selected: {{ $selectedDate ? \Carbon\Carbon::parse($selectedDate)->format('F d, Y') : 'None' }}
    </x-slot:help>
</x-form-date>
```

### With Validation
```blade
<x-form-date 
    name="deadline" 
    label="Project Deadline"
    required
    :settings="['allowed' => 'future']">
    
    <x-slot:help>
        This field is required to proceed
    </x-slot:help>
</x-form-date>
```

### Custom Formatting
```blade
<x-form-date 
    name="custom_date" 
    label="Custom Format Date"
    :settings="['format' => 'Y-m-d']">
    
    <x-slot:help>
        Date will be stored in YYYY-MM-DD format
    </x-slot:help>
</x-form-date>
```

### Weekdays Only
```blade
<x-form-date 
    name="weekday_date" 
    label="Weekday Date"
    :settings="['weekdays' => true]">
    
    <x-slot:help>
        Only weekdays (Monday-Friday) are selectable
    </x-slot:help>
</x-form-date>
```

### With Stepping
```blade
<x-form-date 
    name="stepped_date" 
    label="Stepped Date"
    :settings="['stepping' => 15]">
    
    <x-slot:help>
        Date selection with 15-minute stepping
    </x-slot:help>
</x-form-date>
```

## Component Variants

### Standard Date Picker
**Usage:** `<x-form-date>` (default)
**Description:** Basic date picker with default configuration
**Features:**
- Default date format (F d Y)
- Tempus Dominus integration
- Livewire compatibility
- Help and icon slots

### Restricted Date Picker
**Usage:** `<x-form-date :settings="['allowed' => '...']">`
**Description:** Date picker with specific date restrictions
**Features:**
- Future dates only
- Past dates only
- Specific date ranges
- Rolling date windows

### Custom Format Date Picker
**Usage:** `<x-form-date :settings="['format' => '...']">`
**Description:** Date picker with custom formatting
**Features:**
- Flexible date formats
- Custom display patterns
- Localization support
- Enhanced user experience

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-date>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-date' => [
        'view' => 'laravel-components::{framework}.form-date',
        'class' => Components\FormDate::class,
    ],
],
```

### Default Settings
The component uses these default settings:
- **Format:** `'F d Y'` (e.g., "January 15 2024")
- **Stepping:** 1 (minute)
- **Multiple Dates:** false
- **Date Range:** false
- **Icons:** Tabler Icons (ti-*)

### Tempus Dominus Configuration
```php
protected function config(): array
{
    return [
        'keepInvalid' => true,
        'multipleDates' => false,
        'stepping' => 1,
        'multipleDatesSeparator' => ' - ',
        'promptTimeOnDateChange' => false,
        'promptTimeOnDateChangeTransitionDelay' => 200,
        'dateRange' => false,
        'display' => [
            'sideBySide' => false,
            'viewMode' => 'calendar',
            'components' => [
                'calendar' => true,
                'date' => true,
                'month' => true,
                'year' => true,
                'decades' => true,
                'clock' => false,
                'hours' => false,
                'minutes' => false,
                'seconds' => false,
            ],
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
        'restrictions' => [
            'minDate' => 'undefined',
            'maxDate' => 'undefined',
            'disabledDates' => [],
            'enabledDates' => [],
            'daysOfWeekDisabled' => [],
            'disabledTimeIntervals' => [],
            'disabledHours' => [],
            'enabledHours' => [],
        ],
        'localization' => [
            'format' => 'MMMM d yyyy',
        ],
    ];
}
```

### Date Restrictions
The component supports comprehensive date restrictions:
```php
public function restrictions(): array
{
    $settings = $this->settings;
    
    $minDate = null;
    $maxDate = null;
    
    if (isset($settings['allowed'])) {
        if ($settings['allowed'] == 'future') {
            $minDate = now();
            if (!empty($settings['buffer'])) {
                $minDate = $minDate->copy()->addDays(intval($settings['buffer']));
            }
            
            if (isset($settings['future']) && $settings['future'] == 'rolling' && !empty($settings['rolling'])) {
                $maxDate = now()->copy()->addDays(intval($settings['rolling']));
            }
        }
        
        if ($settings['allowed'] == 'past') {
            $maxDate = now();
            if (!empty($settings['buffer'])) {
                $maxDate = $maxDate->copy()->subDays(intval($settings['buffer']));
            }
            
            if (isset($settings['past']) && $settings['past'] == 'rolling' && !empty($settings['rolling'])) {
                $minDate = $maxDate->copy()->subDays(intval($settings['rolling']));
            }
        }
        
        if ($settings['allowed'] == 'specific' && !empty($settings['range'])) {
            [$min, $max] = explode('-', $settings['range']);
            $minDate = $this->parse($min);
            $maxDate = $this->parse($max);
        }
    }
    
    return array_filter([
        'minDate' => $minDate ? $minDate->format($this->format) : '',
        'maxDate' => $maxDate ? $maxDate->format($this->format) : '',
        'disabledDates' => [],
        'enabledDates' => [],
        'daysOfWeekDisabled' => when(isset($settings['weekdays']) && $settings['weekdays'], function () {
            return [0, 6]; // Sunday and Saturday
        }),
        'disabledTimeIntervals' => [],
        'disabledHours' => [],
        'enabledHours' => [],
    ]);
}
```

## Common Patterns

### Appointment Scheduling System
```blade
<div class="appointment-scheduler">
    <h4>Schedule Your Appointment</h4>
    <p>Choose a convenient date:</p>
    
    <x-form-date 
        name="appointment_date" 
        label="Appointment Date"
        :settings="[
            'allowed' => 'future',
            'buffer' => 1,
            'weekdays' => true
        ]"
        required>
        
        <x-slot:help>
            <strong>Available dates:</strong><br>
            • Minimum 1 day in advance<br>
            • Monday through Friday only<br>
            • No weekend appointments<br>
            • Maximum 3 months in advance
        </x-slot:help>
    </x-form-date>
    
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

### Event Planning Calendar
```blade
<div class="event-planner">
    <h4>Plan Your Event</h4>
    <p>Select the event date:</p>
    
    <x-form-date 
        name="event_date" 
        label="Event Date"
        :settings="[
            'allowed' => 'future',
            'buffer' => 7,
            'format' => 'Y-m-d'
        ]"
        required>
        
        <x-slot:help>
            <strong>Event planning guidelines:</strong><br>
            • Minimum 1 week in advance<br>
            • Venue availability required<br>
            • Setup time: 1 day before<br>
            • Teardown time: 1 day after
        </x-slot:help>
    </x-form-date>
    
    <div class="event-checklist mt-3">
        <h6>Planning Checklist:</h6>
        <ul class="text-muted">
            <li>Venue booking confirmed</li>
            <li>Catering arrangements</li>
            <li>Guest list finalized</li>
            <li>Marketing materials ready</li>
            <li>Staff assignments complete</li>
        </ul>
    </div>
</div>
```

### Project Deadline Management
```blade
<div class="deadline-manager">
    <h4>Set Project Deadline</h4>
    
    <x-form-date 
        name="project_deadline" 
        label="Project Deadline"
        :settings="[
            'allowed' => 'future',
            'buffer' => 1,
            'format' => 'Y-m-d'
        ]"
        required>
        
        <x-slot:help>
            Set the final deadline for project completion
        </x-slot:help>
    </x-form-date>
    
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

### Birthday and Anniversary Tracking
```blade
<div class="birthday-tracker">
    <h4>Personal Date Tracker</h4>
    
    <x-form-date 
        name="birth_date" 
        label="Birth Date"
        :settings="[
            'allowed' => 'past',
            'format' => 'F d, Y'
        ]">
        
        <x-slot:help>
            Enter your date of birth for age calculations
        </x-slot:help>
    </x-form-date>
    
    <x-form-date 
        name="anniversary_date" 
        label="Anniversary Date"
        :settings="[
            'allowed' => 'past',
            'format' => 'F d, Y'
        ]">
        
        <x-slot:help>
            Enter your anniversary date for reminders
        </x-slot:help>
    </x-form-date>
    
    <div class="date-calculations mt-3">
        <div class="row">
            <div class="col-md-6">
                <h6>Age:</h6>
                <p class="mb-0" x-text="calculateAge()">
                    <!-- Age will be calculated by JavaScript -->
                </p>
            </div>
            <div class="col-md-6">
                <h6>Years Together:</h6>
                <p class="mb-0" x-text="calculateYearsTogether()">
                    <!-- Years together will be calculated by JavaScript -->
                </p>
            </div>
        </div>
    </div>
</div>
```

### Academic Calendar Management
```blade
<div class="academic-calendar">
    <h4>Academic Calendar</h4>
    <p>Define key academic dates:</p>
    
    <x-form-date 
        name="semester_start" 
        label="Semester Start Date"
        :settings="[
            'allowed' => 'future',
            'format' => 'F d, Y'
        ]">
        
        <x-slot:help>
            Select the first day of classes
        </x-slot:help>
    </x-form-date>
    
    <x-form-date 
        name="semester_end" 
        label="Semester End Date"
        :settings="[
            'allowed' => 'future',
            'format' => 'F d, Y'
        ]">
        
        <x-slot:help>
            Select the last day of classes
        </x-slot:help>
    </x-form-date>
    
    <div class="academic-info mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Semester Duration:</h6>
                <p class="mb-0" x-text="calculateSemesterDuration()">
                    <!-- Duration will be calculated by JavaScript -->
                </p>
            </div>
        </div>
    </div>
</div>
```

### Financial Year Planning
```blade
<div class="financial-planning">
    <h4>Financial Year Planning</h4>
    <p>Set financial year boundaries:</p>
    
    <x-form-date 
        name="fiscal_start" 
        label="Fiscal Year Start"
        :settings="[
            'allowed' => 'specific',
            'range' => '2024-01-01-2024-12-31',
            'format' => 'Y-m-d'
        ]">
        
        <x-slot:help>
            Select the start of your fiscal year
        </x-slot:help>
    </x-form-date>
    
    <x-form-date 
        name="fiscal_end" 
        label="Fiscal Year End"
        :settings="[
            'allowed' => 'specific',
            'range' => '2024-01-01-2024-12-31',
            'format' => 'Y-m-d'
        ]">
        
        <x-slot:help>
            Select the end of your fiscal year
        </x-slot:help>
    </x-form-date>
    
    <div class="fiscal-note mt-3">
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <strong>Fiscal Year Note:</strong> 
            Financial year selection affects all reporting and tax calculations. 
            Common fiscal years are January-December or April-March.
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_date_with_basic_attributes()
{
    $view = $this->blade('<x-form-date name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-date');
}

/** @test */
public function it_renders_form_date_with_future_restrictions()
{
    $view = $this->blade('<x-form-date name="test" :settings="[\'allowed\' => \'future\']" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('allowed');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(DateComponent::class)
        ->assertSee('<x-form-date')
        ->set('selectedDate', '2024-01-15')
        ->assertSee('2024-01-15');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to date picker
- `aria-describedby`: Links to help text
- `role="button"`: Applied to picker controls

### Keyboard Navigation
- Tab navigation to date input
- Enter key to open date picker
- Arrow keys for date selection
- Escape key to close picker

### Screen Reader Support
- Proper labeling and descriptions
- Date announcements
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
**Problem:** Date picker not appearing
**Solution:** Check JavaScript loading and Tempus Dominus installation

#### Livewire Reinitialization Issues
**Problem:** Picker not working after Livewire updates
**Solution:** Verify Livewire hooks and reinitialization logic

#### Date Restrictions Not Working
**Problem:** Date restrictions not functioning
**Solution:** Check settings configuration and restriction logic

#### Format Display Issues
**Problem:** Date format not displaying correctly
**Solution:** Check format configuration and localization settings

#### Weekday Restrictions Problems
**Problem:** Weekday restrictions not working
**Solution:** Verify weekdays setting and daysOfWeekDisabled configuration

#### Buffer Date Issues
**Problem:** Buffer dates not calculating correctly
**Solution:** Check buffer setting and date calculation logic

## Related Components

- **Form DateTime:** Date and time picker component
- **Form Date Range:** Date range picker component
- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with Tempus Dominus integration
- Comprehensive date restrictions
- Livewire compatibility
- Custom formatting and configuration
- Weekday restrictions support

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormDate.php`
2. Update the view file: `resources/views/bootstrap-5/form-date.blade.php`
3. Add/update tests in `tests/Components/FormDateTest.php`
4. Update this documentation

## See Also

- [Form DateTime Component](../form-date-time.md)
- [Form Date Range Component](../form-date-range.md)
- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Tempus Dominus Documentation](https://getdatepicker.com/)
- [Laravel Date Handling](https://laravel.com/docs/helpers#method-carbon)
