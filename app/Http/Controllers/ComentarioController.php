<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Equipo;
use Illuminate\Http\Request;
use Arcanedev\NoCaptcha\Rules\CaptchaRule;
use App\Http\Controllers\Controller;

class ComentarioController extends Controller
{
  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function Store(Request $request) {
    $request->validate([
        'user_id' => 'required',
        'equipo_id' => 'required',
        'comment' => 'required|max:255',
        'g-recaptcha-response' => ['required', new CaptchaRule],
      ],
      [
          'g-recaptcha-response.required' => 'Captcha requerido.',
          'g-recaptcha-response.captcha'  => 'Captcha requerido',
      ]);

    $comment = new Comentario([
        'user_id' => $request->get('user_id'),
        'equipo_id' => $request->get('equipo_id'),
        'comment' => $request->get('comment'),
    ]);

    $equipo = Equipo::find($request->get('equipo_id'));
    $equipo->comentarios()->save($comment);
    return redirect()->action('EquipoController@show', ['id' => $equipo->id]);
  }
}