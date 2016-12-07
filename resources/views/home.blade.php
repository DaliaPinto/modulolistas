@extends('layouts.app')
@section('content')
<div class="container">
    <!--search bar nav-->
    @include('schedule.include.search')
   <div class="row">
       <div class="col-md-12">
           <!--Schedule container-->
           @include('schedule.index')
       </div>
   </div>
</div>
@endsection
