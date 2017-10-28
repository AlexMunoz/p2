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
        $role_create = new Role();
        $role_create->name = 'CREATE';
        $role_create->description = 'rol para insertar';
        $role_create->save();

        $role_read = new Role();
        $role_read->name = 'READ';
        $role_read->description = 'rol para ver';
        $role_read->save();

        $role_update = new Role();
        $role_update->name = 'UPDATE';
        $role_update->description = 'rol para modificar';
        $role_update->save();

        $role_delete = new Role();
        $role_delete->name = 'DELETE';
        $role_delete->description = 'rol para eliminar';
        $role_delete->save();

        $role_admin = new Role();
        $role_admin->name = 'ADMIN';
        $role_admin->description = 'rol para administrar';
        $role_admin->save();
    }
}
