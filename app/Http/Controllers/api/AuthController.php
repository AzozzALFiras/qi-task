<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
        // Register a new user
        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return response()->json(['message' => 'User registered successfully']);
        }
    
        // Login user
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');
    
            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
    
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token')->plainTextToken;
    
            return response()->json([
                'status'=> true,
                'message' => 'Logged in successfully',
                'user'=> $user,
                'token' => $token]);
        }
    
        // Logout user
        public function logout(Request $request)
        {
            $user = User::find($request->id);
            $user->tokens()->delete();
    
            return response()->json(['message' => 'Logged out successfully']);
        }
    }