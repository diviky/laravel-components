# View Rating Component

A sophisticated and feature-rich rating display component that provides enhanced rating visualization with optional icons, labels, and configurable rating scales. This component offers professional rating display with enhanced user experience and interactive rating functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, rating validation, CSS classes
**JavaScript Library:** Alpine.js (for interactive functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/rating.blade.php`
- **Tests:** `tests/Components/ViewRatingTest.php` (to be created)
- **Documentation:** `docs/view-rating.md`

## Basic Usage

### Simple Rating Display
```blade
<x-view-rating value="4" />
```

### With Icon
```blade
<x-view-rating value="4" icon="star" />
```

### With Label
```blade
<x-view-rating value="4" label="Rating: " />
```

### With Custom Rating Scale
```blade
<x-view-rating value="4" rating="10" />
```

### With Number Icons
```blade
<x-view-rating value="4" icon="number" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | int | Rating value to display | `4`, `5`, `3.5` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display for rating | `'star'`, `'heart'`, `'thumbs-up'`, `'number'` |
| label | string | null | Label text to display before the rating | `'Rating: '`, `'Score: '`, `'Grade: '` |
| rating | int | 5 | Maximum rating scale | `5`, `10`, `100` |
| settings | array | [] | Additional settings for customization | `['icon' => 'star', 'rating' => 10]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'rating-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="rating-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard Rating Display
**Usage:** `<x-view-rating value="4">` (default)
**Description:** Basic rating display with 5-star scale
**Features:**
- 5-star rating scale
- Clean, minimal styling
- Professional appearance
- Default star icons

### Icon Rating Display
**Usage:** `<x-view-rating value="4" icon="star">`
**Description:** Rating display with custom icons
**Features:**
- Custom icon integration
- Visual rating representation
- Professional styling
- Enhanced user experience

### Number Rating Display
**Usage:** `<x-view-rating value="4" icon="number">`
**Description:** Rating display with number badges
**Features:**
- Number badge display
- Clear rating indication
- Professional styling
- Enhanced readability

### Custom Scale Rating Display
**Usage:** `<x-view-rating value="4" rating="10">`
**Description:** Rating display with custom scale
**Features:**
- Custom rating scale
- Flexible rating ranges
- Professional styling
- Enhanced customization

### Labeled Rating Display
**Usage:** `<x-view-rating value="4" label="Rating: ">`
**Description:** Rating display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

## Rating Functionality

### Rating Visualization
The component displays ratings using:
- Icon-based representation
- Number badge representation
- Color-coded indicators
- Professional styling

### Rating Scale Support
The component supports various rating scales:
- Default 5-star scale
- Custom rating scales
- Flexible rating ranges
- Professional appearance

### Icon Integration
The component supports multiple icon types:
- Star icons (default)
- Heart icons
- Thumbs-up icons
- Number badges
- Custom icons

### Settings Override
The component supports settings override:
- Icon override via settings
- Rating scale override via settings
- Flexible configuration
- Professional customization

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Rating content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-rating value="4">
    Additional Content
</x-view-rating>
```

## Usage Examples

### Basic Rating Display
```blade
<x-view-rating value="4" />
```

### Rating with Icon
```blade
<x-view-rating 
    value="4" 
    icon="star" />
```

### Rating with Label
```blade
<x-view-rating 
    value="4" 
    label="Rating: " />
```

### Rating with Custom Scale
```blade
<x-view-rating 
    value="4" 
    rating="10" />
```

### Rating with Number Icons
```blade
<x-view-rating 
    value="4" 
    icon="number" />
```

### Rating with Custom Classes
```blade
<x-view-rating 
    value="4" 
    class="text-primary fw-bold" />
```

### Rating with Custom ID
```blade
<x-view-rating 
    value="4" 
    id="custom-rating-id" />
```

### Rating with Data Attributes
```blade
<x-view-rating 
    value="4" 
    data-test="rating-component"
    data-type="display-rating" />
```

### Rating with Aria Attributes
```blade
<x-view-rating 
    value="4" 
    aria-label="Rating display"
    aria-describedby="rating-description" />
```

### Rating with Role Attribute
```blade
<x-view-rating 
    value="4" 
    role="text" />
```

### Rating with Tabindex
```blade
<x-view-rating 
    value="4" 
    tabindex="0" />
```

### Rating with Form Attribute
```blade
<x-view-rating 
    value="4" 
    form="my-form" />
```

### Rating with Autocomplete
```blade
<x-view-rating 
    value="4" 
    autocomplete="off" />
```

### Rating with Novalidate
```blade
<x-view-rating 
    value="4" 
    novalidate />
```

### Rating with Accept
```blade
<x-view-rating 
    value="4" 
    accept="rating/*" />
```

### Rating with Capture
```blade
<x-view-rating 
    value="4" 
    capture="environment" />
```

### Rating with Max
```blade
<x-view-rating 
    value="4" 
    max="100" />
```

### Rating with Min
```blade
<x-view-rating 
    value="4" 
    min="5" />
```

### Rating with Step
```blade
<x-view-rating 
    value="4" 
    step="1" />
```

### Rating with Pattern
```blade
<x-view-rating 
    value="4" 
    pattern="[0-9]+" />
```

### Rating with Spellcheck
```blade
<x-view-rating 
    value="4" 
    spellcheck="false" />
```

### Rating with Translate
```blade
<x-view-rating 
    value="4" 
    translate="no" />
```

### Rating with Contenteditable
```blade
<x-view-rating 
    value="4" 
    contenteditable="true" />
```

### Rating with Contextmenu
```blade
<x-view-rating 
    value="4" 
    contextmenu="rating-menu" />
```

### Rating with Dir
```blade
<x-view-rating 
    value="4" 
    dir="rtl" />
```

### Rating with Draggable
```blade
<x-view-rating 
    value="4" 
    draggable="true" />
```

### Rating with Dropzone
```blade
<x-view-rating 
    value="4" 
    dropzone="copy" />
```

### Rating with Hidden
```blade
<x-view-rating 
    value="4" 
    hidden />
```

### Rating with Lang
```blade
<x-view-rating 
    value="4" 
    lang="en" />
```

### Rating with Settings Array
```blade
<x-view-rating 
    value="4" 
    :settings="['icon' => 'star', 'rating' => 10]" />
```

## Common Patterns

### Product Rating Interface
```blade
<div class="product-rating-interface">
    <h4>Product Ratings</h4>
    
    <x-view-rating 
        value="4" 
        icon="star" 
        label="Overall Rating: "
        class="text-primary" />
    
    <x-view-rating 
        value="5" 
        icon="star" 
        label="Quality: "
        class="text-success" />
    
    <x-view-rating 
        value="3" 
        icon="star" 
        label="Value: "
        class="text-warning" />
    
    <x-view-rating 
        value="4" 
        icon="star" 
        label="Design: "
        class="text-info" />
</div>
```

### Review Rating Interface
```blade
<div class="review-rating-interface">
    <h4>Review Ratings</h4>
    
    <x-view-rating 
        value="5" 
        icon="star" 
        label="5 Stars: "
        class="text-success" />
    
    <x-view-rating 
        value="4" 
        icon="star" 
        label="4 Stars: "
        class="text-primary" />
    
    <x-view-rating 
        value="3" 
        icon="star" 
        label="3 Stars: "
        class="text-warning" />
    
    <x-view-rating 
        value="2" 
        icon="star" 
        label="2 Stars: "
        class="text-danger" />
</div>
```

### Performance Rating Interface
```blade
<div class="performance-rating-interface">
    <h4>Performance Ratings</h4>
    
    <x-view-rating 
        value="8" 
        icon="number" 
        rating="10" 
        label="Speed: "
        class="text-primary" />
    
    <x-view-rating 
        value="9" 
        icon="number" 
        rating="10" 
        label="Reliability: "
        class="text-success" />
    
    <x-view-rating 
        value="7" 
        icon="number" 
        rating="10" 
        label="Efficiency: "
        class="text-info" />
    
    <x-view-rating 
        value="6" 
        icon="number" 
        rating="10" 
        label="Usability: "
        class="text-warning" />
</div>
```

### Satisfaction Rating Interface
```blade
<div class="satisfaction-rating-interface">
    <h4>Customer Satisfaction</h4>
    
    <x-view-rating 
        value="5" 
        icon="heart" 
        label="Very Satisfied: "
        class="text-success" />
    
    <x-view-rating 
        value="4" 
        icon="heart" 
        label="Satisfied: "
        class="text-primary" />
    
    <x-view-rating 
        value="3" 
        icon="heart" 
        label="Neutral: "
        class="text-warning" />
    
    <x-view-rating 
        value="2" 
        icon="heart" 
        label="Dissatisfied: "
        class="text-danger" />
</div>
```

### Feedback Rating Interface
```blade
<div class="feedback-rating-interface">
    <h4>Feedback Ratings</h4>
    
    <x-view-rating 
        value="5" 
        icon="thumbs-up" 
        label="Excellent: "
        class="text-success" />
    
    <x-view-rating 
        value="4" 
        icon="thumbs-up" 
        label="Good: "
        class="text-primary" />
    
    <x-view-rating 
        value="3" 
        icon="thumbs-up" 
        label="Average: "
        class="text-warning" />
    
    <x-view-rating 
        value="2" 
        icon="thumbs-up" 
        label="Poor: "
        class="text-danger" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_rating_with_basic_value()
{
    $view = $this->blade('<x-view-rating value="4" />');
    
    $view->assertSee('4');
}

/** @test */
public function it_renders_view_rating_with_icon()
{
    $view = $this->blade('<x-view-rating value="4" icon="star" />');
    
    $view->assertSee('4');
    $view->assertSee('star');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewRatingComponent::class)
        ->assertSee('<x-view-rating')
        ->set('value', 4)
        ->assertSee('4');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to rating elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to rating elements

### Keyboard Navigation
- Tab navigation to rating
- Rating display accessibility
- Icon accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- Rating context communication
- Icon description support
- Rating purpose indication
- Rating scale indication

### Rating Accessibility
- Clear rating purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Rating scale accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for interactive functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Rating display with HTML output

## Troubleshooting

### Common Issues

#### Rating Not Displaying
**Problem:** Rating value not showing
**Solution:** Check if value attribute is set and is numeric

#### Icons Not Showing
**Problem:** Icons not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Rating Scale Issues
**Problem:** Rating scale not working correctly
**Solution:** Check rating attribute and ensure it's a positive integer

#### Styling Issues
**Problem:** Rating doesn't look like expected
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
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with rating display functionality
- Rating visualization integration for interactive functionality
- Icon integration support
- Custom rating scale support
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/rating.blade.php`
2. Add/update tests in `tests/Components/ViewRatingTest.php`
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
- [Icon Component](../icon.md)
- [Rating Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View Rating Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
