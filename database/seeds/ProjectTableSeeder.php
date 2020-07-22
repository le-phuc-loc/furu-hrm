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
            'lat'=>'30.144',
            'long'=>'144.144',
            'created_at'=>now(),
            'updated_at'=>now(),
            'user_id'=>'1'

        ]);
    }
}
