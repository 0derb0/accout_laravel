<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name'=>['required', 'string'],
            'surname'=>['required', 'string'],
            'email'=>['required', 'string', 'email', 'unique:users'],
            'phone'=>['required', 'string'],
            'password'=>['required', 'string', 'confirmed', 'min:8'],
        ]);

        $user = User::create($validated);

        Auth::login($user, ($request->remember ?? false));

        session(['alert' => __('Аккаунт успешно создан')]);
        return redirect(route('home'));
    }
}
