<?php

namespace App\Http\Controllers;

use App\Actions\User\LoginUserAction;
use App\Actions\User\RegisterUserAction;
use App\Helpers\AlertHelper;
use App\Helpers\ReturnBackHelper;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('register.index');
    }

    public function registerStore(
        RegisterUserRequest $request, 
        RegisterUserAction $registerUserAction,
    )
    {
        $registerUserAction(
            $request->validated(),
            !! $request->remember,
        );

        return redirect(route('home'));
    }

    public function loginIndex()
    {
        return view('login.index');
    }

    public function loginStore(
        LoginUserRequest $request,
        LoginUserAction $loginUserAction,
        ReturnBackHelper $returnBack,
    )
    {
        if ($loginUserAction($request->validated(), !!$request->remember)) {
            return redirect(route('home'));
        }

        return $returnBack([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request, AlertHelper $alert)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        $alert('Вы успешно вышли из аккаунта');
        return redirect(route('home'));
    }
}
