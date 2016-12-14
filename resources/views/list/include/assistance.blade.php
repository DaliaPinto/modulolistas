@for($i=0; $i<35; $i++)
    <td>
    </td>
@endfor
<!--<select>
Comming soon
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="R">R</option>
            <option value="/">/</option>
        </select>-->

@section('javascript')
    <script>
        var dates = getDates(new Date("2016-08-29"),
                new Date("2016-09-30")),
                workDays = filterWeekDays(dates, [mon,fri]);
        var assistance = document.getElementById('assistance-option');
        //document.writeln(workDays + " weekdays");
    </script>
@endsection