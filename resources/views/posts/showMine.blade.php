@extends('layouts.center')

@section('page.title', __('Mine posts'))

@section('center.content')
  <x-card>
    <x-card-header>
      {{ __('Мои посты') }}
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

              <x-slot name="right">
                <div class="dropdown">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">{{ __('Перейти') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">{{ __('Редактировать') }}</a></li>
                    <li><x-open-popup-button class="dropdown-item text-danger" data-bs-target="#delete_post">{{ __('Удалить') }}</x-open-popup-button></li>
                  </ul>
                </div>
              </x-slot>
            </x-list-item-body>
      
          </x-list-item>

          <x-popup id="delete_post">
            {{ __('Вы действительно хотите удалить пост?') }}
        
            <x-slot name="buttons">
              <form action={{ route('posts.delete', $post->id) }} method="post">
                @csrf
                @method('delete')
                <x-button type="submit">{{ __('Подтвердить') }}</x-button>
              </form>
            </x-slot>
          </x-popup>
        @endforeach
      </ul>
      
      {{$posts->links()}}
    </div>
  
  </x-card>
@endsection