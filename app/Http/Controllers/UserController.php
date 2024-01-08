<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::find(Auth::id());

        return view('user.show', [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::find(Auth::id());

        return view('user.edit', [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'=>['nullable', 'string'],
            'surname'=>['nullable', 'string'],
            'email'=>['nullable', 'string', 'email', 'unique:users'],
            'phone'=>['nullable', 'string'],
        ]);
    
        $user = User::find(Auth::id());
    
        $newUser = [
            'name' => $validated['name'] ?? $user->name,
            'surname' => $validated['surname'] ?? $user->surname,
            'email' => $validated['email'] ?? $user->email,
            'phone' => $validated['phone'] ?? $user->phone,
        ];
    
        $user->update($newUser);
    
        session(['alert' => __('Данные аккаунта успешно изменены')]);

        return back();
    }

    public function editPassword()
    {
        $password = User::find(Auth::id());

        return view('user.editPassword', ['password' => $password]);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => ['required', 'string', 'current_password'],
            'new_password'=>['required', 'string', 'confirmed', 'min:8'],
        ]); 

        $password = User::find(Auth::id())
            ->update(['password' => $validated['new_password']]);

        session(['alert' => __('Пароль успешно изменен')]);
        return redirect(route('user.show'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        User::find(Auth::id())->delete();

        session(['alert' => __('Аккаунт успешно удален')]);
        return redirect(route('home'));
    }
}
