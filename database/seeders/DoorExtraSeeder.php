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
            ['name' => 'krashni kubik sapajok', 'price' => 100000],  
            ['name' => 'shipon kubik sapajok', 'price' => 150000],  
        ];

        foreach ($doorextras as $doorextra) {
            DoorExtra::create($doorextra);
        }
    }
}
