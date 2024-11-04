<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function TeacherDashboard(){
        return view('teacher.pages.dashboard-page');
    }
}
