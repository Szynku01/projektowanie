<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('cssfile/app.css') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/style.css') }}">
    <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    @yield('css')
</head>
<body>
    <aside class="sidebar">
        <div class="profile-logo">
            <i class="fa-solid fa-user"></i>
        </div>

        <nav class="navbar">
            <ul class="nav-list">
                <div class="nav-item">
                    <i class="fa-solid fa-plus"></i>
                    <li class="item"><a href="{{ route('cenniki') }}">Cenniki</a></li>
                </div>

                <div class="nav-item">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    <li class="item"><a href="{{ route('dochodoweTowary') }}">Dochodowe Towary</a></li>
                </div>

                <div class="nav-item">
                    <i class="fa-solid fa-chart-simple"></i>
                    <li class="item"><a href="{{ route('popularneTowary') }}">Popularność towarów</a></li>
                </div>
            </ul>
        </nav>

        <div class="sidebar-bottom">
            <div class="log-out">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p class="log-out-text">Wyloguj się</p>
            </div>
        </div>

    </aside>

    <main class="content">
        @yield('content')
    </main>
</body>
</html>