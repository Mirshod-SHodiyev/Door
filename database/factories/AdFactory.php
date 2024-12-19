<?php

namespace Database\Factories;


use App\Models\User;
use App\Models\Ad;
use App\Models\Price;
use App\Models\DoorDimension;
use App\Models\Color;
use App\Models\DoorType;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
           'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'customers_info' => $this->faker->paragraph(),
            'door_dimensions_id' => DoorDimension::factory(),
            'colors_id' => Color::factory(), 
            'door_types_id' => DoorType::factory(),
            'users_id' => User::factory(),
            'price_id' => Price::factory(),

        ];
    }

    }
