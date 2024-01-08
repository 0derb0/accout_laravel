@php
  function isActive(string $link): string
  {
    if (Route::is($link)) return 'active';
    else return ''; 
  }
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary bg">
  <div class="container">

    <a class="navbar-brand" href={{ route('home') }}>{{ __(config('app.name', 'Laravel')) }}</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link {{ isActive('home') }}" aria-current="page" href={{ route('home') }}>{{ __('Home') }}</a>
        </li>

        @if (false)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        @endif
  
      </ul>

      <ul class="navbar-nav">
        @if (Auth::user())
          <li><a href={{ route('user.show') }} class="nav-link">&#128578; {{ __(Auth::user()->name) }}</a></li>
        @else
          <li><a href={{ route('register') }} class="nav-link border-end border-3 {{ isActive('register') }}">{{ __('Регистрация') }}</a></li>
          <li><a href={{ route('login') }} class="nav-link {{ isActive('login') }}">{{ __('Вход') }}</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>