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
            ['name' => 'Yog\'och eshik'],
            ['name' => 'Metal eshik'],
            ['name' => 'Plastik eshik'],
            ['name' => 'Shisha eshik'],
            ['name' => 'Alyuminiy eshik'],
            ['name' => 'Po\'lat eshik'],
            ['name' => 'Bimetall eshik'],
        ];

    
        foreach ($doorTypes as $type) {
            DoorType::create($type);
        }
    }
}
