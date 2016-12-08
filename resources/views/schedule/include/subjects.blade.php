<!--subject appearance
--  This view compare the week day with the date in schedule, when teacher will impart a class, where:
-- day 1== Monday
-- day 2==Tuesday
-- day 3==Wednesday
-- day 4==Thursday
-- day 5==Friday
-- hour
-->
@foreach($schedules as $s)
    @if($s->day == 1 && $s->hour_id == $h->id)
        <div class="col-md-2"></div>
        <a href="{{route('list', ['id' => $s->id])}}"><div class="col-md-2">
                {{$s->subject->name}}
                <br>
                {{$s->teacher->name }} {{$s->teacher->last_name}} {{$s->teacher->second_name}}
                <br>
                {{$s->group->quarter}} {{$s->group->group}}
            </div></a>
    @endif
    @if($s->day == 2 && $s->hour_id == $h->id)
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
    @if($s->day == 3 && $s->hour_id == $h->id)
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
    @if($s->day == 4 && $s->hour_id == $h->id)
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
    @if($s->day == 5 && $s->hour_id == $h->id)
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
@endforeach