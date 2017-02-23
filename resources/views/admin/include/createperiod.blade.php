@if($period !=null)
    <div class="row txt-align-center schedule-head">Horarios del período {{$period->description}}</div>
@else
    <div class="col-xs-4">
        Seleccione la fecha inicial del Periodo
    </div>
    <div class="col-xs-2">
         <i class="fa fa-calendar" aria="true"></i>
        <input type="text" class="" id="datepicker-start" placeholder="Selecciona la fecha de Inicio">
    </div>
    <div class="col-xs-4">
        Seleccione la fecha final del primer mes del periodo
    </div>
    <div class="col-xs-2">
         <i class="fa fa-calendar" aria="true"></i>
        <input type="text" class="" id="datepicker-start" placeholder="Selecciona la fecha de Inicio">
    </div>
    <div class="col-xs-4">
        Seleccione la inicial del último mes del Periodo
    </div>
    <div class="col-xs-2">
        <i class="fa fa-calendar" aria="true"></i>
        <input type="text" class="" id="datepicker-end" placeholder="Selecciona la fecha Fin">
    </div>
    <div class="col-xs-4">
        Seleccione la fecha final del Periodo
    </div>
    <div class="col-xs-2">
         <i class="fa fa-calendar" aria="true"></i>
        <input type="text" class="" id="datepicker-end" placeholder="Selecciona la fecha Fin">
    </div>
@endif


