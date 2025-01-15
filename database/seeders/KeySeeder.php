<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Knob;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keys = [
            ['name' => "yo'q"],
            ['name' => "ha"],
           
        ];

        foreach ($keys as $key) {
            Knob::create($key);
        }
    }
}
