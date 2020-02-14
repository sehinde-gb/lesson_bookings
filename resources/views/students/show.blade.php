@extends('layouts.master')

@section('content')


<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <h5 class="display-4">{!! $student->title !!}</h3>
            <h6 class="strong">{!! $student->first_name !!}</h6>
            <h6 class="strong">{!! $student->last_name !!}</h6>
            <p class="strong">{!! $student->address !!}</p>
            <p>{!! $student->phone !!}</p>
            <p>{!! $student->faculty!!}</p>
        </div><!-- #content -->  
    </div><!-- #page .container -->  
</div><!-- #wrapper -->  



<p>
    @foreach ($student->lessons as $lesson)
        <a class="btn btn-primary btn-lg active" href="{{ route('students.index', ['lesson' => $lesson->lecturer]) }}">{{ $lesson->lecturer}}</a>
        
    @endforeach    
</p>

<div id="app">
  
  
    <!-- <student :student="{{ json_encode($student)}}"></student> -->
       
    
    <!-- <check></check> -->
       
    <!-- <modal></modal> -->
    

    <modal v-if="showModal" @close="showModal = false">
    <!--
      you can use custom content here to overwrite
      default content
    -->
    <h3 slot="header">custom header</h3>
  </modal>
    
</div>



@endsection