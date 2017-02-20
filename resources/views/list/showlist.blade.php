@extends('layouts.app')

@section('head')
    <script src="{{URL::to('js/vue.js')}}"></script>
    <style>
        .popupAttendance {
            position: absolute;
            top: 50%;
            left: 100%;
            transform: translateY(-50%);
            display: block;
            width: 270px;
            cursor: default;
        }
    </style>
@endsection

@section('content')
    <div class="container" id="attendance-app">
        <div class="bs-example" data-example-id="simple-nav-tabs">
            <ul class="nav nav-tabs">
                @foreach($months as $month)
                    @php
                        $start = \Carbon\Carbon::createFromFormat('Y-m-d', $month->start_date);
                        $end = \Carbon\Carbon::createFromFormat('Y-m-d', $month->end_date);
                        $li_class = $month->id == $current_month->id ? 'active' : '';
                        $month_text = '';

                        if ($start->month == $end->month) $month_text = $spanish_months[$start->month - 1];
                        else $month_text = $spanish_months[$start->month - 1].' - '.$spanish_months[$end->month- 1];
                    @endphp

                    <li data-toggle="tooltip" class="{{$li_class}}" title="Seleccione el mes" data-placement="top"><a href="{{route('list', ['list' => $schedule->id, 'month' => $month->id])}}" class="tab-month">{{$month_text}}</a></li>

                @endforeach
            </ul>
        </div>
        <!--information List-->
        @include('list.include.informationlist')
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active">
                <!--students List-->
                <table class="table table-bordered" id="listAttendance">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2" class="th-id">Matrícula</th>
                            <th rowspan="2" class="th-name">Nombre</th>
                            @foreach($class_days as $cd)
                                <th class="txt-align-center" style="padding: 0;">
                                    <div style="padding: 8px; border-bottom: 1px solid #ddd;">{{$days[$cd['day'] - 1]}}</div>
                                    <div style="padding: 8px;">{{$cd['dayNumber']}}</div>
                                </th>
                            @endforeach
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($students->sortBy('student.last_name') as $s)
                        <tr class="tr-students">
                            <td class="student-number"></td>
                            <td>{{ $s->student->serial_number}}</td>
                            <td>{{ $s->student->last_name }} {{ $s->student->middle_name }} {{ $s->student->name }} </td>
                            @foreach($class_days as $cd)
                                <td is="attendance" :day="{{$cd['day']}}" :day-number="{{$cd['dayNumber']}}" :month="{{$cd['month']}}" :day-id="{{$cd['dayId']}}" :student-id="'{{$s->student->serial_number}}'"></td>
                            @endforeach
                            <td>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="36">No hay estudiantes asignados por el momento</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                @if(count($students) != 0)
                    <div class="row">
                        <div class="col-md-7"><button id="save-list" class="btn btn-primary">Guardar Lista</button></div>
                        <div class="col-md-5" id="cur-date"></div>
                    </div>
                    <div class="row" id="messages">
                    </div>
                @endif
            </div><!--/tabpanel-->
        </div><!--/tab-content-->
    </div><!--/container-->
    <script id="popupTemplate" type="text/template">
        <td v-on:click="showAttendancePopup" style="position: relative; cursor: pointer;">
            <div id="popupAttendance" v-if="showPopup" class="popover right popupAttendance">
                <div class="arrow"></div>
                <h3 class="popover-title">Horas</h3>
                <div class="popover-content">
                    <form class="form-horizontal">
                        <div class="form-group form-group-sm">
                            <label class="col-xs-4 control-label">Todas:</label>
                            <div class="col-xs-8">
                                <select class="form-control">
                                    <option>---</option>
                                    <option>Asistencia</option>
                                    <option>Falta</option>
                                    <option>Retardo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="col-xs-4 control-label">7:00-7:50:</label>
                            <div class="col-xs-8">
                                <select class="form-control">
                                    <option>---</option>
                                    <option>Asistencia</option>
                                    <option>Falta</option>
                                    <option>Retardo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label class="col-xs-4 control-label">7:50-8:40:</label>
                            <div class="col-xs-8">
                                <select class="form-control">
                                    <option>---</option>
                                    <option>Asistencia</option>
                                    <option>Falta</option>
                                    <option>Retardo</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </td>
    </script>
    <!--Modal view-->
    @include('incidence.create')
@endsection

@section('javascript')

    <script>
        let previous = null;

        Vue.component('attendance', {
            template: '#popupTemplate',
            data: function () {
              return {
                  showPopup: false
              }
            },
            props: ['day', 'month', 'day-number', 'day-id', 'student-id'],
            methods: {
                showAttendancePopup(ev) {
                    if (previous) previous.showPopup = false;
                    this.showPopup = true;
                    previous = this;
                }
            }
        });
        new Vue({
            el: '#attendance-app'
        })
    </script>
@endsection

