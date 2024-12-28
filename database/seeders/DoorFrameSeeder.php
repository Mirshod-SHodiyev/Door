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
            ['name' => '1 lik nalichka'],
            ['name' => '2 lik nalichka'],
            ['name' => '3 lik nalichka'],
            ['name' => '4 lik nalichka'],
            ['name' => '5 lik nalichka'],
            ['name' => '6 lik nalichka'],
            ['name' => '7 lik nalichka'],
        ];

        
        foreach ($doorFrames as $doorFrame) {
            DoorFrame::create($doorFrame);
        }
    }
}
