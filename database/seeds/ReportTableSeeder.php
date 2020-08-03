<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'time_checkin'=>'2021-01-05 07:30:50',
            'time_checkout'=>'2021-01-05 17:30:00',
            'location_check_in'=>'3',
            'location_check_out'=>'3',
            'content'=>'Come to work but nothing to do',
            'project_user_id'=>'12',
            'state' => '1',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2021-01-01 07:30:50',
            'time_checkout'=>'2021-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Find Gods but nothing to see',
            'project_user_id'=>'13',
            'state' => '2',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:50',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens',
            'project_user_id'=>'14',
            'state' => '3',
        ]);
    }
}
