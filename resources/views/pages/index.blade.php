@extends('layouts.master')

@section('content')


<!-- Four columns -->
<div class="flex mb-4">
  <div class="w-1/4 bg-gray-500 h-12">
    <div id="app">

    <!-- <student :student="{{ json_encode($student ?? '')}}"></student> -->

    <!-- <check></check> -->

    <modal></modal>
    </div>
    
</div>
  <div class="w-1/4 bg-gray-400 h-12"></div>
  <div class="w-1/4 bg-gray-500 h-12"></div>
  <div class="w-1/4 bg-gray-400 h-12"></div>
</div>



@endsection