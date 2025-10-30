<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use function Pest\Laravel\handleValidationExceptions;

class AuthController extends Controller
{
    public function loginForm()
    {
        return inertia('Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['email' => 'The provided credentials do not match our records.']);
        }
        $request->session()->regenerate();
        return redirect()->route('listing.index')->with('success', 'You have been logined successfully.');
    }

    public function registerForm()
    {
        return inertia('Auth/Register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('listing.index')->with('success', 'You have been registered successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('listing.index')->with('success', 'You have been logged out successfully.');
    }
}
