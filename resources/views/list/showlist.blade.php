@extends('layouts.app')
@section('javascript')
    <script src="{{URL::to('/js/list/list.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/list/assistance.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        //day arrays obtain the weekday, it will use in
        //getDates functions
       /* var days = [];
        var daysId =[];
        {{--@foreach($days as $d)
            days.push({day_number : {{$d->day}}, day_id: {{$d->id}}} );
        @endforeach--}}*/

        //count total hours by day, to pass list
        var data = {!! $days !!};
        validateStatus(data);

        //startDate: when the first month starts
        //endDate: when the first month ends
        //dates: is a function and return a weekdays array.
        //url is the route where the incidence will edit
        //url is the route where the incidence will create
        var startDate = new Date("{{$list_start_date}}"),
            endDate = new Date ("{{$list_end_date}}"),
            dates = getDates(startDate, endDate, data),
            url = '{{ route('edit') }}',
            urlIncidence= '{{ route('createIncidence') }}';

        //make options in select incidence modal
        document.body.onload = selectIncidence(dates);
        document.body.onload = drawTdAssistence(dates, data);
        daysMonth(new Date());

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
                        @forelse($students->sortBy('student.last_name') as $s)
                            <tr class="tr-students">
                                <td class="student-number"></td>
                                <td>{{ $s->student_id }}</td>
                                <td>{{ $s->student->last_name }} {{ $s->student->second_name }} {{ $s->student->name }} </td>
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

