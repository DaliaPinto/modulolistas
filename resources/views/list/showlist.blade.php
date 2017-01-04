@section('javascript')
    <script src="{{URL::to('/js/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/getdates.js')}}" type="text/javascript"></script>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
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
                        <th colspan="7">Primer Semana</th>
                        <th colspan="7">Segunda Semana</th>
                        <th colspan="7">Tercer Semana</th>
                        <th colspan="7">Cuarta Semana</th>
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
            <div class="col-md-7"></div>
            <div id="current-day" class="col-md-5"></div>
        </div>
    </div>
    @include('list.include.assistance')
@endsection