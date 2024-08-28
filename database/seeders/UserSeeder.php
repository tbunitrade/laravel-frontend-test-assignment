<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Подключаем модель User
use App\Models\Position; // Подключаем модель Position
use Faker\Factory as Faker; // Подключаем Faker

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Создание экземпляра Faker
        $positions = Position::all()->pluck('id')->toArray(); // Получаем массив ID позиций

        foreach (range(1, 45) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => '+380' . $faker->unique()->randomNumber(9, true),
                'position_id' => $faker->randomElement($positions),
                'photo' => 'default.jpg', // Временно, позже заменим на реальное изображение
                'password' => bcrypt('password'), // Устанавливаем хэшированный пароль по умолчанию
            ]);
        }
    }
}
