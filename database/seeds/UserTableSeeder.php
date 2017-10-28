<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_ingresar = Role::where('name', 'ingresar')->first();
        $role_modificar  = Role::where('name', 'modificar')->first();
        $role_ver  = Role::where('name', 'ver')->first();
        $role_eliminar  = Role::where('name', 'eliminar')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_ingresar);
        $user->roles()->attach($role_eliminar);
        $user->roles()->attach($role_modificar);
        $user->roles()->attach($role_ver);
        $user->roles()->attach($role_admin);
        
        $user1 = new User();
        $user1->name = 'Usuario 1';
        $user1->email = 'usuario1@admin.com';
        $user1->password = bcrypt('usuario');
        $user1->save();
        $user1->roles()->attach($role_ingresar);
        $user1->roles()->attach($role_eliminar);
        $user1->roles()->attach($role_modificar);
        $user1->roles()->attach($role_ver);
    }
}
