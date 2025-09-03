<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use App\Models\Company;
use App\Models\Template;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TemplatesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed roles/permissions if you have a seeder for that
        // $this->seed(\Database\Seeders\RolePermissionSeeder::class);

        // Create a company (as main)
        Company::factory()->create(['is_main' => true]);
    }

    protected function adminUser(): User
    {
        $u = User::factory()->create(['email_verified_at' => now()]);
        // If using spatie/permission:
        if (method_exists($u, 'assignRole')) {
            $u->assignRole('Admin');
        }
        return $u;
    }

    public function test_editor_loads_for_admin()
    {
        $resp = $this->actingAs($this->adminUser())
            ->get(route('settings.templates.edit'));

        $resp->assertOk();
        $resp->assertSee('Email Templates');
    }

    public function test_preview_endpoint_returns_html()
    {
        $resp = $this->actingAs($this->adminUser())
            ->postJson(route('settings.templates.preview'), [
                'body' => "# Hello\n\nThis is **bold**.",
                'format' => 'markdown',
            ]);

        $resp->assertOk()
             ->assertJsonStructure(['html'])
             ->assertSeeInOrder(['<h1>', 'Hello']);
    }

    public function test_update_persists_changes()
    {
        $admin = $this->adminUser();

        $payload = [
            'templates' => [
                'generic_email' => [
                    'subject' => 'Test Subject',
                    'format'  => 'markdown',
                    'body'    => 'Body text',
                ],
            ],
        ];

        $this->actingAs($admin)
            ->post(route('settings.templates.update'), $payload)
            ->assertRedirect();

        $company = Company::getMain() ?? Company::first();
        $tpl = Template::where('company_id', $company->id)->where('slug', 'generic_email')->first();
        $this->assertNotNull($tpl);
        $this->assertEquals('Test Subject', $tpl->subject);
        $this->assertEquals('Body text', $tpl->body);
        $this->assertEquals('markdown', $tpl->format);
    }
}
