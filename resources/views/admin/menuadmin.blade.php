@extends('layouts.app')

@section('head')
    <script src="{{URL::to('js/vue.js')}}"></script>
    <style>
        .navigation{
            width: 100%;
            height: 50px;
            background-color: #FCFCFC;
            margin-bottom: 20px;
            border-bottom: solid 1px #E9E9E9;
        }
    </style>
@endsection

@section('content')
<div class="navigation">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('home')}}"><i class="fa fa-clock-o" aria-hidden="true"></i> Administrar Horarios</a></li>
            <li><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Consultar Listas de Asistencia</a></li>
            <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Consultar Sesiones</a></li>
            <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Registrar Usuarios</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</div>
<div class="container">
    @include('admin.include.createschedule')
</div>
@endsection