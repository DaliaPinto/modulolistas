<!--Header table schedules-->
<div class="panel">
    <div class="txt-center header-div">
        <div class="row">
            <div class="col-md-2 border-div">Lunes</div>
            <div class="col-md-2 border-div">Martes</div>
            <div class="col-md-2 border-div">Miércoles</div>
            <div class="col-md-2 border-div">Jueves</div>
            <div class="col-md-2 border-div">Viernes</div>
            <div class="col-md-2">Sábado</div>
        </div>
    </div>
    <!--Obtain the schedule in divs-->
    <div class="panel-body panel-div">
        <div class="row">
            <!--Schedule View-->
            @if(isset($schedules))
                @foreach($schedules as $s)
                    <div id="cont" class="col-md-2">
                        {{$s->hora_id}}
                        {{$s->docente_id}}
                        {{$s->materia_id}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
