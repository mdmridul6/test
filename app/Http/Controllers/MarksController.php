<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\marks;
use App\Models\students;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mark'] = marks::with(['student', 'course'])->get();
        return view('mark.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['student'] = students::all();
        $data['course'] = course::all();
        return view('mark.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'student' => 'required',
            'course' => 'required',
            'mark' => 'required|numeric|min:2|max:100',
        ]);
        $marks = new marks();
        $this->extend($marks, $request);
        return redirect()->route('home');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function edit(marks $marks)
    {

        $data['student'] = students::all();
        $data['course'] = course::all();
        $data['mark'] = marks::find($marks->id);
        return view('mark.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marks $marks)
    {
        $request->validate([
            'student' => 'required',
            'course' => 'required',
            'mark' => 'numeric|min:2|max:100|required',
        ]);
        $marks = marks::find($marks->id);
        $this->extend($marks, $request);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marks  $marks
     * @return \Illuminate\Http\Response
     */
    public function destroy(marks $marks)
    {
        $marksId = marks::find($marks->id);
        $marksId->delete();
        return redirect()->back();
    }



    public function extend($marks, $request)
    {
        $marks->student_id = $request->student;
        $marks->course_id = $request->course;
        $marks->marks = $request->mark;
        $marks->save();
    }
}
