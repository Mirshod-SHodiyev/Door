<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['name' => 'yo\'q'],
            ["name' => 'krashni kbik sapajok"],
            ["name' => 'shipon kubik sapajok"],
            
            
        ];

        foreach ($doorextras as $doorextra) {
           DoorExtra ::create($doorextra);
        }
    }
}
