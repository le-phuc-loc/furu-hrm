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
        DB::table('report')->insert([
            // 'time_checkin'=>
            // 'time_checkout'=>'1',
            // 'location_check_in'=>now(),
            // 'location_check_out'=>now(),
            // 'content'=>
            // 'project_user_id'=>
        ],
        [
            'user_id'=>'2',
            'project_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]
    );

    }
}
