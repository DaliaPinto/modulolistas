@extends('layouts.app')
@section('javascript')
    <!--Attendance list-->
    <script src="{{URL::to('/js/list/list.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/list/assistance.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        //data: is an array of objects, contains days, and hours of schedules
        //are impart.
        var data = {!! $days !!};

        var months = {!! $months !!}

        var month = {!! $current_month !!};

        //startDate: when the first month starts
        //endDate: when the first month ends
        //dates: is a function and return a weekdays array.
        //url is the route where the incidence will edit
        //url is the route where the incidence will create
        var startDate = addDays(new Date(month.start_date), 1),
                endDate = addDays(new Date(month.end_date), 1),
                dates = getDates(startDate, endDate, data),
                url = '{{ route('edit') }}',
                urlIncidence= '{{ route('createIncidence') }}';

        @foreach($months as $key=>$m)
            var date = months[{{$key}}].start_date;
            $tab = $('.tab-month');
            //Put month text in tabs
            //$tab.eq({{$key}}).html(date.format('MMMM').toUpperCase());
            //route about month
            $tab.attr('href', '{{route('list', ['list' => $schedule->id, 'month'=> $m->id])}}');
        @endforeach

        //make options in select incidence modal
        document.body.onload = selectIncidence(dates);
        //draw tds in td table
        document.body.onload = drawTdAssistence(dates, data, startDate);
        //put in header table list, the date day
        drawThAssistence(startDate);
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="bs-example" data-example-id="simple-nav-tabs">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active" data-toggle="tooltip" title="Seleccione el mes" data-placement="top"><a class="tab-month"></a></li>
                <li role="presentation" data-toggle="tooltip" title="Seleccione el mes" data-placement="top"><a class="tab-month"></a></li>
                <li role="presentation" data-toggle="tooltip" title="Seleccione el mes" data-placement="top"><a class="tab-month"></a></li>
                <li role="presentation" data-toggle="tooltip" title="Seleccione el mes" data-placement="top"><a class="tab-month"></a></li>
            </ul>
            <!--information List-->
            @include('list.include.informationlist')
            <div class="row">

                <div class="col-md-12">
                    <!--students List-->
                    <table class="table table-bordered" id="listAttendance">
                        <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2" class="th-id">Matrícula</th>
                            <th rowspan="2" class="th-name">Nombre</th>
                            <th colspan="6" class="txt-align-center">Primer Semana</th>
                            <th colspan="6" class="txt-align-center">Segunda Semana</th>
                            <th colspan="6" class="txt-align-center">Tercer Semana</th>
                            <th colspan="6" class="txt-align-center">Cuarta Semana</th>
                            <th colspan="7" class="txt-align-center">Quinta semana</th>
                            <th colspan="2">Total</th>
                        </tr>
                        <tr id="tr-days"></tr>
                        </thead>
                        <tbody>
                        @forelse($students->sortBy('student.last_name') as $s)
                            <tr class="tr-students">
                                <td class="student-number"></td>
                                <td>{{ $s->student_id }}</td>
                                <td>{{ $s->student->last_name }} {{ $s->student->middle_name }} {{ $s->student->name }} </td>
                               {{-- @for($i=0;$i<36;$i++)
                                    <td class="assistance"></td>
                                @endfor--}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="36">No hay estudiantes asignados a este grupo por el momento</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if(count($students) != 0)
                <div class="row">
                    <div class="col-md-7"><button id="save-list" class="btn btn-primary">Guardar Lista</button></div>
                    <div class="col-md-5" id="cur-date"></div>
                </div>
                <div class="row" id="messages">
                </div>
            @endif
        </div>
    </div>
    <!--Modal view-->
    @include('incidence.create')
@endsection

