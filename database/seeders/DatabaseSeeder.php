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

        // Crear usuario Directora de semilleros
        $rolDirectora = User::factory()->create([
            'name' => 'Yuli',
            'email' => 'directora@gmail.com',
            'password' => bcrypt('admin12345678'), 
        ]);
        $rolDirectora->assignRole('directora_semilleros');

        // Crear usuario Director de projecto
        $rolDirectorGrupo = User::factory()->create([
            'name' => 'Ruben',
            'email' => 'director_grupo@gmail.com',
            'password' => bcrypt('director12345678'), 
        ]);
        $rolDirectorGrupo->assignRole('director_grupo');

    }
}
