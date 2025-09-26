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
        $this->call(RoleSeeder::class);
        // User::factory(10)->create();

        //creamos un rol super admin
        $superAdmin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('admin12345678'), 
        ]);
        $superAdmin->assignRole('super_admin');


        // Crear usuario Director de semilleros
        $directorSemilleros = User::factory()->create([
            'name' => 'Yuli',
            'email' => 'directora@gmail.com',
            'password' => bcrypt('director12345678'), 
        ]);
        $directorSemilleros->assignRole('director_semilleros');

        // Crear usuario Lider de semilleros
        $liderSemilleros = User::factory()->create([
            'name' => 'Ruben',
            'email' => 'lider@gmail.com',
            'password' => bcrypt('lider12345678'), 
        ]);
        $liderSemilleros->assignRole('lider_semilleros');

    }
}
