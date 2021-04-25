<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->truncate();
        Task::factory(20)->create();

        $tasks = Task::all();

        //Subject::all()->each(function ($subject) use ($tasks)
        //{
        //    $subject = $tasks->pluck('subject')->toArray();
        //    $tasks->subject()->attach($subject);
        //});
    }
}
