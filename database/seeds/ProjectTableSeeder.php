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
            'from_date'=>'2020-02-02',
            'to_date'=>'2020-05-02',
            'location_lat'=>'1',
            'location_long'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
            'user_id'=>'1'

        ]);
        DB::table('projects')->insert([
            'project_name'=>'HRM1',
            'from_date'=>'2020-07-07',
            'to_date'=>'2020-09-09',
            'location_lat'=>'2',
            'location_long'=>'2',
            'created_at'=>now(),
            'updated_at'=>now(),
            'user_id'=>'1'

        ]);
    }
}
