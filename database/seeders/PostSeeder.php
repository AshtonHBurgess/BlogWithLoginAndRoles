<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('posts')->insert([
            'title'=>'First post',
            'content'=>'First post ..............................................End of First Post',
            'created_at' => Carbon::now(),
            'created_by'=>1
        ]);

    }
}
