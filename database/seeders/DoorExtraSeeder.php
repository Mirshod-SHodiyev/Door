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
            ['name' => 'krashni kubik sapajok'],
            ['name' => 'shipon kubik sapajok'],
        ];

        foreach ($doorextras as $doorextra) {
            DoorExtra::create($doorextra);
        }
    }
}
