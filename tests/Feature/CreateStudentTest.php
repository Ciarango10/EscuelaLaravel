<?php

namespace Tests\Feature;

use App\Http\Middleware\AuthorizedMiddleware;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CreateStudentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_can_create_student(): void
    {
        $user = User::factory()->create();

        $this->withoutMiddleware(middleware: AuthorizedMiddleware::class);

        $this->actingAs($user);

        $response = $this->post('/students/store', [
            'first_name'    => 'Juan',
            'last_name'     => 'Pérez',
            'email'         => 'juan@example.com',
            'date_of_birth' => '2005-01-01',
            'gender'        => 'Masculino',
            'address'       => 'Calle 123',
            'phone_number'  => '3001234567',
        ]);

        $response->assertRedirect(route('students.index'));

        $this->assertDatabaseHas('students', [
            'email'      => 'juan@example.com',
            'first_name' => 'Juan',
        ]);
    }
}