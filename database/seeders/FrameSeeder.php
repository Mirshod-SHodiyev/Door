<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Frame;

class FrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frames = [
            ['name' => "yo'q"],
            ['name' => "ha"],
           
        ];

        foreach ($frames as $frame) {
            Frame::create($frame);
        }
    }
}
