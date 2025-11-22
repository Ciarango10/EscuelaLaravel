<?php

namespace Tests\Feature;

use App\Http\Middleware\AuthorizedMiddleware;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HomeAccessTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_with_role_can_access_home(): void
    {
        $role = Role::create([
            'name' => 'Administrador',
        ]);

        $user = User::factory()->create([
            'role_id' => $role->id,
        ]);

        $this->actingAs($user);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}