<?php
namespace Database\Seeders;

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
                'opening_side' => 'chap ichkarida',
               
            ],
            [
                 'service_free' => 'yo\'q',
                 'opening_side' => 'o\'ng tashqariga',
               
            ],
            [
                'service_free' => '',
                'opening_side' => 'chap tashqarida',
                
            ],
            [
                'service_free' => '',
                'opening_side' => 'o\'ng ichkarida',
               
            ],
        ]);
    }
}
