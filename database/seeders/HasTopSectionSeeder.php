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
            ['name' => 'Section 1', 'price' => 50000],
            ['name' => 'Section 2', 'price' => 60000],
            ['name' => 'Section 3', 'price' => 70000],
            ['name' => 'Section 4', 'price' => 80000],
        ];

        // HasTopSection modelini yaratish
        foreach ($data as $item) {
            HasTopSection::create($item);
        }
    }
}
