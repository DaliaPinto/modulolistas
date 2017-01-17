<!--obtain all the schedule data-->
<div id="information-div">
    <div class="row">
        <div class="col-md-12 txt-center">Lista de Asistencia</div>
    </div>
    <div class="row">
        <div class="col-md-3"><a href="#">Reportar Incidencias</a></div>
        <div class="col-md-6">
            CARRERA: Tecnologías de la Información y Comunicación
        </div>
        <div class="col-md-3">TURNO:
            @if($schedule->group->shift == 'M')
                Matutino
            @else
                Vespertino
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"><a href="#">Descargar Lista</a></div>
        <div class="col-md-3">PERIODO: {{ $schedule->group->period->description }}</div>
        <div class="col-md-3">MATERIA: {{ $schedule->subject->name }} </div>
        <div class="col-md-3">GRUPO: {{ $schedule->group->quarter }} {{ $schedule->group->group }}</div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
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
<!-- Modal Incidence-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reportar Incidencia</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="incidence-body">Seleccione Fecha:</label>
                        <select name="incidence-body" id="incidence-body" class="form-control"></select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

