<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subjects')->truncate();
        $users = User::all();
        Subject::factory()
        ->count(10)
        ->create();

        $students = User::where('is_teacher', false)->get();

        Subject::all()->each(function ($subject) use ($students)
        {
            $id = $students->pluck('id')->toArray();
            $subject->students()->attach($id);
        });

    }
}
