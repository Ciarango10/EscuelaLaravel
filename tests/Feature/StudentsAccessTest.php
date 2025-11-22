<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class StudentsAccessTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function guest_cannot_access_students_index(): void
    {
        $response = $this->get('/students');

        $response->assertRedirect(route('login'));
    }
}