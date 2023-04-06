<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin() {
        return view('signin');
    }

    public function signup() {
        return view('signup');
    }

    public function login(SignInRequest $request) {
        $validated = $request->validated();

        if (!Auth::attempt($validated)) {
            return back()->withErrors(['invalid' => 'Invalid credentials'])->withInput($request->all());
        }

        return redirect()->route('task.index');
    }

    public function register(SignUpRequest $request) {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        if ($request->file('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public/images');
        }

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('task.index');

    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
