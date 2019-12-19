<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Schedule_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule')->insert([
            [
                'week_day' => '1',
                'week' => '1',
                'semester' => '1',
                'lesson_number' => '1',
                'lesson_type' => 'P',
                'group_part' => 'all',
                'auditory_id' => '6',
                'lesson_id' => '1',
                'group_id' => '1',
                'teacher_id' => '4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'week_day' => '1',
                'week' => '1',
                'semester' => '1',
                'lesson_number' => '2',
                'lesson_type' => 'L',
                'group_part' => 'sb1',
                'auditory_id' => '6',
                'lesson_id' => '1',
                'group_id' => '1',
                'teacher_id' => '4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'week_day' => '1',
                'week' => '1',
                'semester' => '1',
                'lesson_number' => '2',
                'lesson_type' => 'L',
                'group_part' => 'sb2',
                'auditory_id' => '6',
                'lesson_id' => '4',
                'group_id' => '1',
                'teacher_id' => '5',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
