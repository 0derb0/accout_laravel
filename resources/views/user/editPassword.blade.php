@extends('layouts.center')

@section('page.title', 'My account')

@section('center.content')
  <x-card>
    <x-card-header>{{ __('Изменить аккаунт') }}</x-card-header>

    <div class="card-body">
      <form action={{ route('user.updatePassword') }} method="POST">
        @csrf

        <x-input type="password" name="old_password">{{ __('Старый пароль') }}</x-input>
        <x-error name="old_password"/>

        <x-input type="password" name="new_password">{{ __('Новый пароль') }}</x-input>
        <x-error name="new_password"/>

        <x-input type="password" name="new_password_confirmation">{{ __('Пароль еще раз') }}</x-input>
        <x-error name="new_password_confirmation"/>

        <x-button type="submit">{{ __('Отправить') }}</x-button>
      </form>
    </div>
  </x-card>
@endsection