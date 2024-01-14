@extends('layouts.center')

@section('page.title', 'Me')

@section('center.content')
<x-card>
  <x-card-header>
    {{ __('Мой аккаунт') }}
    <x-slot name="right">
      <a href={{ route('user.edit') }}>{{ __('Изменить') }}</a>
    </x-slot>
  </x-card-header>

    <div class="card-body">
      <input 
        type="text" 
        name="name" 
        placeholder={{ $name }} 
        class="form-control mb-3"
        disabled
      >
      <input 
        type="text" 
        name="surname" 
        placeholder={{ $surname }} 
        class="form-control mb-3"
        disabled
      >
      <input 
        type="email" 
        name="email" 
        placeholder={{ $email }} 
        class="form-control mb-3"
        disabled
      >
      <input 
        type="tel" 
        name="phone" 
        placeholder={{ $phone }} 
        class="form-control mb-3"
        disabled
      >

      
      <div class="d-flex justify-content-between">
        <x-open-popup-button data-bs-target="#logout">
          {{ __('Выйти') }}
        </x-open-popup-button>

        <x-open-popup-button data-bs-target="#delete_account">
          {{ __('Удалить аккаунт') }}
        </x-open-popup-button>
      </div>
    </div>
  </x-card>

  {{-- Поп-ап выхода из аккаунта --}}
  <x-popup id="logout">
    {{ __('Вы действительно хотите выйти?') }}

    <x-slot name="buttons">
      <form action={{ route('logout') }} method="get">
        @csrf
        <x-button type="submit">{{ __('Подтвердить') }}</x-button>
      </form>
    </x-slot>
  </x-popup>

  
  {{-- Поп-ап удаления аккаунта --}}
  <x-popup id="delete_account">
    {{ __('Вы действительно хотите удалить аккаунт?') }}

    <x-slot name="body">
      {{ __('Данные будут удалены безвозвратно.') }}
    </x-slot>

    <x-slot name="buttons">
        <form action={{ route('user.delete') }} method="post">
          @csrf
          @method('delete')
          <x-button type="submit">{{ __('Подтвердить') }}</x-button>
        </form>
    </x-slot>
  </x-popup>
@endsection