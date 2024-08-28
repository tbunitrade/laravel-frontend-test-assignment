<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position; // Подключаем модель Position
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create(['name' => 'Developer']);
        Position::create(['name' => 'Designer']);
        Position::create(['name' => 'Manager']);
    }
}
