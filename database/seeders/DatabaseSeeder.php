<?php

namespace Database\Seeders;
use App\Models\User;
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
        $users = User::all();

        $this->call(UserSeeder::class);
        $this->call(SubjectSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
