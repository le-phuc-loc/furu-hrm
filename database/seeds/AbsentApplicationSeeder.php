<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'status'=>'0',
            'content'=>'Do not see got so NGhi',
            'user_id'=>'3',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('absent_applications')->insert([
            'status'=>'1',
            'content'=>'Like thì Absent',
            'user_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('absent_applications')->insert([
            'status'=>'2',
            'content'=>'NGhỉ',
            'user_id'=>'4',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
