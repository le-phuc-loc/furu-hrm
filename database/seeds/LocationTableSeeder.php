<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'location_name'=>'Can Tho',
            'lat'=>'10.045162',
            'lng'=>'105.746857',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('locations')->insert([
            'location_name'=>'tp Ho Chi Minh',
            'lat'=>'10.776530',
            'lng'=>'106.700980',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('locations')->insert([
            'location_name'=>'Huế',
            'lat'=>'16.463713',
            'lng'=>'107.590866',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('locations')->insert([
            'location_name'=>'Đà Nẵng',
            'lat'=>'16.054407',
            'lng'=>'108.202164',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
