<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function StudentDashboard(){
        return view('student.pages.dashboard-page');
    }
}
