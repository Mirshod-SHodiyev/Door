<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoorExtra;

class DoorExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doorextras = [
            ['name' => 'krashni kubik sapajok', 'price' => 100000],  // 100,000 so'm
            ['name' => 'shipon kubik sapajok', 'price' => 200000],  // 200,000 so'm
        ];

        foreach ($doorextras as $doorextra) {
            DoorExtra::create($doorextra);
        }
    }
}
