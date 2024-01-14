<?php

namespace App\Actions\User;

use App\Helpers\AlertHelper;
use App\Models\User;

class EditUserAction
{
  public function __invoke(array $newUser, AlertHelper $alert = new AlertHelper)
  {
    $user = User::getAuthorized();

    $newUser = [
      'name' => $newUser['name'] ?? $user->name,
      'surname' => $newUser['surname'] ?? $user->surname,
      'email' => $newUser['email'] ?? $user->email,
      'phone' => $newUser['phone'] ?? $user->phone,
    ];

    $user->update($newUser);

    $alert('Данные аккаунта успешно изменены');
  }
}