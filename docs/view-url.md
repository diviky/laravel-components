# View URL Component

A sophisticated and feature-rich URL display component that provides enhanced web address rendering with optional icons, labels, copy-to-clipboard functionality, and intelligent URL linking with configurable target attributes. This component offers professional URL display with enhanced user experience and interactive web functionality.

## Overview

**Component Type:** View Display  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Icon component, clipboard functionality, URL validation
**JavaScript Library:** Alpine.js (for clipboard functionality)

## Files

- **View File:** `resources/views/bootstrap-5/view/url.blade.php`
- **Tests:** `tests/Components/ViewUrlTest.php` (to be created)
- **Documentation:** `docs/view-url.md`

## Basic Usage

### Simple URL Display
```blade
<x-view-url value="https://example.com" />
```

### With Label
```blade
<x-view-url value="https://example.com" label="Website: " />
```

### With Icon
```blade
<x-view-url value="https://example.com" icon="link" />
```

### With Copy Functionality
```blade
<x-view-url value="https://example.com" copy />
```

### With Custom Target
```blade
<x-view-url value="https://example.com" target="_self" />
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| value | string\|array | URL value to display | `'https://example.com'`, `['url' => 'https://example.com', 'label' => 'Example Site']` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| icon | string | null | Icon name to display before the URL | `'link'`, `'external-link'`, `'globe'`, `'world'` |
| label | string | null | Label text to display before the URL | `'Website: '`, `'Link: '`, `'Resource: '` |
| copy | boolean | false | Enable copy-to-clipboard functionality | `true` |
| target | string | '_blank' | Link target attribute | `'_self'`, `'_blank'`, `'_parent'`, `'_top'` |
| settings | array | [] | Additional settings for customization | `['validate' => true]` |

### Inherited Attributes

This component supports all standard HTML attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| class | string | '' | CSS classes | `'text-primary'`, `'fw-bold'` |
| id | string | auto-generated | Element ID | `'url-display'` |
| style | string | '' | Inline CSS styles | `'color: blue;'` |
| data-* | string | null | Custom data attributes | `data-test="url-component"` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'view-content'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| URL | string | null | Action type for authorization | `'view'` |

## Component Variants

### Standard URL Display
**Usage:** `<x-view-url value="https://example.com">` (default)
**Description:** Basic URL display with automatic linking and new tab opening
**Features:**
- Automatic URL linking
- New tab opening by default
- Clean, minimal styling
- Professional appearance

### Labeled URL Display
**Usage:** `<x-view-url value="https://example.com" label="Website: ">`
**Description:** URL display with descriptive label
**Features:**
- Descriptive labels
- Clear context
- Professional styling
- Enhanced readability

### Icon URL Display
**Usage:** `<x-view-url value="https://example.com" icon="link">`
**Description:** URL display with contextual icon
**Features:**
- Visual context
- Icon integration
- Professional styling
- Enhanced user experience

### Copyable URL Display
**Usage:** `<x-view-url value="https://example.com" copy>`
**Description:** URL display with copy-to-clipboard functionality
**Features:**
- Copy functionality
- Interactive features
- User convenience
- Professional styling

### Custom Target URL Display
**Usage:** `<x-view-url value="https://example.com" target="_self">`
**Description:** URL display with custom link target behavior
**Features:**
- Custom link targets
- Flexible navigation
- User experience control
- Professional styling

## URL Functionality

### URL Linking
The component automatically creates clickable links for URLs, allowing users to:
- Click to navigate to the URL
- Open in new tabs by default
- Control link behavior with target attributes
- Access web resources directly

### URL Validation
The component includes built-in URL validation to ensure:
- Proper URL format
- Valid URL structure
- Professional appearance
- User experience consistency

### Copy-to-Clipboard
When enabled, the copy functionality allows users to:
- Copy URLs to clipboard
- Paste into other applications
- Share URLs easily
- Improve workflow efficiency

### Array Value Support
The component supports both string and array values:
- **String Value**: `'https://example.com'` - displays URL as both link and text
- **Array Value**: `['url' => 'https://example.com', 'label' => 'Example Site']` - displays custom label with URL link

## Slots

### Required Slots

#### Default Slot
- **Purpose:** URL content and additional text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-view-url value="https://example.com">
    Additional Content
</x-view-url>
```

## Usage Examples

### Basic URL Display
```blade
<x-view-url value="https://example.com" />
```

### URL with Label
```blade
<x-view-url 
    value="https://example.com" 
    label="Website: " />
```

### URL with Icon
```blade
<x-view-url 
    value="https://example.com" 
    icon="link" />
```

### URL with Copy Functionality
```blade
<x-view-url 
    value="https://example.com" 
    copy />
```

### URL with Custom Target
```blade
<x-view-url 
    value="https://example.com" 
    target="_self" />
```

### URL with Array Value
```blade
<x-view-url 
    :value="['url' => 'https://example.com', 'label' => 'Example Site']" />
```

### URL with Custom Classes
```blade
<x-view-url 
    value="https://example.com" 
    class="text-primary fw-bold" />
```

### URL with Custom ID
```blade
<x-view-url 
    value="https://example.com" 
    id="custom-url-id" />
```

### URL with Data Attributes
```blade
<x-view-url 
    value="https://example.com" 
    data-test="url-component"
    data-type="display-url" />
```

### URL with Aria Attributes
```blade
<x-view-url 
    value="https://example.com" 
    aria-label="URL display"
    aria-describedby="url-description" />
```

### URL with Role Attribute
```blade
<x-view-url 
    value="https://example.com" 
    role="text" />
```

### URL with Tabindex
```blade
<x-view-url 
    value="https://example.com" 
    tabindex="0" />
```

### URL with Form Attribute
```blade
<x-view-url 
    value="https://example.com" 
    form="my-form" />
```

### URL with Autocomplete
```blade
<x-view-url 
    value="https://example.com" 
    autocomplete="off" />
```

### URL with Novalidate
```blade
<x-view-url 
    value="https://example.com" 
    novalidate />
```

### URL with Accept
```blade
<x-view-url 
    value="https://example.com" 
    accept="url/*" />
```

### URL with Capture
```blade
<x-view-url 
    value="https://example.com" 
    capture="environment" />
```

### URL with Max
```blade
<x-view-url 
    value="https://example.com" 
    max="100" />
```

### URL with Min
```blade
<x-view-url 
    value="https://example.com" 
    min="5" />
```

### URL with Step
```blade
<x-view-url 
    value="https://example.com" 
    step="1" />
```

### URL with Pattern
```blade
<x-view-url 
    value="https://example.com" 
    pattern="https?://.+" />
```

### URL with Spellcheck
```blade
<x-view-url 
    value="https://example.com" 
    spellcheck="false" />
```

### URL with Translate
```blade
<x-view-url 
    value="https://example.com" 
    translate="no" />
```

### URL with Contenteditable
```blade
<x-view-url 
    value="https://example.com" 
    contenteditable="true" />
```

### URL with Contextmenu
```blade
<x-view-url 
    value="https://example.com" 
    contextmenu="url-menu" />
```

### URL with Dir
```blade
<x-view-url 
    value="https://example.com" 
    dir="rtl" />
```

### URL with Draggable
```blade
<x-view-url 
    value="https://example.com" 
    draggable="true" />
```

### URL with Dropzone
```blade
<x-view-url 
    value="https://example.com" 
    dropzone="copy" />
```

### URL with Hidden
```blade
<x-view-url 
    value="https://example.com" 
    hidden />
```

### URL with Lang
```blade
<x-view-url 
    value="https://example.com" 
    lang="en" />
```

### URL with Settings Array
```blade
<x-view-url 
    value="https://example.com" 
    :settings="['validate' => true]" />
```

## Common Patterns

### Resource Management Interface
```blade
<div class="resource-management-interface">
    <h4>External Resources</h4>
    
    <x-view-url 
        value="https://docs.example.com" 
        icon="book" 
        label="Documentation: "
        class="text-primary" />
    
    <x-view-url 
        value="https://api.example.com" 
        icon="code" 
        label="API Reference: "
        class="text-info" />
    
    <x-view-url 
        value="https://support.example.com" 
        icon="help-circle" 
        label="Support: "
        class="text-success" />
    
    <x-view-url 
        value="https://status.example.com" 
        icon="activity" 
        label="Status Page: "
        class="text-warning" />
</div>
```

### Social Media Interface
```blade
<div class="social-media-interface">
    <h4>Social Media Links</h4>
    
    <x-view-url 
        value="https://twitter.com/example" 
        icon="twitter" 
        label="Twitter: "
        class="text-info" />
    
    <x-view-url 
        value="https://linkedin.com/company/example" 
        icon="linkedin" 
        label="LinkedIn: "
        class="text-primary" />
    
    <x-view-url 
        value="https://github.com/example" 
        icon="github" 
        label="GitHub: "
        class="text-dark" />
    
    <x-view-url 
        value="https://facebook.com/example" 
        icon="facebook" 
        label="Facebook: "
        class="text-primary" />
</div>
```

### Documentation Interface
```blade
<div class="documentation-interface">
    <h4>Documentation Links</h4>
    
    <x-view-url 
        :value="['url' => 'https://docs.example.com/getting-started', 'label' => 'Getting Started Guide']" 
        icon="play" 
        class="text-success" />
    
    <x-view-url 
        :value="['url' => 'https://docs.example.com/api', 'label' => 'API Documentation']" 
        icon="code" 
        class="text-info" />
    
    <x-view-url 
        :value="['url' => 'https://docs.example.com/tutorials', 'label' => 'Video Tutorials']" 
        icon="video" 
        class="text-warning" />
    
    <x-view-url 
        :value="['url' => 'https://docs.example.com/examples', 'label' => 'Code Examples']" 
        icon="file-code" 
        class="text-primary" />
</div>
```

### Integration Interface
```blade
<div class="integration-interface">
    <h4>Integration Links</h4>
    
    <x-view-url 
        value="https://app.example.com" 
        icon="external-link" 
        label="Main App: "
        class="text-success" />
    
    <x-view-url 
        value="https://admin.example.com" 
        icon="settings" 
        label="Admin Panel: "
        class="text-warning" />
    
    <x-view-url 
        value="https://analytics.example.com" 
        icon="chart-bar" 
        label="Analytics: "
        class="text-info" />
    
    <x-view-url 
        value="https://monitoring.example.com" 
        icon="activity" 
        label="Monitoring: "
        class="text-danger" />
</div>
```

### Marketing Interface
```blade
<div class="marketing-interface">
    <h4>Marketing Resources</h4>
    
    <x-view-url 
        value="https://landing.example.com" 
        icon="home" 
        label="Landing Page: "
        class="text-primary" />
    
    <x-view-url 
        value="https://blog.example.com" 
        icon="file-text" 
        label="Blog: "
        class="text-success" />
    
    <x-view-url 
        value="https://newsletter.example.com" 
        icon="mail" 
        label="Newsletter: "
        class="text-info" />
    
    <x-view-url 
        value="https://events.example.com" 
        icon="calendar" 
        label="Events: "
        class="text-warning" />
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_view_url_with_basic_value()
{
    $view = $this->blade('<x-view-url value="https://example.com" />');
    
    $view->assertSee('https://example.com');
    $view->assertSee('href="https://example.com"');
    $view->assertSee('target="_blank"');
}

/** @test */
public function it_renders_view_url_with_array_value()
{
    $view = $this->blade('<x-view-url :value="[\'url\' => \'https://example.com\', \'label\' => \'Example Site\']" />');
    
    $view->assertSee('Example Site');
    $view->assertSee('href="https://example.com"');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(ViewUrlComponent::class)
        ->assertSee('<x-view-url')
        ->set('value', 'https://example.com')
        ->assertSee('https://example.com');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to URL elements
- `aria-describedby`: Links to descriptions
- `role="text"`: Applied to URL elements

### Keyboard Navigation
- Tab navigation to URL
- Copy functionality accessibility
- URL link accessibility
- Screen reader support

### Screen Reader Support
- Proper labeling and descriptions
- URL context communication
- Icon description support
- Copy functionality announcement
- Link purpose indication

### URL Accessibility
- Clear URL purpose indication
- Proper context communication
- Helpful descriptions
- Icon accessibility
- Link accessibility

## Browser Compatibility

- **Supported Browsers:** All modern browsers with ES6 support
- **JavaScript Dependencies:** Alpine.js (for clipboard functionality)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** URL display with HTML output

## Troubleshooting

### Common Issues

#### URL Not Displaying
**Problem:** URL value not showing
**Solution:** Check if value attribute is set and not null

#### Linking Not Working
**Problem:** URL links not functioning correctly
**Solution:** Check URL format and target attribute settings

#### Icon Not Showing
**Problem:** Icon not displaying correctly
**Solution:** Check icon name and ensure icon component is available

#### Copy Functionality Not Working
**Problem:** Copy-to-clipboard not functioning
**Solution:** Check clipboard JavaScript library and permissions

#### Styling Issues
**Problem:** URL doesn't look like expected
**Solution:** Check CSS classes and Bootstrap integration

## Related Components

- **View String:** String display component
- **View Number:** Number display component
- **View Currency:** Currency display component
- **View Date:** Date display component
- **View Boolean:** Boolean display component
- **View Email:** Email display component
- **Icon:** Icon component for visual elements

## Changelog

### Version 1.0.0
- Initial release with URL display functionality
- URL linking integration for interactive functionality
- Array value support for custom labels
- Icon integration support
- Label display support
- Copy-to-clipboard functionality
- Professional styling

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/view/url.blade.php`
2. Add/update tests in `tests/Components/ViewUrlTest.php`
3. Update this documentation

## See Also

- [View String Component](../view-string.md)
- [View Number Component](../view-number.md)
- [View Currency Component](../view-currency.md)
- [View Date Component](../view-date.md)
- [View Boolean Component](../view-boolean.md)
- [View Email Component](../view-email.md)
- [Icon Component](../icon.md)
- [URL Display Best Practices](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [View URL Design Patterns](https://www.nngroup.com/articles/form-design-white-space/)
