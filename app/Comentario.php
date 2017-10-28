<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }
}
