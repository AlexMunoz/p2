<?php

use Illuminate\Database\Seeder;
use App\Equipo;
use App\User;
use App\Comentario;

class ComentarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipo = Equipo::where('name', 'Equipo 1')->first();
        $user = User::where('name', 'Usuario 1')->first();

        $comentario = new Comentario();
        $comentario->user_id = $user->id;
        $comentario->equipo_id = $equipo->id;
        $comentario->comment = 'Comentario'; 
        $comentario->save();
    }
}
