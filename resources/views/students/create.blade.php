@extends('layouts.master')


@section('content')


<div class="container-fluid h-100 bg-light text-dark">
  <div class="row justify-content-center align-items-center">
    <h1>Create New Student</h1>    
  </div>
  <hr/>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
    <form method="POST" action="/students">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @csrf 
    <div class="form-group form-group-lg">
    <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name">
    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
    <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
  </div>
    @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
<label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title">
  </div>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" name="phone" placeholder="Phone">
  </div>
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
<label for="address">Address</label>
    <input type="text" class="form-control" name="address" placeholder="Address">
  </div>
    @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
<label for="notes">Notes</label>
    <input type="text" class="form-control" name="notes" placeholder="Notes">
  </div>
    @error('notes')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->  

<div class="form-group form-group-lg">
<label for="faculty">Faculty</label>
    <input type="text" class="form-control" name="faculty" placeholder="Faculty">
  </div>
    @error('faculty')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->

<div class="form-group form-group-lg">
<label for="attendance">Attendance</label>
    <input type="text" class="form-control" name="attendance" placeholder="Attendance">
  </div>
    @error('attendance')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->  

        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Create Student</button>       

    </form>   
    </div>
</div>
                

@endsection