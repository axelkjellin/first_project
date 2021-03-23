<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $classes = $students->map(function($student) {
            return $student->classe;
        });

        $students->classes = $classes;
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request['name'],
            'birthdate' => $request['birthdate'],
            'gender' => $request['gender'],
            'students_classes_id' => $request['student_class_id'],
        ]);

        return $student;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $data = $request->all();
        logger($data);
        $student = Student::where('id', $data['id'])->first();
        $student->update(['name' => $data['name'], 'students_classes_id' => $data['student_class_id']]);
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return $student;
    }
}
