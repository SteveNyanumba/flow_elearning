<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Lesson;
use App\Services\CalendarService;

class LecturersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'lecturer']);
    }
    public function dashboard()
    {
        return Inertia::render('Lecturer/Dashboard', [
            'lessons' => Lesson::where('lecturer_id', auth()->user()->id)->get()
        ]);
    }


    public function timetable(CalendarService $calendarService)
    {
        $calendarData = $calendarService->generateCalendarDataOneLec(auth()->user()->id);
        return Inertia::render('Lecturer/Timetable', [
            'days' => Day::all(),
            'calendarData' => $calendarData
        ]);
    }


    public function class($id)
    {
        return Inertia::render('Admin/TimeTable/Class', [
            'lesson' => Lesson::find($id),
        ]);
    }
}
