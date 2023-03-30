<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request) 
    {
        if (Auth::attempt($request->validated())) {
            $this->home();
        }

        return back()->withErrors(['incorrect' => 'Неверный логин или пароль']);
    }

    public function registarion(RegistrationRequest $request) 
    {
        $data = $request->validated();

        $data['password'] = Hash::make($request->password);

        if ($request->file('avatar')) {
            $data['avatar_path'] = $request->file('avatar')->store('public/avatar');
        }

        $user = User::query()->create($data);

        Auth::login($user);

        $this->home();
    }

    public function logout() 
    {
        Auth::logout();
    }

    private function home() 
    {
        return redirect()->route('home');
    }
}
