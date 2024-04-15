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
     *
     * @return void
     */
    public function run()
    {
        $root = Role::create(['name' => 'root']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'home'])->syncRoles([$admin, $root]);
        $permission = Permission::create(['name' => 'pabellones'])->syncRoles([$admin, $root]);
        $permission = Permission::create(['name' => 'crearPabellon'])->syncRoles([$admin, $root]);
        $permission = Permission::create(['name' => 'storePabellon'])->syncRoles([$admin, $root]);
        $permission = Permission::create(['name' => 'editarPabellon'])->syncRoles([$admin, $root]);
        $permission = Permission::create(['name' => 'actualizarPabellon'])->syncRoles([$admin, $root]);

        $permission = Permission::create(['name' => 'tumbas'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'crearTumba'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'guardarTumba'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'editarTumba'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'actualizarTumba'])->syncRoles([$admin, $root, $user]);

    }
}
