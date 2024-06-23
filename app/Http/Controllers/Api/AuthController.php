<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users',
            'kelas' => 'required|in:kelas_7,kelas_8,kelas_9',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki_laki,perempuan',
            'password' => 'required',
        ]);

        //membuat data apa saja yang di post saat register user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'kelas' => $validatedData['kelas'],
            'umur' => $validatedData['umur'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user'
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'user' => UserResource::make($user),
        ]);
    }

    public function login(Request $request)
    {
        $logindata = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        //langkah untuk meng GET user
        $user = User::where('email', $logindata['email'])->first();

        //pengecekan apakah data usernya ada atau tidak, jika ada maka value menjadi TRUE jika tidak value FALSE dan mengembalikan pesan 'user not found'
        if (!$user) {
            return response()->json(['message' => 'user not found'], 401);
        }

        //pengecekan password
        if (!Hash::check($logindata['password'], $user->password)) {
            return response()->json([
                'message' => 'invalid credentials'
            ], 404);
        }

        //jika data email dan password sama atau sudah terdaftar maka akan di create token
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'user' => UserResource::make($user),
        ]);
    }

    public function logout(Request $request)
    {
        $request -> user()->currentAccessToken()->delete();

        return response()->json([
            'message', 'logout success'
        ]);
    }
}
