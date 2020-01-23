@extends('layouts.master')

@section('content')

<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>Edit Lesson</h1>    
  </div>
  <hr/>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            {!! Form::model($lesson, array('route' => array('lessons.update', $lesson->id), 'method' => 'PUT')) !!}
                {{csrf_field()}}

                @include('lessons.form', ['submitButtonText' => 'Update Lesson'])
            {!! Form::close() !!}   
        </div>
 </div>

 @endsection   