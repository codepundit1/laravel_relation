<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::latest()->paginate();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.form');
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $student = Student::create($valid);
        Phone::create([
            'student_id' => $student->id,
            'phn_no' => $request->phn_no,
        ]);
        return redirect(route('students.index'))->with('success', 'Student added Successfully');
    }

    public function edit(Student $student)
    {
        return view('students.form', compact('student'));
    }


    public function update(Request $request, Student $student)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($student->update($valid));
        return redirect(route('students.index'))->with('success', 'Student added Successfully');

        return redirect(route('students.index'))->with('error', 'Somethings Went Wrong');
    }


    public function destroy(Student $student)
    {
        if ($student->delete())
            return redirect()->back()->with('success', 'Student deleted!');

        return redirect(route('students.index'))->with('error', 'Somethings Went Wrong');
    }

    public function restore($student)
    {
        Student::withTrashed()->find($student)->restore();
        return redirect()->back()->with('success', 'Student Restored!');
        return redirect(route('students.index'))->with('error', 'Somethings Went Wrong');
    }

}
