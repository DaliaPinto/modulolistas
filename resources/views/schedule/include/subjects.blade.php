<!--subject appearance-->
<!--This view compare the week day with the date in schedule, when teacher will impart a class-->
    @if($s->day == "Lunes")
        <div class="col-md-2"></div>
        <a href="{{route('list', ['id' => $s->id])}}"><div class="col-md-2">
            {{$s->subject->name}}
            <br>
            {{$s->teacher->name }} {{$s->teacher->last_name}} {{$s->teacher->second_name}}
            <br>
              {{$s->group->quarter}} {{$s->group->group}}
        </div></a>
    @endif
    @if($s->day == "Martes")
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <a href="{{route('list', ['id' => $s->id])}}"><div class="col-md-2">
            {{$s->subject->name}}
            <br>
            {{$s->teacher->name }} {{$s->teacher->last_name}} {{$s->teacher->second_name}}
            <br>
            {{$s->group->quarter}} {{$s->group->group}}
        </div></a>
    @endif
    @if($s->day == "Miercoles")
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <a href="{{route('list', ['id' => $s->id])}}"><div class="col-md-2">
            {{$s->subject->name}}
            <br>
            {{$s->teacher->name }} {{$s->teacher->last_name}} {{$s->teacher->second_name}}
            <br>
            {{$s->group->quarter}} {{$s->group->group}}
        </div></a>
    @endif
    @if($s->day == "Jueves")
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <a href="{{route('list', ['id' => $s->id])}}"><div class="col-md-2">
            {{$s->subject->name}}
            <br>
            {{$s->teacher->name }} {{$s->teacher->last_name}} {{$s->teacher->second_name}}
            <br>
            {{$s->group->quarter}} {{$s->group->group}}
        </div></a>
    @endif
    @if($s->day == "Viernes")
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <a href="{{route('list', ['id' => $s->id])}}"><div class="col-md-2">
            {{$s->subject->name}}
            <br>
            {{$s->teacher->name }} {{$s->teacher->last_name}} {{$s->teacher->second_name}}
            <br>
            {{$s->group->quarter}} {{$s->group->group}}
        </div></a>
    @endif