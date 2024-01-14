@extends('layouts.center')

@section('page.title', __('Posts'))

@section('center.content')
  <x-card>
    <x-card-header>
      {{ __('Посты') }}
    </x-card-header>

    <div class="card-body">
      <form action="{{ route('posts.search') }}" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="param" placeholder="{{ __('поиск...') }}" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-outline-primary" type="sumbit" id="button-addon2">{{ __('Поиск') }}</button>
        </div>
      </form> 

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