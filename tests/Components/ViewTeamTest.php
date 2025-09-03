<?php

namespace Diviky\LaravelComponents\Tests\Components;

use Diviky\LaravelComponents\Tests\TestCase;

class ViewTeamTest extends TestCase
{
    /** @test */
    public function it_renders_basic_team_member()
    {
        $teamMember = ['name' => 'Test User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('Test User');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_team_member_with_avatar()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('background-image: url(/avatar.jpg)');
    }

    /** @test */
    public function it_renders_team_member_without_avatar()
    {
        $teamMember = ['name' => 'User'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_team_member_with_icon()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" icon="users" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('users');
        $view->assertSee('me-1');
    }

    /** @test */
    public function it_renders_team_member_with_label()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" label="Team: " />', ['teamMember' => $teamMember]);
        
        $view->assertSee('Team:');
        $view->assertSee('User');
    }

    /** @test */
    public function it_renders_team_member_with_copy_functionality()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" copy />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
        $view->assertSee('cursor-pointer');
    }

    /** @test */
    public function it_renders_team_member_with_custom_size()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" size="lg" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('avatar-lg');
    }

    /** @test */
    public function it_renders_team_member_with_custom_shape()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" shape="rounded" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('rounded');
        $view->assertDontSee('rounded-circle');
    }

    /** @test */
    public function it_renders_team_member_in_compact_mode()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" compact />', ['teamMember' => $teamMember]);
        
        $view->assertSee('avatar');
        $view->assertDontSee('User');
    }

    /** @test */
    public function it_renders_team_member_with_settings_override()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $settings = ['size' => 'lg', 'shape' => 'rounded'];
        $view = $this->blade('<x-view-team :value="$teamMember" :settings="$settings" />', [
            'teamMember' => $teamMember,
            'settings' => $settings
        ]);
        
        $view->assertSee('User');
        $view->assertSee('avatar-lg');
        $view->assertSee('rounded');
    }

    /** @test */
    public function it_renders_team_member_with_custom_classes()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" class="custom-class" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('custom-class');
    }

    /** @test */
    public function it_renders_team_member_with_custom_id()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" id="team-member-1" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('id="team-member-1"');
    }

    /** @test */
    public function it_renders_team_member_with_data_attributes()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" data-test="team-component" data-type="display-team" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('data-test="team-component"');
        $view->assertSee('data-type="display-team"');
    }

    /** @test */
    public function it_renders_team_member_with_aria_attributes()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" aria-label="Team member display" aria-describedby="team-description" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('aria-label="Team member display"');
        $view->assertSee('aria-describedby="team-description"');
    }

    /** @test */
    public function it_renders_team_member_with_role_attribute()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" role="article" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('role="article"');
    }

    /** @test */
    public function it_renders_team_member_with_inline_styles()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" style="background: #f8f9fa;" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('style="background: #f8f9fa;"');
    }

    /** @test */
    public function it_renders_team_member_with_tabindex()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" tabindex="0" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('tabindex="0"');
    }

    /** @test */
    public function it_renders_team_member_with_all_features()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" icon="users" label="Team: " size="lg" shape="circle" copy />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('users');
        $view->assertSee('Team:');
        $view->assertSee('avatar-lg');
        $view->assertSee('rounded-circle');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_team_member_with_different_sizes()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        
        $view1 = $this->blade('<x-view-team :value="$teamMember" size="xs" />', ['teamMember' => $teamMember]);
        $view1->assertSee('avatar-xs');
        
        $view2 = $this->blade('<x-view-team :value="$teamMember" size="sm" />', ['teamMember' => $teamMember]);
        $view2->assertSee('avatar-sm');
        
        $view3 = $this->blade('<x-view-team :value="$teamMember" size="md" />', ['teamMember' => $teamMember]);
        $view3->assertSee('avatar-md');
        
        $view4 = $this->blade('<x-view-team :value="$teamMember" size="lg" />', ['teamMember' => $teamMember]);
        $view4->assertSee('avatar-lg');
        
        $view5 = $this->blade('<x-view-team :value="$teamMember" size="xl" />', ['teamMember' => $teamMember]);
        $view5->assertSee('avatar-xl');
    }

    /** @test */
    public function it_renders_team_member_with_different_shapes()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        
        $view1 = $this->blade('<x-view-team :value="$teamMember" shape="circle" />', ['teamMember' => $teamMember]);
        $view1->assertSee('rounded-circle');
        
        $view2 = $this->blade('<x-view-team :value="$teamMember" shape="rounded" />', ['teamMember' => $teamMember]);
        $view2->assertSee('rounded');
        $view2->assertDontSee('rounded-circle');
    }

    /** @test */
    public function it_renders_team_member_with_html_label()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" label="<strong>Team:</strong> " />', ['teamMember' => $teamMember]);
        
        $view->assertSee('<strong>Team:</strong>');
        $view->assertSee('User');
    }

    /** @test */
    public function it_renders_team_member_with_long_name()
    {
        $teamMember = ['name' => 'Very Long Team Member Name That Exceeds Normal Length', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('Very Long Team Member Name That Exceeds Normal Length');
    }

    /** @test */
    public function it_renders_team_member_with_special_characters()
    {
        $teamMember = ['name' => 'José María O\'Connor-Smith', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('José María O\'Connor-Smith');
    }

    /** @test */
    public function it_renders_team_member_with_unicode_name()
    {
        $teamMember = ['name' => '张三李四', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('张三李四');
    }

    /** @test */
    public function it_renders_team_member_with_empty_avatar()
    {
        $teamMember = ['name' => 'User', 'avatar' => ''];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_team_member_with_null_avatar()
    {
        $teamMember = ['name' => 'User', 'avatar' => null];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_team_member_with_missing_avatar_key()
    {
        $teamMember = ['name' => 'User'];
        $view = $this->blade('<x-view-team :value="$teamMember" />', ['teamMember' => $teamMember]);
        
        $view->assertSee('User');
        $view->assertSee('avatar');
    }

    /** @test */
    public function it_renders_team_member_with_copy_and_icon()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" icon="users" copy />', ['teamMember' => $teamMember]);
        
        $view->assertSee('users');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_team_member_with_copy_and_label()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" label="Team: " copy />', ['teamMember' => $teamMember]);
        
        $view->assertSee('Team:');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }

    /** @test */
    public function it_renders_team_member_with_copy_and_compact()
    {
        $teamMember = ['name' => 'User', 'avatar' => '/avatar.jpg'];
        $view = $this->blade('<x-view-team :value="$teamMember" compact copy />', ['teamMember' => $teamMember]);
        
        $view->assertDontSee('User');
        $view->assertSee('copy');
        $view->assertSee('data-clipboard');
    }
}
