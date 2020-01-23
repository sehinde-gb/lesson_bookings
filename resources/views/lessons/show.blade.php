@extends('layouts.master')

@section('content')


<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
        <h2 class="blog--title is--padded-top-40 is--white">{!! $lesson->title !!}</h3>
        
        </div>
    
    
    </div>

</div>



<p>
    @foreach ($lesson->students as $student)
        <a class="btn btn-primary btn-lg active" href="{{ route('lessons.index', ['student' => $student->first_name]) }}">{{ $student->first_name}}</a>
        
    @endforeach    
</p>

@endsection