# Form Components

A comprehensive collection of form input components with validation and styling.

## Common Form Input Attributes

Most form components accept these common attributes:

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | required | Input name attribute | 'email' |
| id | string | same as name | Input ID attribute | 'user-email' |
| value | mixed | null | Input value | 'john@example.com' |
| label | string | null | Input label text | 'Email Address' |
| placeholder | string | null | Input placeholder text | 'Enter your email' |
| helper | string | null | Helper text below input | 'We will not share your email' |
| required | boolean | false | Whether field is required | true |
| disabled | boolean | false | Whether field is disabled | true |
| readonly | boolean | false | Whether field is readonly | true |
| class | string | null | Additional CSS classes for input | 'custom-input' |
| containerClass | string | null | Classes for container div | 'mb-4' |
| error | string | null | Manual error message | 'Invalid email format' |

## Text Input Components

### Form Email

Location: `resources/views/bootstrap-5/form-email.blade.php`

#### Usage Example

```blade
<x-form-email 
    name="email" 
    label="Email Address"
    placeholder="name@example.com"
    required
/>
```

### Form Password

Location: `resources/views/bootstrap-5/form-password.blade.php`

#### Additional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| toggle | boolean | false | Show password toggle button | true |

#### Usage Example

```blade
<x-form-password 
    name="password" 
    label="Password"
    toggle
    required
/>
```

### Form URL

Location: `resources/views/bootstrap-5/form-url.blade.php`

#### Usage Example

```blade
<x-form-url 
    name="website" 
    label="Website URL"
    placeholder="https://example.com"
/>
```

### Form Tel

Location: `resources/views/bootstrap-5/form-tel.blade.php`

#### Usage Example

```blade
<x-form-tel 
    name="phone" 
    label="Phone Number"
    placeholder="(123) 456-7890"
/>
```

## Rich Input Components

### Form Date

Location: `resources/views/bootstrap-5/form-date.blade.php`
Class: `src/Components/FormDate.php`

#### Additional Attributes

| Name    | Type   | Default      | Description                                                                 | Example           |
|---------|--------|--------------|-----------------------------------------------------------------------------|-------------------|
| format  | string | 'YYYY-MM-DD' | Date format                                                                 | 'MM/DD/YYYY'      |
| min     | string | null         | Minimum date                                                                | '2023-01-01'      |
| max     | string | null         | Maximum date                                                                | '2023-12-31'      |
| allowed | string | null         | Restrict to 'future', 'past', or 'specific' dates                           | 'future'          |
| buffer  | int    | null         | Number of days to buffer from today (for min/max in 'future'/'past' modes)  | 2                 |
| rolling | int    | null         | Number of days for rolling window (with allowed 'future'/'past')            | 30                |
| range   | string | null         | Specific date range (with allowed 'specific'), format: 'YYYY-MM-DD-YYYY-MM-DD' | '2023-01-01-2023-12-31' |

#### Dynamic Date Restriction Logic

- **allowed = 'future'**: Only allow dates from today (plus optional buffer) forward. Optionally limit with a rolling window.
- **allowed = 'past'**: Only allow dates up to today (minus optional buffer). Optionally limit with a rolling window.
- **allowed = 'specific'**: Only allow dates within a specific range (use `range`).
- **buffer**: Adds/subtracts days from the min/max date for 'future'/'past' modes.
- **rolling**: Sets a rolling window for how far in the future or past is selectable.
- **range**: For 'specific', provide a range as 'YYYY-MM-DD-YYYY-MM-DD'.

#### Usage Examples

```blade
<!-- Only allow future dates, starting 2 days from now, up to 30 days ahead -->
<x-form-date 
    name="appointment" 
    label="Appointment Date"
    allowed="future"
    buffer="2"
    rolling="30"
/>

<!-- Only allow past dates, up to 7 days ago, with a 2-day buffer before today -->
<x-form-date 
    name="history" 
    label="History Date"
    allowed="past"
    buffer="2"
    rolling="7"
/>

<!-- Only allow dates in a specific range -->
<x-form-date 
    name="event" 
    label="Event Date"
    allowed="specific"
    range="2023-01-01-2023-12-31"
/>
```

### Form Time

Location: `
