
<!--extends the header bar (teacher's information, logo, hamburger menu)-->
@extends('layouts.app')

@section('content')
<div class="container">
    <!--search nav bar-->
    @include('schedule.include.search')
   <div class="row">
       <div class="col-md-12">
           <!--Schedule container-->
           @include('schedule.index')
       </div>
   </div>
</div>
@endsection
