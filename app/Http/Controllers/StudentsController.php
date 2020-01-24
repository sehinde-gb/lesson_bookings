<?php

namespace App\Http\Controllers;

use App\Student;
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
        $students = Student::latest()->get();
        

        //$this->getAttended($students);
        $this->getAttended($students);

        
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Student::create($this->validateStudent());

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
    public function edit(Student $student )
    {

    
        return view('students.edit')->with(['student' => $student]);
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
            'add_lessons' => 'required'
        ]);
    }


     /**
     * Convert the student object in to an array.
     * Filter through the array and pluck out students 
     * requiring additional lessons
     * 
     * @param  students
     * @return \Illuminate\Http\Response
     */
    protected function getAttended($students)
    {

        // $student_array = $students->toArray();
        // //dd($student_array);

        // $array = array_filter($student_array, function ($item) {
        //     return $item['add_lessons'] == 0;
        
        // });

        // dd($array);

        $results = $students->filter(function($student, $key) {
           if ($student['phone'] === 6) {
               return true;
           }
        });

        dd($results);
        //return $results;
        //$results->all();
        

    }


    public function getModified($students) 
    {
        //$student_array = $students->toArray();
        //dd($student_array);

        // foreach ($students as $student) {
        //     $student->first_name == 'Salvatore';
        // }

        $modified = array_map(function ($student) {
            return (array) $student;            


        }, $students);


        var_dump($modified);

    }
}
