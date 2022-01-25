<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Lesson;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index(CalendarService $calendarService)
    {
        $days = Day::all();
        $calendarData = $calendarService->generateCalendarData($days);


       return Inertia::render('Admin/Calendar/Index',[
           'days'=>$days,
           'calendarData'=>$calendarData,
       ]);

    // return $calendarData;

    }
}
