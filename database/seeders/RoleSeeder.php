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

        //permisos 
        Permission::create(['name' => 'events.index']);
        Permission::create(['name' => 'events.create']);
        Permission::create(['name' => 'events.edit']);
        Permission::create(['name' => 'events.delete']);

        //asignar permisos
        $rolAdmin->givePermissionTo([
            'events.index',
            'events.create',
            'events.edit',
            'events.delete'
        ]);

        $rolCliente->givePermissionTo([
            'events.index'
        ]);
        
    }
}
