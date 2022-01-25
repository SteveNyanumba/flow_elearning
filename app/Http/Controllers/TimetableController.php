<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\Day;
use App\Models\Lesson;
use App\Models\Semester;
use App\Models\Unit;
use App\Models\User;
use App\Services\CalendarService;
use App\Services\LessonCheckerService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Carbon\Carbon;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $days = Day::all();
        // $calendarData = $calendarService->generateCalendarData();


        return Inertia::render('Admin/TimeTable/Index', [
            'lecturers' => User::where('role_id', 3)->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/TimeTable/Create', [
            'units' => Unit::all(),
            'lecturers' => User::where('role_id', 3)->get(),
            'semesters' => Semester::all(),
            'days' => Day::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LessonCheckerService $checker)
    {
        $this->validate($request, [
            'lecturer' => 'required|exists:users,id',
            'unit' => 'required|exists:units,id',
            'semester' => 'required|exists:semesters,id',
            'day' => 'required|exists:days,id',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $checked = $checker->checkLessonAvailability($request->day, $request->start_time, $request->end_time, $request->lecturer);
        if (!$checked) {
            abort(406, "Lesson Constraints not suitable");
        }
        $lesson = new Lesson();
        $lesson->lecturer_id = $request->lecturer;
        $lesson->unit_id = $request->unit;
        $lesson->semester_id = $request->semester;
        $lesson->day_id = $request->day;
        $lesson->start_time = Carbon::parse($request->start_time)->toTimeString();
        $lesson->end_time = Carbon::parse($request->end_time)->toTimeString();
        $lesson->stream_key = Str::random(12);
        $lesson->save();

        return redirect()->route('timetable.index')->with('success', 'Successfully Created a new Lesson');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Admin/TimeTable/Class', [
            'lesson' => Lesson::find($id),
        ]);
        //     $days = Day::all();
        //     $calendarData = $calendarService->generateCalendarDataOneLec($days, $id);


        //    return Inertia::render('Admin/TimeTable/Index',[
        //        'days'=>$days,
        //        'calendarData'=>$calendarData,
        //    ]);

        // dd(Lesson::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Admin/TimeTable/Edit', [
            'lesson' => Lesson::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, LessonCheckerService $checker)
    {
        $this->validate($request, [
            'lecturer' => 'required|exists:users,id',
            'unit' => 'required|exists:units,id',
            'semester' => 'required|exists:semesters,id',
            'day' => 'required|exists:days,id',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $lesson = Lesson::find($id);
        $checked = $checker->checkLessonAvailability($request->day, $request->start_time, $request->end_time, $request->lecturer);
        if (!$checked) {
            abort(406, "Lesson Constraints not suitable");
        }
        if (isset($request->lecturer)) {
            $lesson->lecturer_id = $request->lecturer;
        }
        if (isset($request->unit)) {
            $lesson->unit_id = $request->unit;
        }
        if (isset($request->semester)) {
            $lesson->semester_id = $request->semester;
        }
        if (isset($request->day)) {
            $lesson->day_id = $request->day;
        }
        if (isset($request->start_time)) {
            $lesson->start_time = Carbon::parse($request->start_time)->toTimeString();
        }
        if (isset($request->end_time)) {
            $lesson->end_time = Carbon::parse($request->end_time)->toTimeString();
        }
        $lesson->save();

        return redirect()->route('timetable.index')->with('success', 'Successfully Edited a Lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::find($id)->delete();

        return response('Successfully Deleted the Lesson', 200);
    }
}
