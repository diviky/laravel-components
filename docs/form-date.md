# Form Date Component

A sophisticated date picker component with Alpine.js integration, Tempus Dominus date library, and comprehensive form integration for advanced date selection functionality.

## Overview

**Component Type:** Form Input  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** 
- `diviky/laravel-form-components` for base functionality
- Alpine.js for interactivity
- Tempus Dominus date picker library

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-date.blade.php`
- **Documentation:** `docs/form-date.md`
- **Tests:** `tests/Components/FormDateTest.php`

## Basic Usage

```blade
<x-form-date name="birth_date" label="Date of Birth" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | - | Input field name | `'birth_date'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | null | Input label text | `'Select Date'` |
| help | string | null | Help text below input | `'Choose your preferred date'` |
| icon | string | 'calendar-month' | Icon name for the input | `'calendar'` |
| placeholder | string | 'Select Date' | Input placeholder text | `'MM/DD/YYYY'` |
| type | string | 'date' | Input type attribute | `'datetime-local'` |

### Hidden/Advanced Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| default | string | null | Default date value | `'2024-01-15'` |

### Inherited Attributes

This component supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | null | Additional CSS classes | `'custom-date'` |
| disabled | boolean | false | Disable the input | `true` |
| required | boolean | false | Make field required | `true` |

## Slots

### Default Slot
- **Purpose:** Additional content after the input
- **Content Type:** HTML/Components
- **Required:** No

### Named Slots

#### `help`
- **Purpose:** Custom help text
- **Content Type:** HTML/Text
- **Required:** No

#### `icon`
- **Purpose:** Custom icon for the input
- **Content Type:** Icon name or HTML
- **Required:** No

## Usage Examples

### Basic Date Picker
```blade
<x-form-date name="event_date" label="Event Date" />
```

### Date Picker with Help Text
```blade
<x-form-date 
    name="appointment_date" 
    label="Appointment Date"
    help="Select your preferred appointment date and time" />
```

### Date Picker with Custom Icon
```blade
<x-form-date 
    name="birth_date" 
    label="Date of Birth"
    icon="calendar-heart" />
```

### Date Picker with Custom Placeholder
```blade
<x-form-date 
    name="due_date" 
    label="Due Date"
    placeholder="MM/DD/YYYY" />
```

### Required Date Picker
```blade
<x-form-date 
    name="start_date" 
    label="Start Date"
    required />
```

### Disabled Date Picker
```blade
<x-form-date 
    name="locked_date" 
    label="Locked Date"
    disabled />
```

### Date Picker with Custom Classes
```blade
<x-form-date 
    name="custom_date" 
    label="Custom Date"
    class="date-picker-lg">
</x-form-date>
```

### Livewire Integration
```blade
<x-form-date 
    name="selected_date" 
    label="Selected Date"
    wire:model="form.selectedDate" />
```

### Date Picker with Custom Help Slot
```blade
<x-form-date name="important_date" label="Important Date">
    <x-slot:help>
        <div class="text-warning small">
            <i class="icon-warning"></i>
            This date cannot be changed once set
        </div>
    </x-slot:help>
</x-form-date>
```

### Date Picker with Custom Icon Slot
```blade
<x-form-date name="special_date" label="Special Date">
    <x-slot:icon>
        <i class="fas fa-calendar-alt"></i>
    </x-slot:icon>
</x-form-date>
```

## Features

### Alpine.js Integration
- **Dynamic Initialization:** Automatic date picker initialization
- **Event Handling:** Custom event handling for date selection
- **Livewire Integration:** Automatic reinitialization after Livewire updates
- **Navigation Support:** Reinitialization on page navigation

### Tempus Dominus Integration
- **Advanced Date Picking:** Professional date picker functionality
- **Event System:** Custom event dispatching for date changes
- **Format Support:** Flexible date formatting options
- **Configuration:** Extensive configuration options via `$setup()`

### Form Integration
- **Name Attribute:** Proper form field naming
- **Validation:** Built-in error handling and display
- **Default Values:** Support for default date values
- **Placeholder:** Customizable placeholder text

### Styling Options
- **Bootstrap Integration:** Uses Bootstrap form styling
- **Icon Support:** Customizable calendar icon
- **Custom Classes:** Additional CSS class support
- **Responsive Design:** Mobile-friendly date picker

## Common Patterns

### Event Planning Form
```blade
<div class="event-form">
    <h4>Event Details</h4>
    
    <x-form-date 
        name="event_date" 
        label="Event Date"
        help="Select the date for your event" />
    
    <x-form-date 
        name="registration_deadline" 
        label="Registration Deadline"
        help="Last date to register for the event" />
    
    <x-form-date 
        name="reminder_date" 
        label="Reminder Date"
        help="Date to send event reminders" />
</div>
```

### Booking System
```blade
<div class="booking-form">
    <h5>Reservation Details</h5>
    
    <x-form-date 
        name="check_in_date" 
        label="Check-in Date"
        help="Select your arrival date" />
    
    <x-form-date 
        name="check_out_date" 
        label="Check-out Date"
        help="Select your departure date" />
    
    <x-form-date 
        name="booking_date" 
        label="Booking Date"
        help="When you made this reservation" />
</div>
```

### Project Management
```blade
<div class="project-form">
    <h4>Project Timeline</h4>
    
    <x-form-date 
        name="start_date" 
        label="Project Start Date"
        help="When the project will begin" />
    
    <x-form-date 
        name="milestone_date" 
        label="Milestone Date"
        help="Key milestone deadline" />
    
    <x-form-date 
        name="end_date" 
        label="Project End Date"
        help="Expected project completion date" />
</div>
```

### User Profile
```blade
<div class="profile-form">
    <h5>Personal Information</h5>
    
    <x-form-date 
        name="birth_date" 
        label="Date of Birth"
        icon="calendar-heart"
        help="Your date of birth for account verification" />
    
    <x-form-date 
        name="anniversary_date" 
        label="Anniversary Date"
        icon="calendar-star"
        help="Optional: Your anniversary date" />
</div>
```

## Configuration

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-date' => [
        'view' => 'laravel-components::{framework}.form-date',
    ],
],
```

### Tempus Dominus Configuration
The component uses the `$setup()` method to configure the date picker:

```php
// In the component class
public function setup()
{
    return [
        'format' => 'yyyy-MM-dd',
        'useCurrent' => false,
        'minDate' => 'today',
        'maxDate' => '+1y',
        // ... other Tempus Dominus options
    ];
}
```

## JavaScript Integration

### Custom Date Picker Events
```javascript
// Listen for date picker events
document.addEventListener('picked', function(event) {
    const dateValue = event.detail.value;
    console.log('Date selected:', dateValue);
    
    // Update other form fields or trigger actions
    updateRelatedFields(dateValue);
});

// Custom date picker initialization
function initializeCustomDatePicker() {
    Alpine.data('customDatePicker', () => ({
        picker: null,
        
        init() {
            this.initPicker();
        },
        
        initPicker() {
            // Custom initialization logic
            const config = {
                format: 'MM/DD/YYYY',
                useCurrent: false,
                icons: {
                    time: 'fas fa-clock',
                    date: 'fas fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-calendar-check',
                    clear: 'fas fa-trash',
                    close: 'fas fa-times'
                }
            };
            
            this.picker = new tempusDominus.TempusDominus(
                this.$refs.container, 
                config
            );
        }
    }));
}
```

### Date Validation
```javascript
// Custom date validation
function validateDateRange(startDate, endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);
    
    if (start >= end) {
        alert('End date must be after start date');
        return false;
    }
    
    return true;
}

// Date picker with validation
document.addEventListener('picked', function(event) {
    const dateValue = event.detail.value;
    const fieldName = event.target.name;
    
    if (fieldName === 'start_date') {
        const endDate = document.querySelector('[name="end_date"]').value;
        if (endDate && !validateDateRange(dateValue, endDate)) {
            event.target.value = '';
        }
    }
});
```

## Accessibility

### ARIA Attributes
- Proper form input structure
- Screen reader friendly date picker
- Keyboard navigation support
- Focus management

### Best Practices
- Use descriptive labels
- Provide helpful descriptions
- Ensure sufficient color contrast
- Test with keyboard navigation
- Support screen readers

## Browser Compatibility

- **Supported Browsers:** All modern browsers
- **JavaScript Dependencies:** Alpine.js, Tempus Dominus
- **CSS Framework Requirements:** Bootstrap 4+ for proper styling

## Troubleshooting

### Common Issues

#### Date Picker Not Initializing
**Problem:** Date picker doesn't appear
**Solution:** Ensure Alpine.js and Tempus Dominus are loaded

#### Livewire Not Updating
**Problem:** Date picker doesn't work after Livewire updates
**Solution:** Check Livewire integration and reinitialization

#### Date Format Issues
**Problem:** Date format not displaying correctly
**Solution:** Verify Tempus Dominus configuration in `$setup()` method

#### Styling Issues
**Problem:** Date picker doesn't look like expected
**Solution:** Verify Bootstrap CSS and custom styles are loaded

## Related Components

- **Form DateTime:** Date and time picker component
- **Form Date Range:** Date range selection component
- **Form Input:** Base input component
- **Form Button:** Form submission buttons

## Performance Considerations

- Lazy load Tempus Dominus library
- Optimize Alpine.js initialization
- Consider date picker configuration for large datasets
- Cache date picker instances when possible

## Examples Gallery

### E-commerce Order Form
```blade
<div class="order-form">
    <h4>Order Details</h4>
    
    <div class="row">
        <div class="col-md-6">
            <x-form-date 
                name="order_date" 
                label="Order Date"
                help="When you placed this order" />
        </div>
        
        <div class="col-md-6">
            <x-form-date 
                name="expected_delivery" 
                label="Expected Delivery"
                help="Expected delivery date" />
        </div>
    </div>
    
    <x-form-date 
        name="delivery_date" 
        label="Preferred Delivery Date"
        help="Your preferred delivery date (optional)" />
</div>
```

### Employee Management
```blade
<div class="employee-form">
    <h5>Employment Details</h5>
    
    <x-form-date 
        name="hire_date" 
        label="Hire Date"
        icon="calendar-plus"
        help="Date when employee was hired" />
    
    <x-form-date 
        name="probation_end" 
        label="Probation End Date"
        icon="calendar-check"
        help="End date of probation period" />
    
    <x-form-date 
        name="contract_end" 
        label="Contract End Date"
        icon="calendar-x"
        help="Contract expiration date" />
</div>
```

### Academic Calendar
```blade
<div class="academic-form">
    <h4>Academic Schedule</h4>
    
    <x-form-date 
        name="semester_start" 
        label="Semester Start"
        help="First day of the semester" />
    
    <x-form-date 
        name="midterm_date" 
        label="Midterm Date"
        help="Midterm examination date" />
    
    <x-form-date 
        name="final_exam_date" 
        label="Final Exam Date"
        help="Final examination date" />
    
    <x-form-date 
        name="semester_end" 
        label="Semester End"
        help="Last day of the semester" />
</div>
```

## Changelog

### Version 2.0.0
- Added Alpine.js integration
- Integrated Tempus Dominus date picker
- Enhanced Livewire compatibility
- Improved accessibility features

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-date.blade.php`
2. Add/update tests in `tests/Components/FormDateTest.php`
3. Update this documentation
