<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentsController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Student/Dashboard', [

        ]);
    }




}
