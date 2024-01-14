@extends('layouts.center')

@section('page.title', 'Edit post')

@section('center.content')
  <x-card>
    <x-card-header>
      {{ __('Редактировать пост') }}

      <x-slot name="right">
        <a href="{{ $previous_page }}">{{ __('Назад') }}</a>
      </x-slot>
    </x-card-header>
    
    <div class="card-body">
      <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf

        <input type="text" name="title" placeholder="{{ $post->title }}" class="form-control mb-3">
        <textarea name="body" rows="3" placeholder="{{ $post->body }}" class="form-control mb-3"></textarea>

        <x-button type="submit">{{ __('Отправить') }}</x-button>
      </form>
    </div>
  </x-card>
@endsection