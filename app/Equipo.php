<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
}
