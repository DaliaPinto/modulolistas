@section('javascript')
    <script>
        console.log("{{$list_start_date}}");
        console.log("{{$list_end_date}}");
        var dates = getDates(new Date("{{$list_start_date}}"), new Date("{{$list_end_date}}"));
        workDays = filterWeekDays(dates, [1]);
        //var assistance = document.getElementById('assistance-option');
        //document.writeln(workDays + " weekdays");
    </script>
@endsection
