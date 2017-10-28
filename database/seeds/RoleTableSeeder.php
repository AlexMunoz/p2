<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_ingresar = new Role();
        $role_ingresar->name = 'ingresar';
        $role_ingresar->description = 'rol para ingresar';
        $role_ingresar->save();

        $role_modificar = new Role();
        $role_modificar->name = 'modificar';
        $role_modificar->description = 'rol para modificar';
        $role_modificar->save();

        $role_ver = new Role();
        $role_ver->name = 'ver';
        $role_ver->description = 'rol para ver';
        $role_ver->save();

        $role_eliminar = new Role();
        $role_eliminar->name = 'eliminar';
        $role_eliminar->description = 'rol para eliminar';
        $role_eliminar->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'rol para administrar';
        $role_admin->save();
    }
}
