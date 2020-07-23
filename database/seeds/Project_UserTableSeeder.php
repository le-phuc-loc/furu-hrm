<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Project_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_user')->insert([
            'user_id'=>'2',
            'project_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        // DB::table('project_user')->insert([
        //     'user_id'=>'3',
        //     'project_id'=>'1',
        //     'created_at'=>now(),
        //     'updated_at'=>now(),
        // ]);

    }
}
