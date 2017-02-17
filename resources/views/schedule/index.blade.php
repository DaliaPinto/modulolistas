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

            @foreach($hour->schedules as $sch)

                <td class="border-div">
                    @if($sch != null)
                    <a href="{{route('list', ['list' => $sch->schedule, 'month' => $month->id])}}" data-toggle="tooltip" title="Click aquí para ver la lista de asistencia">
                        {{ $sch->subject.' - '.$sch->grade.'&ordm;'.$sch->group.' '.$sch->career}}
                    </a>
                    @endif
                </td>

            @endforeach

        </tr>
        @endforeach
    </tbody>
</table>

