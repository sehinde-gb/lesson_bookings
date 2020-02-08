

<div class="form-group">
    <label for="first_name">First Name:</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$student->first_name}}">

    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->


<div class="form-group">
    <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$student->last_name}}">

    @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->


<div class="form-group">
    <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$student->title}}">

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->        



<div class="form-group">
    <label for="phone">Phone:</label>
        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$student->phone}}">

    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->        

        
<div class="form-group">
    <label for="address">Address:</label>
          <textarea
                class="form-control"
                type="text"
                name="address" 
                placeholder="Address" 
                value="{{$student->address}}">
            </textarea>
        

    @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->      
        


<div class="form-group">
    <label for="notes">Notes:</label>
        <input type="text" class="form-control" name="notes" placeholder="Notes" value="{{$student->notes}}">

    @error('notes')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->            

        
<div class="form-group">
    <label for="faculty">Faculty:</label>
        <input type="text" class="form-control" name="faculty" placeholder="Faculty" value="{{$student->faculty}}">

    @error('faculty')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->     
       
<div class="form-group">
    <label for="attendance">Attendance:</label>
        <input type="text" class="form-control" name="attendance" placeholder="Attendance" value="{{$student->attendance}}">

    @error('attendance')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->  




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<label><input type="checkbox" class="my_features" data-name="div1"> Assign Your Lesson</label>

<div id="div1" class="toggleDiv">
    <div class="form-group">
        <label for="activity">Lessons</label>       
            <select
                class="form-control"
                name="lessons[]"
                multiple>
            @foreach ($lessons as $lesson)
                <option value="{{ $lesson->id }}">{{ $lesson->title}}</option>
            @endforeach    
            
            </select>

            @error('lessons')
                <p class="alert is-danger">{{ $message }}</p>    
            @enderror    
    </div><!-- /.form-group -->  </div>


<script>$(function() {
  $('.my_features').on("change",function() { 
    $('#'+$(this).attr('data-name')).toggle(this.checked); // toggle instead
  }).change(); // trigger the change
});</script>


       
        

<!-- button-centre -->
<div class="button-centre">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary', 'data-confirm' => 'Are you sure about that?']) !!}
</div>