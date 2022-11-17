{{-- class="navbar navbar-expand-md navbar-light bg-white shadow-sm --}}
<nav class="navbar navbar-expand-md">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('cv_builder') }}" class="nav-link">Build CV</a></li>
                    @if (Illuminate\Support\Facades\Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Illuminate\Support\Facades\Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Illuminate\Support\Facades\Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/logout"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="/logout" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
</nav>