<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Unit;
use App\Models\User;
use App\Models\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'students' => User::where('role_id', 4)->get(),
            'units' => Unit::all(),
            'lecturers' => User::where('role_id', 3)->get(),
            'courses' => Course::all(),
            'sessions' => Session::with('user')->orderBy('last_activity', 'DESC')->get(),
        ]);
    }
}
