@extends('layouts.center')

@section('page.title', $post->title)

@section('center.content')
  <x-card>
    <x-card-header>
      {{ $post->title }}

      <x-slot name="right">
        <a href="{{ $previous_page }}">{{ __('Назад') }}</a>
      </x-slot> 
    </x-card-header>

    <div class="card-body">
      {{ $post->body }}

      <a href="{{ route('posts.edit', $post->id) }}">{{ __('Редактировать') }}</a>
    </div>
  </x-card>
@endsection