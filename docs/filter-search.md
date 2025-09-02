# Filter Search Component

A sophisticated search filter component that provides comprehensive search functionality with advanced query parsing capabilities and enhanced user experience. This component offers intuitive search filtering with query syntax support, professional styling, and seamless integration with data filtering systems.

## Overview

**Component Type:** Filter  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Base Component class, extends core filter functionality
**JavaScript Library:** Alpine.js (via base component)

## Files

- **PHP Class:** `src/Components/FilterSearch.php`
- **View File:** `resources/views/bootstrap-5/filters/search.blade.php`
- **Tests:** `tests/Components/FilterSearchTest.php` (to be created)
- **Documentation:** `docs/filter-search.md`

## Basic Usage

### Simple Filter Search
```blade
<x-filter-search name="search" />
```

### With Label
```blade
<x-filter-search 
    name="search" 
    label="Search Users">
</x-filter-search>
```

### With Custom Type
```blade
<x-filter-search 
    name="search" 
    type="email">
</x-filter-search>
```

## Attributes & Properties

### Required Attributes

| Name | Type | Description | Example |
|------|------|-------------|---------|
| name | string | Input name attribute | `'search'` or `'query'` |

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| label | string | '' | Search label text | `'Search Users'` |
| type | string | 'text' | Input type | `'email'` or `'search'` |
| bind | mixed | null | Model binding | `$user` or `$searchModel` |
| default | mixed | null | Default value | `'default query'` |
| language | string | null | Language code | `'en'` or `'es'` |
| showErrors | boolean | true | Show validation errors | `false` |
| floating | boolean | false | Use floating label | `true` |
| extraAttributes | array | [] | Additional attributes | `['data-test' => 'filter-search']` |

### Inherited Attributes

This component extends the base `Component` class and supports these additional attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | auto-generated | Element ID | `'filter-search-input'` |
| class | string | '' | CSS classes | `'custom-filter-search'` |
| disabled | boolean | false | Disable the component | `true` |
| readonly | boolean | false | Make component readonly | `true` |
| required | boolean | false | Make field required | `true` |
| placeholder | string | '' | Input placeholder text | `'Search...'` |

### Authorization Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| can | string | null | Laravel permission gate | `'search-data'` |
| role | string\|array | null | Required user role(s) | `'user'` or `['user', 'admin']` |
| action | string | null | Action type for authorization | `'search'` |

## Component Variants

### Text Filter Search
**Usage:** `<x-filter-search type="text">` (default)
**Description:** Standard text search with query parsing
**Features:**
- Text input search
- Query syntax support
- Professional styling
- Enhanced user experience

### Email Filter Search
**Usage:** `<x-filter-search type="email">`
**Description:** Email-specific search with validation
**Features:**
- Email input validation
- Query syntax support
- Professional styling
- Enhanced user experience

### Search Filter Search
**Usage:** `<x-filter-search type="search">`
**Description:** Search input with search-specific behavior
**Features:**
- Search input behavior
- Query syntax support
- Professional styling
- Enhanced user experience

### Floating Label Filter Search
**Usage:** `<x-filter-search floating>`
**Description:** Search with floating label animation
**Features:**
- Floating label animation
- Professional styling
- Enhanced visual appeal
- Modern UI patterns

## Slots

### Required Slots

#### Default Slot
- **Purpose:** Search content and text
- **Required:** No
- **Content Type:** HTML/Text
- **Example:**
```blade
<x-filter-search name="search">
    Custom Search Content
</x-filter-search>
```

## Usage Examples

### Basic Text Filter Search
```blade
<x-filter-search 
    name="query" 
    placeholder="Enter search query...">
</x-filter-search>
```

### Email Filter Search
```blade
<x-filter-search 
    name="email_search" 
    type="email"
    placeholder="Search by email...">
</x-filter-search>
```

### Search Filter Search
```blade
<x-filter-search 
    name="search_query" 
    type="search"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Label
```blade
<x-filter-search 
    name="user_search" 
    label="Search Users"
    placeholder="Search users by name, email, or role...">
</x-filter-search>
```

### Filter Search with Floating Label
```blade
<x-filter-search 
    name="floating_search" 
    floating
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Custom Classes
```blade
<x-filter-search 
    name="custom_search" 
    class="custom-filter-search-lg"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Custom ID
```blade
<x-filter-search 
    name="custom_id_search" 
    id="custom-filter-search-selector"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Data Attributes
```blade
<x-filter-search 
    name="data_search" 
    data-test="filter-search"
    data-type="advanced-search"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Aria Attributes
```blade
<x-filter-search 
    name="aria_search" 
    aria-label="Advanced Search"
    aria-describedby="search-help-text"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Role Attribute
```blade
<x-filter-search 
    name="role_search" 
    role="searchbox"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Tabindex
```blade
<x-filter-search 
    name="tabindex_search" 
    tabindex="0"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Form Attribute
```blade
<x-filter-search 
    name="form_search" 
    form="my-form"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Autocomplete
```blade
<x-filter-search 
    name="autocomplete_search" 
    autocomplete="off"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Novalidate
```blade
<x-filter-search 
    name="novalidate_search" 
    novalidate
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Accept
```blade
<x-filter-search 
    name="accept_search" 
    accept="text/*"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Capture
```blade
<x-filter-search 
    name="capture_search" 
    capture="environment"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Max
```blade
<x-filter-search 
    name="max_search" 
    max="100"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Min
```blade
<x-filter-search 
    name="min_search" 
    min="1"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Step
```blade
<x-filter-search 
    name="step_search" 
    step="0.1"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Pattern
```blade
<x-filter-search 
    name="pattern_search" 
    pattern="[A-Za-z]{3,}"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Spellcheck
```blade
<x-filter-search 
    name="spellcheck_search" 
    spellcheck="false"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Translate
```blade
<x-filter-search 
    name="translate_search" 
    translate="no"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Contenteditable
```blade
<x-filter-search 
    name="contenteditable_search" 
    contenteditable="true"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Contextmenu
```blade
<x-filter-search 
    name="contextmenu_search" 
    contextmenu="search-menu"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dir
```blade
<x-filter-search 
    name="dir_search" 
    dir="rtl"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Draggable
```blade
<x-filter-search 
    name="draggable_search" 
    draggable="true"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone
```blade
<x-filter-search 
    name="dropzone_search" 
    dropzone="copy"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Hidden
```blade
<x-filter-search 
    name="hidden_search" 
    hidden
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Lang
```blade
<x-filter-search 
    name="lang_search" 
    lang="en"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Spellcheck True
```blade
<x-filter-search 
    name="spellcheck_true_search" 
    spellcheck="true"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Translate Yes
```blade
<x-filter-search 
    name="translate_yes_search" 
    translate="yes"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Contenteditable False
```blade
<x-filter-search 
    name="contenteditable_false_search" 
    contenteditable="false"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Draggable False
```blade
<x-filter-search 
    name="draggable_false_search" 
    draggable="false"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone Move
```blade
<x-filter-search 
    name="dropzone_move_search" 
    dropzone="move"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone Link
```blade
<x-filter-search 
    name="dropzone_link_search" 
    dropzone="link"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone Copy Move
```blade
<x-filter-search 
    name="dropzone_copy_move_search" 
    dropzone="copy move"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone Copy Link
```blade
<x-filter-search 
    name="dropzone_copy_link_search" 
    dropzone="copy link"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone Move Link
```blade
<x-filter-search 
    name="dropzone_move_link_search" 
    dropzone="move link"
    placeholder="Search...">
</x-filter-search>
```

### Filter Search with Dropzone Copy Move Link
```blade
<x-filter-search 
    name="dropzone_copy_move_link_search" 
    dropzone="copy move link"
    placeholder="Search...">
</x-filter-search>
```

## Common Patterns

### Advanced Query Search Interface
```blade
<div class="advanced-search-interface">
    <h4>Advanced Search</h4>
    <p>Use advanced query syntax to search:</p>
    
    <x-filter-search 
        name="advanced_query" 
        placeholder='age > 10 and gender = "male" and (love = "me" or love ~= "php%")'>
        <x-slot:help>
            <div class="search-syntax-help mt-2">
                <h6>Query Syntax Examples:</h6>
                <ul class="list-unstyled">
                    <li><strong>Simple:</strong> name = "John"</li>
                    <li><strong>Comparison:</strong> age > 25</li>
                    <li><strong>Pattern:</strong> email ~= "gmail%"</li>
                    <li><strong>Logical:</strong> status = "active" and role = "admin"</li>
                    <li><strong>Grouping:</strong> (age > 18 or verified = true) and active = true</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-search>
    
    <div class="search-tips mt-3">
        <h6>Search Tips</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Operators:</strong><br>
                • = (equals)<br>
                • != (not equals)<br>
                • > (greater than)<br>
                • < (less than)<br>
                • ~= (pattern match)
            </div>
            <div class="col-md-6">
                <strong>Logical:</strong><br>
                • and (logical AND)<br>
                • or (logical OR)<br>
                • () (grouping)<br>
                • % (wildcard)<br>
                • " (quotes for text)
            </div>
        </div>
    </div>
</div>
```

### User Search Interface
```blade
<div class="user-search-interface">
    <h4>User Search</h4>
    <p>Search users by various criteria:</p>
    
    <x-filter-search 
        name="user_search" 
        label="Search Users"
        placeholder="Search by name, email, role, or status...">
        <x-slot:help>
            <div class="user-search-help mt-2">
                <h6>Search Examples:</h6>
                <ul class="list-unstyled">
                    <li><strong>By Name:</strong> name = "John" or name ~= "Jo%"</li>
                    <li><strong>By Email:</strong> email ~= "gmail%"</li>
                    <li><strong>By Role:</strong> role = "admin"</li>
                    <li><strong>By Status:</strong> status = "active"</li>
                    <li><strong>Combined:</strong> role = "user" and status = "active"</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-search>
    
    <div class="user-search-tips mt-3">
        <h6>User Search Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Common Searches:</strong><br>
                • Active users<br>
                • Admin users<br>
                • Users by location<br>
                • Users by join date<br>
                • Verified users
            </div>
            <div class="col-md-6">
                <strong>Advanced Features:</strong><br>
                • Pattern matching<br>
                • Date ranges<br>
                • Numeric comparisons<br>
                • Logical combinations<br>
                • Nested conditions
            </div>
        </div>
    </div>
</div>
```

### Product Search Interface
```blade
<div class="product-search-interface">
    <h4>Product Search</h4>
    <p>Search products with advanced filtering:</p>
    
    <x-filter-search 
        name="product_search" 
        label="Search Products"
        placeholder="Search by name, category, price, or availability...">
        <x-slot:help>
            <div class="product-search-help mt-2">
                <h6>Product Search Examples:</h6>
                <ul class="list-unstyled">
                    <li><strong>By Name:</strong> name ~= "iPhone%"</li>
                    <li><strong>By Category:</strong> category = "Electronics"</li>
                    <li><strong>By Price:</strong> price > 100 and price < 1000</li>
                    <li><strong>By Availability:</strong> in_stock = true</li>
                    <li><strong>By Rating:</strong> rating >= 4.5</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-search>
    
    <div class="product-search-tips mt-3">
        <h6>Product Search Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Search Criteria:</strong><br>
                • Product names<br>
                • Categories<br>
                • Price ranges<br>
                • Availability<br>
                • Ratings
            </div>
            <div class="col-md-6">
                <strong>Filter Options:</strong><br>
                • Brand filtering<br>
                • Size options<br>
                • Color choices<br>
                • Material types<br>
                • Shipping options
            </div>
        </div>
    </div>
</div>
```

### Content Search Interface
```blade
<div class="content-search-interface">
    <h4>Content Search</h4>
    <p>Search content with full-text capabilities:</p>
    
    <x-filter-search 
        name="content_search" 
        label="Search Content"
        placeholder="Search articles, posts, or documents...">
        <x-slot:help>
            <div class="content-search-help mt-2">
                <h6>Content Search Examples:</h6>
                <ul class="list-unstyled">
                    <li><strong>By Title:</strong> title ~= "Laravel%"</li>
                    <li><strong>By Author:</strong> author = "John Doe"</li>
                    <li><strong>By Date:</strong> published_at > "2023-01-01"</li>
                    <li><strong>By Tags:</strong> tags ~= "PHP%"</li>
                    <li><strong>By Status:</strong> status = "published"</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-search>
    
    <div class="content-search-tips mt-3">
        <h6>Content Search Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Search Types:</strong><br>
                • Full-text search<br>
                • Tag-based search<br>
                • Author search<br>
                • Date range search<br>
                • Category search
            </div>
            <div class="col-md-6">
                <strong>Advanced Features:</strong><br>
                • Fuzzy matching<br>
                • Relevance scoring<br>
                • Faceted search<br>
                • Auto-complete<br>
                • Search suggestions
            </div>
        </div>
    </div>
</div>
```

### Analytics Search Interface
```blade
<div class="analytics-search-interface">
    <h4>Analytics Search</h4>
    <p>Search analytics data with complex queries:</p>
    
    <x-filter-search 
        name="analytics_search" 
        label="Search Analytics"
        placeholder="Search by metrics, time periods, or dimensions...">
        <x-slot:help>
            <div class="analytics-search-help mt-2">
                <h6>Analytics Search Examples:</h6>
                <ul class="list-unstyled">
                    <li><strong>By Metric:</strong> pageviews > 1000</li>
                    <li><strong>By Time:</strong> date >= "2023-01-01" and date <= "2023-12-31"</li>
                    <li><strong>By Source:</strong> source = "Google" or source = "Direct"</li>
                    <li><strong>By Device:</strong> device = "Mobile"</li>
                    <li><strong>By Location:</strong> country = "US"</li>
                </ul>
            </div>
        </x-slot:help>
    </x-filter-search>
    
    <div class="analytics-search-tips mt-3">
        <h6>Analytics Search Guidelines</h6>
        <div class="row">
            <div class="col-md-6">
                <strong>Search Dimensions:</strong><br>
                • Time periods<br>
                • Geographic data<br>
                • Device types<br>
                • Traffic sources<br>
                • User segments
            </div>
            <div class="col-md-6">
                <strong>Metric Types:</strong><br>
                • Page views<br>
                • Session duration<br>
                • Bounce rate<br>
                • Conversion rate<br>
                • Revenue data
            </div>
        </div>
    </div>
</div>
```

## Testing Examples

### Unit Tests
```php
/** @test */
public function it_renders_filter_search_with_basic_attributes()
{
    $view = $this->blade('<x-filter-search name="test" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('form-control');
}

/** @test */
public function it_renders_filter_search_with_label()
{
    $view = $this->blade('<x-filter-search name="test" label="Test Label" />');
    
    $view->assertSee('name="test"');
    $view->assertSee('Test Label');
}
```

### Integration Tests
```php
/** @test */
public function it_integrates_with_livewire()
{
    Livewire::test(FilterSearchComponent::class)
        ->assertSee('<x-filter-search')
        ->set('searchQuery', 'test query')
        ->assertSee('test query');
}
```

## Accessibility

### ARIA Attributes
- `aria-label`: Applied to search elements
- `aria-describedby`: Links to help text
- `role="searchbox"`: Applied to search elements

### Keyboard Navigation
- Tab navigation to search input
- Enter key for search submission
- Search input navigation
- Form submission

### Screen Reader Support
- Proper labeling and descriptions
- Search input feedback
- Help text communication
- Error message communication

### Search Accessibility
- Clear search purpose indication
- Proper validation feedback
- Helpful error messages
- Search guidelines

## Browser Compatibility

- **Supported Browsers:** All modern browsers with HTML5 support
- **JavaScript Dependencies:** Alpine.js (via base component)
- **CSS Framework Requirements:** Bootstrap 4+ or custom styling
- **Input Type Support:** Text, email, search, and other HTML5 types

## Troubleshooting

### Common Issues

#### Search Not Working
**Problem:** Search functionality not working correctly
**Solution:** Check component configuration and query parsing

#### Query Syntax Issues
**Problem:** Advanced query syntax not working
**Solution:** Verify query parser and syntax validation

#### Styling Issues
**Problem:** Search component doesn't look like expected
**Solution:** Check Bootstrap CSS and custom styles

#### Icon Display Issues
**Problem:** Search icon not showing correctly
**Solution:** Check icon component and icon name configuration

#### Floating Label Issues
**Problem:** Floating label not working
**Solution:** Check floating label CSS and JavaScript

## Related Components

- **Filter Dates:** Date filter component
- **Form Search:** Basic search form component
- **Form Input:** Basic input component
- **Form Label:** Component labeling
- **Form Errors:** Validation display
- **Form Help:** Help text component

## Changelog

### Version 1.0.0
- Initial release with filter search functionality
- Base component extension with search support
- Advanced query syntax support
- Comprehensive search integration

## Contributing

To contribute to this component:
1. Update the view file: `resources/views/bootstrap-5/filters/search.blade.php`
2. Update the PHP class: `src/Components/FilterSearch.php`
3. Add/update tests in `tests/Components/FilterSearchTest.php`
4. Update this documentation

## See Also

- [Filter Dates Component](../filter-dates.md)
- [Form Search Component](../form-search.md)
- [Form Input Component](../form-input.md)
- [Form Label Component](../form-label.md)
- [Form Errors Component](../form-errors.md)
- [Form Help Component](../form-help.md)
- [Bootstrap Form Controls](https://getbootstrap.com/docs/5.3/forms/form-control/)
- [Search Design Patterns](https://www.smashingmagazine.com/2011/11/extensive-guide-web-form-usability/)
- [Filter Search Best Practices](https://www.nngroup.com/articles/form-design-white-space/)
