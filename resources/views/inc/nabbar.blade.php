<!-- Navigation-->

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'TechZoo') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/services">services</a>
                </li>
                {{-- <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="/posts">Blog</a></li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#">Blog</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/posts">Blog Home</a>
                        <a class="dropdown-item" href="/dashboard">Blog Post</a>

                    </div>
                    {{-- <li class="nav-item"><a class="nav-link active" aria-current="page"
                        href="{{ route('posts.create') }}">Create</a></li> --}}
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/contact">Contact Us</a>
                </li>

                <li class="nav-item">
                    <div class="form-check form-switch nav-item">
                        <input class="form-check-input active" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label active" for="flexSwitchCheckDefault">Dark Mode</label>
                    </div >
                </li>
                    {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Dcom</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/first">First Semester</a>

                    </div>
                </li> --}}





            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
