<?php

use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Hieu1',
            'email' => 'Hieu1@gmail.com',
            'email_verified_at'=>now(),
            'password' => 'Hhieu6a1',
            'role'=>'Thuc Tap',
            'manager'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()

        ],
        [
            'name' => 'Hieu2',
            'email' => 'Hieu2@gmail.com',
            'email_verified_at'=>now(),
            'password' => 'Hhieu6a1',
            'role'=>'Moi di lam',
            'manager'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
        ],
        [
            'name' => 'Hieu3',
            'email' => 'Hieu3@gmail.com',
            'email_verified_at'=>now(),
            'password' => 'Hhieu6a1',
            'role'=>'Lam 1 nam',
            'manager'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
        ],
    );
    }
}
