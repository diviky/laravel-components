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

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| format | string | 'YYYY-MM-DD' | Date format | 'MM/DD/YYYY' |
| min | string | null | Minimum date | '2023-01-01' |
| max | string | null | Maximum date | '2023-12-31' |

#### Usage Example

```blade
<x-form-date 
    name="birthdate" 
    label="Date of Birth"
    format="MM/DD/YYYY"
/>
```

### Form Time

Location: `resources/views/bootstrap-5/form-time.blade.php`
Class: `src/Components/FormTime.php`

#### Usage Example

```blade
<x-form-time 
    name="meeting_time" 
    label="Meeting Time"
/>
```

### Form Date Time

Location: `resources/views/bootstrap-5/form-date-time.blade.php`
Class: `src/Components/FormDateTime.php`

#### Usage Example

```blade
<x-form-date-time 
    name="event_datetime" 
    label="Event Date and Time"
/>
```

### Form Editor

Location: `resources/views/bootstrap-5/editor/tinymce.blade.php`
Class: `src/Components/FormEditor.php`

#### Usage Example

```blade
<x-form-editor 
    name="content" 
    label="Article Content"
    value="<p>Initial content</p>"
/>
```

### Form Tags

Location: `resources/views/bootstrap-5/form-tags.blade.php`
Class: `src/Components/FormTags.php`

#### Usage Example

```blade
<x-form-tags 
    name="keywords" 
    label="Keywords"
    placeholder="Add keywords"
/>
```

### Form Switch

Location: `resources/views/bootstrap-5/form-switch.blade.php`
Class: `src/Components/FormSwitch.php`

#### Usage Example

```blade
<x-form-switch 
    name="notifications" 
    label="Enable Notifications"
    value="1"
/>
```

### Form File

Location: `resources/views/bootstrap-5/form-file.blade.php`
Class: `src/Components/FormFile.php`

#### Additional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| accept | string | null | Accepted file types | '.pdf,.doc,.docx' |
| multiple | boolean | false | Allow multiple files | true |

#### Usage Example

```blade
<x-form-file 
    name="document" 
    label="Upload Document"
    accept=".pdf,.doc"
/>
```
