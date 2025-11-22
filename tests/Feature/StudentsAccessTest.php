<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentsAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cannot_access_students_index(): void
    {
        $response = $this->get('/students');

        $response->assertRedirect(route('login'));
    }
}