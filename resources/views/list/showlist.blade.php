@extends('layouts.app')
@section('javascript')
    <script src="{{URL::to('/js/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/getdates.js')}}" type="text/javascript"></script>
    <script>
        var days = [];
        @foreach($days as $d)
            days.push({{$d->day}});
            @foreach($d->hours as $h)
                var time = "{{$h->hour->start_hour}}";
            @endforeach
        @endforeach
        var startDate = new Date("{{$list_start_date}}"),
            endDate = new Date ("{{$list_end_date}}"),
            dates = getDates(startDate, endDate, days);

        daysMonth(new Date("2017-04-12"), dates);
        drawTdAssitence(dates);
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
        </div>
        <div class="row">
            <div class="col-md-7"></div>
            <div id="current-day" class="col-md-5"></div>
        </div>
    </div>
@endsection