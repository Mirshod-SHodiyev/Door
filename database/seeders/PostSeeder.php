<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\DoorDimension;
use App\Models\Color;
use App\Models\User;
use App\Models\DoorType;
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
      
        $doorDimension = DoorDimension::factory()->create();
        $color = Color::factory()->create();
        $doortype = DoorType::factory()->create();
      
        

     
        Ad::create([
            'title' => $faker->sentence(5),
            'description' => $faker->paragraph,
            'customers_info' => $faker->paragraph,
            'door_dimensions_id' => $doorDimension->id,
            'price'=> $faker->randomFloat(2, 100, 1000),
            'door_types_id' => $doortype->id,
            'colors_id' => $color->id,
            'users_id' => $user->id,
        ]);

     
        Ad::factory() ->count(5)->create([
            'door_types_id' => $doortype->id,
        ]);
    }
}
