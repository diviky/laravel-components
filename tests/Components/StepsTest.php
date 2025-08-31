<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;
use Illuminate\Support\Collection;

class StepsTest extends TestCase
{
    public function test_renders_basic_steps(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('Step 1');
        $view->assertSee('Step 2');
        $view->assertSee('wizard');
        $view->assertSee('progress');
        $view->assertSee('data-step-wizard');
    }

    public function test_renders_steps_with_single_step(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        // Should not render wizard for single step
        $view->assertDontSee('wizard');
        $view->assertDontSee('progress');
    }

    public function test_renders_steps_with_array(): void
    {
        $steps = [
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ];

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('Step 1');
        $view->assertSee('Step 2');
        $view->assertSee('wizard');
    }

    public function test_renders_step_item_with_id(): void
    {
        $view = $this->blade('<x-steps.item id="custom-step" :index="0">Content</x-steps.item>');
        
        $view->assertSee('custom-step');
        $view->assertSee('data-step-content');
    }

    public function test_renders_step_item_with_index(): void
    {
        $view = $this->blade('<x-steps.item id="step-1" :index="1">Content</x-steps.item>');
        
        $view->assertSee('data-step-content');
        $view->assertSee('display:none');
    }

    public function test_renders_step_item_with_first_index(): void
    {
        $view = $this->blade('<x-steps.item id="step-1" :index="0">Content</x-steps.item>');
        
        $view->assertSee('data-step-content');
        $view->assertSee('display:block');
    }

    public function test_renders_step_actions_with_multiple_steps(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('<x-steps.actions :steps="$steps" action="Create" />', ['steps' => $steps]);
        
        $view->assertSee('Continue');
        $view->assertSee('Create');
        $view->assertSee('data-step-next');
        $view->assertSee('data-step-back');
    }

    public function test_renders_step_actions_with_single_step(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1']
        ]);

        $view = $this->blade('<x-steps.actions :steps="$steps" action="Create" />', ['steps' => $steps]);
        
        $view->assertSee('Create');
        $view->assertDontSee('Continue');
        $view->assertDontSee('Back');
    }

    public function test_renders_step_actions_with_custom_action(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('<x-steps.actions :steps="$steps" action="Submit Form" />', ['steps' => $steps]);
        
        $view->assertSee('Submit Form');
    }

    public function test_renders_complex_steps_form(): void
    {
        $steps = collect([
            ['id' => 'personal', 'name' => 'Personal Info'],
            ['id' => 'address', 'name' => 'Address'],
            ['id' => 'review', 'name' => 'Review']
        ]);

        $view = $this->blade('
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
        ', ['steps' => $steps]);

        $view->assertSee('Personal Info');
        $view->assertSee('Address');
        $view->assertSee('Review');
        $view->assertSee('Personal Information');
        $view->assertSee('Address Information');
        $view->assertSee('Review Information');
        $view->assertSee('First Name');
        $view->assertSee('Last Name');
        $view->assertSee('Email Address');
        $view->assertSee('Street Address');
        $view->assertSee('City');
        $view->assertSee('ZIP Code');
        $view->assertSee('Create Account');
        $view->assertSee('Continue');
        $view->assertSee('Back');
    }

    public function test_renders_user_registration_wizard(): void
    {
        $steps = collect([
            ['id' => 'account', 'name' => 'Account'],
            ['id' => 'profile', 'name' => 'Profile'],
            ['id' => 'preferences', 'name' => 'Preferences'],
            ['id' => 'confirm', 'name' => 'Confirm']
        ]);

        $view = $this->blade('
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
        ', ['steps' => $steps]);

        $view->assertSee('Account');
        $view->assertSee('Profile');
        $view->assertSee('Preferences');
        $view->assertSee('Confirm');
        $view->assertSee('Create Your Account');
        $view->assertSee('Complete Your Profile');
        $view->assertSee('Set Your Preferences');
        $view->assertSee('Confirm Your Information');
        $view->assertSee('Username');
        $view->assertSee('Email Address');
        $view->assertSee('Password');
        $view->assertSee('Confirm Password');
        $view->assertSee('First Name');
        $view->assertSee('Last Name');
        $view->assertSee('Phone Number');
        $view->assertSee('Profile Picture');
        $view->assertSee('Timezone');
        $view->assertSee('Language');
        $view->assertSee('Subscribe to Newsletter');
        $view->assertSee('Enable Notifications');
        $view->assertSee('Account Details');
        $view->assertSee('Profile Details');
        $view->assertSee('Create Account');
    }

    public function test_renders_product_setup_wizard(): void
    {
        $steps = collect([
            ['id' => 'basic', 'name' => 'Basic Info'],
            ['id' => 'details', 'name' => 'Details'],
            ['id' => 'pricing', 'name' => 'Pricing'],
            ['id' => 'images', 'name' => 'Images'],
            ['id' => 'publish', 'name' => 'Publish']
        ]);

        $view = $this->blade('
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
        ', ['steps' => $steps]);

        $view->assertSee('Basic Info');
        $view->assertSee('Details');
        $view->assertSee('Pricing');
        $view->assertSee('Images');
        $view->assertSee('Publish');
        $view->assertSee('Basic Product Information');
        $view->assertSee('Product Details');
        $view->assertSee('Pricing Information');
        $view->assertSee('Product Images');
        $view->assertSee('Review & Publish');
        $view->assertSee('Product Name');
        $view->assertSee('Short Description');
        $view->assertSee('Category');
        $view->assertSee('Full Description');
        $view->assertSee('SKU');
        $view->assertSee('Weight (kg)');
        $view->assertSee('Dimensions (L x W x H cm)');
        $view->assertSee('Price');
        $view->assertSee('Compare at Price');
        $view->assertSee('Cost');
        $view->assertSee('Tax Rate (%)');
        $view->assertSee('Main Product Image');
        $view->assertSee('Additional Images');
        $view->assertSee('Featured Product');
        $view->assertSee('Publish immediately');
        $view->assertSee('Create Product');
    }

    public function test_renders_survey_form_with_steps(): void
    {
        $steps = collect([
            ['id' => 'demographics', 'name' => 'Demographics'],
            ['id' => 'preferences', 'name' => 'Preferences'],
            ['id' => 'feedback', 'name' => 'Feedback'],
            ['id' => 'complete', 'name' => 'Complete']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="demographics" :index="0">
                    <h3>Demographic Information</h3>
                    <x-form-input name="age" label="Age" type="number" min="13" max="120" required />
                    <x-form-select name="gender" label="Gender" :options="[\'Male\', \'Female\', \'Other\']" />
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
                    <x-form-select name="recommend" label="Would you recommend us?" :options="[\'Yes\', \'No\', \'Maybe\']" required />
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
        ', ['steps' => $steps]);

        $view->assertSee('Demographics');
        $view->assertSee('Preferences');
        $view->assertSee('Feedback');
        $view->assertSee('Complete');
        $view->assertSee('Demographic Information');
        $view->assertSee('Your Preferences');
        $view->assertSee('Your Feedback');
        $view->assertSee('Thank You!');
        $view->assertSee('Age');
        $view->assertSee('Gender');
        $view->assertSee('Location');
        $view->assertSee('Education Level');
        $view->assertSee('Interests');
        $view->assertSee('Favorite Color');
        $view->assertSee('Monthly Budget');
        $view->assertSee('Subscribe to our newsletter');
        $view->assertSee('Overall Satisfaction (1-10)');
        $view->assertSee('Suggestions for improvement');
        $view->assertSee('Would you recommend us?');
        $view->assertSee('Survey Complete');
        $view->assertSee('Submit Survey');
    }

    public function test_renders_onboarding_process(): void
    {
        $steps = collect([
            ['id' => 'welcome', 'name' => 'Welcome'],
            ['id' => 'company', 'name' => 'Company'],
            ['id' => 'team', 'name' => 'Team'],
            ['id' => 'goals', 'name' => 'Goals'],
            ['id' => 'finish', 'name' => 'Finish']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="welcome" :index="0">
                    <div class="text-center">
                        <h2>Welcome to Our Platform!</h2>
                        <p class="lead">Let\'s get you set up in just a few simple steps.</p>
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
                        <h3>You\'re All Set!</h3>
                        <p>We\'ve collected all the information we need to get you started.</p>
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
        ', ['steps' => $steps]);

        $view->assertSee('Welcome');
        $view->assertSee('Company');
        $view->assertSee('Team');
        $view->assertSee('Goals');
        $view->assertSee('Finish');
        $view->assertSee('Welcome to Our Platform!');
        $view->assertSee('Tell Us About Your Company');
        $view->assertSee('Team Information');
        $view->assertSee('Your Goals');
        $view->assertSee('You\'re All Set!');
        $view->assertSee('Your Name');
        $view->assertSee('Your Email');
        $view->assertSee('Company Name');
        $view->assertSee('Industry');
        $view->assertSee('Company Size');
        $view->assertSee('Company Description');
        $view->assertSee('Number of Team Members');
        $view->assertSee('Departments');
        $view->assertSee('Remote work is common');
        $view->assertSee('Primary Goal');
        $view->assertSee('Specific Goals');
        $view->assertSee('Timeline (months)');
        $view->assertSee('Summary');
        $view->assertSee('Complete Setup');
    }

    public function test_renders_steps_with_progress_bar(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2'],
            ['id' => 'step-3', 'name' => 'Step 3']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.item id="step-3" :index="2">Step 3 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('progress');
        $view->assertSee('progress-bar');
        $view->assertSee('data-step-current="0"');
        $view->assertSee('data-step-current="1"');
        $view->assertSee('data-step-current="2"');
        $view->assertSee('data-step-total="3"');
    }

    public function test_renders_steps_with_step_buttons(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('Step 1');
        $view->assertSee('Step 2');
        $view->assertSee('data-step=".step-1"');
        $view->assertSee('data-step=".step-2"');
        $view->assertSee('btn btn-sm rounded-pill');
    }

    public function test_renders_steps_with_active_state(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('active');
        $view->assertSee('disabled');
    }

    public function test_renders_steps_with_positioning(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('left: 0%');
        $view->assertSee('left: 100%');
    }

    public function test_renders_steps_with_container(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('container');
        $view->assertSee('position-relative');
        $view->assertSee('mb-5 mt-2');
    }

    public function test_renders_steps_with_translate_middle(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('translate-middle');
    }

    public function test_renders_steps_with_step_content_visibility(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('data-step-content');
        $view->assertSee('display:block');
        $view->assertSee('display:none');
    }

    public function test_renders_steps_with_action_buttons(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('data-step-next="0"');
        $view->assertSee('data-step-back="1"');
        $view->assertSee('Continue');
        $view->assertSee('Back');
        $view->assertSee('Submit');
    }

    public function test_renders_steps_with_form_button_links(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('form-button-link');
        $view->assertSee('form-button-primary');
        $view->assertSee('form-submit');
    }

    public function test_renders_steps_with_ms_auto(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertSee('ms-auto');
    }

    public function test_renders_steps_with_conditional_buttons(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        // First step should not have back button
        $view->assertSee('data-step-next="0"');
        $view->assertSee('data-step-back="1"');
    }

    public function test_renders_steps_with_last_step_actions(): void
    {
        $steps = collect([
            ['id' => 'step-1', 'name' => 'Step 1'],
            ['id' => 'step-2', 'name' => 'Step 2']
        ]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.item id="step-1" :index="0">Step 1 content</x-steps.item>
                <x-steps.item id="step-2" :index="1">Step 2 content</x-steps.item>
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        // Last step should have back button and submit button
        $view->assertSee('data-step-back="1"');
        $view->assertSee('Submit');
    }

    public function test_renders_steps_with_empty_collection(): void
    {
        $steps = collect([]);

        $view = $this->blade('
            <x-steps :steps="$steps">
                <x-steps.actions :steps="$steps" action="Submit" />
            </x-steps>
        ', ['steps' => $steps]);

        $view->assertDontSee('wizard');
        $view->assertDontSee('progress');
    }

    public function test_renders_steps_with_null_steps(): void
    {
        $view = $this->blade('
            <x-steps>
                <x-steps.actions action="Submit" />
            </x-steps>
        ');

        $view->assertDontSee('wizard');
        $view->assertDontSee('progress');
    }
}
