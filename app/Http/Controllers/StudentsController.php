<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
        $students = Student::all();
        return view("students.index", ['students' => $students]);
    }
}
