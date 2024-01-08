@extends('layouts.center')

@section('page.title', 'register')

@section('center.content')
    <x-card>
        <x-card-header>
            {{ __('Регистрация') }}
            <x-slot name="right"><a href={{ route('login')}}>{{ __('Вход') }}</a></x-slot>
        </x-card-header>

        <div class="card-body">
            <form accept={{ route('register.store') }} method="POST">
                @csrf

                <x-input name="name" autofocus>{{ __('Имя') }}</x-input>
                <x-error name="name" />

                <x-input name="surname">{{ __('Фамилия') }}</x-input>
                <x-error name="surname" />

                <x-input type="email" name="email">{{ __('Email') }}</x-input>
                <x-error name="email" />

                <x-input type="tel" name="phone">{{ __('Номер телефона') }}</x-input>
                <x-error name="phone" />

                <x-input type="password" name="password">{{ __('Пароль') }}</x-input>
                <x-error name="password" />

                <x-input type="password" name="password_confirmation">{{ __('Пароль еще раз') }}</x-input>
                <x-error name="password_confirmation" />

                <x-checkbox name="remember">{{ __('Запомнить меня') }}</x-checkbox>

                <x-button type="submit">{{ __('Зарегистрироваться') }}</x-button>
            </form>
        </div>
    </x-card>
@endsection