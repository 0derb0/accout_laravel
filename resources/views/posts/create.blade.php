@extends('layouts.center')

@section('page.title', __('Создать пост'))

@section('center.content')
  <x-card>
    <x-card-header>{{ __('Создать пост') }}</x-card-header>

    <div class="card-body">
      <form action={{ route('posts.store') }} method="post">
        @csrf

        <x-input name="title">{{ __('Заголовок') }}</x-input>
        <x-error name="title" />
        <x-text-area name="body">{{ __('Пост') }}</x-text-area>
        <x-error name="body" />

        <x-button type="sumbit">{{ __('Создать') }}</x-button>
      </form>
      
    </div>
  </x-card>
@endsection