<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;

class PhoneController extends Controller
{

    public function index()
    {
        $phones = Phone::with('student')->latest()->paginate();
        return view('phones.index', compact('phones'));
    }


    public function create()
    {
        $students = Student::orderBy('name')->get();
        return view('phones.form', compact('students'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'student_id' => ['required'],
            'phn_no' => ['required', 'string', 'max:255'],
        ]);

        if (Phone::create($valid));
        return redirect(route('phones.index'))->with('success', 'Phone added Successfully');

        return redirect(route('phones.index'))->with('error', 'Somethings Went Wrong');
    }


    public function edit(Phone $phone)
    {
        $students = Student::orderBy('name')->get();
        return view('phones.form', compact('phone', 'students'));
    }


    public function update(Request $request, Phone $phone)
    {
        $valid = $request->validate([
            'student_id' => ['required'],
            'phn_no' => ['required', 'string', 'max:255'],
        ]);

        if ($phone->update($valid));
        return redirect(route('phones.index'))->with('success', 'Phone added Successfully');

        return redirect(route('phones.index'))->with('error', 'Somethings Went Wrong');
    }


    public function destroy(Phone $phone)
    {
        if ($phone->delete())
            return redirect()->back()->with('success', 'Phone deleted!');

        return redirect(route('phones.index'))->with('error', 'Somethings Went Wrong');
    }

    public function restore($phone)
    {
        Phone::withTrashed()->find($phone)->restore();
            return redirect()->back()->with('success', 'Phone Restored!');
        return redirect(route('phones.index'))->with('error', 'Somethings Went Wrong');
    }
}
