<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoorDimension>
 */
class DoorDimensionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_fee' => $this->faker->boolean, // Xizmat haqi
            'has_top_section' => $this->faker->boolean, // Yuqori qismi bor/yo'q
            'opening_side' => $this->faker->randomElement(['left', 'right']), // Chap yoki o'ng tomonga ochiladi
            'width' => $this->faker->randomFloat(2, 50, 200), // Eni, random 50-200 orasida
            'height' => $this->faker->randomFloat(2, 150, 300), // Bo'yi, random 150-300 orasida
            'material' => $this->faker->randomElement(['wood', 'metal', 'plastic']), // Material
        ];
    }
}
