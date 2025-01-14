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
                'name' => 'Mirshod',
                'email' => 'mirshod@example.com',
                'password' => bcrypt('22222222'),
                'is_admin' => true,
            ],
            [
                'name' => 'Ali',
                'email' => 'ali@example.com',
                'password' => bcrypt('22222222'),
                'is_admin' => false,
            ],
            [
                'name' => 'Zohid',
                'email' => 'zohid@example.com',
                'password' => bcrypt('22222222'),
                'is_admin' => false,
            ],
            [
                'name' => 'Olim',
                'email' => 'olim@example.com',
                'password' => bcrypt('22222222'),
                'is_admin' => false,
            ],
            [
                'name' => 'Shavkat',
                'email' => 'shavkat@example.com',
                'password' => bcrypt('22222222'),
                'is_admin' => false,
            ],
            [
                'name' => 'Jasur',
                'email' => 'jasur@example.com',
                'password' => bcrypt('22222222'),
                'is_admin' => false,
            ],
        ];

        // Har bir foydalanuvchini bazaga qo'shish
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
