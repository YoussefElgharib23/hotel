<nav class="navbar navbar-expand-lg bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">
            {{-- Logo here --}}
            Navbar
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Hotels</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @auth
                    @if (auth()->user()->role === 'admin_manager')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img style="width: 30px; border-radius: 50%;"
                                    src="https://avatars.dicebear.com/api/initials/{{ auth()->user()->name }}.svg" alt="">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.hotel') }}">Mon hotel</a>
                                </li>
                                <li>
                                    <form action="logout" id="logout-form" class="d-none" method="POST">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="javascript:;"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>

                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img style="width: 30px; border-radius: 50%;"
                                    src="https://avatars.dicebear.com/api/initials/{{ auth()->user()->name }}.svg" alt="">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <form action="logout" id="logout-form" class="d-none" method="POST">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="javascript:;"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>

                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
