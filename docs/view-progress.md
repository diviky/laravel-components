# View Progress Component

A sophisticated and feature-rich progress display component that provides enhanced progress bar visualization with optional icons, labels, copy-to-clipboard functionality, and intelligent color coding based on progress thresholds. This component offers professional progress display with enhanced user experience and interactive progress functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, progress validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/progress.blade.php`
- **Tests:** `tests/Components/ViewProgressTest.php` (to be created)
- **Documentation:** `docs/view-progress.md`

## Basic Usage

### Simple Progress Display
```blade
<x-view-progress value="75" />
```

### With Icon
```blade
<x-view-progress value="75" icon="trending-up" />
```

### With Label
```blade
<x-view-progress value="75" label="Completion: " />
```

### With Copy Functionality
```blade
<x-view-progress value="75" copy />
```

### With Color Thresholds
```blade
<x-view-progress value="75" :settings="['positive' => 80, 'negative' => 30]" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | int | Progress percentage value to display | `75`, `50`, `100` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the progress | `'trending-up'`, `'activity'`, `'bar-chart'`, `'loader'` |
| label | string | null | Label text to display before the progress | `'Progress: '`, `'Completion: '`, `'Status: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| settings | array | [] | Additional settings for customization | `['positive' => 80, 'negative' => 30]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'progress-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="progress-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Progress Display
**Usage:** `<x-view-progress value="75">` (default)
**Description:** Basic progress display with default styling
**Features:**
- Progress bar visualization
- Clean, minimal styling
- Professional appearance
- Percentage display

### Icon Progress Display
**Usage:** `<x-view-progress value="75" icon="trending-up">`
**Description:** Progress display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Labeled Progress Display
**Usage:** `<x-view-progress value="75" label="Progress: ">`
**Description:** Progress display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Copyable Progress Display
**Usage:** `<x-view-progress value="75" copy>`
**Description:** Progress display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Color-Coded Progress Display
**Usage:** `<x-view-progress value="75" :settings="['positive' => 80, 'negative' => 30]">`
**Description:** Progress display with intelligent color coding
**Features:**
- Automatic color coding
- Threshold-based styling
- Professional appearance
- Enhanced visual feedback

## Progress Functionality

### Progress Visualization
The component displays progress using:
- Bootstrap progress bars
- Percentage indicators
- Color-coded feedback
- Professional styling

### Color Threshold Support
The component supports intelligent color coding:
- **Green (bg-success)**: When value > positive threshold
- **Red (bg-danger)**: When value < negative threshold
- **Yellow (bg-warning)**: When value is between thresholds
- **Default**: When no thresholds are set

### Progress Validation
The component includes built-in progress validation to ensure:
- Proper percentage format
- Valid progress values
- Professional appearance
- User experience consistency

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy progress values to clipboard
- Paste into other applications
- Share progress details easily
- Improve workflow efficiency

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Progress content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-progress value="75">
    Additional Content
</x-view-progress>
```

## Usage Examples

### Basic Progress Display
```blade
<x-view-progress value="75" />
```

### Progress with Icon
```blade
<x-view-progress 
    value="75" 
    icon="trending-up" />
```

### Progress with Label
```blade
<x-view-progress 
    value="75" 
    label="Progress: " />
```

### Progress with Copy Functionality
```blade
<x-view-progress 
    value="75" 
    copy />
```

### Progress with Color Thresholds
```blade
<x-view-progress 
    value="75" 
    :settings="['positive' => 80, 'negative' => 30]" />
```

### Progress with Custom Classes
```blade
<x-view-progress 
    value="75" 
    class="text-primary fw-bold" />
```

### Progress with Custom ID
```blade
<x-view-progress 
    value="75" 
    id="custom-progress-id" />
```

### Progress with Data Attributes
```blade
<x-view-progress 
    value="75" 
    data-test="progress-component"
    data-type="display-progress" />
```

### Progress with Aria Attributes
```blade
<x-view-progress 
    value="75" 
    aria-label="Progress display"
    aria-describedby="progress-description" />
```

### Progress with Role Attribute
```blade
<x-view-progress 
    value="75" 
    role="text" />
```

### Progress with Tabindex
```blade
<x-view-progress 
    value="75" 
    tabindex="0" />
```

### Progress with Form Attribute
```blade
<x-view-progress 
    value="75" 
    form="my-form" />
```

### Progress with Autocomplete
```blade
<x-view-progress 
    value="75" 
    autocomplete="off" />
```

### Progress with Novalidate
```blade
<x-view-progress 
    value="75" 
    novalidate />
```

### Progress with Accept
```blade
<x-view-progress 
    value="75" 
    accept="progress/*" />
```

### Progress with Capture
```blade
<x-view-progress 
    value="75" 
    capture="environment" />
```

### Progress with Max
```blade
<x-view-progress 
    value="75" 
    max="100" />
```

### Progress with Min
```blade
<x-view-progress 
    value="75" 
    min="5" />
```

### Progress with Step
```blade
<x-view-progress 
    value="75" 
    step="1" />
```

### Progress with Pattern
```blade
<x-view-progress 
    value="75" 
    pattern="[0-9]+" />
```

### Progress with Spellcheck
```blade
<x-view-progress 
    value="75" 
    spellcheck="false" />
```

### Progress with Translate
```blade
<x-view-progress 
    value="75" 
    translate="no" />
```

### Progress with Contenteditable
```blade
<x-view-progress 
    value="75" 
    contenteditable="true" />
```

### Progress with Contextmenu
```blade
<x-view-progress 
    value="75" 
    contextmenu="progress-menu" />
```

### Progress with Dir
```blade
<x-view-progress 
    value="75" 
    dir="rtl" />
```

### Progress with Draggable
```blade
<x-view-progress 
    value="75" 
    draggable="true" />
```

### Progress with Dropzone
```blade
<x-view-progress 
    value="75" 
    dropzone="copy" />
```

### Progress with Hidden
```blade
<x-view-progress 
    value="75" 
    hidden />
```

### Progress with Lang
```blade
<x-view-progress 
    value="75" 
    lang="en" />
```

### Progress with Settings Array
```blade
<x-view-progress 
    value="75" 
    :settings="['positive' => 80, 'negative' => 30]" />
```

## Common Patterns

### Task Progress Interface
```blade
<div class="task-progress-interface">
    <h4>Task Progress</h4>
    
    <x-view-progress 
        value="75" 
        icon="check-circle" 
        label="Project Setup: "
        :settings="['positive' => 80, 'negative' => 30]"
        class="text-primary" />
    
    <x-view-progress 
        value="45" 
        icon="clock" 
        label="Development: "
        :settings="['positive' => 80, 'negative' => 30]"
        class="text-info" />
    
    <x-view-progress 
        value="90" 
        icon="play" 
        label="Testing: "
        :settings="['positive' => 80, 'negative' => 30]"
        class="text-success" />
    
    <x-view-progress 
        value="20" 
        icon="alert-triangle" 
        label="Documentation: "
        :settings="['positive' => 80, 'negative' => 30]"
        class="text-warning" />
</div>
```

### Performance Metrics Interface
```blade
<div class="performance-metrics-interface">
    <h4>Performance Metrics</h4>
    
    <x-view-progress 
        value="85" 
        icon="trending-up" 
        label="CPU Usage: "
        :settings="['positive' => 70, 'negative' => 90]"
        class="text-primary" />
    
    <x-view-progress 
        value="60" 
        icon="hard-drive" 
        label="Memory Usage: "
        :settings="['positive' => 70, 'negative' => 90]"
        class="text-info" />
    
    <x-view-progress 
        value="95" 
        icon="activity" 
        label="Network Usage: "
        :settings="['positive' => 70, 'negative' => 90]"
        class="text-danger" />
    
    <x-view-progress 
        value="30" 
        icon="database" 
        label="Disk Usage: "
        :settings="['positive' => 70, 'negative' => 90]"
        class="text-success" />
</div>
```

### Sales Progress Interface
```blade
<div class="sales-progress-interface">
    <h4>Sales Progress</h4>
    
    <x-view-progress 
        value="75" 
        icon="target" 
        label="Monthly Goal: "
        :settings="['positive' => 80, 'negative' => 50]"
        class="text-primary" />
    
    <x-view-progress 
        value="90" 
        icon="trending-up" 
        label="Revenue Target: "
        :settings="['positive' => 80, 'negative' => 50]"
        class="text-success" />
    
    <x-view-progress 
        value="45" 
        icon="users" 
        label="Customer Acquisition: "
        :settings="['positive' => 80, 'negative' => 50]"
        class="text-warning" />
    
    <x-view-progress 
        value="60" 
        icon="shopping-cart" 
        label="Conversion Rate: "
        :settings="['positive' => 80, 'negative' => 50]"
        class="text-info" />
</div>
```

### Learning Progress Interface
```blade
<div class="learning-progress-interface">
    <h4>Learning Progress</h4>
    
    <x-view-progress 
        value="80" 
        icon="book" 
        label="Course Completion: "
        :settings="['positive' => 80, 'negative' => 40]"
        class="text-primary" />
    
    <x-view-progress 
        value="95" 
        icon="award" 
        label="Quiz Scores: "
        :settings="['positive' => 80, 'negative' => 40]"
        class="text-success" />
    
    <x-view-progress 
        value="65" 
        icon="clock" 
        label="Time Management: "
        :settings="['positive' => 80, 'negative' => 40]"
        class="text-warning" />
    
    <x-view-progress 
        value="35" 
        icon="users" 
        label="Peer Reviews: "
        :settings="['positive' => 80, 'negative' => 40]"
        class="text-danger" />
</div>
```

### Health Metrics Interface
```blade
<div class="health-metrics-interface">
    <h4>Health Metrics</h4>
    
    <x-view-progress 
        value="85" 
        icon="heart" 
        label="Heart Rate: "
        :settings="['positive' => 70, 'negative' => 90]"
        class="text-primary" />
    
    <x-view-progress 
        value="70" 
        icon="activity" 
        label="Sleep Quality: "
        :settings="['positive' => 80, 'negative' => 60]"
        class="text-info" />
    
    <x-view-progress 
        value="90" 
        icon="zap" 
        label="Energy Level: "
        :settings="['positive' => 80, 'negative' => 60]"
        class="text-success" />
    
    <x-view-progress 
        value="55" 
        icon="droplet" 
        label="Hydration: "
        :settings="['positive' => 80, 'negative' => 60]"
        class="text-warning" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_progress_with_basic_value()
{
    $view = $this->blade('<x-view-progress value="75" />');
    
    $view->assertSee('75');
    $view->assertSee('75%');
}

/** @test */
public function it_renders_view_progress_with_icon()
{
    $view = $this->blade('<x-view-progress value="75" icon="trending-up" />');
    
    $view->assertSee('75');
    $view->assertSee('trending-up');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewProgressComponent::class)
        ->assertSee('<x-view-progress')
        ->set('value', 75)
        ->assertSee('75');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to progress elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to progress elements

### Keyboard Navigation
- Tab navigation to progress
- Copy functionality accessibility
- Progress display accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Progress context communication
- Icon description support
- Copy functionality announcement
- Progress purpose indication

### Progress Accessibility
- Clear progress purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Progress value accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Progress display with HTML output

## Troubleshooting

### Common Issues

#### Progress Not Displaying
**Problem:** Progress value not showing
**Solution:** Check if value attribute is set and is numeric

#### Color Coding Not Working
**Problem:** Progress colors not changing correctly
**Solution:** Check settings array and threshold values

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** Progress doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **View URL:** URL display component
- **View Tel:** Telephone display component
- **View File:** File display component
- **View Array:** Array display component
- **View Rating:** Rating display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with progress display functionality
- Progress visualization integration for interactive functionality
- Color threshold support for intelligent feedback
- Icon integration support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/progress.blade.php`
2. Add/update tests in `tests/Components/ViewProgressTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [View URL Component](../view-url.md)
- [View Tel Component](../view-tel.md)
- [View File Component](../view-file.md)
- [View Array Component](../view-array.md)
- [View Rating Component](../view-rating.md)
- [Icon Component](../icon.md)
- [Progress Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Progress Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
