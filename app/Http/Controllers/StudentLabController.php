<?php

namespace App\Http\Controllers;

class StudentLabController extends Controller
{
    public function index()
    {
        return view('student.labs.index');
    }
}
