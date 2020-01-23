<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Student;
use Illuminate\Http\Request;

class LessonsController extends Controller
{

    /**
     * @var Lesson
     */

    public $lesson;


    /**
     * Lessons Controller constructor.
     * @param Lesson $lesson
     */
    
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }



    /**
     * Display a listing of the lessons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('student')) {
            
            $lessons = Student::where('first_name', request('student'))->firstOrFail()->lessons;

            
        } else {
            $lessons = Lesson::latest()->get();
            

        }


        // $lessons = Lesson::latest()->get();

        return view('lessons.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('lessons.create', [
            'students' => Student::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $lesson = new Lesson($this->validateLesson());
       
        $lesson->save();

        $lesson->students()->attach(request('students'));

        return redirect()->route('lessons.index')->with('info','Lesson Added Successfully');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show')->with(['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit')->with([
            'lesson' => $lesson, 
            'students' => Student::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //dd($request);
        $lesson->update($this->validateLesson()); 

        $lesson->students()->attach(request('students'));
        //dd($lesson); 
        return redirect('lessons')->with('success','Lesson has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index');
    }


    /**
     * Validate lesson array of values
     *
     * @param  request
     * @return \Illuminate\Http\Response
     */

    protected function validateLesson()
    {

        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'lecturer' => 'required',
            'objectives' => 'required',
            'prerequisites' => 'required',
            'evaluation' => 'required',
            'resources' => 'required',
            'activity' => 'required',
            'students' => 'exists:students,id'
        ]);
    }
}
