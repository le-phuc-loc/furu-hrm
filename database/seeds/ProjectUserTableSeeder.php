<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_user')->insert([
            'user_id'=>'1',
            'project_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'1',
            'project_id'=>'2',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'1',
            'project_id'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'1',
            'project_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'1',
            'project_id'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'2',
            'project_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'2',
            'project_id'=>'2',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'2',
            'project_id'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'2',
            'project_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'2',
            'project_id'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'3',
            'project_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'9',
            'project_id'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'8',
            'project_id'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('project_user')->insert([
            'user_id'=>'7',
            'project_id'=>'5',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);



    }
}
