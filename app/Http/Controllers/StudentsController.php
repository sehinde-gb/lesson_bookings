<?php
/**
 * This class is the StudentsController class
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

use App\Student;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\StudentsRequest;

/**
 * This class is the StudentsController class
 * 
 * PHP version 7.2
 * 
 * @category Vendor/Project
 * @package  Vendor/Project
 * @author   Sehinde Raji <sehinde@outlook.com>
 * @license  www.laravel.com Laravel
 * @link     Install this on your machine 
 */
class StudentsController extends Controller
{


    /**
     * Student variable
     * 
     * @var Student
     */

    public $student;

    /**
     * Students Controller constructor.
     *
     * @param Student $student this is the student variable
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }


    /**
     * Display a listing of students
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if (request('lesson')) {

            //$students = Lesson::where('title', request('lesson'))
              //  ->firstOrFail()->students;
             

        
        //} else {

             // $students = Student::latest()->get();
       // }

        $results = $students->getAddedLessons();
        dd($results);

        return view('students.index', ['students' => $students]);
   
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'students.create', [
            'lessons' => Lesson::all()
            ]
        );
    }

    /**
     * Store a newly created student in storage.
     *
     * @param \Illuminate\Http\Request $request The request variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {


        $student = new Student($request->all());

        $student->save();

        $student->lessons()->attach(request('lessons'));

        return redirect()->route('students.index')
            ->with('info', 'Student Added Successfully');  
        
    }

  
    /**
     * Display the student.
     *
     * @param \App\Student $student This is the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
         
        //return view('students.show')->with(['student' => $student]);
    }

    /**
     * Show the form for editing the student.
     *
     * @param \App\Student $student this is the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
    
        return view('students.edit')->with(
            [
            'student' => $student,
            'lessons' => Lesson::all()
            ]
        );
    }

    /**
     * Update the student in storage.
     *
     * @param \Illuminate\Http\Request $request the request variable
     * @param \App\Student             $student the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(StudentsRequest $request, Student $student)
    {
    

        $student->update($request->all()); 

        $student->lessons()->sync(request('lessons'));
         
        return redirect('students')->with('success', 'Student has been updated');
    }

    /**
     * Remove the student from storage.
     *
     * @param \App\Student $student the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        
        $student->delete();

        return redirect()->route('students.index');

    }




     /**
      * Pass the student collection and eager load the 
      * students lecturers and collapse the results
      * so that you dont have empty results.
      * 
      * @param \App\Students $students the student variable
      * 
      @return \Illuminate\Http\Response
      */
    protected function getLecturer($students)
    {


        $lecturer = $students->pluck('lessons.*.title')->collapse();
        
            
        dd($lecturer);
        
        
    }

    

    /**
     * Filter through the students collection and 
     * pluck out the student phone numbers that
     * are equal to 6
     *
     * @param \App\Students $students the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    protected function getStudentPhone($students)
    {
        $results = $students->filter(
            function ($student, $key) {
                if ($student['phone'] === 6) {
                    return true;
                }
            }
        );

        dd($results);

    }


    /**
     * Send a collection of students in to an array map 
     * and convert the collection in to an array.
     *
     * @param \App\Students $students the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    public function getModified($students) 
    {

        $modified = array_map(
            function ($student) {
                return (array) $student;            


            }, $students
        );


        var_dump($modified);

    }


    /**
     * Filter through the collection of students
     * and pluck out the student first name 
     * that is equal to Salvatore.
     *
     * @param \App\Students $students the student variable
     * 
     * @return \Illuminate\Http\Response
     */
    protected function getFirstName($students)
    {
        $results = $students->filter(
            function ($student, $key) {
                if ($student->first_name === 'Salvatore') {
                    return true;
                }
            }
        );

         dd($results);



    }
}
