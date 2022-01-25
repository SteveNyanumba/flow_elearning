<?php

namespace App\Services;

use App\Models\Day;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CalendarService
{
    public function generateCalendarData()
    {
        $days = Day::all();
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $lessons   = Lesson::all();
        foreach ($timeRange as $time) {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            if (count($lessons)) {
                foreach ($days as $day) {
                    $lesson = $lessons->where('day_id', $day->id)->where('start_time', Carbon::parse($time['start'])->toTimeString())->first();

                    if ($lesson) {
                        array_push($calendarData[$timeText], [
                            'id'   => $lesson->id,
                            'unit'   => $lesson->unit->title,
                            'lecturer' => $lesson->lecturer->name,
                            'rowspan' => ($lesson->min_difference) / 30

                        ]);
                    } else if (!$lessons->where('day_id', $day->id)->where('start_time', '<', Carbon::parse($time['start'])->toTimeString())->where('end_time', '>=', Carbon::parse($time['end'])->toTimeString())->count()) {
                        array_push($calendarData[$timeText], 1);
                    } else {
                        array_push($calendarData[$timeText], 0);
                    }
                }
            }
        }

        return $calendarData;
    }


    public function generateCalendarDataOneLec($id)
    {
        $days = Day::all();
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $lessons   = Lesson::where('lecturer_id', $id)->get();
        foreach ($timeRange as $time) {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            if (count($lessons)) {
                foreach ($days as $day) {
                    $lesson = $lessons->where('day_id', $day->id)->where('start_time', Carbon::parse($time['start'])->toTimeString())->first();

                    if ($lesson) {
                        array_push($calendarData[$timeText], [
                            'id'   => $lesson->id,
                            'unit'   => $lesson->unit->title,
                            'lecturer' => $lesson->lecturer->name,
                            'rowspan' => ($lesson->min_difference) / 30

                        ]);
                    } else if (!$lessons->where('day_id', $day->id)->where('start_time', '<', Carbon::parse($time['start'])->toTimeString())->where('end_time', '>=', Carbon::parse($time['end'])->toTimeString())->count()) {
                        array_push($calendarData[$timeText], 1);
                    } else {
                        array_push($calendarData[$timeText], 0);
                    }
                }
            }
        }

        return $calendarData;
    }
}
