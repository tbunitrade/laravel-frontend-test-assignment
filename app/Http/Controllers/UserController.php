<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Получить список всех пользователей.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Показать информацию о конкретном пользователе по ID.
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    /**
     * Создать нового пользователя.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:60',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|regex:/^\+380\d{9}$/|unique:users,phone',
            'position_id' => 'required|exists:positions,id',
            'photo' => 'required|image|mimes:jpeg,jpg|max:5120|dimensions:min_width=70,min_height=70',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Обработка изображения
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagePath = $image->store('photos', 'public'); // Сохранение фото
        }

        // Создание пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'photo' => $imagePath ?? null,
        ]);

        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'New user successfully registered',
        ], 201);
    }
}
