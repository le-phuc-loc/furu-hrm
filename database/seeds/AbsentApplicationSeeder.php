<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;

class AbsentApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absent_applications')->insert([
            'state'=>'0',
            'content'=>'Do not see got so NGhi',

            'user_id'=>'7',
            'date_off_start' => Carbon::create(2020, 7, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 7, 30, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 7, 30, 0, 0, 0)->diffInDays(Carbon::create(2020, 7, 7, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('absent_applications')->insert([
            'state'=>'1',
            'content'=>'Like thì Absent',
            'user_id'=>'9',
            'date_off_start' => Carbon::create(2020, 7, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 8, 10, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 7, 7, 0, 0, 0)->diffInDays(Carbon::create(2020, 8, 10, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('absent_applications')->insert([
            'state'=>'2',
            'content'=>'NGhỉ',
            'user_id'=>'9',

            'date_off_start' => Carbon::create(2020, 6, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 7, 30, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 6, 7, 0, 0, 0)->diffInDays(Carbon::create(2020, 7, 30, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('absent_applications')->insert([
            'state'=>'-2',
            'content'=>'NGhỉ asdasdasd',
            'user_id'=>'8',

            'date_off_start' => Carbon::create(2020, 7, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 7, 20, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 7, 7, 0, 0, 0)->diffInDays(Carbon::create(2020, 7, 20, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('absent_applications')->insert([
            'state'=>'-2',
            'content'=>'NGhỉ asdasdasd 111111111',
            'user_id'=>'8',

            'date_off_start' => Carbon::create(2020, 7, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 7, 20, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 7, 20, 0, 0, 0)->diffInDays(Carbon::create(2020, 7, 7, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('absent_applications')->insert([
            'state'=>'-2',
            'content'=>'NGhỉ asdasdasd 2222222222',
            'user_id'=>'2',

            'date_off_start' => Carbon::create(2020, 7, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 7, 12, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 7, 12, 0, 0, 0)->diffInDays(Carbon::create(2020, 7, 7, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);


        DB::table('absent_applications')->insert([
            'state'=>'-2',
            'content'=>'NGhỉ asdasdasd 333333333',
            'user_id'=>'8',

            'date_off_start' => Carbon::create(2020, 7, 7, 0, 0, 0) ,
            'date_off_end' => Carbon::create(2020, 7, 30, 0, 0, 0),
            'number_off'=>Carbon::create(2020, 7, 30, 0, 0, 0)->diffInDays(Carbon::create(2020, 6, 7, 0, 0, 0)),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
