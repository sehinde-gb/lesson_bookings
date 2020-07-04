<div class="form-group">
    <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$lesson->title}}">

    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div><!-- /.form-group -->

    <div class="form-group">
        <label for="description">Description</label>
            <textarea class="form-control" type="text" name="description" placeholder="Description">{{$lesson->description}}</textarea>
            
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->

    <div class="form-group">
        <label for="lecturer">Lecturer</label>
        <input type="text" class="form-control" name="lecturer" placeholder="Lecturer" value="{{$lesson->lecturer}}">
   
        @error('lecturer')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->

    <div class="form-group">
        <label for="objectives">Objectives</label>
        <input type="text" class="form-control" name="objectives" placeholder="Objectives" value="{{$lesson->objectives}}">
    
        @error('objectives')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->  

        

    <div class="form-group">
        <label for="prerequisites">Prerequisites</label>
        <input type="text" class="form-control" name="prerequisites" placeholder="Prerequisites" value="{{$lesson->prerequisites}}">
    
        @error('prerequisites')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->  

    <div class="form-group">
        <label for="evaluation">Evaluation</label>
        
        <textarea class="form-control" type="text" name="evaluation" placeholder="Evaluation">{{$lesson->evaluation}}</textarea>
        
    
        @error('evaluation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->  

            
    <div class="form-group">
        <label for="resources">Resources</label>
        <input type="text" class="form-control" name="resources" placeholder="Resources" value="{{$lesson->resources}}">
    
        @error('resources')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->  

    <div class="form-group">
        <label for="activity">Activity</label>
        <input type="text" class="form-control" name="activity" placeholder="Activity" value="{{$lesson->activity}}">
    
        @error('activity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><!-- /.form-group -->  

    <script src="https://unpkg.com/vue/dist/vue.js"></script>
       
    
    <div id="app" class="form-group">
        <label><input v-on:click="isChecked = !isChecked" type="checkbox" class="form-control">Students</label>
            <div v-show="isChecked"></div><!-- /v-show --> 
                <div v-show="!isChecked">
                    <div class="form-group">
                            <select
                                class="form-control"
                                name="students[]"
                                multiple>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->last_name}}</option>
                            @endforeach    
                            
                            </select>

                            @error('students')
                                <p class="alert is-danger">{{ $message }}</p>    
                            @enderror    
                    </div><!-- /.form-group -->  
                </div><!-- /v-show -->    
        </div><!-- #app -->
           
        <br>


    
    <!-- button-centre -->
    <div class="button-centre">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary', 'data-confirm' => 'Are you sure about that?']) !!}
    </div>