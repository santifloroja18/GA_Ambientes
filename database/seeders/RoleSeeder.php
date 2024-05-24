<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'administrador']);
        $role2 = Role::create(['name' => 'coordinador']);
        $role3 = Role::create(['name' => 'gestor']);


        // Permission::create(['name' => 'dashboard']) -> syncRoles([$role1, $role2]); asi podemos asignar un permiso a varios roles


        // permisos de la vista piso
        // Permission::create(['name' => 'floors']) -> syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'floors.store']) -> assignRole($role1);
        Permission::create(['name' => 'floor.edit']) -> assignRole($role1);
        Permission::create(['name' => 'floor.update']) -> assignRole($role1);


        // permisos de las vistas auditorium
        // Permission::create(['name' => 'reservas-auditorio-301']) -> syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'auditoriumTres.store']) -> syncRoles([$role1, $role3]);
        Permission::create(['name' => 'auditoriumTres.edit']) -> syncRoles([$role1, $role3]);
        Permission::create(['name' => 'auditoriumTres.destroy']) -> syncRoles([$role1, $role3]);

        // Permission::create(['name' => 'reservas-auditorio-601']) -> syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'auditoriumSeis.store']) -> syncRoles([$role1, $role3]);
        Permission::create(['name' => 'auditoriumSeis.edit']) -> syncRoles([$role1, $role3]);
        Permission::create(['name' => 'auditoriumSeis.destroy']) -> syncRoles([$role1, $role3]);

        Permission::create(['name' => 'auditorium.update']) -> syncRoles([$role1, $role3]);


        // permisos de las vistas schedules
        Permission::create(['name' => 'schedules']) -> syncRoles([$role1, $role2]);
        Permission::create(['name' => 'schedule.create']) -> syncRoles([$role1]);
        Permission::create(['name' => 'schedule.import']) -> syncRoles([$role1]);


        // permisos de las vistas users
        Permission::create(['name' => 'user.index']) -> assignRole($role1);
        Permission::create(['name' => 'user.create']) -> assignRole($role1);
        Permission::create(['name' => 'user.store']) -> assignRole($role1);
        Permission::create(['name' => 'user.edit']) -> assignRole($role1);
        Permission::create(['name' => 'user.update']) -> assignRole($role1);
    }
}
