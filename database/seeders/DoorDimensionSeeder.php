<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DoorDimensionSeeder extends Seeder
{
    public function run()
    {
        DB::table('door_dimensions')->insert([
            [
                'service_free' => 'ha',
                'has_top_section' => 'ha',
                'opening_side' => 'chap',
                'thickness' => 3,
                'material' => 'mdf',
        
            ],
            [
                'service_free' => 'yo\'q',
                'has_top_section' => 'yo\'q',
                'opening_side' => 'o\'ng',
                'thickness' => 5,
                'material' => 'taxta',
               
            ],
         
         
        ]);
    }
}
