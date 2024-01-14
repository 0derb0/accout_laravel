<?php

namespace App\Http\Controllers;

use App\Actions\User\EditUserAction;
use App\Helpers\AlertHelper;
use App\Http\Requests\User\EditUserPasswordRequest;
use App\Http\Requests\User\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::getAuthorized();

        return view('user.show', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = User::getAuthorized();

        return view('user.edit', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, EditUserAction $editUser)
    {
        $editUser($request->validated());

        return back();
    }

    public function editPassword()
    {
        $password = User::getAuthorized();

        return view('user.editPassword', $password);
    }

    public function updatePassword(EditUserPasswordRequest $request, AlertHelper $alert)
    {
        User::getAuthorized()
            ->update(['password' => $request->validated()['new_password']]);

        $alert('Пароль успешно изменен');
        return redirect(route('user.show'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlertHelper $alert)
    {
        User::getAuthorized()->delete();

        $alert('Аккаунт успешно удален');
        return redirect(route('home'));
    }
}