<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'project_name'=>'HRM',
            'from_date'=>'2020-08-08',
            'to_date'=>'2020-10-10',
            'location_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
            'time_checkin' => '7:00',
            'time_checkout' => '17:30',
            'managed'=>'1'

        ]);
        DB::table('projects')->insert([
            'project_name'=>'HRM1',
            'from_date'=>'2020-07-07',
            'to_date'=>'2020-09-09',
            'location_id'=>'2',
            'created_at'=>now(),
            'updated_at'=>now(),
            'time_checkin' => '7:00',
            'time_checkout' => '17:30',
            'managed'=>'1'
        ]);
        DB::table('projects')->insert([
            'project_name'=>'Jurassic Park',
            'from_date'=>'2020-01-01',
            'to_date'=>'2020-09-09',
            'location_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
            'time_checkin' => '7:00',
            'time_checkout' => '17:30',
            'managed'=>'1'
        ]);
        DB::table('projects')->insert([
            'project_name'=>'God City',
            'from_date'=>'2020-01-01',
            'to_date'=>'2020-12-30',
            'location_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
            'time_checkin' => '7:00',
            'time_checkout' => '17:30',
            'managed'=>'6'
        ]);
        DB::table('projects')->insert([
            'project_name'=>'Space Station',
            'from_date'=>'2020-01-01',
            'to_date'=>'2020-12-12',
            'location_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
            'time_checkin' => '7:00',
            'time_checkout' => '17:30',
            'managed'=>'6'
        ]);

        DB::table('projects')->insert([
            'project_name'=>'Space starlight',
            'from_date'=>'2020-01-01',
            'to_date'=>'2020-12-12',
            'location_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
            'time_checkin' => '7:00',
            'time_checkout' => '17:30',
            'managed'=>'6'
        ]);
    }
}
