# Laravel Components Documentation

Welcome to the Laravel Components documentation. This package provides a comprehensive collection of Blade components for Laravel applications using Bootstrap 5 (with support for Bootstrap 4 as well).

## Installation

```bash
composer require diviky/laravel-components
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=laravel-components-config
```

## Available Components

### Core Form Components
- [Form](form.md) - Main form wrapper with CSRF, validation, and behaviors
- [Form Input](form-input.md) - Text inputs with icons, validation, and types
- [Form Select](form-select.md) - Dropdown selects with multiple options and data binding
- [Form Textarea](form-textarea.md) - Multi-line text input with character limits
- [Form Checkbox](form-checkbox.md) - Checkbox inputs with validation
- [Form Switch](form-switch.md) - Toggle switches for boolean values
- [Form Submit](form-submit.md) - Submit buttons with loading states
- [Form File](form-file.md) - File upload inputs
- [Form Radio](form-radio.md) - Radio button inputs
- [Form Range](form-range.md) - Range slider inputs
- [Form Hidden](form-hidden.md) - Hidden input fields

### Advanced Form Components
- [Form Button Group](form-button-group.md) - Button group for form selections
- [Form Select Group](form-select-group.md) - Grouped select options
- [Form Date](form-date.md) - Date picker inputs
- [Form Time](form-time.md) - Time picker inputs
- [Form DateTime](form-datetime.md) - Combined date and time pickers
- [Form Tags](form-tags.md) - Tag input with autocomplete
- [Form Rating](form-rating.md) - Star rating inputs
- [Form Signature](form-signature.md) - Digital signature capture
- [Form Image](form-image.md) - Image upload with preview
- [Form Dropzone](form-dropzone.md) - Drag and drop file uploads
- [Form Pin](form-pin.md) - PIN/OTP input fields
- [Form Toggle](form-toggle.md) - Toggle button inputs
- [Form Colors](form-colors.md) - Color picker inputs
- [Form Currency](form-currency.md) - Currency input with formatting

### Layout Components
- [Card](card.md) - Feature-rich content container with status, ribbons, and images
- [Page](page-enhanced.md) - Complete page layout with header, body, and footer
- [Container](container.md) - Responsive container element
- [Grid](grid.md) - Grid layout system
- [Modal](modal.md) - Dialog popup window
- [Accordion](accordion.md) - Collapsible content containers
- [Tab](tab.md) - Tabbed interface
- [Divider](divider.md) - Section divider with optional label

### Navigation Components
- [Breadcrumb](breadcrumb.md) - Navigation hierarchy trail
- [Dropdown](dropdown.md) - Toggleable context menu
- [Nav](nav.md) - Navigation menu and tabs
- [Spotlight](spotlight.md) - Command palette/search interface

### Editor Components
- [Editor Components](editor-components.md) - Rich text editors (TinyMCE, Markdown, Quill)
- [Editor TinyMCE](editor-tinymce.md) - TinyMCE rich text editor
- [Editor Quill](editor-quill.md) - Quill editor integration
- [Editor Markdown](editor-markdown.md) - Markdown editor with preview
- [Editor Code](editor-code.md) - Code editor with syntax highlighting

### Filter Components
- [Filter Components](filter-components.md) - Search and date range filters
- [Filter Search](filter-search.md) - Search input with auto-submit
- [Filter Dates](filter-dates.md) - Date range filtering

### Display Components
- [Alert](alert.md) - Contextual feedback messages
- [Avatar](avatar.md) - User avatar with image or initials
- [Badge](badge.md) - Labels and counters
- [Button](button.md) - Action buttons
- [Counter](counter.md) - Animated numerical counter
- [Popover](popover.md) - Small overlay content
- [Status](status.md) - Status indicators
- [Steps](steps.md) - Multi-step process indicator
- [Table](table.md) - Data tables
- [View Components](view-components.md) - Read-only data display

### Utility Components
- [Fragment](fragment.md) - AJAX content loader
- [Script](script.md) - JavaScript inclusion
- [Style](style.md) - CSS inclusion

## Framework Support

The default framework is Bootstrap 5, but you can switch to Bootstrap 4 by setting the `LARAVEL_COMPONENTS_FRAMEWORK` environment variable to `bootstrap-4` in your `.env` file:

```
LARAVEL_COMPONENTS_PREFIX=bootstrap-4
```

## Customization

You can publish the views to customize them:

```bash
php artisan vendor:publish --tag=laravel-components-views
```

## Component Prefix

You can set a prefix for all components by setting the `LARAVEL_COMPONENTS_PREFIX` environment variable:

```
LARAVEL_COMPONENTS_PREFIX=ui
```

This would change the usage from `<x-alert>` to `<x-ui-alert>`.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

The Laravel Components package is open-sourced software licensed under the [MIT license](LICENSE.md).
