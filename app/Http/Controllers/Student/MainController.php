<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Lesson;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }
    public function timetable(CalendarService $calendarService)
    {
        $days = Day::all();
        $calendarData = $calendarService->generateCalendarData($days);
        return Inertia::render('Student/Timetable', [
            'days' => Day::all(),
            'calendarData' => $calendarData
        ]);
    }

    public function enrollment()
    {
        return Inertia::render('Student/Enrollment', [
            'lessons' => Lesson::all(),
        ]);
    }

    public function enrolled()
    {
        # code...
    }

    public function enroll($lesson_id)
    {
        $student = auth()->user();
        $lesson = Lesson::find($lesson_id);
        $lesson->students()->attach($student->id);

        return redirect()->route('student.enrollment');

    }

    public function class($id)
    {
        return Inertia::render('Admin/TimeTable/Class', [
            'lesson' => Lesson::find($id),
        ]);
    }
}
