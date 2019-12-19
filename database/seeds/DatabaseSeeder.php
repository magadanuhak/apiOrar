<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LessonsTableSeeder::class);
        $this->call(OwnersTableSeeder::class);
        $this->call(Schedule_Table_Seeder::class);
    }
}
