@extends('layouts.app')
@section('content')
<div class="container">
    <!--information List-->
    @include('list.include.informationlist')
    <div class="row">
        <div class="col-md-12">
            <!--students List-->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Matrícula</th>
                    <th rowspan="2">Nombre</th>
                    <th colspan="5">Primer Semana</th>
                    <th colspan="5">Segunda Semana</th>
                    <th colspan="5">Tercer Semana</th>
                    <th colspan="5">Cuarta Semana</th>
                    <th colspan="5">Quinta semana</th>
                    <th colspan="2">Total</th>
                </tr>
                @include('list.include.days')
                </thead>
                <tbody>
                    @foreach($students as $i=>$s)
                        <tr>
                            <td> {{ $i+1 }} </td>
                            <td>{{ $s->student_id }}</td>
                            <td>{{ $s->student->name }} {{ $s->student->last_name }} {{ $s->student->second_name }} </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div id="current-day" class="col-md-3"></div>
    </div>
</div>
@endsection

@section('javascript')
    <script>

    </script>
    <script src="{{URL::to('/js/getdates.js')}}" type="text/javascript"></script>
@endsection