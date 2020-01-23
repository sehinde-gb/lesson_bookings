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

     <h1>Student Listings</h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Title</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Notes</th>
        <th>Faculty</th>
        <th>Attendance</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
      <tr>
        <td>{{$student['id']}}</td>
        <td>{{$student['first_name']}}</td>
        <td>{{$student['last_name']}}</td>
        <td>{{$student['title']}}</td>
        <td>{{$student['phone']}}</td>
        <td>{{$student['address']}}</td>
        <td>{{$student['notes']}}</td>
        <td>{{$student['faculty']}}</td>
        <td>{{$student['attendance']}}</td>
        <td><a href="{{action('StudentsController@edit', $student['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('StudentsController@destroy', $student['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>


</div>




@endsection