<div class="form-group">
                <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$lesson->title}}">
            </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->

            <div class="form-group">
            <label for="title">Body</label>
                <textarea
                    class="form-control"
                    type="text"
                    name="body" 
                    placeholder="Body" 
                    value="{{$lesson->body}}"
                    
                ></textarea
               
            </div>
                @error('body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="lecturer">Lecturer</label>
                <input type="text" class="form-control" name="lecturer" placeholder="Lecturer" value="{{$lesson->lecturer}}">
            </div>
                @error('lecturer')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->

            <div class="form-group">
            <label for="objectives">Objectives</label>
                <input type="text" class="form-control" name="objectives" placeholder="Objectives" value="{{$lesson->objectives}}">
            </div>
                @error('objectives')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->  

        

            <div class="form-group">
            <label for="prerequisites">Prerequisites</label>
                <input type="text" class="form-control" name="prerequisites" placeholder="Prerequisites" value="{{$lesson->prerequisites}}">
            </div>
                @error('prerequisites')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->  

            <div class="form-group">
                <label for="evaluation">Evaluation</label>
                <textarea
                        class="form-control"
                        type="text"
                        name="evaluation" 
                        placeholder="Evaluation" 
                        value="{{$lesson->evaluation}}"
                    ></textarea
                
            </div>
                @error('evaluation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->  

            

            <div class="form-group">
            <label for="resources">Resources</label>
                <input type="text" class="form-control" name="resources" placeholder="Resources" value="{{$lesson->resources}}">
            </div>
                @error('resources')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->  

            <div class="form-group">
            <label for="activity">Activity</label>
                <input type="text" class="form-control" name="activity" placeholder="Activity" value="{{$lesson->activity}}">
            </div>
                @error('activity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div><!-- /.form-group -->  

            <div class="form-group">
                <label for="activity">Students</label>

                <div class="form-control">
                    <select
                        name="students[]"
                        multiple
                    >
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->first_name}}</option>
                    @endforeach    
                    
                    
                    </select>

                    @error('students')
                        <p class="alert is-danger">{{ $message }}</p>    
                    @enderror    
                
                </div>
            
            </div>

            <!-- button-centre -->
            <div class="button-centre">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary', 'data-confirm' => 'Are you sure about that?']) !!}
            </div>