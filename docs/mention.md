# Mention Component

A powerful mention component that provides professional user tagging and autocomplete functionality with enhanced user experience. This component offers advanced mention capabilities with customizable triggers and seamless integration with modern web applications.

## Overview

**Component Type:** Form  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Component class, Tribute.js, Alpine.js  
**JavaScript Libraries:** Tribute.js for mention functionality, Alpine.js for interactivity

## Files

- **PHP Class:** `src/Components/Mention.php` (inherits from Component)
- **View File:** `resources/views/bootstrap-5/mention.blade.php`
- **JavaScript:** `resources/assets/mention.js`
- **Tests:** `tests/Components/MentionTest.php`
- **Documentation:** `docs/mention.md`

## Basic Usage

### Simple Mention Component
```blade
<x-mention 
    name="content" 
    label="Content"
    :values="$users" />
```

### Mention with Custom Trigger
```blade
<x-mention 
    name="comments" 
    label="Comments"
    :values="$users"
    trigger="#" />
```

### Mention with Input Type
```blade
<x-mention 
    name="recipients" 
    label="Recipients"
    :values="$users"
    type="input" />
```

## Attributes & Properties

### Required Attributes

None - all attributes are optional.

### Optional Attributes

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| name | string | '' | Field name | `'content'` |
| label | string | '' | Field label | `'Comments'` |
| values | array | [] | List of mentionable items | `$users` |
| trigger | string | '@' | Mention trigger character | `'#'` |
| type | string | 'textarea' | Input type (input/textarea) | `'input'` |

### Inherited Attributes

The component inherits all standard form input attributes and Laravel component attributes.

## Usage Examples

### Basic User Mentions
```blade
<!-- Simple User Mentions -->
<x-mention 
    name="content" 
    label="Content"
    :values="$users" />

<!-- User Mentions with Custom Trigger -->
<x-mention 
    name="comments" 
    label="Comments"
    :values="$users"
    trigger="#" />
```

### Comment System
```blade
<!-- Comment System with Mentions -->
<form method="POST" action="{{ route('comments.store') }}">
    @csrf
    
    <x-mention 
        name="content" 
        label="Add Comment"
        :values="$users"
        placeholder="Type @ to mention a user..."
        required />
    
    <x-form-submit>Post Comment</x-form-submit>
</form>
```

### Chat Application
```blade
<!-- Chat Input with Mentions -->
<x-mention 
    name="message" 
    label="Message"
    :values="$users"
    placeholder="Type your message... @ to mention someone"
    type="input" />
```

### Project Management
```blade
<!-- Task Assignment with Mentions -->
<x-mention 
    name="description" 
    label="Task Description"
    :values="$teamMembers"
    placeholder="Describe the task... @ to assign to team members"
    help="Use @ to mention team members for task assignment" />
```

### Social Media Post
```blade
<!-- Social Media Post with Mentions -->
<x-mention 
    name="post_content" 
    label="What's on your mind?"
    :values="$friends"
    placeholder="Share your thoughts... @ to mention friends"
    help="Use @ to mention friends in your post" />
```

### Email Composition
```blade
<!-- Email Composition with Mentions -->
<x-mention 
    name="email_body" 
    label="Email Body"
    :values="$contacts"
    placeholder="Compose your email... @ to add recipients"
    help="Use @ to add recipients to your email" />
```

### Team Collaboration
```blade
<!-- Team Collaboration with Mentions -->
<x-mention 
    name="collaboration_note" 
    label="Collaboration Note"
    :values="$teamMembers"
    placeholder="Share your thoughts... @ to notify team members"
    help="Use @ to notify specific team members" />
```

## Data Structure

### User Data Format
```php
// Example user data structure
$users = [
    ['key' => 'user1', 'value' => 'John Doe', 'email' => 'john@example.com'],
    ['key' => 'user2', 'value' => 'Jane Smith', 'email' => 'jane@example.com'],
    ['key' => 'user3', 'value' => 'Bob Johnson', 'email' => 'bob@example.com'],
];
```

### Team Member Data Format
```php
// Example team member data structure
$teamMembers = [
    ['key' => 'member1', 'value' => 'Alice Wilson', 'role' => 'Developer'],
    ['key' => 'member2', 'value' => 'Charlie Brown', 'role' => 'Designer'],
    ['key' => 'member3', 'value' => 'Diana Prince', 'role' => 'Manager'],
];
```

### Contact Data Format
```php
// Example contact data structure
$contacts = [
    ['key' => 'contact1', 'value' => 'Client A', 'company' => 'Company A'],
    ['key' => 'contact2', 'value' => 'Client B', 'company' => 'Company B'],
    ['key' => 'contact3', 'value' => 'Client C', 'company' => 'Company C'],
];
```

## Livewire Integration

### Basic Livewire Mention
```blade
<div>
    <x-mention 
        name="content" 
        label="Content"
        :values="$users"
        wire:model="content" />
    
    <div class="mt-4">
        <h4>Preview:</h4>
        <div class="border p-3">
            {!! $content !!}
        </div>
    </div>
</div>
```

### Livewire with Real-time Updates
```blade
<div>
    <x-mention 
        name="message" 
        label="Message"
        :values="$users"
        wire:model="message"
        type="input" />
    
    <div class="mt-4">
        <button wire:click="sendMessage" class="btn btn-primary">Send Message</button>
    </div>
</div>
```

### Livewire with Dynamic Users
```blade
<div>
    <x-mention 
        name="content" 
        label="Content"
        :values="$availableUsers"
        wire:model="content" />
    
    <div class="mt-2">
        <small class="text-muted">Available users: {{ count($availableUsers) }}</small>
    </div>
</div>
```

## Custom Styling

### Mention Custom Styles
```blade
<x-style>
    .tribute-container {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
    }
    
    .tribute-container ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    .tribute-container li {
        padding: 0.75rem 1rem;
        cursor: pointer;
        border-bottom: 1px solid #f3f4f6;
        transition: background-color 0.2s ease;
    }
    
    .tribute-container li:last-child {
        border-bottom: none;
    }
    
    .tribute-container li:hover,
    .tribute-container li.highlight {
        background: #f3f4f6;
    }
    
    .tribute-container li.highlight {
        background: #3b82f6;
        color: white;
    }
    
    .tribute-container .tribute-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .tribute-container .tribute-avatar {
        width: 2rem;
        height: 2rem;
        border-radius: 50%;
        background: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: #6b7280;
    }
    
    .tribute-container .tribute-info {
        flex: 1;
    }
    
    .tribute-container .tribute-name {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.125rem;
    }
    
    .tribute-container .tribute-email {
        font-size: 0.875rem;
        color: #6b7280;
    }
    
    .tribute-container .tribute-role {
        font-size: 0.875rem;
        color: #3b82f6;
        font-weight: 500;
    }
    
    .tribute-container li.highlight .tribute-name,
    .tribute-container li.highlight .tribute-email,
    .tribute-container li.highlight .tribute-role {
        color: white;
    }
    
    .mention-highlight {
        background: #dbeafe;
        color: #1e40af;
        padding: 0.125rem 0.25rem;
        border-radius: 0.25rem;
        font-weight: 500;
    }
    
    .mention-highlight::before {
        content: '@';
        color: #3b82f6;
    }
</x-style>
```

## Advanced Configuration

### Custom Mention Data
```php
// Controller method to provide mention data
public function getMentionData()
{
    return [
        'users' => User::select('id', 'name', 'email')
            ->get()
            ->map(function ($user) {
                return [
                    'key' => $user->id,
                    'value' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar_url,
                ];
            })
            ->toArray(),
    ];
}
```

### Dynamic Mention Loading
```php
// Livewire component for dynamic mention loading
class MentionComponent extends Component
{
    public $content = '';
    public $users = [];
    
    public function mount()
    {
        $this->loadUsers();
    }
    
    public function loadUsers()
    {
        $this->users = User::select('id', 'name', 'email')
            ->get()
            ->map(function ($user) {
                return [
                    'key' => $user->id,
                    'value' => $user->name,
                    'email' => $user->email,
                ];
            })
            ->toArray();
    }
    
    public function searchUsers($query)
    {
        $this->users = User::where('name', 'like', "%{$query}%")
            ->select('id', 'name', 'email')
            ->get()
            ->map(function ($user) {
                return [
                    'key' => $user->id,
                    'value' => $user->name,
                    'email' => $user->email,
                ];
            })
            ->toArray();
    }
}
```

## Related Components

- [Form Input](form-input.md) - Basic input component
- [Form Textarea](form-textarea.md) - Basic textarea component
- [Form Search](form-search.md) - Search input component

## Best Practices

1. **Performance**: Limit the number of mentionable items for better performance
2. **Accessibility**: Ensure proper keyboard navigation and ARIA labels
3. **User Experience**: Provide clear feedback for mention selection
4. **Data Structure**: Use consistent data structure for mention items
5. **Styling**: Customize mention appearance to match your design
6. **Testing**: Test mention functionality across different browsers
7. **Documentation**: Document custom mention data structures

## Troubleshooting

### Mentions Not Working
Check that Tribute.js is properly loaded and the data structure is correct.

### Styling Issues
Ensure that Tribute.js CSS is loaded and doesn't conflict with Bootstrap.

### Performance Issues
Consider limiting the number of mentionable items or implementing search functionality.

### Livewire Issues
Use `wire:ignore` to prevent Livewire from interfering with the mention functionality.

### Data Format Issues
Ensure that mention data follows the correct structure with 'key' and 'value' properties.
