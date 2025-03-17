# View Components

A collection of components for displaying different types of data in read-only contexts.

## Common View Attributes

Many view components accept these common attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | mixed | null | Value to display | 'john@example.com' |
| label | string | null | Label for the value | 'Email Address' |
| class | string | null | Additional CSS classes | 'text-primary' |
| empty | string | '-' | Text to display when value is empty | 'Not provided' |

## View.Ago Component

Location: `resources/views/bootstrap-5/view/ago.blade.php`

Displays a relative time (e.g., "2 hours ago").

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | mixed | null | Date/time value | '2023-01-15 14:30:00' |
| absolute | boolean | false | Show absolute date on hover | true |

### Usage Example

```blade
<x-view.ago value="{{ $comment->created_at }}" />
```

## View.Array Component

Location: `resources/views/bootstrap-5/view/array.blade.php`

Displays array values in a formatted list.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | array | [] | Array to display | ['Red', 'Green', 'Blue'] |
| itemClass | string | null | Class for each item | 'badge bg-primary' |
| separator | string | ', ' | Separator between items | ' | ' |
| asList | boolean | false | Display as unordered list | true |

### Usage Example

```blade
<x-view.array :value="$user->interests" asList />
```

## View.Boolean Component

Location: `resources/views/bootstrap-5/view/boolean.blade.php`

Displays boolean values with icons or text.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | boolean | null | Boolean value to display | true |
| trueText | string | 'Yes' | Text for true value | 'Active' |
| falseText | string | 'No' | Text for false value | 'Inactive' |
| trueClass | string | 'text-success' | Class for true value | 'badge bg-success' |
| falseClass | string | 'text-danger' | Class for false value | 'badge bg-danger' |
| icons | boolean | true | Use icons instead of text | false |

### Usage Example

```blade
<x-view.boolean :value="$user->is_active" trueText="Active" falseText="Inactive" />
```

## View.Currency Component

Location: `resources/views/bootstrap-5/view/currency.blade.php`

Displays monetary values with proper formatting.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | numeric | null | Amount to display | 99.99 |
| currency | string | 'USD' | Currency code | 'EUR' |
| locale | string | null | Locale for formatting | 'de-DE' |
| decimals | integer | 2 | Decimal places | 0 |

### Usage Example

```blade
<x-view.currency value="1250.50" currency="EUR" />
```

## View.Date Component

Location: `resources/views/bootstrap-5/view/date.blade.php`

Displays formatted dates.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | mixed | null | Date value | '2023-05-15' |
| format | string | 'Y-m-d' | Date format | 'F j, Y' |

### Usage Example

```blade
<x-view.date :value="$user->birth_date" format="F j, Y" />
```

## View.Datetime Component

Location: `resources/views/bootstrap-5/view/datetime.blade.php`

Displays formatted date and time.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | mixed | null | Date/time value | '2023-05-15 14:30:00' |
| format | string | 'Y-m-d H:i:s' | Date/time format | 'M j, Y g:i A' |

### Usage Example

```blade
<x-view.datetime :value="$order->created_at" format="M j, Y g:i A" />
```

## View.Email Component

Location: `resources/views/bootstrap-5/view/email.blade.php`

Displays email addresses with optional link.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | string | null | Email address | 'user@example.com' |
| link | boolean | true | Make email clickable | false |
| obfuscate | boolean | false | Obfuscate email to prevent scraping | true |

### Usage Example

```blade
<x-view.email value="contact@example.com" obfuscate />
```

## View.Empty Component

Location: `resources/views/bootstrap-5/view/empty.blade.php`

Displays a message when a value is empty.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| message | string | 'No data available' | Message to display | 'Not provided' |
| icon | string | null | Icon to display | 'info-circle' |
| class | string | 'text-muted' | Additional CSS classes | 'fst-italic' |

### Usage Example

```blade
<x-view.empty message="No records found" icon="search" />
```

## View.File Component

Location: `resources/views/bootstrap-5/view/file.blade.php`

Displays file information with download link.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | string | null | File path or URL | '/storage/documents/report.pdf' |
| name | string | null | Display name for file | 'Annual Report' |
| size | integer | null | File size in bytes | 1024000 |
| download | boolean | true | Allow download | false |

### Usage Example

```blade
<x-view.file value="{{ $document->path }}" name="{{ $document->name }}" :size="$document->size" />
```

## View.Number Component

Location: `resources/views/bootstrap-5/view/number.blade.php`

Displays formatted numbers.

### Arguments & Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| value | numeric | null | Number to display | 1250 |
| decimals | integer | 0 | Decimal places | 2 |
| separator | string | ',' | Thousands separator | ' ' |
| prefix | string | null | Prefix to display | '+' |
| suffix | string | null | Suffix to display | '%' |

### Usage Example

```blade
<x-view.number value="1234.56" decimals="2" prefix="$" />
```

## Other View Components

The package includes several other specialized view components:

- `view.progress` - Displays a progress bar
- `view.rating` - Displays a star rating
- `view.select` - Displays a value from a select/dropdown options
- `view.status` - Displays a status indicator
- `view.string` - Displays a string with additional formatting options
- `view.tag` - Displays a single tag
- `view.tags` - Displays multiple tags
- `view.tel` - Displays a formatted telephone number
- `view.time` - Displays a formatted time
- `view.url` - Displays a URL with optional link
- `view.user` - Displays user information
- `view.team` - Displays team information
