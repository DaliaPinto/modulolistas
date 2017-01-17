@extends('layouts.app')
@section('javascript')
    <script src="{{URL::to('/js/jquery/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery-min/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery-min/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/list/list.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/list/assistance.js')}}" type="text/javascript"></script>
    <script>
        //arrays of dates and hours
        var days = [];
        var hours = [];
        //push eloquent variables to array
        @foreach($days as $d)
            days.push({{$d->day}});
            //days has hours
            @foreach($d->hours as $h)
                hours.push("{{$h->hour->start_hour}}");
            @endforeach
        @endforeach
        //startDate: when the first month starts
        //endDate: when the first month ends
        //dates: is a funtion and return a weekdays array.
        var startDate = new Date("{{$list_start_date}}"),
            endDate = new Date ("{{$list_end_date}}"),
            dates = getDates(startDate, endDate, days);
        //This functions return a table calendar header
        daysMonth(new Date("2017-01-12"), dates);
        //This function return <td> cells in table list.
        drawTdAssistence(dates, hours);
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="bs-example" data-example-id="simple-nav-tabs">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Enero</a></li>
                <li role="presentation"><a href="#">Febrero</a></li>
                <li role="presentation"><a href="#">Marzo</a></li>
                <li role="presentation"><a href="#">Abril</a></li>
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
                            <th colspan="6">Primer Semana</th>
                            <th colspan="6">Segunda Semana</th>
                            <th colspan="6">Tercer Semana</th>
                            <th colspan="6">Cuarta Semana</th>
                            <th colspan="7">Quinta semana</th>
                            <th colspan="2">Total</th>
                        </tr>
                        <tr id="tr-days"></tr>
                        </thead>
                        <tbody>
                            @foreach($students->sortBy('student.last_name') as $s)
                                <tr class="tr-students">
                                    <td class="student-number"></td>
                                    <td>{{ $s->student_id }}</td>
                                    <td>{{ $s->student->last_name }} {{ $s->student->second_name }} {{ $s->student->name }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row"><button id="save-list" class="btn btn-primary">Guardar Lista</button></div>
            <div class="row">
                <div class="col-md-7"></div>
                <div id="current-day" class="col-md-5"></div>
            </div>
        </div>
    </div>
@endsection