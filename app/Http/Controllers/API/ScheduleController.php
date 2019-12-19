<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getScheduleForDay($id, $semester, $week, $week_day)
    {
        $schedule = DB::table('schedule')
            ->select('auditory.name as auditory',
                'teacher.name as teacher',
                'group.name as group',
                'lessons.name as lesson',
                'schedule.group_part',
                'schedule.lesson_number')
            ->join('owners as auditory', 'schedule.auditory_id', '=', 'auditory.id')
            ->join('owners as teacher', 'schedule.teacher_id', '=', 'teacher.id')
            ->join('owners as group', 'schedule.group_id', '=', 'group.id')
            ->join('lessons', 'schedule.lesson_id', '=', 'lessons.id')
            ->where([
                ['semester', '=', $semester],
                ['week', '=', $week],
                ['week_day', '=', $week_day],
                ['group.id', '=', $id]
            ])->orWhere(
                'teacher.id', '=', $id
            )->orWhere('auditory.id', '=', $id)
            ->orderBy('lesson_number', 'ASC')
            ->get()
            ->groupBy('lesson_number');
        return response()->json($schedule->toArray());

    }

    public function getScheduleForWeek(){

    }

    public function getOwnersNames()
    {
        $owners = Owner::select('id', DB::raw("CONCAT(name, ' | ' , category) as name"), 'category')->OrderBy('category', 'ASC')->OrderBy('name', 'ASC')->get();
        return response()->json($owners->toArray());
    }

}
