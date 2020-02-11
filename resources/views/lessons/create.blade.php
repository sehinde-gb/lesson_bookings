@extends('layouts.master')


@section('content')


<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>Create New Lesson</h1>    
  </div>
  <hr/>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
        {!! Form::model($lesson = new \App\Lesson,  ['files'=>true, 'url' => 'lessons']) !!}
            @csrf 
   
            @include('lessons.form', ['submitButtonText' => 'Create Lesson'])   

            
             
        {!! Form::close() !!}

       
        </div>
    </div>
</div>
                

@endsection