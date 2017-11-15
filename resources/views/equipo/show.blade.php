@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="pull-right">
                <a class="btn btn-primary" href="{{ route('equipo.index') }}"> Back</a>
            </div><h1>{{$equipo->name}}</h1></div>

            <div class="panel-body">
              <p>{{ $equipo->description }}</p>
              <hr>
              <p>Comentarios: </p>
              @foreach ($equipo->comentarios as $c)
                <div class="row">
                  <div class="col-md-3">
                  {{$c->updated_at}}
                  </div>
                  <div class="col-md-9">
                    <p>{{$c->comment}}</p>
                  </div>
                </div>
              @endforeach
            </div>
            @if (Auth::user()->hasAnyRole(['CREATE','ADMIN']))
            <form class="form-horizontal" method="POST" action="{{ url('comentario') }}">
              {{ csrf_field() }}
              <input name="user_id" type="hidden" value="{{ Auth::user()->id}}">
              <input name="equipo_id" type="hidden" value="{{$equipo->id}}}">

              <div class="form-group{{ $errors->has('coment') ? ' has-error' : '' }}">
                <label for="comment" class="col-md-4 control-label">Comentario</label>
                  <div class="col-md-6">
                    <textarea id="comment" name="comment" class="form-control" style="resize: vertical;" rows="5" value="{{ old('comment') }}" autofocus></textarea>
                    @if ($errors->has('comment'))
                      <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                      </span>
                    @endif
                  </div>
              </div>
              <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-4 col-md-offset-4">
                                {!! Form::captcha() !!} 
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Comentar
                  </button>
                </div>
              </div>
            </form>
            @endif
        </div>
    </div>
  </div>
</div>
{!! Captcha::script() !!}
@endsection
