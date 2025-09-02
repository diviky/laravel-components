# Form Search Component

A specialized search input component that provides a professional interface for search queries with automatic search icon integration, comprehensive form integration, and enhanced user experience. This component extends FormInput to offer intuitive search input experiences with proper formatting and search-specific functionality.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** FormInput component, extends base form functionality
**JavaScript Library:** Alpine.js (via FormInput)

## Files

- **PHP Class:** None (view-only component)
- **View File:** `resources/views/bootstrap-5/form-search.blade.php`
- **Documentation:** `docs/form-search.md`

## Basic Usage

### Simple Search Input
```blade
<x-form-search name="query" label="Search" />
```

### With Default Value
```blade
<x-form-search 
    name="search_term" 
    label="Search"
    :default="'default search'">
</x-form-search>
```

### With Help Text
```blade
<x-form-search 
    name="search_query" 
    label="Search Query"
    help="Enter keywords to search for content">
</x-form-search>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'query'` or `'search_term'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Form field label | `'Search'` |
| value | mixed | null | Current search value | `'search term'` |
| default | mixed | null | Default search value | `'default search'` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'search']` |

### Inherited Attributes

This component extends `FormInput` and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'search-input'` |
| class | string | '' | CSS classes | `'search-input'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Enter search terms...'` |
| maxlength | number | null | Maximum character length | `255` |
| minlength | number | null | Minimum character length | `2` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'perform-search'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'search'` |

## Slots

### Optional Slots

#### `help`
- **Purpose:** Help text below the search input
- **Required:** No
- **Content Type:** HTML/Text/Components
- **Example:**
```blade
<x-slot:help>
    Enter keywords separated by spaces. Use quotes for exact phrases.
</x-slot:help>
```

#### Default Slot
- **Purpose:** Additional content after the search input
- **Required:** No
- **Content Type:** HTML/Components
- **Example:**
```blade
<x-form-search name="query">
    <small class="text-muted">Press Enter to search</small>
</x-form-search>
```

#### `icon`
- **Purpose:** Custom search icon (defaults to 'search')
- **Required:** No
- **Content Type:** Text/Icon name
- **Example:**
```blade
<x-slot:icon>magnifying-glass</x-slot:icon>
```

## Usage Examples

### Basic Search Input
```blade
<x-form-search 
    name="query" 
    label="Search">
    
    <x-slot:help>
        Enter your search terms
    </x-slot:help>
</x-form-search>
```

### Required Search Input
```blade
<x-form-search 
    name="search_query" 
    label="Search Query"
    required>
    
    <x-slot:help>
        This field is required to perform a search
    </x-slot:help>
</x-form-search>
```

### With Custom Placeholder
```blade
<x-form-search 
    name="search_terms" 
    label="Search"
    placeholder="Enter keywords, names, or phrases...">
    
    <x-slot:help>
        Search for users, content, or any information
    </x-slot:help>
</x-form-search>
```

### With Character Limits
```blade
<x-form-search 
    name="search_input" 
    label="Search"
    minlength="2"
    maxlength="100"
    placeholder="Minimum 2 characters...">
    
    <x-slot:help>
        Search term must be between 2 and 100 characters
    </x-slot:help>
</x-form-search>
```

### Livewire Integration
```blade
<x-form-search 
    wire:model.live="searchQuery"
    name="live_search" 
    label="Live Search"
    placeholder="Type to search...">
    
    <x-slot:help>
        <div class="search-status">
            <strong>Search Status:</strong><br>
            <span x-text="getSearchStatus()">Ready to search</span><br>
            <span x-text="getResultCount()">0 results found</span>
        </div>
    </x-slot:help>
</x-form-search>
```

### With Custom Classes
```blade
<x-form-search 
    name="custom_search" 
    label="Custom Search"
    class="search-input-lg"
    placeholder="Enter your search terms">
    
    <x-slot:help>
        <div class="search-tips">
            <i class="fas fa-search"></i>
            <strong>Tip:</strong> Use advanced search operators
        </div>
    </x-slot:help>
</x-form-search>
```

### Disabled Search Field
```blade
<x-form-search 
    name="locked_search" 
    label="Search"
    disabled>
    
    <x-slot:help>
        This search field is locked and cannot be used
    </x-slot:help>
</x-form-search>
```

### Readonly Search Field
```blade
<x-form-search 
    name="display_search" 
    label="Current Search"
    readonly>
    
    <x-slot:help>
        Your current search term (cannot be edited)
    </x-slot:help>
</x-form-search>
```

## Component Variants

### Standard Search Input
**Usage:** `<x-form-search>` (default)
**Description:** Basic search input with search icon
**Features:**
- Text input type with search icon
- Standard search validation
- Help and default slot support
- FormInput extension

### Icon-Customized Search Input
**Usage:** `<x-form-search><x-slot:icon>custom-icon</x-slot:icon></x-form-search>`
**Description:** Search input with custom icon
**Features:**
- Custom search icon support
- Enhanced visual customization
- Professional appearance
- Brand consistency

### Live Search Input
**Usage:** `<x-form-search wire:model.live="query">`
**Description:** Search input with real-time search
**Features:**
- Livewire real-time search
- Dynamic result updates
- Enhanced user experience
- Performance optimization

## Configuration

### Environment Variables
- `LARAVEL_COMPONENTS_FRAMEWORK`: Set to 'bootstrap-4' for Bootstrap 4 support
- `LARAVEL_COMPONENTS_PREFIX`: Add prefix to all components (e.g., 'ui' makes `<x-ui-form-search>`)

### Component Configuration
```php
// config/laravel-components.php
'components' => [
    'form-search' => [
        'view' => 'laravel-components::{framework}.form-search',
    ],
],
```

### Default Settings
The component uses these default settings:
- **Type:** `'text'`
- **Icon:** `'search'`
- **Validation:** Standard text validation
- **Search Icon:** Automatically included

### Search Icon Options
```blade
<!-- Default search icon -->
<x-form-search name="query" />

<!-- Custom search icon -->
<x-form-search name="query">
    <x-slot:icon>magnifying-glass</x-slot:icon>
</x-form-search>

<!-- Alternative search icon -->
<x-form-search name="query">
    <x-slot:icon>search-plus</x-slot:icon>
</x-form-search>
```

## Common Patterns

### Global Search Bar
```blade
<div class="global-search-container">
    <h4>Search Everything</h4>
    <p>Find users, content, and resources:</p>
    
    <x-form-search 
        name="global_search" 
        label="Global Search"
        placeholder="Search users, posts, files, or anything..."
        required>
        
        <x-slot:help>
            <div class="search-guidelines">
                <strong>Search Tips:</strong><br>
                • Use quotes for exact phrases: "John Smith"<br>
                • Use minus for exclusions: apple -fruit<br>
                • Use OR for alternatives: cat OR dog<br>
                • Use wildcards: tech* for technology, techies, etc.
            </div>
        </x-slot:help>
    </x-form-search>
    
    <div class="search-filters mt-3">
        <div class="row">
            <div class="col-md-3">
                <x-form-checkbox name="search_users" label="Users" />
            </div>
            <div class="col-md-3">
                <x-form-checkbox name="search_posts" label="Posts" />
            </div>
            <div class="col-md-3">
                <x-form-checkbox name="search_files" label="Files" />
            </div>
            <div class="col-md-3">
                <x-form-checkbox name="search_comments" label="Comments" />
            </div>
        </div>
    </div>
</div>
```

### Advanced Search Form
```blade
<div class="advanced-search-form">
    <h4>Advanced Search</h4>
    <p>Refine your search with multiple criteria:</p>
    
    <x-form-search 
        name="main_query" 
        label="Main Search Query"
        placeholder="Enter your primary search terms"
        required>
        
        <x-slot:help>
            This is your primary search term
        </x-slot:help>
    </x-form-search>
    
    <div class="row mt-3">
        <div class="col-md-6">
            <x-form-search 
                name="exclude_terms" 
                label="Exclude Terms"
                placeholder="Terms to exclude from results">
                
                <x-slot:help>
                    Use minus sign or separate with commas
                </x-slot:help>
            </x-form-search>
        </div>
        <div class="col-md-6">
            <x-form-search 
                name="exact_phrase" 
                label="Exact Phrase"
                placeholder="Exact phrase to find">
                
                <x-slot:help>
                    Use quotes for exact phrase matching
                </x-slot:help>
            </x-form-search>
        </div>
    </div>
    
    <div class="search-options mt-3">
        <div class="row">
            <div class="col-md-4">
                <x-form-select name="search_type" label="Search Type">
                    <option value="all">All Content</option>
                    <option value="title">Title Only</option>
                    <option value="content">Content Only</option>
                    <option value="author">Author Only</option>
                </x-form-select>
            </div>
            <div class="col-md-4">
                <x-form-date name="date_from" label="From Date" />
            </div>
            <div class="col-md-4">
                <x-form-date name="date_to" label="To Date" />
            </div>
        </div>
    </div>
</div>
```

### E-commerce Product Search
```blade
<div class="product-search-form">
    <h4>Find Products</h4>
    <p>Search our product catalog:</p>
    
    <x-form-search 
        name="product_query" 
        label="Product Search"
        placeholder="Search by name, brand, category, or description"
        required>
        
        <x-slot:help>
            <div class="product-search-tips">
                <strong>Product Search Tips:</strong><br>
                • Search by product name: "iPhone 13"<br>
                • Search by brand: "Apple" or "Samsung"<br>
                • Search by category: "smartphones" or "laptops"<br>
                • Search by features: "wireless charging" or "5G"
            </div>
        </x-slot:help>
    </x-form-search>
    
    <div class="search-filters mt-3">
        <div class="row">
            <div class="col-md-3">
                <x-form-select name="category" label="Category">
                    <option value="">All Categories</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="home">Home & Garden</option>
                </x-form-select>
            </div>
            <div class="col-md-3">
                <x-form-select name="brand" label="Brand">
                    <option value="">All Brands</option>
                    <option value="apple">Apple</option>
                    <option value="samsung">Samsung</option>
                    <option value="sony">Sony</option>
                </x-form-select>
            </div>
            <div class="col-md-3">
                <x-form-number name="min_price" label="Min Price" min="0" step="0.01" />
            </div>
            <div class="col-md-3">
                <x-form-number name="max_price" label="Max Price" min="0" step="0.01" />
            </div>
        </div>
    </div>
    
    <div class="search-results-summary mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Search Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Query:</strong> <span x-text="$wire.productQuery ?: 'None'">None</span></p>
                        <p class="mb-1"><strong>Results Found:</strong> <span x-text="getResultCount()">0</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Category:</strong> <span x-text="getSelectedCategory()">All</span></p>
                        <p class="mb-0"><strong>Price Range:</strong> <span x-text="getPriceRange()">Any</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Content Management Search
```blade
<div class="content-search-form">
    <h4>Content Search</h4>
    <p>Find and manage your content:</p>
    
    <x-form-search 
        name="content_query" 
        label="Content Search"
        placeholder="Search by title, content, author, or tags"
        required>
        
        <x-slot:help>
            Search across all content types and metadata
        </x-slot:help>
    </x-form-search>
    
    <div class="content-filters mt-3">
        <div class="row">
            <div class="col-md-3">
                <x-form-select name="content_type" label="Content Type">
                    <option value="">All Types</option>
                    <option value="post">Posts</option>
                    <option value="page">Pages</option>
                    <option value="article">Articles</option>
                    <option value="news">News</option>
                </x-form-select>
            </div>
            <div class="col-md-3">
                <x-form-select name="status" label="Status">
                    <option value="">All Statuses</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                    <option value="pending">Pending</option>
                    <option value="archived">Archived</option>
                </x-form-select>
            </div>
            <div class="col-md-3">
                <x-form-date name="publish_date" label="Publish Date" />
            </div>
            <div class="col-md-3">
                <x-form-select name="author" label="Author">
                    <option value="">All Authors</option>
                    <option value="john">John Doe</option>
                    <option value="jane">Jane Smith</option>
                </x-form-select>
            </div>
        </div>
    </div>
    
    <div class="content-search-results mt-3">
        <div class="card">
            <div class="card-body">
                <h6>Content Summary:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Search Query:</strong> <span x-text="$wire.contentQuery ?: 'None'">None</span></p>
                        <p class="mb-1"><strong>Content Found:</strong> <span x-text="getContentCount()">0</span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Type Filter:</strong> <span x-text="getContentType()">All</span></p>
                        <p class="mb-0"><strong>Status Filter:</strong> <span x-text="getStatus()">All</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_form_search_with_basic_attributes()
{
    $view = $this->blade('<x-form-search name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-search');
}

/** @test */
public function it_renders_form_search_with_search_icon()
{
    $view = $this->blade('<x-form-search name="test" />');
    
    $view->assertSee('search');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(SearchComponent::class)
        ->assertSee('<x-form-search')
        ->set('query', 'test search')
        ->assertSee('test search');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to search input
- `aria-describedby`: Links to help text
- `role="searchbox"`: Applied to input field

### Keyboard Navigation
- Tab navigation to search input
- Text key input for search terms
- Enter key for search submission
- Escape key for clearing search

### Screen Reader Support
- Proper labeling and descriptions
- Search functionality announcements
- Help text communication
- Error message communication

### Search Accessibility
- Clear search purpose indication
- Proper validation feedback
- Helpful error messages
- Search guidance

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via FormInput)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** HTML5 text input type with search icon

## Troubleshooting

### Common Issues

#### Search Icon Not Displaying
**Problem:** Search icon not showing correctly
**Solution:** Check icon component availability and slot implementation

#### FormInput Integration Problems
**Problem:** FormInput extension not working
**Solution:** Check FormInput component and attribute merging

#### Search Functionality Issues
**Problem:** Search functionality not working
**Solution:** Verify search implementation and event handling

#### Styling Issues
**Problem:** Search input doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Validation Issues
**Problem:** Search validation errors not displaying
**Solution:** Check form validation rules and error handling

## Related Components

- **Form Input:** Base input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Text:** Text input component
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with search input type and icon
- FormInput extension with search functionality
- Help and default slot support
- Comprehensive form integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/form-search.blade.php`
2. Add/update tests in `tests/Components/FormSearchTest.php`
3. Update this documentation

## See Also

- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Text Component](../form-text.md)
- [HTML5 Search Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/search)
- [Laravel Form Components](https://github.com/ryangjchandler/laravel-form-components)
