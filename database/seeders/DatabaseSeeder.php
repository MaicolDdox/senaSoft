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

        // Crear usuario administrador
        $rolDirectora = User::factory()->create([
            'name' => 'Yuli',
            'email' => 'directora@gmail.com',
            'password' => bcrypt('admin12345678'), 
        ]);
        $rolDirectora->assignRole('directora_semilleros');
    }
}
