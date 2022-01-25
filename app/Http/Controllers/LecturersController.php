<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LecturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return Inertia::render('Admin/Lecturers/Index', [
            'lecturers' => User::where('role_id', 3)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Lecturers/Create');
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
        $lecturer = new User();
        $lecturer->name = $request->name;
        $emailArr = explode(" ", strtolower($request->name));
        if (count($emailArr) > 1) {
            $first = str_split($emailArr[0]);
            $emailname = $first[0] . $emailArr[count($emailArr) - 1];
        } else if (count($emailArr) == 1) {
            $emailname = $emailArr[0];
        }
        while (User::where('email', $emailname . '@flow.edu')->exists()) {
            $emailname .= random_int(1, 999);
        }

        $lecturer->email = $emailname . '@flow.edu';
        $lecturer->password = Hash::make('1234567890');
        $lecturer->role_id = 3;
        $lecturer->save();
        // dd($admin);

        return redirect()->route('lecturers.index')->with('success', 'Successfully Created new Lecturer');
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
        if (User::find($id)->role_id != 3) {
            abort(403, 'This User is not a lecturer');
        } else {
            return Inertia::render('Admin/Lecturers/Edit', [
                'lecturer' => User::find($id)
            ]);
        }
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
        $admin = User::find($id);
        $admin->name = $request->name;
        if (isset($request->email)) $admin->email = $request->email;
        $admin->save();
        // dd($admin);

        return redirect()->route('lecturers.index')->with('success', 'Successfully Updated Administrator ' . $request->name);
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
                return redirect()->route('lecturers.index')->with('success', 'Successfully Deleted Lecturer');
            }
        }
    }
}
