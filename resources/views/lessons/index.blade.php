@extends('layouts.master')

@section('content')

<div class="container">
  <!-- Content here -->
  <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <h1>MU: Lesson Listings</h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Lecturer</th>
        <th>Objectives</th>
        <th>Prerequisites</th>
        <th>Evaluation</th>
        <th>Resources</th>
        <th>Activity</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse($lessons as $lesson)
      <tr>
        <td>{{$lesson['id']}}</td>
        <td>{{$lesson['title']}}</td>
        <td>{{$lesson['body']}}</td>
        <td>{{$lesson['lecturer']}}</td>
        <td>{{$lesson['objectives']}}</td>
        <td>{{$lesson['prerequisites']}}</td>
        <td>{{$lesson['evaluation']}}</td>
        <td>{{$lesson['resources']}}</td>
        <td>{{$lesson['activity']}}</td>
        <td><a href="{{action('LessonsController@edit', $lesson['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('LessonsController@destroy', $lesson['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @empty
        <p>No relevant lessons yet</p>
      @endforelse
    </tbody>
  </table>
  </div>


</div>




@endsection