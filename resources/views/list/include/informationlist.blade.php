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
    <!--<div class="col-md-3">
        @--php
            $a = $list_dates->start_date;
            $b = $list_dates->end_date;
            $today = date("m");

            $i = date("m", strtotime($a));
            while($i <= date("m", strtotime($b))){
            //echo $i."\n";
                if ($i == "01"){
                    echo 'MES: ENERO';
                }
                if ($i == "02"){
                    echo 'MES: FEBRERO';
                }
                if ($i == "03"){
                    echo 'MES: MARZO';
                }
                if ($i == "04"){
                    echo 'MES: ABRIL';
                }
                if ($i == "05"){
                    echo 'MES: MAYO';
                }
                if ($i == "06"){
                    echo 'MES: JUNIO';
                }
                if ($i == "07"){
                    echo 'MES: JULIO';
                }
                if ($i == "08"){
                    echo 'MES: AGOSTO';
                }
                if ($i == "09"){
                    echo 'MES: SEPTIEMBRE';
                }
                if ($i == "10"){
                    echo 'MES: OCTUBRE';
                }
                if ($i == "11"){
                    echo 'MES: NOVIEMBRE';
                }
                if ($i== "12"){
                    $i = (date(strtotime($i."01")) + 1)."01";
                    echo 'MES: DICIEMBRE';
                }else{
                    $i++;
                }
            }--
        @endphp
    </div>-->
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


