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
            '210', '211', '204', '201', '206', '209', '202', '205', '207',
            '226', '220', '232', '203', '230', '231', '218', '219', '221', '113',
            '112', '110', '225', '224','208','224', '235', '289', '298', '291', '293','295', '297',
            '296', '255', '290', '292','294', '299'
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

        $doorTypes = [];

        foreach ($numbers as $index => $number) {
            $doorTypes[] = [
                'name' => $number,
                'image_url' => $images[$index % count($images)] 
            ];
        }

        foreach ($doorTypes as $type) {
            DoorType::create($type);
        }
    }
}
