@extends('layouts.app')
@section('javascript')
    {{--<!--Attendance list-->--}}
    {{--<script src="{{URL::to('/js/list/list.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{URL::to('/js/list/assistance.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{URL::to('/js/list/tabs.js')}}" type="text/javascript"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--//data: is an array of objects, contains days, and hours of schedules--}}
        {{--//are impart.--}}
        {{--var data = {!! $days !!};--}}
        {{--var month = {!! $current_month !!}--}}

        {{--//startDate: when the first month starts--}}
        {{--//endDate: when the first month ends--}}
        {{--//dates: is a function and return a weekdays array.--}}
        {{--//url is the route where the incidence will edit--}}
        {{--//url is the route where the incidence will create--}}
        {{--var startDate = addDays(new Date(month.start_date), 1),--}}
            {{--endDate = addDays(new Date(month.end_date), 1),--}}
            {{--dates = getDates(startDate, endDate, data),--}}
            {{--url = '{{ route('edit') }}',--}}
            {{--urlIncidence= '{{ route('createIncidence') }}';--}}

        {{--@foreach($months as $key=>$m)--}}
            {{--@php--}}
                {{--$date = new \Carbon\Carbon();--}}
                {{--$cur_month = \Carbon\Carbon::parse($m->start_date)->month;--}}
            {{--@endphp--}}
            {{--$tab = $('.tab-month');--}}
            {{--$tab.eq({{$key}}).html('{{$date->parse($m->start_date)->format('F')}}');--}}
            {{--//route about month--}}
            {{--$tab.eq({{$key}}).attr('href', '{{route('list', ['list' => $schedule->id, 'month'=> $m->id])}}');--}}
            {{--$tab.eq({{$key}}).click(function(){--}}
                {{--$(this).closest( 'li' ).addClass('active');--}}
            {{--});--}}
        {{--@endforeach--}}

        {{--//make options in select incidence modal--}}
        {{--document.body.onload = selectIncidence(dates);--}}
        {{--//draw tds in td table--}}
        {{--document.body.onload = drawTdAssistence(dates, data, startDate);--}}
        {{--//put in header table list, the date day--}}
        {{--drawThAssistence(startDate);--}}
    {{--</script>--}}
@endsection

@section('content')
    <div class="container">
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
                            @for($y = 0; $y < count($class_days); $y++)
                                <td>
                                </td>
                            @endfor
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
    <!--Modal view-->
    @include('incidence.create')
@endsection

