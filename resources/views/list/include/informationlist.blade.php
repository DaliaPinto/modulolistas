<!--obtain all the schedule details-->
<div id="information-div">
    <div class="row txt-align-center schedule-head">Lista de Asistencia del grupo   {{ $schedule->group->grade}}&ordm;{{ $schedule->group->group }}</div>
    <div class="col-xs-1 margin-bot">
        <div class="dropdown">
            Opciones <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa-bars fa-2x" aria="true"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="{{route('home')}}"><i class="fa fa-arrow-circle-left" aria="true"></i> Regresar a horarios</a></li>
                <li role="separator" class="divider"></li>
                <li id="new-incidence"><a href="#"><i class="fa fa-warning" aria="true"></i> Reportar Incidencia</a></li>
                <li><a href="#"><i class="fa fa-file-excel-o" aria="true"></i> Descargar Lista en Excel</a></li>
            </ul>
        </div>
    </div>
    <div class="col-xs-6 mrg-text">
        <i class="fa fa-graduation-cap" aria="true"></i> CARRERA: {{ $schedule->group->career->name }}
    </div>
    <div class="col-xs-3 mrg-text"><i class="fa fa-calendar" aria="true"></i> PERIODO: {{ $schedule->group->period->description }}</div>
    <div class="col-xs-2 mrg-text"><i class="fa fa-users" aria="true"></i> GRUPO: {{ $schedule->group->group }}</div>
    <div class="col-xs-6 mrg-text">
        <i class="fa fa-user" aria="true"></i> PROFESOR: {{ $schedule->teacher->name }} {{ $schedule->teacher->last_name }} {{ $schedule->teacher->middle_name }}
    </div>

    <div class="col-xs-3 mrg-text">
        <i class="fa fa-calendar-o" aria="true"></i> CUATRIMESTRE:
        @php
            $quarters = array('', 'Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Onceavo');
            for($i=0; $i<=count($quarters); $i++){
                if($schedule->group->grade == $i){
                    echo strtoupper($quarters[$i]);
                }
            }
        @endphp
    </div>

    <div class="col-xs-2 mrg-text"><i class="fa fa-clock-o" aria="true"></i> TURNO:
        @if($schedule->group->shift == 'M')
            Matutino
        @else
            Vespertino
        @endif
    </div>


    <div class="col-xs-6 mrg-text"><i class="fa fa-book" aria="true"></i> MATERIA: {{ $schedule->subject->name }} </div>
    <div class="col-xs-2 mrg-text" id="month-name"></div>
</div><!--/information-list-->
