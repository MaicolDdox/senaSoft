<?php

namespace Database\Seeders;


use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolDirectora = Role::create(['name' => 'directora_semilleros']);
        $rolDirectorGrupo = Role::create(['name' => 'director_grupo']);
        $rolAprendiz = Role::create(['name' => 'aprendiz_asociado']);

        // Permisos para semilleros
        Permission::create(['name' => 'semilleros.index']);
        Permission::create(['name' => 'semilleros.create']);
        Permission::create(['name' => 'semilleros.edit']);
        Permission::create(['name' => 'semilleros.delete']);

        // Permisos para integrantes (manejo en grupos)
        Permission::create(['name' => 'integrantes.index']);
        Permission::create(['name' => 'integrantes.create']);
        Permission::create(['name' => 'integrantes.edit']);
        Permission::create(['name' => 'integrantes.delete']);
        Permission::create(['name' => 'integrantes.history']); // Para consultar historial

        // Permisos para projects
        Permission::create(['name' => 'projects.index']);
        Permission::create(['name' => 'projects.create']);
        Permission::create(['name' => 'projects.edit']);
        Permission::create(['name' => 'projects.delete']);
        Permission::create(['name' => 'projects.advance']); // Avanzar fases
        Permission::create(['name' => 'projects.report']); // Generar reportes

        // Permisos para events (calendario)
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.delete']);

        // Asignar permisos a roles
        $rolDirectora->givePermissionTo([
            'semilleros.index',
            'semilleros.create',
            'semilleros.edit',
            'semilleros.delete',
            'integrantes.index',
            'integrantes.create',
            'integrantes.edit',
            'integrantes.delete',
            'integrantes.history',
            'projects.index',
            'projects.create',
            'projects.edit',
            'projects.delete',
            'projects.advance',
            'projects.report',
            'events.index',
            'events.create',
            'events.edit',
            'events.delete',
        ]);

        $rolDirectorGrupo->givePermissionTo([
            'semilleros.index', // Solo ve su grupo
            'integrantes.index',
            'integrantes.create',
            'integrantes.edit',
            'integrantes.delete',
            'integrantes.history',
            'projects.index',
            'projects.create',
            'projects.edit',
            'projects.delete',
            'projects.advance',
            'events.index', // Solo visualiza
        ]);

        $rolAprendiz->givePermissionTo([
            'semilleros.index', // Consulta su grupo
            'integrantes.index', // Ve integrantes de su grupo
            'projects.index', // Ve proyectos y fases
            'events.index', // Ve calendario
        ]);
    }
}
