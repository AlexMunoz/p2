<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['comment', 'user_id', 'equipo_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo');
    }
}
