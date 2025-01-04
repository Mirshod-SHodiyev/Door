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
                'opening_side' => 'chap',
                'thickness' => 8,
                'material' => 'mdf',
        
            ],
            [
                'service_free' => 'yo\'q',
                'opening_side' => 'o\'ng',
                'thickness' => 12,
                'material' => 'taxta',
               
            ],
         
         
        ]);
    }
}
