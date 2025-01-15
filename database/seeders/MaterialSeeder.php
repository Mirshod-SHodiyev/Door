<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material; // Material modelini qo'shish

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Material nomlari va narxlari
        $data = [
            ['name' => 'Standart', 'price' => 0],
            ['name' => 'Arex Shipon', 'price' => 500000],
            ['name' => 'Yasin Shipon', 'price' => 400000],
           
        ];

        // Material modelini yaratish
        foreach ($data as $item) {
            Material::create($item);
        }
    }
}
