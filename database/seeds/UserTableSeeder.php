<?php

use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert(
        //     [
        //         'name' => 'admin',
        //         'email' => 'admin@gmail.com',
        //         'email_verified_at'=>now(),
        //         'password' =>Hash::make(12345678),
        //         'role'=>'admin',
        //         'manager'=>'0',
        //         'created_at'=>now(),
        //         'updated_at'=>now()

        //     ]);
        // DB::table('users')->insert([
        //     'name' => 'Hieu1',
        //     'email' => 'Hieu1@gmail.com',
        //     'email_verified_at'=>now(),
        //     'password' => Hash::make(12345678),
        //     'role'=>'manager',
        //     'manager'=>'1',
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Hieu2',
        //     'email' => 'Hieu2@gmail.com',
        //     'email_verified_at'=>now(),
        //     'password' => Hash::make(12345678),
        //     'manager'=>'2',
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        //     ]);
        // DB::table('users')->insert([
        //     'name' => 'Hieu3',
        //     'email' => 'Hieu3@gmail.com',
        //     'email_verified_at'=>now(),
        //     'password' => Hash::make(12345678),
        //     'manager'=>'2',
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Hieu4',
        //     'email' => 'Hieu4@gmail.com',
        //     'email_verified_at'=>now(),
        //     'password' => Hash::make(12345678),
        //     'role'=>'manager',
        //     'manager'=>'1',
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);
        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->make());
        });
    }
}
