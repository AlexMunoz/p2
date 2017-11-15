<?php

use Illuminate\Database\Seeder;
use App\Equipo;

class EquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipo = new Equipo();
        $equipo->name = 'Equipo 1';
        $equipo->description = 'Este es el equipo 1';
        $equipo->save();

        $equipo1 = new Equipo();
        $equipo1->name = 'Equipo 2';
        $equipo1->description = 'Este es el equipo 2';
        $equipo1->save();

        $equipo2 = new Equipo();
        $equipo2->name = 'Equipo 3';
        $equipo2->description = 'Este es el equipo 3';
        $equipo2->save();
    }
}
