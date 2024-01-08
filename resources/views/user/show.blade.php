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
        <x-button>
          <a href={{ route('logout') }} class="nav-link">{{ __('Выйти') }}</a>
        </x-button>

        <form action={{ route('user.delete') }} method="post">
          @csrf

          <x-button type="submit">{{ __('Удалить аккаунт') }}</x-button>
        </form>
      </div>
    </div>
  </x-card>
@endsection