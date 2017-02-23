@include('admin.include.createperiod')
@section('head')
    <link href="/css/jquery/jquery-ui.css" rel="stylesheet">
    <style>
        .font-awe {
            font-family: 'Roboto', FontAwesome, sans-serif;
        }
        .input-txt{
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
    <div id='group' class="row" style="margin-bottom: 20px">
        Horario asignado al grupo <input type="text" placeholder="&#xF002; Elija Grupo" class="font-awe input-txt"/>
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
                    <td class="border-div txt-align-center">
                        <input type="text" placeholder="&#xF002; Elija Docente" class="font-awe teacher input-txt"/>
                        <input type="text" placeholder="&#xF002; Elija Materia" class="font-awe subject input-txt"/>
                    </td>
            @endfor
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@section('javascript')
    <script src="{{URL::to('/js/jquery/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery-min/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery/jquery-ui.js')}}" type="text/javascript"></script>

    <script>
        //datepicker
        $(function() {
            $("#datepicker-start, #datepicker-end").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });



        let subjects = {!! $subjects !!};
        let teachers = {!! $teachers !!};
        let groups = {!! $groups !!};

        new Vue({
            el: '#group',
            data:{

            },
            methods:{

            }

        });

    </script>
@endsection
