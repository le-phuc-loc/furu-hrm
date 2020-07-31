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
            'state'=>'0',
            'content'=>'Do not see got so NGhi',
            'number_off'=>'3',
            'user_id'=>'7',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('absent_applications')->insert([
            'state'=>'1',
            'content'=>'Like thì Absent',
            'number_off'=>'5',
            'user_id'=>'9',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('absent_applications')->insert([
            'state'=>'2',
            'content'=>'NGhỉ',
            'number_off'=>'7',
            'user_id'=>'9',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        DB::table('absent_applications')->insert([
            'state'=>'-2',
            'content'=>'NGhỉ asdasdasd',
            'number_off'=>'7',
            'user_id'=>'8',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
