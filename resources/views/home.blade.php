@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->hasAnyRole(['READ','ADMIN']))
                        <a href="{{url('equipo')}}" class="btn btn-success">Ver equipos</a>
                    @else
                        <p>No tienes permisos</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
