<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoorFrame;

class DoorFrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DoorFrame nomlari
        $doorFrames = [
            ['name' => 'yo\'q'],
            ['name' => '10 lik tekis nalichka'],
            ['name' => '2 ta tirnoqcha nalichka'],
            ['name' => '3 ta tirnoqcha nalichka'],
            ['name' => '1.6 lik nalichka'],
            ['name' => '1.6 lik profo nalichka'],
            ['name' => '1-qoator apklat nalichka'],
            ['name' => '2-qoator apklat nalichka'],
            ['name' => 'gulli nalichka'],
            ['name' => 'lagmoncha nalichka'],
            ['name' => 'toshkent fason nalichka'],
            ['name' => '290 fason nalichka'],

        ];

        // DoorFrame nomlari va ularning narxlari
        $doorFramePriceMapping = [
            'yo\'q' => 0,
            '10 lik tekis nalichka' => 30000,
            '2 ta tirnoqcha nalichka' => 35000,
            '3 ta tirnoqcha nalichka' => 40000,
            '1.6 lik nalichka' => 50000,
            '1.6 lik profo nalichka' => 80000,
            '1-qoator apklat nalichka' => 50000,
            '2-qoator apklat nalichka' => 60000,
            'gulli nalichka' => 55000,
            'lagmoncha nalichka' => 100000,
            'toshkent fason nalichka' => 60000,
            '290 fason nalichka' => 70000,
        ];

        // DoorFrame modelini yaratish
        foreach ($doorFrames as $doorFrame) {
            $price = $doorFramePriceMapping[$doorFrame['name']] ?? 0; // Narxni olish
            DoorFrame::create([
                'name' => $doorFrame['name'],
                'price' => $price, // Narxni qo'shish
            ]);
        }
    }
}
