<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = [
            'Qizil', 'Ko\'k', 'Yashil', 'Sariq', 'To\'q sariq', 'Binafsha', 'Pushti', 'Jigarrang', 'Kulrang', 'Qora', 'Oq',
            'Cyan', 'Magenta', 'Limon', 'Zaytun', 'Teal', 'Devor', 'Indigo', 'Binafsha', 'Maroon', 'Boj', 'Oltin', 
            'Kumush', 'Bronza', 'Sut', 'Turkuz', 'Lavanda', 'Bej', 'Korall', 'Salmond', 'Olxo\'ri', 'Plum', 'Tan'
        ];
        

        foreach ($colors as $color) {
            Color::create(['name' => $color]);
        }
    }
}
