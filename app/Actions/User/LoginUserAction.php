<?php

namespace App\Actions\User;
use App\Helpers\AlertHelper;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
  public function __invoke(array $credentials, bool $remember, AlertHelper $alert = new AlertHelper) 
  {
    $user = Auth::attempt($credentials, $remember);

    $alert('Вы успешно вошли в аккаунт');

    return $user;
  }
}