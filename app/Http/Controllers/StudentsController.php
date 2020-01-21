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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //$student = Student::find($id);

        return view('students.show')->with(['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $student = Student::find($id);

        //dd($student);
        return view('students.edit')->with(['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($student);
        $student = Student::find($id);

        $student->update($this->validateStudent());

        
            
          
         
          return redirect('students')->with('success','Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect()->route('students.index');

    }

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
        ]);
    }
}
