<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Students/Index', [
            'students' => User::where('role_id', 4)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Students/Create', [
            'courses' => Course::all()
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
            'name' => 'required'
        ]);
        $student = new User();
        $student->name = $request->name;
        $emailArr = explode(" ", strtolower($request->name));
        if (count($emailArr) > 1) {
            $first = str_split($emailArr[0]);
            $emailname = $first[0] . $emailArr[count($emailArr) - 1];
        } else if (count($emailArr) == 1) {
            $emailname = $emailArr[0];
        }
        if (User::where('email', $emailname . '@flow.edu')->exists()) {
            $emailname .= random_int(1, 999);
        }

        $student->email = $emailname . '@flow.edu';
        $student->password = Hash::make('1234567890');
        $student->role_id = 4;
        $student->save();
        // dd($admin);
        if ($request->course != null) {
            Course::find($request->course)->students()->attach($student->id);
        }

        return redirect()->route('students.index')->with('success', 'Successfully Created new Student');
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
        return Inertia::render('Admin/Students/Edit', [
            'student' => User::find($id),
            'courses' => Course::all()
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
            'name' => 'required'
        ]);
        $student = User::find($id);
        $student->name = $request->name;
        $student->save();
        // dd($student);

        return redirect()->route('students.index')->with('success', 'Successfully Updated Student ' . $student->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == auth()->user()->id) {
            abort(403, "You can't delete yourself from here");
        } else {
            if ($id == 1) {
                abort(403, 'You may never delete the Super Admin');
            } else {
                User::find($id)->delete();
                return redirect()->route('students.index')->with('success', 'Successfully Deleted Student');
            }
        }
    }
}
