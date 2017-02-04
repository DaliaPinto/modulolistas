@extends('layouts.app')

@section('content')
<div class="container">
    <!--search nav bar-->
    @include('schedule.include.search')
   <div class="row">
       <!--Schedule container-->
       @include('schedule.index')
   </div>
</div>
@endsection
