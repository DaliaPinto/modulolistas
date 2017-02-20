@section('css')
    <link href="/css/jquery/jquery-ui.css" rel="stylesheet">
@endsection
    Fecha de Inicio del período:
    <input type="text" class="" id="datepicker-start" placeholder="Selecciona la fecha de Inicio">
    Fecha Fin del período:
    <input type="text" class="" id="datepicker-end" placeholder="Selecciona la fecha Fin">

@section('javascript')
    <script src="{{URL::to('/js/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery/jquery-ui.js')}}" type="text/javascript"></script>
    <script>
        //datepicker
        $(function() {
            $("#datepicker-start, #datepicker-end").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection

