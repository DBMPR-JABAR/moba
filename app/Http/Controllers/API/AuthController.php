<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 500);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'data' => $user,
                    'token' => $token
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Password salah'
                ], 500);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Email tidak terdaftar'
            ], 500);
        }
    }

    public function profile()
    {
        $user = auth()->user();
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil logout'
        ], 200);
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'opd_id' => 'required|integer',
            'nip' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'opd_id' => (int) $request->opd_id,
            'nip' => $request->nip,
            'no_hp' => $request->no_hp,
        ]);
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'data' => $user,
            'token' => $token
        ], 200);
    }
}
