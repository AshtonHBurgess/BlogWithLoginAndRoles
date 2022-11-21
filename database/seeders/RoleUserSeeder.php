<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Jane
        DB::table('role_user')->insert([
            'role_id'=>1,
            'user_id'=>1,
            'created_at' => Carbon::now(),
        ]);
        //Bob
        DB::table('role_user')->insert([
            'role_id'=>2,
            'user_id'=>2,
            'created_at' => Carbon::now(),
        ]);
        //susan
        DB::table('role_user')->insert([
            'role_id'=>3,
            'user_id'=>3,
            'created_at' => Carbon::now(),
        ]);

    }
}
