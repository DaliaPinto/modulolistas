<!--Header table schedules-->
<div class="panel">
    <div class="txt-center header-div">
        <div class="row">
            <div class="col-md-2 border-div">Hora</div>
            <div class="col-md-2 border-div">Lunes</div>
            <div class="col-md-2 border-div">Martes</div>
            <div class="col-md-2 border-div">Miércoles</div>
            <div class="col-md-2 border-div">Jueves</div>
            <div class="col-md-2">Viernes</div>
        </div>
    </div>
    <!--Obtain the schedule in divs-->

    <div class="panel-body panel-div">
        <!--Hour Panel-->
        @foreach($hours as $i=>$h)
            <div class="row">
                <div class="col-md-2">
                    {{$h->start_hour }} - {{ $h->end_hour }}
                </div>
                <!--Schedule include view-->
                @include('schedule.include.subjects')
            </div>
        @endforeach
    </div>
</div>
