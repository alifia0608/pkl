<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginOrRegister(Request $request)
{
    // Validasi input email dan password
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // Kalau user belum ada, buat akun baru
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    } else {
        // Kalau user sudah ada, cek password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }

    // Buat token autentikasi
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => $user->wasRecentlyCreated ? 'Account created and logged in' : 'Login success',
        'data' => $user,
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}
 }
