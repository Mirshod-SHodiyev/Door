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
            '210' => ['price' => 2100000, 'thickness' => 8],
            '211' => ['price' => 2100000, 'thickness' => 8],
            '204' => ['price' => 2350000, 'thickness' => 8],
            '201' => ['price' => 1900000, 'thickness' => 8],
            '206' => ['price' => 2700000, 'thickness' => 12], // 12 sm qalinlik
            '209' => ['price' => 1090000, 'thickness' => 8],
            '202' => ['price' => 2100000, 'thickness' => 12], // 12 sm qalinlik
            '205' => ['price' => 2650000, 'thickness' => 12], // 12 sm qalinlik
            '207' => ['price' => 2950000, 'thickness' => 12], // 12 sm qalinlik
            '226' => ['price' => 5100000, 'thickness' => 8],
            '220' => ['price' => 4300000, 'thickness' => 8],
            '232' => ['price' => 2200000, 'thickness' => 8],
            '203' => ['price' => 2330000, 'thickness' => 8],
            '230' => ['price' => 1850000, 'thickness' => 8],
            '231' => ['price' => 1850000, 'thickness' => 8],
            '218' => ['price' => 2500000, 'thickness' => 8],
            '219' => ['price' => 2600000, 'thickness' => 8],
            '221' => ['price' => 2830000, 'thickness' => 8],
            '113' => ['price' => 2550000, 'thickness' => 8],
            '212' => ['price' => 3750000, 'thickness' => 12], // 12 sm qalinlik
            '110' => ['price' => 2850000, 'thickness' => 8],
            '225' => ['price' => 2700000, 'thickness' => 8],
            '208' => ['price' => 2400000, 'thickness' => 8],
            '224' => ['price' => 2250000, 'thickness' => 8],
            '235' => ['price' => 2500000, 'thickness' => 12], // 12 sm qalinlik
            '289' => ['price' => 3400000, 'thickness' => 12], // 12 sm qalinlik
            '298' => ['price' => 2700000, 'thickness' => 12], // 12 sm qalinlik
            '291' => ['price' => 3350000, 'thickness' => 8],
            '293' => ['price' => 2750000, 'thickness' => 12], // 12 sm qalinlik
            '295' => ['price' => 2200000, 'thickness' => 8],
            '297' => ['price' => 4700000, 'thickness' => 12], // 12 sm qalinlik
            '296' => ['price' => 2500000, 'thickness' => 12], // 12 sm qalinlik
            '255' => ['price' => 3300000, 'thickness' => 8],
            '290' => ['price' => 6000000, 'thickness' => 8],
            '292' => ['price' => 4900000, 'thickness' => 8],
            '294' => ['price' => 3800000, 'thickness' => 8],
            '299' => ['price' => 4000000, 'thickness' => 8],
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

      

        foreach ($numbers as $number => $details) {
            // Jadvalga yozish
            DoorType::create([
                'name' => $number,
                'price' => $details['price'], // Narxni kiritish
                'thickness' => $details['thickness'], // Qalinlikni kiritish
                'image_url' => $images[array_rand($images)], // Tasodifiy rasm tanlash
            ]);
        }
    }
}