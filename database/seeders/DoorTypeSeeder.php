<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoorType;

class DoorTypeSeeder extends Seeder
{
    /**
     * Ma'lumotlarni kiritish.
     *
     * @return void
     */
    public function run()
    {
        $numbers = [
            '210' => 2100000,
            '211' => 2100000,
            '204' => 2350000,
            '201' => 1900000,
            '206' => 2700000,
            '209' => 1090000,
            '202' => 2100000,
            '205' => 2650000,
            '207' => 2950000,
            '226' => 5100000,
            '220' => 4300000,
            '232' => 2200000,
            '203' => 2330000,
            '230' => 1850000,
            '231' => 1850000,
            '218' => 2500000,
            '219' => 2600000,
            '221' => 2830000,
            '113' => 2550000,
            '212' => 3750000,
            '110' => 2850000,
            '225' => 2700000,
            '208' => 2400000,
            '224' => 2250000,
            '235' => 2500000,
            '289' => 3400000,
            '298' => 2700000,
            '291' => 3350000,
            '293' => 2750000,
            '295' => 2200000,
            '297' => 4700000,
            '296' => 2500000,
            '255' => 3300000,
            '290' => 6000000,
            '292' => 4900000,
            '294' => 3800000,
            '299' => 4000000,
        ];

        $images = [
            'storage/door_images/wooden_door_1.jpg',
            'storage/door_images/metal_door_2.jpg',
            'storage/door_images/plastic_door_3.jpg',
            'storage/door_images/glass_door_4.jpg',
            'storage/door_images/aluminium_door_5.jpg',
            'storage/door_images/steel_door_6.jpg',
            'storage/door_images/bimetal_door_7.jpg',
        ];

        foreach ($numbers as $number => $price) {
            DoorType::create([
                'name' => $number,
                'price' => $price,
                'image_url' => $images[array_rand($images)], 
            ]);
        }
    }
}
