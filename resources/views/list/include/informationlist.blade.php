<!--obtain all the schedule details-->
<div id="information-div">
    <div class="row">
        <div class="col-md-11 txt-center">Lista de Asistencia</div>
        <div class="col-md-1">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-bars fa-2x" aria="true"></i>
                </button>  Opciones
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{{route('home')}}"><i class="fa fa-arrow-circle-left" aria="true"></i> Regresar a horarios</a></li>
                    <li role="separator" class="divider"></li>
                    <li id="new-incidence"><a href="#"><i class="fa fa-warning" aria="true"></i> Reportar Incidencia</a></li>
                    <li><a href="#"><i class="fa fa-file-excel-o" aria="true"></i> Descargar Lista en Excel</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            CARRERA: {{ $schedule->group->career->name }}
        </div>
        <div class="col-md-4">MATERIA: {{ $schedule->subject->name }} </div>
        <div class="col-md-3">PERIODO: {{ $schedule->group->period->description }}</div>
    </div>
    <div class="row">
        <div class="col-md-2">TURNO:
            @if($schedule->group->shift == 'M')
                Matutino
            @else
                Vespertino
            @endif
        </div>
        <div class="col-md-2">GRUPO: {{ $schedule->group->quarter }} {{ $schedule->group->group }}</div>
        <div class="col-md-4">
            PROFESOR: {{ $schedule->teacher->name }} {{ $schedule->teacher->last_name }} {{ $schedule->teacher->second_name }}
        </div>
        <div class="col-md-2" id="month-name">
            MES:
        </div>
        <div class="col-md-2">
            CUATRIMESTRE:
            @php
                $quarters = array('', 'Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Onceavo');
                for($i=0; $i<=count($quarters); $i++){
                    if($schedule->group->grade == $i){
                        echo strtoupper($quarters[$i]);
                    }
                }
            @endphp
        </div>
    </div>
</div>
