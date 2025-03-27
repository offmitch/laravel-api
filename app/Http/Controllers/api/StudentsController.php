<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'School' => 'required',
            ]);
            return Student::create([
            'FirstName' => request('FirstName'),
            'LastName' => request('LastName'),
            'School' => request('School'),
            ]);
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        request()->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'School' => 'required',
            ]);
            $isSuccess = $student->update([
            'FirstName' => request('FirstName'),
            'LastName' => request('LastName'),
            'School' => request('School'),
            ]);
            return [
            'success' => $isSuccess
            ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $isSuccess = $student->delete([
            'FirstName' => request('FirstName'),
            'LastName' => request('LastName'),
            'School' => request('School'),
            ]);
            return [
            'success' => $isSuccess
            ];
    }
}
