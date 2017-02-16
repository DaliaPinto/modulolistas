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
                <a data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                    {{ $hour->mon->subject.' - '.$hour->mon->grade.'&ordm;'.$hour->mon->group.' '.$hour->mon->career}}
                </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->tue != null)
                    <a data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->tue->subject.' - '.$hour->tue->grade.'&ordm;'.$hour->tue->group.' '.$hour->tue->career }}
                    </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->wed != null)
                    <a data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->wed->subject.' - '.$hour->wed->grade.'&ordm;'.$hour->wed->group.' '.$hour->wed->career }}
                    </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->thu != null)
                    <a data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->thu->subject.' - '.$hour->thu->grade.'&ordm;'.$hour->thu->group.' '.$hour->thu->career }}
                    </a>
                @endif
            </td>
            <td class="border-div">
                @if($hour->fri != null)
                    <a data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $hour->fri->subject.' - '.$hour->fri->grade.'&ordm;'.$hour->fri->group.' '.$hour->fri->career }}
                    </a>
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

