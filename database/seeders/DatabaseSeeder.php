<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StudentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}
