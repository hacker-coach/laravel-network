<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbarMain">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/" style="font-weight: 370;">member network</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-auto" id="navbarMenu">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">{{ __('Super-Problemlöser') }}</a>
                </li>
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <strong><a class="nav-link" href="{{ route('register') }}">{{ __('Mitglied werden') }}</a></strong>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><strong>{{ __('Mitglieder') }}</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company') }}"><strong>{{ __('Firmen') }}</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('userProfil') }}">{{ __('Profil') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                @endguest

            </ul>
        </div>
    </div>
</nav>
