<div class="row txt-align-center schedule-head">
    Horarios del profesor {{$teacher->name}} {{ $teacher->last_name }} {{ $teacher->middle_name }} del Periodo {{$period->description}}
</div>
<div class="row">
    <div class="col-md-6 txt-align-left">
        <div class="dropdown">
            <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="fa fa fa-search" aria="true"></i>
            </button>
              Click para elegir la búsqueda de listas de Asistencia
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#"><i class="fa fa-calendar" aria="true"></i> Periodos Anteriores</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="fa fa-book" aria="true"></i> Materias</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="fa fa-users" aria="true"></i> Grupos</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-6 txt-align-right" id="is-today">
    </div>
</div>