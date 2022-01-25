<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Courses/Index', [
            'courses'=>Course::with('units')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Courses/Create',[
            'types'=>Type::all(),
            'faculties'=>Faculty::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'description'=>'required',
            'title'=>'required',
            'abbreviation'=>'required',
            'course_type'=>'required|exists:types,id',
            'faculty'=>'required|exists:faculties,id',
        ]);

        $course = new Course();
        $course->title = $request->title;
        if($request->description) $course->description = $request->description;
        $course->type_id = $request->course_type;
        $course->faculty_id = $request->faculty;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Successfully Created a new Course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Admin/Courses/Edit',[
            'types'=>Type::all(),
            'faculties'=>Faculty::all(),
            'course'=>Course::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'description'=>'required',
            'title'=>'required',
            'abbreviation'=>'required',
            'course_type'=>'required|exists:types,id',
            'faculty'=>'required|exists:faculties,id',
        ]);

        // return \dd($request);

        $course = Course::find($id);

        // return dd(Course::find(7));
        $course->title = $request->title;
        $course->description = $request->description;
        $course->type_id = $request->course_type;
        $course->faculty_id = $request->faculty;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Successfully Updated a Course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('courses.index')->with('success', 'Successfully Deleted a course');
    }
}
