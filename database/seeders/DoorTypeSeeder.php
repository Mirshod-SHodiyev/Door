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
        $doorTypes = [
            ['name' => 'Yog\'och eshik', 'image_url' => 'storage/door_images/wooden_door_1.jpg'],
            ['name' => 'Metal eshik', 'image_url' => 'storage/door_images/metal_door_2.jpg'],
            ['name' => 'Plastik eshik', 'image_url' => 'storage/door_images/plastic_door_3.jpg'],
            ['name' => 'Shisha eshik', 'image_url' => 'storage/door_images/glass_door_4.jpg'],
            ['name' => 'Alyuminiy eshik', 'image_url' => 'storage/door_images/aluminium_door_5.jpg'],
            ['name' => 'Po\'lat eshik', 'image_url' => 'storage/door_images/steel_door_6.jpg'],
            ['name' => 'Bimetall eshik', 'image_url' => 'storage/door_images/bimetal_door_7.jpg'],
        ];

        foreach ($doorTypes as $type) {
            DoorType::create($type);
        }
    }
}
