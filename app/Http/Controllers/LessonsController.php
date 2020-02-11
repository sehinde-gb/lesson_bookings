<?php
/**
 * This class is the LessonsController class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
namespace App\Http\Controllers;

use App\Lesson;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests\LessonsRequest;

/**
 * This class is the LessonsController class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
class LessonsController extends Controller
{

    /**
     * Lessons variable
     * 
     * @var Lesson
     */

    public $lesson;


    /**
     * Lessons Controller constructor.
     *
     * @param Lesson $lesson Lessons variable in the constructor
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
            
            $lessons = Student::where(
                'first_name', request('student')
            )->firstOrFail()->lessons;

            
        } else {
            $lessons = Lesson::latest()->get();
            

        }

        //dd($lessons);

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

        return view(
            'lessons.create', [
            'students' => Student::all()
            ]
        );
        dd($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request this is the request variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(LessonsRequest $request)
    {
    
        $lesson = new Lesson($request->all());
       
        $lesson->save();

        $lesson->students()->attach(request('students'));

        return redirect()->route(
            'lessons.index'
        )->with('info', 'Lesson Added Successfully');  
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lesson $lesson this is the lesson variable.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show')->with(['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the lesson.
     *
     * @param \App\Lesson $lesson this is the lessons variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit')->with(
            [
            'lesson' => $lesson, 
            'students' => Student::all()
            ]
        );
    }

    /**
     * Update the lesson.
     *
     * @param \Illuminate\Http\Request $request this is the request variable
     * @param \App\Lesson              $lesson this is the lesson variable 
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(LessonsRequest $request, Lesson $lesson)
    {
        //dd($request);
        $lesson->update($request->all()); 

        $lesson->students()->sync(request('students'));
        //dd($lesson); 
        return redirect('lessons')->with('success', 'Lesson has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lesson $lesson this is the lessons variable.
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index');
    }

    public function bookings()
    {
        return view('lessons.book');
        
    }


    
}
