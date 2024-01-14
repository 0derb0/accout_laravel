<?php

namespace App\Actions\User;

use App\Helpers\AlertHelper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserAction
{
  public function __invoke(
    array $credentials, 
    bool $remember, 
    AlertHelper $alert = new AlertHelper
  )
  {
    $user = User::create($credentials);

    Auth::login($user, $remember);

    $alert('Аккаунт успешно создан');
  }
}