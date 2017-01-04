
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
    <div>

    </div>
    <script>
        var dates = getDates(new Date("{{$list_start_date}}"),
                new Date("{{$list_end_date}}")),
                //workDays = filterWeekDays(dates, [1]);
        var assistance = document.getElementById('assistance-option');
        //document.writeln(workDays + " weekdays");
    </script>
@endsection