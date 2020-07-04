@extends('layouts.app')

@section('content')




<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <h1 class="display-2">{!! $lesson->title !!}</h3>
            <h1 class="display-2">{!! $lesson->body !!}</h3>
            <h1 class="display-2">{!! $lesson->objectives !!}</h3>
            <h2 class="display-3">{!! $lesson->prerequisites !!}</h2>
            <h2 class="display-3">{!! $lesson->evaluation !!}</h2>
            <h3 class="display-3">{!! $lesson->resources!!}</h3>
            <h3 class="display-3">{!! $lesson->activity !!}</h3>
        </div><!-- #content -->  
    </div><!-- #page .container -->  
</div><!-- #wrapper -->  



<p>
    @foreach ($lesson->students as $student)
        <a class="btn btn-primary btn-lg active" href="{{ route('lessons.index', ['student' => $student->first_name]) }}">{{ $student->first_name}}</a>
        
    @endforeach    
</p>

@endsection