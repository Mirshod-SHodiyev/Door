<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoorAddition;

class DoorAdditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dooradditions = [
            ['name' => "Framoga yo'q"],
            ['name' => 'Framoga 40'],
            ['name' => 'Framoga 50'],
            ['name' => 'Framoga 60'],
            ['name' => 'Framoga 70'],
            ['name' => 'Framoga 80'],
            ['name' => 'Framoga 90'],
        ];

        foreach ($dooradditions as $dooraddition) {
            DoorAddition::create($dooraddition);
        }
    }
}
