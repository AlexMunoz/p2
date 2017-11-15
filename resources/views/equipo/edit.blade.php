@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar equipo: {{$equipo->name}}</div>

            <div class="panel-body">
              
                <form class="form-horizontal" method="POST" action="{{ action('EquipoController@update', $equipo->id) }}">
                    {{ csrf_field() }}  
                      <input name="_method" type="hidden" value="PATCH">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $equipo->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Descripción</label>

                        <div class="col-md-6">
                            <textarea id="description" name="description" class="form-control" style="resize: vertical;" rows="5" autofocus>{{ $equipo->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Modificar
                            </button>
                            <a class="btn btn-primary" href="{{ route('equipo.index') }}"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

