@if(isset($schedule))
    {{ $schedule->group->quarter }}
    {{ $schedule->group->group }}
    {{ $schedule->group->shift }}
@endif