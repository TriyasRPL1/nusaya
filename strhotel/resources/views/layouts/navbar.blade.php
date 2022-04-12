<nav class="navbar navbar-expand-lg static-top navbar-light shadow bg-light italiana">
      <div class="container">
        <a class="navbar-brand app-name" href="#">LaFonte</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav navbar-name">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kamar">Kamar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#fasilitas">Fasilitas</a>
            </li>
          </ul>
        </div>

        @guest
            @if (Route::has('login'))
            <a class="btn btn-primary justify-content-end" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
        @else
        <a class="btn btn-primary justify-content-end" href="{{ route('home')}}">Home</a>
        @endguest

      </div>
    </nav>