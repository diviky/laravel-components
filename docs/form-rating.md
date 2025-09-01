# Form Rating Component

An interactive rating component with Alpine.js integration that allows users to provide star-based or number-based ratings. Features include hover effects, click-to-rate functionality, customizable icons, and Livewire compatibility.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Alpine.js, extends base Component class

## Files

- **PHP Class:** `src/Components/FormRating.php`
- **View File:** `resources/views/bootstrap-5/form-rating.blade.php`
- **Documentation:** `docs/form-rating.md`

## Basic Usage

### Simple Star Rating
```blade
<x-form-rating name="rating" label="Rate this product" />
```

### With Custom Rating Scale
```blade
<x-form-rating 
    name="rating" 
    label="Rate this service"
    :rating="10">
</x-form-rating>
```

### With Custom Icon
```blade
<x-form-rating 
    name="rating" 
    label="Rate this experience"
    icon="star"
    size="lg">
</x-form-rating>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'rating'` or `'score'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | string | '' | Current rating value | `'4'` |
| label | string | '' | Form field label | `'Rate this product'` |
| size | string | '' | Icon size variant | `'sm'`, `'lg'` |
| icon | string | '' | Icon name for rating | `'star'`, `'heart'` |
| language | string | null | Language-specific naming | `'en'`, `'es'` |
| bind | mixed | null | Model binding | `$product` |
| default | mixed | null | Default rating value | `'3'` |
| rating | int | 5 | Maximum rating scale | `10` |
| half | boolean | false | Enable half-star ratings | `true` |
| settings | array | [] | Rating configuration | `['rating' => 10, 'icon' => 'star']` |

### Inherited Attributes

This component supports all standard HTML input attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'rating-input'` |
| class | string | null | Additional CSS classes | `'custom-rating'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| title | string | null | Tooltip text | `'Click to rate'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'rate-products'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'create'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the rating
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Click on a star to rate from 1 to 5
</x-slot:help>
```

## Usage Examples

### Basic Star Rating
```blade
<x-form-rating 
    name="rating" 
    label="Rate this product"
    icon="star">
</x-form-rating>
```

### Custom Rating Scale
```blade
<x-form-rating 
    name="score" 
    label="Rate this service (1-10)"
    :rating="10"
    icon="star">
</x-form-rating>
```

### With Custom Icon and Size
```blade
<x-form-rating 
    name="rating" 
    label="Rate this experience"
    icon="heart"
    size="lg"
    :rating="5">
</x-form-rating>
```

### With Default Value
```blade
<x-form-rating 
    name="rating" 
    label="Current Rating"
    :default="4"
    icon="star">
</x-form-rating>
```

### With Model Binding
```blade
<x-form-rating 
    name="rating" 
    label="Product Rating"
    :bind="$product"
    bind-key="rating"
    icon="star">
</x-form-rating>
```

### With Language Support
```blade
<x-form-rating 
    name="rating" 
    label="Rating (English)"
    language="en"
    icon="star"
    :default="$product->ratings['en'] ?? 0">
</x-form-rating>
```

### With Settings Configuration
```blade
<x-form-rating 
    name="rating" 
    label="Rate this item"
    :settings="[
        'rating' => 10,
        'icon' => 'star',
        'size' => 'lg',
        'half' => true
    ]">
</x-form-rating>
```

### Livewire Integration
```blade
<x-form-rating 
    wire:model="selectedRating"
    name="rating" 
    label="Rate this product"
    icon="star">
    
    <x-slot:help>
        Current rating: {{ $selectedRating }}/5
    </x-slot:help>
</x-form-rating>
```

### With Validation
```blade
<x-form-rating 
    name="rating" 
    label="Rate this product"
    required
    icon="star">
    
    <x-slot:help>
        Please provide a rating from 1 to 5
    </x-slot:help>
</x-form-rating>
```

### Custom Styling
```blade
<x-form-rating 
    name="rating" 
    label="Rate this experience"
    icon="heart"
    class="custom-rating"
    style="--rating-color: #ff6b6b;">
</x-form-rating>
```

### Number-Based Rating
```blade
<x-form-rating 
    name="rating" 
    label="Rate this service"
    icon="number"
    :rating="10">
</x-form-rating>
```

### Half-Star Rating
```blade
<x-form-rating 
    name="rating" 
    label="Rate this product"
    icon="star"
    :half="true"
    :rating="5">
</x-form-rating>
```

## Component Variants

### Star Rating
**Usage:** `<x-form-rating icon="star">`
**Description:** Standard star-based rating
**Features:**
- Star icon display
- Hover effects
- Click to rate
- Visual feedback

### Number Rating
**Usage:** `<x-form-rating icon="number">`
**Description:** Number-based rating display
**Features:**
- Number badges
- Color-coded feedback
- Customizable scale
- Badge styling

### Heart Rating
**Usage:** `<x-form-rating icon="heart">`
**Description:** Heart-based rating system
**Features:**
- Heart icon display
- Emotional rating context
- Customizable colors
- Interactive feedback

### Custom Icon Rating
**Usage:** `<x-form-rating icon="custom-icon">`
**Description:** Any icon-based rating
**Features:**
- Custom icon support
- Flexible styling
- Size customization
- Theme integration

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-rating>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-rating' => [
        'view' => 'laravel-components::{framework}.form-rating',
        'class' => Components\FormRating::class,
    ],
],
```

### Alpine.js Configuration
The component uses Alpine.js with these default settings:
- **Rating management:** Reactive rating state
- **Hover effects:** Current rating preview
- **Click handling:** Rate function for selection
- **Size control:** Configurable rating scale

## Common Patterns

### Product Rating System
```blade
<x-form-rating 
    name="product_rating" 
    label="Rate this product"
    icon="star"
    :rating="5"
    :default="$product->average_rating">
    
    <x-slot:help>
        Help other customers by rating this product
    </x-slot:help>
</x-form-rating>
```

### Service Quality Rating
```blade
<x-form-rating 
    name="service_rating" 
    label="Service Quality"
    icon="star"
    :rating="10"
    size="lg">
    
    <x-slot:help>
        Rate the quality of service from 1 to 10
    </x-slot:help>
</x-form-rating>
```

### User Experience Rating
```blade
<x-form-rating 
    name="ux_rating" 
    label="User Experience"
    icon="heart"
    :rating="5"
    :default="$feedback->ux_rating">
    
    <x-slot:help>
        How was your experience using our platform?
    </x-slot:help>
</x-form-rating>
```

### Multi-Criteria Rating
```blade
<div class="rating-criteria">
    <x-form-rating 
        name="quality_rating" 
        label="Quality"
        icon="star"
        :rating="5">
    </x-form-rating>
    
    <x-form-rating 
        name="value_rating" 
        label="Value for Money"
        icon="star"
        :rating="5">
    </x-form-rating>
    
    <x-form-rating 
        name="delivery_rating" 
        label="Delivery"
        icon="star"
        :rating="5">
    </x-form-rating>
</div>
```

### Review System Integration
```blade
<div class="review-form">
    <x-form-rating 
        name="overall_rating" 
        label="Overall Rating"
        icon="star"
        :rating="5"
        required>
    </x-form-rating>
    
    <x-form-textarea 
        name="review_text" 
        label="Your Review"
        placeholder="Share your experience...">
    </x-form-textarea>
    
    <x-form-button type="submit">
        Submit Review
    </x-form-button>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_rating_with_basic_attributes()
{
    $view = $this->blade('<x-form-rating name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-rating');
}

/** @test */
public function it_renders_form_rating_with_custom_scale()
{
    $view = $this->blade('<x-form-rating name="rating" :rating="10" />');
    
    $view->assertSee('name="rating"');
    $view->assertSee('rating: 10');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(RatingComponent::class)
        ->assertSee('<x-form-rating')
        ->set('selectedRating', 4)
        ->assertSee('4');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to rating container
- `aria-describedby`: Links to help text
- `role="radiogroup"`: Applied to rating container

### Keyboard Navigation
- Tab navigation to rating container
- Arrow keys for rating selection
- Enter key for rating confirmation
- Space key for rating selection

### Screen Reader Support
- Proper labeling and descriptions
- Rating state announcements
- Interactive feedback communication
- Scale information

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js 3.x
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling

## Troubleshooting

### Common Issues

#### Rating Not Updating
**Problem:** Rating value doesn't change on click
**Solution:** Ensure Alpine.js is properly loaded and check for JavaScript errors

#### Icons Not Displaying
**Problem:** Rating icons don't show
**Solution:** Verify icon name is correct and icon component is available

#### Styling Conflicts
**Problem:** Component styling doesn't match design
**Solution:** Override default CSS classes and check for framework conflicts

#### Livewire Integration Issues
**Problem:** Rating updates don't persist in Livewire
**Solution:** Use proper wire:model binding and ensure component re-renders

#### Half-Star Ratings Not Working
**Problem:** Half-star functionality doesn't work
**Solution:** Ensure half attribute is set to true and check CSS implementation

## Related Components

- **Form Input:** Basic input component
- **Form Checkbox:** Boolean input component
- **Form Toggle:** Toggle switch component
- **Icon:** Icon display component
- **Badge:** Rating badge component

## Changelog

### Version 1.0.0
- Initial release with Alpine.js integration
- Star and number rating support
- Hover effects and click handling
- Customizable rating scale
- Livewire compatibility

## Contributing

To contribute to this component:
1. Update the PHP class: `src/Components/FormRating.php`
2. Update the view file: `resources/views/bootstrap-5/form-rating.blade.php`
3. Add/update tests in `tests/Components/FormRatingTest.php`
4. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Checkbox Component](../form-checkbox.md)
- [Form Toggle Component](../form-toggle.md)
- [Icon Component](../icon.md)
- [Badge Component](../badge.md)
- [Alpine.js Documentation](https://alpinejs.dev/)
- [Laravel Form Components](https://github.com/diviky/laravel-form-components)
