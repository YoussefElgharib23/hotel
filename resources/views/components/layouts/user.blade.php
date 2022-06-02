<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom style -->
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        .bg-gray {
            background: #fafafa;
        }

        .dashboard-navbar {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 0;
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding-left: 310px;
            padding-right: 1rem;
            background: white;
            border-bottom: 1px solid #e3e3e3;
        }

        .dashboard-container {
            background: #fafafa;
            min-height: 100vh;
        }

        .login-form {
            max-width: 30rem;
        }

        .tracking-tighter {
            letter-spacing: -0.12rem;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto;
            background-color: #232323;
            height: 100%;
            width: 300px;
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
        }

        .sidebar-link {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 0.5rem;
            margin-left: -0.5rem;
            display: block;
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
        }

        .sidebar-link:hover {
            color: white;
            background: #474747;
        }

        ul {
            padding: 0;
            list-style: none;
        }

        .icon-container {
            display: flex;
            justify-content: center;
            width: 30px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="dashboard-container">
        <div class="dashboard-navbar">
            <ul class="d-flex align-items-center m-0 ms-auto">
                <li>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img style="width: 40px; border-radius: 50%;" src="https://avatars.dicebear.com/api/initials/{{ auth()->user()->name }}.svg" alt="">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a class="dropdown-item text-black" href="{{ route('user.hotel') }}">Mon hotel</a>
                        </li>
                        <li>
                            <form action="/logout" id="logout-form" class="d-none" method="POST">
                                @csrf
                            </form>
                            <a class="dropdown-item text-black" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>

                        </li>
                    </ul>

                </li>

            </ul>
        </div>
        <div class="sidebar">

            <img src="/assets/images/logo.png" class="mb-4 mx-auto" alt="">

            <ul>
                <li>
                    <a href="" class="sidebar-link">
                        <div class="icon-container">
                            <i class="fas fa-hotel me-2"></i>
                        </div>
                        <span>Hotel</span>
                    </a>
                </li>
                <li>
                    <a href="" class="sidebar-link">
                        <div class="icon-container">
                            <i class="fas fa-grip-vertical me-2"></i>
                        </div>
                        <span>Les categories</span>
                    </a>
                </li>
                <li>
                    <a href="" class="sidebar-link">
                        <div class="icon-container">
                            <i class="fas fa-person-booth me-2"></i>
                        </div>
                        <span>Les chambres</span>
                    </a>
                </li>
                <li>
                    <a href="" class="sidebar-link">
                        <div class="icon-container">
                            <i class="fas fa-restroom me-2"></i>
                        </div>
                        <span>Les reservations</span>
                    </a>
                </li>
            </ul>

        </div>

        <div class="mt-4" style="padding-left: 300px;">
            {{ $slot }}
        </div>

    </div>
    {{ $scripts }}

</body>

</html>