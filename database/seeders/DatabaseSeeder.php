<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Запускаем сидеры для позиций и пользователей
        $this->call(PositionSeeder::class);
        $this->call(UserSeeder::class);

    }
}
