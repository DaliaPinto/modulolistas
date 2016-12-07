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
                    <th rowspan="2">#</th>
                    <th rowspan="2">Matrícula</th>
                    <th rowspan="2">Nombre</th>
                    <th colspan="5">Primer Semana</th>
                    <th colspan="5">Segunda Semana</th>
                    <th colspan="5">Tercer Semana</th>
                    <th colspan="5">Cuarta Semana</th>
                    <th colspan="5">Quinta semana</th>
                    <th colspan="2">Total</th>
                </tr>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>A</th>
                    <th>F</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $i=>$s)
                        <tr>
                            <td> {{ $i+1 }} </td>
                            <td>{{ $s->student_id }}</td>
                            <td>{{ $s->student->name }} {{ $s->student->last_name }} {{ $s->student->second_name }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection