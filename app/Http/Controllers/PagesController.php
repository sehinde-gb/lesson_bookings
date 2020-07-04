<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class PagesController extends Controller
{
    /**
     * Student variable
     * 
     * @var Student
     */

    public $student;

    /**
     * Pages Controller constructor.
     *
     * @param Student $student this is the student variable
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Student $student)
    {
        return view('pages.index');
    }



}
