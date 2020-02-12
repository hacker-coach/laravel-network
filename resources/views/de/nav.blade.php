<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbarMain">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/" style="font-weight: 370;">problem solver network</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-auto" id="navbarMenu">
            <ul class="navbar-nav  ml-auto">

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
                    @if (Auth::user()->role_hunter)
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('contactIndex') }}" style="border: 1px solid rgba(0,0,0,.5);">{{ __('K') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><strong>{{ __('Mitglieder') }}</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company') }}"><strong>{{ __('Firmen') }}</strong></a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link btn btn-success" style="color:white; margin-left:5px;margin-right:5px;" href="{{ route('userProfil') }}">{{ __('Dein Profil') }}</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="/kontakt/" >Kontakt</a>
                </li>
                <li class="nav-item">
                    &nbsp;&nbsp;
                </li>
                <li>
                    <a target="_blank" href="https://twitter.com/psnTalent"  style="text-decoration: none;">
                        <span class="fab fa-twitter fa-2x fa-fw"  style="color:rgba(0,0,0,.5);"></span>
                    </a>
                    <a target="_blank" href="https://www.crack-brained.de/"  style="text-decoration: none; color:rgba(0,0,0,.5);" ><strong>[ B ]</strong></a>
                </li>
                <li class="nav-item">
                    &nbsp;&nbsp;
                </li>
            </ul>
        </div>
    </div>
</nav>
