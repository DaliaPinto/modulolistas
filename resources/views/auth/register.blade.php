@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Docentes</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="40" placeholder="Máximo 35 caracteres" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="teacher" class="col-md-4 control-label">Seleccione a un docente no registrado</label>
                            <div class="col-md-6">
                                <select name="teacher" id="teacher" class="form-control">
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}} {{$teacher->last_name}} {{$teacher->middle_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_type" class="col-md-4 control-label">Seleccione Permiso de usuario</label>
                            <div class="col-md-6">
                                <select name="user_type" id="user_type" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="save-user">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">

        var url = '{{ route('editTeacher') }}';
        var token = '{{ Session::token() }}';
        {{--var user = {{ $teacher = Auth::user()->id }};--}}

        //save in post route, all the values that was obtained on inputs
        $('#save-user').on('click', function(){
            $.ajax({
                method: 'POST',
                url: url,
                data:{
                    //id: made a data-type in html, then pass the attribute to js and this, could named as incidenceId or something like that
                    teacher : $('#teacher option:selected').val(),
                    //user_id : user,
                    _token : token
                }
            })
            .done(function(teacher) {
                //console.log(JSON.stringify(message));
            })
        });

    </script>
@endsection
