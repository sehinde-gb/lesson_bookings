<?php

namespace App\Http\Controllers;

use App\Student;
use App\Lesson;
use Illuminate\Http\Request;



class StudentsController extends Controller
{


    /**
     * @var Student
     */

    public $student;

    /**
     * Students Controller constructor.
     * @param Student $student
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
        if (request('lesson')) {

            $students = Lesson::where('title', request('lesson'))->firstOrFail()->students;
        
        } else {

              $students = Student::latest()->get();
        }

        //dd($students);
        //$this->getAttended($students);
        //$this->getAttended($students);

        
        return view('students.index', ['students' => $students]);
   
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create', [
            'lessons' => Lesson::all()
        ]);
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Student::create($this->validateStudent());

        $student = new Student($this->validateStudent());

        $student->save();

        $student->lessons()->attach(request('lessons'));

        return redirect()->route('students.index')->with('info','Student Added Successfully');  
        
    }

    /**
     * Display the student.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

        return view('students.show')->with(['student' => $student]);
    }

    /**
     * Show the form for editing the student.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
    
        return view('students.edit')->with([
            'student' => $student,
            'lessons' => Lesson::all()
            ]);
    }

    /**
     * Update the student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
    

        $student->update($this->validateStudent()); 

        $student->lessons()->sync(request('lessons'));
         
        return redirect('students')->with('success','Student has been updated');
    }

    /**
     * Remove the student from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        
        $student->delete();

        return redirect()->route('students.index');

    }

    /**
     * validate student array of values
     *
     * @param  request
     * @return \Illuminate\Http\Response
     */

    protected function validateStudent()
    {

        return request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'notes' => 'required',
            'faculty' => 'required',
            'attendance' => 'required',
            'add_lessons' => 'required',
            'lessons' => 'exists:lessons,id'
        ]);
    }


     /**
     * Pass the student collection and eager load the 
     * students lecturers and collapse the results
     * so that you dont have empty results.
     * 
     * @param  students
     * @return \Illuminate\Http\Response
     */
    
    protected function getLecturer($students)
    {


        $lecturer = $students->pluck('lessons.*.lecturer')->collapse();
        
            
        dd($lecturer);
        
        
    }

    /**
     * Convert the student collection in to an array.
     * Filter through the array and pluck out 
     * any students requiring additional lessons. 
     * 
     * 
     * @param  students
     * @return \Illuminate\Http\Response
     */

    protected function getAddedLessons($students) 
    {
        $student_array = $students->toArray();
        //dd($student_array);

        $array = array_filter($student_array, function ($item) {
             return $item['add_lessons'] == 0;
        
        });

        dd($array);

    }

    /**
     * Filter through the students collection and 
     * pluck out the student phone numbers that
     * are equal to 6
     * 
     * 
     * @param  students
     * @return \Illuminate\Http\Response
     */

    protected function getStudentPhone($students)
    {
        $results = $students->filter(function($student, $key) {
           if ($student['phone'] === 6) {
               return true;
           }
        });

        dd($results);

    }


    /**
     * 
     * Send a collection of students in to an array map 
     * and convert the collection in to an array.
     * @param  students
     * @return \Illuminate\Http\Response
     */
    public function getModified($students) 
    {

        $modified = array_map(function ($student) {
            return (array) $student;            


        }, $students);


        var_dump($modified);

    }


    /**
     * Filter through the collection of students
     * and pluck out the student first name 
     * that is equal to Salvatore.
     * 
     * 
     * @param  students
     * @return \Illuminate\Http\Response
     */
    protected function getFirstName($students)
    {
        $results = $students->filter(function($student, $key) {
            if ($student->first_name === 'Salvatore') {
                return true;
            }
         });

         dd($results);



    }
}
