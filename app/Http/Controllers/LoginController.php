<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'identity' => 'required|string|min:3',
                'password' => 'required|string|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang dimasukkan tidak valid.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $identity = $request->input('identity');
            $password = $request->input('password');

            // Check if identity is email or username
            $user = User::where('email', $identity)
                       ->orWhere('name', $identity)
                       ->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email/username atau kata sandi salah.'
                ], 401);
            }

            // Attempt authentication
            if (Auth::attempt(['email' => $user->email, 'password' => $password])) {
                $request->session()->regenerate();
                
                return response()->json([
                    'success' => true,
                    'message' => 'Login berhasil!',
                    'redirect' => route('dashboard.content')
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Email/username atau kata sandi salah.'
            ], 401);

        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server. Silakan coba lagi.'
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('dashboard.index');
    }
}
