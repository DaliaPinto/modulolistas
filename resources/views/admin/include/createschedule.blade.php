@include('admin.include.createperiod')

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
            <td class="border-div"></td>
        </tr>
    @endforeach
    </tbody>
</table>

