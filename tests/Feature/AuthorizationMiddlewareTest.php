<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorizationMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_without_permissions_cannot_access_roles_page(): void
    {
        $role = Role::create([
            'name' => 'Profesor',
        ]);

        $user = User::factory()->create([
            'role_id' => $role->id,
        ]);

        $this->actingAs($user);

        $response = $this->get('/roles');

        $response->assertStatus(403);
    }
}