<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class CounterTest extends TestCase
{
    public function test_renders_basic_counter(): void
    {
        $view = $this->blade('<x-counter :number="1500" />');

        $view->assertSee('1.5K');
        $view->assertSee('counter');
    }

    public function test_renders_small_number(): void
    {
        $view = $this->blade('<x-counter :number="500" />');

        $view->assertSee('500');
    }

    public function test_renders_thousands(): void
    {
        $view = $this->blade('<x-counter :number="25000" />');

        $view->assertSee('25K');
    }

    public function test_renders_millions(): void
    {
        $view = $this->blade('<x-counter :number="2500000" />');

        $view->assertSee('2.5M');
    }

    public function test_renders_billions(): void
    {
        $view = $this->blade('<x-counter :number="2500000000" />');

        $view->assertSee('2.5B');
    }

    public function test_renders_counter_with_custom_class(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="text-primary" />');

        $view->assertSee('1.5K');
        $view->assertSee('text-primary');
    }

    public function test_renders_counter_with_custom_id(): void
    {
        $view = $this->blade('<x-counter :number="1500" id="user-count" />');

        $view->assertSee('1.5K');
        $view->assertSee('id="user-count"');
    }

    public function test_renders_counter_with_title(): void
    {
        $view = $this->blade('<x-counter :number="1500" title="Total users" />');

        $view->assertSee('1.5K');
        $view->assertSee('title="Total users"');
    }

    public function test_renders_counter_with_inline_style(): void
    {
        $view = $this->blade('<x-counter :number="1500" style="font-size: 2rem;" />');

        $view->assertSee('1.5K');
        $view->assertSee('font-size: 2rem');
    }

    public function test_renders_counter_with_data_attributes(): void
    {
        $view = $this->blade('<x-counter :number="1500" data-metric="users" data-period="monthly" />');

        $view->assertSee('1.5K');
        $view->assertSee('data-metric="users"');
        $view->assertSee('data-period="monthly"');
    }

    public function test_renders_counter_with_multiple_classes(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="text-primary fw-bold" />');

        $view->assertSee('1.5K');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
    }

    public function test_renders_counter_with_bootstrap_classes(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="display-4 text-success" />');

        $view->assertSee('1.5K');
        $view->assertSee('display-4');
        $view->assertSee('text-success');
    }

    public function test_renders_counter_with_livewire_attributes(): void
    {
        $view = $this->blade('<x-counter :number="1500" wire:poll.10s />');

        $view->assertSee('1.5K');
        $view->assertSee('wire:poll.10s');
    }

    public function test_renders_counter_in_dashboard_context(): void
    {
        $view = $this->blade('
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <x-counter :number="15420" class="display-4 text-primary" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Revenue</h5>
                            <x-counter :number="2500000" class="display-4 text-success" />
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('15.4K');
        $view->assertSee('2.5M');
        $view->assertSee('Total Users');
        $view->assertSee('Revenue');
        $view->assertSee('display-4');
        $view->assertSee('text-primary');
        $view->assertSee('text-success');
    }

    public function test_renders_counter_in_statistics_section(): void
    {
        $view = $this->blade('
            <section class="statistics py-5">
                <div class="container">
                    <h2 class="text-center mb-5">Our Impact</h2>
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <x-counter :number="50000" class="display-3 text-primary mb-2" />
                                <h5>Happy Customers</h5>
                                <p class="text-muted">Satisfied with our service</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <x-counter :number="1000000" class="display-3 text-success mb-2" />
                                <h5>Products Sold</h5>
                                <p class="text-muted">Across all categories</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ');

        $view->assertSee('50K');
        $view->assertSee('1M');
        $view->assertSee('Happy Customers');
        $view->assertSee('Products Sold');
        $view->assertSee('display-3');
        $view->assertSee('text-primary');
        $view->assertSee('text-success');
    }

    public function test_renders_counter_in_social_proof_section(): void
    {
        $view = $this->blade('
            <div class="social-proof bg-light py-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>Trusted by Thousands</h3>
                            <p class="lead">Join our growing community of satisfied customers.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row text-center">
                                <div class="col-4">
                                    <x-counter :number="15000" class="h3 text-primary" />
                                    <small class="text-muted">Users</small>
                                </div>
                                <div class="col-4">
                                    <x-counter :number="500000" class="h3 text-success" />
                                    <small class="text-muted">Downloads</small>
                                </div>
                                <div class="col-4">
                                    <x-counter :number="98" class="h3 text-info" />
                                    <small class="text-muted">Rating</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('15K');
        $view->assertSee('500K');
        $view->assertSee('98');
        $view->assertSee('Users');
        $view->assertSee('Downloads');
        $view->assertSee('Rating');
        $view->assertSee('h3');
        $view->assertSee('text-primary');
        $view->assertSee('text-success');
        $view->assertSee('text-info');
    }

    public function test_renders_counter_with_animation_classes(): void
    {
        $view = $this->blade('
            <div class="achievement-counter">
                <x-counter :number="1000000" class="counter-animated" data-target="1000000" />
                <p>Million Dollar Milestone</p>
            </div>
        ');

        $view->assertSee('1M');
        $view->assertSee('counter-animated');
        $view->assertSee('data-target="1000000"');
        $view->assertSee('Million Dollar Milestone');
    }

    public function test_renders_ecommerce_dashboard_counters(): void
    {
        $view = $this->blade('
            <div class="dashboard-stats">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Sales
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            $<x-counter :number="1250000" />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Orders
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <x-counter :number="15420" />
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('1.25M');
        $view->assertSee('15.4K');
        $view->assertSee('Total Sales');
        $view->assertSee('Orders');
        $view->assertSee('border-left-primary');
        $view->assertSee('border-left-success');
    }

    public function test_renders_analytics_dashboard_counters(): void
    {
        $view = $this->blade('
            <div class="analytics-overview">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="metric-card">
                            <div class="metric-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="metric-content">
                                <h3><x-counter :number="2500000" /></h3>
                                <p>Page Views</p>
                                <span class="trend up">+12.5%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="metric-card">
                            <div class="metric-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="metric-content">
                                <h3><x-counter :number="125000" /></h3>
                                <p>Unique Visitors</p>
                                <span class="trend up">+8.3%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('2.5M');
        $view->assertSee('125K');
        $view->assertSee('Page Views');
        $view->assertSee('Unique Visitors');
        $view->assertSee('+12.5%');
        $view->assertSee('+8.3%');
    }

    public function test_renders_social_media_stats(): void
    {
        $view = $this->blade('
            <div class="social-stats">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="social-stat-item">
                            <i class="fab fa-facebook fa-3x text-primary mb-3"></i>
                            <h2><x-counter :number="50000" /></h2>
                            <p>Facebook Followers</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="social-stat-item">
                            <i class="fab fa-twitter fa-3x text-info mb-3"></i>
                            <h2><x-counter :number="25000" /></h2>
                            <p>Twitter Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('50K');
        $view->assertSee('25K');
        $view->assertSee('Facebook Followers');
        $view->assertSee('Twitter Followers');
        $view->assertSee('fab fa-facebook');
        $view->assertSee('fab fa-twitter');
    }

    public function test_renders_achievement_counters(): void
    {
        $view = $this->blade('
            <div class="achievements-section">
                <div class="container">
                    <h2 class="text-center mb-5">Our Achievements</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="achievement-card text-center">
                                <div class="achievement-icon mb-3">
                                    <i class="fas fa-trophy fa-3x text-warning"></i>
                                </div>
                                <h3 class="achievement-number">
                                    <x-counter :number="1000000" />
                                </h3>
                                <h5>Happy Customers</h5>
                                <p class="text-muted">Served worldwide</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="achievement-card text-center">
                                <div class="achievement-icon mb-3">
                                    <i class="fas fa-award fa-3x text-success"></i>
                                </div>
                                <h3 class="achievement-number">
                                    <x-counter :number="500" />
                                </h3>
                                <h5>Awards Won</h5>
                                <p class="text-muted">Industry recognition</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ');

        $view->assertSee('1M');
        $view->assertSee('500');
        $view->assertSee('Happy Customers');
        $view->assertSee('Awards Won');
        $view->assertSee('Served worldwide');
        $view->assertSee('Industry recognition');
        $view->assertSee('fas fa-trophy');
        $view->assertSee('fas fa-award');
    }

    public function test_renders_counter_with_percentage(): void
    {
        $view = $this->blade('<x-counter :number="95" />%');

        $view->assertSee('95');
        $view->assertSee('%');
    }

    public function test_renders_counter_with_currency(): void
    {
        $view = $this->blade('$<x-counter :number="1250000" />');

        $view->assertSee('$');
        $view->assertSee('1.25M');
    }

    public function test_renders_counter_with_large_numbers(): void
    {
        $view = $this->blade('<x-counter :number="999999999" />');

        $view->assertSee('1B');
    }

    public function test_renders_counter_with_decimal_numbers(): void
    {
        $view = $this->blade('<x-counter :number="1500.5" />');

        $view->assertSee('1.5K');
    }

    public function test_renders_counter_with_zero(): void
    {
        $view = $this->blade('<x-counter :number="0" />');

        $view->assertSee('0');
    }

    public function test_renders_counter_with_negative_number(): void
    {
        $view = $this->blade('<x-counter :number="-1500" />');

        $view->assertSee('-1.5K');
    }

    public function test_renders_counter_with_very_large_number(): void
    {
        $view = $this->blade('<x-counter :number="999999999999" />');

        $view->assertSee('1T');
    }

    public function test_renders_counter_with_custom_styling(): void
    {
        $view = $this->blade('<x-counter :number="7500" style="font-size: 2rem; color: #28a745;" />');

        $view->assertSee('7.5K');
        $view->assertSee('font-size: 2rem');
        $view->assertSee('color: #28a745');
    }

    public function test_renders_counter_with_multiple_data_attributes(): void
    {
        $view = $this->blade('<x-counter :number="1200" data-metric="users" data-period="monthly" data-region="global" />');

        $view->assertSee('1.2K');
        $view->assertSee('data-metric="users"');
        $view->assertSee('data-period="monthly"');
        $view->assertSee('data-region="global"');
    }

    public function test_renders_counter_with_accessibility_attributes(): void
    {
        $view = $this->blade('<x-counter :number="1500" aria-label="User count" role="text" />');

        $view->assertSee('1.5K');
        $view->assertSee('aria-label="User count"');
        $view->assertSee('role="text"');
    }

    public function test_renders_counter_with_complex_styling(): void
    {
        $view = $this->blade('
            <x-counter
                :number="1500"
                class="text-primary fw-bold display-4"
                style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);"
                data-animation="fade-in"
            />
        ');

        $view->assertSee('1.5K');
        $view->assertSee('text-primary');
        $view->assertSee('fw-bold');
        $view->assertSee('display-4');
        $view->assertSee('text-shadow: 2px 2px 4px rgba(0,0,0,0.3)');
        $view->assertSee('data-animation="fade-in"');
    }

    public function test_renders_counter_with_livewire_integration(): void
    {
        $view = $this->blade('
            <div class="d-flex align-items-center">
                <span class="me-2">Active Users:</span>
                <x-counter :number="$activeUsers" class="fw-bold" wire:poll.10s />
            </div>
        ');

        $view->assertSee('Active Users:');
        $view->assertSee('fw-bold');
        $view->assertSee('wire:poll.10s');
    }

    public function test_renders_counter_with_bootstrap_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="text-center text-uppercase text-decoration-underline" />');

        $view->assertSee('1.5K');
        $view->assertSee('text-center');
        $view->assertSee('text-uppercase');
        $view->assertSee('text-decoration-underline');
    }

    public function test_renders_counter_with_responsive_classes(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="d-none d-md-block text-lg-start" />');

        $view->assertSee('1.5K');
        $view->assertSee('d-none');
        $view->assertSee('d-md-block');
        $view->assertSee('text-lg-start');
    }

    public function test_renders_counter_with_spacing_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="m-3 p-2 border rounded" />');

        $view->assertSee('1.5K');
        $view->assertSee('m-3');
        $view->assertSee('p-2');
        $view->assertSee('border');
        $view->assertSee('rounded');
    }

    public function test_renders_counter_with_flexbox_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="d-flex justify-content-center align-items-center" />');

        $view->assertSee('1.5K');
        $view->assertSee('d-flex');
        $view->assertSee('justify-content-center');
        $view->assertSee('align-items-center');
    }

    public function test_renders_counter_with_background_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="bg-primary text-white" />');

        $view->assertSee('1.5K');
        $view->assertSee('bg-primary');
        $view->assertSee('text-white');
    }

    public function test_renders_counter_with_border_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="border border-primary border-2" />');

        $view->assertSee('1.5K');
        $view->assertSee('border');
        $view->assertSee('border-primary');
        $view->assertSee('border-2');
    }

    public function test_renders_counter_with_shadow_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="shadow shadow-lg" />');

        $view->assertSee('1.5K');
        $view->assertSee('shadow');
        $view->assertSee('shadow-lg');
    }

    public function test_renders_counter_with_position_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="position-relative top-0 start-0" />');

        $view->assertSee('1.5K');
        $view->assertSee('position-relative');
        $view->assertSee('top-0');
        $view->assertSee('start-0');
    }

    public function test_renders_counter_with_visibility_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="visible opacity-75" />');

        $view->assertSee('1.5K');
        $view->assertSee('visible');
        $view->assertSee('opacity-75');
    }

    public function test_renders_counter_with_overflow_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="overflow-auto overflow-hidden" />');

        $view->assertSee('1.5K');
        $view->assertSee('overflow-auto');
        $view->assertSee('overflow-hidden');
    }

    public function test_renders_counter_with_interaction_utilities(): void
    {
        $view = $this->blade('<x-counter :number="1500" class="user-select-all pe-none" />');

        $view->assertSee('1.5K');
        $view->assertSee('user-select-all');
        $view->assertSee('pe-none');
    }
}
