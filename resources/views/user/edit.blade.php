@extends('layouts.center')

@section('page.title', 'My account')

@section('center.content')
  <x-card>
    <x-card-header>{{ __('Изменить аккаунт') }}</x-card-header>

    <div class="card-body">
      <form action={{ route('user.update') }} method="POST">
        @csrf

        <input type="text" name="name" placeholder={{ $name }} class="form-control mb-3">
        <input type="text" name="surname" placeholder={{ $surname }} class="form-control mb-3">
        <input type="email" name="email" placeholder={{ $email }} class="form-control mb-3">
        <input type="tel" name="phone" placeholder={{ $phone }} class="form-control mb-3">
        <div class="mb-4"><a href={{ route('user.editPassword') }}>{{ __('Изменить пароль') }}</a></div>

        <x-button type="submit">{{ __('Отправить') }}</x-button>
      </form>
    </div>
  </x-card>
@endsection