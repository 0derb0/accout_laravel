@extends('layouts.center')

@section('page.title', 'login')

@section('center.content')
    <x-card>
        <x-card-header>
            {{ __('Вход') }}
            <x-slot name="right"><a href={{ route('register')}}>{{ __('Регистрация') }}</a></x-slot>
        </x-card-header>

        <div class="card-body">
            <form accept={{ route('login.store') }} method="POST">
                @csrf

                <x-input type="email" name="email" autofocus >{{ __('Email') }}</x-input>
                <x-error name="email" />

                <x-input type="password" name="password">{{ __('Пароль') }}</x-input>

                <x-checkbox name="remember">{{ __('Запомнить меня') }}</x-checkbox>

                <x-button type="submit">{{ __('Войти') }}</x-button>
            </form>
        </div>
    </x-card>
@endsection