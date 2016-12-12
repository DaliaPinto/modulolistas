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
                    <th colspan="6">Primer Semana</th>
                    <th colspan="6">Segunda Semana</th>
                    <th colspan="6">Tercer Semana</th>
                    <th colspan="6">Cuarta Semana</th>
                    <th colspan="6">Quinta semana</th>
                    <th colspan="2">Total</th>
                </tr>
                @include('list.include.days')
                </thead>
                <tbody>

                    @foreach($students->sortBy('student.last_name') as $s)
                        <tr id="">
                            <td>
                            </td>
                            <td>{{ $s->student_id }}</td>
                            <td>{{ $s->student->last_name }} {{ $s->student->second_name }} {{ $s->student->name }} </td>
                            @for($i=0; $i<30; $i++)
                                <td>
                                    <select>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="R">R</option>
                                        <option value="/">/</option>
                                    </select>
                                </td>
                            @endfor
                            <td>

                            </td>
                            <td>

                            </td>
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
@endsection
@section('javascript')
    <script>
    </script>
    <script src="{{URL::to('/js/getdates.js')}}" type="text/javascript"></script>
@endsection