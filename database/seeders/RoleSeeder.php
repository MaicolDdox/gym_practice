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
        $rolAdmin = Role::create(['name' => 'admin']);
        $rolCliente = Role::create(['name' => 'cliente']);
        $rolInstructor = Role::create(['name' => 'instructor']);

        // permisos eventos
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.delete']);
        Permission::create(['name' => 'events.participate']);
        Permission::create(['name' => 'events.cancel']);

        // permisos instructores
        Permission::create(['name' => 'instructors.index']);
        Permission::create(['name' => 'instructors.create']);
        Permission::create(['name' => 'instructors.edit']);
        Permission::create(['name' => 'instructors.delete']);


        // asignar permisos
        $rolAdmin->givePermissionTo([
            'events.index',
            'events.create',
            'events.edit',
            'events.delete',
            'instructors.index',
            'instructors.create',
            'instructors.edit',
            'instructors.delete',
        ]);

        $rolInstructor->givePermissionTo([
            'events.index', // solo ve los eventos que le corresponden
        ]);

        $rolCliente->givePermissionTo([
            'events.index',
            'events.participate',
            'events.cancel',
        ]);
        
    }
}
