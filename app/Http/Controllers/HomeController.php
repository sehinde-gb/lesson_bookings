<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->middleware('auth');
        $this->student = $student;
    }

     /**
     * Student variable
     * 
     * @var Student
     */

    public $student;

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Student $student)
    {
        return view('home');
    }
}
