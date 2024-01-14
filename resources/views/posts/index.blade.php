@extends('layouts.center')

@section('page.title', __('Posts'))

@section('center.content')
  <x-card>
    <x-card-header>
      {{ __('Посты') }}
    </x-card-header>

    <div class="card-body">
      <ul class="list-group mb-3">
        @foreach ($posts as $post)
          <x-list-item href="{{ route('posts.show', $post->id) }}">

            <x-list-item-body>
              <x-slot name="header">
                {{ __('Название:') }}
              </x-slot>

              {{ $post->title }}
            </x-list-item-body>
            
            <x-list-item-body>
              <x-slot name="header">
                {{ __('Автор:') }}
              </x-slot>

              {{ $post->name.' '.$post->surname }}

              <x-slot name="right">
                <a href="{{ route('posts.show', $post->id) }}">{{ __('Перейти') }}</a>
              </x-slot>
            </x-list-item-body>

          </x-list-item>
        @endforeach
      </ul>
      
      {{$posts->links()}}
    </div>
  
  </x-card>
@endsection