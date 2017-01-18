<!--obtain all the schedule data-->
<div id="information-div">
    <div class="row">
        <div class="col-md-11 txt-center">Lista de Asistencia</div>
        <div class="col-md-1">
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-arrow-left" aria="true"></span> Regresar a horarios</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><span class="glyphicon glyphicon-alert" aria="true"></span> Reportar Incidencia</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-open-file" aria="true"></span> Descargar Lista</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            CARRERA: Tecnologías de la Información y Comunicación
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


<!-- Modal Incidence-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria="true"></span></button>
                <h4 class="modal-title">Reportar Incidencia</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="incidence-date">Seleccione Fecha:</label>
                        <select name="incidence-date" id="incidence-date" class="form-control">
                            <option value="1">2017-01-13</option>
                        </select>
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="incidence-reason">Motivo de Incidencia: </label>
                        <input type="text" class="form-control" id="incidence-reason" name="incidence-reason">
                    </div>
                    <div class="form-group">
                        <label for="incidence-description">Descripción: </label>
                        <textarea name="incidence-description" id="incidence-description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="incidence-activity">Actividades: </label>
                        <textarea name="incidence-activity" id="incidence-activity" rows=5 class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="incidence-save">Guardar Cambios</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

