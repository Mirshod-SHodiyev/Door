<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            DoorDimensionSeeder::class,
            ColorSeeder::class,
            DoorTypeSeeder::class,
            UserSeeder::class,
            DoorExtraSeeder::class,
            KeySeeder::class,
            DoorFrameSeeder::class,
            HasTopSectionSeeder::class,
            FrameSeeder::class,
            MaterialSeeder::class,


            


        ]);
    }
}
