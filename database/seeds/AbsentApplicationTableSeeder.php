<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsentApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Absent_Applications')->insert([
            'status'=>'1',
            'content'=>'ve di choi ve ny',
            'user_id'=>'1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
