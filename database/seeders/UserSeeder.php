<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        DB::table('users')->insert([
//            'name'=>'user',
//            'email'=>'asburgess@outlook.com',
//            'password'=>'password',
//            'created_at' => Carbon::now(),
//        ]);

        DB::table('users')->insert([
            'name'=>'Jane UserAdmin',
            'email'=>'jane@example.com',
            'password'=>'$2a$12$cpC8wo9MCDafTYy1.3E7uemqKLvkUBBnrTo8q9uhmndsElwItFnd2',
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'=>'Bob Moderator',
            'email'=>'bob@example.com',
            'password'=>'$2a$12$cpC8wo9MCDafTYy1.3E7uemqKLvkUBBnrTo8q9uhmndsElwItFnd2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'=>'Susan ThemeAdmin',
            'email'=>'susan@example.com',
            'password'=>'$2a$12$cpC8wo9MCDafTYy1.3E7uemqKLvkUBBnrTo8q9uhmndsElwItFnd2',
            'created_at' => Carbon::now(),
        ]);




    }
}
