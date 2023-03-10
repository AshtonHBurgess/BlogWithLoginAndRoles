<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'name'=>'UserAdmin',
            'description'=>'max privileges',
            'created_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'name'=>'ThemeAdmin',
            'description'=>'max privileges',
            'created_at' => Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'name'=>'Moderator',
            'description'=>'max privileges',
            'created_at' => Carbon::now(),
        ]);
    }
}
