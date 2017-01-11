<!--Header table schedules-->
<table class="table">
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
            <td>{{ $hour->hour }}</td>
            <td>
                @if($hour->mon != null)
                <a href="{{route('list', ['list' => $hour->mon->schedule])}}">
                    {{ $hour->mon->subject.' - '.$hour->mon->group}}
                    {{$hour->mon->teacher }}
                </a>
                @endif
            </td>
            <td>
                @if($hour->tue != null)
                    <a href="{{route('list', ['list' => $hour->tue->schedule])}}">
                        {{ $hour->tue->subject.' - '.$hour->tue->group }}
                        {{$hour->tue->teacher}}
                    </a>
                @endif
            </td>
            <td>
                @if($hour->wed != null)
                    <a href="{{route('list', ['list' => $hour->wed->schedule])}}">
                        {{ $hour->wed->subject.' - '.$hour->wed->group }}
                        {{$hour->wed->teacher}}
                    </a>
                @endif
            </td>
            <td>
                @if($hour->thu != null)
                    <a href="{{route('list', ['list' => $hour->thu->schedule])}}">
                        {{ $hour->thu->subject.' - '.$hour->thu->group }}
                        {{$hour->thu->teacher}}
                    </a>
                @endif
            </td>
            <td>
                @if($hour->fri != null)
                    <a href="{{route('list', ['list' => $hour->fri->schedule])}}">
                        {{ $hour->fri->subject.' - '.$hour->fri->group }}
                        {{$hour->fri->teacher}}
                    </a>
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

