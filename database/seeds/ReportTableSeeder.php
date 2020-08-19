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
            'time_checkin'=>'2021-01-05 07:30:00',
            'time_checkout'=>'2021-01-05 17:30:00',
            'location_check_in'=>'3',
            'location_check_out'=>'3',
            'content'=>'Come to work but nothing to do',
            'time_working'=>'10',
            'project_user_id'=>'13',
            'state' => '1',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2021-01-01 07:30:00',
            'time_checkout'=>'2021-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Find Gods but nothing to see',
            'time_working'=>'100',
            'project_user_id'=>'13',
            'state' => '2',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens',
            'time_working'=>'21',
            'project_user_id'=>'7',
            'state' => '1',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens 11111111111',
            'time_working'=>'119',
            'project_user_id'=>'6',
            'state' => '1',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens 22222222222222',
            'time_working'=>'1223',
            'project_user_id'=>'4',
            'state' => '1',
        ]);
        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens 33444444444444' ,
            'time_working'=>'1344',
            'project_user_id'=>'5',
            'state' => '1',
        ]);

        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens 3344555555554' ,
            'time_working'=>'655',
            'project_user_id'=>'4',
            'state' => '1',
        ]);

        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens 334444666666666664444' ,
            'time_working'=>'615',
            'project_user_id'=>'5',
            'state' => '1',
        ]);

        DB::table('reports')->insert([
            'time_checkin'=>'2022-01-01 07:30:00',
            'time_checkout'=>'2022-01-01 17:30:00',
            'location_check_in'=>'4',
            'location_check_out'=>'4',
            'content'=>'Fly with Aliens 337777777777744' ,
            'time_working'=>'16',
            'project_user_id'=>'5',
            'state' => '1',
        ]);
    }
}
