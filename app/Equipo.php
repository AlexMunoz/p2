<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['name', 'description'];

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }
}
