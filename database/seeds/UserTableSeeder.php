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
        $role_c = Role::where('name', 'CREATE')->first();
        $role_r = Role::where('name', 'READ')->first();
        $role_u = Role::where('name', 'UPDATE')->first();
        $role_d = Role::where('name', 'DELETE')->first();
        $role_admin = Role::where('name', 'ADMIN')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_admin);
        
        $user1 = new User();
        $user1->name = 'Usuario 1';
        $user1->email = 'usuario1@admin.com';
        $user1->password = bcrypt('usuario');
        $user1->save();
        $user1->roles()->attach($role_c);
        $user1->roles()->attach($role_r);
        $user1->roles()->attach($role_u);
        $user1->roles()->attach($role_d);

        $user2 = new User();
        $user2->name = 'Usuario 2';
        $user2->email = 'usuario2@admin.com';
        $user2->password = bcrypt('usuario');
        $user2->save();
    }
}
