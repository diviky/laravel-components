# Form Date Range Component

A sophisticated date range picker component that provides intuitive date range selection with customizable formatting, data attributes for JavaScript integration, and seamless integration with the existing form component ecosystem. Features include flexible date range selection, custom formatting options, and comprehensive attribute support.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Extends FormInput, integrates with date range JavaScript libraries
**JavaScript Integration:** Data attributes for external date range picker libraries

## Files

- **View File:** `resources/views/bootstrap-5/form-date-range.blade.php`
- **Documentation:** `docs/form-date-range.md`
- **Related:** `src/Components/FormDate.php` (for date functionality)

## Basic Usage

### Simple Date Range Picker
```blade
<x-form-date-range name="date_range" label="Select Date Range" />
```

### With Custom Format
```blade
<x-form-date-range 
    name="vacation_dates" 
    label="Vacation Period"
    format="MMM DD, YYYY">
</x-form-date-range>
```

### With Custom Selector
```blade
<x-form-date-range 
    name="project_timeline" 
    label="Project Timeline"
    selector="data-project-dates">
</x-form-date-range>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'date_range'` or `'vacation_dates'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| selector | string | `'data-dateranges'` | Data attribute selector for JavaScript | `'data-project-dates'` |
| format | string | `'MMM DD, YYYY'` | Date format for display | `'YYYY-MM-DD'` |
| extraAttributes | array | [] | Additional HTML attributes | `['required' => true]` |
| type | string | `'text'` | Input type attribute | `'date'` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'daterange-input'` |
| class | string | `'range-picker'` | CSS classes | `'custom-daterange'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | 'Select Date Range' | Input placeholder text | `'Choose date range'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'select-dates'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the date range picker
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Select a start and end date for your booking. Maximum 30 days.
</x-slot:help>
```

#### `icon`
- **Purpose:** Custom icon for the input field
- **Required:** No
- **Content Type:** Icon name or HTML
- **Default:** `'calendar-month'`
- **Example:**
```blade
<x-slot:icon>calendar-range</x-slot:icon>
```

## Usage Examples

### Basic Date Range Selection
```blade
<x-form-date-range 
    name="date_range" 
    label="Select Date Range">
    
    <x-slot:help>
        Choose a start and end date for your selection
    </x-slot:help>
</x-form-date-range>
```

### Custom Date Format
```blade
<x-form-date-range 
    name="event_period" 
    label="Event Period"
    format="MMMM DD, YYYY">
    
    <x-slot:help>
        Select the start and end dates for your event
    </x-slot:help>
</x-form-date-range>
```

### With Custom Selector
```blade
<x-form-date-range 
    name="booking_dates" 
    label="Booking Dates"
    selector="data-booking-dates"
    format="DD/MM/YYYY">
    
    <x-slot:help>
        Choose your check-in and check-out dates
    </x-slot:help>
</x-form-date-range>
```

### With Model Binding
```blade
<x-form-date-range 
    name="user_vacation" 
    label="Vacation Period"
    :bind="$user"
    bind-key="vacation_dates">
</x-form-date-range>
```

### Livewire Integration
```blade
<x-form-date-range 
    wire:model="selectedDateRange"
    name="schedule_period" 
    label="Schedule Period"
    format="MMM DD, YYYY">
    
    <x-slot:help>
        Selected: {{ $selectedDateRange ? $selectedDateRange : 'None' }}
    </x-slot:help>
</x-form-date-range>
```

### With Validation
```blade
<x-form-date-range 
    name="project_timeline" 
    label="Project Timeline"
    required
    format="YYYY-MM-DD">
    
    <x-slot:help>
        This field is required to proceed
    </x-slot:help>
</x-form-date-range>
```

### Custom Styling
```blade
<x-form-date-range 
    name="custom_range" 
    label="Custom Date Range"
    class="custom-daterange"
    format="MMM DD, YYYY">
</x-form-date-range>
```

### With Language Support
```blade
<x-form-date-range 
    name="fecha_rango" 
    label="Rango de Fechas"
    language="es"
    format="DD/MM/YYYY">
</x-form-date-range>
```

### ISO Date Format
```blade
<x-form-date-range 
    name="iso_dates" 
    label="ISO Date Range"
    format="YYYY-MM-DD">
    
    <x-slot:help>
        Dates will be stored in ISO format (YYYY-MM-DD)
    </x-slot:help>
</x-form-date-range>
```

### Short Date Format
```blade
<x-form-date-range 
    name="short_dates" 
    label="Short Date Range"
    format="MM/DD/YY">
    
    <x-slot:help>
        Compact date format for quick selection
    </x-slot:help>
</x-form-date-range>
```

## Component Variants

### Standard Date Range
**Usage:** `<x-form-date-range>` (default)
**Description:** Basic date range picker with default formatting
**Features:**
- Default date format (MMM DD, YYYY)
- Standard data attribute selector
- FormInput integration
- Help and icon slots

### Custom Format Date Range
**Usage:** `<x-form-date-range format="...">`
**Description:** Date range picker with custom date formatting
**Features:**
- Flexible date format options
- Custom display patterns
- Localization support
- Enhanced user experience

### Custom Selector Date Range
**Usage:** `<x-form-date-range selector="...">`
**Description:** Date range picker with custom data attribute selector
**Features:**
- Custom JavaScript integration
- Flexible attribute naming
- Multiple picker support
- Enhanced customization

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-date-range>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-date-range' => [
        'view' => 'laravel-components::{framework}.form-date-range',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Selector:** `data-dateranges`
- **Format:** `MMM DD, YYYY` (e.g., "Jan 15, 2024")
- **Type:** `text`
- **Class:** `range-picker`
- **Placeholder:** `Select Date Range`

### JavaScript Integration
The component provides data attributes for JavaScript integration:
```html
<input 
    data-date-format="MMM DD, YYYY"
    data-dateranges="data-dateranges"
    class="range-picker"
    placeholder="Select Date Range"
    type="text">
```

## Common Patterns

### Vacation Booking System
```blade
<div class="vacation-booking">
    <h4>Book Your Vacation</h4>
    <p>Select your preferred travel dates:</p>
    
    <x-form-date-range 
        name="vacation_dates" 
        label="Vacation Period"
        format="MMMM DD, YYYY"
        selector="data-vacation-dates">
        
        <x-slot:help>
            <strong>Booking guidelines:</strong><br>
            • Minimum stay: 3 nights<br>
            • Maximum stay: 21 nights<br>
            • Advance booking: Up to 12 months<br>
            • Cancellation: 48 hours notice required
        </x-slot:help>
    </x-form-date-range>
    
    <div class="vacation-info mt-3">
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <strong>Travel Tips:</strong> 
            Consider booking during off-peak seasons for better rates and availability. 
            Peak seasons are typically June-August and December-January.
        </div>
    </div>
</div>
```

### Project Timeline Management
```blade
<div class="project-timeline">
    <h4>Project Timeline</h4>
    <p>Define your project start and end dates:</p>
    
    <x-form-date-range 
        name="project_timeline" 
        label="Project Timeline"
        format="YYYY-MM-DD"
        selector="data-project-dates"
        required>
        
        <x-slot:help>
            <strong>Timeline requirements:</strong><br>
            • Project duration: 1-12 months<br>
            • Start date: Must be future date<br>
            • End date: Must be after start date<br>
            • Buffer time: Recommended 2 weeks
        </x-slot:help>
    </x-form-date-range>
    
    <div class="timeline-calculator mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Project Duration:</h6>
                <p class="mb-0" x-text="calculateDuration()">
                    <!-- Duration will be calculated by JavaScript -->
                </p>
            </div>
        </div>
    </div>
</div>
```

### Event Planning Calendar
```blade
<div class="event-calendar">
    <h4>Event Planning Calendar</h4>
    <p>Select the event period:</p>
    
    <x-form-date-range 
        name="event_period" 
        label="Event Period"
        format="MMMM DD, YYYY"
        selector="data-event-dates">
        
        <x-slot:help>
            <strong>Event planning guidelines:</strong><br>
            • Setup time: 1 day before event<br>
            • Event duration: 1-7 days<br>
            • Teardown time: 1 day after event<br>
            • Venue availability: Check calendar
        </x-slot:help>
    </x-form-date-range>
    
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

### Financial Year Selection
```blade
<div class="financial-year">
    <h4>Financial Year Selection</h4>
    <p>Choose the financial year for reporting:</p>
    
    <x-form-date-range 
        name="financial_year" 
        label="Financial Year"
        format="YYYY"
        selector="data-financial-year">
        
        <x-slot:help>
            <strong>Financial year options:</strong><br>
            • Calendar year: January 1 - December 31<br>
            • Fiscal year: April 1 - March 31<br>
            • Custom year: Specify start and end dates<br>
            • Reporting period: Monthly, quarterly, annual
        </x-slot:help>
    </x-form-date-range>
    
    <div class="financial-note mt-3">
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Important:</strong> 
            Financial year selection affects all reporting and tax calculations. 
            Changes cannot be made after the first transaction is recorded.
        </div>
    </div>
</div>
```

### Academic Semester Planning
```blade
<div class="academic-semester">
    <h4>Academic Semester Planning</h4>
    <p>Define the academic semester dates:</p>
    
    <x-form-date-range 
        name="semester_dates" 
        label="Semester Period"
        format="MMMM DD, YYYY"
        selector="data-semester-dates">
        
        <x-slot:help>
            <strong>Semester structure:</strong><br>
            • Fall semester: August - December<br>
            • Spring semester: January - May<br>
            • Summer session: May - August<br>
            • Break periods: Winter, Spring, Summer
        </x-slot:help>
    </x-form-date-range>
    
    <div class="academic-calendar mt-3">
        <div class="row">
            <div class="col-md-6">
                <h6>Key Dates:</h6>
                <ul class="text-muted">
                    <li>Registration opens</li>
                    <li>Classes begin</li>
                    <li>Mid-term exams</li>
                    <li>Final exams</li>
                    <li>Grades due</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h6>Holidays & Breaks:</h6>
                <ul class="text-muted">
                    <li>Labor Day</li>
                    <li>Thanksgiving</li>
                    <li>Winter break</li>
                    <li>Spring break</li>
                    <li>Memorial Day</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

### Subscription Period Management
```blade
<div class="subscription-management">
    <h4>Subscription Period</h4>
    <p>Set your subscription start and end dates:</p>
    
    <x-form-date-range 
        name="subscription_period" 
        label="Subscription Period"
        format="MMM DD, YYYY"
        selector="data-subscription-dates">
        
        <x-slot:help>
            <strong>Subscription options:</strong><br>
            • Monthly: 30-day cycles<br>
            • Quarterly: 90-day cycles<br>
            • Annual: 365-day cycles<br>
            • Custom: Specify duration
        </x-slot:help>
    </x-form-date-range>
    
    <div class="subscription-features mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Subscription Benefits:</h6>
                <ul class="mb-0">
                    <li>Unlimited access to premium content</li>
                    <li>Priority customer support</li>
                    <li>Exclusive member discounts</li>
                    <li>Early access to new features</li>
                    <li>Monthly progress reports</li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_date_range_with_basic_attributes()
{
    $view = $this->blade('<x-form-date-range name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-date-range');
}

/** @test */
public function it_renders_form_date_range_with_custom_format()
{
    $view = $this->blade('<x-form-date-range name="test" format="YYYY-MM-DD" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('YYYY-MM-DD');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(DateRangeComponent::class)
        ->assertSee('<x-form-date-range')
        ->set('selectedDateRange', '2024-01-01 to 2024-01-31')
        ->assertSee('2024-01-01 to 2024-01-31');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to date range picker
- `aria-describedby`: Links to help text
- `role="button"`: Applied to picker controls

### Keyboard Navigation
- Tab navigation to date range input
- Enter key to open date picker
- Arrow keys for date selection
- Escape key to close picker

### Screen Reader Support
- Proper labeling and descriptions
- Date range announcements
- Format information
- Error message communication

## Browser Compatibility

- **Supported Browsers:** All modern browsers with JavaScript support
- **JavaScript Dependencies:** External date range picker library required
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Date API Support:** Modern JavaScript Date API required

## Troubleshooting

### Common Issues

#### Date Range Picker Not Loading
**Problem:** Date range picker not appearing
**Solution:** Check JavaScript loading and data attribute configuration

#### Format Display Issues
**Problem:** Date format not displaying correctly
**Solution:** Verify format attribute and JavaScript library configuration

#### Selector Not Working
**Problem:** Custom selector not functioning
**Solution:** Check selector attribute and JavaScript integration

#### Date Range Validation
**Problem:** Date range validation not working
**Solution:** Verify JavaScript library configuration and validation rules

#### Custom Formatting Problems
**Problem:** Custom date formats not rendering
**Solution:** Check format attribute syntax and library support

#### JavaScript Integration Issues
**Problem:** Data attributes not being recognized
**Solution:** Verify selector attribute and JavaScript library loading

## Related Components

- **Form Date:** Date picker component
- **Form DateTime:** Date and time picker component
- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display

## Changelog

### Version 1.0.0
- Initial release with date range functionality
- Custom formatting support
- Flexible selector configuration
- FormInput integration
- Help and icon slots

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-date-range.blade.php`
2. Add/update tests in `tests/Components/FormDateRangeTest.php`
3. Update this documentation

## See Also

- [Form Date Component](../form-date.md)
- [Form DateTime Component](../form-date-time.md)
- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Date Range Picker Libraries](https://github.com/topics/date-range-picker)
- [Laravel Date Handling](https://laravel.com/docs/helpers#method-carbon)
