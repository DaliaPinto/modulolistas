<!--obtain all the schedule data-->
<div class="row">
    <div class="col-md-12 txt-center">Lista de Asistencia</div>
    <div class="col-md-5">
        CARRERA: Tecnologías de la Información y Comunicación
    </div>
    <div class="col-md-2">TURNO:
        @if($schedule->group->shift == 'M')
            Matutino
        @else
            Vespertino
        @endif
    </div>
    <div class="col-md-3">PERIODO: {{ $schedule->group->period->description }}</div>
    <div class="col-md-2">MATERIA: {{ $schedule->subject->name }} </div>
</div>
<div class="row">
    <div class="col-md-5">
        PROFESOR: {{ $schedule->teacher->name }} {{ $schedule->teacher->last_name }} {{ $schedule->teacher->second_name }}
    </div>
    <div class="col-md-2">GRUPO: {{ $schedule->group->quarter }} {{ $schedule->group->group }}</div>
    <div class="col-md-3" id="month-name">
        MES:
    </div>
    <div class="col-md-2">
        CUATRIMESTRE:
        @php
            $quarters = array('', 'Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Onceavo');
            for($i=0; $i<=count($quarters); $i++){
                if($schedule->group->quarter == $i){
                    echo strtoupper($quarters[$i]);
                }
            }
        @endphp
    </div>
</div>


