<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate();

        User::create([
          'name' => 'ELTE Teacher',
          'email' => 'teacher@elte.hu',
          'is_teacher' => true,
          'password' => Hash::make('12345678'),

        ]);

        User::factory(5)->create();

      }
}
