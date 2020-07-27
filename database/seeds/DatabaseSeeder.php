<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            UserTableSeeder::class,
            LocationTableSeeder::class,
            ProjectTableSeeder::class,
            ProjectUserTableSeeder::class,
            ReportTableSeeder::class,
            AbsentApplicationSeeder::class,
        ]);
    }
}
