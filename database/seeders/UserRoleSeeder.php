<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $adminRole = new Role();
        $adminRole->name = "Administrador";
        $adminRole->save();

        // Classrooms role
        $aulasPermissions = Permission::where('module', '=', 'Aulas')
                                      ->get();

        $aulasRole = new Role();
        $aulasRole->name = "Editor de Aulas";
        $aulasRole->save();

        foreach($aulasPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $aulasRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Enrollments role
        $matriculasPermissions = Permission::where('module', '=', 'Matriculas')
                                      ->get();

        $matriculasRole = new Role();
        $matriculasRole->name = "Editor de Matriculas";
        $matriculasRole->save();

        foreach($matriculasPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $matriculasRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Grades role
        $notasPermissions = Permission::where('module', '=', 'Notas')
                                      ->get();

        $notasRole = new Role();
        $notasRole->name = "Editor de Notas";
        $notasRole->save();

        foreach($notasPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $notasRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Students role
        $estudiantesPermissions = Permission::where('module', '=', 'Estudiantes')
                                      ->get();

        $estudiantesRole = new Role();
        $estudiantesRole->name = "Editor de Estudiantes";
        $estudiantesRole->save();

        foreach($estudiantesPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $estudiantesRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Subjects role
        $asignaturasPermissions = Permission::where('module', '=', 'Asignaturas')
                                      ->get();

        $asignaturasRole = new Role();
        $asignaturasRole->name = "Editor de Asignaturas";
        $asignaturasRole->save();

        foreach($asignaturasPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $asignaturasRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Teachers role
        $profesoresPermissions = Permission::where('module', '=', 'Profesores')
                                      ->get();

        $profesoresRole = new Role();
        $profesoresRole->name = "Editor de Profesores";
        $profesoresRole->save();

        foreach($profesoresPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $profesoresRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // // Teacher manager role
        // $editorPermissions = $blogsPermissions->merge($seccionesPermissions);

        // $editorRole = new Role();
        // $editorRole->name = "Editor de notas";
        // $editorRole->save();

        // foreach($editorPermissions as $permission) {

        //     $rolePermission = new RolePermission();
        //     $rolePermission->role_id = $editorRole->id;
        //     $rolePermission->permission_id = $permission->id;
        //     $rolePermission->save();
        // }

        // Users

        $user = new User();
        $user->first_name = "Carlos";
        $user->last_name = "Arango";
        $user->document = "11111";
        $user->email = "carlosarango3101@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $adminRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Jimmy";
        $user->last_name = "Neutron";
        $user->document = "22222";
        $user->email = "jimmy@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $aulasRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Ana";
        $user->last_name = "Dillon";
        $user->document = "33333";
        $user->email = "anad@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $matriculasRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Kai";
        $user->last_name = "Cenat";
        $user->document = "44444";
        $user->email = "kai@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $notasRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Benito";
        $user->last_name = "Martinez";
        $user->document = "55555";
        $user->email = "ocasio@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $estudiantesRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Emanuel";
        $user->last_name = "Gallardo";
        $user->document = "66666";
        $user->email = "manuel@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $asignaturasRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Victor";
        $user->last_name = "Hernandez";
        $user->document = "77777";
        $user->email = "vmanuel@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $profesoresRole->id;
        $user->save();
    }
}
