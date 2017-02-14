<!--Header table schedules-->
<table id="schedule-table" class="table">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hours as $i=>$hour)
        <tr>
            <td class="border-div txt-align-center">{{ $hour->hour }}</td>
            <td class="border-div">
                @if($hour->mon != null)
                <a href="{{route('list', ['list' => $hour->mon->schedule, 'month'=>$month->id])}}" data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                    {{ $hour->mon->subject.' - '.$hour->mon->group}}
                </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->tue != null)
                    <a href="{{route('list', ['list' => $hour->tue->schedule, 'month'=>$month->id])}}" data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->tue->subject.' - '.$hour->tue->group }}
                    </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->wed != null)
                    <a href="{{route('list', ['list' => $hour->wed->schedule, 'month'=>$month->id])}}" data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->wed->subject.' - '.$hour->wed->group }}
                    </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->thu != null)
                    <a href="{{route('list', ['list' => $hour->thu->schedule, 'month'=>$month->id])}}" data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->thu->subject.' - '.$hour->thu->group }}
                    </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->fri != null)
                    <a href="{{route('list', ['list' => $hour->fri->schedule, 'month'=>$month->id])}}" data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->fri->subject.' - '.$hour->fri->group }}
                    </a>
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

