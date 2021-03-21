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
        logger($classes);
        return $classes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * Display the specified resource.
     *
     * @param  \App\StudentsClass  $studentsClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsClass $studentsClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentsClass  $studentsClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsClass $studentsClass)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentsClass  $studentsClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentsClass $studentsClass)
    {
        //
    }
}
