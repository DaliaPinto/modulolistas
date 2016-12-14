<!--obtain all the schedule data-->

<div class="row">
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
    <div class="col-md-3">PERIODO: {{ $schedule->period->description }}</div>
    <div class="col-md-2">MATERIA: {{ $schedule->subject->name }} </div>
</div>
<div class="row">
    <div class="col-md-5">
        PROFESOR: {{ $schedule->teacher->name }} {{ $schedule->teacher->last_name }} {{ $schedule->teacher->second_name }}
    </div>
    <div class="col-md-2">GRUPO: {{ $schedule->group->quarter }} {{ $schedule->group->group }}</div>
    <div class="col-md-3" id="month-name">
        MES:
        @foreach($list_dates as $k=>$l)
           @php
                /*Pendiente*/
                /*$end_date = $l->end_date;
                $month = date("n",strtotime($end_date));
                $months = array('', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
                for($i=0; $i<count($months); $i++){
                    if(intval($month)== $i){
                        echo $months[$i];
                    }
                }*/
           @endphp
        @endforeach
    </div>
    <div class="col-md-2">
        CUATRIMESTRE:
        @php
            $quarters = array('', 'Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Séptimo', 'Octavo', 'Noveno', 'Décimo', 'Onceavo');
            for($i=0; $i<count($quarters); $i++){
                if($schedule->group->quarter == $i){
                    echo $quarters[$i];
                }
            }
        @endphp
    </div>
</div>


