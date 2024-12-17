<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Price;
use App\Models\DoorDimension;
use App\Models\Color;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = \Faker\Factory::create();

        $user = User::factory()->create();
        $price = Price::factory()->create();
        $doorDimension = DoorDimension::factory()->create();
        $color = Color::factory()->create();

     
        Ad::create([
            'title' => $faker->sentence(5),
            'description' => $faker->paragraph,
            'door_dimensions_id' => $doorDimension->id,
            'colors_id' => $color->id,
            'users_id' => $user->id,
        ]);

     
        Ad::factory()->count(5)->create();
    }
}
