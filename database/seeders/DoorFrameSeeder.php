<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoorFrame;

class DoorFrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $doorFrames = [
            ['name' => '10 lik tekis nalichka'],
            ['name' => '2 ta tirnoqcha nalichka'],
            ['name' => '3 ta tirnoqcha nalichka'],
            ['name' => '1.6 lik nalichka'],
            ['name' => '1.6 lik  profo nalichka'],
            ['name' => '1-qoator apklat nalichka'],
            ['name' => '2-qoator apklat nalichka'],
            ['name' => 'gulli  nalichka'],
            ['name' => 'lagmoncha nalichka'],
            ['name' => 'toshkent fason nalichka'],
        ];

        
        foreach ($doorFrames as $doorFrame) {
            DoorFrame::create($doorFrame);
        }
    }
}
