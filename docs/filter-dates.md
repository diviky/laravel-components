# Filter Dates Component

A sophisticated date filter component that provides comprehensive date and time range filtering functionality with enhanced user experience and flexible configuration options. This component offers intuitive date filtering with predefined time ranges, custom date selection, and seamless integration with data filtering systems.

## Overview

**Component Type:** Filter  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Base Component class, extends core filter functionality
**JavaScript Library:** Alpine.js (via base component)

## Files

- **PHP Class:** `src/Components/FilterDates.php`
- **View File:** `resources/views/bootstrap-5/filters/dates.blade.php`
- **Tests:** `tests/Components/FilterDatesTest.php` (to be created)
- **Documentation:** `docs/filter-dates.md`

## Basic Usage

### Simple Filter Dates
```blade
<x-filter-dates name="time" />
```

### With Custom Value
```blade
<x-filter-dates 
    name="time" 
    value="1d">
</x-filter-dates>
```

### With Custom Name
```blade
<x-filter-dates 
    name="date_range" 
    value="1w">
</x-filter-dates>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'time'` or `'date_range'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | string | '' | Selected time range value | `'1d'` or `'1w'` |

### Inherited Attributes

This component extends the base `Component` class and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'filter-dates-input'` |
| class | string | '' | CSS classes | `'custom-filter-dates'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Select time range...'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'filter-dates'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'filter'` |

## Component Variants

### Time Range Filter Dates
**Usage:** `<x-filter-dates name="time">` (default)
**Description:** Time-based filtering with predefined ranges
**Features:**
- Hour-based ranges (1h, 3h, 6h, 12h)
- Day-based ranges (1d)
- Week-based ranges (1w)
- Month-based ranges (1m, 3m)
- Custom date range support
- Professional styling
- Enhanced user experience

### Custom Date Range Filter Dates
**Usage:** `<x-filter-dates name="date_range" value="">`
**Description:** Custom date range selection
**Features:**
- Custom date range input
- Flexible date selection
- Professional styling
- Enhanced user experience

### Chart Time Filter Dates
**Usage:** `<x-filter-dates name="chart_time">`
**Description:** Chart-specific time filtering
**Features:**
- Chart time optimization
- Real-time data filtering
- Professional styling
- Enhanced user experience

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Date filter content and text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-filter-dates name="time">
    Custom Date Filter Content
</x-filter-dates>
```

## Usage Examples

### Basic Time Filter
```blade
<x-filter-dates 
    name="time" 
    value="1d">
</x-filter-dates>
```

### Custom Date Range Filter
```blade
<x-filter-dates 
    name="date_range" 
    value="">
</x-filter-dates>
```

### Chart Time Filter
```blade
<x-filter-dates 
    name="chart_time" 
    value="1h">
</x-filter-dates>
```

### Filter Dates with Custom Classes
```blade
<x-filter-dates 
    name="custom_time" 
    class="custom-filter-dates-lg">
</x-filter-dates>
```

### Filter Dates with Custom ID
```blade
<x-filter-dates 
    name="custom_id_time" 
    id="custom-filter-dates-selector">
</x-filter-dates>
```

### Filter Dates with Data Attributes
```blade
<x-filter-dates 
    name="data_time" 
    data-test="filter-dates"
    data-type="time-filter">
</x-filter-dates>
```

### Filter Dates with Aria Attributes
```blade
<x-filter-dates 
    name="aria_time" 
    aria-label="Time Filter"
    aria-describedby="time-help-text">
</x-filter-dates>
```

### Filter Dates with Role Attribute
```blade
<x-filter-dates 
    name="role_time" 
    role="combobox">
</x-filter-dates>
```

### Filter Dates with Tabindex
```blade
<x-filter-dates 
    name="tabindex_time" 
    tabindex="0">
</x-filter-dates>
```

### Filter Dates with Form Attribute
```blade
<x-filter-dates 
    name="form_time" 
    form="my-form">
</x-filter-dates>
```

### Filter Dates with Autocomplete
```blade
<x-filter-dates 
    name="autocomplete_time" 
    autocomplete="off">
</x-filter-dates>
```

### Filter Dates with Novalidate
```blade
<x-filter-dates 
    name="novalidate_time" 
    novalidate>
</x-filter-dates>
```

### Filter Dates with Accept
```blade
<x-filter-dates 
    name="accept_time" 
    accept="date/*">
</x-filter-dates>
```

### Filter Dates with Capture
```blade
<x-filter-dates 
    name="capture_time" 
    capture="environment">
</x-filter-dates>
```

### Filter Dates with Max
```blade
<x-filter-dates 
    name="max_time" 
    max="365">
</x-filter-dates>
```

### Filter Dates with Min
```blade
<x-filter-dates 
    name="min_time" 
    min="1">
</x-filter-dates>
```

### Filter Dates with Step
```blade
<x-filter-dates 
    name="step_time" 
    step="1">
</x-filter-dates>
```

### Filter Dates with Pattern
```blade
<x-filter-dates 
    name="pattern_time" 
    pattern="[0-9]+[hdwm]">
</x-filter-dates>
```

### Filter Dates with Spellcheck
```blade
<x-filter-dates 
    name="spellcheck_time" 
    spellcheck="false">
</x-filter-dates>
```

### Filter Dates with Translate
```blade
<x-filter-dates 
    name="translate_time" 
    translate="no">
</x-filter-dates>
```

### Filter Dates with Contenteditable
```blade
<x-filter-dates 
    name="contenteditable_time" 
    contenteditable="true">
</x-filter-dates>
```

### Filter Dates with Contextmenu
```blade
<x-filter-dates 
    name="contextmenu_time" 
    contextmenu="time-menu">
</x-filter-dates>
```

### Filter Dates with Dir
```blade
<x-filter-dates 
    name="dir_time" 
    dir="rtl">
</x-filter-dates>
```

### Filter Dates with Draggable
```blade
<x-filter-dates 
    name="draggable_time" 
    draggable="true">
</x-filter-dates>
```

### Filter Dates with Dropzone
```blade
<x-filter-dates 
    name="dropzone_time" 
    dropzone="copy">
</x-filter-dates>
```

### Filter Dates with Hidden
```blade
<x-filter-dates 
    name="hidden_time" 
    hidden>
</x-filter-dates>
```

### Filter Dates with Lang
```blade
<x-filter-dates 
    name="lang_time" 
    lang="en">
</x-filter-dates>
```

### Filter Dates with Spellcheck True
```blade
<x-filter-dates 
    name="spellcheck_true_time" 
    spellcheck="true">
</x-filter-dates>
```

### Filter Dates with Translate Yes
```blade
<x-filter-dates 
    name="translate_yes_time" 
    translate="yes">
</x-filter-dates>
```

### Filter Dates with Contenteditable False
```blade
<x-filter-dates 
    name="contenteditable_false_time" 
    contenteditable="false">
</x-filter-dates>
```

### Filter Dates with Draggable False
```blade
<x-filter-dates 
    name="draggable_false_time" 
    draggable="false">
</x-filter-dates>
```

### Filter Dates with Dropzone Move
```blade
<x-filter-dates 
    name="dropzone_move_time" 
    dropzone="move">
</x-filter-dates>
```

### Filter Dates with Dropzone Link
```blade
<x-filter-dates 
    name="dropzone_link_time" 
    dropzone="link">
</x-filter-dates>
```

### Filter Dates with Dropzone Copy Move
```blade
<x-filter-dates 
    name="dropzone_copy_move_time" 
    dropzone="copy move">
</x-filter-dates>
```

### Filter Dates with Dropzone Copy Link
```blade
<x-filter-dates 
    name="dropzone_copy_link_time" 
    dropzone="copy link">
</x-filter-dates>
```

### Filter Dates with Dropzone Move Link
```blade
<x-filter-dates 
    name="dropzone_move_link_time" 
    dropzone="move link">
</x-filter-dates>
```

### Filter Dates with Dropzone Copy Move Link
```blade
<x-filter-dates 
    name="dropzone_copy_move_link_time" 
    dropzone="copy move link">
</x-filter-dates>
```

## Common Patterns

### Analytics Dashboard Time Filter
```blade
<div class="analytics-dashboard-time-filter">
    <h4>Time Range Selection</h4>
    <p>Select the time range for your analytics:</p>
    
    <x-filter-dates 
        name="analytics_time" 
        value="1d">
        <x-slot:help>
            <div class="time-range-help mt-2">
                <h6>Time Range Options:</h6>
                <ul class="list-unstyled">
                    <li><strong>Real-time:</strong> 1h, 3h, 6h, 12h</li>
                    <li><strong>Daily:</strong> 1d</li>
                    <li><strong>Weekly:</strong> 1w</li>
                    <li><strong>Monthly:</strong> 1m, 3m</li>
                    <li><strong>Custom:</strong> Select your own range</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-dates>
    
    <div class="time-filter-tips mt-3">
        <h6>Time Filter Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Real-time Analysis:</strong><br>
                • 1h: Last hour data<br>
                • 3h: Last 3 hours<br>
                • 6h: Last 6 hours<br>
                • 12h: Last 12 hours
            </div>
            <div class="col-md-6">
                <strong>Period Analysis:</strong><br>
                • 1d: Last 24 hours<br>
                • 1w: Last 7 days<br>
                • 1m: Last 30 days<br>
                • 3m: Last 90 days
            </div>
        </div>
    </div>
</div>
```

### Chart Time Filter Interface
```blade
<div class="chart-time-filter-interface">
    <h4>Chart Time Filter</h4>
    <p>Filter chart data by time range:</p>
    
    <x-filter-dates 
        name="chart_time" 
        value="1h">
        <x-slot:help>
            <div class="chart-time-help mt-2">
                <h6>Chart Time Options:</h6>
                <ul class="list-unstyled">
                    <li><strong>Live Charts:</strong> 1h, 3h, 6h, 12h for real-time updates</li>
                    <li><strong>Daily Charts:</strong> 1d for daily trends</li>
                    <li><strong>Weekly Charts:</strong> 1w for weekly patterns</li>
                    <li><strong>Monthly Charts:</strong> 1m, 3m for long-term trends</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-dates>
    
    <div class="chart-time-tips mt-3">
        <h6>Chart Time Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Real-time Charts:</strong><br>
                • Use for live monitoring<br>
                • High-frequency updates<br>
                • Performance metrics<br>
                • System monitoring
            </div>
            <div class="col-md-6">
                <strong>Trend Charts:</strong><br>
                • Use for pattern analysis<br>
                • Historical comparisons<br>
                • Growth analysis<br>
                • Seasonal trends
            </div>
        </div>
    </div>
</div>
```

### Data Export Time Filter
```blade
<div class="data-export-time-filter">
    <h4>Data Export Time Filter</h4>
    <p>Select the time range for data export:</p>
    
    <x-filter-dates 
        name="export_time" 
        value="1w">
        <x-slot:help>
            <div class="export-time-help mt-2">
                <h6>Export Time Options:</h6>
                <ul class="list-unstyled">
                    <li><strong>Recent Data:</strong> 1h, 3h, 6h, 12h for current data</li>
                    <li><strong>Daily Export:</strong> 1d for daily reports</li>
                    <li><strong>Weekly Export:</strong> 1w for weekly summaries</li>
                    <li><strong>Monthly Export:</strong> 1m, 3m for monthly reports</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-dates>
    
    <div class="export-time-tips mt-3">
        <h6>Export Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Export Types:</strong><br>
                • CSV export<br>
                • Excel export<br>
                • PDF reports<br>
                • JSON data
            </div>
            <div class="col-md-6">
                <strong>Considerations:</strong><br>
                • Data volume<br>
                • Export time<br>
                • File size<br>
                • Processing time
            </div>
        </div>
    </div>
</div>
```

### Report Generation Time Filter
```blade
<div class="report-generation-time-filter">
    <h4>Report Time Filter</h4>
    <p>Select the time range for report generation:</p>
    
    <x-filter-dates 
        name="report_time" 
        value="1m">
        <x-slot:help>
            <div class="report-time-help mt-2">
                <h6>Report Time Options:</h6>
                <ul class="list-unstyled">
                    <li><strong>Quick Reports:</strong> 1h, 3h, 6h, 12h for immediate insights</li>
                    <li><strong>Daily Reports:</strong> 1d for daily summaries</li>
                    <li><strong>Weekly Reports:</strong> 1w for weekly analysis</li>
                    <li><strong>Monthly Reports:</strong> 1m, 3m for comprehensive analysis</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-dates>
    
    <div class="report-time-tips mt-3">
        <h6>Report Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Report Types:</strong><br>
                • Performance reports<br>
                • Analytics reports<br>
                • Financial reports<br>
                • Operational reports
            </div>
            <div class="col-md-6">
                <strong>Best Practices:</strong><br>
                • Regular scheduling<br>
                • Automated generation<br>
                • Distribution lists<br>
                • Archive management
            </div>
        </div>
    </div>
</div>
```

### Monitoring Dashboard Time Filter
```blade
<div class="monitoring-dashboard-time-filter">
    <h4>Monitoring Time Filter</h4>
    <p>Select the time range for system monitoring:</p>
    
    <x-filter-dates 
        name="monitoring_time" 
        value="1h">
        <x-slot:help>
            <div class="monitoring-time-help mt-2">
                <h6>Monitoring Time Options:</h6>
                <ul class="list-unstyled">
                    <li><strong>Live Monitoring:</strong> 1h, 3h, 6h, 12h for real-time status</li>
                    <li><strong>Daily Monitoring:</strong> 1d for daily overview</li>
                    <li><strong>Weekly Monitoring:</strong> 1w for weekly trends</li>
                    <li><strong>Monthly Monitoring:</strong> 1m, 3m for long-term patterns</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-dates>
    
    <div class="monitoring-time-tips mt-3">
        <h6>Monitoring Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>System Metrics:</strong><br>
                • CPU usage<br>
                • Memory usage<br>
                • Disk space<br>
                • Network traffic
            </div>
            <div class="col-md-6">
                <strong>Alert Settings:</strong><br>
                • Threshold alerts<br>
                • Performance alerts<br>
                • Error notifications<br>
                • Status updates
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_filter_dates_with_basic_attributes()
{
    $view = $this->blade('<x-filter-dates name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-selectgroup');
}

/** @test */
public function it_renders_filter_dates_with_value()
{
    $view = $this->blade('<x-filter-dates name="test" value="1d" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('value="1d"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(FilterDatesComponent::class)
        ->assertSee('<x-filter-dates')
        ->set('selectedTime', '1d')
        ->assertSee('1d');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to date filter elements
- `aria-describedby`: Links to help text
- `role="combobox"`: Applied to date filter elements

### Keyboard Navigation
- Tab navigation to date filter
- Enter key for date selection
- Date filter navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Date selection feedback
- Help text communication
- Error message communication

### Date Filter Accessibility
- Clear date purpose indication
- Proper validation feedback
- Helpful error messages
- Date selection guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via base component)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Date, time, and range support

## Troubleshooting

### Common Issues

#### Date Filter Not Working
**Problem:** Date filtering not working correctly
**Solution:** Check component configuration and date parsing

#### Time Range Issues
**Problem:** Time range selection not working
**Solution:** Verify time range logic and event handling

#### Styling Issues
**Problem:** Date filter doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Icon Display Issues
**Problem:** Date icons not showing correctly
**Solution:** Check icon component and icon name configuration

#### Custom Range Issues
**Problem:** Custom date range not working
**Solution:** Check custom range input and validation

## Related Components

- **Filter Search:** Search filter component
- **Form Date:** Date input component
- **Form DateTime:** DateTime input component
- **Form Date Range:** Date range input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with filter dates functionality
- Base component extension with date support
- Predefined time ranges support
- Comprehensive date integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/filters/dates.blade.php`
2. Update the PHP class: `src/Components/FilterDates.php`
3. Add/update tests in `tests/Components/FilterDatesTest.php`
4. Update this documentation

## See Also

- [Filter Search Component](../filter-search.md)
- [Form Date Component](../form-date.md)
- [Form DateTime Component](../form-date-time.md)
- [Form Date Range Component](../form-date-range.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Form Controls](https://getbootstrap.com/docs/5.3/forms/form-control/)
- [Date Filter Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Filter Dates Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
