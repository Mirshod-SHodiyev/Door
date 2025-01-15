<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aniq login, email va parol bilan 6 ta foydalanuvchi qo'shish
        $users = [
            [
                'name' => 'Admin',
                'email' => 'Admin@gmial.com',
                'password' => bcrypt('B1O2S3S4'),
                'is_admin' => true,
            ],
            [
                'name' => 'Buxoro',
                'email' => 'Buxoro@gmail.com',
                'password' => bcrypt('B1U2X304R5'),
                'is_admin' => false,
            ],
            [
                'name' => 'Samarqand',
                'email' => 'Samarqand@gmail.com ',
                'password' => bcrypt('S1A2M3A4R5Q6A7N8D9'),
                'is_admin' => false,
            ],
            [
                'name' => 'Navoiy',
                'email' => 'Navoiy@gmail.com',
                'password' => bcrypt('N1A2V3O4I5Y6'),
                'is_admin' => false,
            ],
            [
                'name' => 'Jizzax',
                'email' => 'Jizzax@gmail.com ',
                'password' => bcrypt('J1I2Z3ZA4X5'),
                'is_admin' => false,
            ],
            [
                'name' => 'Toshkent',
                'email' => 'Toshkent@gmail.com',
                'password' => bcrypt('T1O2S3H4K5E6N7T8'),
                'is_admin' => false,
            ],
            [
                'name' => 'Xatirchi',
                'email' => 'Xatirchi@gmail.com',
                'password' => bcrypt('X1A2T3I4R5C6H7I8'),
                'is_admin' => false,
            ],
        ];

        // Har bir foydalanuvchini bazaga qo'shish
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
