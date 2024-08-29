<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all(); // Получаем все записи из таблицы positions
        return response()->json($positions); // Возвращаем данные в формате JSON
    }
}

