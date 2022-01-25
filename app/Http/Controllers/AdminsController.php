<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AdminsController extends Controller
{
    /**
     * Initialize Permissions of the AdminsController
     *
     * @return \App\Http\Middleware\Administrator
     */

     public function __construct()
     {
         $this->middleware('super')->except('index');
     }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Admins/Index', [
            'admins'=>User::whereIn('role_id', [1,2])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Admins/Create');
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
            'name'=>'required'
        ]);
        $admin = new User();
        $admin->name = $request->name;
        $emailArr = explode(" ", strtolower($request->name));
        if(count($emailArr) > 1){
            $first = str_split($emailArr[0]);
            $emailname = $first[0].$emailArr[count($emailArr)-1];
        }else if(count($emailArr) == 1){
            $emailname = $emailArr[0];
        }
        if(User::where('email', '=', $emailname.'@flow.edu')->exists()){
            $emailname.=random_int(1,999);
        }

        $admin->email =$emailname.'@flow.edu';
        $admin->password = Hash::make('1234567890');
        $admin->role_id = 2;
        $admin->save();
        // dd($admin);

        return redirect()->route('admins.index')->with('success', 'Successfully Created new Administrator');


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
        return Inertia::render('Admin/Admins/Edit', [
            'admin'=>User::find($id)
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
            'name'=>'required'
        ]);
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->save();
        // dd($admin);

        return redirect()->route('admins.index')->with('success', 'Successfully Updated Administrator '.$request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == auth()->user()->id){
            \abort(403, "You can't delete yourself from here");
        }else {
            if($id == 1){
                abort(403, 'You may never delete the Super Admin');
            }else{
                User::find($id)->delete();
                return redirect()->route('admins.index')->with('success', 'Successfully Deleted Administrator');
            }
        }

    }
}
