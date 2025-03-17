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

### Layout Components
- [Accordion](accordion.md) - Collapsible content containers
- [Card](card.md) - Flexible content container with header, body, and footer
- [Container](container.md) - Responsive container element
- [Divider](divider.md) - Section divider with optional label
- [Grid](grid.md) - Grid layout system
- [Modal](modal.md) - Dialog popup window
- [Page](page.md) - Page layout with header, body and footer sections
- [Tab](tab.md) - Tabbed interface

### Navigation Components
- [Breadcrumb](breadcrumb.md) - Navigation hierarchy trail
- [Dropdown](dropdown.md) - Toggleable context menu
- [Nav](nav.md) - Navigation menu and tabs
- [Spotlight](spotlight.md) - Command palette/search interface

### Form Components
- [Form Input Components](form-components.md) - Text inputs, selects, checkboxes, etc.
- [Filter Components](filter-components.md) - Search and date range filters
- [Editor Components](editor-components.md) - Rich text editors (TinyMCE, Markdown, Quill)

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
