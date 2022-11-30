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
            'image_url'=>'https://www.worldometers.info/img/flags/ca-flag.gif',
            'content'=>'First post ..............................................End of First Post',
            'created_at' => Carbon::now(),
            'created_by'=>1
        ]);

        DB::table('posts')->insert([
            'title'=>'First post',
            'image_url'=>'https://png.pngtree.com/png-vector/20190114/ourmid/pngtree-lovely-animal-baby-turtle-marine-life-png-image_330713.jpg',
            'content'=>'First post ..............................................End of First Post',
            'created_at' => Carbon::now(),
            'created_by'=>1
        ]);

        DB::table('posts')->insert([
            'title'=>'First post',
            'image_url'=>'https://www.worldometers.info/img/flags/ca-flag.gif',
            'content'=>'First post ..............................................End of First Post',
            'created_at' => Carbon::now(),
            'created_by'=>1
        ]);

    }
}
