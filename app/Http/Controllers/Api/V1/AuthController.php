<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // POST /login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Неверный логин или пароль'], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'message' => 'ok',
            'user'    => Auth::user(),
        ]);
    }

    // POST /register
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', 'max:255', 'unique:users,email'],
            'password'              => ['required', 'string', 'min:6', 'confirmed'], // password_confirmation
        ]);

        /** @var \App\Models\User $user */
        $user = User::create([
            'company_id' => 1,
            'filial_id'  => 1,
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'role'      => 'client',    // роль клиента
        ]);

        // Сразу логиним нового пользователя
        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'message' => 'registered',
            'user'    => $user,
        ], 201);
    }

    // GET /api/v1/me
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    // POST /logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'logged_out']);
    }
}
