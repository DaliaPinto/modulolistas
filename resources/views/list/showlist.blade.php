@section('head')
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
@endsection
@extends('layouts.app')
@section('javascript')
    <script src="{{URL::to('/js/list/list.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/list/assistance.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/validation.js')}}" type="text/javascript"></script>
    <script>
        //arrays of dates and hours
        var days = [];
        //push number day and id in an array
        @foreach($days as $d)
            days.push({{$d->day}});
        @endforeach
        //startDate: when the first month starts
        //endDate: when the first month ends
        //dates: is a function and return a weekdays array.
        //url is the route where the incidence will edit
        //url is the route where the incidence will create
        var startDate = new Date("{{$list_start_date}}"),
            endDate = new Date ("{{$list_end_date}}"),
            dates = getDates(startDate, endDate, days),
            url = '{{ route('edit') }}',
            urlIncidence= '{{ route('create') }}';

        //This function return a table calendar header
        daysMonth(new Date());
        //make options in select incidence modal
        document.body.onload = selectIncidence(dates);
        document.body.onload = drawTdAssistence(dates);
        /**
         * drawTdAssistance create <td> in a loop. it contains a selects with
         * options to mark assistance (just the days when the subjects are impart)
         */
        function drawTdAssistence(dates){
            //console.log(dt.getDate());
            var trStudents = document.getElementsByClassName('tr-students');
            for(var i = 0; i<trStudents.length; i++){
                for(var j = 2;j < 38; j++){
                    var sunday = j % 7;
                    if (sunday != 0) {
                        var tdAssistance = document.createElement('td');
                        tdAssistance.className = 'td-assistance';
                        trStudents[i].appendChild(tdAssistance);
                        for (var h = 0; h < dates.length; h ++) {
                            if(j==dates[h].getDate()){
                                var div = document.createElement('div');
                                div.className = 'select-students';
                                showSelect(div);
                                tdAssistance.appendChild(div);
                            }
                        }
                    }
                }
            }
        }
        /**
         *Create a menu options, to change assistance in list
         *param: div - parent to append select.
         */
        function showSelect(div) {
            var form = document.createElement('form');
            form.className = 'form-assistance';
            //create select element
            var select = document.createElement('select');
            //put class attribute to select.
            select.className = 'select-status';
            //array of status
            var status = ['A', 'B', 'C', 'D', 'E','/', 'R', 'J'];
            //loop 8 times, cause are 8 options
            for(var i = 0; i<8; i++){
                //create option
                var options = document.createElement('option');
                //value is the status
                options.value = status[i];
                //put status
                options.innerHTML = status[i];
                //append options in select.
                select.appendChild(options);
            }
            //append select in div param.
            form.appendChild(select);
            div.appendChild(form);
        }
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
            <div class="row">
                <div class="col-md-7"><button id="save-list" class="btn btn-primary">Guardar Lista</button></div>
                <div class="col-md-5" id="cur-date"></div>
            </div>
            <div class="row" id="messages">
            </div>
        </div>
    </div>
    <!--Modal view-->
    @include('incidence.create')
@endsection

