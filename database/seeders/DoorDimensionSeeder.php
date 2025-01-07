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
                'thickness' => 8,
                'material' => 'mdf',
            ],
            [
                'service_free' => 'yo\'q',
                'opening_side' => 'o\'ng tashqariga',
                'thickness' => 12,
                'material' => 'taxta',
            ],
            [
                'service_free' => '',
                'opening_side' => 'chap tashqarida',
                'thickness' => 10,
                'material' => '',  // Bo'sh satr (empty string)
            ],
            [
                'service_free' => '',
                'opening_side' => 'o\'ng ichkarida',
                'thickness' => 15,
                'material' => '',  // Bo'sh satr (empty string)
            ],
        ]);
    }
}
