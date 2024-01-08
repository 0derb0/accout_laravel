<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'email'=>['required', 'string', 'email'],
            'password'=>['required', 'string'],
        ]);

        if (Auth::attempt($validated, ($request->remember ?? false)))
        {
            $request->session()->regenerate();

            session(['alert' => __('Вы успешно вошли в аккаунт')]);
            return redirect(route('home'));
        }

        return back()
            ->withInput()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.'
            ]);
    }
}
