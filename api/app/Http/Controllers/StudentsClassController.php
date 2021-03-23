<?php

namespace App\Http\Controllers;

use App\StudentsClass;
use Illuminate\Http\Request;

class StudentsClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = StudentsClass::get();
        return $classes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = StudentsClass::create([
            'name' => $request['name']
        ]);

        return $class;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentsClass  $studentsClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsClass $studentsClass)
    {
        $data = $request->all();
        $studentsClass = StudentsClass::where('id', $data['id'])->first();
        $studentsClass->update(['name' => $data['name']]);

        return $studentsClass;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentsClass  $studentsClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentsClass = StudentsClass::where('id', $id)->first();
        $studentsClass->delete();

        return $studentsClass;
    }
}
