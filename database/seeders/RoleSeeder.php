<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // -------------------------
        // Creación de Roles
        // -------------------------
        $rolDirectora = Role::create(['name' => 'directora_semilleros']);
        $rolDirectorGrupo = Role::create(['name' => 'director_grupo']);
        $rolAprendiz = Role::create(['name' => 'aprendiz_asociado']);

        // -------------------------
        // Permisos para semilleros (solo Directora CRUD)
        // -------------------------
        Permission::create(['name' => 'semilleros.index']);
        Permission::create(['name' => 'semilleros.create']);
        Permission::create(['name' => 'semilleros.edit']);
        Permission::create(['name' => 'semilleros.delete']);

        // -------------------------
        // Permisos para directores (solo Directora CRUD)
        // -------------------------
        Permission::create(['name' => 'directores.index']);
        Permission::create(['name' => 'directores.create']);
        Permission::create(['name' => 'directores.edit']);
        Permission::create(['name' => 'directores.delete']);
        Permission::create(['name' => 'directores.history']); // historial de asignaciones

        // -------------------------
        // Permisos para integrantes (manejo en semilleros)
        // -------------------------
        Permission::create(['name' => 'integrantes.index']);
        Permission::create(['name' => 'integrantes.create']);
        Permission::create(['name' => 'integrantes.edit']);
        Permission::create(['name' => 'integrantes.delete']);
        Permission::create(['name' => 'integrantes.history']);

        // -------------------------
        // Permisos para integrantes en proyectos
        // -------------------------
        Permission::create(['name' => 'project_integrantes.index']);
        Permission::create(['name' => 'project_integrantes.create']);
        Permission::create(['name' => 'project_integrantes.edit']);
        Permission::create(['name' => 'project_integrantes.delete']);
        Permission::create(['name' => 'project_integrantes.history']);

        // -------------------------
        // Permisos para projects
        // -------------------------
        Permission::create(['name' => 'projects.index']);
        Permission::create(['name' => 'projects.create']);
        Permission::create(['name' => 'projects.edit']);
        Permission::create(['name' => 'projects.delete']);
        Permission::create(['name' => 'projects.advance']);
        Permission::create(['name' => 'projects.report']);

        // -------------------------
        // Permisos para events (calendario)
        // -------------------------
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.delete']);

        // -------------------------
        // Asignar permisos a roles
        // -------------------------

        // Directora de semilleros
        $rolDirectora->givePermissionTo([
            'semilleros.index',
            'semilleros.create',
            'semilleros.edit',
            'semilleros.delete',
            'directores.index',
            'directores.create',
            'directores.edit',
            'directores.delete',
            'directores.history',
            'integrantes.index',
            'integrantes.history',
            'projects.index',
            'projects.report',
            'events.index',
        ]);

        // Director de grupo
        $rolDirectorGrupo->givePermissionTo([
            'semilleros.index', // Solo ve su grupo
            'integrantes.index',
            'integrantes.create',
            'integrantes.edit',
            'integrantes.delete',
            'integrantes.history',
            'project_integrantes.index',
            'project_integrantes.create',
            'project_integrantes.edit',
            'project_integrantes.delete',
            'project_integrantes.history',
            'projects.index',
            'projects.create',
            'projects.edit',
            'projects.delete',
            'projects.advance',
            'projects.report',
            'events.index',
        ]);

        // Aprendiz asociado
        $rolAprendiz->givePermissionTo([
            'semilleros.index',
            'project_integrantes.index',
            'projects.index',
            'events.index',
        ]);
    }
}
