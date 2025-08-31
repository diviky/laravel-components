# Steps Component

A multi-part step-by-step navigation component that provides a wizard-like interface for multi-step forms and processes. This component includes progress tracking, step navigation, and action buttons for moving between steps.

## Overview

**Component Type:** Multi-Part View-Only Component  
**Framework Support:** Bootstrap 5 (default), Bootstrap 4  
**Livewire Compatible:** Yes  
**Dependencies:** Bootstrap JavaScript for interactive functionality  
**Location:** `resources/views/bootstrap-5/steps/`

## Files

- **Main Component:** `resources/views/bootstrap-5/steps/index.blade.php`
- **Step Item:** `resources/views/bootstrap-5/steps/item.blade.php`
- **Step Actions:** `resources/views/bootstrap-5/steps/actions.blade.php`
- **Documentation:** `docs/steps.md`
- **Tests:** `tests/Components/StepsTest.php`

## Component Structure

The Steps component consists of three parts:

1. **`x-steps`** - Main container with progress bar and step buttons
2. **`x-steps.item`** - Individual step content container
3. **`x-steps.actions`** - Navigation buttons (Back/Continue/Submit)

## Basic Usage

```blade
<x-steps :steps="$steps">
    <x-steps.item id="step-1" :index="0">
        <h3>Step 1: Personal Information</h3>
        <x-form-input name="name" label="Full Name" required />
        <x-form-email name="email" label="Email Address" required />
    </x-steps.item>
    
    <x-steps.item id="step-2" :index="1">
        <h3>Step 2: Address Information</h3>
        <x-form-input name="address" label="Street Address" required />
        <x-form-input name="city" label="City" required />
    </x-steps.item>
    
    <x-steps.item id="step-3" :index="2">
        <h3>Step 3: Review & Submit</h3>
        <p>Please review your information before submitting.</p>
    </x-steps.item>
    
    <x-steps.actions :steps="$steps" action="Create Account" />
</x-steps>
```

## Attributes & Properties

### Main Steps Component (`x-steps`)

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| steps | Collection/Array | collect() | Collection of step definitions | `$steps` |

### Step Item Component (`x-steps.item`)

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| id | string | null | Unique identifier for the step | `'step-1'` |
| index | integer | 0 | Zero-based index of the step | `0` |

### Step Actions Component (`x-steps.actions`)

| Name | Type | Default | Description | Example |
|------|------|---------|-------------|---------|
| steps | Collection/Array | collect() | Collection of step definitions | `$steps` |
| action | string | 'Create' | Text for the final submit button | `'Create Account'` |

## Step Data Structure

Each step in the `$steps` collection should have:

```php
$steps = collect([
    [
        'id' => 'step-1',
        'name' => 'Personal Info'
    ],
    [
        'id' => 'step-2', 
        'name' => 'Address'
    ],
    [
        'id' => 'step-3',
        'name' => 'Review'
    ]
]);
```

## Usage Examples

### Basic Multi-Step Form
```blade
@php
$steps = collect([
    ['id' => 'personal', 'name' => 'Personal Info'],
    ['id' => 'address', 'name' => 'Address'],
    ['id' => 'review', 'name' => 'Review']
]);
@endphp

<x-steps :steps="$steps">
    <x-steps.item id="personal" :index="0">
        <h3>Personal Information</h3>
        <x-form-input name="first_name" label="First Name" required />
        <x-form-input name="last_name" label="Last Name" required />
        <x-form-email name="email" label="Email Address" required />
    </x-steps.item>
    
    <x-steps.item id="address" :index="1">
        <h3>Address Information</h3>
        <x-form-input name="street" label="Street Address" required />
        <x-form-input name="city" label="City" required />
        <x-form-input name="zip" label="ZIP Code" required />
    </x-steps.item>
    
    <x-steps.item id="review" :index="2">
        <h3>Review Information</h3>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $first_name }} {{ $last_name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Address:</strong> {{ $street }}, {{ $city }} {{ $zip }}</p>
            </div>
        </div>
    </x-steps.item>
    
    <x-steps.actions :steps="$steps" action="Create Account" />
</x-steps>
```

### User Registration Wizard
```blade
@php
$steps = collect([
    ['id' => 'account', 'name' => 'Account'],
    ['id' => 'profile', 'name' => 'Profile'],
    ['id' => 'preferences', 'name' => 'Preferences'],
    ['id' => 'confirm', 'name' => 'Confirm']
]);
@endphp

<x-steps :steps="$steps">
    <x-steps.item id="account" :index="0">
        <h3>Create Your Account</h3>
        <x-form-input name="username" label="Username" required />
        <x-form-email name="email" label="Email Address" required />
        <x-form-password name="password" label="Password" required />
        <x-form-password name="password_confirmation" label="Confirm Password" required />
    </x-steps.item>
    
    <x-steps.item id="profile" :index="1">
        <h3>Complete Your Profile</h3>
        <x-form-input name="first_name" label="First Name" required />
        <x-form-input name="last_name" label="Last Name" required />
        <x-form-tel name="phone" label="Phone Number" />
        <x-form-file name="avatar" label="Profile Picture" accept="image/*" />
    </x-steps.item>
    
    <x-steps.item id="preferences" :index="2">
        <h3>Set Your Preferences</h3>
        <x-form-select name="timezone" label="Timezone" :options="$timezones" />
        <x-form-select name="language" label="Language" :options="$languages" />
        <x-form-switch name="newsletter" label="Subscribe to Newsletter" />
        <x-form-switch name="notifications" label="Enable Notifications" />
    </x-steps.item>
    
    <x-steps.item id="confirm" :index="3">
        <h3>Confirm Your Information</h3>
        <div class="row">
            <div class="col-md-6">
                <h5>Account Details</h5>
                <p><strong>Username:</strong> {{ $username }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
            </div>
            <div class="col-md-6">
                <h5>Profile Details</h5>
                <p><strong>Name:</strong> {{ $first_name }} {{ $last_name }}</p>
                <p><strong>Phone:</strong> {{ $phone }}</p>
            </div>
        </div>
    </x-steps.item>
    
    <x-steps.actions :steps="$steps" action="Create Account" />
</x-steps>
```

### Product Setup Wizard
```blade
@php
$steps = collect([
    ['id' => 'basic', 'name' => 'Basic Info'],
    ['id' => 'details', 'name' => 'Details'],
    ['id' => 'pricing', 'name' => 'Pricing'],
    ['id' => 'images', 'name' => 'Images'],
    ['id' => 'publish', 'name' => 'Publish']
]);
@endphp

<x-steps :steps="$steps">
    <x-steps.item id="basic" :index="0">
        <h3>Basic Product Information</h3>
        <x-form-input name="name" label="Product Name" required />
        <x-form-textarea name="description" label="Short Description" rows="3" required />
        <x-form-select name="category" label="Category" :options="$categories" required />
    </x-steps.item>
    
    <x-steps.item id="details" :index="1">
        <h3>Product Details</h3>
        <x-form-textarea name="full_description" label="Full Description" rows="6" />
        <x-form-input name="sku" label="SKU" />
        <x-form-input name="weight" label="Weight (kg)" type="number" step="0.1" />
        <x-form-input name="dimensions" label="Dimensions (L x W x H cm)" />
    </x-steps.item>
    
    <x-steps.item id="pricing" :index="2">
        <h3>Pricing Information</h3>
        <x-form-number name="price" label="Price" step="0.01" min="0" required />
        <x-form-number name="compare_price" label="Compare at Price" step="0.01" min="0" />
        <x-form-number name="cost" label="Cost" step="0.01" min="0" />
        <x-form-number name="tax_rate" label="Tax Rate (%)" step="0.1" min="0" max="100" />
    </x-steps.item>
    
    <x-steps.item id="images" :index="3">
        <h3>Product Images</h3>
        <x-form-file name="main_image" label="Main Product Image" accept="image/*" required />
        <x-form-file name="gallery" label="Additional Images" accept="image/*" multiple />
        <x-form-switch name="featured" label="Featured Product" />
    </x-steps.item>
    
    <x-steps.item id="publish" :index="4">
        <h3>Review & Publish</h3>
        <div class="card">
            <div class="card-body">
                <h5>{{ $name }}</h5>
                <p>{{ $description }}</p>
                <p><strong>Price:</strong> ${{ number_format($price, 2) }}</p>
                <p><strong>Category:</strong> {{ $category }}</p>
            </div>
        </div>
        <x-form-switch name="published" label="Publish immediately" />
    </x-steps.item>
    
    <x-steps.actions :steps="$steps" action="Create Product" />
</x-steps>
```

### Survey Form with Steps
```blade
@php
$steps = collect([
    ['id' => 'demographics', 'name' => 'Demographics'],
    ['id' => 'preferences', 'name' => 'Preferences'],
    ['id' => 'feedback', 'name' => 'Feedback'],
    ['id' => 'complete', 'name' => 'Complete']
]);
@endphp

<x-steps :steps="$steps">
    <x-steps.item id="demographics" :index="0">
        <h3>Demographic Information</h3>
        <x-form-input name="age" label="Age" type="number" min="13" max="120" required />
        <x-form-select name="gender" label="Gender" :options="['Male', 'Female', 'Other']" />
        <x-form-select name="location" label="Location" :options="$locations" required />
        <x-form-select name="education" label="Education Level" :options="$educationLevels" />
    </x-steps.item>
    
    <x-steps.item id="preferences" :index="1">
        <h3>Your Preferences</h3>
        <x-form-select name="interests" label="Interests" :options="$interests" multiple />
        <x-form-select name="favorite_color" label="Favorite Color" :options="$colors" />
        <x-form-number name="budget" label="Monthly Budget" step="100" min="0" />
        <x-form-switch name="newsletter" label="Subscribe to our newsletter" />
    </x-steps.item>
    
    <x-steps.item id="feedback" :index="2">
        <h3>Your Feedback</h3>
        <x-form-number name="satisfaction" label="Overall Satisfaction (1-10)" min="1" max="10" required />
        <x-form-textarea name="suggestions" label="Suggestions for improvement" rows="4" />
        <x-form-select name="recommend" label="Would you recommend us?" :options="['Yes', 'No', 'Maybe']" required />
    </x-steps.item>
    
    <x-steps.item id="complete" :index="3">
        <h3>Thank You!</h3>
        <div class="text-center">
            <x-icon name="check-circle" class="text-success" style="font-size: 4rem;" />
            <h4>Survey Complete</h4>
            <p>Thank you for taking the time to complete our survey. Your feedback is valuable to us!</p>
        </div>
    </x-steps.item>
    
    <x-steps.actions :steps="$steps" action="Submit Survey" />
</x-steps>
```

### Onboarding Process
```blade
@php
$steps = collect([
    ['id' => 'welcome', 'name' => 'Welcome'],
    ['id' => 'company', 'name' => 'Company'],
    ['id' => 'team', 'name' => 'Team'],
    ['id' => 'goals', 'name' => 'Goals'],
    ['id' => 'finish', 'name' => 'Finish']
]);
@endphp

<x-steps :steps="$steps">
    <x-steps.item id="welcome" :index="0">
        <div class="text-center">
            <h2>Welcome to Our Platform!</h2>
            <p class="lead">Let's get you set up in just a few simple steps.</p>
            <x-form-input name="admin_name" label="Your Name" required />
            <x-form-email name="admin_email" label="Your Email" required />
        </div>
    </x-steps.item>
    
    <x-steps.item id="company" :index="1">
        <h3>Tell Us About Your Company</h3>
        <x-form-input name="company_name" label="Company Name" required />
        <x-form-input name="industry" label="Industry" />
        <x-form-select name="company_size" label="Company Size" :options="$companySizes" required />
        <x-form-textarea name="description" label="Company Description" rows="3" />
    </x-steps.item>
    
    <x-steps.item id="team" :index="2">
        <h3>Team Information</h3>
        <x-form-number name="team_size" label="Number of Team Members" min="1" required />
        <x-form-select name="departments" label="Departments" :options="$departments" multiple />
        <x-form-switch name="remote_work" label="Remote work is common" />
    </x-steps.item>
    
    <x-steps.item id="goals" :index="3">
        <h3>Your Goals</h3>
        <x-form-select name="primary_goal" label="Primary Goal" :options="$goals" required />
        <x-form-textarea name="specific_goals" label="Specific Goals" rows="4" />
        <x-form-number name="timeline" label="Timeline (months)" min="1" max="60" />
    </x-steps.item>
    
    <x-steps.item id="finish" :index="4">
        <div class="text-center">
            <h3>You're All Set!</h3>
            <p>We've collected all the information we need to get you started.</p>
            <div class="card">
                <div class="card-body">
                    <h5>Summary</h5>
                    <p><strong>Admin:</strong> {{ $admin_name }}</p>
                    <p><strong>Company:</strong> {{ $company_name }}</p>
                    <p><strong>Team Size:</strong> {{ $team_size }} members</p>
                    <p><strong>Primary Goal:</strong> {{ $primary_goal }}</p>
                </div>
            </div>
        </div>
    </x-steps.item>
    
    <x-steps.actions :steps="$steps" action="Complete Setup" />
</x-steps>
```

## Features

### Progress Tracking
- **Visual Progress Bar**: Shows completion percentage
- **Step Indicators**: Numbered buttons for each step
- **Active State**: Highlights current step
- **Completion Status**: Visual feedback for completed steps

### Navigation
- **Step Buttons**: Click to jump to any step
- **Continue Button**: Move to next step
- **Back Button**: Return to previous step
- **Submit Button**: Final submission on last step

### Responsive Design
- **Mobile Friendly**: Optimized for mobile devices
- **Touch Support**: Touch-friendly navigation
- **Flexible Layout**: Adapts to different screen sizes
- **Bootstrap Integration**: Seamless Bootstrap styling

### Interactive Features
- **JavaScript Integration**: Smooth transitions between steps
- **Form Validation**: Step-by-step validation
- **State Management**: Maintains form state across steps
- **Error Handling**: Displays validation errors per step

### Accessibility
- **Keyboard Navigation**: Full keyboard accessibility
- **Screen Reader Support**: Proper ARIA labels
- **Focus Management**: Proper focus handling
- **Semantic HTML**: Accessible markup structure

## JavaScript Integration

### Required JavaScript
The Steps component requires Bootstrap JavaScript for interactive functionality:

```html
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
```

### Custom JavaScript
```javascript
// Step navigation
document.querySelectorAll('[data-step-next]').forEach(button => {
    button.addEventListener('click', function() {
        const currentStep = parseInt(this.getAttribute('data-step-next'));
        const nextStep = currentStep + 1;
        
        // Hide current step
        document.querySelectorAll('[data-step-content]').forEach(content => {
            content.style.display = 'none';
        });
        
        // Show next step
        const nextStepContent = document.querySelector(`[data-step="${nextStep}"]`);
        if (nextStepContent) {
            nextStepContent.style.display = 'block';
        }
        
        // Update progress
        updateProgress(nextStep);
    });
});

// Back navigation
document.querySelectorAll('[data-step-back]').forEach(button => {
    button.addEventListener('click', function() {
        const currentStep = parseInt(this.getAttribute('data-step-back'));
        const prevStep = currentStep - 1;
        
        // Hide current step
        document.querySelectorAll('[data-step-content]').forEach(content => {
            content.style.display = 'none';
        });
        
        // Show previous step
        const prevStepContent = document.querySelector(`[data-step="${prevStep}"]`);
        if (prevStepContent) {
            prevStepContent.style.display = 'block';
        }
        
        // Update progress
        updateProgress(prevStep);
    });
});

// Update progress bar
function updateProgress(currentStep) {
    const totalSteps = document.querySelectorAll('[data-step-content]').length;
    const progress = (currentStep / (totalSteps - 1)) * 100;
    
    const progressBar = document.querySelector('.progress-bar');
    if (progressBar) {
        progressBar.style.width = progress + '%';
    }
    
    // Update step buttons
    document.querySelectorAll('[data-step-current]').forEach(button => {
        const stepIndex = parseInt(button.getAttribute('data-step-current'));
        button.classList.remove('active', 'disabled');
        
        if (stepIndex === currentStep) {
            button.classList.add('active');
        } else if (stepIndex < currentStep) {
            button.classList.add('completed');
        } else {
            button.classList.add('disabled');
        }
    });
}
```

### Livewire Integration
```javascript
// Livewire step navigation
Livewire.on('step-changed', (data) => {
    const { currentStep, totalSteps } = data;
    updateProgress(currentStep);
});

// Form validation per step
document.querySelectorAll('[data-step-next]').forEach(button => {
    button.addEventListener('click', function(e) {
        const currentStep = parseInt(this.getAttribute('data-step-next'));
        const form = this.closest('form');
        
        // Validate current step
        const currentStepInputs = form.querySelectorAll(`[data-step="${currentStep}"] input[required]`);
        let isValid = true;
        
        currentStepInputs.forEach(input => {
            if (!input.checkValidity()) {
                input.reportValidity();
                isValid = false;
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            return false;
        }
        
        // Emit Livewire event
        Livewire.emit('step-validated', { step: currentStep });
    });
});
```

## Configuration

### Global Configuration
The component uses Bootstrap classes and can be customized:

```css
/* Custom step styling */
.wizard .btn {
    transition: all 0.3s ease;
}

.wizard .btn.active {
    background-color: #007bff;
    border-color: #007bff;
}

.wizard .btn.completed {
    background-color: #28a745;
    border-color: #28a745;
}

.wizard .progress {
    background-color: #e9ecef;
}

.wizard .progress-bar {
    background-color: #007bff;
    transition: width 0.3s ease;
}
```

### Component Registration
```php
// In your service provider
Blade::component('steps', Steps::class);
Blade::component('steps.item', StepsItem::class);
Blade::component('steps.actions', StepsActions::class);
```

## Accessibility

### ARIA Attributes
The component automatically includes proper ARIA attributes:
- `aria-current` for active step
- `aria-label` for step descriptions
- `aria-describedby` for step content
- `role="navigation"` for step navigation

### Keyboard Navigation
- Tab navigation through step buttons
- Enter key for step activation
- Escape key for step cancellation
- Arrow keys for step navigation

### Screen Reader Support
- Proper step announcements
- Progress updates
- Navigation feedback
- Error announcements

## Browser Compatibility

### Supported Browsers
- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Internet Explorer**: 11+

### Feature Support
- **CSS Grid/Flexbox**: Full support
- **ES6+ JavaScript**: Full support
- **Bootstrap 5**: Full support
- **Touch Events**: Full support

## Troubleshooting

### Common Issues

**Steps not showing**
```blade
<!-- Ensure steps collection has more than 1 item -->
@php
$steps = collect([
    ['id' => 'step-1', 'name' => 'Step 1'],
    ['id' => 'step-2', 'name' => 'Step 2']
]);
@endphp
```

**Progress bar not updating**
```javascript
// Ensure Bootstrap JavaScript is loaded
// Check for JavaScript errors in console
```

**Step navigation not working**
```blade
<!-- Ensure proper data attributes -->
<x-steps.item id="step-1" :index="0" data-step="0">
    <!-- Content -->
</x-steps.item>
```

**Form validation issues**
```blade
<!-- Add required validation to inputs -->
<x-form-input name="field" required />
```

### Debug Mode
Enable debug mode to see component rendering details:
```php
// config/app.php
'debug' => true,
```

## Related Components

- [Form Input](form-input.md) - Base input component
- [Form Button](form-button.md) - Button component
- [Form Submit](form-submit.md) - Submit button component
- [Card](card.md) - Card container component
- [Modal](modal.md) - Modal dialog component
- [Tabs](tabs.md) - Tabbed interface component
- [Accordion](accordion.md) - Collapsible content component

## Performance

### Optimization Tips
1. **Lazy load step content** for large forms
2. **Use form validation** to prevent unnecessary submissions
3. **Optimize images** in step content
4. **Minimize JavaScript** for better performance
5. **Use proper caching** for step data

### Bundle Size
- **Base Component**: ~5KB
- **With Bootstrap JS**: ~50KB
- **With Custom JS**: ~60KB
- **Full Package**: ~65KB

## Examples Gallery

### Basic Step Forms
```blade
<!-- Simple 2-step form -->
<x-steps :steps="$steps">
    <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
    <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
    <x-steps.actions :steps="$steps" action="Submit" />
</x-steps>
```

### Advanced Step Forms
```blade
<!-- Multi-step wizard with validation -->
<x-steps :steps="$steps">
    <!-- Multiple steps with complex forms -->
    <x-steps.actions :steps="$steps" action="Complete" />
</x-steps>
```

## Changelog

### Version 2.0
- Added multi-part component structure
- Enhanced progress tracking
- Improved accessibility features
- Added JavaScript integration

### Version 1.0
- Initial release
- Basic step navigation
- Bootstrap 5 support
- Form integration

## Contributing

When contributing to the Steps component:

1. **Test step navigation** thoroughly
2. **Ensure accessibility** compliance
3. **Update documentation** for new features
4. **Add test cases** for new functionality
5. **Follow coding standards** consistently

## License

This component is part of the `diviky/laravel-components` package and is licensed under the MIT License.
