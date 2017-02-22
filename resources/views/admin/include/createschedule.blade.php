@include('admin.include.createperiod')
@section('head')
    <style>
        .font-awe {
            font-family: 'Roboto', FontAwesome, sans-serif;
            border: 0px;
            width: 120px;
            font-size: 9pt;
        }
    </style>
@endsection
<div class="col-xs-2">
    <div class="row">
        Horarios Creados
    </div>
</div>
<!--Header table schedules-->
<div class="col-xs-10">
    <div class="row" style="margin-bottom: 20px">
        Horario asignado al grupo <input type="text" placeholder="&#xF002; Elija Grupo" style="font-size: 11pt" class="font-awe"/>
    </div>
    <table id="schedule-table" class="table">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hours as $i=>$hour)
        <tr>
            <td class="border-div txt-align-center">{{ $hour->hour }}</td>
            @for($i=0; $i<5; $i++)
                    <td>
                        <input type="text" placeholder="&#xF002; Elija Docente" class="font-awe"/>
                        <input type="text" placeholder="&#xF002; Elija Materia" class="font-awe"/>
                    </td>
            @endfor
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@section('javascript')
    <script>

    </script>
@endsection