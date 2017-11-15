@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-12">
              <h2>Equipos</h2>
            </div>
            <div class="col-md-2">
              @if (Auth::user()->hasAnyRole(['CREATE','ADMIN']))
                <a href={{url("/equipo/create")}} class="btn btn-primary">Crear</a>            
              @endif
            </div>
            <div class="col-md-10">
              <form action="" method="GET">
                <div class="input-group">
                  <input name="search" type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Buscar</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($equipos as $equipo)
                <tr>
                <td>{{ $equipo->name }}</td>
                <td>
                  @if (Auth::user()->hasAnyRole(['READ','ADMIN']))
                    <a href={{url("/equipo/{$equipo->id}")}} class="btn btn-success">Ver</a>
                  @endif
                  @if (Auth::user()->hasAnyRole(['UPDATE','ADMIN']))
                    <a href={{url("/equipo/{$equipo->id}/edit")}} class="btn btn-info">Editar</a>
                  @endif
                  @if (Auth::user()->hasAnyRole(['DELETE','ADMIN']))
                  <form action="{{action('EquipoController@destroy', $equipo->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                  @endif
                </td>
                </tr>
              @endforeach
            <tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
