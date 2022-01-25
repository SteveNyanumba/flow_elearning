<?php

namespace App\Services;

use App\Models\Lesson;
use Carbon\Carbon;

class LessonCheckerService
{

    public function checkLessonAvailability($day, $start_time, $end_time, $lecturer)
    {
        $commons = Lesson::where('day_id', $day)->where('lecturer_id', $lecturer)->get();

        foreach ($commons as $common) {
            if ($common) {
                if (Carbon::parse($common->start_time) == Carbon::parse($start_time)) return false;
                if (Carbon::parse($common->start_time) == Carbon::parse($end_time)) return false;
                if (Carbon::parse($common->end_time) == Carbon::parse($start_time)) return false;
                if (Carbon::parse($common->end_time) == Carbon::parse($end_time)) return false;


                if (Carbon::parse($common->start_time)->subMinutes(30) > Carbon::parse($start_time)) {
                    if (Carbon::parse($common->start_time)->subMinutes(30) >= Carbon::parse($end_time)) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    if (Carbon::parse($start_time) >= Carbon::parse($common->end_time)->addMinutes(30)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}
