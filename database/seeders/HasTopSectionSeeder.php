<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HasTopSection;

class HasTopSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // HasTopSection nomlari va narxlar
        $data = [
            ['name' => 'yo\'q', 'price' => 0],
            ['name' => '206', 'price' => 250000],
            ['name' => '206 tilla', 'price' => 350000],
            ['name' => '219', 'price' => 300000],
            ['name' => '208 ', 'price' => 300000],
            ['name' => '110', 'price' => 300000],
            ['name' => '221', 'price' => 350000],
            ['name' => '224', 'price' => 350000],
            ['name' => '225', 'price' => 350000],
            ['name' => '226', 'price' => 480000],
            ['name' => '220', 'price' => 420000],
            ['name' => '291', 'price' => 3500000],
        ];

        // HasTopSection modelini yaratish
        foreach ($data as $item) {
            HasTopSection::create($item);
        }
    }
}
