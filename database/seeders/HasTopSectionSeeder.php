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
        $data = [
            ['name' => 'Section 1'],
            ['name' => 'Section 2'],
            ['name' => 'Section 3'],
            ['name' => 'Section 4'],
        ];

        foreach ($data as $item) {
            HasTopSection::create($item);
        }
    }
}
