@extends('layouts.app')
@section('head')
    <script src="{{URL::to('js/axios.js')}}"></script>
    <script src="{{URL::to('js/vue.js')}}"></script>

    <style>
        .popup-attendance {
            position: absolute;
            top: 50%;
            left: 100%;
            transform: translateY(-50%);
            display: block;
            cursor: default;
            width: 300px;
            max-width: none;
        }

        .attendance-td {
            vertical-align: middle!important; position: relative; cursor: pointer;
        }

        .status-buttons {
            opacity: 0.65;
        }

        .close-popup {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            margin-top: -2px;
            right: 10px;
        }
    </style>
@endsection

@section('javascript')
    <!--script for assistance-->
    <script src="{{URL::to('/js/list/assistance.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/list/list.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var data = {!! $days_hours !!};
        //month is an array of months in the period
        var month = {!! $months !!};
        //startDate: when the first month starts
        //endDate: when the first month ends
        //dates: is a function and return a weekdays array.
        //url is the route where the incidence will edit
        //url is the route where the incidence will create
        var startDate = addDays(new Date(month[1].start_date), 1),
                endDate = addDays(new Date(month[1].end_date), 1),
                dates = getDates(startDate, endDate, data),
                url = '{{ route('edit') }}',
                urlIncidence= '{{ route('createIncidence') }}';
        //put in tabs the name of the period months
        //make options in select incidence modal
        document.body.onload = selectIncidence(dates);

    </script>

    @php
        $config = \Illuminate\Support\Facades\Auth::user()->teacher->configuration;
    @endphp
    <script>
        let days_hours = {!! $days_hours->toJSON() !!};
        let previous = null;
        let school_month = {{$current_month->id}};
        let att_status = ['A', 'B', 'C', 'D', 'E'];
        let at_de = {{$config->at_de ? 'true' : 'false'}};
        let no_de = {{$config->no_de ? 'true' : 'false'}};
        let at_no_de = '{{$config->at_no_de}}';

        let event_bus = new Vue();

        Vue.component('attendance', {
            template: '#popupTemplate',
            data() {
                return {
                    showPopup: false,
                    allStatus: '',
                    hours: [],
                    loading: false
                }
            },
            props: ['day', 'month', 'day-number', 'day-id', 'student-id', 'attendances'],
            methods: {
                showAttendancePopup() {
                    if (previous && previous !== this) previous.showPopup = false;
                    this.showPopup = !this.showPopup;
                    previous = this;
                },
                setAllAttendance(status) {
                    let self = this;
                    this.loading = true;
                    axios.post('/storeAttendances', {
                        day_id: self.dayId,
                        status: status,
                        student: self.studentId,
                        school_month: school_month,
                        day: self.dayNumber,
                        month: self.month
                    }).then(function (response) {
                        self.loading = false;
                        let data = response.data;
                        self.attendances.forEach((a) => {
                            a.status = status;
                    });
                        Array.prototype.push.apply(self.attendances, data.attendances);
                    });
                    this.allStatus = status;
                    this.showPopup = false
                },
                checkAttendance(hour, stat) {
                    let att = this.attendances.find(x => x.hour === hour.id);
                    if (att && att.status === stat) return 'active';
                    return 'status-buttons';
                },
                setAttendance(hour, stat) {
                    let self = this;
                    this.loading = true;
                    axios.post('/storeAttendance', {
                        status: stat,
                        student: this.studentId,
                        school_month: school_month,
                        hour_schedule: hour.id,
                        day: this.dayNumber,
                        month: this.month
                    }).then(function (response) {
                        self.loading = false;
                        let data = response.data;
                        if (data.attendance) self.attendances.push(data.attendance);
                        else {
                            let att = self.attendances.find(x => x.id === data.id);
                            att.status = stat;
                        }
                    });
                },
                status() {
                    let a = 0, f = 0, r = 0;
                    this.attendances.forEach((att) => {
                        if(att.status === 'A') a++;
                    if(att.status === 'F') f++;
                    if(att.status === 'R') r++;
                });
                    if(a === this.hours.length && this.hours.length > 0) this.allStatus = 'A';
                    else if(f === this.hours.length && this.hours.length > 0) this.allStatus = 'F';
                    else if(r === this.hours.length && this.hours.length > 0) this.allStatus = 'R';
                    else this.allStatus = '';

                    if(a > 0 && r === 0) return att_status[a - 1];
                    else if(f === this.hours.length && this.hours.length > 0) return '/';
                    else if(r === this.hours.length && this.hours.length > 0) return 'R';
                    else if(a > 0 && r > 0 && f === 0) {
                        if(at_de) return att_status[a - 1];
                        else return 'R';
                    }
                    else if(a === 0 && r > 0 && f > 0) {
                        if(no_de) return '/';
                        else return 'R';
                    }
                    else if(a > 0 && r > 0 && f > 0) {
                        return at_no_de;
                    }
                    else if(a === 0 && r > 0 && f === 0) {
                        return 'R';
                    }
                    else if(a === 0 && r === 0 && f > 0) {
                        return '/';
                    }
                }
            },
            created() {
                this.hours = (days_hours.find(x => x.day === this.day - 1)).hours;
                let self = this;
                event_bus.$on('changed', function () {
                    self.status();
                });
            }
        });
        new Vue({
            el: '#attendance-app',
            data() {
                return {
                    at_de: at_de,
                    no_de: no_de,
                    at_no_de: at_no_de
                }
            },
            watch: {
                'at_de': function (val) {
                    at_de = val;
                    event_bus.$emit('changed');
                },
                'no_de': function (val) {
                    no_de = val;
                    event_bus.$emit('changed');
                },
                'at_no_de': function (val) {
                    at_no_de = val;
                    event_bus.$emit('changed');
                }
            }
        })
    </script>
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
                <table class="table table-bordered table-hover" id="listAttendance">
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
                            <td>{{ $s->student->last_name.' '.$s->student->middle_name.' '.$s->student->name }}</td>
                            @foreach($class_days as $cd)
                                @php
                                    $attendances = \App\Attendance::where([
                                        ['student_id', '=', $s->student_id],
                                        ['school_month_id', '=', $current_month->id],
                                        ['month', '=', $cd['month']],
                                        ['day', '=', $cd['dayNumber']]
                                    ])->select('id', 'status', 'hour_schedule_id as hour')->get();
                                @endphp
                                <td is="attendance" :day="{{$cd['day']}}" :day-number="{{$cd['dayNumber']}}" :month="{{$cd['month']}}" :day-id="{{$cd['dayId']}}" :student-id="'{{$s->student->id}}'" :attendances='{!! $attendances->toJson() !!}'></td>
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
                        <div class="col-md-5" id="cur-date"></div>
                    </div>
                @endif
            </div><!--/tabpanel-->
        </div><!--/tab-content-->
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Si el alumno llega tarde a una hora, pero asiste a ambas ¿Desea poner asistencia completa?</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" v-model="at_de"> @{{ at_de ? 'Si' : 'No' }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Si el alumno solamente asistió a una sola clase, de 2 horas ¿Desea poner una falta?</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" v-model="no_de"> @{{ no_de ? 'Si' : 'No' }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Si el alumno faltó a la primera hora, y llegó tarde a las horas restantes ¿Qué estatus desea poner?</label>
                <div class="col-sm-10">
                    <select class="form-control" v-model="at_no_de">
                        <option value="A">A</option>
                        <option value="/">/</option>
                        <option value="R">R</option>
                    </select>
                </div>
            </div>
        </form>
    </div><!--/container-->
    <script id="popupTemplate" type="text/template">
        <td v-on:click="showAttendancePopup" class="text-center attendance-td" :class="showPopup ? 'info' : ''">
            <span v-if="!loading">@{{ status() }}</span>
            <img v-if="loading" src="{{URL::to('images/rolling.svg')}}" alt="">
            <div id="popupAttendance" v-if="showPopup" class="popover right popup-attendance">
                <div class="arrow"></div>
                <h3 class="popover-title" style="position: relative;">
                    Horas
                    <button type="button" @click.stop="showPopup = false" class="close close-popup"><span>&times;</span></button>
                </h3>
                <div class="popover-content">
                    <div class="row">
                        <div class="col-md-5">
                            <h5 style="text-align: right;">Asistencia por clase: </h5>
                        </div>
                        {{--display: flex; flex-direction: row; justify-content: space-between;--}}
                        <div class="col-md-7" style="text-align: left;">
                            <a type="button" @click.stop="setAllAttendance('A')" class="btn btn-success" :class="allStatus === 'A' ? 'active' : 'status-buttons'">A</a>
                            <a type="button" @click.stop="setAllAttendance('F')" class="btn btn-danger" :class="allStatus === 'F' ? 'active' : 'status-buttons'">/</a>
                            <a type="button" @click.stop="setAllAttendance('R')" class="btn btn-warning" :class="allStatus === 'R' ? 'active' : 'status-buttons'">R</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row" v-for="hour in hours">
                        <div class="col-md-5">
                            <h5 style="text-align: right;">@{{hour.start_hour + ' - ' + hour.end_hour}} :</h5>
                        </div>
                        <div class="col-md-7" style="text-align: left;">
                            <a type="button" @click.stop="setAttendance(hour, 'A')" :class="checkAttendance(hour, 'A')" class="btn btn-success">A</a>
                            <a type="button" @click.stop="setAttendance(hour, 'F')" :class="checkAttendance(hour, 'F')" class="btn btn-danger">/</a>
                            <a type="button" @click.stop="setAttendance(hour, 'R')" :class="checkAttendance(hour, 'R')" class="btn btn-warning">R</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </script>
    <!--Modal view-->
    @include('incidence.create')
@endsection



